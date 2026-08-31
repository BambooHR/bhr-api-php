# # PayGradesAndBandsReviewLevel

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**level_id** | **int** |  | [optional]
**level_name** | **string** |  | [optional]
**min** | [**\BhrSdk\Model\LevelsAndBandsPayBandValue**](LevelsAndBandsPayBandValue.md) | Minimum pay band value with its own validation state. | [optional]
**mid** | [**\BhrSdk\Model\LevelsAndBandsPayBandValue**](LevelsAndBandsPayBandValue.md) | Midpoint pay band value with its own validation state. | [optional]
**max** | [**\BhrSdk\Model\LevelsAndBandsPayBandValue**](LevelsAndBandsPayBandValue.md) | Maximum pay band value with its own validation state. | [optional]
**percentage_range** | [**\BhrSdk\Model\LevelsAndBandsPayBandValue**](LevelsAndBandsPayBandValue.md) | Percentage-range pay band value with its own validation state; its &#x60;value&#x60; is null for min-mid-max bands. | [optional]
**currency_code** | **string** |  | [optional]
**compensation_type** | **string** | Compensation type for the level. | [optional]
**job_titles** | [**\BhrSdk\Model\PayGradesAndBandsReviewJobTitle[]**](PayGradesAndBandsReviewJobTitle.md) | Job titles assigned to this level. | [optional]
**errors** | **string[]** | Validation errors for this level. | [optional]
**warnings** | **string[]** | Validation warnings for this level. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
