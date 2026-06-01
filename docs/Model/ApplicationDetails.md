# # ApplicationDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Application ID | [optional]
**applied_date** | **\DateTime** | ISO 8601 datetime when the application was submitted | [optional]
**status** | [**\BhrSdk\Model\ApplicationDetailsStatus**](ApplicationDetailsStatus.md) |  | [optional]
**rating** | **int** |  | [optional]
**resume_file_id** | **int** |  | [optional]
**cover_letter_file_id** | **int** |  | [optional]
**attachment_count** | **int** |  | [optional]
**attachments** | [**\BhrSdk\Model\ApplicationDetailsAttachmentsInner[]**](ApplicationDetailsAttachmentsInner.md) |  | [optional]
**moved_to** | **object[]** |  | [optional]
**moved_from** | **object[]** |  | [optional]
**also_considered_for_count** | **int** | Count of other job openings this applicant is also being considered for | [optional]
**duplicate_application_count** | **int** | Count of duplicate applications from this applicant | [optional]
**referred_by** | **string** |  | [optional]
**desired_salary** | **string** |  | [optional]
**comment_count** | **int** | Number of comments on this application | [optional]
**email_count** | **int** | Number of emails sent for this application | [optional]
**event_count** | **int** | Number of events associated with this application | [optional]
**questions_and_answers** | [**\BhrSdk\Model\ApplicationDetailsQuestionsAndAnswersInner[]**](ApplicationDetailsQuestionsAndAnswersInner.md) | List of custom application questions and the applicant&#39;s answers | [optional]
**application_references** | **string** |  | [optional]
**applicant** | [**\BhrSdk\Model\ApplicationDetailsApplicant**](ApplicationDetailsApplicant.md) |  | [optional]
**job** | [**\BhrSdk\Model\ApplicationDetailsJob**](ApplicationDetailsJob.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
