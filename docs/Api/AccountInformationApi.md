# BhrSdk\AccountInformationApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCountriesOptions()**](AccountInformationApi.md#getCountriesOptions) | **GET** /api/v1/meta/countries/options | Get Countries |
| [**getListOfUsers()**](AccountInformationApi.md#getListOfUsers) | **GET** /api/v1/meta/users | Get Users |
| [**getStatesByCountryId()**](AccountInformationApi.md#getStatesByCountryId) | **GET** /api/v1/meta/provinces/{countryId} | Get States by Country ID |
| [**metadataAddOrUpdateValuesForListFields()**](AccountInformationApi.md#metadataAddOrUpdateValuesForListFields) | **PUT** /api/v1/meta/lists/{listFieldId} | Create or Update List Field Values |
| [**metadataGetAListOfFields()**](AccountInformationApi.md#metadataGetAListOfFields) | **GET** /api/v1/meta/fields | Get Fields |
| [**metadataGetAListOfTabularFields()**](AccountInformationApi.md#metadataGetAListOfTabularFields) | **GET** /api/v1/meta/tables | Get Tabular Fields |
| [**metadataGetDetailsForListFields()**](AccountInformationApi.md#metadataGetDetailsForListFields) | **GET** /api/v1/meta/lists | Get List Field Details |


## `getCountriesOptions()`

```php
getCountriesOptions(): \BhrSdk\Model\CountrySchema[]
```

Get Countries

Get all available countries as options. Returns a list of countries with ID and name for use in forms and dropdowns.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCountriesOptions();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getCountriesOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CountrySchema[]**](../Model/CountrySchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getListOfUsers()`

```php
getListOfUsers()
```

Get Users

Retrieves a list of all active users in the system with their basic information. This includes user IDs, names, and email addresses. The list can be used to map user IDs to user information throughout the API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->getListOfUsers();
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getListOfUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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

## `getStatesByCountryId()`

```php
getStatesByCountryId($country_id): \BhrSdk\Model\StateProvinceResponseSchema
```

Get States by Country ID

Get states/provinces for a specific country. Returns a list of state/province options with ID, label, ISO code, and name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country_id = 56; // int | ID of the country to get states/provinces for

try {
    $result = $apiInstance->getStatesByCountryId($country_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getStatesByCountryId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country_id** | **int**| ID of the country to get states/provinces for | |

### Return type

[**\BhrSdk\Model\StateProvinceResponseSchema**](../Model/StateProvinceResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataAddOrUpdateValuesForListFields()`

```php
metadataAddOrUpdateValuesForListFields($list_field_id, $list_field_values)
```

Create or Update List Field Values

This resource accepts one or more options. To update an option, specify an ID. You may also remove an option from the list of current values by archiving the value. To create a new option, do not specify an \"id\" attribute.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_field_id = 'list_field_id_example'; // string
$list_field_values = new \BhrSdk\Model\ListFieldValues(); // \BhrSdk\Model\ListFieldValues

try {
    $apiInstance->metadataAddOrUpdateValuesForListFields($list_field_id, $list_field_values);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->metadataAddOrUpdateValuesForListFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_field_id** | **string**|  | |
| **list_field_values** | [**\BhrSdk\Model\ListFieldValues**](../Model/ListFieldValues.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataGetAListOfFields()`

```php
metadataGetAListOfFields($accept_header_parameter)
```

Get Fields

This endpoint can help with discovery of fields that are available in an account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetAListOfFields($accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->metadataGetAListOfFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

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

## `metadataGetAListOfTabularFields()`

```php
metadataGetAListOfTabularFields($accept_header_parameter)
```

Get Tabular Fields

This endpoint can help discover table fields available in your BambooHR account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetAListOfTabularFields($accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->metadataGetAListOfTabularFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

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

## `metadataGetDetailsForListFields()`

```php
metadataGetDetailsForListFields($accept_header_parameter)
```

Get List Field Details

This endpoint will return details for all list fields. Lists that can be edited will have the \"manageable\" attribute set to yes. Lists with the \"multiple\" attribute set to yes are fields that can have multiple values. Options with the \"archived\" attribute set to yes should not appear as current options, but are included so that historical data can reference the value.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetDetailsForListFields($accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->metadataGetDetailsForListFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

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
