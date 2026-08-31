# BhrSdk\HolidaysApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkInsertCompanyHolidays()**](HolidaysApi.md#bulkInsertCompanyHolidays) | **POST** /api/v1/holidays/bulk-insert | Bulk Create Company Holidays |
| [**createCompanyHoliday()**](HolidaysApi.md#createCompanyHoliday) | **POST** /api/v1/holidays | Create Company Holiday |
| [**deleteCompanyHoliday()**](HolidaysApi.md#deleteCompanyHoliday) | **DELETE** /api/v1/holidays/{id} | Delete Company Holiday |
| [**getCatalogHoliday()**](HolidaysApi.md#getCatalogHoliday) | **GET** /api/v1/holidays/catalog/{uuid} | Get Catalog Holiday |
| [**getCompanyHoliday()**](HolidaysApi.md#getCompanyHoliday) | **GET** /api/v1/holidays/{id} | Get Company Holiday |
| [**listCatalogHolidays()**](HolidaysApi.md#listCatalogHolidays) | **GET** /api/v1/holidays/catalog | List Catalog Holidays |
| [**listCompanyHolidays()**](HolidaysApi.md#listCompanyHolidays) | **GET** /api/v1/holidays | List Company Holidays |
| [**updateCompanyHoliday()**](HolidaysApi.md#updateCompanyHoliday) | **PATCH** /api/v1/holidays/{id} | Update Company Holiday |


## `bulkInsertCompanyHolidays()`

```php
bulkInsertCompanyHolidays($holiday_create_company_holiday_request_v1, $atomic, $return_records): \BhrSdk\Model\HolidayBulkInsertCompanyHolidaysResponseV1
```

Bulk Create Company Holidays

Creates multiple company holidays in one synchronous call. Each record follows the single-create semantics: it may be fully-specified or carry a globalHolidayUuid that seeds name, dates, and countries from the global catalog entry (mix-and-match within the same request). Records are processed in request order.  OAuth Scopes: holidays.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$holiday_create_company_holiday_request_v1 = array(new \BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1()); // \BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1[]
$atomic = false; // bool | When true, the entire batch is committed in a single transaction and any per-record failure aborts the whole request with a 422 (no records are created). When false, each record commits independently and failures are reported per record in a 207 response. Accepted values: true/false, 1/0, yes/no, on/off.
$return_records = false; // bool | When true, each entry in the response records array also includes the full created company holiday under the record key. Accepted values: true/false, 1/0, yes/no, on/off.

try {
    $result = $apiInstance->bulkInsertCompanyHolidays($holiday_create_company_holiday_request_v1, $atomic, $return_records);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->bulkInsertCompanyHolidays: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **holiday_create_company_holiday_request_v1** | [**\BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1[]**](../Model/HolidayCreateCompanyHolidayRequestV1.md)|  | |
| **atomic** | **bool**| When true, the entire batch is committed in a single transaction and any per-record failure aborts the whole request with a 422 (no records are created). When false, each record commits independently and failures are reported per record in a 207 response. Accepted values: true/false, 1/0, yes/no, on/off. | [optional] [default to false] |
| **return_records** | **bool**| When true, each entry in the response records array also includes the full created company holiday under the record key. Accepted values: true/false, 1/0, yes/no, on/off. | [optional] [default to false] |

### Return type

[**\BhrSdk\Model\HolidayBulkInsertCompanyHolidaysResponseV1**](../Model/HolidayBulkInsertCompanyHolidaysResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCompanyHoliday()`

```php
createCompanyHoliday($holiday_create_company_holiday_request_v1): \BhrSdk\Model\HolidayCompanyHolidayV1
```

Create Company Holiday

Creates a company holiday. The body may be fully-specified or carry a globalHolidayUuid that seeds name, dates, and countries from the global catalog entry; partner-supplied values override the catalog defaults.  OAuth Scopes: holidays.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$holiday_create_company_holiday_request_v1 = new \BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1(); // \BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1

try {
    $result = $apiInstance->createCompanyHoliday($holiday_create_company_holiday_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->createCompanyHoliday: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **holiday_create_company_holiday_request_v1** | [**\BhrSdk\Model\HolidayCreateCompanyHolidayRequestV1**](../Model/HolidayCreateCompanyHolidayRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\HolidayCompanyHolidayV1**](../Model/HolidayCompanyHolidayV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCompanyHoliday()`

```php
deleteCompanyHoliday($id)
```

Delete Company Holiday

Soft-deletes a company holiday and removes its audience, pay, and country sub-rows. Idempotent: deleting a missing or already-deleted holiday also returns 204.  OAuth Scopes: holidays.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company holiday ID.

try {
    $apiInstance->deleteCompanyHoliday($id);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->deleteCompanyHoliday: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company holiday ID. | |

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

## `getCatalogHoliday()`

```php
getCatalogHoliday($uuid): \BhrSdk\Model\GlobalHolidayGlobalHolidayV1
```

Get Catalog Holiday

Gets a global holiday catalog entry by UUID.  OAuth Scopes: holidays

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$uuid = 'uuid_example'; // string | The catalog entry UUID.

try {
    $result = $apiInstance->getCatalogHoliday($uuid);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->getCatalogHoliday: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **uuid** | **string**| The catalog entry UUID. | |

### Return type

[**\BhrSdk\Model\GlobalHolidayGlobalHolidayV1**](../Model/GlobalHolidayGlobalHolidayV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyHoliday()`

```php
getCompanyHoliday($id): \BhrSdk\Model\HolidayCompanyHolidayV1
```

Get Company Holiday

Gets a company holiday by ID.  OAuth Scopes: holidays

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company holiday ID.

try {
    $result = $apiInstance->getCompanyHoliday($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->getCompanyHoliday: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company holiday ID. | |

### Return type

[**\BhrSdk\Model\HolidayCompanyHolidayV1**](../Model/HolidayCompanyHolidayV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCatalogHolidays()`

```php
listCatalogHolidays($country_code, $year, $filter, $order_by, $page, $page_size): \BhrSdk\Model\HolidayCatalogHolidayListResponseV1
```

List Catalog Holidays

Lists entries in the global holiday catalog. The catalog is read-only system reference data; use the returned uuid values to seed company holidays.  OAuth Scopes: holidays

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country_code = 'country_code_example'; // string | ISO 3166-1 alpha-2 country code. Filters the catalog to entries for the given country.
$year = 56; // int | Calendar year. Filters the catalog to entries whose startDate falls in the given year.
$filter = 'filter_example'; // string | OData v4 filter expression. Supported fields: name, type, countryCode, startDate. Example: startDate ge '2026-01-01' and type eq 'PUBLIC'
$order_by = 'startDate asc'; // string | Sort expression. Allowed fields: startDate, name, with optional asc/desc direction.
$page = 1; // int | Page number.
$page_size = 20; // int | Page size.

try {
    $result = $apiInstance->listCatalogHolidays($country_code, $year, $filter, $order_by, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->listCatalogHolidays: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country_code** | **string**| ISO 3166-1 alpha-2 country code. Filters the catalog to entries for the given country. | [optional] |
| **year** | **int**| Calendar year. Filters the catalog to entries whose startDate falls in the given year. | [optional] |
| **filter** | **string**| OData v4 filter expression. Supported fields: name, type, countryCode, startDate. Example: startDate ge &#39;2026-01-01&#39; and type eq &#39;PUBLIC&#39; | [optional] |
| **order_by** | **string**| Sort expression. Allowed fields: startDate, name, with optional asc/desc direction. | [optional] [default to &#39;startDate asc&#39;] |
| **page** | **int**| Page number. | [optional] [default to 1] |
| **page_size** | **int**| Page size. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\HolidayCatalogHolidayListResponseV1**](../Model/HolidayCatalogHolidayListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompanyHolidays()`

```php
listCompanyHolidays($filter, $order_by, $select, $page, $page_size): \BhrSdk\Model\HolidayCompanyHolidayListResponseV1
```

List Company Holidays

Returns a paginated list of active company holidays. Soft-deleted holidays are never returned. Supports OData filtering via `filter`, sorting via `orderBy`, field projection via `select`, and page-based pagination.  OAuth Scopes: holidays

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = 'filter_example'; // string | OData filter expression applied to company holidays. Supported operators: `eq` (equals, use `eq null` to match NULL), `ne` (not equals, use `ne null` to match NOT NULL), `lt` (less than), `le` (less than or equal), `gt` (greater than), `ge` (greater than or equal), `in` (value in list), `and` (combine clauses). Not supported: `or`, `not`, parenthesized grouping. Filterable fields: `name`, `startDate`, `endDate`, `isPublic`, `globalHolidayUuid`. Examples: `startDate ge '2026-01-01'`, `isPublic eq true and endDate ne null`.
$order_by = 'startDate asc'; // string | Comma-separated list of sort terms, each a field optionally followed by `asc` or `desc`. Allowed sort fields: `name`, `startDate`, `endDate`, `createdAt`, `updatedAt`.
$select = 'select_example'; // string | Comma-separated list of properties to include in each returned holiday. Reduces payload size. Example: `id,name,startDate`.
$page = 1; // int | The page number to retrieve.
$page_size = 20; // int | The number of items to return per page.

try {
    $result = $apiInstance->listCompanyHolidays($filter, $order_by, $select, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->listCompanyHolidays: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| OData filter expression applied to company holidays. Supported operators: &#x60;eq&#x60; (equals, use &#x60;eq null&#x60; to match NULL), &#x60;ne&#x60; (not equals, use &#x60;ne null&#x60; to match NOT NULL), &#x60;lt&#x60; (less than), &#x60;le&#x60; (less than or equal), &#x60;gt&#x60; (greater than), &#x60;ge&#x60; (greater than or equal), &#x60;in&#x60; (value in list), &#x60;and&#x60; (combine clauses). Not supported: &#x60;or&#x60;, &#x60;not&#x60;, parenthesized grouping. Filterable fields: &#x60;name&#x60;, &#x60;startDate&#x60;, &#x60;endDate&#x60;, &#x60;isPublic&#x60;, &#x60;globalHolidayUuid&#x60;. Examples: &#x60;startDate ge &#39;2026-01-01&#39;&#x60;, &#x60;isPublic eq true and endDate ne null&#x60;. | [optional] |
| **order_by** | **string**| Comma-separated list of sort terms, each a field optionally followed by &#x60;asc&#x60; or &#x60;desc&#x60;. Allowed sort fields: &#x60;name&#x60;, &#x60;startDate&#x60;, &#x60;endDate&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. | [optional] [default to &#39;startDate asc&#39;] |
| **select** | **string**| Comma-separated list of properties to include in each returned holiday. Reduces payload size. Example: &#x60;id,name,startDate&#x60;. | [optional] |
| **page** | **int**| The page number to retrieve. | [optional] [default to 1] |
| **page_size** | **int**| The number of items to return per page. | [optional] [default to 20] |

### Return type

[**\BhrSdk\Model\HolidayCompanyHolidayListResponseV1**](../Model/HolidayCompanyHolidayListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompanyHoliday()`

```php
updateCompanyHoliday($id, $holiday_update_company_holiday_request_v1): \BhrSdk\Model\HolidayCompanyHolidayV1
```

Update Company Holiday

Updates a company holiday with a JSON Merge Patch (RFC 7396) document. Only the fields present in the patch change; countryCodes, audience, and holidayPay replace their stored blocks wholesale when supplied. Send null for endDate to revert to a single-day holiday and null for holidayPay to clear the pay treatment. globalHolidayUuid is read-only and rejected if present.  OAuth Scopes: holidays.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\HolidaysApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company holiday ID.
$holiday_update_company_holiday_request_v1 = new \BhrSdk\Model\HolidayUpdateCompanyHolidayRequestV1(); // \BhrSdk\Model\HolidayUpdateCompanyHolidayRequestV1

try {
    $result = $apiInstance->updateCompanyHoliday($id, $holiday_update_company_holiday_request_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HolidaysApi->updateCompanyHoliday: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company holiday ID. | |
| **holiday_update_company_holiday_request_v1** | [**\BhrSdk\Model\HolidayUpdateCompanyHolidayRequestV1**](../Model/HolidayUpdateCompanyHolidayRequestV1.md)|  | |

### Return type

[**\BhrSdk\Model\HolidayCompanyHolidayV1**](../Model/HolidayCompanyHolidayV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
