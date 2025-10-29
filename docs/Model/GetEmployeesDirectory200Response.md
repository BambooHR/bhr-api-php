# # GetEmployeesDirectory200Response

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fields** | [**\BhrSdk\Model\GetEmployeesDirectory200ResponseFieldsInner[]**](GetEmployeesDirectory200ResponseFieldsInner.md) | Array of field definitions | [optional]
**employees** | **array<string,mixed>[]** | Array of employee records. Each employee object contains properties matching the &#39;id&#39; values from the &#39;fields&#39; array. Property names are dynamically determined by company configuration. Property values can be strings, numbers, booleans, or null. Common fields include: id, displayName, firstName, lastName, preferredName, jobTitle, workPhone, mobilePhone, workEmail, department, location, division, twitterFeed, pronouns, workPhoneExtension, photoUploaded, photoUrl, canUploadPhoto. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
