# MySdk\EmployeesApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployee()**](EmployeesApi.md#addEmployee) | **POST** /api/v1/employees | Add Employee |
| [**getCompanyInformation()**](EmployeesApi.md#getCompanyInformation) | **GET** /api/v1/company_information | Get Company Information |
| [**getEmployee()**](EmployeesApi.md#getEmployee) | **GET** /api/v1/employees/{id} | Get Employee |
| [**getEmployeesDirectory()**](EmployeesApi.md#getEmployeesDirectory) | **GET** /api/v1/employees/directory | Get Employee Directory |
| [**updateEmployee()**](EmployeesApi.md#updateEmployee) | **POST** /api/v1/employees/{id} | Update Employee |


## `addEmployee()`

```php
addEmployee($post_new_employee)
```

Add Employee

Add a new employee. New employees must have at least a first name and a last name. The ID of the newly created employee is included in the Location header of the response. Other fields can be included. Please see the [fields](ref:metadata-get-a-list-of-fields) endpoint. New Employees added to a pay schedule synced with Trax Payroll must have the following required fields (listed by API field name): employeeNumber, firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, country, employmentHistoryStatus, exempt, payType, payRate, payPer, location, department, and division.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new MySdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_new_employee = new \MySdk\Model\PostNewEmployee(); // \MySdk\Model\PostNewEmployee

try {
    $apiInstance->addEmployee($post_new_employee);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->addEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **post_new_employee** | [**\MySdk\Model\PostNewEmployee**](../Model/PostNewEmployee.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyInformation()`

```php
getCompanyInformation(): \MySdk\Model\GetCompanyInformation200Response
```

Get Company Information

Gets Company Information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new MySdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompanyInformation();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getCompanyInformation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MySdk\Model\GetCompanyInformation200Response**](../Model/GetCompanyInformation200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployee()`

```php
getEmployee($fields, $id, $only_current, $accept_header_parameter): \MySdk\Model\GetEmployee200Response
```

Get Employee

Get employee data by specifying a set of fields. This is suitable for getting basic employee information, including current values for fields that are part of a historical table, like job title, or compensation information. See the [fields](ref:metadata-get-a-list-of-fields) endpoint for a list of possible fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new MySdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = 'firstName,lastName'; // string | {fields} is a comma separated list of values taken from the official list of field names.
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$only_current = false; // bool | Setting to false will return future dated values from history table fields.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployee($fields, $id, $only_current, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fields** | **string**| {fields} is a comma separated list of values taken from the official list of field names. | [default to &#39;firstName,lastName&#39;] |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **only_current** | **bool**| Setting to false will return future dated values from history table fields. | [optional] [default to false] |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\MySdk\Model\GetEmployee200Response**](../Model/GetEmployee200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeesDirectory()`

```php
getEmployeesDirectory($accept_header_parameter): \MySdk\Model\GetEmployee200Response
```

Get Employee Directory

Gets employee directory.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new MySdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployeesDirectory($accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getEmployeesDirectory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\MySdk\Model\GetEmployee200Response**](../Model/GetEmployee200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployee()`

```php
updateEmployee($id, $employee)
```

Update Employee

Update an employee, based on employee ID. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the API user will need to update the employee with all of the following required fields for the update to be successful (listed by API field name): employeeNumber, firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, country, employmentHistoryStatus, exempt, payType, payRate, payPer, location, department, and division.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new MySdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is an employee ID.
$employee = new \MySdk\Model\Employee(); // \MySdk\Model\Employee

try {
    $apiInstance->updateEmployee($id, $employee);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->updateEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. | |
| **employee** | [**\MySdk\Model\Employee**](../Model/Employee.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
