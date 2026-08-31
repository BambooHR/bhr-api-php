# # TimeTrackingTimesheetV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Identifier for the timesheet. | [optional]
**employee_id** | **int** | The employee this timesheet belongs to. | [optional]
**type** | **string** | Tracking method snapshotted from the configuration at period start. | [optional]
**start_date** | **\DateTime** | First date of the pay period (inclusive). | [optional]
**end_date** | **\DateTime** | Last date of the pay period (inclusive). | [optional]
**status** | **string** | Derived approval state. | [optional]
**total_hours** | **float** | Sum of all hours across regular, overtime, holiday, and approved PTO. | [optional]
**overtime_hours** | **float** | Subset of totalHours that falls into the overtime rate bucket. | [optional]
**approved_by** | **int** |  | [optional]
**approved_at** | **\DateTime** |  | [optional]
**created_at** | **\DateTime** | When the timesheet record was created. | [optional]
**updated_at** | **\DateTime** | When the timesheet was last modified. | [optional]
**hours_last_changed_at** | **\DateTime** | When the timesheet&#39;s hours were last changed. Send this value back as the approval request&#39;s &#x60;lastChangedAt&#x60;. Distinct from &#x60;updatedAt&#x60; because hours are stored separately from the timesheet row. | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
