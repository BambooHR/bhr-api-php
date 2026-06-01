# BhrSdk\EmployeesApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEmployee()**](EmployeesApi.md#createEmployee) | **POST** /api/v1/employees | Create Employee |
| [**deleteEmployee()**](EmployeesApi.md#deleteEmployee) | **DELETE** /api/v1/employees/{id} | Delete employee |
| [**getCompanyInformation()**](EmployeesApi.md#getCompanyInformation) | **GET** /api/v1/company_information | Get Company Information |
| [**getEmployee()**](EmployeesApi.md#getEmployee) | **GET** /api/v1/employees/{id} | Get Employee |
| [**getEmployeesDirectory()**](EmployeesApi.md#getEmployeesDirectory) | **GET** /api/v1/employees/directory | Get Employees Directory |
| [**listEmployees()**](EmployeesApi.md#listEmployees) | **GET** /api/v1/employees | List Employees |
| [**updateEmployee()**](EmployeesApi.md#updateEmployee) | **POST** /api/v1/employees/{id} | Update Employee |


## `createEmployee()`

```php
createEmployee($post_new_employee): \BhrSdk\Model\GetEmployeeResponse
```

Create Employee

Create a new employee. At minimum, provide a first name and last name in a JSON object or XML document. The request body schema lists commonly used fields, but any valid writable employee field name may be included as a key. To discover available field names, call the List Fields endpoint (operationId: list-fields, GET /api/v1/meta/fields).  This endpoint does not upload, set, or remove the employee profile photo. Photo-related keys (e.g. `photo`, `photoUrl`) included in the body are silently ignored: the request still creates the employee and returns 201, but no photo is attached. After creating the employee, use the Upload Employee Photo endpoint (operationId: upload-employee-photo, POST /api/v1/employees/{employeeId}/photo) to set the photo.  Trax Payroll note: Employees added to a pay schedule synced with Trax Payroll must include the required payroll-related employee fields: employeeNumber (unless the company has automatic employee numbers enabled), firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, zipcode, country, employmentHistoryStatus, exempt, payType, payRate, payPer, overtimeRate, and location.

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
    $result = $apiInstance->createEmployee($post_new_employee);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->createEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **post_new_employee** | [**\BhrSdk\Model\PostNewEmployee**](../Model/PostNewEmployee.md)|  | |

### Return type

[**\BhrSdk\Model\GetEmployeeResponse**](../Model/GetEmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployee()`

```php
deleteEmployee($id)
```

Delete employee

Permanently deletes an employee record and all associated data.

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
$id = 56; // int | ID of the employee to delete.

try {
    $apiInstance->deleteEmployee($id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->deleteEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| ID of the employee to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyInformation()`

```php
getCompanyInformation(): \BhrSdk\Model\CompanyInformation
```

Get Company Information

Returns basic profile information for the company, including its legal name, display name, primary address, and contact phone number. For companies using BambooHR Payroll, the legal name and address are sourced from the active payroll client metadata; for all other companies, the data comes from the company's account settings.

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
getEmployee($id, $fields, $only_current, $accept_header_parameter): \BhrSdk\Model\GetEmployeeResponse
```

Get Employee

Returns a single employee record as a JSON object (or XML when `Accept: application/xml`). The `id` field is always present and is returned as a string; every other field is included only when explicitly named in the `fields` query parameter. With no `fields` parameter, the response contains only `id` — there is no implicit default field set. Field names come from List Fields (`list-fields`), which also exposes custom-field aliases usable here. By default only currently effective values from historical tables (job title, compensation, employment status, etc.) are returned; pass `onlyCurrent=false` to include future-dated values. Field-level permissions are applied silently: any requested field the authenticated caller cannot view is omitted from the response with no marker — an absent field may indicate either that it was not requested or that the caller lacks permission to view it. The maximum number of fields per request is 400. Use this for fetching arbitrary fields on a single known employee. For batch lookups or directory-style listings across employees, use List Employees (`list-employees`) instead. For complex filtering, multi-field predicates, or tabular reports, use Get Data from Dataset (v2) (`get-data-from-dataset-v2`) instead.

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
$id = 'id_example'; // string | The employee ID. The sentinel value `0` resolves to the employee record bound to the authenticated user, when one exists; if the credentials are not bound to an employee (for example an integration-style account), `0` returns only `{\"id\": \"0\"}` with no other fields. List Employees (`list-employees`) does not accept this sentinel.
$fields = 'fields_example'; // string | Comma-separated list of fields to include in the response. Three reference forms are accepted and may be mixed in a single request: standard field names (e.g. `firstName`, `workEmail`), numeric field IDs (e.g. `1349`), and custom-field aliases (e.g. `customStartDate`). Discover all three via List Fields (`list-fields`) — its response includes `id`, `name`, and `alias` for every available field. Example mixing all three: `firstName,1349,customStartDate`. When omitted, the response includes only `id`. Bracket-array (`fields[]=...`) and repeated-key (`fields=a&fields=b`) forms are not supported on this endpoint — use the comma-separated form. Unknown or unauthorized fields are silently dropped from the response.
$only_current = true; // bool | When `true` (the default), returns only currently effective values from historical tables (job, compensation, employment status, etc.). When `false`, future-dated history rows are also returned.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployee($id, $fields, $only_current, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. The sentinel value &#x60;0&#x60; resolves to the employee record bound to the authenticated user, when one exists; if the credentials are not bound to an employee (for example an integration-style account), &#x60;0&#x60; returns only &#x60;{\&quot;id\&quot;: \&quot;0\&quot;}&#x60; with no other fields. List Employees (&#x60;list-employees&#x60;) does not accept this sentinel. | |
| **fields** | **string**| Comma-separated list of fields to include in the response. Three reference forms are accepted and may be mixed in a single request: standard field names (e.g. &#x60;firstName&#x60;, &#x60;workEmail&#x60;), numeric field IDs (e.g. &#x60;1349&#x60;), and custom-field aliases (e.g. &#x60;customStartDate&#x60;). Discover all three via List Fields (&#x60;list-fields&#x60;) — its response includes &#x60;id&#x60;, &#x60;name&#x60;, and &#x60;alias&#x60; for every available field. Example mixing all three: &#x60;firstName,1349,customStartDate&#x60;. When omitted, the response includes only &#x60;id&#x60;. Bracket-array (&#x60;fields[]&#x3D;...&#x60;) and repeated-key (&#x60;fields&#x3D;a&amp;fields&#x3D;b&#x60;) forms are not supported on this endpoint — use the comma-separated form. Unknown or unauthorized fields are silently dropped from the response. | [optional] |
| **only_current** | **bool**| When &#x60;true&#x60; (the default), returns only currently effective values from historical tables (job, compensation, employment status, etc.). When &#x60;false&#x60;, future-dated history rows are also returned. | [optional] [default to true] |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\GetEmployeeResponse**](../Model/GetEmployeeResponse.md)

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
getEmployeesDirectory($accept_header_parameter, $only_current): \BhrSdk\Model\EmployeesDirectoryJsonResponse
```

Get Employees Directory

Returns the company's published employee directory: a fieldset definition plus an array of employee records whose keys match the field ids. Coverage is intentionally incomplete — companies can hide individual employees (commonly contractors) from the directory, and those employees are silently absent from the response with no indicator that they exist. The fieldset is also fixed by company directory configuration; callers cannot request additional fields. Use this endpoint only when you specifically want the company's curated directory subset (for example, an org-style listing that respects the company's directory settings). For complete or general-purpose employee listings, batch lookups by ID, or filtering by name/status, use **List Employees** (`list-employees`) instead. For tabular reporting, custom field selection, or analytical queries across many employees, use **Get Data from Dataset (v2)** (`get-data-from-dataset-v2`) instead. Response format follows the `Accept` header: `application/json` returns a JSON object with `fields` and `employees` arrays; `application/xml` (the default when `Accept` is missing or any non-JSON value) returns a `<directory>` document with `<fieldset>` and `<employees>` children. Employee `id` values are returned as strings in both formats. The response shape varies by caller permission and per-company configuration: when neither company-wide directory sharing nor org-chart sharing is enabled the endpoint returns 403; when only org-chart sharing is enabled the response uses a reduced fieldset (limited to the fields exposed by the org chart); when the resulting directory has no employees the endpoint returns 404 rather than an empty list.

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
$only_current = true; // bool | When true (the default), only employees whose hire date and employment-status effective date are on or before today are returned. Set to false to also include employees with a future hire date or future employment-status effective date (typically pre-boarding hires). The fieldset is unaffected.

try {
    $result = $apiInstance->getEmployeesDirectory($accept_header_parameter, $only_current);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->getEmployeesDirectory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **only_current** | **bool**| When true (the default), only employees whose hire date and employment-status effective date are on or before today are returned. Set to false to also include employees with a future hire date or future employment-status effective date (typically pre-boarding hires). The fieldset is unaffected. | [optional] [default to true] |

### Return type

[**\BhrSdk\Model\EmployeesDirectoryJsonResponse**](../Model/EmployeesDirectoryJsonResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployees()`

```php
listEmployees($filter, $sort, $fields, $page): \BhrSdk\Model\GetEmployeesResponseObject
```

List Employees

Returns a cursor-paginated collection of employees for the authenticated caller's company. The response is a JSON object with `data` (an array of employee records), `meta.total` (count of all employees matching the filter, not just the current page), `meta.page` (cursor pagination state), and `_links` (`self`, plus `next` / `prev` when more pages exist). Each employee record always includes the default identity and job fields, plus any additional fields requested via `fields`. `employeeId` is returned as a string. Field values the caller cannot read are returned as `null`, and the names of those suppressed fields are listed on the record in `_restrictedFields`; if the caller cannot read a field used in `filter` or `sort`, the affected employee is dropped from the result set entirely to avoid leaking presence. IDs for `filter[ids]` come from prior responses of this endpoint. Use this for lightweight directory-style listings and batch lookups by ID. For a single employee with the full set of fields, use Get Employee (`get-employee`) instead. For complex filtering (date ranges, multi-field predicates, OR/IN logic), arbitrary sorting, or tabular reports across many fields, use Get Data from Dataset (v2) (`get-data-from-dataset-v2`) instead.

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
$filter = new \BhrSdk\Model\\BhrSdk\Model\GetEmployeesFilterRequestObject(); // \BhrSdk\Model\GetEmployeesFilterRequestObject | Filters used to match employees. Encode filter properties using deepObject style (`filter[firstName]=Ava`). Multiple filter fields are combined with AND. `filter[ids]` accepts either repeated keys (`filter[ids][]=123&filter[ids][]=124`) or a single comma-separated string (`filter[ids]=123,124`); both forms are supported.
$sort = -lastName,firstName; // string | Comma-separated list of sortable fields. Prefix a field with `-` for descending order. Allowed fields: `employeeId`, `firstName`, `lastName`, `preferredName`, `jobTitleName`, `status`. Nulls sort first in ascending order and last in descending order. An invalid sort field returns a `BadRequest` error.
$fields = workEmail,mobilePhone; // \BhrSdk\Model\EmployeeOptionalField[] | Additional fields to include in each employee record beyond the default set. The canonical form is a comma-separated list (`fields=workEmail,mobilePhone`); for backward compatibility the endpoint also accepts the bracket-array form (`fields[]=workEmail&fields[]=mobilePhone`). Note: plain repeated keys without brackets (`fields=workEmail&fields=mobilePhone`) are unreliable — most HTTP stacks keep only the last value, silently dropping earlier ones; use the comma-separated form instead. Unrecognized field names are silently ignored. Returned values are subject to permission checks — fields the caller cannot read are returned as `null` and their names are listed in the record's `_restrictedFields` array.
$page = array('key' => new \BhrSdk\Model\\BhrSdk\Model\EmployeeCursorPaginationQueryObject()); // \BhrSdk\Model\EmployeeCursorPaginationQueryObject | Cursor-based pagination parameters. `page[limit]` controls page size (default 250, maximum 2500). `page[after]` and `page[before]` accept opaque cursors returned in the previous response's `meta.page.nextCursor` / `prevCursor`; do not specify both at once. The response's `_links.next` / `_links.prev` are pre-built URLs that already encode the correct cursor for the next or previous page.

try {
    $result = $apiInstance->listEmployees($filter, $sort, $fields, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->listEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | [**\BhrSdk\Model\GetEmployeesFilterRequestObject**](../Model/.md)| Filters used to match employees. Encode filter properties using deepObject style (&#x60;filter[firstName]&#x3D;Ava&#x60;). Multiple filter fields are combined with AND. &#x60;filter[ids]&#x60; accepts either repeated keys (&#x60;filter[ids][]&#x3D;123&amp;filter[ids][]&#x3D;124&#x60;) or a single comma-separated string (&#x60;filter[ids]&#x3D;123,124&#x60;); both forms are supported. | [optional] |
| **sort** | **string**| Comma-separated list of sortable fields. Prefix a field with &#x60;-&#x60; for descending order. Allowed fields: &#x60;employeeId&#x60;, &#x60;firstName&#x60;, &#x60;lastName&#x60;, &#x60;preferredName&#x60;, &#x60;jobTitleName&#x60;, &#x60;status&#x60;. Nulls sort first in ascending order and last in descending order. An invalid sort field returns a &#x60;BadRequest&#x60; error. | [optional] |
| **fields** | [**\BhrSdk\Model\EmployeeOptionalField[]**](../Model/\BhrSdk\Model\EmployeeOptionalField.md)| Additional fields to include in each employee record beyond the default set. The canonical form is a comma-separated list (&#x60;fields&#x3D;workEmail,mobilePhone&#x60;); for backward compatibility the endpoint also accepts the bracket-array form (&#x60;fields[]&#x3D;workEmail&amp;fields[]&#x3D;mobilePhone&#x60;). Note: plain repeated keys without brackets (&#x60;fields&#x3D;workEmail&amp;fields&#x3D;mobilePhone&#x60;) are unreliable — most HTTP stacks keep only the last value, silently dropping earlier ones; use the comma-separated form instead. Unrecognized field names are silently ignored. Returned values are subject to permission checks — fields the caller cannot read are returned as &#x60;null&#x60; and their names are listed in the record&#39;s &#x60;_restrictedFields&#x60; array. | [optional] |
| **page** | [**\BhrSdk\Model\EmployeeCursorPaginationQueryObject**](../Model/.md)| Cursor-based pagination parameters. &#x60;page[limit]&#x60; controls page size (default 250, maximum 2500). &#x60;page[after]&#x60; and &#x60;page[before]&#x60; accept opaque cursors returned in the previous response&#39;s &#x60;meta.page.nextCursor&#x60; / &#x60;prevCursor&#x60;; do not specify both at once. The response&#39;s &#x60;_links.next&#x60; / &#x60;_links.prev&#x60; are pre-built URLs that already encode the correct cursor for the next or previous page. | [optional] |

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
updateEmployee($id, $employee): \BhrSdk\Model\GetEmployeeResponse
```

Update Employee

Update an employee's fields by submitting a JSON object or XML document containing field name/value pairs. The request body schema lists commonly used fields, but any valid writable employee field name may be used as a key. To discover available field names, call the List Fields endpoint (operationId: list-fields, GET /api/v1/meta/fields).  This endpoint does not upload, replace, or remove the employee profile photo, and does not accept any binary or file uploads in general. Photo-related keys (e.g. `photo`, `photoUrl`) included in the body are silently ignored: the request still returns 200, but no photo change is made. To change a photo, use the Upload Employee Photo endpoint (operationId: upload-employee-photo, POST /api/v1/employees/{employeeId}/photo).  Trax Payroll note: If the employee is currently on a pay schedule syncing with Trax Payroll, or is being added to one, the request must include the required payroll-related employee fields: employeeNumber (unless the company has automatic employee numbers enabled), firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, zipcode, country, employmentHistoryStatus, exempt, payType, payRate, payPer, overtimeRate, and location.

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
$id = 'id_example'; // string | The employee ID.
$employee = new \BhrSdk\Model\Employee(); // \BhrSdk\Model\Employee

try {
    $result = $apiInstance->updateEmployee($id, $employee);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->updateEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **employee** | [**\BhrSdk\Model\Employee**](../Model/Employee.md)|  | |

### Return type

[**\BhrSdk\Model\GetEmployeeResponse**](../Model/GetEmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
