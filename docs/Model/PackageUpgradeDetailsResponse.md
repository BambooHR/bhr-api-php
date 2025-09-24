# # PackageUpgradeDetailsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_due_today** | **float** | Amount due on upgrade date | [optional]
**next_invoice_date** | **\DateTime** | Next billing date | [optional]
**is_in_grace_period** | **bool** | Whether the account is in grace period | [optional]
**is_bundle_upgrade_available** | **bool** | Whether a bundle upgrade is available | [optional]
**is_prepay** | **bool** | Whether this is a prepay account | [optional]
**prorated_total** | **float** | Total prorated amount | [optional]
**estimated_monthly_total** | **float** | Estimated monthly total | [optional]
**product_estimations** | [**\MySdk\Model\PackageUpgradeDetailsResponseProductEstimationsInner[]**](PackageUpgradeDetailsResponseProductEstimationsInner.md) | List of product estimations | [optional]
**last_invoice** | [**\MySdk\Model\PackageUpgradeDetailsResponseLastInvoice**](PackageUpgradeDetailsResponseLastInvoice.md) |  | [optional]
**prepay_summary** | [**\MySdk\Model\PackageUpgradeDetailsResponsePrepaySummary**](PackageUpgradeDetailsResponsePrepaySummary.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
