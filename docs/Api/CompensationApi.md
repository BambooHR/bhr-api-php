# BhrSdk\CompensationApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**c5880b509783cd9d7fce9ddf5d6af1be()**](CompensationApi.md#c5880b509783cd9d7fce9ddf5d6af1be) | **PUT** /api/v1/compensation/equity/settings | Update company equity settings |
| [**call9f398e2652ea47a6dc5121ce5184222a()**](CompensationApi.md#call9f398e2652ea47a6dc5121ce5184222a) | **GET** /api/v1/compensation/tools | List available compensation tools |
| [**db49fb29f9f04d59afad7c01ce860418()**](CompensationApi.md#db49fb29f9f04d59afad7c01ce860418) | **GET** /api/v1/compensation/equity/settings | Get company equity settings |


## `c5880b509783cd9d7fce9ddf5d6af1be()`

```php
c5880b509783cd9d7fce9ddf5d6af1be($compensation_equity_settings_update_request): \BhrSdk\Model\CompensationEquitySettingsResponse
```

Update company equity settings

Updates company-level equity settings including calculation type, valuation, shares, pricing, and vesting-related configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$compensation_equity_settings_update_request = new \BhrSdk\Model\CompensationEquitySettingsUpdateRequest(); // \BhrSdk\Model\CompensationEquitySettingsUpdateRequest

try {
    $result = $apiInstance->c5880b509783cd9d7fce9ddf5d6af1be($compensation_equity_settings_update_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationApi->c5880b509783cd9d7fce9ddf5d6af1be: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **compensation_equity_settings_update_request** | [**\BhrSdk\Model\CompensationEquitySettingsUpdateRequest**](../Model/CompensationEquitySettingsUpdateRequest.md)|  | |

### Return type

[**\BhrSdk\Model\CompensationEquitySettingsResponse**](../Model/CompensationEquitySettingsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call9f398e2652ea47a6dc5121ce5184222a()`

```php
call9f398e2652ea47a6dc5121ce5184222a(): \BhrSdk\Model\CompensationToolsResponse
```

List available compensation tools

Returns the list of available compensation tools/settings for the company, including Levels & Bands, Compensation Benchmarking, Compensation Planning, and Total Rewards. Also returns upsell information if applicable.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->call9f398e2652ea47a6dc5121ce5184222a();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationApi->call9f398e2652ea47a6dc5121ce5184222a: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompensationToolsResponse**](../Model/CompensationToolsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `db49fb29f9f04d59afad7c01ce860418()`

```php
db49fb29f9f04d59afad7c01ce860418(): \BhrSdk\Model\CompensationEquitySettingsResponse
```

Get company equity settings

Retrieves company-level equity settings including calculation type, valuation, shares, pricing, and vesting-related configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->db49fb29f9f04d59afad7c01ce860418();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationApi->db49fb29f9f04d59afad7c01ce860418: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompensationEquitySettingsResponse**](../Model/CompensationEquitySettingsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
