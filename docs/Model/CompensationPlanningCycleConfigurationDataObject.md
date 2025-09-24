# # CompensationPlanningCycleConfigurationDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the compensation cycle configuration. | [optional]
**cycle_name** | **string** | The name of the compensation cycle (e.g. Q1 2024 Compensation Cycle). | [optional]
**cycle_effective_date** | **string** | The effective date for the compensation cycle. | [optional]
**status** | **string** | The status of the compensation cycle. | [optional]
**cycle_budget** | **float** | The total budget allocated for the cycle. | [optional]
**cycle_currency** | **string** | The currency code for the cycle (e.g. USD). | [optional]
**salary_included** | **bool** | Whether salary is included in the compensation cycle. | [optional]
**bonus_included** | **bool** | Whether bonus is included in the compensation cycle. | [optional]
**equity_included** | **bool** | Whether equity is included in the compensation cycle. | [optional]
**cycle_currency_conversion_rates** | [**\MySdk\Model\ConversionRateDataObject[]**](ConversionRateDataObject.md) | List of currency conversion rates to the cycle currency. | [optional]
**cycle_window_start_ymd** | **\DateTime** | The start date of the cycle window. | [optional]
**cycle_window_end_ymd** | **\DateTime** | The end date of the cycle window. | [optional]
**recommendations_due_ymd** | **\DateTime** | The due date for recommendations. | [optional]
**approvals_due_ymd** | **\DateTime** | The due date for approvals. | [optional]
**paycheck_ymd** | **\DateTime** | The due date for paycheck. | [optional]
**change_communication_subject** | **string** | The subject of the communication. | [optional]
**change_communication_message_text** | **string** | The message text of the communication. | [optional]
**budget_guidelines** | [**\MySdk\Model\BudgetGuidelinesDataObject**](BudgetGuidelinesDataObject.md) | The budget guidelines for the cycle. | [optional]
**completed_date** | **\DateTime** | The date the cycle was completed. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
