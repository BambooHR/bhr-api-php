# # CreateGoalRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | The title of the goal |
**description** | **string** | A detailed description of the goal | [optional]
**due_date** | **\DateTime** | The due date for the goal in YYYY-MM-DD format |
**percent_complete** | **int** | Initial percentage of completion for a simple goal (0-100). Defaults to 0 if omitted. Ignored when &#x60;milestones&#x60; is provided; milestone-based goals derive percent complete from milestone completion and should be updated via &#x60;update-goal-milestone-progress&#x60;. | [optional]
**completion_date** | **\DateTime** |  | [optional]
**shared_with_employee_ids** | **int[]** | List of employee IDs with whom the goal is shared. Must include the employee ID of the goal owner. |
**aligns_with_option_id** | **int** |  | [optional]
**milestones** | [**\BhrSdk\Model\CreateGoalRequestMilestonesInner[]**](CreateGoalRequestMilestonesInner.md) | Optional. Provide a non-empty array of milestone objects to create a milestone-based goal. Omit this field (or send &#x60;null&#x60;) to create a simple goal. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
