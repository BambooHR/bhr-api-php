# MySdk\LoginApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**login()**](LoginApi.md#login) | **POST** /{companyDomain}/v1/login | User Login |


## `login()`

```php
login($company_domain, $accept_header_parameter, $application_key, $user, $password)
```

User Login

User Login

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


$apiInstance = new MySdk\Api\LoginApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$application_key = 'application_key_example'; // string
$user = 'user_example'; // string
$password = 'password_example'; // string

try {
    $apiInstance->login($company_domain, $accept_header_parameter, $application_key, $user, $password);
} catch (Exception $e) {
    echo 'Exception when calling LoginApi->login: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **application_key** | **string**|  | [optional] |
| **user** | **string**|  | [optional] |
| **password** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
