# # PayrollPrePayrollHoursTimesheetDataResponseDataValue

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**approved_by_first_name** | **string** | First name of the person who approved the timesheet | [optional]
**approved_by_last_name** | **string** | Last name of the person who approved the timesheet | [optional]
**approved_on_date_time** | **\DateTime** | Date and time when the timesheet was approved | [optional]
**approver_core_employee_id** | **int** | Employee ID of the approver (null if approverPermissionDenied is true) | [optional]
**approver_user_id** | **int** | User ID of the approver | [optional]
**approver_permission_denied** | **bool** | Indicates whether the user has access to see who the timesheet&#39;s approver is | [optional]
**core_employee_id** | **int** | Unique identifier for the employee | [optional]
**employee_number** | **string** | Employee&#39;s unique identification number in the system | [optional]
**first_name** | **string** | Employee&#39;s first name | [optional]
**last_name** | **string** | Employee&#39;s last name | [optional]
**photo_url** | **string** | URL to the employee&#39;s profile photo | [optional]
**has_time_tracking** | **bool** | Indicates whether the employee has time tracking enabled | [optional]
**is_clocked_in** | **bool** | Indicates whether the employee is currently clocked in | [optional]
**job_title** | **string** | Employee&#39;s job title | [optional]
**pay_cycle_exclusion_type** | **string** | Reason why an employee might be excluded from the pay cycle processing | [optional]
**payroll_hours** | [**\MySdk\Model\PayrollPrePayrollHoursPayrollHourItem[]**](PayrollPrePayrollHoursPayrollHourItem.md) |  | [optional]
**timesheet_hours** | [**\MySdk\Model\PayrollPrePayrollHoursTimesheetHourItem[]**](PayrollPrePayrollHoursTimesheetHourItem.md) |  | [optional]
**timesheet_hours_last_changed_at** | **int** | Unix timestamp of when the timesheet hours were last modified | [optional]
**timesheet_id** | **int** | Unique identifier for the employee&#39;s timesheet | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
