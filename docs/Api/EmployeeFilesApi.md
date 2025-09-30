# BhrSdk\EmployeeFilesApi

All URIs are relative to https://company.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addEmployeeFileCategory()**](EmployeeFilesApi.md#addEmployeeFileCategory) | **POST** /api/v1/employees/files/categories | Add Employee File Category |
| [**deleteEmployeeFile()**](EmployeeFilesApi.md#deleteEmployeeFile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File |
| [**getEmployeeFile()**](EmployeeFilesApi.md#getEmployeeFile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get an Employee File |
| [**listEmployeeFiles()**](EmployeeFilesApi.md#listEmployeeFiles) | **GET** /api/v1/employees/{id}/files/view | List employee files and categories |
| [**updateEmployeeFile()**](EmployeeFilesApi.md#updateEmployeeFile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File |
| [**uploadEmployeeFile()**](EmployeeFilesApi.md#uploadEmployeeFile) | **POST** /api/v1/employees/{id}/files | Upload Employee File |


## `addEmployeeFileCategory()`

```php
addEmployeeFileCategory($request_body)
```

Add Employee File Category

Add an employee file category.

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->addEmployeeFileCategory($request_body);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->addEmployeeFileCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_body** | [**string[]**](../Model/string.md)|  | |

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

## `deleteEmployeeFile()`

```php
deleteEmployeeFile($id, $file_id)
```

Delete Employee File

Delete an employee file

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being deleted.

try {
    $apiInstance->deleteEmployeeFile($id, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->deleteEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being deleted. | |

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

## `getEmployeeFile()`

```php
getEmployeeFile($id, $file_id)
```

Get an Employee File

Gets an employee file

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being retrieved.

try {
    $apiInstance->getEmployeeFile($id, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->getEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being retrieved. | |

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

## `listEmployeeFiles()`

```php
listEmployeeFiles($id)
```

List employee files and categories

Lists employee files and categories

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 1501; // string | Employee ID is required and needs to be a valid employee ID.

try {
    $apiInstance->listEmployeeFiles($id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->listEmployeeFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Employee ID is required and needs to be a valid employee ID. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeFile()`

```php
updateEmployeeFile($id, $file_id, $employee_file_update)
```

Update Employee File

Update an employee file

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being updated.
$employee_file_update = new \BhrSdk\Model\EmployeeFileUpdate(); // \BhrSdk\Model\EmployeeFileUpdate

try {
    $apiInstance->updateEmployeeFile($id, $file_id, $employee_file_update);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->updateEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being updated. | |
| **employee_file_update** | [**\BhrSdk\Model\EmployeeFileUpdate**](../Model/EmployeeFileUpdate.md)|  | |

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

## `uploadEmployeeFile()`

```php
uploadEmployeeFile($id)
```

Upload Employee File

Upload an employee file

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

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).

try {
    $apiInstance->uploadEmployeeFile($id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->uploadEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |

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
