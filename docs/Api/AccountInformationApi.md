# BhrSdk\AccountInformationApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**baa7162824294d030115568d1d8e6ca7()**](AccountInformationApi.md#baa7162824294d030115568d1d8e6ca7) | **GET** /api/v1/meta/timezones/{id} | Get timezone by ID |
| [**call10d66d8561dd7dac50ff9c21ef63d83b()**](AccountInformationApi.md#call10d66d8561dd7dac50ff9c21ef63d83b) | **GET** /api/v1/meta/timezones/by-zip/{zip} | Get timezone by ZIP code |
| [**call5c5fb0f1211ae1c9451753f92f1053b6()**](AccountInformationApi.md#call5c5fb0f1211ae1c9451753f92f1053b6) | **GET** /api/v1/meta/timezones | List timezones |
| [**getAllCurrencyTypes()**](AccountInformationApi.md#getAllCurrencyTypes) | **GET** /api/v1/meta/currency/types | Get all currency types |
| [**getAllProvinces()**](AccountInformationApi.md#getAllProvinces) | **GET** /api/v1/meta/provinces | Get All Provinces |
| [**getCountriesOptions()**](AccountInformationApi.md#getCountriesOptions) | **GET** /api/v1/meta/countries/options | Get Countries |
| [**getMetaCompany()**](AccountInformationApi.md#getMetaCompany) | **GET** /api/v1/meta/company | Get company properties |
| [**getStatesByCountryId()**](AccountInformationApi.md#getStatesByCountryId) | **GET** /api/v1/meta/provinces/{countryId} | List states and provinces for a country by Country ID |
| [**listFields()**](AccountInformationApi.md#listFields) | **GET** /api/v1/meta/fields | List Fields |
| [**listListFields()**](AccountInformationApi.md#listListFields) | **GET** /api/v1/meta/lists | List List Fields |
| [**listTabularFields()**](AccountInformationApi.md#listTabularFields) | **GET** /api/v1/meta/tables | List Tabular Fields |
| [**listUsers()**](AccountInformationApi.md#listUsers) | **GET** /api/v1/meta/users | List Users |
| [**updateListFieldValues()**](AccountInformationApi.md#updateListFieldValues) | **PUT** /api/v1/meta/lists/{listFieldId} | Update List Field Values |


## `baa7162824294d030115568d1d8e6ca7()`

```php
baa7162824294d030115568d1d8e6ca7($id): \BhrSdk\Model\TimezoneResource
```

Get timezone by ID

Retrieves a single timezone by its numeric ID. Returns the same timezone resource shape used by the list endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The numeric ID of the timezone to retrieve.

try {
    $result = $apiInstance->baa7162824294d030115568d1d8e6ca7($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->baa7162824294d030115568d1d8e6ca7: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The numeric ID of the timezone to retrieve. | |

### Return type

[**\BhrSdk\Model\TimezoneResource**](../Model/TimezoneResource.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call10d66d8561dd7dac50ff9c21ef63d83b()`

```php
call10d66d8561dd7dac50ff9c21ef63d83b($zip): \BhrSdk\Model\TimezoneResource
```

Get timezone by ZIP code

Retrieves the timezone for a US ZIP code. Returns the same timezone resource shape used by the list endpoint. Only US ZIP codes are supported; valid 5-digit ZIPs that are not present in our reference data return a 404.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$zip = 84604; // string | A 5-digit US ZIP code.

try {
    $result = $apiInstance->call10d66d8561dd7dac50ff9c21ef63d83b($zip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->call10d66d8561dd7dac50ff9c21ef63d83b: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **zip** | **string**| A 5-digit US ZIP code. | |

### Return type

[**\BhrSdk\Model\TimezoneResource**](../Model/TimezoneResource.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call5c5fb0f1211ae1c9451753f92f1053b6()`

```php
call5c5fb0f1211ae1c9451753f92f1053b6($page_size, $page, $sort, $select, $filter): \BhrSdk\Model\TimezoneListResponse
```

List timezones

Retrieves a paginated list of timezones. Supports pagination, filtering, sorting, and field projection via OData query parameters.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$page_size = 500; // int | The number of items to return per page.
$page = 1; // int | The page number to retrieve.
$sort = ''; // string | Ordering by OData (Open Data Protocol) v4 specification
$select = ''; // string | Projection (field selection) by OData specification
$filter = ''; // string | Filter by an OData (Open Data Protocol) v4 specification

try {
    $result = $apiInstance->call5c5fb0f1211ae1c9451753f92f1053b6($page_size, $page, $sort, $select, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->call5c5fb0f1211ae1c9451753f92f1053b6: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page_size** | **int**| The number of items to return per page. | [optional] [default to 500] |
| **page** | **int**| The page number to retrieve. | [optional] [default to 1] |
| **sort** | **string**| Ordering by OData (Open Data Protocol) v4 specification | [optional] [default to &#39;&#39;] |
| **select** | **string**| Projection (field selection) by OData specification | [optional] [default to &#39;&#39;] |
| **filter** | **string**| Filter by an OData (Open Data Protocol) v4 specification | [optional] [default to &#39;&#39;] |

### Return type

[**\BhrSdk\Model\TimezoneListResponse**](../Model/TimezoneListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllCurrencyTypes()`

```php
getAllCurrencyTypes(): \BhrSdk\Model\MetaCurrencyTypeItem[]
```

Get all currency types

Returns a JSON array of supported currency catalog entries. Each object includes `id`, `code`, `name`, `symbol` (display symbol), and `symbolPosition`—an integer discriminator: `0` = symbol before the amount (prefix) and `1` = after the amount (postfix), matching the values returned in the JSON body.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAllCurrencyTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getAllCurrencyTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\MetaCurrencyTypeItem[]**](../Model/MetaCurrencyTypeItem.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllProvinces()`

```php
getAllProvinces(): \BhrSdk\Model\ProvinceItem[]
```

Get All Provinces

Returns a flat list of all states and provinces across every country. Each entry includes a numeric ID, the countryId it belongs to, an abbreviation label (e.g. \"UT\"), an ISO 3166-2 code (e.g. \"US-UT\"), and a full name. Use the countryId field to filter client-side.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAllProvinces();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getAllProvinces: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\ProvinceItem[]**](../Model/ProvinceItem.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCountriesOptions()`

```php
getCountriesOptions($iso_code): \BhrSdk\Model\CountriesOptionsResponse
```

Get Countries

Returns a JSON array of every country in the catalog, or a single country object when `isoCode` is supplied. Each element has `id` (Country ID), `name` (Country Name), and `isoCode` (ISO 3166-1 alpha-2 code or null when unset).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$iso_code = 'iso_code_example'; // string | ISO 3166-1 alpha-2 country code (exactly two letters). When present, returns the matching country as a single object instead of the full array.

try {
    $result = $apiInstance->getCountriesOptions($iso_code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getCountriesOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **iso_code** | **string**| ISO 3166-1 alpha-2 country code (exactly two letters). When present, returns the matching country as a single object instead of the full array. | [optional] |

### Return type

[**\BhrSdk\Model\CountriesOptionsResponse**](../Model/CountriesOptionsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMetaCompany()`

```php
getMetaCompany(): \BhrSdk\Model\MetaCompanyPropertiesResponse
```

Get company properties

Get company properties including ID, name, domain, and base API URL. Provides essential company metadata for API access.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getMetaCompany();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getMetaCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\MetaCompanyPropertiesResponse**](../Model/MetaCompanyPropertiesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStatesByCountryId()`

```php
getStatesByCountryId($country_id): \BhrSdk\Model\StateProvinceResponseSchema
```

List states and provinces for a country by Country ID

Returns the list of states or provinces for the specified country, sorted alphabetically by abbreviation (`options[].label`). Each item follows StateProvinceSchema: `label` is the subdivision abbreviation (e.g. \"UT\"), not the full name; `name` is the full subdivision name; `iso` is the ISO 3166-2 code (e.g. \"US-UT\"). Use a `countryId` from `GET /api/v1/meta/countries/options` (the `id` field on the row for the country) so it matches the countries list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country_id = 56; // int | Numeric id of the country, taken from the countries options list. Use the `id` of the target country from `GET /api/v1/meta/countries/options`.

try {
    $result = $apiInstance->getStatesByCountryId($country_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->getStatesByCountryId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country_id** | **int**| Numeric id of the country, taken from the countries options list. Use the &#x60;id&#x60; of the target country from &#x60;GET /api/v1/meta/countries/options&#x60;. | |

### Return type

[**\BhrSdk\Model\StateProvinceResponseSchema**](../Model/StateProvinceResponseSchema.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listFields()`

```php
listFields($accept_header_parameter): \BhrSdk\Model\Field1[]
```

List Fields

Returns a list of all employee fields available in the account, including field ID, display name, data type, and whether the field is deprecated. Use this endpoint to discover which field names are valid for use with the Get Employee, Datasets, and other field-based endpoints. The response includes standard BambooHR fields as well as any custom fields configured in the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->listFields($accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->listFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\Field1[]**](../Model/Field1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listListFields()`

```php
listListFields($format, $accept_header_parameter): \BhrSdk\Model\ListFieldDetail[]
```

List List Fields

Returns details for all list fields in the account. Each list includes its field ID, alias, options, and whether it is manageable (editable). Lists with the `manageable` attribute set to `yes` can be modified via the PUT endpoint. Lists with the `multiple` attribute set to `yes` are fields that can have multiple values. Options with the `archived` attribute set to `yes` are soft-deleted and included so that historical data can reference the value — filter by `archived: no` to show only active options to end users.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$format = 'format_example'; // string | Set to \"json\" to receive JSON output as an alternative to using the Accept header.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->listListFields($format, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->listListFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **format** | **string**| Set to \&quot;json\&quot; to receive JSON output as an alternative to using the Accept header. | [optional] |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\ListFieldDetail[]**](../Model/ListFieldDetail.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTabularFields()`

```php
listTabularFields($accept_header_parameter): \BhrSdk\Model\TabularField[]
```

List Tabular Fields

Returns a list of all tabular (table-based) fields available in the account. Each table includes its alias and the fields it contains with their IDs, names, and types. Use this endpoint to discover which table names are valid for the table row endpoints (e.g., jobInfo, compensation, employmentStatus). For fields whose type is `list`, `multilist`, or another option-backed type, the field `id` can be matched to `fieldId` from `list-list-fields` to retrieve the account-level option list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->listTabularFields($accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->listTabularFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\BhrSdk\Model\TabularField[]**](../Model/TabularField.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listUsers()`

```php
listUsers($accept_header_parameter, $status): array<string,\BhrSdk\Model\ListUsersResponseValue>
```

List Users

Returns all users for the company, optionally filtered by status. Each user entry includes a user ID, associated employee ID, name, email address (resolved in priority order: work, home, account), account status, and last login time when available.  Pass a comma-separated list of status values via the `status` query parameter to filter results. Valid values are `enabled` and `disabled`. If the parameter is omitted or contains only unrecognized values, users of all statuses are returned. Support admin accounts are always excluded from the response.  The response format is determined by the `Accept` request header. Send `Accept: application/json` to receive JSON; omit the header or send any other value to receive XML.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$status = enabled; // string | Comma-separated list of statuses to filter by. Valid values: `enabled`, `disabled`. Defaults to returning users of all statuses when omitted or when no recognized value is provided.

try {
    $result = $apiInstance->listUsers($accept_header_parameter, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->listUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **status** | **string**| Comma-separated list of statuses to filter by. Valid values: &#x60;enabled&#x60;, &#x60;disabled&#x60;. Defaults to returning users of all statuses when omitted or when no recognized value is provided. | [optional] |

### Return type

[**array<string,\BhrSdk\Model\ListUsersResponseValue>**](../Model/ListUsersResponseValue.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateListFieldValues()`

```php
updateListFieldValues($list_field_id, $list_field_values, $format): \BhrSdk\Model\ListFieldDetail
```

Update List Field Values

Create, update, or archive options for a list field. To update an existing option, specify its `id`. To create a new option, omit `id`. To archive an option, set `archived` to `yes` — the option is soft-deleted and will continue to appear in GET responses for historical data integrity. To reactivate an archived option, set `archived` to `no`. The `archivedDate` field is server-set when an option is first archived and is not cleared if the option is later reactivated. Options on list fields with `manageable: no` cannot be modified and will return a 405.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AccountInformationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$list_field_id = 'list_field_id_example'; // string | The field ID of the list to update. This is the `fieldId` value returned by the GET endpoint, not the list `id`.
$list_field_values = new \BhrSdk\Model\ListFieldValues(); // \BhrSdk\Model\ListFieldValues
$format = 'format_example'; // string | Set to \"json\" to receive JSON output as an alternative to using the Accept header.

try {
    $result = $apiInstance->updateListFieldValues($list_field_id, $list_field_values, $format);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountInformationApi->updateListFieldValues: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **list_field_id** | **string**| The field ID of the list to update. This is the &#x60;fieldId&#x60; value returned by the GET endpoint, not the list &#x60;id&#x60;. | |
| **list_field_values** | [**\BhrSdk\Model\ListFieldValues**](../Model/ListFieldValues.md)|  | |
| **format** | **string**| Set to \&quot;json\&quot; to receive JSON output as an alternative to using the Accept header. | [optional] |

### Return type

[**\BhrSdk\Model\ListFieldDetail**](../Model/ListFieldDetail.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`, `text/xml`
- **Accept**: `application/json`, `text/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
