# # EmployeeFutureBenefitChangeDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier for the future benefit change | [optional]
**effective_date** | **\DateTime** | Date when the benefit change will take effect (YYYY-MM-DD format) | [optional]
**employee_new_benefit_id** | **int** | Reference to the employee benefit that will be created/modified | [optional]
**status_change** | **string** | The type of status change (e.g., enroll, waive, terminate) | [optional]
**use_auto_eligibility** | **string** | Whether to use automatic eligibility determination | [optional] [default to 'yes']
**use_auto_termination** | **bool** | Whether to use automatic termination | [optional] [default to false]
**benefit_coverage_id** | **int** | Reference to the benefit coverage configuration | [optional]
**employee_pays** | **float** | Amount the employee pays for this benefit | [optional]
**employee_pays_symbol** | **string** | Currency symbol for employee payment amount | [optional]
**employee_percent_deduction_type** | **string** | Type of percentage deduction for employee payment | [optional]
**employee_cap** | **float** | Maximum cap on employee payment | [optional]
**employee_cap_type** | **float** | Type of cap on employee payment | [optional]
**employee_annual_max** | **float** | Annual maximum for employee payment | [optional]
**employee_monthly_max** | **float** | Monthly maximum for employee payment | [optional]
**company_pays** | **float** | Amount the company pays for this benefit | [optional]
**company_pays_symbol** | **string** | Currency symbol for company payment amount | [optional]
**company_percent_deduction_type** | **string** | Type of percentage deduction for company payment | [optional]
**company_cap** | **float** | Maximum cap on company payment | [optional]
**cost_frequency** | **string** | Frequency of cost application (e.g., per-pay-period, monthly) | [optional] [default to 'none']
**company_annual_max** | **float** | Annual maximum for company payment | [optional]
**currency_code** | **string** | Currency code for monetary values | [optional]
**employee_benefit_history_item_id** | **int** | Reference to the history item for this benefit change | [optional]
**update_user_id** | **int** | ID of the user who updated this record | [optional]
**update_date** | **\DateTime** | Timestamp of when this record was updated | [optional]
**deduction_start_date** | **\DateTime** | Date when deductions should start for this benefit | [optional]
**deduction_end_date** | **\DateTime** | Date when deductions should end for this benefit | [optional]
**coverage_description** | **string** | Description of the coverage provided | [optional]
**benefit_employee_window_submission_id** | **string** | ID of the benefit employee window submission | [optional]
**coverage_amount_wrapper** | **object** | Wrapper for coverage amount information | [optional]
**created_at_ymdt** | **\DateTime** | Timestamp of when this record was created | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
