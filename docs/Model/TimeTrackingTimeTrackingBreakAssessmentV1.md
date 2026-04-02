# # TimeTrackingTimeTrackingBreakAssessmentV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique identifier for the time tracking break assessment | [optional] [readonly]
**break_id** | **string** | The unique identifier of the break | [optional] [readonly]
**employee_id** | **float** | The id of the employee | [optional]
**employee_timesheet_id** | **float** | The id of the employee timesheet | [optional]
**date** | **\DateTime** | The date of the break assessment | [optional]
**timezone** | **string** | The timezone of the break assessment | [optional]
**result** | **string** | The result of the break assessment | [optional]
**available_ymdt** | **\DateTime** | ISO 8601 timestamp when the break became available | [optional] [readonly]
**unavailable_ymdt** | **\DateTime** | ISO 8601 timestamp when the break became unavailable | [optional] [readonly]
**created_at** | **\DateTime** | ISO 8601 timestamp when the break was created | [optional] [readonly]
**updated_at** | **\DateTime** | ISO 8601 timestamp when the break was last updated | [optional] [readonly]
**violations** | [**\BhrSdk\Model\TimeTrackingTimeTrackingBreakAssessmentViolationV1[]**](TimeTrackingTimeTrackingBreakAssessmentViolationV1.md) | Violations associated with the assessment | [optional]
**clock_entry_ids** | **int[]** | Clock entry ids associated with the time tracking break assessment | [optional]
**expected_duration** | **int** | The expected duration of the break in minutes | [optional]
**recorded_duration** | **int** | The recorded duration of the break in minutes | [optional]
**duration_difference** | **int** | The difference between the expected and recorded duration in minutes | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
