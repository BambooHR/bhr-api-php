# BhrSdk\DatasetsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDataFromDataset()**](DatasetsApi.md#getDataFromDataset) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset |
| [**getDatasets()**](DatasetsApi.md#getDatasets) | **GET** /api/v1/datasets | Get Datasets |
| [**getFieldOptions()**](DatasetsApi.md#getFieldOptions) | **POST** /api/v1/datasets/{datasetName}/field-options | Get Field Options |
| [**getFieldsFromDataset()**](DatasetsApi.md#getFieldsFromDataset) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset |


## `getDataFromDataset()`

```php
getDataFromDataset($dataset_name, $data_request): \BhrSdk\Model\EmployeeResponse
```

Get Data from Dataset

Use this resource to request data from the specified dataset. You must specify a list of fields to show on the report. The list of fields is available here at /api/v1/datasets/{datasetName}/fields.  ***Field Settings:***   **Show History** When any of the fields included in your request are historical table fields, you may include the \"showHistory\" setting. Example: \"showHistory\":[\"entityName\"]. Entity Name can be found in the get /api/v1/datasets/{datasetName}/fields endpoint.  **Sort By:** You can pass multiple fields to sort by as an array of objects {field: \"fieldName\", sort: \"asc,desc\"}. The order of the fields in the array will determine the order of the sort.  **Group By:** Group By is passed as an array of strings but currently grouping by more than one field is not supported.  **Aggregations:** When using aggregations the following aggregates are available based on field type:   - **text**     - count   - **date**     - count     - min     - max   - **int**     - count     - min     - max     - sum     - avg   - **bool**     - count   - **options**     - count   - **ssnText**     - count  **Filters:** When using filters, the filtered field does not have to be in the list of fields you want to show on the report.   **Important Filter Notes:**   - **List filter values** (for \"options\" field type using \"includes\" or \"does_not_include\" operators) must be enclosed in square brackets [ ]. Example: [\"value1\", \"value2\"]   - **Future hires**: Future hires have a status of \"Inactive\" in the datasets API. To include future hires in your results, you must include \"Inactive\" in your status filter.  Use the `/api/v1/datasets/{datasetName}/field-options` endpoint to retrieve possible filter values for fields. Use the \"id\" returned from the field-options endpoint.  **Filter Operators by Field Type:**   - **text**     - contains     - does_not_contain     - equal     - not_equal     - empty     - not_empty   - **date**     - lt (less than)     - lte (less than or equal)     - gt (greater than)     - gte (greater than or equal)     - last - Uses an object for the value: {\"duration\": \"5\", \"unit\": \"years\"}. Unit can be \"days\", \"weeks\", \"months\", or \"years\". Duration is a number as a string.     - next - Uses an object for the value: {\"duration\": \"5\", \"unit\": \"years\"}. Unit can be \"days\", \"weeks\", \"months\", or \"years\". Duration is a number as a string.     - range - Uses an object for the value: {\"start\": \"2023-01-01\", \"end\": \"2023-12-31\"}. Dates must be in YYYY-MM-DD format.     - equal     - not_equal     - empty     - not_empty   - **int**     - equal     - not_equal     - gte     - gt     - lte     - lt     - empty     - not_empty   - **bool**     - checked     - not_checked   - **options**     - includes     - does_not_include     - empty     - not_empty   - **ssnText**:     - empty     - not_empty

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want data from
$data_request = new \BhrSdk\Model\DataRequest(); // \BhrSdk\Model\DataRequest

try {
    $result = $apiInstance->getDataFromDataset($dataset_name, $data_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getDataFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dataset_name** | **string**| The name of the dataset you want data from | |
| **data_request** | [**\BhrSdk\Model\DataRequest**](../Model/DataRequest.md)|  | |

### Return type

[**\BhrSdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDatasets()`

```php
getDatasets(): \BhrSdk\Model\DatasetResponse
```

Get Datasets

Use this resource to retrieve the available datasets to query data from.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getDatasets();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getDatasets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\DatasetResponse**](../Model/DatasetResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFieldOptions()`

```php
getFieldOptions($dataset_name, $field_options_request_schema): \BhrSdk\Model\FieldOptionsTransformer[]
```

Get Field Options

Use this resource to retrieve a list of possible values for a field.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want to see field options for
$field_options_request_schema = new \BhrSdk\Model\FieldOptionsRequestSchema(); // \BhrSdk\Model\FieldOptionsRequestSchema

try {
    $result = $apiInstance->getFieldOptions($dataset_name, $field_options_request_schema);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getFieldOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dataset_name** | **string**| The name of the dataset you want to see field options for | |
| **field_options_request_schema** | [**\BhrSdk\Model\FieldOptionsRequestSchema**](../Model/FieldOptionsRequestSchema.md)|  | |

### Return type

[**\BhrSdk\Model\FieldOptionsTransformer[]**](../Model/FieldOptionsTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFieldsFromDataset()`

```php
getFieldsFromDataset($dataset_name, $page, $page_size): \BhrSdk\Model\DatasetFieldsResponse
```

Get Fields from Dataset

Use this resource to request the available fields on a dataset.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\DatasetsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want to see fields for
$page = 56; // int | The page number to retrieve
$page_size = 56; // int | The number of records to retrieve per page. Default is 500 and the Max is 1000

try {
    $result = $apiInstance->getFieldsFromDataset($dataset_name, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DatasetsApi->getFieldsFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dataset_name** | **string**| The name of the dataset you want to see fields for | |
| **page** | **int**| The page number to retrieve | [optional] |
| **page_size** | **int**| The number of records to retrieve per page. Default is 500 and the Max is 1000 | [optional] |

### Return type

[**\BhrSdk\Model\DatasetFieldsResponse**](../Model/DatasetFieldsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
