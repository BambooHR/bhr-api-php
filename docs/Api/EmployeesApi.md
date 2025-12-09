# BhrSdk\EmployeesApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployee()**](EmployeesApi.md#addEmployee) | **POST** /api/v1/employees | Create Employee |
| [**getCompanyInformation()**](EmployeesApi.md#getCompanyInformation) | **GET** /api/v1/company_information | Get Company Information |
| [**getEmployee()**](EmployeesApi.md#getEmployee) | **GET** /api/v1/employees/{id} | Get Employee |
| [**getEmployeesDirectory()**](EmployeesApi.md#getEmployeesDirectory) | **GET** /api/v1/employees/directory | Get Employee Directory |
| [**getEmployeesList()**](EmployeesApi.md#getEmployeesList) | **GET** /api/v1/employees | Get Employees |
| [**updateEmployee()**](EmployeesApi.md#updateEmployee) | **POST** /api/v1/employees/{id} | Update Employee |


## `addEmployee()`

```php
addEmployee($post_new_employee)
```

Create Employee

Add a new employee. New employees must have at least a first name and a last name. The ID of the newly created employee is included in the Location header of the response. Other fields can be included. Please see the [fields](ref:metadata-get-a-list-of-fields) endpoint. New Employees added to a pay schedule synced with Trax Payroll must have the following required fields (listed by API field name): employeeNumber, firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, country, employmentHistoryStatus, exempt, payType, payRate, payPer, location, department, and division.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_new_employee = new \BhrSdk\Model\PostNewEmployee(); // \BhrSdk\Model\PostNewEmployee

try {
    $apiInstance->addEmployee($post_new_employee);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->addEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **post_new_employee** | [**\BhrSdk\Model\PostNewEmployee**](../Model/PostNewEmployee.md)|  | |

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
getCompanyInformation(): \BhrSdk\Model\CompanyInformation
```

Get Company Information

Gets Company Information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
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

[**\BhrSdk\Model\CompanyInformation**](../Model/CompanyInformation.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployee()`

```php
getEmployee($fields, $id, $only_current, $accept_header_parameter): \BhrSdk\Model\Employee
```

Get Employee

Get employee data by specifying a set of fields. This is suitable for getting basic employee information, including current values for fields that are part of a historical table, like job title, or compensation information. See the [fields](ref:metadata-get-a-list-of-fields) endpoint for a list of possible fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
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

[**\BhrSdk\Model\Employee**](../Model/Employee.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeesDirectory()`

```php
getEmployeesDirectory($accept_header_parameter): \BhrSdk\Model\JsonDirectoryEmployee
```

Get Employee Directory

Gets employee directory.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
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

[**\BhrSdk\Model\JsonDirectoryEmployee**](../Model/JsonDirectoryEmployee.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeesList()`

```php
getEmployeesList($filter, $sort, $page): \BhrSdk\Model\GetEmployeesResponseObject
```

Get Employees

Retrieve a paginated list of employees with optional filtering and sorting. Returns a fixed set of simple employee fields that support efficient filter and sort operations. For more complex employee data, use the single-employee endpoint or the Datasets API for bulk queries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = new \BhrSdk\Model\\BhrSdk\Model\GetEmployeesFilterRequestObject(); // \BhrSdk\Model\GetEmployeesFilterRequestObject | Filters used to match employees. Encode filter properties using deepObject style. If the caller does not have access to the filtered field on a matching employee, that employee is excluded from the results to avoid leaking sensitive data.
$sort = 'sort_example'; // string | Comma-separated list of sortable fields. Prefix a field with \"-\" for descending order. Allowed fields: `employeeId`, `firstName`, `lastName`, `preferredName`, `jobTitleName`, `status`. Nulls sort first in ascending order and last in descending order. If the caller does not have access to the sort field for an employee, that employee is excluded from the final result set to avoid leaking sensitive information.
$page = new \BhrSdk\Model\\BhrSdk\Model\CursorPaginationQueryObject(); // \BhrSdk\Model\CursorPaginationQueryObject | Cursor-based pagination parameters (`limit`, `after`, `before`).

try {
    $result = $apiInstance->getEmployeesList($filter, $sort, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getEmployeesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | [**\BhrSdk\Model\GetEmployeesFilterRequestObject**](../Model/.md)| Filters used to match employees. Encode filter properties using deepObject style. If the caller does not have access to the filtered field on a matching employee, that employee is excluded from the results to avoid leaking sensitive data. | [optional] |
| **sort** | **string**| Comma-separated list of sortable fields. Prefix a field with \&quot;-\&quot; for descending order. Allowed fields: &#x60;employeeId&#x60;, &#x60;firstName&#x60;, &#x60;lastName&#x60;, &#x60;preferredName&#x60;, &#x60;jobTitleName&#x60;, &#x60;status&#x60;. Nulls sort first in ascending order and last in descending order. If the caller does not have access to the sort field for an employee, that employee is excluded from the final result set to avoid leaking sensitive information. | [optional] |
| **page** | [**\BhrSdk\Model\CursorPaginationQueryObject**](../Model/.md)| Cursor-based pagination parameters (&#x60;limit&#x60;, &#x60;after&#x60;, &#x60;before&#x60;). | [optional] |

### Return type

[**\BhrSdk\Model\GetEmployeesResponseObject**](../Model/GetEmployeesResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

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

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is an employee ID.
$employee = new \BhrSdk\Model\Employee(); // \BhrSdk\Model\Employee

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
| **employee** | [**\BhrSdk\Model\Employee**](../Model/Employee.md)|  | |

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
