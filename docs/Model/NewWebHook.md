# # NewWebHook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the webhook. |
**monitor_fields** | **string[]** | A list of fields to monitor. At least one field is required to be monitored if events is empty or contains employee_with_fields.updated or employee.updated. | [optional]
**post_fields** | **object** | An object map of field ID or alias to the external name used in the webhook payload (e.g. &#x60;{\&quot;firstName\&quot;: \&quot;First Name\&quot;}&#x60;). Omit or send an empty object to include no extra fields. | [optional]
**url** | **string** | The url the webhook should send data to (must begin with https://). |
**format** | **string** | The payload format the webhook uses. Required. |
**include_company_domain** | **bool** | If set to true, the company domain will be added to the webhook request header. | [optional]
**events** | [**\BhrSdk\Model\WebhookEventType[]**](WebhookEventType.md) | Events that trigger this webhook. Defaults to [&#39;employee_with_fields.updated&#39;, &#39;employee_with_fields.deleted&#39;, &#39;employee_with_fields.created&#39;] if not specified. Cannot mix employee_with_fields events with employee events. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
