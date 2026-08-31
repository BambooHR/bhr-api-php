# # TimeTrackingProjectWithTasksAndEmployeeIds

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID of the project. |
**name** | **string** | Name of the project. |
**tasks** | [**\BhrSdk\Model\TimeTrackingTask[]**](TimeTrackingTask.md) | A list of time tracking tasks for the project. |
**employee_ids** | **int[]** | Internal employee IDs that can log time for this project. Omitted when no employees are individually assigned; this does not by itself mean all employees have access. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
