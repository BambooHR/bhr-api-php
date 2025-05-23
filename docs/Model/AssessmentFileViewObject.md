# # AssessmentFileViewObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Unique identifier of the assessment file | [optional]
**name** | **string** | Name of the file | [optional]
**original_file_name** | **string** | Original file name when uploaded | [optional]
**created** | **string** | Creation timestamp of the file | [optional]
**mime_type** | **string** | MIME type of the file | [optional]
**description** | **string** | Description of the file | [optional]
**can_delete** | **bool** | Whether the current user can delete this file | [optional]
**size** | **int** | Size of the file in bytes | [optional]
**employee_id** | **string** | ID of the employee associated with this file | [optional]
**created_user_id** | **string** | ID of the user who created the file | [optional]
**file_data_id** | **string** | ID of the associated file data | [optional]
**file_preview_type** | **string** | Type of file preview to display | [optional] [default to 'default']
**type** | **string[]** | Array of file type classifications | [optional]
**image_icon** | **string** | Icon representing the file type | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
