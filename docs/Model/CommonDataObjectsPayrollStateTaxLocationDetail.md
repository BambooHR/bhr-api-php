# # CommonDataObjectsPayrollStateTaxLocationDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Location ID (typically an integer, but \&quot;home\&quot; is a valid ID as well) | [optional]
**state** | **string** | State abbreviation | [optional]
**display_text** | **string** | Display text for the location | [optional]
**val** | **string** | Value for the location | [optional]
**fields** | [**\MySdk\Model\CommonDataObjectsPayrollStateTaxLocationFields**](CommonDataObjectsPayrollStateTaxLocationFields.md) | Fields for the state tax location | [optional]
**new_fields** | [**\MySdk\Model\CommonDataObjectsPayrollStateTaxLocationFields**](CommonDataObjectsPayrollStateTaxLocationFields.md) | New fields for the state tax location | [optional]
**supports_new_state_tax_view** | **bool** | Whether the location supports the new state tax view | [optional] [default to false]
**is_new_state_tax_view** | **bool** | Whether the location is using the new state tax view | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
