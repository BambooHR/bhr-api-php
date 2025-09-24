# # ManageSubscriptionResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** |  | [optional]
**packages** | **object[]** |  | [optional]
**pepm_add_on_products** | **object[]** |  | [optional]
**pepm_add_on_expansion_products** | **object[]** |  | [optional]
**fixed_price_add_on_products** | **object[]** |  | [optional]
**package_upgrade_restrictions** | **object** |  | [optional]
**is_able_to_self_serve_upgrade_package** | **bool** | Flag indicating if the company is able to self-serve upgrade their package without restrictions | [optional]
**is_eligible_for_downgrade** | **bool** |  | [optional]
**upgrade_lead_package** | **string** |  | [optional]
**is_in_trial** | **bool** |  | [optional]
**is_in_grace_period** | **bool** |  | [optional]
**integrations** | [**\MySdk\Model\ManageSubscriptionResponseIntegrationsInner[]**](ManageSubscriptionResponseIntegrationsInner.md) | A list of integrations enabled for the company, each with integration details. Returned only if there are integrations enabled. | [optional]
**integration_expansions** | [**\MySdk\Model\ManageSubscriptionResponseIntegrationExpansionsInner[]**](ManageSubscriptionResponseIntegrationExpansionsInner.md) | A list of potential integration expansions available for the company. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
