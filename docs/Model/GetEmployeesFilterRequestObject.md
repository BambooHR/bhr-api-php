# # GetEmployeesFilterRequestObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**first_name** | **string** | This will match any employees whose first name contains this string (case insensitive) | [optional]
**last_name** | **string** | This will match any employees whose last name contains this string (case insensitive) | [optional]
**job_title_name** | **string** | This will match any employees whose current job title descriptor contains this string (case insensitive) | [optional]
**status** | **string** | Employee status | [optional]
**ids** | **int[]** | List of employee IDs for batch fetch. Accepts repeated keys (filter[ids][]&#x3D;123&amp;filter[ids][]&#x3D;124) or a single comma-separated string (filter[ids]&#x3D;123,124). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
