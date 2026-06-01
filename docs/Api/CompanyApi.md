# BhrSdk\CompanyApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**putCompanyIndustryCodes()**](CompanyApi.md#putCompanyIndustryCodes) | **PUT** /api/v1/company-profile-data/industry-codes | Update Company Industry Codes |


## `putCompanyIndustryCodes()`

```php
putCompanyIndustryCodes($put_company_industry_codes_request): \BhrSdk\Model\UpdateCompanyIndustryCodesResponse
```

Update Company Industry Codes

Updates the industry codes associated with a company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$put_company_industry_codes_request = {"industryIds":[1]}; // \BhrSdk\Model\PutCompanyIndustryCodesRequest

try {
    $result = $apiInstance->putCompanyIndustryCodes($put_company_industry_codes_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->putCompanyIndustryCodes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **put_company_industry_codes_request** | [**\BhrSdk\Model\PutCompanyIndustryCodesRequest**](../Model/PutCompanyIndustryCodesRequest.md)|  | |

### Return type

[**\BhrSdk\Model\UpdateCompanyIndustryCodesResponse**](../Model/UpdateCompanyIndustryCodesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
