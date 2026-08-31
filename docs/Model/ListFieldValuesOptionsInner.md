# # ListFieldValuesOptionsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The existing option ID. Omit this field to create a new option. Required when archiving an existing option. | [optional]
**value** | **string** | The display value for the option. Required when creating a new option (i.e., when id is omitted). | [optional]
**archived** | **string** | Whether the option should be archived. Use &#x60;yes&#x60; to soft-delete an option or &#x60;no&#x60; to reactivate a previously archived option. Archived options continue to appear in GET responses for historical data integrity. | [optional]
**adp_code** | **string** | Optional payroll-mapping code associated with the option. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
