# # PayGradesAndBandsConfigurationStatusLevels

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_complete** | **bool** | Whether the levels setup step has been completed. |
**errors** | [**\BhrSdk\Model\PayGradesAndBandsConfigurationStatusLevelsErrorsInner[]**](PayGradesAndBandsConfigurationStatusLevelsErrorsInner.md) | Blocking issues preventing this step from completing. Empty when there are none, and also empty when this step has not yet been visited, so an empty array does not necessarily mean there are no outstanding issues. |
**warnings** | [**\BhrSdk\Model\PayGradesAndBandsConfigurationStatusLevelsErrorsInner[]**](PayGradesAndBandsConfigurationStatusLevelsErrorsInner.md) | Non-blocking issues flagged for this step. Empty when there are none, and also empty when this step has not yet been visited, so an empty array does not necessarily mean there are no outstanding issues. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
