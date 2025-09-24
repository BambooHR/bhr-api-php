# # ErrorDataContract

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the error |
**company_id** | **int** | Identifier for the company |
**application_id** | **string** | Identifier for the application |
**attributes** | [**\MySdk\Model\ErrorAttributes**](ErrorAttributes.md) | Structured attributes for the error | [optional]
**custom_attributes** | **string** | Custom attributes related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**error_data** | **string** | Detailed error information. Might include the exception type, message, and stack trace. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**error_timestamp** | **\DateTime** | When the error occurred |
**request** | **string** | Request data related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**response** | **string** | Response data related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
