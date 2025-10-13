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

# Run the PHP script to generate the documentation
php scripts/generate_error_docs.php

echo "Documentation update complete for HttpStatusCodes.md!"
