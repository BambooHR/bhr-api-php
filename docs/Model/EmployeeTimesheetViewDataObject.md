# # EmployeeTimesheetViewDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | Class EmployeeTimesheetViewDataObject | [optional]
**today** | **\DateTime** |  | [optional]
**previous_timesheet** | [**\MySdk\Model\DailyTimesheet**](DailyTimesheet.md) |  | [optional]
**timesheet** | [**\MySdk\Model\DailyTimesheet**](DailyTimesheet.md) |  | [optional]
**next_timesheet** | [**\MySdk\Model\DailyTimesheet**](DailyTimesheet.md) |  | [optional]
**this_week_days** | [**\MySdk\Model\EmployeeTimesheetDailyDataCollection**](EmployeeTimesheetDailyDataCollection.md) |  | [optional]
**last_week_days** | [**\MySdk\Model\EmployeeTimesheetDailyDataCollection**](EmployeeTimesheetDailyDataCollection.md) |  | [optional]
**timesheet_options** | [**\MySdk\Model\TimesheetOptionsDataObject**](TimesheetOptionsDataObject.md) |  | [optional]
**can_view_employee_timesheet** | **bool** |  | [optional]
**employee_preferred_full_name** | **string** |  | [optional]
**employee_photo_url** | **string** |  | [optional]
**employee_timesheets** | [**\MySdk\Model\EmployeeTimesheetCollection[]**](EmployeeTimesheetCollection.md) |  | [optional]
**current_timesheet_id** | **int** |  | [optional]
**previous_timesheet_id** | **int** |  | [optional]
**last_clock_entry** | [**\MySdk\Model\EmployeeClockEntry**](EmployeeClockEntry.md) |  | [optional]
**weekly_total** | **float** |  | [optional]
**all_projects_and_tasks** | [**\MySdk\Model\TimeTrackingProjectWithTaskCollection**](TimeTrackingProjectWithTaskCollection.md) |  | [optional]
**recent_projects_and_tasks** | [**\MySdk\Model\TimeTrackingProjectWithTaskCollection**](TimeTrackingProjectWithTaskCollection.md) |  | [optional]
**allow_clock_actions** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
