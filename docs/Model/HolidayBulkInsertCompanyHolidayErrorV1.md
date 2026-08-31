# # HolidayBulkInsertCompanyHolidayErrorV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**record_index** | **int** | Zero-based index of the failed record in the request body array | [optional]
**type** | **string** | Problem type URI identifying the error category | [optional]
**title** | **string** | Short, human-readable summary of the problem type | [optional]
**status** | **int** | HTTP status code the record would have received from the single-create endpoint | [optional]
**detail** | **string** | Human-readable explanation specific to this record failure | [optional]
**code** | **string** | Application-specific error code | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
