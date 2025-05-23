# # EsignatureInstanceSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier for the eSignature instance | [optional]
**esignature_template_id** | **int** | ID of the associated eSignature template | [optional]
**user_id** | **int** | ID of the user associated with the eSignature instance | [optional]
**employee_id** | **int** | ID of the employee associated with the eSignature instance | [optional]
**status** | **string** | Status of the eSignature instance | [optional]
**status_user_id** | **int** | ID of the user who updated the status | [optional]
**ip_address** | **string** | IP address of the user who interacted with the eSignature instance | [optional]
**created** | **\DateTime** | Timestamp when the eSignature instance was created | [optional]
**created_by_user_id** | **int** | ID of the user who created the eSignature instance | [optional]
**last_modified** | **\DateTime** | Timestamp when the eSignature instance was last modified | [optional]
**employee_file_id** | **int** | ID of the employee file associated with the eSignature instance | [optional]
**finalized_file_id** | **int** | ID of the finalized file associated with the eSignature instance | [optional]
**company_file_id** | **int** | ID of the company file associated with the eSignature instance | [optional]
**old_instance_id** | **int** | ID of the old eSignature instance, if applicable | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
