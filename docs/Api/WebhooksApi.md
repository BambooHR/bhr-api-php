# BhrSdk\WebhooksApi


Please also refer to this link for notes on security and an explanation of global & permissioned webhooks: https://documentation.bamboohr.com/docs/webhooks

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhook()**](WebhooksApi.md#createWebhook) | **POST** /api/v1/webhooks | Create Webhook |
| [**deleteWebhook()**](WebhooksApi.md#deleteWebhook) | **DELETE** /api/v1/webhooks/{id} | Delete Webhook |
| [**getPostFields()**](WebhooksApi.md#getPostFields) | **GET** /api/v1/webhooks/post-fields | Get Webhook Post Fields |
| [**getWebhook()**](WebhooksApi.md#getWebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook |
| [**listMonitorFields()**](WebhooksApi.md#listMonitorFields) | **GET** /api/v1/webhooks/monitor_fields | List Monitor Fields |
| [**listWebhookLogs()**](WebhooksApi.md#listWebhookLogs) | **GET** /api/v1/webhooks/{id}/log | List Webhook Logs |
| [**listWebhooks()**](WebhooksApi.md#listWebhooks) | **GET** /api/v1/webhooks | List Webhooks |
| [**updateWebhook()**](WebhooksApi.md#updateWebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook |


## `createWebhook()`

```php
createWebhook($new_web_hook): \BhrSdk\Model\Webhook
```

Create Webhook

Creates a new webhook for the authenticated user. The webhook will fire when the specified events occur or when any of the monitored fields change.  The `monitorFields` array is required when `events` includes `employee.updated` or `employee_with_fields.updated`. If `events` is omitted, it defaults to `['employee_with_fields.updated', 'employee_with_fields.deleted', 'employee_with_fields.created']`, which means `monitorFields` is required by default. The `format` field is required.  The response includes a `privateKey` that should be used to verify the authenticity of incoming webhook payloads via HMAC-SHA256. This key is only returned at creation time and cannot be retrieved again.  For more details refer to the [webhooks documentation](https://documentation.bamboohr.com/docs/webhooks), including guides for [event-based](https://documentation.bamboohr.com/docs/event-based-webhooks) and [field-based](https://documentation.bamboohr.com/docs/field-based-webhooks) webhooks.  For details on the payloads sent by each event, see the event reference: - [employee.created](https://documentation.bamboohr.com/reference/employee-created-webhook) - [employee.updated](https://documentation.bamboohr.com/reference/employee-updated-webhook) - [employee.deleted](https://documentation.bamboohr.com/reference/employee-deleted-webhook)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$new_web_hook = new \BhrSdk\Model\NewWebHook(); // \BhrSdk\Model\NewWebHook

try {
    $result = $apiInstance->createWebhook($new_web_hook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->createWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **new_web_hook** | [**\BhrSdk\Model\NewWebHook**](../Model/NewWebHook.md)|  | |

### Return type

[**\BhrSdk\Model\Webhook**](../Model/Webhook.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWebhook()`

```php
deleteWebhook($id): string
```

Delete Webhook

Permanently removes a webhook owned by the authenticated user. A webhook can only be deleted by the same credentials that created it; attempting to delete another user's webhook returns 403. Use List Webhooks to find webhook IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The webhook ID to delete.

try {
    $result = $apiInstance->deleteWebhook($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->deleteWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The webhook ID to delete. | |

### Return type

**string**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `text/plain`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPostFields()`

```php
getPostFields(): \BhrSdk\Model\WebHookPostFieldResponseObject
```

Get Webhook Post Fields

Returns an object containing the employee fields that can be included in the webhook post body for field-based webhooks. Also includes the related table and page records referenced by those fields. Use the field IDs or aliases from this response in the `postFields` map when creating or updating a field-based webhook.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPostFields();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->getPostFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\WebHookPostFieldResponseObject**](../Model/WebHookPostFieldResponseObject.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhook()`

```php
getWebhook($id): \BhrSdk\Model\WebHookResponse
```

Get Webhook

Returns the full configuration of a single webhook owned by the authenticated user, including its name, URL, format, monitored fields and post fields when applicable, events, creation datetime, and last-sent datetime. Returns 403 if the webhook exists but belongs to a different user, and 404 if the webhook does not exist.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The webhook ID to retrieve.

try {
    $result = $apiInstance->getWebhook($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The webhook ID to retrieve. | |

### Return type

[**\BhrSdk\Model\WebHookResponse**](../Model/WebHookResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listMonitorFields()`

```php
listMonitorFields(): \BhrSdk\Model\MonitorFieldList
```

List Monitor Fields

Returns the list of employee fields that can be monitored by a webhook. Monitor fields are only applicable to webhooks that use update events (`employee.updated` or `employee_with_fields.updated`). Use the field IDs or aliases from this response in the `monitorFields` array when creating or updating a webhook via Create Webhook or Update Webhook.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listMonitorFields();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->listMonitorFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\MonitorFieldList**](../Model/MonitorFieldList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhookLogs()`

```php
listWebhookLogs($id): \BhrSdk\Model\WebhookLogListResponse
```

List Webhook Logs

Returns an array of recent delivery log entries for a webhook. Use List Webhooks to find webhook IDs. Logs cover the last 14 days and are limited to 200 entries. The `lastAttempted` and `lastSuccess` fields are usually UTC datetimes in `YYYY-MM-DD HH:MM:SS` format, but may instead contain status strings such as `Webhook Not Found`. Returns an empty array if no deliveries have occurred in the lookback window.  **Rate limiting:** This endpoint is rate-limited. When the rate limit is exceeded the server still returns HTTP 200, but the body is `{\"error\":{\"code\":429,\"message\":\"Over rate limit, please try again in 60 seconds\"}}` instead of the log array. Callers should check for this shape before processing the response as a log list.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The webhook ID to get logs about.

try {
    $result = $apiInstance->listWebhookLogs($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->listWebhookLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The webhook ID to get logs about. | |

### Return type

[**\BhrSdk\Model\WebhookLogListResponse**](../Model/WebhookLogListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/plain`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhooks()`

```php
listWebhooks(): \BhrSdk\Model\WebhooksList
```

List Webhooks

Returns all webhooks owned by the authenticated user. Each entry is a summary with the webhook's ID, name, URL, creation datetime, and last-fired datetime. Returns an empty array when no webhooks exist. Use \"Get Webhook\" to retrieve the full configuration of a specific webhook, including monitored fields and post fields when applicable, and events.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listWebhooks();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->listWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\WebhooksList**](../Model/WebhooksList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateWebhook()`

```php
updateWebhook($id, $new_web_hook): \BhrSdk\Model\WebHookResponse
```

Update Webhook

Performs a full replacement update of a webhook — all request body fields overwrite existing values, so omitted optional fields revert to defaults. The `monitorFields` array must be non-empty when the webhook's events include `employee.updated` or `employee_with_fields.updated` (the default event set includes `employee_with_fields.updated`). The private key is not regenerated on update. Use List Webhooks to discover webhook IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The webhook ID to update.
$new_web_hook = new \BhrSdk\Model\NewWebHook(); // \BhrSdk\Model\NewWebHook

try {
    $result = $apiInstance->updateWebhook($id, $new_web_hook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->updateWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The webhook ID to update. | |
| **new_web_hook** | [**\BhrSdk\Model\NewWebHook**](../Model/NewWebHook.md)|  | |

### Return type

[**\BhrSdk\Model\WebHookResponse**](../Model/WebHookResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
