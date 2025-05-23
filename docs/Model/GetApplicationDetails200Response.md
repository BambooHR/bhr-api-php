# # GetApplicationDetails200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Application ID | [optional]
**applied_date** | **\DateTime** | Date when the application was submitted | [optional]
**status** | [**\MySdk\Model\GetApplicationDetails200ResponseStatus**](GetApplicationDetails200ResponseStatus.md) |  | [optional]
**rating** | **int** | Applicant rating | [optional]
**education** | **object** | Applicant education information | [optional]
**resume_file_id** | **int** | ID of the resume file | [optional]
**cover_letter_file_id** | **int** | ID of the cover letter file | [optional]
**moved_to** | **object[]** | Positions the applicant was moved to | [optional]
**moved_from** | **object[]** | Positions the applicant was moved from | [optional]
**also_considered_for_count** | **int** | Count of other positions this applicant is being considered for | [optional]
**duplicate_application_count** | **int** | Count of duplicate applications | [optional]
**referred_by** | **string** | Who referred this applicant | [optional]
**desired_salary** | **string** | Applicant&#39;s desired salary | [optional]
**comment_count** | **int** | Number of comments on this application | [optional]
**email_count** | **int** | Number of emails for this application | [optional]
**event_count** | **int** | Number of events for this application | [optional]
**questions_and_answers** | [**\MySdk\Model\GetApplicationDetails200ResponseQuestionsAndAnswersInner[]**](GetApplicationDetails200ResponseQuestionsAndAnswersInner.md) | Custom questions and answers | [optional]
**application_references** | **object[]** | Application references | [optional]
**applicant** | [**\MySdk\Model\GetApplicationDetails200ResponseApplicant**](GetApplicationDetails200ResponseApplicant.md) |  | [optional]
**job** | [**\MySdk\Model\GetApplicationDetails200ResponseJob**](GetApplicationDetails200ResponseJob.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
