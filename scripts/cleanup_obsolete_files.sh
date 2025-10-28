#!/bin/bash

# cleanup_obsolete_files.sh
# Compares the old FILES manifest with the new one after generation
# and removes files that are no longer generated
#
# Usage:
#   ./cleanup_obsolete_files.sh           # Interactive mode (asks for confirmation)
#   ./cleanup_obsolete_files.sh -f        # Force mode (automatic yes)
#   ./cleanup_obsolete_files.sh --force   # Force mode (automatic yes)

set -e

# Parse command line arguments
FORCE_MODE=false
if [ "$1" = "-f" ] || [ "$1" = "--force" ]; then
    FORCE_MODE=true
fi

FILES_PATH=".openapi-generator/FILES"
OLD_FILES_PATH=".openapi-generator/FILES.old"

# Check if old FILES backup exists
if [ ! -f "$OLD_FILES_PATH" ]; then
    echo "No old FILES manifest found at $OLD_FILES_PATH"
    echo "This is expected on first run. Skipping cleanup."
    exit 0
fi

# Check if new FILES exists
if [ ! -f "$FILES_PATH" ]; then
    echo "Error: New FILES manifest not found at $FILES_PATH"
    echo "Make sure the OpenAPI generator has run successfully."
    exit 1
fi

echo "Comparing old and new FILES manifests..."

# Create temporary files for comparison
TEMP_OLD=$(mktemp)
TEMP_NEW=$(mktemp)

# Sort and clean up the files (remove empty lines)
grep -v '^$' "$OLD_FILES_PATH" | sort > "$TEMP_OLD" || true
grep -v '^$' "$FILES_PATH" | sort > "$TEMP_NEW" || true

# Find files that exist in old but not in new, excluding test directory
OBSOLETE_FILES=$(comm -23 "$TEMP_OLD" "$TEMP_NEW" | grep -v '^test/' || true)

# Clean up temp files
rm -f "$TEMP_OLD" "$TEMP_NEW"

# Count obsolete files (fix for proper integer comparison)
if [ -z "$OBSOLETE_FILES" ]; then
    OBSOLETE_COUNT=0
else
    OBSOLETE_COUNT=$(echo "$OBSOLETE_FILES" | grep -c '^')
fi

if [ "$OBSOLETE_COUNT" -eq 0 ]; then
    echo "No obsolete files found. All files are up to date."
    exit 0
fi

echo "Found $OBSOLETE_COUNT obsolete file(s):"
echo "$OBSOLETE_FILES"
echo ""

# Ask for confirmation before deleting (unless in force mode)
if [ "$FORCE_MODE" = true ]; then
    echo "Force mode enabled. Proceeding with deletion..."
else
    read -p "Do you want to delete these files? (y/N): " -n 1 -r
    echo ""
    
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        echo "Cleanup cancelled."
        exit 0
    fi
fi

# Delete obsolete files
DELETED_COUNT=0
FAILED_COUNT=0

while IFS= read -r file; do
    if [ -z "$file" ]; then
        continue
    fi
    
    if [ -f "$file" ]; then
        echo "Deleting: $file"
        rm -f "$file"
        DELETED_COUNT=$((DELETED_COUNT + 1))
    else
        echo "Skipping (not found): $file"
        FAILED_COUNT=$((FAILED_COUNT + 1))
    fi
done <<< "$OBSOLETE_FILES"

echo ""
echo "Cleanup complete!"
echo "  Deleted: $DELETED_COUNT file(s)"
if [ "$FAILED_COUNT" -gt 0 ]; then
    echo "  Not found: $FAILED_COUNT file(s)"
fi
