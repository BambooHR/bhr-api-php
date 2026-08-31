# BhrSdk\CustomFieldsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addCustomFieldListValue()**](CustomFieldsApi.md#addCustomFieldListValue) | **POST** /api/v1/hris/custom-fields/{customFieldId}/list-values | Add Custom Field List Value |
| [**archivePublicCustomField()**](CustomFieldsApi.md#archivePublicCustomField) | **DELETE** /api/v1/hris/custom-fields/{customFieldId} | Archive Custom Field |
| [**createPublicCustomField()**](CustomFieldsApi.md#createPublicCustomField) | **POST** /api/v1/hris/custom-fields | Create Custom Field |
| [**deleteCustomFieldListValue()**](CustomFieldsApi.md#deleteCustomFieldListValue) | **DELETE** /api/v1/hris/custom-fields/{customFieldId}/list-values/{listValueId} | Delete Custom Field List Value |
| [**editCustomFieldListValue()**](CustomFieldsApi.md#editCustomFieldListValue) | **PATCH** /api/v1/hris/custom-fields/{customFieldId}/list-values/{listValueId} | Edit Custom Field List Value |
| [**editPublicCustomField()**](CustomFieldsApi.md#editPublicCustomField) | **PUT** /api/v1/hris/custom-fields/{customFieldId} | Edit Custom Field |
| [**getCustomField()**](CustomFieldsApi.md#getCustomField) | **GET** /api/v1/hris/custom-fields/{customFieldId} | Get Custom Field |
| [**listArchivedCustomFields()**](CustomFieldsApi.md#listArchivedCustomFields) | **GET** /api/v1/hris/custom-fields/archived | List Archived Custom Fields |
| [**listCustomFieldListValues()**](CustomFieldsApi.md#listCustomFieldListValues) | **GET** /api/v1/hris/custom-fields/{customFieldId}/list-values | List Custom Field List Values |
| [**listCustomFieldTypes()**](CustomFieldsApi.md#listCustomFieldTypes) | **GET** /api/v1/hris/custom-fields/types | List Custom Field Types |
| [**listCustomFields()**](CustomFieldsApi.md#listCustomFields) | **GET** /api/v1/hris/custom-fields | List Custom Fields |
| [**unarchivePublicCustomFields()**](CustomFieldsApi.md#unarchivePublicCustomFields) | **POST** /api/v1/hris/custom-fields/unarchive | Unarchive Custom Fields |


## `addCustomFieldListValue()`

```php
addCustomFieldListValue($custom_field_id, $add_custom_field_list_value_request): \BhrSdk\Model\AddCustomFieldListValueResponse
```

Add Custom Field List Value

Adds one or more dropdown options to a list-type custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field.
$add_custom_field_list_value_request = new \BhrSdk\Model\AddCustomFieldListValueRequest(); // \BhrSdk\Model\AddCustomFieldListValueRequest

try {
    $result = $apiInstance->addCustomFieldListValue($custom_field_id, $add_custom_field_list_value_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->addCustomFieldListValue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field. | |
| **add_custom_field_list_value_request** | [**\BhrSdk\Model\AddCustomFieldListValueRequest**](../Model/AddCustomFieldListValueRequest.md)|  | |

### Return type

[**\BhrSdk\Model\AddCustomFieldListValueResponse**](../Model/AddCustomFieldListValueResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `archivePublicCustomField()`

```php
archivePublicCustomField($custom_field_id): \BhrSdk\Model\ArchiveCustomFieldResponse
```

Archive Custom Field

Archive a custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field to archive.

try {
    $result = $apiInstance->archivePublicCustomField($custom_field_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->archivePublicCustomField: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field to archive. | |

### Return type

[**\BhrSdk\Model\ArchiveCustomFieldResponse**](../Model/ArchiveCustomFieldResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createPublicCustomField()`

```php
createPublicCustomField($custom_field_request): \BhrSdk\Model\CustomFieldViewObject
```

Create Custom Field

Create a new custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_request = new \BhrSdk\Model\CustomFieldRequest(); // \BhrSdk\Model\CustomFieldRequest

try {
    $result = $apiInstance->createPublicCustomField($custom_field_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->createPublicCustomField: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_request** | [**\BhrSdk\Model\CustomFieldRequest**](../Model/CustomFieldRequest.md)|  | |

### Return type

[**\BhrSdk\Model\CustomFieldViewObject**](../Model/CustomFieldViewObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCustomFieldListValue()`

```php
deleteCustomFieldListValue($custom_field_id, $list_value_id)
```

Delete Custom Field List Value

Deletes a dropdown option from a list-type custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field.
$list_value_id = 456; // string | The ID of the list value to delete.

try {
    $apiInstance->deleteCustomFieldListValue($custom_field_id, $list_value_id);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->deleteCustomFieldListValue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field. | |
| **list_value_id** | **string**| The ID of the list value to delete. | |

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

## `editCustomFieldListValue()`

```php
editCustomFieldListValue($custom_field_id, $list_value_id, $change_custom_field_list_value_request): \BhrSdk\Model\ListValueViewObject
```

Edit Custom Field List Value

Updates a dropdown option on a list-type custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field.
$list_value_id = 456; // string | The ID of the list value to edit.
$change_custom_field_list_value_request = new \BhrSdk\Model\ChangeCustomFieldListValueRequest(); // \BhrSdk\Model\ChangeCustomFieldListValueRequest

try {
    $result = $apiInstance->editCustomFieldListValue($custom_field_id, $list_value_id, $change_custom_field_list_value_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->editCustomFieldListValue: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field. | |
| **list_value_id** | **string**| The ID of the list value to edit. | |
| **change_custom_field_list_value_request** | [**\BhrSdk\Model\ChangeCustomFieldListValueRequest**](../Model/ChangeCustomFieldListValueRequest.md)|  | |

### Return type

[**\BhrSdk\Model\ListValueViewObject**](../Model/ListValueViewObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/merge-patch+json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `editPublicCustomField()`

```php
editPublicCustomField($custom_field_id, $custom_field_request): \BhrSdk\Model\CustomFieldViewObject
```

Edit Custom Field

Edit an existing custom field.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field to edit.
$custom_field_request = new \BhrSdk\Model\CustomFieldRequest(); // \BhrSdk\Model\CustomFieldRequest

try {
    $result = $apiInstance->editPublicCustomField($custom_field_id, $custom_field_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->editPublicCustomField: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field to edit. | |
| **custom_field_request** | [**\BhrSdk\Model\CustomFieldRequest**](../Model/CustomFieldRequest.md)|  | |

### Return type

[**\BhrSdk\Model\CustomFieldViewObject**](../Model/CustomFieldViewObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCustomField()`

```php
getCustomField($custom_field_id): \BhrSdk\Model\CustomFieldDefinitionResponseObject
```

Get Custom Field

Returns one custom field definition. IDs are strings and each has a numeric `legacyId` companion for legacy integrations. Use this for a known custom field ID. For browsing active fields, use List Custom Fields (`list-custom-fields`) instead. For archived fields, use List Archived Custom Fields (`list-archived-custom-fields`) instead.  OAuth Scopes: employee:custom_fields

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field to retrieve

try {
    $result = $apiInstance->getCustomField($custom_field_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->getCustomField: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field to retrieve | |

### Return type

[**\BhrSdk\Model\CustomFieldDefinitionResponseObject**](../Model/CustomFieldDefinitionResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listArchivedCustomFields()`

```php
listArchivedCustomFields($page, $page_size): \BhrSdk\Model\ArchivedCustomFieldsListResponse
```

List Archived Custom Fields

Returns a paginated list of archived custom fields. IDs are strings and each has a numeric `legacyId` companion for legacy integrations. Use this for archived custom fields. For active custom fields, use List Custom Fields (`list-custom-fields`) instead.  OAuth Scopes: employee:custom_fields

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number to retrieve. Must be greater than or equal to 1.
$page_size = 100; // int | Maximum number of archived custom fields to return per page.

try {
    $result = $apiInstance->listArchivedCustomFields($page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->listArchivedCustomFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number to retrieve. Must be greater than or equal to 1. | [optional] [default to 1] |
| **page_size** | **int**| Maximum number of archived custom fields to return per page. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\ArchivedCustomFieldsListResponse**](../Model/ArchivedCustomFieldsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCustomFieldListValues()`

```php
listCustomFieldListValues($custom_field_id): \BhrSdk\Model\PublicListValuesCustomFieldSettingsResponse
```

List Custom Field List Values

Returns the dropdown options (and employee counts) for a list-type custom field.  OAuth Scopes: employee:custom_fields

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$custom_field_id = 123; // string | The ID of the custom field.

try {
    $result = $apiInstance->listCustomFieldListValues($custom_field_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->listCustomFieldListValues: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **custom_field_id** | **string**| The ID of the custom field. | |

### Return type

[**\BhrSdk\Model\PublicListValuesCustomFieldSettingsResponse**](../Model/PublicListValuesCustomFieldSettingsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCustomFieldTypes()`

```php
listCustomFieldTypes(): \BhrSdk\Model\PublicCustomFieldTypesResponse
```

List Custom Field Types

Returns an object containing the custom field types available when creating a custom field.  OAuth Scopes: employee:custom_fields

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listCustomFieldTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->listCustomFieldTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PublicCustomFieldTypesResponse**](../Model/PublicCustomFieldTypesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCustomFields()`

```php
listCustomFields($page, $page_size): \BhrSdk\Model\CustomFieldsListResponse
```

List Custom Fields

Returns a paginated list of active custom fields. IDs are strings and each has a numeric `legacyId` companion for legacy integrations. Use this for active custom fields. For archived custom fields, use List Archived Custom Fields (`list-archived-custom-fields`) instead.  OAuth Scopes: employee:custom_fields

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page number to retrieve. Must be greater than or equal to 1.
$page_size = 100; // int | Maximum number of custom fields to return per page.

try {
    $result = $apiInstance->listCustomFields($page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->listCustomFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page number to retrieve. Must be greater than or equal to 1. | [optional] [default to 1] |
| **page_size** | **int**| Maximum number of custom fields to return per page. | [optional] [default to 100] |

### Return type

[**\BhrSdk\Model\CustomFieldsListResponse**](../Model/CustomFieldsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unarchivePublicCustomFields()`

```php
unarchivePublicCustomFields($unarchive_custom_fields_request): \BhrSdk\Model\UnarchiveCustomFieldsResponse
```

Unarchive Custom Fields

Unarchive custom fields.  OAuth Scopes: employee:custom_fields.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\CustomFieldsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$unarchive_custom_fields_request = new \BhrSdk\Model\UnarchiveCustomFieldsRequest(); // \BhrSdk\Model\UnarchiveCustomFieldsRequest

try {
    $result = $apiInstance->unarchivePublicCustomFields($unarchive_custom_fields_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomFieldsApi->unarchivePublicCustomFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **unarchive_custom_fields_request** | [**\BhrSdk\Model\UnarchiveCustomFieldsRequest**](../Model/UnarchiveCustomFieldsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\UnarchiveCustomFieldsResponse**](../Model/UnarchiveCustomFieldsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
