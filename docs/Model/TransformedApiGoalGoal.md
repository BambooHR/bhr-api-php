# # TransformedApiGoalGoal

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The id of the goal. | [optional]
**title** | **string** | Title of the goal. | [optional]
**description** | **string** | A description of the goal. | [optional]
**percent_complete** | **int** | A percentage (0-100) that denotes how complete the goal is. | [optional]
**aligns_with_option_id** | **int** |  | [optional]
**shared_with_employee_ids** | **int[]** | Ids of the employees that have access to this goal. | [optional]
**due_date** | **string** | The due date of the goal. | [optional]
**completion_date** | **string** | The date the goal was completed. | [optional]
**status** | **string** | The status of the goal. | [optional]
**milestones** | [**\MySdk\Model\TransformedApiGoalGoalMilestonesInner[]**](TransformedApiGoalGoalMilestonesInner.md) | All milestones for the individual goal. This array will not exist if milestones are not selected for this goal. | [optional]
**actions** | [**\MySdk\Model\TransformedApiGoalGoalActions**](TransformedApiGoalGoalActions.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
