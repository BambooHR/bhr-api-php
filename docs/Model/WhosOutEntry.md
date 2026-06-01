# # WhosOutEntry

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The time off request ID or holiday ID. | [optional]
**type** | **string** | Whether this entry is a time off request or a company holiday. Entries have two shapes depending on &#x60;type&#x60;: &#x60;timeOff&#x60; entries include &#x60;employeeId&#x60; and &#x60;name&#x60; (the employee&#39;s name); &#x60;holiday&#x60; entries include only &#x60;name&#x60; (the holiday name) and omit &#x60;employeeId&#x60;. Always check &#x60;type&#x60; before accessing &#x60;employeeId&#x60;. | [optional]
**employee_id** | **int** | The employee ID. Only present for &#x60;timeOff&#x60; entries; omitted for &#x60;holiday&#x60; entries. | [optional]
**name** | **string** | For &#x60;timeOff&#x60; entries, the employee&#39;s name. For &#x60;holiday&#x60; entries, the holiday&#39;s name. | [optional]
**start** | **\DateTime** | Start date in YYYY-MM-DD format. | [optional]
**end** | **\DateTime** | End date in YYYY-MM-DD format. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
