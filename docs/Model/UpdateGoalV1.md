# # UpdateGoalV1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | [Required] The goal title. |
**description** | **string** | [Optional] The goal description. If omitted, the existing value will be overwritten with an empty string. | [optional]
**percent_complete** | **int** | [Optional] The goal completion percentage (0-100). If omitted, the existing value will be overwritten with 0. | [optional]
**aligns_with_option_id** | **string** |  | [optional]
**shared_with_employee_ids** | **int[]** | [Required] Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. This must include the employee for whom the goal is created. |
**due_date** | **\DateTime** | [Required] The goal due date in YYYY-MM-DD format. |
**completion_date** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
