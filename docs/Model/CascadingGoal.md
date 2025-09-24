# # CascadingGoal

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier for the goal | [optional]
**employee_goal_id** | **string** | Unique identifier for the employee goal | [optional]
**title** | **string** | Title of the goal | [optional]
**owner_photo_url** | **string** | Photo URL of the goal owner | [optional]
**owner_display_name** | **string** | Display name of the goal owner | [optional]
**included_filters** | **string[]** | Included filters for the goal | [optional]
**days_past_due** | **int** | Number of days past due | [optional]
**due_date** | **string** | Due date of the goal | [optional]
**days_until_due_date** | **int** | Number of days until due date | [optional]
**percent_complete** | **int** | Percentage complete | [optional]
**marked_complete** | **bool** | Whether the goal is marked complete | [optional]
**company_goal** | **bool** | Whether the goal is a company goal | [optional]
**child_goals** | [**\MySdk\Model\CascadingGoal[]**](CascadingGoal.md) | Child goals | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
