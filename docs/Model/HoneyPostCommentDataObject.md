# # HoneyPostCommentDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Comment ID | [optional]
**post_id** | **int** | ID of the post | [optional]
**author_employee_id** | **string** | Bamboo employee ID of the author | [optional]
**author_member_id** | **int** | Member ID of the author | [optional]
**author_user_id** | **int** | User ID of the author | [optional]
**body** | **string** | Comment content | [optional]
**created_at** | **\DateTime** | Creation timestamp | [optional]
**deleted** | **bool** | Whether the comment is deleted | [optional]
**like_count** | **int** | Number of likes | [optional]
**post** | [**\MySdk\Model\HoneyPostDataObject**](HoneyPostDataObject.md) | Post object | [optional]
**files** | [**\MySdk\Model\HoneyPostCommentDataObjectFilesInner[]**](HoneyPostCommentDataObjectFilesInner.md) | Files attached to the comment | [optional]
**liked_at** | **\DateTime** | When the comment was liked | [optional]
**editable** | **bool** | Whether the comment can be edited | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
