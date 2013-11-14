bhr-api-php
===========

A PHP wrapper for the [BambooHR API](http://www.bamboohr.com/api/documentation)

Quick Start
===========
You will need two pieces of information to get started.

1. The company subdomain of your BambooHR account. If you access bamboo at hamsterfarm.bamboohr.com, this is "hamsterfarm"
2. An API key. You can find instructions on obtaining an API key [here](http://www.bamboohr.com/api/documentation/#authentication)

Once you have that, the following code will get a directory of employees (as long as your user is able to access the directory)

````
<?php
include "BambooHR/API/API.php";

use \BambooHR\API\BambooAPI;

$bhr = new API("<company_subdomain>");
$bhr->setSecretKey("<bar>");
$response = $bhr->getDirectory();
if($response->isError()) {
   trigger_error("Error communicating with BambooHR: " . $response->getErrorMessage());
}
$simplexml = $response->getContent();
...
?>
````
After that, you may want to explore the employee [api](http://www.bamboohr.com/api/documentation/employees.php), or 
just look through the wrapper code.
