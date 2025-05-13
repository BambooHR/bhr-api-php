<?php

require_once __DIR__ . '/common.php';

use BambooHR\SDK\Model\Employee;

try {
    // Create a BambooHR client
    $client = createBambooHRClient();

    echo "=== Employee Create and Update Examples ===\n\n";

    // Example 1: Get an existing employee
    echo "1. Getting an existing employee...\n";
    
    // Get a list of employees
    $employees = $client->employees()->getAllEmployees([
        'id', 'firstName', 'lastName', 'jobTitle', 'department', 'workEmail'
    ]);
    
    if (empty($employees)) {
        echo "No employees found. Cannot proceed with examples.\n";
        exit;
    }
    
    // Use the first employee for our examples
    $employee = $employees[0];
    echo "Found employee: {$employee->firstName} {$employee->lastName}\n";
    echo "- ID: {$employee->id}\n";
    echo "- Job Title: {$employee->jobTitle}\n";
    echo "- Department: {$employee->department}\n";
    echo "- Email: {$employee->workEmail}\n";
    // Example 2: Update an employee
    echo "\n2. Updating an employee...\n";
    
    // Create an employee object with updated data
    $updatedEmployee = new Employee();
    $updatedEmployee->id = $employee->id;
    $updatedEmployee->firstName = $employee->firstName;
    $updatedEmployee->lastName = "Updated Last Name";
    $updatedEmployee->jobTitle = "Senior " . $employee->jobTitle;
    
    echo "Employee to update:\n";
    echo "- ID: {$updatedEmployee->id}\n";
    echo "- Name: {$updatedEmployee->firstName} {$updatedEmployee->lastName}\n";
    echo "- Job Title: {$updatedEmployee->jobTitle}\n";
    
    // Uncomment to actually update the employee:
    // $result = $client->employees()->updateEmployee($updatedEmployee->id, $updatedEmployee);
    
    // Example 3: Create a new employee
    echo "\n3. Creating a new employee...\n";
    
    // Create a new employee object
    $newEmployee = new Employee();
    $newEmployee->firstName = "John";
    $newEmployee->lastName = "Doe";
    $newEmployee->workEmail = "john.doe@example.com";
    $newEmployee->jobTitle = "Software Developer";
    $newEmployee->department = "Engineering";
    
    echo "New employee data:\n";
    echo "- Name: {$newEmployee->firstName} {$newEmployee->lastName}\n";
    echo "- Job Title: {$newEmployee->jobTitle}\n";
    echo "- Department: {$newEmployee->department}\n";
    echo "- Email: {$newEmployee->workEmail}\n";
    
    // Uncomment to actually create the employee:
    // $result = $client->employees()->addEmployee($newEmployee);

} catch (\Throwable $e) {
    handleException($e);
}
