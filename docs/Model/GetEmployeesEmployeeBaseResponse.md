# # GetEmployeesEmployeeBaseResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **string** | The internal employee ID — the canonical, immutable identifier for this employee across all employee endpoints. Equivalent to &#x60;id&#x60; on &#x60;get-employee&#x60; and &#x60;eeid&#x60; on the &#x60;employee&#x60; dataset. Use this value (not &#x60;employeeNumber&#x60;) for employee ID inputs such as &#x60;{id}&#x60; path parameters or &#x60;filter[ids]&#x60;. |
**first_name** | **string** |  |
**last_name** | **string** |  |
**preferred_name** | **string** |  |
**photo_url** | **string** |  |
**job_title_name** | **string** |  |
**status** | **string** |  |
**_restricted_fields** | **string[]** | Array of field names that are restricted due to permission checks |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
