# # PayGradesAndBandsJobTitleWithEmployees

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Job title identifier. | [optional]
**title** | **string** | Job title name. | [optional]
**employees** | [**\BhrSdk\Model\PayGradesAndBandsJobTitleEmployee[]**](PayGradesAndBandsJobTitleEmployee.md) | Employees currently holding this job title. May be empty either because no one holds the title or because the authenticated caller lacks permission to view a required field (name, job title, or id) for the employees who do. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
