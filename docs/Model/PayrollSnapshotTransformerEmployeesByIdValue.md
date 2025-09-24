# # PayrollSnapshotTransformerEmployeesByIdValue

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**core_employee_id** | **int** | Core employee ID | [optional]
**snapshot_employee_id** | **int** | Snapshot employee ID | [optional]
**first_name** | **string** | Employee&#39;s first name | [optional]
**last_name** | **string** | Employee&#39;s last name | [optional]
**employee_photo_url** | **string** | URL to employee&#39;s photo | [optional]
**job_title** | **string** | Employee&#39;s job title | [optional]
**branch** | **int** | Employee&#39;s branch ID | [optional]
**class** | **int** | Employee&#39;s class ID | [optional]
**department** | **int** | Employee&#39;s department ID | [optional]
**division** | **int** | Employee&#39;s division ID | [optional]
**tax_type** | **string** | Employee&#39;s tax type | [optional]
**compensation** | [**\MySdk\Model\PayrollSnapshotTransformerEmployeesByIdValueCompensation**](PayrollSnapshotTransformerEmployeesByIdValueCompensation.md) |  | [optional]
**available_rate_ids** | **int[]** | IDs of rates available for this employee | [optional]
**checks** | **int[]** | Check IDs associated with this employee | [optional]
**tags** | [**\MySdk\Model\PayrollSnapshotTransformerEmployeesByIdValueTagsInner[]**](PayrollSnapshotTransformerEmployeesByIdValueTagsInner.md) | Employee tags for proration | [optional]
**proration_information** | [**\MySdk\Model\PayrollSnapshotTransformerEmployeesByIdValueProrationInformationInner[]**](PayrollSnapshotTransformerEmployeesByIdValueProrationInformationInner.md) | Proration information for the employee | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
