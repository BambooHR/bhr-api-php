# # BenefitDeductionSubType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The sub-type deduction type ID (always an integer). | [optional]
**deduction_type_name** | **string** | The display name of the sub-type. | [optional]
**default_deduction_code** | **string** | The default payroll deduction code for this sub-type. | [optional]
**allowable_benefit_types** | **string[]** | Benefit plan types this sub-type applies to. | [optional]
**non_benefit_deduction_type** | **bool** | Whether this is a non-benefit deduction type. | [optional]
**can_be_collected_by_trax** | **bool** | Whether this sub-type can be collected via Trax Payroll. | [optional]
**additional_description** | **string** | Additional description for display purposes. | [optional]
**hide_annual_max** | **bool** | Whether the annual maximum field should be hidden. | [optional]
**managed_deduction_type** | **string** |  | [optional]
**sub_types** | **object[]** | Always an empty array for sub-types. | [optional]
**sub_type_text** | **string** | Sub-type selection label. Empty string for leaf types. | [optional]
**deduction_note** | **string** | Informational note for this sub-type. | [optional]
**deduction_note_link** | **string** | URL for the deduction note link. | [optional]
**deduction_note_link_text** | **string** | Display text for the deduction note link. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
