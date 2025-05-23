# # AssessmentTabViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_admin** | **bool** | Whether the current user is an admin | [optional]
**is_manager** | **bool** | Whether the current user is a manager | [optional]
**is_self_assessment** | **bool** | Whether this is a self assessment | [optional]
**can_see_checkbox** | **bool** | Whether the current user can see the checkbox | [optional]
**employee** | **object** | Employee information including fullName and firstName | [optional]
**manager** | **object** | Manager information including fullName and firstName | [optional]
**review_period_id** | **int** | ID of the review period | [optional]
**previous_period_id** | **int** | ID of the previous review period | [optional]
**assessment_note** | **object** | Assessment note | [optional]
**contains_misalignment** | **bool** | Whether the assessment contains misalignment | [optional]
**assessments** | **object[]** | List of assessments | [optional]
**days_till_published** | **int** | Days until the assessment is published | [optional]
**end_date_for_review_period** | **string** | End date for the review period | [optional]
**assessment_start_date** | **string** | Start date for the assessment | [optional]
**is_files_enabled** | **bool** | Whether files are enabled for the assessment | [optional]
**is_files_required** | **bool** | Whether files are required for the assessment | [optional]
**is_skippable** | **bool** | Whether the assessment is skippable | [optional]
**impromptu_assessment_can_be_created** | **bool** | Whether an impromptu assessment can be created | [optional]
**impromptu_review_cycles** | **object[]** | List of impromptu review cycles | [optional]
**can_be_cancelled** | **bool** | Whether the assessment can be cancelled | [optional]
**use_default_questions** | **bool** | Whether to use default questions | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
