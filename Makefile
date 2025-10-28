# Makefile for BambooHR API PHP SDK

# Default OpenAPI spec path - you can override this with an environment variable
OPENAPI_SPEC_PATH ?= $(shell echo ~/repos/main/publicOpenapi.yaml)

# Set default PHP version
PHP_VERSION ?= 8.1

# Package information
PACKAGE_NAME = BhrSdk
PACKAGE_VERSION = 2.0.0
PACKAGE_URL = https://www.bamboohr.com/
DEVELOPER_URL = https://github.com/BambooHR/bhr-api-php
COMPOSER_PACKAGE_NAME = bamboohr/api

.PHONY: help generate clean cleanup-obsolete test phpstan

help:
	@echo "BambooHR API PHP SDK - Available commands:"
	@echo "  make generate          - Generate SDK code from OpenAPI spec"
	@echo "  make generate OPENAPI_SPEC_PATH=/path/to/spec.yaml - Generate using a custom spec path"
	@echo "  make clean             - Remove generated files"
	@echo "  make cleanup-obsolete  - Manually run cleanup of obsolete files"
	@echo "  make test              - Run tests"
	@echo "  make phpcs             - Run PHP Code Sniffer"
	@echo "  make phpstan           - Run PHPStan static analysis"

generate:
	@echo "Generating PHP SDK from OpenAPI spec at $(OPENAPI_SPEC_PATH)..."
	@if [ ! -f "$(OPENAPI_SPEC_PATH)" ]; then \
		echo "Error: OpenAPI spec file not found at $(OPENAPI_SPEC_PATH)"; \
		echo "Please specify the correct path with OPENAPI_SPEC_PATH=/path/to/spec.yaml"; \
		exit 1; \
	fi
	@# Backup the current FILES manifest for cleanup comparison
	@if [ -f ".openapi-generator/FILES" ]; then \
		cp .openapi-generator/FILES .openapi-generator/FILES.old; \
	fi
	openapi-generator generate \
		-i $(OPENAPI_SPEC_PATH) \
		-g php \
		-t ./templates-php \
		--additional-properties=invokerPackage=$(PACKAGE_NAME),artifactUrl=$(PACKAGE_URL),developerOrganizationUrl=$(DEVELOPER_URL),artifactVersion=$(PACKAGE_VERSION),composerPackageName=$(COMPOSER_PACKAGE_NAME) \
		&& sed -i '' '/\*PublicAPIApi\*/d' README.md \
		&& sed -i '' '/PublicAPIApi/d' ./.openapi-generator/FILES \
		&& rm -f lib/Api/PublicAPIApi.php test/Api/PublicAPIApiTest.php \
		&& ./scripts/normalize_line_breaks.sh ./lib ./test \
		&& ./scripts/update_error_docs.sh \
		&& ./scripts/add_custom_headers_to_api_docs.sh \
		&& ./scripts/cleanup_obsolete_files.sh --force
	@echo "SDK generation complete!"

generate-error-docs:
	@echo "Generating error documentation..."
	./scripts/update_error_docs.sh
	@echo "Error documentation generated!"

cleanup-obsolete:
	@echo "Running cleanup of obsolete files..."
	./scripts/cleanup_obsolete_files.sh
	@echo "Cleanup complete!"

clean:
	@echo "Cleaning generated files..."
	rm -rf lib docs test .openapi-generator
	@echo "Clean complete!"

test:
	@echo "Running tests..."
	./vendor/bin/phpunit
	@echo "Tests complete!"

phpcs:
	@echo "Running PHP Code Sniffer..."
	./vendor/bin/phpcs --standard=phpcs.xml lib
	@echo "PHP Code Sniffer complete!"

phpstan:
	@echo "Running PHPStan..."
	./vendor/bin/phpstan analyse --memory-limit=1024M
	@echo "PHPStan complete!"