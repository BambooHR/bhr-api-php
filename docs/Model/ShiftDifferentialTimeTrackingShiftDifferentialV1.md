# # ShiftDifferentialTimeTrackingShiftDifferentialV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the shift differential. | [optional] [readonly]
**name** | **string** | The name of the shift differential rule. | [optional]
**rate** | **string** | The differential pay rate as a decimal string. | [optional]
**rate_type** | **string** | How the rate is applied. | [optional]
**allow_all_employees** | **bool** | Whether all time &amp; attendance employees are assigned. | [optional]
**times** | [**\BhrSdk\Model\ShiftDifferentialTimeTrackingShiftDifferentialTimeV1[]**](ShiftDifferentialTimeTrackingShiftDifferentialTimeV1.md) | Time windows when this differential applies. | [optional]
**employee_ids** | **int[]** | Employee IDs assigned to this shift differential. | [optional]
**created_at** | **\DateTime** |  | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]
**archived_at** | **\DateTime** |  | [optional] [readonly]
**deleted_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
