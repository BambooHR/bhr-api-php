# # HistoryTableControlFormNode

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the node | [optional]
**type** | **string** | Type of the form node | [optional]
**label** | **string** | Table label | [optional]
**field_id** | **string** | Field identifier | [optional]
**can_add_rows** | **bool** | Whether rows can be added | [optional]
**can_edit** | **bool** | Whether the table is editable | [optional]
**can_delete_rows** | **bool** | Whether rows can be deleted | [optional]
**columns** | [**\MySdk\Model\HistoryTableControlFormNodeAllOfColumns[]**](HistoryTableControlFormNodeAllOfColumns.md) | Column definitions | [optional]
**table_type** | **string** | Type of table | [optional]
**is_history_table** | **bool** | Whether this is a history table | [optional]
**sort_by_field_ids** | **string[]** | Field IDs to sort by | [optional]
**sort_direction** | **string** | Sort direction | [optional]
**rows** | [**\MySdk\Model\HistoryTableControlFormNodeAllOfRows[]**](HistoryTableControlFormNodeAllOfRows.md) | Table rows | [optional]
**groups** | [**\MySdk\Model\HistoryTableControlFormNodeAllOfGroups[]**](HistoryTableControlFormNodeAllOfGroups.md) | Table groups | [optional]
**sensitive_table_type** | **string** | Sensitive table type | [optional]
**sensitive_field_id** | **string** | Sensitive field identifier | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
