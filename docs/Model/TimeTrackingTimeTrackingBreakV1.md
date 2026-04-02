# # TimeTrackingTimeTrackingBreakV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique identifier for the time tracking break | [optional] [readonly]
**name** | **string** | The name of the break | [optional]
**policy_id** | **string** | The unique identifier of the break policy this break belongs to | [optional]
**paid** | **bool** | Whether the break is paid | [optional]
**duration** | **int** | Duration of the break in minutes | [optional]
**availability_type** | **string** | When the break is available to be taken | [optional]
**availability_min_hours_worked** | **float** | Minimum hours that must be worked before the break can be taken | [optional]
**availability_max_hours_worked** | **float** | Maximum hours that can be worked before the break must be taken | [optional]
**availability_start_time** | **string** | Earliest time the break can be taken (HH:MM format) | [optional]
**availability_end_time** | **string** | Latest time the break can be taken (HH:MM format) | [optional]
**created_at** | **\DateTime** | ISO 8601 timestamp when the break was created | [optional] [readonly]
**updated_at** | **\DateTime** | ISO 8601 timestamp when the break was last updated | [optional] [readonly]
**deleted_at** | **\DateTime** | ISO 8601 timestamp when the break was deleted | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
