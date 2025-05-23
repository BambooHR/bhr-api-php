# # PayrollPayrollValidationErrorsControllerValidationErrorDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier for the validation error. | [optional]
**client_id** | **int** | Client ID associated with the error. | [optional]
**employee_id** | **int** | Employee ID associated with the error, if applicable. | [optional]
**sync_type** | **string** | Sync type for the error (e.g., &#39;employee&#39;, &#39;company&#39;). | [optional]
**scope** | **string** | Scope of the error. | [optional]
**error_type_id** | **int** | Error type ID. | [optional]
**error_type_label** | **string** | Human-readable label for the error type. | [optional]
**meta_data** | **mixed** | Metadata associated with the error. | [optional]
**created** | **string** | ISO8601 date/time string when the error was created. | [optional]
**pay_schedule_id** | **int** | Pay schedule ID, if applicable. | [optional]
**related_model** | **string** | Related model name, if applicable. | [optional]
**related_external_id** | **string** | Related external ID, if applicable. | [optional]
**related_trax_id** | **string** | Related Trax ID, if applicable. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
