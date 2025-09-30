# MySdk\TimeOffApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAListOfWhoIsOut()**](TimeOffApi.md#getAListOfWhoIsOut) | **GET** /api/v1/time_off/whos_out | Get a list of Who&#39;s Out |
| [**getTimeOffPolicies()**](TimeOffApi.md#getTimeOffPolicies) | **GET** /api/v1/meta/time_off/policies | Get Time Off Policies |
| [**getTimeOffTypes()**](TimeOffApi.md#getTimeOffTypes) | **GET** /api/v1/meta/time_off/types | Get Time Off Types |
| [**timeOffAddATimeOffHistoryItemForTimeOffRequest()**](TimeOffApi.md#timeOffAddATimeOffHistoryItemForTimeOffRequest) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Add a Time Off History Item For Time Off Request |
| [**timeOffAddATimeOffRequest()**](TimeOffApi.md#timeOffAddATimeOffRequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Add a Time Off Request |
| [**timeOffAdjustTimeOffBalance()**](TimeOffApi.md#timeOffAdjustTimeOffBalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance |
| [**timeOffAssignTimeOffPoliciesForAnEmployee()**](TimeOffApi.md#timeOffAssignTimeOffPoliciesForAnEmployee) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee |
| [**timeOffAssignTimeOffPoliciesForAnEmployeeV11()**](TimeOffApi.md#timeOffAssignTimeOffPoliciesForAnEmployeeV11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee, Version 1.1 |
| [**timeOffChangeARequestStatus()**](TimeOffApi.md#timeOffChangeARequestStatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Change a Request Status |
| [**timeOffEstimateFutureTimeOffBalances()**](TimeOffApi.md#timeOffEstimateFutureTimeOffBalances) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Estimate Future Time Off Balances |
| [**timeOffGetTimeOffRequests()**](TimeOffApi.md#timeOffGetTimeOffRequests) | **GET** /api/v1/time_off/requests | Get Time Off Requests |
| [**timeOffListTimeOffPoliciesForEmployee()**](TimeOffApi.md#timeOffListTimeOffPoliciesForEmployee) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee |
| [**timeOffListTimeOffPoliciesForEmployeeV11()**](TimeOffApi.md#timeOffListTimeOffPoliciesForEmployeeV11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee, Version 1.1 |


## `getAListOfWhoIsOut()`

```php
getAListOfWhoIsOut($accept_header_parameter, $start, $end)
```

Get a list of Who's Out

This endpoint will return a list, sorted by date, of employees who will be out, and company holidays, for a period of time.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$start = 'start_example'; // string | A date in the form YYYY-MM-DD - defaults to the current date.
$end = 'end_example'; // string | A date in the form YYYY-MM-DD - defaults to 14 days from the start date.

try {
    $apiInstance->getAListOfWhoIsOut($accept_header_parameter, $start, $end);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->getAListOfWhoIsOut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **start** | **string**| A date in the form YYYY-MM-DD - defaults to the current date. | [optional] |
| **end** | **string**| A date in the form YYYY-MM-DD - defaults to 14 days from the start date. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeOffPolicies()`

```php
getTimeOffPolicies($accept_header_parameter)
```

Get Time Off Policies

This endpoint gets a list of time off policies.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getTimeOffPolicies($accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->getTimeOffPolicies: ', $e->getMessage(), PHP_EOL;
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

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeOffTypes()`

```php
getTimeOffTypes($accept_header_parameter, $mode)
```

Get Time Off Types

This endpoint gets a list of time off types.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$mode = 'mode_example'; // string | set to \\'request\\' to get a list of all time off types with which this user can create a time off request. The default is to return the list of time off types the user has permissions on. This distinction is important, as employees can request time off for types that they don\\'t have permission to view balances and requests for.

try {
    $apiInstance->getTimeOffTypes($accept_header_parameter, $mode);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->getTimeOffTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **mode** | **string**| set to \\&#39;request\\&#39; to get a list of all time off types with which this user can create a time off request. The default is to return the list of time off types the user has permissions on. This distinction is important, as employees can request time off for types that they don\\&#39;t have permission to view balances and requests for. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeOffAddATimeOffHistoryItemForTimeOffRequest()`

```php
timeOffAddATimeOffHistoryItemForTimeOffRequest($employee_id, $time_off_history)
```

Add a Time Off History Item For Time Off Request

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A new time off history item will be inserted into the database. On success, a 201 Created code is returned and the \"Location\" header of the response will contain a URL that identifies the new history item.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The ID of the employee.
$time_off_history = new \MySdk\Model\TimeOffHistory(); // \MySdk\Model\TimeOffHistory

try {
    $apiInstance->timeOffAddATimeOffHistoryItemForTimeOffRequest($employee_id, $time_off_history);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffAddATimeOffHistoryItemForTimeOffRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee. | |
| **time_off_history** | [**\MySdk\Model\TimeOffHistory**](../Model/TimeOffHistory.md)|  | |

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

## `timeOffAddATimeOffRequest()`

```php
timeOffAddATimeOffRequest($employee_id, $time_off_request)
```

Add a Time Off Request

A time off request is an entity that describes the decision making process for approving time off. Once a request has been created, a history entry can be created documenting the actual use of time off.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string
$time_off_request = new \MySdk\Model\TimeOffRequest(); // \MySdk\Model\TimeOffRequest

try {
    $apiInstance->timeOffAddATimeOffRequest($employee_id, $time_off_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffAddATimeOffRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**|  | |
| **time_off_request** | [**\MySdk\Model\TimeOffRequest**](../Model/TimeOffRequest.md)|  | |

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

## `timeOffAdjustTimeOffBalance()`

```php
timeOffAdjustTimeOffBalance($employee_id, $adjust_time_off_balance)
```

Adjust Time Off Balance

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off balance adjustment will be inserted into the database. On success, a 201 Created code is returned and the \"Location\" header of the response will contain a URL that identifies the new history item.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The ID of the employee.
$adjust_time_off_balance = new \MySdk\Model\AdjustTimeOffBalance(); // \MySdk\Model\AdjustTimeOffBalance

try {
    $apiInstance->timeOffAdjustTimeOffBalance($employee_id, $adjust_time_off_balance);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffAdjustTimeOffBalance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee. | |
| **adjust_time_off_balance** | [**\MySdk\Model\AdjustTimeOffBalance**](../Model/AdjustTimeOffBalance.md)|  | |

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

## `timeOffAssignTimeOffPoliciesForAnEmployee()`

```php
timeOffAssignTimeOffPoliciesForAnEmployee($employee_id, $time_off_assign_time_off_policies_for_an_employee_request_inner)
```

Assign Time Off Policies for an Employee

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off policy will be assigned to the employee with accruals starting on the date specified. A null start date will remove the assignment. On success, a 200 Success code is returned and the content of the response will be the same as the List Time off Policies API.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string
$time_off_assign_time_off_policies_for_an_employee_request_inner = array(new \MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner()); // \MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner[]

try {
    $apiInstance->timeOffAssignTimeOffPoliciesForAnEmployee($employee_id, $time_off_assign_time_off_policies_for_an_employee_request_inner);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffAssignTimeOffPoliciesForAnEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**|  | |
| **time_off_assign_time_off_policies_for_an_employee_request_inner** | [**\MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner[]**](../Model/TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner.md)|  | |

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

## `timeOffAssignTimeOffPoliciesForAnEmployeeV11()`

```php
timeOffAssignTimeOffPoliciesForAnEmployeeV11($employee_id, $time_off_assign_time_off_policies_for_an_employee_request_inner)
```

Assign Time Off Policies for an Employee, Version 1.1

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off policy will be assigned to the employee with accruals starting on the date specified. On success, a 200 Success code is returned and the content of the response will be the same as the List Time off Policies API.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string
$time_off_assign_time_off_policies_for_an_employee_request_inner = array(new \MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner()); // \MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner[]

try {
    $apiInstance->timeOffAssignTimeOffPoliciesForAnEmployeeV11($employee_id, $time_off_assign_time_off_policies_for_an_employee_request_inner);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffAssignTimeOffPoliciesForAnEmployeeV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**|  | |
| **time_off_assign_time_off_policies_for_an_employee_request_inner** | [**\MySdk\Model\TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner[]**](../Model/TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner.md)|  | |

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

## `timeOffChangeARequestStatus()`

```php
timeOffChangeARequestStatus($request_id, $request)
```

Change a Request Status

This endpoint allows you to change the status of a request in the system. You can use this to approve, deny, or cancel a time off request.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 'request_id_example'; // string
$request = new \MySdk\Model\Request(); // \MySdk\Model\Request

try {
    $apiInstance->timeOffChangeARequestStatus($request_id, $request);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffChangeARequestStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **string**|  | |
| **request** | [**\MySdk\Model\Request**](../Model/Request.md)|  | |

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

## `timeOffEstimateFutureTimeOffBalances()`

```php
timeOffEstimateFutureTimeOffBalances($end, $employee_id, $accept_header_parameter)
```

Estimate Future Time Off Balances

This endpoint will sum future time off accruals, scheduled time off, and carry-over events to produce estimates for the anticipated time off balance on a given date in the future.

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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$employee_id = 'employee_id_example'; // string
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->timeOffEstimateFutureTimeOffBalances($end, $employee_id, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffEstimateFutureTimeOffBalances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **end** | **\DateTime**|  | |
| **employee_id** | **string**|  | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeOffGetTimeOffRequests()`

```php
timeOffGetTimeOffRequests($start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status)
```

Get Time Off Requests



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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = 'start_example'; // string | YYYY-MM-DD. Only show time off that occurs on/after the specified start date.
$end = 'end_example'; // string | YYYY-MM-DD. Only show time off that occurs on/before the specified end date.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$id = 56; // int | A particular request ID to limit the response to.
$action = 'action_example'; // string | Limit to requests that the user has a particular level of access to. Legal values are: \"view\" or \"approve\". Defaults to view.
$employee_id = 'employee_id_example'; // string | A particular employee ID to limit the response to.
$type = 'type_example'; // string | A comma separated list of time off types IDs to include limit the response to. If omitted, requests of all types are included.
$status = 'status_example'; // string | A comma separated list of request status values to include. If omitted, requests of all status values are included. Legal values are \"approved\", \"denied\", \"superceded\", \"requested\", \"canceled\".

try {
    $apiInstance->timeOffGetTimeOffRequests($start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffGetTimeOffRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **string**| YYYY-MM-DD. Only show time off that occurs on/after the specified start date. | |
| **end** | **string**| YYYY-MM-DD. Only show time off that occurs on/before the specified end date. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **id** | **int**| A particular request ID to limit the response to. | [optional] |
| **action** | **string**| Limit to requests that the user has a particular level of access to. Legal values are: \&quot;view\&quot; or \&quot;approve\&quot;. Defaults to view. | [optional] |
| **employee_id** | **string**| A particular employee ID to limit the response to. | [optional] |
| **type** | **string**| A comma separated list of time off types IDs to include limit the response to. If omitted, requests of all types are included. | [optional] |
| **status** | **string**| A comma separated list of request status values to include. If omitted, requests of all status values are included. Legal values are \&quot;approved\&quot;, \&quot;denied\&quot;, \&quot;superceded\&quot;, \&quot;requested\&quot;, \&quot;canceled\&quot;. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeOffListTimeOffPoliciesForEmployee()`

```php
timeOffListTimeOffPoliciesForEmployee($employee_id)
```

List Time Off Policies for Employee



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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string

try {
    $apiInstance->timeOffListTimeOffPoliciesForEmployee($employee_id);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffListTimeOffPoliciesForEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeOffListTimeOffPoliciesForEmployeeV11()`

```php
timeOffListTimeOffPoliciesForEmployeeV11($employee_id)
```

List Time Off Policies for Employee, Version 1.1



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

$apiInstance = new MySdk\Api\TimeOffApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string

try {
    $apiInstance->timeOffListTimeOffPoliciesForEmployeeV11($employee_id);
} catch (Exception $e) {
    echo 'Exception when calling TimeOffApi->timeOffListTimeOffPoliciesForEmployeeV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
