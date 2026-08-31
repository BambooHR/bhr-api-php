# # TimeTrackingUpdateTimeTrackingConfigurationV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The configuration name. Unique per company. | [optional]
**timesheet_type** | **string** | How time is logged. | [optional]
**work_week_starts_on** | **string** | Day of week the work week starts. | [optional]
**approver_type** | **string** | Who approves timesheets. Moving away from SPECIFIC_PERSON clears approverUserId server-side. | [optional]
**approver_user_id** | **int** |  | [optional]
**approval_cutoff** | **string** | Time of day by which timesheets must be approved, in 24-hour HH:MM format. | [optional]
**approval_cutoff_days** | **int** | Number of days before the pay date the cutoff applies. | [optional]
**clock_in_schedule_policy** | **string** | When scheduled employees can clock in. | [optional]
**restrict_web_clock_actions** | **bool** | When true, removes the time clock from bamboohr.com for employees in this configuration. | [optional]
**mobile_enabled** | **bool** | When true, employees can log time using the BambooHR mobile app. | [optional]
**geolocation_enabled** | **bool** | When true, employee location is required when clocking in/out via mobile. Stored but has no effect while mobileEnabled is false. | [optional]
**custom_overtime_enabled** | **bool** | When true, the overtime threshold fields are honored. Setting it to false clears all three thresholds server-side. | [optional]
**overtime_daily_hours** | **string** |  | [optional]
**overtime_daily_double_hours** | **string** |  | [optional]
**overtime_weekly_hours** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
