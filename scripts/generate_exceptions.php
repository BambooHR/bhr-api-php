<?php
/**
 * Exception Generator
 *
 * This script generates exception classes and documentation for each error type defined in ApiErrorHelper
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Import the ApiErrorHelper class to access the error messages
use BhrSdk\ApiErrorHelper;

// Path to the mustache template directory and file
$templateDir = __DIR__ . '/../templates-php';
$classTemplateName = 'exception_class.mustache';
$docTemplateName = 'exception_doc.mustache';
$clientDocTemplateName = 'client_exception_doc.mustache';
$serverDocTemplateName = 'server_exception_doc.mustache';
$outputDir = __DIR__ . '/../lib/Exceptions';
$docsOutputDir = __DIR__ . '/../docs/Exceptions/Classes';

// Check if the templates exist
if (!file_exists($templateDir . '/' . $classTemplateName)) {
	die("Error: Class template file not found at {$templateDir}/{$classTemplateName}\n");
}

if (!file_exists($templateDir . '/' . $docTemplateName)) {
	die("Error: Doc template file not found at {$templateDir}/{$docTemplateName}\n");
}

if (!file_exists($templateDir . '/' . $baseDocTemplateName)) {
	die("Error: Base doc template file not found at {$templateDir}/{$baseDocTemplateName}\n");
}

if (!file_exists($templateDir . '/' . $clientDocTemplateName)) {
	die("Error: Client doc template file not found at {$templateDir}/{$clientDocTemplateName}\n");
}

if (!file_exists($templateDir . '/' . $serverDocTemplateName)) {
	die("Error: Server doc template file not found at {$templateDir}/{$serverDocTemplateName}\n");
}

// Create docs directory if it doesn't exist
if (!is_dir($docsOutputDir)) {
	mkdir($docsOutputDir, 0755, true);
}

// Get the error messages from ApiErrorHelper
$errorMessages = ApiErrorHelper::$ERROR_MESSAGES;

// Sort the error codes numerically
ksort($errorMessages);

// Set up the Mustache engine with the filesystem loader
$mustache = new \Mustache_Engine([
	'loader' => new \Mustache_Loader_FilesystemLoader($templateDir)
]);

// Arrays to track client and server exceptions for documentation
$clientExceptions = [];
$serverExceptions = [];

// Count of generated files
$generatedCount = 0;
$docCount = 0;

// Generate an exception class for each error type
foreach ($errorMessages as $code => $info) {
	// Skip if type is not defined
	if (!isset($info['type'])) {
		echo "Warning: Error code {$code} does not have a type defined, skipping.\n";
		continue;
	}

	// Determine the parent class based on the status code
	$parentClass = ($code >= 500) ? 'ServerException' : 'ClientException';

	// Add to the appropriate exception list for documentation
	if ($code >= 500) {
		$serverExceptions[] = $info['type'];
	} else {
		$clientExceptions[] = $info['type'];
	}

	// Prepare the data for the templates
	$data = [
		'className' => $info['type'],
		'description' => $info['title'],
		'statusCode' => $code,
		'parentClass' => $parentClass,
		'causes' => $info['causes'] ?? [],
		'tips' => $info['tips'] ?? []
	];

	// Render the class template
	$classOutput = $mustache->render($classTemplateName, $data);

	// Write the class output to a file
	$classOutputFile = $outputDir . '/' . $info['type'] . 'Exception.php';
	file_put_contents($classOutputFile, $classOutput);
	$generatedCount++;

	// Render the documentation template
	$docOutput = $mustache->render($docTemplateName, $data);

	// Write the documentation output to a file
	$docOutputFile = $docsOutputDir . '/' . $info['type'] . 'Exception.md';
	file_put_contents($docOutputFile, $docOutput);
	$docCount++;
}

// Sort the exception lists alphabetically
sort($clientExceptions);
sort($serverExceptions);

// Generate documentation for base exception classes

// ClientException documentation
$clientDocOutput = $mustache->render($clientDocTemplateName, [
	'clientExceptions' => $clientExceptions
]);
$clientDocOutputFile = $docsOutputDir . '/ClientException.md';
file_put_contents($clientDocOutputFile, $clientDocOutput);
$docCount++;

// ServerException documentation
$serverDocOutput = $mustache->render($serverDocTemplateName, [
	'serverExceptions' => $serverExceptions
]);
$serverDocOutputFile = $docsOutputDir . '/ServerException.md';
file_put_contents($serverDocOutputFile, $serverDocOutput);
$docCount++;

echo "Generated {$generatedCount} exception classes in {$outputDir}\n";
echo "Generated {$docCount} documentation files in {$docsOutputDir}\n";
