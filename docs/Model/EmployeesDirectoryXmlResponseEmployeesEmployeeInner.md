# # EmployeesDirectoryXmlResponseEmployeesEmployeeInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Employee ID, serialized as an attribute on the &#x60;&lt;employee&gt;&#x60; element. | [optional]
**field** | [**\BhrSdk\Model\EmployeesDirectoryXmlResponseEmployeesEmployeeInnerFieldInner[]**](EmployeesDirectoryXmlResponseEmployeesEmployeeInnerFieldInner.md) | Field values for the employee. Each &#x60;&lt;field&gt;&#x60; element has an &#x60;id&#x60; attribute matching one of the &#x60;&lt;fieldset&gt;&#x60; ids and the value as element text. Currency fields additionally carry a &#x60;currency&#x60; attribute (ISO currency code). Boolean fields are serialized as the strings &#x60;true&#x60;/&#x60;false&#x60;; the appended &#x60;canUploadPhoto&#x60; field is serialized as &#x60;yes&#x60;/&#x60;no&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
