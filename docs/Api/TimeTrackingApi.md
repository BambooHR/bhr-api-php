# BhrSdk\TimeTrackingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**approveTimesheet()**](TimeTrackingApi.md#approveTimesheet) | **POST** /api/v1/time-tracking/timesheet-approvals | Approve Timesheet |
| [**bulkUpsertTimeTrackingEmployeeEnrollments()**](TimeTrackingApi.md#bulkUpsertTimeTrackingEmployeeEnrollments) | **POST** /api/v1/time-tracking/employees/bulk-upsert | Bulk Upsert Employee Enrollments |
| [**clockIn()**](TimeTrackingApi.md#clockIn) | **POST** /api/v1/time-tracking/clock-ins | Clock In |
| [**clockOut()**](TimeTrackingApi.md#clockOut) | **POST** /api/v1/time-tracking/clock-outs | Clock Out |
| [**createClockEntry()**](TimeTrackingApi.md#createClockEntry) | **POST** /api/v1/time-tracking/clock-entries | Create Clock Entry |
| [**createHourEntry()**](TimeTrackingApi.md#createHourEntry) | **POST** /api/v1/time-tracking/hour-entries | Create Hour Entry |
| [**createOrUpdateTimesheetClockEntries()**](TimeTrackingApi.md#createOrUpdateTimesheetClockEntries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries |
| [**createOrUpdateTimesheetHourEntries()**](TimeTrackingApi.md#createOrUpdateTimesheetHourEntries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries |
| [**createProjectTask()**](TimeTrackingApi.md#createProjectTask) | **POST** /api/v1/time-tracking/projects/{projectId}/tasks | Create Time Tracking Project Task |
| [**createShiftDifferential()**](TimeTrackingApi.md#createShiftDifferential) | **POST** /api/v1/time-tracking/shift-differentials | Create Time Tracking Shift Differential |
| [**createTimeTrackingConfiguration()**](TimeTrackingApi.md#createTimeTrackingConfiguration) | **POST** /api/v1/time-tracking/configurations | Create Configuration |
| [**createTimeTrackingProject()**](TimeTrackingApi.md#createTimeTrackingProject) | **POST** /api/v1/time-tracking/projects | Create Time Tracking Project |
| [**createTimeTrackingProjectLegacy()**](TimeTrackingApi.md#createTimeTrackingProjectLegacy) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project (Legacy) |
| [**createTimesheetClockInEntry()**](TimeTrackingApi.md#createTimesheetClockInEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry |
| [**createTimesheetClockOutEntry()**](TimeTrackingApi.md#createTimesheetClockOutEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry |
| [**deleteClockEntry()**](TimeTrackingApi.md#deleteClockEntry) | **DELETE** /api/v1/time-tracking/clock-entries/{id} | Delete Clock Entry |
| [**deleteHourEntry()**](TimeTrackingApi.md#deleteHourEntry) | **DELETE** /api/v1/time-tracking/hour-entries/{id} | Delete Hour Entry |
| [**deleteProject()**](TimeTrackingApi.md#deleteProject) | **DELETE** /api/v1/time-tracking/projects/{id} | Delete Time Tracking Project |
| [**deleteShiftDifferential()**](TimeTrackingApi.md#deleteShiftDifferential) | **DELETE** /api/v1/time-tracking/shift-differentials/{id} | Delete Time Tracking Shift Differential |
| [**deleteTask()**](TimeTrackingApi.md#deleteTask) | **DELETE** /api/v1/time-tracking/tasks/{id} | Delete Time Tracking Task |
| [**deleteTimeTrackingConfiguration()**](TimeTrackingApi.md#deleteTimeTrackingConfiguration) | **DELETE** /api/v1/time-tracking/configurations/{id} | Delete Configuration |
| [**deleteTimeTrackingKiosk()**](TimeTrackingApi.md#deleteTimeTrackingKiosk) | **DELETE** /api/v1/time-tracking/kiosks/{id} | Delete Time Tracking Kiosk |
| [**deleteTimesheetClockEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetClockEntriesViaPost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries |
| [**deleteTimesheetHourEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetHourEntriesViaPost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**getClockEntry()**](TimeTrackingApi.md#getClockEntry) | **GET** /api/v1/time-tracking/clock-entries/{id} | Get Clock Entry |
| [**getHourEntry()**](TimeTrackingApi.md#getHourEntry) | **GET** /api/v1/time-tracking/hour-entries/{id} | Get Hour Entry |
| [**getProject()**](TimeTrackingApi.md#getProject) | **GET** /api/v1/time-tracking/projects/{id} | Get Time Tracking Project |
| [**getShiftDifferential()**](TimeTrackingApi.md#getShiftDifferential) | **GET** /api/v1/time-tracking/shift-differentials/{id} | Get Time Tracking Shift Differential |
| [**getTask()**](TimeTrackingApi.md#getTask) | **GET** /api/v1/time-tracking/tasks/{id} | Get Time Tracking Task |
| [**getTimeTrackingConfiguration()**](TimeTrackingApi.md#getTimeTrackingConfiguration) | **GET** /api/v1/time-tracking/configurations/{id} | Get Configuration |
| [**getTimeTrackingEmployeeEnrollment()**](TimeTrackingApi.md#getTimeTrackingEmployeeEnrollment) | **GET** /api/v1/time-tracking/employees/{employeeId} | Get Employee Enrollment |
| [**getTimeTrackingKiosk()**](TimeTrackingApi.md#getTimeTrackingKiosk) | **GET** /api/v1/time-tracking/kiosks/{id} | Get Time Tracking Kiosk |
| [**getTimeTrackingTimeClock()**](TimeTrackingApi.md#getTimeTrackingTimeClock) | **GET** /api/v1/time-tracking/time-clocks/{id} | Get Time Tracking Time Clock |
| [**getTimesheet()**](TimeTrackingApi.md#getTimesheet) | **GET** /api/v1/time-tracking/timesheets/{id} | Get Timesheet |
| [**getTimesheetSummary()**](TimeTrackingApi.md#getTimesheetSummary) | **GET** /api/v1/time-tracking/timesheets/{id}/summary | Get Timesheet Summary |
| [**listClockEntries()**](TimeTrackingApi.md#listClockEntries) | **GET** /api/v1/time-tracking/clock-entries | List Clock Entries |
| [**listHourEntries()**](TimeTrackingApi.md#listHourEntries) | **GET** /api/v1/time-tracking/hour-entries | List Hour Entries |
| [**listProjectTasks()**](TimeTrackingApi.md#listProjectTasks) | **GET** /api/v1/time-tracking/projects/{projectId}/tasks | List Time Tracking Project Tasks |
| [**listProjects()**](TimeTrackingApi.md#listProjects) | **GET** /api/v1/time-tracking/projects | List Time Tracking Projects |
| [**listShiftDifferentials()**](TimeTrackingApi.md#listShiftDifferentials) | **GET** /api/v1/time-tracking/shift-differentials | List Time Tracking Shift Differentials |
| [**listTimeTrackingConfigurations()**](TimeTrackingApi.md#listTimeTrackingConfigurations) | **GET** /api/v1/time-tracking/configurations | List Configurations |
| [**listTimeTrackingEmployees()**](TimeTrackingApi.md#listTimeTrackingEmployees) | **GET** /api/v1/time-tracking/employees | List Enrolled Employees |
| [**listTimeTrackingKiosks()**](TimeTrackingApi.md#listTimeTrackingKiosks) | **GET** /api/v1/time-tracking/kiosks | List Time Tracking Kiosks |
| [**listTimeTrackingTimeClocks()**](TimeTrackingApi.md#listTimeTrackingTimeClocks) | **GET** /api/v1/time-tracking/time-clocks | List Time Tracking Time Clocks |
| [**listTimesheetEntries()**](TimeTrackingApi.md#listTimesheetEntries) | **GET** /api/v1/time_tracking/timesheet_entries | List Timesheet Entries |
| [**listTimesheets()**](TimeTrackingApi.md#listTimesheets) | **GET** /api/v1/time-tracking/timesheets | List Timesheets |
| [**updateClockEntry()**](TimeTrackingApi.md#updateClockEntry) | **PATCH** /api/v1/time-tracking/clock-entries/{id} | Update Clock Entry |
| [**updateHourEntry()**](TimeTrackingApi.md#updateHourEntry) | **PATCH** /api/v1/time-tracking/hour-entries/{id} | Update Hour Entry |
| [**updateProject()**](TimeTrackingApi.md#updateProject) | **PATCH** /api/v1/time-tracking/projects/{id} | Update Time Tracking Project |
| [**updateShiftDifferential()**](TimeTrackingApi.md#updateShiftDifferential) | **PATCH** /api/v1/time-tracking/shift-differentials/{id} | Update Time Tracking Shift Differential |
| [**updateTask()**](TimeTrackingApi.md#updateTask) | **PATCH** /api/v1/time-tracking/tasks/{id} | Update Time Tracking Task |
| [**updateTimeTrackingConfiguration()**](TimeTrackingApi.md#updateTimeTrackingConfiguration) | **PATCH** /api/v1/time-tracking/configurations/{id} | Update Configuration |
| [**updateTimeTrackingEmployeeEnrollment()**](TimeTrackingApi.md#updateTimeTrackingEmployeeEnrollment) | **PATCH** /api/v1/time-tracking/employees/{employeeId} | Update Employee Enrollment |
| [**updateTimeTrackingKiosk()**](TimeTrackingApi.md#updateTimeTrackingKiosk) | **PATCH** /api/v1/time-tracking/kiosks/{id} | Update Time Tracking Kiosk |
| [**updateTimeTrackingTimeClock()**](TimeTrackingApi.md#updateTimeTrackingTimeClock) | **PATCH** /api/v1/time-tracking/time-clocks/{id} | Update Time Tracking Time Clock |


## `approveTimesheet()`

```php
approveTimesheet($approve_timesheet_request): \BhrSdk\Model\TimeTrackingTimesheetV1
```

Approve Timesheet

Approves a timesheet (process resource). Only a timesheet whose derived `status` is `PENDING_APPROVAL` can be approved; approving an already-approved or not-yet-open timesheet returns 409. Returns the updated timesheet with `status` `APPROVED`.  OAuth Scopes: time_tracking:timesheets.write

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
$approve_timesheet_request = new \BhrSdk\Model\ApproveTimesheetRequest(); // \BhrSdk\Model\ApproveTimesheetRequest

try {
    $result = $apiInstance->approveTimesheet($approve_timesheet_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->approveTimesheet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **approve_timesheet_request** | [**\BhrSdk\Model\ApproveTimesheetRequest**](../Model/ApproveTimesheetRequest.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimesheetV1**](../Model/TimeTrackingTimesheetV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `bulkUpsertTimeTrackingEmployeeEnrollments()`

```php
bulkUpsertTimeTrackingEmployeeEnrollments($time_tracking_bulk_upsert_employee_time_tracking_data_record_v1, $idempotency_key, $atomic): \BhrSdk\Model\TimeTrackingBulkUpsertEmployeeTimeTrackingDataAcceptedV1
```

Bulk Upsert Employee Enrollments

Bulk enables, disables, or reassigns employee enrollments. The body is a top-level JSON array of between 1 and 1000 upsert records; each record requires `employeeId` and applies the same merge-patch semantics as the single-employee PATCH. Request-level validation (payload shape, record cap, missing `employeeId`) runs synchronously; the records themselves are applied asynchronously, so the response is 202 with a `requestId` for log correlation rather than the resulting enrollments. Confirm the final state by reading the enrollments back through `GET /api/v1/time-tracking/employees`. Per-record processing errors, such as an unknown `employeeId` or `configurationId`, do not surface in the response. Send `atomic=true` to commit the whole batch as one unit instead, in which case any per-record failure aborts the batch and returns 422 with nothing applied.  OAuth Scopes: time_tracking:employees.write

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
$time_tracking_bulk_upsert_employee_time_tracking_data_record_v1 = array(new \BhrSdk\Model\TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1()); // \BhrSdk\Model\TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1[]
$idempotency_key = 'idempotency_key_example'; // string | Optional client-supplied key for safe retries. Replaying the same key with the same body and the same `atomic` mode returns the original response; reusing it with either changed is a conflict.
$atomic = false; // bool | When true, the whole batch is committed as a single transaction and any per-record failure returns 422 with nothing applied. Defaults to false, which keeps the successful records and silently drops the failing ones.

try {
    $result = $apiInstance->bulkUpsertTimeTrackingEmployeeEnrollments($time_tracking_bulk_upsert_employee_time_tracking_data_record_v1, $idempotency_key, $atomic);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->bulkUpsertTimeTrackingEmployeeEnrollments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_bulk_upsert_employee_time_tracking_data_record_v1** | [**\BhrSdk\Model\TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1[]**](../Model/TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1.md)|  | |
| **idempotency_key** | **string**| Optional client-supplied key for safe retries. Replaying the same key with the same body and the same &#x60;atomic&#x60; mode returns the original response; reusing it with either changed is a conflict. | [optional] |
| **atomic** | **bool**| When true, the whole batch is committed as a single transaction and any per-record failure returns 422 with nothing applied. Defaults to false, which keeps the successful records and silently drops the failing ones. | [optional] [default to false] |

### Return type

[**\BhrSdk\Model\TimeTrackingBulkUpsertEmployeeTimeTrackingDataAcceptedV1**](../Model/TimeTrackingBulkUpsertEmployeeTimeTrackingDataAcceptedV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `clockIn()`

```php
clockIn($time_tracking_create_clock_in_v1): \BhrSdk\Model\TimeTrackingClockEntryV1
```

Clock In

Clocks an employee in at the current server time, creating an open clock entry (`end: null`). Proxy clock-in for a different employee requires `time_tracking:timesheets.write` scope plus permission to manage the target employee's time.  OAuth Scopes: time_tracking:timesheets.write

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
$time_tracking_create_clock_in_v1 = new \BhrSdk\Model\TimeTrackingCreateClockInV1(); // \BhrSdk\Model\TimeTrackingCreateClockInV1

try {
    $result = $apiInstance->clockIn($time_tracking_create_clock_in_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->clockIn: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_create_clock_in_v1** | [**\BhrSdk\Model\TimeTrackingCreateClockInV1**](../Model/TimeTrackingCreateClockInV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingClockEntryV1**](../Model/TimeTrackingClockEntryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `clockOut()`

```php
clockOut($time_tracking_create_clock_out_v1): \BhrSdk\Model\TimeTrackingClockEntryV1
```

Clock Out

Clocks an employee out at the current server time, closing the employee's open clock entry (`end` set, `endSource: USER`). Proxy clock-out for a different employee requires `time_tracking:timesheets.write` scope plus permission to manage the target employee's time.  OAuth Scopes: time_tracking:timesheets.write

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
$time_tracking_create_clock_out_v1 = new \BhrSdk\Model\TimeTrackingCreateClockOutV1(); // \BhrSdk\Model\TimeTrackingCreateClockOutV1

try {
    $result = $apiInstance->clockOut($time_tracking_create_clock_out_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->clockOut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_create_clock_out_v1** | [**\BhrSdk\Model\TimeTrackingCreateClockOutV1**](../Model/TimeTrackingCreateClockOutV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingClockEntryV1**](../Model/TimeTrackingClockEntryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createClockEntry()`

```php
createClockEntry($clock_entry_create_clock_entry_v1): \BhrSdk\Model\TimeTrackingClockEntryV1
```

Create Clock Entry

Manually creates a time tracking clock entry (corrections, retroactive entry). Distinct from the real-time clock-in process resource. The parent daily entry and timesheet are resolved (and created if needed) from `start` + `timezone`; the entry is rejected with 409 when the resolved timesheet's type does not accept clock entries. Geolocation is persisted only when the employee's configuration has it enabled.  OAuth Scopes: time_tracking:timesheets.write

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
$clock_entry_create_clock_entry_v1 = new \BhrSdk\Model\ClockEntryCreateClockEntryV1(); // \BhrSdk\Model\ClockEntryCreateClockEntryV1

try {
    $result = $apiInstance->createClockEntry($clock_entry_create_clock_entry_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createClockEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **clock_entry_create_clock_entry_v1** | [**\BhrSdk\Model\ClockEntryCreateClockEntryV1**](../Model/ClockEntryCreateClockEntryV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingClockEntryV1**](../Model/TimeTrackingClockEntryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createHourEntry()`

```php
createHourEntry($hour_entry_create_hour_entry_v1): \BhrSdk\Model\TimeTrackingHourEntryV1
```

Create Hour Entry

Creates a new time tracking hour entry.  OAuth Scopes: time_tracking:timesheets.write

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
$hour_entry_create_hour_entry_v1 = new \BhrSdk\Model\HourEntryCreateHourEntryV1(); // \BhrSdk\Model\HourEntryCreateHourEntryV1

try {
    $result = $apiInstance->createHourEntry($hour_entry_create_hour_entry_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createHourEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **hour_entry_create_hour_entry_v1** | [**\BhrSdk\Model\HourEntryCreateHourEntryV1**](../Model/HourEntryCreateHourEntryV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingHourEntryV1**](../Model/TimeTrackingHourEntryV1.md)

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

Creates or updates timesheet clock entries in bulk. Entries with an existing ID are updated; entries without an ID are created.  OAuth Scopes: time_tracking.write

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

Creates or updates timesheet hour entries in bulk. Entries with an existing ID are updated; entries without an ID are created.  OAuth Scopes: time_tracking.write

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

## `createProjectTask()`

```php
createProjectTask($project_id, $project_create_time_tracking_project_task_v1): \BhrSdk\Model\ProjectTimeTrackingTaskV1
```

Create Time Tracking Project Task

Creates a new task on the specified time tracking project.  OAuth Scopes: time_tracking:project.write

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

## `createShiftDifferential()`

```php
createShiftDifferential($shift_differential_create_time_tracking_shift_differential_v1): \BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1
```

Create Time Tracking Shift Differential

Creates a new time tracking shift differential.  OAuth Scopes: time_tracking:shift_differentials.write

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
$shift_differential_create_time_tracking_shift_differential_v1 = new \BhrSdk\Model\ShiftDifferentialCreateTimeTrackingShiftDifferentialV1(); // \BhrSdk\Model\ShiftDifferentialCreateTimeTrackingShiftDifferentialV1

try {
    $result = $apiInstance->createShiftDifferential($shift_differential_create_time_tracking_shift_differential_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createShiftDifferential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shift_differential_create_time_tracking_shift_differential_v1** | [**\BhrSdk\Model\ShiftDifferentialCreateTimeTrackingShiftDifferentialV1**](../Model/ShiftDifferentialCreateTimeTrackingShiftDifferentialV1.md)|  | |

### Return type

[**\BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1**](../Model/ShiftDifferentialTimeTrackingShiftDifferentialV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeTrackingConfiguration()`

```php
createTimeTrackingConfiguration($time_tracking_create_time_tracking_configuration_v1, $idempotency_key): \BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1
```

Create Configuration

Creates a new GROUP time tracking configuration together with its approval workflow. The type is forced to GROUP server-side; the GLOBAL configuration is auto-managed and cannot be created via this endpoint. Accepts an optional Idempotency-Key header for safe retries.  OAuth Scopes: time_tracking:configurations.write

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
$time_tracking_create_time_tracking_configuration_v1 = new \BhrSdk\Model\TimeTrackingCreateTimeTrackingConfigurationV1(); // \BhrSdk\Model\TimeTrackingCreateTimeTrackingConfigurationV1
$idempotency_key = 'idempotency_key_example'; // string | Optional client-supplied key for safe retries (UUID recommended). Replaying the same key returns the original response; reusing it with a different body returns 409.

try {
    $result = $apiInstance->createTimeTrackingConfiguration($time_tracking_create_time_tracking_configuration_v1, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimeTrackingConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_create_time_tracking_configuration_v1** | [**\BhrSdk\Model\TimeTrackingCreateTimeTrackingConfigurationV1**](../Model/TimeTrackingCreateTimeTrackingConfigurationV1.md)|  | |
| **idempotency_key** | **string**| Optional client-supplied key for safe retries (UUID recommended). Replaying the same key returns the original response; reusing it with a different body returns 409. | [optional] |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1**](../Model/TimeTrackingTimeTrackingConfigurationV1.md)

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
createTimeTrackingProject($project_create_time_tracking_project_v1): \BhrSdk\Model\ProjectTimeTrackingProjectV1
```

Create Time Tracking Project

Creates a time tracking project. If a deleted project with the same name exists, that project is restored and updated with the supplied values instead of a new project being created; the response returns the restored project's existing ID. `hasTasks` in the response is set automatically based on whether `tasks` were supplied and cannot be set directly on create. Created tasks are not embedded; retrieve them with **List Time Tracking Project Tasks** (`list-project-tasks`).  OAuth Scopes: time_tracking:project.write

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
    $result = $apiInstance->createTimeTrackingProject($project_create_time_tracking_project_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimeTrackingProject: ', $e->getMessage(), PHP_EOL;
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
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeTrackingProjectLegacy()`

```php
createTimeTrackingProjectLegacy($project_create_request_schema): \BhrSdk\Model\TimeTrackingProjectWithTasksAndEmployeeIds
```

Create Time Tracking Project (Legacy)

Deprecated. Use **Create Time Tracking Project** instead (`create-time-tracking-project`).  Creates a time tracking project using the legacy contract and returns the project with its tasks. If a deleted project with the same name exists, that project is restored and updated with the supplied values instead of a new project being created; the response returns the restored project's existing ID.  OAuth Scopes: time_tracking.write

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
    $result = $apiInstance->createTimeTrackingProjectLegacy($project_create_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->createTimeTrackingProjectLegacy: ', $e->getMessage(), PHP_EOL;
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
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimesheetClockInEntry()`

```php
createTimesheetClockInEntry($employee_id, $clock_in_request_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer
```

Create Timesheet Clock-In Entry

Clocks in an employee at the current server time. To record a historical clock-in, provide a `date`, `start` (HH:MM, 24-hour format), and `timezone`. You can optionally associate the entry with `projectId`, `taskId` (requires `projectId`), `breakId`, and a `note`.  OAuth Scopes: time_tracking.write

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
$employee_id = 56; // int | The internal employee ID of the employee to clock in.
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
| **employee_id** | **int**| The internal employee ID of the employee to clock in. | |
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

Clocks out a currently clocked-in employee at the current server time. To record a historical clock-out, provide a `date`, `end` (HH:MM, 24-hour format), and `timezone`.  OAuth Scopes: time_tracking.write

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
$employee_id = 56; // int | The internal employee ID of the employee to clock out.
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
| **employee_id** | **int**| The internal employee ID of the employee to clock out. | |
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

## `deleteClockEntry()`

```php
deleteClockEntry($id)
```

Delete Clock Entry

Deletes a time tracking clock entry by its ID.  OAuth Scopes: time_tracking:timesheets.write

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
$id = 56; // int | The clock entry ID.

try {
    $apiInstance->deleteClockEntry($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteClockEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The clock entry ID. | |

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

## `deleteHourEntry()`

```php
deleteHourEntry($id)
```

Delete Hour Entry

Deletes a time tracking hour entry by its ID.  OAuth Scopes: time_tracking:timesheets.write

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
$id = 56; // int | The hour entry ID.

try {
    $apiInstance->deleteHourEntry($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteHourEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The hour entry ID. | |

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

Deletes a time tracking project by its ID.  OAuth Scopes: time_tracking:project.write

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

## `deleteShiftDifferential()`

```php
deleteShiftDifferential($id)
```

Delete Time Tracking Shift Differential

Deletes a time tracking shift differential by its ID.  OAuth Scopes: time_tracking:shift_differentials.write

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
$id = 56; // int | The shift differential ID.

try {
    $apiInstance->deleteShiftDifferential($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteShiftDifferential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The shift differential ID. | |

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

Deletes a time tracking task by its ID.  OAuth Scopes: time_tracking:project.write

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

## `deleteTimeTrackingConfiguration()`

```php
deleteTimeTrackingConfiguration($id)
```

Delete Configuration

Soft-deletes an empty GROUP time tracking configuration. A configuration that still has enrolled employees cannot be deleted, because un-enrolling employees is governed by the employee enrollment permissions rather than the configuration permissions; move or un-enroll its employees first. Open timesheets stay on the previously-applicable rules until the next pay period boundary. The GLOBAL configuration is auto-managed and cannot be deleted. Deletion is idempotent: an ID that does not exist, or a configuration that was already deleted, also returns 204.  OAuth Scopes: time_tracking:configurations.write

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
$id = 56; // int | The time tracking configuration ID.

try {
    $apiInstance->deleteTimeTrackingConfiguration($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteTimeTrackingConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The time tracking configuration ID. | |

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

## `deleteTimeTrackingKiosk()`

```php
deleteTimeTrackingKiosk($id)
```

Delete Time Tracking Kiosk

Soft-deletes a time tracking kiosk. Deletion is idempotent (REST API Standard 3.3): a 204 is returned whether or not the kiosk currently exists, so deleting a missing or already-deleted kiosk also returns 204. Once deleted, a kiosk is absent from List Kiosks and returns 404 on Get Kiosk.  OAuth Scopes: time_tracking:kiosks.write

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
$id = 'id_example'; // string | The time tracking kiosk ID.

try {
    $apiInstance->deleteTimeTrackingKiosk($id);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->deleteTimeTrackingKiosk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking kiosk ID. | |

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

Deletes one or more timesheet clock entries by their IDs. Delete operations are idempotent; deleting already-removed entries does not require client retries.  OAuth Scopes: time_tracking.write

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

Deletes one or more timesheet hour entries by their IDs. Delete operations are idempotent; deleting already-removed entries does not require client retries.  OAuth Scopes: time_tracking.write

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

## `getClockEntry()`

```php
getClockEntry($id): \BhrSdk\Model\TimeTrackingClockEntryV1
```

Get Clock Entry

Retrieves a single clock entry by its ID. `start`/`end` are ISO 8601 with the offset of the entry's `timezone`; `end` and `clockOutLocation` are null while the entry is open. Geolocation is omitted (null) when the configuration has it disabled.  OAuth Scopes: time_tracking:timesheets

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
$id = 56; // int | The clock entry ID.

try {
    $result = $apiInstance->getClockEntry($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getClockEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The clock entry ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingClockEntryV1**](../Model/TimeTrackingClockEntryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHourEntry()`

```php
getHourEntry($id): \BhrSdk\Model\TimeTrackingHourEntryV1
```

Get Hour Entry

Retrieves a single hour entry by its ID.  OAuth Scopes: time_tracking:timesheets

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
$id = 56; // int | The hour entry ID.

try {
    $result = $apiInstance->getHourEntry($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getHourEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The hour entry ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingHourEntryV1**](../Model/TimeTrackingHourEntryV1.md)

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
getProject($id): \BhrSdk\Model\ProjectTimeTrackingProjectV1
```

Get Time Tracking Project

Retrieves a single time tracking project by its ID, including the list of employees assigned to it.  OAuth Scopes: time_tracking:project

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
    $result = $apiInstance->getProject($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getProject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The project ID. | |

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

## `getShiftDifferential()`

```php
getShiftDifferential($id): \BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1
```

Get Time Tracking Shift Differential

Retrieves a single time tracking shift differential by its ID. Archived shift differentials are returned normally; soft-deleted shift differentials return 404.  OAuth Scopes: time_tracking:shift_differentials

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
$id = 56; // int | The shift differential ID.

try {
    $result = $apiInstance->getShiftDifferential($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getShiftDifferential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The shift differential ID. | |

### Return type

[**\BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1**](../Model/ShiftDifferentialTimeTrackingShiftDifferentialV1.md)

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

Retrieves a single time tracking task by its ID.  OAuth Scopes: time_tracking:project

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

## `getTimeTrackingConfiguration()`

```php
getTimeTrackingConfiguration($id): \BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1
```

Get Configuration

Retrieves a single time tracking configuration by its ID. Soft-deleted configurations return 404.  OAuth Scopes: time_tracking:configurations

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
$id = 56; // int | The configuration ID.

try {
    $result = $apiInstance->getTimeTrackingConfiguration($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimeTrackingConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The configuration ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1**](../Model/TimeTrackingTimeTrackingConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeTrackingEmployeeEnrollment()`

```php
getTimeTrackingEmployeeEnrollment($employee_id): \BhrSdk\Model\TimeTrackingEmployeeTimeTrackingDataV1
```

Get Employee Enrollment

Gets an employee's time tracking enrollment data.  OAuth Scopes: time_tracking:employees

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
$employee_id = 56; // int | The employee ID.

try {
    $result = $apiInstance->getTimeTrackingEmployeeEnrollment($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimeTrackingEmployeeEnrollment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The employee ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingEmployeeTimeTrackingDataV1**](../Model/TimeTrackingEmployeeTimeTrackingDataV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeTrackingKiosk()`

```php
getTimeTrackingKiosk($id): \BhrSdk\Model\TimeTrackingTimeTrackingKioskV1
```

Get Time Tracking Kiosk

Retrieves a single time tracking kiosk by its ID. Deleted kiosks return 404.  OAuth Scopes: time_tracking:kiosks

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
$id = 'id_example'; // string | The time tracking kiosk ID.

try {
    $result = $apiInstance->getTimeTrackingKiosk($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimeTrackingKiosk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking kiosk ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingKioskV1**](../Model/TimeTrackingTimeTrackingKioskV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeTrackingTimeClock()`

```php
getTimeTrackingTimeClock($id): \BhrSdk\Model\TimeTrackingTimeTrackingTimeClockV1
```

Get Time Tracking Time Clock

Retrieves a single time tracking time clock by its ID. Device health flags are reported as null while device status is temporarily unavailable.  OAuth Scopes: time_tracking:time_clocks

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
$id = 'id_example'; // string | The time tracking time clock ID.

try {
    $result = $apiInstance->getTimeTrackingTimeClock($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimeTrackingTimeClock: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking time clock ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingTimeClockV1**](../Model/TimeTrackingTimeTrackingTimeClockV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimesheet()`

```php
getTimesheet($id): \BhrSdk\Model\TimeTrackingTimesheetV1
```

Get Timesheet

Retrieves a single timesheet by its ID. The `status` is derived at read time (`OPEN`, `PENDING_APPROVAL`, or `APPROVED`) and `type` is returned in `UPPER_SNAKE_CASE` (`SINGLE`, `CLOCK`, `MULTIPLE`, or `HOUR`). Timesheets for pay periods that have not started yet return 404.  OAuth Scopes: time_tracking:timesheets

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
$id = 56; // int | The timesheet ID.

try {
    $result = $apiInstance->getTimesheet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimesheet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The timesheet ID. | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimesheetV1**](../Model/TimeTrackingTimesheetV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimesheetSummary()`

```php
getTimesheetSummary($id): \BhrSdk\Model\TimesheetTimesheetDailySummaryV1
```

Get Timesheet Summary

Returns the daily breakdown of hours for a timesheet, including regular, overtime, and double-time hours per day. Every date in the pay period is represented; days with no logged hours return 0.0 in each bucket.  OAuth Scopes: time_tracking:timesheets

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
$id = 56; // int | The timesheet ID.

try {
    $result = $apiInstance->getTimesheetSummary($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->getTimesheetSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The timesheet ID. | |

### Return type

[**\BhrSdk\Model\TimesheetTimesheetDailySummaryV1**](../Model/TimesheetTimesheetDailySummaryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listClockEntries()`

```php
listClockEntries($filter, $sort, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedClockEntriesResponseV1
```

List Clock Entries

Returns a paginated list of time tracking clock entries. Supports OData-style `filter` and `sort` query parameters. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 50, min 10, max 200). Filterable fields: `timesheetId`, `employeeId`, `start`, `end`. Sortable fields: `start`, `end`, `updatedAt`. Default sort is `start desc`. Geolocation is omitted (null) for entries whose configuration has it disabled.  OAuth Scopes: time_tracking:timesheets

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
$filter = 'filter_example'; // string | OData v4 filter expression. Supported operators: `eq`, `ge`, `le`, `and`. Filterable fields: `timesheetId`, `employeeId`, `start`, `end`. Examples: `employeeId eq 40342`, `start ge 2026-03-16T00:00:00Z and start le 2026-03-29T23:59:59Z`, `timesheetId eq 9001`.
$sort = 'sort_example'; // string | Sort expression like `start desc` or `updatedAt asc`. Allowed fields: `start`, `end`, `updatedAt`. Defaults to `start desc`.
$page = 1; // int | The page number to retrieve. Defaults to 1.
$page_size = 50; // int | The number of items per page. Defaults to 50, minimum 10, maximum 200.

try {
    $result = $apiInstance->listClockEntries($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listClockEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Supported operators: &#x60;eq&#x60;, &#x60;ge&#x60;, &#x60;le&#x60;, &#x60;and&#x60;. Filterable fields: &#x60;timesheetId&#x60;, &#x60;employeeId&#x60;, &#x60;start&#x60;, &#x60;end&#x60;. Examples: &#x60;employeeId eq 40342&#x60;, &#x60;start ge 2026-03-16T00:00:00Z and start le 2026-03-29T23:59:59Z&#x60;, &#x60;timesheetId eq 9001&#x60;. | [optional] |
| **sort** | **string**| Sort expression like &#x60;start desc&#x60; or &#x60;updatedAt asc&#x60;. Allowed fields: &#x60;start&#x60;, &#x60;end&#x60;, &#x60;updatedAt&#x60;. Defaults to &#x60;start desc&#x60;. | [optional] |
| **page** | **int**| The page number to retrieve. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 50, minimum 10, maximum 200. | [optional] [default to 50] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedClockEntriesResponseV1**](../Model/TimeTrackingPaginatedClockEntriesResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listHourEntries()`

```php
listHourEntries($filter, $sort, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedHourEntriesResponseV1
```

List Hour Entries

Returns a paginated list of time tracking hour entries. Supports OData-style `filter` and `sort` query parameters. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 50, min 10, max 200). Filterable fields: `timesheetId`, `employeeId`, `date`. Sortable fields: `date`, `updatedAt`. Default sort is `date desc`.  OAuth Scopes: time_tracking:timesheets

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
$filter = 'filter_example'; // string | OData v4 filter expression. Supported operators: `eq`, `ge`, `le`, `and`. Filterable fields: `timesheetId`, `employeeId`, `date`. Examples: `employeeId eq 40342`, `date ge 2025-01-01 and date le 2025-01-31`, `timesheetId eq 9001`.
$sort = 'sort_example'; // string | Sort expression like `date desc` or `updatedAt asc`. Allowed fields: `date`, `updatedAt`. Defaults to `date desc`.
$page = 1; // int | The page number to retrieve. Defaults to 1.
$page_size = 50; // int | The number of items per page. Defaults to 50, minimum 10, maximum 200.

try {
    $result = $apiInstance->listHourEntries($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listHourEntries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Supported operators: &#x60;eq&#x60;, &#x60;ge&#x60;, &#x60;le&#x60;, &#x60;and&#x60;. Filterable fields: &#x60;timesheetId&#x60;, &#x60;employeeId&#x60;, &#x60;date&#x60;. Examples: &#x60;employeeId eq 40342&#x60;, &#x60;date ge 2025-01-01 and date le 2025-01-31&#x60;, &#x60;timesheetId eq 9001&#x60;. | [optional] |
| **sort** | **string**| Sort expression like &#x60;date desc&#x60; or &#x60;updatedAt asc&#x60;. Allowed fields: &#x60;date&#x60;, &#x60;updatedAt&#x60;. Defaults to &#x60;date desc&#x60;. | [optional] |
| **page** | **int**| The page number to retrieve. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 50, minimum 10, maximum 200. | [optional] [default to 50] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedHourEntriesResponseV1**](../Model/TimeTrackingPaginatedHourEntriesResponseV1.md)

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

Returns a paginated list of tasks for the specified time tracking project. Tasks are filtered by `statuses[]`, which defaults to `active`.  OAuth Scopes: time_tracking:project

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

Returns a paginated list of time tracking projects. Supports OData-style `filter` and `sort` query parameters. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 100, max 500).  OAuth Scopes: time_tracking:project

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

## `listShiftDifferentials()`

```php
listShiftDifferentials($filter, $sort, $page, $page_size): \BhrSdk\Model\ShiftDifferentialPaginatedTimeTrackingShiftDifferentialsResponseV1
```

List Time Tracking Shift Differentials

Returns a paginated list of time tracking shift differentials. Supports OData-style `filter` and `sort` query parameters. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 20, max 100). Archived rows are excluded by default; include them with `filter=archived eq true`. Soft-deleted rows are never returned.  OAuth Scopes: time_tracking:shift_differentials

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `name`, `rate`, `rateType`, `archived`.
$sort = 'sort_example'; // string | Sort expression like `name asc, createdAt desc`. Allowed fields: `name`, `createdAt`, `updatedAt`.
$page = 1; // int | The starting page for pagination. Defaults to 1.
$page_size = 20; // int | The number of items per page. Defaults to 20, maximum 100.

try {
    $result = $apiInstance->listShiftDifferentials($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listShiftDifferentials: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;name&#x60;, &#x60;rate&#x60;, &#x60;rateType&#x60;, &#x60;archived&#x60;. | [optional] |
| **sort** | **string**| Sort expression like &#x60;name asc, createdAt desc&#x60;. Allowed fields: &#x60;name&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] |
| **page** | **int**| The starting page for pagination. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 20, maximum 100. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\ShiftDifferentialPaginatedTimeTrackingShiftDifferentialsResponseV1**](../Model/ShiftDifferentialPaginatedTimeTrackingShiftDifferentialsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeTrackingConfigurations()`

```php
listTimeTrackingConfigurations($filter, $order_by, $select, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedTimeTrackingConfigurationsResponseV1
```

List Configurations

Returns a paginated list of time tracking configurations. Both GLOBAL and GROUP configurations are returned; soft-deleted configurations are never returned. Supports an OData-style `filter`, an `orderBy` sort expression, and `select` sparse fieldsets. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 20, max 100).  OAuth Scopes: time_tracking:configurations

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `name`, `type`, `timesheetType`. Example: `type eq 'GROUP' and timesheetType eq 'CLOCK'`.
$order_by = 'order_by_example'; // string | Sort expression like `name asc, createdAt desc`. Allowed fields: `name`, `createdAt`, `updatedAt`.
$select = 'select_example'; // string | Comma-separated list of properties to return (sparse fieldsets).
$page = 1; // int | The page to return. Defaults to 1.
$page_size = 20; // int | The number of items per page. Defaults to 20, maximum 100.

try {
    $result = $apiInstance->listTimeTrackingConfigurations($filter, $order_by, $select, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimeTrackingConfigurations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;name&#x60;, &#x60;type&#x60;, &#x60;timesheetType&#x60;. Example: &#x60;type eq &#39;GROUP&#39; and timesheetType eq &#39;CLOCK&#39;&#x60;. | [optional] |
| **order_by** | **string**| Sort expression like &#x60;name asc, createdAt desc&#x60;. Allowed fields: &#x60;name&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] |
| **select** | **string**| Comma-separated list of properties to return (sparse fieldsets). | [optional] |
| **page** | **int**| The page to return. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 20, maximum 100. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedTimeTrackingConfigurationsResponseV1**](../Model/TimeTrackingPaginatedTimeTrackingConfigurationsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeTrackingEmployees()`

```php
listTimeTrackingEmployees($filter, $order_by, $select, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedEmployeeTimeTrackingDataResponseV1
```

List Enrolled Employees

Returns a paginated list of employee time tracking enrollments. Both enabled and disabled enrollments are returned; narrow with the `enabled` filter. Supports an OData-style `filter`, an `orderBy` sort expression, and `select` sparse fieldsets. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 20, minimum 10, maximum 100).  OAuth Scopes: time_tracking:employees

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `enabled`, `configurationId`. Example: `enabled eq true and configurationId eq 3`.
$order_by = 'order_by_example'; // string | Sort expression like `employeeId asc, createdAt desc`. Allowed fields: `employeeId`, `enabledOn`, `createdAt`, `updatedAt`.
$select = 'select_example'; // string | Comma-separated list of properties to return (sparse fieldsets).
$page = 1; // int | The page to return. Defaults to 1.
$page_size = 20; // int | The number of items per page. Defaults to 20, minimum 10, maximum 100.

try {
    $result = $apiInstance->listTimeTrackingEmployees($filter, $order_by, $select, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimeTrackingEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;enabled&#x60;, &#x60;configurationId&#x60;. Example: &#x60;enabled eq true and configurationId eq 3&#x60;. | [optional] |
| **order_by** | **string**| Sort expression like &#x60;employeeId asc, createdAt desc&#x60;. Allowed fields: &#x60;employeeId&#x60;, &#x60;enabledOn&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] |
| **select** | **string**| Comma-separated list of properties to return (sparse fieldsets). | [optional] |
| **page** | **int**| The page to return. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items per page. Defaults to 20, minimum 10, maximum 100. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedEmployeeTimeTrackingDataResponseV1**](../Model/TimeTrackingPaginatedEmployeeTimeTrackingDataResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeTrackingKiosks()`

```php
listTimeTrackingKiosks($filter, $order_by, $select, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedTimeTrackingKiosksResponseV1
```

List Time Tracking Kiosks

Returns a paginated list of time tracking kiosks. Deleted kiosks are never returned. Supports an OData-style `filter`, an `orderBy` sort expression, and `select` sparse fieldsets. Results are sorted by name ascending when `orderBy` is omitted; name ordering is case-insensitive. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 20, max 100).  OAuth Scopes: time_tracking:kiosks

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `name`, `lastUsed`, `createdAt`, `updatedAt`. Example: `name eq 'Front Desk Kiosk'`.
$order_by = 'order_by_example'; // string | Sort expression like `name asc, createdAt desc`. Allowed fields: `name`, `lastUsed`, `createdAt`, `updatedAt`. Defaults to `name asc`.
$select = 'select_example'; // string | Comma-separated list of properties to return (sparse fieldsets).
$page = 1; // int | The page to retrieve. Defaults to 1.
$page_size = 20; // int | The number of kiosks per page. Defaults to 20, minimum 10, maximum 100.

try {
    $result = $apiInstance->listTimeTrackingKiosks($filter, $order_by, $select, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimeTrackingKiosks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;name&#x60;, &#x60;lastUsed&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. Example: &#x60;name eq &#39;Front Desk Kiosk&#39;&#x60;. | [optional] |
| **order_by** | **string**| Sort expression like &#x60;name asc, createdAt desc&#x60;. Allowed fields: &#x60;name&#x60;, &#x60;lastUsed&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. Defaults to &#x60;name asc&#x60;. | [optional] |
| **select** | **string**| Comma-separated list of properties to return (sparse fieldsets). | [optional] |
| **page** | **int**| The page to retrieve. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of kiosks per page. Defaults to 20, minimum 10, maximum 100. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedTimeTrackingKiosksResponseV1**](../Model/TimeTrackingPaginatedTimeTrackingKiosksResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTimeTrackingTimeClocks()`

```php
listTimeTrackingTimeClocks($filter, $order_by, $select, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedTimeTrackingTimeClocksResponseV1
```

List Time Tracking Time Clocks

Returns a paginated list of the company's time tracking time clocks. Supports an OData-style `filter`, an `orderBy` sort expression, and `select` sparse fieldsets. Results are sorted by name ascending when `orderBy` is omitted; name ordering is case-insensitive. Filtering and sorting are applied in memory over the cached GT Connect list (partner ordering is not relied on). A company with no GT Clocks connected returns an empty list, not a 404. Device health flags are reported as null while device status is temporarily unavailable. Pagination is page-based via `page` and `pageSize` (defaults: page 1, pageSize 20, minimum 10, maximum 100).  OAuth Scopes: time_tracking:time_clocks

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
$filter = 'filter_example'; // string | OData v4 filter expression. Filterable fields: `name`, `serialNumber`, `type`, `timezone`. Example: `type eq 'TIME_CLOCK'`.
$order_by = 'order_by_example'; // string | Sort expression like `name asc, serialNumber desc`. Allowed fields: `name`, `serialNumber`, `type`, `timezone`. Defaults to `name asc`.
$select = 'select_example'; // string | Comma-separated list of properties to return (sparse fieldsets).
$page = 1; // int | The page to retrieve. Defaults to 1.
$page_size = 20; // int | The number of time clocks per page. Defaults to 20, minimum 10, maximum 100.

try {
    $result = $apiInstance->listTimeTrackingTimeClocks($filter, $order_by, $select, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimeTrackingTimeClocks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData v4 filter expression. Filterable fields: &#x60;name&#x60;, &#x60;serialNumber&#x60;, &#x60;type&#x60;, &#x60;timezone&#x60;. Example: &#x60;type eq &#39;TIME_CLOCK&#39;&#x60;. | [optional] |
| **order_by** | **string**| Sort expression like &#x60;name asc, serialNumber desc&#x60;. Allowed fields: &#x60;name&#x60;, &#x60;serialNumber&#x60;, &#x60;type&#x60;, &#x60;timezone&#x60;. Defaults to &#x60;name asc&#x60;. | [optional] |
| **select** | **string**| Comma-separated list of properties to return (sparse fieldsets). | [optional] |
| **page** | **int**| The page to retrieve. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of time clocks per page. Defaults to 20, minimum 10, maximum 100. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedTimeTrackingTimeClocksResponseV1**](../Model/TimeTrackingPaginatedTimeTrackingTimeClocksResponseV1.md)

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

Returns timesheet entries for all employees, or a filtered subset, within the specified date range. Results include both clock and hour entry types. Dates must fall within the last 365 days and are interpreted in the company timezone.  OAuth Scopes: time_tracking

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
$employee_ids = 1,2,3; // string | A comma-separated list of internal employee IDs. When specified, only entries that match these employee IDs are returned. When omitted, entries for all accessible employees are returned.

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
| **employee_ids** | **string**| A comma-separated list of internal employee IDs. When specified, only entries that match these employee IDs are returned. When omitted, entries for all accessible employees are returned. | [optional] |

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

## `listTimesheets()`

```php
listTimesheets($filter, $sort, $page, $page_size): \BhrSdk\Model\TimeTrackingPaginatedTimesheetsResponseV1
```

List Timesheets

Returns a paginated list of timesheets. Supports OData-style `filter` (fields: `employeeId`, `status`, `startDate`, `endDate`) and `sort` (fields: `startDate`, `endDate`, `approvedAt`, `updatedAt`; default `startDate desc`). Page-based pagination via `page` (default 1) and `pageSize` (default 50, max 200). Future-period timesheets are always excluded.  OAuth Scopes: time_tracking:timesheets

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
$filter = 'filter_example'; // string | OData-style filter expression.
$sort = 'sort_example'; // string | Sort expression. Default: startDate desc.
$page = 1; // int | Page number (1-based).
$page_size = 50; // int | Records per page (max 200).

try {
    $result = $apiInstance->listTimesheets($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->listTimesheets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData-style filter expression. | [optional] |
| **sort** | **string**| Sort expression. Default: startDate desc. | [optional] |
| **page** | **int**| Page number (1-based). | [optional] [default to 1] |
| **page_size** | **int**| Records per page (max 200). | [optional] [default to 50] |

### Return type

[**\BhrSdk\Model\TimeTrackingPaginatedTimesheetsResponseV1**](../Model/TimeTrackingPaginatedTimesheetsResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateClockEntry()`

```php
updateClockEntry($id, $time_tracking_update_clock_entry_v1): \BhrSdk\Model\TimeTrackingClockEntryV1
```

Update Clock Entry

Partially updates a time tracking clock entry identified by its ID. Only the fields present in the body are changed. When `start` or `timezone` change, the entry's `date` and `timesheetId` are recomputed server-side and the entry is moved to the matching timesheet. Pass `null` for `clockInLocation` / `clockOutLocation` to clear the stored geolocation.  OAuth Scopes: time_tracking:timesheets.write

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
$id = 56; // int | The clock entry ID.
$time_tracking_update_clock_entry_v1 = new \BhrSdk\Model\TimeTrackingUpdateClockEntryV1(); // \BhrSdk\Model\TimeTrackingUpdateClockEntryV1

try {
    $result = $apiInstance->updateClockEntry($id, $time_tracking_update_clock_entry_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateClockEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The clock entry ID. | |
| **time_tracking_update_clock_entry_v1** | [**\BhrSdk\Model\TimeTrackingUpdateClockEntryV1**](../Model/TimeTrackingUpdateClockEntryV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingClockEntryV1**](../Model/TimeTrackingClockEntryV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateHourEntry()`

```php
updateHourEntry($id, $hour_entry_patch_hour_entry_v1): \BhrSdk\Model\TimeTrackingHourEntryV1
```

Update Hour Entry

Partially updates a time tracking hour entry identified by its ID. Only the fields present in the body are changed; the rest retain their prior values. Moving the entry to a date in a different pay period updates the returned timesheetId.  OAuth Scopes: time_tracking:timesheets.write

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
$id = 56; // int | The hour entry ID.
$hour_entry_patch_hour_entry_v1 = new \BhrSdk\Model\HourEntryPatchHourEntryV1(); // \BhrSdk\Model\HourEntryPatchHourEntryV1

try {
    $result = $apiInstance->updateHourEntry($id, $hour_entry_patch_hour_entry_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateHourEntry: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The hour entry ID. | |
| **hour_entry_patch_hour_entry_v1** | [**\BhrSdk\Model\HourEntryPatchHourEntryV1**](../Model/HourEntryPatchHourEntryV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingHourEntryV1**](../Model/TimeTrackingHourEntryV1.md)

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

Partially updates a time tracking project identified by its ID. Only fields provided in the request body are updated; omitted fields are left unchanged.  OAuth Scopes: time_tracking:project.write

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

## `updateShiftDifferential()`

```php
updateShiftDifferential($id, $shift_differential_update_time_tracking_shift_differential_v1): \BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1
```

Update Time Tracking Shift Differential

Partially updates a time tracking shift differential identified by its ID.  OAuth Scopes: time_tracking:shift_differentials.write

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
$id = 56; // int | The shift differential ID.
$shift_differential_update_time_tracking_shift_differential_v1 = new \BhrSdk\Model\ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1(); // \BhrSdk\Model\ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1

try {
    $result = $apiInstance->updateShiftDifferential($id, $shift_differential_update_time_tracking_shift_differential_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateShiftDifferential: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The shift differential ID. | |
| **shift_differential_update_time_tracking_shift_differential_v1** | [**\BhrSdk\Model\ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1**](../Model/ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1.md)|  | |

### Return type

[**\BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialV1**](../Model/ShiftDifferentialTimeTrackingShiftDifferentialV1.md)

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

Partially updates a time tracking task identified by its ID. Only fields provided in the request body are updated; at least one field must be provided.  OAuth Scopes: time_tracking:project.write

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

## `updateTimeTrackingConfiguration()`

```php
updateTimeTrackingConfiguration($id, $time_tracking_update_time_tracking_configuration_v1): \BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1
```

Update Configuration

Updates a time tracking configuration using JSON Merge Patch (RFC 7396) semantics: only the properties present in the body are applied, omitted properties are unchanged, and an explicit null clears a nullable property. Both GLOBAL and GROUP configurations can be updated. Content-Type: application/merge-patch+json is preferred because it names those semantics, but application/json is also accepted.  OAuth Scopes: time_tracking:configurations.write

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
$id = 56; // int | The time tracking configuration ID.
$time_tracking_update_time_tracking_configuration_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingConfigurationV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingConfigurationV1

try {
    $result = $apiInstance->updateTimeTrackingConfiguration($id, $time_tracking_update_time_tracking_configuration_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateTimeTrackingConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The time tracking configuration ID. | |
| **time_tracking_update_time_tracking_configuration_v1** | [**\BhrSdk\Model\TimeTrackingUpdateTimeTrackingConfigurationV1**](../Model/TimeTrackingUpdateTimeTrackingConfigurationV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingConfigurationV1**](../Model/TimeTrackingTimeTrackingConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`, `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTimeTrackingEmployeeEnrollment()`

```php
updateTimeTrackingEmployeeEnrollment($employee_id, $time_tracking_update_employee_time_tracking_data_v1): \BhrSdk\Model\TimeTrackingEmployeeTimeTrackingDataV1
```

Update Employee Enrollment

Enables, disables, or reassigns a single employee's enrollment using JSON Merge Patch (RFC 7396) semantics: only the properties present in the body are applied and omitted properties are unchanged. Content-Type must be `application/merge-patch+json`. When the employee has no enrollment record yet and `enabled` is set to true, one is created. `timezone` and `clockInId` are read-only on this API. Reassigning an employee whose time tracking is currently off requires setting `enabled` to true in the same body, and `configurationId` and `enabledOn` cannot be combined with `enabled: false`.  OAuth Scopes: time_tracking:employees.write

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
$employee_id = 56; // int | The employee ID.
$time_tracking_update_employee_time_tracking_data_v1 = new \BhrSdk\Model\TimeTrackingUpdateEmployeeTimeTrackingDataV1(); // \BhrSdk\Model\TimeTrackingUpdateEmployeeTimeTrackingDataV1

try {
    $result = $apiInstance->updateTimeTrackingEmployeeEnrollment($employee_id, $time_tracking_update_employee_time_tracking_data_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateTimeTrackingEmployeeEnrollment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The employee ID. | |
| **time_tracking_update_employee_time_tracking_data_v1** | [**\BhrSdk\Model\TimeTrackingUpdateEmployeeTimeTrackingDataV1**](../Model/TimeTrackingUpdateEmployeeTimeTrackingDataV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingEmployeeTimeTrackingDataV1**](../Model/TimeTrackingEmployeeTimeTrackingDataV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTimeTrackingKiosk()`

```php
updateTimeTrackingKiosk($id, $time_tracking_update_time_tracking_kiosk_v1): \BhrSdk\Model\TimeTrackingTimeTrackingKioskV1
```

Update Time Tracking Kiosk

Updates a time tracking kiosk using JSON Merge Patch (RFC 7396) semantics. Only the kiosk `name` is mutable. Content-Type: application/merge-patch+json is preferred because it names those semantics, but application/json is also accepted.  OAuth Scopes: time_tracking:kiosks.write

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
$id = 'id_example'; // string | The time tracking kiosk ID.
$time_tracking_update_time_tracking_kiosk_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingKioskV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingKioskV1

try {
    $result = $apiInstance->updateTimeTrackingKiosk($id, $time_tracking_update_time_tracking_kiosk_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateTimeTrackingKiosk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking kiosk ID. | |
| **time_tracking_update_time_tracking_kiosk_v1** | [**\BhrSdk\Model\TimeTrackingUpdateTimeTrackingKioskV1**](../Model/TimeTrackingUpdateTimeTrackingKioskV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingKioskV1**](../Model/TimeTrackingTimeTrackingKioskV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`, `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTimeTrackingTimeClock()`

```php
updateTimeTrackingTimeClock($id, $time_tracking_update_time_tracking_time_clock_v1): \BhrSdk\Model\TimeTrackingTimeTrackingTimeClockV1
```

Update Time Tracking Time Clock

Updates a time tracking time clock using JSON Merge Patch (RFC 7396) semantics: only the properties present in the body are applied. Only `name` and `timezone` are mutable, and at least one of them must be provided. Both changes are written through to the GT Clocks partner; writes are never served from cache, so a write returns 503 with a Retry-After header when the partner is unreachable. A successful write invalidates the cached device list so the next read reflects the change. Content-Type: application/merge-patch+json is preferred because it names those semantics, but application/json is also accepted.  OAuth Scopes: time_tracking:time_clocks.write

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
$id = 'id_example'; // string | The time tracking time clock ID.
$time_tracking_update_time_tracking_time_clock_v1 = new \BhrSdk\Model\TimeTrackingUpdateTimeTrackingTimeClockV1(); // \BhrSdk\Model\TimeTrackingUpdateTimeTrackingTimeClockV1

try {
    $result = $apiInstance->updateTimeTrackingTimeClock($id, $time_tracking_update_time_tracking_time_clock_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->updateTimeTrackingTimeClock: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking time clock ID. | |
| **time_tracking_update_time_tracking_time_clock_v1** | [**\BhrSdk\Model\TimeTrackingUpdateTimeTrackingTimeClockV1**](../Model/TimeTrackingUpdateTimeTrackingTimeClockV1.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingTimeTrackingTimeClockV1**](../Model/TimeTrackingTimeTrackingTimeClockV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`, `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
