# Getting Started with BambooHR PHP SDK

Welcome! This guide will help you make your first BambooHR API call in less than 15 minutes.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Getting Your API Credentials](#getting-your-api-credentials)
4. [Your First API Call](#your-first-api-call)
5. [Understanding Responses](#understanding-responses)
6. [Common Gotchas](#common-gotchas)
7. [Next Steps](#next-steps)

---

## Prerequisites

Before you begin, make sure you have:

### 1. PHP 8.1 or Higher

Check your PHP version:

```bash
php -v
```

You should see something like:

```
PHP 8.1.x (cli) ...
```

If your version is lower than 8.1, you'll need to upgrade PHP.

**Need to upgrade PHP?**

```bash
# macOS (using Homebrew)
brew install php@8.1

# Ubuntu/Debian
sudo apt-get install php8.1

# Windows
# Download from https://windows.php.net/download/
```

### 2. Composer Installed

Composer is PHP's dependency manager. Check if you have it:

```bash
composer --version
```

**Don't have Composer?** Install it from [getcomposer.org](https://getcomposer.org/download/)

### 3. BambooHR Account

You need a BambooHR account with API access. If you're not sure, check with your BambooHR administrator.

---

## Installation

Install the SDK using Composer:

```bash
composer require bamboohr/api
```

This will download the SDK and all its dependencies.

### Verify Installation

Check that the package was installed:

```bash
composer show bamboohr/api
```

You should see:

```
name     : bamboohr/api
descrip. : BambooHR API documentation...
versions : * 2.0.1
```

### Set Up Autoloading

In your PHP file, include the Composer autoloader:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
```

That's it! The SDK is now installed and ready to use.

---

## Getting Your API Credentials

You'll need two things to make API calls:

1. **Your Company Subdomain** - The part before `.bamboohr.com` in your BambooHR URL

   - Example: If your URL is `acme.bamboohr.com`, your subdomain is `acme`

2. **Your API Key** - A secret token that authenticates your requests

### How to Get Your API Key

1. Log in to BambooHR
2. Click your profile → **API Keys**
3. Click **Add New Key**
4. Give it a descriptive name
5. Click **Generate Key**
6. **Copy the key immediately** (you won't see it again!)

### Store Credentials Securely

**❌ Never hardcode credentials in your code:**

```php
// DON'T DO THIS!
$apiKey = 'abc123';  // Bad!
```

**✅ Use environment variables:**

```bash
# In your .env file or shell
export BAMBOO_API_KEY="your_api_key_here"
export BAMBOO_COMPANY="your_company_subdomain"
```

```php
// In your PHP code
$apiKey = $_ENV['BAMBOO_API_KEY'] ?? getenv('BAMBOO_API_KEY');
$company = $_ENV['BAMBOO_COMPANY'] ?? getenv('BAMBOO_COMPANY');
```

---

## Your First API Call

Let's fetch your company's employee directory. This is a simple read-only operation that's perfect for testing.

### Complete Example

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;
use BhrSdk\Exceptions\PermissionDeniedException;
use BhrSdk\Exceptions\RateLimitExceededException;

// Get credentials from environment variables
$apiKey = getenv('BAMBOO_API_KEY');
$company = getenv('BAMBOO_COMPANY');

// Step 1: Create the API client
$client = (new ApiClient())
    ->withApiKey($apiKey)
    ->forCompany($company)
    ->build();

try {
    // Step 2: Get the Employees API
    $employeesApi = $client->employees();

    // Step 3: Make the API call
    $directory = $employeesApi->getEmployeesDirectory();

    // Step 4: Process the response
    $employees = $directory['employees'] ?? [];
    echo "Found " . count($employees) . " employees\n";

    foreach ($employees as $employee) {
        $name = $employee['displayName'] ?? 'Unknown';
        echo "  • {$name}\n";
    }

} catch (AuthenticationFailedException $e) {
    // Specific exception for 401 errors with helpful debugging tips
    echo "Authentication Failed!\n";
    echo "Message: " . $e->getMessage() . "\n\n";

    echo "Potential Causes:\n";
    foreach ($e->getPotentialCauses() as $cause) {
        echo "  • {$cause}\n";
    }

} catch (PermissionDeniedException $e) {
    // Specific exception for 403 errors
    echo "Permission Denied!\n";
    echo "Your API key doesn't have permission for this action.\n";
    echo "Tip: Check your API key permissions in BambooHR settings.\n";

} catch (RateLimitExceededException $e) {
    // Specific exception for 429 errors
    echo "Rate Limit Exceeded!\n";
    echo "You've made too many requests. Please wait and try again.\n";
    echo "Tip: Use \$client->withRetries(3) for automatic retry with backoff.\n";

} catch (ApiException $e) {
    // Generic fallback for other errors
    echo "API Error: " . $e->getMessage() . "\n";
    echo "Status Code: " . $e->getCode() . "\n";
}
```

### Run Your Code

```bash
# Set your credentials first
export BAMBOO_API_KEY="your_key_here"
export BAMBOO_COMPANY="your_company"

# Run the script
php your_first_api_call.php
```

### What Just Happened?

1. **Created a client** - The `ApiClient` handles authentication and requests
2. **Got the API** - `$client->employees()` gives you access to employee operations
3. **Made the call** - `getEmployeesDirectory()` fetches the employee list
4. **Handled the response** - Used array access to get the employee data
5. **Caught specific errors** - Each exception type provides helpful debugging methods:
   - `AuthenticationFailedException` - Includes `getPotentialCauses()` and `getDebuggingTips()`
   - `PermissionDeniedException` - Provides permission-specific guidance
   - `RateLimitExceededException` - Includes retry recommendations
   - `ApiException` - Generic fallback with full error context

---

## Understanding Responses

### Return Types Matter

**Important:** Most SDK methods return **arrays**, not objects. Use array access:

```php
// ✅ CORRECT - Use array access
$employee = $api->getEmployee('firstName,lastName', '123');
echo $employee['firstName'];  // ← Array access with ['key']

// ❌ WRONG - Don't use object methods
echo $employee->getFirstName();  // ← This will cause a fatal error!
```

### Getting Specific Employee Data

To get a specific employee's information:

```php
// Important: Fields parameter comes FIRST, then employee ID
$employee = $employeesApi->getEmployee(
    'firstName,lastName,workEmail,jobTitle,department',  // ← Fields to retrieve
    '123'                                                 // ← Employee ID
);

// Access the data using array syntax
echo "Name: {$employee['firstName']} {$employee['lastName']}\n";
echo "Email: {$employee['workEmail']}\n";
echo "Title: {$employee['jobTitle']}\n";
echo "Department: {$employee['department']}\n";
```

### Available Fields

Common fields you can request:

- **Basic:** `firstName`, `lastName`, `displayName`
- **Contact:** `workEmail`, `workPhone`, `mobilePhone`
- **Job:** `jobTitle`, `department`, `division`, `location`
- **Employment:** `hireDate`, `employmentStatus`, `employeeNumber`
- **Personal:** `dateOfBirth`, `address1`, `city`, `state`, `zipcode`

**Pro tip:** Only request the fields you need - this makes API calls faster and uses less bandwidth.

### Handling Missing Data

Not all employees have all fields. Handle missing data gracefully:

```php
$employee = $employeesApi->getEmployee('firstName,mobilePhone', '123');

// Use null coalescing operator for safe access
$name = $employee['firstName'] ?? 'Unknown';
$phone = $employee['mobilePhone'] ?? 'No phone on file';

echo "Name: {$name}\n";
echo "Mobile: {$phone}\n";
```

---

## Common Gotchas

### 1. Array Access vs Object Methods

Methods typically return **arrays**, not objects:

```php
// ✅ CORRECT
$name = $employee['firstName'];

// ❌ WRONG
$name = $employee->getFirstName();
```

### 2. Environment Variables

Always use environment variables for credentials:

```php
// ✅ CORRECT
$apiKey = getenv('BAMBOO_API_KEY');

// ❌ WRONG - security risk!
$apiKey = 'hardcoded_key_123';
```

### 3. Error Handling

Use **specific exception types** for better error handling:

```php
use BhrSdk\Exceptions\AuthenticationFailedException;
use BhrSdk\Exceptions\PermissionDeniedException;
use BhrSdk\ApiException;

try {
    $result = $api->someMethod();

} catch (AuthenticationFailedException $e) {
    // Get automatic debugging help
    foreach ($e->getPotentialCauses() as $cause) {
        echo "• {$cause}\n";
    }

} catch (PermissionDeniedException $e) {
    echo "Permission denied: " . $e->getMessage();

} catch (ApiException $e) {
    // Generic fallback
    echo "Error: " . $e->getMessage();
}
```

### 4. Rate Limiting

BambooHR has rate limits. If you get a 429 error:

```php
use BhrSdk\Exceptions\RateLimitExceededException;

try {
    $result = $api->someMethod();
} catch (RateLimitExceededException $e) {
    $headers = $e->getResponseHeaders();
    $retryAfter = $headers['Retry-After'][0] ?? 60;

    echo "Rate limited. Retry after {$retryAfter} seconds\n";
    sleep($retryAfter);

    // Retry the request
    $result = $api->someMethod();
}
```

---

## Next Steps

### Learn More Topics

Now that you've made your first API call, explore these topics:

#### 1. Authentication Options

- **API Key** (what you just used) - Simple, for single-account access
- **OAuth** - More complex, for multi-user applications

**→ See [AUTHENTICATION.md](AUTHENTICATION.md) for detailed OAuth guide**

#### 2. Common Use Cases

Learn how to:

- Update employee information
- Manage time off requests
- Upload and download files
- Generate reports
- Set up webhooks

**→ See [COMMON_USE_CASES.md](COMMON_USE_CASES.md) for practical examples**

#### 3. Error Handling

Learn about:

- Specific exception types
- Retry strategies
- Graceful degradation
- Error logging

**→ See [examples/03_error_handling_migration.php](examples/03_error_handling_migration.php)**

#### 4. Explore Example Files

The `examples/` directory has complete, runnable examples:

- `01_basic_api_key_migration.php` - API key basics
- `02_oauth_with_auto_refresh.php` - OAuth with token refresh
- `03_error_handling_migration.php` - Comprehensive error handling
- `04_common_api_patterns.php` - Common API operations
- `05_complete_application_migration.php` - Full application example
- `06_testing_patterns.php` - Testing strategies
- `07_first_api_call.php` - Simplest possible example
- `08_oauth_complete_flow.php` - Complete OAuth flow

### Resources

- **API Documentation:** https://documentation.bamboohr.com/docs/getting-started
- **SDK Repository:** https://github.com/BambooHR/bhr-api-php
- **Get Support:** https://documentation.bamboohr.com/docs/api-support
- **Migration Guide:** If you're migrating from v1, see [MIGRATION.md](MIGRATION.md)

### Troubleshooting

The SDK provides **specific exception types** that automatically include debugging help:

**Authentication Error (401)** - `AuthenticationFailedException`

```php
catch (AuthenticationFailedException $e) {
    // Exception includes getPotentialCauses() and getDebuggingTips()
    foreach ($e->getPotentialCauses() as $cause) {
        echo "• {$cause}\n";
    }
}
```

**Permission Denied (403)** - `PermissionDeniedException`

- Your API key may not have permission for this operation
- Check API key permissions in BambooHR settings
- Use `$e->getPotentialCauses()` for specific guidance

**Not Found (404)** - `ResourceNotFoundException`

- Verify the employee ID exists
- Check your company subdomain is correct

**Rate Limited (429)** - `RateLimitExceededException`

- You're making too many requests
- Wait a few minutes and try again
- Use built-in retry: `$client->withRetries(3)`
- Implement exponential backoff

**Connection Errors?**

- Check your internet connection
- Verify BambooHR API is operational
- Check for firewall issues

**💡 Tip:** All specific exceptions provide `getPotentialCauses()` and `getDebuggingTips()` methods for better error messages!

---

## Quick Reference

### Create Client (API Key)

```php
$client = (new ApiClient())
    ->withApiKey($apiKey)
    ->forCompany($company)
    ->build();
```

### Get Employee Directory

```php
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();
$employees = $directory['employees'] ?? [];
```

### Get Specific Employee

```php
// Fields FIRST, then ID
$employee = $employeesApi->getEmployee('firstName,lastName,workEmail', '123');
echo $employee['firstName'];  // Use array access
```

### Handle Errors

```php
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;
use BhrSdk\Exceptions\RateLimitExceededException;

try {
    $result = $api->someMethod();

} catch (AuthenticationFailedException $e) {
    // Specific exception with helpful methods
    foreach ($e->getPotentialCauses() as $cause) {
        echo "• {$cause}\n";
    }

} catch (RateLimitExceededException $e) {
    // Rate limit - consider retry
    echo "Rate limited. Use \$client->withRetries(3)\n";

} catch (ApiException $e) {
    // Generic fallback
    echo "Error [{$e->getCode()}]: {$e->getMessage()}\n";
}
```

### Common APIs

```php
$client->employees()           // Employee operations
$client->timeOff()             // Time off management
$client->reports()             // Report generation
$client->photos()              // Employee photos
$client->webhooks()            // Webhook management
$client->training()            // Training records
$client->benefits()            // Benefits information
```

---

## Need Help?

- **Questions?** Check the [examples/](examples/) directory
- **Issues?** Report on [GitHub Issues](https://github.com/BambooHR/bhr-api-php/issues)
- **API Support:** https://documentation.bamboohr.com/docs/api-support
- **Migrating from v1?** See [MIGRATION.md](MIGRATION.md)

---

**Congratulations!** 🎉 You've successfully made your first BambooHR API call. Keep exploring and building great integrations!
