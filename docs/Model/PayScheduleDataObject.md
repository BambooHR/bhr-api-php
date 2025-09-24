# # PayScheduleDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Pay schedule ID | [optional]
**list_value_id** | **int** | List value ID | [optional]
**external_pay_schedule_id** | [**\MySdk\Model\PayScheduleDataObjectExternalPayScheduleId**](PayScheduleDataObjectExternalPayScheduleId.md) |  | [optional]
**external_company_id** | [**\MySdk\Model\PayScheduleDataObjectExternalCompanyId**](PayScheduleDataObjectExternalCompanyId.md) |  | [optional]
**name** | **string** | Pay schedule name | [optional]
**frequency** | **string** | Pay frequency | [optional]
**modifier** | **string** | Pay schedule modifier | [optional]
**pay_date_days** | **int** | Number of days after the end of a pay period when employees are paid | [optional]
**first_pay_period_date** | **\DateTime** | First pay period date | [optional]
**weekend_and_holiday** | **string** | Weekend and holiday handling | [optional]
**include_in_payroll** | [**\MySdk\Model\PayScheduleDataObjectIncludeInPayroll**](PayScheduleDataObjectIncludeInPayroll.md) |  | [optional]
**hours_per_pay_cycle** | **float** | Hours per pay cycle | [optional]
**payroll_approval_day_limit** | **int** | Payroll approval day limit | [optional]
**archived** | **string** | Whether the pay schedule is archived | [optional]
**archived_date_time** | **\DateTime** | Date and time when the pay schedule was archived | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
