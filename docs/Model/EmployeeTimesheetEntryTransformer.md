# # EmployeeTimesheetEntryTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Timesheet entry ID | [optional]
**employee_id** | **int** | Employee ID | [optional]
**type** | **string** | Entry type | [optional]
**date** | **\DateTime** | Date of the timesheet | [optional]
**start** | **\DateTime** |  | [optional]
**end** | **\DateTime** |  | [optional]
**timezone** | **string** |  | [optional]
**hours** | **float** |  | [optional]
**note** | **string** |  | [optional]
**project_info** | [**\BhrSdk\Model\ProjectInfoApiTransformer**](ProjectInfoApiTransformer.md) |  | [optional]
**approved_at** | **\DateTime** |  | [optional]
**approved** | **bool** | Whether the timesheet entry is approved | [optional]
**created_at** | **\DateTime** | Created time | [optional]
**updated_at** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
