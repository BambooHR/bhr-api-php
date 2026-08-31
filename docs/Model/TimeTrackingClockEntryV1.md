# # TimeTrackingClockEntryV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Identifier for the clock entry. | [optional]
**employee_id** | **int** | The employee who owns the entry. | [optional]
**timesheet_id** | **int** | The timesheet (pay period) this entry rolls up to. | [optional]
**date** | **\DateTime** | Calendar date the entry is attributed to (in the entry&#39;s timezone). | [optional]
**start** | **\DateTime** | Clock-in timestamp, ISO 8601 with the offset of the entry&#39;s timezone. | [optional]
**end** | **\DateTime** |  | [optional]
**timezone** | **string** | IANA timezone name under which start / end were recorded. | [optional]
**hours** | **float** | Computed elapsed hours between start and end. Zero while the entry is open. | [optional]
**note** | **string** |  | [optional]
**project_id** | **int** |  | [optional]
**task_id** | **int** |  | [optional]
**clock_in_location** | [**\BhrSdk\Model\TimeTrackingClockEntryLocationV1**](TimeTrackingClockEntryLocationV1.md) | Geolocation captured at clock-in. Null when geolocation is disabled or none was captured. | [optional]
**clock_out_location** | [**\BhrSdk\Model\TimeTrackingClockEntryLocationV1**](TimeTrackingClockEntryLocationV1.md) | Geolocation captured at clock-out. Null while the entry is open or when geolocation is disabled. | [optional]
**scheduling_shift_id** | **string** |  | [optional]
**start_source** | **string** |  | [optional]
**end_source** | **string** |  | [optional]
**clocked_in_by** | **int** |  | [optional]
**clocked_out_by** | **int** |  | [optional]
**created_at** | **\DateTime** | When the entry was created. | [optional]
**updated_at** | **\DateTime** | When the entry was last modified. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
