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
// ADVANCED ERROR HANDLING PATTERNS
// ============================================================================

function advancedErrorHandling() {
	echo "=== ADVANCED ERROR HANDLING ===\n\n";
	
	$client = (new ApiClient())
		->withApiKey(getenv('BAMBOO_API_KEY') ?: 'demo_key')
		->forCompany(getenv('BAMBOO_COMPANY') ?: 'mycompany')
		->build();
	
	echo "1. Retry with Exponential Backoff:\n\n";
	echo <<<'PHP'
function getEmployeeWithRetry($api, $id, $maxRetries = 3): ?array {
    $attempt = 0;
    $baseDelay = 1; // seconds
    
    while ($attempt < $maxRetries) {
        try {
            return $api->getEmployee('firstName,lastName', $id);
            
        } catch (ApiException $e) {
            $attempt++;
            
            // Only retry on server errors or rate limiting
            if (!in_array($e->getCode(), [429, 500, 502, 503])) {
                throw $e;
            }
            
            if ($attempt >= $maxRetries) {
                throw $e;
            }
            
            // Exponential backoff: 1s, 2s, 4s, 8s...
            $delay = $baseDelay * pow(2, $attempt - 1);
            echo "Retry {$attempt}/{$maxRetries} after {$delay}s...\n";
            sleep($delay);
        }
    }
    
    return null;
}

PHP;
	
	echo "\n2. Graceful Degradation:\n\n";
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
	
	echo "\n3. Centralized Error Logging:\n\n";
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

advancedErrorHandling();

// ============================================================================
// SUMMARY
// ============================================================================

echo "\n" . str_repeat('=', 70) . "\n";
echo "ERROR HANDLING MIGRATION SUMMARY\n";
echo str_repeat('=', 70) . "\n\n";

echo "SDK v2 Improvements:\n";
echo "✓ Specific exception types (AuthenticationFailedException, etc.)\n";
echo "✓ Access to full response body and headers\n";
echo "✓ Rich error context for debugging\n";
echo "✓ Better status code handling\n";
echo "✓ Support for retry strategies\n";
echo "✓ Integration with error tracking services\n\n";

echo "Best Practices:\n";
echo "→ Use specific exception types when possible\n";
echo "→ Implement retry logic for transient errors (429, 500, 503)\n";
echo "→ Log errors with full context for debugging\n";
echo "→ Provide graceful degradation for non-critical failures\n";
echo "→ Monitor error rates and status codes\n";
echo "→ Handle authentication failures with token refresh\n";
