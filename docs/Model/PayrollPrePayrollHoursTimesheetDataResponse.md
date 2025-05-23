# # PayrollPrePayrollHoursTimesheetDataResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**approval_start_date_time** | **\DateTime** | Date and time when the approval process for this timesheet began | [optional]
**approver_employee_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursTimesheetDataResponseApproverEmployeeDataValue>**](PayrollPrePayrollHoursTimesheetDataResponseApproverEmployeeDataValue.md) | Approver employee data keyed by employee ID | [optional]
**approver_user_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursTimesheetDataResponseApproverUserDataValue>**](PayrollPrePayrollHoursTimesheetDataResponseApproverUserDataValue.md) | Approver user data keyed by user ID | [optional]
**client_job_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursClientJobDataValue>**](PayrollPrePayrollHoursClientJobDataValue.md) | Client job (project) data keyed by job ID | [optional]
**client_job_category_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursClientJobCategoryDataValue>**](PayrollPrePayrollHoursClientJobCategoryDataValue.md) | Client job category (task) data keyed by category ID | [optional]
**shift_differential_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursShiftDifferentialDataItemValue>**](PayrollPrePayrollHoursShiftDifferentialDataItemValue.md) | Shift differential data keyed by shift differential ID | [optional]
**data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursTimesheetDataResponseDataValue>**](PayrollPrePayrollHoursTimesheetDataResponseDataValue.md) | Employee timesheet data keyed by employee ID | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
