# BhrSdk\CompensationPlanningApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**a05b6d5f564f805d688ff2c1e37c3990()**](CompensationPlanningApi.md#a05b6d5f564f805d688ff2c1e37c3990) | **POST** /api/v1/compensation/planning_cycles/{id}/recommendations/send | Send recommendations to next stage |
| [**a6b8da1348a3151fe95adc03aaf64447()**](CompensationPlanningApi.md#a6b8da1348a3151fe95adc03aaf64447) | **GET** /api/v1/compensation/planning_cycles/{id}/employees | List employees in compensation planning cycle |
| [**b1e467e0eef72350eec61fcfeaf4e19d()**](CompensationPlanningApi.md#b1e467e0eef72350eec61fcfeaf4e19d) | **DELETE** /api/v1/compensation/planning_cycles/{id}/approvals/employee/{employeeId} | Remove from approval flow |
| [**b3c51254de6918637a971fe4af382a53()**](CompensationPlanningApi.md#b3c51254de6918637a971fe4af382a53) | **GET** /api/v1/compensation/planning_cycles/{id}/admins | List compensation planning cycle admins |
| [**b65f246186b41a9783a9397c11c703b4()**](CompensationPlanningApi.md#b65f246186b41a9783a9397c11c703b4) | **GET** /api/v1/compensation/planning_cycles | List compensation planning cycles |
| [**c79f9c5950f983e59d2626faa30c00a1()**](CompensationPlanningApi.md#c79f9c5950f983e59d2626faa30c00a1) | **PUT** /api/v1/compensation/planning_cycles/{id}/change_comm/template | Save change comm template |
| [**c7c32ed5278ac67e2e518bf7484a75dc()**](CompensationPlanningApi.md#c7c32ed5278ac67e2e518bf7484a75dc) | **POST** /api/v1/compensation/planning_cycles/{id}/admins | Add cycle admins |
| [**call100b0cf8c5207b35697ff10370fd5fe1()**](CompensationPlanningApi.md#call100b0cf8c5207b35697ff10370fd5fe1) | **PUT** /api/v1/compensation/planning_cycles/{id} | Update compensation planning cycle |
| [**call1d1fc0f164cb51973a0206b8e2fb2d2d()**](CompensationPlanningApi.md#call1d1fc0f164cb51973a0206b8e2fb2d2d) | **POST** /api/v1/compensation/planning_cycles/{id}/budgets/import | Import budget breakdown |
| [**call1d64402ee192568adbd5e3179a91e6e2()**](CompensationPlanningApi.md#call1d64402ee192568adbd5e3179a91e6e2) | **PUT** /api/v1/compensation/planning_cycles/{id}/budgets/breakdown | Save budget breakdown |
| [**call22ad75be25455279e2987c80851af5fc()**](CompensationPlanningApi.md#call22ad75be25455279e2987c80851af5fc) | **DELETE** /api/v1/compensation/planning_cycles/{id} | Delete compensation planning cycle |
| [**call329acecaa6df729733d0752aa9f6b204()**](CompensationPlanningApi.md#call329acecaa6df729733d0752aa9f6b204) | **GET** /api/v1/compensation/planning_cycles/{id}/worksheet | Get compensation planning cycle worksheet |
| [**call3958585c861325ea7a2cd30a8c74f042()**](CompensationPlanningApi.md#call3958585c861325ea7a2cd30a8c74f042) | **POST** /api/v1/compensation/planning_cycles/{id}/employees | Add employees to cycle |
| [**call3a19f07aa737dc826ba43b9a1c1cd257()**](CompensationPlanningApi.md#call3a19f07aa737dc826ba43b9a1c1cd257) | **PUT** /api/v1/compensation/planning_cycles/{id}/launch | Launch compensation planning cycle |
| [**call4e886b18264480611f380805301c49c4()**](CompensationPlanningApi.md#call4e886b18264480611f380805301c49c4) | **GET** /api/v1/compensation/planning_cycles/{id}/approvals | Get compensation planning approval flows |
| [**call593d5bff120edf2a218a92022a682728()**](CompensationPlanningApi.md#call593d5bff120edf2a218a92022a682728) | **GET** /api/v1/compensation/planning_cycles/{id}/worksheet/export | Export compensation planning cycle worksheet to CSV |
| [**call5c2b55158b0950b1e9211655666645b6()**](CompensationPlanningApi.md#call5c2b55158b0950b1e9211655666645b6) | **GET** /api/v1/compensation/planning_cycles/{id} | Get compensation planning cycle details |
| [**call5c4aab35a34f5760ec044104b5232bf5()**](CompensationPlanningApi.md#call5c4aab35a34f5760ec044104b5232bf5) | **POST** /api/v1/compensation/planning_cycles/{id}/approvals/final_approver/{employeeId} | Set final approver |
| [**call7efceaee2c010f88244dd01ee81e6e7b()**](CompensationPlanningApi.md#call7efceaee2c010f88244dd01ee81e6e7b) | **GET** /api/v1/compensation/planning_cycles/{id}/budgets | Get compensation planning cycle budgets |
| [**call89a5068111ec499135c7d6e9a53d5a30()**](CompensationPlanningApi.md#call89a5068111ec499135c7d6e9a53d5a30) | **DELETE** /api/v1/compensation/planning_cycles/{id}/employees | Remove employees from cycle |
| [**call9bc279d788f6e86b4cd8b2e0d3de91b1()**](CompensationPlanningApi.md#call9bc279d788f6e86b4cd8b2e0d3de91b1) | **GET** /api/v1/compensation/planning_cycles/{id}/summary | Get compensation planning cycle summary |
| [**cf87b8e09a001b6fb81dfce6c20ab9e3()**](CompensationPlanningApi.md#cf87b8e09a001b6fb81dfce6c20ab9e3) | **PUT** /api/v1/compensation/planning_cycles/{id}/approvals/{templateId} | Update approval flow |
| [**d6987e300672a00c7cfe59afebb64156()**](CompensationPlanningApi.md#d6987e300672a00c7cfe59afebb64156) | **GET** /api/v1/compensation/planning_cycles/{id}/change_comm | Get change communication letter details |
| [**dacd313af2106213fc4696175941ce65()**](CompensationPlanningApi.md#dacd313af2106213fc4696175941ce65) | **PUT** /api/v1/compensation/planning_cycles/{id}/budgets/guidelines | Save budget guidelines |
| [**e2ac4e1535f296cb8901f209e04caa83()**](CompensationPlanningApi.md#e2ac4e1535f296cb8901f209e04caa83) | **POST** /api/v1/compensation/planning_cycles | Create compensation planning cycle |
| [**ef7619b0ee4c8dc079aaea870cfbe81b()**](CompensationPlanningApi.md#ef7619b0ee4c8dc079aaea870cfbe81b) | **DELETE** /api/v1/compensation/planning_cycles/{id}/admins/{employeeId} | Remove cycle admin |
| [**f3883a522dadbe9e11b34f8b656e3adb()**](CompensationPlanningApi.md#f3883a522dadbe9e11b34f8b656e3adb) | **POST** /api/v1/compensation/planning_cycles/{id}/recommendations | Save recommendations |
| [**f4b431363af6573af46750f32632e88b()**](CompensationPlanningApi.md#f4b431363af6573af46750f32632e88b) | **PUT** /api/v1/compensation/planning_cycles/{id}/complete | Complete compensation planning cycle |


## `a05b6d5f564f805d688ff2c1e37c3990()`

```php
a05b6d5f564f805d688ff2c1e37c3990($id, $a05b6d5f564f805d688ff2c1e37c3990_request): \BhrSdk\Model\SendRecommendationsResponse
```

Send recommendations to next stage

Send recommendations to the next approval stage for a specific approval flow template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$a05b6d5f564f805d688ff2c1e37c3990_request = new \BhrSdk\Model\A05b6d5f564f805d688ff2c1e37c3990Request(); // \BhrSdk\Model\A05b6d5f564f805d688ff2c1e37c3990Request

try {
    $result = $apiInstance->a05b6d5f564f805d688ff2c1e37c3990($id, $a05b6d5f564f805d688ff2c1e37c3990_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->a05b6d5f564f805d688ff2c1e37c3990: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **a05b6d5f564f805d688ff2c1e37c3990_request** | [**\BhrSdk\Model\A05b6d5f564f805d688ff2c1e37c3990Request**](../Model/A05b6d5f564f805d688ff2c1e37c3990Request.md)|  | |

### Return type

[**\BhrSdk\Model\SendRecommendationsResponse**](../Model/SendRecommendationsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `a6b8da1348a3151fe95adc03aaf64447()`

```php
a6b8da1348a3151fe95adc03aaf64447($id): array<string,mixed>
```

List employees in compensation planning cycle

List employees in the compensation planning cycle (picker data: company roster and membership).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->a6b8da1348a3151fe95adc03aaf64447($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->a6b8da1348a3151fe95adc03aaf64447: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `b1e467e0eef72350eec61fcfeaf4e19d()`

```php
b1e467e0eef72350eec61fcfeaf4e19d($id, $employee_id, $group_by): array<string,mixed>
```

Remove from approval flow

Remove an employee from all approval chains for a specific cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$employee_id = 'employee_id_example'; // string
$group_by = 'group_by_example'; // string | Optional grouping for returned flows (e.g. department)

try {
    $result = $apiInstance->b1e467e0eef72350eec61fcfeaf4e19d($id, $employee_id, $group_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->b1e467e0eef72350eec61fcfeaf4e19d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **employee_id** | **string**|  | |
| **group_by** | **string**| Optional grouping for returned flows (e.g. department) | [optional] |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `b3c51254de6918637a971fe4af382a53()`

```php
b3c51254de6918637a971fe4af382a53($id): \BhrSdk\Model\CompensationPlanningCycleAdminsResponse
```

List compensation planning cycle admins

List compensation planning cycle admins.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->b3c51254de6918637a971fe4af382a53($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->b3c51254de6918637a971fe4af382a53: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\CompensationPlanningCycleAdminsResponse**](../Model/CompensationPlanningCycleAdminsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `b65f246186b41a9783a9397c11c703b4()`

```php
b65f246186b41a9783a9397c11c703b4(): array<string,mixed>
```

List compensation planning cycles

List all compensation planning cycles for the company, including status and employee counts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->b65f246186b41a9783a9397c11c703b4();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->b65f246186b41a9783a9397c11c703b4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `c79f9c5950f983e59d2626faa30c00a1()`

```php
c79f9c5950f983e59d2626faa30c00a1($id, $c79f9c5950f983e59d2626faa30c00a1_request): \BhrSdk\Model\SaveChangeCommTemplateResponse
```

Save change comm template

Save the change communication email template for a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$c79f9c5950f983e59d2626faa30c00a1_request = new \BhrSdk\Model\C79f9c5950f983e59d2626faa30c00a1Request(); // \BhrSdk\Model\C79f9c5950f983e59d2626faa30c00a1Request

try {
    $result = $apiInstance->c79f9c5950f983e59d2626faa30c00a1($id, $c79f9c5950f983e59d2626faa30c00a1_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->c79f9c5950f983e59d2626faa30c00a1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **c79f9c5950f983e59d2626faa30c00a1_request** | [**\BhrSdk\Model\C79f9c5950f983e59d2626faa30c00a1Request**](../Model/C79f9c5950f983e59d2626faa30c00a1Request.md)|  | |

### Return type

[**\BhrSdk\Model\SaveChangeCommTemplateResponse**](../Model/SaveChangeCommTemplateResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `c7c32ed5278ac67e2e518bf7484a75dc()`

```php
c7c32ed5278ac67e2e518bf7484a75dc($id, $c7c32ed5278ac67e2e518bf7484a75dc_request): \BhrSdk\Model\AddCycleAdminsResponse
```

Add cycle admins

Add one or more cycle admins by employee IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$c7c32ed5278ac67e2e518bf7484a75dc_request = new \BhrSdk\Model\C7c32ed5278ac67e2e518bf7484a75dcRequest(); // \BhrSdk\Model\C7c32ed5278ac67e2e518bf7484a75dcRequest

try {
    $result = $apiInstance->c7c32ed5278ac67e2e518bf7484a75dc($id, $c7c32ed5278ac67e2e518bf7484a75dc_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->c7c32ed5278ac67e2e518bf7484a75dc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **c7c32ed5278ac67e2e518bf7484a75dc_request** | [**\BhrSdk\Model\C7c32ed5278ac67e2e518bf7484a75dcRequest**](../Model/C7c32ed5278ac67e2e518bf7484a75dcRequest.md)|  | |

### Return type

[**\BhrSdk\Model\AddCycleAdminsResponse**](../Model/AddCycleAdminsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call100b0cf8c5207b35697ff10370fd5fe1()`

```php
call100b0cf8c5207b35697ff10370fd5fe1($id, $details_and_currency_request_data_object): array<string,mixed>
```

Update compensation planning cycle

Update compensation planning cycle details and currency settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$details_and_currency_request_data_object = new \BhrSdk\Model\DetailsAndCurrencyRequestDataObject(); // \BhrSdk\Model\DetailsAndCurrencyRequestDataObject | Cycle details and currency settings to update

try {
    $result = $apiInstance->call100b0cf8c5207b35697ff10370fd5fe1($id, $details_and_currency_request_data_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call100b0cf8c5207b35697ff10370fd5fe1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **details_and_currency_request_data_object** | [**\BhrSdk\Model\DetailsAndCurrencyRequestDataObject**](../Model/DetailsAndCurrencyRequestDataObject.md)| Cycle details and currency settings to update | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call1d1fc0f164cb51973a0206b8e2fb2d2d()`

```php
call1d1fc0f164cb51973a0206b8e2fb2d2d($id, $_1d1fc0f164cb51973a0206b8e2fb2d2d_request): \BhrSdk\Model\BudgetBreakdownImportResponse
```

Import budget breakdown

Import budget breakdown from structured data and apply to allocations.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$_1d1fc0f164cb51973a0206b8e2fb2d2d_request = new \BhrSdk\Model\_1d1fc0f164cb51973a0206b8e2fb2d2dRequest(); // \BhrSdk\Model\_1d1fc0f164cb51973a0206b8e2fb2d2dRequest | Budget breakdown import data

try {
    $result = $apiInstance->call1d1fc0f164cb51973a0206b8e2fb2d2d($id, $_1d1fc0f164cb51973a0206b8e2fb2d2d_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call1d1fc0f164cb51973a0206b8e2fb2d2d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **_1d1fc0f164cb51973a0206b8e2fb2d2d_request** | [**\BhrSdk\Model\_1d1fc0f164cb51973a0206b8e2fb2d2dRequest**](../Model/_1d1fc0f164cb51973a0206b8e2fb2d2dRequest.md)| Budget breakdown import data | |

### Return type

[**\BhrSdk\Model\BudgetBreakdownImportResponse**](../Model/BudgetBreakdownImportResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call1d64402ee192568adbd5e3179a91e6e2()`

```php
call1d64402ee192568adbd5e3179a91e6e2($id, $_1d64402ee192568adbd5e3179a91e6e2_request_inner)
```

Save budget breakdown

Save budget breakdown for a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$_1d64402ee192568adbd5e3179a91e6e2_request_inner = array(new \BhrSdk\Model\_1d64402ee192568adbd5e3179a91e6e2RequestInner()); // \BhrSdk\Model\Model1d64402ee192568adbd5e3179a91e6e2RequestInner[] | Budget breakdown data

try {
    $apiInstance->call1d64402ee192568adbd5e3179a91e6e2($id, $_1d64402ee192568adbd5e3179a91e6e2_request_inner);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call1d64402ee192568adbd5e3179a91e6e2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **_1d64402ee192568adbd5e3179a91e6e2_request_inner** | [**\BhrSdk\Model\Model1d64402ee192568adbd5e3179a91e6e2RequestInner[]**](../Model/_1d64402ee192568adbd5e3179a91e6e2RequestInner.md)| Budget breakdown data | |

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

## `call22ad75be25455279e2987c80851af5fc()`

```php
call22ad75be25455279e2987c80851af5fc($id)
```

Delete compensation planning cycle

Delete a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->call22ad75be25455279e2987c80851af5fc($id);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call22ad75be25455279e2987c80851af5fc: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

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

## `call329acecaa6df729733d0752aa9f6b204()`

```php
call329acecaa6df729733d0752aa9f6b204($id, $type): array<string,mixed>
```

Get compensation planning cycle worksheet

Get compensation planning worksheet details for the cycle (recommendations, approvals, or overview context). Omit `type` to use the default view for the current user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$type = 'type_example'; // string | Worksheet context: recommendations, approvals, or overview (overview requires cycle admin).

try {
    $result = $apiInstance->call329acecaa6df729733d0752aa9f6b204($id, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call329acecaa6df729733d0752aa9f6b204: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **type** | **string**| Worksheet context: recommendations, approvals, or overview (overview requires cycle admin). | [optional] |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call3958585c861325ea7a2cd30a8c74f042()`

```php
call3958585c861325ea7a2cd30a8c74f042($id, $_3958585c861325ea7a2cd30a8c74f042_request)
```

Add employees to cycle

Add employees to a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$_3958585c861325ea7a2cd30a8c74f042_request = new \BhrSdk\Model\_3958585c861325ea7a2cd30a8c74f042Request(); // \BhrSdk\Model\_3958585c861325ea7a2cd30a8c74f042Request | Employee IDs to add

try {
    $apiInstance->call3958585c861325ea7a2cd30a8c74f042($id, $_3958585c861325ea7a2cd30a8c74f042_request);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call3958585c861325ea7a2cd30a8c74f042: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **_3958585c861325ea7a2cd30a8c74f042_request** | [**\BhrSdk\Model\_3958585c861325ea7a2cd30a8c74f042Request**](../Model/_3958585c861325ea7a2cd30a8c74f042Request.md)| Employee IDs to add | |

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

## `call3a19f07aa737dc826ba43b9a1c1cd257()`

```php
call3a19f07aa737dc826ba43b9a1c1cd257($id)
```

Launch compensation planning cycle

Launch a compensation planning cycle. Validates all cycle data and sets status to Live.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->call3a19f07aa737dc826ba43b9a1c1cd257($id);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call3a19f07aa737dc826ba43b9a1c1cd257: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

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

## `call4e886b18264480611f380805301c49c4()`

```php
call4e886b18264480611f380805301c49c4($id, $group_by): array<string,mixed>
```

Get compensation planning approval flows

Get approval flows for the compensation planning cycle (grouped by department by default).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$group_by = 'group_by_example'; // string | Optional grouping for flows (e.g. department)

try {
    $result = $apiInstance->call4e886b18264480611f380805301c49c4($id, $group_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call4e886b18264480611f380805301c49c4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **group_by** | **string**| Optional grouping for flows (e.g. department) | [optional] |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call593d5bff120edf2a218a92022a682728()`

```php
call593d5bff120edf2a218a92022a682728($id, $type): \SplFileObject
```

Export compensation planning cycle worksheet to CSV

Download compensation planning worksheet data as a UTF-8 CSV (Excel-friendly BOM). Same data scope as GET worksheet; omit `type` for the default view.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$type = 'type_example'; // string | Worksheet context: recommendations, approvals, or overview (overview requires cycle admin).

try {
    $result = $apiInstance->call593d5bff120edf2a218a92022a682728($id, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call593d5bff120edf2a218a92022a682728: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **type** | **string**| Worksheet context: recommendations, approvals, or overview (overview requires cycle admin). | [optional] |

### Return type

**\SplFileObject**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/csv`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call5c2b55158b0950b1e9211655666645b6()`

```php
call5c2b55158b0950b1e9211655666645b6($id): array<string,mixed>
```

Get compensation planning cycle details

Get compensation planning cycle details and currency settings for a cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call5c2b55158b0950b1e9211655666645b6($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call5c2b55158b0950b1e9211655666645b6: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call5c4aab35a34f5760ec044104b5232bf5()`

```php
call5c4aab35a34f5760ec044104b5232bf5($id, $employee_id, $group_by): array<string,mixed>
```

Set final approver

Set or update the final approver for all approval flows in a cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$employee_id = 'employee_id_example'; // string
$group_by = 'group_by_example'; // string | Optional grouping for returned flows (e.g. department)

try {
    $result = $apiInstance->call5c4aab35a34f5760ec044104b5232bf5($id, $employee_id, $group_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call5c4aab35a34f5760ec044104b5232bf5: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **employee_id** | **string**|  | |
| **group_by** | **string**| Optional grouping for returned flows (e.g. department) | [optional] |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call7efceaee2c010f88244dd01ee81e6e7b()`

```php
call7efceaee2c010f88244dd01ee81e6e7b($id): array<string,mixed>
```

Get compensation planning cycle budgets

Get budget guidelines and breakdown for the compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call7efceaee2c010f88244dd01ee81e6e7b($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call7efceaee2c010f88244dd01ee81e6e7b: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call89a5068111ec499135c7d6e9a53d5a30()`

```php
call89a5068111ec499135c7d6e9a53d5a30($id, $_89a5068111ec499135c7d6e9a53d5a30_request)
```

Remove employees from cycle

Remove employees from a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$_89a5068111ec499135c7d6e9a53d5a30_request = new \BhrSdk\Model\_89a5068111ec499135c7d6e9a53d5a30Request(); // \BhrSdk\Model\_89a5068111ec499135c7d6e9a53d5a30Request | Employee IDs to remove

try {
    $apiInstance->call89a5068111ec499135c7d6e9a53d5a30($id, $_89a5068111ec499135c7d6e9a53d5a30_request);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call89a5068111ec499135c7d6e9a53d5a30: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **_89a5068111ec499135c7d6e9a53d5a30_request** | [**\BhrSdk\Model\_89a5068111ec499135c7d6e9a53d5a30Request**](../Model/_89a5068111ec499135c7d6e9a53d5a30Request.md)| Employee IDs to remove | |

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

## `call9bc279d788f6e86b4cd8b2e0d3de91b1()`

```php
call9bc279d788f6e86b4cd8b2e0d3de91b1($id): array<string,mixed>
```

Get compensation planning cycle summary

Get compensation planning cycle summary (progress, stats).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call9bc279d788f6e86b4cd8b2e0d3de91b1($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->call9bc279d788f6e86b4cd8b2e0d3de91b1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cf87b8e09a001b6fb81dfce6c20ab9e3()`

```php
cf87b8e09a001b6fb81dfce6c20ab9e3($id, $template_id, $cf87b8e09a001b6fb81dfce6c20ab9e3_request, $group_by): array<string,mixed>
```

Update approval flow

Update an approval flow for a compensation planning cycle. Allows modifying recommenders and approvers for a specific approval flow template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$template_id = 'template_id_example'; // string
$cf87b8e09a001b6fb81dfce6c20ab9e3_request = new \BhrSdk\Model\Cf87b8e09a001b6fb81dfce6c20ab9e3Request(); // \BhrSdk\Model\Cf87b8e09a001b6fb81dfce6c20ab9e3Request
$group_by = 'group_by_example'; // string | Optional grouping for returned flows (e.g. department)

try {
    $result = $apiInstance->cf87b8e09a001b6fb81dfce6c20ab9e3($id, $template_id, $cf87b8e09a001b6fb81dfce6c20ab9e3_request, $group_by);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->cf87b8e09a001b6fb81dfce6c20ab9e3: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **template_id** | **string**|  | |
| **cf87b8e09a001b6fb81dfce6c20ab9e3_request** | [**\BhrSdk\Model\Cf87b8e09a001b6fb81dfce6c20ab9e3Request**](../Model/Cf87b8e09a001b6fb81dfce6c20ab9e3Request.md)|  | |
| **group_by** | **string**| Optional grouping for returned flows (e.g. department) | [optional] |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `d6987e300672a00c7cfe59afebb64156()`

```php
d6987e300672a00c7cfe59afebb64156($id): array<string,mixed>
```

Get change communication letter details

Get change communication letter details for the compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->d6987e300672a00c7cfe59afebb64156($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->d6987e300672a00c7cfe59afebb64156: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dacd313af2106213fc4696175941ce65()`

```php
dacd313af2106213fc4696175941ce65($id, $dacd313af2106213fc4696175941ce65_request): \BhrSdk\Model\BudgetGuidelinesView
```

Save budget guidelines

Save budget guidelines for a compensation planning cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$dacd313af2106213fc4696175941ce65_request = new \BhrSdk\Model\Dacd313af2106213fc4696175941ce65Request(); // \BhrSdk\Model\Dacd313af2106213fc4696175941ce65Request | Budget guideline settings

try {
    $result = $apiInstance->dacd313af2106213fc4696175941ce65($id, $dacd313af2106213fc4696175941ce65_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->dacd313af2106213fc4696175941ce65: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **dacd313af2106213fc4696175941ce65_request** | [**\BhrSdk\Model\Dacd313af2106213fc4696175941ce65Request**](../Model/Dacd313af2106213fc4696175941ce65Request.md)| Budget guideline settings | |

### Return type

[**\BhrSdk\Model\BudgetGuidelinesView**](../Model/BudgetGuidelinesView.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `e2ac4e1535f296cb8901f209e04caa83()`

```php
e2ac4e1535f296cb8901f209e04caa83(): array<string,mixed>
```

Create compensation planning cycle

Create a new compensation planning cycle with default settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->e2ac4e1535f296cb8901f209e04caa83();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->e2ac4e1535f296cb8901f209e04caa83: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ef7619b0ee4c8dc079aaea870cfbe81b()`

```php
ef7619b0ee4c8dc079aaea870cfbe81b($id, $employee_id): \BhrSdk\Model\RemoveCycleAdminSelfResponse
```

Remove cycle admin

Remove a cycle admin by employee ID. Full account admins cannot be removed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$employee_id = 'employee_id_example'; // string

try {
    $result = $apiInstance->ef7619b0ee4c8dc079aaea870cfbe81b($id, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->ef7619b0ee4c8dc079aaea870cfbe81b: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **employee_id** | **string**|  | |

### Return type

[**\BhrSdk\Model\RemoveCycleAdminSelfResponse**](../Model/RemoveCycleAdminSelfResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f3883a522dadbe9e11b34f8b656e3adb()`

```php
f3883a522dadbe9e11b34f8b656e3adb($id, $f3883a522dadbe9e11b34f8b656e3adb_request): array<string,mixed>
```

Save recommendations

Save compensation recommendations for an employee in a cycle.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$f3883a522dadbe9e11b34f8b656e3adb_request = new \BhrSdk\Model\F3883a522dadbe9e11b34f8b656e3adbRequest(); // \BhrSdk\Model\F3883a522dadbe9e11b34f8b656e3adbRequest

try {
    $result = $apiInstance->f3883a522dadbe9e11b34f8b656e3adb($id, $f3883a522dadbe9e11b34f8b656e3adb_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->f3883a522dadbe9e11b34f8b656e3adb: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **f3883a522dadbe9e11b34f8b656e3adb_request** | [**\BhrSdk\Model\F3883a522dadbe9e11b34f8b656e3adbRequest**](../Model/F3883a522dadbe9e11b34f8b656e3adbRequest.md)|  | |

### Return type

**array<string,mixed>**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f4b431363af6573af46750f32632e88b()`

```php
f4b431363af6573af46750f32632e88b($id): \BhrSdk\Model\CompensationPlanningCycleCompleteResponse
```

Complete compensation planning cycle

Complete a compensation planning cycle and finalize employee compensation records.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationPlanningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->f4b431363af6573af46750f32632e88b($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationPlanningApi->f4b431363af6573af46750f32632e88b: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\CompensationPlanningCycleCompleteResponse**](../Model/CompensationPlanningCycleCompleteResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
