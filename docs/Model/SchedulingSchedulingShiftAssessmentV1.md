# # SchedulingSchedulingShiftAssessmentV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The unique ID of this assessment. | [readonly]
**shift_id** | **string** |  | [optional]
**employee_id** | **int** | The ID of the employee this assessment is for. |
**date** | **\DateTime** | The date of the shift or clock entry in the local timezone of the shift. |
**result** | **string** | The assessment result. |
**violations** | [**\BhrSdk\Model\SchedulingSchedulingShiftAssessmentViolationV1[]**](SchedulingSchedulingShiftAssessmentViolationV1.md) | The violations associated with this assessment. |
**created_at** | **\DateTime** |  | [optional] [readonly]
**updated_at** | **\DateTime** |  | [optional] [readonly]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
