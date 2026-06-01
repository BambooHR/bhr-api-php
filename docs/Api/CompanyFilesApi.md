# BhrSdk\CompanyFilesApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCompanyFileCategory()**](CompanyFilesApi.md#createCompanyFileCategory) | **POST** /api/v1/files/categories | Create Company File Category |
| [**deleteCompanyFile()**](CompanyFilesApi.md#deleteCompanyFile) | **DELETE** /api/v1/files/{fileId} | Delete Company File |
| [**getCompanyFile()**](CompanyFilesApi.md#getCompanyFile) | **GET** /api/v1/files/{fileId} | Get Company File |
| [**listCompanyFiles()**](CompanyFilesApi.md#listCompanyFiles) | **GET** /api/v1/files/view | Get Company Files and Categories |
| [**updateCompanyFile()**](CompanyFilesApi.md#updateCompanyFile) | **POST** /api/v1/files/{fileId} | Update Company File |
| [**uploadCompanyFile()**](CompanyFilesApi.md#uploadCompanyFile) | **POST** /api/v1/files | Upload Company File |


## `createCompanyFileCategory()`

```php
createCompanyFileCategory($request_body)
```

Create Company File Category

Creates one or more company file categories. Accepts a JSON array of category name strings or an equivalent XML document. An empty payload returns 200 without creating anything. Returns 400 if a name is empty or already exists, 403 if the caller lacks permission or the name is reserved, and 500 on an internal error.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->createCompanyFileCategory($request_body);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->createCompanyFileCategory: ', $e->getMessage(), PHP_EOL;
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

## `deleteCompanyFile()`

```php
deleteCompanyFile($file_id)
```

Delete Company File

Permanently removes a company file and its associated storage. The company must have the Files tool enabled; otherwise the file is treated as not found. Read-only file types (e.g. e-signature templates) are silently skipped. No response body is returned on success. Use \"Company Files > List Company Files\" to obtain file IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = 56; // int | The ID of the company file to delete.

try {
    $apiInstance->deleteCompanyFile($file_id);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->deleteCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **int**| The ID of the company file to delete. | |

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

## `getCompanyFile()`

```php
getCompanyFile($file_id)
```

Get Company File

Downloads a company file by its ID. The response body is the raw file content. The `Content-Type` header reflects the file's MIME type and `Content-Disposition` is set to `attachment` with the original filename. Access is permitted if the file or its category is shared with employees, shared directly with the requesting user, or the user has view permission on the file section.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = 56; // int | The ID of the company file to download.

try {
    $apiInstance->getCompanyFile($file_id);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->getCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **int**| The ID of the company file to download. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompanyFiles()`

```php
listCompanyFiles(): \BhrSdk\Model\CompanyFilesResponse
```

Get Company Files and Categories

Returns all company file categories and the files within each category that the requesting user is permitted to see. The response format is determined by the `Accept` request header: send `application/json` for JSON or omit it (or send `application/xml`) for XML.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listCompanyFiles();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->listCompanyFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompanyFilesResponse**](../Model/CompanyFilesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompanyFile()`

```php
updateCompanyFile($file_id, $company_file_update)
```

Update Company File

Updates metadata for an existing company file. Supports renaming the file, moving it to a different category, and toggling employee visibility. Accepts JSON or XML. Only fields included in the request body are updated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = 56; // int | The ID of the company file to update.
$company_file_update = new \BhrSdk\Model\CompanyFileUpdate(); // \BhrSdk\Model\CompanyFileUpdate

try {
    $apiInstance->updateCompanyFile($file_id, $company_file_update);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->updateCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_id** | **int**| The ID of the company file to update. | |
| **company_file_update** | [**\BhrSdk\Model\CompanyFileUpdate**](../Model/CompanyFileUpdate.md)|  | |

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

## `uploadCompanyFile()`

```php
uploadCompanyFile($file_name, $category, $file, $share)
```

Upload Company File

Uploads a file to a company file category. The request must be a `multipart/form-data` POST. On success, a `Location` header is returned with the URL of the newly created file resource. The file must be under 20MB and use a supported extension. Uploading to read-only categories is not permitted. Uploading to implementation categories is not permitted on companies that have completed implementation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompanyFilesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_name = 'file_name_example'; // string | The display name for the uploaded file.
$category = 56; // int | The ID of the file category (section) to upload the file into.
$file = '/path/to/file.txt'; // \SplFileObject | The file to upload.
$share = 'share_example'; // string | Whether to share the file with all employees. Accepted values: `yes` or `no`. Defaults to `no`.

try {
    $apiInstance->uploadCompanyFile($file_name, $category, $file, $share);
} catch (Exception $e) {
    echo 'Exception when calling CompanyFilesApi->uploadCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file_name** | **string**| The display name for the uploaded file. | |
| **category** | **int**| The ID of the file category (section) to upload the file into. | |
| **file** | **\SplFileObject****\SplFileObject**| The file to upload. | |
| **share** | **string**| Whether to share the file with all employees. Accepted values: &#x60;yes&#x60; or &#x60;no&#x60;. Defaults to &#x60;no&#x60;. | [optional] |

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
