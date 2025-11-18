# BhrSdk\TimeTrackingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEditTimesheetClockEntries()**](TimeTrackingApi.md#addEditTimesheetClockEntries) | **POST** /api/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries |
| [**addEditTimesheetHourEntries()**](TimeTrackingApi.md#addEditTimesheetHourEntries) | **POST** /api/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries |
| [**addTimesheetClockInEntry()**](TimeTrackingApi.md#addTimesheetClockInEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry |
| [**addTimesheetClockOutEntry()**](TimeTrackingApi.md#addTimesheetClockOutEntry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry |
| [**createTimeTrackingProject()**](TimeTrackingApi.md#createTimeTrackingProject) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project |
| [**deleteTimesheetClockEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetClockEntriesViaPost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries |
| [**deleteTimesheetHourEntriesViaPost()**](TimeTrackingApi.md#deleteTimesheetHourEntriesViaPost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**getTimesheetEntries()**](TimeTrackingApi.md#getTimesheetEntries) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries |


## `addEditTimesheetClockEntries()`

```php
addEditTimesheetClockEntries($clock_entries_schema): \BhrSdk\Model\TimesheetEntryInfoApiTransformer[]
```

Add/Edit Timesheet Clock Entries

Add or edit timesheet clock entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

Add/Edit Timesheet Hour Entries

Add or edit timesheet hour entries.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

Add Timesheet Clock-In Entry

Clock in an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

Add Timesheet Clock-Out Entry

Clock out an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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
