# # B86bb5db603786dfc98c8f6a7bb1a218Request

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**project_id** | **int** | id of the time tracking project that should be associated with the timesheet entry. Required if taskId is specified. | [optional]
**task_id** | **int** | id of the time tracking task that should be associated with the timesheet entry. | [optional]
**note** | **string** | The note that should be associated with the timesheet entry | [optional]
**date** | **\DateTime** | Date for the timesheet entry. Must be in YYYY-MM-DD format. | [optional]
**start** | **string** | The time for the clock in. In 24 hour format HH:MM | [optional]
**timezone** | **string** | The timezone associated with the clock in. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
