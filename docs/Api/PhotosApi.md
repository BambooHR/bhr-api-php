# BhrSdk\PhotosApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getEmployeePhoto()**](PhotosApi.md#getEmployeePhoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get Employee Photo |
| [**uploadEmployeePhoto()**](PhotosApi.md#uploadEmployeePhoto) | **POST** /api/v1/employees/{employeeId}/photo | Upload Employee Photo |


## `getEmployeePhoto()`

```php
getEmployeePhoto($employee_id, $size, $width, $height)
```

Get Employee Photo

Returns an employee photo at the requested size. Available sizes are: `original` (full resolution), `large` (340×340), `medium` (170×170), `small` (150×150), `xs` (50×50), and `tiny` (20×20). The response shape is selected via standard HTTP content negotiation: by default the body is the stored image bytes and the `Content-Type` response header matches the body (`image/jpeg`, `image/png`, `image/bmp`, `image/gif`, or `image/tiff`). When the caller sends `Accept: application/json` (typical MCP/LLM-connector usage), the body is a JSON object `{ mimeType, fileBase64 }` with the same image bytes base64-encoded, and the response `Content-Type` is `application/json`.  A 404 response covers three distinct cases: (1) the employee exists but has no photo on file (a normal, non-error state), (2) the employee ID does not exist, or (3) the size value is not one of the recognized options. The `x-bamboohr-error-message` response header distinguishes them: `Employee photo not found`, `Employee not found`, or `Size: \"<value>\" is not a valid size option. Valid sizes are: xs, small, tiny, original, medium and large.`. Treat \"Employee photo not found\" as a normal \"no photo on file\" result rather than as a bad employee ID, permission failure, or other error to debug.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PhotosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The ID of the employee whose photo to retrieve.
$size = 'size_example'; // string | The desired photo size. One of: `original`, `large`, `medium`, `small`, `xs`, `tiny`.
$width = 56; // int | Optional. Scales the returned image to the specified pixel width, capped at the natural width of the requested size. Only applies to `small` and `tiny` sizes.
$height = 56; // int | Optional. Scales the returned image to the specified pixel height, capped at the natural height of the requested size. Only applies to `small` and `tiny` sizes.

try {
    $apiInstance->getEmployeePhoto($employee_id, $size, $width, $height);
} catch (Exception $e) {
    echo 'Exception when calling PhotosApi->getEmployeePhoto: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee whose photo to retrieve. | |
| **size** | **string**| The desired photo size. One of: &#x60;original&#x60;, &#x60;large&#x60;, &#x60;medium&#x60;, &#x60;small&#x60;, &#x60;xs&#x60;, &#x60;tiny&#x60;. | |
| **width** | **int**| Optional. Scales the returned image to the specified pixel width, capped at the natural width of the requested size. Only applies to &#x60;small&#x60; and &#x60;tiny&#x60; sizes. | [optional] |
| **height** | **int**| Optional. Scales the returned image to the specified pixel height, capped at the natural height of the requested size. Only applies to &#x60;small&#x60; and &#x60;tiny&#x60; sizes. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `image/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadEmployeePhoto()`

```php
uploadEmployeePhoto($employee_id, $file)
```

Upload Employee Photo

Uploads a new photo for an employee. Accepts either a `multipart/form-data` POST with a `file` field carrying raw binary image bytes (typical browser/SDK usage), or an `application/json` POST with a `fileBase64` property carrying the base64-encoded image bytes (typical MCP/LLM-connector usage). The server selects the path based on the request `Content-Type`. Supported formats: JPEG, PNG, BMP, GIF. Other formats (HEIC, SVG, AVIF, WebP) are rejected with 415; TIFF is accepted by the format gate but some variants may fail downstream. The image must be square (width and height must match within one pixel) and at least 150×150 pixels. Maximum file size is 20MB (applies to the decoded bytes for the JSON variant). The photo replaces the employee's current photo for all size variants. Employees may upload their own photo if the company has self-photo uploads enabled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PhotosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | The ID of the employee whose photo is being uploaded.
$file = '/path/to/file.txt'; // \SplFileObject | The image file to upload as the employee's photo. Supported formats: JPEG, PNG, BMP, GIF (HEIC, SVG, AVIF, and WebP are rejected with 415; TIFF is accepted by the format gate but some variants may fail downstream). Must be square (width and height within 1 pixel), at least 150×150 pixels, and no larger than 20MB.

try {
    $apiInstance->uploadEmployeePhoto($employee_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling PhotosApi->uploadEmployeePhoto: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| The ID of the employee whose photo is being uploaded. | |
| **file** | **\SplFileObject****\SplFileObject**| The image file to upload as the employee&#39;s photo. Supported formats: JPEG, PNG, BMP, GIF (HEIC, SVG, AVIF, and WebP are rejected with 415; TIFF is accepted by the format gate but some variants may fail downstream). Must be square (width and height within 1 pixel), at least 150×150 pixels, and no larger than 20MB. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`, `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
