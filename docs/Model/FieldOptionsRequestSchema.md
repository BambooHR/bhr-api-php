# # FieldOptionsRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fields** | **string[]** | List of field names to get options for |
**dependent_fields** | **array<string,\BhrSdk\Model\FieldOptionsRequestSchemaDependentFieldsValueInner[]>** | Dependent fields and their values that affect the options of the requested fields | [optional]
**filters** | **object** | Optional filters to apply when retrieving field options. Filters limit the returned options based on other field values. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
