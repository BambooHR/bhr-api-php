# # EmployeesDirectoryJsonResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fields** | [**\BhrSdk\Model\EmployeesDirectoryJsonResponseFieldsInner[]**](EmployeesDirectoryJsonResponseFieldsInner.md) | Field definitions included in this response. Each entry describes one key that appears on every employee object. The set of fields is fixed by company directory configuration; the &#x60;canUploadPhoto&#x60; entry is always appended. | [optional]
**employees** | **array<string,mixed>[]** | One object per directory employee. Every object includes &#x60;id&#x60; (employee ID as a string) and &#x60;canUploadPhoto&#x60; (1 if the authenticated caller may upload a photo for this employee, 0 otherwise), plus one key per entry in &#x60;fields&#x60;. The exact key set varies with company directory configuration. Field values are returned in the JSON type indicated by the matching &#x60;fields[].type&#x60; (for example, &#x60;bool&#x60; fields are JSON booleans). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
