# # TimeOffRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | The initial status of the request. |
**start** | **\DateTime** | Start date in YYYY-MM-DD format. |
**end** | **\DateTime** | End date in YYYY-MM-DD format. Must be on or after the start date. |
**time_off_type_id** | **int** | The ID of the time off type for this request. |
**amount** | **float** | Total hours or days requested. Ignored when &#x60;dates&#x60; array is provided (sum of daily amounts is used instead). | [optional]
**previous_request** | **int** | The ID of a previous time off request to supersede. The previous request will be cancelled. | [optional]
**notes** | [**\BhrSdk\Model\TimeOffRequestNotesInner[]**](TimeOffRequestNotesInner.md) | Optional notes from the employee or manager. | [optional]
**dates** | [**\BhrSdk\Model\TimeOffRequestDatesInner[]**](TimeOffRequestDatesInner.md) | Optional per-day breakdown. When provided, the top-level &#x60;amount&#x60; is ignored and the sum of daily amounts is used. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
