# # IntegrationErrorNotificationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**error_uuid** | **string** | Unique identifier for the error event provided by the Error Management system |
**company_id** | **int** | The BambooHR company ID |
**application_id** | **string** | The integration identifier (e.g., XERO_UK_PAYROLL) |
**attributes** | [**\MySdk\Model\IntegrationErrorNotificationRequestAttributes**](IntegrationErrorNotificationRequestAttributes.md) |  |
**custom_attributes** | **string** | Cloud Connectors execution/org identifiers (encoded JSON string) | [optional]
**error_data** | **string** | Detailed error information (encoded JSON string or object) |
**company_id** | **int** | The BambooHR company ID | [optional]
**application_id** | **string** | Integration identifier sending the error (e.g., XERO_UK_PAYROLL) | [optional]
**error_type** | **string** | Categorized error type from the integration | [optional]
**employee_id** | **string** | Employee identifier when applicable | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
