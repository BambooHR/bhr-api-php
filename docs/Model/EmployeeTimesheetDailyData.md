# # EmployeeTimesheetDailyData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | Class EmployeeTimesheetDailyData | [optional]
**date** | **string** |  | [optional]
**daily_entry** | [**\MySdk\Model\EmployeeDailyEntry**](EmployeeDailyEntry.md) |  | [optional]
**daily_hours** | [**\MySdk\Model\EmployeeTimesheetDailyHourCollection**](EmployeeTimesheetDailyHourCollection.md) |  | [optional]
**daily_entry_id** | **int** |  | [optional]
**total_hours** | **float** |  | [optional]
**regular_hours** | **float** |  | [optional]
**has_work_week_starts_on_changed** | **bool** |  | [optional]
**overtime_hours** | **float** |  | [optional]
**overtime_summary** | [**\MySdk\Model\OvertimeSummaryInner[]**](OvertimeSummaryInner.md) |  | [optional]
**paid_holiday_hours** | **float** |  | [optional]
**holiday_hours** | **float** |  | [optional]
**worked_hours** | **float** |  | [optional]
**first_clock_entry** | [**\MySdk\Model\EmployeeClockEntry**](EmployeeClockEntry.md) |  | [optional]
**last_clock_entry** | [**\MySdk\Model\EmployeeClockEntry**](EmployeeClockEntry.md) |  | [optional]
**clock_entries** | **object[]** |  | [optional]
**hour_entries** | [**\MySdk\Model\EmployeeHourEntry[]**](EmployeeHourEntry.md) | Class EmployeeHourEntryCollection | [optional]
**time_off** | [**\MySdk\Model\TimeOffDetailsDataObject[]**](TimeOffDetailsDataObject.md) |  | [optional]
**hours_in_day** | **float** |  | [optional]
**vacation_hours** | **float** |  | [optional]
**history_event_count** | **int** |  | [optional]
**shift_differentials_summary** | **object[]** |  | [optional]
**hour_summary** | [**\MySdk\Model\EmployeeHourSummaryDataObject[]**](EmployeeHourSummaryDataObject.md) | Class EmployeeHourSummaryCollection | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
