# # HistoryTableJsonData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**field_id** | **string** | ID of the field associated with this table | [optional]
**rows** | [**\MySdk\Model\HistoryTableJsonDataRowsInner[]**](HistoryTableJsonDataRowsInner.md) | Array of row data for the table | [optional]
**row_template** | **object** | Template for creating new rows | [optional]
**can_add_rows** | **bool** | Whether rows can be added to the table | [optional]
**can_edit** | **bool** | Whether the table is editable | [optional]
**can_delete_rows** | **bool** | Whether rows can be deleted from the table | [optional]
**header_names** | **string[]** | Column header names for the table | [optional]
**table_type** | **string** | Type of table | [optional]
**is_history_table** | **bool** | Whether this is a history table | [optional]
**sort_by_field_ids** | **string[]** | Field IDs to sort the table by | [optional]
**sort_direction** | **string** | Direction to sort the table (asc/desc) | [optional]
**sensitive_field_id** | **string** | ID of the sensitive field associated with this table | [optional]
**sensitive_table_type** | **string** | Type of sensitive table | [optional]
**overtime_rate_field_id** | **string** | ID of the overtime rate field | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
