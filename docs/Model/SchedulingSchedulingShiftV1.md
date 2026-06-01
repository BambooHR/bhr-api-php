# # SchedulingSchedulingShiftV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the shift. This can be the UUIDv7 of the shift instance, or a composite ID (&lt;recurringShiftDefinitionId&gt;_&lt;recurrenceId&gt;) for uninstantiated recurring shifts. | [readonly]
**schedule_id** | **string** | The ID of the schedule the shift belongs to. |
**name** | **string** |  | [optional]
**status** | **string** | The status of the shift. |
**color** | **string** | 6 character color hex code. |
**capacity** | **int** |  | [optional]
**start** | **\DateTime** |  |
**end** | **\DateTime** |  |
**timezone** | **string** | The timezone for the shift. |
**recurrence_rule** | **string** |  | [optional]
**recurrence_id** | **string** |  | [optional]
**recurrence_dtstart** | **string** |  | [optional]
**recurrence_dtend** | **string** |  | [optional]
**recurrence_until** | **string** |  | [optional]
**employee_ids** | **int[]** | The list of employee IDs currently assigned. | [optional]
**unpublished_changes** | **object** |  | [optional]
**created_at** | **\DateTime** | UTC timestamp when the shift was created | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
