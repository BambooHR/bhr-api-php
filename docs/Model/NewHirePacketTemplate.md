# # NewHirePacketTemplate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Template ID | [optional]
**arrive_by_time** | **string** | Time employee should arrive by | [optional]
**contact_employee_id** | **int** | Contact employee ID | [optional]
**created_user_id** | **int** | ID of user who created the template | [optional]
**default** | **bool** | Whether this is the default template | [optional]
**get_to_know_you_email_template_id** | **int** | Get to know you email template ID | [optional]
**send_get_to_know_you_email** | **bool** | Whether to send get to know you email | [optional]
**archived** | **bool** | Whether this template is archived | [optional]
**get_to_know_you_questions** | [**\MySdk\Model\NewHirePacketTemplateGetToKnowYouQuestion[]**](NewHirePacketTemplateGetToKnowYouQuestion.md) | Get to know you questions | [optional]
**get_to_know_you_recipients** | [**\MySdk\Model\NewHirePacketTemplateGetToKnowYouRecipient[]**](NewHirePacketTemplateGetToKnowYouRecipient.md) | Get to know you recipients | [optional]
**location** | **string** | Location of the template | [optional]
**name** | **string** | Name of the template | [optional]
**other_instructions** | **string** | Other instructions for the template | [optional]
**template_fields** | [**\MySdk\Model\NewHirePacketTemplateField[]**](NewHirePacketTemplateField.md) | Template fields | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
