# # EmployeeBenefitFiltersFilters

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **int** | Return benefit enrollments for a specific employee identified by their numeric ID. Optional unless neither &#x60;companyBenefitId&#x60; nor &#x60;enrollmentStatusEffectiveDate&#x60; is supplied. | [optional]
**company_benefit_id** | **int** | Return benefit enrollments for a specific company benefit plan identified by its numeric ID. Optional unless neither &#x60;employeeId&#x60; nor &#x60;enrollmentStatusEffectiveDate&#x60; is supplied. | [optional]
**enrollment_status_effective_date** | **\DateTime** | Return benefit enrollments whose enrollment status became effective on this date. Must be in &#x60;YYYY-MM-DD&#x60; format. Optional unless neither &#x60;employeeId&#x60; nor &#x60;companyBenefitId&#x60; is supplied. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
