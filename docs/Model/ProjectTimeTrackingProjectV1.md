# # ProjectTimeTrackingProjectV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the project. | [optional] [readonly]
**name** | **string** | The name of the project. | [optional]
**billable** | **bool** | Whether or not the project is billable. | [optional]
**include_in_payroll** | **bool** | Whether hours logged to this project will show in payroll and payroll reports. | [optional]
**all_employees_assigned** | **bool** | Whether all time &amp; attendance employees are assigned or not. | [optional]
**archived** | **bool** | Whether or not the project is archived. | [optional]
**has_tasks** | **bool** | Whether time is logged to tasks under the project (true) or directly to the project (false). | [optional]
**created_at** | **\DateTime** |  | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]
**employee_ids** | **int[]** | Internal employee IDs assigned to the project. The same identifier is named &#x60;id&#x60; by **Employees &gt; Get Employee** (&#x60;get-employee&#x60;), &#x60;employeeId&#x60; by **Employees &gt; List Employees** (&#x60;list-employees&#x60;), and &#x60;eeid&#x60; by the employee dataset. Do not use Employee # (&#x60;employeeNumber&#x60;), which may resolve to a different employee. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
