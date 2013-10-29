<?php

include "BambooHR/API/API.php";
use \BambooHR\API\BambooAPI as BHR;

//this can be either your subdomain, or the full domain, so either "test", or "test.bamboohr.com"
$api = new BHR('<your domain>');
//Users can create an api key in bamboohr, see http://www.bamboohr.com/api/documentation/#authentication for more details.
$api->setSecretKey('<your key>');
//or if you have contacted BambooHR to get an application key, you can allow users to login with their usernames and passwords. You should not store usernames and passwords, but store keys instead.
$authenticated = $api->login('<your application key>', '<username>', '<password>');
if(!$authenticated) {
	trigger_error("Login Failure");
}

//It's a good idea to take a look at the fields that are available in your account
$response = $api->getFields();
//$response is an object representing the HTTP response. Errors can be detected by testing the statusCode:
if($response->statusCode < 200 || $response->statusCode > 299) {
	trigger_error("Login Failure");
}
//or by using $response->isError()
if($response->isError()) {
	trigger_error("Login Failure");
}
//APIs return in XML format by default. The getContent() function will return a
//SimpleXMLElement object of the root XML element in the response. If JSON is
//returned, it will return a stdclass object.
$xml = $response->getContent();
foreach($xml->field as $field ){
	echo "Field: " . $field;
}

//tables can either be a list of items (like contacts), or a historical record (like job history), but can be accessed in similar ways.
$response = $api->getTables();
//This will allow you to view valid values for "list" fields.
$response = $api->getLists();

$fields = array('lastName', 'firstName', 'employeeNumber');
$response = $api->getCustomReport('xml',$fields);
if($response->isError()){
	//for many errors, Bamboo will add a header "X-BambooHR-Error-Messsage" that describes the error. These messages are meant for debugging purposes.
	trigger_error("Problem with custom report: " . $response->getErrorMessage());
}

