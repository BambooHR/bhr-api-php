# # HolidayBulkInsertCompanyHolidaysResponseV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | Overall batch outcome | [optional]
**operation** | **string** | Operation type for this bulk request | [optional]
**total_requested** | **int** | Total number of records in the request | [optional]
**total_processed** | **int** | Total number of records created successfully | [optional]
**failed** | **int** | Total number of records that failed | [optional]
**errors** | [**\BhrSdk\Model\HolidayBulkInsertCompanyHolidayErrorV1[]**](HolidayBulkInsertCompanyHolidayErrorV1.md) | Per-record problem-details style errors | [optional]
**records** | [**\BhrSdk\Model\HolidayBulkInsertCompanyHolidayRecordV1[]**](HolidayBulkInsertCompanyHolidayRecordV1.md) | Per-record success results, in request order | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
