# Authentication Guide

This guide explains the two authentication methods for the BambooHR PHP SDK: **API Key** and **OAuth 2.0**. Choose the method that best fits your use case.

## Table of Contents

1. [Which Authentication Method Should I Use?](#which-authentication-method-should-i-use)
2. [API Key Authentication](#api-key-authentication)
3. [OAuth 2.0 Authentication](#oauth-20-authentication)
4. [Comparison](#comparison)
5. [Security Best Practices](#security-best-practices)

---

## Which Authentication Method Should I Use?

### Use API Key When:
- ✅ You're building an internal tool for your own company
- ✅ You have a single BambooHR account to access
- ✅ You need simple, server-side authentication
- ✅ You want the easiest setup
- ✅ Your application runs on a trusted server

**Examples:** Internal dashboards, scheduled reports, data synchronization scripts

### Use OAuth 2.0 When:
- ✅ You're building an application for multiple customers
- ✅ Each user needs access to their own BambooHR account
- ✅ You need user-specific permissions
- ✅ You're distributing your application publicly
- ✅ You need explicit user consent for data access

**Examples:** SaaS applications, multi-tenant platforms, marketplace integrations

---

## API Key Authentication

API Key authentication is the simpler method. You use a static key that represents your company's account.

### Getting an API Key

1. Log in to BambooHR
2. Click your profile → **API Keys**
3. Click **Add New Key**
4. Give it a descriptive name
5. Click **Generate Key**
6. **Copy the key immediately** (you won't see it again!)

### Using API Key with the SDK

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// Get credentials from environment variables
$apiKey = getenv('BAMBOO_API_KEY');
$company = getenv('BAMBOO_COMPANY');

// Create the client
$client = (new ApiClient())
    ->withApiKey($apiKey)        // ← Your API key
    ->forCompany($company)        // ← Your company subdomain
    ->build();

// Use the client
try {
    $employeesApi = $client->employees();
    $directory = $employeesApi->getEmployeesDirectory();
    echo "Success! Found " . count($directory['employees'] ?? []) . " employees\n";
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

### API Key Security

**✅ Do This:**
- Store API keys in environment variables
- Use separate keys for different environments (dev, staging, production)
- Rotate keys periodically
- Revoke unused keys immediately
- Keep keys out of version control

**❌ Don't Do This:**
- Hardcode keys in source code
- Commit keys to Git repositories
- Share keys via email or Slack
- Expose keys in client-side code
- Use the same key for multiple applications

### Example: Secure Storage

**Using Environment Variables:**

```bash
# In your .env file (never commit this file!)
BAMBOO_API_KEY=your_api_key_here
BAMBOO_COMPANY=your_company_subdomain
```

```php
// In your PHP code
$apiKey = getenv('BAMBOO_API_KEY');
if (!$apiKey) {
    throw new Exception('BAMBOO_API_KEY environment variable not set');
}
```

**Using a .env Library (recommended for applications):**

```bash
composer require vlucas/phpdotenv
```

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use BhrSdk\Client\ApiClient;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Use the variables
$client = (new ApiClient())
    ->withApiKey($_ENV['BAMBOO_API_KEY'])
    ->forCompany($_ENV['BAMBOO_COMPANY'])
    ->build();
```

---

## OAuth 2.0 Authentication

OAuth 2.0 is more complex but provides better security and user-specific access control.

### OAuth Flow Overview

```
1. User clicks "Connect to BambooHR" in your app
2. User is redirected to BambooHR authorization page
3. User logs in and grants permission
4. BambooHR redirects back with authorization code
5. Your app exchanges code for access token + refresh token
6. Your app uses access token to make API calls
7. Token expires → Your app automatically refreshes it
```

### Step 1: Register Your Application

Before you can use OAuth, register your application with BambooHR:

1. Login to the the Developer Portal at https://developers.bamboohr.com/
2. Click "Add Application"
3. Provide your application details:
   - Application name
   - Redirect URI(s)
   - Application Scopes
4. Receive your OAuth credentials:
   - **Client ID** - Public identifier for your app
   - **Client Secret** - Secret key (keep this secure!)

### Step 2: Direct User to Authorization

```php
<?php
// Your OAuth credentials
$clientId = getenv('OAUTH_CLIENT_ID');
$redirectUri = 'https://yourapp.com/oauth/callback';
$company = 'your_company_subdomain';  // User's BambooHR subdomain

// Build authorization URL parameters
$params = http_build_query([
    'client_id' => $clientId,
    'redirect_uri' => $redirectUri,
    'response_type' => 'code',
    'request' => 'authorize',
]);

// Note: Authorization URL requires the company subdomain
$authUrl = "https://{$company}.bamboohr.com/authorize.php?{$params}";

// Redirect user to BambooHR
header("Location: {$authUrl}");
exit;
```

### Step 3: Handle the Callback

BambooHR redirects back to your app with an authorization code:

```php
<?php
// In your callback handler (e.g., /oauth/callback)
$code = $_GET['code'] ?? null;

if (!$code) {
    die('Authorization failed');
}

// Exchange code for tokens
// Note: Token URL requires the company subdomain
$company = 'your_company_subdomain';  // Get from user or session
$tokenUrl = "https://{$company}.bamboohr.com/token.php";

$ch = curl_init($tokenUrl);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => http_build_query([
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => getenv('OAUTH_REDIRECT_URI'),
        'client_id' => getenv('OAUTH_CLIENT_ID'),
        'client_secret' => getenv('OAUTH_CLIENT_SECRET'),
        'request' => 'token',
    ]),
]);

$response = curl_exec($ch);
$tokens = json_decode($response, true);

// Save tokens securely (database, encrypted storage, etc.)
$accessToken = $tokens['access_token'];
$refreshToken = $tokens['refresh_token'];
$expiresIn = $tokens['expires_in'] ?? 3600;

// Store for this user
saveUserTokens($userId, $accessToken, $refreshToken, $expiresIn);
```

### Step 4: Use OAuth with the SDK

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// Retrieve user's tokens from your database
$tokens = getUserTokens($userId);

// Create client with OAuth
$client = (new ApiClient())
    ->withOAuth($tokens['access_token'])   // ← OAuth access token
    ->forCompany($tokens['company'])        // ← User's company subdomain
    ->build();

// Make API calls
try {
    $employeesApi = $client->employees();
    $directory = $employeesApi->getEmployeesDirectory();
    echo "Success!\n";
} catch (ApiException $e) {
    if ($e->getCode() === 401) {
        // Token expired - need to refresh
        $newTokens = refreshOAuthToken($tokens['refresh_token']);
        saveUserTokens($userId, $newTokens['access_token'], $newTokens['refresh_token']);
    }
}
```

### Step 5: Automatic Token Refresh

The SDK can automatically refresh expired tokens for you:

```php
<?php
use BhrSdk\Client\ApiClient;

$tokens = getUserTokens($userId);

$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $tokens['access_token'],
        refreshToken: $tokens['refresh_token'],
        clientId: getenv('OAUTH_CLIENT_ID'),
        clientSecret: getenv('OAUTH_CLIENT_SECRET'),
        expiresIn: $tokens['expires_in'] ?? null
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh, $oldAccess, $oldRefresh) use ($userId) {
        // This callback is called automatically when tokens are refreshed
        echo "Tokens refreshed for user {$userId}\n";
        
        // Save new tokens to your database
        saveUserTokens($userId, $newAccess, $newRefresh, 3600);
        
        // Optional: Log the refresh event
        logTokenRefresh($userId, [
            'old_token' => substr($oldAccess, 0, 10) . '...',
            'new_token' => substr($newAccess, 0, 10) . '...',
            'timestamp' => date('Y-m-d H:i:s'),
        ]);
    })
    ->forCompany($tokens['company'])
    ->build();

// Now use the client normally - token refresh is automatic!
// The SDK will:
// 1. Check if token is about to expire (within 5 minutes)
// 2. Automatically refresh it if needed
// 3. Retry failed requests with new token
// 4. Call your callback with new tokens
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();  // ← Tokens automatically refreshed if needed
```

### Token Storage

**Never store tokens in plain text!** Here's a secure approach:

```php
<?php
/**
 * Secure token storage using encrypted database
 */
class TokenStorage
{
    private PDO $pdo;
    private string $encryptionKey;
    
    public function __construct(PDO $pdo, string $encryptionKey)
    {
        $this->pdo = $pdo;
        $this->encryptionKey = $encryptionKey;
    }
    
    public function saveTokens(string $userId, string $accessToken, string $refreshToken, int $expiresIn): void
    {
        // Encrypt tokens before storing
        $encryptedAccess = $this->encrypt($accessToken);
        $encryptedRefresh = $this->encrypt($refreshToken);
        
        $stmt = $this->pdo->prepare('
            INSERT INTO oauth_tokens (user_id, access_token, refresh_token, expires_at, updated_at)
            VALUES (:user_id, :access_token, :refresh_token, :expires_at, NOW())
            ON DUPLICATE KEY UPDATE
                access_token = VALUES(access_token),
                refresh_token = VALUES(refresh_token),
                expires_at = VALUES(expires_at),
                updated_at = NOW()
        ');
        
        $stmt->execute([
            'user_id' => $userId,
            'access_token' => $encryptedAccess,
            'refresh_token' => $encryptedRefresh,
            'expires_at' => date('Y-m-d H:i:s', time() + $expiresIn),
        ]);
    }
    
    public function getTokens(string $userId): ?array
    {
        $stmt = $this->pdo->prepare('
            SELECT access_token, refresh_token, 
                   UNIX_TIMESTAMP(expires_at) - UNIX_TIMESTAMP() as expires_in,
                   company_subdomain
            FROM oauth_tokens
            WHERE user_id = :user_id
              AND expires_at > NOW()
        ');
        
        $stmt->execute(['user_id' => $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$row) {
            return null;
        }
        
        // Decrypt tokens
        return [
            'access_token' => $this->decrypt($row['access_token']),
            'refresh_token' => $this->decrypt($row['refresh_token']),
            'expires_in' => max(0, (int)$row['expires_in']),
            'company' => $row['company_subdomain'],
        ];
    }
    
    private function encrypt(string $data): string
    {
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $this->encryptionKey, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    
    private function decrypt(string $data): string
    {
        $data = base64_decode($data);
        $iv = substr($data, 0, 16);
        $encrypted = substr($data, 16);
        return openssl_decrypt($encrypted, 'aes-256-cbc', $this->encryptionKey, 0, $iv);
    }
}

// Usage
$storage = new TokenStorage($pdo, getenv('ENCRYPTION_KEY'));

// Save tokens
$storage->saveTokens($userId, $accessToken, $refreshToken, 3600);

// Retrieve tokens
$tokens = $storage->getTokens($userId);
```

### Complete OAuth Example

See [`examples/08_oauth_complete_flow.php`](examples/08_oauth_complete_flow.php) for a complete, working OAuth implementation.

---

## Comparison

| Feature | API Key | OAuth 2.0 |
|---------|---------|-----------|
| **Setup Complexity** | ⭐ Simple | ⭐⭐⭐ Complex |
| **Use Case** | Single account | Multi-user |
| **User Consent** | Not required | Required |
| **Token Expiration** | Never | Yes (auto-refresh available) |
| **User-Specific Access** | No | Yes |
| **Revocation** | Manual | Automatic on user disconnect |
| **Best For** | Internal tools, scripts | Public apps, SaaS |
| **Security** | Good (if stored securely) | Excellent |

---

## Security Best Practices

### For Both Methods

1. **Use HTTPS Only**
   - Never send credentials over HTTP
   - Always use HTTPS in production

2. **Environment Variables**
   ```php
   // ✅ Good
   $apiKey = getenv('BAMBOO_API_KEY');
   
   // ❌ Bad
   $apiKey = 'hardcoded_key_123';
   ```

3. **Separate Environments**
   - Use different credentials for dev/staging/production
   - Never use production credentials in development

4. **Minimal Permissions**
   - Request only the permissions you need
   - Regularly audit what access your application has

### OAuth-Specific Security

1. **Protect Client Secret**
   - Never expose in client-side code
   - Never commit to version control
   - Store encrypted in production

2. **Validate Redirect URIs**
   - Use exact match (not wildcards)
   - Use HTTPS only
   - Register all redirect URIs with BambooHR

3. **Use State Parameter**
   ```php
   // Generate random state
   $state = bin2hex(random_bytes(16));
   $_SESSION['oauth_state'] = $state;
   
   // Include in authorization URL
   $company = 'your_company_subdomain';
   $authUrl = "https://{$company}.bamboohr.com/authorize.php?" . http_build_query([
       'client_id' => $clientId,
       'redirect_uri' => $redirectUri,
       'response_type' => 'code',
       'request' => 'authorize',
       'state' => $state,  // ← Prevents CSRF attacks
   ]);
   
   // Verify on callback
   if ($_GET['state'] !== $_SESSION['oauth_state']) {
       die('Invalid state parameter');
   }
   ```

4. **Encrypt Token Storage**
   - Never store tokens in plain text
   - Use encryption at rest
   - Use secure database connections

5. **Monitor for Suspicious Activity**
   - Log all token refreshes
   - Alert on unusual patterns
   - Implement rate limiting

---

## Troubleshooting

### API Key Issues

**401 Unauthorized?**
- Verify API key is correct
- Check company subdomain
- Ensure key hasn't been revoked

**403 Forbidden?**
- API key lacks required permissions
- Check key permissions in BambooHR settings

### OAuth Issues

**Authorization Failed?**
- Check Client ID and Secret
- Verify redirect URI matches exactly
- Ensure user has BambooHR access

**Token Refresh Failed?**
- Refresh token may be invalid/expired
- Check Client Secret is correct
- User may have revoked access

**Tokens Not Saving?**
- Check database connection
- Verify encryption key is set
- Check for database errors

---

## Additional Resources

- **Getting Started:** See [GETTING_STARTED.md](GETTING_STARTED.md)
- **OAuth Example:** See [examples/08_oauth_complete_flow.php](examples/08_oauth_complete_flow.php)
- **Token Refresh Example:** See [examples/02_oauth_with_auto_refresh.php](examples/02_oauth_with_auto_refresh.php)
- **BambooHR OAuth and API Docs:** https://documentation.bamboohr.com/docs/getting-started

---

**Need help?** Contact BambooHR API Support: https://documentation.bamboohr.com/docs/api-support
