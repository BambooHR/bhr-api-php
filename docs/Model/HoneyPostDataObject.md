# # HoneyPostDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Post ID | [optional]
**uuid** | **string** | Unique identifier for the post | [optional]
**title** | **string** | Post title | [optional]
**body** | **string** | Post content | [optional]
**body_parsed** | **string** | Parsed post content | [optional]
**summary** | **string** | Post summary | [optional]
**created_at** | [**\MySdk\Model\HoneyPollDataObjectCreatedAt**](HoneyPollDataObjectCreatedAt.md) |  | [optional]
**publish_at** | [**\MySdk\Model\HoneyPostDataObjectPublishAt**](HoneyPostDataObjectPublishAt.md) |  | [optional]
**status** | **string** | Post status | [optional]
**confirmations_enabled** | **bool** | Whether confirmations are enabled | [optional]
**like_count** | **int** | Number of likes | [optional]
**comment_count** | **int** | Number of comments | [optional]
**view_count** | **int** | Number of views | [optional]
**confirmation_count** | **int** | Number of confirmations | [optional]
**confirmation_member_count** | **int** | Number of members who confirmed | [optional]
**liked** | **bool** | Whether the post is liked by current user | [optional]
**saved** | **bool** | Whether the post is saved by current user | [optional]
**pinned** | **bool** | Whether the post is pinned | [optional]
**user_unpinned** | **bool** | Whether the post is unpinned by user | [optional]
**muted** | **bool** | Whether the post is muted | [optional]
**viewed** | **bool** | Whether the post is viewed | [optional]
**confirmable** | **bool** | Whether the post can be confirmed | [optional]
**confirmed** | **bool** | Whether the post is confirmed | [optional]
**announced** | **bool** | Whether the post is announced | [optional]
**announced_at** | [**\MySdk\Model\HoneyPostDataObjectAnnouncedAt**](HoneyPostDataObjectAnnouncedAt.md) |  | [optional]
**editable** | **bool** | Whether the post can be edited | [optional]
**author_id** | **int** | ID of the author | [optional]
**author_employee_id** | **string** | Employee ID of the author | [optional]
**groups** | [**\MySdk\Model\HoneyGroupDataObject[]**](HoneyGroupDataObject.md) | Groups associated with the post | [optional]
**group_ids** | **int[]** | IDs of groups associated with the post | [optional]
**topic_ids** | **int[]** | IDs of topics associated with the post | [optional]
**components** | **object[]** | Components of the post | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
