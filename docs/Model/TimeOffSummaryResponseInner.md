# # TimeOffSummaryResponseInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**total_scheduled_requests_count** | **int** |  | [optional]
**total_history_requests_count** | **int** |  | [optional]
**total_categories_count** | **int** |  | [optional]
**scheduled_events** | [**\MySdk\Model\TimeOffEventsResponseInner[]**](TimeOffEventsResponseInner.md) | Time off events response | [optional]
**history_requests** | [**\MySdk\Model\TimeOffEventsResponseInner[]**](TimeOffEventsResponseInner.md) | Time off events response | [optional]
**categories** | [**\MySdk\Model\EmployeeTimeOffCategoryDetailsResponseInnerCategoryInner[]**](EmployeeTimeOffCategoryDetailsResponseInnerCategoryInner.md) |  | [optional]
**can_request** | **bool** |  | [optional]
**can_record** | **bool** |  | [optional]
**calculable** | **bool** |  | [optional]
**pause** | [**\MySdk\Model\TimeOffSummaryResponseInnerPauseInner[]**](TimeOffSummaryResponseInnerPauseInner.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
