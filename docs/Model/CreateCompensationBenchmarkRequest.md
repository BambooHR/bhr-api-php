# # CreateCompensationBenchmarkRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**job_title_id** | **string** | ID of the company job title the benchmark applies to. |
**job_location_id** | **string** | Optional job location ID to scope the benchmark to a specific location. | [optional]
**currency_code** | **string** | ISO 4217 currency code for the benchmark values. |
**mjl_job_code** | **string** | Mercer Job Library code associated with this benchmark. Stored on the benchmark as &#x60;mercerJobCode&#x60;. | [optional]
**benchmark_value** | **float** | Benchmark median value. |
**benchmark_min** | **float** | Benchmark minimum value. |
**benchmark_max** | **float** | Benchmark maximum value. |
**benchmark_source** | **string** | Free-text label describing where the benchmark came from. | [optional]
**external_job_title** | **string** |  | [optional]
**external_location** | **string** |  | [optional]
**external_level** | **string** |  | [optional]
**external_job_description** | **string** |  | [optional]
**companies_surveyed** | **int** |  | [optional]
**employees_surveyed** | **int** |  | [optional]
**source_id** | **string** | ID of the benchmark source from &#x60;GET /api/v1/compensation/benchmarks/sources&#x60;. | [optional]
**source_date** | **string** | Date the benchmark source data applies to. | [optional]
**data_year** | **string** | Year of the underlying survey data. | [optional]
**external_country** | **string** |  | [optional]
**external_secondary_location** | **string** |  | [optional]
**external_company_size** | **string** |  | [optional]
**external_industry** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
