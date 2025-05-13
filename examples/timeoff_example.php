<?php

require_once __DIR__ . '/common.php';

use BambooHR\SDK\Model\TimeOffRequest;

try {
    // Create a BambooHR client
    $client = createBambooHRClient();

    echo "=== Time Off Resource Examples ===\n\n";

    // Get current date for time off request parameters
    $today = new DateTime();
    $startDate = $today->format('Y-m-d');
    $endDate = (clone $today)->modify('+30 days')->format('Y-m-d');

    // Example 1: Get time off requests
    echo "1. Getting time off requests...\n";
    try {
        $requests = $client->timeOff()->getTimeOffRequests([
            'start' => $startDate,
            'end' => $endDate,
            'status' => 'approved,requested'
        ]);
        
        $requestCount = count($requests);
        echo "Found $requestCount time off requests between {$startDate} and {$endDate}\n";
        
        // Display the first few requests if available
        if ($requestCount > 0) {
            $limit = min(3, $requestCount);
            echo "First {$limit} time off requests:\n";
            
            for ($i = 0; $i < $limit; $i++) {
                $req = $requests[$i];
                // The API already returns TimeOffRequest objects
                $timeOffRequest = $req;
                
                echo "- ID: {$timeOffRequest->id}, Employee: {$timeOffRequest->name}\n";
                // Access nested properties using utility methods
                $typeName = $timeOffRequest->getTypeName() ?? 'Unknown';
                $statusValue = $timeOffRequest->getStatusValue() ?? 'Unknown';
                $amountValue = $timeOffRequest->getAmountValue() ?? '0';
                $amountUnit = $timeOffRequest->getAmountUnit() ?? 'days';
                
                echo "  Type: {$typeName}\n";
                echo "  Dates: {$timeOffRequest->start} to {$timeOffRequest->end}\n";
                echo "  Status: {$statusValue}\n";
                echo "  Amount: {$amountValue} {$amountUnit}\n\n";
            }
        }
    } catch (\Exception $e) {
        echo "Error getting time off requests: " . $e->getMessage() . "\n";
    }
    
    // Example 2: Get time off policies
    echo "2. Getting time off policies...\n";
    try {
        $policies = $client->timeOff()->getTimeOffPolicies();
        
        echo "Found " . count($policies) . " time off policies\n";
        
        // Display the policies
        foreach ($policies as $policy) {
            echo "- {$policy['name']} (ID: {$policy['id']})\n";
        }
    } catch (\Exception $e) {
        echo "Error getting time off policies: " . $e->getMessage() . "\n";
    }
    
    // Example 3: Get time off types
    echo "\n3. Getting time off types...\n";
    try {
		$types = $client->timeOff()->getTimeOffTypes();

        if (isset($types['timeOffTypes']) && is_array($types['timeOffTypes'])) {
            echo "Found " . count($types['timeOffTypes']) . " time off types\n";
            foreach ($types['timeOffTypes'] as $type) {
                $id = $type['id'] ?? '(No id)';
                $name = $type['name'] ?? '(No name)';
                $units = $type['units'] ?? '';
                echo "- {$name} (ID: {$id}, Units: {$units})\n";
            }
        } else {
            echo "No time off types found or unexpected structure.\n";
        }

        if (isset($types['defaultHours']) && is_array($types['defaultHours'])) {
            echo "Default Hours:\n";
            foreach ($types['defaultHours'] as $day) {
                $dayName = $day['name'] ?? '(No name)';
                $amount = $day['amount'] ?? '(No amount)';
                echo "- {$dayName}: {$amount}\n";
            }
        }
    } catch (\Exception $e) {
        echo "Error getting time off types: " . $e->getMessage() . "\n";
    }
    
    // Example 4: Get an employee's time off balances
    echo "\n4. Getting employee time off balances...\n";
    try {
        // First get an employee ID from the directory
        $directory = $client->directory()->getDirectory();
        
        if (empty($directory['employees'])) {
            echo "No employees found in directory. Skipping time off balance example.\n";
        } else {
            $employeeId = $directory['employees'][0]->id;
            echo "Getting time off balances for employee ID: {$employeeId}\n";
            
            $balances = $client->timeOff()->getTimeOffBalances($employeeId);
            
            if (empty($balances)) {
                echo "No time off balances found for this employee.\n";
            } else {
                echo "Time off balances:\n";
                foreach ($balances as $balance) {
                    echo "- {$balance['name']}: {$balance['balance']} {$balance['units']}\n";
                    if (isset($balance['usedYearToDate'])) {
                        echo "  Used year to date: {$balance['usedYearToDate']} {$balance['units']}\n";
                    }
                }
            }
        }
    } catch (\Exception $e) {
        echo "Error getting time off balances: " . $e->getMessage() . "\n";
    }

} catch (\Throwable $e) {
    handleException($e);
}
