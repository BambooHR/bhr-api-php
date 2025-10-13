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
$outputPath = __DIR__ . '/../docs/Exceptions/HttpStatusCodes.md';

// Check if the template exists
if (!file_exists($templateDir . '/' . $templateName)) {
	die("Error: Template file not found at {$templateDir}/{$templateName}\n");
}

// Prepare the data for the template
$data = [
	'errorCodes' => []
];

// Get the error messages from ApiErrorHelper
$errorMessages = ApiErrorHelper::$ERROR_MESSAGES;

// Sort the error codes numerically
ksort($errorMessages);

// Format the data for the template
foreach ($errorMessages as $code => $info) {
	$data['errorCodes'][] = [
		'code' => $code,
		'title' => $info['title'] ?? '',
		'causes' => $info['causes'] ?? [],
		'tips' => $info['tips'] ?? []
	];
}

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

echo "Documentation generated successfully at $outputPath\n";
