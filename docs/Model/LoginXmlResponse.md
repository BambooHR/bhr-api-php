# # LoginXmlResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**response** | **string** | Always &#x60;authenticated&#x60; on HTTP 200. | [optional]
**user_id** | **int** | The authenticated user ID. | [optional]
**employee_id** | **int** | The employee ID linked to this user. Rendered as &#x60;&lt;employeeId isNull&#x3D;\&quot;yes\&quot;/&gt;&#x60; when no employee record is associated. | [optional]
**key** | **string** | The API key to use for subsequent requests. | [optional]
**api_url** | **string** | The base URL for subsequent API calls. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
