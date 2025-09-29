# MySdk\HoursApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addTimeTrackingBulk()**](HoursApi.md#addTimeTrackingBulk) | **POST** /api/v1/timetracking/record | Add/Edit Hour Records |
| [**addTimeTrackingHourRecord()**](HoursApi.md#addTimeTrackingHourRecord) | **POST** /api/v1/timetracking/add | Add Hour Record |
| [**deleteTimeTrackingById()**](HoursApi.md#deleteTimeTrackingById) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record |
| [**editTimeTrackingRecord()**](HoursApi.md#editTimeTrackingRecord) | **PUT** /api/v1/timetracking/adjust | Edit Hour Record |
| [**getTimeTrackingRecord()**](HoursApi.md#getTimeTrackingRecord) | **GET** /api/v1/timetracking/record/{id} | Get Hour Record |


## `addTimeTrackingBulk()`

```php
addTimeTrackingBulk($time_tracking_record): \MySdk\Model\TimeTrackingBulkResponseSchema
```

Add/Edit Hour Records

Bulk add/edit hour records

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_record = array(new \MySdk\Model\TimeTrackingRecord()); // \MySdk\Model\TimeTrackingRecord[]

try {
    $result = $apiInstance->addTimeTrackingBulk($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->addTimeTrackingBulk: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord[]**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\TimeTrackingBulkResponseSchema**](../Model/TimeTrackingBulkResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTimeTrackingHourRecord()`

```php
addTimeTrackingHourRecord($time_tracking_record): \MySdk\Model\TimeTrackingIdResponseSchema
```

Add Hour Record

Add an hour record

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$time_tracking_record = new \MySdk\Model\TimeTrackingRecord(); // \MySdk\Model\TimeTrackingRecord

try {
    $result = $apiInstance->addTimeTrackingHourRecord($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->addTimeTrackingHourRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\TimeTrackingIdResponseSchema**](../Model/TimeTrackingIdResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTimeTrackingById()`

```php
deleteTimeTrackingById($id): \MySdk\Model\TimeTrackingDeleteResponseSchema
```

Delete Hour Record

Delete an hour record

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID).

try {
    $result = $apiInstance->deleteTimeTrackingById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->deleteTimeTrackingById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). | |

### Return type

[**\MySdk\Model\TimeTrackingDeleteResponseSchema**](../Model/TimeTrackingDeleteResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editTimeTrackingRecord()`

```php
editTimeTrackingRecord($adjust_time_tracking_request_schema): \MySdk\Model\TimeTrackingIdResponseSchema
```

Edit Hour Record

Edit an hour record

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$adjust_time_tracking_request_schema = new \MySdk\Model\AdjustTimeTrackingRequestSchema(); // \MySdk\Model\AdjustTimeTrackingRequestSchema

try {
    $result = $apiInstance->editTimeTrackingRecord($adjust_time_tracking_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->editTimeTrackingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **adjust_time_tracking_request_schema** | [**\MySdk\Model\AdjustTimeTrackingRequestSchema**](../Model/AdjustTimeTrackingRequestSchema.md)|  | |

### Return type

[**\MySdk\Model\TimeTrackingIdResponseSchema**](../Model/TimeTrackingIdResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTimeTrackingRecord()`

```php
getTimeTrackingRecord($id): \MySdk\Model\TimeTrackingRecordSchema
```

Get Hour Record

Get an hour record

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

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\HoursApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | {id} is the time tracking ID used to originally create the record.

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
| **id** | **string**| {id} is the time tracking ID used to originally create the record. | |

### Return type

[**\MySdk\Model\TimeTrackingRecordSchema**](../Model/TimeTrackingRecordSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
