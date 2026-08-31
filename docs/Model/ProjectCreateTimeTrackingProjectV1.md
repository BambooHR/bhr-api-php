# # ProjectCreateTimeTrackingProjectV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  |
**billable** | **bool** |  | [optional] [default to false]
**include_in_payroll** | **bool** |  | [optional] [default to false]
**all_employees_assigned** | **bool** | If true, every time-tracked employee is assigned to the project. Ignored when &#x60;employeeIds&#x60; is provided. | [optional] [default to false]
**employee_ids** | **int[]** | Internal employee IDs to assign. Use **Employees &gt; List Employees** (&#x60;list-employees&#x60;) to find IDs. That operation returns IDs as strings; supply their numeric values here as JSON integers because string values are rejected. When provided, these IDs take precedence over &#x60;allEmployeesAssigned&#x60;. | [optional]
**tasks** | [**\BhrSdk\Model\ProjectCreateTimeTrackingProjectV1TasksInner[]**](ProjectCreateTimeTrackingProjectV1TasksInner.md) | Tasks to create alongside the project. Minimum 1 entry required when provided. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
