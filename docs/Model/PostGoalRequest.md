# # PostGoalRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | The title of the goal |
**description** | **string** | A detailed description of the goal | [optional]
**due_date** | **\DateTime** | The due date for the goal in YYYY-MM-DD format |
**percent_complete** | **int** | The percentage of completion for the goal (0-100) |
**completion_date** | **\DateTime** | The date when the goal was completed in YYYY-MM-DD format. Required when percentComplete is 100. | [optional]
**shared_with_employee_ids** | **int[]** | List of employee IDs with whom the goal is shared. Must include the employee ID of the goal owner. |
**aligns_with_option_id** | **int** | ID of the option this goal aligns with | [optional]
**milestones** | [**\MySdk\Model\PostGoalRequestMilestonesInner[]**](PostGoalRequestMilestonesInner.md) | List of milestones for this goal | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
