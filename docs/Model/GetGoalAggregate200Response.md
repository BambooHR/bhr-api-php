# # GetGoalAggregate200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**goal** | [**\BhrSdk\Model\TransformedApiGoal**](TransformedApiGoal.md) |  | [optional]
**can_align** | **bool** | The selected user can align goals with other users. | [optional]
**can_create_goals** | **bool** | The selected user can create a goal. | [optional]
**aligns_with_options** | [**\BhrSdk\Model\GetGoalAggregate200ResponseAlignsWithOptionsInner[]**](GetGoalAggregate200ResponseAlignsWithOptionsInner.md) | All possible goals that this goal could be aligned with. | [optional]
**comments** | [**\BhrSdk\Model\GetGoalAggregate200ResponseCommentsInner[]**](GetGoalAggregate200ResponseCommentsInner.md) | Comments linked to selected goal. | [optional]
**persons** | [**\BhrSdk\Model\GetGoalAggregate200ResponsePersonsInner[]**](GetGoalAggregate200ResponsePersonsInner.md) | A list of people with access to the goal. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
