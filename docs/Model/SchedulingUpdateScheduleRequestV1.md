# # SchedulingUpdateScheduleRequestV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the schedule | [optional]
**location_id** | **int** | The ID of the location the schedule belongs to | [optional]
**timezone** | **string** | The timezone of the schedule. Required if location does not have a timezone. Error if location already has a timezone. | [optional]
**start_of_week** | **string** | The starting day of the week for the schedule | [optional]
**early_clock_in_threshold** | **int** | The threshold (in minutes) that an employee is allowed to clock in early to a shift on this schedule | [optional]
**manager_user_ids** | **int[]** | User IDs of managers for this schedule | [optional]
**employee_ids** | **int[]** | Employee IDs assigned to this schedule | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
