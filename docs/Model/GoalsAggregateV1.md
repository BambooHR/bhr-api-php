# # GoalsAggregateV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**can_align** | **bool** | The selected user can align goals with other users. | [optional]
**can_create_goals** | **bool** | The selected user can create a goal. | [optional]
**filters** | [**\BhrSdk\Model\GoalFiltersV1**](GoalFiltersV1.md) |  | [optional]
**selected_filter** | **string** | The id of the current selected filter. | [optional]
**goals** | [**\BhrSdk\Model\TransformedApiGoal[]**](TransformedApiGoal.md) | All goals in selected filter. | [optional]
**persons** | [**\BhrSdk\Model\GoalsAggregateV1PersonsInner[]**](GoalsAggregateV1PersonsInner.md) | A list of people with access to the goal. | [optional]
**comments** | [**\BhrSdk\Model\GoalsAggregateV1CommentsInner[]**](GoalsAggregateV1CommentsInner.md) | A list of how many comments belong to each goal. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
