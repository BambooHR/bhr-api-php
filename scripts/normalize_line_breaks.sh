#!/bin/bash

# This script normalizes line breaks in PHP files,
# replacing multiple consecutive empty lines with a single line break
# Usage: ./normalize_line_breaks.sh [directory1] [directory2] ...

# Function to process a file using awk
process_file() {
  local file=$1
  
  # Try awk first - it's reliable across platforms
  if command -v awk &> /dev/null; then
    # Create a temporary file
    local tmp_file=$(mktemp)
    
    # This awk command processes the entire file at once
    # It collapses multiple blank lines into a single blank line
    awk 'NF {blank=0; print} !NF {blank++; if (blank==1) print}' "$file" > "$tmp_file"
    
    # Replace the original file with the processed one
    mv "$tmp_file" "$file"
    return 0
  fi
  
  echo "Error: awk is not available"
  return 1
}

echo "Line break normalization started..."

# Check if xargs supports parallel processing
HAS_PARALLEL=0
if xargs --help 2>&1 | grep -q -- '-P'; then
  HAS_PARALLEL=1
fi

# Process arguments - can be files or directories
for path in "$@"; do
  if [[ -d "$path" ]]; then
    # If it's a directory, find all PHP files and process them
    echo "- Processing directory: $path"
    
    # Use parallel processing if available
    if [[ $HAS_PARALLEL -eq 1 ]]; then
      echo " - Using parallel processing"
      # Export the function so it's available to subshells
      export -f process_file
      # Process up to 8 files simultaneously without verbose output
      find "$path" -name "*.php" -type f -print0 | xargs -0 -P 8 -I{} bash -c "process_file '{}'" - /dev/null
    else
      echo " - Using sequential processing"
      # Sequential processing as fallback
      find "$path" -name "*.php" -type f | while read -r file; do
        process_file "$file"
      done
    fi
  elif [[ -f "$path" ]]; then
    echo "- Processing file: $path"
    # If it's a file, process it directly
    process_file "$path"
  else
    echo "- Warning: $path is not a valid file or directory"
  fi
done

echo "Line break normalization complete!"
