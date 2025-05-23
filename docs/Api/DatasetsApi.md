# MySdk\DatasetsApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDataFromDataset()**](DatasetsApi.md#getDataFromDataset) | **POST** /{companyDomain}/v1/datasets/{datasetName} | Get Data from Dataset |
| [**getDataSets()**](DatasetsApi.md#getDataSets) | **GET** /{companyDomain}/v1/datasets | Get Data Sets |
| [**getFieldsFromDataset()**](DatasetsApi.md#getFieldsFromDataset) | **GET** /{companyDomain}/v1/datasets/{datasetName}/fields | Get Fields from Dataset |


## `getDataFromDataset()`

```php
getDataFromDataset($company_domain, $dataset_name, $data_request): \MySdk\Model\EmployeeResponse
```

Get Data from Dataset

Use this resource to request data from the specified dataset. You must specify a list of fields to show on the report. The list of fields is available here at /{companyDomain}/datasets/{datasetName}/fields.  Sort By you can pass multiple fields to sort by as an array of objects {field: \"fieldName\", sort: \"asc,desc\"}. The order of the fields in the array will determine the order of the sort.  Group By is passed as an array of strings but currently grouping by more than one field is not supported.  When using aggregations the following aggregates are available based on field type:   - **text**     - count   - **date**     - count     - min     - max   - **int**     - count     - min     - max     - sum     - avg   - **bool**     - count   - **options**     - count   - **ssnText**     - count  When using the filters the filtered field does not have to be in the list of fields you want to show on the report. When you\\'re using the \"status\" field as a filter, there\\'s something special to note. The \"status\" filter is always required, no matter what you set for the \"matches\" field. So, if you include \"status\" and set \"matches\" to \"all,\" your query will look like this: status AND filter1 AND filter2 AND filter3. But if you set \"matches\" to \"any,\" it changes to: status AND (filter1 OR filter2 OR filter3). If needed, use the `/{companyDomain}/v1/field-options` endpoint to retrieve possible filter values for fields. The following operators are available to be used based on the field type:   - **text**     - contains     - does_not_contain     - equal     - not_equal     - empty     - not_empty   - **date**     - lt     - lte     - gt     - gte     - last     - next     - range     - equal     - not_equal     - empty     - not_empty   - **int**     - equal     - not_equal     - gte     - gt     - lte     - lt     - empty     - not_empty   - **bool**     - checked     - not_checked   - **options**     - includes     - does_not_include     - empty     - not_empty   - **ssnText**:     - empty     - not_empty

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


$apiInstance = new MySdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want data from
$data_request = new \MySdk\Model\DataRequest(); // \MySdk\Model\DataRequest

try {
    $result = $apiInstance->getDataFromDataset($company_domain, $dataset_name, $data_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getDataFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dataset_name** | **string**| The name of the dataset you want data from | |
| **data_request** | [**\MySdk\Model\DataRequest**](../Model/DataRequest.md)|  | |

### Return type

[**\MySdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDataSets()`

```php
getDataSets($company_domain): \MySdk\Model\DatasetResponse
```

Get Data Sets

Use this resource to retrieve the available datasets to query data from.

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


$apiInstance = new MySdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getDataSets($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getDataSets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\DatasetResponse**](../Model/DatasetResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFieldsFromDataset()`

```php
getFieldsFromDataset($company_domain, $dataset_name, $page, $page_size): \MySdk\Model\DatasetFieldsResponse
```

Get Fields from Dataset

Use this resource to request the available fields on a dataset.

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


$apiInstance = new MySdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want to see fields for
$page = 56; // int | The page number to retrieve
$page_size = 56; // int | The number of records to retrieve per page. Default is 500 and the Max is 1000

try {
    $result = $apiInstance->getFieldsFromDataset($company_domain, $dataset_name, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getFieldsFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dataset_name** | **string**| The name of the dataset you want to see fields for | |
| **page** | **int**| The page number to retrieve | [optional] |
| **page_size** | **int**| The number of records to retrieve per page. Default is 500 and the Max is 1000 | [optional] |

### Return type

[**\MySdk\Model\DatasetFieldsResponse**](../Model/DatasetFieldsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
