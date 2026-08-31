# # PayGradesAndBandsConfigurationStatusJobTitles

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_complete** | **bool** | Whether the job titles setup step has been completed. |
**errors** | **string[]** | Blocking issues for the job titles step. Empty when there are none, and also empty when this step has not yet been visited, so an empty array does not necessarily mean there are no outstanding issues. |
**warnings** | [**\BhrSdk\Model\PayGradesAndBandsConfigurationStatusJobTitlesWarningsInner[]**](PayGradesAndBandsConfigurationStatusJobTitlesWarningsInner.md) | Job titles that are not yet assigned to a level. Empty when there are none, and also empty when this step has not yet been visited, so an empty array does not necessarily mean there are no outstanding issues. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
