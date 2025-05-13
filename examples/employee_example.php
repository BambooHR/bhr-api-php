<?php

require_once __DIR__ . '/common.php';

use BambooHR\SDK\Model\Employee;

try {
    // Create a BambooHR client
    $client = createBambooHRClient();

    echo "=== Employee Resource Examples ===\n\n";

    // Get a list of employees
    echo "1. Fetching employees...\n";
    $employees = $client->employees()->getAllEmployees([
        'id', 'firstName', 'lastName', 'jobTitle', 'department'
    ]);
    
    echo "Found " . count($employees) . " employees\n";
    
    // Display a few sample employees
    $sampleEmployees = array_slice($employees, 0, 3);
    foreach ($sampleEmployees as $employee) {
        echo "- {$employee->firstName} {$employee->lastName} ({$employee->jobTitle})\n";
    }
    
    // Get the first employee ID for further examples
    $employeeId = $employees[0]->id;

    // Example 2: Get employee details
    echo "\n2. Getting employee details...\n";
    $employee = $client->employees()->getEmployee($employeeId, [
        'firstName', 'lastName', 'jobTitle', 'department', 'workEmail', 'hireDate', 'status'
    ]);

    echo "Employee details:\n";
    echo "- Name: {$employee->firstName} {$employee->lastName}\n";
    echo "- Job Title: {$employee->jobTitle}\n";
    echo "- Department: {$employee->department}\n";
    echo "- Email: {$employee->workEmail}\n";
    echo "- Hire Date: {$employee->hireDate}\n";
    echo "- Status: {$employee->status}\n";

    // Example 3: Get employee job information
    echo "\n3. Getting employee job information...\n";
    $jobInfo = $client->employees()->getEmployeeTable($employeeId, 'jobInfo');
    
    echo "Job Information:\n";
    if (!empty($jobInfo)) {
        // Display the most recent job information
        $latestJob = end($jobInfo);
        echo "- Title: {$latestJob['jobTitle']}\n";
        echo "- Department: {$latestJob['department']}\n";
        echo "- Location: {$latestJob['location']}\n";
        echo "- Division: {$latestJob['division']}\n";
        echo "- Reports To: {$latestJob['reportsTo']}\n";
        echo "- Start Date: {$latestJob['date']}\n";
    } else {
        echo "No job information found for this employee.\n";
    }

    // Example 4: Get employee photo
    echo "\n4. Getting employee photo...\n";
    $photoData = $client->employees()->getPhoto($employeeId, 'small');
    
    if (!empty($photoData)) {
        echo "Successfully retrieved employee photo (" . strlen($photoData) . " bytes).\n";
    } else {
        echo "No photo found for this employee.\n";
    }
} catch (\Throwable $e) {
    handleException($e);
}