# # GetDataFromDatasetV2Request

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fields** | **string[]** | Field names to return for each row. Names are dataset-specific; discover valid names via Get Fields from Dataset (v1.2) (&#x60;get-fields-from-dataset-v1-2&#x60;). The field-name vocabulary differs from the dedicated employee endpoints (e.g., the &#x60;employee&#x60; dataset uses &#x60;jobInformationReportsTo&#x60; / &#x60;jobInformationDepartment&#x60; / &#x60;employmentStatus&#x60; rather than List Employees&#39; &#x60;reportsTo&#x60; / &#x60;department&#x60; / &#x60;status&#x60;). |
**filter** | **string** |  | [optional]
**order_by** | **string** |  | [optional]
**page** | **int** | Page number to retrieve (1-indexed). Defaults to 1. | [optional] [default to 1]
**page_size** | **int** | Number of records per page. Defaults to 100. Maximum is 1000. | [optional] [default to 100]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
