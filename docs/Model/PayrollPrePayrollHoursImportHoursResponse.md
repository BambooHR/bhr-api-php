# # PayrollPrePayrollHoursImportHoursResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**manager_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursImportHoursResponseManagerDataValue>**](PayrollPrePayrollHoursImportHoursResponseManagerDataValue.md) | Manager data keyed by employee ID | [optional]
**client_job_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursClientJobDataValue>**](PayrollPrePayrollHoursClientJobDataValue.md) | Client job (project) data keyed by job ID | [optional]
**client_job_category_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursClientJobCategoryDataValue>**](PayrollPrePayrollHoursClientJobCategoryDataValue.md) | Client job category (task) data keyed by category ID | [optional]
**shift_differential_data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursShiftDifferentialDataItemValue>**](PayrollPrePayrollHoursShiftDifferentialDataItemValue.md) | Shift differential data keyed by shift differential ID | [optional]
**data** | [**array<string,\MySdk\Model\PayrollPrePayrollHoursImportHoursResponseDataValue>**](PayrollPrePayrollHoursImportHoursResponseDataValue.md) | Employee hours data keyed by employee ID | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
