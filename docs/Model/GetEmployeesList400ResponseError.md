# # GetEmployeesList400ResponseError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Error code indicating the type of validation failure. For BadPage errors, this can be caused by: 1) Invalid page parameter format, 2) Using wrong paging parameter type for before/after cursors, or 3) Employee on page boundary changing between pagination calls (e.g., employee deleted or no longer matches filter criteria). |
**message** | **string** | Error message describing the validation failure. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
