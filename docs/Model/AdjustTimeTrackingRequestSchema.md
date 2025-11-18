# # AdjustTimeTrackingRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time_tracking_id** | **string** | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). |
**hours_worked** | **float** | The updated number of hours worked. e.g. if Employee A worked 8.0 hours originally and decided they only worked 6.0, please send 6.0 here not -2.0. |
**project_id** | **int** | ID of the project associated with this time tracking record | [optional]
**task_id** | **int** | ID of the task associated with this time tracking record | [optional]
**shift_differential_id** | **int** | ID of the shift differential associated with this time tracking record | [optional]
**holiday_id** | **int** | ID of the holiday associated with this time tracking record | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
