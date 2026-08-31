# # HolidayBulkInsertCompanyHolidaysFailureResponseV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Problem type URI identifying the error category | [optional]
**title** | **string** | Short, human-readable summary of the problem type | [optional]
**status** | **string** | Overall batch outcome | [optional]
**detail** | **string** | Detailed, human-readable explanation specific to this occurrence of the problem | [optional]
**instance** | **string** | URI reference that identifies the specific occurrence of the problem | [optional]
**code** | **string** | Application-specific error code | [optional]
**fields** | **array<string,string>** |  | [optional]
**operation** | **string** | Operation type for this bulk request | [optional]
**total_requested** | **int** | Total number of records in the request | [optional]
**total_processed** | **int** | Total number of records created successfully | [optional]
**failed** | **int** | Total number of records that failed | [optional]
**errors** | [**\BhrSdk\Model\HolidayBulkInsertCompanyHolidayErrorV1[]**](HolidayBulkInsertCompanyHolidayErrorV1.md) | Per-record problem-details style errors | [optional]
**records** | [**\BhrSdk\Model\HolidayBulkInsertCompanyHolidayRecordV1[]**](HolidayBulkInsertCompanyHolidayRecordV1.md) | Per-record success results, in request order | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
