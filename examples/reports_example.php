<?php

require_once __DIR__ . '/common.php';

use BambooHR\SDK\Model\CustomReport;

try {
	// Create a BambooHR client
	$client = createBambooHRClient();

	echo "=== Reports Resource Examples ===\n\n";

	// Example 1: Create and run a custom report
	echo "1. Creating and running a custom report...\n";
	try {
		$report = new CustomReport('Active Employees Report');
		$report->fields = ['id', 'firstName', 'lastName', 'jobTitle', 'department', 'supervisor'];

		// Add a filter for active employees
		if (!isset($report->filterBy)) {
			$report->filterBy = [];
		}
		$report->filterBy[] = [
			'field' => 'status',
			'operator' => '=',
			'value' => 'Active'
		];

		$reportData = $client->reports()->requestCustomReport($report);

		echo "Custom Report Results:\n";
		echo "Total employees in report: " . count($reportData->employees) . "\n";

		// Display the first few employees from the report if available
		if (!empty($reportData->employees)) {
			$limit = min(3, count($reportData->employees));
			echo "First {$limit} employees in report:\n";

			for ($i = 0; $i < $limit; $i++) {
				$emp = $reportData->employees[$i];
				echo "- {$emp['firstName']} {$emp['lastName']}";
				echo isset($emp['jobTitle']) ? " ({$emp['jobTitle']})" : "";
				echo "\n";
			}
		}
		echo "✓ Custom report generation successful\n";
	} catch (\Exception $e) {
		echo "✗ Error running custom report: " . $e->getMessage() . "\n";
	}

	// Example 3: Getting available datasets
	echo "\n2. Getting available datasets...\n";
	try {
		// Note: This endpoint may not be available in all accounts
		$datasets = $client->reports()->getDatasets()['datasets'] ?? [];

		if (!empty($datasets)) {
			echo "Available Datasets: " . count($datasets) . " datasets found\n";

			// Display a few datasets if available
			$limit = min(3, count($datasets));
			echo "Sample datasets:\n";

			for ($i = 0; $i < $limit; $i++) {
				$dataset = $datasets[$i];
				echo "- {$dataset['name']}\n";
			}
		} else {
			echo "No datasets found or endpoint not available.\n";
		}
		echo "✓ Datasets check completed\n";
	} catch (\Exception $e) {
		echo "Note: Datasets endpoint may not be available in your account.\n";
		echo "This is expected and not an error in your code.\n";
	}

	// Example 3: Get data from a dataset
	echo "\n3. Getting data from a dataset...\n";
	try {
		// First, get the list of available datasets to find one to use
		$datasets = $client->reports()->getDatasets()['datasets'] ?? [];
		if (empty($datasets)) {
			echo "No datasets available.\n";
		} else {
			// Use the first available dataset for this example
			$dataset = $datasets[0];
			$datasetName = $dataset['name'];
			echo "Using dataset: {$datasetName}\n";

			// Request data from the dataset
			$params = [
				'datasetName' => $datasetName,
				'fields' => isset($dataset['fields']) ? array_slice($dataset['fields'], 0, 3) : [], // Get first 3 fields if available
				'limit' => 5 // Only get 5 records for the example
			];

			$data = $client->reports()->getDataFromDataset($datasetName, $params);

			// Display the results
			if (isset($data['fields']) && isset($data['data'])) {
				echo "Fields: " . implode(', ', array_column($data['fields'], 'name')) . "\n";
				echo "Sample data (up to 5 records):\n";
				foreach (array_slice($data['data'], 0, 5) as $record) {
					echo "- " . implode(', ', $record) . "\n";
				}
			} else {
				echo "No data available in the dataset.\n";
			}
		}
		echo "✓ Dataset data retrieval completed\n";
	} catch (\Exception $e) {
		echo "✗ Error getting dataset data: " . $e->getMessage() . "\n";
	}

	// Example 4: Run a report with different parameters
	echo "\n4. Creating a department summary report...\n";
	try {
		$report = new CustomReport('Department Summary Report');
		$report->fields = ['department', 'employeeCount'];

		// Add a filter for active employees
		if (!isset($report->filterBy)) {
			$report->filterBy = [];
		}
		$report->filterBy[] = [
			'field' => 'status',
			'operator' => '=',
			'value' => 'Active'
		];

		// Add groupBy to the array when converting to array
		$reportArray = $report->toArray();
		$reportArray['groupBy'] = ['department'];

		$reportData = $client->reports()->requestCustomReport($reportArray);

		echo "Department Summary Report Results:\n";
		if (isset($reportData->groups) && !empty($reportData->groups)) {
			foreach ($reportData->groups as $group) {
				if (isset($group->department) && isset($group->employeeCount)) {
					echo "- {$group->department}: {$group->employeeCount} employees\n";
				}
			}
		} else {
			echo "No department groups found in the report.\n";
		}
		echo "✓ Department summary report successful\n";
	} catch (\Exception $e) {
		echo "✗ Error running department report: " . $e->getMessage() . "\n";
	}
} catch (\Throwable $e) {
	handleException($e);
}
