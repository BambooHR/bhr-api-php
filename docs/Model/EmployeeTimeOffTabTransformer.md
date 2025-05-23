# # EmployeeTimeOffTabTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | The unique identifier of the employee whose time off tab data is being requested. | [optional]
**accrual_level_start_date** | **\DateTime** | The start date of the employee accrual level. | [optional]
**hire_date** | **\DateTime** | The hire date of the employee. | [optional]
**history_display** | [**\MySdk\Model\EmployeeTimeOffTabTransformerHistoryDisplay**](EmployeeTimeOffTabTransformerHistoryDisplay.md) |  | [optional]
**user_permissions** | [**\MySdk\Model\EmployeeTimeOffTabTransformerUserPermissions**](EmployeeTimeOffTabTransformerUserPermissions.md) |  | [optional]
**policies** | [**\MySdk\Model\EmployeeTimeOffTabTransformerPoliciesInner[]**](EmployeeTimeOffTabTransformerPoliciesInner.md) |  | [optional]
**upcoming_time_off_events** | [**\MySdk\Model\UpcomingTimeOffTransformer**](UpcomingTimeOffTransformer.md) |  | [optional]
**pause** | [**\MySdk\Model\EmployeeTimeOffTabTransformerPause**](EmployeeTimeOffTabTransformerPause.md) |  | [optional]
**company_has_policies** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
