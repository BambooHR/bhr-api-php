# BhrSdk\AlertsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAlertConfiguration()**](AlertsApi.md#createAlertConfiguration) | **POST** /api/v1/alert-configurations | Create Alert Configuration |
| [**getAlertConfiguration()**](AlertsApi.md#getAlertConfiguration) | **GET** /api/v1/alert-configurations/{id} | Get Alert Configuration |
| [**listAlertConfigurations()**](AlertsApi.md#listAlertConfigurations) | **GET** /api/v1/alert-configurations | List Alert Configurations |
| [**listAlertTemplates()**](AlertsApi.md#listAlertTemplates) | **GET** /api/v1/alerts | List Alert Templates |
| [**replaceAlertConfiguration()**](AlertsApi.md#replaceAlertConfiguration) | **PUT** /api/v1/alert-configurations/{id} | Replace Alert Configuration |


## `createAlertConfiguration()`

```php
createAlertConfiguration($alert_configuration_write_v1): \BhrSdk\Model\AlertConfigurationV1
```

Create Alert Configuration

Creates an alert configuration for the authenticated company from one of BambooHR's alert templates, and returns the stored configuration, including its server-assigned `id`, as a single JSON object.  Use this to add a configuration the company does not have yet. To overwrite one that already exists, use **Replace Alert Configuration** (`replace-alert-configuration`) instead; to see what is already configured, use **List Alert Configurations** (`list-alert-configurations`). `bambooAlertId` names the alert template the configuration is built on and comes from **List Alert Templates** (`list-alert-templates`). An alert configuration sends scheduled email to people; to receive a programmatic HTTP callback when employee data changes instead, use **Webhooks > Create Webhook** (`create-webhook`).  The configuration is live as soon as it is created and begins sending on the schedule it defines. Nothing limits a template to one configuration, so repeating this call with the same `bambooAlertId` adds a second configuration rather than replacing the first, and no endpoint deletes an alert configuration once it exists. The returned object also carries `additionalRecipientEmails`, `employeeIds`, `listValueIds`, and `userIds`; this API never stores those, so scope an alert's audience with `filterListValueIds` and the `sendTo*` properties instead.  Access is all-or-nothing rather than per-record. An authenticated caller without view access to the company's Email Alerts settings receives `403` instead of a partial success.  OAuth Scopes: alerts.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$alert_configuration_write_v1 = new \BhrSdk\Model\AlertConfigurationWriteV1(); // \BhrSdk\Model\AlertConfigurationWriteV1

try {
    $result = $apiInstance->createAlertConfiguration($alert_configuration_write_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->createAlertConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **alert_configuration_write_v1** | [**\BhrSdk\Model\AlertConfigurationWriteV1**](../Model/AlertConfigurationWriteV1.md)|  | |

### Return type

[**\BhrSdk\Model\AlertConfigurationV1**](../Model/AlertConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAlertConfiguration()`

```php
getAlertConfiguration($id): \BhrSdk\Model\AlertConfigurationV1
```

Get Alert Configuration

Returns one alert configuration the company has set up: which alert template it uses, when it runs, who receives it, and any custom subject, message, or list-value filters. The response is a single JSON object with no wrapper.  Use this when the configuration's `id` is already known, either from **List Alert Configurations** (`list-alert-configurations`) or from the body **Create Alert Configuration** (`create-alert-configuration`) and **Replace Alert Configuration** (`replace-alert-configuration`) return. To enumerate or search a company's configured alerts, use `list-alert-configurations` instead. For the catalog of alert types that *can* be configured, rather than what this company has configured, use **List Alert Templates** (`list-alert-templates`). The `bambooAlertId` on the returned object identifies the underlying template, not this configuration, so the two identifiers are not interchangeable.  Access is all-or-nothing rather than per-record. An authenticated caller without view access to the company's Email Alerts settings receives `403` rather than a partially redacted object. Only configurations belonging to the authenticated company are reachable, and an `id` from any other company is indistinguishable from one that never existed.  OAuth Scopes: alerts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Identifier of the alert configuration to return, as emitted in the `id` field of **List Alert Configurations** (`list-alert-configurations`). This is the configuration's own identifier, not the `bambooAlertId` of the alert template it is based on. No wildcard or `0` sentinel is supported; enumerate configurations with `list-alert-configurations` instead.

try {
    $result = $apiInstance->getAlertConfiguration($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->getAlertConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Identifier of the alert configuration to return, as emitted in the &#x60;id&#x60; field of **List Alert Configurations** (&#x60;list-alert-configurations&#x60;). This is the configuration&#39;s own identifier, not the &#x60;bambooAlertId&#x60; of the alert template it is based on. No wildcard or &#x60;0&#x60; sentinel is supported; enumerate configurations with &#x60;list-alert-configurations&#x60; instead. | |

### Return type

[**\BhrSdk\Model\AlertConfigurationV1**](../Model/AlertConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAlertConfigurations()`

```php
listAlertConfigurations(): \BhrSdk\Model\AlertConfigurationV1[]
```

List Alert Configurations

Returns every alert configuration the company has set up: which alert template each one uses, when it runs, who receives it, and any custom subject, message, or list-value filters. The response is a top-level JSON array with no wrapper, empty when the company has no configured alerts, and in no guaranteed order.  Use this to enumerate or search a company's own configured alerts. To read a single configuration whose `id` is already known, use **Get Alert Configuration** (`get-alert-configuration`) instead. For the catalog of alert types that *can* be configured, rather than what this company has configured, use **List Alert Templates** (`list-alert-templates`). The `bambooAlertId` on each entry returned here is the same identifier that `list-alert-templates` returns as `id`.  Access is all-or-nothing rather than per-record. An authenticated caller without view access to the company's Email Alerts settings receives `403` instead of a filtered list, so a successful response always contains the company's complete set.  OAuth Scopes: alerts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAlertConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->listAlertConfigurations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\AlertConfigurationV1[]**](../Model/AlertConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAlertTemplates()`

```php
listAlertTemplates(): \BhrSdk\Model\AlertTemplateListResponseV1
```

List Alert Templates

Returns the catalog of alert templates that company alert configurations are built from. These are the built-in alert types BambooHR supports (for example New Hire, Birthdays, Time Off Approved), each paired with the settings group it is filed under.  The response is an object with a single `alerts` array, ordered by `groupName` and then `name`. The alert-configuration endpoints represent the same identifier as `bambooAlertId`. The catalog is global: it lists every alert BambooHR offers and is not narrowed to the features the authenticated company has enabled, so a template appearing here does not guarantee that the company can configure it.  Use this to discover the `bambooAlertId` required by **Create Alert Configuration** (`create-alert-configuration`). For the alerts a company has already configured, use **List Alert Configurations** (`list-alert-configurations`) instead. Callers without view access to the company's Email Alerts settings receive `403` rather than a filtered result.  OAuth Scopes: alerts

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listAlertTemplates();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->listAlertTemplates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\AlertTemplateListResponseV1**](../Model/AlertTemplateListResponseV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `replaceAlertConfiguration()`

```php
replaceAlertConfiguration($id, $alert_configuration_write_v1): \BhrSdk\Model\AlertConfigurationV1
```

Replace Alert Configuration

Overwrites the alert configuration identified by `{id}` and returns the stored configuration as a single JSON object. Each call replaces the whole configuration: a property left out of the request body is reset to its default rather than kept at its current value, so send the full desired state and not only the properties that changed. Read the current state with **Get Alert Configuration** (`get-alert-configuration`) first when only part of a configuration should change. The response echoes the values submitted rather than re-reading the saved row, so read the configuration back with `get-alert-configuration` when the persisted state needs to be confirmed.  Use this to change a configuration the company already has. To add one, use **Create Alert Configuration** (`create-alert-configuration`) instead; to find out what is already configured, use **List Alert Configurations** (`list-alert-configurations`). `bambooAlertId` names the alert template the configuration is built on, comes from **List Alert Templates** (`list-alert-templates`), and is required on every call even when the template is not changing.  The configuration stays live throughout and sends on whatever schedule the call leaves it with, so an update that omits the `sendTo*` properties can re-enable delivery to recipients the previous state excluded. Changing `bambooAlertId` re-points this configuration at a different alert template rather than adding a second one, and no endpoint deletes an alert configuration once it exists. The returned object also carries `additionalRecipientEmails`, `employeeIds`, `listValueIds`, and `userIds`; this API never stores those, so scope an alert's audience with `filterListValueIds` and the `sendTo*` properties instead.  Access is all-or-nothing rather than per-record. An authenticated caller without view access to the company's Email Alerts settings receives `403` instead of a partial success.  OAuth Scopes: alerts.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\AlertsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Identifier of the alert configuration to overwrite, as emitted in the `id` field of **List Alert Configurations** (`list-alert-configurations`). This is the configuration's own identifier, not the `bambooAlertId` of the alert template it is based on. The path value is authoritative; no wildcard or `0` sentinel is supported.
$alert_configuration_write_v1 = new \BhrSdk\Model\AlertConfigurationWriteV1(); // \BhrSdk\Model\AlertConfigurationWriteV1

try {
    $result = $apiInstance->replaceAlertConfiguration($id, $alert_configuration_write_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AlertsApi->replaceAlertConfiguration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| Identifier of the alert configuration to overwrite, as emitted in the &#x60;id&#x60; field of **List Alert Configurations** (&#x60;list-alert-configurations&#x60;). This is the configuration&#39;s own identifier, not the &#x60;bambooAlertId&#x60; of the alert template it is based on. The path value is authoritative; no wildcard or &#x60;0&#x60; sentinel is supported. | |
| **alert_configuration_write_v1** | [**\BhrSdk\Model\AlertConfigurationWriteV1**](../Model/AlertConfigurationWriteV1.md)|  | |

### Return type

[**\BhrSdk\Model\AlertConfigurationV1**](../Model/AlertConfigurationV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
