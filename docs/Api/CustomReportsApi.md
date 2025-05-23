# MySdk\CustomReportsApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getByReportId()**](CustomReportsApi.md#getByReportId) | **GET** /{companyDomain}/v1/custom-reports/{reportId} | Get Report by ID |
| [**listReports()**](CustomReportsApi.md#listReports) | **GET** /{companyDomain}/v1/custom-reports | List Reports |


## `getByReportId()`

```php
getByReportId($company_domain, $report_id): \MySdk\Model\EmployeeResponse
```

Get Report by ID

Use this resource to retrieve data for a specific report.

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


$apiInstance = new MySdk\Api\CustomReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$report_id = 56; // int

try {
    $result = $apiInstance->getByReportId($company_domain, $report_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->getByReportId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **report_id** | **int**|  | |

### Return type

[**\MySdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listReports()`

```php
listReports($company_domain, $page, $page_size): \MySdk\Model\ReportsResponse
```

List Reports

Use this resource to retrieve a list of available reports.

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


$apiInstance = new MySdk\Api\CustomReportsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$page = 56; // int | The page number to retrieve
$page_size = 56; // int | The number of records to retrieve per page. Default is 500 and the Max is 1000

try {
    $result = $apiInstance->listReports($company_domain, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomReportsApi->listReports: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **page** | **int**| The page number to retrieve | [optional] |
| **page_size** | **int**| The number of records to retrieve per page. Default is 500 and the Max is 1000 | [optional] |

### Return type

[**\MySdk\Model\ReportsResponse**](../Model/ReportsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
