# # RemoteCompanyResponseSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**remote_company_id** | **string** | UUID of the company as stored in Remote. | [optional]
**remote_company_owner_user_id** | **string** | UUID of the Company Owner user in Remote. | [optional]
**owner_user_id** | **int** | Owner Bamboo User ID | [optional]
**created_ymdt** | **\DateTime** | Creation date and time | [optional]
**updated_ymdt** | **\DateTime** | Last update date and time | [optional]
**status** | **string** | Current status of the Company in Remote&#39;s system | [optional]
**integration_status** | **string** | Current status of the Remote integration in BambooHR | [optional]
**fraud_risk** | **bool** | Current fraud risk state of the Remote company | [optional]
**credit_risk** | **bool** | Current credit risk state of the Remote company | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
