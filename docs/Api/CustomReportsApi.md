# BhrSdk\CustomReportsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getReportById()**](CustomReportsApi.md#getReportById) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID |
| [**listReports()**](CustomReportsApi.md#listReports) | **GET** /api/v1/custom-reports | List Reports |


## `getReportById()`

```php
getReportById($report_id, $page, $page_size): \BhrSdk\Model\EmployeeResponse
```

Get Report by ID

Executes a saved custom report and returns its data using the report's configured fields and filters. The `data` array contains employee record objects whose keys are determined by the fields selected when the report was created — each object is a flat key-value map where keys are field names (e.g. `firstName`, `status`, `hireDate`) and values are strings or `null`. The `aggregations` array is empty unless the report's underlying dataset configuration includes aggregation rules. Use \"List Reports\" to discover available report IDs.  Response shape: Each element of `data` is a flat key-value object — field values are top-level keys (e.g. `row[\"firstName\"]`). This differs from `get-data-from-dataset-v2`, where field values are nested under a `fields` key (e.g. `row[\"fields\"][\"firstName\"]`).  There is no schema-only response from this endpoint.  The `pagination.total_records` value is the number of rows produced by the saved report after applying the report's configured filters, not necessarily the total number of employees in the account. Validate output before using in automated pipelines.  Results default to page 1 with 500 records per page (maximum 1000). Out-of-range page numbers are clamped to the nearest valid page. Invalid or zero values for `page` and `page_size` fall back to their defaults.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$report_id = 56; // int | The numeric ID of the saved custom report to execute.
$page = 1; // int | The page number to retrieve. Defaults to 1.
$page_size = 500; // int | The number of records per page. Defaults to 500. Maximum is 1000.

try {
    $result = $apiInstance->getReportById($report_id, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->getReportById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **report_id** | **int**| The numeric ID of the saved custom report to execute. | |
| **page** | **int**| The page number to retrieve. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of records per page. Defaults to 500. Maximum is 1000. | [optional] [default to 500] |

### Return type

[**\BhrSdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listReports()`

```php
listReports($page, $page_size): \BhrSdk\Model\ReportsResponse
```

List Reports

Returns a paginated list of saved custom reports available in the account. Each report entry contains an `id` (integer) and a `name` (string). Pass a report's `id` to \"Get Report by ID\" to execute it and retrieve its data.  Results default to page 1 with 500 records per page (maximum 1000). Out-of-range page numbers are clamped to the nearest valid page rather than returning an error. Invalid or zero values for `page` and `page_size` fall back to their defaults.  The `pagination` object includes `total_records`, `current_page`, `total_pages`, and nullable `next_page`/`prev_page` links. When there is no next or previous page the corresponding value is `null`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | The page number to retrieve. Out-of-range values are clamped to the nearest valid page. Defaults to 1.
$page_size = 500; // int | The number of records to retrieve per page. Defaults to 500. Maximum is 1000.

try {
    $result = $apiInstance->listReports($page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->listReports: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| The page number to retrieve. Out-of-range values are clamped to the nearest valid page. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of records to retrieve per page. Defaults to 500. Maximum is 1000. | [optional] [default to 500] |

### Return type

[**\BhrSdk\Model\ReportsResponse**](../Model/ReportsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
