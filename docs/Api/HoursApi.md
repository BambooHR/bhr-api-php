# MySdk\HoursApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**call22067048cf6eec230a865765a18ad7b8()**](HoursApi.md#call22067048cf6eec230a865765a18ad7b8) | **PUT** /api/v1/timetracking/adjust | Edit Hour Record |
| [**call717faf6067928c3497fc9acbf5b91767()**](HoursApi.md#call717faf6067928c3497fc9acbf5b91767) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record |
| [**call889a4c2de70a53c5ab8cb32f1c2243f5()**](HoursApi.md#call889a4c2de70a53c5ab8cb32f1c2243f5) | **GET** /api/v1/timetracking/record/{id} | Get Hour Record |
| [**e2ae6e59655aeab2b4e6311967a2809f()**](HoursApi.md#e2ae6e59655aeab2b4e6311967a2809f) | **POST** /api/v1/timetracking/add | Add Hour Record |
| [**f54bcaec6771b1264671e53f2e557b1f()**](HoursApi.md#f54bcaec6771b1264671e53f2e557b1f) | **POST** /api/v1/timetracking/record | Add/Edit Hour Records |


## `call22067048cf6eec230a865765a18ad7b8()`

```php
call22067048cf6eec230a865765a18ad7b8($_22067048cf6eec230a865765a18ad7b8_request): mixed
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
$_22067048cf6eec230a865765a18ad7b8_request = new \MySdk\Model\22067048cf6eec230a865765a18ad7b8Request(); // \MySdk\Model\22067048cf6eec230a865765a18ad7b8Request

try {
    $result = $apiInstance->call22067048cf6eec230a865765a18ad7b8($_22067048cf6eec230a865765a18ad7b8_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call22067048cf6eec230a865765a18ad7b8: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_22067048cf6eec230a865765a18ad7b8_request** | [**\MySdk\Model\22067048cf6eec230a865765a18ad7b8Request**](../Model/22067048cf6eec230a865765a18ad7b8Request.md)|  | |

### Return type

**mixed**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call717faf6067928c3497fc9acbf5b91767()`

```php
call717faf6067928c3497fc9acbf5b91767($id): \MySdk\Model\F54bcaec6771b1264671e53f2e557b1f201ResponseResponse
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
    $result = $apiInstance->call717faf6067928c3497fc9acbf5b91767($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call717faf6067928c3497fc9acbf5b91767: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). | |

### Return type

[**\MySdk\Model\F54bcaec6771b1264671e53f2e557b1f201ResponseResponse**](../Model/F54bcaec6771b1264671e53f2e557b1f201ResponseResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call889a4c2de70a53c5ab8cb32f1c2243f5()`

```php
call889a4c2de70a53c5ab8cb32f1c2243f5($id): \MySdk\Model\Model889a4c2de70a53c5ab8cb32f1c2243f5200Response
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
    $result = $apiInstance->call889a4c2de70a53c5ab8cb32f1c2243f5($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call889a4c2de70a53c5ab8cb32f1c2243f5: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is the time tracking ID used to originally create the record. | |

### Return type

[**\MySdk\Model\Model889a4c2de70a53c5ab8cb32f1c2243f5200Response**](../Model/889a4c2de70a53c5ab8cb32f1c2243f5200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `e2ae6e59655aeab2b4e6311967a2809f()`

```php
e2ae6e59655aeab2b4e6311967a2809f($time_tracking_record): \MySdk\Model\E2ae6e59655aeab2b4e6311967a2809f201Response
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
    $result = $apiInstance->e2ae6e59655aeab2b4e6311967a2809f($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->e2ae6e59655aeab2b4e6311967a2809f: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\E2ae6e59655aeab2b4e6311967a2809f201Response**](../Model/E2ae6e59655aeab2b4e6311967a2809f201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f54bcaec6771b1264671e53f2e557b1f()`

```php
f54bcaec6771b1264671e53f2e557b1f($time_tracking_record): \MySdk\Model\F54bcaec6771b1264671e53f2e557b1f201Response
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
    $result = $apiInstance->f54bcaec6771b1264671e53f2e557b1f($time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->f54bcaec6771b1264671e53f2e557b1f: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord[]**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\F54bcaec6771b1264671e53f2e557b1f201Response**](../Model/F54bcaec6771b1264671e53f2e557b1f201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
