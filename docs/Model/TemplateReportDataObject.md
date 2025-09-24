# # TemplateReportDataObject

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Report ID. | [optional]
**name** | **string** | Report name. | [optional]
**layout** | **int[][]** | Report layout as a two-dimensional array of panel IDs, where each inner array represents a row and each value is a panel ID in that row. | [optional]
**created_ymdt** | **\DateTime** | Report creation timestamp (UTC, Y-m-d H:i:s). | [optional]
**updated_ymdt** | **\DateTime** | Report update timestamp (UTC, Y-m-d H:i:s). | [optional]
**deactivated_ymdt** | **\DateTime** | Timestamp when the template report was deactivated (UTC, Y-m-d H:i:s), or null if active. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
