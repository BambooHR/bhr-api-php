# # ProjectCreateRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the project. Must be unique and no more than 50 characters. |
**billable** | **bool** | Indicates if the project is billable. Defaults to true if not provided. | [optional] [default to true]
**include_in_payroll** | **bool** | Indicates if project time is included in payroll. Defaults to false if not provided. | [optional] [default to false]
**allow_all_employees** | **bool** | Indicates if all employees can log time for this project. Defaults to true if not provided. | [optional] [default to true]
**employee_ids** | **int[]** | A list of internal employee IDs that can log time for this project. Only used when &#x60;allowAllEmployees&#x60; is false. | [optional]
**has_tasks** | **bool** | Indicates if the project has tasks. Defaults to false if not provided. | [optional] [default to false]
**tasks** | [**\BhrSdk\Model\TaskCreateSchema[]**](TaskCreateSchema.md) | List of tasks to create and associate with the project. Required and must contain at least one task when &#x60;hasTasks&#x60; is true. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
