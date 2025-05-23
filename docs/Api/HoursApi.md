# MySdk\HoursApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**call0f428442e53dc46d1e2c8ff5b7a483a8()**](HoursApi.md#call0f428442e53dc46d1e2c8ff5b7a483a8) | **POST** /{companyDomain}/v1/timetracking/record | addTimeTrackingBulk |
| [**call14e73aef978eb81d51fdbd74e0e83823()**](HoursApi.md#call14e73aef978eb81d51fdbd74e0e83823) | **PUT** /{companyDomain}/v1/timetracking/adjust | adjustTimeTracking |
| [**call5e1c5b4ef12e61d1bc975e8b4e00c38d()**](HoursApi.md#call5e1c5b4ef12e61d1bc975e8b4e00c38d) | **GET** /{companyDomain}/v1/timetracking/record/{id} | getTimeTrackingByTimeTrackingId |
| [**call69c777478f5d52dee1b4f0937dca154f()**](HoursApi.md#call69c777478f5d52dee1b4f0937dca154f) | **POST** /{companyDomain}/v1/timetracking/add | addTimeTracking |
| [**f97efc203b25647724accb9da7dda7db()**](HoursApi.md#f97efc203b25647724accb9da7dda7db) | **DELETE** /{companyDomain}/v1/timetracking/delete/{id} | deleteTimeTrackingByTimeTrackingId |


## `call0f428442e53dc46d1e2c8ff5b7a483a8()`

```php
call0f428442e53dc46d1e2c8ff5b7a483a8($company_domain, $time_tracking_record): \MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201Response
```

addTimeTrackingBulk

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$time_tracking_record = array(new \MySdk\Model\TimeTrackingRecord()); // \MySdk\Model\TimeTrackingRecord[]

try {
    $result = $apiInstance->call0f428442e53dc46d1e2c8ff5b7a483a8($company_domain, $time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call0f428442e53dc46d1e2c8ff5b7a483a8: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord[]**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201Response**](../Model/0f428442e53dc46d1e2c8ff5b7a483a8201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call14e73aef978eb81d51fdbd74e0e83823()`

```php
call14e73aef978eb81d51fdbd74e0e83823($company_domain, $_14e73aef978eb81d51fdbd74e0e83823_request): mixed
```

adjustTimeTracking

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_14e73aef978eb81d51fdbd74e0e83823_request = new \MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request(); // \MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request

try {
    $result = $apiInstance->call14e73aef978eb81d51fdbd74e0e83823($company_domain, $_14e73aef978eb81d51fdbd74e0e83823_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call14e73aef978eb81d51fdbd74e0e83823: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_14e73aef978eb81d51fdbd74e0e83823_request** | [**\MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request**](../Model/14e73aef978eb81d51fdbd74e0e83823Request.md)|  | |

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

## `call5e1c5b4ef12e61d1bc975e8b4e00c38d()`

```php
call5e1c5b4ef12e61d1bc975e8b4e00c38d($company_domain, $id): \MySdk\Model\Model5e1c5b4ef12e61d1bc975e8b4e00c38d200Response
```

getTimeTrackingByTimeTrackingId

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the time tracking ID used to originally create the record.

try {
    $result = $apiInstance->call5e1c5b4ef12e61d1bc975e8b4e00c38d($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call5e1c5b4ef12e61d1bc975e8b4e00c38d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the time tracking ID used to originally create the record. | |

### Return type

[**\MySdk\Model\Model5e1c5b4ef12e61d1bc975e8b4e00c38d200Response**](../Model/5e1c5b4ef12e61d1bc975e8b4e00c38d200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call69c777478f5d52dee1b4f0937dca154f()`

```php
call69c777478f5d52dee1b4f0937dca154f($company_domain, $time_tracking_record): \MySdk\Model\Model69c777478f5d52dee1b4f0937dca154f201Response
```

addTimeTracking

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$time_tracking_record = new \MySdk\Model\TimeTrackingRecord(); // \MySdk\Model\TimeTrackingRecord

try {
    $result = $apiInstance->call69c777478f5d52dee1b4f0937dca154f($company_domain, $time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->call69c777478f5d52dee1b4f0937dca154f: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\Model69c777478f5d52dee1b4f0937dca154f201Response**](../Model/69c777478f5d52dee1b4f0937dca154f201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f97efc203b25647724accb9da7dda7db()`

```php
f97efc203b25647724accb9da7dda7db($company_domain, $id): \MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse
```

deleteTimeTrackingByTimeTrackingId

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
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID).

try {
    $result = $apiInstance->f97efc203b25647724accb9da7dda7db($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HoursApi->f97efc203b25647724accb9da7dda7db: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). | |

### Return type

[**\MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse**](../Model/0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
