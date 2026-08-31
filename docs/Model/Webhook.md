# # Webhook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the webhook. | [optional]
**name** | **string** | The name of the webhook. | [optional]
**created** | **string** | Datetime when the webhook was created (UTC, format: YYYY-MM-DD HH:MM:SS). | [optional]
**last_sent** | **string** |  | [optional]
**monitor_fields** | **string[]** |  | [optional]
**post_fields** | **object** | An object map of field ID or alias to the external name used in the webhook payload. | [optional]
**url** | **string** | The URL the webhook sends data to. | [optional]
**format** | **string** | The payload format used by the webhook. | [optional]
**private_key** | **string** | The private key used to verify webhook authenticity via HMAC-SHA256. Only returned at creation time. | [optional]
**include_company_domain** | **bool** | Whether the company domain is added to the webhook request header. | [optional]
**events** | [**\BhrSdk\Model\WebhookEventType[]**](WebhookEventType.md) | Events that trigger this webhook. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
