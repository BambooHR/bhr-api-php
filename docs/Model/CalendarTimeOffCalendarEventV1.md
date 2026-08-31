# # CalendarTimeOffCalendarEventV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The time off request id. |
**type** | **string** | Event type discriminator. |
**start** | **\DateTime** | Inclusive first day of the time off (YYYY-MM-DD). |
**end** | **\DateTime** | Inclusive last day of the time off (YYYY-MM-DD). Same as start for single-day requests. |
**employee_id** | **int** | The employee taking time off. |
**time_off_type_id** | **int** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
