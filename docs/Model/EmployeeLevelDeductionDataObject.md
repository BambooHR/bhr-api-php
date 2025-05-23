# # EmployeeLevelDeductionDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of the deduction | [optional]
**company_level_deduction_id** | **int** | The ID of the company level deduction | [optional]
**employee_id** | **int** | The ID of the employee | [optional]
**deduction_name** | **string** | The name of the deduction | [optional]
**start_date_ymd** | **\DateTime** | The start date of the deduction in YMD format | [optional]
**end_date_ymd** | **\DateTime** | The end date of the deduction in YMD format | [optional]
**amount** | **float** | The amount of the deduction | [optional]
**amount_type** | **string** | The type of the amount | [optional]
**percent_type** | **string** | The type of the percentage | [optional]
**deduction_payee_id** | **int** | The ID of the deduction payee | [optional]
**case_number** | **string** | The case number associated with the deduction | [optional]
**case_description** | **string** | The description of the case associated with the deduction | [optional]
**cap_amount** | **float** | The cap amount of the deduction | [optional]
**annual_max** | **float** | The annual maximum of the deduction | [optional]
**cap_amount_type** | **string** | The type of the cap amount | [optional]
**employer_based_on** | **string** | The basis for the employer deduction | [optional]
**employer_amount_type** | **string** | The type of the employer amount | [optional]
**employer_amount** | **float** | The amount for the employer deduction | [optional]
**employer_cap_amount_type** | **string** | The type of the employer cap amount | [optional]
**employer_cap_amount** | **float** | The cap amount for the employer deduction | [optional]
**employer_annual_max** | **float** | The annual maximum for the employer deduction | [optional]
**starting_balance** | **float** | The starting balance of the deduction | [optional]
**remaining_balance** | **float** | The remaining balance of the deduction | [optional]
**additional_one_time** | **float** | The additional one-time amount for the deduction | [optional]
**use_ee_annual_max_only** | **bool** | Indicates if only the employee annual max is used | [optional]
**case_note** | **string** | Notes related to the case | [optional]
**case_participant_id** | **string** | The participant ID of the case, seen as Remittance ID by the customer | [optional]
**pay_cycle_id** | **int** | The ID of the pay cycle | [optional]
**global_payee_id** | **int** | The global payee ID, if applicable | [optional]
**deduction_type_id** | **int** | The deduction type ID, if applicable | [optional]
**type** | **string** | The type of deduction, default is non-benefit | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
