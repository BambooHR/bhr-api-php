# # DetailsAndCurrencyResponseDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | ID of the cycle | [optional]
**cycle_name** | **string** | Name of the cycle | [optional]
**cycle_currency** | **string** | Currency code for the cycle | [optional]
**salary_included** | **bool** | Whether salary is included in this cycle | [optional]
**bonus_included** | **bool** | Whether bonus is included in this cycle | [optional]
**equity_included** | **bool** | Whether equity is included in this cycle | [optional]
**cycle_window_start_ymd** | **string** | Start date of the cycle window | [optional]
**cycle_window_end_ymd** | **string** | End date of the cycle window | [optional]
**recommendations_due_ymd** | **string** | Date when recommendations are due | [optional]
**approvals_due_ymd** | **string** | Date when approvals are due | [optional]
**cycle_effective_date** | **string** | Effective date of the cycle | [optional]
**cycle_currency_conversion_rates** | [**\MySdk\Model\ConversionRateDataObject[]**](ConversionRateDataObject.md) | Currency conversion rates | [optional]
**cycle_status** | **string** | Status of the cycle | [optional]
**needs_v1_migration** | **bool** | Whether the cycle needs migration from v1 | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
