# # EmployeeTaskDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**task_list_id** | **int** | The ID of the task list | [optional]
**employee_task_list_id** | **int** | The ID of the employee task list item | [optional]
**employee_new_hire_packet_id** | **int** | The ID of the employee new hire packet | [optional]
**employee_id** | **int** | The ID of the employee | [optional]
**name** | **string** | The name of the task | [optional]
**description** | **string** | The description of the task | [optional]
**category** | [**\MySdk\Model\TaskCategoryDataObject**](TaskCategoryDataObject.md) | The category of the task | [optional]
**assigned_user_id** | **int** | The ID of the assigned user | [optional]
**assigned_by_user_id** | **int** | The ID of the assigned by user | [optional]
**sort_order** | **int** | The sort order of the task | [optional]
**nhp_sort_order** | **int** | The NHP sort order of the task | [optional]
**can_complete** | **bool** | Whether the task can be completed | [optional] [default to false]
**completed** | **bool** | Whether the task is completed | [optional] [default to false]
**completed_date_time** | **\DateTime** | The completed date of the task | [optional]
**completed_user_id** | **int** | The ID of the completed user | [optional]
**due_date** | **\DateTime** | The due date of the task | [optional]
**applicable** | **bool** | Whether the task is applicable | [optional] [default to true]
**can_delete** | **bool** | Whether the task can be deleted | [optional] [default to false]
**created** | **\DateTime** | The creation date of the task | [optional]
**original_item_id** | **int** | The original item ID of the task | [optional]
**archived** | **bool** | Whether the task is archived | [optional] [default to false]
**allow_employee_uploads** | **string** | Whether employee uploads are allowed | [optional]
**notification_delay_relation** | **string** | The notification delay relation | [optional]
**notification_delay_days** | **int** | The notification delay days | [optional]
**notification_scheduled_datetime** | **\DateTime** | The notification scheduled datetime | [optional]
**notification_sent_datetime** | **\DateTime** | The notification sent datetime | [optional]
**file_ids** | **int[]** | The file IDs of the task | [optional]
**files** | [**\MySdk\Model\EmployeeTaskFileDataObject[]**](EmployeeTaskFileDataObject.md) | The files of the task | [optional]
**employee_upload_file_ids** | **int[]** | The employee upload file IDs of the task | [optional]
**workflow_instance_id** | **int** | The workflow instance ID of the task | [optional]
**esignature_instance_id** | **int** | The e-signature instance ID of the task | [optional]
**type** | **string** | The type of the task | [optional]
**comments** | [**\MySdk\Model\TaskCommentSchema[]**](TaskCommentSchema.md) | The comments of the task | [optional]
**is_quick_books_integration** | **int** | Whether the task is a QuickBooks integration | [optional] [default to 0]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
