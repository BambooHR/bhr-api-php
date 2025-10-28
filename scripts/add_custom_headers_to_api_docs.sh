#!/bin/bash

# Script to add custom content to API documentation files
# This script uses a simple array approach compatible with bash 3.2+

# Change to the project root directory
cd "$(dirname "$0")/.."

# Define modifications as a list of "file_path::content" pairs
# Format: "file_path::content_to_add"
# The :: delimiter separates the file path from the content
doc_modifications=(
	"docs/Api/WebhooksApi.md::Please also refer to this link for notes on security and an explanation of global & permissioned webhooks: https://documentation.bamboohr.com/docs/webhooks"
	# Add more entries here as needed:
	# "docs/Api/AnotherApi.md::Some other custom content"
	# "docs/Api/YetAnotherApi.md::More custom content"
)

# Function to insert content after line 2 (after the title)
insert_at_line() {
	local file="$1"
	local content="$2"
	
	awk -v line="2" -v text="$content" '
		NR==line {print; print ""; print text; print ""; next}
		{print}
	' "$file" > "$file.tmp" && mv "$file.tmp" "$file"
}

# Iterate through the modifications and apply them
for modification in "${doc_modifications[@]}"; do
	# Split on :: delimiter to get file path and content
	file_path="${modification%%::*}"
	content="${modification#*::}"
	
	# Skip if the split didn't work properly
	if [ "$file_path" = "$content" ]; then
		echo "Warning: Invalid format for entry: $modification"
		continue
	fi
	
	# Check if file exists
	if [ ! -f "$file_path" ]; then
		echo "Warning: $file_path not found. Skipping modifications for this file."
		continue
	fi
	
	echo "Processing $file_path..."
	
	# Insert the content
	insert_at_line "$file_path" "$content"
	echo "  ✓ Added content after page title"
	
	echo "Completed modifications for $file_path"
done

echo ""
echo "All documentation modifications completed successfully."
