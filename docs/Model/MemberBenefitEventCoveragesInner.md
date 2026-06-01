# # MemberBenefitEventCoveragesInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**plan_id** | **string** | The ID of the benefit plan. | [optional]
**events** | [**\BhrSdk\Model\MemberBenefitEventCoveragesInnerEventsInner[]**](MemberBenefitEventCoveragesInnerEventsInner.md) | Chronological list of benefit events for this member and plan, covering the past year. Event type &#39;enrollment&#39; includes premiumTierId and monthlyPremiumInCents; &#39;eligibility&#39; and &#39;loss&#39; events include only effectiveDate and type. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
