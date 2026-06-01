# BhrSdk\CompensationBenchmarkingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCompensationBenchmark()**](CompensationBenchmarkingApi.md#createCompensationBenchmark) | **POST** /api/v1/compensation/benchmarks | Create Compensation Benchmark |
| [**createCompensationBenchmarkSource()**](CompensationBenchmarkingApi.md#createCompensationBenchmarkSource) | **POST** /api/v1/compensation/benchmarks/sources | Create Compensation Benchmark Source |
| [**deleteCompensationBenchmark()**](CompensationBenchmarkingApi.md#deleteCompensationBenchmark) | **DELETE** /api/v1/compensation/benchmarks/{id} | Delete Compensation Benchmark |
| [**deleteCompensationBenchmarkSource()**](CompensationBenchmarkingApi.md#deleteCompensationBenchmarkSource) | **DELETE** /api/v1/compensation/benchmarks/sources | Delete Compensation Benchmark Source |
| [**exportCompensationBenchmarkDetails()**](CompensationBenchmarkingApi.md#exportCompensationBenchmarkDetails) | **GET** /api/v1/compensation/benchmarks/details/export | Export Compensation Benchmark Details |
| [**getCompensationBenchmarkDetails()**](CompensationBenchmarkingApi.md#getCompensationBenchmarkDetails) | **GET** /api/v1/compensation/benchmarks/details | Get Compensation Benchmark Details |
| [**importCompensationBenchmarks()**](CompensationBenchmarkingApi.md#importCompensationBenchmarks) | **POST** /api/v1/compensation/benchmarks/import | Import Compensation Benchmarks From CSV |
| [**listCompensationBenchmarkSources()**](CompensationBenchmarkingApi.md#listCompensationBenchmarkSources) | **GET** /api/v1/compensation/benchmarks/sources | List Compensation Benchmark Sources |
| [**listCompensationBenchmarks()**](CompensationBenchmarkingApi.md#listCompensationBenchmarks) | **GET** /api/v1/compensation/benchmarks | List Compensation Benchmarks |
| [**updateCompensationBenchmark()**](CompensationBenchmarkingApi.md#updateCompensationBenchmark) | **PUT** /api/v1/compensation/benchmarks | Update Compensation Benchmark |
| [**updateCompensationBenchmarkSources()**](CompensationBenchmarkingApi.md#updateCompensationBenchmarkSources) | **PUT** /api/v1/compensation/benchmarks/sources | Update Compensation Benchmark Sources |


## `createCompensationBenchmark()`

```php
createCompensationBenchmark($create_compensation_benchmark_request): \BhrSdk\Model\CreatedCompensationBenchmark
```

Create Compensation Benchmark

Creates a new compensation benchmark for a specific company job title (and optionally a specific job location). The `jobTitleId` value comes from `GET /api/v1/compensation/benchmarks` (`jobDetails.id`) or the company's job-title list. When `jobLocationId` is omitted, the benchmark applies to the job title at any location. Returns the saved benchmark wrapped in `savedBenchmark` along with a status `message`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_compensation_benchmark_request = new \BhrSdk\Model\CreateCompensationBenchmarkRequest(); // \BhrSdk\Model\CreateCompensationBenchmarkRequest

try {
    $result = $apiInstance->createCompensationBenchmark($create_compensation_benchmark_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->createCompensationBenchmark: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_compensation_benchmark_request** | [**\BhrSdk\Model\CreateCompensationBenchmarkRequest**](../Model/CreateCompensationBenchmarkRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\CreatedCompensationBenchmark**](../Model/CreatedCompensationBenchmark.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCompensationBenchmarkSource()`

```php
createCompensationBenchmarkSource($create_compensation_benchmark_source_request): \BhrSdk\Model\CreatedCompensationBenchmarkSource
```

Create Compensation Benchmark Source

Creates a new benchmark source the company can attach to its benchmarks. The `name` must be non-empty; the reserved name `mercer` (case-insensitive) is rejected because Mercer sources are managed separately. Returns the new source's ID and the trimmed name.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_compensation_benchmark_source_request = new \BhrSdk\Model\CreateCompensationBenchmarkSourceRequest(); // \BhrSdk\Model\CreateCompensationBenchmarkSourceRequest

try {
    $result = $apiInstance->createCompensationBenchmarkSource($create_compensation_benchmark_source_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->createCompensationBenchmarkSource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_compensation_benchmark_source_request** | [**\BhrSdk\Model\CreateCompensationBenchmarkSourceRequest**](../Model/CreateCompensationBenchmarkSourceRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\CreatedCompensationBenchmarkSource**](../Model/CreatedCompensationBenchmarkSource.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCompensationBenchmark()`

```php
deleteCompensationBenchmark($id): string
```

Delete Compensation Benchmark

Permanently removes the compensation benchmark identified by `id`. The `id` is a numeric benchmark row identifier; non-numeric values are rejected by the handler. Valid values are returned by `GET /api/v1/compensation/benchmarks/details` under `benchmarkValues[].id` and by the create/update endpoints as `savedBenchmark.id`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Integer ID of the compensation benchmark to delete.

try {
    $result = $apiInstance->deleteCompensationBenchmark($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->deleteCompensationBenchmark: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Integer ID of the compensation benchmark to delete. | |

### Return type

**string**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCompensationBenchmarkSource()`

```php
deleteCompensationBenchmarkSource($delete_compensation_benchmark_source_request): \BhrSdk\Model\DeleteCompensationBenchmarkSourceResponse
```

Delete Compensation Benchmark Source

Deletes a benchmark source together with all benchmarks currently attached to it. The source `id` is taken from the request body. Use `GET /api/v1/compensation/benchmarks/sources` to look up the `id` of the source to delete. Returns `{ \"result\": \"success\" }` when the source is removed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$delete_compensation_benchmark_source_request = new \BhrSdk\Model\DeleteCompensationBenchmarkSourceRequest(); // \BhrSdk\Model\DeleteCompensationBenchmarkSourceRequest

try {
    $result = $apiInstance->deleteCompensationBenchmarkSource($delete_compensation_benchmark_source_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->deleteCompensationBenchmarkSource: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **delete_compensation_benchmark_source_request** | [**\BhrSdk\Model\DeleteCompensationBenchmarkSourceRequest**](../Model/DeleteCompensationBenchmarkSourceRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\DeleteCompensationBenchmarkSourceResponse**](../Model/DeleteCompensationBenchmarkSourceResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `exportCompensationBenchmarkDetails()`

```php
exportCompensationBenchmarkDetails($job_id, $location_id): string
```

Export Compensation Benchmark Details

Returns a CSV export of the compensation benchmark detail view for a single job, optionally scoped to a specific location. Rows include employee-level data (name, location, annualized pay, compa-ratio, range penetration, years of experience) alongside the company's internal pay band for the job. Use `GET /api/v1/compensation/benchmarks` to find valid `jobId` and `locationId` values. When `locationId` is omitted, the export aggregates across all locations for the job.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string | ID of the company job title to export benchmark details for.
$location_id = 'location_id_example'; // string | Optional job location ID to restrict the export to one location.

try {
    $result = $apiInstance->exportCompensationBenchmarkDetails($job_id, $location_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->exportCompensationBenchmarkDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**| ID of the company job title to export benchmark details for. | |
| **location_id** | **string**| Optional job location ID to restrict the export to one location. | [optional] |

### Return type

**string**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/csv`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompensationBenchmarkDetails()`

```php
getCompensationBenchmarkDetails($job_id, $location_id): \BhrSdk\Model\CompensationBenchmarkDetails
```

Get Compensation Benchmark Details

Returns detailed benchmark data for a single company job title, optionally scoped to a specific location. The response includes the company pay range derived from current employees, the internal pay band configured for the job (if any), Mercer benchmark details when a Mercer benchmark is linked, every saved benchmark for the job/location (empty when none exist), and per-employee salary and compensation stats. Use `GET /api/v1/compensation/benchmarks` to find valid `jobId` and `locationId` values.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string | ID of the company job title to fetch benchmark details for.
$location_id = 'location_id_example'; // string | Optional job location ID. When omitted, results aggregate across all locations for the job.

try {
    $result = $apiInstance->getCompensationBenchmarkDetails($job_id, $location_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->getCompensationBenchmarkDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**| ID of the company job title to fetch benchmark details for. | |
| **location_id** | **string**| Optional job location ID. When omitted, results aggregate across all locations for the job. | [optional] |

### Return type

[**\BhrSdk\Model\CompensationBenchmarkDetails**](../Model/CompensationBenchmarkDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `importCompensationBenchmarks()`

```php
importCompensationBenchmarks($file): \BhrSdk\Model\ImportCompensationBenchmarksResponse
```

Import Compensation Benchmarks From CSV

Parses a CSV of compensation benchmarks uploaded as multipart/form-data and returns the parsed rows together with a suggested column-to-field mapping. The response is a preview payload — callers must follow up with the publish step in the UI/API to persist benchmarks. Returns `400` when no `file` part is provided and `422` when the CSV is malformed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject | CSV file to import.

try {
    $result = $apiInstance->importCompensationBenchmarks($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->importCompensationBenchmarks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| CSV file to import. | |

### Return type

[**\BhrSdk\Model\ImportCompensationBenchmarksResponse**](../Model/ImportCompensationBenchmarksResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompensationBenchmarkSources()`

```php
listCompensationBenchmarkSources(): \BhrSdk\Model\CompensationBenchmarkSource[]
```

List Compensation Benchmark Sources

Returns every enabled benchmark source configured for the company. Each source identifies where a benchmark value came from (for example, a specific survey provider) and includes a display color and the count of benchmarks currently attached to that source. Use the returned `id` as the `sourceId` input when creating or updating a benchmark.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listCompensationBenchmarkSources();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->listCompensationBenchmarkSources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompensationBenchmarkSource[]**](../Model/CompensationBenchmarkSource.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompensationBenchmarks()`

```php
listCompensationBenchmarks(): \BhrSdk\Model\CompensationBenchmarksList
```

List Compensation Benchmarks

Returns every job/location pair the company tracks for compensation benchmarking. Each entry includes job and location identifiers, the benchmarks attached to that pair, the employees currently assigned to that job and location, and the company's configured internal pay band if one exists. Use the returned `jobDetails.id` and `locationDetails.id` values as the `jobId` and `locationId` inputs for `GET /api/v1/compensation/benchmarks/details`. Top-level `dismiss*Banner` fields reflect UI banner state and are not part of the benchmark data contract.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listCompensationBenchmarks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->listCompensationBenchmarks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\CompensationBenchmarksList**](../Model/CompensationBenchmarksList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompensationBenchmark()`

```php
updateCompensationBenchmark($update_compensation_benchmark_request): \BhrSdk\Model\UpdatedCompensationBenchmark
```

Update Compensation Benchmark

Updates an existing compensation benchmark identified by `id`. The `id` of an existing benchmark can be obtained from `GET /api/v1/compensation/benchmarks/details`. Request fields that are omitted or `null` are cleared on the stored benchmark; callers should send the full benchmark payload to preserve values. On success, returns the saved benchmark row wrapped in `savedBenchmark` together with a status `message`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_compensation_benchmark_request = new \BhrSdk\Model\UpdateCompensationBenchmarkRequest(); // \BhrSdk\Model\UpdateCompensationBenchmarkRequest

try {
    $result = $apiInstance->updateCompensationBenchmark($update_compensation_benchmark_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->updateCompensationBenchmark: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_compensation_benchmark_request** | [**\BhrSdk\Model\UpdateCompensationBenchmarkRequest**](../Model/UpdateCompensationBenchmarkRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\UpdatedCompensationBenchmark**](../Model/UpdatedCompensationBenchmark.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompensationBenchmarkSources()`

```php
updateCompensationBenchmarkSources($update_compensation_benchmark_sources_request): \BhrSdk\Model\UpdateCompensationBenchmarkSourcesResponse
```

Update Compensation Benchmark Sources

Updates the name and sort order of one or more existing benchmark sources in a single call. Every item in `benchmarkSources` must include a non-empty `id` and `name`; any item with the reserved name `mercer` (case-insensitive) is rejected because Mercer sources are managed separately. Use `GET /api/v1/compensation/benchmarks/sources` to obtain the current `id` values. Returns `{ \"result\": \"success\" }` when all updates are applied.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CompensationBenchmarkingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_compensation_benchmark_sources_request = new \BhrSdk\Model\UpdateCompensationBenchmarkSourcesRequest(); // \BhrSdk\Model\UpdateCompensationBenchmarkSourcesRequest

try {
    $result = $apiInstance->updateCompensationBenchmarkSources($update_compensation_benchmark_sources_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompensationBenchmarkingApi->updateCompensationBenchmarkSources: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_compensation_benchmark_sources_request** | [**\BhrSdk\Model\UpdateCompensationBenchmarkSourcesRequest**](../Model/UpdateCompensationBenchmarkSourcesRequest.md)|  | [optional] |

### Return type

[**\BhrSdk\Model\UpdateCompensationBenchmarkSourcesResponse**](../Model/UpdateCompensationBenchmarkSourcesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
