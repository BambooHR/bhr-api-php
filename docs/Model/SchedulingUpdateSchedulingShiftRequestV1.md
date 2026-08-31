# # SchedulingUpdateSchedulingShiftRequestV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional]
**color** | **string** | 6 character color hex code. | [optional]
**capacity** | **int** |  | [optional]
**start** | **\DateTime** | UTC timestamp of the start of the shift. | [optional]
**end** | **\DateTime** | UTC timestamp of the end of the shift. | [optional]
**timezone** | **string** | The timezone for the shift. | [optional]
**recurrence_rule** | **string** |  | [optional]
**recurrence_edit_option** | **string** | How should recurrence edits be effective? Edits will not affect any realized shifts regardless of option. | [optional]
**recurrence_dtstart** | **\DateTime** |  | [optional]
**recurrence_dtend** | **\DateTime** |  | [optional]
**recurrence_until** | **\DateTime** |  | [optional]
**employee_ids** | **int[]** | What employees are assigned to this shift? | [optional]
**unpublished_changes** | **mixed** | The pending changes that have not been published. Only accepts null to clear unpublished changes. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
