# # GetGoalAggregate200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**** | [**\MySdk\Model\TransformedApiGoal**](TransformedApiGoal.md) |  | [optional]
**can_align** | **bool** | The selected user can align goals with other users. | [optional]
**can_create_goals** | **bool** | The selected user can create a goal. | [optional]
**aligns_with_options** | [**\MySdk\Model\GetGoalAggregate200ResponseAlignsWithOptionsInner[]**](GetGoalAggregate200ResponseAlignsWithOptionsInner.md) | All possible goals that this goal could be aligned with. | [optional]
**comments** | [**\MySdk\Model\GetGoalAggregate200ResponseCommentsInner[]**](GetGoalAggregate200ResponseCommentsInner.md) | Comments linked to selected goal. | [optional]
**persons** | [**\MySdk\Model\GetGoalAggregate200ResponsePersonsInner[]**](GetGoalAggregate200ResponsePersonsInner.md) | A list of people with access to the goal. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
