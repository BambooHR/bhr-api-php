# # PayrollPaySchedulesV1PaySchedule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Pay schedule identifier. | [optional]
**name** | **string** | User-provided name of the pay schedule. | [optional]
**frequency** | **string** | Pay frequency for this schedule. One of: daily, weekly, bi-weekly, semi-monthly, monthly, quarterly, semi-annually, annually. | [optional]
**modifier** | **string** | Format depends on frequency. weekly: &#39;0&#39;..&#39;6&#39; (0&#x3D;Sunday). bi-weekly: &#39;YYYY-MM-DD&#39; anchor date. semi-monthly: &#39;D1 D2&#39; days of month (1-31). monthly: &#39;D&#39; day of month (1-31). quarterly: &#39;M1/D1 M2/D2 M3/D3 M4/D4&#39;. semi-annually: &#39;M1/D1 M2/D2&#39;. annually: &#39;M/D&#39;. daily: null. | [optional]
**weekend_and_holiday** | **string** | How pay dates are adjusted for weekends and holidays. | [optional]
**pay_date_days** | **int** | Number of days between the end of the pay period and the pay date. | [optional]
**first_pay_period_date** | **\DateTime** | The first pay period date for this schedule (YYYY-MM-DD). | [optional]
**hours_per_week** | **float** | Hours worked per week for the schedule, if applicable. | [optional]
**edit_protected** | **bool** | Whether the schedule is protected from edits. | [optional]
**immutable** | **bool** | Whether the schedule is immutable. | [optional]
**next_pay_period_end_date** | **\DateTime** | The end date of the next pay period for this schedule (YYYY-MM-DD). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
