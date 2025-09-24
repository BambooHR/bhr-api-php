# # ChatMessageViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Chat Message ID | [optional]
**prompt** | **string** | Chat Message Prompt | [optional]
**message** | **string** | The generated response to the prompt | [optional]
**feedback** | [**\MySdk\Model\ChatMessageFeedbackDataObject**](ChatMessageFeedbackDataObject.md) | The attached feedback for this message | [optional]
**sources** | [**\MySdk\Model\ChatMessageSourceDataObject[]**](ChatMessageSourceDataObject.md) | The file sources used to generate the message if the message was about company policy or a navigational question and not an employee data questions. | [optional]
**time_created** | **string** | Time the message was created in UTC ISO8601 format | [optional]
**time_updated** | **string** | Time the message was last updated in UTC ISO8601 format | [optional]
**result_summary** | **string** | A summary of the response | [optional]
**question_summary** | **string** | A summary of the question | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
