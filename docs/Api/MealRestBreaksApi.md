# BhrSdk\MealRestBreaksApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**assignEmployeesToBreakPolicy()**](MealRestBreaksApi.md#assignEmployeesToBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/assign | Assign Employees to Break Policy |
| [**createBreak()**](MealRestBreaksApi.md#createBreak) | **POST** /api/v1/time-tracking/break-policies/{id}/breaks | Create Break |
| [**createBreakPolicy()**](MealRestBreaksApi.md#createBreakPolicy) | **POST** /api/v1/time-tracking/break-policies | Create Break Policy |
| [**deleteBreak()**](MealRestBreaksApi.md#deleteBreak) | **DELETE** /api/v1/time-tracking/breaks/{id} | Delete Break |
| [**deleteBreakPolicy()**](MealRestBreaksApi.md#deleteBreakPolicy) | **DELETE** /api/v1/time-tracking/break-policies/{id} | Delete Break Policy |
| [**getBreak()**](MealRestBreaksApi.md#getBreak) | **GET** /api/v1/time-tracking/breaks/{id} | Get Break |
| [**getBreakPolicy()**](MealRestBreaksApi.md#getBreakPolicy) | **GET** /api/v1/time-tracking/break-policies/{id} | Get Break Policy |
| [**getBreakPolicySuggestions()**](MealRestBreaksApi.md#getBreakPolicySuggestions) | **POST** /api/v1/time-tracking/break-policies/suggestions | Get Break Policy Suggestions |
| [**listBreakAssessments()**](MealRestBreaksApi.md#listBreakAssessments) | **GET** /api/v1/time-tracking/break-assessments | List Break Assessments |
| [**listBreakPolicies()**](MealRestBreaksApi.md#listBreakPolicies) | **GET** /api/v1/time-tracking/break-policies | List Break Policies |
| [**listBreakPolicyBreaks()**](MealRestBreaksApi.md#listBreakPolicyBreaks) | **GET** /api/v1/time-tracking/break-policies/{id}/breaks | List Breaks for Break Policy |
| [**listBreakPolicyEmployees()**](MealRestBreaksApi.md#listBreakPolicyEmployees) | **GET** /api/v1/time-tracking/break-policies/{id}/employees | List Break Policy Employees |
| [**listEmployeeBreakAvailabilities()**](MealRestBreaksApi.md#listEmployeeBreakAvailabilities) | **GET** /api/v1/time-tracking/employees/{id}/break-availabilities | List Employee Break Availabilities |
| [**listEmployeeBreakPolicies()**](MealRestBreaksApi.md#listEmployeeBreakPolicies) | **GET** /api/v1/time-tracking/employees/{id}/break-policies | List Employee Break Policies |
| [**replaceBreaksForBreakPolicy()**](MealRestBreaksApi.md#replaceBreaksForBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/breaks | Replace Breaks for Break Policy |
| [**setBreakPolicyEmployees()**](MealRestBreaksApi.md#setBreakPolicyEmployees) | **PUT** /api/v1/time-tracking/break-policies/{id}/assign | Set Employees for Break Policy |
| [**syncBreakPolicy()**](MealRestBreaksApi.md#syncBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/sync | Sync Break Policy |
| [**unassignEmployeesFromBreakPolicy()**](MealRestBreaksApi.md#unassignEmployeesFromBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/unassign | Unassign Employees from Break Policy |
| [**updateBreak()**](MealRestBreaksApi.md#updateBreak) | **PATCH** /api/v1/time-tracking/breaks/{id} | Update Break |
| [**updateBreakPolicy()**](MealRestBreaksApi.md#updateBreakPolicy) | **PATCH** /api/v1/time-tracking/break-policies/{id} | Update Break Policy |


## `assignEmployeesToBreakPolicy()`

```php
assignEmployeesToBreakPolicy($id, $assign_employees_to_break_policy_request)
```

Assign Employees to Break Policy

Assigns employees to a break policy. Adds the specified employees to the policy without removing existing assignments.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$assign_employees_to_break_policy_request = new \BhrSdk\Model\AssignEmployeesToBreakPolicyRequest(); // \BhrSdk\Model\AssignEmployeesToBreakPolicyRequest

try {
    $apiInstance->assignEmployeesToBreakPolicy($id, $assign_employees_to_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->assignEmployeesToBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **assign_employees_to_break_policy_request** | [**\BhrSdk\Model\AssignEmployeesToBreakPolicyRequest**](../Model/AssignEmployeesToBreakPolicyRequest.md)|  | |

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

## `createBreak()`

```php
createBreak($id, $time_tracking_create_time_tracking_break_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Create Break

Creates a new break and associates it with the specified break policy.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_create_time_tracking_break_v1 = new \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakV1(); // \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakV1

try {
    $result = $apiInstance->createBreak($id, $time_tracking_create_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->createBreak: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_create_time_tracking_break_v1** | [**\BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakV1**](../Model/TimeTrackingCreateTimeTrackingBreakV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakV1**](../Model/TimeTrackingTimeTrackingBreakV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createBreakPolicy()`

```php
createBreakPolicy($time_tracking_create_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1
```

Create Break Policy

Create a break policy. Breaks and assignments can be optionally included and created at the same time.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_create_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->createBreakPolicy($time_tracking_create_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->createBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_create_time_tracking_break_policy_v1** | [**\BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakPolicyV1**](../Model/TimeTrackingCreateTimeTrackingBreakPolicyV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1**](../Model/TimeTrackingTimeTrackingBreakPolicyWithRelationsV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteBreak()`

```php
deleteBreak($id)
```

Delete Break

Deletes a time tracking break by its UUID. The break is soft-deleted and removed from any break policies it was associated with.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.

try {
    $apiInstance->deleteBreak($id);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->deleteBreak: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break ID. | |

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

## `deleteBreakPolicy()`

```php
deleteBreakPolicy($id)
```

Delete Break Policy

Deletes a break policy by its UUID. Associated breaks and employee assignments are also removed.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.

try {
    $apiInstance->deleteBreakPolicy($id);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->deleteBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |

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

## `getBreak()`

```php
getBreak($id): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Get Break

Retrieves a single time tracking break by its UUID. Returns the full break details including name, duration, paid status, and availability configuration.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.

try {
    $result = $apiInstance->getBreak($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->getBreak: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakV1**](../Model/TimeTrackingTimeTrackingBreakV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBreakPolicy()`

```php
getBreakPolicy($id, $include_counts): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1
```

Get Break Policy

Retrieves a single break policy by its UUID. When includeCounts is enabled, the response includes the number of associated employees and breaks.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$include_counts = false; // bool | Include employee and break counts

try {
    $result = $apiInstance->getBreakPolicy($id, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->getBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **include_counts** | **bool**| Include employee and break counts | [optional] [default to false] |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1**](../Model/TimeTrackingTimeTrackingBreakPolicyV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBreakPolicySuggestions()`

```php
getBreakPolicySuggestions($get_break_policy_suggestions_request): \BhrSdk\Model\TimeTrackingBreakPolicySuggestionsResponseV1
```

Get Break Policy Suggestions

Uses an AI agent to analyze existing break policies and company context, then returns structured meal and rest break policy recommendations ready for form pre-fill.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$get_break_policy_suggestions_request = new \BhrSdk\Model\GetBreakPolicySuggestionsRequest(); // \BhrSdk\Model\GetBreakPolicySuggestionsRequest

try {
    $result = $apiInstance->getBreakPolicySuggestions($get_break_policy_suggestions_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->getBreakPolicySuggestions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **get_break_policy_suggestions_request** | [**\BhrSdk\Model\GetBreakPolicySuggestionsRequest**](../Model/GetBreakPolicySuggestionsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingBreakPolicySuggestionsResponseV1**](../Model/TimeTrackingBreakPolicySuggestionsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBreakAssessments()`

```php
listBreakAssessments($offset, $limit, $filter): \BhrSdk\Model\TimeTrackingPaginatedBreakAssessmentsResponseV1
```

List Break Assessments

Returns a paginated list of break assessments. A break assessment records whether an employee complied with their assigned break policy for a given day, along with any violations. Use the `filter` parameter to scope results by employee, date, result, or other fields. Use `offset` and `limit` for pagination; `limit` defaults to 100 and may not exceed 500.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | Number of items to skip before returning results. Defaults to 0.
$limit = 100; // int | Maximum number of items to return. Defaults to 100. Maximum is 500.
$filter = ''; // string | OData filter expression applied to break assessments. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `breakId`, `employeeId`, `employeeTimesheetId`, `date`, `result`, `availableYmdt`, `unavailableYmdt`, `expectedDuration`, `recordedDuration`, `durationDifference`, `createdAt`, `updatedAt`. Examples: `employeeId eq 614`, `employeeId in (614, 615, 616)`, `breakId eq 'abc-123' and employeeId eq 614`.

try {
    $result = $apiInstance->listBreakAssessments($offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listBreakAssessments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**| Number of items to skip before returning results. Defaults to 0. | [optional] [default to 0] |
| **limit** | **int**| Maximum number of items to return. Defaults to 100. Maximum is 500. | [optional] [default to 100] |
| **filter** | **string**| OData filter expression applied to break assessments. Supported operators: &#x60;eq&#x60; (equals, use &#x60;eq null&#x60; to match NULL), &#x60;ne&#x60; (not equals, use &#x60;ne null&#x60; to match NOT NULL), &#x60;lt&#x60; (less than), &#x60;le&#x60; (less than or equal), &#x60;gt&#x60; (greater than), &#x60;ge&#x60; (greater than or equal), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Filterable fields: &#x60;id&#x60;, &#x60;breakId&#x60;, &#x60;employeeId&#x60;, &#x60;employeeTimesheetId&#x60;, &#x60;date&#x60;, &#x60;result&#x60;, &#x60;availableYmdt&#x60;, &#x60;unavailableYmdt&#x60;, &#x60;expectedDuration&#x60;, &#x60;recordedDuration&#x60;, &#x60;durationDifference&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. Examples: &#x60;employeeId eq 614&#x60;, &#x60;employeeId in (614, 615, 616)&#x60;, &#x60;breakId eq &#39;abc-123&#39; and employeeId eq 614&#x60;. | [optional] [default to &#39;&#39;] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedBreakAssessmentsResponseV1**](../Model/TimeTrackingPaginatedBreakAssessmentsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBreakPolicies()`

```php
listBreakPolicies($offset, $limit, $filter, $include_counts): \BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1
```

List Break Policies

Returns a paginated list of all break policies. Supports OData v4 filtering. Use includeCounts to include employee and break counts per policy.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve
$filter = ''; // string | OData filter expression applied to break policies. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `name`, `description`, `allEmployeesAssigned`, `createdAt`, `updatedAt`, `deletedAt`. Examples: `name eq 'Standard Lunch'`, `description eq null`, `allEmployeesAssigned eq true and name ne 'Legacy'`.
$include_counts = false; // bool | Include employee and break counts

try {
    $result = $apiInstance->listBreakPolicies($offset, $limit, $filter, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listBreakPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |
| **filter** | **string**| OData filter expression applied to break policies. Supported operators: &#x60;eq&#x60; (equals, use &#x60;eq null&#x60; to match NULL), &#x60;ne&#x60; (not equals, use &#x60;ne null&#x60; to match NOT NULL), &#x60;lt&#x60; (less than), &#x60;le&#x60; (less than or equal), &#x60;gt&#x60; (greater than), &#x60;ge&#x60; (greater than or equal), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Filterable fields: &#x60;id&#x60;, &#x60;name&#x60;, &#x60;description&#x60;, &#x60;allEmployeesAssigned&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;, &#x60;deletedAt&#x60;. Examples: &#x60;name eq &#39;Standard Lunch&#39;&#x60;, &#x60;description eq null&#x60;, &#x60;allEmployeesAssigned eq true and name ne &#39;Legacy&#39;&#x60;. | [optional] [default to &#39;&#39;] |
| **include_counts** | **bool**| Include employee and break counts | [optional] [default to false] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1**](../Model/TimeTrackingPaginatedBreakPoliciesResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBreakPolicyBreaks()`

```php
listBreakPolicyBreaks($id, $offset, $limit, $filter): \BhrSdk\Model\TimeTrackingPaginatedBreaksResponseV1
```

List Breaks for Break Policy

Returns a paginated list of breaks belonging to the specified break policy. Supports OData v4 filtering.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve
$filter = ''; // string | OData filter expression applied to breaks within the policy. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `name`, `paid`, `duration`, `availabilityType`, `availabilityMinHoursWorked`, `availabilityMaxHoursWorked`, `availabilityStartTime`, `availabilityEndTime`, `createdAt`, `updatedAt`, `deletedAt`. Examples: `name eq 'Lunch'`, `paid eq true`, `paid eq false and name ne 'Quick Break'`.

try {
    $result = $apiInstance->listBreakPolicyBreaks($id, $offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listBreakPolicyBreaks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |
| **filter** | **string**| OData filter expression applied to breaks within the policy. Supported operators: &#x60;eq&#x60; (equals, use &#x60;eq null&#x60; to match NULL), &#x60;ne&#x60; (not equals, use &#x60;ne null&#x60; to match NOT NULL), &#x60;lt&#x60; (less than), &#x60;le&#x60; (less than or equal), &#x60;gt&#x60; (greater than), &#x60;ge&#x60; (greater than or equal), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Filterable fields: &#x60;id&#x60;, &#x60;name&#x60;, &#x60;paid&#x60;, &#x60;duration&#x60;, &#x60;availabilityType&#x60;, &#x60;availabilityMinHoursWorked&#x60;, &#x60;availabilityMaxHoursWorked&#x60;, &#x60;availabilityStartTime&#x60;, &#x60;availabilityEndTime&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;, &#x60;deletedAt&#x60;. Examples: &#x60;name eq &#39;Lunch&#39;&#x60;, &#x60;paid eq true&#x60;, &#x60;paid eq false and name ne &#39;Quick Break&#39;&#x60;. | [optional] [default to &#39;&#39;] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedBreaksResponseV1**](../Model/TimeTrackingPaginatedBreaksResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listBreakPolicyEmployees()`

```php
listBreakPolicyEmployees($id, $offset, $limit): \BhrSdk\Model\TimeTrackingPaginatedBreakPolicyEmployeesResponseV1
```

List Break Policy Employees

Retrieves employees assigned to a specific break policy. If a policy has no assignments, returns HTTP 200 with an empty `data` array.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve

try {
    $result = $apiInstance->listBreakPolicyEmployees($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedBreakPolicyEmployeesResponseV1**](../Model/TimeTrackingPaginatedBreakPolicyEmployeesResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeBreakAvailabilities()`

```php
listEmployeeBreakAvailabilities($id, $effective): \BhrSdk\Model\TimeTrackingTimeTrackingBreakAvailabilityV1[]
```

List Employee Break Availabilities

Retrieves break availability information for an employee. Requires permission to view the target employee in addition to time-tracking-break access.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The internal employee ID.
$effective = 2025-12-15T14:30:00; // string | The employee's local time that should be used to calculate availability. Defaults to the current time. Must be in Y-m-d\\TH:i:s format (no timezone offset).

try {
    $result = $apiInstance->listEmployeeBreakAvailabilities($id, $effective);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listEmployeeBreakAvailabilities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The internal employee ID. | |
| **effective** | **string**| The employee&#39;s local time that should be used to calculate availability. Defaults to the current time. Must be in Y-m-d\\TH:i:s format (no timezone offset). | [optional] |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakAvailabilityV1[]**](../Model/TimeTrackingTimeTrackingBreakAvailabilityV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeBreakPolicies()`

```php
listEmployeeBreakPolicies($id, $offset, $limit): \BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1
```

List Employee Break Policies

Retrieves break policies assigned to a specific employee. Requires permission to view the target employee.  OAuth Scopes: time_tracking:breaks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The internal employee ID.
$offset = 0; // int | The number of items to skip before starting to collect the result set. Minimum 0. Defaults to 0.
$limit = 100; // int | The maximum number of items to return. Must be between 0 and 500. Defaults to 100.

try {
    $result = $apiInstance->listEmployeeBreakPolicies($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->listEmployeeBreakPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The internal employee ID. | |
| **offset** | **int**| The number of items to skip before starting to collect the result set. Minimum 0. Defaults to 0. | [optional] [default to 0] |
| **limit** | **int**| The maximum number of items to return. Must be between 0 and 500. Defaults to 100. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1**](../Model/TimeTrackingPaginatedBreakPoliciesResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `replaceBreaksForBreakPolicy()`

```php
replaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1[]
```

Replace Breaks for Break Policy

Replace all breaks for a break policy. Breaks with an ID will be updated, breaks without an ID will be created. Existing breaks not in the request will be soft-deleted.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_create_or_update_time_tracking_break_without_policy_v1 = array(new \BhrSdk\Model\TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1()); // \BhrSdk\Model\TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1[]

try {
    $result = $apiInstance->replaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->replaceBreaksForBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_create_or_update_time_tracking_break_without_policy_v1** | [**\BhrSdk\Model\TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1[]**](../Model/TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakV1[]**](../Model/TimeTrackingTimeTrackingBreakV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setBreakPolicyEmployees()`

```php
setBreakPolicyEmployees($id, $set_break_policy_employees_request)
```

Set Employees for Break Policy

Sets the employee assignments for a break policy. This replaces all existing assignments with the provided list.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$set_break_policy_employees_request = new \BhrSdk\Model\SetBreakPolicyEmployeesRequest(); // \BhrSdk\Model\SetBreakPolicyEmployeesRequest

try {
    $apiInstance->setBreakPolicyEmployees($id, $set_break_policy_employees_request);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->setBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **set_break_policy_employees_request** | [**\BhrSdk\Model\SetBreakPolicyEmployeesRequest**](../Model/SetBreakPolicyEmployeesRequest.md)|  | |

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

## `syncBreakPolicy()`

```php
syncBreakPolicy($id, $time_tracking_sync_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1
```

Sync Break Policy

Performs a full replacement of a break policy and its related data (breaks and employee assignments). Unlike the partial update endpoint, this replaces the entire policy state with the provided payload, removing any breaks or assignments not included in the request.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_sync_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingSyncTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingSyncTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->syncBreakPolicy($id, $time_tracking_sync_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->syncBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_sync_time_tracking_break_policy_v1** | [**\BhrSdk\Model\TimeTrackingSyncTimeTrackingBreakPolicyV1**](../Model/TimeTrackingSyncTimeTrackingBreakPolicyV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1**](../Model/TimeTrackingTimeTrackingBreakPolicyWithRelationsV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unassignEmployeesFromBreakPolicy()`

```php
unassignEmployeesFromBreakPolicy($id, $unassign_employees_from_break_policy_request)
```

Unassign Employees from Break Policy

Unassigns the specified employees from a break policy. Removes employee assignments from the policy without affecting the policy itself or other assigned employees. Employees can only be unassigned from policies that are not assigned to all employees.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$unassign_employees_from_break_policy_request = new \BhrSdk\Model\UnassignEmployeesFromBreakPolicyRequest(); // \BhrSdk\Model\UnassignEmployeesFromBreakPolicyRequest

try {
    $apiInstance->unassignEmployeesFromBreakPolicy($id, $unassign_employees_from_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->unassignEmployeesFromBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **unassign_employees_from_break_policy_request** | [**\BhrSdk\Model\UnassignEmployeesFromBreakPolicyRequest**](../Model/UnassignEmployeesFromBreakPolicyRequest.md)|  | |

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

## `updateBreak()`

```php
updateBreak($id, $time_tracking_update_time_tracking_break_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Update Break

Partially updates a time tracking break identified by its UUID. Only fields provided in the request body are updated. Returns the updated break on success.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.
$time_tracking_update_time_tracking_break_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakV1

try {
    $result = $apiInstance->updateBreak($id, $time_tracking_update_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->updateBreak: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break ID. | |
| **time_tracking_update_time_tracking_break_v1** | [**\BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakV1**](../Model/TimeTrackingUpdateTimeTrackingBreakV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakV1**](../Model/TimeTrackingTimeTrackingBreakV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBreakPolicy()`

```php
updateBreakPolicy($id, $time_tracking_update_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1
```

Update Break Policy

Partially updates a break policy identified by its UUID. Only fields provided in the request body are updated. Returns the updated break policy on success.  OAuth Scopes: time_tracking:breaks.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\MealRestBreaksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_update_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->updateBreakPolicy($id, $time_tracking_update_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MealRestBreaksApi->updateBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_update_time_tracking_break_policy_v1** | [**\BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakPolicyV1**](../Model/TimeTrackingUpdateTimeTrackingBreakPolicyV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1**](../Model/TimeTrackingTimeTrackingBreakPolicyV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
