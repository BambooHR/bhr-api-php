# # BankInformationViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**client_id** | **int** | Client ID | [optional]
**is_legacy** | **bool** | Whether the bank account is legacy | [optional]
**bank_id** | **string** | Bank ID | [optional]
**account_nickname** | **string** | Account nickname | [optional]
**account_number** | **string** | Account number (masked) | [optional]
**routing_number** | **string** | Bank routing number | [optional]
**account_type** | **string** | Account type | [optional]
**bank_logo** | **string** | URL to bank logo | [optional]
**bank_name** | **string** | Bank name | [optional]
**is_verified** | **bool** | Verification status | [optional]
**npc_account_number** | **string** | NPC account number | [optional]
**form_ach_authorization** | [**\MySdk\Model\BambooHrPayrollDocumentStatusViewObject**](BambooHrPayrollDocumentStatusViewObject.md) | ACH authorization form status | [optional]
**form_bank_authorization** | [**\MySdk\Model\BambooHrPayrollDocumentStatusViewObject**](BambooHrPayrollDocumentStatusViewObject.md) | Bank authorization form status | [optional]
**is_npc_onboarding_flow_manual** | **bool** | Whether NPC onboarding flow is manual | [optional]
**pennies_has_been_stored** | **bool** | Whether penny verification has been stored | [optional]
**plaid_status** | **string** | Plaid integration status | [optional]
**is_plaid_disabled** | **bool** | Whether Plaid integration is disabled | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
