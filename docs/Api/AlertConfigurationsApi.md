# BhrSdk\AlertConfigurationsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**a05e93bc2eb9c39a40fbd71e6e07f3c6()**](AlertConfigurationsApi.md#a05e93bc2eb9c39a40fbd71e6e07f3c6) | **POST** /api/v1/alert-configurations | Create an alert configuration |
| [**call14e66bfb5f075043221ce1e843c97493()**](AlertConfigurationsApi.md#call14e66bfb5f075043221ce1e843c97493) | **GET** /api/v1/alert-configurations/{id} | Get an alert configuration |
| [**call6d0a073cbf3e97fe0409de42c68fe779()**](AlertConfigurationsApi.md#call6d0a073cbf3e97fe0409de42c68fe779) | **GET** /api/v1/alert-configurations | List alert configurations |
| [**eb42aa2fa339ba5c08b147fc13c6a79e()**](AlertConfigurationsApi.md#eb42aa2fa339ba5c08b147fc13c6a79e) | **PUT** /api/v1/alert-configurations/{id} | Update an alert configuration |


## `a05e93bc2eb9c39a40fbd71e6e07f3c6()`

```php
a05e93bc2eb9c39a40fbd71e6e07f3c6($company_alert_data_object): \BhrSdk\Model\CompanyAlertDataObject
```

Create an alert configuration

Creates a new company alert configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_alert_data_object = new \BhrSdk\Model\CompanyAlertDataObject(); // \BhrSdk\Model\CompanyAlertDataObject

try {
    $result = $apiInstance->a05e93bc2eb9c39a40fbd71e6e07f3c6($company_alert_data_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertConfigurationsApi->a05e93bc2eb9c39a40fbd71e6e07f3c6: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_alert_data_object** | [**\BhrSdk\Model\CompanyAlertDataObject**](../Model/CompanyAlertDataObject.md)|  | |

### Return type

[**\BhrSdk\Model\CompanyAlertDataObject**](../Model/CompanyAlertDataObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call14e66bfb5f075043221ce1e843c97493()`

```php
call14e66bfb5f075043221ce1e843c97493($id): \BhrSdk\Model\CompanyAlertDataObject
```

Get an alert configuration

Returns a single company alert configuration by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call14e66bfb5f075043221ce1e843c97493($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertConfigurationsApi->call14e66bfb5f075043221ce1e843c97493: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\CompanyAlertDataObject**](../Model/CompanyAlertDataObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call6d0a073cbf3e97fe0409de42c68fe779()`

```php
call6d0a073cbf3e97fe0409de42c68fe779(): \BhrSdk\Model\CompanyAlertDataObject[]
```

List alert configurations

Returns all company alert configurations for the authenticated company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->call6d0a073cbf3e97fe0409de42c68fe779();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertConfigurationsApi->call6d0a073cbf3e97fe0409de42c68fe779: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompanyAlertDataObject[]**](../Model/CompanyAlertDataObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `eb42aa2fa339ba5c08b147fc13c6a79e()`

```php
eb42aa2fa339ba5c08b147fc13c6a79e($id, $company_alert_data_object): \BhrSdk\Model\CompanyAlertDataObject
```

Update an alert configuration

Updates an existing company alert configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertConfigurationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$company_alert_data_object = new \BhrSdk\Model\CompanyAlertDataObject(); // \BhrSdk\Model\CompanyAlertDataObject

try {
    $result = $apiInstance->eb42aa2fa339ba5c08b147fc13c6a79e($id, $company_alert_data_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertConfigurationsApi->eb42aa2fa339ba5c08b147fc13c6a79e: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **company_alert_data_object** | [**\BhrSdk\Model\CompanyAlertDataObject**](../Model/CompanyAlertDataObject.md)|  | |

### Return type

[**\BhrSdk\Model\CompanyAlertDataObject**](../Model/CompanyAlertDataObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
