# # GetGoalsAggregateV1200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**can_align** | **bool** | The selected user can align goals with other users. | [optional]
**can_create_goals** | **bool** | The selected user can create a goal. | [optional]
**filters** | [**\MySdk\Model\GoalFiltersV1**](GoalFiltersV1.md) |  | [optional]
**selected_filter** | **string** | The id of the current selected filter. | [optional]
**goals** | [**\MySdk\Model\TransformedApiGoal[]**](TransformedApiGoal.md) | All goals in selected filter. | [optional]
**persons** | [**\MySdk\Model\GetGoalsAggregateV1200ResponsePersonsInner[]**](GetGoalsAggregateV1200ResponsePersonsInner.md) | A list of people with access to the goal. | [optional]
**comments** | [**\MySdk\Model\GetGoalsAggregateV1200ResponseCommentsInner[]**](GetGoalsAggregateV1200ResponseCommentsInner.md) | A list of how many comments belong to each goal. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
