# # DetailsAndCurrencyRequestDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID of the cycle to update | [optional]
**cycle_name** | **string** | Name of the cycle to update | [optional]
**cycle_currency** | **string** | Currency code for the cycle | [optional]
**cycle_window_start_ymd** | **\DateTime** | Start date of the cycle window | [optional]
**cycle_window_end_ymd** | **\DateTime** | End date of the cycle window | [optional]
**recommendations_due_ymd** | **\DateTime** | Date when recommendations are due | [optional]
**approvals_due_ymd** | **\DateTime** | Date when approvals are due | [optional]
**cycle_effective_date** | **\DateTime** | Effective date of the cycle | [optional]
**salary_included** | **bool** | Whether salary is included in this cycle | [optional]
**bonus_included** | **bool** | Whether bonus is included in this cycle | [optional]
**equity_included** | **bool** | Whether equity is included in this cycle | [optional]
**cycle_currency_conversion_rates** | [**\MySdk\Model\ConversionRateDataObject[]**](ConversionRateDataObject.md) | Currency conversion rates | [optional]
**paycheck_date_ymd** | **\DateTime** | Date of first paycheck with new compensation updates | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
