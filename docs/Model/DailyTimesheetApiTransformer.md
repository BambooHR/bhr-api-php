# # DailyTimesheetApiTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Timesheet ID | [optional]
**employee_id** | **int** | Employee ID | [optional]
**approval** | [**\MySdk\Model\BasicTimesheetWithApproverApiTransformerAllOfApproval**](BasicTimesheetWithApproverApiTransformerAllOfApproval.md) |  | [optional]
**can_edit** | **bool** | Whether the timesheet can be edited | [optional]
**type** | **string** | Timesheet type | [optional]
**last_changed** | **int** | Timestamp when hours were last changed | [optional]
**start_date** | **\DateTime** | Period start date | [optional]
**end_date** | **\DateTime** | Period end date | [optional]
**total_holiday_hours** | **float** | Total holiday hours | [optional]
**total_overtime_hours** | **float** | Total overtime hours | [optional]
**overtime_summary** | [**\MySdk\Model\BasicTimesheetApiTransformerOvertimeSummaryInner[]**](BasicTimesheetApiTransformerOvertimeSummaryInner.md) | Overtime summary | [optional]
**hour_summary** | [**\MySdk\Model\BasicTimesheetApiTransformerHourSummaryInner[]**](BasicTimesheetApiTransformerHourSummaryInner.md) | Hour summary | [optional]
**shift_differentials** | [**\MySdk\Model\BasicTimesheetApiTransformerShiftDifferentialsInner[]**](BasicTimesheetApiTransformerShiftDifferentialsInner.md) | Shift differentials | [optional]
**total_time_off_hours** | **float** | Total time off hours | [optional]
**total_hours** | **float** | Total hours | [optional]
**total_hours_worked** | **float** | Total hours worked | [optional]
**holiday_pay_type** | **string** | Holiday pay type | [optional]
**last_clock_entry** | [**\MySdk\Model\ClockEntryApiTransformer**](ClockEntryApiTransformer.md) | Last clock entry | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
