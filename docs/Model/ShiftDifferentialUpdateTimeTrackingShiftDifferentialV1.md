# # ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional]
**rate** | **string** | Non-negative decimal string with at most two decimal places. | [optional]
**rate_type** | **string** |  | [optional]
**allow_all_employees** | **bool** | If true, every time-tracked employee is assigned. Ignored when &#x60;employeeIds&#x60; is provided. | [optional]
**employee_ids** | **int[]** | Specific internal employee IDs to assign. Minimum 1 entry required when provided. Takes precedence over &#x60;allowAllEmployees&#x60;. | [optional]
**times** | [**\BhrSdk\Model\ShiftDifferentialCreateTimeTrackingShiftDifferentialV1TimesInner[]**](ShiftDifferentialCreateTimeTrackingShiftDifferentialV1TimesInner.md) | Time windows when this differential applies. Replaces all existing time windows when provided. | [optional]
**archived** | **bool** | When true, archives the shift differential. When false, unarchives it. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
