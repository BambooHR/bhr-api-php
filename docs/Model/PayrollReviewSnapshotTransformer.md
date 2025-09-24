# # PayrollReviewSnapshotTransformer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pay_cycle_id** | **int** | ID of the pay cycle | [optional]
**employees** | [**\MySdk\Model\PayrollReviewSnapshotTransformerAllOfEmployees[]**](PayrollReviewSnapshotTransformerAllOfEmployees.md) | Additional employee data for filtering | [optional]
**checks** | [**\MySdk\Model\PayrollSnapshotTransformerChecks**](PayrollSnapshotTransformerChecks.md) |  | [optional]
**employee_rates** | [**\MySdk\Model\PayrollSnapshotTransformerEmployeeRates**](PayrollSnapshotTransformerEmployeeRates.md) |  | [optional]
**earnings** | [**\MySdk\Model\PayrollSnapshotTransformerEarnings**](PayrollSnapshotTransformerEarnings.md) |  | [optional]
**hour_types** | **object** | Hour types information | [optional]
**client_jobs** | **object** | Client jobs information | [optional]
**client_job_categories** | **object** | Client job categories information | [optional]
**filters** | **array<string,string[]>** | Filter options for payroll employees | [optional]
**payroll_implementation_is_active** | **bool** | Whether payroll implementation is active | [optional]
**toggles** | [**\MySdk\Model\PayrollSnapshotTransformerTogglesInner[]**](PayrollSnapshotTransformerTogglesInner.md) | Feature toggles information | [optional]
**client_job_categories_sub** | **object** | Client job categories sub information for shift differential | [optional]
**worked_holiday_rate_multipliers** | **object** | Worked holiday rate multipliers information | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
