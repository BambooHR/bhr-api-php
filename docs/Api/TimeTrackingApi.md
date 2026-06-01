# BhrSdk\TimeTrackingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**assignEmployeesToBreakPolicy()**](TimeTrackingApi.md#assignEmployeesToBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/assign | Assign Employees to Break Policy |
| [**createBreak()**](TimeTrackingApi.md#createBreak) | **POST** /api/v1/time-tracking/break-policies/{id}/breaks | Create Break |
| [**createBreakPolicy()**](TimeTrackingApi.md#createBreakPolicy) | **POST** /api/v1/time-tracking/break-policies | Create Break Policy |
| [**createOrUpdateTimesheetClockEntries()**](TimeTrackingApi.md#createOrUpdateTimesheetClockEntries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries |
| [**createOrUpdateTimesheetHourEntries()**](TimeTrackingApi.md#createOrUpdateTimesheetHourEntries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries |
| [**createProject()**](TimeTrackingApi.md#createProject) | **POST** /api/v1/time-tracking/projects | Create Time Tracking Project |
| [**createProjectTask()**](TimeTrackingApi.md#createProjectTask) | **POST** /api/v1/time-tracking/projects/{projectId}/tasks | Create Time Tracking Project Task |
| [**createTimeTrackingProject()**](TimeTrackingApi.md#createTimeTrackingProject) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project |
| [**createTimesheetClockInEntry()**](TimeTrackingApi.md#createTimesheetClockInEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry |
| [**createTimesheetClockOutEntry()**](TimeTrackingApi.md#createTimesheetClockOutEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry |
| [**deleteBreak()**](TimeTrackingApi.md#deleteBreak) | **DELETE** /api/v1/time-tracking/breaks/{id} | Delete Break |
| [**deleteBreakPolicy()**](TimeTrackingApi.md#deleteBreakPolicy) | **DELETE** /api/v1/time-tracking/break-policies/{id} | Delete Break Policy |
| [**deleteProject()**](TimeTrackingApi.md#deleteProject) | **DELETE** /api/v1/time-tracking/projects/{id} | Delete Time Tracking Project |
| [**deleteTask()**](TimeTrackingApi.md#deleteTask) | **DELETE** /api/v1/time-tracking/tasks/{id} | Delete Time Tracking Task |
| [**deleteTimesheetClockEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetClockEntriesViaPost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries |
| [**deleteTimesheetHourEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetHourEntriesViaPost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**getBreak()**](TimeTrackingApi.md#getBreak) | **GET** /api/v1/time-tracking/breaks/{id} | Get Break |
| [**getBreakPolicy()**](TimeTrackingApi.md#getBreakPolicy) | **GET** /api/v1/time-tracking/break-policies/{id} | Get Break Policy |
| [**getBreakPolicySuggestions()**](TimeTrackingApi.md#getBreakPolicySuggestions) | **POST** /api/v1/time-tracking/break-policies/suggestions | Get Break Policy Suggestions |
| [**getProject()**](TimeTrackingApi.md#getProject) | **GET** /api/v1/time-tracking/projects/{projectId} | Get Time Tracking Project |
| [**getTask()**](TimeTrackingApi.md#getTask) | **GET** /api/v1/time-tracking/tasks/{id} | Get Time Tracking Task |
| [**listBreakAssessments()**](TimeTrackingApi.md#listBreakAssessments) | **GET** /api/v1/time-tracking/break-assessments | List Break Assessments |
| [**listBreakPolicies()**](TimeTrackingApi.md#listBreakPolicies) | **GET** /api/v1/time-tracking/break-policies | List Break Policies |
| [**listBreakPolicyBreaks()**](TimeTrackingApi.md#listBreakPolicyBreaks) | **GET** /api/v1/time-tracking/break-policies/{id}/breaks | List Breaks for Break Policy |
| [**listBreakPolicyEmployees()**](TimeTrackingApi.md#listBreakPolicyEmployees) | **GET** /api/v1/time-tracking/break-policies/{id}/employees | List Break Policy Employees |
| [**listEmployeeBreakAvailabilities()**](TimeTrackingApi.md#listEmployeeBreakAvailabilities) | **GET** /api/v1/time-tracking/employees/{id}/break-availabilities | List Employee Break Availabilities |
| [**listEmployeeBreakPolicies()**](TimeTrackingApi.md#listEmployeeBreakPolicies) | **GET** /api/v1/time-tracking/employees/{id}/break-policies | List Employee Break Policies |
| [**listProjectTasks()**](TimeTrackingApi.md#listProjectTasks) | **GET** /api/v1/time-tracking/projects/{projectId}/tasks | List Time Tracking Project Tasks |
| [**listProjects()**](TimeTrackingApi.md#listProjects) | **GET** /api/v1/time-tracking/projects | List Time Tracking Projects |
| [**listTimesheetEntries()**](TimeTrackingApi.md#listTimesheetEntries) | **GET** /api/v1/time_tracking/timesheet_entries | List Timesheet Entries |
| [**replaceBreaksForBreakPolicy()**](TimeTrackingApi.md#replaceBreaksForBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/breaks | Replace Breaks for Break Policy |
| [**setBreakPolicyEmployees()**](TimeTrackingApi.md#setBreakPolicyEmployees) | **PUT** /api/v1/time-tracking/break-policies/{id}/assign | Set Employees for Break Policy |
| [**syncBreakPolicy()**](TimeTrackingApi.md#syncBreakPolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/sync | Sync Break Policy |
| [**unassignEmployeesFromBreakPolicy()**](TimeTrackingApi.md#unassignEmployeesFromBreakPolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/unassign | Unassign Employees from Break Policy |
| [**updateBreak()**](TimeTrackingApi.md#updateBreak) | **PATCH** /api/v1/time-tracking/breaks/{id} | Update Break |
| [**updateBreakPolicy()**](TimeTrackingApi.md#updateBreakPolicy) | **PATCH** /api/v1/time-tracking/break-policies/{id} | Update Break Policy |
| [**updateProject()**](TimeTrackingApi.md#updateProject) | **PATCH** /api/v1/time-tracking/projects/{id} | Update Time Tracking Project |
| [**updateTask()**](TimeTrackingApi.md#updateTask) | **PATCH** /api/v1/time-tracking/tasks/{id} | Update Time Tracking Task |


## `assignEmployeesToBreakPolicy()`

```php
assignEmployeesToBreakPolicy($id, $assign_employees_to_break_policy_request)
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
$assign_employees_to_break_policy_request = new \BhrSdk\Model\AssignEmployeesToBreakPolicyRequest(); // \BhrSdk\Model\AssignEmployeesToBreakPolicyRequest

try {
    $apiInstance->assignEmployeesToBreakPolicy($id, $assign_employees_to_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->assignEmployeesToBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

Creates a new break and associates it with the specified break policy.

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
    $result = $apiInstance->createBreak($id, $time_tracking_create_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createBreak: ', $e->getMessage(), PHP_EOL;
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
    $result = $apiInstance->createBreakPolicy($time_tracking_create_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `createOrUpdateTimesheetClockEntries()`

```php
createOrUpdateTimesheetClockEntries($clock_entries_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer[]
```

Create or Update Timesheet Clock Entries

Creates or updates timesheet clock entries in bulk. Entries with an existing ID are updated; entries without an ID are created.

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
    $result = $apiInstance->createOrUpdateTimesheetClockEntries($clock_entries_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createOrUpdateTimesheetClockEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **clock_entries_schema** | [**\BhrSdk\Model\ClockEntriesSchema**](../Model/ClockEntriesSchema.md)|  | |

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

## `createOrUpdateTimesheetHourEntries()`

```php
createOrUpdateTimesheetHourEntries($hour_entries_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer[]
```

Create or Update Timesheet Hour Entries

Creates or updates timesheet hour entries in bulk. Entries with an existing ID are updated; entries without an ID are created.

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
    $result = $apiInstance->createOrUpdateTimesheetHourEntries($hour_entries_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createOrUpdateTimesheetHourEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hour_entries_request_schema** | [**\BhrSdk\Model\HourEntriesRequestSchema**](../Model/HourEntriesRequestSchema.md)|  | |

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

## `createProject()`

```php
createProject($project_create_time_tracking_project_v1): \BhrSdk\Model\ProjectTimeTrackingProjectV1
```

Create Time Tracking Project

Creates a new time tracking project. Returns the newly created project resource on success.

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
$project_create_time_tracking_project_v1 = new \BhrSdk\Model\ProjectCreateTimeTrackingProjectV1(); // \BhrSdk\Model\ProjectCreateTimeTrackingProjectV1

try {
    $result = $apiInstance->createProject($project_create_time_tracking_project_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_create_time_tracking_project_v1** | [**\BhrSdk\Model\ProjectCreateTimeTrackingProjectV1**](../Model/ProjectCreateTimeTrackingProjectV1.md)|  | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingProjectV1**](../Model/ProjectTimeTrackingProjectV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createProjectTask()`

```php
createProjectTask($project_id, $project_create_time_tracking_project_task_v1): \BhrSdk\Model\ProjectTimeTrackingTaskV1
```

Create Time Tracking Project Task

Creates a new task on the specified time tracking project.

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
$project_id = 'project_id_example'; // string | The project ID.
$project_create_time_tracking_project_task_v1 = new \BhrSdk\Model\ProjectCreateTimeTrackingProjectTaskV1(); // \BhrSdk\Model\ProjectCreateTimeTrackingProjectTaskV1

try {
    $result = $apiInstance->createProjectTask($project_id, $project_create_time_tracking_project_task_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createProjectTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **string**| The project ID. | |
| **project_create_time_tracking_project_task_v1** | [**\BhrSdk\Model\ProjectCreateTimeTrackingProjectTaskV1**](../Model/ProjectCreateTimeTrackingProjectTaskV1.md)|  | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingTaskV1**](../Model/ProjectTimeTrackingTaskV1.md)

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

Creates a new time tracking project. Returns the created project with its ID and tasks. When `allowAllEmployees` is false, the response also includes the `employeeIds` array of employees who have access.  By default, all employees can log time to the project (`allowAllEmployees` defaults to true) and the project is billable (`billable` defaults to true). Set `hasTasks` to true to enable task-level tracking and provide a `tasks` array — at least one task is required when `hasTasks` is true. Project and task names must be unique and may not exceed 50 characters. When `allowAllEmployees` is false, provide `employeeIds` to restrict access to specific employees.

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
| **project_create_request_schema** | [**\BhrSdk\Model\ProjectCreateRequestSchema**](../Model/ProjectCreateRequestSchema.md)|  | |

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

## `createTimesheetClockInEntry()`

```php
createTimesheetClockInEntry($employee_id, $clock_in_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer
```

Create Timesheet Clock-In Entry

Clocks in an employee at the current server time. To record a historical clock-in, provide a `date`, `start` (HH:MM, 24-hour format), and `timezone`. You can optionally associate the entry with `projectId`, `taskId` (requires `projectId`), `breakId`, and a `note`.

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
    $result = $apiInstance->createTimesheetClockInEntry($employee_id, $clock_in_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimesheetClockInEntry: ', $e->getMessage(), PHP_EOL;
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

## `createTimesheetClockOutEntry()`

```php
createTimesheetClockOutEntry($employee_id, $clock_out_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer
```

Create Timesheet Clock-Out Entry

Clocks out a currently clocked-in employee at the current server time. To record a historical clock-out, provide a `date`, `end` (HH:MM, 24-hour format), and `timezone`.

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
    $result = $apiInstance->createTimesheetClockOutEntry($employee_id, $clock_out_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimesheetClockOutEntry: ', $e->getMessage(), PHP_EOL;
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

## `deleteBreak()`

```php
deleteBreak($id)
```

Delete Break

Deletes a time tracking break by its UUID. The break is soft-deleted and removed from any break policies it was associated with.

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
    $apiInstance->deleteBreak($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteBreak: ', $e->getMessage(), PHP_EOL;
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

Deletes a break policy by its UUID. Associated breaks and employee assignments are also removed.

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
    $apiInstance->deleteBreakPolicy($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `deleteProject()`

```php
deleteProject($id)
```

Delete Time Tracking Project

Deletes a time tracking project by its ID.

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
$id = 56; // int | The project ID.

try {
    $apiInstance->deleteProject($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The project ID. | |

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

## `deleteTask()`

```php
deleteTask($id)
```

Delete Time Tracking Task

Deletes a time tracking task by its ID.

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
$id = 56; // int | The task ID.

try {
    $apiInstance->deleteTask($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The task ID. | |

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

## `deleteTimesheetClockEntriesViaPost()`

```php
deleteTimesheetClockEntriesViaPost($clock_entry_ids_schema)
```

Delete Timesheet Clock Entries

Deletes one or more timesheet clock entries by their IDs. Delete operations are idempotent; deleting already-removed entries does not require client retries.

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

Deletes one or more timesheet hour entries by their IDs. Delete operations are idempotent; deleting already-removed entries does not require client retries.

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
| **hour_entry_ids_schema** | [**\BhrSdk\Model\HourEntryIdsSchema**](../Model/HourEntryIdsSchema.md)|  | |

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

Retrieves a single time tracking break by its UUID. Returns the full break details including name, duration, paid status, and availability configuration.

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
    $result = $apiInstance->getBreak($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getBreak: ', $e->getMessage(), PHP_EOL;
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

Retrieves a single break policy by its UUID. When includeCounts is enabled, the response includes the number of associated employees and breaks.

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
    $result = $apiInstance->getBreakPolicy($id, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

Uses an AI agent to analyze existing break policies and company context, then returns structured meal and rest break policy recommendations ready for form pre-fill.

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
$get_break_policy_suggestions_request = new \BhrSdk\Model\GetBreakPolicySuggestionsRequest(); // \BhrSdk\Model\GetBreakPolicySuggestionsRequest

try {
    $result = $apiInstance->getBreakPolicySuggestions($get_break_policy_suggestions_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getBreakPolicySuggestions: ', $e->getMessage(), PHP_EOL;
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

## `getProject()`

```php
getProject($project_id): \BhrSdk\Model\ProjectTimeTrackingProjectV1
```

Get Time Tracking Project

Retrieves a single time tracking project by its ID, including the list of employees assigned to it.

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
$project_id = 56; // int | The project ID.

try {
    $result = $apiInstance->getProject($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| The project ID. | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingProjectV1**](../Model/ProjectTimeTrackingProjectV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTask()`

```php
getTask($id): \BhrSdk\Model\ProjectTimeTrackingTaskV1
```

Get Time Tracking Task

Retrieves a single time tracking task by its ID.

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
$id = 56; // int | The task ID.

try {
    $result = $apiInstance->getTask($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The task ID. | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingTaskV1**](../Model/ProjectTimeTrackingTaskV1.md)

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

Returns a paginated list of break assessments. A break assessment records whether an employee complied with their assigned break policy for a given day, along with any violations. Use the `filter` parameter to scope results by employee, date, result, or other fields. Use `offset` and `limit` for pagination; `limit` defaults to 100 and may not exceed 500.

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
$offset = 0; // int | Number of items to skip before returning results. Defaults to 0.
$limit = 100; // int | Maximum number of items to return. Defaults to 100. Maximum is 500.
$filter = ''; // string | OData filter expression applied to break assessments. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `breakId`, `employeeId`, `employeeTimesheetId`, `date`, `result`, `availableYmdt`, `unavailableYmdt`, `expectedDuration`, `recordedDuration`, `durationDifference`, `createdAt`, `updatedAt`. Examples: `employeeId eq 614`, `employeeId in (614, 615, 616)`, `breakId eq 'abc-123' and employeeId eq 614`.

try {
    $result = $apiInstance->listBreakAssessments($offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listBreakAssessments: ', $e->getMessage(), PHP_EOL;
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

Returns a paginated list of all break policies. Supports OData v4 filtering. Use includeCounts to include employee and break counts per policy.

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
$filter = ''; // string | OData filter expression applied to break policies. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `name`, `description`, `allEmployeesAssigned`, `createdAt`, `updatedAt`, `deletedAt`. Examples: `name eq 'Standard Lunch'`, `description eq null`, `allEmployeesAssigned eq true and name ne 'Legacy'`.
$include_counts = false; // bool | Include employee and break counts

try {
    $result = $apiInstance->listBreakPolicies($offset, $limit, $filter, $include_counts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listBreakPolicies: ', $e->getMessage(), PHP_EOL;
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

Returns a paginated list of breaks belonging to the specified break policy. Supports OData v4 filtering.

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
$filter = ''; // string | OData filter expression applied to breaks within the policy. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `name`, `paid`, `duration`, `availabilityType`, `availabilityMinHoursWorked`, `availabilityMaxHoursWorked`, `availabilityStartTime`, `availabilityEndTime`, `createdAt`, `updatedAt`, `deletedAt`. Examples: `name eq 'Lunch'`, `paid eq true`, `paid eq false and name ne 'Quick Break'`.

try {
    $result = $apiInstance->listBreakPolicyBreaks($id, $offset, $limit, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listBreakPolicyBreaks: ', $e->getMessage(), PHP_EOL;
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

Retrieves employees assigned to a specific break policy. If a policy has no assignments, returns HTTP 200 with an empty `data` array.

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
    $result = $apiInstance->listBreakPolicyEmployees($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
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

Retrieves break availability information for an employee. Requires permission to view the target employee in addition to time-tracking-break access.

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
    $result = $apiInstance->listEmployeeBreakAvailabilities($id, $effective);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listEmployeeBreakAvailabilities: ', $e->getMessage(), PHP_EOL;
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

## `listEmployeeBreakPolicies()`

```php
listEmployeeBreakPolicies($id, $offset, $limit): \BhrSdk\Model\TimeTrackingPaginatedBreakPoliciesResponseV1
```

List Employee Break Policies

Retrieves break policies assigned to a specific employee. Requires permission to view the target employee.

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
    $result = $apiInstance->listEmployeeBreakPolicies($id, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listEmployeeBreakPolicies: ', $e->getMessage(), PHP_EOL;
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

## `listProjectTasks()`

```php
listProjectTasks($project_id, $statuses, $page, $page_size): \BhrSdk\Model\ProjectPaginatedTasksResponseV1
```

List Time Tracking Project Tasks

Returns a paginated list of tasks for the specified time tracking project. Tasks are filtered by `statuses[]`, which defaults to `active`.

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
$project_id = 56; // int | The project ID.
$statuses = array('statuses_example'); // string[] | Statuses to include. Defaults to `active` (excludes deleted tasks). Use both values to include active and deleted tasks.
$page = 1; // int | The page number to retrieve (1-indexed).
$page_size = 25; // int | The maximum number of items per page.

try {
    $result = $apiInstance->listProjectTasks($project_id, $statuses, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listProjectTasks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **project_id** | **int**| The project ID. | |
| **statuses** | [**string[]**](../Model/string.md)| Statuses to include. Defaults to &#x60;active&#x60; (excludes deleted tasks). Use both values to include active and deleted tasks. | [optional] |
| **page** | **int**| The page number to retrieve (1-indexed). | [optional] [default to 1] |
| **page_size** | **int**| The maximum number of items per page. | [optional] [default to 25] |

### Return type

[**\BhrSdk\Model\ProjectPaginatedTasksResponseV1**](../Model/ProjectPaginatedTasksResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listProjects()`

```php
listProjects($filter, $sort, $page, $page_size): \BhrSdk\Model\ProjectPaginatedTimeTrackingProjectsResponseV1
```

List Time Tracking Projects

Returns a paginated list of time tracking projects. Supports OData-style `filter` and `sort` query parameters. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 100, max 500).

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `id`, `name`, `billable`, `includeInPayroll`, `allEmployeesAssigned`, `archived`, `createdAt`, `updatedAt`.
$sort = 'sort_example'; // string | Sort expression like `name asc, createdAt desc`. Allowed fields: `name`, `createdAt`, `updatedAt`.
$page = 1; // int | The starting page for pagination. Defaults to 1.
$page_size = 100; // int | The number of items per page. Defaults to 100, maximum 500.

try {
    $result = $apiInstance->listProjects($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listProjects: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;id&#x60;, &#x60;name&#x60;, &#x60;billable&#x60;, &#x60;includeInPayroll&#x60;, &#x60;allEmployeesAssigned&#x60;, &#x60;archived&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] |
| **sort** | **string**| Sort expression like &#x60;name asc, createdAt desc&#x60;. Allowed fields: &#x60;name&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] |
| **page** | **int**| The starting page for pagination. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 100, maximum 500. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\ProjectPaginatedTimeTrackingProjectsResponseV1**](../Model/ProjectPaginatedTimeTrackingProjectsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimesheetEntries()`

```php
listTimesheetEntries($start, $end, $employee_ids): \BhrSdk\Model\EmployeeTimesheetEntryTransformer[]
```

List Timesheet Entries

Returns timesheet entries for all employees, or a filtered subset, within the specified date range. Results include both clock and hour entry types. Dates must fall within the last 365 days and are interpreted in the company timezone.

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
$employee_ids = 1,2,3; // string | A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned. When omitted, entries for all accessible employees are returned.

try {
    $result = $apiInstance->listTimesheetEntries($start, $end, $employee_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimesheetEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days. | |
| **end** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days. | |
| **employee_ids** | **string**| A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned. When omitted, entries for all accessible employees are returned. | [optional] |

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

## `replaceBreaksForBreakPolicy()`

```php
replaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1): \BhrSdk\Model\TimeTrackingTimeTrackingBreakV1[]
```

Replace Breaks for Break Policy

Replace all breaks for a break policy. Breaks with an ID will be updated, breaks without an ID will be created. Existing breaks not in the request will be soft-deleted.

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
    $result = $apiInstance->replaceBreaksForBreakPolicy($id, $time_tracking_create_or_update_time_tracking_break_without_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->replaceBreaksForBreakPolicy: ', $e->getMessage(), PHP_EOL;
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
$set_break_policy_employees_request = new \BhrSdk\Model\SetBreakPolicyEmployeesRequest(); // \BhrSdk\Model\SetBreakPolicyEmployeesRequest

try {
    $apiInstance->setBreakPolicyEmployees($id, $set_break_policy_employees_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->setBreakPolicyEmployees: ', $e->getMessage(), PHP_EOL;
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

Performs a full replacement of a break policy and its related data (breaks and employee assignments). Unlike the partial update endpoint, this replaces the entire policy state with the provided payload, removing any breaks or assignments not included in the request.

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
    $result = $apiInstance->syncBreakPolicy($id, $time_tracking_sync_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->syncBreakPolicy: ', $e->getMessage(), PHP_EOL;
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
$unassign_employees_from_break_policy_request = new \BhrSdk\Model\UnassignEmployeesFromBreakPolicyRequest(); // \BhrSdk\Model\UnassignEmployeesFromBreakPolicyRequest

try {
    $apiInstance->unassignEmployeesFromBreakPolicy($id, $unassign_employees_from_break_policy_request);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->unassignEmployeesFromBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

Partially updates a time tracking break identified by its UUID. Only fields provided in the request body are updated. Returns the updated break on success.

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
    $result = $apiInstance->updateBreak($id, $time_tracking_update_time_tracking_break_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateBreak: ', $e->getMessage(), PHP_EOL;
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

Partially updates a break policy identified by its UUID. Only fields provided in the request body are updated. Returns the updated break policy on success.

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
    $result = $apiInstance->updateBreakPolicy($id, $time_tracking_update_time_tracking_break_policy_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateBreakPolicy: ', $e->getMessage(), PHP_EOL;
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

## `updateProject()`

```php
updateProject($id, $project_update_time_tracking_project_v1): \BhrSdk\Model\ProjectTimeTrackingProjectV1
```

Update Time Tracking Project

Partially updates a time tracking project identified by its ID. Only fields provided in the request body are updated; omitted fields are left unchanged.

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
$id = 56; // int | The project ID.
$project_update_time_tracking_project_v1 = new \BhrSdk\Model\ProjectUpdateTimeTrackingProjectV1(); // \BhrSdk\Model\ProjectUpdateTimeTrackingProjectV1

try {
    $result = $apiInstance->updateProject($id, $project_update_time_tracking_project_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The project ID. | |
| **project_update_time_tracking_project_v1** | [**\BhrSdk\Model\ProjectUpdateTimeTrackingProjectV1**](../Model/ProjectUpdateTimeTrackingProjectV1.md)|  | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingProjectV1**](../Model/ProjectTimeTrackingProjectV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTask()`

```php
updateTask($id, $project_update_time_tracking_project_task_v1): \BhrSdk\Model\ProjectTimeTrackingTaskV1
```

Update Time Tracking Task

Partially updates a time tracking task identified by its ID. Only fields provided in the request body are updated; at least one field must be provided.

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
$id = 56; // int | The task ID.
$project_update_time_tracking_project_task_v1 = new \BhrSdk\Model\ProjectUpdateTimeTrackingProjectTaskV1(); // \BhrSdk\Model\ProjectUpdateTimeTrackingProjectTaskV1

try {
    $result = $apiInstance->updateTask($id, $project_update_time_tracking_project_task_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateTask: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The task ID. | |
| **project_update_time_tracking_project_task_v1** | [**\BhrSdk\Model\ProjectUpdateTimeTrackingProjectTaskV1**](../Model/ProjectUpdateTimeTrackingProjectTaskV1.md)|  | |

### Return type

[**\BhrSdk\Model\ProjectTimeTrackingTaskV1**](../Model/ProjectTimeTrackingTaskV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
