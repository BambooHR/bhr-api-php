# # TimesheetTimesheetDailyEntryV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**date** | **\DateTime** | The calendar date being rolled up. |
**total_hours** | **float** | Sum of all hours on this day across rate buckets. |
**regular_hours** | **float** | Hours in the regular (REG) rate bucket. |
**overtime_hours** | **float** | Hours in the overtime (OT) rate bucket. |
**double_time_hours** | **float** | Hours in the double-time rate bucket. Always 0.0 when the configuration defines no double-time. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
