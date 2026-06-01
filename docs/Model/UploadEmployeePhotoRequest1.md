# # UploadEmployeePhotoRequest1

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**file_base64** | **string** | Base64-encoded image bytes. Same format/size/dimension rules as the multipart &#x60;file&#x60; field: JPEG, PNG, BMP, or GIF (HEIC, SVG, AVIF, and WebP are rejected with 415; TIFF is accepted by the format gate but some variants may fail downstream); square within 1 pixel; at least 150×150 pixels; decoded payload no larger than 20MB. Whitespace inside the base64 string is tolerated and stripped before decoding. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
