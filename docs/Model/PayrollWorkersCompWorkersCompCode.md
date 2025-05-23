# # PayrollWorkersCompWorkersCompCode

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique identifier for the workers&#39; compensation code | [optional]
**client_id** | **int** | Client ID the code belongs to | [optional]
**code** | **string** | Workers&#39; compensation code identifier | [optional]
**state** | **string** | Two-letter US state code | [optional]
**description** | **string** | Description of the workers&#39; compensation code | [optional]
**active** | **bool** | Whether the code is active | [optional]
**washington_labor** | **bool** | Whether the code is a Washington Labor and Industries tax (displayed as a dollar amount) | [optional]
**rates** | [**\MySdk\Model\PayrollWorkersCompWorkersCompRate[]**](PayrollWorkersCompWorkersCompRate.md) | List of rates associated with this code | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
