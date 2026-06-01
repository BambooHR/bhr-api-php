# # CreateEmployeeTrainingRecordRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**completed** | **string** | Completed is a required field and must be in yyyy-mm-dd format. |
**cost** | [**\BhrSdk\Model\CreateEmployeeTrainingRecordRequestCost**](CreateEmployeeTrainingRecordRequestCost.md) |  | [optional]
**instructor** | **string** | Name of the training instructor. | [optional]
**hours** | **float** | Number of hours for the training. | [optional]
**credits** | **float** | Credits earned for the training. | [optional]
**notes** | **string** | Optional notes about the training record. | [optional]
**type** | **int** | This must be an existing training type ID. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
