# # EmployeeOrgChartDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Employee ID | [optional]
**name** | **string** | Full name of the employee | [optional]
**hire_date** | **\DateTime** | Date when the employee was hired | [optional]
**job_title** | **string** | Employee&#39;s job title | [optional]
**reports_to** | **string** | ID of the employee&#39;s manager or supervisor | [optional]
**direct_reports** | [**\MySdk\Model\EmployeeOrgChartDataObject[]**](EmployeeOrgChartDataObject.md) | List of employees who report directly to this employee | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
