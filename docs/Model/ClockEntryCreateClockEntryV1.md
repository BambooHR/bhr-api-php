# # ClockEntryCreateClockEntryV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | The employee the clock entry belongs to. |
**start** | **\DateTime** | Clock-in timestamp (ISO 8601). |
**end** | **\DateTime** | Clock-out timestamp (ISO 8601). Must be after start. |
**timezone** | **string** | IANA timezone identifier the times are recorded under. |
**note** | **string** |  | [optional]
**project_id** | **int** |  | [optional]
**task_id** | **int** |  | [optional]
**clock_in_location** | [**\BhrSdk\Model\ClockEntryClockEntryLocationInputV1**](ClockEntryClockEntryLocationInputV1.md) | Geolocation captured at clock-in. | [optional]
**clock_out_location** | [**\BhrSdk\Model\ClockEntryClockEntryLocationInputV1**](ClockEntryClockEntryLocationInputV1.md) | Geolocation captured at clock-out. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
