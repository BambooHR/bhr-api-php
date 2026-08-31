# # TimeTrackingTimeTrackingConfigurationV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the configuration. | [optional] [readonly]
**name** | **string** | The configuration name. Unique per company. | [optional]
**type** | **string** | The configuration type. Read-only. Exactly one GLOBAL configuration exists per company; all customer-created configurations are GROUP. | [optional] [readonly]
**timesheet_type** | **string** | How time is logged. | [optional]
**work_week_starts_on** | **string** | Day of week the work week starts. | [optional]
**approver_type** | **string** |  | [optional]
**approver_user_id** | **int** |  | [optional]
**approval_cutoff** | **string** | Time of day by which timesheets must be approved, in 24-hour HH:MM format. | [optional]
**approval_cutoff_days** | **int** | Number of days before the pay date the cutoff applies. | [optional]
**clock_in_schedule_policy** | **string** | When scheduled employees can clock in. | [optional]
**restrict_web_clock_actions** | **bool** | When true, removes the time clock from bamboohr.com for employees in this configuration. | [optional]
**mobile_enabled** | **bool** | When true, employees can log time using the BambooHR mobile app. | [optional]
**geolocation_enabled** | **bool** | When true, employee location is required when clocking in/out via mobile. Only meaningful when mobileEnabled is true. | [optional]
**custom_overtime_enabled** | **bool** | When false, standard U.S. and Canada overtime rules apply. When true, the daily/weekly overtime fields are honored. | [optional]
**overtime_daily_hours** | **string** |  | [optional]
**overtime_daily_double_hours** | **string** |  | [optional]
**overtime_weekly_hours** | **string** |  | [optional]
**employee_ids** | **int[]** | Read-only array of employee IDs currently enrolled in this configuration. | [optional]
**created_at** | **\DateTime** | ISO 8601 timestamp when the configuration was created. | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
