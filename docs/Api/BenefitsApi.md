# MySdk\BenefitsApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployeeDependent()**](BenefitsApi.md#addEmployeeDependent) | **POST** /api/v1/employeedependents | Add an employee dependent |
| [**getBenefitCoverages()**](BenefitsApi.md#getBenefitCoverages) | **GET** /api/v1/benefitcoverages | Get benefit coverages |
| [**getBenefitDeductionTypes()**](BenefitsApi.md#getBenefitDeductionTypes) | **GET** /api/v1/benefits/settings/deduction_types/all | Get benefit deduction types |
| [**getEmployeeDependent()**](BenefitsApi.md#getEmployeeDependent) | **GET** /api/v1/employeedependents/{id} | Get employee dependent |
| [**getEmployeeDependents()**](BenefitsApi.md#getEmployeeDependents) | **GET** /api/v1/employeedependents | Get all employee dependents |
| [**getMemberBenefit()**](BenefitsApi.md#getMemberBenefit) | **GET** /api/v1/benefit/member_benefit | Get a list of member benefit events |
| [**updateEmployeeDependent()**](BenefitsApi.md#updateEmployeeDependent) | **PUT** /api/v1/employeedependents/{id} | Update an employee dependent |


## `addEmployeeDependent()`

```php
addEmployeeDependent($employee_dependent)
```

Add an employee dependent

Adds an employee dependent

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_dependent = new \MySdk\Model\EmployeeDependent(); // \MySdk\Model\EmployeeDependent

try {
    $apiInstance->addEmployeeDependent($employee_dependent);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->addEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_dependent** | [**\MySdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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

## `getBenefitCoverages()`

```php
getBenefitCoverages($accept_header_parameter)
```

Get benefit coverages

Get benefit coverages

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getBenefitCoverages($accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getBenefitCoverages: ', $e->getMessage(), PHP_EOL;
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

## `getBenefitDeductionTypes()`

```php
getBenefitDeductionTypes()
```

Get benefit deduction types

Get benefit deduction types

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->getBenefitDeductionTypes();
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getBenefitDeductionTypes: ', $e->getMessage(), PHP_EOL;
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

## `getEmployeeDependent()`

```php
getEmployeeDependent($id, $accept_header_parameter)
```

Get employee dependent

Get employee dependent

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is the employee dependent ID.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getEmployeeDependent($id, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is the employee dependent ID. | |
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

## `getEmployeeDependents()`

```php
getEmployeeDependents($employeeid, $accept_header_parameter)
```

Get all employee dependents

Get all employee dependents

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employeeid = 'employeeid_example'; // string | {employeeid} is the employee ID. Supplying this ID limits the response to the specific employee.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getEmployeeDependents($employeeid, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getEmployeeDependents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employeeid** | **string**| {employeeid} is the employee ID. Supplying this ID limits the response to the specific employee. | |
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

## `getMemberBenefit()`

```php
getMemberBenefit(): \MySdk\Model\MemberBenefitEvent[]
```

Get a list of member benefit events

Get a list of member benefit events

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getMemberBenefit();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getMemberBenefit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\MySdk\Model\MemberBenefitEvent[]**](../Model/MemberBenefitEvent.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeDependent()`

```php
updateEmployeeDependent($id, $employee_dependent)
```

Update an employee dependent

This API allows you to change the information for a given dependent ID.

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

$apiInstance = new MySdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is the employee dependent ID.
$employee_dependent = new \MySdk\Model\EmployeeDependent(); // \MySdk\Model\EmployeeDependent

try {
    $apiInstance->updateEmployeeDependent($id, $employee_dependent);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->updateEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is the employee dependent ID. | |
| **employee_dependent** | [**\MySdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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
