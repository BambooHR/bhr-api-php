<?php

require_once __DIR__ . '/common.php';

try {
	// Create a BambooHR client
	$client = createBambooHRClient();

	echo "=== Directory Resource Examples ===\n\n";

	// Example 1: Get the company directory
	echo "1. Fetching company directory...\n";
	$directory = $client->directory()->getDirectory();

	echo "Company Directory: Found " . count($directory['employees']) . " employees\n";

	// Display a few employees from the directory
	$sampleEmployees = array_slice($directory['employees'], 0, 3);
	echo "Sample employees:\n";

	foreach ($sampleEmployees as $employee) {
		echo "- {$employee->displayName}";
		if (isset($employee->jobTitle) && $employee->jobTitle) {
			echo ", {$employee->jobTitle}";
		}
		if (isset($employee->department) && $employee->department) {
			echo ", {$employee->department}";
		}
		echo "\n";
	}

	// Search the directory
	echo "\n2. Searching directory...\n";
	if (!empty($directory['employees'])) {
		// Use the first employee's last name as a search term for demonstration
		$searchTerm = $directory['employees'][0]->lastName;
		echo "Searching for employees with last name: {$searchTerm}\n";

		$searchResults = $client->directory()->searchDirectory($searchTerm);
		echo "Found " . count($searchResults['employees']) . " matching employees\n";

		// Display search results
		foreach ($searchResults['employees'] as $emp) {
			echo "- {$emp->displayName} (ID: {$emp->id})";
			echo isset($emp->jobTitle) && $emp->jobTitle ? ", {$emp->jobTitle}" : "";
			echo "\n";
		}
	} else {
		echo "Skipping search example as no employees were found.\n";
	}

	// Get a specific employee from the directory
	echo "\n3. Getting a specific employee from directory...\n";
	if (!empty($directory['employees'])) {
		$employeeId = $directory['employees'][0]->id;
		echo "Fetching employee with ID: {$employeeId}\n";

		$employee = $client->directory()->getDirectoryEmployee($employeeId);
		if ($employee) {
			echo "Employee details:\n";
			echo "- Name: " . ($employee->displayName ?? 'Not specified') . "\n";
			echo "- Job Title: " . ($employee->jobTitle ?? 'Not specified') . "\n";
			echo "- Department: " . ($employee->department ?? 'Not specified') . "\n";
			echo "- Work Email: " . ($employee->workEmail ?? 'Not specified') . "\n";
			echo "- Work Phone: " . ($employee->workPhone ?? 'Not specified') . "\n";
		} else {
			echo "Employee not found.\n";
		}
	} else {
		echo "Skipping employee details example as no employees were found.\n";
	}
} catch (\Throwable $e) {
	handleException($e);
}
