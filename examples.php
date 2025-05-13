<?php

require_once 'vendor/autoload.php';

use \BambooHR\API\BambooAPI;

// Load environment variables from .env file
if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
        putenv("$key=$value");
    }
}

// Read configuration from environment variables
$baseUrl = isset($_ENV['BAMBOOHR_BASE_URL']) ? $_ENV['BAMBOOHR_BASE_URL'] : 'https://api.bamboohr.com/api/gateway.php';
$companyName = isset($_ENV['BAMBOOHR_COMPANY']) ? $_ENV['BAMBOOHR_COMPANY'] : '';
$applicationKey = isset($_ENV['BAMBOOHR_APP_KEY']) ? $_ENV['BAMBOOHR_APP_KEY'] : '';
$userEmail = isset($_ENV['BAMBOOHR_USER_EMAIL']) ? $_ENV['BAMBOOHR_USER_EMAIL'] : '';
$userPassword = isset($_ENV['BAMBOOHR_USER_PASSWORD']) ? $_ENV['BAMBOOHR_USER_PASSWORD'] : '';

$api = new BambooAPI($companyName, null, $baseUrl);

$authenticated = $api->login($applicationKey, $userEmail, $userPassword);
if(!$authenticated) {
	trigger_error("Login Failure");
}

//It's a good idea to take a look at the fields that are available in your account
$response = $api->getFields();
//$response is an object representing the HTTP response. Errors can be detected by testing the statusCode:
if($response->statusCode < 200 || $response->statusCode > 299) {
	trigger_error("API Error Code: " . $response->statusCode);
}
//or by using $response->isError()
if($response->isError()) {
	trigger_error("API Error: " . $response->getErrorMessage());
}
//APIs return in XML format by default. The getContent() function will return a
//SimpleXMLElement object of the root XML element in the response. If JSON is
//returned, it will return a stdclass object.
$xml = new \SimpleXMLElement($response->content);
echo "\nFields available in your account:\n";
foreach($xml->field as $field ){
	echo "Field: " . $field . "\n";
}

//tables can either be a list of items (like contacts), or a historical record (like job history), but can be accessed in similar ways.
$response = $api->getTables();
//This will allow you to view valid values for "list" fields.
$response = $api->getLists();

$fields = array('lastName', 'firstName', 'employeeNumber');
$response = $api->getCustomReport('xml',$fields);
if($response->isError()){
	//for many errors, Bamboo will add a header "X-BambooHR-Error-Message" that describes the error. These messages are meant for debugging purposes.
	trigger_error("Problem with custom report: " . $response->getErrorMessage());
}

