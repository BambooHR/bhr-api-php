# # TrainingType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the training | [optional]
**name** | **string** | Name of the training type. | [optional]
**renewable** | **bool** | If true, training will be renewed based off of frequency. | [optional]
**frequency** | **int** | The frequency is the (optional) amount of months between renewing trainings. Not valid if training are not renewable. | [optional]
**due_from_hire_date** | **int** | Number of days before the training is due for new hires. Not valid if training is not required. | [optional]
**required** | **int** | Is this a required training? | [optional]
**category** | [**\MySdk\Model\TrainingCategory**](TrainingCategory.md) |  | [optional]
**link_url** | **string** | Optional URL that can be included with a training. | [optional]
**description** | **string** | Description for the training. | [optional]
**allow_employees_to_mark_complete** | **bool** | Allows all employees who can view the training to be able to mark it complete. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
