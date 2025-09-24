# # GroupedApprovalFlowsViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**group_by** | **string** | Field used for grouping (e.g., department, division, location, title) | [optional]
**grouped_data** | [**\MySdk\Model\GroupedDataCollection**](GroupedDataCollection.md) | Approval groups organized by their group ID | [optional]
**ungrouped_data_by_template_id** | [**\MySdk\Model\GroupedDataCollection**](GroupedDataCollection.md) | Ungrouped approval data organized by template ID | [optional]
**unassigned_employee_ids** | **string[]** | List of employee IDs that are not assigned to any approval group | [optional]
**person_info** | [**\MySdk\Model\ApprovalFlowPersonInfoDataObject[]**](ApprovalFlowPersonInfoDataObject.md) | Collection of employee information mapped by employee ID | [optional]
**filter_list_values** | **string[]** | List of filter list values | [optional]
**dismiss_approvals_intro** | **bool** | Whether the approvals intro has been dismissed or not | [optional]
**cycle_status** | **string** | Status of the cycle | [optional]
**needs_v1_migration** | **bool** | Whether the cycle needs migration from v1 | [optional]
**migrated_from_v1** | **bool** | Whether the cycle was migrated from v1 | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
