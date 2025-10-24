<?php
/**
 * Example 1: Basic API Key Migration
 * 
 * This example shows how to migrate from direct cURL API calls
 * or SDK v1 to SDK v2 using API key authentication.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// ============================================================================
// OLD WAY: Direct cURL API calls
// ============================================================================

function oldWay_getEmployee(string $subdomain, string $apiKey, string $employeeId): array {
	$url = "https://{$subdomain}.bamboohr.com/v1/employees/{$employeeId}";
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERPWD, "{$apiKey}:x");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
	
	$response = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	
	if ($httpCode !== 200) {
		throw new Exception("API request failed with status {$httpCode}");
	}
	
	return json_decode($response, true);
}

// ============================================================================
// NEW WAY: SDK v2 with ApiClient
// ============================================================================

function newWay_getEmployee(string $subdomain, string $apiKey, string $employeeId) {
	// Initialize the client once (reuse for multiple requests)
	$client = (new ApiClient())
		->withApiKey($apiKey)
		->forCompany($subdomain)
		->build();
	
	// Get the employees API
	$employeesApi = $client->employees();
	
	// Fetch the employee with specific fields
	return $employeesApi->getEmployee(
		'firstName,lastName,workEmail,jobTitle,department,hireDate',
		$employeeId
	);
}

// ============================================================================
// USAGE COMPARISON
// ============================================================================

$subdomain = getenv('BAMBOO_COMPANY') ?: 'mycompany';
$apiKey = getenv('BAMBOO_API_KEY') ?: 'your_api_key_here';
$employeeId = '123';

echo "=== API Key Migration Example ===\n\n";

// Old way (commented out to avoid actual API calls)
// try {
//     $employee = oldWay_getEmployee($subdomain, $apiKey, $employeeId);
//     echo "Old Way - Employee: {$employee['firstName']} {$employee['lastName']}\n";
// } catch (Exception $e) {
//     echo "Old Way Error: {$e->getMessage()}\n";
// }

// New way
try {
	$employee = newWay_getEmployee($subdomain, $apiKey, $employeeId);
	
	echo "New Way - Employee Details:\n";
	echo "  Name: {$employee['firstName']} {$employee['lastName']}\n";
	echo "  Email: {$employee['workEmail']}\n";
	echo "  Job Title: {$employee['jobTitle']}\n";
	echo "  Department: {$employee['department']}\n";
	echo "  Hire Date: {$employee['hireDate']}\n";
	
} catch (ApiException $e) {
	echo "New Way Error [{$e->getCode()}]: {$e->getMessage()}\n";
	
	// More detailed error handling
	if ($e->getCode() === 404) {
		echo "Employee not found.\n";
	} elseif ($e->getCode() === 401) {
		echo "Authentication failed. Check your API key.\n";
	}
}

// ============================================================================
// KEY BENEFITS OF NEW APPROACH
// ============================================================================

echo "\n=== Benefits of SDK v2 ===\n";
echo "✓ Structured array responses with consistent field names\n";
echo "✓ Better error handling with specific exceptions\n";
echo "✓ No manual cURL configuration\n";
echo "✓ Automatic request/response serialization\n";
echo "✓ Built-in retry logic and error handling\n";
echo "✓ Fluent, readable API\n";
