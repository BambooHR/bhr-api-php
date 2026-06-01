# BhrSdk\TotalRewardsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addTotalRewardsEmployees()**](TotalRewardsApi.md#addTotalRewardsEmployees) | **POST** /api/v1/compensation/total_rewards/employees | Add Employees to Total Rewards |
| [**checkTotalRewardsProfile()**](TotalRewardsApi.md#checkTotalRewardsProfile) | **GET** /api/v1/compensation/total_rewards/{employeeId} | Check Total Rewards Profile Availability |
| [**getTotalRewardsPrintableStatement()**](TotalRewardsApi.md#getTotalRewardsPrintableStatement) | **GET** /api/v1/compensation/total_rewards/{employeeId}/printable | Get Printable Total Rewards Statement |
| [**getTotalRewardsStatement()**](TotalRewardsApi.md#getTotalRewardsStatement) | **GET** /api/v1/compensation/total_rewards/{employeeId}/statement | Get Total Rewards Statement |
| [**removeTotalRewardsCustomDisclaimer()**](TotalRewardsApi.md#removeTotalRewardsCustomDisclaimer) | **DELETE** /api/v1/compensation/total_rewards/custom_disclaimer | Remove Total Rewards Custom Disclaimer |
| [**removeTotalRewardsEmployees()**](TotalRewardsApi.md#removeTotalRewardsEmployees) | **DELETE** /api/v1/compensation/total_rewards/employees | Remove Employees from Total Rewards |
| [**setTotalRewardsCustomDisclaimer()**](TotalRewardsApi.md#setTotalRewardsCustomDisclaimer) | **PUT** /api/v1/compensation/total_rewards/custom_disclaimer | Set Total Rewards Custom Disclaimer |
| [**setTotalRewardsOnboardingStep()**](TotalRewardsApi.md#setTotalRewardsOnboardingStep) | **PUT** /api/v1/compensation/total_rewards/onboarding/{stepName} | Set Total Rewards Onboarding Step Status |


## `addTotalRewardsEmployees()`

```php
addTotalRewardsEmployees($add_total_rewards_employees_request)
```

Add Employees to Total Rewards

Add employees to Total Rewards. Each employee will have a Total Rewards profile created and will be notified if they are active users.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_total_rewards_employees_request = new \BhrSdk\Model\AddTotalRewardsEmployeesRequest(); // \BhrSdk\Model\AddTotalRewardsEmployeesRequest

try {
    $apiInstance->addTotalRewardsEmployees($add_total_rewards_employees_request);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->addTotalRewardsEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_total_rewards_employees_request** | [**\BhrSdk\Model\AddTotalRewardsEmployeesRequest**](../Model/AddTotalRewardsEmployeesRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `checkTotalRewardsProfile()`

```php
checkTotalRewardsProfile($employee_id)
```

Check Total Rewards Profile Availability

Check if the given employee has an active Total Rewards profile and the current user has permission to view it. Returns 204 when the employee has a profile and the user is authorized; 404 if the profile does not exist or the user lacks access.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The ID of the employee to check.

try {
    $apiInstance->checkTotalRewardsProfile($employee_id);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->checkTotalRewardsProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The ID of the employee to check. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTotalRewardsPrintableStatement()`

```php
getTotalRewardsPrintableStatement($employee_id, $multiplier, $year)
```

Get Printable Total Rewards Statement

Generate and return a PDF printable version of the employee's Total Rewards statement.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The ID of the employee.
$multiplier = 3.4; // float | Hours-per-week multiplier for annualizing hourly pay.
$year = 56; // int | Statement year. Defaults to the current year when omitted.

try {
    $apiInstance->getTotalRewardsPrintableStatement($employee_id, $multiplier, $year);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->getTotalRewardsPrintableStatement: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The ID of the employee. | |
| **multiplier** | **float**| Hours-per-week multiplier for annualizing hourly pay. | [optional] |
| **year** | **int**| Statement year. Defaults to the current year when omitted. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/pdf`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTotalRewardsStatement()`

```php
getTotalRewardsStatement($employee_id): \BhrSdk\Model\TotalRewardsEmployeeStatement
```

Get Total Rewards Statement

Returns the full Total Rewards statement for the given employee, including compensation, benefits, bonuses, equity, reimbursements, and time-off data.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The ID of the employee.

try {
    $result = $apiInstance->getTotalRewardsStatement($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->getTotalRewardsStatement: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The ID of the employee. | |

### Return type

[**\BhrSdk\Model\TotalRewardsEmployeeStatement**](../Model/TotalRewardsEmployeeStatement.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeTotalRewardsCustomDisclaimer()`

```php
removeTotalRewardsCustomDisclaimer()
```

Remove Total Rewards Custom Disclaimer

Remove the company-wide Total Rewards custom disclaimer. After removal, the default disclaimer will be shown on employee statements.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->removeTotalRewardsCustomDisclaimer();
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->removeTotalRewardsCustomDisclaimer: ', $e->getMessage(), PHP_EOL;
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
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `removeTotalRewardsEmployees()`

```php
removeTotalRewardsEmployees($remove_total_rewards_employees_request)
```

Remove Employees from Total Rewards

Remove employees from Total Rewards. Their Total Rewards profiles will be deleted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$remove_total_rewards_employees_request = new \BhrSdk\Model\RemoveTotalRewardsEmployeesRequest(); // \BhrSdk\Model\RemoveTotalRewardsEmployeesRequest

try {
    $apiInstance->removeTotalRewardsEmployees($remove_total_rewards_employees_request);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->removeTotalRewardsEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **remove_total_rewards_employees_request** | [**\BhrSdk\Model\RemoveTotalRewardsEmployeesRequest**](../Model/RemoveTotalRewardsEmployeesRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setTotalRewardsCustomDisclaimer()`

```php
setTotalRewardsCustomDisclaimer($set_total_rewards_custom_disclaimer_request)
```

Set Total Rewards Custom Disclaimer

Set the company-wide Total Rewards custom disclaimer text shown on employee statements.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$set_total_rewards_custom_disclaimer_request = new \BhrSdk\Model\SetTotalRewardsCustomDisclaimerRequest(); // \BhrSdk\Model\SetTotalRewardsCustomDisclaimerRequest

try {
    $apiInstance->setTotalRewardsCustomDisclaimer($set_total_rewards_custom_disclaimer_request);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->setTotalRewardsCustomDisclaimer: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **set_total_rewards_custom_disclaimer_request** | [**\BhrSdk\Model\SetTotalRewardsCustomDisclaimerRequest**](../Model/SetTotalRewardsCustomDisclaimerRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setTotalRewardsOnboardingStep()`

```php
setTotalRewardsOnboardingStep($step_name, $set_total_rewards_onboarding_step_request): \BhrSdk\Model\TotalRewardsOnboardingStep
```

Set Total Rewards Onboarding Step Status

Set a Total Rewards onboarding step to completed or incomplete. Valid step names are defined by the Total Rewards onboarding configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TotalRewardsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$step_name = 'step_name_example'; // string | Name of the onboarding step.
$set_total_rewards_onboarding_step_request = new \BhrSdk\Model\SetTotalRewardsOnboardingStepRequest(); // \BhrSdk\Model\SetTotalRewardsOnboardingStepRequest

try {
    $result = $apiInstance->setTotalRewardsOnboardingStep($step_name, $set_total_rewards_onboarding_step_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TotalRewardsApi->setTotalRewardsOnboardingStep: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **step_name** | **string**| Name of the onboarding step. | |
| **set_total_rewards_onboarding_step_request** | [**\BhrSdk\Model\SetTotalRewardsOnboardingStepRequest**](../Model/SetTotalRewardsOnboardingStepRequest.md)|  | |

### Return type

[**\BhrSdk\Model\TotalRewardsOnboardingStep**](../Model/TotalRewardsOnboardingStep.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
