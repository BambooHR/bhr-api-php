# # UpdatePayBandsRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pay_band_type** | **string** | Selects how band values are interpreted. &#x60;percentRange&#x60; derives &#x60;min&#x60;/&#x60;max&#x60; from &#x60;mid&#x60; and &#x60;percentageRange&#x60;; &#x60;minMidMax&#x60; stores the supplied &#x60;min&#x60;/&#x60;mid&#x60;/&#x60;max&#x60; and clears &#x60;percentageRange&#x60;. Defaults to &#x60;minMidMax&#x60; when omitted. | [optional]
**pay_bands** | [**\BhrSdk\Model\PayGradesAndBandsUpdatePayBandItem[]**](PayGradesAndBandsUpdatePayBandItem.md) | Pay band values to apply, one entry per level. Each entry requires the level ID; &#x60;min&#x60;, &#x60;mid&#x60;, &#x60;max&#x60;, and &#x60;percentageRange&#x60; are the raw numeric values (not the object form returned by Get Pay Bands). |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
