# MySdk\TabularDataApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployeeTableRow()**](TabularDataApi.md#addEmployeeTableRow) | **POST** /{companyDomain}/v1/employees/{id}/tables/{table} | Adds a table row |
| [**addEmployeeTableRowV1()**](TabularDataApi.md#addEmployeeTableRowV1) | **POST** /{companyDomain}/v1_1/employees/{id}/tables/{table} | Adds a table row |
| [**deleteEmployeeTableRowV1()**](TabularDataApi.md#deleteEmployeeTableRowV1) | **DELETE** /{companyDomain}/v1/employees/{id}/tables/{table}/{rowId} | Deletes a table row |
| [**getChangedEmployeeTableData()**](TabularDataApi.md#getChangedEmployeeTableData) | **GET** /{companyDomain}/v1/employees/changed/tables/{table} | Gets all updated employee table data |
| [**getEmployeeTableRow()**](TabularDataApi.md#getEmployeeTableRow) | **GET** /{companyDomain}/v1/employees/{id}/tables/{table} | Gets table rows for a given employee and table combination |
| [**updateEmployeeTableRow()**](TabularDataApi.md#updateEmployeeTableRow) | **POST** /{companyDomain}/v1/employees/{id}/tables/{table}/{rowId} | Updates a table row. |
| [**updateEmployeeTableRowV()**](TabularDataApi.md#updateEmployeeTableRowV) | **POST** /{companyDomain}/v1_1/employees/{id}/tables/{table}/{rowId} | Updates a table row. |


## `addEmployeeTableRow()`

```php
addEmployeeTableRow($company_domain, $id, $table, $table_row_update)
```

Adds a table row

Adds a table row. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the row cannot be added if they are missing any required fields for that table. If the API user is adding a row on the compensation table, the row cannot be added if they are missing any of the required employee fields (including fields not on that table).

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->addEmployeeTableRow($company_domain, $id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->addEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addEmployeeTableRowV1()`

```php
addEmployeeTableRowV1($company_domain, $id, $table, $table_row_update)
```

Adds a table row

Adds a table row. Fundamentally the same as version 1 so choose a version and stay with it unless other changes occur. Changes from version 1 are now minor with a few variations limited to ACA, payroll, terminated rehire, gusto, benetrac, and final pay date.

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->addEmployeeTableRowV1($company_domain, $id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->addEmployeeTableRowV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployeeTableRowV1()`

```php
deleteEmployeeTableRowV1($company_domain, $id, $table, $row_id): \MySdk\Model\DeleteEmployeeTableRowV1200Response
```

Deletes a table row

Deletes a table row

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID

try {
    $result = $apiInstance->deleteEmployeeTableRowV1($company_domain, $id, $table, $row_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->deleteEmployeeTableRowV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |

### Return type

[**\MySdk\Model\DeleteEmployeeTableRowV1200Response**](../Model/DeleteEmployeeTableRowV1200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChangedEmployeeTableData()`

```php
getChangedEmployeeTableData($company_domain, $table, $since)
```

Gets all updated employee table data

This API is merely an optimization to avoid downloading all table data for all employees. When you use this API you will provide a timestamp and the results will be limited to just the employees that have changed since the time you provided. This API operates on an employee-last-changed-timestamp, which means that a change in ANY field in the employee record will cause ALL of that employees table rows to show up via this API.

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$table = 'table_example'; // string | Table name
$since = 'since_example'; // string | URL encoded iso8601 timestamp

try {
    $apiInstance->getChangedEmployeeTableData($company_domain, $table, $since);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->getChangedEmployeeTableData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **table** | **string**| Table name | |
| **since** | **string**| URL encoded iso8601 timestamp | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeTableRow()`

```php
getEmployeeTableRow($company_domain, $id, $table)
```

Gets table rows for a given employee and table combination

Returns a data structure representing all the table rows for a given employee and table combination. The result is not sorted in any particular order.

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name

try {
    $apiInstance->getEmployeeTableRow($company_domain, $id, $table);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->getEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeTableRow()`

```php
updateEmployeeTableRow($company_domain, $id, $table, $row_id, $table_row_update)
```

Updates a table row.

Updates a table row. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the row cannot be added if they are missing any required fields for that table. If the API user is updating a row on the compensation table, the row cannot be updated if they are missing any of the required employee fields (including fields not on that table).

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->updateEmployeeTableRow($company_domain, $id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->updateEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeTableRowV()`

```php
updateEmployeeTableRowV($company_domain, $id, $table, $row_id, $table_row_update)
```

Updates a table row.

Updates a table row. Fundamentally the same as version 1 so choose a version and stay with it unless other changes occur. Changes from version 1 are now minor with a few variations limited to ACA, payroll, terminated rehire, gusto, benetrac, and final pay date.

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->updateEmployeeTableRowV($company_domain, $id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->updateEmployeeTableRowV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
