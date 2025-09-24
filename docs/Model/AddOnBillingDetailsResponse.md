# # AddOnBillingDetailsResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**subscription_start_date** | **\DateTime** | Date when subscription will start | [optional]
**trial_active** | **bool** | Whether the trial is currently active | [optional]
**employee_count** | **int** | Number of employees | [optional]
**discount_volume_price_per_employee_per_month** | **float** | Discounted price per employee per month | [optional]
**monthly_total** | **float** | Total monthly cost | [optional]
**next_billing_date** | **\DateTime** | Next billing date | [optional]
**last_billing_date** | **\DateTime** | Last billing date | [optional]
**discounts** | **string[]** | List of applied discounts | [optional]
**discount_total** | **float** | Total discount amount | [optional]
**prorated_subtotal** | **float** | Prorated subtotal before discounts | [optional]
**prorated_total** | **float** | Prorated total after discounts | [optional]
**is_prepay** | **bool** | Whether this is a prepay account | [optional]
**prepay_account_balance** | **float** | Current prepay account balance | [optional]
**remaining_prepay_account_balance** | **float** | Remaining prepay account balance after purchase | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
