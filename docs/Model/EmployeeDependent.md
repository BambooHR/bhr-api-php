# # EmployeeDependent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**employee_id** | **string** | The ID of the employee this dependent belongs to. Required. |
**first_name** | **string** | The dependent&#39;s first name. | [optional]
**middle_name** | **string** | The dependent&#39;s middle name. | [optional]
**last_name** | **string** | The dependent&#39;s last name. | [optional]
**relationship** | **string** | The dependent&#39;s relationship to the employee (e.g. \&quot;spouse\&quot;, \&quot;child\&quot;, \&quot;domestic_partner\&quot;). | [optional]
**gender** | **string** | The dependent&#39;s gender. | [optional]
**ssn** | **string** | The dependent&#39;s Social Security Number, provided as plain text. Stored encrypted. Returned as a masked value (e.g. \&quot;xxx-xx-1234\&quot;) on read. | [optional]
**sin** | **string** | The dependent&#39;s Social Insurance Number (Canadian equivalent of SSN), provided as plain text. Stored encrypted. Returned as a masked value on read. | [optional]
**date_of_birth** | **\DateTime** | The dependent&#39;s date of birth in YYYY-MM-DD format. | [optional]
**address_line1** | **string** | The first line of the dependent&#39;s address. | [optional]
**address_line2** | **string** | The second line of the dependent&#39;s address. | [optional]
**city** | **string** | The dependent&#39;s city. | [optional]
**state** | **string** | The dependent&#39;s state, provided as a state code (e.g. \&quot;UT\&quot;). Returned as a full state name on read. | [optional]
**zip_code** | **string** | The dependent&#39;s ZIP or postal code. | [optional]
**home_phone** | **string** | The dependent&#39;s home phone number. | [optional]
**country** | **string** | The dependent&#39;s country, provided as an ISO 3166-1 alpha-2 country code (e.g. \&quot;US\&quot;). Returned as a full country name on read. | [optional]
**is_us_citizen** | **string** | Whether the dependent is a US citizen. Accepted values: \&quot;yes\&quot; or \&quot;no\&quot;. | [optional]
**is_student** | **string** | Whether the dependent is currently a student. Accepted values: \&quot;yes\&quot; or \&quot;no\&quot;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
