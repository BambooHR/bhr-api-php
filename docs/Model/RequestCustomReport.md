# # RequestCustomReport

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | A label for the report. Included in the response and used as the file name for downloaded reports. | [optional]
**fields** | **string[]** | Array of field IDs to include as columns in the report. Maximum of 400 fields. | [optional]
**filters** | [**\BhrSdk\Model\RequestCustomReportFilters**](RequestCustomReportFilters.md) |  | [optional]
**filter_duplicates** | **string** | Whether to apply standard duplicate row filtering. Defaults to enabled. Set to &#x60;no&#x60; to return raw results without deduplication. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
