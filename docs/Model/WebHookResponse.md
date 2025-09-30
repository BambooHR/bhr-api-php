# # WebHookResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The id of the webhook. | [optional]
**name** | **string** | The name of the webhook. | [optional]
**created** | **string** | timestamp of creation | [optional]
**last_sent** | **string** | timestamp of last webhook sent | [optional]
**monitor_fields** | **string[]** | A list of fields to monitor. | [optional]
**post_fields** | **object** | A list of fields to post to the webhook url. Field ID or alias: external name | [optional]
**url** | **string** | The url the webhook should send data to. | [optional]
**format** | **string** | The format the webhook should use (json, form-encoded). | [optional]
**frequency** | [**\BhrSdk\Model\WebHookResponseFrequency**](WebHookResponseFrequency.md) |  | [optional]
**limit** | [**\BhrSdk\Model\PostWebhook201ResponseLimit**](PostWebhook201ResponseLimit.md) |  | [optional]
**include_company_domain** | **bool** | If set to true, the company domain will be added to the header. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
