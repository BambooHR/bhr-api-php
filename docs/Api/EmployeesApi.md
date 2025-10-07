# BhrSdk\EmployeesApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployee()**](EmployeesApi.md#addEmployee) | **POST** /api/v1/employees | Add Employee |
| [**getCompanyInformation()**](EmployeesApi.md#getCompanyInformation) | **GET** /api/v1/company_information | Get Company Information |
| [**getEmployee()**](EmployeesApi.md#getEmployee) | **GET** /api/v1/employees/{id} | Get Employee |
| [**getEmployeesDirectory()**](EmployeesApi.md#getEmployeesDirectory) | **GET** /api/v1/employees/directory | Get Employee Directory |
| [**getEmployeesList()**](EmployeesApi.md#getEmployeesList) | **GET** /api/v1/employees | Get employees |
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
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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
getCompanyInformation(): \BhrSdk\Model\GetCompanyInformation200Response
```

Get Company Information

Gets Company Information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

[**\BhrSdk\Model\GetCompanyInformation200Response**](../Model/GetCompanyInformation200Response.md)

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
getEmployee($fields, $id, $only_current, $accept_header_parameter): array<string,mixed>
```

Get Employee

Get employee data by specifying a set of fields. This is suitable for getting basic employee information, including current values for fields that are part of a historical table, like job title, or compensation information. See the [fields](ref:metadata-get-a-list-of-fields) endpoint for a list of possible fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

**array<string,mixed>**

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
getEmployeesDirectory($accept_header_parameter): \BhrSdk\Model\GetEmployeesDirectory200Response
```

Get Employee Directory

Gets employee directory.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

[**\BhrSdk\Model\GetEmployeesDirectory200Response**](../Model/GetEmployeesDirectory200Response.md)

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

Get employees

Get paged employees with optional filtering, sorting. This returns a fixed set of simple employee fields that can easily be filtered and sorted. For retrieve more complex employee data please use the singular get employee endpoint or use the datasets api for more complex bulk queries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = new \BhrSdk\Model\\BhrSdk\Model\GetEmployeesFilterRequestObject(); // \BhrSdk\Model\GetEmployeesFilterRequestObject | Filters for matching employees. Encode filter properties using  If the caller does not have access to the filtered field on a matching employee, the employee will be excluded from the result set to avoid leaking sensitive data.
$sort = 'sort_example'; // string | Comma-separated list of sortable fields. Prefix with '-' for descending. Allowed: employeeId,firstName,lastName,preferredName,jobTitleName,status. Nulls sort first in ascending, last in descending. If the caller does not have access to this field on an employee, the result will be excluded from the final result set to avoid leaking sensitive information.
$page = new \BhrSdk\Model\\BhrSdk\Model\CursorPaginationQueryObject(); // \BhrSdk\Model\CursorPaginationQueryObject | Pagination parameters

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
| **filter** | [**\BhrSdk\Model\GetEmployeesFilterRequestObject**](../Model/.md)| Filters for matching employees. Encode filter properties using  If the caller does not have access to the filtered field on a matching employee, the employee will be excluded from the result set to avoid leaking sensitive data. | [optional] |
| **sort** | **string**| Comma-separated list of sortable fields. Prefix with &#39;-&#39; for descending. Allowed: employeeId,firstName,lastName,preferredName,jobTitleName,status. Nulls sort first in ascending, last in descending. If the caller does not have access to this field on an employee, the result will be excluded from the final result set to avoid leaking sensitive information. | [optional] |
| **page** | [**\BhrSdk\Model\CursorPaginationQueryObject**](../Model/.md)| Pagination parameters | [optional] |

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

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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
