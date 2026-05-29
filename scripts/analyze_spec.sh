#!/usr/bin/env bash

# analyze_spec.sh — run oasdiff against an old/new spec pair and capture
# the artifacts that downstream steps (classify_semver.sh, build_pr_body.py,
# the GitHub Actions workflow) need.
#
# Usage:
#   analyze_spec.sh OLD_SPEC NEW_SPEC OUTPUT_DIR
#
# Writes into OUTPUT_DIR:
#   breaking-exit         The numeric exit code from `oasdiff breaking`.
#                         0 = no breaking, 1 = breaking found, >1 = oasdiff error.
#   breaking-output.txt   Human-readable breaking-changes report (stderr of
#                         the breaking call). Empty file when there are none.
#   changelog.json        `oasdiff changelog -f json` output. Always written.
#   changelog.md          `oasdiff changelog -f markdown` output. Always written.
#
# Stdout: the resolved OUTPUT_DIR path so the caller can chain steps.
#
# Exit codes:
#   0  Analysis ran (regardless of whether breaking changes were found).
#   1  Bad arguments or missing spec files.
#   2  oasdiff itself errored (exit code >1 from any invocation).

set -eo pipefail

if [ "$#" -ne 3 ]; then
    echo "Usage: $0 OLD_SPEC NEW_SPEC OUTPUT_DIR" >&2
    exit 1
fi

OLD_SPEC="$1"
NEW_SPEC="$2"
OUTPUT_DIR="$3"

if [ ! -f "$OLD_SPEC" ]; then
    echo "analyze_spec: OLD_SPEC not found: $OLD_SPEC" >&2
    exit 1
fi
if [ ! -f "$NEW_SPEC" ]; then
    echo "analyze_spec: NEW_SPEC not found: $NEW_SPEC" >&2
    exit 1
fi

if ! command -v oasdiff >/dev/null 2>&1; then
    echo "analyze_spec: oasdiff is required but not installed. See https://www.oasdiff.com/" >&2
    exit 2
fi

mkdir -p "$OUTPUT_DIR"
OUTPUT_DIR="$(cd "$OUTPUT_DIR" && pwd)"

# Mirror classify_semver.sh — suppress scope-related noise via the shared
# severity-levels file when present.
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SEVERITY_FILE="$SCRIPT_DIR/oasdiff-severity-levels.txt"
SEVERITY_FLAG=()
if [ -f "$SEVERITY_FILE" ]; then
    SEVERITY_FLAG=(--severity-levels "$SEVERITY_FILE")
fi

# --- Breaking ---------------------------------------------------------------
# `oasdiff breaking --fail-on ERR`: 0 = no breaking, 1 = breaking found,
# >1 = oasdiff itself errored. We capture stderr (the report) and the exit
# code; we do NOT propagate exit 1 — that's data, not a failure.
BREAKING_EXIT=0
oasdiff breaking --fail-on ERR "${SEVERITY_FLAG[@]}" "$OLD_SPEC" "$NEW_SPEC" \
    >"$OUTPUT_DIR/breaking-output.txt" 2>&1 || BREAKING_EXIT=$?

if [ "$BREAKING_EXIT" -gt 1 ]; then
    echo "analyze_spec: oasdiff breaking failed (exit $BREAKING_EXIT)" >&2
    cat "$OUTPUT_DIR/breaking-output.txt" >&2
    exit 2
fi
echo "$BREAKING_EXIT" >"$OUTPUT_DIR/breaking-exit"

# --- Changelog (JSON) -------------------------------------------------------
# JSON feeds classify_semver.sh via its --changelog-json flag.
oasdiff changelog -f json "${SEVERITY_FLAG[@]}" "$OLD_SPEC" "$NEW_SPEC" \
    >"$OUTPUT_DIR/changelog.json" 2>"$OUTPUT_DIR/changelog-stderr.log" || {
    echo "analyze_spec: oasdiff changelog (json) failed" >&2
    cat "$OUTPUT_DIR/changelog-stderr.log" >&2
    exit 2
}

# --- Changelog (markdown) ---------------------------------------------------
# Markdown is what we paste into the PR body.
oasdiff changelog -f markdown "${SEVERITY_FLAG[@]}" "$OLD_SPEC" "$NEW_SPEC" \
    >"$OUTPUT_DIR/changelog.md" 2>>"$OUTPUT_DIR/changelog-stderr.log" || {
    echo "analyze_spec: oasdiff changelog (markdown) failed" >&2
    cat "$OUTPUT_DIR/changelog-stderr.log" >&2
    exit 2
}

echo "$OUTPUT_DIR"
