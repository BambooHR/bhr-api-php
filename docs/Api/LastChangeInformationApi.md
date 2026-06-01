# BhrSdk\LastChangeInformationApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getChangedEmployeeIds()**](LastChangeInformationApi.md#getChangedEmployeeIds) | **GET** /api/v1/employees/changed | Get Changed Employee IDs |


## `getChangedEmployeeIds()`

```php
getChangedEmployeeIds($since, $type): \BhrSdk\Model\ChangedEmployeeIdsResponse
```

Get Changed Employee IDs

Returns a list of employee IDs that have changed since the given timestamp. This allows for efficient syncing of employee data — rather than downloading all employees, only those that have changed are returned. A change in ANY individual field in the employee record, as well as any change to the employment status, job info, or compensation tables, will cause that employee to be returned. Each entry includes the employee ID, the type of change (Inserted, Updated, or Deleted), and the last-changed timestamp.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LastChangeInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | ISO 8601 timestamp (URL-encoded). Only employees changed since this timestamp will be returned.
$type = 'type_example'; // string | Filter by change type. If omitted, all change types are returned.

try {
    $result = $apiInstance->getChangedEmployeeIds($since, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LastChangeInformationApi->getChangedEmployeeIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **since** | **\DateTime**| ISO 8601 timestamp (URL-encoded). Only employees changed since this timestamp will be returned. | |
| **type** | **string**| Filter by change type. If omitted, all change types are returned. | [optional] |

### Return type

[**\BhrSdk\Model\ChangedEmployeeIdsResponse**](../Model/ChangedEmployeeIdsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
