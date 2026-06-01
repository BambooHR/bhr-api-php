# BhrSdk\GoalsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**closeGoal()**](GoalsApi.md#closeGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal |
| [**createGoal()**](GoalsApi.md#createGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal |
| [**createGoalComment()**](GoalsApi.md#createGoalComment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment |
| [**deleteGoal()**](GoalsApi.md#deleteGoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal |
| [**deleteGoalComment()**](GoalsApi.md#deleteGoalComment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment |
| [**getAlignableGoalOptions()**](GoalsApi.md#getAlignableGoalOptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Get Alignable Goal Options |
| [**getGoalAggregate()**](GoalsApi.md#getGoalAggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Goal Aggregate |
| [**getGoalCreationPermission()**](GoalsApi.md#getGoalCreationPermission) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Get Goal Creation Permission |
| [**getGoalsAggregateV1()**](GoalsApi.md#getGoalsAggregateV1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1) |
| [**getGoalsAggregateV11()**](GoalsApi.md#getGoalsAggregateV11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1.1) |
| [**getGoalsAggregateV12()**](GoalsApi.md#getGoalsAggregateV12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1.2) |
| [**getGoalsFiltersV1()**](GoalsApi.md#getGoalsFiltersV1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1) |
| [**getGoalsFiltersV11()**](GoalsApi.md#getGoalsFiltersV11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1.1) |
| [**getGoalsFiltersV12()**](GoalsApi.md#getGoalsFiltersV12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1.2) |
| [**listGoalComments()**](GoalsApi.md#listGoalComments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | List Goal Comments |
| [**listGoalShareOptions()**](GoalsApi.md#listGoalShareOptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | List Goal Sharing Options |
| [**listGoals()**](GoalsApi.md#listGoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | List Goals |
| [**reopenGoal()**](GoalsApi.md#reopenGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen Goal |
| [**updateGoalComment()**](GoalsApi.md#updateGoalComment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment |
| [**updateGoalMilestoneProgress()**](GoalsApi.md#updateGoalMilestoneProgress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress |
| [**updateGoalProgress()**](GoalsApi.md#updateGoalProgress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress |
| [**updateGoalSharing()**](GoalsApi.md#updateGoalSharing) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing |
| [**updateGoalV1()**](GoalsApi.md#updateGoalV1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal (v1) |
| [**updateGoalV11()**](GoalsApi.md#updateGoalV11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal (v1.1) |


## `closeGoal()`

```php
closeGoal($employee_id, $goal_id, $close_goal_request): \BhrSdk\Model\GoalResponse
```

Close Goal

Closes a goal, moving it to the closed status. An optional comment may be included in the request body to record a note at closing time. Returns the updated goal object. Validate the result using the returned `status`, `percentComplete`, and `completionDate` fields; do not rely solely on `lastChangedDateTime` as the confirmation timestamp, because it may not match the HTTP response time or may reflect BambooHR's internal timezone/update semantics. Note: Cascading goals with visible children cannot be closed.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$close_goal_request = new \BhrSdk\Model\CloseGoalRequest(); // \BhrSdk\Model\CloseGoalRequest | An optional comment to record when closing the goal.

try {
    $result = $apiInstance->closeGoal($employee_id, $goal_id, $close_goal_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->closeGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **close_goal_request** | [**\BhrSdk\Model\CloseGoalRequest**](../Model/CloseGoalRequest.md)| An optional comment to record when closing the goal. | [optional] |

### Return type

[**\BhrSdk\Model\GoalResponse**](../Model/GoalResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createGoal()`

```php
createGoal($employee_id, $create_goal_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Create Goal

Create a new goal for an employee. To create a simple goal without milestones, omit the `milestones` field; the goal's progress can then be changed with `update-goal-progress`. To create a milestone-based goal, provide `milestones` as a non-empty array of `{ \"title\": string }` objects; the goal's percent complete is then derived from milestone completion and should be changed via `update-goal-milestone-progress`. Sending `milestones: null` is treated as omitted (creates a simple goal).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$create_goal_request = new \BhrSdk\Model\CreateGoalRequest(); // \BhrSdk\Model\CreateGoalRequest

try {
    $result = $apiInstance->createGoal($employee_id, $create_goal_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->createGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **create_goal_request** | [**\BhrSdk\Model\CreateGoalRequest**](../Model/CreateGoalRequest.md)|  | |

### Return type

[**\BhrSdk\Model\TransformedApiEmployeeGoalDetails**](../Model/TransformedApiEmployeeGoalDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createGoalComment()`

```php
createGoalComment($employee_id, $goal_id, $create_goal_comment_request): \BhrSdk\Model\GoalCommentResponse
```

Create Goal Comment

Creates a new comment on a goal. The goal must belong to the specified employee. Returns the newly created comment object including its assigned ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$create_goal_comment_request = new \BhrSdk\Model\CreateGoalCommentRequest(); // \BhrSdk\Model\CreateGoalCommentRequest

try {
    $result = $apiInstance->createGoalComment($employee_id, $goal_id, $create_goal_comment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->createGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **create_goal_comment_request** | [**\BhrSdk\Model\CreateGoalCommentRequest**](../Model/CreateGoalCommentRequest.md)|  | |

### Return type

[**\BhrSdk\Model\GoalCommentResponse**](../Model/GoalCommentResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteGoal()`

```php
deleteGoal($employee_id, $goal_id)
```

Delete Goal

Permanently deletes a goal for an employee. The goal must belong to the specified employee. Returns 204 with no response body on success. For natural-language requests that identify a goal by title or partial title, first call `list-goals` with `filter=status-all` and resolve exactly one matching goal. Do not delete if there are multiple matches or no match; ask for clarification or report that the goal was not found.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | The exact goal ID for the specified employee. Do not infer this from a partial title unless you have resolved a single matching goal via `list-goals`.

try {
    $apiInstance->deleteGoal($employee_id, $goal_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->deleteGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| The exact goal ID for the specified employee. Do not infer this from a partial title unless you have resolved a single matching goal via &#x60;list-goals&#x60;. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteGoalComment()`

```php
deleteGoalComment($employee_id, $goal_id, $comment_id)
```

Delete Goal Comment

Deletes a goal comment. The comment must belong to the specified goal, and the goal must belong to the specified employee. Returns 204 with no response body on success. If the user does not provide a comment ID, first call `list-goal-comments` and select a single deletable comment (`canDelete` is true) matching the user's description. If multiple comments match or none are deletable, do not delete; ask for clarification.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$comment_id = 'comment_id_example'; // string | commentId is the ID of a specific comment for the specified goal.

try {
    $apiInstance->deleteGoalComment($employee_id, $goal_id, $comment_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->deleteGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **comment_id** | **string**| commentId is the ID of a specific comment for the specified goal. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAlignableGoalOptions()`

```php
getAlignableGoalOptions($employee_id, $goal_id): \BhrSdk\Model\AlignmentOptionsResponse
```

Get Alignable Goal Options

Returns goals that can be used as alignment targets. When a `goalId` query parameter is provided, the currently aligned goal is included in the results even if it would otherwise be excluded. When `goalId` is omitted, returns alignment options for the API user. This endpoint is permission-sensitive: the caller may be able to view a goal through `list-goals` or `get-goal-aggregate` but still receive 403 here if they lack permission to view alignment options for the selected goal. Treat 403 as \"alignment options are permission-restricted,\" not as proof that the goal ID is invalid.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get alignable goal options for.
$goal_id = 56; // int | Optional goal ID whose current alignment should be included in the results. Only pass a goal ID that belongs to the specified employee. If this endpoint returns 403 for an otherwise visible goal, report that alignment options are restricted by permissions rather than treating the goal ID as invalid.

try {
    $result = $apiInstance->getAlignableGoalOptions($employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getAlignableGoalOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to get alignable goal options for. | |
| **goal_id** | **int**| Optional goal ID whose current alignment should be included in the results. Only pass a goal ID that belongs to the specified employee. If this endpoint returns 403 for an otherwise visible goal, report that alignment options are restricted by permissions rather than treating the goal ID as invalid. | [optional] |

### Return type

[**\BhrSdk\Model\AlignmentOptionsResponse**](../Model/AlignmentOptionsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalAggregate()`

```php
getGoalAggregate($employee_id, $goal_id): \BhrSdk\Model\GoalAggregate
```

Get Goal Aggregate

Returns a single goal with its comments, alignment options, and a list of all persons who are either shared on the goal or have commented on it. Useful for rendering a full goal detail view in a single request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the Goal ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalAggregate($employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalAggregate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the Goal ID used to generate the aggregate information. | |

### Return type

[**\BhrSdk\Model\GoalAggregate**](../Model/GoalAggregate.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalCreationPermission()`

```php
getGoalCreationPermission($employee_id): \BhrSdk\Model\CanCreateGoalsResponse
```

Get Goal Creation Permission

Determine if the API user has permission to create a goal for this employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.

try {
    $result = $apiInstance->getGoalCreationPermission($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalCreationPermission: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |

### Return type

[**\BhrSdk\Model\CanCreateGoalsResponse**](../Model/CanCreateGoalsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV1()`

```php
getGoalsAggregateV1($employee_id, $filter): \BhrSdk\Model\GoalsAggregateV1
```

Get Goals Aggregate (v1)

Deprecated. Use \"Get Goals Aggregate (v1.1)\" instead. Provides a list of all goals, type counts, goal comment counts, and employees shared with goals for the given employee. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.
$filter = 'filter_example'; // string | Filter goals by status. Accepts filter IDs returned by the filters endpoint (e.g. status-inProgress). If omitted or invalid, defaults to the first available filter. The API accepts arbitrary strings and returns 200.

try {
    $result = $apiInstance->getGoalsAggregateV1($employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |
| **filter** | **string**| Filter goals by status. Accepts filter IDs returned by the filters endpoint (e.g. status-inProgress). If omitted or invalid, defaults to the first available filter. The API accepts arbitrary strings and returns 200. | [optional] |

### Return type

[**\BhrSdk\Model\GoalsAggregateV1**](../Model/GoalsAggregateV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV11()`

```php
getGoalsAggregateV11($employee_id, $filter): \BhrSdk\Model\GoalsAggregateV11
```

Get Goals Aggregate (v1.1)

Deprecated. Use \"Get Goals Aggregate (v1.2)\" instead. Provides a list of all goals, type counts, filter actions, goal comment counts, and employees shared with goals for the given employee. Note: Compared to \"Get Goals Aggregate (v1)\", this version returns goals in the closed filter and provides filter actions for each filter. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.
$filter = 'filter_example'; // string | Filter goals by status. Accepts filter IDs returned by the filters endpoint (e.g. status-inProgress). If omitted or invalid, defaults to the first available filter. The API accepts arbitrary strings and returns 200.

try {
    $result = $apiInstance->getGoalsAggregateV11($employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |
| **filter** | **string**| Filter goals by status. Accepts filter IDs returned by the filters endpoint (e.g. status-inProgress). If omitted or invalid, defaults to the first available filter. The API accepts arbitrary strings and returns 200. | [optional] |

### Return type

[**\BhrSdk\Model\GoalsAggregateV11**](../Model/GoalsAggregateV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV12()`

```php
getGoalsAggregateV12($employee_id, $filter): \BhrSdk\Model\GoalsAggregateV12
```

Get Goals Aggregate (v1.2)

Provides a goals dashboard for an employee: goals matching the selected filter, status filter counts/actions, comment counts, and people shared with or commenting on those goals. This v1.2 endpoint includes milestone-based goals in the returned goal list. Use the optional `filter` query parameter to control which statuses are included; use `status-all` when the user asks for a complete dashboard across active, completed, and closed goals. Note: Compared to \"Get Goals Aggregate (v1.1)\", this version returns goals that contain milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID used to generate the aggregate information.
$filter = 'filter_example'; // string | Optional status filter for the goals collection in the aggregate response. Use `status-all` for a full dashboard across statuses; otherwise pass `status-inProgress`, `status-completed`, or `status-closed`. If omitted or invalid, defaults to the first available filter. The response's `filters` counts may include statuses beyond the selected goal list.

try {
    $result = $apiInstance->getGoalsAggregateV12($employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV12: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID used to generate the aggregate information. | |
| **filter** | **string**| Optional status filter for the goals collection in the aggregate response. Use &#x60;status-all&#x60; for a full dashboard across statuses; otherwise pass &#x60;status-inProgress&#x60;, &#x60;status-completed&#x60;, or &#x60;status-closed&#x60;. If omitted or invalid, defaults to the first available filter. The response&#39;s &#x60;filters&#x60; counts may include statuses beyond the selected goal list. | [optional] |

### Return type

[**\BhrSdk\Model\GoalsAggregateV12**](../Model/GoalsAggregateV12.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV1()`

```php
getGoalsFiltersV1($employee_id): \BhrSdk\Model\GoalFiltersV1
```

Get Goal Filters (v1)

Deprecated. Use \"Get Goal Filters (v1.1)\" instead. Get the number of goals per status for an employee. Returns a count of goals in each status (In Progress, Completed) for the specified employee. Goals with milestones are excluded from counts in this version.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV1($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\BhrSdk\Model\GoalFiltersV1**](../Model/GoalFiltersV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV11()`

```php
getGoalsFiltersV11($employee_id): \BhrSdk\Model\GoalFiltersV11
```

Get Goal Filters (v1.1)

Deprecated. Use \"Get Goal Filters (v1.2)\" instead. Get the number of goals per status for an employee. Note: Compared to \"Get Goal Filters (v1)\", this version includes actions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV11($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\BhrSdk\Model\GoalFiltersV11**](../Model/GoalFiltersV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV12()`

```php
getGoalsFiltersV12($employee_id): \BhrSdk\Model\GoalFiltersV11
```

Get Goal Filters (v1.2)

Get the number of goals per status for an employee, including goals with milestones. Note: Compared to \"Get Goal Filters (v1.1)\", this version returns goals with milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV12($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV12: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\BhrSdk\Model\GoalFiltersV11**](../Model/GoalFiltersV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listGoalComments()`

```php
listGoalComments($employee_id, $goal_id): \BhrSdk\Model\GoalCommentsResponse
```

List Goal Comments

Returns comments for a goal, including each comment's ID, author, text, creation time, and edit/delete permissions. Use this endpoint before updating or deleting a comment when the user identifies a comment by text or says \"my comment\" rather than providing a comment ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $result = $apiInstance->listGoalComments($employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->listGoalComments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

[**\BhrSdk\Model\GoalCommentsResponse**](../Model/GoalCommentsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listGoalShareOptions()`

```php
listGoalShareOptions($employee_id, $search, $limit): \BhrSdk\Model\ShareOptionsResponse
```

List Goal Sharing Options

Provides a list of employees with whom the specified employee\\'s goals may be shared.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get sharing options for.
$search = 'search_example'; // string | The search term used to filter employees returned. Will search name, employee ID and email.
$limit = 10; // int | Maximum number of employees to return. Defaults to 10, maximum 100.

try {
    $result = $apiInstance->listGoalShareOptions($employee_id, $search, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->listGoalShareOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to get sharing options for. | |
| **search** | **string**| The search term used to filter employees returned. Will search name, employee ID and email. | |
| **limit** | **int**| Maximum number of employees to return. Defaults to 10, maximum 100. | [optional] [default to 10] |

### Return type

[**\BhrSdk\Model\ShareOptionsResponse**](../Model/ShareOptionsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listGoals()`

```php
listGoals($employee_id, $filter): \BhrSdk\Model\GoalsList
```

List Goals

Returns goals for an employee. Use this endpoint to locate goals by title before updating, commenting on, closing, reopening, or deleting them. Use `filter=status-inProgress` when the user asks for current/active goals, `filter=status-completed` for completed goals, `filter=status-closed` for closed goals, and `filter=status-all` when the user says \"all goals\", \"including closed\", or you are resolving a goal by title for a write operation where the status is unknown. If no filter is provided, closed goals are excluded. Results are capped at 50 goals; if a title lookup is ambiguous or absent, do not update or delete a different goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$filter = 'filter_example'; // string | Goal status filter. Use `status-inProgress` for current active goals, `status-completed` for completed goals, `status-closed` for closed goals, and `status-all` when locating a goal by title for update/delete/reopen or when the user asks for all goals. If omitted, closed goals are excluded. Unrecognized values behave like omission.

try {
    $result = $apiInstance->listGoals($employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->listGoals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **filter** | **string**| Goal status filter. Use &#x60;status-inProgress&#x60; for current active goals, &#x60;status-completed&#x60; for completed goals, &#x60;status-closed&#x60; for closed goals, and &#x60;status-all&#x60; when locating a goal by title for update/delete/reopen or when the user asks for all goals. If omitted, closed goals are excluded. Unrecognized values behave like omission. | [optional] |

### Return type

[**\BhrSdk\Model\GoalsList**](../Model/GoalsList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `reopenGoal()`

```php
reopenGoal($employee_id, $goal_id): \BhrSdk\Model\GoalResponse
```

Reopen Goal

Reopens a closed goal, returning it to the in-progress status. Returns the updated goal object. Validate the result using the returned `status` and `percentComplete` fields; do not rely solely on `lastChangedDateTime` as the confirmation timestamp, because it may not match the HTTP response time or may reflect BambooHR's internal timezone/update semantics.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $result = $apiInstance->reopenGoal($employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->reopenGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

[**\BhrSdk\Model\GoalResponse**](../Model/GoalResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalComment()`

```php
updateGoalComment($employee_id, $goal_id, $comment_id, $update_goal_comment_request): \BhrSdk\Model\GoalCommentResponse
```

Update Goal Comment

Updates the text of an existing goal comment. The comment must belong to the specified goal, and the goal must belong to the specified employee. Returns the updated comment object. If the user does not provide a comment ID, first call `list-goal-comments` and select a single editable comment (`canEdit` is true) matching the user's description. If multiple comments match or none are editable, do not update; ask for clarification.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$comment_id = 'comment_id_example'; // string | commentId is the comment ID for the specified goal.
$update_goal_comment_request = new \BhrSdk\Model\UpdateGoalCommentRequest(); // \BhrSdk\Model\UpdateGoalCommentRequest

try {
    $result = $apiInstance->updateGoalComment($employee_id, $goal_id, $comment_id, $update_goal_comment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **comment_id** | **string**| commentId is the comment ID for the specified goal. | |
| **update_goal_comment_request** | [**\BhrSdk\Model\UpdateGoalCommentRequest**](../Model/UpdateGoalCommentRequest.md)|  | |

### Return type

[**\BhrSdk\Model\GoalCommentResponse**](../Model/GoalCommentResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalMilestoneProgress()`

```php
updateGoalMilestoneProgress($employee_id, $goal_id, $milestone_id, $update_goal_milestone_progress_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Milestone Progress

Update the progress of a milestone in a goal. Validate the result using returned domain fields such as the milestone's `completedDateTime`, plus the goal's `status` and `percentComplete`; do not rely solely on `lastChangedDateTime` as the confirmation timestamp, because it may not match the HTTP response time or may reflect BambooHR's internal timezone/update semantics.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$milestone_id = 'milestone_id_example'; // string | milestoneId is the milestone ID for the specified goal.
$update_goal_milestone_progress_request = new \BhrSdk\Model\UpdateGoalMilestoneProgressRequest(); // \BhrSdk\Model\UpdateGoalMilestoneProgressRequest

try {
    $result = $apiInstance->updateGoalMilestoneProgress($employee_id, $goal_id, $milestone_id, $update_goal_milestone_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalMilestoneProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **milestone_id** | **string**| milestoneId is the milestone ID for the specified goal. | |
| **update_goal_milestone_progress_request** | [**\BhrSdk\Model\UpdateGoalMilestoneProgressRequest**](../Model/UpdateGoalMilestoneProgressRequest.md)|  | |

### Return type

[**\BhrSdk\Model\TransformedApiEmployeeGoalDetails**](../Model/TransformedApiEmployeeGoalDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalProgress()`

```php
updateGoalProgress($employee_id, $goal_id, $update_goal_progress_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal Progress

Update the progress percentage of a simple, non-milestone goal. Do not use this endpoint for goals that contain milestones; BambooHR derives percent complete for milestone-based goals from milestone completion and will reject manual percent updates with a 400 response (`UPDATE_GOAL_WITH_MILESTONE_PROGRESS_ERROR`). For milestone-based goals, use `update-goal-milestone-progress` to mark individual milestones complete or incomplete.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$update_goal_progress_request = new \BhrSdk\Model\UpdateGoalProgressRequest(); // \BhrSdk\Model\UpdateGoalProgressRequest | The updated progress for a simple goal. Provide `percentComplete` from 0–100. When `percentComplete` is 100, provide `completionDate`; when less than 100, omit `completionDate` or set it to null. This endpoint is rejected for goals with milestones — use `update-goal-milestone-progress` instead.

try {
    $result = $apiInstance->updateGoalProgress($employee_id, $goal_id, $update_goal_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **update_goal_progress_request** | [**\BhrSdk\Model\UpdateGoalProgressRequest**](../Model/UpdateGoalProgressRequest.md)| The updated progress for a simple goal. Provide &#x60;percentComplete&#x60; from 0–100. When &#x60;percentComplete&#x60; is 100, provide &#x60;completionDate&#x60;; when less than 100, omit &#x60;completionDate&#x60; or set it to null. This endpoint is rejected for goals with milestones — use &#x60;update-goal-milestone-progress&#x60; instead. | |

### Return type

[**\BhrSdk\Model\TransformedApiEmployeeGoalDetails**](../Model/TransformedApiEmployeeGoalDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalSharing()`

```php
updateGoalSharing($employee_id, $goal_id, $update_goal_sharing_request): \BhrSdk\Model\GoalResponse
```

Update Goal Sharing

Replaces the full list of employees this goal is shared with. The provided `sharedWithEmployeeIds` array must include the goal owner's employee ID. Returns the updated goal object.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$update_goal_sharing_request = new \BhrSdk\Model\UpdateGoalSharingRequest(); // \BhrSdk\Model\UpdateGoalSharingRequest | Employee IDs of employees with whom the goal is shared. All goal owners are considered \"shared with\".

try {
    $result = $apiInstance->updateGoalSharing($employee_id, $goal_id, $update_goal_sharing_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalSharing: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **update_goal_sharing_request** | [**\BhrSdk\Model\UpdateGoalSharingRequest**](../Model/UpdateGoalSharingRequest.md)| Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. | |

### Return type

[**\BhrSdk\Model\GoalResponse**](../Model/GoalResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalV1()`

```php
updateGoalV1($employee_id, $goal_id, $update_goal_v1): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal (v1)

Deprecated. Use \"Update Goal (v1.1)\" instead. Update a goal. This version will not update a goal to contain milestones, that functionality is added in version 1.1.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$update_goal_v1 = new \BhrSdk\Model\UpdateGoalV1(); // \BhrSdk\Model\UpdateGoalV1 | Required fields: title, sharedWithEmployeeIds, dueDate. Omitted optional fields overwrite existing values using the endpoint's default behavior; see individual field descriptions for details.

try {
    $result = $apiInstance->updateGoalV1($employee_id, $goal_id, $update_goal_v1);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **update_goal_v1** | [**\BhrSdk\Model\UpdateGoalV1**](../Model/UpdateGoalV1.md)| Required fields: title, sharedWithEmployeeIds, dueDate. Omitted optional fields overwrite existing values using the endpoint&#39;s default behavior; see individual field descriptions for details. | |

### Return type

[**\BhrSdk\Model\TransformedApiEmployeeGoalDetails**](../Model/TransformedApiEmployeeGoalDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateGoalV11()`

```php
updateGoalV11($employee_id, $goal_id, $update_goal_v11_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal (v1.1)

Update a goal's top-level fields and optionally add or delete milestones. Milestone handling is not a full replace or upsert: objects passed in `milestones` are always added as new milestones, even if their titles match existing milestones. To keep existing milestones unchanged while editing title, description, due date, sharing, or alignment, omit the `milestones` field. To remove milestones, pass their IDs in `deletedMilestoneIds`. There is no field for editing an existing milestone title in place. Note: Compared to \"Update Goal (v1)\", this version adds milestone updates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$update_goal_v11_request = new \BhrSdk\Model\UpdateGoalV11Request(); // \BhrSdk\Model\UpdateGoalV11Request | Required fields: `title`, `sharedWithEmployeeIds`, and `dueDate`. Omit optional fields that should remain unchanged. In particular, omit `milestones` unless adding new milestones; included milestones are appended, not reconciled or replaced.

try {
    $result = $apiInstance->updateGoalV11($employee_id, $goal_id, $update_goal_v11_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->updateGoalV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **update_goal_v11_request** | [**\BhrSdk\Model\UpdateGoalV11Request**](../Model/UpdateGoalV11Request.md)| Required fields: &#x60;title&#x60;, &#x60;sharedWithEmployeeIds&#x60;, and &#x60;dueDate&#x60;. Omit optional fields that should remain unchanged. In particular, omit &#x60;milestones&#x60; unless adding new milestones; included milestones are appended, not reconciled or replaced. | |

### Return type

[**\BhrSdk\Model\TransformedApiEmployeeGoalDetails**](../Model/TransformedApiEmployeeGoalDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
