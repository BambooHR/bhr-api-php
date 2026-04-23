#!/usr/bin/env bash
set -eo pipefail

# classify_semver.sh - Classify OpenAPI spec changes into semver bump levels
#
# Requires: oasdiff (when running with spec files), jq
#
# Usage:
#   Classify from spec files:
#     classify_semver.sh [OPTIONS] OLD_SPEC NEW_SPEC
#
#   Classify from pre-generated data (for testing):
#     classify_semver.sh --changelog-json FILE --breaking-exit N [OPTIONS]
#
# Options:
#   --apply                  Apply the version bump to the version file
#   --version-file FILE      Version file path (default: auto-detect pyproject.toml or composer.json)
#   --changelog-json FILE    Use pre-generated oasdiff changelog JSON (skips running oasdiff)
#   --breaking-exit N        Override breaking exit code (0 or 1); required with --changelog-json
#
# Output (stdout):
#   Line 1: bump level — one of: major, minor, patch, none
#   Line 2: Reason: <human-readable classification reasoning>
#
# When --apply is set:
#   Line 3: Bumped version from X.Y.Z to A.B.C in <file>
#
# Exit codes:
#   0  Classification succeeded
#   1  Error (missing dependency, bad arguments, file not found, etc.)

APPLY=false
VERSION_FILE=""
CHANGELOG_JSON_FILE=""
BREAKING_EXIT_OVERRIDE=""
OLD_SPEC=""
NEW_SPEC=""

# --- Argument Parsing ---
while [[ $# -gt 0 ]]; do
    case "$1" in
        --apply)
            APPLY=true; shift ;;
        --version-file)
            VERSION_FILE="$2"; shift 2 ;;
        --changelog-json)
            CHANGELOG_JSON_FILE="$2"; shift 2 ;;
        --breaking-exit)
            BREAKING_EXIT_OVERRIDE="$2"; shift 2 ;;
        --help|-h)
            grep '^#' "$0" | head -30 | sed 's/^# \{0,1\}//'
            exit 0 ;;
        -*)
            echo "ERROR: Unknown option: $1" >&2; exit 1 ;;
        *)
            if [[ -z "$OLD_SPEC" ]]; then OLD_SPEC="$1"
            elif [[ -z "$NEW_SPEC" ]]; then NEW_SPEC="$1"
            else echo "ERROR: Unexpected argument: $1" >&2; exit 1
            fi
            shift ;;
    esac
done

# --- Dependency Checks ---
if ! command -v jq &>/dev/null; then
    echo "ERROR: jq is required but not installed. Install via: brew install jq / apt install jq" >&2
    exit 1
fi

# --- Validate Argument Combinations ---
if [[ -n "$CHANGELOG_JSON_FILE" ]]; then
    if [[ -z "$BREAKING_EXIT_OVERRIDE" ]]; then
        echo "ERROR: --breaking-exit is required when using --changelog-json" >&2
        exit 1
    fi
    if [[ -n "$OLD_SPEC" || -n "$NEW_SPEC" ]]; then
        echo "ERROR: Cannot specify spec files together with --changelog-json" >&2
        exit 1
    fi
    if [[ ! -f "$CHANGELOG_JSON_FILE" ]]; then
        echo "ERROR: Changelog JSON file not found: $CHANGELOG_JSON_FILE" >&2
        exit 1
    fi
else
    if ! command -v oasdiff &>/dev/null; then
        echo "ERROR: oasdiff is required but not installed. See https://www.oasdiff.com/" >&2
        exit 1
    fi
    if [[ -z "$OLD_SPEC" || -z "$NEW_SPEC" ]]; then
        echo "ERROR: OLD_SPEC and NEW_SPEC arguments are required" >&2
        exit 1
    fi
    if [[ ! -f "$OLD_SPEC" ]]; then
        echo "ERROR: Old spec file not found: $OLD_SPEC" >&2; exit 1
    fi
    if [[ ! -f "$NEW_SPEC" ]]; then
        echo "ERROR: New spec file not found: $NEW_SPEC" >&2; exit 1
    fi
fi

# --- Severity Levels File ---
# Suppress scope-related checks natively via oasdiff --severity-levels.
# This file lives alongside this script and sets scope change IDs to "none".
SEVERITY_LEVELS_FILE="$(dirname "$0")/oasdiff-severity-levels.txt"
SEVERITY_LEVELS_FLAG=()
if [[ -f "$SEVERITY_LEVELS_FILE" ]]; then
    SEVERITY_LEVELS_FLAG=(--severity-levels "$SEVERITY_LEVELS_FILE")
fi

# --- Change ID Categories ---
# Additive changes introduce new capabilities and warrant a minor bump.
# IDs verified against: oasdiff checks (v1.14.0)
# Note: ERR-level changes are caught by `oasdiff breaking --fail-on ERR` before this
# list is consulted. WARN-level changes are handled by the WARN block below.
# Unclassified INFO-level changes default to minor (conservative).
ADDITIVE_IDS=(
    # New endpoints
    "endpoint-added"
    "endpoint-reactivated"

    # New optional request parameters / properties
    "new-optional-request-parameter"
    "new-optional-request-property"
    "new-optional-request-default-parameter-to-existing-path"
    "new-required-request-property-with-default"
    "request-body-added-optional"
    "request-parameter-became-optional"
    "request-parameter-reactivated"
    "request-property-became-optional"
    "request-property-reactivated"
    "request-property-became-required-with-default"

    # Request constraint relaxations
    "request-body-became-nullable"
    "request-body-became-optional"
    "request-body-type-generalized"
    "request-body-list-of-types-widened"
    "request-body-min-decreased"
    "request-body-min-length-decreased"
    "request-body-max-increased"
    "request-body-max-length-increased"
    "request-body-any-of-added"
    "request-body-one-of-added"
    "request-body-media-type-added"
    "request-parameter-type-generalized"
    "request-parameter-pattern-generalized"
    "request-parameter-pattern-removed"
    "request-parameter-list-of-types-widened"
    "request-parameter-enum-value-added"
    "request-parameter-max-increased"
    "request-parameter-max-items-increased"
    "request-parameter-max-length-increased"
    "request-parameter-min-decreased"
    "request-parameter-min-items-decreased"
    "request-parameter-min-length-decreased"
    "request-property-became-nullable"
    "request-property-type-generalized"
    "request-property-pattern-generalized"
    "request-property-pattern-removed"
    "request-property-list-of-types-widened"
    "request-property-enum-value-added"
    "request-property-max-increased"
    "request-property-max-length-increased"
    "request-property-min-decreased"
    "request-property-min-length-decreased"
    "request-property-any-of-added"
    "request-property-one-of-added"

    # New response content
    "response-success-status-added"
    "response-non-success-status-added"
    "response-optional-property-added"
    "response-required-property-added"
    "response-optional-write-only-property-added"
    "response-required-write-only-property-added"
    "response-media-type-added"
    "response-property-reactivated"

    # API-level additions
    "api-tag-added"
    "api-operation-id-added"
    "api-global-security-added"
    "api-security-component-added"
)

# Deprecation notices: spec marks something as going away but the SDK still works.
# These warrant only a patch bump. Removals-after-deprecation are also patch because
# they were planned and communicated via prior deprecation.
# Note: oasdiff changelog does NOT report description/summary/title text changes —
# those only appear in `oasdiff diff`. Pure text-change specs produce an empty
# changelog and are classified as "none" (no bump needed).
METADATA_IDS=(
    "endpoint-deprecated"
    "endpoint-deprecated-with-sunset"
    "request-parameter-deprecated"
    "request-parameter-removed-with-deprecation"
    "request-property-deprecated"
    "request-property-deprecated-with-sunset"
    "response-property-deprecated"
    "response-property-deprecated-with-sunset"
    "api-path-removed-with-deprecation"
    "api-removed-with-deprecation"
    "api-tag-removed"
)

# Known noise IDs that appear due to internal spec inconsistencies between scope
# definitions and endpoint security requirements. Filtered before classification.
# The oasdiff-severity-levels.txt file suppresses these natively when running oasdiff
# directly; this list handles the --changelog-json test-mode path.
NOISE_IDS=(
    "api-security-scope-added"
    "api-security-scope-removed"
)

# --- Helper: Check if an ID is in an array ---
contains_id() {
    local needle="$1"; shift
    local id
    for id in "$@"; do
        [[ "$id" == "$needle" ]] && return 0
    done
    return 1
}

# --- Step 1: Gather oasdiff data ---
BREAKING_EXIT=0
CHANGELOG_JSON=""

if [[ -n "$CHANGELOG_JSON_FILE" ]]; then
    BREAKING_EXIT="$BREAKING_EXIT_OVERRIDE"
    CHANGELOG_JSON="$(cat "$CHANGELOG_JSON_FILE")"
else
    oasdiff breaking --fail-on ERR "${SEVERITY_LEVELS_FLAG[@]}" "$OLD_SPEC" "$NEW_SPEC" > /dev/null 2>&1 || BREAKING_EXIT=$?
    CHANGELOG_JSON="$(oasdiff changelog -f json "${SEVERITY_LEVELS_FLAG[@]}" "$OLD_SPEC" "$NEW_SPEC" 2>/dev/null || echo '[]')"
fi

# --- Step 2: Classify ---
BUMP_LEVEL="none"
REASON=""

# Highest priority: breaking changes detected by oasdiff breaking
if [[ "$BREAKING_EXIT" -ne 0 ]]; then
    BUMP_LEVEL="major"
    BREAKING_COUNT="$(echo "$CHANGELOG_JSON" | jq '[.[] | select(.level == 3)] | length')"
    BREAKING_IDS="$(echo "$CHANGELOG_JSON" | jq -r '[.[] | select(.level == 3) | .id] | unique | join(", ")')"
    if [[ -n "$BREAKING_IDS" ]]; then
        REASON="Breaking changes detected. ${BREAKING_COUNT} ERR-level change(s): ${BREAKING_IDS}."
    else
        REASON="Breaking changes detected (oasdiff breaking exit code ${BREAKING_EXIT})."
    fi
else
    # Build a JSON array of non-noise changes using jq
    NOISE_JSON="$(printf '%s\n' "${NOISE_IDS[@]}" | jq -R . | jq -s .)"
    NON_NOISE_JSON="$(echo "$CHANGELOG_JSON" | jq --argjson noise "$NOISE_JSON" \
        '[.[] | select(.id as $id | ($noise | index($id)) == null)]')"
    TOTAL_CHANGES="$(echo "$NON_NOISE_JSON" | jq 'length')"

    if [[ "$TOTAL_CHANGES" -eq 0 ]]; then
        BUMP_LEVEL="none"
        REASON="No meaningful spec changes detected."
    else
        # Safety net: ERR-level changes in changelog that oasdiff breaking didn't catch
        ERR_COUNT="$(echo "$NON_NOISE_JSON" | jq '[.[] | select(.level == 3)] | length')"
        if [[ "$ERR_COUNT" -gt 0 ]]; then
            ERR_IDS="$(echo "$NON_NOISE_JSON" | jq -r '[.[] | select(.level == 3) | .id] | unique | join(", ")')"
            BUMP_LEVEL="major"
            REASON="ERR-level changes in changelog. ${ERR_COUNT} change(s): ${ERR_IDS}."
        else
            # Collect reasons for WARN/INFO changes
            declare -a REASON_PARTS=()

            # WARN-level changes are potentially breaking → minor
            WARN_COUNT="$(echo "$NON_NOISE_JSON" | jq '[.[] | select(.level == 2)] | length')"
            if [[ "$WARN_COUNT" -gt 0 ]]; then
                WARN_IDS="$(echo "$NON_NOISE_JSON" | jq -r '[.[] | select(.level == 2) | .id] | unique | join(", ")')"
                BUMP_LEVEL="minor"
                REASON_PARTS+=("${WARN_COUNT} WARN-level change(s): ${WARN_IDS}")
            fi

            # INFO-level changes: classify each as additive, metadata, or unknown
            INFO_JSON="$(echo "$NON_NOISE_JSON" | jq '[.[] | select(.level == 1)]')"
            INFO_COUNT="$(echo "$INFO_JSON" | jq 'length')"

            if [[ "$INFO_COUNT" -gt 0 ]]; then
                ADDITIVE_COUNT=0
                METADATA_COUNT=0
                UNKNOWN_COUNT=0
                declare -a ADDITIVE_FOUND=()
                declare -a METADATA_FOUND=()
                declare -a UNKNOWN_FOUND=()

                while IFS= read -r change_id; do
                    if contains_id "$change_id" "${ADDITIVE_IDS[@]}"; then
                        ADDITIVE_COUNT=$((ADDITIVE_COUNT + 1))
                        ADDITIVE_FOUND+=("$change_id")
                    elif contains_id "$change_id" "${METADATA_IDS[@]}"; then
                        METADATA_COUNT=$((METADATA_COUNT + 1))
                        METADATA_FOUND+=("$change_id")
                    else
                        UNKNOWN_COUNT=$((UNKNOWN_COUNT + 1))
                        UNKNOWN_FOUND+=("$change_id")
                    fi
                done < <(echo "$INFO_JSON" | jq -r '.[].id')

                if [[ $((ADDITIVE_COUNT + UNKNOWN_COUNT)) -gt 0 ]]; then
                    # Additive or unknown INFO-level changes → minor
                    if [[ "$BUMP_LEVEL" != "major" ]]; then
                        BUMP_LEVEL="minor"
                    fi
                    if [[ "$ADDITIVE_COUNT" -gt 0 ]]; then
                        UNIQUE_ADDITIVE="$(printf '%s\n' "${ADDITIVE_FOUND[@]}" | sort -u | tr '\n' ',' | sed 's/,$//')"
                        REASON_PARTS+=("${ADDITIVE_COUNT} additive change(s): ${UNIQUE_ADDITIVE}")
                    fi
                    if [[ "$UNKNOWN_COUNT" -gt 0 ]]; then
                        UNIQUE_UNKNOWN="$(printf '%s\n' "${UNKNOWN_FOUND[@]}" | sort -u | tr '\n' ',' | sed 's/,$//')"
                        REASON_PARTS+=("${UNKNOWN_COUNT} unclassified INFO change(s) (defaulting to minor): ${UNIQUE_UNKNOWN}")
                    fi
                elif [[ "$METADATA_COUNT" -gt 0 ]]; then
                    # Only metadata changes and no WARN → patch
                    if [[ "$BUMP_LEVEL" == "none" ]]; then
                        BUMP_LEVEL="patch"
                    fi
                    UNIQUE_METADATA="$(printf '%s\n' "${METADATA_FOUND[@]}" | sort -u | tr '\n' ',' | sed 's/,$//')"
                    REASON_PARTS+=("${METADATA_COUNT} metadata-only change(s): ${UNIQUE_METADATA}")
                fi
            fi

            # Build reason string
            if [[ ${#REASON_PARTS[@]} -gt 0 ]]; then
                REASON="$(printf '%s. ' "${REASON_PARTS[@]}")Highest classification: ${BUMP_LEVEL}."
            else
                REASON="Changes present but none required a bump. Level: ${BUMP_LEVEL}."
            fi
        fi
    fi
fi

echo "$BUMP_LEVEL"
echo "Reason: $REASON"

# --- Step 3: Apply version bump (if requested) ---
if [[ "$APPLY" == "true" && "$BUMP_LEVEL" != "none" ]]; then
    # Auto-detect version file
    if [[ -z "$VERSION_FILE" ]]; then
        if [[ -f "pyproject.toml" ]]; then
            VERSION_FILE="pyproject.toml"
        elif [[ -f "composer.json" ]]; then
            VERSION_FILE="composer.json"
        else
            echo "ERROR: Could not find pyproject.toml or composer.json in current directory." >&2
            exit 1
        fi
    fi

    if [[ ! -f "$VERSION_FILE" ]]; then
        echo "ERROR: Version file not found: $VERSION_FILE" >&2
        exit 1
    fi

    # Extract current version
    case "$VERSION_FILE" in
        *.toml)
            CURRENT_VERSION="$(grep -E '^version = "' "$VERSION_FILE" | head -1 | sed 's/version = "\(.*\)"/\1/')"
            ;;
        *.json)
            CURRENT_VERSION="$(jq -r '.version' "$VERSION_FILE")"
            ;;
        *)
            echo "ERROR: Unsupported version file type: $VERSION_FILE (expected .toml or .json)" >&2
            exit 1 ;;
    esac

    if [[ -z "$CURRENT_VERSION" || "$CURRENT_VERSION" == "null" ]]; then
        echo "ERROR: Could not extract version from $VERSION_FILE" >&2
        exit 1
    fi

    # Parse semver components
    IFS='.' read -r V_MAJOR V_MINOR V_PATCH <<< "$CURRENT_VERSION"

    case "$BUMP_LEVEL" in
        major) NEW_VERSION="$((V_MAJOR + 1)).0.0" ;;
        minor) NEW_VERSION="${V_MAJOR}.$((V_MINOR + 1)).0" ;;
        patch) NEW_VERSION="${V_MAJOR}.${V_MINOR}.$((V_PATCH + 1))" ;;
    esac

    # Write new version back to file
    case "$VERSION_FILE" in
        *.toml)
            sed "s/^version = \"${CURRENT_VERSION}\"/version = \"${NEW_VERSION}\"/" \
                "$VERSION_FILE" > "${VERSION_FILE}.tmp"
            mv "${VERSION_FILE}.tmp" "$VERSION_FILE"
            ;;
        *.json)
            jq --arg v "$NEW_VERSION" '.version = $v' "$VERSION_FILE" > "${VERSION_FILE}.tmp"
            mv "${VERSION_FILE}.tmp" "$VERSION_FILE"
            ;;
    esac

    echo "Bumped version from ${CURRENT_VERSION} to ${NEW_VERSION} in ${VERSION_FILE}"
fi
