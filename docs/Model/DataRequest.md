# # DataRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fields** | **string[]** | Field names to include in each returned record. Use \&quot;Get Fields from Dataset\&quot; to discover available names. |
**aggregations** | [**\BhrSdk\Model\DataRequestAggregations**](DataRequestAggregations.md) |  | [optional]
**sort_by** | [**\BhrSdk\Model\DataRequestSortByInner[]**](DataRequestSortByInner.md) | Ordered list of sort rules. Priority follows array order. Include aggregationType when sorting by an aggregated value in a grouped request; it must match an aggregation requested for the same field. | [optional]
**filters** | [**\BhrSdk\Model\DataRequestFilters**](DataRequestFilters.md) |  | [optional]
**group_by** | **string[]** | Field names to group results by. Currently supports only one field. When grouping is active, the &#x60;data&#x60; key in the response becomes an object keyed by group value instead of an array. | [optional]
**show_history** | **string[]** | Entity names of historical table fields whose history rows should be included. Entity names are returned by \&quot;Get Fields from Dataset\&quot;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
