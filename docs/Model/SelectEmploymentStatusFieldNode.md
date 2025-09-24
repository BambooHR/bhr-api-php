# # SelectEmploymentStatusFieldNode

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the node | [optional]
**type** | **string** | Type of the form node | [optional]
**label** | **string** | Field label | [optional]
**required** | **bool** | Whether the field is required | [optional]
**status** | **string** | Field status | [optional]
**value** | [**\MySdk\Model\SelectFieldFormNodeAllOfValue**](SelectFieldFormNodeAllOfValue.md) |  | [optional]
**width** | **int** | Field width | [optional]
**bi_id** | **string** | Business intelligence ID | [optional]
**max_length** | **int** | Maximum length of input | [optional]
**disabled** | **bool** | Whether the field is disabled | [optional]
**meta_data** | **object** | Additional metadata | [optional]
**aria_label** | **string** | Accessibility label | [optional]
**is_custom_field** | **bool** | Whether the field is a custom field | [optional]
**items** | [**\MySdk\Model\SelectFieldFormNodeAllOfItems[]**](SelectFieldFormNodeAllOfItems.md) | Available options for selection | [optional]
**multiselect** | **bool** | Whether multiple options can be selected | [optional]
**add_item_field_id** | **int** | Field ID for adding new items | [optional]
**add_item_label** | **string** | Label for adding new items | [optional]
**aca_statuses** | **string[]** | Available aca statuses | [optional]
**aca_status_enabled** | **bool** | Is Aca status enabled | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
