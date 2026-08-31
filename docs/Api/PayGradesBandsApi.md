# BhrSdk\PayGradesBandsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteCompensationLevelGroupsOrLevel()**](PayGradesBandsApi.md#deleteCompensationLevelGroupsOrLevel) | **DELETE** /api/v1/pay-grades-and-bands/levels/{segment} | Delete Compensation Level Groups or Level |
| [**getCompensationLevelGroupStatusCounts()**](PayGradesBandsApi.md#getCompensationLevelGroupStatusCounts) | **GET** /api/v1/pay-grades-and-bands/status-counts | Get Compensation Level Group Status Counts |
| [**getJobTitleLevelAssignments()**](PayGradesBandsApi.md#getJobTitleLevelAssignments) | **GET** /api/v1/pay-grades-and-bands/job-titles | Get Job Titles and Level Assignments |
| [**getLevelsAndBandsReview()**](PayGradesBandsApi.md#getLevelsAndBandsReview) | **GET** /api/v1/pay-grades-and-bands/review | Get Levels and Bands Review |
| [**getLevelsAndBandsStatus()**](PayGradesBandsApi.md#getLevelsAndBandsStatus) | **GET** /api/v1/pay-grades-and-bands/status | Get Levels and Bands Status |
| [**getPayBands()**](PayGradesBandsApi.md#getPayBands) | **GET** /api/v1/pay-grades-and-bands/pay-bands | Get Pay Bands |
| [**getPublishedLevelsAndBands()**](PayGradesBandsApi.md#getPublishedLevelsAndBands) | **GET** /api/v1/pay-grades-and-bands | Get Published Levels and Bands |
| [**listCompensationLevelGroupsAndLevels()**](PayGradesBandsApi.md#listCompensationLevelGroupsAndLevels) | **GET** /api/v1/pay-grades-and-bands/levels | List Compensation Level Groups and Levels |
| [**listJobTitlesWithEmployees()**](PayGradesBandsApi.md#listJobTitlesWithEmployees) | **GET** /api/v1/pay-grades-and-bands/job-titles-with-employees | List Job Titles with Employees |
| [**publishDraftCompensationLevelGroups()**](PayGradesBandsApi.md#publishDraftCompensationLevelGroups) | **POST** /api/v1/pay-grades-and-bands/publish | Publish Draft Compensation Level Groups |
| [**replaceJobTitleLevelAssignments()**](PayGradesBandsApi.md#replaceJobTitleLevelAssignments) | **PUT** /api/v1/pay-grades-and-bands/job-titles | Replace Job Title Level Assignments |
| [**updateCompensationLevelGroupsAndLevels()**](PayGradesBandsApi.md#updateCompensationLevelGroupsAndLevels) | **PUT** /api/v1/pay-grades-and-bands/levels | Update Compensation Level Groups and Levels |
| [**updatePayBands()**](PayGradesBandsApi.md#updatePayBands) | **PUT** /api/v1/pay-grades-and-bands/pay-bands | Update Pay Bands |
| [**uploadLevelsAndBandsCsv()**](PayGradesBandsApi.md#uploadLevelsAndBandsCsv) | **POST** /api/v1/pay-grades-and-bands/import | Upload Levels and Bands CSV |


## `deleteCompensationLevelGroupsOrLevel()`

```php
deleteCompensationLevelGroupsOrLevel($segment): \BhrSdk\Model\PayGradesAndBandsDeleteResponse
```

Delete Compensation Level Groups or Level

Deletes compensation level configuration, with the behavior chosen by the `{segment}` path value. When `{segment}` is a group status (`draft`, `published`, or `historic`), every compensation level group in that status is deleted and the response is the object `{\"status\":\"success\"}`; deleting `draft` discards all in-progress edits and is the way to reset the working draft. When `{segment}` is a numeric compensation level ID, only that single level is deleted and the response is the updated groups-and-levels hierarchy, the same object shape returned by List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`). Deleting a numeric level ID that does not exist is a no-op that returns 200 with the unchanged hierarchy. The accepted `{segment}` values are the group lifecycle statuses `draft`, `published`, and `historic`, or a numeric level ID. Discover level IDs with List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`). Edit level and group structure with Update Compensation Level Groups and Levels (`update-compensation-level-groups-and-levels`), and promote draft changes to published with Publish Draft Compensation Level Groups (`publish-draft-compensation-level-groups`). This operation mutates the stored configuration directly and cannot be undone.  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$segment = draft; // string | Selects what to delete. A group status (`draft`, `published`, or `historic`) deletes all compensation level groups in that status; a numeric compensation level ID deletes that single level. Any other value returns 400.

try {
    $result = $apiInstance->deleteCompensationLevelGroupsOrLevel($segment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->deleteCompensationLevelGroupsOrLevel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **segment** | **string**| Selects what to delete. A group status (&#x60;draft&#x60;, &#x60;published&#x60;, or &#x60;historic&#x60;) deletes all compensation level groups in that status; a numeric compensation level ID deletes that single level. Any other value returns 400. | |

### Return type

[**\BhrSdk\Model\PayGradesAndBandsDeleteResponse**](../Model/PayGradesAndBandsDeleteResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompensationLevelGroupStatusCounts()`

```php
getCompensationLevelGroupStatusCounts(): \BhrSdk\Model\LevelsAndBandsGroupStatusCounts
```

Get Compensation Level Group Status Counts

Returns the number of compensation level groups in each lifecycle status. The response is a JSON object of integer counts keyed by status: `draft`, `historic`, and `published`. When a published baseline exists, the `draft` count includes only draft groups that have at least one visited setup step (groups the user has actually started editing), not every draft group; when no published groups exist, it counts all draft groups. Use this for a tally of how many groups sit in each status; for the overall setup configuration status (whether each setup step is complete, with its blocking errors and warnings), use Get Levels and Bands Status (`get-levels-and-bands-status`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompensationLevelGroupStatusCounts();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getCompensationLevelGroupStatusCounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\LevelsAndBandsGroupStatusCounts**](../Model/LevelsAndBandsGroupStatusCounts.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobTitleLevelAssignments()`

```php
getJobTitleLevelAssignments(): \BhrSdk\Model\PayGradesAndBandsJobTitleAssignmentsResponse
```

Get Job Titles and Level Assignments

Returns the working draft configuration showing which job titles are assigned to each compensation level, as used by the pay grades and bands setup wizard. When no draft configuration exists, the endpoint returns the currently published configuration instead. The response is a JSON object with a `groups` array; each group carries its `levels`, and each level lists the `jobTitles` assigned to it alongside its pay band flattened into `min`, `mid`, `max`, and `percentageRange` value objects (each wrapping a numeric `value` plus its own `errors` and `warnings`), `currencyCode`, and `compensationType`. The per-group and per-level `errors` and `warnings` arrays are always empty on this view; job-title assignment issues are reported by Get Levels and Bands Status (`get-levels-and-bands-status`) instead. Each job title carries a job title identifier and its name; no employee data is included. To see which employees currently hold each job title, use List Job Titles with Employees (`list-job-titles-with-employees`) instead. This is a read-only view. For the same group/level tree focused on level configuration use List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`), for pay band values use Get Pay Bands (`get-pay-bands`), and for the published configuration without validation state use Get Published Levels and Bands (`get-published-levels-and-bands`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getJobTitleLevelAssignments();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getJobTitleLevelAssignments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsJobTitleAssignmentsResponse**](../Model/PayGradesAndBandsJobTitleAssignmentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLevelsAndBandsReview()`

```php
getLevelsAndBandsReview(): \BhrSdk\Model\PayGradesAndBandsReviewResponse
```

Get Levels and Bands Review

Returns the pre-publish review of compensation level groups and levels with validation `errors` and `warnings` consolidated across every setup-wizard step: level naming, group-level checks, and pay band values. This reflects the working draft configuration; when no draft exists it falls back to the currently published configuration. Requesting this review marks all setup steps as visited for the draft, which changes subsequent Get Levels and Bands Status (`get-levels-and-bands-status`) results. The response is a JSON object with a `groups` array; each group carries its `levels` plus its own `errors` and `warnings`, and each level flattens its pay band into `min`, `mid`, `max`, and `percentageRange` value objects (each wrapping a numeric `value` with its own `errors` and `warnings`), along with `currencyCode`, `compensationType`, and the `jobTitles` assigned to that level. Use this for the complete validation picture that determines whether the configuration can be published. For the editable draft view that validates level and group issues but not pay band values, use List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`) instead. For the currently published pay grades and bands without any validation state, use Get Published Levels and Bands (`get-published-levels-and-bands`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getLevelsAndBandsReview();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getLevelsAndBandsReview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsReviewResponse**](../Model/PayGradesAndBandsReviewResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLevelsAndBandsStatus()`

```php
getLevelsAndBandsStatus(): \BhrSdk\Model\PayGradesAndBandsConfigurationStatus
```

Get Levels and Bands Status

Returns the configuration status of the Pay Grades & Bands (levels and bands) setup, broken down by setup step. The response is an object with four step keys, `levels`, `payBands`, `jobTitles`, and `review`, each reporting an `isComplete` flag plus `errors` (blocking issues) and `warnings` (non-blocking issues) arrays; the arrays are empty when a step has no outstanding issues. A setup step that has not yet been visited reports `isComplete: false` with empty `errors` and `warnings`, so empty arrays do not necessarily mean the step has no outstanding issues; the step simply has not been evaluated yet. For the `levels`, `payBands`, and `review` steps, each error or warning identifies the offending compensation level group and level; a `levelId` of `0` is a sentinel meaning the issue applies to the group as a whole rather than to a specific level. For `jobTitles`, each warning is a job title that is not yet assigned to a level. Use this to check whether the setup is complete before publishing. For the number of compensation level groups in each status (draft, published, historic), use Get Compensation Level Group Status Counts (`get-compensation-level-group-status-counts`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getLevelsAndBandsStatus();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getLevelsAndBandsStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsConfigurationStatus**](../Model/PayGradesAndBandsConfigurationStatus.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayBands()`

```php
getPayBands(): \BhrSdk\Model\PayGradesAndBandsPayBandsResponse
```

Get Pay Bands

Returns the working draft pay band configuration for every compensation level, including the pay-band-step validation `errors` and `warnings` used by the setup wizard. When no draft configuration exists, the endpoint returns the currently published configuration instead. The response is a JSON object with a `groups` array; each group carries its `levels`, and each level flattens its pay band into `min`, `mid`, `max`, and `percentageRange` value objects (each wrapping a numeric `value` plus its own `errors` and `warnings`), along with `currencyCode`, `compensationType`, and the `jobTitles` assigned to that level. A level is a percentage-based band when `percentageRange.value` is set, and a min-mid-max band when `percentageRange.value` is null. This view surfaces validation for the pay-band setup step; for the same structure with levels-step validation use List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`), and for the published configuration without validation state use Get Published Levels and Bands (`get-published-levels-and-bands`).  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPayBands();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getPayBands: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsPayBandsResponse**](../Model/PayGradesAndBandsPayBandsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPublishedLevelsAndBands()`

```php
getPublishedLevelsAndBands(): \BhrSdk\Model\PayGradesAndBandsPublishedResponse
```

Get Published Levels and Bands

Returns the currently published pay grades and bands as a JSON object with a `groups` array. Each group carries its published compensation levels, and each level flattens its pay band into `min`, `mid`, `max`, `currencyCode`, `percentageRange`, and `compensationType`, plus the job titles assigned to that level. Note the asymmetry: `min`, `mid`, and `max` are plain numbers, while `percentageRange` is an object (`LevelsAndBands-PayBandValue`) carrying its own validation state whose `value` is null for min-mid-max bands. Only published groups are returned; the `groups` array is empty when nothing has been published (this is a status filter, not a permission filter). Unlike the configuration-wizard endpoints, this published view omits the per-group and per-level validation `errors` and `warnings`. For the editable draft configuration with validation state, use List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getPublishedLevelsAndBands();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->getPublishedLevelsAndBands: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsPublishedResponse**](../Model/PayGradesAndBandsPublishedResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompensationLevelGroupsAndLevels()`

```php
listCompensationLevelGroupsAndLevels(): \BhrSdk\Model\PayGradesAndBandsLevelsResponse
```

List Compensation Level Groups and Levels

Returns the working draft configuration of compensation level groups and levels, including the per-group and per-level validation `errors` and `warnings` used by the setup wizard. When no draft configuration exists, the endpoint returns the currently published configuration instead. The response is a JSON object with a `groups` array; each group carries its `levels`, and each level flattens its pay band into `min`, `mid`, `max`, and `percentageRange` value objects (each wrapping a numeric `value` plus its own `errors` and `warnings`), along with `currencyCode`, `compensationType`, and the `jobTitles` assigned to that level. The pay band value objects are returned on this view, but their `errors` and `warnings` are not populated here; pay band values are validated only at review/publish. This is the editable draft/editor view: it reflects in-progress edits and surfaces levels-step validation state. For the same draft structure with pay-band-value validation populated use Get Pay Bands (`get-pay-bands`), and for the consolidated pre-publish validation across every step use Get Levels and Bands Review (`get-levels-and-bands-review`). For the currently published pay grades and bands without validation state, use Get Published Levels and Bands (`get-published-levels-and-bands`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listCompensationLevelGroupsAndLevels();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->listCompensationLevelGroupsAndLevels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsLevelsResponse**](../Model/PayGradesAndBandsLevelsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listJobTitlesWithEmployees()`

```php
listJobTitlesWithEmployees(): \BhrSdk\Model\PayGradesAndBandsJobTitleWithEmployees[]
```

List Job Titles with Employees

Returns every active, non-archived company job title (not only titles used in the pay grades and bands configuration) together with the employees who currently hold each title. The response is a JSON array of job title objects; each carries the job title `id`, its `title` name, and an `employees` array. Each employee entry exposes the internal employee ID (`id` here; the same identifier is `employeeId` on List Employees and `eeid` on the employee dataset) alongside the employee display `name`. This internal employee ID is not the editable Employee # (`employeeNumber`); using `employeeNumber` in its place may resolve to a different employee. An employee is omitted from a title's `employees` array when the authenticated caller lacks permission to view a required employee field (name, job title, or id), so an empty `employees` array does not necessarily mean no one holds that title; it can also mean the caller cannot see the employees who do. The array is empty when no job titles exist. This is a read-only view. Use this to see which employees occupy each job title; for the draft assignment of job titles to compensation levels (which returns no employee data), use Get Job Titles and Level Assignments (`get-job-title-level-assignments`) instead.  OAuth Scopes: pay_grades_and_bands

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listJobTitlesWithEmployees();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->listJobTitlesWithEmployees: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsJobTitleWithEmployees[]**](../Model/PayGradesAndBandsJobTitleWithEmployees.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publishDraftCompensationLevelGroups()`

```php
publishDraftCompensationLevelGroups(): \BhrSdk\Model\PayGradesAndBandsPublishResponse
```

Publish Draft Compensation Level Groups

Publishes the company draft compensation configuration, promoting every draft compensation level group, along with its levels, pay bands, and job-title assignments, to the live published set. Any previously published groups are marked historic in the same operation. This is a bodyless POST that takes no request body and always publishes the entire current draft. Build the draft first with Update Compensation Level Groups and Levels (`update-compensation-level-groups-and-levels`), Update Pay Bands (`update-pay-bands`), and Replace Job Title Level Assignments (`replace-job-title-level-assignments`), then publish. Publishing is rejected with a 400 when the draft has unresolved validation errors or warnings. When no draft exists the call is a no-op and still returns success. On success the response is the JSON object `{\"status\":\"success\"}`. Read the published result back with Get Published Levels and Bands (`get-published-levels-and-bands`).  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->publishDraftCompensationLevelGroups();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->publishDraftCompensationLevelGroups: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\PayGradesAndBandsPublishResponse**](../Model/PayGradesAndBandsPublishResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `replaceJobTitleLevelAssignments()`

```php
replaceJobTitleLevelAssignments($levels_and_bands_job_title_assignments_request): \BhrSdk\Model\PayGradesAndBandsUpdateJobTitlesResponse
```

Replace Job Title Level Assignments

Replaces the complete set of draft job title-to-compensation-level assignments with the associations in the request. This is a full replacement: all existing draft job title assignments are deleted and replaced with those supplied, so any assignment omitted from the request is removed from the draft. Each entry pairs a job title with the compensation level it should map to. This endpoint writes only job-title assignments; define group and level structure with Update Compensation Level Groups and Levels (`update-compensation-level-groups-and-levels`) and set pay band values with Update Pay Bands (`update-pay-bands`). If no draft exists yet, one is created from the published structure and the supplied published level IDs are remapped onto the newly created draft levels, so later reads return draft-specific level IDs. Every target level must belong to a draft group, otherwise the request fails with 400. Discover job title and level IDs with Get Job Titles and Level Assignments (`get-job-title-level-assignments`). Assignments are written to the draft only; publish them with Publish Draft Compensation Level Groups (`publish-draft-compensation-level-groups`). Returns an object with a single `status` field set to `success`.  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$levels_and_bands_job_title_assignments_request = new \BhrSdk\Model\LevelsAndBandsJobTitleAssignmentsRequest(); // \BhrSdk\Model\LevelsAndBandsJobTitleAssignmentsRequest

try {
    $result = $apiInstance->replaceJobTitleLevelAssignments($levels_and_bands_job_title_assignments_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->replaceJobTitleLevelAssignments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **levels_and_bands_job_title_assignments_request** | [**\BhrSdk\Model\LevelsAndBandsJobTitleAssignmentsRequest**](../Model/LevelsAndBandsJobTitleAssignmentsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\PayGradesAndBandsUpdateJobTitlesResponse**](../Model/PayGradesAndBandsUpdateJobTitlesResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCompensationLevelGroupsAndLevels()`

```php
updateCompensationLevelGroupsAndLevels($pay_grades_and_bands_update_levels_request): \BhrSdk\Model\PayGradesAndBandsSaveLevelsResponse
```

Update Compensation Level Groups and Levels

Creates or updates compensation level groups and their levels in the company draft configuration. If no draft exists yet, one is created from the currently published configuration before changes are applied, and published group and level identifiers are mapped to their new draft counterparts. This is a partial upsert. Groups and levels omitted from the request are left unchanged, so it does not overwrite the full set. A group is deleted when its `groupName` is blank or null and it has no levels. A level is deleted when its `levelName` is blank or null and a `levelId` is supplied. Only group and level names and structure are persisted here. The per-level `compensationType` in the request is not applied by this endpoint; a newly created level derives its compensation type from the group's existing compensation type (or `Salary` when the group has none), and existing levels keep their compensation type unchanged. Pay band values (`min`, `mid`, `max`, `percentageRange`, `currencyCode`) and job-title assignments may be present in the payload but are not saved by this endpoint; set pay band values with Update Pay Bands (`update-pay-bands`) and set job-title assignments with Replace Job Title Level Assignments (`replace-job-title-level-assignments`). Changes stay in draft until promoted. Publish them with Publish Draft Compensation Level Groups (`publish-draft-compensation-level-groups`). Read the current draft back with List Compensation Level Groups and Levels (`list-compensation-level-groups-and-levels`). On success the response is a JSON object `{\"status\":\"success\"}`.  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pay_grades_and_bands_update_levels_request = new \BhrSdk\Model\PayGradesAndBandsUpdateLevelsRequest(); // \BhrSdk\Model\PayGradesAndBandsUpdateLevelsRequest

try {
    $result = $apiInstance->updateCompensationLevelGroupsAndLevels($pay_grades_and_bands_update_levels_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->updateCompensationLevelGroupsAndLevels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pay_grades_and_bands_update_levels_request** | [**\BhrSdk\Model\PayGradesAndBandsUpdateLevelsRequest**](../Model/PayGradesAndBandsUpdateLevelsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\PayGradesAndBandsSaveLevelsResponse**](../Model/PayGradesAndBandsSaveLevelsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePayBands()`

```php
updatePayBands($update_pay_bands_request): \BhrSdk\Model\PayGradesAndBandsUpdatePayBandsResponse
```

Update Pay Bands

Updates the pay band values (`min`, `mid`, `max`, `percentageRange`) for compensation levels in the company's draft pay grades and bands. This is the only endpoint that persists pay band values; Update Compensation Level Groups and Levels (`update-compensation-level-groups-and-levels`) defines the group and level structure but does not save band values. Job-title assignments are set separately with Replace Job Title Level Assignments (`replace-job-title-level-assignments`). Supply the level IDs returned by Get Pay Bands (`get-pay-bands`). If no draft exists yet, one is created from the published structure and the supplied published level IDs are remapped onto the newly created draft levels, so later reads return draft-specific level IDs. When `payBandType` is `percentRange`, `min` and `max` are derived from `mid` and `percentageRange` and any supplied `min`/`max` are ignored; when `minMidMax`, the supplied `min`/`mid`/`max` are stored and `percentageRange` is cleared. Every target level must belong to a draft group, otherwise the request fails with 400. Values are written to the draft only; publish them with Publish Draft Compensation Level Groups (`publish-draft-compensation-level-groups`). Returns an object with a single `status` field set to `success`.  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_pay_bands_request = new \BhrSdk\Model\UpdatePayBandsRequest(); // \BhrSdk\Model\UpdatePayBandsRequest

try {
    $result = $apiInstance->updatePayBands($update_pay_bands_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->updatePayBands: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_pay_bands_request** | [**\BhrSdk\Model\UpdatePayBandsRequest**](../Model/UpdatePayBandsRequest.md)|  | |

### Return type

[**\BhrSdk\Model\PayGradesAndBandsUpdatePayBandsResponse**](../Model/PayGradesAndBandsUpdatePayBandsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadLevelsAndBandsCsv()`

```php
uploadLevelsAndBandsCsv($file): \BhrSdk\Model\LevelsAndBandsUploadResponse
```

Upload Levels and Bands CSV

Parses an uploaded levels and bands CSV and returns a preview of the parsed rows along with a suggested column mapping. This validates and previews only; it does not persist anything or create a draft. The response is a JSON object with `uploadData`, an array of row arrays holding the raw cell strings for each data row, and `columnMap`, which pairs each CSV column header with the field it maps to (`expectedColumnKey`), or null when the header is not recognized. Recognized field keys are `groupName`, `levelName`, `min`, `mid`, `max`, `compensationType`, `currency`, and `jobTitles`. Use this to confirm a spreadsheet before writing; to persist the data, build the draft with Update Compensation Level Groups and Levels (`update-compensation-level-groups-and-levels`), Update Pay Bands (`update-pay-bands`), and Replace Job Title Level Assignments (`replace-job-title-level-assignments`), then publish it with Publish Draft Compensation Level Groups (`publish-draft-compensation-level-groups`).  OAuth Scopes: pay_grades_and_bands.write

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\PayGradesBandsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = '/path/to/file.txt'; // \SplFileObject | Levels and bands CSV file to parse and preview.

try {
    $result = $apiInstance->uploadLevelsAndBandsCsv($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayGradesBandsApi->uploadLevelsAndBandsCsv: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| Levels and bands CSV file to parse and preview. | |

### Return type

[**\BhrSdk\Model\LevelsAndBandsUploadResponse**](../Model/LevelsAndBandsUploadResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
