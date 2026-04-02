# # NewWebHook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the webhook. |
**monitor_fields** | **string[]** | A list of fields to monitor. |
**post_fields** | **object** | A list of fields to post to the webhook url. Field ID or alias: external name | [optional]
**url** | **string** | The url the webhook should send data to (must begin with https://). |
**format** | **string** | The format the webhook should use (json - default, form-encoded). | [optional]
**include_company_domain** | **bool** | If set to true, the company domain will be added to the header. | [optional]
**events** | [**\BhrSdk\Model\WebhookEventType[]**](WebhookEventType.md) | Events that trigger this webhook. Defaults to [&#39;employee_with_fields.updated&#39;, &#39;employee_with_fields.deleted&#39;, &#39;employee_with_fields.created&#39;] if not specified. Cannot mix employee_with_fields events with employee events. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
