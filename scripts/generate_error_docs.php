<?php
/**
 * Error Documentation Generator
 *
 * This script generates documentation for HTTP status codes and error messages
 * based on the definitions in ApiErrorHelper.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Import the ApiErrorHelper class to access the error messages
use BhrSdk\ApiErrorHelper;

// Path to the mustache template directory and file
$templateDir = __DIR__ . '/../templates-php';
$templateName = 'error_codes_doc.mustache';
$outputPath = __DIR__ . '/../docs/Exceptions/Exceptions.md';

// Check if the template exists
if (!file_exists($templateDir . '/' . $templateName)) {
	die("Error: Template file not found at {$templateDir}/{$templateName}\n");
}

// Prepare the data for the template
$data = [
	'errorCodes' => [],
	'clientExceptions' => [],
	'serverExceptions' => []
];

// Get the error messages from ApiErrorHelper
$errorMessages = ApiErrorHelper::$ERROR_MESSAGES;

// Sort the error codes numerically
ksort($errorMessages);

// Format the data for the template and collect exception types
$clientExceptions = [];
$serverExceptions = [];

foreach ($errorMessages as $code => $info) {
	// Skip if type is not defined
	if (!isset($info['type'])) {
		continue;
	}

	// Create exception entry
	$exceptionEntry = [
		'name' => $info['type'],
		'code' => $code,
		'title' => $info['title']
	];

	// Add to the appropriate exception list
	if ($code >= 500) {
		$serverExceptions[] = $exceptionEntry;
	} else {
		$clientExceptions[] = $exceptionEntry;
	}

	// Add to the error codes list
	$data['errorCodes'][] = [
		'code' => $code,
		'title' => $info['title'] ?? '',
		'type' => $info['type'] ?? 'unknown',
		'causes' => $info['causes'] ?? [],
		'tips' => $info['tips'] ?? []
	];
}

// Sort the exception lists by code
usort($clientExceptions, function($a, $b) {
	return $a['code'] <=> $b['code'];
});

usort($serverExceptions, function($a, $b) {
	return $a['code'] <=> $b['code'];
});

// Add the sorted exception lists to the data
$data['clientExceptions'] = $clientExceptions;
$data['serverExceptions'] = $serverExceptions;

// Set up the Mustache engine with the filesystem loader
// Note: Using global namespace references with backslash prefix
$mustache = new \Mustache_Engine([
	'loader' => new \Mustache_Loader_FilesystemLoader($templateDir)
]);

// Render the template
$output = $mustache->render($templateName, $data);

// Create the output directory if it doesn't exist
$outputDir = dirname($outputPath);
if (!is_dir($outputDir)) {
	mkdir($outputDir, 0755, true);
}

// Write the output to the file
file_put_contents($outputPath, $output);

echo "Exception documentation generated successfully at $outputPath\n";
