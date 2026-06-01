# BhrSdk\AlertApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**call0f0dcb585e5883175b6557c16cf6755a()**](AlertApi.md#call0f0dcb585e5883175b6557c16cf6755a) | **GET** /api/v1/alerts | List alert templates |


## `call0f0dcb585e5883175b6557c16cf6755a()`

```php
call0f0dcb585e5883175b6557c16cf6755a(): \BhrSdk\Model\AlertTemplateListResponse
```

List alert templates

Returns all available alert templates with their IDs, names, and group names. Use the returned IDs when creating or updating company alert configurations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->call0f0dcb585e5883175b6557c16cf6755a();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertApi->call0f0dcb585e5883175b6557c16cf6755a: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\AlertTemplateListResponse**](../Model/AlertTemplateListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
