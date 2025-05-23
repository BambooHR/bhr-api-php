# # UserSignatureDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**user_flag_id** | **int** | Unique identifier for the user flag | [optional]
**type** | **string** | Type of the signature (signature or initials) |
**data_type** | **string** | Format of the signature data (text or image) |
**file_id** | **int** | ID of the file containing the signature image | [optional]
**text** | **string** | Text content when dataType is text | [optional]
**active** | **bool** | Whether the signature is active | [default to true]
**file_blob_data** | **string** | Base64 encoded image data | [optional]
**using_new_format** | **bool** | Flag indicating if using the new signature format | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
