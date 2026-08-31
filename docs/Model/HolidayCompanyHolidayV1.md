# # HolidayCompanyHolidayV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the holiday | [optional] [readonly]
**name** | **string** | The name of the holiday | [optional]
**start_date** | **\DateTime** | The start date of the holiday | [optional]
**end_date** | **\DateTime** |  | [optional]
**is_public** | **bool** | Whether the holiday is visible to all employees on calendars, independent of audience | [optional]
**country_codes** | **string[]** | Country filter as ISO 3166-1 alpha-2 codes. Empty means no country filter. | [optional]
**audience** | [**\BhrSdk\Model\HolidayCompanyHolidayAudienceV1**](HolidayCompanyHolidayAudienceV1.md) | Who the holiday applies to | [optional]
**holiday_pay** | **object** |  | [optional]
**global_holiday_uuid** | **string** |  | [optional] [readonly]
**created_at** | **\DateTime** | ISO 8601 timestamp when the holiday was created | [optional] [readonly]
**updated_at** | **\DateTime** | ISO 8601 timestamp when the holiday was last updated | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
