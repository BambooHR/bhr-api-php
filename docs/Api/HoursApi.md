# BhrSdk\HoursApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createOrUpdateTimeTrackingHourRecords()**](HoursApi.md#createOrUpdateTimeTrackingHourRecords) | **POST** /api/v1/timetracking/record | Create or Update Hour Records |
| [**createTimeTrackingHourRecord()**](HoursApi.md#createTimeTrackingHourRecord) | **POST** /api/v1/timetracking/add | Create Hour Record |
| [**deleteTimeTrackingHourRecord()**](HoursApi.md#deleteTimeTrackingHourRecord) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record |
| [**getTimeTrackingRecord()**](HoursApi.md#getTimeTrackingRecord) | **GET** /api/v1/timetracking/record/{id} | Get Time Tracking Record |
| [**updateTimeTrackingRecord()**](HoursApi.md#updateTimeTrackingRecord) | **PUT** /api/v1/timetracking/adjust | Update Hour Record |


## `createOrUpdateTimeTrackingHourRecords()`

```php
createOrUpdateTimeTrackingHourRecords($time_tracking_record): \BhrSdk\Model\TimeTrackingBulkResponseSchema
```

Create or Update Hour Records

Bulk add/edit hour records. The endpoint can return HTTP 201 even when individual items fail validation; inspect each item's `success` flag and per-item `response.message` for partial failures.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_record = array(new \BhrSdk\Model\TimeTrackingRecord()); // \BhrSdk\Model\TimeTrackingRecord[]

try {
    $result = $apiInstance->createOrUpdateTimeTrackingHourRecords($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->createOrUpdateTimeTrackingHourRecords: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\BhrSdk\Model\TimeTrackingRecord[]**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingBulkResponseSchema**](../Model/TimeTrackingBulkResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTimeTrackingHourRecord()`

```php
createTimeTrackingHourRecord($time_tracking_record): \BhrSdk\Model\TimeTrackingIdResponseSchema
```

Create Hour Record

Adds a single hour record. Use this endpoint when creating one record at a time. For bulk imports, use create-or-update-time-tracking-hour-records.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_record = new \BhrSdk\Model\TimeTrackingRecord(); // \BhrSdk\Model\TimeTrackingRecord

try {
    $result = $apiInstance->createTimeTrackingHourRecord($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->createTimeTrackingHourRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\BhrSdk\Model\TimeTrackingRecord**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingIdResponseSchema**](../Model/TimeTrackingIdResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTimeTrackingHourRecord()`

```php
deleteTimeTrackingHourRecord($id): \BhrSdk\Model\TimeTrackingDeleteResponseSchema
```

Delete Hour Record

Deletes an hour record by `timeTrackingId` (`id` path parameter). This removes all stored revisions associated with that logical time tracking record. Not-found and invalid-id cases are currently returned as a 400 invalid-argument response for backward compatibility.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID).

try {
    $result = $apiInstance->deleteTimeTrackingHourRecord($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->deleteTimeTrackingHourRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). | |

### Return type

[**\BhrSdk\Model\TimeTrackingDeleteResponseSchema**](../Model/TimeTrackingDeleteResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeTrackingRecord()`

```php
getTimeTrackingRecord($id): \BhrSdk\Model\TimeTrackingRecordSchema
```

Get Time Tracking Record

Retrieves a single time tracking hour record by its ID. Returns the full record details including hours, date, employee, project, task, and shift differential information. The `project` and `shiftDifferential` fields are null when not applicable. For historical compatibility, missing records may surface as an empty/null payload rather than a strict not-found response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The time tracking record ID used to originally create the record.

try {
    $result = $apiInstance->getTimeTrackingRecord($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->getTimeTrackingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking record ID used to originally create the record. | |

### Return type

[**\BhrSdk\Model\TimeTrackingRecordSchema**](../Model/TimeTrackingRecordSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTimeTrackingRecord()`

```php
updateTimeTrackingRecord($adjust_time_tracking_request_schema): \BhrSdk\Model\TimeTrackingIdResponseSchema
```

Update Hour Record

Edits an existing hour record by `timeTrackingId`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$adjust_time_tracking_request_schema = new \BhrSdk\Model\AdjustTimeTrackingRequestSchema(); // \BhrSdk\Model\AdjustTimeTrackingRequestSchema

try {
    $result = $apiInstance->updateTimeTrackingRecord($adjust_time_tracking_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->updateTimeTrackingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **adjust_time_tracking_request_schema** | [**\BhrSdk\Model\AdjustTimeTrackingRequestSchema**](../Model/AdjustTimeTrackingRequestSchema.md)|  | |

### Return type

[**\BhrSdk\Model\TimeTrackingIdResponseSchema**](../Model/TimeTrackingIdResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
