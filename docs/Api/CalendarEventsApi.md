# BhrSdk\CalendarEventsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**listCalendarEvents()**](CalendarEventsApi.md#listCalendarEvents) | **GET** /api/v1/calendar-events | List Calendar Events |


## `listCalendarEvents()`

```php
listCalendarEvents($start, $end, $filter, $direct_reports_only, $include_persons, $page, $page_size): \BhrSdk\Model\CalendarCalendarEventsListResponseV1
```

List Calendar Events

Lists calendar events (time off, holidays, birthdays, and anniversaries) overlapping the requested date range. Events are sorted by start ascending, then type ascending (ANNIVERSARY, BIRTHDAY, HOLIDAY, TIME_OFF), then id ascending. TIME_OFF events represent approved requests only. Events the caller cannot view are silently omitted.  OAuth Scopes: calendar:events

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CalendarEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Inclusive start date (YYYY-MM-DD). Interpreted in the company timezone.
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Inclusive end date (YYYY-MM-DD). Must be on or after start; the range must span less than one year.
$filter = 'filter_example'; // string | OData filter expression applied to calendar events. Supported operators: `eq` (equals), `in` (value in list), `and` (combine clauses). Filterable fields: `type` (one of `TIME_OFF`, `HOLIDAY`, `BIRTHDAY`, `ANNIVERSARY`), `employeeId` (int), `department` (int), `division` (int), `location` (int). Per-employee filters have no effect on HOLIDAY events. Example: `type in ('TIME_OFF','HOLIDAY') and department in (10,20)`.
$direct_reports_only = false; // bool | When true, restrict employee-bound events to the caller's direct reports. HOLIDAY events are unaffected. Callers with no direct reports receive an empty result for employee-bound types.
$include_persons = false; // bool | When true, embed a persons map (keyed by employee id) alongside the events.
$page = 1; // int | The page number to retrieve.
$page_size = 100; // int | The number of items to return per page.

try {
    $result = $apiInstance->listCalendarEvents($start, $end, $filter, $direct_reports_only, $include_persons, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CalendarEventsApi->listCalendarEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| Inclusive start date (YYYY-MM-DD). Interpreted in the company timezone. | |
| **end** | **\DateTime**| Inclusive end date (YYYY-MM-DD). Must be on or after start; the range must span less than one year. | |
| **filter** | **string**| OData filter expression applied to calendar events. Supported operators: &#x60;eq&#x60; (equals), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Filterable fields: &#x60;type&#x60; (one of &#x60;TIME_OFF&#x60;, &#x60;HOLIDAY&#x60;, &#x60;BIRTHDAY&#x60;, &#x60;ANNIVERSARY&#x60;), &#x60;employeeId&#x60; (int), &#x60;department&#x60; (int), &#x60;division&#x60; (int), &#x60;location&#x60; (int). Per-employee filters have no effect on HOLIDAY events. Example: &#x60;type in (&#39;TIME_OFF&#39;,&#39;HOLIDAY&#39;) and department in (10,20)&#x60;. | [optional] |
| **direct_reports_only** | **bool**| When true, restrict employee-bound events to the caller&#39;s direct reports. HOLIDAY events are unaffected. Callers with no direct reports receive an empty result for employee-bound types. | [optional] [default to false] |
| **include_persons** | **bool**| When true, embed a persons map (keyed by employee id) alongside the events. | [optional] [default to false] |
| **page** | **int**| The page number to retrieve. | [optional] [default to 1] |
| **page_size** | **int**| The number of items to return per page. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\CalendarCalendarEventsListResponseV1**](../Model/CalendarCalendarEventsListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
