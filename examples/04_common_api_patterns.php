<?php
/**
 * Example 4: Common API Patterns - SDK v1 to SDK v2 Migration
 * 
 * Side-by-side comparison of common BambooHR API operations
 * showing migration from SDK v1 (BambooAPI class) to SDK v2.
 * 
 * If you're migrating from direct cURL calls instead, see MIGRATION.md
 * for cURL-specific examples.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\Model\EmployeeUpdateRequest;
use BhrSdk\Model\TimeOffAddATimeOffRequestRequest;
use BhrSdk\ApiException;

// Initialize client for new examples
$client = (new ApiClient())
	->withApiKey(getenv('BAMBOO_API_KEY') ?: 'demo_key')
	->forCompany(getenv('BAMBOO_COMPANY') ?: 'mycompany')
	->build();

echo "=== Common API Patterns: Migration Examples ===\n\n";

// ============================================================================
// PATTERN 1: Get Employee Directory
// ============================================================================

echo "1. GET EMPLOYEE DIRECTORY\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
use BambooHR\API\BambooAPI;

$bamboo = new BambooAPI('mycompany', 'api_key');
$directory = $bamboo->getDirectory();

foreach ($directory['employees'] as $employee) {
    echo $employee['displayName'] . "\n";
}

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();

$employees = $directory['employees'] ?? [];
foreach ($employees as $employee) {
    $displayName = $employee['displayName'] ?? $employee->displayName ?? 'Unknown';
    echo $displayName . "\n";
}

PHP;

try {
	$employeesApi = $client->employees();
	// $directory = $employeesApi->getEmployeesDirectory();
	echo "\n✓ Much cleaner and type-safe!\n\n";
} catch (ApiException $e) {
	echo "\n✗ Error: {$e->getMessage()}\n\n";
}

// ============================================================================
// PATTERN 2: Update Employee Information
// ============================================================================

echo "\n2. UPDATE EMPLOYEE INFORMATION\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$bamboo->updateEmployee('123', [
    'firstName' => 'John',
    'lastName' => 'Doe',
    'jobTitle' => 'Senior Developer'
]);

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$employeesApi = $client->employees();
$updateRequest = new EmployeeUpdateRequest([
    'firstName' => 'John',
    'lastName' => 'Doe',
    'jobTitle' => 'Senior Developer'
]);

$employeesApi->updateEmployee('123', $updateRequest);

PHP;

echo "\n✓ No manual JSON encoding or HTTP header management!\n\n";

// ============================================================================
// PATTERN 3: Create Time Off Request
// ============================================================================

echo "\n3. CREATE TIME OFF REQUEST\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$response = $bamboo->requestTimeOff('123', [
    'start' => '2024-12-20',
    'end' => '2024-12-27',
    'timeOffTypeId' => 1,
    'status' => 'approved',
    'amount' => 5.0,
    'notes' => 'Holiday vacation'
]);

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$timeOffApi = $client->timeOff();
$request = new TimeOffAddATimeOffRequestRequest([
    'employeeId' => 123,
    'start' => '2024-12-20',
    'end' => '2024-12-27',
    'timeOffTypeId' => 1,
    'status' => 'approved',
    'amount' => 5.0,
    'notes' => 'Holiday vacation'
]);

$response = $timeOffApi->timeOffAddATimeOffRequest($request);

PHP;

echo "\n✓ Type-safe request objects with validation!\n\n";

// ============================================================================
// PATTERN 4: Get Custom Report
// ============================================================================

echo "\n4. GET CUSTOM REPORT\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$report = $bamboo->getReport(123, 'JSON');

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$reportsApi = $client->reports();
// Note: Actual signature is getCompanyReport($id, $format, ...)
$report = $reportsApi->getCompanyReport(
    id: '123',
    format: 'JSON',
    fd: null,
    onlyCurrent: true
);

PHP;

echo "\n✓ Named parameters make intent clear!\n\n";

// ============================================================================
// PATTERN 5: File Upload
// ============================================================================

echo "\n5. UPLOAD EMPLOYEE FILE\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$bamboo->uploadFile('123', '/path/to/document.pdf', [
    'fileName' => 'document.pdf',
    'category' => 'contract'
]);

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$filesApi = $client->employeeFiles();
$file = new SplFileObject('/path/to/document.pdf', 'r');

$filesApi->uploadEmployeeFile(
    id: '123',
    file: $file,
    fileName: 'document.pdf',
    category: 'contract'
);

PHP;

echo "\n✓ Works with SplFileObject - no cURL file handling!\n\n";

// ============================================================================
// PATTERN 6: Batch Operations
// ============================================================================

echo "\n6. BATCH OPERATIONS\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1 - Multiple requests):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$employeeIds = [101, 102, 103, 104, 105];
$employees = [];

foreach ($employeeIds as $id) {
    try {
        $employees[] = $bamboo->getEmployee($id);
    } catch (Exception $e) {
        // Handle errors
    }
}

PHP;

echo "\nNEW (SDK v2 with client reuse):\n";
echo <<<'PHP'
$employeeIds = [101, 102, 103, 104, 105];
$employeesApi = $client->employees();
$employees = [];

foreach ($employeeIds as $id) {
    try {
        $employees[] = $employeesApi->getEmployee(
            'firstName,lastName,workEmail',
            (string)$id
        );
    } catch (ApiException $e) {
        if ($e->getCode() !== 404) {
            throw $e; // Re-throw non-404 errors
        }
        // Skip not found employees
    }
}

PHP;

echo "\n✓ Connection reuse and better error handling!\n\n";

// ============================================================================
// PATTERN 7: Webhooks Management
// ============================================================================

echo "\n7. CREATE WEBHOOK\n";
echo str_repeat('-', 70) . "\n\n";

echo "OLD (SDK v1):\n";
echo <<<'PHP'
$bamboo = new BambooAPI('mycompany', 'api_key');
$webhook = $bamboo->addWebhook([
    'name' => 'Employee Changes',
    'monitorFields' => ['firstName', 'lastName', 'jobTitle'],
    'url' => 'https://myapp.com/webhooks/bamboo',
    'format' => 'json'
]);

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
use BhrSdk\Model\PostWebhookRequest;

$webhooksApi = $client->webhooks();
$request = new PostWebhookRequest([
    'name' => 'Employee Changes',
    'monitorFields' => ['firstName', 'lastName', 'jobTitle'],
    'url' => 'https://myapp.com/webhooks/bamboo',
    'format' => 'json'
]);

$webhook = $webhooksApi->postWebhook($request);
$webhookId = $webhook->getId();

PHP;

echo "\n✓ Typed response with webhook ID!\n\n";

// ============================================================================
// SUMMARY
// ============================================================================

echo "\n" . str_repeat('=', 70) . "\n";
echo "SDK v1 → v2 MIGRATION BENEFITS\n";
echo str_repeat('=', 70) . "\n\n";

echo "New Features:\n";
echo "  ✓ OAuth 2.0 support with automatic token refresh\n";
echo "  ✓ Built-in retry with exponential backoff\n";
echo "  ✓ Specific exception types (BadRequestException, etc.)\n";
echo "  ✓ getPotentialCauses() and getDebuggingTips() on errors\n";
echo "  ✓ PHP 8.1+ features (enums, union types, named params)\n\n";

echo "Developer Experience:\n";
echo "  ✓ Fluent builder pattern for configuration\n";
echo "  ✓ Named parameters for clarity\n";
echo "  ✓ Type-safe requests and responses\n";
echo "  ✓ IDE autocompletion support\n";
echo "  ✓ Better error messages with context\n\n";

echo "Code Quality:\n";
echo "  ✓ Strict type checking\n";
echo "  ✓ Built-in validation\n";
echo "  ✓ Easier to test with dependency injection\n";
echo "  ✓ Modern coding standards\n";
echo "  ✓ Comprehensive documentation\n\n";

echo "Migration Notes:\n";
echo "  → Most method names are similar: getEmployee(), getDirectory(), etc.\n";
echo "  → Main difference: fluent API client builder vs constructor\n";
echo "  → See MIGRATION.md for detailed mapping of all v1 → v2 methods\n";
echo "  → Examples in this file show side-by-side comparisons\n";
