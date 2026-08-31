# # CalendarCalendarEventsListResponseV1DataInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Deterministic synthetic id in the form anniversary-{employeeId}-{year}, where year is the year of this occurrence. |
**type** | **string** | Event type discriminator. |
**start** | **\DateTime** | The day of the anniversary occurrence (YYYY-MM-DD). |
**end** | **\DateTime** | Same as start; anniversary events are single-day. |
**employee_id** | **int** | The employee whose anniversary it is. |
**time_off_type_id** | **int** |  |
**name** | **string** | The holiday name. |
**years** | **int** | The number of years being celebrated. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
