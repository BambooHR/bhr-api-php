# BhrSdk\GoalsApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteGoal()**](GoalsApi.md#deleteGoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal |
| [**deleteGoalComment()**](GoalsApi.md#deleteGoalComment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment |
| [**getCanCreateGoal()**](GoalsApi.md#getCanCreateGoal) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Check Goal Creation Permission |
| [**getGoalAggregate()**](GoalsApi.md#getGoalAggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Goal Aggregate |
| [**getGoalComments()**](GoalsApi.md#getGoalComments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments |
| [**getGoals()**](GoalsApi.md#getGoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | Get Goals |
| [**getGoalsAggregateV1()**](GoalsApi.md#getGoalsAggregateV1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate |
| [**getGoalsAggregateV11()**](GoalsApi.md#getGoalsAggregateV11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate v1.1 |
| [**getGoalsAggregateV12()**](GoalsApi.md#getGoalsAggregateV12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate v1.2 |
| [**getGoalsAlignmentOptions()**](GoalsApi.md#getGoalsAlignmentOptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Get Alignable Goal Options |
| [**getGoalsFiltersV1()**](GoalsApi.md#getGoalsFiltersV1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goal Filters |
| [**getGoalsFiltersV11()**](GoalsApi.md#getGoalsFiltersV11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goal Filters v1.1 |
| [**getGoalsFiltersV12()**](GoalsApi.md#getGoalsFiltersV12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts v1.2 |
| [**getGoalsShareOptions()**](GoalsApi.md#getGoalsShareOptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | Get Available Goal Sharing Options |
| [**postCloseGoal()**](GoalsApi.md#postCloseGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal |
| [**postGoal()**](GoalsApi.md#postGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal |
| [**postGoalComment()**](GoalsApi.md#postGoalComment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment |
| [**postReopenGoal()**](GoalsApi.md#postReopenGoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen Goal |
| [**putGoalComment()**](GoalsApi.md#putGoalComment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment |
| [**putGoalMilestoneProgress()**](GoalsApi.md#putGoalMilestoneProgress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress |
| [**putGoalProgress()**](GoalsApi.md#putGoalProgress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress |
| [**putGoalSharedWith()**](GoalsApi.md#putGoalSharedWith) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing |
| [**putGoalV1()**](GoalsApi.md#putGoalV1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal |
| [**putGoalV11()**](GoalsApi.md#putGoalV11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal v1.1 |


## `deleteGoal()`

```php
deleteGoal($employee_id, $goal_id)
```

Delete Goal

Delete a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

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
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

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

## `deleteGoalComment()`

```php
deleteGoalComment($employee_id, $goal_id, $comment_id)
```

Delete Goal Comment

Delete a goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

## `getCanCreateGoal()`

```php
getCanCreateGoal($employee_id)
```

Check Goal Creation Permission

Determine if the API user has permission to create a goal for this employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.

try {
    $apiInstance->getCanCreateGoal($employee_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getCanCreateGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |

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

## `getGoalAggregate()`

```php
getGoalAggregate($employee_id, $goal_id): \BhrSdk\Model\GoalAggregate
```

Get Goal Aggregate

Provides goal information, goal comments, and employees shared with goals or who have commented on the given goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

## `getGoalComments()`

```php
getGoalComments($employee_id, $goal_id)
```

Get Goal Comments

Get comments for a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $apiInstance->getGoalComments($employee_id, $goal_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalComments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

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

## `getGoals()`

```php
getGoals($employee_id, $filter): \BhrSdk\Model\GoalsList
```

Get Goals

Get goals for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$filter = 'filter_example'; // string | A filter that can be applied to only show the goals that are in a certain state.

try {
    $result = $apiInstance->getGoals($employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **filter** | **string**| A filter that can be applied to only show the goals that are in a certain state. | [optional] |

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

## `getGoalsAggregateV1()`

```php
getGoalsAggregateV1($employee_id): \BhrSdk\Model\GoalsAggregateV1
```

Get Goals Aggregate

Provides a list of all goals, type counts, goal comment counts, and employees shared with goals for the given employee. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV1($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |

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
getGoalsAggregateV11($employee_id): \BhrSdk\Model\GoalsAggregateV11
```

Get Goals Aggregate v1.1

Provides a list of all goals, type counts, filter actions, goal comment counts, and employees shared with goals for the given employee. Difference from Version 1: Returns goals in the closed filter and provides filter actions for each filter. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV11($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |

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
getGoalsAggregateV12($employee_id): \BhrSdk\Model\GoalsAggregateV12
```

Get Goals Aggregate v1.2

Provides a list of all goals, type counts, filter actions, goal comment counts, and employees shared with goals for the given employee. Difference from Version 1.1: Returns all goals, including goals that contain milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV12($employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV12: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID used to generate the aggregate information. | |

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

## `getGoalsAlignmentOptions()`

```php
getGoalsAlignmentOptions($employee_id, $goal_id, $get_goals_alignment_options_request)
```

Get Alignable Goal Options

Get alignable goal options for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get alignable goal options for.
$goal_id = 56; // int | Optional. The goal ID to get alignment options for. Can be provided as a query parameter or in the request body.
$get_goals_alignment_options_request = new \BhrSdk\Model\GetGoalsAlignmentOptionsRequest(); // \BhrSdk\Model\GetGoalsAlignmentOptionsRequest | Optional. Provide goalId to get alignment options including the option currently aligned with this goal. If omitted, response will be alignment options belonging to the API user. Note: goalId can also be provided as a query parameter.

try {
    $apiInstance->getGoalsAlignmentOptions($employee_id, $goal_id, $get_goals_alignment_options_request);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAlignmentOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to get alignable goal options for. | |
| **goal_id** | **int**| Optional. The goal ID to get alignment options for. Can be provided as a query parameter or in the request body. | [optional] |
| **get_goals_alignment_options_request** | [**\BhrSdk\Model\GetGoalsAlignmentOptionsRequest**](../Model/GetGoalsAlignmentOptionsRequest.md)| Optional. Provide goalId to get alignment options including the option currently aligned with this goal. If omitted, response will be alignment options belonging to the API user. Note: goalId can also be provided as a query parameter. | [optional] |

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

## `getGoalsFiltersV1()`

```php
getGoalsFiltersV1($employee_id): \BhrSdk\Model\GoalFiltersV1
```

Get Goal Filters

Get the number of goals per status for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

Get Goal Filters v1.1

Get the number of goals per status for an employee. Difference from Version 1: Includes actions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

Get Goal Status Counts v1.2

Get the number of goals per status for an employee. Difference from Version 1_1: Returns goals with milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

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

## `getGoalsShareOptions()`

```php
getGoalsShareOptions($employee_id, $search, $limit)
```

Get Available Goal Sharing Options

Provides a list of employees with whom the specified employee\\'s goals may be shared.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get sharing options for.
$search = 'search_example'; // string | The search term used to filter employees returned. Will search name, employee ID and email.
$limit = 'limit_example'; // string | Limit will restrict results to specified number.

try {
    $apiInstance->getGoalsShareOptions($employee_id, $search, $limit);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsShareOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to get sharing options for. | |
| **search** | **string**| The search term used to filter employees returned. Will search name, employee ID and email. | [optional] |
| **limit** | **string**| Limit will restrict results to specified number. | [optional] |

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

## `postCloseGoal()`

```php
postCloseGoal($employee_id, $goal_id, $body): \BhrSdk\Model\TransformedApiGoal
```

Close Goal

Close a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$body = 'body_example'; // string | Comment field is optional.

try {
    $result = $apiInstance->postCloseGoal($employee_id, $goal_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postCloseGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **body** | **string**| Comment field is optional. | [optional] |

### Return type

[**\BhrSdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postGoal()`

```php
postGoal($employee_id, $post_goal_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Create Goal

Create a new goal for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$post_goal_request = new \BhrSdk\Model\PostGoalRequest(); // \BhrSdk\Model\PostGoalRequest

try {
    $result = $apiInstance->postGoal($employee_id, $post_goal_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **post_goal_request** | [**\BhrSdk\Model\PostGoalRequest**](../Model/PostGoalRequest.md)|  | |

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

## `postGoalComment()`

```php
postGoalComment($employee_id, $goal_id, $body)
```

Create Goal Comment

Create a new goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$body = 'body_example'; // string

try {
    $apiInstance->postGoalComment($employee_id, $goal_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **body** | **string**|  | |

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

## `postReopenGoal()`

```php
postReopenGoal($employee_id, $goal_id): \BhrSdk\Model\TransformedApiGoal
```

Reopen Goal

Reopen a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $result = $apiInstance->postReopenGoal($employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postReopenGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

[**\BhrSdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalComment()`

```php
putGoalComment($employee_id, $goal_id, $comment_id, $body)
```

Update Goal Comment

Update a goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$comment_id = 'comment_id_example'; // string | commentId is the comment ID for the specified goal.
$body = 'body_example'; // string

try {
    $apiInstance->putGoalComment($employee_id, $goal_id, $comment_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **comment_id** | **string**| commentId is the comment ID for the specified goal. | |
| **body** | **string**|  | |

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

## `putGoalMilestoneProgress()`

```php
putGoalMilestoneProgress($employee_id, $goal_id, $milestone_id, $put_goal_milestone_progress_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Milestone Progress

Update the progress of a milestone in a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$milestone_id = 'milestone_id_example'; // string | milestoneId is the milestone ID for the specified goal.
$put_goal_milestone_progress_request = new \BhrSdk\Model\PutGoalMilestoneProgressRequest(); // \BhrSdk\Model\PutGoalMilestoneProgressRequest

try {
    $result = $apiInstance->putGoalMilestoneProgress($employee_id, $goal_id, $milestone_id, $put_goal_milestone_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalMilestoneProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **milestone_id** | **string**| milestoneId is the milestone ID for the specified goal. | |
| **put_goal_milestone_progress_request** | [**\BhrSdk\Model\PutGoalMilestoneProgressRequest**](../Model/PutGoalMilestoneProgressRequest.md)|  | |

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

## `putGoalProgress()`

```php
putGoalProgress($employee_id, $goal_id, $put_goal_progress_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal Progress

Update the progress percentage of an individual goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$put_goal_progress_request = new \BhrSdk\Model\PutGoalProgressRequest(); // \BhrSdk\Model\PutGoalProgressRequest | Employee IDs of employees with whom the goal is shared. All goal owners are considered \"shared with\".

try {
    $result = $apiInstance->putGoalProgress($employee_id, $goal_id, $put_goal_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **put_goal_progress_request** | [**\BhrSdk\Model\PutGoalProgressRequest**](../Model/PutGoalProgressRequest.md)| Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. | |

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

## `putGoalSharedWith()`

```php
putGoalSharedWith($employee_id, $goal_id, $put_goal_shared_with_request): \BhrSdk\Model\TransformedApiGoal
```

Update Goal Sharing

Updates which employees this goal is shared with.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$put_goal_shared_with_request = new \BhrSdk\Model\PutGoalSharedWithRequest(); // \BhrSdk\Model\PutGoalSharedWithRequest | Employee IDs of employees with whom the goal is shared. All goal owners are considered \"shared with\".

try {
    $result = $apiInstance->putGoalSharedWith($employee_id, $goal_id, $put_goal_shared_with_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalSharedWith: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **put_goal_shared_with_request** | [**\BhrSdk\Model\PutGoalSharedWithRequest**](../Model/PutGoalSharedWithRequest.md)| Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. | |

### Return type

[**\BhrSdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalV1()`

```php
putGoalV1($employee_id, $goal_id, $goal): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal

Update a goal. This version will not update a goal to contain milestones, that functionality is added in version 1.1

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$goal = new \BhrSdk\Model\Goal(); // \BhrSdk\Model\Goal | Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value.

try {
    $result = $apiInstance->putGoalV1($employee_id, $goal_id, $goal);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **goal** | [**\BhrSdk\Model\Goal**](../Model/Goal.md)| Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value. | |

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

## `putGoalV11()`

```php
putGoalV11($employee_id, $goal_id, $put_goal_v11_request): \BhrSdk\Model\TransformedApiEmployeeGoalDetails
```

Update Goal v1.1

Update a goal. Version 1.1 allows the updating of the milestones contained within the goal, unlike Version 1.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$put_goal_v11_request = new \BhrSdk\Model\PutGoalV11Request(); // \BhrSdk\Model\PutGoalV11Request | Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value.

try {
    $result = $apiInstance->putGoalV11($employee_id, $goal_id, $put_goal_v11_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **put_goal_v11_request** | [**\BhrSdk\Model\PutGoalV11Request**](../Model/PutGoalV11Request.md)| Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value. | |

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
