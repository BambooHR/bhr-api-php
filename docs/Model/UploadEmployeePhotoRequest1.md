# # UploadEmployeePhotoRequest1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**file_base64** | **string** | Base64-encoded image bytes. Same format, size, and dimension rules as the multipart &#x60;file&#x60; field. Supported formats: JPEG, PNG, BMP, GIF. Image must be square within 1 pixel and at least 150×150 pixels. Decoded payload must be no larger than 20MB. This endpoint does not perform cropping, so non-square sources must be cropped before upload. Not recommended for AI connector use, since the base64 payload is too large for an AI model to produce reliably in a single tool call. For AI-initiated photo upload, redirect the user to the BambooHR web UI. Whitespace inside the base64 string is tolerated and stripped before decoding. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
