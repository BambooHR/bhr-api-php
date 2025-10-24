<?php
/**
 * Example 4: Common API Patterns - Old vs New
 * 
 * Side-by-side comparison of common BambooHR API operations
 * showing migration from direct API calls to SDK v2.
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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$url = "https://mycompany.bamboohr.com/v1/employees/directory";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$directory = json_decode($response, true);

foreach ($directory['employees'] as $employee) {
    echo $employee['displayName'] . "\n";
}

PHP;

echo "\nNEW (SDK v2):\n";
echo <<<'PHP'
$employeesApi = $client->employees();
$directory = $employeesApi->getEmployeesDirectory();

// Use array access since SDK model may be incomplete
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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$url = "https://mycompany.bamboohr.com/v1/employees/123";
$data = json_encode([
    'firstName' => 'John',
    'lastName' => 'Doe',
    'jobTitle' => 'Senior Developer'
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data)
]);
curl_exec($ch);

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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$url = "https://mycompany.bamboohr.com/v1/employees/123/time_off/request";
$data = json_encode([
    'start' => '2024-12-20',
    'end' => '2024-12-27',
    'timeOffTypeId' => 1,
    'status' => 'approved',
    'amount' => 5.0,
    'notes' => 'Holiday vacation'
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$reportId = 123;
$format = 'JSON';
$url = "https://mycompany.bamboohr.com/v1/reports/{$reportId}?format={$format}";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
$report = json_decode(curl_exec($ch), true);

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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$url = "https://mycompany.bamboohr.com/v1/employees/123/files";
$filePath = '/path/to/document.pdf';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'file' => new CURLFile($filePath),
    'fileName' => 'document.pdf',
    'category' => 'contract'
]);
curl_exec($ch);

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

echo "OLD (Multiple cURL requests):\n";
echo <<<'PHP'
$employeeIds = [101, 102, 103, 104, 105];
$employees = [];

foreach ($employeeIds as $id) {
    $url = "https://mycompany.bamboohr.com/v1/employees/{$id}";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $employees[] = json_decode($response, true);
    curl_close($ch);
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

echo "OLD (Direct cURL):\n";
echo <<<'PHP'
$url = "https://mycompany.bamboohr.com/v1/webhooks";
$data = json_encode([
    'name' => 'Employee Changes',
    'monitorFields' => ['firstName', 'lastName', 'jobTitle'],
    'url' => 'https://myapp.com/webhooks/bamboo',
    'format' => 'json'
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, "$apiKey:x");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_exec($ch);

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
echo "MIGRATION BENEFITS SUMMARY\n";
echo str_repeat('=', 70) . "\n\n";

echo "Code Quality:\n";
echo "  ✓ Type-safe requests and responses\n";
echo "  ✓ IDE autocompletion support\n";
echo "  ✓ No manual JSON encoding/decoding\n";
echo "  ✓ No HTTP header management\n";
echo "  ✓ Built-in validation\n\n";

echo "Developer Experience:\n";
echo "  ✓ Fluent, readable API\n";
echo "  ✓ Named parameters\n";
echo "  ✓ Clear method names\n";
echo "  ✓ Comprehensive error handling\n";
echo "  ✓ OAuth with auto-refresh\n\n";

echo "Maintenance:\n";
echo "  ✓ Less code to maintain\n";
echo "  ✓ Easier to test\n";
echo "  ✓ Better error messages\n";
echo "  ✓ Automatic SDK updates\n";
echo "  ✓ Community support\n\n";

echo "Performance:\n";
echo "  ✓ HTTP connection pooling\n";
echo "  ✓ Efficient serialization\n";
echo "  ✓ Automatic retry logic\n";
echo "  ✓ Request/response caching options\n";
