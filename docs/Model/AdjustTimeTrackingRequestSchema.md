# # AdjustTimeTrackingRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time_tracking_id** | **string** | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). |
**hours_worked** | **float** | The updated number of hours worked. e.g. if Employee A worked 8.0 hours originally and decided they only worked 6.0, please send 6.0 here not -2.0. |
**project_id** | **int** |  | [optional]
**task_id** | **int** |  | [optional]
**shift_differential_id** | **int** |  | [optional]
**holiday_id** | **int** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
