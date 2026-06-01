# # SchedulingCreateSchedulingShiftRequestV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schedule_id** | **string** | The ID of the schedule the shift belongs to. |
**name** | **string** |  | [optional]
**status** | **string** | The status of the shift. |
**color** | **string** | 6 character color hex code. |
**timezone** | **mixed** |  |
**capacity** | **int** |  | [optional]
**employee_ids** | **int[]** | What employees are assigned to this shift? | [optional]
**start** | **\DateTime** | UTC timestamp of the start of the shift. |
**end** | **\DateTime** | UTC timestamp of the end of the shift. |
**recurrence_rule** | **string** |  | [optional]
**recurrence_dtstart** | **string** |  | [optional]
**recurrence_dtend** | **string** |  | [optional]
**recurrence_until** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
