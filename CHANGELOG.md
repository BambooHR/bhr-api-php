# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Changelog file to track version history

## [2.0.1] - 2025-12-09

### Added

- New `TransformedApiEmployeeGoalDetails` and `TransformedApiEmployeeGoalDetailsGoal` models for Goals API
- New endpoints in `DatasetsApi` for enhanced data querying
- New endpoints in `ApplicantTrackingApi` for improved ATS functionality

### Changed

- Updated API documentation with improved authentication examples
- Improved `Field` and `DataRequest` models with additional properties
- Updated `GoalsApi` with refined endpoint implementations
- Regenerated SDK from latest OpenAPI specifications

### Fixed

- Authentication documentation clarity across all API endpoint docs

## [2.0.0] - 2025-11-28

### Added

- Fluent API client interface for easier configuration and usage
- Convenience methods for accessing commonly used APIs (20+ API classes)
- Secure logging with automatic sensitive data redaction
- OAuth authentication support (recommended)
- OAuth automatic token refresh with `withOAuthRefresh()`
- Token refresh callbacks via `onTokenRefresh()`
- Retry configuration with `withRetries()`
- Configurable retry status codes with `setRetryableStatusCodes()`
- Debug mode with `withDebug()`
- Modern PHP 8.1+ features and type hints
- All public APIs now included (21 API classes covering 100+ endpoints)
- Comprehensive exception hierarchy with specific exception types for each HTTP status code
- Migration guide (MIGRATION.md) with detailed before/after examples
- Six practical migration examples covering common scenarios
- Extensive model classes (160+ data models) with proper type hints
- PHPStan static analysis support
- PHP_CodeSniffer integration for code quality
- Makefile for common development tasks

### Changed

- **BREAKING**: Minimum PHP version requirement increased to 8.1
- **BREAKING**: Namespace changed from `BambooHR\API\` to `BhrSdk\`
- **BREAKING**: Modernized API client architecture with fluent interface (builder pattern)
- **BREAKING**: Method return types changed
- **BREAKING**: Parameter order changes in some methods (e.g., fields before ID)
- Improved error handling and exception types with specific exceptions for each HTTP status code
- Enhanced documentation with comprehensive examples and API endpoint reference
- Updated authentication methods (OAuth now recommended over API keys)
- Better type hints throughout the codebase for improved IDE support

### Deprecated

- Direct configuration object manipulation (use fluent interface instead)
- Old namespace `BambooHR\API\` (use `BhrSdk\` instead)

### Removed

- **BREAKING**: Support for PHP 7.4 and 8.0
- **BREAKING**: Old `BambooAPI` class (replaced by `ApiClient`)
- **BREAKING**: Direct constructor-based configuration
- Legacy exception class `BambooHTTPException` (replaced by specific exception types)

### Fixed

- Improved error messages with detailed debugging information
- Better handling of rate limiting (429) responses
- Consistent response format across all API methods
- Type safety issues with strict typing enabled

### Security

- Automatic masking of sensitive data in logs (API keys, tokens, passwords)
- Improved OAuth token handling

## [1.x.x] - Previous Versions

For changes in version 1.x.x and earlier, please refer to the git commit history.

---

## Version History Links

[Unreleased]: https://github.com/BambooHR/bhr-api-php/compare/v2.0.1...HEAD
[2.0.1]: https://github.com/BambooHR/bhr-api-php/compare/v2.0.0...v2.0.1
[2.0.0]: https://github.com/BambooHR/bhr-api-php/releases/tag/v2.0.0
