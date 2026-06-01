# BhrSdk\OnboardingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**caa7fc488bcfaef14125398f2ebb987d()**](OnboardingApi.md#caa7fc488bcfaef14125398f2ebb987d) | **DELETE** /api/v1/new-hire-packets/{id} | Delete new hire packet |
| [**call0158de7cde2a4c4cf577f0b25070d809()**](OnboardingApi.md#call0158de7cde2a4c4cf577f0b25070d809) | **GET** /api/v1/employees/{employeeId}/onboarding-experiences | List employee onboarding experiences |
| [**call044949386f2d655c6a627ef53f9434b7()**](OnboardingApi.md#call044949386f2d655c6a627ef53f9434b7) | **GET** /api/v1/onboarding/new-hire-widget | Get welcome new hires widget |
| [**call19c7e26a1347ae7eb22919e9b0595c19()**](OnboardingApi.md#call19c7e26a1347ae7eb22919e9b0595c19) | **POST** /api/v1/new-hire-packets/{id}/cancel | Cancel new hire packet |
| [**call1ab0279d46023eb951a434f24df885f1()**](OnboardingApi.md#call1ab0279d46023eb951a434f24df885f1) | **PUT** /api/v1/new-hire-packets/{id} | Update new hire packet |
| [**call288aa996aba16d7a495c62321ea999a9()**](OnboardingApi.md#call288aa996aba16d7a495c62321ea999a9) | **POST** /api/v1/employees/{employeeId}/onboarding-experiences | Create employee onboarding experience |
| [**call696f0a229cdde60b733568e3c4d043d9()**](OnboardingApi.md#call696f0a229cdde60b733568e3c4d043d9) | **GET** /api/v1/new-hire-packets/{id} | Get new hire packet by id |
| [**call847dd061d1d1859e7ce8cb3adfc9faf2()**](OnboardingApi.md#call847dd061d1d1859e7ce8cb3adfc9faf2) | **GET** /api/v1/employees/{employeeId}/onboarding-experiences/{onboardingExperienceId} | Get employee onboarding experience by id |
| [**ec1ba8e76f33960b018d0d7518fe97b5()**](OnboardingApi.md#ec1ba8e76f33960b018d0d7518fe97b5) | **POST** /api/v1/new-hire-packets | Create new hire packet |
| [**f44b802c30cdea2b9076b3f82f99c74d()**](OnboardingApi.md#f44b802c30cdea2b9076b3f82f99c74d) | **GET** /api/v1/new-hire-packets | List new hire packets |
| [**f49b0f1f2fb1ef2c408ba12916ee9baa()**](OnboardingApi.md#f49b0f1f2fb1ef2c408ba12916ee9baa) | **POST** /api/v1/new-hire-packets/{id}/send | Send new hire packet |
| [**updateNewHirePacketGtkyAnswerVisibility()**](OnboardingApi.md#updateNewHirePacketGtkyAnswerVisibility) | **PUT** /api/v1/new-hire-packets/{id}/question-visibility | Update GTKY answer visibility for a new hire packet |


## `caa7fc488bcfaef14125398f2ebb987d()`

```php
caa7fc488bcfaef14125398f2ebb987d($id)
```

Delete new hire packet

Deletes a new hire packet instance by primary key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->caa7fc488bcfaef14125398f2ebb987d($id);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->caa7fc488bcfaef14125398f2ebb987d: ', $e->getMessage(), PHP_EOL;
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
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call0158de7cde2a4c4cf577f0b25070d809()`

```php
call0158de7cde2a4c4cf577f0b25070d809($employee_id): \BhrSdk\Model\OnboardingExperiencesListResponse
```

List employee onboarding experiences

Returns onboarding experiences for the employee when the onboarding experience phase-1 and workflow framework company toggles are enabled, and at least one OnboardingExperienceWorkflow execution is running for them. Each item is projected from the employee’s new hire packet instance row for the same public id contract (no embedded NHP payload).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int

try {
    $result = $apiInstance->call0158de7cde2a4c4cf577f0b25070d809($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call0158de7cde2a4c4cf577f0b25070d809: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**|  | |

### Return type

[**\BhrSdk\Model\OnboardingExperiencesListResponse**](../Model/OnboardingExperiencesListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call044949386f2d655c6a627ef53f9434b7()`

```php
call044949386f2d655c6a627ef53f9434b7(): \BhrSdk\Model\NewHireWidgetResponse
```

Get welcome new hires widget

Returns the upcoming-new-hires data that powers the BambooHR home \"Welcome New Hires\" widget. Items are ordered by most recent hire date first. The list reflects the authenticated user's new-hire-packet and company-directory access — when either is missing the response is an empty list (not 403). Sensitive contact fields (work email, home email) are never returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->call044949386f2d655c6a627ef53f9434b7();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call044949386f2d655c6a627ef53f9434b7: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\NewHireWidgetResponse**](../Model/NewHireWidgetResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call19c7e26a1347ae7eb22919e9b0595c19()`

```php
call19c7e26a1347ae7eb22919e9b0595c19($id): \BhrSdk\Model\NewHirePacketPublicApi
```

Cancel new hire packet

Cancels the new hire packet. Completed packets cannot be cancelled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call19c7e26a1347ae7eb22919e9b0595c19($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call19c7e26a1347ae7eb22919e9b0595c19: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketPublicApi**](../Model/NewHirePacketPublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call1ab0279d46023eb951a434f24df885f1()`

```php
call1ab0279d46023eb951a434f24df885f1($id, $new_hire_packet_public_api_writable_body): \BhrSdk\Model\NewHirePacketPublicApi
```

Update new hire packet

Updates an existing new hire packet instance. Sent, viewed, and completed timestamps are not changed through this endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$new_hire_packet_public_api_writable_body = new \BhrSdk\Model\NewHirePacketPublicApiWritableBody(); // \BhrSdk\Model\NewHirePacketPublicApiWritableBody

try {
    $result = $apiInstance->call1ab0279d46023eb951a434f24df885f1($id, $new_hire_packet_public_api_writable_body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call1ab0279d46023eb951a434f24df885f1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **new_hire_packet_public_api_writable_body** | [**\BhrSdk\Model\NewHirePacketPublicApiWritableBody**](../Model/NewHirePacketPublicApiWritableBody.md)|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketPublicApi**](../Model/NewHirePacketPublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call288aa996aba16d7a495c62321ea999a9()`

```php
call288aa996aba16d7a495c62321ea999a9($employee_id, $_288aa996aba16d7a495c62321ea999a9_request): \BhrSdk\Model\OnboardingExperiencePublicApi
```

Create employee onboarding experience

Creates (starts) an onboarding experience workflow for the employee’s existing new hire packet instance. Requires the onboarding experience phase-1 and workflow framework company toggles. Optional sentDateTime may be supplied for workflow idempotency (ISO 8601 or legacy datetime string accepted when non-empty).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int
$_288aa996aba16d7a495c62321ea999a9_request = new \BhrSdk\Model\_288aa996aba16d7a495c62321ea999a9Request(); // \BhrSdk\Model\_288aa996aba16d7a495c62321ea999a9Request

try {
    $result = $apiInstance->call288aa996aba16d7a495c62321ea999a9($employee_id, $_288aa996aba16d7a495c62321ea999a9_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call288aa996aba16d7a495c62321ea999a9: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**|  | |
| **_288aa996aba16d7a495c62321ea999a9_request** | [**\BhrSdk\Model\_288aa996aba16d7a495c62321ea999a9Request**](../Model/_288aa996aba16d7a495c62321ea999a9Request.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\OnboardingExperiencePublicApi**](../Model/OnboardingExperiencePublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call696f0a229cdde60b733568e3c4d043d9()`

```php
call696f0a229cdde60b733568e3c4d043d9($id): \BhrSdk\Model\NewHirePacketPublicApi
```

Get new hire packet by id

Returns a single new hire packet instance with a derived status. Sub-resources (sections, tasks, questions, GTKY) are not included.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->call696f0a229cdde60b733568e3c4d043d9($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call696f0a229cdde60b733568e3c4d043d9: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketPublicApi**](../Model/NewHirePacketPublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call847dd061d1d1859e7ce8cb3adfc9faf2()`

```php
call847dd061d1d1859e7ce8cb3adfc9faf2($employee_id, $onboarding_experience_id): \BhrSdk\Model\OnboardingExperiencePublicApi
```

Get employee onboarding experience by id

Returns a single onboarding experience when the onboarding experience phase-1 and workflow framework company toggles are enabled, the employee has at least one running OnboardingExperienceWorkflow (execution status RUNNING), the path id matches their current new hire packet instance id, and the row belongs to the employee. NHP fields are referenced by id only.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int
$onboarding_experience_id = 56; // int

try {
    $result = $apiInstance->call847dd061d1d1859e7ce8cb3adfc9faf2($employee_id, $onboarding_experience_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->call847dd061d1d1859e7ce8cb3adfc9faf2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**|  | |
| **onboarding_experience_id** | **int**|  | |

### Return type

[**\BhrSdk\Model\OnboardingExperiencePublicApi**](../Model/OnboardingExperiencePublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ec1ba8e76f33960b018d0d7518fe97b5()`

```php
ec1ba8e76f33960b018d0d7518fe97b5($ec1ba8e76f33960b018d0d7518fe97b5_request): \BhrSdk\Model\NewHirePacketPublicApi
```

Create new hire packet

Creates a new hire packet instance (draft) for an employee. Company configuration is applied for default inclusion flags.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ec1ba8e76f33960b018d0d7518fe97b5_request = new \BhrSdk\Model\Ec1ba8e76f33960b018d0d7518fe97b5Request(); // \BhrSdk\Model\Ec1ba8e76f33960b018d0d7518fe97b5Request

try {
    $result = $apiInstance->ec1ba8e76f33960b018d0d7518fe97b5($ec1ba8e76f33960b018d0d7518fe97b5_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->ec1ba8e76f33960b018d0d7518fe97b5: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ec1ba8e76f33960b018d0d7518fe97b5_request** | [**\BhrSdk\Model\Ec1ba8e76f33960b018d0d7518fe97b5Request**](../Model/Ec1ba8e76f33960b018d0d7518fe97b5Request.md)|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketPublicApi**](../Model/NewHirePacketPublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f44b802c30cdea2b9076b3f82f99c74d()`

```php
f44b802c30cdea2b9076b3f82f99c74d($page, $page_size): \BhrSdk\Model\NewHirePacketsListResponse
```

List new hire packets

Returns a paginated list of new hire packet instances for the company. Each item is a flat summary (no sections, tasks, questions, or GTKY recipients).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 56; // int
$page_size = 56; // int

try {
    $result = $apiInstance->f44b802c30cdea2b9076b3f82f99c74d($page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->f44b802c30cdea2b9076b3f82f99c74d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] |
| **page_size** | **int**|  | [optional] |

### Return type

[**\BhrSdk\Model\NewHirePacketsListResponse**](../Model/NewHirePacketsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f49b0f1f2fb1ef2c408ba12916ee9baa()`

```php
f49b0f1f2fb1ef2c408ba12916ee9baa($id): \BhrSdk\Model\NewHirePacketPublicApi
```

Send new hire packet

Sends the new hire packet for that packet's employee (email or onboarding experience workflow, depending on company configuration). The packet must be in draft state.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->f49b0f1f2fb1ef2c408ba12916ee9baa($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->f49b0f1f2fb1ef2c408ba12916ee9baa: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketPublicApi**](../Model/NewHirePacketPublicApi.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateNewHirePacketGtkyAnswerVisibility()`

```php
updateNewHirePacketGtkyAnswerVisibility($id, $new_hire_packet_gtky_answer_visibility_request): \BhrSdk\Model\NewHirePacketGtkyAnswerVisibilityResponse
```

Update GTKY answer visibility for a new hire packet

Shows or hides get-to-know-you (GTKY) question answers for the packet. Omit questionIds to toggle all answers (same as the legacy BFF POST /onboarding/questions/visibility/{newHirePacketId} with a visible query flag). Send questionIds to toggle only specific personal questions linked to this new hire packet. Requires the same edit access as other NHP writes. When the employee has a hire date set, updates are rejected once the company-local calendar date is on or after that date (same rule as GET /onboarding/questions/{newHirePacketId}, which redirects to expired in that case). Draft employees without a hire date are not blocked.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\OnboardingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$new_hire_packet_gtky_answer_visibility_request = new \BhrSdk\Model\NewHirePacketGtkyAnswerVisibilityRequest(); // \BhrSdk\Model\NewHirePacketGtkyAnswerVisibilityRequest

try {
    $result = $apiInstance->updateNewHirePacketGtkyAnswerVisibility($id, $new_hire_packet_gtky_answer_visibility_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OnboardingApi->updateNewHirePacketGtkyAnswerVisibility: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **new_hire_packet_gtky_answer_visibility_request** | [**\BhrSdk\Model\NewHirePacketGtkyAnswerVisibilityRequest**](../Model/NewHirePacketGtkyAnswerVisibilityRequest.md)|  | |

### Return type

[**\BhrSdk\Model\NewHirePacketGtkyAnswerVisibilityResponse**](../Model/NewHirePacketGtkyAnswerVisibilityResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
