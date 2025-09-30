# MySdk\ReportsApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCompanyReport()**](ReportsApi.md#getCompanyReport) | **GET** /api/v1/reports/{id} | Get company report |
| [**requestCustomReport()**](ReportsApi.md#requestCustomReport) | **POST** /api/v1/reports/custom | Request a custom report |


## `getCompanyReport()`

```php
getCompanyReport($id, $format, $accept_header_parameter, $fd, $only_current)
```

Get company report

**Warning: This endpoint will soon be deprecated and replaced with Custom Reports - Get Report by ID.**   Use this resource to request one of your existing custom company reports from the My Reports or Manage Reports sections in the Reports tab. You can get the report number by hovering over the report name and noting the ID from the URL. At present, only reports from the My Reports or Manage Reports sections are supported. In the future we may implement reports from the Standard Reports section if there is enough demand for it. The report numbers used in this request are different in each company.

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

$apiInstance = new MySdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is a report ID.
$format = 'format_example'; // string | The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$fd = 'fd_example'; // string | yes=apply standard duplicate field filtering, no=return the raw results with no duplicate filtering. Default value is \"yes\"
$only_current = false; // bool | Setting to false will return future dated values from history table fields.

try {
    $apiInstance->getCompanyReport($id, $format, $accept_header_parameter, $fd, $only_current);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->getCompanyReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is a report ID. | |
| **format** | **string**| The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **fd** | **string**| yes&#x3D;apply standard duplicate field filtering, no&#x3D;return the raw results with no duplicate filtering. Default value is \&quot;yes\&quot; | [optional] |
| **only_current** | **bool**| Setting to false will return future dated values from history table fields. | [optional] [default to false] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestCustomReport()`

```php
requestCustomReport($format, $request_custom_report, $only_current)
```

Request a custom report

**Warning: This endpoint will soon be deprecated and replaced with Datasets - Get Data from Dataset.**   Use this resource to request BambooHR generate a report. You must specify a type of either \"PDF\", \"XLS\", \"CSV\", \"JSON\", or \"XML\". You must specify a list of fields to show on the report. The list of fields is available here. The custom report will return employees regardless of their status, \"Active\" or \"Inactive\". This differs from the UI, which by default applies a quick filter to display only \"Active\" employees.

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

$apiInstance = new MySdk\Api\ReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$format = 'format_example'; // string | The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON
$request_custom_report = new \MySdk\Model\RequestCustomReport(); // \MySdk\Model\RequestCustomReport
$only_current = false; // bool | Limits the report to only current employees. Setting to false will include future-dated employees in the report.

try {
    $apiInstance->requestCustomReport($format, $request_custom_report, $only_current);
} catch (Exception $e) {
    echo 'Exception when calling ReportsApi->requestCustomReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **format** | **string**| The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON | |
| **request_custom_report** | [**\MySdk\Model\RequestCustomReport**](../Model/RequestCustomReport.md)|  | |
| **only_current** | **bool**| Limits the report to only current employees. Setting to false will include future-dated employees in the report. | [optional] [default to false] |

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
