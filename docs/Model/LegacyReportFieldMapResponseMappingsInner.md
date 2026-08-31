# # LegacyReportFieldMapResponseMappingsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**legacy_field_id** | **string** | Identifier the legacy report API emitted for this field: an api alias such as &#x60;location&#x60;, or &#x60;&lt;fieldId&gt;&#x60; / &#x60;&lt;fieldId&gt;.&lt;subfieldId&gt;&#x60; when the field had no alias. Numeric ids may be negative — calculated columns such as full name or length of service carry a negative id — so match them as signed integers, not as digits only. | [optional]
**field_name** | **string** | Field name this legacy identifier now maps to. Matches the key the report and dataset endpoints use in their responses, so it can be used as-is. | [optional]
**field_label** | **string** |  | [optional]
**type** | **string** |  | [optional]
**entity_name** | **string** |  | [optional]
**qualifier** | **object** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
