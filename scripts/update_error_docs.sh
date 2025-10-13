#!/bin/bash

# Script to update the error documentation

# Change to the project root directory
cd "$(dirname "$0")/.."

# Make sure dependencies are installed
if [ ! -d "vendor" ]; then
  echo "Installing dependencies..."
  composer install
  # Run composer update to make sure lock file is up to date
  composer update
fi

# Run the PHP script to generate the error documentation
php scripts/generate_error_docs.php

# Run the PHP script to generate the exception classes and their documentation
php scripts/generate_exceptions.php

echo "Documentation update complete!"
echo "- Generated Exceptions.md"
echo "- Generated exception classes in lib/Exceptions/"
echo "- Generated exception documentation in docs/Exceptions/Classes/"
