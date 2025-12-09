# BhrSdk\TrainingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addNewEmployeeTrainingRecord()**](TrainingApi.md#addNewEmployeeTrainingRecord) | **POST** /api/v1/training/record/employee/{employeeId} | Create Employee Training Record |
| [**addTrainingCategory()**](TrainingApi.md#addTrainingCategory) | **POST** /api/v1/training/category | Create Training Category |
| [**addTrainingType()**](TrainingApi.md#addTrainingType) | **POST** /api/v1/training/type | Create Training Type |
| [**deleteEmployeeTrainingRecord()**](TrainingApi.md#deleteEmployeeTrainingRecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record |
| [**deleteTrainingCategory()**](TrainingApi.md#deleteTrainingCategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category |
| [**deleteTrainingType()**](TrainingApi.md#deleteTrainingType) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type |
| [**listEmployeeTrainings()**](TrainingApi.md#listEmployeeTrainings) | **GET** /api/v1/training/record/employee/{employeeId} | Get Employee Trainings |
| [**listTrainingCategories()**](TrainingApi.md#listTrainingCategories) | **GET** /api/v1/training/category | Get Training Categories |
| [**listTrainingTypes()**](TrainingApi.md#listTrainingTypes) | **GET** /api/v1/training/type | Get Training Types |
| [**updateEmployeeTrainingRecord()**](TrainingApi.md#updateEmployeeTrainingRecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record |
| [**updateTrainingCategory()**](TrainingApi.md#updateTrainingCategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category |
| [**updateTrainingType()**](TrainingApi.md#updateTrainingType) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type |


## `addNewEmployeeTrainingRecord()`

```php
addNewEmployeeTrainingRecord($employee_id, $add_new_employee_training_record_request): \BhrSdk\Model\TrainingRecord
```

Create Employee Training Record

Add a new employee training record. The owner of the API key used must have permission to add trainings for the selected employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 0; // int | The ID of the employee to add a training record to.
$add_new_employee_training_record_request = new \BhrSdk\Model\AddNewEmployeeTrainingRecordRequest(); // \BhrSdk\Model\AddNewEmployeeTrainingRecordRequest | Training object to post

try {
    $result = $apiInstance->addNewEmployeeTrainingRecord($employee_id, $add_new_employee_training_record_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->addNewEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to add a training record to. | [default to 0] |
| **add_new_employee_training_record_request** | [**\BhrSdk\Model\AddNewEmployeeTrainingRecordRequest**](../Model/AddNewEmployeeTrainingRecordRequest.md)| Training object to post | |

### Return type

[**\BhrSdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTrainingCategory()`

```php
addTrainingCategory($add_training_category_request): \BhrSdk\Model\TrainingCategory
```

Create Training Category

Add a training category. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_training_category_request = new \BhrSdk\Model\AddTrainingCategoryRequest(); // \BhrSdk\Model\AddTrainingCategoryRequest | Training category to post

try {
    $result = $apiInstance->addTrainingCategory($add_training_category_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->addTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_training_category_request** | [**\BhrSdk\Model\AddTrainingCategoryRequest**](../Model/AddTrainingCategoryRequest.md)| Training category to post | |

### Return type

[**\BhrSdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTrainingType()`

```php
addTrainingType($add_training_type_request): \BhrSdk\Model\TrainingType
```

Create Training Type

Add a training type. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$add_training_type_request = new \BhrSdk\Model\AddTrainingTypeRequest(); // \BhrSdk\Model\AddTrainingTypeRequest | Training object to post

try {
    $result = $apiInstance->addTrainingType($add_training_type_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->addTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **add_training_type_request** | [**\BhrSdk\Model\AddTrainingTypeRequest**](../Model/AddTrainingTypeRequest.md)| Training object to post | |

### Return type

[**\BhrSdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployeeTrainingRecord()`

```php
deleteEmployeeTrainingRecord($employee_training_record_id)
```

Delete Employee Training Record

Delete an existing employee training record. The owner of the API key used must have permission to view and edit the employee and training type.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_training_record_id = 0; // int | The ID of the training record to delete.

try {
    $apiInstance->deleteEmployeeTrainingRecord($employee_training_record_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_training_record_id** | **int**| The ID of the training record to delete. | [default to 0] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTrainingCategory()`

```php
deleteTrainingCategory($training_category_id)
```

Delete Training Category

Delete an existing training category. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$training_category_id = 0; // int | The ID of the training category to delete.

try {
    $apiInstance->deleteTrainingCategory($training_category_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_category_id** | **int**| The ID of the training category to delete. | [default to 0] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTrainingType()`

```php
deleteTrainingType($training_type_id)
```

Delete Training Type

Delete an existing training type. The owner of the API key used must have access to training settings. Deleting a training type will only be successful if all employee trainings for this type have been removed prior to this request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$training_type_id = 0; // int | The ID of the training type to delete.

try {
    $apiInstance->deleteTrainingType($training_type_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_type_id** | **int**| The ID of the training type to delete. | [default to 0] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeTrainings()`

```php
listEmployeeTrainings($employee_id, $training_type_id): \BhrSdk\Model\TrainingRecordList[]
```

Get Employee Trainings

Get all employee training records. The owner of the API key used must have access to view the employee. The API will only return trainings for the employee that the owner of the API key has permission to see. Included with each employee training is the training information that has been selected for tracking in settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 0; // int | The ID of the employee to get a list of trainings for.
$training_type_id = 0; // int | The training type id is optional. Not supplying a training type id will return the collection of all training records for the employee.

try {
    $result = $apiInstance->listEmployeeTrainings($employee_id, $training_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->listEmployeeTrainings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to get a list of trainings for. | [default to 0] |
| **training_type_id** | **int**| The training type id is optional. Not supplying a training type id will return the collection of all training records for the employee. | [optional] [default to 0] |

### Return type

[**\BhrSdk\Model\TrainingRecordList[]**](../Model/TrainingRecordList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTrainingCategories()`

```php
listTrainingCategories(): \BhrSdk\Model\TrainingCategoryList[]
```

Get Training Categories

Get a list of training categories. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listTrainingCategories();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->listTrainingCategories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\TrainingCategoryList[]**](../Model/TrainingCategoryList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTrainingTypes()`

```php
listTrainingTypes(): \BhrSdk\Model\TrainingTypeList[]
```

Get Training Types

Get a list of training types. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listTrainingTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->listTrainingTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\TrainingTypeList[]**](../Model/TrainingTypeList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeTrainingRecord()`

```php
updateEmployeeTrainingRecord($employee_training_record_id, $update_employee_training_record_request): \BhrSdk\Model\TrainingRecord
```

Update Employee Training Record

Update an existing exmployee training record. The owner of the API key used must have permission to add trainings for the selected employee

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_training_record_id = 0; // int | The ID of the training record to update.
$update_employee_training_record_request = new \BhrSdk\Model\UpdateEmployeeTrainingRecordRequest(); // \BhrSdk\Model\UpdateEmployeeTrainingRecordRequest | Training object to update

try {
    $result = $apiInstance->updateEmployeeTrainingRecord($employee_training_record_id, $update_employee_training_record_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->updateEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_training_record_id** | **int**| The ID of the training record to update. | [default to 0] |
| **update_employee_training_record_request** | [**\BhrSdk\Model\UpdateEmployeeTrainingRecordRequest**](../Model/UpdateEmployeeTrainingRecordRequest.md)| Training object to update | |

### Return type

[**\BhrSdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingCategory()`

```php
updateTrainingCategory($training_category_id, $update_training_category_request): \BhrSdk\Model\TrainingCategory
```

Update Training Category

Update an existing training category. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$training_category_id = 0; // int | The ID of the training category to update.
$update_training_category_request = new \BhrSdk\Model\UpdateTrainingCategoryRequest(); // \BhrSdk\Model\UpdateTrainingCategoryRequest | Training category to update

try {
    $result = $apiInstance->updateTrainingCategory($training_category_id, $update_training_category_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->updateTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_category_id** | **int**| The ID of the training category to update. | [default to 0] |
| **update_training_category_request** | [**\BhrSdk\Model\UpdateTrainingCategoryRequest**](../Model/UpdateTrainingCategoryRequest.md)| Training category to update | |

### Return type

[**\BhrSdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingType()`

```php
updateTrainingType($training_type_id, $update_training_type_request): \BhrSdk\Model\TrainingType
```

Update Training Type

Update an existing training type. The owner of the API key used must have access to training settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\TrainingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$training_type_id = 0; // int | The ID of the training type to update.
$update_training_type_request = new \BhrSdk\Model\UpdateTrainingTypeRequest(); // \BhrSdk\Model\UpdateTrainingTypeRequest | Training type object to update to

try {
    $result = $apiInstance->updateTrainingType($training_type_id, $update_training_type_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->updateTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_type_id** | **int**| The ID of the training type to update. | [default to 0] |
| **update_training_type_request** | [**\BhrSdk\Model\UpdateTrainingTypeRequest**](../Model/UpdateTrainingTypeRequest.md)| Training type object to update to | |

### Return type

[**\BhrSdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
