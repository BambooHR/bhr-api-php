# # WhosOutV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The time off request ID. Stable across calls. | [optional] [readonly]
**employee_id** | **int** | The id of the employee taking time off. | [optional]
**time_off_type_id** | **int** | The id of the time off type. | [optional]
**start** | **\DateTime** | The first day of the time off, in ISO 8601 format (YYYY-MM-DD). All-day inclusive. Interpreted in the company timezone. | [optional]
**end** | **\DateTime** | The last day of the time off, in ISO 8601 format (YYYY-MM-DD). All-day inclusive. Same as start for single-day requests. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
