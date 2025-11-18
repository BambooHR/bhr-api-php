<?php
/**
 * Example 3: Error Handling Migration
 * 
 * This example shows the improvements in error handling
 * when migrating from SDK v1 to SDK v2.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;
use BhrSdk\Exceptions\BadRequestException;
use BhrSdk\Exceptions\PermissionDeniedException;
use BhrSdk\Exceptions\ResourceNotFoundException;
use BhrSdk\Exceptions\RateLimitExceededException;
use BhrSdk\Exceptions\InternalServerErrorException;
use BhrSdk\Exceptions\ServiceUnavailableException;

// ============================================================================
// OLD WAY: Basic error handling with SDK v1
// ============================================================================

function oldWay_errorHandling() {
	echo "=== OLD WAY: Basic Error Handling ===\n\n";
	
	// SDK v1 example (simulated)
	echo "try {\n";
	echo "    \$bamboo = new BambooAPI('mycompany', 'api_key');\n";
	echo "    \$employee = \$bamboo->getEmployee('999999');\n";
	echo "} catch (BambooHTTPException \$e) {\n";
	echo "    // Limited error information\n";
	echo "    echo \"Error: \" . \$e->getMessage();\n";
	echo "    echo \"Code: \" . \$e->getCode();\n";
	echo "}\n\n";
	
	echo "Limitations:\n";
	echo "  - Generic exception type\n";
	echo "  - Limited error context\n";
	echo "  - No response body access\n";
	echo "  - Manual status code checking\n\n";
}

// ============================================================================
// NEW WAY: Enhanced error handling with SDK v2
// ============================================================================

function newWay_errorHandling() {
	echo "=== NEW WAY: Enhanced Error Handling ===\n\n";
	
	$client = (new ApiClient())
		->withApiKey(getenv('BAMBOO_API_KEY') ?: 'demo_key')
		->forCompany(getenv('BAMBOO_COMPANY') ?: 'mycompany')
		->build();
	
	$employeesApi = $client->employees();
	
	try {
		// This will fail - employee doesn't exist
		$employee = $employeesApi->getEmployee('firstName,lastName', '999999');
		
		echo "Employee found: {$employee['firstName']}\n";
		
	} catch (AuthenticationFailedException $e) {
		// Specific exception for 401 errors
		echo "Authentication Failed (401):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Action: Check your API key or refresh OAuth token\n\n";
		
	} catch (ApiException $e) {
		// Generic API exception with rich error information
		$statusCode = $e->getCode();
		$message = $e->getMessage();
		$responseBody = $e->getResponseBody();
		$responseHeaders = $e->getResponseHeaders();
		
		echo "API Error Detected:\n";
		echo "  Status Code: {$statusCode}\n";
		echo "  Message: {$message}\n";
		
		if ($responseBody) {
			echo "  Response Body: {$responseBody}\n";
		}
		
		// Handle specific status codes
		switch ($statusCode) {
			case 400:
				echo "  Issue: Bad Request - Check request parameters\n";
				break;
			case 403:
				echo "  Issue: Forbidden - Insufficient permissions\n";
				break;
			case 404:
				echo "  Issue: Not Found - Resource doesn't exist\n";
				break;
			case 429:
				echo "  Issue: Rate Limited - Too many requests\n";
				echo "  Action: Implement exponential backoff\n";
				break;
			case 500:
			case 502:
			case 503:
				echo "  Issue: Server Error - BambooHR service issue\n";
				echo "  Action: Retry with exponential backoff\n";
				break;
		}
		
		echo "\n";
		
	} catch (\Exception $e) {
		// Catch-all for unexpected errors
		echo "Unexpected Error:\n";
		echo "  Type: " . get_class($e) . "\n";
		echo "  Message: {$e->getMessage()}\n\n";
	}
}

// ============================================================================
// ALTERNATIVE: Specific Exception Types (Preferred)
// ============================================================================

function specificExceptions_errorHandling() {
	echo "=== ALTERNATIVE: Catch Specific Exception Types ===\n\n";
	echo "SDK v2 provides dedicated exception classes for each status code.\n";
	echo "This allows for cleaner, more specific error handling:\n\n";
	
	$client = (new ApiClient())
		->withApiKey(getenv('BAMBOO_API_KEY') ?: 'demo_key')
		->forCompany(getenv('BAMBOO_COMPANY') ?: 'mycompany')
		->build();
	
	$employeesApi = $client->employees();
	
	try {
		$employee = $employeesApi->getEmployee('firstName,lastName', '999999');
		echo "Employee found: {$employee['firstName']}\n";
		
	} catch (BadRequestException $e) {
		// 400 - Invalid request parameters
		echo "Bad Request (400):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Potential Causes:\n";
		foreach ($e->getPotentialCauses() as $cause) {
			echo "    - {$cause}\n";
		}
		echo "  Debugging Tips:\n";
		foreach ($e->getDebuggingTips() as $tip) {
			echo "    - {$tip}\n";
		}
		echo "\n";
		
	} catch (AuthenticationFailedException $e) {
		// 401 - Authentication failed
		echo "Authentication Failed (401):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Action: Check your API key or refresh OAuth token\n\n";
		
	} catch (PermissionDeniedException $e) {
		// 403 - Insufficient permissions
		echo "Permission Denied (403):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Potential Causes:\n";
		foreach ($e->getPotentialCauses() as $cause) {
			echo "    - {$cause}\n";
		}
		echo "\n";
		
	} catch (ResourceNotFoundException $e) {
		// 404 - Resource not found
		echo "Resource Not Found (404):\n";
		echo "  The requested employee does not exist\n";
		echo "  Message: {$e->getMessage()}\n\n";
		
	} catch (RateLimitExceededException $e) {
		// 429 - Too many requests
		echo "Rate Limit Exceeded (429):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Action: Implement exponential backoff\n\n";
		
	} catch (InternalServerErrorException $e) {
		// 500 - Server error
		echo "Internal Server Error (500):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Action: Retry with exponential backoff\n\n";
		
	} catch (ServiceUnavailableException $e) {
		// 503 - Service unavailable
		echo "Service Unavailable (503):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Action: BambooHR may be under maintenance, retry later\n\n";
		
	} catch (ApiException $e) {
		// Generic fallback for other status codes
		echo "API Error ({$e->getCode()}):\n";
		echo "  Message: {$e->getMessage()}\n";
		echo "  Response Body: {$e->getResponseBody()}\n\n";
		
	} catch (\Exception $e) {
		// Catch-all for unexpected errors
		echo "Unexpected Error:\n";
		echo "  Type: " . get_class($e) . "\n";
		echo "  Message: {$e->getMessage()}\n\n";
	}
	
	echo "Benefits of specific exception types:\n";
	echo "  ✓ Type-safe error handling\n";
	echo "  ✓ Each exception has getPotentialCauses() and getDebuggingTips()\n";
	echo "  ✓ Cleaner code than switch statements\n";
	echo "  ✓ IDE autocomplete for available exceptions\n";
	echo "  ✓ Easier to handle specific errors differently\n\n";
}

// ============================================================================
// ADVANCED ERROR HANDLING PATTERNS
// ============================================================================

function advancedErrorHandling() {
	echo "=== ADVANCED ERROR HANDLING ===\n\n";
	
	echo "1. Built-in Retry Logic (Recommended):\n\n";
	echo "The SDK has built-in automatic retry with exponential backoff:\n\n";
	echo <<<'PHP'
// Configure retry behavior when building the client
$client = (new ApiClient())
    ->withApiKey('your-api-key')
    ->forCompany('mycompany')
    ->withRetries(3)  // Retry up to 3 times on failures
    ->build();

// Default retryable status codes: [408, 429, 504, 598]
// These are automatically retried with exponential backoff

// To customize which status codes trigger retries:
$client->getConfig()->setRetryableStatusCodes([429, 500, 502, 503]);

// Now all API calls automatically retry on configured status codes
$employeesApi = $client->employees();
$employee = $employeesApi->getEmployee('firstName,lastName', '123');
// If this fails with 429, 500, 502, or 503, it will automatically retry
// with exponential backoff: 1s, 2s, 4s...

PHP;
	
	echo "\n2. Custom Retry Logic (Advanced):\n\n";
	echo "For more control over retry behavior, implement custom retry logic:\n\n";
	echo <<<'PHP'
function getEmployeeWithCustomRetry($api, $id, $maxRetries = 3): ?array {
    $attempt = 0;
    $baseDelay = 1; // seconds
    
    while ($attempt < $maxRetries) {
        try {
            return $api->getEmployee('firstName,lastName', $id);
            
        } catch (ApiException $e) {
            $attempt++;
            
            // Custom retry logic - only retry specific errors
            if (!in_array($e->getCode(), [429, 500, 502, 503])) {
                throw $e; // Don't retry client errors (4xx)
            }
            
            if ($attempt >= $maxRetries) {
                throw $e; // Max retries reached
            }
            
            // Custom backoff strategy
            $delay = $baseDelay * pow(2, $attempt - 1);
            error_log("Retry {$attempt}/{$maxRetries} after {$delay}s...");
            sleep($delay);
        }
    }
    
    return null;
}

PHP;
	
	echo "\n3. Graceful Degradation:\n\n";
	echo <<<'PHP'
function getEmployeeOrDefault($api, $id): array {
    try {
        $employee = $api->getEmployee('firstName,lastName,workEmail', $id);
        
        return [
            'success' => true,
            'data' => [
                'name' => $employee['firstName'] . ' ' . $employee['lastName'],
                'email' => $employee['workEmail']
            ]
        ];
        
    } catch (ApiException $e) {
        error_log("Failed to fetch employee {$id}: " . $e->getMessage());
        
        return [
            'success' => false,
            'data' => [
                'name' => 'Unknown Employee',
                'email' => null
            ],
            'error' => $e->getMessage()
        ];
    }
}

PHP;
	
	echo "\n4. Centralized Error Logging:\n\n";
	echo <<<'PHP'
class BambooErrorHandler {
    private $logger;
    
    public function handle(ApiException $e, string $context = ''): void {
        $errorData = [
            'context' => $context,
            'status_code' => $e->getCode(),
            'message' => $e->getMessage(),
            'response_body' => $e->getResponseBody(),
            'timestamp' => date('Y-m-d H:i:s'),
            'trace' => $e->getTraceAsString()
        ];
        
        // Log to monitoring service
        $this->logger->error('BambooHR API Error', $errorData);
        
        // Send to error tracking (e.g., Sentry, Bugsnag)
        if ($e->getCode() >= 500) {
            $this->notifyErrorTracker($errorData);
        }
        
        // Increment metrics
        $this->metrics->increment('bamboo.api.error', [
            'status_code' => $e->getCode()
        ]);
    }
}

// Usage
$errorHandler = new BambooErrorHandler($logger);

try {
    $employee = $api->getEmployee('firstName,lastName', $id);
} catch (ApiException $e) {
    $errorHandler->handle($e, "Fetching employee {$id}");
    throw $e; // Re-throw if needed
}

PHP;
}

// ============================================================================
// RUN EXAMPLES
// ============================================================================

oldWay_errorHandling();
echo str_repeat('-', 70) . "\n\n";

newWay_errorHandling();
echo str_repeat('-', 70) . "\n\n";

specificExceptions_errorHandling();
echo str_repeat('-', 70) . "\n\n";

advancedErrorHandling();

// ============================================================================
// SUMMARY
// ============================================================================

echo "\n" . str_repeat('=', 70) . "\n";
echo "ERROR HANDLING MIGRATION SUMMARY\n";
echo str_repeat('=', 70) . "\n\n";

echo "SDK v2 Improvements:\n";
echo "✓ Dedicated exception class for each HTTP status code\n";
echo "✓ Each exception includes getPotentialCauses() and getDebuggingTips()\n";
echo "✓ Access to full response body and headers\n";
echo "✓ Rich error context for debugging\n";
echo "✓ Type-safe error handling with specific catches\n";
echo "✓ Built-in retry with exponential backoff (withRetries())\n";
echo "✓ Configurable retry status codes (setRetryableStatusCodes())\n";
echo "✓ Integration with error tracking services\n\n";

echo "Two Error Handling Approaches:\n\n";
echo "1. Single Catch with Switch (Traditional):\n";
echo "   - Catch generic ApiException\n";
echo "   - Use switch on \$e->getCode()\n";
echo "   - Good for simple cases\n\n";
echo "2. Multiple Specific Catches (Recommended):\n";
echo "   - Catch BadRequestException, ResourceNotFoundException, etc.\n";
echo "   - Each exception has helper methods (getPotentialCauses, getDebuggingTips)\n";
echo "   - Type-safe and IDE-friendly\n";
echo "   - Easier to handle different errors differently\n\n";

echo "Available Specific Exceptions:\n";
echo "→ BadRequestException (400)\n";
echo "→ AuthenticationFailedException (401)\n";
echo "→ PermissionDeniedException (403)\n";
echo "→ ResourceNotFoundException (404)\n";
echo "→ RateLimitExceededException (429)\n";
echo "→ InternalServerErrorException (500)\n";
echo "→ ServiceUnavailableException (503)\n";
echo "→ And more in BhrSdk\\Exceptions namespace\n\n";

echo "Best Practices:\n";
echo "→ Prefer specific exception types over switch statements\n";
echo "→ Use getPotentialCauses() and getDebuggingTips() for better error messages\n";
echo "→ Use built-in retry: \$client->withRetries(3) for automatic retry with backoff\n";
echo "→ Customize retryable status codes via \$client->getConfig()->setRetryableStatusCodes()\n";
echo "→ Log errors with full context for debugging\n";
echo "→ Provide graceful degradation for non-critical failures\n";
echo "→ Monitor error rates and status codes\n";
echo "→ Handle authentication failures with token refresh\n";
