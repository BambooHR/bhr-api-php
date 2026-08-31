# BhrSdk\CustomReportsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getLegacyReportFieldMap()**](CustomReportsApi.md#getLegacyReportFieldMap) | **GET** /api/v1/custom-reports/legacy-field-map | Get Legacy Report Field Map |
| [**getLegacyReportIdMap()**](CustomReportsApi.md#getLegacyReportIdMap) | **GET** /api/v1/custom-reports/legacy-id-map | Get Legacy Report ID Map |
| [**getReportById()**](CustomReportsApi.md#getReportById) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID |
| [**listReports()**](CustomReportsApi.md#listReports) | **GET** /api/v1/custom-reports | List Reports |


## `getLegacyReportFieldMap()`

```php
getLegacyReportFieldMap(): \BhrSdk\Model\LegacyReportFieldMapResponse
```

Get Legacy Report Field Map

Returns the mapping from the field identifiers the deprecated Reports > Get Company Report (`get-company-report`) endpoint emitted to the field names the Custom Reports and Datasets endpoints use today. Use it to repoint automations that still reference legacy identifiers — a field that came back as `location` before the report migration is `jobInformationLocation` afterward. To translate legacy report IDs rather than field identifiers, use Get Legacy Report ID Map (`get-legacy-report-id-map`) instead.  The map covers the whole company and is not paginated. It is not scoped to the calling user's reports or field permissions, so a field appearing here does not mean the caller can read its data.  A legacy identifier can map to more than one field. The legacy report emitted an amount column and its currency-code column under a single identifier, so `payRate` maps to both `compensationPayRate` and `compensationPayRateCurrencyCode`. The identifier alone cannot tell you which one a given report used, so compare `type` or `fieldLabel` against the column you are replacing. An identifier that is absent from the response has no equivalent field at all — that column was lost in the migration, and there is nothing to point an automation at.  Some legacy fields encoded a category in the field itself: a legacy \"Vacation\" time off field returned only vacation hours. These map to a general field plus a `qualifier`, and you have to apply it. If you request the mapped `fieldName` on its own, you get every category rather than the one the legacy field returned. The operator differs by field — time off policy qualifiers use `equal`, while time off category, benefit plan, and training qualifiers use `includes` and expect the value wrapped in an array. To reproduce a legacy \"Safety Training\" due-date column, request `trainingDueDate` and filter `{\"field\": \"trainingName\", \"operator\": \"includes\", \"value\": [\"Safety Training\"]}`.  Qualifier values are legacy names carried over without validation, so a category, plan, or training that has since been renamed or removed will produce a qualifier that matches nothing. Check the value against Datasets > Get Field Options (v1.2) (`get-field-options-v1_2`) before repointing an automation.  The map is cached per account for up to an hour, so a field that was just added or renamed may not appear immediately.  OAuth Scopes: report

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

try {
    $result = $apiInstance->getLegacyReportFieldMap();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->getLegacyReportFieldMap: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\LegacyReportFieldMapResponse**](../Model/LegacyReportFieldMapResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLegacyReportIdMap()`

```php
getLegacyReportIdMap(): \BhrSdk\Model\LegacyReportIDMapResponse
```

Get Legacy Report ID Map

Returns a mapping from legacy custom report IDs to the new report IDs created by the report migration. Use this to update automations or integrations that still reference legacy report IDs. Pass a `newReportId` to Get Report by ID (`get-report-by-id`) to execute the migrated report.  Administrators receive a mapping for every custom report in the account; other users receive mappings only for the custom reports they can access (reports they own or that are shared with them). Because the map for a non-administrator is silently limited to their accessible reports, a legacy ID that is absent may be outside that user's visibility rather than nonexistent in the account.  Each entry pairs a `legacyReportId` with its `newReportId` and a `status`. When a report has not been migrated, `newReportId` is `null` and `status` is `notMigrated`; otherwise `newReportId` is the migrated report's ID and `status` is `migrated`.  Returns an empty `mappings` array when the user has no accessible custom reports.  OAuth Scopes: report

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

try {
    $result = $apiInstance->getLegacyReportIdMap();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->getLegacyReportIdMap: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\LegacyReportIDMapResponse**](../Model/LegacyReportIDMapResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReportById()`

```php
getReportById($report_id, $page, $page_size): \BhrSdk\Model\CustomReportResponse
```

Get Report by ID

Executes a saved custom report and returns its data using the report's configured fields and filters. The `data` array contains employee record objects whose keys are determined by the fields selected when the report was created — each object is a flat key-value map where keys are field names (e.g. `firstName`, `status`, `hireDate`) and values are strings or `null`. The `aggregations` array is empty unless the report's underlying dataset configuration includes aggregation rules. Use \"List Reports\" to discover available report IDs.  Response shape: Each element of `data` is a flat key-value object — field values are top-level keys (e.g. `row[\"firstName\"]`). This differs from `get-data-from-dataset-v2`, where field values are nested under a `fields` key (e.g. `row[\"fields\"][\"firstName\"]`).  The top-level `fields` array lists the report's columns in the order the report shows them. Each entry's `name` is the key that column uses in every `data` record, and `label` is the column heading the customer sees in BambooHR — their own wording if they renamed the column. When `label` is `null`, display `name`.  There is no schema-only response from this endpoint.  The `pagination.total_records` value is the number of rows produced by the saved report after applying the report's configured filters, not necessarily the total number of employees in the account. Validate output before using in automated pipelines.  Results default to page 1 with 500 records per page (maximum 1000). Out-of-range page numbers are clamped to the nearest valid page. Invalid or zero values for `page` and `page_size` fall back to their defaults.  OAuth Scopes: report

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

[**\BhrSdk\Model\CustomReportResponse**](../Model/CustomReportResponse.md)

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

Returns a paginated list of saved custom reports available in the account. Each report entry contains an `id` (integer) and a `name` (string). Pass a report's `id` to \"Get Report by ID\" to execute it and retrieve its data.  Results default to page 1 with 500 records per page (maximum 1000). Out-of-range page numbers are clamped to the nearest valid page rather than returning an error. Invalid or zero values for `page` and `page_size` fall back to their defaults.  The `pagination` object includes `total_records`, `current_page`, `total_pages`, and nullable `next_page`/`prev_page` links. When there is no next or previous page the corresponding value is `null`.  OAuth Scopes: report

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
