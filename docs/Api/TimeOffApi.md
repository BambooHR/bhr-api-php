# BhrSdk\TimeOffApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**adjustTimeOffBalance()**](TimeOffApi.md#adjustTimeOffBalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance |
| [**assignTimeOffPoliciesV1()**](TimeOffApi.md#assignTimeOffPoliciesV1) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies (v1) |
| [**assignTimeOffPoliciesV11()**](TimeOffApi.md#assignTimeOffPoliciesV11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies (v1.1) |
| [**createTimeOffHistory()**](TimeOffApi.md#createTimeOffHistory) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Create Time Off History Item |
| [**createTimeOffRequest()**](TimeOffApi.md#createTimeOffRequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Create Time Off Request |
| [**getTimeOffBalance()**](TimeOffApi.md#getTimeOffBalance) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Get Time Off Balance |
| [**listEmployeeTimeOffPoliciesV1()**](TimeOffApi.md#listEmployeeTimeOffPoliciesV1) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies (v1) |
| [**listEmployeeTimeOffPoliciesV11()**](TimeOffApi.md#listEmployeeTimeOffPoliciesV11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies (v1.1) |
| [**listTimeOffPolicies()**](TimeOffApi.md#listTimeOffPolicies) | **GET** /api/v1/meta/time_off/policies | List Time Off Policies |
| [**listTimeOffRequests()**](TimeOffApi.md#listTimeOffRequests) | **GET** /api/v1/time_off/requests | List Time Off Requests |
| [**listTimeOffTypes()**](TimeOffApi.md#listTimeOffTypes) | **GET** /api/v1/meta/time_off/types | List Time Off Types |
| [**listWhosOut()**](TimeOffApi.md#listWhosOut) | **GET** /api/v1/time_off/whos_out | List Who’s Out |
| [**listWhosOutV1()**](TimeOffApi.md#listWhosOutV1) | **GET** /api/v1/whos-out | List Who&#39;s Out |
| [**updateTimeOffRequestStatus()**](TimeOffApi.md#updateTimeOffRequestStatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Update Time Off Request Status |


## `adjustTimeOffBalance()`

```php
adjustTimeOffBalance($employee_id, $adjust_time_off_balance)
```

Adjust Time Off Balance

Creates a balance adjustment for an employee's time off type. The adjustment is recorded as an override history item. Cannot adjust balances for discretionary (unlimited) time off types.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The internal employee ID.
$adjust_time_off_balance = new \BhrSdk\Model\AdjustTimeOffBalance(); // \BhrSdk\Model\AdjustTimeOffBalance

try {
    $apiInstance->adjustTimeOffBalance($employee_id, $adjust_time_off_balance);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->adjustTimeOffBalance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The internal employee ID. | |
| **adjust_time_off_balance** | [**\BhrSdk\Model\AdjustTimeOffBalance**](../Model/AdjustTimeOffBalance.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `assignTimeOffPoliciesV1()`

```php
assignTimeOffPoliciesV1($employee_id, $assign_time_off_policies_v1_request_inner): \BhrSdk\Model\AssignedTimeOffPolicy[]
```

Assign Time Off Policies (v1)

Deprecated. Use **Assign Time Off Policies (v1.1)** instead (`assign-time-off-policies-v1_1`). Assigns time off policies to an employee with accruals starting on the specified date. A null start date removes the existing assignment. On success, returns the current list of assigned policies.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The internal employee ID of the employee whose time off policies are being assigned.
$assign_time_off_policies_v1_request_inner = array(new \BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner()); // \BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner[]

try {
    $result = $apiInstance->assignTimeOffPoliciesV1($employee_id, $assign_time_off_policies_v1_request_inner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->assignTimeOffPoliciesV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The internal employee ID of the employee whose time off policies are being assigned. | |
| **assign_time_off_policies_v1_request_inner** | [**\BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner[]**](../Model/AssignTimeOffPoliciesV1RequestInner.md)|  | |

### Return type

[**\BhrSdk\Model\AssignedTimeOffPolicy[]**](../Model/AssignedTimeOffPolicy.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `assignTimeOffPoliciesV11()`

```php
assignTimeOffPoliciesV11($employee_id, $assign_time_off_policies_v1_request_inner): \BhrSdk\Model\AssignedTimeOffPolicyV11[]
```

Assign Time Off Policies (v1.1)

Assigns time off policies to an employee with accruals starting on the specified date. On success, returns the current list of assigned policies including manual and unlimited policy types.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The internal employee ID of the employee whose time off policies are being assigned.
$assign_time_off_policies_v1_request_inner = array(new \BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner()); // \BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner[]

try {
    $result = $apiInstance->assignTimeOffPoliciesV11($employee_id, $assign_time_off_policies_v1_request_inner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->assignTimeOffPoliciesV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The internal employee ID of the employee whose time off policies are being assigned. | |
| **assign_time_off_policies_v1_request_inner** | [**\BhrSdk\Model\AssignTimeOffPoliciesV1RequestInner[]**](../Model/AssignTimeOffPoliciesV1RequestInner.md)|  | |

### Return type

[**\BhrSdk\Model\AssignedTimeOffPolicyV11[]**](../Model/AssignedTimeOffPolicyV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeOffHistory()`

```php
createTimeOffHistory($employee_id, $time_off_history)
```

Create Time Off History Item

Creates a time off history item for an employee. For `used` type entries, a `timeOffRequestId` referencing an approved request is required. For `override` (balance adjustment) entries via the /history path, provide the `amount` and `timeOffTypeId` directly. The `eventType` defaults based on the URI path when omitted.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The internal employee ID.
$time_off_history = new \BhrSdk\Model\TimeOffHistory(); // \BhrSdk\Model\TimeOffHistory

try {
    $apiInstance->createTimeOffHistory($employee_id, $time_off_history);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->createTimeOffHistory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The internal employee ID. | |
| **time_off_history** | [**\BhrSdk\Model\TimeOffHistory**](../Model/TimeOffHistory.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeOffRequest()`

```php
createTimeOffRequest($employee_id, $time_off_request): \BhrSdk\Model\CreatedTimeOffRequest
```

Create Time Off Request

Creates a time off request for an employee. The request can be submitted with a status of `approved`, `denied`, or `requested`. Submitting `approved` or `denied` is only honored when the caller is an owner/admin or has view/edit access to the time off type field for the target employee; other callers receive 403. When honored, these statuses record the request directly and suppress approval notifications. Supplying a `previousRequest` ID performs a destructive supersede: the prior request's status is set to `superceded`, all approvals on its workflow are removed and the workflow is marked deleted, and any home-page notifications tied to that workflow are deleted. Accepts both JSON and XML request bodies.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The internal employee ID of the employee for whom to create the time off request.
$time_off_request = new \BhrSdk\Model\TimeOffRequest(); // \BhrSdk\Model\TimeOffRequest

try {
    $result = $apiInstance->createTimeOffRequest($employee_id, $time_off_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->createTimeOffRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The internal employee ID of the employee for whom to create the time off request. | |
| **time_off_request** | [**\BhrSdk\Model\TimeOffRequest**](../Model/TimeOffRequest.md)|  | |

### Return type

[**\BhrSdk\Model\CreatedTimeOffRequest**](../Model/CreatedTimeOffRequest.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeOffBalance()`

```php
getTimeOffBalance($employee_id, $accept_header_parameter, $end, $precision): \BhrSdk\Model\TimeOffBalanceEntry[]
```

Get Time Off Balance

Returns time off balances for an employee across all assigned categories as of a given date. Each category's balance is calculated by summing all historical balance events (accruals, manual adjustments, used time off, and carry-over events) plus any future accruals and adjustments up to the specified date. To get current balances, pass today's date; to project future balances, pass a future date. Response defaults to XML unless Accept: application/json is provided.  **This endpoint does not accept the `0` self sentinel.** Unlike Get Employee (`get-employee`), passing `0` as `employeeId` returns `404` with an empty body and the header `x-bamboohr-error-message: Employee not found`. To read the authenticated caller's own balances, first resolve their internal employee ID with `get-employee` using the id `0`, then call this endpoint with that ID.  **Permissions.** Access is gated on the same Time Off tab view permission the web application uses. That permission is configured per access level and is **not** implied by the reporting structure: being an employee's manager does not by itself grant it, and a manager may receive `403` for their own direct reports. A caller without permission for the target employee receives an explicit `403` rather than an empty success, so the two cases are distinguishable: a `403` means access was denied, while an empty array with `200` means the employee has no assigned policies among the time off types this caller can view. Do not read a `403` as the employee having no time off, and do not read an empty array as a permission problem.  Because the categories returned are limited to the time off types the caller can view for that employee, two callers can legitimately receive different subsets for the same person. Treat the returned set as what this caller may see, not as the employee's complete policy list. `list-employee-time-off-policies-v1_1` is the companion endpoint for the underlying assignments and is gated on the same permission.  A category returning `0.00` is not an error and does not necessarily mean the time cannot be requested. Discretionary policies (for example Bereavement or FMLA) are granted as needed rather than accrued, so they normally report a zero balance while still being available to request. Use `policyType` to distinguish `accruing` from `discretionary` before characterizing a zero.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The internal employee ID of the employee whose time off balances are returned.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$end = 2026-12-31; // \DateTime | The date to calculate the time off balance as of, in YYYY-MM-DD format. Defaults to company today if not provided. Example: use a future date to project balance.
$precision = 2; // int | Number of decimal places for balance and usedYearToDate values. Minimum 0, maximum 4. Defaults to 2.

try {
    $result = $apiInstance->getTimeOffBalance($employee_id, $accept_header_parameter, $end, $precision);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->getTimeOffBalance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The internal employee ID of the employee whose time off balances are returned. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **end** | **\DateTime**| The date to calculate the time off balance as of, in YYYY-MM-DD format. Defaults to company today if not provided. Example: use a future date to project balance. | [optional] |
| **precision** | **int**| Number of decimal places for balance and usedYearToDate values. Minimum 0, maximum 4. Defaults to 2. | [optional] [default to 2] |

### Return type

[**\BhrSdk\Model\TimeOffBalanceEntry[]**](../Model/TimeOffBalanceEntry.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeTimeOffPoliciesV1()`

```php
listEmployeeTimeOffPoliciesV1($employee_id): \BhrSdk\Model\EmployeeTimeOffPolicyAssignment[]
```

List Employee Time Off Policies (v1)

Deprecated. Use **List Employee Time Off Policies (v1.1)** instead (`list-employee-time-off-policies-v1_1`). Returns the time off policies currently assigned to the specified employee, including policy ID, time off type, and accrual start date.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The internal employee ID.

try {
    $result = $apiInstance->listEmployeeTimeOffPoliciesV1($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listEmployeeTimeOffPoliciesV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The internal employee ID. | |

### Return type

[**\BhrSdk\Model\EmployeeTimeOffPolicyAssignment[]**](../Model/EmployeeTimeOffPolicyAssignment.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeTimeOffPoliciesV11()`

```php
listEmployeeTimeOffPoliciesV11($employee_id): \BhrSdk\Model\EmployeeTimeOffPolicyAssignmentV11[]
```

List Employee Time Off Policies (v1.1)

Returns the time off policies currently assigned to a specific employee, as a list of `{timeOffPolicyId, timeOffTypeId, accrualStartDate}` records. Use this to find which policy governs each time off type for this employee and when their accruals began. This is the per-employee assignment view; use `list-time-off-policies` for the company-wide policy catalog. Includes all policy types (accruing, manual, and unlimited); the v1 form of this endpoint excluded manual and unlimited types — v1.1 includes them.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | The internal employee ID.

try {
    $result = $apiInstance->listEmployeeTimeOffPoliciesV11($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listEmployeeTimeOffPoliciesV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| The internal employee ID. | |

### Return type

[**\BhrSdk\Model\EmployeeTimeOffPolicyAssignmentV11[]**](../Model/EmployeeTimeOffPolicyAssignmentV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeOffPolicies()`

```php
listTimeOffPolicies($accept_header_parameter): \BhrSdk\Model\TimeOffPolicy[]
```

List Time Off Policies

Returns all non-deleted time off policies for the company, sorted alphabetically by name. Only includes policies whose time off type has not been deleted.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->listTimeOffPolicies($accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listTimeOffPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\TimeOffPolicy[]**](../Model/TimeOffPolicy.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeOffRequests()`

```php
listTimeOffRequests($start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status, $exclude_note): \BhrSdk\Model\TimeOffRequest1[]
```

List Time Off Requests

Returns time off requests within the specified date range. Both `start` and `end` query parameters are required (YYYY-MM-DD). The search is inclusive: requests whose date range overlaps the query window are returned. Results can be filtered by status, employee, time off type, or limited to requests the caller can approve.  **Do not pass `employeeId=0` expecting the caller's own requests.** Unlike Get Employee (`get-employee`), the `0` self sentinel is not supported here and returns an empty array with HTTP `200` rather than an error, which is easily misread as the caller having no requests. Use `action=myRequests` for the authenticated caller's own requests, or resolve their internal employee ID with `get-employee` using the id `0` and pass that value.  **An empty result does not mean the employee has no requests.** A caller who lacks permission to view another employee's time off receives an empty array with HTTP `200`, indistinguishable from an employee with no requests in the window. Before concluding that someone has no time off requests, confirm that the window is wide enough and that the caller can actually view that employee. This endpoint and Get Time Off Balance (`get-time-off-balance`) are gated independently, so neither one's outcome predicts the other's. A caller can receive `403` from the balance endpoint for an employee while still receiving that same employee's requests here, which has been observed for a manager viewing a direct report. Do not infer access to one endpoint from access to the other, and do not treat a result from one as evidence about the other.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | The left boundary of the search window, in YYYY-MM-DD format. Returns any request whose end date falls on or after this date — i.e., requests that are still active at the start of your window. To find all requests overlapping a date range, pass your range start here. Note: this parameter filters on each request's *end* date, not its start date.
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | The right boundary of the search window, in YYYY-MM-DD format. Returns any request whose start date falls on or before this date — i.e., requests that have begun by the end of your window. To find all requests overlapping a date range, pass your range end here. Note: this parameter filters on each request's *start* date, not its end date.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$id = 'id_example'; // string | A particular request ID to limit the response to.
$action = 'view'; // string | Limit to requests the caller can `view`, requests they can `approve`, or only their own requests via `myRequests`. Defaults to `view`.
$employee_id = 'employee_id_example'; // string | A particular internal employee ID to limit the response to.
$type = 'type_example'; // string | A comma-separated list of time off type IDs to filter by. If omitted, requests of all types are included.
$status = 'status_example'; // string | A comma-separated list of request status values to filter by. Accepted values are approved, denied, superceded, requested, and canceled. If omitted, requests of all statuses are included.
$exclude_note = 'exclude_note_example'; // string | When set to any truthy value, omits the `notes` object from each request in the response.

try {
    $result = $apiInstance->listTimeOffRequests($start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status, $exclude_note);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listTimeOffRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| The left boundary of the search window, in YYYY-MM-DD format. Returns any request whose end date falls on or after this date — i.e., requests that are still active at the start of your window. To find all requests overlapping a date range, pass your range start here. Note: this parameter filters on each request&#39;s *end* date, not its start date. | |
| **end** | **\DateTime**| The right boundary of the search window, in YYYY-MM-DD format. Returns any request whose start date falls on or before this date — i.e., requests that have begun by the end of your window. To find all requests overlapping a date range, pass your range end here. Note: this parameter filters on each request&#39;s *start* date, not its end date. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **id** | **string**| A particular request ID to limit the response to. | [optional] |
| **action** | **string**| Limit to requests the caller can &#x60;view&#x60;, requests they can &#x60;approve&#x60;, or only their own requests via &#x60;myRequests&#x60;. Defaults to &#x60;view&#x60;. | [optional] [default to &#39;view&#39;] |
| **employee_id** | **string**| A particular internal employee ID to limit the response to. | [optional] |
| **type** | **string**| A comma-separated list of time off type IDs to filter by. If omitted, requests of all types are included. | [optional] |
| **status** | **string**| A comma-separated list of request status values to filter by. Accepted values are approved, denied, superceded, requested, and canceled. If omitted, requests of all statuses are included. | [optional] |
| **exclude_note** | **string**| When set to any truthy value, omits the &#x60;notes&#x60; object from each request in the response. | [optional] |

### Return type

[**\BhrSdk\Model\TimeOffRequest1[]**](../Model/TimeOffRequest1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeOffTypes()`

```php
listTimeOffTypes($accept_header_parameter, $mode): \BhrSdk\Model\TimeOffTypesAndDefaultHours
```

List Time Off Types

Lists the company's active time off types — PTO options, vacation, sick leave, and other time off categories — along with the company's default hours-per-day schedule. Pass `mode=request` to filter to only types the authenticated employee has permission to request. Time off type names are company-configured labels; common terms like \"PTO\" may not appear verbatim and may be expressed as \"Vacation\" or another company-specific name. The returned list is also permission-filtered: an admin caller may see types (e.g., \"Sick\") that a non-admin caller does not, so the set available for a given user depends on the caller's role. If a user's term does not exactly match a returned type name, present the available types as options rather than choosing one heuristically.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$mode = 'mode_example'; // string | Set to `request` to limit the results to time off types the authenticated employee can request.

try {
    $result = $apiInstance->listTimeOffTypes($accept_header_parameter, $mode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listTimeOffTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **mode** | **string**| Set to &#x60;request&#x60; to limit the results to time off types the authenticated employee can request. | [optional] |

### Return type

[**\BhrSdk\Model\TimeOffTypesAndDefaultHours**](../Model/TimeOffTypesAndDefaultHours.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWhosOut()`

```php
listWhosOut($accept_header_parameter, $start, $end, $filter): \BhrSdk\Model\WhosOutEntry[]
```

List Who’s Out

Returns a date-sorted list of employees who are out and company holidays for the specified period. Defaults to today through 14 days out when dates are omitted. Results include both `timeOff` entries (employee requests) and `holiday` entries, each identified by `type`. An empty array may mean no one is out, or that no holidays have been configured in the BambooHR company calendar — holidays must be set up there before they appear here. The `filter: off` parameter applies only to employee time-off entries; holidays are independently filtered per-employee based on holiday visibility settings, and that filter is not disabled by `filter: off`.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$start = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date in YYYY-MM-DD format. Defaults to today.
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | End date in YYYY-MM-DD format. Defaults to 14 days after the start date.
$filter = 'filter_example'; // string | Controls the Who's Out calendar filter. By default (parameter omitted), results are limited to the set of employees defined by the authenticated user's saved Who's Out calendar filter (the same filter applied to their in-app Who's Out view). A user with no filter configured sees all employees; a user with a saved filter (e.g. by department, location, division) sees only the configured subset. Set to `off` to ignore the saved filter and return employee time-off entries for everyone — useful for admins or integrations that need the complete company-wide view, or to diagnose whether incomplete results are caused by the saved filter. Note: this parameter applies to employee `timeOff` entries only. `holiday` entries are filtered separately on a per-employee basis (holidays can be configured as visible to specific employees) and that filter is not affected by `filter: off`.

try {
    $result = $apiInstance->listWhosOut($accept_header_parameter, $start, $end, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listWhosOut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **start** | **\DateTime**| Start date in YYYY-MM-DD format. Defaults to today. | [optional] |
| **end** | **\DateTime**| End date in YYYY-MM-DD format. Defaults to 14 days after the start date. | [optional] |
| **filter** | **string**| Controls the Who&#39;s Out calendar filter. By default (parameter omitted), results are limited to the set of employees defined by the authenticated user&#39;s saved Who&#39;s Out calendar filter (the same filter applied to their in-app Who&#39;s Out view). A user with no filter configured sees all employees; a user with a saved filter (e.g. by department, location, division) sees only the configured subset. Set to &#x60;off&#x60; to ignore the saved filter and return employee time-off entries for everyone — useful for admins or integrations that need the complete company-wide view, or to diagnose whether incomplete results are caused by the saved filter. Note: this parameter applies to employee &#x60;timeOff&#x60; entries only. &#x60;holiday&#x60; entries are filtered separately on a per-employee basis (holidays can be configured as visible to specific employees) and that filter is not affected by &#x60;filter: off&#x60;. | [optional] |

### Return type

[**\BhrSdk\Model\WhosOutEntry[]**](../Model/WhosOutEntry.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWhosOutV1()`

```php
listWhosOutV1($start, $end, $filter, $direct_reports_only, $include_persons, $page, $page_size): \BhrSdk\Model\WhosOutListResponseV1
```

List Who's Out

Lists approved time off occurrences overlapping the requested date range, scoped to employees the caller can see. Results the caller lacks permission to view are silently excluded. Dates are interpreted in the company timezone. Results are sorted by start date ascending, then id ascending.  OAuth Scopes: time_off

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Inclusive start date (YYYY-MM-DD). Interpreted in the company timezone.
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Inclusive end date (YYYY-MM-DD). Must be on or after start; the range may not exceed 366 days.
$filter = 'filter_example'; // string | OData filter expression applied to who's out results. Supported operators: `eq` (equals), `in` (value in list), `and` (combine clauses). Filterable fields: `employeeId` (int), `department` (int), `division` (int), `location` (int). Examples: `employeeId eq 42`, `department in (10, 20) and location eq 5`.
$direct_reports_only = false; // bool | When true, restrict to time off for the caller's direct reports. Callers with no direct reports receive an empty result.
$include_persons = false; // bool | When true, embed a persons map of employee display data alongside results.
$page = 1; // int | The page number to retrieve.
$page_size = 100; // int | The number of items to return per page.

try {
    $result = $apiInstance->listWhosOutV1($start, $end, $filter, $direct_reports_only, $include_persons, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listWhosOutV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| Inclusive start date (YYYY-MM-DD). Interpreted in the company timezone. | |
| **end** | **\DateTime**| Inclusive end date (YYYY-MM-DD). Must be on or after start; the range may not exceed 366 days. | |
| **filter** | **string**| OData filter expression applied to who&#39;s out results. Supported operators: &#x60;eq&#x60; (equals), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Filterable fields: &#x60;employeeId&#x60; (int), &#x60;department&#x60; (int), &#x60;division&#x60; (int), &#x60;location&#x60; (int). Examples: &#x60;employeeId eq 42&#x60;, &#x60;department in (10, 20) and location eq 5&#x60;. | [optional] |
| **direct_reports_only** | **bool**| When true, restrict to time off for the caller&#39;s direct reports. Callers with no direct reports receive an empty result. | [optional] [default to false] |
| **include_persons** | **bool**| When true, embed a persons map of employee display data alongside results. | [optional] [default to false] |
| **page** | **int**| The page number to retrieve. | [optional] [default to 1] |
| **page_size** | **int**| The number of items to return per page. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\WhosOutListResponseV1**](../Model/WhosOutListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTimeOffRequestStatus()`

```php
updateTimeOffRequestStatus($request_id, $request): object
```

Update Time Off Request Status

Updates the status of an existing time off request. Valid statuses are `approved`, `denied` (or `declined`), and `canceled`. Owner/admins can approve out of turn by completing all workflow steps at once; other approvers complete only their current step. Deprecated: use the approvals, denials, or cancellations process resources under /api/v1/time-off/requests/{id} instead.  OAuth Scopes: time_off.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 'request_id_example'; // string | The ID of the time off request to update.
$request = new \BhrSdk\Model\Request(); // \BhrSdk\Model\Request

try {
    $result = $apiInstance->updateTimeOffRequestStatus($request_id, $request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->updateTimeOffRequestStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **string**| The ID of the time off request to update. | |
| **request** | [**\BhrSdk\Model\Request**](../Model/Request.md)|  | |

### Return type

**object**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
