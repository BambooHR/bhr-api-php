# Common Use Cases

This guide provides practical, working examples for common BambooHR API operations. Each example is complete and ready to use.

## Table of Contents

1. [Employee Operations](#employee-operations)
2. [Time Off Management](#time-off-management)
3. [File Operations](#file-operations)
4. [Custom Reports](#custom-reports)
5. [Webhooks](#webhooks)
6. [Batch Operations](#batch-operations)

---

## Prerequisites

All examples assume you have:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use BhrSdk\Client\ApiClient;
use BhrSdk\ApiException;

$client = (new ApiClient())
    ->withApiKey(getenv('BAMBOO_API_KEY'))
    ->forCompany(getenv('BAMBOO_COMPANY'))
    ->build();
```

---

## Employee Operations

### Get Single Employee

Get specific employee information:

```php
try {
    $employeesApi = $client->employees();
    
    // Get employee with specific fields
    // Remember: fields come FIRST, then ID
    $employee = $employeesApi->getEmployee(
        'firstName,lastName,workEmail,jobTitle,department,hireDate,employmentStatus',
        '123'  // Employee ID
    );
    
    // Access data using array syntax
    echo "Name: {$employee['firstName']} {$employee['lastName']}\n";
    echo "Email: {$employee['workEmail']}\n";
    echo "Title: {$employee['jobTitle']}\n";
    echo "Department: {$employee['department']}\n";
    echo "Hired: {$employee['hireDate']}\n";
    echo "Status: {$employee['employmentStatus']}\n";
    
} catch (ApiException $e) {
    if ($e->getCode() === 404) {
        echo "Employee not found\n";
    } else {
        echo "Error: {$e->getMessage()}\n";
    }
}
```

### Get Employee Directory

Get all employees in the company:

```php
try {
    $employeesApi = $client->employees();
    $directory = $employeesApi->getEmployeesDirectory();
    
    // Use flexible access for the response
    $employees = $directory['employees'] ?? [];
    
    echo "Total employees: " . count($employees) . "\n\n";
    
    foreach ($employees as $employee) {
        // Flexible access pattern
        $name = $employee['displayName'] ?? $employee->displayName ?? 'Unknown';
        $jobTitle = $employee['jobTitle'] ?? $employee->jobTitle ?? 'N/A';
        
        echo "{$name} - {$jobTitle}\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Get Multiple Employees by ID

Fetch several specific employees:

```php
$employeeIds = ['123', '456', '789'];
$employeesData = [];

$employeesApi = $client->employees();

foreach ($employeeIds as $id) {
    try {
        $employee = $employeesApi->getEmployee(
            'firstName,lastName,workEmail',
            $id
        );
        
        $employeesData[] = [
            'id' => $id,
            'name' => "{$employee['firstName']} {$employee['lastName']}",
            'email' => $employee['workEmail'],
        ];
        
    } catch (ApiException $e) {
        if ($e->getCode() === 404) {
            echo "Employee {$id} not found\n";
        } else {
            echo "Error fetching employee {$id}: {$e->getMessage()}\n";
        }
    }
}

// Process all fetched employees
foreach ($employeesData as $emp) {
    echo "{$emp['name']} ({$emp['email']})\n";
}
```

### Update Employee Information

Update employee fields:

```php
use BhrSdk\Model\EmployeeUpdateRequest;

try {
    $employeesApi = $client->employees();
    
    // Create update request
    $updateRequest = new EmployeeUpdateRequest([
        'jobTitle' => 'Senior Software Engineer',
        'department' => 'Engineering',
        'workEmail' => 'newemail@company.com',
    ]);
    
    // Update the employee
    $employeesApi->updateEmployee('123', $updateRequest);
    
    echo "Employee updated successfully\n";
    
    // Verify the update
    $updated = $employeesApi->getEmployee('jobTitle,department', '123');
    echo "New title: {$updated['jobTitle']}\n";
    echo "New department: {$updated['department']}\n";
    
} catch (ApiException $e) {
    echo "Error updating employee: {$e->getMessage()}\n";
}
```

### Add New Employee

Create a new employee record:

```php
use BhrSdk\Model\PostNewEmployee;

try {
    $employeesApi = $client->employees();
    
    // Create new employee
    $newEmployee = new PostNewEmployee([
        'firstName' => 'John',
        'lastName' => 'Doe',
        'workEmail' => 'john.doe@company.com',
        'jobTitle' => 'Software Engineer',
        'department' => 'Engineering',
        'hireDate' => '2024-01-15',
    ]);
    
    $employeesApi->addEmployee($newEmployee);
    
    echo "Employee added successfully\n";
    
} catch (ApiException $e) {
    echo "Error adding employee: {$e->getMessage()}\n";
}
```

### Search for Employees

Find employees matching criteria:

```php
use BhrSdk\Model\GetEmployeesFilterRequestObject;

try {
    $employeesApi = $client->employees();
    
    // Create filter
    $filter = new GetEmployeesFilterRequestObject([
        'status' => 'Active',
        'department' => 'Engineering',
    ]);
    
    // Get filtered employees
    $response = $employeesApi->getEmployeesList($filter);
    
    $employees = $response['employees'] ?? [];
    echo "Found " . count($employees) . " employees in Engineering\n\n";
    
    foreach ($employees as $employee) {
        echo "  • {$employee['displayName']} - {$employee['jobTitle']}\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

---

## Time Off Management

### Get Time Off Requests

Fetch time off requests for a date range:

```php
try {
    $timeOffApi = $client->timeOff();
    
    // Get requests for current year
    $startDate = date('Y-01-01');
    $endDate = date('Y-12-31');
    
    $requests = $timeOffApi->timeOffGetTimeOffRequests(
        null,           // id
        null,           // action
        null,           // employee_id
        $startDate,     // start
        $endDate,       // end
        null,           // type
        'approved'      // status
    );
    
    echo "Time Off Requests:\n\n";
    
    foreach ($requests as $request) {
        echo "Employee: {$request['name']}\n";
        echo "Dates: {$request['start']} to {$request['end']}\n";
        echo "Type: {$request['type']['name']}\n";
        echo "Status: {$request['status']['status']}\n";
        echo "---\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Create Time Off Request

Submit a new time off request:

```php
use BhrSdk\Model\TimeOffAddATimeOffRequestRequest;

try {
    $timeOffApi = $client->timeOff();
    
    // Create request
    $request = new TimeOffAddATimeOffRequestRequest([
        'employeeId' => 123,
        'start' => '2024-07-01',
        'end' => '2024-07-05',
        'timeOffTypeId' => 1,  // Get this from getTimeOffTypes()
        'status' => 'requested',
        'notes' => 'Summer vacation',
    ]);
    
    $timeOffApi->timeOffAddATimeOffRequest('123', $request);
    
    echo "Time off request submitted\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Get Time Off Balances

Check employee's time off balance:

```php
try {
    $timeOffApi = $client->timeOff();
    
    // Get employee's time off policies
    $policies = $timeOffApi->timeOffListTimeOffPoliciesForEmployee('123');
    
    echo "Time Off Balances:\n\n";
    
    foreach ($policies as $policy) {
        echo "Policy: {$policy['name']}\n";
        echo "Balance: {$policy['balance']} {$policy['units']}\n";
        echo "---\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Approve/Deny Time Off Request

Change request status:

```php
use BhrSdk\Model\TimeOffChangeARequestStatusRequest;

try {
    $timeOffApi = $client->timeOff();
    
    $statusUpdate = new TimeOffChangeARequestStatusRequest([
        'status' => 'approved',  // or 'denied', 'canceled'
        'note' => 'Approved - enjoy your vacation!',
    ]);
    
    $timeOffApi->timeOffChangeARequestStatus('456', $statusUpdate);  // Request ID
    
    echo "Time off request approved\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Who's Out Today

See who's out of office:

```php
try {
    $timeOffApi = $client->timeOff();
    
    // Get today's date
    $today = date('Y-m-d');
    
    // Get who's out
    $whosOut = $timeOffApi->getAListOfWhoIsOut($today, $today);
    
    echo "Out of Office Today:\n\n";
    
    foreach ($whosOut as $person) {
        echo "  • {$person['name']} - {$person['type']}\n";
    }
    
    if (empty($whosOut)) {
        echo "  Everyone is in the office!\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

---

## File Operations

### Upload Employee File

Upload a document for an employee:

```php
try {
    $filesApi = $client->employeeFiles();
    
    $filePath = '/path/to/document.pdf';
    $employeeId = '123';
    
    // Upload file
    $filesApi->uploadEmployeeFile(
        $employeeId,
        1,  // Category ID (get from listEmployeeFiles)
        true,  // Share with employee
        new SplFileObject($filePath, 'r')
    );
    
    echo "File uploaded successfully\n";
    
} catch (ApiException $e) {
    echo "Error uploading file: {$e->getMessage()}\n";
}
```

### Download Employee File

Download a file:

```php
try {
    $filesApi = $client->employeeFiles();
    
    $employeeId = '123';
    $fileId = '456';
    
    // Download file
    $file = $filesApi->getEmployeeFile($employeeId, $fileId);
    
    // Save to local file
    file_put_contents('downloaded_file.pdf', $file);
    
    echo "File downloaded successfully\n";
    
} catch (ApiException $e) {
    echo "Error downloading file: {$e->getMessage()}\n";
}
```

### List Employee Files

Get all files for an employee:

```php
try {
    $filesApi = $client->employeeFiles();
    
    $employeeId = '123';
    $fileList = $filesApi->listEmployeeFiles($employeeId);
    
    echo "Files for employee {$employeeId}:\n\n";
    
    foreach ($fileList['categories'] ?? [] as $category) {
        echo "Category: {$category['name']}\n";
        
        foreach ($category['files'] ?? [] as $file) {
            echo "  • {$file['name']} (ID: {$file['id']})\n";
            echo "    Uploaded: {$file['dateCreated']}\n";
            echo "    Size: {$file['size']} bytes\n";
        }
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Delete Employee File

Remove a file:

```php
try {
    $filesApi = $client->employeeFiles();
    
    $employeeId = '123';
    $fileId = '456';
    
    $filesApi->deleteEmployeeFile($employeeId, $fileId);
    
    echo "File deleted successfully\n";
    
} catch (ApiException $e) {
    echo "Error deleting file: {$e->getMessage()}\n";
}
```

---

## Custom Reports

### Run Existing Report

Execute a saved custom report:

```php
try {
    $reportsApi = $client->reports();
    
    $reportId = '123';
    $format = 'JSON';  // or 'CSV', 'PDF', 'XLS'
    
    // Request report
    $report = $reportsApi->requestCustomReport(
        $reportId,
        $format,
        true  // Only current employees
    );
    
    // Process JSON report
    if ($format === 'JSON') {
        $reportData = json_decode($report, true);
        
        echo "Report: {$reportData['title']}\n";
        echo "Employees: " . count($reportData['employees']) . "\n\n";
        
        foreach ($reportData['employees'] as $employee) {
            echo "  • {$employee['displayName']}\n";
        }
    } else {
        // Save binary formats to file
        file_put_contents("report.{$format}", $report);
        echo "Report saved to report.{$format}\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### List Available Reports

Get all custom reports:

```php
try {
    $reportsApi = $client->customReports();
    
    $reports = $reportsApi->listReports();
    
    echo "Available Custom Reports:\n\n";
    
    foreach ($reports as $report) {
        echo "ID: {$report['id']}\n";
        echo "Name: {$report['title']}\n";
        echo "---\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Get Report by ID

Fetch specific report details:

```php
try {
    $reportsApi = $client->customReports();
    
    $reportId = '123';
    $report = $reportsApi->getByReportId($reportId);
    
    echo "Report: {$report['title']}\n";
    echo "Fields: " . implode(', ', $report['fields']) . "\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

---

## Webhooks

### Register Webhook

Create a new webhook:

```php
use BhrSdk\Model\WebhookRequest;

try {
    $webhooksApi = $client->webhooks();
    
    $webhook = new WebhookRequest([
        'name' => 'Employee Changes',
        'monitorFields' => ['firstName', 'lastName', 'jobTitle', 'department'],
        'postFields' => ['id', 'action', 'lastChanged'],
        'url' => 'https://yourapp.com/webhooks/bamboo',
        'format' => 'json',
    ]);
    
    $response = $webhooksApi->postWebhook($webhook);
    
    echo "Webhook created with ID: {$response['id']}\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### List Webhooks

Get all registered webhooks:

```php
try {
    $webhooksApi = $client->webhooks();
    
    $webhooks = $webhooksApi->getWebhookList();
    
    echo "Registered Webhooks:\n\n";
    
    foreach ($webhooks as $webhook) {
        echo "ID: {$webhook['id']}\n";
        echo "Name: {$webhook['name']}\n";
        echo "URL: {$webhook['url']}\n";
        echo "Monitoring: " . implode(', ', $webhook['monitorFields']) . "\n";
        echo "---\n";
    }
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

### Handle Webhook Events

Process incoming webhook notifications:

```php
// In your webhook handler endpoint (e.g., /webhooks/bamboo)
$payload = file_get_contents('php://input');
$event = json_decode($payload, true);

// Verify the webhook is from BambooHR (implement signature verification in production)

// Process the event
$employeeId = $event['employeeId'];
$action = $event['action'];  // 'inserted', 'updated', 'deleted'

switch ($action) {
    case 'inserted':
        echo "New employee added: {$employeeId}\n";
        // Sync to your system
        break;
        
    case 'updated':
        echo "Employee updated: {$employeeId}\n";
        // Update your records
        $changedFields = $event['lastChanged'];
        foreach ($changedFields as $field => $value) {
            echo "  {$field} changed to {$value}\n";
        }
        break;
        
    case 'deleted':
        echo "Employee deleted: {$employeeId}\n";
        // Remove from your system
        break;
}

// Return 200 OK to acknowledge receipt
http_response_code(200);
```

### Delete Webhook

Remove a webhook:

```php
try {
    $webhooksApi = $client->webhooks();
    
    $webhookId = '123';
    $webhooksApi->deleteWebhook($webhookId);
    
    echo "Webhook deleted\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

---

## Batch Operations

### Bulk Employee Updates

Update multiple employees efficiently:

```php
use BhrSdk\Model\EmployeeUpdateRequest;

$employeeUpdates = [
    '123' => ['department' => 'Engineering'],
    '456' => ['department' => 'Engineering'],
    '789' => ['department' => 'Engineering'],
];

$employeesApi = $client->employees();
$results = ['success' => [], 'failed' => []];

foreach ($employeeUpdates as $employeeId => $updates) {
    try {
        $updateRequest = new EmployeeUpdateRequest($updates);
        $employeesApi->updateEmployee($employeeId, $updateRequest);
        
        $results['success'][] = $employeeId;
        echo "✓ Updated employee {$employeeId}\n";
        
    } catch (ApiException $e) {
        $results['failed'][] = [
            'id' => $employeeId,
            'error' => $e->getMessage(),
        ];
        echo "✗ Failed to update employee {$employeeId}: {$e->getMessage()}\n";
    }
    
    // Rate limiting: pause between requests
    usleep(100000);  // 0.1 second pause
}

echo "\nSummary:\n";
echo "  Success: " . count($results['success']) . "\n";
echo "  Failed: " . count($results['failed']) . "\n";
```

### Bulk Data Export

Export all employee data:

```php
try {
    $employeesApi = $client->employees();
    
    // Get directory for all employee IDs
    $directory = $employeesApi->getEmployeesDirectory();
    $employees = $directory['employees'] ?? [];
    
    $allEmployeeData = [];
    
    foreach ($employees as $employee) {
        $employeeId = $employee['id'] ?? $employee->id;
        
        try {
            // Get full employee data
            $fullData = $employeesApi->getEmployee(
                'firstName,lastName,workEmail,jobTitle,department,hireDate',
                (string)$employeeId
            );
            
            $allEmployeeData[] = $fullData;
            
        } catch (ApiException $e) {
            echo "Could not fetch employee {$employeeId}: {$e->getMessage()}\n";
        }
        
        // Rate limiting
        usleep(100000);
    }
    
    // Save to CSV
    $fp = fopen('employees_export.csv', 'w');
    fputcsv($fp, ['ID', 'First Name', 'Last Name', 'Email', 'Job Title', 'Department', 'Hire Date']);
    
    foreach ($allEmployeeData as $emp) {
        fputcsv($fp, [
            $emp['id'] ?? '',
            $emp['firstName'] ?? '',
            $emp['lastName'] ?? '',
            $emp['workEmail'] ?? '',
            $emp['jobTitle'] ?? '',
            $emp['department'] ?? '',
            $emp['hireDate'] ?? '',
        ]);
    }
    
    fclose($fp);
    
    echo "Exported " . count($allEmployeeData) . " employees to employees_export.csv\n";
    
} catch (ApiException $e) {
    echo "Error: {$e->getMessage()}\n";
}
```

---

## Error Handling Patterns

### Retry with Exponential Backoff

Handle transient failures:

```php
function apiCallWithRetry(callable $apiCall, int $maxRetries = 3): mixed
{
    $attempt = 0;
    
    while ($attempt < $maxRetries) {
        try {
            return $apiCall();
        } catch (ApiException $e) {
            $attempt++;
            
            // Only retry on specific errors
            $retryableCodes = [408, 429, 500, 502, 503, 504];
            
            if (!in_array($e->getCode(), $retryableCodes) || $attempt >= $maxRetries) {
                throw $e;
            }
            
            // Exponential backoff: 1s, 2s, 4s, 8s...
            $waitTime = pow(2, $attempt - 1);
            echo "Request failed, retrying in {$waitTime} seconds...\n";
            sleep($waitTime);
        }
    }
    
    throw new Exception('Max retries exceeded');
}

// Usage
try {
    $employee = apiCallWithRetry(function() use ($employeesApi) {
        return $employeesApi->getEmployee('firstName,lastName', '123');
    });
    
    echo "Employee: {$employee['firstName']} {$employee['lastName']}\n";
    
} catch (Exception $e) {
    echo "Failed after retries: {$e->getMessage()}\n";
}
```

---

## Additional Resources

- **Getting Started:** [GETTING_STARTED.md](GETTING_STARTED.md)
- **Authentication:** [AUTHENTICATION.md](AUTHENTICATION.md)
- **Migration Guide:** [MIGRATION.md](MIGRATION.md)
- **Example Files:** [examples/](examples/)
- **API Documentation:** https://www.bamboohr.com/api/documentation/

---

**Questions?** Open an issue on [GitHub](https://github.com/BambooHR/bhr-api-php/issues) or contact BambooHR API Support.
