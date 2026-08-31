# BhrSdk\LoginApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**login()**](LoginApi.md#login) | **POST** /api/v1/login | Login |


## `login()`

```php
login($application_key, $user, $password, $accept_header_parameter, $format, $device_id): \BhrSdk\Model\LoginResponse
```

Login

Exchanges username, password, and application key for a persistent API key scoped to that user and application. No pre-existing authentication is required; credentials are passed in the request body. On success, returns a persistent API key, the authenticated user ID, the linked employee ID (null when no employee record is associated), and the base API URL to use for subsequent requests.  This endpoint is deprecated. New integrations should prefer OAuth or OpenID Connect instead.  `applicationKey` must correspond to a registered non-mobile application; iOS and Android app keys are explicitly rejected with a 403 (no body). The optional `deviceId` associates the generated key with a specific device.  Response format is determined by the `Accept` request header. Send `Accept: application/json` to receive JSON; omit the header or send any other value to receive XML. Alternatively, set `?format=json` in the query string to force JSON regardless of the `Accept` header.  Note: If the company has SSO enabled and password login is disabled, this endpoint returns HTTP 200 with a plain-text error message rather than a structured error response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BhrSdk\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$application_key = 'application_key_example'; // string | The API key of the registered application making the login request. Mobile application keys (iOS/Android) are not accepted.
$user = 'user_example'; // string | The user's email address or username.
$password = 'password_example'; // string | The user's password.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$format = 'format_example'; // string | When set to `json`, forces a JSON response regardless of the `Accept` header.
$device_id = 'device_id_example'; // string | Optional device identifier. When provided, the generated API key is associated with this device.

try {
    $result = $apiInstance->login($application_key, $user, $password, $accept_header_parameter, $format, $device_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->login: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_key** | **string**| The API key of the registered application making the login request. Mobile application keys (iOS/Android) are not accepted. | |
| **user** | **string**| The user&#39;s email address or username. | |
| **password** | **string**| The user&#39;s password. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **format** | **string**| When set to &#x60;json&#x60;, forces a JSON response regardless of the &#x60;Accept&#x60; header. | [optional] |
| **device_id** | **string**| Optional device identifier. When provided, the generated API key is associated with this device. | [optional] |

### Return type

[**\BhrSdk\Model\LoginResponse**](../Model/LoginResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
