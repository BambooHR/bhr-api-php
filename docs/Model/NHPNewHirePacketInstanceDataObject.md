# # NHPNewHirePacketInstanceDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier of the new hire packet instance | [optional]
**employee_id** | **int** | Unique identifier of the employee | [optional]
**contact_employee_id** | **int** | Unique identifier of the contact employee | [optional]
**requires_personal_information** | **bool** | Indicates if personal information is required | [optional] [default to true]
**requires_photo** | **bool** | Indicates if a photo is required | [optional] [default to false]
**requires_personal_questions** | **bool** | Indicates if personal questions are required | [optional] [default to true]
**arrive_by_time** | **string** | The time by which the employee should arrive | [optional]
**other_instructions** | **string** | Any other instructions for the new hire packet | [optional]
**location** | **string** | The location of the new hire packet | [optional]
**sent_datetime** | **string** | The date and time the new hire packet was sent | [optional]
**viewed_datetime** | **string** | The date and time the new hire packet was viewed | [optional]
**completed_datetime** | **string** | The date and time the new hire packet was completed | [optional]
**created_by_user_id** | **int** | Unique identifier of the user who created the new hire packet instance | [optional]
**created_datetime** | **string** | The date and time the new hire packet instance was created | [optional]
**send_get_to_know_you_email** | **bool** | Indicates if the Get To Know You email should be sent | [optional]
**get_to_know_you_email_sent** | **bool** | Indicates if the Get To Know You email has been sent | [optional]
**show_payroll_state** | **bool** | Indicates if the payroll state should be shown | [optional]
**show_payroll_federal** | **bool** | Indicates if the payroll federal information should be shown | [optional]
**show_payroll_direct_deposit** | **bool** | Indicates if the payroll direct deposit information should be shown | [optional]
**nhp_configuration_id** | **int** | Unique identifier of the new hire packet configuration | [optional]
**nhp_template_id** | **int** | Unique identifier of the new hire packet template | [optional]
**count_nhp_gtky_sent** | **int** | The number of Get To Know You emails sent | [optional]
**include_photo_option** | **bool** | Indicates if the photo option should be included | [optional] [default to true]
**cancelled** | **bool** | Indicates if the new hire packet instance is cancelled | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
