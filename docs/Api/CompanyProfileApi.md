# BhrSdk\CompanyProfileApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCompanyProfileIntegrations()**](CompanyProfileApi.md#getCompanyProfileIntegrations) | **GET** /api/v1/company-profile-integrations | Get Company Profile Integrations |
| [**patchCompanyProfileCompanyInformation()**](CompanyProfileApi.md#patchCompanyProfileCompanyInformation) | **PATCH** /api/v1/company-profile-data/company-information | Update company information (phone, address, legal name) |
| [**putCompanyProfileDisplayName()**](CompanyProfileApi.md#putCompanyProfileDisplayName) | **PUT** /api/v1/company-profile-data/display-name | Update company display name |


## `getCompanyProfileIntegrations()`

```php
getCompanyProfileIntegrations(): \BhrSdk\Model\CompanyProfileIntegrations
```

Get Company Profile Integrations

Returns the list of integration feature identifiers currently enabled for the company. Each identifier is an uppercase string key (e.g. `BAMBOOHR_PAYROLL`, `TIME_TRACKING`, `E_SIGNATURES`) representing a product feature or integration that has been activated on the account. The list reflects the company's current subscription and configuration.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompanyProfileIntegrations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyProfileApi->getCompanyProfileIntegrations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompanyProfileIntegrations**](../Model/CompanyProfileIntegrations.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchCompanyProfileCompanyInformation()`

```php
patchCompanyProfileCompanyInformation($patch_company_profile_company_information_request): \BhrSdk\Model\CompanyProfileData
```

Update company information (phone, address, legal name)

Updates legal name, phone, and/or address for the company (application/merge-patch+json). String fields must be JSON strings (not numbers). Response matches GET /api/v1/company-profile-data.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$patch_company_profile_company_information_request = new \BhrSdk\Model\PatchCompanyProfileCompanyInformationRequest(); // \BhrSdk\Model\PatchCompanyProfileCompanyInformationRequest

try {
    $result = $apiInstance->patchCompanyProfileCompanyInformation($patch_company_profile_company_information_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyProfileApi->patchCompanyProfileCompanyInformation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **patch_company_profile_company_information_request** | [**\BhrSdk\Model\PatchCompanyProfileCompanyInformationRequest**](../Model/PatchCompanyProfileCompanyInformationRequest.md)|  | |

### Return type

[**\BhrSdk\Model\CompanyProfileData**](../Model/CompanyProfileData.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putCompanyProfileDisplayName()`

```php
putCompanyProfileDisplayName($put_company_profile_display_name_request): \BhrSdk\Model\UpdateCompanyNameSuccessResponse
```

Update company display name

Updates the company display name. Requires admin permissions and the company:details.write OAuth scope. The display name must be a non-empty string with a maximum length of 255 characters. Upon successful update, the system logs the change and broadcasts an event to notify other services.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$put_company_profile_display_name_request = new \BhrSdk\Model\PutCompanyProfileDisplayNameRequest(); // \BhrSdk\Model\PutCompanyProfileDisplayNameRequest

try {
    $result = $apiInstance->putCompanyProfileDisplayName($put_company_profile_display_name_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyProfileApi->putCompanyProfileDisplayName: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **put_company_profile_display_name_request** | [**\BhrSdk\Model\PutCompanyProfileDisplayNameRequest**](../Model/PutCompanyProfileDisplayNameRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\UpdateCompanyNameSuccessResponse**](../Model/UpdateCompanyNameSuccessResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
