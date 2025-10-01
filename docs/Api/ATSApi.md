# BhrSdk\ATSApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getApplicationDetails()**](ATSApi.md#getApplicationDetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Application Details |


## `getApplicationDetails()`

```php
getApplicationDetails($application_id): \BhrSdk\Model\GetApplicationDetails200Response
```

Get Application Details

Get the details of an application. The owner of the API key used must have access to ATS settings.

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

$apiInstance = new BhrSdk\Api\ATSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 56; // int | The ID of the application to look up details.

try {
    $result = $apiInstance->getApplicationDetails($application_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ATSApi->getApplicationDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application to look up details. | |

### Return type

[**\BhrSdk\Model\GetApplicationDetails200Response**](../Model/GetApplicationDetails200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
