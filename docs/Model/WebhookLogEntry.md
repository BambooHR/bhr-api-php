# # WebhookLogEntry

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**webhook_id** | **string** | The ID of the webhook. | [optional]
**url** | **string** | The URL the webhook was delivered to. | [optional]
**last_attempted** | **string** | Datetime of the last delivery attempt (UTC, format: YYYY-MM-DD HH:MM:SS), or a status string such as \&quot;Webhook Not Found\&quot; when the delivery target could not be reached. | [optional]
**last_success** | **string** | Datetime of the last successful delivery (UTC, format: YYYY-MM-DD HH:MM:SS), or a status string such as \&quot;Webhook Not Found\&quot; when no successful delivery has been recorded. | [optional]
**status_code** | **string** | HTTP status code returned by the webhook endpoint on the last delivery attempt. | [optional]
**format** | **string** | The payload format used for this delivery. | [optional]
**employee_ids** | **string[]** | Array of employee IDs included in the webhook payload, returned as strings. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
