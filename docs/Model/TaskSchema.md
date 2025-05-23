# # TaskSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional]
**task_template_id** | **int** |  | [optional]
**task_type** | **string** |  | [optional]
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**task_list_id** | **int** |  | [optional]
**assigned_user_id** | **int** |  | [optional]
**assigned_by_user_id** | **int** |  | [optional]
**sort_order** | **int** |  | [optional]
**due_date** | **string** |  | [optional]
**can_delete** | **bool** |  | [optional]
**completed** | **bool** |  | [optional]
**completed_datetime** | **string** |  | [optional]
**completed_user_id** | **int** |  | [optional]
**archived** | **bool** |  | [optional]
**has_attachments** | **bool** |  | [optional]
**has_comments** | **bool** |  | [optional]
**allow_employee_uploads** | **bool** |  | [optional]
**require_employee_uploads** | **bool** |  | [optional]
**created** | **string** |  | [optional]
**can_complete** | **bool** |  | [optional]
**notification_delay_relation** | **string** |  | [optional]
**notification_delay_days** | **int** |  | [optional]
**notification_scheduled_datetime** | **string** |  | [optional]
**notification_sent_datetime** | **string** |  | [optional]
**attachments** | [**\MySdk\Model\TaskAttachmentsBaseSchema**](TaskAttachmentsBaseSchema.md) |  | [optional]
**comments** | [**\MySdk\Model\TaskCommentSchema[]**](TaskCommentSchema.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
