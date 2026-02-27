# BhrSdk\TimeTrackingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEditTimesheetClockEntries()**](TimeTrackingApi.md#addEditTimesheetClockEntries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries |
| [**addEditTimesheetHourEntries()**](TimeTrackingApi.md#addEditTimesheetHourEntries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries |
| [**addTimesheetClockInEntry()**](TimeTrackingApi.md#addTimesheetClockInEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry |
| [**addTimesheetClockOutEntry()**](TimeTrackingApi.md#addTimesheetClockOutEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry |
| [**createTimeTrackingProject()**](TimeTrackingApi.md#createTimeTrackingProject) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project |
| [**deleteTimesheetClockEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetClockEntriesViaPost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries |
| [**deleteTimesheetHourEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetHourEntriesViaPost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**getTimesheetEntries()**](TimeTrackingApi.md#getTimesheetEntries) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries |
| [**timeTrackingAssignEmployeesToBreakPolicy()**](TimeTrackingApi.md#timeTrackingAssignEmployeesToBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/assign | Assign Employees to Break Policy |
| [**timeTrackingCreateBreak()**](TimeTrackingApi.md#timeTrackingCreateBreak) | **POST** /api/v1/time-tracking/break-policies/{id}/breaks | Create Break |
| [**timeTrackingCreateBreakPolicy()**](TimeTrackingApi.md#timeTrackingCreateBreakPolicy) | **POST** /api/v1/time-tracking/break-policies | Create Break Policy |
| [**timeTrackingDeleteBreak()**](TimeTrackingApi.md#timeTrackingDeleteBreak) | **DELETE** /api/v1/time-tracking/breaks/{id} | Delete Break |
| [**timeTrackingDeleteBreakPolicy()**](TimeTrackingApi.md#timeTrackingDeleteBreakPolicy) | **DELETE** /api/v1/time-tracking/break-policies/{id} | Delete Break Policy |
| [**timeTrackingGetBreak()**](TimeTrackingApi.md#timeTrackingGetBreak) | **GET** /api/v1/time-tracking/breaks/{id} | Get Break |
| [**timeTrackingGetBreakPolicy()**](TimeTrackingApi.md#timeTrackingGetBreakPolicy) | **GET** /api/v1/time-tracking/break-policies/{id} | Get Break Policy |
| [**timeTrackingListBreakAssessments()**](TimeTrackingApi.md#timeTrackingListBreakAssessments) | **GET** /api/v1/time-tracking/break-assessments | List Break Assessments |
| [**timeTrackingListBreakPolicies()**](TimeTrackingApi.md#timeTrackingListBreakPolicies) | **GET** /api/v1/time-tracking/break-policies | List Break Policies |
| [**timeTrackingListBreakPolicyBreaks()**](TimeTrackingApi.md#timeTrackingListBreakPolicyBreaks) | **GET** /api/v1/time-tracking/break-policies/{id}/breaks | List Breaks for Break Policy |
| [**timeTrackingListBreakPolicyEmployees()**](TimeTrackingApi.md#timeTrackingListBreakPolicyEmployees) | **GET** /api/v1/time-tracking/break-policies/{id}/employees | List Break Policy Employees |
| [**timeTrackingListEmployeeBreakAvailabilities()**](TimeTrackingApi.md#timeTrackingListEmployeeBreakAvailabilities) | **GET** /api/v1/time-tracking/employees/{id}/break-availabilities | List Employee Break Availability |
| [**timeTrackingListEmployeeBreakPolicies()**](TimeTrackingApi.md#timeTrackingListEmployeeBreakPolicies) | **GET** /api/v1/time-tracking/employees/{id}/break-policies | List Employee Break Policies |
| [**timeTrackingReplaceBreaksForBreakPolicy()**](TimeTrackingApi.md#timeTrackingReplaceBreaksForBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/breaks | Replace Breaks for Break Policy |
| [**timeTrackingSetBreakPolicyEmployees()**](TimeTrackingApi.md#timeTrackingSetBreakPolicyEmployees) | **PUT** /api/v1/time-tracking/break-policies/{id}/assign | Set Employees for Break Policy |
| [**timeTrackingSyncBreakPolicy()**](TimeTrackingApi.md#timeTrackingSyncBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/sync | Sync Break Policy |
| [**timeTrackingUnassignEmployeesFromBreakPolicy()**](TimeTrackingApi.md#timeTrackingUnassignEmployeesFromBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/unassign | Unassign Employees from Break Policy |
| [**timeTrackingUpdateBreak()**](TimeTrackingApi.md#timeTrackingUpdateBreak) | **PATCH** /api/v1/time-tracking/breaks/{id} | Update Break |
| [**timeTrackingUpdateBreakPolicy()**](TimeTrackingApi.md#timeTrackingUpdateBreakPolicy) | **PATCH** /api/v1/time-tracking/break-policies/{id} | Update Break Policy |


## `addEditTimesheetClockEntries()`

```php
addEditTimesheetClockEntries($clock_entries_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer[]
```

Create or Update Timesheet Clock Entries

Add or edit timesheet clock entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$clock_entries_schema = new \BhrSdk\Model\ClockEntriesSchema(); // \BhrSdk\Model\ClockEntriesSchema

try {
    $result = $apiInstance->addEditTimesheetClockEntries($clock_entries_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->addEditTimesheetClockEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **clock_entries_schema** | [**\BhrSdk\Model\ClockEntriesSchema**](../Model/ClockEntriesSchema.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addEditTimesheetHourEntries()`

```php
addEditTimesheetHourEntries($hour_entries_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer[]
```

Create or Update Timesheet Hour Entries

Add or edit timesheet hour entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hour_entries_request_schema = new \BhrSdk\Model\HourEntriesRequestSchema(); // \BhrSdk\Model\HourEntriesRequestSchema

try {
    $result = $apiInstance->addEditTimesheetHourEntries($hour_entries_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->addEditTimesheetHourEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hour_entries_request_schema** | [**\BhrSdk\Model\HourEntriesRequestSchema**](../Model/HourEntriesRequestSchema.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTimesheetClockInEntry()`

```php
addTimesheetClockInEntry($employee_id, $clock_in_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer
```

Create Timesheet Clock-In Entry

Clock in an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of the employee to clock in.
$clock_in_request_schema = new \BhrSdk\Model\ClockInRequestSchema(); // \BhrSdk\Model\ClockInRequestSchema

try {
    $result = $apiInstance->addTimesheetClockInEntry($employee_id, $clock_in_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->addTimesheetClockInEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| ID of the employee to clock in. | |
| **clock_in_request_schema** | [**\BhrSdk\Model\ClockInRequestSchema**](../Model/ClockInRequestSchema.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTimesheetClockOutEntry()`

```php
addTimesheetClockOutEntry($employee_id, $clock_out_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer
```

Create Timesheet Clock-Out Entry

Clock out an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of the employee to clock out.
$clock_out_request_schema = new \BhrSdk\Model\ClockOutRequestSchema(); // \BhrSdk\Model\ClockOutRequestSchema

try {
    $result = $apiInstance->addTimesheetClockOutEntry($employee_id, $clock_out_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->addTimesheetClockOutEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| ID of the employee to clock out. | |
| **clock_out_request_schema** | [**\BhrSdk\Model\ClockOutRequestSchema**](../Model/ClockOutRequestSchema.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeTrackingProject()`

```php
createTimeTrackingProject($project_create_request_schema): \BhrSdk\Model\TimeTrackingProjectWithTasksAndEmployeeIds
```

Create Time Tracking Project

Create a time tracking project with optional tasks.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_create_request_schema = new \BhrSdk\Model\ProjectCreateRequestSchema(); // \BhrSdk\Model\ProjectCreateRequestSchema

try {
    $result = $apiInstance->createTimeTrackingProject($project_create_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimeTrackingProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_create_request_schema** | [**\BhrSdk\Model\ProjectCreateRequestSchema**](../Model/ProjectCreateRequestSchema.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\TimeTrackingProjectWithTasksAndEmployeeIds**](../Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTimesheetClockEntriesViaPost()`

```php
deleteTimesheetClockEntriesViaPost($clock_entry_ids_schema)
```

Delete Timesheet Clock Entries

Delete timesheet clock entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$clock_entry_ids_schema = new \BhrSdk\Model\ClockEntryIdsSchema(); // \BhrSdk\Model\ClockEntryIdsSchema

try {
    $apiInstance->deleteTimesheetClockEntriesViaPost($clock_entry_ids_schema);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteTimesheetClockEntriesViaPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **clock_entry_ids_schema** | [**\BhrSdk\Model\ClockEntryIdsSchema**](../Model/ClockEntryIdsSchema.md)|  | |

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

## `deleteTimesheetHourEntriesViaPost()`

```php
deleteTimesheetHourEntriesViaPost($hour_entry_ids_schema)
```

Delete Timesheet Hour Entries

Delete timesheet hour entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$hour_entry_ids_schema = new \BhrSdk\Model\HourEntryIdsSchema(); // \BhrSdk\Model\HourEntryIdsSchema

try {
    $apiInstance->deleteTimesheetHourEntriesViaPost($hour_entry_ids_schema);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteTimesheetHourEntriesViaPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hour_entry_ids_schema** | [**\BhrSdk\Model\HourEntryIdsSchema**](../Model/HourEntryIdsSchema.md)|  | [optional] |

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

## `getTimesheetEntries()`

```php
getTimesheetEntries($start, $end, $employee_ids): \BhrSdk\Model\EmployeeTimesheetEntryTransformer[]
```

Get Timesheet Entries

Get all timesheet entries for a given period of time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = 2025-01-01; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days.
$end = 2025-03-01; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days.
$employee_ids = 1,2,3; // string | A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned.

try {
    $result = $apiInstance->getTimesheetEntries($start, $end, $employee_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimesheetEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days. | |
| **end** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days. | |
| **employee_ids** | **string**| A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned. | [optional] |

### Return type

[**\BhrSdk\Model\EmployeeTimesheetEntryTransformer[]**](../Model/EmployeeTimesheetEntryTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeTrackingAssignEmployeesToBreakPolicy()`

```php
timeTrackingAssignEmployeesToBreakPolicy($id, $time_tracking_assign_employees_to_break_policy_request)
```

Assign Employees to Break Policy

Assigns employees to a break policy. Adds the specified employees to the policy without removing existing assignments.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_assign_employees_to_break_policy_request = new \BhrSdk\Model\TimeTrackingAssignEmployeesToBreakPolicyRequest(); // \BhrSdk\Model\TimeTrackingAssignEmployeesToBreakPolicyRequest

try {
    $apiInstance->timeTrackingAssignEmployeesToBreakPolicy($id, $time_tracking_assign_employees_to_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingAssignEmployeesToBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_assign_employees_to_break_policy_request** | [**\BhrSdk\Model\TimeTrackingAssignEmployeesToBreakPolicyRequest**](../Model/TimeTrackingAssignEmployeesToBreakPolicyRequest.md)|  | |

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

## `timeTrackingCreateBreak()`

```php
timeTrackingCreateBreak($id, $time_tracking_create_time_tracking_break_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Create Break

Create a break for the provided break policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_create_time_tracking_break_v1 = new \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakV1(); // \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakV1

try {
    $result = $apiInstance->timeTrackingCreateBreak($id, $time_tracking_create_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingCreateBreak: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingCreateBreakPolicy()`

```php
timeTrackingCreateBreakPolicy($time_tracking_create_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1
```

Create Break Policy

Create a break policy. Breaks and assignments can be optionally included and created at the same time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_create_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingCreateTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->timeTrackingCreateBreakPolicy($time_tracking_create_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingCreateBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingDeleteBreak()`

```php
timeTrackingDeleteBreak($id)
```

Delete Break

Delete a break by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.

try {
    $apiInstance->timeTrackingDeleteBreak($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingDeleteBreak: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingDeleteBreakPolicy()`

```php
timeTrackingDeleteBreakPolicy($id)
```

Delete Break Policy

Delete a break policy by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.

try {
    $apiInstance->timeTrackingDeleteBreakPolicy($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingDeleteBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingGetBreak()`

```php
timeTrackingGetBreak($id): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Get Break

Get a break by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.

try {
    $result = $apiInstance->timeTrackingGetBreak($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingGetBreak: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingGetBreakPolicy()`

```php
timeTrackingGetBreakPolicy($id, $include_counts): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1
```

Get Break Policy

Get a break policy by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$include_counts = false; // bool | Include employee and break counts

try {
    $result = $apiInstance->timeTrackingGetBreakPolicy($id, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingGetBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingListBreakAssessments()`

```php
timeTrackingListBreakAssessments($offset, $limit, $filter): \BhrSdk\Model\TimeTrackingPaginatedBreakAssessmentsResponseV1
```

List Break Assessments

Retrieves a list of time tracking break assessments, with optional filtering and pagination.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve
$filter = ''; // string | Filter by an OData (Open Data Protocol) v4 specification

try {
    $result = $apiInstance->timeTrackingListBreakAssessments($offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListBreakAssessments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |
| **filter** | **string**| Filter by an OData (Open Data Protocol) v4 specification | [optional] [default to &#39;&#39;] |

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

## `timeTrackingListBreakPolicies()`

```php
timeTrackingListBreakPolicies($offset, $limit, $filter, $include_counts): \BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1
```

List Break Policies

Lists all break policies, with optional filtering.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve
$filter = ''; // string | Filter by an OData (Open Data Protocol) v4 specification
$include_counts = false; // bool | Include employee and break counts

try {
    $result = $apiInstance->timeTrackingListBreakPolicies($offset, $limit, $filter, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListBreakPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |
| **filter** | **string**| Filter by an OData (Open Data Protocol) v4 specification | [optional] [default to &#39;&#39;] |
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

## `timeTrackingListBreakPolicyBreaks()`

```php
timeTrackingListBreakPolicyBreaks($id, $offset, $limit, $filter): \BhrSdk\Model\TimeTrackingPaginatedBreaksResponseV1
```

List Breaks for Break Policy

List breaks for a specific break policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve
$filter = ''; // string | Filter by an OData (Open Data Protocol) v4 specification

try {
    $result = $apiInstance->timeTrackingListBreakPolicyBreaks($id, $offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListBreakPolicyBreaks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **offset** | **int**| The offset of items to retrieve | [optional] [default to 0] |
| **limit** | **int**| The maximum items to retrieve | [optional] [default to 100] |
| **filter** | **string**| Filter by an OData (Open Data Protocol) v4 specification | [optional] [default to &#39;&#39;] |

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

## `timeTrackingListBreakPolicyEmployees()`

```php
timeTrackingListBreakPolicyEmployees($id, $offset, $limit): \BhrSdk\Model\TimeTrackingPaginatedBreakPolicyEmployeesResponseV1
```

List Break Policy Employees

Retrieves employees assigned to a specific break policy.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$offset = 0; // int | The offset of items to retrieve
$limit = 100; // int | The maximum items to retrieve

try {
    $result = $apiInstance->timeTrackingListBreakPolicyEmployees($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingListEmployeeBreakAvailabilities()`

```php
timeTrackingListEmployeeBreakAvailabilities($id, $effective): \BhrSdk\Model\TimeTrackingTimeTrackingBreakAvailabilityV1[]
```

List Employee Break Availability

Retrieves break availability information for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The employee ID.
$effective = 2025-12-15T14:30:00; // string | The employee's local time that should be used to calculate availability. Defaults to the current time. Must be in Y-m-d\\TH:i:s format (no timezone offset).

try {
    $result = $apiInstance->timeTrackingListEmployeeBreakAvailabilities($id, $effective);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListEmployeeBreakAvailabilities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The employee ID. | |
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

## `timeTrackingListEmployeeBreakPolicies()`

```php
timeTrackingListEmployeeBreakPolicies($id, $offset, $limit): \BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1
```

List Employee Break Policies

Retrieves break policies assigned to a specific employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The employee ID.
$offset = 0; // int | The number of items to skip before starting to collect the result set. Minimum 0. Defaults to 0.
$limit = 100; // int | The maximum number of items to return. Must be between 0 and 500. Defaults to 100.

try {
    $result = $apiInstance->timeTrackingListEmployeeBreakPolicies($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingListEmployeeBreakPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The employee ID. | |
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

## `timeTrackingReplaceBreaksForBreakPolicy()`

```php
timeTrackingReplaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1[]
```

Replace Breaks for Break Policy

Replace all breaks for a break policy. Breaks with an ID will be updated, breaks without an ID will be created. Existing breaks not in the request will be soft deleted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_create_or_update_time_tracking_break_without_policy_v1 = array(new \BhrSdk\Model\TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1()); // \BhrSdk\Model\TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1[]

try {
    $result = $apiInstance->timeTrackingReplaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingReplaceBreaksForBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingSetBreakPolicyEmployees()`

```php
timeTrackingSetBreakPolicyEmployees($id, $time_tracking_set_break_policy_employees_request)
```

Set Employees for Break Policy

Sets the employee assignments for a break policy. This replaces all existing assignments with the provided list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_set_break_policy_employees_request = new \BhrSdk\Model\TimeTrackingSetBreakPolicyEmployeesRequest(); // \BhrSdk\Model\TimeTrackingSetBreakPolicyEmployeesRequest

try {
    $apiInstance->timeTrackingSetBreakPolicyEmployees($id, $time_tracking_set_break_policy_employees_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingSetBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_set_break_policy_employees_request** | [**\BhrSdk\Model\TimeTrackingSetBreakPolicyEmployeesRequest**](../Model/TimeTrackingSetBreakPolicyEmployeesRequest.md)|  | |

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

## `timeTrackingSyncBreakPolicy()`

```php
timeTrackingSyncBreakPolicy($id, $time_tracking_sync_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyWithRelationsV1
```

Sync Break Policy

Sync a break policy by ID. This will synchronize the break policy with the provided data, replacing existing data, including related data (breaks and assignments).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_sync_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingSyncTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingSyncTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->timeTrackingSyncBreakPolicy($id, $time_tracking_sync_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingSyncBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingUnassignEmployeesFromBreakPolicy()`

```php
timeTrackingUnassignEmployeesFromBreakPolicy($id, $time_tracking_unassign_employees_from_break_policy_request)
```

Unassign Employees from Break Policy

Unassigns the specified employees from a break policy. Removes employee assignments from the policy without affecting the policy itself or other assigned employees. Employees can only be unassigned from policies that are not assigned to all employees.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_unassign_employees_from_break_policy_request = new \BhrSdk\Model\TimeTrackingUnassignEmployeesFromBreakPolicyRequest(); // \BhrSdk\Model\TimeTrackingUnassignEmployeesFromBreakPolicyRequest

try {
    $apiInstance->timeTrackingUnassignEmployeesFromBreakPolicy($id, $time_tracking_unassign_employees_from_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingUnassignEmployeesFromBreakPolicy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The break policy ID. | |
| **time_tracking_unassign_employees_from_break_policy_request** | [**\BhrSdk\Model\TimeTrackingUnassignEmployeesFromBreakPolicyRequest**](../Model/TimeTrackingUnassignEmployeesFromBreakPolicyRequest.md)|  | |

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

## `timeTrackingUpdateBreak()`

```php
timeTrackingUpdateBreak($id, $time_tracking_update_time_tracking_break_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1
```

Update Break

Update a break by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break ID.
$time_tracking_update_time_tracking_break_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakV1

try {
    $result = $apiInstance->timeTrackingUpdateBreak($id, $time_tracking_update_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingUpdateBreak: ', $e->getMessage(), PHP_EOL;
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

## `timeTrackingUpdateBreakPolicy()`

```php
timeTrackingUpdateBreakPolicy($id, $time_tracking_update_time_tracking_break_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakPolicyV1
```

Update Break Policy

Update a break policy by ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The break policy ID.
$time_tracking_update_time_tracking_break_policy_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakPolicyV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingBreakPolicyV1

try {
    $result = $apiInstance->timeTrackingUpdateBreakPolicy($id, $time_tracking_update_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->timeTrackingUpdateBreakPolicy: ', $e->getMessage(), PHP_EOL;
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
