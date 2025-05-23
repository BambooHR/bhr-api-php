# MySdk\TimeTrackingApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**b86bb5db603786dfc98c8f6a7bb1a218()**](TimeTrackingApi.md#b86bb5db603786dfc98c8f6a7bb1a218) | **POST** /{companyDomain}/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry |
| [**call149e00955713fb486cd7a81dd6ee31aa()**](TimeTrackingApi.md#call149e00955713fb486cd7a81dd6ee31aa) | **POST** /{companyDomain}/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries |
| [**call88ef63550f43537c6b3bfaa03d51d95d()**](TimeTrackingApi.md#call88ef63550f43537c6b3bfaa03d51d95d) | **POST** /{companyDomain}/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry |
| [**call910252128bfbd9d42e50f9dc31bb6120()**](TimeTrackingApi.md#call910252128bfbd9d42e50f9dc31bb6120) | **POST** /{companyDomain}/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries |
| [**call9a6d5660f03eadcf705c808a1f44b8c4()**](TimeTrackingApi.md#call9a6d5660f03eadcf705c808a1f44b8c4) | **GET** /{companyDomain}/v1/time_tracking/timesheet_entries | Get Timesheet Entries |
| [**db65bacaf29686d9c3b1296f6047a065()**](TimeTrackingApi.md#db65bacaf29686d9c3b1296f6047a065) | **POST** /{companyDomain}/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**dcb62a5d1780635153b978462f9debd0()**](TimeTrackingApi.md#dcb62a5d1780635153b978462f9debd0) | **POST** /{companyDomain}/v1/time_tracking/clock_entries/delete | Delete timesheet clock entries. |


## `b86bb5db603786dfc98c8f6a7bb1a218()`

```php
b86bb5db603786dfc98c8f6a7bb1a218($company_domain, $employee_id, $b86bb5db603786dfc98c8f6a7bb1a218_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | ID of the employee to clock in.
$b86bb5db603786dfc98c8f6a7bb1a218_request = new \MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request(); // \MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request

try {
    $result = $apiInstance->b86bb5db603786dfc98c8f6a7bb1a218($company_domain, $employee_id, $b86bb5db603786dfc98c8f6a7bb1a218_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->b86bb5db603786dfc98c8f6a7bb1a218: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| ID of the employee to clock in. | |
| **b86bb5db603786dfc98c8f6a7bb1a218_request** | [**\MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request**](../Model/B86bb5db603786dfc98c8f6a7bb1a218Request.md)|  | [optional] |

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

## `call149e00955713fb486cd7a81dd6ee31aa()`

```php
call149e00955713fb486cd7a81dd6ee31aa($company_domain, $_149e00955713fb486cd7a81dd6ee31aa_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_149e00955713fb486cd7a81dd6ee31aa_request = new \MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest(); // \MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest

try {
    $result = $apiInstance->call149e00955713fb486cd7a81dd6ee31aa($company_domain, $_149e00955713fb486cd7a81dd6ee31aa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call149e00955713fb486cd7a81dd6ee31aa: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_149e00955713fb486cd7a81dd6ee31aa_request** | [**\MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest**](../Model/149e00955713fb486cd7a81dd6ee31aaRequest.md)|  | [optional] |

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

## `call88ef63550f43537c6b3bfaa03d51d95d()`

```php
call88ef63550f43537c6b3bfaa03d51d95d($company_domain, $employee_id, $_88ef63550f43537c6b3bfaa03d51d95d_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | ID of the employee to clock out.
$_88ef63550f43537c6b3bfaa03d51d95d_request = new \MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest(); // \MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest

try {
    $result = $apiInstance->call88ef63550f43537c6b3bfaa03d51d95d($company_domain, $employee_id, $_88ef63550f43537c6b3bfaa03d51d95d_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call88ef63550f43537c6b3bfaa03d51d95d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| ID of the employee to clock out. | |
| **_88ef63550f43537c6b3bfaa03d51d95d_request** | [**\MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest**](../Model/88ef63550f43537c6b3bfaa03d51d95dRequest.md)|  | [optional] |

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

## `call910252128bfbd9d42e50f9dc31bb6120()`

```php
call910252128bfbd9d42e50f9dc31bb6120($company_domain, $_910252128bfbd9d42e50f9dc31bb6120_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_910252128bfbd9d42e50f9dc31bb6120_request = new \MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request(); // \MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request

try {
    $result = $apiInstance->call910252128bfbd9d42e50f9dc31bb6120($company_domain, $_910252128bfbd9d42e50f9dc31bb6120_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call910252128bfbd9d42e50f9dc31bb6120: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_910252128bfbd9d42e50f9dc31bb6120_request** | [**\MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request**](../Model/910252128bfbd9d42e50f9dc31bb6120Request.md)|  | [optional] |

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

## `call9a6d5660f03eadcf705c808a1f44b8c4()`

```php
call9a6d5660f03eadcf705c808a1f44b8c4($company_domain, $start, $end, $employee_ids): \MySdk\Model\EmployeeTimesheetEntryTransformer[]
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$start = Tue Dec 31 17:00:00 MST 2024; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days.
$end = Fri Feb 28 17:00:00 MST 2025; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days.
$employee_ids = 1,2,3; // string | A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned.

try {
    $result = $apiInstance->call9a6d5660f03eadcf705c808a1f44b8c4($company_domain, $start, $end, $employee_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->call9a6d5660f03eadcf705c808a1f44b8c4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
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

## `db65bacaf29686d9c3b1296f6047a065()`

```php
db65bacaf29686d9c3b1296f6047a065($company_domain, $db65bacaf29686d9c3b1296f6047a065_request): mixed
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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$db65bacaf29686d9c3b1296f6047a065_request = new \MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request(); // \MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request

try {
    $result = $apiInstance->db65bacaf29686d9c3b1296f6047a065($company_domain, $db65bacaf29686d9c3b1296f6047a065_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->db65bacaf29686d9c3b1296f6047a065: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **db65bacaf29686d9c3b1296f6047a065_request** | [**\MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request**](../Model/Db65bacaf29686d9c3b1296f6047a065Request.md)|  | [optional] |

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

## `dcb62a5d1780635153b978462f9debd0()`

```php
dcb62a5d1780635153b978462f9debd0($company_domain, $dcb62a5d1780635153b978462f9debd0_request): mixed
```

Delete timesheet clock entries.

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dcb62a5d1780635153b978462f9debd0_request = new \MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request(); // \MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request

try {
    $result = $apiInstance->dcb62a5d1780635153b978462f9debd0($company_domain, $dcb62a5d1780635153b978462f9debd0_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimeTrackingApi->dcb62a5d1780635153b978462f9debd0: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dcb62a5d1780635153b978462f9debd0_request** | [**\MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request**](../Model/Dcb62a5d1780635153b978462f9debd0Request.md)|  | |

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
