# BhrSdk\EmployeeFilesApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEmployeeFileCategory()**](EmployeeFilesApi.md#createEmployeeFileCategory) | **POST** /api/v1/employees/files/categories | Create Employee File Category |
| [**deleteEmployeeFile()**](EmployeeFilesApi.md#deleteEmployeeFile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File |
| [**getEmployeeFile()**](EmployeeFilesApi.md#getEmployeeFile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get Employee File |
| [**listEmployeeFiles()**](EmployeeFilesApi.md#listEmployeeFiles) | **GET** /api/v1/employees/{id}/files/view | List Employee Files |
| [**updateEmployeeFile()**](EmployeeFilesApi.md#updateEmployeeFile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File |
| [**uploadEmployeeFile()**](EmployeeFilesApi.md#uploadEmployeeFile) | **POST** /api/v1/employees/{id}/files | Upload Employee File |


## `createEmployeeFileCategory()`

```php
createEmployeeFileCategory($request_body)
```

Create Employee File Category

Creates one or more employee file categories (not company file categories). The request body is a JSON array of category name strings or an equivalent XML document with `<category>` elements. Each name must be non-empty and unique among existing employee file categories. An empty array returns 200 without creating anything. On success, returns 201 with no body. The admin user group is automatically granted edit permission on each new category.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->createEmployeeFileCategory($request_body);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->createEmployeeFileCategory: ', $e->getMessage(), PHP_EOL;
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

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployeeFile()`

```php
deleteEmployeeFile($id, $file_id)
```

Delete Employee File

Permanently deletes an employee file. This action cannot be undone and removes the file from storage. The special employee ID of 0 resolves to the employee associated with the API key. Returns 200 even if the file was already deleted (idempotent). Returns 403 if the caller lacks permission or the file belongs to a BambooPayroll-managed section. Returns 404 if the file does not exist for the specified employee or the Files tool is not enabled for the company. Use 'List Employee Files' to obtain file IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The ID of the employee whose file is being deleted. Use 0 to default to the employee associated with the API key.
$file_id = 56; // int | The ID of the employee file to delete.

try {
    $apiInstance->deleteEmployeeFile($id, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->deleteEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The ID of the employee whose file is being deleted. Use 0 to default to the employee associated with the API key. | |
| **file_id** | **int**| The ID of the employee file to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeFile()`

```php
getEmployeeFile($id, $file_id): \SplFileObject
```

Get Employee File

Downloads the binary content of an employee file as an attachment. The response Content-Type header reflects the file's stored MIME type (e.g. application/pdf) and includes a Content-Disposition header with the original filename. The special employee ID of 0 resolves to the employee associated with the API key.  Use \"List Employee Files\" to discover file IDs and their categories for a given employee. Archived or soft-deleted files are excluded and return 404.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The ID of the employee whose file is being retrieved. Use 0 to resolve to the employee associated with the API key.
$file_id = 56; // int | The ID of the employee file to download.

try {
    $result = $apiInstance->getEmployeeFile($id, $file_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->getEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The ID of the employee whose file is being retrieved. Use 0 to resolve to the employee associated with the API key. | |
| **file_id** | **int**| The ID of the employee file to download. | |

### Return type

**\SplFileObject**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeFiles()`

```php
listEmployeeFiles($id, $accept): \BhrSdk\Model\JsonEmployeeFiles
```

List Employee Files

Lists the file categories and files visible to the caller for the specified employee. This is a metadata listing (names, sizes, permissions); to download a file's content use `get-employee-file`. The response format is controlled by the Accept header: send `application/json` for JSON or omit/send anything else for XML. Only categories and files the caller is permitted to see are included; employees viewing their own profile also see files shared with them. Returns 404 when the employee has no accessible categories.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The ID of the employee whose files are being listed.
$accept = 'application/xml'; // string | Set to `application/json` to receive a JSON response. Any other value (or omitted) returns XML.

try {
    $result = $apiInstance->listEmployeeFiles($id, $accept);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->listEmployeeFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The ID of the employee whose files are being listed. | |
| **accept** | **string**| Set to &#x60;application/json&#x60; to receive a JSON response. Any other value (or omitted) returns XML. | [optional] [default to &#39;application/xml&#39;] |

### Return type

[**\BhrSdk\Model\JsonEmployeeFiles**](../Model/JsonEmployeeFiles.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeFile()`

```php
updateEmployeeFile($id, $file_id, $employee_file_update)
```

Update Employee File

Updates metadata for an existing employee file. Supports renaming the file, moving it to a different category, and toggling employee visibility. Accepts JSON or XML; only fields present in the request body are updated. An empty XML document no-ops successfully, while an empty JSON body returns 400. The `categoryId` field is silently ignored when the caller authenticated as the file creator but lacks full file permissions. Moving a file to a new category requires view/edit access to both the current and target category. Returns 403 if the file belongs to a read-only file section. Use 'List Employee Files' to obtain file IDs and category IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The ID of the employee whose file is being updated.
$file_id = 56; // int | The ID of the employee file to update.
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
| **id** | **int**| The ID of the employee whose file is being updated. | |
| **file_id** | **int**| The ID of the employee file to update. | |
| **employee_file_update** | [**\BhrSdk\Model\EmployeeFileUpdate**](../Model/EmployeeFileUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadEmployeeFile()`

```php
uploadEmployeeFile($id, $file_name, $category, $file, $share)
```

Upload Employee File

Uploads a file to an employee's file section. The request must be a `multipart/form-data` POST. On success, a `Location` header is returned with the URL of the newly created file resource. The file must be under 20MB and use a supported extension. Pass `0` as the employee ID to use the employee associated with the API key. Employees may upload to their own folder if the company has employee document uploads enabled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_name = 'file_name_example'; // string | The display name for the uploaded file.
$category = 56; // int | The ID of the employee file section to upload the file into.
$file = '/path/to/file.txt'; // \SplFileObject | The file to upload.
$share = 'share_example'; // string | Whether to share the file with the employee. Accepted values: `yes` or `no`. Defaults to `no`.

try {
    $apiInstance->uploadEmployeeFile($id, $file_name, $category, $file, $share);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeFilesApi->uploadEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_name** | **string**| The display name for the uploaded file. | |
| **category** | **int**| The ID of the employee file section to upload the file into. | |
| **file** | **\SplFileObject****\SplFileObject**| The file to upload. | |
| **share** | **string**| Whether to share the file with the employee. Accepted values: &#x60;yes&#x60; or &#x60;no&#x60;. Defaults to &#x60;no&#x60;. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
