# MySdk\TimeTrackingApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ca54fa4c1d42864a2540f7f7600e0d65()**](TimeTrackingApi.md#ca54fa4c1d42864a2540f7f7600e0d65) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry |
| [**call134f6593587d7195536c151bd65eb6d5()**](TimeTrackingApi.md#call134f6593587d7195536c151bd65eb6d5) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries |
| [**call3b7487d1d17551f6c3e2567b96089ce1()**](TimeTrackingApi.md#call3b7487d1d17551f6c3e2567b96089ce1) | **POST** /api/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries |
| [**call408a4478cbd2b1b5811ba6228e2898df()**](TimeTrackingApi.md#call408a4478cbd2b1b5811ba6228e2898df) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries |
| [**call43c7cc099ca54295a047f449824fc0dd()**](TimeTrackingApi.md#call43c7cc099ca54295a047f449824fc0dd) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry |
| [**call7bb9fedfad942b8839bc61a125e7c255()**](TimeTrackingApi.md#call7bb9fedfad942b8839bc61a125e7c255) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**e9a47e93524609b981be6139822d219e()**](TimeTrackingApi.md#e9a47e93524609b981be6139822d219e) | **POST** /api/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries |
| [**f7dd45b1747b0b72c4b617845b065a07()**](TimeTrackingApi.md#f7dd45b1747b0b72c4b617845b065a07) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project |


## `ca54fa4c1d42864a2540f7f7600e0d65()`

```php
ca54fa4c1d42864a2540f7f7600e0d65($employee_id, $ca54fa4c1d42864a2540f7f7600e0d65_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
```

Add Timesheet Clock-Out Entry

Clock out an employee.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of the employee to clock out.
$ca54fa4c1d42864a2540f7f7600e0d65_request = new \MySdk\Model\Ca54fa4c1d42864a2540f7f7600e0d65Request(); // \MySdk\Model\Ca54fa4c1d42864a2540f7f7600e0d65Request

try {
    $result = $apiInstance->ca54fa4c1d42864a2540f7f7600e0d65($employee_id, $ca54fa4c1d42864a2540f7f7600e0d65_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->ca54fa4c1d42864a2540f7f7600e0d65: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| ID of the employee to clock out. | |
| **ca54fa4c1d42864a2540f7f7600e0d65_request** | [**\MySdk\Model\Ca54fa4c1d42864a2540f7f7600e0d65Request**](../Model/Ca54fa4c1d42864a2540f7f7600e0d65Request.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call134f6593587d7195536c151bd65eb6d5()`

```php
call134f6593587d7195536c151bd65eb6d5($start, $end, $employee_ids): \MySdk\Model\EmployeeTimesheetEntryTransformer[]
```

Get Timesheet Entries

Get all timesheet entries for a given period of time.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = 2025-01-01; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days.
$end = 2025-03-01; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days.
$employee_ids = 1,2,3; // string | A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned.

try {
    $result = $apiInstance->call134f6593587d7195536c151bd65eb6d5($start, $end, $employee_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call134f6593587d7195536c151bd65eb6d5: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days. | |
| **end** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days. | |
| **employee_ids** | **string**| A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned. | [optional] |

### Return type

[**\MySdk\Model\EmployeeTimesheetEntryTransformer[]**](../Model/EmployeeTimesheetEntryTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call3b7487d1d17551f6c3e2567b96089ce1()`

```php
call3b7487d1d17551f6c3e2567b96089ce1($_3b7487d1d17551f6c3e2567b96089ce1_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
```

Add/Edit Timesheet Clock Entries

Add or edit timesheet clock entries.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$_3b7487d1d17551f6c3e2567b96089ce1_request = new \MySdk\Model\3b7487d1d17551f6c3e2567b96089ce1Request(); // \MySdk\Model\3b7487d1d17551f6c3e2567b96089ce1Request

try {
    $result = $apiInstance->call3b7487d1d17551f6c3e2567b96089ce1($_3b7487d1d17551f6c3e2567b96089ce1_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call3b7487d1d17551f6c3e2567b96089ce1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_3b7487d1d17551f6c3e2567b96089ce1_request** | [**\MySdk\Model\3b7487d1d17551f6c3e2567b96089ce1Request**](../Model/3b7487d1d17551f6c3e2567b96089ce1Request.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call408a4478cbd2b1b5811ba6228e2898df()`

```php
call408a4478cbd2b1b5811ba6228e2898df($_408a4478cbd2b1b5811ba6228e2898df_request): mixed
```

Delete Timesheet Clock Entries

Delete timesheet clock entries.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$_408a4478cbd2b1b5811ba6228e2898df_request = new \MySdk\Model\408a4478cbd2b1b5811ba6228e2898dfRequest(); // \MySdk\Model\408a4478cbd2b1b5811ba6228e2898dfRequest

try {
    $result = $apiInstance->call408a4478cbd2b1b5811ba6228e2898df($_408a4478cbd2b1b5811ba6228e2898df_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call408a4478cbd2b1b5811ba6228e2898df: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_408a4478cbd2b1b5811ba6228e2898df_request** | [**\MySdk\Model\408a4478cbd2b1b5811ba6228e2898dfRequest**](../Model/408a4478cbd2b1b5811ba6228e2898dfRequest.md)|  | |

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

## `call43c7cc099ca54295a047f449824fc0dd()`

```php
call43c7cc099ca54295a047f449824fc0dd($employee_id, $_43c7cc099ca54295a047f449824fc0dd_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
```

Add Timesheet Clock-In Entry

Clock in an employee.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of the employee to clock in.
$_43c7cc099ca54295a047f449824fc0dd_request = new \MySdk\Model\43c7cc099ca54295a047f449824fc0ddRequest(); // \MySdk\Model\43c7cc099ca54295a047f449824fc0ddRequest

try {
    $result = $apiInstance->call43c7cc099ca54295a047f449824fc0dd($employee_id, $_43c7cc099ca54295a047f449824fc0dd_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call43c7cc099ca54295a047f449824fc0dd: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| ID of the employee to clock in. | |
| **_43c7cc099ca54295a047f449824fc0dd_request** | [**\MySdk\Model\43c7cc099ca54295a047f449824fc0ddRequest**](../Model/43c7cc099ca54295a047f449824fc0ddRequest.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call7bb9fedfad942b8839bc61a125e7c255()`

```php
call7bb9fedfad942b8839bc61a125e7c255($_7bb9fedfad942b8839bc61a125e7c255_request): mixed
```

Delete Timesheet Hour Entries

Delete timesheet hour entries.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$_7bb9fedfad942b8839bc61a125e7c255_request = new \MySdk\Model\7bb9fedfad942b8839bc61a125e7c255Request(); // \MySdk\Model\7bb9fedfad942b8839bc61a125e7c255Request

try {
    $result = $apiInstance->call7bb9fedfad942b8839bc61a125e7c255($_7bb9fedfad942b8839bc61a125e7c255_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call7bb9fedfad942b8839bc61a125e7c255: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **_7bb9fedfad942b8839bc61a125e7c255_request** | [**\MySdk\Model\7bb9fedfad942b8839bc61a125e7c255Request**](../Model/7bb9fedfad942b8839bc61a125e7c255Request.md)|  | [optional] |

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

## `e9a47e93524609b981be6139822d219e()`

```php
e9a47e93524609b981be6139822d219e($e9a47e93524609b981be6139822d219e_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
```

Add/Edit Timesheet Hour Entries

Add or edit timesheet hour entries.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$e9a47e93524609b981be6139822d219e_request = new \MySdk\Model\E9a47e93524609b981be6139822d219eRequest(); // \MySdk\Model\E9a47e93524609b981be6139822d219eRequest

try {
    $result = $apiInstance->e9a47e93524609b981be6139822d219e($e9a47e93524609b981be6139822d219e_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->e9a47e93524609b981be6139822d219e: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **e9a47e93524609b981be6139822d219e_request** | [**\MySdk\Model\E9a47e93524609b981be6139822d219eRequest**](../Model/E9a47e93524609b981be6139822d219eRequest.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f7dd45b1747b0b72c4b617845b065a07()`

```php
f7dd45b1747b0b72c4b617845b065a07($f7dd45b1747b0b72c4b617845b065a07_request): \MySdk\Model\TimeTrackingProjectWithTasksAndEmployeeIds
```

Create Time Tracking Project

Create a time tracking project with optional tasks.

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


$apiInstance = new MySdk\Api\TimeTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$f7dd45b1747b0b72c4b617845b065a07_request = new \MySdk\Model\F7dd45b1747b0b72c4b617845b065a07Request(); // \MySdk\Model\F7dd45b1747b0b72c4b617845b065a07Request

try {
    $result = $apiInstance->f7dd45b1747b0b72c4b617845b065a07($f7dd45b1747b0b72c4b617845b065a07_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->f7dd45b1747b0b72c4b617845b065a07: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **f7dd45b1747b0b72c4b617845b065a07_request** | [**\MySdk\Model\F7dd45b1747b0b72c4b617845b065a07Request**](../Model/F7dd45b1747b0b72c4b617845b065a07Request.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimeTrackingProjectWithTasksAndEmployeeIds**](../Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
