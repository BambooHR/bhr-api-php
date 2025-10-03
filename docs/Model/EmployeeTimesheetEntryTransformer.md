# # EmployeeTimesheetEntryTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Timesheet entry ID | [optional]
**employee_id** | **int** | Employee ID | [optional]
**type** | **string** | Entry type | [optional]
**date** | **\DateTime** | Date of the timesheet | [optional]
**start** | **\DateTime** | Start time | [optional]
**end** | **\DateTime** | End time | [optional]
**timezone** | **string** | Timezone | [optional]
**hours** | **float** | Hours worked | [optional]
**note** | **string** | Note | [optional]
**project_info** | [**\BhrSdk\Model\ProjectInfoApiTransformer**](ProjectInfoApiTransformer.md) |  | [optional]
**approved_at** | **\DateTime** | Approved time | [optional]
**approved** | **bool** | Whether the timesheet entry is approved | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
