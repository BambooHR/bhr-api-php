# # HoneyPollDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Poll ID | [optional]
**member_id** | **string** | Member ID | [optional]
**created_at** | [**\MySdk\Model\HoneyPollDataObjectCreatedAt**](HoneyPollDataObjectCreatedAt.md) |  | [optional]
**results_at** | [**\MySdk\Model\HoneyPollDataObjectResultsAt**](HoneyPollDataObjectResultsAt.md) |  | [optional]
**is_private** | **bool** | Whether the poll is private | [optional]
**is_anonymous** | **bool** | Whether the poll is anonymous | [optional]
**has_votes** | **bool** | Whether the poll has votes | [optional]
**question** | **string** | Poll question | [optional]
**options** | [**\MySdk\Model\HoneyPollDataObjectOptionsInner[]**](HoneyPollDataObjectOptionsInner.md) | Poll options | [optional]
**has_member_voted** | **bool** | Whether the current member has voted | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
