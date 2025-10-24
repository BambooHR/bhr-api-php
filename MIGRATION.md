# Migration Guide: PHP SDK v1 to v2

This guide helps you migrate from the BambooHR PHP SDK v1 (or direct API usage) to v2.

## Table of Contents

1. [Breaking Changes](#breaking-changes)
2. [Authentication Migration](#authentication-migration)
3. [API Client Migration](#api-client-migration)
4. [Common Patterns](#common-patterns)
5. [OAuth Token Management](#oauth-token-management)
6. [Error Handling](#error-handling)
7. [Best Practices](#best-practices)

---

## ⚠️ Important Notes

### Return Types
Many SDK methods return **arrays**, not objects. Always use array access:

```php
// ✅ Correct
$employee = $api->getEmployee('firstName,lastName', '123');
echo $employee['firstName'];

// ❌ Wrong - will cause fatal error
echo $employee->getFirstName();
```

### Parameter Order
Some methods have **fields before ID** (different from v1):

```php
// ✅ Correct - fields first, then ID
$employee = $api->getEmployee('firstName,lastName', '123');

// ❌ Wrong - will fail
$employee = $api->getEmployee('123', 'firstName,lastName');
```

### Known SDK Limitations
Some SDK methods have incomplete implementations:
- `getEmployeesDirectory()` - May return incomplete model, use array access
- Several methods return `void` due to OpenAPI spec issues (missing return statements in generated code)

When in doubt, check method signatures in `lib/Api/` or use your IDE's autocomplete.

---

## Breaking Changes

### 1. Minimum PHP Version

**Old:** PHP 7.4+  
**New:** PHP 8.1+

**Migration:** Update your PHP version to 8.1 or higher.

```bash
# Check your PHP version
php -v
```

### 2. Namespace Changes

**Old:** `BambooHR\API\`  
**New:** `BhrSdk\`

**Migration:** Update all namespace imports:

```php
// Old
use BambooHR\API\BambooAPI;
use BambooHR\API\BambooHTTPException;

// New
use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;
```

### 3. Client Initialization

The SDK now uses a fluent builder pattern instead of constructor-based configuration.

**Old:**
```php
$bamboo = new BambooAPI($subdomain, $apiKey);
```

**New:**
```php
$client = (new ApiClient())
    ->withApiKey($apiKey)
    ->forCompany($subdomain)
    ->build();
```

### 4. Method Return Types

All methods now have strict return types. Update your code to handle typed responses.

---

## Authentication Migration

### API Key Authentication

#### Old Approach (v1)
```php
// SDK v1
$bamboo = new BambooAPI('mycompany', 'api_key_here');

// Direct API usage
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://mycompany.bamboohr.com/v1/employees/directory');
curl_setopt($ch, CURLOPT_USERPWD, 'api_key_here:x');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
```

#### New Approach (v2)
```php
use BhrSdk\Client\ApiClient;

$client = (new ApiClient())
    ->withApiKey('api_key_here')
    ->forCompany('mycompany')
    ->build();

// Use the client
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();
```

### OAuth 2.0 Authentication (New in v2)

#### Basic OAuth (Static Token)
```php
use BhrSdk\Client\ApiClient;

$client = (new ApiClient())
    ->withOAuth('your_access_token_here')
    ->forCompany('mycompany')
    ->build();
```

#### OAuth with Automatic Token Refresh (New in v2)
```php
use BhrSdk\Client\ApiClient;

$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: 'current_access_token',
        refreshToken: 'refresh_token',
        clientId: 'your_client_id',
        clientSecret: 'your_client_secret',
        expiresIn: 3600 // Optional: seconds until expiration
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) {
        // Save new tokens to your database
        saveTokensToDatabase($newAccess, $newRefresh);
    })
    ->forCompany('mycompany')
    ->build();
```

### Migrating from API Key to OAuth

**Step 1:** Obtain OAuth credentials from [BambooHR Developer Portal](https://developers.bamboohr.com/).  
**Step 2:** Implement OAuth authorization flow  
**Step 3:** Store tokens securely  
**Step 4:** Update your client initialization

```php
// Old: API Key
$client = (new ApiClient())
    ->withApiKey($_ENV['BAMBOO_API_KEY'])
    ->forCompany('mycompany')
    ->build();

// New: OAuth with auto-refresh
$tokens = getTokensFromDatabase(); // Your token storage

$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $tokens['access_token'],
        refreshToken: $tokens['refresh_token'],
        clientId: $_ENV['OAUTH_CLIENT_ID'],
        clientSecret: $_ENV['OAUTH_CLIENT_SECRET'],
        expiresIn: $tokens['expires_in'] ?? null
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh) {
        updateTokensInDatabase($newAccess, $newRefresh);
    })
    ->forCompany('mycompany')
    ->build();
```

---

## API Client Migration

### Getting Employee Data

#### Old Approach
```php
// SDK v1
$bamboo = new BambooAPI('mycompany', 'api_key');
$employee = $bamboo->getEmployee('123');

// Direct API
$url = 'https://mycompany.bamboohr.com/v1/employees/123';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'api_key:x');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$employee = json_decode($response, true);
```

#### New Approach
```php
use BhrSdk\Client\ApiClient;

$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$employeesApi = $client->employees();
$employee = $employeesApi->getEmployee('firstName,lastName,workEmail', '123');
```

### Creating/Updating Employees

#### Old Approach
```php
// SDK v1
$bamboo = new BambooAPI('mycompany', 'api_key');
$bamboo->updateEmployee(123, [
    'firstName' => 'John',
    'lastName' => 'Doe'
]);
```

#### New Approach
```php
use BhrSdk\Client\ApiClient;
use BhrSdk\Model\EmployeeUpdateRequest;

$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$employeesApi = $client->employees();
$updateRequest = new EmployeeUpdateRequest([
    'firstName' => 'John',
    'lastName' => 'Doe'
]);

$employeesApi->updateEmployee('123', $updateRequest);
```

### Handling Time Off Requests

#### Old Approach
```php
// Direct API
$url = 'https://mycompany.bamboohr.com/v1/time_off/requests';
$data = json_encode([
    'employeeId' => '123',
    'start' => '2024-01-15',
    'end' => '2024-01-19',
    'timeOffTypeId' => '1'
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'api_key:x');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
```

#### New Approach
```php
use BhrSdk\Client\ApiClient;
use BhrSdk\Model\TimeOffAddATimeOffRequestRequest;

$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$timeOffApi = $client->timeOff();
$request = new TimeOffAddATimeOffRequestRequest([
    'employeeId' => 123,
    'start' => '2024-01-15',
    'end' => '2024-01-19',
    'timeOffTypeId' => 1,
    'status' => 'approved'
]);

$response = $timeOffApi->timeOffAddATimeOffRequest($request);
```

---

## Common Patterns

### 1. Listing All Employees

#### Old Pattern
```php
$bamboo = new BambooAPI('mycompany', 'api_key');
$directory = $bamboo->getDirectory();

foreach ($directory['employees'] as $employee) {
    echo $employee['displayName'] . "\n";
}
```

#### New Pattern
```php
$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$employeesApi = $client->employees();
// Note: getEmployeesDirectory may return incomplete data due to SDK bug
// Consider using getEmployeesList() instead
$directory = $employeesApi->getEmployeesDirectory();

// Use array access since SDK model may be incomplete
$employees = $directory['employees'] ?? [];
foreach ($employees as $employee) {
    $displayName = $employee['displayName'] ?? $employee->displayName ?? 'Unknown';
    echo $displayName . "\n";
}
```

### 2. Error Handling

#### Old Pattern
```php
try {
    $employee = $bamboo->getEmployee('123');
} catch (BambooHTTPException $e) {
    if ($e->getCode() === 404) {
        echo "Employee not found";
    } else {
        echo "Error: " . $e->getMessage();
    }
}
```

#### New Pattern
```php
use BhrSdk\ApiException;

try {
    // Note: getEmployee returns array<string,mixed>, use array access
    $employee = $employeesApi->getEmployee('firstName,lastName', '123');
    echo "Name: {$employee['firstName']} {$employee['lastName']}";
} catch (ApiException $e) {
    $statusCode = $e->getCode();
    
    if ($statusCode === 404) {
        echo "Employee not found";
    } elseif ($statusCode === 401) {
        echo "Authentication failed";
    } else {
        echo "API Error: " . $e->getMessage() . "\n";
        echo "Response Body: " . $e->getResponseBody() . "\n";
    }
}
```

### 3. Custom Reports

#### Old Pattern
```php
$reportId = 123;
$format = 'JSON';
$bamboo = new BambooAPI('mycompany', 'api_key');
$report = $bamboo->getCustomReport($reportId, $format);
```

#### New Pattern
```php
$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$reportsApi = $client->reports();
$report = $reportsApi->requestCustomReport(
    id: '123',
    format: 'JSON',
    onlyCurrent: true
);
```

### 4. File Downloads

#### Old Pattern
```php
$url = "https://mycompany.bamboohr.com/v1/employees/123/files/456";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'api_key:x');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$fileContent = curl_exec($ch);

file_put_contents('downloaded_file.pdf', $fileContent);
```

#### New Pattern
```php
$client = (new ApiClient())
    ->withApiKey('api_key')
    ->forCompany('mycompany')
    ->build();

$filesApi = $client->files();
$file = $filesApi->downloadEmployeeFile('123', '456');

// File is returned as SplFileObject
file_put_contents('downloaded_file.pdf', $file->fread($file->getSize()));
```

---

## OAuth Token Management

### Storing Tokens Securely

**Bad Practice (Old):**
```php
// Don't do this!
$_SESSION['access_token'] = $token;
file_put_contents('tokens.json', json_encode($tokens));
```

**Best Practice (New):**
```php
// Use encrypted database storage
function saveTokens(string $userId, string $accessToken, string $refreshToken, int $expiresIn): void {
    $pdo = getDatabaseConnection();
    
    $stmt = $pdo->prepare('
        INSERT INTO oauth_tokens (user_id, access_token, refresh_token, expires_at)
        VALUES (:user_id, :access_token, :refresh_token, :expires_at)
        ON DUPLICATE KEY UPDATE
            access_token = :access_token,
            refresh_token = :refresh_token,
            expires_at = :expires_at
    ');
    
    $stmt->execute([
        'user_id' => $userId,
        'access_token' => encryptToken($accessToken),
        'refresh_token' => encryptToken($refreshToken),
        'expires_at' => date('Y-m-d H:i:s', time() + $expiresIn)
    ]);
}

function getTokens(string $userId): array {
    $pdo = getDatabaseConnection();
    
    $stmt = $pdo->prepare('
        SELECT access_token, refresh_token, 
               UNIX_TIMESTAMP(expires_at) - UNIX_TIMESTAMP() as expires_in
        FROM oauth_tokens
        WHERE user_id = :user_id
    ');
    
    $stmt->execute(['user_id' => $userId]);
    $tokens = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return [
        'access_token' => decryptToken($tokens['access_token']),
        'refresh_token' => decryptToken($tokens['refresh_token']),
        'expires_in' => max(0, (int)$tokens['expires_in'])
    ];
}
```

### Implementing Token Refresh Callback

```php
use BhrSdk\Client\ApiClient;

$tokens = getTokens($userId);

$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $tokens['access_token'],
        refreshToken: $tokens['refresh_token'],
        clientId: $_ENV['OAUTH_CLIENT_ID'],
        clientSecret: $_ENV['OAUTH_CLIENT_SECRET'],
        expiresIn: $tokens['expires_in']
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) use ($userId) {
        // Automatically called when tokens are refreshed
        saveTokens($userId, $newAccess, $newRefresh, 3600);
        
        // Optional: Log token refresh for debugging
        error_log("OAuth tokens refreshed for user: $userId");
        
        // Optional: Notify monitoring system
        notifyTokenRefresh($userId);
    })
    ->forCompany('mycompany')
    ->build();

// Now use the client normally - token refresh is automatic!
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();
```

---

## Error Handling

### Exception Hierarchy

```php
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;

try {
    $client = (new ApiClient())
        ->withOAuth($accessToken)
        ->forCompany('mycompany')
        ->build();
    
    $employeesApi = $client->employees();
    $employee = $employeesApi->getEmployee('firstName,lastName', '123');
    
} catch (AuthenticationFailedException $e) {
    // 401 Unauthorized - Token expired or invalid
    error_log("Authentication failed: " . $e->getMessage());
    
    // Redirect to login or refresh token
    redirectToLogin();
    
} catch (ApiException $e) {
    // Other API errors (400, 403, 404, 500, etc.)
    $statusCode = $e->getCode();
    $message = $e->getMessage();
    $responseBody = $e->getResponseBody();
    
    error_log("API Error [$statusCode]: $message");
    
    if ($statusCode === 404) {
        // Handle not found
    } elseif ($statusCode === 403) {
        // Handle forbidden
    } elseif ($statusCode >= 500) {
        // Handle server error
        retryRequest();
    }
    
} catch (\Exception $e) {
    // Network errors, etc.
    error_log("Unexpected error: " . $e->getMessage());
}
```

---

## Best Practices

### 1. Client Reuse

**❌ Bad - Creating new client for each request:**
```php
function getEmployee($id) {
    $client = (new ApiClient())
        ->withApiKey('api_key')
        ->forCompany('mycompany')
        ->build();
    
    return $client->employees()->getEmployee('firstName,lastName', $id);
}
```

**✅ Good - Reuse client instance:**
```php
class BambooHRService {
    private ApiClient $client;
    
    public function __construct() {
        $this->client = (new ApiClient())
            ->withApiKey($_ENV['BAMBOO_API_KEY'])
            ->forCompany($_ENV['BAMBOO_COMPANY'])
            ->build();
    }
    
    public function getEmployee(string $id): array {
        return $this->client->employees()->getEmployee('firstName,lastName', $id);
    }
}
```

### 2. Environment Configuration

**❌ Bad - Hardcoded values:**
```php
$client = (new ApiClient())
    ->withApiKey('abc123')
    ->forCompany('mycompany')
    ->build();
```

**✅ Good - Use environment variables:**
```php
// .env file
BAMBOO_API_KEY=your_api_key_here
BAMBOO_COMPANY=mycompany
OAUTH_CLIENT_ID=your_client_id
OAUTH_CLIENT_SECRET=your_client_secret

// Code
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = (new ApiClient())
    ->withApiKey($_ENV['BAMBOO_API_KEY'])
    ->forCompany($_ENV['BAMBOO_COMPANY'])
    ->build();
```

### 3. Logging

**Enable SDK logging for debugging:**
```php
use BhrSdk\Client\ApiClient;
use BhrSdk\Client\Logger\SecureLogger;
use Psr\Log\LogLevel;

// Create a PSR-3 compatible logger
$logger = new SecureLogger(
    filePath: '/var/log/bamboo-api.log',
    logLevel: LogLevel::DEBUG
);

$client = (new ApiClient())
    ->withApiKey($_ENV['BAMBOO_API_KEY'])
    ->forCompany($_ENV['BAMBOO_COMPANY'])
    ->withLogger($logger)
    ->build();

// Logs will now include API requests, responses, and token refreshes
// Note: Sensitive data (tokens, passwords) are automatically redacted
```

### 4. Testing

**Use dependency injection for testability:**
```php
interface BambooHRClientInterface {
    public function getEmployee(string $id): array;
}

class BambooHRClient implements BambooHRClientInterface {
    private ApiClient $client;
    
    public function __construct(ApiClient $client) {
        $this->client = $client;
    }
    
    public function getEmployee(string $id): array {
        return $this->client->employees()->getEmployee('firstName,lastName', $id);
    }
}

// In tests
class BambooHRClientTest extends TestCase {
    public function testGetEmployee(): void {
        $mockClient = $this->createMock(ApiClient::class);
        // ... setup mock expectations
        
        $service = new BambooHRClient($mockClient);
        $employee = $service->getEmployee('123');
        
        $this->assertEquals('John', $employee['firstName']);
    }
}
```

---

## Complete Migration Example

Here's a complete example showing migration from v1 to v2:

### Before (SDK v1)

```php
<?php
require_once 'vendor/autoload.php';

use BambooHR\API\BambooAPI;
use BambooHR\API\BambooHTTPException;

$apiKey = 'your_api_key';
$subdomain = 'mycompany';

try {
    $bamboo = new BambooAPI($subdomain, $apiKey);
    
    // Get employee
    $employee = $bamboo->getEmployee('123');
    echo "Employee: " . $employee['firstName'] . " " . $employee['lastName'] . "\n";
    
    // Update employee
    $bamboo->updateEmployee('123', [
        'jobTitle' => 'Senior Developer'
    ]);
    
    // Get directory
    $directory = $bamboo->getDirectory();
    foreach ($directory['employees'] as $emp) {
        echo $emp['displayName'] . "\n";
    }
    
} catch (BambooHTTPException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

### After (SDK v2)

```php
<?php
require_once 'vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\Model\EmployeeUpdateRequest;
use BhrSdk\ApiException;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    // Initialize client with OAuth and auto-refresh
    $tokens = getStoredTokens($_SESSION['user_id']);
    
    $client = (new ApiClient())
        ->withOAuthRefresh(
            accessToken: $tokens['access_token'],
            refreshToken: $tokens['refresh_token'],
            clientId: $_ENV['OAUTH_CLIENT_ID'],
            clientSecret: $_ENV['OAUTH_CLIENT_SECRET'],
            expiresIn: $tokens['expires_in']
        )
        ->onTokenRefresh(function ($newAccess, $newRefresh) {
            updateStoredTokens($_SESSION['user_id'], $newAccess, $newRefresh);
        })
        ->forCompany($_ENV['BAMBOO_COMPANY'])
        ->build();
    
    $employeesApi = $client->employees();
    
    // Get employee
    $employee = $employeesApi->getEmployee('firstName,lastName,jobTitle', '123');
    echo "Employee: {$employee['firstName']} {$employee['lastName']}\n";
    
    // Update employee
    $updateRequest = new EmployeeUpdateRequest([
        'jobTitle' => 'Senior Developer'
    ]);
    $employeesApi->updateEmployee('123', $updateRequest);
    
    // Get directory
    $directory = $employeesApi->getEmployeesDirectory();
    $employees = $directory['employees'] ?? [];
    foreach ($employees as $emp) {
        $displayName = $emp['displayName'] ?? $emp->displayName ?? 'Unknown';
        echo $displayName . "\n";
    }
    
} catch (ApiException $e) {
    error_log("BambooHR API Error [{$e->getCode()}]: {$e->getMessage()}");
    
    if ($e->getCode() === 401) {
        // Redirect to re-authenticate
        header('Location: /oauth/login');
    } else {
        echo "An error occurred. Please try again later.\n";
    }
}

// Helper functions
function getStoredTokens(string $userId): array {
    // Retrieve from database
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare('SELECT * FROM oauth_tokens WHERE user_id = ?');
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateStoredTokens(string $userId, string $accessToken, string $refreshToken): void {
    // Update database
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare('
        UPDATE oauth_tokens 
        SET access_token = ?, refresh_token = ?, updated_at = NOW()
        WHERE user_id = ?
    ');
    $stmt->execute([$accessToken, $refreshToken, $userId]);
}
```

---

## Need Help?

- **Documentation:** See [README.md](README.md) for full API documentation
- **Examples:** Check the `examples/` directory for more code samples
- **Issues:** Report bugs or ask questions on GitHub Issues
- **Support:** Contact BambooHR API Support at https://documentation.bamboohr.com/docs/api-support

---

## Quick Reference

| Task | Old (v1) | New (v2) |
|------|----------|----------|
| Initialize | `new BambooAPI($sub, $key)` | `(new ApiClient())->withApiKey($key)->forCompany($sub)->build()` |
| Get Employee | `$bamboo->getEmployee($id)` | `$client->employees()->getEmployee($fields, $id)` |
| Update Employee | `$bamboo->updateEmployee($id, $data)` | `$client->employees()->updateEmployee($id, $request)` |
| OAuth | Not supported | `->withOAuth($token)` or `->withOAuthRefresh(...)` |
| Error Handling | `BambooHTTPException` | `ApiException` |
| Namespace | `BambooHR\API` | `BhrSdk` |
