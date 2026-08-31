# # TimeTrackingHourEntryV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Identifier for the hour entry. | [optional]
**employee_id** | **int** | The employee who owns the entry. | [optional]
**timesheet_id** | **int** | The timesheet (pay period) this entry rolls up to. | [optional]
**date** | **\DateTime** | Calendar date the hours are attributed to. | [optional]
**hours** | **float** | Hours worked on this date for the given project/task. | [optional]
**note** | **string** |  | [optional]
**project_id** | **int** |  | [optional]
**task_id** | **int** |  | [optional]
**created_at** | **\DateTime** | When the entry was created. | [optional]
**updated_at** | **\DateTime** | When the entry was last modified. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
