# # ProjectCreateTimeTrackingProjectV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  |
**billable** | **bool** |  | [optional] [default to false]
**include_in_payroll** | **bool** |  | [optional] [default to false]
**all_employees_assigned** | **bool** | If true, every time-tracked employee is assigned to the project. Ignored when &#x60;employeeIds&#x60; is provided. | [optional] [default to false]
**employee_ids** | **int[]** | Specific employee IDs to assign. Minimum 1 entry required when provided. Takes precedence over &#x60;allEmployeesAssigned&#x60;. | [optional]
**tasks** | [**\BhrSdk\Model\ProjectCreateTimeTrackingProjectV1TasksInner[]**](ProjectCreateTimeTrackingProjectV1TasksInner.md) | Tasks to create alongside the project. Minimum 1 entry required when provided. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
