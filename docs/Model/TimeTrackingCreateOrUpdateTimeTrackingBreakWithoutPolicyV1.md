# # TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique identifier of the break. If not included, a new break will be created. | [optional]
**name** | **string** | The name of the break | [optional]
**paid** | **bool** | Whether the break is paid | [optional]
**duration** | **int** | Duration of the break in minutes | [optional]
**availability_type** | **string** | When the break is available to be taken | [optional]
**availability_min_hours_worked** | **float** | Minimum hours that must be worked before the break can be taken | [optional]
**availability_max_hours_worked** | **float** | Maximum hours that can be worked before the break must be taken | [optional]
**availability_start_time** | **string** | Earliest time the break can be taken (HH:MM format) | [optional]
**availability_end_time** | **string** | Latest time the break can be taken (HH:MM format) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
