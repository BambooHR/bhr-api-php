# # PayrollEmployeeTransformerV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | Unique identifier for the employee | [optional]
**first_name** | **string** | Employee&#39;s first name | [optional]
**last_name** | **string** | Employee&#39;s last name | [optional]
**preferred_name** | **string** | Employee&#39;s preferred name, if any | [optional]
**photo_url** | **string** | URL to employee&#39;s photo | [optional]
**job_title** | **string** | Employee&#39;s job title | [optional]
**branch_id** | **int** | ID of the branch the employee belongs to | [optional]
**class_id** | **int** | ID of the class the employee belongs to | [optional]
**department_id** | **int** | ID of the department the employee belongs to | [optional]
**division_id** | **int** | ID of the division the employee belongs to | [optional]
**tax_type** | **string** | Employee&#39;s tax type | [optional]
**compensation** | [**\MySdk\Model\PayrollEmployeeCompensationTransformerV2**](PayrollEmployeeCompensationTransformerV2.md) | Employee&#39;s compensation details | [optional]
**has_calculated_pay_check** | **bool** | Whether the employee has a calculated paycheck for this pay cycle | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
