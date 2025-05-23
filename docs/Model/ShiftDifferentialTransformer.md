# # ShiftDifferentialTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier of the shift differential | [optional]
**name** | **string** | Name of the shift differential | [optional]
**schedule** | **string** | Schedule type of the shift differential | [optional]
**rate** | **float** | Rate value of the shift differential | [optional]
**rate_type** | **string** | Type of rate (fixed or percentage) | [optional]
**allow_all_employees** | **bool** | Whether this shift differential applies to all employees | [optional]
**days** | **string[]** | Days of the week when this shift differential applies | [optional]
**start** | **string** | Start time of the shift differential in 12-hour format | [optional]
**start_meridiem** | **string** | AM/PM indicator for the start time | [optional]
**end** | **string** | End time of the shift differential in 12-hour format | [optional]
**end_meridiem** | **string** | AM/PM indicator for the end time | [optional]
**created_ymdt** | **\DateTime** | ISO 8601 formatted timestamp when the shift differential was created | [optional]
**updated_ymdt** | **\DateTime** | ISO 8601 formatted timestamp when the shift differential was last updated | [optional]
**archived_ymdt** | **\DateTime** | ISO 8601 formatted timestamp when the shift differential was archived | [optional]
**deleted_ymdt** | **\DateTime** | ISO 8601 formatted timestamp when the shift differential was deleted | [optional]
**created_by** | **int** | ID of the user who created the shift differential | [optional]
**updated_by** | **int** | ID of the user who last updated the shift differential | [optional]
**archived_by** | **int** | ID of the user who archived the shift differential | [optional]
**deleted_by** | **int** | ID of the user who deleted the shift differential | [optional]
**employee_count** | **int** | Number of employees assigned to this shift differential | [optional]
**employees** | [**\MySdk\Model\ShiftDifferentialTransformerEmployeesInner[]**](ShiftDifferentialTransformerEmployeesInner.md) | List of employees assigned to this shift differential | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
