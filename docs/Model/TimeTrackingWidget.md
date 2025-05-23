# # TimeTrackingWidget

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**on** | **bool** | Whether the widget is enabled for the user. | [optional]
**employee_id** | **int** | Employee ID for the timesheet owner. | [optional]
**today** | **\DateTime** | Current date/time for the employee. | [optional]
**daily_total** | **float** | Total hours worked today. | [optional]
**weekly_total** | **float** | Total hours worked this week. | [optional]
**weekly_overtime** | **bool** | Whether weekly overtime has been reached. | [optional]
**pay_period_total** | **float** | Total hours worked in the pay period. | [optional]
**pay_period_overtime** | **bool** | Whether pay period overtime has been reached. | [optional]
**type** | **string** | Type of timesheet. | [optional]
**show_time_entry_hint** | **bool** | Show time entry hint popover. | [optional]
**last_clock_entry** | **object** | Last clock entry for the employee. | [optional]
**clock_entries** | **object[]** | Array of clock entries for today. | [optional]
**hour_entries** | **object[]** | Array of hour entries for today. | [optional]
**can_edit** | **bool** | Whether the user can edit the timesheet. | [optional]
**show_edit_actions** | **bool** | Whether edit actions should be shown. | [optional]
**approved** | **bool** | Whether the timesheet is approved. | [optional]
**holidays** | **string[]** | List of holidays for today. | [optional]
**holiday_pay_type** | **string** | Pay type for holidays. | [optional]
**projects_with_tasks** | **object[]** | All projects and tasks for the employee. | [optional]
**recent_projects_and_tasks** | **object[]** | Recent projects and tasks for the employee. | [optional]
**note** | **string** | Today&#39;s note for the timesheet. | [optional]
**id** | **int** | Timesheet ID. | [optional]
**project_id** | **int** | Project ID for today. | [optional]
**project_name** | **string** | Project name for today. | [optional]
**task_id** | **int** | Task ID for today. | [optional]
**task_name** | **string** | Task name for today. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
