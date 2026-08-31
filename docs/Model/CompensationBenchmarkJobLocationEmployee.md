# # CompensationBenchmarkJobLocationEmployee

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**name** | **string** |  | [optional]
**salary** | [**\BhrSdk\Model\CompensationBenchmarkJobLocationEmployeeSalary**](CompensationBenchmarkJobLocationEmployeeSalary.md) |  | [optional]
**photo_url** | **string** |  | [optional]
**manager_name** | **string** |  | [optional]
**manager_title** | **string** |  | [optional]
**division** | **object** |  | [optional]
**department** | **object** |  | [optional]
**paid_per** | **string** | Pay period label for the employee salary amount (e.g. Year, Hour). | [optional]
**currency_conversion_failed** | **bool** |  | [optional]
**annualization_failed** | **bool** | True when pay could not be annualized (e.g. PayPeriod without a pay schedule); salary is the raw amount for paidPer. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
