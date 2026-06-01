# # MetaCompanyPropertiesResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Bamboo company identifier (numeric). | [optional]
**name** | **string** | Company display name. | [optional]
**domain** | **string** | Company’s Bamboo subdomain (same value used in the &#x60;baseApiUrl&#x60; path segment after &#x60;gateway.php/&#x60;) | [optional]
**base_api_url** | **string** | Full HTTPS URL of the public API gateway for this company, typically &#x60;https://&#x60; + the data-center–specific API host for this tenant + &#x60; /api/gateway.php/&#x60; + the company’s &#x60;domain&#x60; from this response. This is the entry point the integrator uses for legacy gateway-style API traffic, not a generic “base URL” name alone. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
