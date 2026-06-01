# BhrSdk\SchedulingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**schedulingCreateSchedule()**](SchedulingApi.md#schedulingCreateSchedule) | **POST** /api/v1/scheduling/schedules | Create Schedule |
| [**schedulingCreateShift()**](SchedulingApi.md#schedulingCreateShift) | **POST** /api/v1/scheduling/shifts | Create Shift |
| [**schedulingDeleteSchedule()**](SchedulingApi.md#schedulingDeleteSchedule) | **DELETE** /api/v1/scheduling/schedules/{id} | Delete Schedule |
| [**schedulingDeleteShift()**](SchedulingApi.md#schedulingDeleteShift) | **DELETE** /api/v1/scheduling/shifts/{id} | Delete Shift |
| [**schedulingGetSchedule()**](SchedulingApi.md#schedulingGetSchedule) | **GET** /api/v1/scheduling/schedules/{id} | Get Schedule |
| [**schedulingGetSchedulePdf()**](SchedulingApi.md#schedulingGetSchedulePdf) | **GET** /api/v1/scheduling/schedules/{id}/pdf | Get Schedule PDF |
| [**schedulingGetShift()**](SchedulingApi.md#schedulingGetShift) | **GET** /api/v1/scheduling/shifts/{id} | Get Shift |
| [**schedulingListSchedules()**](SchedulingApi.md#schedulingListSchedules) | **GET** /api/v1/scheduling/schedules | List Schedules |
| [**schedulingListShifts()**](SchedulingApi.md#schedulingListShifts) | **GET** /api/v1/scheduling/shifts | List Shifts |
| [**schedulingListTimezones()**](SchedulingApi.md#schedulingListTimezones) | **GET** /api/v1/scheduling/timezones | List Timezones |
| [**schedulingPublishShifts()**](SchedulingApi.md#schedulingPublishShifts) | **POST** /api/v1/scheduling/shifts/publish | Publish Shifts |
| [**schedulingUpdateSchedule()**](SchedulingApi.md#schedulingUpdateSchedule) | **PATCH** /api/v1/scheduling/schedules/{id} | Update Schedule |
| [**schedulingUpdateShift()**](SchedulingApi.md#schedulingUpdateShift) | **PATCH** /api/v1/scheduling/shifts/{id} | Update Shift |


## `schedulingCreateSchedule()`

```php
schedulingCreateSchedule($scheduling_create_schedule_request_v1): \BhrSdk\Model\SchedulingScheduleV1
```

Create Schedule

Creates a new schedule for the company. Rejects duplicate schedule data for the same location and configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$scheduling_create_schedule_request_v1 = new \BhrSdk\Model\SchedulingCreateScheduleRequestV1(); // \BhrSdk\Model\SchedulingCreateScheduleRequestV1

try {
    $result = $apiInstance->schedulingCreateSchedule($scheduling_create_schedule_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingCreateSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scheduling_create_schedule_request_v1** | [**\BhrSdk\Model\SchedulingCreateScheduleRequestV1**](../Model/SchedulingCreateScheduleRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\SchedulingScheduleV1**](../Model/SchedulingScheduleV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingCreateShift()`

```php
schedulingCreateShift($scheduling_create_scheduling_shift_request_v1): \BhrSdk\Model\SchedulingSchedulingShiftV1
```

Create Shift

Creates a new shift in the specified schedule.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$scheduling_create_scheduling_shift_request_v1 = new \BhrSdk\Model\SchedulingCreateSchedulingShiftRequestV1(); // \BhrSdk\Model\SchedulingCreateSchedulingShiftRequestV1

try {
    $result = $apiInstance->schedulingCreateShift($scheduling_create_scheduling_shift_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingCreateShift: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scheduling_create_scheduling_shift_request_v1** | [**\BhrSdk\Model\SchedulingCreateSchedulingShiftRequestV1**](../Model/SchedulingCreateSchedulingShiftRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\SchedulingSchedulingShiftV1**](../Model/SchedulingSchedulingShiftV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingDeleteSchedule()`

```php
schedulingDeleteSchedule($id)
```

Delete Schedule

Deletes a schedule by its UUID. Unworked shifts will be deleted as a result.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The schedule UUID

try {
    $apiInstance->schedulingDeleteSchedule($id);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingDeleteSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The schedule UUID | |

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

## `schedulingDeleteShift()`

```php
schedulingDeleteShift($id, $recurrence_edit_option)
```

Delete Shift

Deletes a shift by its UUID or composite recurrence ID. Use `recurrenceEditOption` to control the scope to delete one or many consecutive recurring shifts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The shift UUID, or the projected shift composite ID.
$recurrence_edit_option = future; // string | How should the shift be deleted? Choose 'instance' for deleting a single target shift,    'future' for deleting the target shift and all following shifts that are in the same recurrence,    'all' for deleting all shifts starting from now that are in the same recurrence as the target shift.

try {
    $apiInstance->schedulingDeleteShift($id, $recurrence_edit_option);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingDeleteShift: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The shift UUID, or the projected shift composite ID. | |
| **recurrence_edit_option** | **string**| How should the shift be deleted? Choose &#39;instance&#39; for deleting a single target shift,    &#39;future&#39; for deleting the target shift and all following shifts that are in the same recurrence,    &#39;all&#39; for deleting all shifts starting from now that are in the same recurrence as the target shift. | [optional] [default to &#39;instance&#39;] |

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

## `schedulingGetSchedule()`

```php
schedulingGetSchedule($id): \BhrSdk\Model\SchedulingScheduleV1
```

Get Schedule

Retrieves a specific schedule by its UUID. Schedules organize shifts for employees.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the schedule

try {
    $result = $apiInstance->schedulingGetSchedule($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingGetSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the schedule | |

### Return type

[**\BhrSdk\Model\SchedulingScheduleV1**](../Model/SchedulingScheduleV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingGetSchedulePdf()`

```php
schedulingGetSchedulePdf($id, $start_ymd, $end_ymd, $group_by, $employee_ids, $include_employees_without_shifts, $include_holidays, $include_time_off)
```

Get Schedule PDF

Generates and streams a PDF of the schedule view for the given schedule and date range.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The schedule ID
$start_ymd = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date in YYYY-MM-DD format
$end_ymd = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | End date in YYYY-MM-DD format
$group_by = 'group_by_example'; // string | Group employees by this field
$employee_ids = array('employee_ids_example'); // string[] | Filter by employee IDs. Pass the string \"null\" as an element to include open shifts.
$include_employees_without_shifts = false; // bool | Whether to include employees who have no shifts in the date range
$include_holidays = false; // bool | Whether to include holidays in the PDF
$include_time_off = false; // bool | Whether to include time-off entries in the PDF

try {
    $apiInstance->schedulingGetSchedulePdf($id, $start_ymd, $end_ymd, $group_by, $employee_ids, $include_employees_without_shifts, $include_holidays, $include_time_off);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingGetSchedulePdf: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The schedule ID | |
| **start_ymd** | **\DateTime**| Start date in YYYY-MM-DD format | |
| **end_ymd** | **\DateTime**| End date in YYYY-MM-DD format | |
| **group_by** | **string**| Group employees by this field | [optional] |
| **employee_ids** | [**string[]**](../Model/string.md)| Filter by employee IDs. Pass the string \&quot;null\&quot; as an element to include open shifts. | [optional] |
| **include_employees_without_shifts** | **bool**| Whether to include employees who have no shifts in the date range | [optional] [default to false] |
| **include_holidays** | **bool**| Whether to include holidays in the PDF | [optional] [default to false] |
| **include_time_off** | **bool**| Whether to include time-off entries in the PDF | [optional] [default to false] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingGetShift()`

```php
schedulingGetShift($id): \BhrSdk\Model\SchedulingSchedulingShiftV1
```

Get Shift

Retrieves a single shift by its UUID. Returns the full shift object including recurrence settings, assigned employee IDs, and status. Returns 404 if the shift does not exist or has been deleted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The shift uuid

try {
    $result = $apiInstance->schedulingGetShift($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingGetShift: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The shift uuid | |

### Return type

[**\BhrSdk\Model\SchedulingSchedulingShiftV1**](../Model/SchedulingSchedulingShiftV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingListSchedules()`

```php
schedulingListSchedules($filter, $sort, $page, $page_size): \BhrSdk\Model\SchedulingScheduleListResponseV1
```

List Schedules

Retrieves a paginated list of all schedules for the company. Supports optional OData-style filtering and sorting.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = 'filter_example'; // string | OData filter expression applied to schedules. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `id`, `name`, `locationId`, `timezone`, `startOfWeek`, `earlyClockInThreshold`, `createdAt`, `updatedAt`, `deletedAt`. Examples: `name eq 'Default Schedule'`, `deletedAt eq null`, `name eq 'Default Schedule' and locationId in (1, 2)`.
$sort = 'sort_example'; // string | Sorting options. Supported sorts are: name, locationId, timezone, startOfWeek, earlyClockInThreshold, createdAt, updatedAt, deletedAt
$page = 1; // int | The starting page for pagination
$page_size = 100; // int | The number of items to be returned

try {
    $result = $apiInstance->schedulingListSchedules($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingListSchedules: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData filter expression applied to schedules. Supported operators: &#x60;eq&#x60; (equals, use &#x60;eq null&#x60; to match NULL), &#x60;ne&#x60; (not equals, use &#x60;ne null&#x60; to match NOT NULL), &#x60;lt&#x60; (less than), &#x60;le&#x60; (less than or equal), &#x60;gt&#x60; (greater than), &#x60;ge&#x60; (greater than or equal), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Filterable fields: &#x60;id&#x60;, &#x60;name&#x60;, &#x60;locationId&#x60;, &#x60;timezone&#x60;, &#x60;startOfWeek&#x60;, &#x60;earlyClockInThreshold&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;, &#x60;deletedAt&#x60;. Examples: &#x60;name eq &#39;Default Schedule&#39;&#x60;, &#x60;deletedAt eq null&#x60;, &#x60;name eq &#39;Default Schedule&#39; and locationId in (1, 2)&#x60;. | [optional] |
| **sort** | **string**| Sorting options. Supported sorts are: name, locationId, timezone, startOfWeek, earlyClockInThreshold, createdAt, updatedAt, deletedAt | [optional] |
| **page** | **int**| The starting page for pagination | [optional] [default to 1] |
| **page_size** | **int**| The number of items to be returned | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\SchedulingScheduleListResponseV1**](../Model/SchedulingScheduleListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingListShifts()`

```php
schedulingListShifts($ids, $start, $end, $employee_ids, $schedule_ids, $statuses, $page, $page_size): \BhrSdk\Model\SchedulingShiftListResponseV1
```

List Shifts

Lists shifts matching the given filters. Either provide `ids` (ignores all other filters) or provide `start`, `end`, and at least one of `employeeIds` or `scheduleIds`. The time window must be no longer than 1 month. Defaults to returning planned and published shifts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = array('ids_example'); // string[] | Filter by shift IDs. If provided, other filters are ignored.
$start = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start datetime for the shift window (ISO-8601 datetime string). Required if ids not provided.
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | End datetime for the shift window (ISO-8601 datetime string). Required if ids not provided.
$employee_ids = array('employee_ids_example'); // string[] | Filter by employee IDs. Use the string \"null\" as a value to include unassigned shifts (e.g. employeeIds[]=10&employeeIds[]=null).
$schedule_ids = array('schedule_ids_example'); // string[] | Filter by schedule IDs.
$statuses = array('statuses_example'); // string[] | Filter by shift statuses.
$page = 1; // int | The starting page for pagination.
$page_size = 1000; // int | The number of items to be returned.

try {
    $result = $apiInstance->schedulingListShifts($ids, $start, $end, $employee_ids, $schedule_ids, $statuses, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingListShifts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ids** | [**string[]**](../Model/string.md)| Filter by shift IDs. If provided, other filters are ignored. | [optional] |
| **start** | **\DateTime**| Start datetime for the shift window (ISO-8601 datetime string). Required if ids not provided. | [optional] |
| **end** | **\DateTime**| End datetime for the shift window (ISO-8601 datetime string). Required if ids not provided. | [optional] |
| **employee_ids** | [**string[]**](../Model/string.md)| Filter by employee IDs. Use the string \&quot;null\&quot; as a value to include unassigned shifts (e.g. employeeIds[]&#x3D;10&amp;employeeIds[]&#x3D;null). | [optional] |
| **schedule_ids** | [**string[]**](../Model/string.md)| Filter by schedule IDs. | [optional] |
| **statuses** | [**string[]**](../Model/string.md)| Filter by shift statuses. | [optional] |
| **page** | **int**| The starting page for pagination. | [optional] [default to 1] |
| **page_size** | **int**| The number of items to be returned. | [optional] [default to 1000] |

### Return type

[**\BhrSdk\Model\SchedulingShiftListResponseV1**](../Model/SchedulingShiftListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingListTimezones()`

```php
schedulingListTimezones($filter, $sort, $page, $page_size): \BhrSdk\Model\SchedulingTimezoneListResponseV1
```

List Timezones

Returns a paginated list of timezones available for use when creating or editing schedules. Supports OData-style filtering on the `name` field.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = 'filter_example'; // string | OData filter expression applied to the `name` field. Supported operators: `eq` (exact match), `ne` (exclude), `and` (combine clauses). Supported string functions: `contains`, `startswith`, `endswith` (all case-insensitive). Not supported: `or`, `not`, parenthesized grouping. Examples: `name eq 'America/Denver'`, `name ne 'UTC'`, `contains(name, 'America')`, `startswith(name, 'US/')`, `endswith(name, 'York')`.
$sort = 'sort_example'; // string | Sorting options. Supported sort fields: `name` (alphabetical), `offset` (numeric UTC offset). Example: `name asc` or `offset desc`
$page = 1; // int | The starting page for pagination. Defaults to 1.
$page_size = 100; // int | The number of items to be returned. Defaults to 100.

try {
    $result = $apiInstance->schedulingListTimezones($filter, $sort, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingListTimezones: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData filter expression applied to the &#x60;name&#x60; field. Supported operators: &#x60;eq&#x60; (exact match), &#x60;ne&#x60; (exclude), &#x60;and&#x60; (combine clauses). Supported string functions: &#x60;contains&#x60;, &#x60;startswith&#x60;, &#x60;endswith&#x60; (all case-insensitive). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Examples: &#x60;name eq &#39;America/Denver&#39;&#x60;, &#x60;name ne &#39;UTC&#39;&#x60;, &#x60;contains(name, &#39;America&#39;)&#x60;, &#x60;startswith(name, &#39;US/&#39;)&#x60;, &#x60;endswith(name, &#39;York&#39;)&#x60;. | [optional] |
| **sort** | **string**| Sorting options. Supported sort fields: &#x60;name&#x60; (alphabetical), &#x60;offset&#x60; (numeric UTC offset). Example: &#x60;name asc&#x60; or &#x60;offset desc&#x60; | [optional] |
| **page** | **int**| The starting page for pagination. Defaults to 1. | [optional] [default to 1] |
| **page_size** | **int**| The number of items to be returned. Defaults to 100. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\SchedulingTimezoneListResponseV1**](../Model/SchedulingTimezoneListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingPublishShifts()`

```php
schedulingPublishShifts($scheduling_publish_shifts_request): \BhrSdk\Model\SchedulingPublishShiftsResultV1
```

Publish Shifts

Publishes one or more planned shifts, making them visible to employees. Shifts with scheduling conflicts are skipped and reported as failures. Returns 200 if all shifts succeed, 207 if some shifts failed due to conflicts, or 409 if all shifts failed due to conflicts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$scheduling_publish_shifts_request = new \BhrSdk\Model\SchedulingPublishShiftsRequest(); // \BhrSdk\Model\SchedulingPublishShiftsRequest

try {
    $result = $apiInstance->schedulingPublishShifts($scheduling_publish_shifts_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingPublishShifts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scheduling_publish_shifts_request** | [**\BhrSdk\Model\SchedulingPublishShiftsRequest**](../Model/SchedulingPublishShiftsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\SchedulingPublishShiftsResultV1**](../Model/SchedulingPublishShiftsResultV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingUpdateSchedule()`

```php
schedulingUpdateSchedule($id, $scheduling_update_schedule_request_v1): \BhrSdk\Model\SchedulingScheduleV1
```

Update Schedule

Partially updates an existing schedule by its UUID. Fields not provided retain their existing values.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The schedule UUID
$scheduling_update_schedule_request_v1 = new \BhrSdk\Model\SchedulingUpdateScheduleRequestV1(); // \BhrSdk\Model\SchedulingUpdateScheduleRequestV1

try {
    $result = $apiInstance->schedulingUpdateSchedule($id, $scheduling_update_schedule_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingUpdateSchedule: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The schedule UUID | |
| **scheduling_update_schedule_request_v1** | [**\BhrSdk\Model\SchedulingUpdateScheduleRequestV1**](../Model/SchedulingUpdateScheduleRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\SchedulingScheduleV1**](../Model/SchedulingScheduleV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `schedulingUpdateShift()`

```php
schedulingUpdateShift($id, $scheduling_update_scheduling_shift_request_v1): \BhrSdk\Model\SchedulingSchedulingShiftV1
```

Update Shift

Updates a shift by its UUID. Fields not provided will retain their existing values. For published shifts, changes are not applied directly — they are stored as pending (`unpublishedChanges`) and take effect when the shift is published. `recurrenceEditOption` is required when the shift already has recurrence settings; ALL and FUTURE edits propagate to published sibling occurrences the same way, staging changes rather than applying them immediately. Sibling shifts may be permanently removed if they no longer conform to changed recurrence fields.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\SchedulingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The shift uuid
$scheduling_update_scheduling_shift_request_v1 = new \BhrSdk\Model\SchedulingUpdateSchedulingShiftRequestV1(); // \BhrSdk\Model\SchedulingUpdateSchedulingShiftRequestV1

try {
    $result = $apiInstance->schedulingUpdateShift($id, $scheduling_update_scheduling_shift_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SchedulingApi->schedulingUpdateShift: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The shift uuid | |
| **scheduling_update_scheduling_shift_request_v1** | [**\BhrSdk\Model\SchedulingUpdateSchedulingShiftRequestV1**](../Model/SchedulingUpdateSchedulingShiftRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\SchedulingSchedulingShiftV1**](../Model/SchedulingSchedulingShiftV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
