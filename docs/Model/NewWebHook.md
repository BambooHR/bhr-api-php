# # NewWebHook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the webhook. |
**monitor_fields** | **string[]** | A list of fields to monitor. |
**post_fields** | **object** | A list of fields to post to the webhook url. Field ID or alias: external name |
**url** | **string** | The url the webhook should send data to (must begin with https://). |
**format** | **string** | The format the webhook should use (json - default, form-encoded). | [optional]
**frequency** | [**\BhrSdk\Model\NewWebHookFrequency**](NewWebHookFrequency.md) |  | [optional]
**limit** | [**\BhrSdk\Model\NewWebHookLimit**](NewWebHookLimit.md) |  | [optional]
**include_company_domain** | **bool** | If set to true, the company domain will be added to the header. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
