<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BambooHR\SDK\Exception\AuthenticationException;
use BambooHR\SDK\Exception\BambooHRException;
use BambooHR\SDK\Exception\NotFoundException;
use BambooHR\SDK\Exception\RateLimitException;
use BambooHR\SDK\Model\CustomReport;
use BambooHR\SDK\Model\Employee;

// -----------------------------------------------------------------------
// CONFIGURATION: Replace with your actual values
// -----------------------------------------------------------------------
// To use this example:
// 1. Replace the values below with your actual BambooHR credentials
// 2. For testing, you can use the BambooHR API Playground: https://documentation.bamboohr.com/docs/getting-started
// 3. If you don't have an access token yet, set $accessToken to empty string and the script will guide you through OAuth flow
// -----------------------------------------------------------------------

$companyDomain = 'YOUR_COMPANY_DOMAIN'; // e.g., This would be 'acmecorp' if your company domain is 'acmecorp.bamboohr.com'
$clientId = 'YOUR_CLIENT_ID';              // OAuth client ID from BambooHR
$clientSecret = 'YOUR_CLIENT_SECRET';      // OAuth client secret from BambooHR
$redirectUri = 'https://oauth.pstmn.io/v1/callback'; // Your registered OAuth redirect URI
$baseDomain = 'bamboohr.com';              // This should always be bamboohr.com unless you are using a test environment
$accessToken = 'YOUR_ACCESS_TOKEN';                         // Leave empty to go through OAuth flow, or provide a valid access token

try {
	// Use the logic in this method to perform full OAuth authorization flow
	// Create a client using the builder pattern
	$client = (new \BambooHR\SDK\BambooHRBuilder())
		->withCompanyDomain($companyDomain)
		->withBaseDomain($baseDomain)
		->withOAuth($clientId, $clientSecret, $accessToken)
		->withTimeout(30)
		->build();

	// You only need to go through the authorization flow if you don't already have an access token
	if (empty($accessToken)) {
		// Generate an authorization URL for the user to visit
		$authUrl = $client->getAuthorizationUrl([
			'redirect_uri' => $redirectUri,
			'scope' => 'employee employee_directory offline_access openid api',
			'state' => 'random_state_string'
		]);

		echo "Visit this URL to authorize the application:\n{$authUrl}\n\n";

		// Prompt the user to visit the URL and enter the authorization code
		echo "After authorizing, you will be redirected to your callback URL.\n";
		echo "The URL will look something like: $redirectUri?code=abc123&state=random_state_string\n";
		echo "Please copy the 'code' parameter value from the URL and paste it here:\n";
		$code = trim(fgets(STDIN));

		// Validate the code is not empty
		if (empty($code)) {
			throw new \Exception("Authorization code cannot be empty");
		}

		echo "\nAttempting to authenticate with the provided code...\n";

		// Authenticate with the code
		$client->authenticate('authorization_code', [
			'code' => $code,
			'redirect_uri' => $redirectUri
		]);
		$accessToken = $client->getAuthentication()->getAccessToken();
		echo "Access Token: {$accessToken}\n";
		echo "Successfully authenticated!\n\n";
	}

	// First get a list of all employees to find a valid ID
	echo "Fetching employee directory...\n";
	$directory = $client->directory()->getDirectory();
	echo "Company Directory: Found " . count($directory['employees']) . " employees\n";

	if (empty($directory['employees'])) {
		echo "No employees found in directory. Cannot proceed with employee-specific examples.\n";
	} else {
		// Get the first employee ID from the directory
		$employeeId = $directory['employees'][0]['id'];
		echo "Using employee ID: {$employeeId} for the example\n";

		try {
			// Get an employee by ID
			$employeeData = $client->employees()->getEmployee($employeeId, [
				'firstName',
				'lastName',
				'jobTitle',
				'department',
				'workEmail'
			]);

			// Convert to Employee model
			$employee = Employee::fromArray($employeeData);

			echo "Employee: {$employee->getFullName()}\n";
			echo "Job Title: " . ($employee->getJobTitle() ? $employee->getJobTitle() : 'Not specified') . "\n";
			echo "Department: " . ($employee->getDepartment() ? $employee->getDepartment() : 'Not specified') . "\n";
			echo "Email: " . ($employee->getWorkEmail() ? $employee->getWorkEmail() : 'Not specified') . "\n\n";
		} catch (\Exception $e) {
			echo "Error fetching employee details: " . $e->getMessage() . "\n";
		}
	}

	// We already fetched the directory above, so we don't need to fetch it again
	echo "\nCompany Directory Summary:\n";
	echo "Total employees: " . count($directory['employees']) . "\n\n";

	// Test Reports Endpoints
	echo "\n=== Testing Reports Endpoints ===\n";

	// 1. Create and run a custom report
	try {
		echo "1. Testing Custom Report Generation:\n";
		$report = new CustomReport('Active Employees Report');
		$report->setFields(['id', 'firstName', 'lastName', 'jobTitle', 'department', 'supervisor'])
			   ->addFilter('status', '=', 'Active');

		$reportData = $client->reports()->requestCustomReport($report->toArray());

		echo "Custom Report Results:\n";
		echo "Total employees in report: " . count($reportData['employees']) . "\n";

		// Display the first few employees from the report if available
		if (!empty($reportData['employees'])) {
			$limit = min(3, count($reportData['employees']));
			echo "First {$limit} employees in report:\n";

			for ($i = 0; $i < $limit; $i++) {
				$emp = $reportData['employees'][$i];
				echo "- {$emp['firstName']} {$emp['lastName']}";
				echo isset($emp['jobTitle']) ? " ({$emp['jobTitle']})" : "";
				echo "\n";
			}
		}
		echo "✓ Custom report generation successful\n";
	} catch (\Exception $e) {
		echo "✗ Error running custom report: " . $e->getMessage() . "\n";
	}

	// 2. Get available report fields
	try {
		echo "\n2. Testing Get Available Report Fields:\n";
		$fields = $client->reports()->getReportFields();

		echo "Available Report Fields: " . count($fields) . " fields found\n";
		// Display a few sample fields
		$sampleFields = array_slice($fields, 0, 5);
		echo "Sample fields: ";
		foreach ($sampleFields as $index => $field) {
			echo $field['name'];
			if ($index < count($sampleFields) - 1) {
				echo ", ";
			}
		}
		echo "\n";
		echo "✓ Report fields retrieval successful\n";
	} catch (\Exception $e) {
		echo "✗ Error getting report fields: " . $e->getMessage() . "\n";
	}

	// 3. Get saved reports
	try {
		echo "\n3. Testing Get Saved Reports:\n";
		$savedReports = $client->reports()->getSavedReports();

		echo "Saved Reports: " . count($savedReports) . " reports found\n";

		// Display a few saved reports if available
		if (!empty($savedReports)) {
			$limit = min(3, count($savedReports));
			echo "Sample saved reports:\n";

			for ($i = 0; $i < $limit; $i++) {
				$report = $savedReports[$i];
				echo "- {$report['name']} (ID: {$report['id']})\n";
			}
		}
		echo "✓ Saved reports retrieval successful\n";
	} catch (\Exception $e) {
		echo "✗ Error getting saved reports: " . $e->getMessage() . "\n";
	}

	// 4. Run a report with different parameters
	try {
		echo "\n4. Testing Report with Different Parameters:\n";
		$report = new CustomReport('Department Summary Report');
		$report->setFields(['department', 'employeeCount'])
			   ->addGroupBy('department')
			   ->addFilter('status', '=', 'Active');

		$reportData = $client->reports()->requestCustomReport($report->toArray());

		echo "Department Summary Report Results:\n";
		if (isset($reportData['groups']) && !empty($reportData['groups'])) {
			foreach ($reportData['groups'] as $group) {
				if (isset($group['department']) && isset($group['employeeCount'])) {
					echo "- {$group['department']}: {$group['employeeCount']} employees\n";
				}
			}
		} else {
			echo "No department groups found in the report.\n";
		}
		echo "✓ Department summary report successful\n";
	} catch (\Exception $e) {
		echo "✗ Error running department report: " . $e->getMessage() . "\n";
	}
} catch (AuthenticationException $e) {
	echo "Authentication Error: " . $e->getMessage() . "\n";
} catch (NotFoundException $e) {
	echo "Not Found Error: " . $e->getMessage() . "\n";
} catch (RateLimitException $e) {
	echo "Rate Limit Error: " . $e->getMessage() . "\n";
	echo "Please try again later.\n";
} catch (BambooHRException $e) {
	echo "BambooHR API Error: " . $e->getMessage() . "\n";
} catch (\Exception $e) {
	echo "Error: " . $e->getMessage() . "\n";
}
