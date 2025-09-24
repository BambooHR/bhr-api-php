# # TaskAttachmentSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The unique identifier of the attachment, if available. | [optional]
**file_id** | **int** | The unique identifier of the file associated with the attachment. | [optional]
**is_esignature_template** | **bool** | Indicates whether the attachment is an e-signature template. | [optional]
**esignature_instance_id** | **int** | The unique identifier of the e-signature instance associated with the attachment if there is one. | [optional]
**esignature_instance_status** | **string** | The status of the e-signature instance associated with the attachment if there is one. | [optional]
**is_current_signer** | **bool** | Indicates whether the current user is the signer for the e-signature instance if there is one. | [optional]
**is_required** | **bool** | Indicates whether the attachment is required. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
