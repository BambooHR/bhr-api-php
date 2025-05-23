# # ScopeAccessDescriptionDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**scope** | **string** | Scope identifier | [optional]
**description** | **string** | Scope description | [optional]
**sub_description** | **string** | Scope sub-description | [optional]
**visibility** | **int** | Bitmask of the scope visibility (PUBLIC &#x3D; 1, PRIVATE &#x3D; 2) | [optional]
**assumed_scopes** | **string[]** | List of scopes whose permissions this scope assumes | [optional]
**scope_category** | **string** | Category of the scope to show the scopes in groups | [optional]
**display_name** | **string** | Scope display name to show to end-users | [optional]
**write_access** | **bool** | True if the application also has the {scope}.write scope | [optional]
**is_meta_scope** | **bool** | True this scope is listed inside ApplicationScopeDefinitions::META_SCOPES | [optional]
**fields** | **string[]** | Field permissions granted to this scope | [optional]
**actions** | **string[]** | Action permissions granted to this scope | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
