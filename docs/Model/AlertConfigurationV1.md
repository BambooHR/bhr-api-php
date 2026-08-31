# # AlertConfigurationV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of this alert configuration. | [optional]
**bamboo_alert_id** | **int** | The identifier of the alert template this configuration is based on. Resolve template identifiers to a name and group with **List Alert Templates** (&#x60;list-alert-templates&#x60;), which exposes the same identifier as &#x60;id&#x60;. | [optional]
**schedule** | **string** | The schedule for the company alert. | [optional]
**due_within** | **int** |  | [optional]
**due_interval** | **string** |  | [optional]
**send_to_employee** | **bool** | Whether the alert should be sent to employees. | [optional]
**send_to_manager** | **bool** | Whether the alert should be sent to managers. | [optional]
**send_to_admin** | **bool** | Whether the alert should be sent to admins. | [optional]
**editor_user_id** | **int** |  | [optional]
**last_edited** | **\DateTime** |  | [optional]
**custom_message** | **string** |  | [optional]
**custom_subject** | **string** |  | [optional]
**group_by** | **string** |  | [optional]
**limit_training_to_required** | **bool** | Whether the training should be limited to required training. | [optional]
**run_at_time** | **string** |  | [optional]
**run_at_time_zone** | **string** |  | [optional]
**include_position** | **bool** | Whether the alert should include position. | [optional]
**include_location** | **bool** | Whether the alert should include location. | [optional]
**additional_recipient_emails** | **string[]** | Never persisted by this API. A &#x60;GET&#x60;, both the list and the single-read, always returns an empty array, while a create or replace response echoes back whatever was submitted; that echo does not mean the value was stored. | [optional]
**employee_ids** | **string[]** | Internal employee IDs. Never persisted by this API: a read always returns an empty array, while a create or replace response echoes back whatever was submitted; that echo does not mean the value was stored. | [optional]
**list_value_ids** | **int[]** | Never persisted by this API. A &#x60;GET&#x60;, both the list and the single-read, always returns an empty array, while a create or replace response echoes back whatever was submitted; that echo does not mean the value was stored. Use &#x60;filterListValueIds&#x60; to scope an alert by list value. | [optional]
**filter_list_value_ids** | **int[]** | List value IDs the alert is scoped to, such as specific departments or locations. An empty array means the alert is not scoped by list value. | [optional]
**user_ids** | **int[]** | Never persisted by this API. A &#x60;GET&#x60;, both the list and the single-read, always returns an empty array, while a create or replace response echoes back whatever was submitted; that echo does not mean the value was stored. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
