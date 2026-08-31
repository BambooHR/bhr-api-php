# # CalendarBirthdayCalendarEventV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Deterministic synthetic id in the form birthday-{employeeId}-{year}, where year is the year of this occurrence. |
**type** | **string** | Event type discriminator. |
**start** | **\DateTime** | The day of the birthday occurrence (YYYY-MM-DD). |
**end** | **\DateTime** | Same as start; birthday events are single-day. |
**employee_id** | **int** | The employee whose birthday it is. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
