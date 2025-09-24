# # 3b7487d1d17551f6c3e2567b96089ce1RequestEntriesInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | Unique identifier for the employee. |
**date** | **\DateTime** | Date for the timesheet entry. Must be in YYYY-MM-DD format. |
**start** | **string** | Start time for the timesheet entry. Local time for the employee. Must be in hh:mm 24 hour format. |
**end** | **string** | End time for the timesheet entry. Local time for the employee. Must be in hh:mm 24 hour format. |
**id** | **int** | The ID of an existing timesheet entry. This can be specified to edit an existing entry. | [optional]
**project_id** | **int** | The ID of the project to associate with the timesheet entry. | [optional]
**task_id** | **int** | The ID of the task to associate with the timesheet entry. | [optional]
**note** | **string** | Optional note to associate with the timesheet entry. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
