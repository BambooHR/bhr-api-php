# # HolidayUpdateCompanyHolidayRequestV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the holiday. 1-255 characters. | [optional]
**start_date** | **\DateTime** | The start date of the holiday. | [optional]
**end_date** | **\DateTime** |  | [optional]
**is_public** | **bool** | Whether the holiday is visible to all employees on calendars, independent of audience. | [optional]
**country_codes** | **string[]** | Country filter as ISO 3166-1 alpha-2 codes. Replaces the stored country filter wholesale; an empty array removes the filter. | [optional]
**audience** | [**\BhrSdk\Model\HolidayCompanyHolidayAudienceV1**](HolidayCompanyHolidayAudienceV1.md) | Who the holiday applies to. Replaces the stored audience block wholesale; sub-rows that no longer apply to the new mode are cleared. | [optional]
**holiday_pay** | **object** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
