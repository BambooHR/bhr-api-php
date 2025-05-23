# # EmployeeGoalJsonViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of the employee goal | [optional]
**title** | **string** | The title of the employee goal | [optional]
**description** | **string** | The description in the employee goal | [optional]
**percent_complete** | **int** | The percentage completion of the employee goal | [optional]
**status** | **string** | The current status of the employee goal | [optional]
**alignable_goals** | **object** | The goals this employee goal can be aligned with | [optional]
**aligns_with** | **int** | The ID of the parent goal this goal aligns with | [optional]
**alignment** | **object** | The actual parent goal&#39;s object | [optional]
**shared_with** | [**\MySdk\Model\GoalSharedEmployeeViewObject[]**](GoalSharedEmployeeViewObject.md) | The list of entities with whom the goal is shared | [optional]
**due_date** | **string** | The due date of the employee goal | [optional]
**past_due** | **bool** | Indicates if the goal is past its due date | [optional]
**created_date_time** | **string** | The date and time when the goal was created | [optional]
**completion_date** | **string** | The date and time when the goal was completed | [optional]
**closed_date** | **string** | The date and time when the goal was closed | [optional]
**comments** | **object** | The list of comments associated with the goal | [optional]
**milestones** | **object[]** | The list of milestones associated with the goal | [optional]
**files** | **object[]** | The list of files associated with the goal | [optional]
**cascading_data** | **object** | The cascading goal data associated with the goal | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
