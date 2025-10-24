<?php
/**
 * Example 1: Basic API Key Migration
 * 
 * This example shows how to migrate from SDK v1 (BambooAPI class) or
 * direct cURL API calls to SDK v2 using API key authentication.
 * 
 * Most users are migrating from SDK v1. If you're using cURL directly,
 * you'll see those patterns referenced as well.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

// ============================================================================
// OLD WAY 1: SDK v1 (BambooAPI class)
// ============================================================================
// Many users are migrating from the old PHP SDK v1:
// https://github.com/BambooHR/bhr-api-php/blob/master/BambooHR/BambooAPI.php

/*
// SDK v1 example (if you're currently using this):
use BambooHR\API\BambooAPI;

$bamboo = new BambooAPI($subdomain, $apiKey);
$employee = $bamboo->getEmployee($employeeId);
$directory = $bamboo->getDirectory();

// Issues with v1:
// - Limited type safety
// - No OAuth support
// - Basic error handling
// - PHP 7.4 only
// - No automatic token refresh
*/

// ============================================================================
// OLD WAY 2: Direct cURL API calls
// ============================================================================
// If you're using raw cURL (no SDK):

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
// KEY BENEFITS OF SDK v2 (vs. cURL and SDK v1)
// ============================================================================

echo "\n=== Benefits of SDK v2 ===\n\n";

echo "Improvements over SDK v1 (BambooAPI):\n";
echo "✓ OAuth 2.0 support with automatic token refresh\n";
echo "✓ PHP 8.1+ with strict types and modern features\n";
echo "✓ Specific exception types (BadRequestException, etc.)\n";
echo "✓ Built-in retry with exponential backoff\n";
echo "✓ Comprehensive error context (getPotentialCauses, getDebuggingTips)\n";
echo "✓ Fluent builder pattern for configuration\n\n";

echo "Improvements over raw cURL:\n";
echo "✓ No manual HTTP configuration or header management\n";
echo "✓ Automatic request/response serialization\n";
echo "✓ Type-safe API methods with IDE autocomplete\n";
echo "✓ Consistent error handling across all endpoints\n";
echo "✓ Built-in logging and debugging support\n\n";

echo "See MIGRATION.md for complete migration guide.\n";
