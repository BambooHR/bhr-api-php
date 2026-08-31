# # BenefitDeductionType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | [**\BhrSdk\Model\BenefitDeductionTypeId**](BenefitDeductionTypeId.md) |  | [optional]
**deduction_type_name** | **string** | The display name of the deduction type. | [optional]
**default_deduction_code** | **string** | The default payroll deduction code for this type. | [optional]
**allowable_benefit_types** | **string[]** | The benefit plan types this deduction type can be applied to (e.g. \&quot;health\&quot;, \&quot;dental\&quot;, \&quot;retirement\&quot;). | [optional]
**non_benefit_deduction_type** | **bool** | Whether this is a non-benefit deduction type (e.g. garnishments). | [optional]
**can_be_collected_by_trax** | **bool** | Whether this deduction type can be collected via Trax Payroll. | [optional]
**additional_description** | **string** | An optional additional description for display purposes. | [optional]
**hide_annual_max** | **bool** | Whether the annual maximum field should be hidden for this deduction type. | [optional]
**managed_deduction_type** | **string** |  | [optional]
**sub_types** | [**\BhrSdk\Model\BenefitDeductionSubType[]**](BenefitDeductionSubType.md) | Child deduction types grouped under this parent. Each entry has the same shape as a top-level deduction type. Empty array if this type has no sub-types. | [optional]
**sub_type_text** | **string** | A label or question displayed alongside sub-type selection (e.g. \&quot;Reportable on the W-2?\&quot;). Empty string for types without sub-types. | [optional]
**deduction_note** | **string** | An informational note to display to the user when configuring this deduction type. | [optional]
**deduction_note_link** | **string** | A URL for a \&quot;learn more\&quot; link associated with the deduction note. | [optional]
**deduction_note_link_text** | **string** | The display text for the deduction note link. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
