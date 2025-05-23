# # ImplementationGuideServiceRequestDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**service_type** | **string** | A valid SERVICE_* type | [optional]
**step_type** | **string** | A valid step type | [optional]
**sub_step_key** | **string** | A valid sub step key | [optional]
**options** | **object** | A free-form associative array of options (perhaps querystring) | [optional]
**require_perms** | **bool** | Require permission check by default. Set to false if calling from system process (cron or event). | [optional]
**service_id** | **int** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
