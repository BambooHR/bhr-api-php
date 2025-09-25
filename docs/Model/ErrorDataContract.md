# # ErrorDataContract

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the error |
**company_id** | **int** | Identifier for the company | [optional]
**application_id** | **string** | Identifier for the application |
**attributes** | [**\MySdk\Model\ErrorAttributes**](ErrorAttributes.md) | Structured attributes for the error | [optional]
**custom_attributes** | **string** | Custom attributes related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**error_data** | **string** | Detailed error information. Might include the exception type, message, and stack trace. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**error_timestamp** | **\DateTime** | When the error occurred |
**request** | **string** | Request data related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**response** | **string** | Response data related to the error. **NOTE** you must sanitize this data before sending it to the error management service. | [optional]
**silenced** | **bool** | Whether the error has been silenced | [optional]
**silenced_by** | **string** | Identifier of the user who silenced the error | [optional]
**silenced_by_type** | **string** | Type of entity that silenced the error (e.g., &#39;user&#39;, &#39;admin&#39;, &#39;system&#39;) | [optional]
**silenced_at** | **\DateTime** | Timestamp when the error was silenced | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
