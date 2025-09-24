# # GlobalWebHookRequestObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**format** | **string** | Format of the webhook payload |
**monitor_fields** | **int[]** | List of fields to monitor for changes. At least one field must be selected. |
**name** | **string** | Name of the webhook |
**private_key** | **string** | Private key for webhook authentication. This will be left unchanged if null. |
**url** | **string** | URL endpoint where webhook notifications will be sent |
**post_fields** | [**\MySdk\Model\WebhookSelectedPostFieldDataObject[]**](WebhookSelectedPostFieldDataObject.md) | Collection of webhook selected post fields | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
