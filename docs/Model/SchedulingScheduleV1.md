# # SchedulingScheduleV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The UUID of the schedule | [optional] [readonly]
**name** | **string** | The name of the schedule | [optional]
**location_id** | **int** | The ID of the location the schedule belongs to | [optional]
**timezone** | **string** | The timezone of the schedule, provide if location is missing timezone | [optional]
**start_of_week** | **string** | The starting day of the week for the schedule | [optional]
**early_clock_in_threshold** | **int** | The threshold (in minutes) that an employee is allowed to clock in early to a shift on this schedule | [optional]
**late_clock_in_threshold** | **int** | The threshold (in minutes) after a shift starts before an employee is considered late clocking in | [optional]
**early_clock_out_threshold** | **int** | The threshold (in minutes) before a shift ends within which an employee is considered to have clocked out early | [optional]
**late_clock_out_threshold** | **int** | The threshold (in minutes) after a shift ends before an employee is considered to have clocked out late | [optional]
**manager_user_ids** | **int[]** | What users manage this schedule | [optional]
**employee_ids** | **int[]** | What employees are assigned to this schedule | [optional]
**created_at** | **\DateTime** | UTC timestamp when the schedule was created | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]
**auto_publish_lead_time_unit** | **string** |  | [optional]
**auto_publish_lead_time_quantity** | **int** |  | [optional]
**next_auto_publish_at** | **\DateTime** |  | [optional] [readonly]
**last_auto_publish_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
