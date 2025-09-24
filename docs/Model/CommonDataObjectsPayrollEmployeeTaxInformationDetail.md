# # CommonDataObjectsPayrollEmployeeTaxInformationDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**federal** | [**\MySdk\Model\CommonDataObjectsPayrollFederalTaxDetail**](CommonDataObjectsPayrollFederalTaxDetail.md) | Federal tax information | [optional]
**state** | [**\MySdk\Model\CommonDataObjectsPayrollStateTaxDetail**](CommonDataObjectsPayrollStateTaxDetail.md) | State tax information | [optional]
**state_unemployment** | [**\MySdk\Model\CommonDataObjectsPayrollStateUnemploymentInsuranceDetail**](CommonDataObjectsPayrollStateUnemploymentInsuranceDetail.md) | State unemployment insurance information | [optional]
**w2_status** | **string** | W-2 delivery status | [optional]
**is2020_release** | **bool** | Whether the current date is after January 1, 2020 | [optional]
**has2020_w4** | **bool** | Whether the W-4 is a 2020 version | [optional]
**federal2020** | [**\MySdk\Model\CommonDataObjectsPayrollFederal2020**](CommonDataObjectsPayrollFederal2020.md) | Federal tax information in 2020 W-4 format | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
