# # ClockEntryApiTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Clock entry ID | [optional]
**start** | **\DateTime** | Clock in time | [optional]
**end** | **\DateTime** | Clock out time | [optional]
**timezone** | **string** | Employee timezone | [optional]
**hours** | **float** | Hours worked | [optional]
**note** | **string** | Note | [optional]
**project_info** | [**\MySdk\Model\ClockEntryApiTransformerProjectInfo**](ClockEntryApiTransformerProjectInfo.md) |  | [optional]
**is_location_set** | **bool** | Whether location data is set | [optional]
**clock_in_location** | [**\MySdk\Model\ClockEntryApiTransformerClockInLocation**](ClockEntryApiTransformerClockInLocation.md) |  | [optional]
**clock_out_location** | [**\MySdk\Model\ClockEntryApiTransformerClockOutLocation**](ClockEntryApiTransformerClockOutLocation.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
