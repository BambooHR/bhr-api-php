# # ProjectUpdateTimeTrackingProjectV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the project. | [optional]
**billable** | **bool** | Whether or not the project is billable. | [optional]
**include_in_payroll** | **bool** | Whether hours logged to this project will show in payroll and payroll reports. | [optional]
**all_employees_assigned** | **bool** | Whether all time &amp; attendance employees are assigned or not. | [optional]
**archived** | **bool** | Whether or not the project is archived. | [optional]
**employee_ids** | **int[]** | Array of employee IDs to assign to the project. Replaces the current assignment list when present; an empty array clears all assignments. | [optional]
**has_tasks** | **bool** | Toggles whether time is logged directly to the project (false) or to specific tasks on the project (true). Setting to true requires the project to already have at least one active task; setting to false leaves existing tasks unchanged. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
