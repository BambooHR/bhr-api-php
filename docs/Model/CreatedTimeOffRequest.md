# # CreatedTimeOffRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The newly created time off request ID. Use this to chain follow-up operations such as approving, canceling, or superseding the request. | [optional]
**employee_id** | **int** | The ID of the employee the request was created for. | [optional]
**name** | **string** | The employee&#39;s full name. Only present when the employee record could be loaded. | [optional]
**start** | **\DateTime** | The start date of the request in YYYY-MM-DD format. | [optional]
**end** | **\DateTime** | The end date of the request in YYYY-MM-DD format. | [optional]
**created** | **\DateTime** | The date the request was created in YYYY-MM-DD format (company timezone). | [optional]
**status** | [**\BhrSdk\Model\CreatedTimeOffRequestStatus**](CreatedTimeOffRequestStatus.md) |  | [optional]
**type** | [**\BhrSdk\Model\CreatedTimeOffRequestType**](CreatedTimeOffRequestType.md) |  | [optional]
**amount** | [**\BhrSdk\Model\CreatedTimeOffRequestAmount**](CreatedTimeOffRequestAmount.md) |  | [optional]
**dates** | **array<string,float>** | A map of dates (YYYY-MM-DD) to daily amounts. Only present when daily details were attached to the request. | [optional]
**notes** | [**\BhrSdk\Model\CreatedTimeOffRequestNotes**](CreatedTimeOffRequestNotes.md) |  | [optional]
**comments** | **object[]** | Comments attached to the request. Always present; empty array when no comments exist. | [optional]
**approvers** | **array[]** | The approval chain for this request. Only present when the request has approvers. | [optional]
**actions** | **array<string,bool>** | Actions the current user can perform on this request. Only present when PTO action permissions are available. Keys are restricted to &#x60;view&#x60;, &#x60;edit&#x60;, &#x60;cancel&#x60;, &#x60;approve&#x60;, &#x60;deny&#x60;, &#x60;bypass&#x60;; values are booleans. | [optional]
**overlapping_requests** | **object[]** | Other existing time off requests whose date ranges overlap this request. Only present when overlap data was loaded with the request. | [optional]
**policy_type** | **string** | The policy type backing this request (e.g. accruing, manual, unlimited). | [optional]
**used_year_to_date** | **float** |  | [optional]
**balance_on_date_of_request** | **float** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
