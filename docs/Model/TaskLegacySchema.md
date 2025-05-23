# # TaskLegacySchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Task ID | [optional]
**type** | **string** | Task Type | [optional]
**name** | **string** | Task Name | [optional]
**description** | **string** | Task Description | [optional]
**category_id** | **int** | Task Category ID | [optional]
**assigned_user_id** | **int** | Task Assigned User ID | [optional]
**assigned_by_user_id** | **int** | Task Assigned By User ID | [optional]
**sort_order** | **int** | Task Sort Order | [optional]
**due_date** | **\DateTime** | Task Due Date | [optional]
**can_delete** | **bool** | Task Can Delete | [optional]
**created** | **\DateTime** | Task Created Date | [optional]
**template_id** | **int** | Task Template ID | [optional]
**allow_employee_uploads** | **string** | Task Allow Employee Uploads | [optional]
**can_complete** | **bool** | Task Can Complete | [optional]
**complete** | **bool** | Task Complete | [optional]
**completed_date_time** | **\DateTime** | Task Completed DateTime | [optional]
**completed_user_id** | **int** | Task Completed User ID | [optional]
**archived** | **bool** | Task Archived | [optional]
**comments** | [**\MySdk\Model\TaskCommentSchema[]**](TaskCommentSchema.md) | Task Comments | [optional]
**attachments** | [**\MySdk\Model\TaskAttachmentLegacySchema[]**](TaskAttachmentLegacySchema.md) | Task Attachments | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
