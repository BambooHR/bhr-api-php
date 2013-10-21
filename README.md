bhr-api-php
===========

A PHP wrapper for the [BambooHR API](http://www.bamboohr.com/api/documentation)

Quick Start
===========
````
<?php
include "BambooHR/API/API.php";

use \BambooHR\API\API;

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

