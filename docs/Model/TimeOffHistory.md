# # TimeOffHistory

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**date** | **\DateTime** | The date for the history item in YYYY-MM-DD format. |
**event_type** | **string** | The type of history event. Defaults to &#x60;used&#x60; for the /history path and &#x60;override&#x60; for the /balance_adjustment path when omitted. | [optional]
**time_off_request_id** | **int** | The ID of an approved time off request. Required when eventType is &#x60;used&#x60;. | [optional]
**time_off_type_id** | **int** | The ID of the time off type. Required when eventType is &#x60;override&#x60;. | [optional]
**amount** | **float** | The number of hours/days to record. Required when eventType is &#x60;override&#x60;. | [optional]
**note** | **string** | An optional note to show in history. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
