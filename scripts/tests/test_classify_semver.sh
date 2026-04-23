#!/usr/bin/env bash
set -eo pipefail

# Unit tests for scripts/classify_semver.sh
# Covers each classification path and edge cases.
# Runs without oasdiff by using --changelog-json and --breaking-exit fixtures.

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ROOT_DIR="$(cd "$SCRIPT_DIR/../.." && pwd)"
CLASSIFY="$ROOT_DIR/scripts/classify_semver.sh"
FIXTURES="$SCRIPT_DIR/fixtures"

PASS=0
FAIL=0

# --- Test Helpers ---

assert_bump_level() {
    local test_name="$1"
    local expected_level="$2"
    local actual_output="$3"
    local actual_level
    actual_level="$(echo "$actual_output" | head -1)"

    if [[ "$actual_level" == "$expected_level" ]]; then
        echo "  PASS: $test_name"
        PASS=$((PASS + 1))
    else
        echo "  FAIL: $test_name"
        echo "    Expected bump level: $expected_level"
        echo "    Actual bump level:   $actual_level"
        echo "    Full output:"
        echo "$actual_output" | sed 's/^/      /'
        FAIL=$((FAIL + 1))
    fi
}

assert_output_contains() {
    local test_name="$1"
    local expected_substr="$2"
    local actual_output="$3"

    if echo "$actual_output" | grep -qF "$expected_substr"; then
        echo "  PASS: $test_name"
        PASS=$((PASS + 1))
    else
        echo "  FAIL: $test_name"
        echo "    Expected output to contain: $expected_substr"
        echo "    Full output:"
        echo "$actual_output" | sed 's/^/      /'
        FAIL=$((FAIL + 1))
    fi
}

run_classify() {
    local changelog_file="$1"
    local breaking_exit="$2"
    shift 2
    bash "$CLASSIFY" --changelog-json "$changelog_file" --breaking-exit "$breaking_exit" "$@"
}

# --- Classification Tests ---

echo ""
echo "=== Classification Tests ==="

# No changes → none
OUTPUT="$(run_classify "$FIXTURES/empty.json" 0)"
assert_bump_level "empty changelog → none" "none" "$OUTPUT"

# Breaking change (oasdiff exit code 1) → major
OUTPUT="$(run_classify "$FIXTURES/empty.json" 1)"
assert_bump_level "breaking exit code 1 → major" "major" "$OUTPUT"

# Breaking change in JSON (level 3) with exit code 1 → major
OUTPUT="$(run_classify "$FIXTURES/breaking.json" 1)"
assert_bump_level "breaking JSON + exit code 1 → major" "major" "$OUTPUT"
assert_output_contains "breaking JSON reason mentions change ID" "api-path-removed-without-deprecation" "$OUTPUT"

# Breaking change in JSON (level 3) with exit code 0 → still major (safety net)
OUTPUT="$(run_classify "$FIXTURES/breaking.json" 0)"
assert_bump_level "ERR-level JSON with exit 0 → major (safety net)" "major" "$OUTPUT"

# Additive change → minor
OUTPUT="$(run_classify "$FIXTURES/additive.json" 0)"
assert_bump_level "additive changes → minor" "minor" "$OUTPUT"
assert_output_contains "additive reason mentions change ID" "endpoint-added" "$OUTPUT"

# Metadata-only change → patch
OUTPUT="$(run_classify "$FIXTURES/metadata.json" 0)"
assert_bump_level "metadata-only changes → patch" "patch" "$OUTPUT"
assert_output_contains "metadata reason mentions change ID" "endpoint-deprecated" "$OUTPUT"

# Mixed additive + metadata → minor (additive wins)
OUTPUT="$(run_classify "$FIXTURES/mixed_additive_and_metadata.json" 0)"
assert_bump_level "mixed additive + metadata → minor" "minor" "$OUTPUT"
assert_output_contains "mixed: additive change ID present in reason" "endpoint-added" "$OUTPUT"
assert_output_contains "mixed: metadata change ID present in reason" "endpoint-deprecated" "$OUTPUT"

# WARN-level change → minor
OUTPUT="$(run_classify "$FIXTURES/warn_level.json" 0)"
assert_bump_level "WARN-level change → minor" "minor" "$OUTPUT"

# Noise only → none (noise is filtered before classification)
OUTPUT="$(run_classify "$FIXTURES/noise_only.json" 0)"
assert_bump_level "noise-only changelog → none" "none" "$OUTPUT"

# Breaking takes priority over additive in combined JSON
COMBINED="$(jq -s '.[0] + .[1]' "$FIXTURES/additive.json" "$FIXTURES/breaking.json")"
COMBINED_FILE="$(mktemp /tmp/test_combined_XXXXXX.json)"
echo "$COMBINED" > "$COMBINED_FILE"
OUTPUT="$(run_classify "$COMBINED_FILE" 1)"
assert_bump_level "breaking + additive combined → major" "major" "$OUTPUT"
rm -f "$COMBINED_FILE"

echo ""
echo "=== --apply Tests (composer.json) ==="

# --apply on minor bump updates composer.json
TMPDIR_APPLY="$(mktemp -d /tmp/test_apply_XXXXXX)"
cat > "$TMPDIR_APPLY/composer.json" <<'EOF'
{
    "name": "bamboohr/api",
    "version": "1.2.3",
    "description": "BambooHR PHP SDK"
}
EOF

OUTPUT="$(run_classify "$FIXTURES/additive.json" 0 --apply --version-file "$TMPDIR_APPLY/composer.json")"
assert_bump_level "--apply minor → still outputs minor" "minor" "$OUTPUT"
assert_output_contains "--apply minor bumps minor version" "Bumped version from 1.2.3 to 1.3.0" "$OUTPUT"
NEW_VER="$(jq -r '.version' "$TMPDIR_APPLY/composer.json")"
if [[ "$NEW_VER" == "1.3.0" ]]; then
    echo "  PASS: --apply minor writes 1.3.0 to composer.json"
    PASS=$((PASS + 1))
else
    echo "  FAIL: --apply minor expected 1.3.0 in composer.json, got: $NEW_VER"
    FAIL=$((FAIL + 1))
fi

# --apply on patch bump updates composer.json
cat > "$TMPDIR_APPLY/composer.json" <<'EOF'
{
    "name": "bamboohr/api",
    "version": "2.0.0",
    "description": "BambooHR PHP SDK"
}
EOF

OUTPUT="$(run_classify "$FIXTURES/metadata.json" 0 --apply --version-file "$TMPDIR_APPLY/composer.json")"
assert_bump_level "--apply patch → still outputs patch" "patch" "$OUTPUT"
assert_output_contains "--apply patch bumps patch version" "Bumped version from 2.0.0 to 2.0.1" "$OUTPUT"
NEW_VER="$(jq -r '.version' "$TMPDIR_APPLY/composer.json")"
if [[ "$NEW_VER" == "2.0.1" ]]; then
    echo "  PASS: --apply patch writes 2.0.1 to composer.json"
    PASS=$((PASS + 1))
else
    echo "  FAIL: --apply patch expected 2.0.1 in composer.json, got: $NEW_VER"
    FAIL=$((FAIL + 1))
fi

# --apply on major bumps to next major version
cat > "$TMPDIR_APPLY/composer.json" <<'EOF'
{
    "name": "bamboohr/api",
    "version": "1.0.0",
    "description": "BambooHR PHP SDK"
}
EOF

OUTPUT="$(run_classify "$FIXTURES/breaking.json" 1 --apply --version-file "$TMPDIR_APPLY/composer.json")"
assert_bump_level "--apply major → still outputs major" "major" "$OUTPUT"
assert_output_contains "--apply major bumps major version" "Bumped version from 1.0.0 to 2.0.0" "$OUTPUT"
NEW_VER="$(jq -r '.version' "$TMPDIR_APPLY/composer.json")"
if [[ "$NEW_VER" == "2.0.0" ]]; then
    echo "  PASS: --apply major writes 2.0.0 to composer.json"
    PASS=$((PASS + 1))
else
    echo "  FAIL: --apply major expected 2.0.0 in composer.json, got: $NEW_VER"
    FAIL=$((FAIL + 1))
fi

# --apply on none does NOT modify file
cat > "$TMPDIR_APPLY/composer.json" <<'EOF'
{
    "name": "bamboohr/api",
    "version": "3.1.4",
    "description": "BambooHR PHP SDK"
}
EOF

run_classify "$FIXTURES/empty.json" 0 --apply --version-file "$TMPDIR_APPLY/composer.json" > /dev/null
UNCHANGED_VER="$(jq -r '.version' "$TMPDIR_APPLY/composer.json")"
if [[ "$UNCHANGED_VER" == "3.1.4" ]]; then
    echo "  PASS: --apply none does not modify composer.json"
    PASS=$((PASS + 1))
else
    echo "  FAIL: --apply none should not modify composer.json, got: $UNCHANGED_VER"
    FAIL=$((FAIL + 1))
fi

rm -rf "$TMPDIR_APPLY"

echo ""
echo "=== Error Handling Tests ==="

# Missing --breaking-exit with --changelog-json
if bash "$CLASSIFY" --changelog-json "$FIXTURES/empty.json" > /dev/null 2>&1; then
    echo "  FAIL: missing --breaking-exit should exit non-zero"
    FAIL=$((FAIL + 1))
else
    echo "  PASS: missing --breaking-exit exits non-zero"
    PASS=$((PASS + 1))
fi

# Non-existent changelog file
if bash "$CLASSIFY" --changelog-json /nonexistent/file.json --breaking-exit 0 > /dev/null 2>&1; then
    echo "  FAIL: non-existent changelog file should exit non-zero"
    FAIL=$((FAIL + 1))
else
    echo "  PASS: non-existent changelog file exits non-zero"
    PASS=$((PASS + 1))
fi

# --- Summary ---
echo ""
echo "================================"
echo "Results: ${PASS} passed, ${FAIL} failed"
echo "================================"

if [[ "$FAIL" -gt 0 ]]; then
    exit 1
fi
