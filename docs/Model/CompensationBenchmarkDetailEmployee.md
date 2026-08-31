# # CompensationBenchmarkDetailEmployee

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional]
**name** | **string** |  | [optional]
**job_title** | [**\BhrSdk\Model\CompensationBenchmarkDetailEmployeeJobTitle**](CompensationBenchmarkDetailEmployeeJobTitle.md) |  | [optional]
**location** | **object** |  | [optional]
**salary** | [**\BhrSdk\Model\CompensationBenchmarkDetailEmployeeSalary**](CompensationBenchmarkDetailEmployeeSalary.md) |  | [optional]
**variance_from_pay_band** | **object** |  | [optional]
**years_at_company** | **int** |  | [optional]
**range_penetration** | **float** |  | [optional]
**compa_ratio** | **float** |  | [optional]
**compa_ratio_status** | **string** |  | [optional]
**photo_url** | **string** |  | [optional]
**country** | **string** |  | [optional]
**is_remote** | **bool** |  | [optional]
**paid_per** | **string** | Pay period label for the employee salary amount (e.g. Year, Hour). | [optional]
**currency_conversion_failed** | **bool** |  | [optional]
**annualization_failed** | **bool** | True when pay could not be annualized (e.g. PayPeriod without a pay schedule); salary is the raw amount for paidPer. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
