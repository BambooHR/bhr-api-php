# BhrSdk\TrainingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEmployeeTrainingRecord()**](TrainingApi.md#createEmployeeTrainingRecord) | **POST** /api/v1/training/record/employee/{employeeId} | Create Employee Training Record |
| [**createTrainingCategory()**](TrainingApi.md#createTrainingCategory) | **POST** /api/v1/training/category | Create Training Category |
| [**createTrainingType()**](TrainingApi.md#createTrainingType) | **POST** /api/v1/training/type | Create Training Type |
| [**deleteEmployeeTrainingRecord()**](TrainingApi.md#deleteEmployeeTrainingRecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record |
| [**deleteTrainingCategory()**](TrainingApi.md#deleteTrainingCategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category |
| [**deleteTrainingType()**](TrainingApi.md#deleteTrainingType) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type |
| [**listEmployeeTrainings()**](TrainingApi.md#listEmployeeTrainings) | **GET** /api/v1/training/record/employee/{employeeId} | List Employee Training Records |
| [**listTrainingCategories()**](TrainingApi.md#listTrainingCategories) | **GET** /api/v1/training/category | List Training Categories |
| [**listTrainingTypes()**](TrainingApi.md#listTrainingTypes) | **GET** /api/v1/training/type | List Training Types |
| [**updateEmployeeTrainingRecord()**](TrainingApi.md#updateEmployeeTrainingRecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record |
| [**updateTrainingCategory()**](TrainingApi.md#updateTrainingCategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category |
| [**updateTrainingType()**](TrainingApi.md#updateTrainingType) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type |


## `createEmployeeTrainingRecord()`

```php
createEmployeeTrainingRecord($employee_id, $create_employee_training_record_request): \BhrSdk\Model\TrainingRecord
```

Create Employee Training Record

Creates a new training record for the specified employee. The 'completed' date (yyyy-mm-dd) and 'type' (training type ID) are required. Optional fields include instructor, hours, credits, notes, and cost. The owner of the API key must have permission to add trainings for the employee.

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
$employee_id = 56; // int | The ID of the employee to add a training record to.
$create_employee_training_record_request = new \BhrSdk\Model\CreateEmployeeTrainingRecordRequest(); // \BhrSdk\Model\CreateEmployeeTrainingRecordRequest | Training object to post

try {
    $result = $apiInstance->createEmployeeTrainingRecord($employee_id, $create_employee_training_record_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->createEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to add a training record to. | |
| **create_employee_training_record_request** | [**\BhrSdk\Model\CreateEmployeeTrainingRecordRequest**](../Model/CreateEmployeeTrainingRecordRequest.md)| Training object to post | |

### Return type

[**\BhrSdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTrainingCategory()`

```php
createTrainingCategory($create_training_category_request): \BhrSdk\Model\TrainingCategory
```

Create Training Category

Creates a new training category. The 'name' field is required. Returns the created TrainingCategory on success. The owner of the API key must have access to training settings.

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
$create_training_category_request = new \BhrSdk\Model\CreateTrainingCategoryRequest(); // \BhrSdk\Model\CreateTrainingCategoryRequest | Training category to post

try {
    $result = $apiInstance->createTrainingCategory($create_training_category_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->createTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_training_category_request** | [**\BhrSdk\Model\CreateTrainingCategoryRequest**](../Model/CreateTrainingCategoryRequest.md)| Training category to post | |

### Return type

[**\BhrSdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTrainingType()`

```php
createTrainingType($create_training_type_request): \BhrSdk\Model\TrainingType
```

Create Training Type

Creates a new training type. Only 'name' is required; all other fields are optional. When 'renewable' is true, 'frequency' (months between renewals) must also be provided. The 'dueFromHireDate' field is only valid when 'required' is true. The owner of the API key must have access to training settings.

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
$create_training_type_request = new \BhrSdk\Model\CreateTrainingTypeRequest(); // \BhrSdk\Model\CreateTrainingTypeRequest | Training object to post

try {
    $result = $apiInstance->createTrainingType($create_training_type_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->createTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_training_type_request** | [**\BhrSdk\Model\CreateTrainingTypeRequest**](../Model/CreateTrainingTypeRequest.md)| Training object to post | |

### Return type

[**\BhrSdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

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
$employee_training_record_id = 56; // int | The ID of the training record to delete.

try {
    $apiInstance->deleteEmployeeTrainingRecord($employee_training_record_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_training_record_id** | **int**| The ID of the training record to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

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
$training_category_id = 56; // int | The ID of the training category to delete.

try {
    $apiInstance->deleteTrainingCategory($training_category_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_category_id** | **int**| The ID of the training category to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTrainingType()`

```php
deleteTrainingType($training_type_id)
```

Delete Training Type

Delete an existing training type. The owner of the API key must have access to training settings. Deleting a training type will only be successful if all employee trainings for this type have been removed prior to this request.

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
$training_type_id = 56; // int | The ID of the training type to delete.

try {
    $apiInstance->deleteTrainingType($training_type_id);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->deleteTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **training_type_id** | **int**| The ID of the training type to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeTrainings()`

```php
listEmployeeTrainings($employee_id, $type): \BhrSdk\Model\TrainingRecordMap
```

List Employee Training Records

Returns all training records for the specified employee as an object keyed by training record ID. Use the optional 'type' query parameter to filter by training type ID. Fields such as instructor, credits, hours, and cost are only included when enabled in the company's training settings. The owner of the API key must have permission to view the employee.

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
$employee_id = 56; // int | The ID of the employee to get a list of trainings for.
$type = 56; // int | Optional training type ID to filter records. Omitting this parameter returns all training records for the employee.

try {
    $result = $apiInstance->listEmployeeTrainings($employee_id, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TrainingApi->listEmployeeTrainings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee to get a list of trainings for. | |
| **type** | **int**| Optional training type ID to filter records. Omitting this parameter returns all training records for the employee. | [optional] |

### Return type

[**\BhrSdk\Model\TrainingRecordMap**](../Model/TrainingRecordMap.md)

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
listTrainingCategories(): array<string,\BhrSdk\Model\TrainingCategory>
```

List Training Categories

Returns all training categories for the company as an object keyed by category ID. Each entry contains the category ID and name. The owner of the API key must have access to training settings.

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

[**array<string,\BhrSdk\Model\TrainingCategory>**](../Model/TrainingCategory.md)

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
listTrainingTypes(): array<string,\BhrSdk\Model\TrainingType>
```

List Training Types

Returns all training types for the company as an object keyed by training type ID. Each entry includes the training name, renewable status, renewal frequency, required status, due-date window for new hires, category, link URL, description, and self-completion permission. The owner of the API key must have access to training settings.

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

[**array<string,\BhrSdk\Model\TrainingType>**](../Model/TrainingType.md)

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

Updates an existing employee training record. The 'completed' date (yyyy-mm-dd) is required; all other fields are optional. Returns the updated TrainingRecord with HTTP 201. Returns 405 when the record cannot be updated. The owner of the API key must have permission to edit trainings for the employee.

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
$employee_training_record_id = 56; // int | The ID of the training record to update.
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
| **employee_training_record_id** | **int**| The ID of the training record to update. | |
| **update_employee_training_record_request** | [**\BhrSdk\Model\UpdateEmployeeTrainingRecordRequest**](../Model/UpdateEmployeeTrainingRecordRequest.md)| Training object to update | |

### Return type

[**\BhrSdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingCategory()`

```php
updateTrainingCategory($training_category_id, $update_training_category_request): \BhrSdk\Model\TrainingCategory
```

Update Training Category

Updates the name of an existing training category. Returns 409 if a category with the same name already exists. The owner of the API key must have access to training settings.

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
$training_category_id = 56; // int | The ID of the training category to update.
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
| **training_category_id** | **int**| The ID of the training category to update. | |
| **update_training_category_request** | [**\BhrSdk\Model\UpdateTrainingCategoryRequest**](../Model/UpdateTrainingCategoryRequest.md)| Training category to update | |

### Return type

[**\BhrSdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingType()`

```php
updateTrainingType($training_type_id, $update_training_type_request): \BhrSdk\Model\TrainingType
```

Update Training Type

Updates an existing training type. Only provided fields are updated. To remove a category, pass an empty string or null for the category field. Returns 405 when the training type cannot be modified. The owner of the API key must have access to training settings.

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
$training_type_id = 56; // int | The ID of the training type to update.
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
| **training_type_id** | **int**| The ID of the training type to update. | |
| **update_training_type_request** | [**\BhrSdk\Model\UpdateTrainingTypeRequest**](../Model/UpdateTrainingTypeRequest.md)| Training type object to update to | |

### Return type

[**\BhrSdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
