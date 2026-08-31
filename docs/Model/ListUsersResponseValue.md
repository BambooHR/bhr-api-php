# # ListUsersResponseValue

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The user ID. | [optional]
**employee_id** | **int** | The ID of the employee record linked to this user. Always present in the JSON response; &#x60;0&#x60; when no employee record is associated. | [optional]
**first_name** | **string** | First name. | [optional]
**last_name** | **string** | Last name. | [optional]
**email** | **string** | The user&#39;s email address. Resolved in priority order: work email, home email, account email. | [optional]
**status** | **string** | Account status. | [optional]
**last_login** | **\DateTime** | ISO 8601 timestamp of the most recent login. Omitted when the user has never logged in. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
