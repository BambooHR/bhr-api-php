# # TimeTrackingRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time_tracking_id** | **string** | A unique identifier for the record. Use this ID to adjust or delete these hours. It can be any ID you use to track the record up to 36 characters in length. (i.e. UUID). |
**employee_id** | **int** | The ID of the employee. |
**division_id** | **int** | [Optional] The ID of the division for the employee. | [optional]
**department_id** | **int** | [Optional] The ID of the department for the employee. | [optional]
**job_title_id** | **int** | [Optional] The ID of the job title for the employee. | [optional]
**pay_code** | **string** | [Optional] Only necessary if the payroll provider requires a pay code | [optional]
**date_hours_worked** | **string** | The date the hours were worked. Please use the ISO-8601 date format YYYY-MM-DD. |
**pay_rate** | **float** | [Optional] The rate of pay. e.g. $15.00/hour should use 15.00 here. Only necessary if the payroll provider requires a pay rate. | [optional]
**rate_type** | **string** | The type of hours - regular or overtime. Please use either \&quot;REG\&quot; or \&quot;OT\&quot; here. |
**hours_worked** | **float** | The number of hours worked. |
**job_code** | **int** | [Optional] A job code. | [optional]
**job_data** | **string** | [Optional] A list of up to four 20 characters max job numbers in comma delimited format with no spaces. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
