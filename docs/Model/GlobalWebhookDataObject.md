# # GlobalWebhookDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Webhook ID | [optional]
**name** | **string** | Webhook name | [optional]
**url** | **string** | Webhook URL | [optional]
**private_key** | **string** | Private key for webhook authentication (masked) | [optional]
**format** | **string** | Format of the webhook payload | [optional]
**monitor_fields** | **int[]** | Fields to monitor for changes | [optional]
**post_fields** | [**\MySdk\Model\WebhookSelectedPostFieldDataObject[]**](WebhookSelectedPostFieldDataObject.md) | Fields to include in the webhook payload | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
