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
**employee_ids** | **int[]** | Array of employeeIds assigned to the project. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
