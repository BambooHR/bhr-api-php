# # UpdateTrainingTypeRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the training type. |
**frequency** | **int** | The frequency is the (optional) amount of months between renewing trainings. Not valid if training are not renewable. | [optional]
**renewable** | **bool** | Renewable is optional but if you are setting it to true you must pass a frequency. | [optional]
**category** | [**\MySdk\Model\UpdateTrainingTypeRequestCategory**](UpdateTrainingTypeRequestCategory.md) |  | [optional]
**required** | **bool** | Is this a required training? |
**due_from_hire_date** | **int** | Number of days before the training is due for new hires. Not valid unless training is required. | [optional]
**link_url** | **string** | Optional URL that can be included with a training. | [optional]
**description** | **string** | Description for the training. | [optional]
**allow_employees_to_mark_complete** | **bool** | Allows all employees who can view the training to be able to mark it complete. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
