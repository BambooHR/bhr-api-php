# # UpdateGoalV11Request

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | The title of the goal |
**description** | **string** | A detailed description of the goal | [optional]
**due_date** | **\DateTime** | The due date for the goal in YYYY-MM-DD format |
**percent_complete** | **int** | The percentage of completion for the goal (0-100). Defaults to 0 if omitted. Ignored when milestonesEnabled is true. | [optional]
**completion_date** | **\DateTime** |  | [optional]
**shared_with_employee_ids** | **int[]** | List of employee IDs with whom the goal is shared. Must include the employee ID of the goal owner. |
**aligns_with_option_id** | **int** |  | [optional]
**milestones_enabled** | **bool** | Flag indicating whether milestones are enabled for this goal | [optional]
**deleted_milestone_ids** | **int[]** | List of milestone IDs to be deleted from the goal | [optional]
**milestones** | [**\BhrSdk\Model\UpdateGoalV11RequestMilestonesInner[]**](UpdateGoalV11RequestMilestonesInner.md) | Optional. New milestones to add to the goal. Each object in this array creates a new milestone — even if its title matches an existing milestone. Do not include existing milestones here unless you intentionally want duplicates. To remove milestones, use &#x60;deletedMilestoneIds&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
