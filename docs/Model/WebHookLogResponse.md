# # WebHookLogResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**webhook_id** | **int** | The id of the webhook. | [optional]
**url** | **string** | The URL of the webhook. | [optional]
**last_attempted** | **string** | timestamp of last time the webhook was sent | [optional]
**last_success** | **string** | timestamp of last time the webhook was sent successfully | [optional]
**failure_count** | **int** | Count of how many times this call failed since last success | [optional]
**status** | **int** | Status code of last request | [optional]
**employee_ids** | **int[]** | A list of employee ids that were changed. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
