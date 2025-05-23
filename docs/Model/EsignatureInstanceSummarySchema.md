# # EsignatureInstanceSummarySchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier of the e-signature instance | [optional]
**esignature_template_id** | **int** | ID of the associated e-signature template | [optional]
**user_id** | **int** | ID of the user associated with the e-signature | [optional]
**employee_id** | **int** | ID of the employee associated with the e-signature | [optional]
**status** | **string** | Current status of the e-signature instance | [optional]
**status_user_id** | **int** | ID of the user who updated the status | [optional]
**ip_address** | **string** | IP address associated with the e-signature instance | [optional]
**created** | **\DateTime** | Timestamp when the e-signature instance was created | [optional]
**created_by_user_id** | **int** | ID of the user who created the e-signature instance | [optional]
**last_modified** | **\DateTime** | Timestamp when the e-signature instance was last modified | [optional]
**employee_file_id** | **int** | ID of the employee file associated with the e-signature | [optional]
**finalized_file_id** | **int** | ID of the finalized file associated with the e-signature | [optional]
**company_file_id** | **int** | ID of the company file associated with the e-signature | [optional]
**steps** | [**\MySdk\Model\EsignatureInstanceStepSummarySchema[]**](EsignatureInstanceStepSummarySchema.md) | Steps involved in the e-signature process | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
