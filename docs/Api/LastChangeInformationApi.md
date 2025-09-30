# BhrSdk\LastChangeInformationApi

All URIs are relative to https://company.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getChangedEmployeeIds()**](LastChangeInformationApi.md#getChangedEmployeeIds) | **GET** /api/v1/employees/changed | Gets all updated employee IDs |


## `getChangedEmployeeIds()`

```php
getChangedEmployeeIds($since, $type)
```

Gets all updated employee IDs

This API allows for efficient syncing of employee data. When you use this API you will provide a timestamp and the results will be limited to just the employees that have changed since the time you provided. This API operates on an employee-last-changed-timestamp, which means that a change in ANY individual field in the employee record, as well as any change to the employment status, job info, or compensation tables, will cause that employee to be returned via this API.

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

$apiInstance = new BhrSdk\Api\LastChangeInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$since = 'since_example'; // string | URL encoded iso8601 timestamp
$type = 'type_example'; // string | Use one of these in the {type} variable in the URL: \"inserted\", \"updated\", \"deleted\"

try {
    $apiInstance->getChangedEmployeeIds($since, $type);
} catch (Exception $e) {
    echo 'Exception when calling LastChangeInformationApi->getChangedEmployeeIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **since** | **string**| URL encoded iso8601 timestamp | |
| **type** | **string**| Use one of these in the {type} variable in the URL: \&quot;inserted\&quot;, \&quot;updated\&quot;, \&quot;deleted\&quot; | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
