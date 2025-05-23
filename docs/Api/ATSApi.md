# MySdk\ATSApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getApplicationDetails()**](ATSApi.md#getApplicationDetails) | **GET** /{companyDomain}/v1/applicant_tracking/applications/{applicationId} | Get Application Details |


## `getApplicationDetails()`

```php
getApplicationDetails($company_domain, $application_id): \MySdk\Model\GetApplicationDetails200Response
```

Get Application Details

Get the details of an application. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\ATSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$application_id = 56; // int | The ID of the application to look up details.

try {
    $result = $apiInstance->getApplicationDetails($company_domain, $application_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ATSApi->getApplicationDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **application_id** | **int**| The ID of the application to look up details. | |

### Return type

[**\MySdk\Model\GetApplicationDetails200Response**](../Model/GetApplicationDetails200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
