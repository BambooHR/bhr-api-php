# BhrSdk\ReportsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCompanyReport()**](ReportsApi.md#getCompanyReport) | **GET** /api/v1/reports/{id} | Get Company Report |
| [**requestCustomReport()**](ReportsApi.md#requestCustomReport) | **POST** /api/v1/reports/custom | Request Custom Report |


## `getCompanyReport()`

```php
getCompanyReport($id, $accept, $format, $fd, $only_current): \BhrSdk\Model\GetCompanyReportResponse
```

Get Company Report

**Deprecated. Use Custom Reports > Get Report by ID instead.**  Returns the data from an existing saved custom report. Non-admins can find these reports in My Reports. Admins can find them in Custom Reports under the My Reports and Company Reports tabs. The report ID can be found by hovering over the report name in BambooHR and noting the ID in the URL. Standard Reports are not available via this endpoint, and report IDs are company-specific.  The caller must have permission to view or access the report. The `format` query parameter is case-insensitive (`json`, `JSON`, `Json` are all accepted). If `format` is omitted, the output format is inferred from the `Accept` header, but only these exact values are supported: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`. Any other `Accept` value (including `application/xml` and `*_/_*`) returns 404.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The integer ID of the saved custom report to run. Find this ID by hovering over the report name in the BambooHR Reports tab and noting the ID in the URL.
$accept = 'accept_example'; // string | The desired response content type when `format` is omitted. Accepted values: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`. Any other value returns 404.
$format = 'format_example'; // string | The output format for the report. Case-insensitive. If omitted, format is inferred from the `Accept` header — only `application/json`, `text/xml`, `text/csv`, `application/pdf`, and `application/vnd.ms-excel` are accepted; any other value returns 404.
$fd = 'fd_example'; // string | Controls duplicate row filtering. `yes` applies standard deduplication (default for JSON and XML formats). `no` returns raw results without filtering (default for CSV and XLS formats).
$only_current = true; // bool | Whether to restrict historical fields to current values only. Set to false to include future-dated history values in the report output. Defaults to true.

try {
    $result = $apiInstance->getCompanyReport($id, $accept, $format, $fd, $only_current);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->getCompanyReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The integer ID of the saved custom report to run. Find this ID by hovering over the report name in the BambooHR Reports tab and noting the ID in the URL. | |
| **accept** | **string**| The desired response content type when &#x60;format&#x60; is omitted. Accepted values: &#x60;application/json&#x60;, &#x60;text/xml&#x60;, &#x60;text/csv&#x60;, &#x60;application/pdf&#x60;, &#x60;application/vnd.ms-excel&#x60;. Any other value returns 404. | [optional] |
| **format** | **string**| The output format for the report. Case-insensitive. If omitted, format is inferred from the &#x60;Accept&#x60; header — only &#x60;application/json&#x60;, &#x60;text/xml&#x60;, &#x60;text/csv&#x60;, &#x60;application/pdf&#x60;, and &#x60;application/vnd.ms-excel&#x60; are accepted; any other value returns 404. | [optional] |
| **fd** | **string**| Controls duplicate row filtering. &#x60;yes&#x60; applies standard deduplication (default for JSON and XML formats). &#x60;no&#x60; returns raw results without filtering (default for CSV and XLS formats). | [optional] |
| **only_current** | **bool**| Whether to restrict historical fields to current values only. Set to false to include future-dated history values in the report output. Defaults to true. | [optional] [default to true] |

### Return type

[**\BhrSdk\Model\GetCompanyReportResponse**](../Model/GetCompanyReportResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestCustomReport()`

```php
requestCustomReport($request_custom_report, $accept, $format, $only_current): \BhrSdk\Model\RequestCustomReportResponse
```

Request Custom Report

**Deprecated. Use Datasets > Get Data from Dataset instead.**  Generates an ad-hoc employee report based on a caller-specified list of fields and optional filters. Returns report data in the requested format (JSON, XML, CSV, XLS, or PDF). The report includes all employees regardless of status (both Active and Inactive), unlike the BambooHR UI which filters to Active employees by default.  The request body may be submitted as JSON or XML. To submit JSON, set `Content-Type: application/json` exactly — any variation such as `application/json; charset=UTF-8` is not recognised as JSON and the body will be parsed as XML instead, which typically results in `400 Malformed XML`. To submit XML, set `Content-Type` to any other value; the body must be a `<report>` document as described in the XML request body schema.  The `format` query parameter is case-insensitive (`json`, `JSON`, `Json` are all accepted). If `format` is omitted, the output format is inferred from the `Accept` header, but only these exact values are supported: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`. Any other `Accept` value (including `application/xml` and `*_/_*`) will return 404.  Field IDs in the request that are unknown or that the caller does not have permission to view are silently omitted from the report — the endpoint still returns 200. The `filters` object supports `lastChanged` (ISO 8601 date-time to filter employees by last-modified date, with optional `includeNull` control) and `employeeIds` (restrict results to specific employee IDs). The maximum number of fields per request is 400.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_custom_report = new \BhrSdk\Model\RequestCustomReport(); // \BhrSdk\Model\RequestCustomReport
$accept = 'accept_example'; // string | The desired response content type when `format` is omitted. Accepted values: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`. Any other value returns 404.
$format = 'format_example'; // string | The output format for the report. Case-insensitive. If omitted, format is inferred from the `Accept` header — only `application/json`, `text/xml`, `text/csv`, `application/pdf`, and `application/vnd.ms-excel` are accepted; any other value returns 404.
$only_current = true; // bool | Whether to restrict historical fields to current values only. Set to false to include future-dated history values in the report output. Defaults to true.

try {
    $result = $apiInstance->requestCustomReport($request_custom_report, $accept, $format, $only_current);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->requestCustomReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_custom_report** | [**\BhrSdk\Model\RequestCustomReport**](../Model/RequestCustomReport.md)|  | |
| **accept** | **string**| The desired response content type when &#x60;format&#x60; is omitted. Accepted values: &#x60;application/json&#x60;, &#x60;text/xml&#x60;, &#x60;text/csv&#x60;, &#x60;application/pdf&#x60;, &#x60;application/vnd.ms-excel&#x60;. Any other value returns 404. | [optional] |
| **format** | **string**| The output format for the report. Case-insensitive. If omitted, format is inferred from the &#x60;Accept&#x60; header — only &#x60;application/json&#x60;, &#x60;text/xml&#x60;, &#x60;text/csv&#x60;, &#x60;application/pdf&#x60;, and &#x60;application/vnd.ms-excel&#x60; are accepted; any other value returns 404. | [optional] |
| **only_current** | **bool**| Whether to restrict historical fields to current values only. Set to false to include future-dated history values in the report output. Defaults to true. | [optional] [default to true] |

### Return type

[**\BhrSdk\Model\RequestCustomReportResponse**](../Model/RequestCustomReportResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`, `text/xml`, `text/csv`, `application/pdf`, `application/vnd.ms-excel`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
