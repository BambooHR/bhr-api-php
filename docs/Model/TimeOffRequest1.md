# # TimeOffRequest1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The time off request ID. | [optional]
**employee_id** | **int** | The ID of the employee. | [optional]
**name** | **string** | The employee&#39;s full name. | [optional]
**start** | **\DateTime** | The start date of the request in YYYY-MM-DD format. | [optional]
**end** | **\DateTime** | The end date of the request in YYYY-MM-DD format. | [optional]
**created** | **\DateTime** | The date the request was created in YYYY-MM-DD format (company timezone). | [optional]
**status** | [**\BhrSdk\Model\TimeOffRequest1Status**](TimeOffRequest1Status.md) |  | [optional]
**type** | [**\BhrSdk\Model\TimeOffRequest1Type**](TimeOffRequest1Type.md) |  | [optional]
**amount** | [**\BhrSdk\Model\TimeOffRequest1Amount**](TimeOffRequest1Amount.md) |  | [optional]
**actions** | [**\BhrSdk\Model\TimeOffRequest1Actions**](TimeOffRequest1Actions.md) |  | [optional]
**dates** | **array<string,float>** | A map of dates (YYYY-MM-DD) to daily amounts. | [optional]
**notes** | [**\BhrSdk\Model\TimeOffRequest1Notes**](TimeOffRequest1Notes.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
