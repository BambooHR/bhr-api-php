# BhrSdk\TimeOffApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**adjustTimeOffBalance()**](TimeOffApi.md#adjustTimeOffBalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance |
| [**assignTimeOffPolicies()**](TimeOffApi.md#assignTimeOffPolicies) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies |
| [**assignTimeOffPoliciesV11()**](TimeOffApi.md#assignTimeOffPoliciesV11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies v1.1 |
| [**createTimeOffHistory()**](TimeOffApi.md#createTimeOffHistory) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Create Time Off History Item |
| [**createTimeOffRequest()**](TimeOffApi.md#createTimeOffRequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Create Time Off Request |
| [**getTimeOffBalance()**](TimeOffApi.md#getTimeOffBalance) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Get Time Off Balance |
| [**listEmployeeTimeOffPolicies()**](TimeOffApi.md#listEmployeeTimeOffPolicies) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies |
| [**listEmployeeTimeOffPoliciesV11()**](TimeOffApi.md#listEmployeeTimeOffPoliciesV11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies v1.1 |
| [**listTimeOffPolicies()**](TimeOffApi.md#listTimeOffPolicies) | **GET** /api/v1/meta/time_off/policies | List Time Off Policies |
| [**listTimeOffRequests()**](TimeOffApi.md#listTimeOffRequests) | **GET** /api/v1/time_off/requests | List Time Off Requests |
| [**listTimeOffTypes()**](TimeOffApi.md#listTimeOffTypes) | **GET** /api/v1/meta/time_off/types | List Time Off Types |
| [**listWhosOut()**](TimeOffApi.md#listWhosOut) | **GET** /api/v1/time_off/whos_out | List Who’s Out |
| [**updateTimeOffRequestStatus()**](TimeOffApi.md#updateTimeOffRequestStatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Update Time Off Request Status |


## `adjustTimeOffBalance()`

```php
adjustTimeOffBalance($employee_id, $adjust_time_off_balance)
```

Adjust Time Off Balance

Creates a balance adjustment for an employee's time off type. The adjustment is recorded as an override history item. Cannot adjust balances for discretionary (unlimited) time off types.

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
$employee_id = 56; // int | The ID of the employee.
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
| **employee_id** | **int**| The ID of the employee. | |
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

## `assignTimeOffPolicies()`

```php
assignTimeOffPolicies($employee_id, $assign_time_off_policies_request_inner): \BhrSdk\Model\AssignedTimeOffPolicy[]
```

Assign Time Off Policies

Assigns time off policies to an employee with accruals starting on the specified date. A null start date removes the existing assignment. On success, returns the current list of assigned policies.

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
$employee_id = 56; // int | The ID of the employee to assign policies to.
$assign_time_off_policies_request_inner = array(new \BhrSdk\Model\AssignTimeOffPoliciesRequestInner()); // \BhrSdk\Model\AssignTimeOffPoliciesRequestInner[]

try {
    $result = $apiInstance->assignTimeOffPolicies($employee_id, $assign_time_off_policies_request_inner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->assignTimeOffPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to assign policies to. | |
| **assign_time_off_policies_request_inner** | [**\BhrSdk\Model\AssignTimeOffPoliciesRequestInner[]**](../Model/AssignTimeOffPoliciesRequestInner.md)|  | |

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
assignTimeOffPoliciesV11($employee_id, $assign_time_off_policies_request_inner): \BhrSdk\Model\AssignedTimeOffPolicyV11[]
```

Assign Time Off Policies v1.1

Assigns time off policies to an employee with accruals starting on the specified date. On success, returns the current list of assigned policies including manual and unlimited policy types.

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
$employee_id = 56; // int | The ID of the employee to assign policies to.
$assign_time_off_policies_request_inner = array(new \BhrSdk\Model\AssignTimeOffPoliciesRequestInner()); // \BhrSdk\Model\AssignTimeOffPoliciesRequestInner[]

try {
    $result = $apiInstance->assignTimeOffPoliciesV11($employee_id, $assign_time_off_policies_request_inner);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->assignTimeOffPoliciesV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to assign policies to. | |
| **assign_time_off_policies_request_inner** | [**\BhrSdk\Model\AssignTimeOffPoliciesRequestInner[]**](../Model/AssignTimeOffPoliciesRequestInner.md)|  | |

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

Creates a time off history item for an employee. For `used` type entries, a `timeOffRequestId` referencing an approved request is required. For `override` (balance adjustment) entries via the /history path, provide the `amount` and `timeOffTypeId` directly. The `eventType` defaults based on the URI path when omitted.

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
$employee_id = 56; // int | The ID of the employee.
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
| **employee_id** | **int**| The ID of the employee. | |
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

Creates a time off request for an employee. The request can be submitted with a status of `approved`, `denied`, or `requested`. Submitting `approved` or `denied` is only honored when the caller is an owner/admin or has view/edit access to the time off type field for the target employee; other callers receive 403. When honored, these statuses record the request directly and suppress approval notifications. Supplying a `previousRequest` ID performs a destructive supersede: the prior request's status is set to `superceded`, all approvals on its workflow are removed and the workflow is marked deleted, and any home-page notifications tied to that workflow are deleted. Accepts both JSON and XML request bodies.

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
$employee_id = 56; // int | The ID of the employee to create the time off request for.
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
| **employee_id** | **int**| The ID of the employee to create the time off request for. | |
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

Returns time off balances for an employee across all assigned categories as of a given date. Each category's balance is calculated by summing all historical balance events (accruals, manual adjustments, used time off, and carry-over events) plus any future accruals and adjustments up to the specified date. To get current balances, pass today's date; to project future balances, pass a future date. Response defaults to XML unless Accept: application/json is provided.

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
$employee_id = 56; // int | The ID of the employee to get time off balances for.
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
| **employee_id** | **int**| The ID of the employee to get time off balances for. | |
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

## `listEmployeeTimeOffPolicies()`

```php
listEmployeeTimeOffPolicies($employee_id): \BhrSdk\Model\EmployeeTimeOffPolicyAssignment[]
```

List Employee Time Off Policies

Returns the time off policies currently assigned to the specified employee, including policy ID, time off type, and accrual start date.

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
$employee_id = 56; // int | The ID of the employee.

try {
    $result = $apiInstance->listEmployeeTimeOffPolicies($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->listEmployeeTimeOffPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee. | |

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

List Employee Time Off Policies v1.1

Returns the time off policies currently assigned to a specific employee, as a list of `{timeOffPolicyId, timeOffTypeId, accrualStartDate}` records. Use this to find which policy governs each time off type for this employee and when their accruals began. This is the per-employee assignment view; use `list-time-off-policies` for the company-wide policy catalog. Includes all policy types (accruing, manual, and unlimited); the v1 form of this endpoint excluded manual and unlimited types — v1.1 includes them.

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
$employee_id = 56; // int | The ID of the employee.

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
| **employee_id** | **int**| The ID of the employee. | |

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

Returns all non-deleted time off policies for the company, sorted alphabetically by name. Only includes policies whose time off type has not been deleted.

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

Returns time off requests within the specified date range. Both `start` and `end` query parameters are required (YYYY-MM-DD). The search is inclusive: requests whose date range overlaps the query window are returned. Results can be filtered by status, employee, time off type, or limited to requests the caller can approve.

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
$id = 56; // int | A particular request ID to limit the response to.
$action = 'view'; // string | Limit to requests the caller can `view`, requests they can `approve`, or only their own requests via `myRequests`. Defaults to `view`.
$employee_id = 56; // int | A particular employee ID to limit the response to.
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
| **id** | **int**| A particular request ID to limit the response to. | [optional] |
| **action** | **string**| Limit to requests the caller can &#x60;view&#x60;, requests they can &#x60;approve&#x60;, or only their own requests via &#x60;myRequests&#x60;. Defaults to &#x60;view&#x60;. | [optional] [default to &#39;view&#39;] |
| **employee_id** | **int**| A particular employee ID to limit the response to. | [optional] |
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

Returns active time off types for the company along with the company's default hours-per-day schedule. Pass `mode=request` to filter to only types the authenticated employee has permission to request.

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

Returns a date-sorted list of employees who are out and company holidays for the specified period. Defaults to today through 14 days out when dates are omitted. Results include both `timeOff` entries (employee requests) and `holiday` entries, each identified by `type`. An empty array may mean no one is out, or that no holidays have been configured in the BambooHR company calendar — holidays must be set up there before they appear here. The `filter: off` parameter applies only to employee time-off entries; holidays are independently filtered per-employee based on holiday visibility settings, and that filter is not disabled by `filter: off`.

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

## `updateTimeOffRequestStatus()`

```php
updateTimeOffRequestStatus($request_id, $request)
```

Update Time Off Request Status

Updates the status of an existing time off request. Valid statuses are `approved`, `denied` (or `declined`), and `canceled`. Owner/admins can approve out of turn by completing all workflow steps at once; other approvers complete only their current step.

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
$request_id = 56; // int | The ID of the time off request to update.
$request = new \BhrSdk\Model\Request(); // \BhrSdk\Model\Request

try {
    $apiInstance->updateTimeOffRequestStatus($request_id, $request);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->updateTimeOffRequestStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **int**| The ID of the time off request to update. | |
| **request** | [**\BhrSdk\Model\Request**](../Model/Request.md)|  | |

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
