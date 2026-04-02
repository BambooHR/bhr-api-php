# # TimeTrackingTimeTrackingBreakAvailabilityV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique identifier for the time tracking break | [optional] [readonly]
**name** | **string** | The name of the break | [optional] [readonly]
**policy_id** | **string** | The unique identifier of the break policy this break belongs to | [optional] [readonly]
**paid** | **bool** | Whether the break is paid | [optional] [readonly]
**duration** | **int** | Duration of the break in minutes | [optional] [readonly]
**availability_type** | **string** | When the break is available to be taken | [optional] [readonly]
**calculated_at** | **\DateTime** | When the break availability was calculated | [optional] [readonly]
**effective_at** | **\DateTime** | Timestamp that all time-based calculations are evaluated relative to. | [optional] [readonly]
**timezone** | **string** | The timezone the break availability is calculated in | [optional] [readonly]
**recorded_duration** | **int** | The duration of the break that has been recorded so far | [optional] [readonly]
**available** | **bool** | Whether the break is currently available to be taken | [optional] [readonly]
**available_after_minutes_worked** | **int** | Minutes of work after which the break becomes available | [optional] [readonly]
**available_in** | **int** | Minutes until the break becomes available | [optional] [readonly]
**unavailable_in** | **int** | Minutes until the break becomes unavailable | [optional] [readonly]
**available_at** | **\DateTime** | When the break is or becomes available | [optional] [readonly]
**unavailable_at** | **\DateTime** | When the break is or becomes unavailable | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
