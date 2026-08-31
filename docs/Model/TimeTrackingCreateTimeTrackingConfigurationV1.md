# # TimeTrackingCreateTimeTrackingConfigurationV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The configuration name. Unique per company. |
**timesheet_type** | **string** | How time is logged. |
**work_week_starts_on** | **string** | Day of week the work week starts. |
**approver_type** | **string** | Who approves timesheets. |
**approver_user_id** | **int** |  | [optional]
**approval_cutoff** | **string** | Time of day by which timesheets must be approved, in 24-hour HH:MM format. |
**approval_cutoff_days** | **int** | Number of days before the pay date the cutoff applies. |
**clock_in_schedule_policy** | **string** | When scheduled employees can clock in. | [optional] [default to 'ANYTIME']
**restrict_web_clock_actions** | **bool** | When true, removes the time clock from bamboohr.com for employees in this configuration. | [optional] [default to false]
**mobile_enabled** | **bool** | When true, employees can log time using the BambooHR mobile app. | [optional] [default to false]
**geolocation_enabled** | **bool** | When true, employee location is required when clocking in/out via mobile. Stored but has no effect while mobileEnabled is false. | [optional] [default to false]
**custom_overtime_enabled** | **bool** | When true, the overtime threshold fields are honored. When false, they must be omitted. | [optional] [default to false]
**overtime_daily_hours** | **string** |  | [optional]
**overtime_daily_double_hours** | **string** |  | [optional]
**overtime_weekly_hours** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
