# # DailyDetailApiTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Daily detail ID | [optional]
**date** | **\DateTime** | Date of the timesheet | [optional]
**hours** | **float** | Hours worked | [optional]
**total_hours** | **float** | Total hours worked | [optional]
**clock_entries** | [**\MySdk\Model\ClockEntryApiTransformer[]**](ClockEntryApiTransformer.md) | Clock entries | [optional]
**hour_entries** | [**\MySdk\Model\HourEntryApiTransformer[]**](HourEntryApiTransformer.md) | Hour entries | [optional]
**time_off** | [**\MySdk\Model\DailyDetailApiTransformerTimeOffInner[]**](DailyDetailApiTransformerTimeOffInner.md) | Time off data | [optional]
**holidays** | [**\MySdk\Model\DailyDetailApiTransformerHolidaysInner[]**](DailyDetailApiTransformerHolidaysInner.md) | Holidays for the day | [optional]
**has_work_week_starts_on_changed** | **bool** | Whether the work week starts on has changed | [optional]
**overtime_hours** | **float** | Overtime hours | [optional]
**overtime_summary** | [**\MySdk\Model\DailyDetailApiTransformerOvertimeSummary**](DailyDetailApiTransformerOvertimeSummary.md) |  | [optional]
**hour_summary** | [**\MySdk\Model\BasicTimesheetApiTransformerHourSummaryInner[]**](BasicTimesheetApiTransformerHourSummaryInner.md) | Hour summary | [optional]
**shift_differentials** | [**\MySdk\Model\BasicTimesheetApiTransformerShiftDifferentialsInner[]**](BasicTimesheetApiTransformerShiftDifferentialsInner.md) | Shift differentials | [optional]
**time_off_hours** | **float** | Time off hours | [optional]
**holiday_hours** | **float** | Holiday hours | [optional]
**note** | **string** | Note | [optional]
**project_info** | [**\MySdk\Model\ProjectInfoApiTransformer**](ProjectInfoApiTransformer.md) |  | [optional]
**history_event_count** | **int** | History event count | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
