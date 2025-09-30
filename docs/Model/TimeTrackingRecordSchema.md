# # TimeTrackingRecordSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time_tracking_id** | **string** | Unique identifier for the time tracking record | [optional]
**employee_id** | **string** | ID of the employee associated with this time tracking record | [optional]
**division_id** | **string** | ID of the division associated with this time tracking record | [optional]
**department_id** | **string** | ID of the department associated with this time tracking record | [optional]
**job_title_id** | **string** | ID of the job title associated with this time tracking record | [optional]
**pay_code** | **string** | Pay code for this time tracking record | [optional]
**date_hours_worked** | **\DateTime** | Date the hours were worked | [optional]
**type** | **string** | Type of time tracking record | [optional]
**pay_rate** | **float** | Pay rate for this time tracking record | [optional]
**rate_type** | **string** | Rate type for this time tracking record | [optional]
**hours_worked** | **float** | Number of hours worked | [optional]
**adjusted_hours** | **float** | Number of adjusted hours | [optional]
**date_adjusted** | **\DateTime** | Date and time when the hours were adjusted | [optional]
**job_code** | **string** | Job code associated with this time tracking record | [optional]
**job_data** | **string** | Additional job data for this time tracking record | [optional]
**project_id** | **string** | ID of the project associated with this time tracking record | [optional]
**task_id** | **string** | ID of the task associated with this time tracking record | [optional]
**shift_differential_id** | **string** | ID of the shift differential associated with this time tracking record | [optional]
**holiday_id** | **string** | ID of the holiday associated with this time tracking record | [optional]
**project** | [**\BhrSdk\Model\TimeTrackingRecordSchemaProject**](TimeTrackingRecordSchemaProject.md) |  | [optional]
**shift_differential** | [**\BhrSdk\Model\TimeTrackingRecordSchemaShiftDifferential**](TimeTrackingRecordSchemaShiftDifferential.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
