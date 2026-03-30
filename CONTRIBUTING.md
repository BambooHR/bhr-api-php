# Contributing to the BambooHR PHP SDK

Thank you for your interest in contributing! By submitting a pull request, you agree that your contributions will be licensed under the [MIT License](LICENSE) that covers this project.

## Bug Reports and Feature Requests

Please use the [issue tracker](https://github.com/BambooHR/bhr-api-php/issues) to report bugs or request features.

## How to contribute

1. Open an issue first to discuss significant changes.
2. Fork the repository and create a feature branch.
3. Make your changes, keeping pull requests focused on a single topic.
4. Follow the existing code style and conventions.
5. Add or update tests for any new or changed functionality.
6. If updating the README, update the corresponding mustache template in `templates-php/` and run `make generate` to regenerate.
7. Ensure all tests and checks pass before submitting:

```bash
# Install dependencies
composer install

# Run the test suite
make test

# Run specific tests
vendor/bin/phpunit tests/path/to/TestFile.php
vendor/bin/phpunit --filter=testMethodName

# Check code style
make phpcs

# Run static analysis
make phpstan
```

8. Open a pull request with a clear description of the change.

## Terms

Use of the BambooHR API is subject to the [BambooHR Developer Terms of Service](https://www.bamboohr.com/legal/developer-terms-of-service).
