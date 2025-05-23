# # PayrollPayCycleApiControllerClientPayCyclesInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Pay cycle ID | [optional]
**name** | **string** | Pay cycle name | [optional]
**external_id** | **int** | External ID | [optional]
**pay_group_id** | **int** | Pay group ID | [optional]
**pay_schedule_id** | **int** | Pay schedule ID | [optional]
**status** | **string** | Pay cycle status | [optional]
**start_date** | **\DateTime** | Pay cycle start date | [optional]
**end_date** | **\DateTime** | Pay cycle end date | [optional]
**pay_date** | **\DateTime** | Pay date | [optional]
**due_date** | **\DateTime** | Due date | [optional]
**opened_date** | **\DateTime** | Date when pay cycle was opened | [optional]
**approved_date** | **\DateTime** | Date when pay cycle was approved | [optional]
**approved_by** | **string** | User who approved the pay cycle | [optional]
**paid_date** | **\DateTime** | Date when pay cycle was paid | [optional]
**paid_by** | **string** | User who paid the pay cycle | [optional]
**is_off_cycle** | **bool** | Whether this is an off-cycle pay cycle | [optional]
**is_voided** | **bool** | Whether this pay cycle is voided | [optional]
**is_ach_locked** | **bool** | Whether ACH is locked for this pay cycle | [optional]
**fee_status** | **string** | Fee status | [optional]
**has_late_fee** | **bool** | Whether this pay cycle has a late fee | [optional]
**has_deadline_fee** | **bool** | Whether this pay cycle has a deadline fee | [optional]
**fee_next_deadline** | **\DateTime** | Next fee deadline | [optional]
**created_at** | **\DateTime** | Date when pay cycle was created | [optional]
**off_cycle_settings_set** | **bool** | Whether off-cycle settings are set | [optional]
**edit_page_version** | **int** | Edit page version | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
