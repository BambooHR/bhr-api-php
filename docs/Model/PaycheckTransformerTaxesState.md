# # PaycheckTransformerTaxesState

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**work_in** | **string** | State code where employee works | [optional]
**filing_status_code** | **string** | Filing status code for state taxes | [optional]
**joint_filing** | **bool** | Flag indicating if joint filing is selected | [optional]
**is_exempt** | **bool** | Flag indicating if employee is exempt from state taxes | [optional]
**rate_additional** | **float** | Additional rate for state taxes | [optional]
**exemption** | **int** | Number of exemptions claimed | [optional]
**exemption_label** | **string** | Label for exemptions field (varies by state) | [optional]
**options** | **object[]** | State tax options | [optional]
**additional_withholding** | **object** | Additional withholding information | [optional]
**unemployment_insurance** | **object** | Unemployment insurance information | [optional]
**withholding** | **object** | Withholding information | [optional]
**local** | **object** | Local tax information | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
