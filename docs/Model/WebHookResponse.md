# # WebHookResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the webhook. | [optional]
**name** | **string** | The name of the webhook. | [optional]
**created** | **string** | Datetime when the webhook was created (UTC, format: YYYY-MM-DD HH:MM:SS). | [optional]
**last_sent** | **string** |  | [optional]
**monitor_fields** | **string[]** |  | [optional]
**post_fields** | **object** | A map of field ID or alias to the external name used in the webhook payload. | [optional]
**url** | **string** | The URL the webhook sends data to. | [optional]
**format** | **string** | The payload format used by the webhook. | [optional]
**include_company_domain** | **bool** | Whether the company domain is added to the webhook request header. | [optional]
**events** | [**\BhrSdk\Model\WebhookEventType[]**](WebhookEventType.md) | Events that trigger this webhook. | [optional]
**errors** | [**\BhrSdk\Model\WebhookSubErrorProperty[]**](WebhookSubErrorProperty.md) | Field-level permission errors associated with the webhook configuration, when present. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
