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

Create a new employee. At minimum, provide a first name and last name in a JSON object or XML document. The request body schema lists commonly used fields, but any valid writable employee field name may be included as a key. To discover available field names, call **List Fields** (`list-fields`).  This endpoint does not upload, set, or remove the employee profile photo. Photo-related keys (e.g. `photo`, `photoUrl`) included in the body are silently ignored: the request still creates the employee and returns 201, but no photo is attached. After creation, use the Upload Employee Photo endpoint (`upload-employee-photo`) to attach a profile photo. AI connectors cannot use that endpoint reliably and should redirect the user to the BambooHR web UI.  Trax Payroll note: Employees added to a pay schedule synced with Trax Payroll must include the required payroll-related employee fields: employeeNumber (unless the company has automatic employee numbers enabled), firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, zipcode, country, employmentHistoryStatus, exempt, payType, payRate, payPer, overtimeRate, and location.  OAuth Scopes: employee, employee.write, employee:assets.write, employee:compensation.write, employee:contact.write, employee:custom_fields.write, employee:custom_fields_encrypted.write, employee:demographic.write, employee:dependent.write, employee:dependent:ssn.write, employee:education.write, employee:emergency_contacts.write, employee:identification.write, employee:job, employee:job.write, employee:management.write, employee:name.write, employee:payroll.write, employee:photo.write, employee:vaccination.write, sensitive_employee:address.write, sensitive_employee:creditcards.write, sensitive_employee:protected_info.write

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

Permanently deletes an employee record and all associated data.  OAuth Scopes: employee.write

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
$id = 56; // int | The internal employee ID of the employee to delete. Use `id` from Get Employee (`get-employee`), `employeeId` from List Employees (`list-employees`), or `eeid` from the `employee` dataset. Do not pass `employeeNumber` (the editable Employee # value); it may fail with `404` or target a different employee if its value matches another employee's internal employee ID.

try {
    $apiInstance->deleteEmployee($id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApi->deleteEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The internal employee ID of the employee to delete. Use &#x60;id&#x60; from Get Employee (&#x60;get-employee&#x60;), &#x60;employeeId&#x60; from List Employees (&#x60;list-employees&#x60;), or &#x60;eeid&#x60; from the &#x60;employee&#x60; dataset. Do not pass &#x60;employeeNumber&#x60; (the editable Employee # value); it may fail with &#x60;404&#x60; or target a different employee if its value matches another employee&#39;s internal employee ID. | |

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

Returns basic profile information for the company, including its legal name, display name, primary address, and contact phone number. For companies using BambooHR Payroll, the legal name and address are sourced from the active payroll client metadata; for all other companies, the data comes from the company's account settings. This information is treated as non-sensitive, publicly-derivable business information (comparable to what's on public business registries or a paycheck) and is available to any authenticated caller holding the company:info scope, regardless of admin status.  OAuth Scopes: company:info

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

Returns a single employee record as a JSON object (or XML when `Accept: application/xml`). The `id` field is always present and is returned as a string; it is the internal employee ID — see the `id` and `employeeNumber` field documentation in the response schema for the distinction between the internal ID and the editable Employee # value. Pass the id `0` to read the authenticated caller's own record.  **Requesting fields.** Every other field is included only when explicitly named in the `fields` query parameter. With no `fields` parameter, the response contains only `id` — there is no implicit default field set. Field names come from List Fields (`list-fields`), which also exposes custom-field aliases usable here. The maximum number of fields per request is 400.  **Field-name vocabulary.** The names used here differ from the `employee` dataset (queried via Get Data from Dataset (v2) (`get-data-from-dataset-v2`)): this endpoint uses short names (`workEmail`, `jobTitle`, `department`, `supervisor`) where the dataset uses qualified names (`email`, `jobInformationJobTitle`, `jobInformationDepartment`, `jobInformationReportsTo`).  **Effective-dated values.** By default only currently effective values from historical tables (job title, compensation, employment status, etc.) are returned; pass `onlyCurrent=false` to include future-dated values.  **Permissions.** Field-level permissions are applied silently: any requested field the authenticated caller cannot view is omitted from the response with no marker — an absent field may indicate either that it was not requested or that the caller lacks permission to view it. This differs from `get-data-from-dataset-v2` for the `employee` dataset, which always returns every requested field but represents inaccessible values as empty and lists the withheld field names in a per-record `_restrictedFields` array. Record-level permissions apply in addition to field-level ones. Which employees a caller can view depends on their access-level configuration, which may be limited to themselves, to their direct or indirect reports, or to another configured set. If the caller cannot view the requested employee, the endpoint returns `403` with `Insufficient Permissions to view this employee` rather than a partial record.  **Related endpoints.** Use this for fetching arbitrary fields on a single known employee. For multiple employees, use `list-employees`. For complex filtering or tabular reports, use `get-data-from-dataset-v2`. To look up information published in a coworker's company directory entry, such as job title, department, location, work contact details, or who they report to, use Get Employees Directory (`get-employees-directory`), which is governed by directory sharing settings rather than by per-employee record permissions and is available when directory or org-chart access is shared with the caller's access level.  OAuth Scopes: employee, employee:assets, employee:compensation, employee:contact, employee:custom_fields, employee:custom_fields_encrypted, employee:demographic, employee:dependent, employee:dependent:ssn, employee:education, employee:emergency_contacts, employee:identification, employee:job, employee:job.write, employee:management, employee:name, employee:photo, employee:vaccination, sensitive_employee:address, sensitive_employee:creditcards, sensitive_employee:protected_info

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
$id = 'id_example'; // string | The internal employee ID of the employee to retrieve. Use `id` from this endpoint, `employeeId` from `list-employees`, or `eeid` from the `employee` dataset. Do not pass `employeeNumber` (the editable Employee # value); it may fail with `404` or resolve to a different employee if its value matches another employee's internal employee ID. The sentinel value `0` resolves to the employee record bound to the authenticated user, when one exists; if the credentials are not bound to an employee (for example an integration-style account), `0` returns only `{\"id\": \"0\"}` with no other fields. `list-employees` does not accept this sentinel.
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
| **id** | **string**| The internal employee ID of the employee to retrieve. Use &#x60;id&#x60; from this endpoint, &#x60;employeeId&#x60; from &#x60;list-employees&#x60;, or &#x60;eeid&#x60; from the &#x60;employee&#x60; dataset. Do not pass &#x60;employeeNumber&#x60; (the editable Employee # value); it may fail with &#x60;404&#x60; or resolve to a different employee if its value matches another employee&#39;s internal employee ID. The sentinel value &#x60;0&#x60; resolves to the employee record bound to the authenticated user, when one exists; if the credentials are not bound to an employee (for example an integration-style account), &#x60;0&#x60; returns only &#x60;{\&quot;id\&quot;: \&quot;0\&quot;}&#x60; with no other fields. &#x60;list-employees&#x60; does not accept this sentinel. | |
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

Returns the company's published employee directory: a fieldset definition plus an array of employee records whose keys match the field ids.  **When to use this endpoint.** Use it for basic, non-sensitive information about coworkers who appear in the company's published directory, especially coworkers the caller does not manage. For the authenticated caller's own record, use **Get Employee** (`get-employee`) with the id `0` instead. It answers questions such as who a coworker is, their job title, department, division, or location, how to reach them at work, and who they report to. When the company shares its full directory, every record includes `supervisor`, which makes this the most direct way to answer org chart and reporting structure questions such as who reports to a given manager. Do not assume that field is present: always read the `fields` array in the response to see what a given company actually exposes, because a company that shares only its org chart returns a reduced fieldset that omits `supervisor` (see Coverage and limits below).  **Access.** Directory access is governed by the company's Company Directory and Company Org Chart sharing settings (Settings > Company Directory in the BambooHR web app), together with whether those features are shared with the caller's access level. It is not governed by per-employee record permissions, so when the directory is shared with the caller the employee data is not narrowed to the people whose records they can otherwise read, and an employee with no managerial or administrative access can normally read the full directory. The `canUploadPhoto` value remains caller-specific.  **Fields returned.** The fieldset is fixed by company directory configuration and callers cannot request additional fields. The `fields` array in each response lists exactly which fields that company exposes, so treat it as authoritative rather than assuming a fixed set. With full directory sharing it covers names, job title, department, division, location, manager (`supervisor`), work email, work and mobile phone, pronouns, social profile links, and photo information. It never includes compensation, national identifiers such as SSN, birth date, home address, home contact details, or employment status and history, in any configuration.  **Coverage and limits.** This endpoint returns the whole directory in one response and accepts no name, department, or field filters, so narrow the results on the client side. Companies choose which employees appear in the directory, and anyone excluded is absent with no indicator that they exist. Inactive and former employees are also excluded, so an administrator researching someone who has left the company will not find them here even though the record still exists; use `get-employee` or `list-employees` for those. Absence from this response therefore means the employee is not in the published directory, not that no such employee exists, so do not conclude from this endpoint alone that someone does not work at the company. For the same reason it is not an authoritative roster; prefer `list-employees` or `get-data-from-dataset-v2` when completeness matters.  **Related endpoints.** To read fields this endpoint does not expose, or to select arbitrary fields for a single employee, use **Get Employee** (`get-employee`), passing the id `0` for the authenticated caller's own record. For a coworker name, department, or location lookup, retrieve this directory and narrow the `employees` array on the client side rather than filtering elsewhere. Use **List Employees** (`list-employees`) for roster, pagination, sorting, or batch-by-id workflows where the caller can read the relevant fields, and **Get Data from Dataset (v2)** (`get-data-from-dataset-v2`) for tabular reporting, custom field selection, or analytical queries across many employees. Those endpoints apply stricter, endpoint-specific permissions and may return `403`, null or omitted field values, or filtered-out rows; this endpoint is the appropriate choice for general coworker and org chart lookups.  **Response format.** Follows the `Accept` header: `application/json` returns a JSON object with `fields` and `employees` arrays; `application/xml` (the default when `Accept` is missing or any non-JSON value) returns a `<directory>` document with `<fieldset>` and `<employees>` children. Employee `id` values are internal employee IDs returned as strings in both formats. The response also varies with per-company configuration, where Company Directory sharing takes precedence: when it is enabled the full fieldset is returned whether or not Company Org Chart sharing is also on. When the caller has neither usable Company Directory nor Company Org Chart access the endpoint returns 403 with an empty body and the header `x-bamboohr-error-message: Directory disabled for this account`. That can mean the features are disabled company-wide or that they are not shared with the caller's access level, and the response does not distinguish those cases; when both company toggles are off, every caller including administrators receives it. When only org-chart sharing is available (Company Directory off, Company Org Chart on) the response still lists every directory employee but uses a reduced fieldset, observed as `displayName`, `firstName`, `lastName`, `preferredName`, `jobTitle`, `pronouns`, and the photo fields, which means `supervisor`, `department`, `division`, `location`, work email, and phone numbers are all absent and reporting-structure or work-contact questions cannot be answered from that configuration; when the resulting directory has no employees the endpoint returns 404 rather than an empty list.  OAuth Scopes: employee_directory

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

Lists all employees in the authenticated caller's company as a cursor-paginated list. Use this to list employees, fetch the employee roster, or batch-lookup multiple employees by ID.  **Response shape.** The response is a JSON object with `data` (an array of employee records), `meta.total` (count of all employees matching the filter, not just the current page), `meta.page` (cursor pagination state), and `_links` (`self`, plus `next` / `prev` when more pages exist). Each employee record always includes the default identity and job fields, plus any additional fields requested via `fields`. `employeeId` is returned as a string and is the internal employee ID — see the `employeeId` and `employeeNumber` field documentation in the response schema for the distinction between the internal ID and the editable Employee # value. IDs for `filter[ids]` come from prior responses of this endpoint.  **Employee photos.** Each record includes a `photoUrl` field with a time-limited signed URL. This is the recommended way for AI connectors to display or link to an employee photo, since fetching raw photo bytes through `get-employee-photo` produces base64 payloads too large for an AI model to consume reliably.  **Permissions.** Field values the caller cannot read are returned as `null`, and the names of those suppressed fields are listed on the record in `_restrictedFields`. On an unfiltered request an employee remains in `data` even when the caller can read none of the requested fields: `employeeId` still carries its real value, every unreadable field is `null` and named in `_restrictedFields`, values that are not permission-gated such as `photoUrl` may still be populated, and `meta.total` counts the row. Separately, if the caller cannot read a field used in `filter` or `sort`, the affected employee is dropped from the result set entirely to avoid leaking presence, so a name search can return `meta.total: 0` even though matching employees exist. Neither an empty result nor a fully nulled row means no such employee exists.  **Counts and aggregates are only valid when the caller can read every field being grouped on.** A caller with full access can safely count and group these rows. A restricted caller cannot: unreadable values come back `null` and filtered queries drop employees entirely, so grouping what such a caller receives understates the real figures and produces a confident but wrong total. Before reporting any count, headcount, department or location breakdown, or turnover figure, compare `meta.total` against the number of rows carrying readable values for the field in question. If those differ, the aggregate is incomplete: either state plainly how many employees were actually readable, or use **Get Data from Dataset (v2)** (`get-data-from-dataset-v2`) or the custom report endpoints instead, which require broader access and fail loudly rather than returning a partial answer.  **Related endpoints.** For a single employee with the full set of fields, use `get-employee`. For complex filtering, arbitrary sorting, or tabular reports across many fields, use Get Data from Dataset (v2) (`get-data-from-dataset-v2`). To look up information published in a coworker's company directory entry, such as job title, department, location, work contact details, or who they report to, use Get Employees Directory (`get-employees-directory`), which is governed by directory sharing settings rather than by per-employee record permissions and is available when directory or org-chart access is shared with the caller's access level.  OAuth Scopes: employee, employee:job, employee:name, employee_directory, sensitive_employee:protected_info

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
$page = new \BhrSdk\Model\\BhrSdk\Model\EmployeeCursorPaginationQueryObject(); // \BhrSdk\Model\EmployeeCursorPaginationQueryObject | Cursor-based pagination parameters. `page[limit]` controls page size (default 250, maximum 2500). `page[after]` and `page[before]` accept opaque cursors returned in the previous response's `meta.page.nextCursor` / `prevCursor`; do not specify both at once. The response's `_links.next` / `_links.prev` are pre-built URLs that already encode the correct cursor for the next or previous page.

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

Update an employee's fields by submitting a JSON object or XML document containing field name/value pairs. The request body schema lists commonly used fields, but any valid writable employee field name may be used as a key. To discover available field names, call **List Fields** (`list-fields`).  This endpoint does not upload, replace, or remove the employee profile photo, and does not accept any binary or file uploads in general. Photo-related keys (e.g. `photo`, `photoUrl`) included in the body are silently ignored: the request still returns 200, but no photo change is made. To change a profile photo, use the Upload Employee Photo endpoint (`upload-employee-photo`). AI connectors cannot use that endpoint reliably and should redirect the user to the BambooHR web UI.  Trax Payroll note: If the employee is currently on a pay schedule syncing with Trax Payroll, or is being added to one, the request must include the required payroll-related employee fields: employeeNumber (unless the company has automatic employee numbers enabled), firstName, lastName, dateOfBirth, ssn or ein, gender, maritalStatus, hireDate, address1, city, state, zipcode, country, employmentHistoryStatus, exempt, payType, payRate, payPer, overtimeRate, and location.  OAuth Scopes: employee, employee.write, employee:assets.write, employee:compensation.write, employee:contact.write, employee:custom_fields.write, employee:custom_fields_encrypted.write, employee:demographic.write, employee:dependent.write, employee:dependent:ssn.write, employee:education.write, employee:emergency_contacts.write, employee:identification.write, employee:job, employee:job.write, employee:management.write, employee:name.write, employee:payroll.write, employee:photo.write, employee:vaccination.write, sensitive_employee:address.write, sensitive_employee:creditcards.write, sensitive_employee:protected_info.write

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
