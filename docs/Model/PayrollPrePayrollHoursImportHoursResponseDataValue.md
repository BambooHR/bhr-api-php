# # PayrollPrePayrollHoursImportHoursResponseDataValue

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**manager_permission_denied** | **bool** | Indicates whether the user has access to see who the employee&#39;s manager is | [optional]
**manager_core_employee_id** | **int** | Employee ID of the employee&#39;s manager (null if managerPermissionDenied is true) | [optional]
**core_employee_id** | **int** | Unique identifier for the employee | [optional]
**employee_number** | **string** | Employee&#39;s unique identification number in the system | [optional]
**first_name** | **string** | Employee&#39;s first name | [optional]
**last_name** | **string** | Employee&#39;s last name | [optional]
**photo_url** | **string** | URL to the employee&#39;s profile photo | [optional]
**job_title** | **string** | Employee&#39;s job title | [optional]
**pay_cycle_exclusion_type** | **string** | Reason why an employee might be excluded from the pay cycle processing | [optional]
**payroll_hours** | [**\MySdk\Model\PayrollPrePayrollHoursPayrollHourItem[]**](PayrollPrePayrollHoursPayrollHourItem.md) | Hours to be processed for payroll for this employee | [optional]
**payable_hours** | [**\MySdk\Model\PayrollPrePayrollHoursPayableHourItem[]**](PayrollPrePayrollHoursPayableHourItem.md) | Hours that are eligible for payment for this employee | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
