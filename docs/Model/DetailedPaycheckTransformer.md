# # DetailedPaycheckTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**check_id** | **int** | The unique identifier for the check | [optional]
**direct_deposit_disable** | **bool** | Flag indicating if direct deposit is disabled for this check | [optional]
**deduction_disable** | **bool** | Flag indicating if deductions are disabled for this check | [optional]
**note** | **string** | Note attached to the check | [optional]
**taxes** | [**\MySdk\Model\DetailedPaycheckTransformerTaxes**](DetailedPaycheckTransformerTaxes.md) |  | [optional]
**compensation** | [**\MySdk\Model\DetailedPaycheckTransformerCompensation**](DetailedPaycheckTransformerCompensation.md) |  | [optional]
**earnings** | [**\MySdk\Model\DetailedPaycheckTransformerEarningsInner[]**](DetailedPaycheckTransformerEarningsInner.md) | List of earnings for the check | [optional]
**deductions** | **object[]** | List of deductions for the check | [optional]
**rates** | **object[]** | List of rates for the check | [optional]
**upcoming_deduction_changes** | **object[]** | List of upcoming changes to deductions | [optional]
**recently_ended_deductions** | **object[]** | List of recently ended deductions | [optional]
**deductions_paid_during_payroll_year** | **object[]** | List of deductions paid during the payroll year | [optional]
**banks** | [**\MySdk\Model\DetailedPaycheckTransformerBanksInner[]**](DetailedPaycheckTransformerBanksInner.md) | Bank account information for direct deposit | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
