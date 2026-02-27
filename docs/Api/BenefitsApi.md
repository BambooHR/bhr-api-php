# BhrSdk\BenefitsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployeeDependent()**](BenefitsApi.md#addEmployeeDependent) | **POST** /api/v1/employeedependents | Create Employee Dependent |
| [**getBenefitCoverages()**](BenefitsApi.md#getBenefitCoverages) | **GET** /api/v1/benefitcoverages | Get Benefit Coverages |
| [**getBenefitDeductionTypes()**](BenefitsApi.md#getBenefitDeductionTypes) | **GET** /api/v1/benefits/settings/deduction_types/all | Get Benefit Deduction Types |
| [**getCompanyBenefits()**](BenefitsApi.md#getCompanyBenefits) | **GET** /api/v1/benefit/company_benefit | Get Company Benefits |
| [**getEmployeeBenefit()**](BenefitsApi.md#getEmployeeBenefit) | **GET** /api/v1/benefit/employee_benefit | Get Employee Benefits |
| [**getEmployeeDependent()**](BenefitsApi.md#getEmployeeDependent) | **GET** /api/v1/employeedependents/{id} | Get Employee Dependent |
| [**getEmployeeDependents()**](BenefitsApi.md#getEmployeeDependents) | **GET** /api/v1/employeedependents | Get Employee Dependents |
| [**getMemberBenefit()**](BenefitsApi.md#getMemberBenefit) | **GET** /api/v1/benefit/member_benefit | Get Member Benefit Events |
| [**getMemberBenefits()**](BenefitsApi.md#getMemberBenefits) | **GET** /api/v1/benefits/member-benefits | Get Member Benefits |
| [**updateEmployeeDependent()**](BenefitsApi.md#updateEmployeeDependent) | **PUT** /api/v1/employeedependents/{id} | Update Employee Dependent |


## `addEmployeeDependent()`

```php
addEmployeeDependent($employee_dependent)
```

Create Employee Dependent

Adds an employee dependent

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_dependent = new \BhrSdk\Model\EmployeeDependent(); // \BhrSdk\Model\EmployeeDependent

try {
    $apiInstance->addEmployeeDependent($employee_dependent);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->addEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_dependent** | [**\BhrSdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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

Get Benefit Coverages

Get benefit coverages

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
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

Get Benefit Deduction Types

Get benefit deduction types

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
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

## `getCompanyBenefits()`

```php
getCompanyBenefits(): \BhrSdk\Model\CompanyBenefitResponse[]
```

Get Company Benefits

Get a list of company benefits

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompanyBenefits();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getCompanyBenefits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompanyBenefitResponse[]**](../Model/CompanyBenefitResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeBenefit()`

```php
getEmployeeBenefit($accept_header_parameter, $employee_benefit_filters): \BhrSdk\Model\EmployeeBenefit[]
```

Get Employee Benefits

Get a list of employee benefits

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$employee_benefit_filters = new \BhrSdk\Model\EmployeeBenefitFilters(); // \BhrSdk\Model\EmployeeBenefitFilters | Employee Benefit Filters

try {
    $result = $apiInstance->getEmployeeBenefit($accept_header_parameter, $employee_benefit_filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getEmployeeBenefit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **employee_benefit_filters** | [**\BhrSdk\Model\EmployeeBenefitFilters**](../Model/EmployeeBenefitFilters.md)| Employee Benefit Filters | [optional] |

### Return type

[**\BhrSdk\Model\EmployeeBenefit[]**](../Model/EmployeeBenefit.md)

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

Get Employee Dependent

Get employee dependent

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
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

Get Employee Dependents

Get all employee dependents

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
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
getMemberBenefit(): \BhrSdk\Model\MemberBenefitEvent[]
```

Get Member Benefit Events

Get a list of member benefit events

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
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

[**\BhrSdk\Model\MemberBenefitEvent[]**](../Model/MemberBenefitEvent.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMemberBenefits()`

```php
getMemberBenefits($calendar_year, $page, $page_size): \BhrSdk\Model\MemberBenefitsGetSuccessResponse
```

Get Member Benefits

Retrieves a paginated list of member benefits for a specified calendar year. Returns benefit enrollment data including member IDs, subscriber IDs, plan IDs, and date ranges with enrollment status. Requires benefit admin permissions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$calendar_year = 2024; // string | The 4-digit calendar year to retrieve benefits for
$page = 1; // string | The page number for pagination
$page_size = 25; // string | The number of items per page (must be less than 100)

try {
    $result = $apiInstance->getMemberBenefits($calendar_year, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getMemberBenefits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **calendar_year** | **string**| The 4-digit calendar year to retrieve benefits for | |
| **page** | **string**| The page number for pagination | [optional] [default to &#39;1&#39;] |
| **page_size** | **string**| The number of items per page (must be less than 100) | [optional] [default to &#39;25&#39;] |

### Return type

[**\BhrSdk\Model\MemberBenefitsGetSuccessResponse**](../Model/MemberBenefitsGetSuccessResponse.md)

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

Update Employee Dependent

This API allows you to change the information for a given dependent ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\BenefitsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is the employee dependent ID.
$employee_dependent = new \BhrSdk\Model\EmployeeDependent(); // \BhrSdk\Model\EmployeeDependent

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
| **employee_dependent** | [**\BhrSdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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
