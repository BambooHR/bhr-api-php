BambooHR API PHP Package
===========

A PHP wrapper for the [BambooHR API](https://documentation.bamboohr.com)

Quick Start
===========
You will need two pieces of information to get started.

1. The company subdomain of your BambooHR account. If you access bamboo at hamsterfarm.bamboohr.com, this is "hamsterfarm"
2. An API key. You can find instructions on obtaining an API key [here](https://documentation.bamboohr.com/docs/getting-started#authentication)
3. Install with composer `composer require bamboohr/api`

Once you have that, the following code will get a directory of employees (as long as your user is able to access the directory)

````
<?php
include "BambooHR/BambooAPI.php";

use \BambooHR\API\BambooAPI;

$bhr = new BambooAPI("<company_subdomain>");
$bhr->setSecretKey("<bar>");
$response = $bhr->getDirectory();
if($response->isError()) {
   trigger_error("Error communicating with BambooHR: " . $response->getErrorMessage());
}
$simplexml = $response->getContent();
...
?>
````
After that, you may want to explore the employee [api](https://documentation.bamboohr.com/reference/get-employees-directory), or 
just look through the wrapper code.


JSON
====

To get JSON output, change the following line :
``` 
$bhr = new BambooAPI("<company_subdomain>");
```
to this:
``` 
$bhr = new BambooAPI("<company_subdomain>", new BambooJSONHTTP());
```
