# BhrSdk\WebhookEventsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**employeeCreatedWebhook()**](WebhookEventsApi.md#employeeCreatedWebhook) | **POST** /employee.created | Employee Created |
| [**employeeDeletedWebhook()**](WebhookEventsApi.md#employeeDeletedWebhook) | **POST** /employee.deleted | Employee Deleted |
| [**employeeUpdatedWebhook()**](WebhookEventsApi.md#employeeUpdatedWebhook) | **POST** /employee.updated | Employee Updated |


## `employeeCreatedWebhook()`

```php
employeeCreatedWebhook($employee_created_webhook_payload)
```

Employee Created

Triggered when a new employee is created.  ### Behavior & Constraints - **Creation Sequence**: When an employee is created, both `employee.created` and `employee.updated` events fire sequentially due to the create-then-initialize pattern. - **Data Availability**: The `data` object contains the `companyId` and `employeeId` of the newly created employee. - **Permission Checking**: This event does **not** enforce permission checking. The webhook will fire for all subscribers regardless of the API token's field-level permissions.  ### Deprecation Notice **Note:** This event is the modern replacement for the legacy `employee_with_fields.created` event. While the legacy event is deprecated, it will remain available for the foreseeable future to support existing integrations. We encourage using this new event for all new development.  **Important:** You cannot subscribe to both this new event and the legacy `employee_with_fields` events on the same webhook. Webhooks created without specifying any events will default to the legacy behavior, effectively subscribing to the `employee_with_fields` events automatically.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BhrSdk\Api\WebhookEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$employee_created_webhook_payload = new \BhrSdk\Model\EmployeeCreatedWebhookPayload(); // \BhrSdk\Model\EmployeeCreatedWebhookPayload | Webhook payload containing information about the employee creation

try {
    $apiInstance->employeeCreatedWebhook($employee_created_webhook_payload);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEventsApi->employeeCreatedWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_created_webhook_payload** | [**\BhrSdk\Model\EmployeeCreatedWebhookPayload**](../Model/EmployeeCreatedWebhookPayload.md)| Webhook payload containing information about the employee creation | [optional] |

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

## `employeeDeletedWebhook()`

```php
employeeDeletedWebhook($employee_deleted_webhook_payload)
```

Employee Deleted

Triggered when an employee is deleted.  ### Behavior & Constraints - **Permission Checking**: This event does **not** enforce permission checking. The webhook will fire for all subscribers regardless of the API token's field-level permissions.  ### Deprecation Notice **Note:** This event is the modern replacement for the legacy `employee_with_fields.deleted` event. While the legacy event is deprecated, it will remain available for the foreseeable future to support existing integrations. We encourage using this new event for all new development.  **Important:** You cannot subscribe to both this new event and the legacy `employee_with_fields` events on the same webhook. Webhooks created without specifying any events will default to the legacy behavior, effectively subscribing to the `employee_with_fields` events automatically.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BhrSdk\Api\WebhookEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$employee_deleted_webhook_payload = new \BhrSdk\Model\EmployeeDeletedWebhookPayload(); // \BhrSdk\Model\EmployeeDeletedWebhookPayload | Webhook payload containing information about the employee deletion

try {
    $apiInstance->employeeDeletedWebhook($employee_deleted_webhook_payload);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEventsApi->employeeDeletedWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_deleted_webhook_payload** | [**\BhrSdk\Model\EmployeeDeletedWebhookPayload**](../Model/EmployeeDeletedWebhookPayload.md)| Webhook payload containing information about the employee deletion | [optional] |

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

## `employeeUpdatedWebhook()`

```php
employeeUpdatedWebhook($employee_updated_webhook_payload)
```

Employee Updated

Triggered when an employee record is updated and at least one of the monitored fields has changed.  ### Behavior & Constraints - **Monitoring**: At least one `monitorField` is required when subscribing to this event via `POST /api/v1/webhooks`. - **Permissions**: For API-created webhooks, this event will not fire if the webhook creator lacks access to all monitored fields being changed.  ### Detailed Description - **Creation Sequence**: When an employee is created, both `employee.created` and `employee.updated` events fire sequentially due to the create-then-initialize pattern. - **Field Consolidation**: When multiple fields change simultaneously, they may be consolidated into a single event. Currently, custom field updates and standard field updates are grouped separately and may fire as two events. - **Effective Dates**: For history-tracked fields (e.g., `jobTitle`, `payRate`), events fire only when changes take effect, not when future-dated changes are created. - **Changed Fields**: The `changedFields` array contains the API aliases for fields that changed and are monitored by this webhook. Aliases match those returned by `GET /api/v1/webhooks/monitor_fields`.  ### Deprecation Notice **Note:** This event is the modern replacement for the legacy `employee_with_fields.updated` event. While the legacy event is deprecated, it will remain available for the foreseeable future to support existing integrations. We encourage using this new event for all new development.  **Important:** You cannot subscribe to both this new event and the legacy `employee_with_fields` events on the same webhook. Webhooks created without specifying any events will default to the legacy behavior, effectively subscribing to the `employee_with_fields` events automatically.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


$apiInstance = new BhrSdk\Api\WebhookEventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$employee_updated_webhook_payload = new \BhrSdk\Model\EmployeeUpdatedWebhookPayload(); // \BhrSdk\Model\EmployeeUpdatedWebhookPayload | Webhook payload containing information about the employee update

try {
    $apiInstance->employeeUpdatedWebhook($employee_updated_webhook_payload);
} catch (Exception $e) {
    echo 'Exception when calling WebhookEventsApi->employeeUpdatedWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_updated_webhook_payload** | [**\BhrSdk\Model\EmployeeUpdatedWebhookPayload**](../Model/EmployeeUpdatedWebhookPayload.md)| Webhook payload containing information about the employee update | [optional] |

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
