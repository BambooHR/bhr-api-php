# BambooHR PHP SDK

A modern PHP SDK for the BambooHR API with OAuth support and automatic token refresh.

[![Latest Version](https://img.shields.io/packagist/v/bamboohr/php-sdk.svg)](https://packagist.org/packages/bamboohr/php-sdk)
[![PHP Version](https://img.shields.io/packagist/php-v/bamboohr/php-sdk.svg)](https://packagist.org/packages/bamboohr/php-sdk)
[![License](https://img.shields.io/packagist/l/bamboohr/php-sdk.svg)](https://packagist.org/packages/bamboohr/php-sdk)

## Installation

Install the SDK using Composer:

```bash
composer require bamboohr/php-sdk
```

## Requirements

- PHP 8.1 or higher
- Composer
- GuzzleHTTP 7.x
- PSR-3 compatible logger (optional)

## Authentication

### OAuth

The SDK supports OAuth 2.0 authentication with automatic token refresh.

```php
// Step 1: Initialize with OAuth credentials
$client = (new BambooHRBuilder())
    ->withCompanyDomain('your-company')
    ->withOAuth('client_id', 'client_secret')
    ->build();

// Step 2: Generate authorization URL for user to visit
$authUrl = $client->getAuthorizationUrl([
    'redirect_uri' => 'https://your-app.com/callback',
    'scope' => 'employees:read directory:read',
    'state' => 'random_state_string' // For CSRF protection
]);

// Step 3: After user authorizes and is redirected to your callback URL with a code
$client->authenticate('authorization_code', [
    'code' => 'code_from_callback',
    'redirect_uri' => 'https://your-app.com/callback'
]);

// The client will automatically refresh tokens when needed
```

### Using Existing Access Tokens

If you already have an access token (for example, from another authentication flow or a token storage mechanism), you can use it directly with the SDK using the builder pattern:

```php
// Use the builder with existing tokens
$client = (new BambooHRBuilder())
    ->withCompanyDomain('your-company')
    ->withOAuth(
        'client_id',
        'client_secret',
        'your_existing_access_token',
        'your_refresh_token', // Optional
        $expirationTimestamp  // Optional
    )
    ->build();

// Now you can make API calls without authenticating again
$response = $client->request('GET', 'employees/directory');
```

This approach is useful when:
- You're implementing a token storage mechanism and retrieving tokens from storage
- You're receiving tokens from another authentication flow
- You're using tokens obtained outside the SDK
- You're implementing a custom authentication flow

### Token Storage and Persistence

For production applications, you should store tokens securely between sessions. Here's a pattern for implementing token persistence:

```php
// Save tokens after authentication
function saveTokens($auth) {
    // Get tokens from authentication object
    $accessToken = $auth->getAccessToken();
    $refreshToken = $auth->getRefreshToken();
    $expiresAt = $auth->getExpiresAt();
    
    // Store securely (e.g., in encrypted database, secure storage service)
    // NEVER store tokens in plain text or client-side cookies
    // Example using a secure storage service:
    $storage->secureSet('bamboohr_access_token', $accessToken);
    $storage->secureSet('bamboohr_refresh_token', $refreshToken);
    $storage->secureSet('bamboohr_token_expires', $expiresAt);
}

// Load tokens for a new session
function loadTokens() {
    // Retrieve from secure storage
    $accessToken = $storage->secureGet('bamboohr_access_token');
    $refreshToken = $storage->secureGet('bamboohr_refresh_token');
    $expiresAt = $storage->secureGet('bamboohr_token_expires');
    
    // Create authentication object with stored tokens
    $auth = new \BambooHR\SDK\Authentication\OAuthAuthentication(
        'your_client_id',
        'your_client_secret'
    );
    
    if ($accessToken) {
        $auth->setTokens($accessToken, $refreshToken, $expiresAt);
    }
    
    return $auth;
}
```

### Rate Limiting Handling

The BambooHR API implements rate limiting to prevent abuse. The SDK throws a `RateLimitException` when limits are exceeded:

```php
try {
    // This call might hit a rate limit
    $result = $client->request('GET', 'employees/directory');
} catch (\BambooHR\SDK\Exception\RateLimitException $e) {
    // The SDK will throw a RateLimitException if rate limits are exceeded
    // You can get the recommended retry time
    $retryAfterSeconds = $e->getRetryAfter();
    
    // Add this request to a queue for later processing
    $queue->enqueue([
        'method' => 'GET',
        'endpoint' => 'employees/directory',
        'retry_after' => time() + $retryAfterSeconds,
        'attempt' => 1
    ]);
}
```

Best practices for handling rate limits:

1. Use a proper job/task queue system (like Redis, RabbitMQ, or a database-backed queue)
2. Implement exponential backoff for retries (increase delay with each attempt)
3. Set maximum retry attempts to avoid infinite retry loops
4. Process queued requests asynchronously


Additional recommendations:

1. Cache frequently accessed data when possible
2. Batch operations when making multiple related requests
3. Use webhooks for real-time updates instead of polling
4. Consider implementing circuit breakers for API calls

## Key Features

### Employee Management

```php
// Get an employee with specific fields
$employee = $client->employees()->getEmployee(123, [
    'firstName', 
    'lastName', 
    'jobTitle',
    'department'
]);

// Get all employees
$allEmployees = $client->employees()->getAllEmployees([
    'id', 
    'firstName', 
    'lastName'
]);

// Add a new employee
$newEmployee = $client->employees()->addEmployee([
    'firstName' => 'John',
    'lastName' => 'Doe',
    'jobTitle' => 'Developer',
    'department' => 'Engineering'
]);

// Update an employee
$client->employees()->updateEmployee(123, [
    'jobTitle' => 'Senior Developer'
]);
```

### Company Directory

```php
// Get complete company directory
$directory = $client->directory()->getDirectory();

// Search directory
$searchResults = $client->directory()->searchDirectory('john');

// Get specific employee from directory
$directoryEmployee = $client->directory()->getDirectoryEmployee(123);
```

### Reports

```php
// Create a custom report
$reportData = $client->reports()->requestCustomReport([
    'title' => 'Active Employees',
    'fields' => ['id', 'firstName', 'lastName', 'jobTitle'],
    'filterBy' => [
        ['field' => 'status', 'operator' => '=', 'value' => 'Active']
    ]
]);

// Get a standard report
$standardReport = $client->reports()->getStandardReport('EmployeeDirectory');
```

### Using Models

The SDK includes models for type-safe data handling:

```php
use BambooHR\SDK\Model\Employee;

// Create an employee model
$employee = new Employee();
$employee->setFirstName('John')
         ->setLastName('Doe')
         ->setJobTitle('Developer');

// Convert to array for API requests
$data = $employee->toArray();

// Create from API response
$employee = Employee::fromArray($apiResponse);
```

## Error Handling

The SDK provides comprehensive error handling with specific exception types:

```php
use BambooHR\SDK\Exception\AuthenticationException;
use BambooHR\SDK\Exception\RateLimitException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\BambooHRException;

try {
    $employee = $client->employees()->getEmployee(123, ['firstName', 'lastName']);
} catch (AuthenticationException $e) {
    // Handle authentication errors
    echo "Authentication error: " . $e->getMessage();
} catch (RateLimitException $e) {
    // Handle rate limiting
    echo "Rate limit exceeded. Retry after: " . $e->getRetryAfter() . " seconds";
} catch (NotFoundException $e) {
    // Handle not found errors
    echo "Resource not found: " . $e->getMessage();
} catch (BambooHRException $e) {
    // Handle general API errors
    echo "API error: " . $e->getMessage();
}
```

## Examples

Check the [examples](./examples) directory for more detailed usage examples.

## Documentation

For complete API documentation, visit the [BambooHR API Documentation](https://documentation.bamboohr.com/reference).

## License

This SDK is released under the MIT License. See the [LICENSE](LICENSE) file for details.

## Testing

The SDK includes a comprehensive test suite. To run the tests:

```bash
composer install
./vendor/bin/phpunit
```

## Development

### Code Style

The project follows PSR-12 coding standards. To check for style issues:

```bash
composer quality
```

To fix style issues:

```bash
composer fix-style
```

### Adding New Features

When adding new features:

1. Create appropriate interfaces and implementations
2. Add unit tests for new functionality
3. Document the new features in the README
