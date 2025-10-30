<?php
/**
 * Example 7: Your First API Call
 *
 * This is the simplest possible example to get you started with the BambooHR PHP SDK.
 * Perfect for beginners who want to make their first API call in minutes.
 *
 * Prerequisites:
 * - PHP 8.1 or higher
 * - Composer installed
 * - BambooHR account with API access
 * - API key from BambooHR (Settings > API Keys)
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;
use BhrSdk\Exceptions\AuthenticationFailedException;
use BhrSdk\Exceptions\PermissionDeniedException;
use BhrSdk\Exceptions\ResourceNotFoundException;
use BhrSdk\Exceptions\RateLimitExceededException;

// ============================================================================
// CONFIGURATION
// ============================================================================

// Get your credentials from environment variables (recommended)
// Or replace with your actual values for testing
$apiKey = getenv('BAMBOO_API_KEY') ?: 'your_api_key_here';
$company = getenv('BAMBOO_COMPANY') ?: 'your_company_subdomain';

echo "=== Your First BambooHR API Call ===\n\n";

// ============================================================================
// STEP 1: CREATE THE CLIENT
// ============================================================================

echo "Step 1: Creating API client...\n";

$client = (new ApiClient())
	->withApiKey($apiKey)           // Your API key
	->forCompany($company)          // Your company subdomain (e.g., 'acme' for acme.bamboohr.com)
	->build();

echo "✓ Client created successfully!\n\n";

// ============================================================================
// STEP 2: MAKE YOUR FIRST API CALL
// ============================================================================

echo "Step 2: Fetching employee directory...\n";

try {
	// Get access to the Employees API
	$employeesApi = $client->employees();

	// Get the employee directory
	// This returns all employees in your company
	$directory = $employeesApi->getEmployeesDirectory();

	echo "✓ API call successful!\n\n";

	// ============================================================================
	// STEP 3: WORK WITH THE RESPONSE
	// ============================================================================

	echo "Step 3: Processing the response...\n\n";

	// The directory returns a model object with an 'employees' property
	// We use flexible access to handle the response
	$employees = $directory['employees'] ?? [];

	if (empty($employees)) {
		echo "No employees found in directory.\n";
	} else {
		echo "Found " . count($employees) . " employees:\n\n";

		// Display first 5 employees as an example
		$count = 0;
		foreach ($employees as $employee) {
			if ($count >= 5) {
				echo "... and " . (count($employees) - 5) . " more\n";
				break;
			}

			// Use flexible access pattern (works with arrays and objects)
			$name = $employee['displayName'] ?? $employee->displayName ?? 'Unknown';
			$jobTitle = $employee['jobTitle'] ?? $employee->jobTitle ?? 'N/A';

			echo "  • {$name}";
			if ($jobTitle !== 'N/A') {
				echo " - {$jobTitle}";
			}
			echo "\n";

			$count++;
		}
	}

} catch (AuthenticationFailedException $e) {
	// ============================================================================
	// STEP 4: HANDLE ERRORS - Authentication (401)
	// ============================================================================

	echo "✗ Authentication Failed!\n\n";
	echo "Message: {$e->getMessage()}\n\n";

	echo "Potential Causes:\n";
	foreach ($e->getPotentialCauses() as $cause) {
		echo "  • {$cause}\n";
	}

	echo "\nDebugging Tips:\n";
	foreach ($e->getDebuggingTips() as $tip) {
		echo "  • {$tip}\n";
	}
	echo "\n";

} catch (PermissionDeniedException $e) {
	// ============================================================================
	// STEP 4: HANDLE ERRORS - Permission Denied (403)
	// ============================================================================

	echo "✗ Permission Denied!\n\n";
	echo "Message: {$e->getMessage()}\n\n";

	echo "Potential Causes:\n";
	foreach ($e->getPotentialCauses() as $cause) {
		echo "  • {$cause}\n";
	}

	echo "\nDebugging Tips:\n";
	foreach ($e->getDebuggingTips() as $tip) {
		echo "  • {$tip}\n";
	}
	echo "\n";

} catch (ResourceNotFoundException $e) {
	// ============================================================================
	// STEP 4: HANDLE ERRORS - Not Found (404)
	// ============================================================================

	echo "✗ Resource Not Found!\n\n";
	echo "Message: {$e->getMessage()}\n";
	echo "The requested resource doesn't exist. This could be an employee, report, or other resource.\n\n";

} catch (RateLimitExceededException $e) {
	// ============================================================================
	// STEP 4: HANDLE ERRORS - Rate Limited (429)
	// ============================================================================

	echo "✗ Rate Limit Exceeded!\n\n";
	echo "Message: {$e->getMessage()}\n\n";

	echo "What this means:\n";
	echo "  • You've made too many API requests in a short time\n";
	echo "  • The BambooHR API has request rate limits to ensure service quality\n\n";

	echo "How to fix:\n";
	echo "  • Wait a few minutes before trying again\n";
	echo "  • Implement exponential backoff in your retry logic\n";
	echo "  • Consider using the SDK's built-in retry: \$client->withRetries(3)\n";
	echo "  • Reduce the frequency of your API calls\n\n";

} catch (ApiException $e) {
	// ============================================================================
	// STEP 4: HANDLE ERRORS - Generic API Error
	// ============================================================================

	echo "✗ API call failed!\n\n";

	$statusCode = $e->getCode();
	$message = $e->getMessage();
	$responseBody = $e->getResponseBody();

	echo "Error Details:\n";
	echo "  Status Code: {$statusCode}\n";
	echo "  Message: {$message}\n";

	if ($responseBody) {
		echo "  Response: {$responseBody}\n";
	}

	echo "\nTroubleshooting:\n";

	if ($statusCode >= 500) {
		echo "  • This is a server error on BambooHR's side\n";
		echo "  • Wait a few minutes and try again\n";
		echo "  • Check BambooHR status page for known issues\n";
		echo "  • Consider implementing retry logic with exponential backoff\n";
	} else {
		echo "  • Check your request parameters\n";
		echo "  • Verify your API credentials\n";
		echo "  • See the response body above for more details\n";
		echo "  • Check the API documentation for this endpoint\n";
	}

	echo "\n";
}

// ============================================================================
// WHAT'S NEXT?
// ============================================================================

echo "\n=== What's Next? ===\n\n";
echo "Now that you've made your first API call, here are some next steps:\n\n";
echo "1. Get Specific Employee Data:\n";
echo "   \$employee = \$employeesApi->getEmployee('firstName,lastName,workEmail', '123');\n";
echo "   echo \$employee['firstName'];\n\n";
echo "2. Explore Other APIs:\n";
echo "   - Time Off: \$client->timeOff()->getTimeOffRequests()\n";
echo "   - Reports: \$client->reports()->getCompanyReport('1')\n";
echo "   - Photos: \$client->photos()->getEmployeePhoto('123', 'small')\n\n";
echo "3. Learn About OAuth:\n";
echo "   See examples/02_oauth_with_auto_refresh.php for OAuth authentication\n\n";
echo "4. Advanced Error Handling:\n";
echo "   See examples/03_error_handling_migration.php for:\n";
echo "   - Built-in retry with exponential backoff\n";
echo "   - Custom retry logic patterns\n";
echo "   - Centralized error logging\n\n";
echo "5. Explore Common Patterns:\n";
echo "   See examples/04_common_api_patterns.php for common use cases\n\n";
echo "Documentation: See GETTING_STARTED.md for complete guide\n";
echo "API Reference: https://www.bamboohr.com/api/documentation/\n";
