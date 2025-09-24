# # TimesheetSummaryApiTransformer

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
**current_employee_timezone** | **string** | Current employee timezone | [optional]
**week_start_date** | **\DateTime** | Start date of the work week | [optional]
**week_end_date** | **\DateTime** | End date of the work week | [optional]
**hours_worked_today** | **float** | Hours worked today | [optional]
**hours_worked_this_week** | **float** | Hours worked this week | [optional]
**hours_worked_this_period** | **float** | Hours worked this period | [optional]
**holidays_today** | [**\MySdk\Model\DailyDetailApiTransformerHolidaysInner[]**](DailyDetailApiTransformerHolidaysInner.md) | Holidays today | [optional]
**today** | [**\MySdk\Model\TimesheetSummaryApiTransformerAllOfToday**](TimesheetSummaryApiTransformerAllOfToday.md) |  | [optional]
**note_today** | **string** | Note today | [optional]
**can_use_projects** | **bool** | Whether projects can be used | [optional]
**project_info_today** | [**\MySdk\Model\ProjectInfoApiTransformer**](ProjectInfoApiTransformer.md) |  | [optional]
**geolocation_required** | **bool** | Whether geolocation is required | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
