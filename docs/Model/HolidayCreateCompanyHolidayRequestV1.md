# # HolidayCreateCompanyHolidayRequestV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**global_holiday_uuid** | **string** |  | [optional]
**name** | **string** |  | [optional]
**start_date** | **\DateTime** |  | [optional]
**end_date** | **\DateTime** |  | [optional]
**is_public** | **bool** | Whether the holiday is visible to all employees on calendars, independent of audience. Defaults to true. | [optional] [default to true]
**country_codes** | **string[]** |  | [optional]
**audience** | [**\BhrSdk\Model\HolidayCompanyHolidayAudienceV1**](HolidayCompanyHolidayAudienceV1.md) | Who the holiday applies to |
**holiday_pay** | **object** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
