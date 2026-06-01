# BhrSdk\EmployeeVerificationApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getEmployeeVerificationIntegration()**](EmployeeVerificationApi.md#getEmployeeVerificationIntegration) | **GET** /api/v1/employee-verifications/integration | Get employee verification integration status |
| [**listEmployeeVerificationsByEmployee()**](EmployeeVerificationApi.md#listEmployeeVerificationsByEmployee) | **GET** /api/v1/employee-verifications/employees/{employeeId} | List employee verification records for an employee |
| [**sendEmployeeVerificationLifecycleEmailByUser()**](EmployeeVerificationApi.md#sendEmployeeVerificationLifecycleEmailByUser) | **POST** /api/v1/employee-verifications/users/{userId}/send-email | Send employee verification lifecycle email by user and email type |
| [**updateEmployeeVerification()**](EmployeeVerificationApi.md#updateEmployeeVerification) | **PUT** /api/v1/employee-verifications/employees/{employeeId}/{verificationId} | Update an employee verification record |
| [**updateEmployeeVerificationIntegration()**](EmployeeVerificationApi.md#updateEmployeeVerificationIntegration) | **PUT** /api/v1/employee-verifications/integration | Enable or disable the employee verification integration |


## `getEmployeeVerificationIntegration()`

```php
getEmployeeVerificationIntegration(): \BhrSdk\Model\EmployeeVerificationIntegrationResponse
```

Get employee verification integration status

Returns the install state and partner metadata for the company's employee verification integration. Scoped to the authenticated OAuth company context. The `enabled` flag reflects whether the partner app is installed and usable; `integrationType` identifies the configured verification partner.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getEmployeeVerificationIntegration();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeVerificationApi->getEmployeeVerificationIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\EmployeeVerificationIntegrationResponse**](../Model/EmployeeVerificationIntegrationResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeVerificationsByEmployee()`

```php
listEmployeeVerificationsByEmployee($employee_id): \BhrSdk\Model\EmployeeVerificationsListResponse
```

List employee verification records for an employee

Returns every employee verification row for the given employee (including archived), newest first. Intended for admin-level API consumers with the employee verifications OAuth scope; callers must have onboarding access and permission to view the employee (same rules as the active-verification employee verification API), except when the OAuth context is the employee themselves.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Company employee id whose verification history is returned.

try {
    $result = $apiInstance->listEmployeeVerificationsByEmployee($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeVerificationApi->listEmployeeVerificationsByEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| Company employee id whose verification history is returned. | |

### Return type

[**\BhrSdk\Model\EmployeeVerificationsListResponse**](../Model/EmployeeVerificationsListResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendEmployeeVerificationLifecycleEmailByUser()`

```php
sendEmployeeVerificationLifecycleEmailByUser($user_id, $send_employee_verification_lifecycle_email_by_user_request): \BhrSdk\Model\EmployeeVerificationLifecycleEmailAcceptedResponse
```

Send employee verification lifecycle email by user and email type

Accepts a Bamboo `userId` (path) and an `emailType` (body) and queues the corresponding employee verification lifecycle email—the same templates as the in-app auth listener (`signup_survey` after signup, `app_installed` after the integration app is installed). Delivered to the company owner contact with template context for that user id. Not an employee I-9 reminder. Requires the employee verification integration enabled, onboarding edit access, and `employee_verifications.write`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 56; // int | Bamboo user id for the requesting user in the email template (same role as the listener’s event user id). Together with body `emailType`, selects which verification email to send.
$send_employee_verification_lifecycle_email_by_user_request = new \BhrSdk\Model\SendEmployeeVerificationLifecycleEmailByUserRequest(); // \BhrSdk\Model\SendEmployeeVerificationLifecycleEmailByUserRequest

try {
    $result = $apiInstance->sendEmployeeVerificationLifecycleEmailByUser($user_id, $send_employee_verification_lifecycle_email_by_user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeVerificationApi->sendEmployeeVerificationLifecycleEmailByUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **int**| Bamboo user id for the requesting user in the email template (same role as the listener’s event user id). Together with body &#x60;emailType&#x60;, selects which verification email to send. | |
| **send_employee_verification_lifecycle_email_by_user_request** | [**\BhrSdk\Model\SendEmployeeVerificationLifecycleEmailByUserRequest**](../Model/SendEmployeeVerificationLifecycleEmailByUserRequest.md)|  | |

### Return type

[**\BhrSdk\Model\EmployeeVerificationLifecycleEmailAcceptedResponse**](../Model/EmployeeVerificationLifecycleEmailAcceptedResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeVerification()`

```php
updateEmployeeVerification($employee_id, $verification_id, $update_employee_verification_request): \BhrSdk\Model\EmployeeVerificationUpdateResponse
```

Update an employee verification record

Partial update of a single employee verification row. Any field omitted from the request body is left unchanged. Returns 404 when the verification id does not exist or does not belong to {employeeId}. Most verification updates flow in via partner webhooks; this endpoint exists for admin-level integrations that need to correct or annotate a record out-of-band, and requires onboarding view-and-edit permission on the employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Company employee id that owns the verification row.
$verification_id = 56; // int | Identifier of the verification record to update.
$update_employee_verification_request = new \BhrSdk\Model\UpdateEmployeeVerificationRequest(); // \BhrSdk\Model\UpdateEmployeeVerificationRequest | Fields to update on the verification record. At least one field must be supplied.

try {
    $result = $apiInstance->updateEmployeeVerification($employee_id, $verification_id, $update_employee_verification_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeVerificationApi->updateEmployeeVerification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| Company employee id that owns the verification row. | |
| **verification_id** | **int**| Identifier of the verification record to update. | |
| **update_employee_verification_request** | [**\BhrSdk\Model\UpdateEmployeeVerificationRequest**](../Model/UpdateEmployeeVerificationRequest.md)| Fields to update on the verification record. At least one field must be supplied. | |

### Return type

[**\BhrSdk\Model\EmployeeVerificationUpdateResponse**](../Model/EmployeeVerificationUpdateResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeVerificationIntegration()`

```php
updateEmployeeVerificationIntegration($update_employee_verification_integration_request): \BhrSdk\Model\EmployeeVerificationIntegrationResponse
```

Enable or disable the employee verification integration

Enables or disables the company's employee verification integration. Enabling installs the configured partner app and schedules the daily sync; the company must have a valid US work location before enabling, otherwise a 400 is returned. Disabling tears down the partner app. The call is idempotent: a request to enable when already enabled (or disable when already disabled) returns 200 with the current state. Requires the employee_verifications.write OAuth scope, intended for admin-level API consumers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\EmployeeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_employee_verification_integration_request = new \BhrSdk\Model\UpdateEmployeeVerificationIntegrationRequest(); // \BhrSdk\Model\UpdateEmployeeVerificationIntegrationRequest

try {
    $result = $apiInstance->updateEmployeeVerificationIntegration($update_employee_verification_integration_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeVerificationApi->updateEmployeeVerificationIntegration: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_employee_verification_integration_request** | [**\BhrSdk\Model\UpdateEmployeeVerificationIntegrationRequest**](../Model/UpdateEmployeeVerificationIntegrationRequest.md)|  | |

### Return type

[**\BhrSdk\Model\EmployeeVerificationIntegrationResponse**](../Model/EmployeeVerificationIntegrationResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
