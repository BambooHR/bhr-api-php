# # GetEmployeesList400ResponseError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Error code indicating the type of validation failure. For BadPage errors, common causes include: 1) Invalid page parameter format, 2) Using the wrong paging parameter for before/after cursors, or 3) An employee on the page boundary changed between calls (for example, the employee was deleted or no longer matches the filter criteria). |
**message** | **string** | Human-readable message describing the validation failure. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
