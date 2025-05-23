# # CompanyAlertDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of the company alert. | [optional]
**bamboo_alert_id** | **int** | The unique identifier of the Bamboo alert. | [optional]
**schedule** | **string** | The schedule for the company alert. | [optional]
**due_within** | **int** | The number of days before the alert is due. | [optional]
**due_interval** | **string** | The interval for the alert. | [optional]
**send_to_employee** | **bool** | Whether the alert should be sent to employees. | [optional]
**send_to_manager** | **bool** | Whether the alert should be sent to managers. | [optional]
**send_to_admin** | **bool** | Whether the alert should be sent to admins. | [optional]
**editor_user_id** | **int** | The user ID of the editor. | [optional]
**last_edited** | **mixed** | The last edited date of the company alert. | [optional]
**custom_message** | **string** | The custom message for the company alert. | [optional]
**custom_subject** | **string** | The custom subject for the company alert. | [optional]
**group_by** | **string** | The group by for the company alert. | [optional]
**limit_training_to_required** | **bool** | Whether the training should be limited to required training. | [optional]
**run_at_time** | **string** | The time the company alert should run at. | [optional]
**run_at_time_zone** | **string** | The time zone the company alert should run at. | [optional]
**include_position** | **bool** | Whether the alert should include position. | [optional]
**include_location** | **bool** | Whether the alert should include location. | [optional]
**additional_recipient_emails** | **string[]** | The additional recipient emails for the company alert. | [optional]
**employee_ids** | **string[]** | The employee IDs for the company alert. | [optional]
**list_value_ids** | **int[]** | The list value IDs for the company alert. | [optional]
**filter_list_value_ids** | **int[]** | The filter list value IDs for the company alert. | [optional]
**user_ids** | **int[]** | The user IDs for the company alert. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
