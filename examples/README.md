# BambooHR PHP SDK Migration Examples

This directory contains practical examples to help you migrate from the old BambooHR PHP SDK (v1) or direct API usage to the new SDK v2.

## Quick Start

All examples are runnable PHP scripts. To use them:

```bash
# Set your environment variables
export BAMBOO_COMPANY="mycompany"
export BAMBOO_API_KEY="your_api_key_here"

# For OAuth examples
export OAUTH_CLIENT_ID="your_client_id"
export OAUTH_CLIENT_SECRET="your_client_secret"

# Run an example
php examples/01_basic_api_key_migration.php
```

## Examples Overview

### 01. Basic API Key Migration
**File:** `01_basic_api_key_migration.php`  
**Difficulty:** Beginner

Demonstrates the simplest migration path from direct cURL API calls or SDK v1 to SDK v2 using API key authentication.

**What you'll learn:**
- Converting cURL requests to SDK v2 calls
- Using the ApiClient builder pattern
- Basic error handling improvements
- Type-safe response handling

**Best for:**
- First-time SDK users
- Simple API key authentication scenarios
- Quick wins in existing codebases

---

### 02. OAuth with Automatic Token Refresh
**File:** `02_oauth_with_auto_refresh.php`  
**Difficulty:** Intermediate

Shows how to implement OAuth authentication with automatic token refresh, including persistent token storage.

**What you'll learn:**
- Implementing OAuth 2.0 authentication
- Automatic token refresh before expiration
- Token refresh callbacks
- Secure token storage patterns
- Database-backed token management

**Best for:**
- Applications requiring OAuth
- Multi-user systems
- Enhanced security requirements
- Long-running processes

**Key Features:**
```php
$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $tokens['access_token'],
        refreshToken: $tokens['refresh_token'],
        clientId: $_ENV['OAUTH_CLIENT_ID'],
        clientSecret: $_ENV['OAUTH_CLIENT_SECRET'],
        expiresIn: $tokens['expires_in']
    )
    ->onTokenRefresh(function ($newAccess, $newRefresh) {
        // Automatically called when tokens refresh
        updateDatabase($newAccess, $newRefresh);
    })
    ->build();
```

---

### 03. Error Handling Migration
**File:** `03_error_handling_migration.php`  
**Difficulty:** Intermediate

Comprehensive guide to improved error handling in SDK v2, including retry strategies and monitoring integration.

**What you'll learn:**
- Specific exception types (AuthenticationFailedException, etc.)
- Accessing detailed error information
- Implementing retry with exponential backoff
- Graceful degradation patterns
- Error logging and monitoring
- Status code handling best practices

**Best for:**
- Production applications
- Applications requiring high reliability
- Error monitoring integration
- Rate limiting scenarios

**Patterns covered:**
- Retry logic for transient failures
- Graceful degradation for non-critical errors
- Centralized error handling
- Integration with error tracking services

---

### 04. Common API Patterns
**File:** `04_common_api_patterns.php`  
**Difficulty:** Beginner to Intermediate

Side-by-side comparison of common BambooHR API operations showing old vs new approaches.

**What you'll learn:**
- Employee directory operations
- Updating employee information
- Time off request management
- Custom reports
- File uploads and downloads
- Batch operations
- Webhook management

**Best for:**
- Understanding SDK v2 equivalents
- Quick reference guide
- Planning your migration
- Training new developers

**Covers:**
- 7 common API patterns
- Before/after code comparisons
- Performance improvements
- Best practices

---

### 05. Complete Application Migration
**File:** `05_complete_application_migration.php`  
**Difficulty:** Advanced

Real-world example of migrating a complete onboarding dashboard application from old to new SDK.

**What you'll learn:**
- Structuring SDK-based applications
- Class-based API wrappers
- OAuth and API key support
- Error handling at application level
- Testing strategies
- Performance optimization
- Migration checklist

**Best for:**
- Large applications
- Complex integration scenarios
- Architecture planning
- Team migration projects

**Scenario:**
An employee onboarding dashboard that:
- Lists new hires
- Shows employee information
- Tracks time off balances
- Manages onboarding checklists
- Generates reports

---

## Running the Examples

### Prerequisites

1. **PHP 8.1+** is required
   ```bash
   php -v  # Check your version
   ```

2. **Install dependencies**
   ```bash
   cd /path/to/bhr-api-php
   composer install
   ```

3. **Set environment variables**
   
   Create a `.env` file in the project root:
   ```env
   BAMBOO_COMPANY=mycompany
   BAMBOO_API_KEY=your_api_key_here
   
   # For OAuth examples
   OAUTH_CLIENT_ID=your_client_id
   OAUTH_CLIENT_SECRET=your_client_secret
   ```
   
   Or export them directly:
   ```bash
   export BAMBOO_COMPANY="mycompany"
   export BAMBOO_API_KEY="your_api_key"
   ```

### Running Examples

```bash
# Run a specific example
php examples/01_basic_api_key_migration.php

# Run all examples
for file in examples/*.php; do
    echo "Running $file..."
    php "$file"
    echo ""
done
```

## Migration Path Recommendation

We recommend following this migration path:

### Phase 1: Learn
1. **Read** [MIGRATION.md](../MIGRATION.md) for overview
2. **Run** Example 01 - Basic API Key Migration
3. **Run** Example 04 - Common API Patterns
4. **Identify** which patterns match your use case

### Phase 2: Plan
1. **Audit** your current BambooHR integration points
2. **Map** old code to new SDK equivalents
3. **Review** Example 05 - Complete Application Migration
4. **Create** migration checklist for your application

### Phase 3: OAuth Setup
1. **Register** OAuth application in BambooHR
2. **Implement** OAuth authorization flow
3. **Run** Example 02 - OAuth with Auto Refresh
4. **Set up** token storage (database)

### Phase 4: Migrate
1. **Start** with low-risk, read-only endpoints
2. **Update** one feature at a time
3. **Test** thoroughly in staging
4. **Review** Example 03 - Error Handling Migration
5. **Deploy** to production incrementally

### Phase 5: Optimize
1. **Monitor** error rates and performance
2. **Refactor** based on SDK best practices
3. **Add** comprehensive logging
4. **Document** your implementation

## Common Migration Scenarios

### Scenario A: Simple Integration (< 10 API calls)

1. Read MIGRATION.md
2. Follow Example 01
3. Replace API calls one-by-one
4. Add basic error handling
5. Test and deploy

### Scenario B: Medium Integration (10-50 API calls)

1. Read MIGRATION.md and run all examples
2. Create wrapper class (see Example 05)
3. Migrate endpoint by endpoint
4. Implement comprehensive error handling
5. Add unit tests
6. Staged rollout

### Scenario C: Large Integration (50+ API calls)

1. Complete audit of existing integration
2. Create detailed migration plan
3. Set up OAuth infrastructure
4. Migrate in phases by feature area
5. Comprehensive testing at each phase
6. Monitor and optimize
7. Team training

### Scenario D: OAuth Migration Required

1. Register OAuth app in BambooHR
2. Implement authorization flow
3. Set up database for token storage
4. Follow Example 02 for implementation
5. Implement token refresh callback
6. Test token expiration scenarios
7. Monitor refresh rates

## Troubleshooting

### "Class 'BhrSdk\Client\ApiClient' not found"
**Solution:** Run `composer install` and ensure autoloader is loaded:
```php
require_once __DIR__ . '/vendor/autoload.php';
```

### "Authentication failed" errors
**Solution:** Verify your API key or OAuth tokens:
```bash
# Test API key
curl -u "YOUR_API_KEY:x" https://mycompany.bamboohr.com/v1/employees/directory

# Check environment variables
echo $BAMBOO_API_KEY
```

### PHP version errors
**Solution:** SDK v2 requires PHP 8.1+. Upgrade your PHP:
```bash
# Check version
php -v

# Ubuntu/Debian
sudo apt-get install php8.1

# macOS (Homebrew)
brew install php@8.1
```

### OAuth token refresh not working
**Solution:** 
1. Verify client ID and secret are correct
2. Ensure refresh token is valid (not expired)
3. Check token storage is working
4. Review Example 02 for proper implementation

## Additional Resources

- **Main Documentation:** [README.md](../README.md)
- **Migration Guide:** [MIGRATION.md](../MIGRATION.md)
- **API Documentation:** https://www.bamboohr.com/api/documentation/
- **GitHub Issues:** Report bugs or ask questions
- **BambooHR Support:** Contact for API access issues

## Contributing

Found an issue with an example? Want to add a new example?

1. Fork the repository
2. Create your example file
3. Add documentation
4. Submit a pull request

## Example Template

Creating your own example? Use this template:

```php
<?php
/**
 * Example N: Your Example Title
 * 
 * Brief description of what this example demonstrates.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// Your example code here

echo "=== Your Example Title ===\n\n";

// ... implementation ...
```

## Need Help?

- **Questions?** Open a GitHub issue
- **Bug reports?** Include example code and error messages  
- **Feature requests?** Describe your use case
- **Security issues?** Email security@bamboohr.com

---

Happy migrating! 🚀
