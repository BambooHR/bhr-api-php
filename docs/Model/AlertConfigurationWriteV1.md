# # AlertConfigurationWriteV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**bamboo_alert_id** | **int** | Identifier of the alert template this configuration is based on, taken from the &#x60;id&#x60; field of **List Alert Templates** (&#x60;list-alert-templates&#x60;). The template catalog is global rather than per-company, and an identifier that is not in the catalog is rejected. &#x60;0&#x60; is rejected as a missing value; there is no sentinel for \&quot;any alert\&quot;. |
**schedule** | **string** | How often the alert runs. | [optional] [default to 'daily']
**due_within** | **int** |  | [optional]
**due_interval** | **string** |  | [optional]
**send_to_employee** | **bool** | Whether the alert should be sent to employees. | [optional] [default to true]
**send_to_manager** | **bool** | Whether the alert should be sent to managers. | [optional] [default to false]
**send_to_admin** | **bool** | Whether the alert should be sent to admins. | [optional] [default to false]
**custom_message** | **string** |  | [optional]
**custom_subject** | **string** |  | [optional]
**group_by** | **string** |  | [optional]
**limit_training_to_required** | **bool** | Whether the training covered by a training alert should be limited to required training. | [optional] [default to true]
**run_at_time** | **string** |  | [optional]
**run_at_time_zone** | **string** |  | [optional]
**include_position** | **bool** | Whether the alert should include position. | [optional] [default to false]
**include_location** | **bool** | Whether the alert should include location. | [optional] [default to false]
**filter_list_value_ids** | **int[]** | List value IDs the alert is scoped to. Accepted values are the &#x60;options[].id&#x60; values of the employee filter list fields: Department, Division, Location, Job Title, Employment Status, and Status, plus Employment Type and Team on accounts where those fields are enabled. Look the IDs up with **Account Information &gt; List List Fields** (&#x60;list-list-fields&#x60;); an ID belonging to any other list field is rejected. An empty array leaves the alert unscoped, and omitting it on a replace clears all list-value scoping. This is the only recipient-scoping property the API stores. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
