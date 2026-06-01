# BhrSdk\BenefitsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEmployeeDependent()**](BenefitsApi.md#createEmployeeDependent) | **POST** /api/v1/employeedependents | Create Employee Dependent |
| [**getEmployeeDependent()**](BenefitsApi.md#getEmployeeDependent) | **GET** /api/v1/employeedependents/{id} | Get Employee Dependent |
| [**listBenefitCoverages()**](BenefitsApi.md#listBenefitCoverages) | **GET** /api/v1/benefitcoverages | List Benefit Coverages |
| [**listBenefitDeductionTypes()**](BenefitsApi.md#listBenefitDeductionTypes) | **GET** /api/v1/benefits/settings/deduction_types/all | List Benefit Deduction Types |
| [**listCompanyBenefits()**](BenefitsApi.md#listCompanyBenefits) | **GET** /api/v1/benefit/company_benefit | List Company Benefits |
| [**listEmployeeBenefits()**](BenefitsApi.md#listEmployeeBenefits) | **GET** /api/v1/benefit/employee_benefit | List Employee Benefits |
| [**listEmployeeDependents()**](BenefitsApi.md#listEmployeeDependents) | **GET** /api/v1/employeedependents | List Employee Dependents |
| [**listMemberBenefitEvents()**](BenefitsApi.md#listMemberBenefitEvents) | **GET** /api/v1/benefit/member_benefit | List Member Benefit Events |
| [**listMemberBenefits()**](BenefitsApi.md#listMemberBenefits) | **GET** /api/v1/benefits/member-benefits | List Member Benefits |
| [**updateEmployeeDependent()**](BenefitsApi.md#updateEmployeeDependent) | **PUT** /api/v1/employeedependents/{id} | Update Employee Dependent |


## `createEmployeeDependent()`

```php
createEmployeeDependent($employee_dependent): \BhrSdk\Model\EmployeeDependentsResponse
```

Create Employee Dependent

Creates a new dependent record for an employee. `employeeId` is required and must reference a valid employee. `relationship` must be a valid relationship type and `gender` must be a valid gender value. `isUsCitizen` and `isStudent` accept \"yes\" or \"no\". `state` accepts a state code (e.g. \"UT\") and `country` accepts an ISO 3166-1 alpha-2 country code (e.g. \"US\"). `dateOfBirth` must be in YYYY-MM-DD format. SSN and SIN are accepted as plain text and stored encrypted. Accepts both `application/json` and `application/xml` request bodies. The response format mirrors the request `Content-Type` (not the `Accept` header): JSON request bodies receive a JSON response; XML request bodies receive an XML response. A successful creation fires an internal dependent-created event that may trigger downstream benefit enrollment processing.

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
    $result = $apiInstance->createEmployeeDependent($employee_dependent);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->createEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_dependent** | [**\BhrSdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

### Return type

[**\BhrSdk\Model\EmployeeDependentsResponse**](../Model/EmployeeDependentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeDependent()`

```php
getEmployeeDependent($id, $accept_header_parameter): \BhrSdk\Model\EmployeeDependentsResponse
```

Get Employee Dependent

Returns the details of a single employee dependent by their dependent ID. The response is a JSON object with a top-level key \"Employee Dependents\" containing a single-element array. SSN and SIN are returned as masked values (e.g. \"xxx-xx-1234\"). State and country are returned as full names. Supports both JSON and XML response formats via the Accept header. Requires Benefits Administration permissions.

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
$id = 56; // int | The numeric ID of the employee dependent to retrieve.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployeeDependent($id, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->getEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The numeric ID of the employee dependent to retrieve. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\EmployeeDependentsResponse**](../Model/EmployeeDependentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBenefitCoverages()`

```php
listBenefitCoverages($accept_header_parameter): \BhrSdk\Model\BenefitCoveragesResponse
```

List Benefit Coverages

Returns all benefit coverage levels configured in the company, such as Employee Only, Employee + Spouse, and Employee + Family. The JSON response wraps results under a \"Benefit Coverages\" key. Each coverage level includes an ID, short name, optional description, sort order, and an associated benefit plan ID (null for company-wide levels). Requires Benefits Administration permissions or owner/admin access.

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
    $result = $apiInstance->listBenefitCoverages($accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listBenefitCoverages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\BenefitCoveragesResponse**](../Model/BenefitCoveragesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBenefitDeductionTypes()`

```php
listBenefitDeductionTypes(): \BhrSdk\Model\BenefitDeductionType[]
```

List Benefit Deduction Types

Returns all benefit deduction types available in the system. Each deduction type describes a category of payroll deduction (e.g. 401(k), HSA, Section 125) along with its allowable benefit plan types, default deduction code, and optional sub-types. Some deduction types are grouped under a parent with sub-types (e.g. Pre-Tax groups Health, Dental, etc.); in that case the parent entry has a non-empty `subTypes` array. Requires Benefits Administration permissions.

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
    $result = $apiInstance->listBenefitDeductionTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listBenefitDeductionTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\BenefitDeductionType[]**](../Model/BenefitDeductionType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompanyBenefits()`

```php
listCompanyBenefits(): \BhrSdk\Model\CompanyBenefitsListResponse
```

List Company Benefits

Returns all active (non-deleted) company benefit plans for the account. Each plan includes summary-level fields such as name, benefit category type, associated vendor and deduction IDs, effective date range, and catch-up eligibility flags. Deleted plans are excluded. To retrieve full detail for a specific plan (including SSO URL, description, and ACA fields), use \"Get a company benefit\".

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
    $result = $apiInstance->listCompanyBenefits();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listCompanyBenefits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompanyBenefitsListResponse**](../Model/CompanyBenefitsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeBenefits()`

```php
listEmployeeBenefits($employee_benefit_filters): \BhrSdk\Model\EmployeeBenefitsListResponse
```

List Employee Benefits

Returns current and scheduled-future benefit enrollment records, grouped by employee. The response is a JSON object with a single `employeeBenefits` array where each entry contains the employee ID, the employee's current pay frequency (null when no pay schedule is set), and an `employeeBenefit` array of per-plan records that includes both the current enrollment record and any scheduled future-change records for that plan. Each record includes enrollment status, deduction date range, currency, occurrences-per-year, and the full employee/employer cost-sharing fields.  A JSON request body with a `filters` object is required, and the `filters` object must contain at least one of `employeeId`, `companyBenefitId`, or `enrollmentStatusEffectiveDate`. Any combination is accepted. Providing no `filters` object or an empty `filters` object returns a 400 validation error. Filtering by `companyBenefitId` or `enrollmentStatusEffectiveDate` returns enrollments for every accessible employee, so the response can contain many entries. Use **List Company Benefits** (`list-company-benefits`) to look up valid `companyBenefitId` values.  Future-enrollment records are silently omitted when the authenticated user lacks permission to view scheduled benefit changes. Current enrollment records continue to be returned. An empty `employeeBenefit` array on a known employee can mean either no enrollments or that the caller cannot view them.  Note: This endpoint accepts filters inside a JSON request body on a `GET` request, which is non-standard. Some HTTP clients, proxies, and gateways may strip request bodies from GET requests, which can produce confusing missing-filter behavior. Callers experiencing validation errors should verify that the request body is being preserved. A query-parameter-based endpoint will be released in the future.

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
$employee_benefit_filters = new \BhrSdk\Model\EmployeeBenefitFilters(); // \BhrSdk\Model\EmployeeBenefitFilters | Filters that scope the results. The `filters` object is required, and at least one of `employeeId`, `companyBenefitId`, or `enrollmentStatusEffectiveDate` must be provided. Any combination of the three is accepted.

try {
    $result = $apiInstance->listEmployeeBenefits($employee_benefit_filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listEmployeeBenefits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_benefit_filters** | [**\BhrSdk\Model\EmployeeBenefitFilters**](../Model/EmployeeBenefitFilters.md)| Filters that scope the results. The &#x60;filters&#x60; object is required, and at least one of &#x60;employeeId&#x60;, &#x60;companyBenefitId&#x60;, or &#x60;enrollmentStatusEffectiveDate&#x60; must be provided. Any combination of the three is accepted. | |

### Return type

[**\BhrSdk\Model\EmployeeBenefitsListResponse**](../Model/EmployeeBenefitsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeDependents()`

```php
listEmployeeDependents($accept_header_parameter, $employeeid): \BhrSdk\Model\EmployeeDependentsResponse
```

List Employee Dependents

Returns employee dependents for the company. When `employeeid` is provided, only dependents for that employee are returned. When omitted, all dependents across all employees are returned. The response is a JSON object with a top-level key \"Employee Dependents\" containing an array of dependent objects. SSN and SIN are returned as masked values (e.g. \"xxx-xx-1234\"). State and country are returned as full names. Supports both JSON and XML response formats via the Accept header. Requires Benefits Administration permissions.

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
$employeeid = 56; // int | The employee ID to filter dependents by. When provided, only dependents for that employee are returned. When omitted, all company dependents are returned.

try {
    $result = $apiInstance->listEmployeeDependents($accept_header_parameter, $employeeid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listEmployeeDependents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **employeeid** | **int**| The employee ID to filter dependents by. When provided, only dependents for that employee are returned. When omitted, all company dependents are returned. | [optional] |

### Return type

[**\BhrSdk\Model\EmployeeDependentsResponse**](../Model/EmployeeDependentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listMemberBenefitEvents()`

```php
listMemberBenefitEvents(): \BhrSdk\Model\MemberBenefitEventsResponse
```

List Member Benefit Events

Returns benefit enrollment events for all employees and their dependents over the past year, organized by member. Each entry identifies a member (employee or dependent) and lists their per-plan coverage events (eligibility granted, enrolled, or loss of coverage), sorted chronologically. Requires benefit settings access.

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
    $result = $apiInstance->listMemberBenefitEvents();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listMemberBenefitEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\MemberBenefitEventsResponse**](../Model/MemberBenefitEventsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listMemberBenefits()`

```php
listMemberBenefits($calendar_year, $page, $page_size): \BhrSdk\Model\MemberBenefitsGetSuccessResponse
```

List Member Benefits

Returns a paginated list of benefit enrollment records for all members (employees and dependents) in the company for a given calendar year. Each record represents one member and includes the plans they held and the date ranges during which they held each enrollment status. Dependents appear alongside their subscribing employee via subscriberId. Use \"List Company Benefits\" to get valid planId values.

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
$calendar_year = 2024; // string | The 4-digit calendar year (YYYY) to retrieve benefit enrollment data for.
$page = 1; // string | The 1-based page number for pagination. The value is cast to an integer; values that cast to 0 or below are rejected with a 400. Defaults to 1.
$page_size = 25; // string | The number of items per page. The value is cast to an integer; values that cast to 0 or below, or to 100 or above, are rejected with a 400. Defaults to 25.

try {
    $result = $apiInstance->listMemberBenefits($calendar_year, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->listMemberBenefits: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **calendar_year** | **string**| The 4-digit calendar year (YYYY) to retrieve benefit enrollment data for. | |
| **page** | **string**| The 1-based page number for pagination. The value is cast to an integer; values that cast to 0 or below are rejected with a 400. Defaults to 1. | [optional] [default to &#39;1&#39;] |
| **page_size** | **string**| The number of items per page. The value is cast to an integer; values that cast to 0 or below, or to 100 or above, are rejected with a 400. Defaults to 25. | [optional] [default to &#39;25&#39;] |

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
updateEmployeeDependent($id, $employee_dependent): \BhrSdk\Model\EmployeeDependentsResponse
```

Update Employee Dependent

Replaces all fields on an existing employee dependent record. The request body must contain the full desired state of the dependent — omitted fields are written as empty or null, not preserved. `employeeId` is required and must reference a valid employee. `relationship` must be a valid relationship type and `gender` must be a valid gender value. `isUsCitizen` and `isStudent` accept \"yes\" or \"no\". `state` accepts a state code (e.g. \"UT\") and `country` accepts an ISO 3166-1 alpha-2 country code (e.g. \"US\"). `dateOfBirth` must be in YYYY-MM-DD format. SSN and SIN are accepted as plain text and stored encrypted. Accepts both `application/json` and `application/xml` request bodies. The response format mirrors the request `Content-Type` (not the `Accept` header): JSON request bodies receive a JSON response; XML request bodies receive an XML response. A successful update fires an internal dependent-updated event that may trigger downstream benefit enrollment processing.

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
$id = 56; // int | The numeric ID of the employee dependent to update.
$employee_dependent = new \BhrSdk\Model\EmployeeDependent(); // \BhrSdk\Model\EmployeeDependent

try {
    $result = $apiInstance->updateEmployeeDependent($id, $employee_dependent);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BenefitsApi->updateEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The numeric ID of the employee dependent to update. | |
| **employee_dependent** | [**\BhrSdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

### Return type

[**\BhrSdk\Model\EmployeeDependentsResponse**](../Model/EmployeeDependentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
