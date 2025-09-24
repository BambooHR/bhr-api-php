# # ApprovalFlowDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**recommender** | [**\MySdk\Model\RecommenderDataObject**](RecommenderDataObject.md) | The employee who recommends the compensation changes (employeeId can be null if finalApprover is set) | [optional]
**approvers** | [**\MySdk\Model\ApproverDataObject[]**](ApproverDataObject.md) | Collection of approvers mapped by their approval level | [optional]
**is_default** | **bool** | Whether this is the default approval flow | [optional]
**final_approver** | [**\MySdk\Model\FinalApproverDataObject**](FinalApproverDataObject.md) | Optional final approver for the approval flow | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
