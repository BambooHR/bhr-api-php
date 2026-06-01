# BhrSdk\LocationsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createLocation()**](LocationsApi.md#createLocation) | **POST** /api/v1/hris/org/locations | Create a job location |
| [**deleteLocation()**](LocationsApi.md#deleteLocation) | **DELETE** /api/v1/hris/org/locations/{id} | Delete a job location |
| [**getLocation()**](LocationsApi.md#getLocation) | **GET** /api/v1/hris/org/locations/{id} | Get a job location |
| [**getLocations()**](LocationsApi.md#getLocations) | **GET** /api/v1/hris/org/locations | List job locations |
| [**updateLocation()**](LocationsApi.md#updateLocation) | **PUT** /api/v1/hris/org/locations/{id} | Update a job location |


## `createLocation()`

```php
createLocation($create_location_request): \BhrSdk\Model\LocationResponseObject
```

Create a job location

Creates a new job location. Requires a label and address. If remoteLocation is true, address fields are optional.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_location_request = new \BhrSdk\Model\CreateLocationRequest(); // \BhrSdk\Model\CreateLocationRequest

try {
    $result = $apiInstance->createLocation($create_location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->createLocation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_location_request** | [**\BhrSdk\Model\CreateLocationRequest**](../Model/CreateLocationRequest.md)|  | |

### Return type

[**\BhrSdk\Model\LocationResponseObject**](../Model/LocationResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteLocation()`

```php
deleteLocation($id)
```

Delete a job location

Deletes a job location by its ID. Returns 204 No Content on success.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the location to delete

try {
    $apiInstance->deleteLocation($id);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->deleteLocation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the location to delete | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLocation()`

```php
getLocation($id, $expand): \BhrSdk\Model\LocationResponseObject
```

Get a job location

Retrieves a single job location by its ID. Returns the full location resource including address details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the location
$expand = array('expand_example'); // string[] | Comma-separated list of related resources to expand. Supported values: state, country. Example: expand=state,country

try {
    $result = $apiInstance->getLocation($id, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getLocation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the location | |
| **expand** | [**string[]**](../Model/string.md)| Comma-separated list of related resources to expand. Supported values: state, country. Example: expand&#x3D;state,country | [optional] |

### Return type

[**\BhrSdk\Model\LocationResponseObject**](../Model/LocationResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLocations()`

```php
getLocations($page_size, $page, $sort, $select, $filter, $expand): \BhrSdk\Model\PagedLocationResponse
```

List job locations

Retrieves a paginated list of job locations. Returns active locations by default. Supports pagination via page and pageSize query parameters.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page_size = 500; // int | The number of items to return per page.
$page = 0; // int | The page number to retrieve.
$sort = ''; // string | Ordering by OData (Open Data Protocol) v4 specification. Supported fields: label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation, createdAt, archivedAt
$select = ''; // string | Projection (field selection) by OData specification. Supported fields: id, label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation, createdAt, archivedAt
$filter = ''; // string | Filter by an OData (Open Data Protocol) v4 specification. Supported fields: id, label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation
$expand = array('expand_example'); // string[] | Comma-separated list of related resources to expand. Supported values: state, country. Example: expand=state,country

try {
    $result = $apiInstance->getLocations($page_size, $page, $sort, $select, $filter, $expand);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->getLocations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page_size** | **int**| The number of items to return per page. | [optional] [default to 500] |
| **page** | **int**| The page number to retrieve. | [optional] [default to 0] |
| **sort** | **string**| Ordering by OData (Open Data Protocol) v4 specification. Supported fields: label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation, createdAt, archivedAt | [optional] [default to &#39;&#39;] |
| **select** | **string**| Projection (field selection) by OData specification. Supported fields: id, label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation, createdAt, archivedAt | [optional] [default to &#39;&#39;] |
| **filter** | **string**| Filter by an OData (Open Data Protocol) v4 specification. Supported fields: id, label, archived, manageable, address/address1, address/address2, address/city, address/stateId, address/zipcode, address/countryId, address/timezone, address/remoteLocation | [optional] [default to &#39;&#39;] |
| **expand** | [**string[]**](../Model/string.md)| Comma-separated list of related resources to expand. Supported values: state, country. Example: expand&#x3D;state,country | [optional] |

### Return type

[**\BhrSdk\Model\PagedLocationResponse**](../Model/PagedLocationResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateLocation()`

```php
updateLocation($id, $update_location_request): \BhrSdk\Model\LocationResponseObject
```

Update a job location

Updates an existing job location.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\LocationsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the location to update
$update_location_request = new \BhrSdk\Model\UpdateLocationRequest(); // \BhrSdk\Model\UpdateLocationRequest

try {
    $result = $apiInstance->updateLocation($id, $update_location_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocationsApi->updateLocation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the location to update | |
| **update_location_request** | [**\BhrSdk\Model\UpdateLocationRequest**](../Model/UpdateLocationRequest.md)|  | |

### Return type

[**\BhrSdk\Model\LocationResponseObject**](../Model/LocationResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
