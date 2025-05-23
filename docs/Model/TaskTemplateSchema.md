# # TaskTemplateSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of the task template. | [optional]
**task_type** | **string** | The type of the task template. | [optional]
**task_list_id** | **int** | The ID of the task list this template belongs to. | [optional]
**name** | **string** | The name of the task template. | [optional]
**description** | **string** | The description of the task template, if available. | [optional]
**assigned_user_id** | **int** | The ID of the user assigned to the task, if applicable. | [optional]
**assigned_by_user_id** | **int** | The ID of the user who assigned the task, if applicable. | [optional]
**assigned_to** | **string** | The assignment type for the task template. | [optional]
**due_date_delay** | **int** | The delay in days for the task&#39;s due date, if applicable. | [optional]
**due_date_relation** | **string** | The relation of the due date to another date. | [optional]
**due_date_interval** | **string** | The interval for the due date delay. | [optional]
**allow_employee_uploads** | **bool** | Indicates whether employee uploads are allowed for this task. | [optional]
**require_employee_uploads** | **bool** | Indicates whether employee uploads are required for this task. | [optional]
**notification_delay_relation** | **string** | The relation of the notification delay to the due date. | [optional]
**notification_delay_days** | **int** | The number of days for the notification delay, if applicable. | [optional]
**sort_order** | **int** | The sort order of the task template within the task list. | [optional]
**archived** | **bool** | Indicates whether the task template is archived. | [optional]
**attachments** | [**\MySdk\Model\TaskAttachmentSchema[]**](TaskAttachmentSchema.md) | The list of attachments associated with the task template. | [optional]
**filters** | **int[]** | The list of filter IDs associated with the task template. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
