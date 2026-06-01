# BhrSdk\TabularDataApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createTableRow()**](TabularDataApi.md#createTableRow) | **POST** /api/v1/employees/{id}/tables/{table} | Create Table Row |
| [**createTableRowV11()**](TabularDataApi.md#createTableRowV11) | **POST** /api/v1_1/employees/{id}/tables/{table} | Create Table Row v1.1 |
| [**deleteEmployeeTableRow()**](TabularDataApi.md#deleteEmployeeTableRow) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Delete Employee Table Row |
| [**getChangedEmployeeTableData()**](TabularDataApi.md#getChangedEmployeeTableData) | **GET** /api/v1/employees/changed/tables/{table} | Get Changed Employee Table Data |
| [**getEmployeeTableData()**](TabularDataApi.md#getEmployeeTableData) | **GET** /api/v1/employees/{id}/tables/{table} | Get Employee Table Data |
| [**updateTableRow()**](TabularDataApi.md#updateTableRow) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Update Table Row |
| [**updateTableRowV11()**](TabularDataApi.md#updateTableRowV11) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Update Table Row v1.1 |


## `createTableRow()`

```php
createTableRow($id, $table, $table_row_update)
```

Create Table Row

Add a new row to the specified employee table by submitting field name/value pairs in JSON or XML. Use this endpoint to append records to tabular employee data such as job information or compensation history.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID.
$table = 'table_example'; // string | The API name of the table to add a row to. See the TableName schema for valid standard values; custom tables use a `custom` prefix. Use GET /api/v1/meta/tables to discover the complete list.
$table_row_update = new \BhrSdk\Model\TableRowUpdate(); // \BhrSdk\Model\TableRowUpdate

try {
    $apiInstance->createTableRow($id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->createTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **table** | **string**| The API name of the table to add a row to. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix. Use GET /api/v1/meta/tables to discover the complete list. | |
| **table_row_update** | [**\BhrSdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTableRowV11()`

```php
createTableRowV11($id, $table, $table_row_update)
```

Create Table Row v1.1

Add a new row to the specified employee table using the v1.1 table-row creation endpoint. Submit the new row in JSON or XML. This version is largely compatible with v1 and supports the same tabular employee data use cases.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID.
$table = 'table_example'; // string | The API name of the table to add a row to. See the TableName schema for valid standard values; custom tables use a `custom` prefix. Use GET /api/v1/meta/tables to discover the complete list.
$table_row_update = new \BhrSdk\Model\TableRowUpdate(); // \BhrSdk\Model\TableRowUpdate

try {
    $apiInstance->createTableRowV11($id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->createTableRowV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **table** | **string**| The API name of the table to add a row to. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix. Use GET /api/v1/meta/tables to discover the complete list. | |
| **table_row_update** | [**\BhrSdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployeeTableRow()`

```php
deleteEmployeeTableRow($id, $table, $row_id): \BhrSdk\Model\TableRowDeleteResponse
```

Delete Employee Table Row

Deletes a specific row from an employee's tabular data. The table name identifies which tabular dataset to target (e.g., jobInfo, compensation, customTabularField). Returns `success: true` if the row was deleted, or `success: false` with an error message if the row was not found or could not be deleted. Deletion will fail with a 409 if the row has pending approval changes, or a 412 if the row is tied to an active pay schedule. Per-table field schemas are available as named OpenAPI components (e.g., `JobInfoTableRowRequest`, `CompensationTableRowRequest`). See the components/schemas section of this spec for the full list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID.
$table = 'table_example'; // string | The API name of the table containing the row to delete. See the TableName schema for valid standard values; custom tables use a `custom` prefix (e.g., `customTabularField`). Use the `list-tabular-fields` tool (GET /api/v1/meta/tables) to discover the complete list.
$row_id = 'row_id_example'; // string | The ID of the specific row to delete.

try {
    $result = $apiInstance->deleteEmployeeTableRow($id, $table, $row_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->deleteEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **table** | **string**| The API name of the table containing the row to delete. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix (e.g., &#x60;customTabularField&#x60;). Use the &#x60;list-tabular-fields&#x60; tool (GET /api/v1/meta/tables) to discover the complete list. | |
| **row_id** | **string**| The ID of the specific row to delete. | |

### Return type

[**\BhrSdk\Model\TableRowDeleteResponse**](../Model/TableRowDeleteResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChangedEmployeeTableData()`

```php
getChangedEmployeeTableData($table, $since): \BhrSdk\Model\ChangedEmployeeTableDataResponse
```

Get Changed Employee Table Data

Returns table data for employees that have changed since the given timestamp. This is an optimization to avoid downloading all table data for all employees. It operates on an employee-last-changed-timestamp, which means that a change in ANY field in the employee record will cause ALL of that employee's table rows to show up via this API. The response includes the table rows grouped by employee ID with their last-changed timestamps.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$table = 'table_example'; // string | The API name of the table to retrieve changed data for. See the TableName schema for valid standard values; custom tables use a `custom` prefix. Use GET /api/v1/meta/tables to discover the complete list.
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | ISO 8601 timestamp (URL-encoded). Only employees changed since this timestamp will be returned.

try {
    $result = $apiInstance->getChangedEmployeeTableData($table, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->getChangedEmployeeTableData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **table** | **string**| The API name of the table to retrieve changed data for. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix. Use GET /api/v1/meta/tables to discover the complete list. | |
| **since** | **\DateTime**| ISO 8601 timestamp (URL-encoded). Only employees changed since this timestamp will be returned. | |

### Return type

[**\BhrSdk\Model\ChangedEmployeeTableDataResponse**](../Model/ChangedEmployeeTableDataResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeTableData()`

```php
getEmployeeTableData($id, $table, $accept_header_parameter): \BhrSdk\Model\EmployeeTableRow[]
```

Get Employee Table Data

Returns all rows for a given employee and table combination. The result is not sorted in any particular order. Each row contains the fields defined for that table, subject to field-level permission checks. Fields the caller does not have access to are omitted from the response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID. Use the special value \"all\" to retrieve table data for all employees the API user has access to.
$table = 'table_example'; // string | The API name of the table to retrieve. See the TableName schema for standard values; custom tables also accepted (e.g., `custom1`, `custom42`). Use the `list-tabular-fields` tool (GET /api/v1/meta/tables) to discover custom table names.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployeeTableData($id, $table, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->getEmployeeTableData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. Use the special value \&quot;all\&quot; to retrieve table data for all employees the API user has access to. | |
| **table** | **string**| The API name of the table to retrieve. See the TableName schema for standard values; custom tables also accepted (e.g., &#x60;custom1&#x60;, &#x60;custom42&#x60;). Use the &#x60;list-tabular-fields&#x60; tool (GET /api/v1/meta/tables) to discover custom table names. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\EmployeeTableRow[]**](../Model/EmployeeTableRow.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTableRow()`

```php
updateTableRow($id, $table, $row_id, $table_row_update)
```

Update Table Row

Update an existing row in the specified employee table by submitting field name/value pairs for the fields to change in JSON or XML.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID.
$table = 'table_example'; // string | The API name of the table containing the row to update. See the TableName schema for valid standard values; custom tables use a `custom` prefix. Use GET /api/v1/meta/tables to discover the complete list.
$row_id = 'row_id_example'; // string | The ID of the row to update.
$table_row_update = new \BhrSdk\Model\TableRowUpdate(); // \BhrSdk\Model\TableRowUpdate

try {
    $apiInstance->updateTableRow($id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->updateTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **table** | **string**| The API name of the table containing the row to update. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix. Use GET /api/v1/meta/tables to discover the complete list. | |
| **row_id** | **string**| The ID of the row to update. | |
| **table_row_update** | [**\BhrSdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTableRowV11()`

```php
updateTableRowV11($id, $table, $row_id, $table_row_update)
```

Update Table Row v1.1

Update an existing row in the specified employee table using the v1.1 table-row update endpoint. Submit the field changes in JSON or XML. This version is largely compatible with v1 and is intended for the same tabular employee data use cases.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TabularDataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The employee ID.
$table = 'table_example'; // string | The API name of the table containing the row to update. See the TableName schema for valid standard values; custom tables use a `custom` prefix. Use GET /api/v1/meta/tables to discover the complete list.
$row_id = 'row_id_example'; // string | The ID of the row to update.
$table_row_update = new \BhrSdk\Model\TableRowUpdate(); // \BhrSdk\Model\TableRowUpdate

try {
    $apiInstance->updateTableRowV11($id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling TabularDataApi->updateTableRowV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The employee ID. | |
| **table** | **string**| The API name of the table containing the row to update. See the TableName schema for valid standard values; custom tables use a &#x60;custom&#x60; prefix. Use GET /api/v1/meta/tables to discover the complete list. | |
| **row_id** | **string**| The ID of the row to update. | |
| **table_row_update** | [**\BhrSdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`, `text/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
