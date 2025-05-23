# MySdk\GoalsApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteGoal()**](GoalsApi.md#deleteGoal) | **DELETE** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal |
| [**deleteGoalComment()**](GoalsApi.md#deleteGoalComment) | **DELETE** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment |
| [**getCanCreateGoal()**](GoalsApi.md#getCanCreateGoal) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/canCreateGoals | Can Create a Goal |
| [**getGoalAggregate()**](GoalsApi.md#getGoalAggregate) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Aggregate Goal Info |
| [**getGoalComments()**](GoalsApi.md#getGoalComments) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments |
| [**getGoals()**](GoalsApi.md#getGoals) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals | Get Goals |
| [**getGoalsAggregateV1()**](GoalsApi.md#getGoalsAggregateV1) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info |
| [**getGoalsAggregateV11()**](GoalsApi.md#getGoalsAggregateV11) | **GET** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.1 |
| [**getGoalsAggregateV12()**](GoalsApi.md#getGoalsAggregateV12) | **GET** /{companyDomain}/v1_2/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.2 |
| [**getGoalsAlignmentOptions()**](GoalsApi.md#getGoalsAlignmentOptions) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/alignmentOptions | Alignable Goal Options |
| [**getGoalsFiltersV1()**](GoalsApi.md#getGoalsFiltersV1) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/filters |  |
| [**getGoalsFiltersV11()**](GoalsApi.md#getGoalsFiltersV11) | **GET** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/filters |  |
| [**getGoalsFiltersV12()**](GoalsApi.md#getGoalsFiltersV12) | **GET** /{companyDomain}/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts, Version 1.2 |
| [**getGoalsShareOptions()**](GoalsApi.md#getGoalsShareOptions) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/shareOptions | Available Goal Sharing Options |
| [**postCloseGoal()**](GoalsApi.md#postCloseGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal |
| [**postGoal()**](GoalsApi.md#postGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals | Create Goal |
| [**postGoalComment()**](GoalsApi.md#postGoalComment) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment |
| [**postReopenGoal()**](GoalsApi.md#postReopenGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen a Goal |
| [**putGoalComment()**](GoalsApi.md#putGoalComment) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment |
| [**putGoalMilestoneProgress()**](GoalsApi.md#putGoalMilestoneProgress) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress |
| [**putGoalProgress()**](GoalsApi.md#putGoalProgress) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress |
| [**putGoalSharedWith()**](GoalsApi.md#putGoalSharedWith) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing |
| [**putGoalV1()**](GoalsApi.md#putGoalV1) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal |
| [**putGoalV11()**](GoalsApi.md#putGoalV11) | **PUT** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal, V1.1 |


## `deleteGoal()`

```php
deleteGoal($company_domain, $employee_id, $goal_id)
```

Delete Goal

Delete a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $apiInstance->deleteGoal($company_domain, $employee_id, $goal_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->deleteGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteGoalComment()`

```php
deleteGoalComment($company_domain, $employee_id, $goal_id, $comment_id)
```

Delete Goal Comment

Delete a goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$comment_id = 'comment_id_example'; // string | commentId is the ID of a specific comment for the specified goal.

try {
    $apiInstance->deleteGoalComment($company_domain, $employee_id, $goal_id, $comment_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->deleteGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **comment_id** | **string**| commentId is the ID of a specific comment for the specified goal. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCanCreateGoal()`

```php
getCanCreateGoal($company_domain, $employee_id)
```

Can Create a Goal

Determine if the API user has permission to create a goal for this employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.

try {
    $apiInstance->getCanCreateGoal($company_domain, $employee_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getCanCreateGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalAggregate()`

```php
getGoalAggregate($company_domain, $employee_id, $goal_id): \MySdk\Model\GetGoalAggregate200Response
```

Get Aggregate Goal Info

Provides goal information, goal comments, and employees shared with goals or who have commented on the given goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the Goal ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalAggregate($company_domain, $employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalAggregate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the Goal ID used to generate the aggregate information. | |

### Return type

[**\MySdk\Model\GetGoalAggregate200Response**](../Model/GetGoalAggregate200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalComments()`

```php
getGoalComments($company_domain, $employee_id, $goal_id)
```

Get Goal Comments

Get comments for a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $apiInstance->getGoalComments($company_domain, $employee_id, $goal_id);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalComments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoals()`

```php
getGoals($company_domain, $employee_id, $filter): \MySdk\Model\GetGoals200Response
```

Get Goals

Get goals for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$filter = 'filter_example'; // string | A filter that can be applied to only show the goals that are in a certain state.

try {
    $result = $apiInstance->getGoals($company_domain, $employee_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **filter** | **string**| A filter that can be applied to only show the goals that are in a certain state. | [optional] |

### Return type

[**\MySdk\Model\GetGoals200Response**](../Model/GetGoals200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV1()`

```php
getGoalsAggregateV1($company_domain, $employee_id): \MySdk\Model\GetGoalsAggregateV1200Response
```

Get All Aggregate Goal Info

Provides a list of all goals, type counts, goal comment counts, and employees shared with goals for the given employee. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV1($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |

### Return type

[**\MySdk\Model\GetGoalsAggregateV1200Response**](../Model/GetGoalsAggregateV1200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV11()`

```php
getGoalsAggregateV11($company_domain, $employee_id): \MySdk\Model\GetGoalsAggregateV11200Response
```

Get All Aggregate Goal Info, Version 1.1

Provides a list of all goals, type counts, filter actions, goal comment counts, and employees shared with goals for the given employee. Difference from Version 1: Returns goals in the closed filter and provides filter actions for each filter. This version of the endpoint will not return any goals with milestones. Milestone functionality for this endpoint begins in version 1.2.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV11($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID used to generate the aggregate information. | |

### Return type

[**\MySdk\Model\GetGoalsAggregateV11200Response**](../Model/GetGoalsAggregateV11200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAggregateV12()`

```php
getGoalsAggregateV12($company_domain, $employee_id): \MySdk\Model\GetGoalsAggregateV12200Response
```

Get All Aggregate Goal Info, Version 1.2

Provides a list of all goals, type counts, filter actions, goal comment counts, and employees shared with goals for the given employee. Difference from Version 1.1: Returns all goals, including goals that contain milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID used to generate the aggregate information.

try {
    $result = $apiInstance->getGoalsAggregateV12($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAggregateV12: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID used to generate the aggregate information. | |

### Return type

[**\MySdk\Model\GetGoalsAggregateV12200Response**](../Model/GetGoalsAggregateV12200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsAlignmentOptions()`

```php
getGoalsAlignmentOptions($company_domain, $employee_id, $body)
```

Alignable Goal Options

Get alignable goal options for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get alignable goal options for.
$body = 'body_example'; // string | Get alignment options including the option currently aligned with this goal (if applicable). If omitted, response will be alignment options belonging to the API user.

try {
    $apiInstance->getGoalsAlignmentOptions($company_domain, $employee_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsAlignmentOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID to get alignable goal options for. | |
| **body** | **string**| Get alignment options including the option currently aligned with this goal (if applicable). If omitted, response will be alignment options belonging to the API user. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV1()`

```php
getGoalsFiltersV1($company_domain, $employee_id): \MySdk\Model\GoalFiltersV1
```



Get the number of goals per status for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV1($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\MySdk\Model\GoalFiltersV1**](../Model/GoalFiltersV1.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV11()`

```php
getGoalsFiltersV11($company_domain, $employee_id): \MySdk\Model\GoalFiltersV11
```



Get the number of goals per status for an employee. Difference from Version 1: Includes actions.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV11($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\MySdk\Model\GoalFiltersV11**](../Model/GoalFiltersV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsFiltersV12()`

```php
getGoalsFiltersV12($company_domain, $employee_id): \MySdk\Model\GoalFiltersV11
```

Get Goal Status Counts, Version 1.2

Get the number of goals per status for an employee. Difference from Version 1_1: Returns goals with milestones.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID to whom the goals are assigned.

try {
    $result = $apiInstance->getGoalsFiltersV12($company_domain, $employee_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsFiltersV12: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID to whom the goals are assigned. | |

### Return type

[**\MySdk\Model\GoalFiltersV11**](../Model/GoalFiltersV11.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGoalsShareOptions()`

```php
getGoalsShareOptions($company_domain, $employee_id, $search, $limit)
```

Available Goal Sharing Options

Provides a list of employees with whom the specified employee\\'s goals may be shared.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to get sharing options for.
$search = 'search_example'; // string | The search term used to filter employees returned. Will search name, employee ID and email.
$limit = 'limit_example'; // string | Limit will restrict results to specified number.

try {
    $apiInstance->getGoalsShareOptions($company_domain, $employee_id, $search, $limit);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->getGoalsShareOptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID to get sharing options for. | |
| **search** | **string**| The search term used to filter employees returned. Will search name, employee ID and email. | [optional] |
| **limit** | **string**| Limit will restrict results to specified number. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postCloseGoal()`

```php
postCloseGoal($company_domain, $employee_id, $goal_id, $body): \MySdk\Model\TransformedApiGoal
```

Close Goal

Close a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$body = 'body_example'; // string | Comment field is optional.

try {
    $result = $apiInstance->postCloseGoal($company_domain, $employee_id, $goal_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postCloseGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **body** | **string**| Comment field is optional. | [optional] |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postGoal()`

```php
postGoal($company_domain, $employee_id, $post_goal_request): \MySdk\Model\TransformedApiGoal
```

Create Goal

Create a new goal for an employee.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$post_goal_request = new \MySdk\Model\PostGoalRequest(); // \MySdk\Model\PostGoalRequest

try {
    $result = $apiInstance->postGoal($company_domain, $employee_id, $post_goal_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **post_goal_request** | [**\MySdk\Model\PostGoalRequest**](../Model/PostGoalRequest.md)|  | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postGoalComment()`

```php
postGoalComment($company_domain, $employee_id, $goal_id, $body)
```

Create Goal Comment

Create a new goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$body = 'body_example'; // string

try {
    $apiInstance->postGoalComment($company_domain, $employee_id, $goal_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **body** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postReopenGoal()`

```php
postReopenGoal($company_domain, $employee_id, $goal_id): \MySdk\Model\TransformedApiGoal
```

Reopen a Goal

Reopen a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.

try {
    $result = $apiInstance->postReopenGoal($company_domain, $employee_id, $goal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->postReopenGoal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalComment()`

```php
putGoalComment($company_domain, $employee_id, $goal_id, $comment_id, $body)
```

Update Goal Comment

Update a goal comment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$comment_id = 'comment_id_example'; // string | commentId is the comment ID for the specified goal.
$body = 'body_example'; // string

try {
    $apiInstance->putGoalComment($company_domain, $employee_id, $goal_id, $comment_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **comment_id** | **string**| commentId is the comment ID for the specified goal. | |
| **body** | **string**|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalMilestoneProgress()`

```php
putGoalMilestoneProgress($company_domain, $employee_id, $goal_id, $milestone_id, $put_goal_milestone_progress_request): object
```

Update Milestone Progress

Update the progress of a milestone in a goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID to whom the goals are assigned.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$milestone_id = 'milestone_id_example'; // string | milestoneId is the milestone ID for the specified goal.
$put_goal_milestone_progress_request = new \MySdk\Model\PutGoalMilestoneProgressRequest(); // \MySdk\Model\PutGoalMilestoneProgressRequest

try {
    $result = $apiInstance->putGoalMilestoneProgress($company_domain, $employee_id, $goal_id, $milestone_id, $put_goal_milestone_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalMilestoneProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID to whom the goals are assigned. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **milestone_id** | **string**| milestoneId is the milestone ID for the specified goal. | |
| **put_goal_milestone_progress_request** | [**\MySdk\Model\PutGoalMilestoneProgressRequest**](../Model/PutGoalMilestoneProgressRequest.md)|  | |

### Return type

**object**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalProgress()`

```php
putGoalProgress($company_domain, $employee_id, $goal_id, $put_goal_progress_request): \MySdk\Model\TransformedApiGoal
```

Update Goal Progress

Update the progress percentage of an individual goal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$put_goal_progress_request = new \MySdk\Model\PutGoalProgressRequest(); // \MySdk\Model\PutGoalProgressRequest | Employee IDs of employees with whom the goal is shared. All goal owners are considered \"shared with\".

try {
    $result = $apiInstance->putGoalProgress($company_domain, $employee_id, $goal_id, $put_goal_progress_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **put_goal_progress_request** | [**\MySdk\Model\PutGoalProgressRequest**](../Model/PutGoalProgressRequest.md)| Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalSharedWith()`

```php
putGoalSharedWith($company_domain, $employee_id, $goal_id, $put_goal_shared_with_request): \MySdk\Model\TransformedApiGoal
```

Update Goal Sharing

Updates which employees this goal is shared with.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$put_goal_shared_with_request = new \MySdk\Model\PutGoalSharedWithRequest(); // \MySdk\Model\PutGoalSharedWithRequest | Employee IDs of employees with whom the goal is shared. All goal owners are considered \"shared with\".

try {
    $result = $apiInstance->putGoalSharedWith($company_domain, $employee_id, $goal_id, $put_goal_shared_with_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalSharedWith: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **put_goal_shared_with_request** | [**\MySdk\Model\PutGoalSharedWithRequest**](../Model/PutGoalSharedWithRequest.md)| Employee IDs of employees with whom the goal is shared. All goal owners are considered \&quot;shared with\&quot;. | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalV1()`

```php
putGoalV1($company_domain, $employee_id, $goal_id, $goal): \MySdk\Model\TransformedApiGoal
```

Update Goal

Update a goal. This version will not update a goal to contain milestones, that functionality is added in version 1.1

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | employeeId is the employee ID with whom the goal is associated.
$goal_id = 'goal_id_example'; // string | goalId is the goal ID for the specified employee.
$goal = new \MySdk\Model\Goal(); // \MySdk\Model\Goal | Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value.

try {
    $result = $apiInstance->putGoalV1($company_domain, $employee_id, $goal_id, $goal);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **string**| goalId is the goal ID for the specified employee. | |
| **goal** | [**\MySdk\Model\Goal**](../Model/Goal.md)| Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value. | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putGoalV11()`

```php
putGoalV11($company_domain, $employee_id, $goal_id, $put_goal_v11_request): \MySdk\Model\TransformedApiGoal
```

Update Goal, V1.1

Update a goal. Version 1.1 allows the updating of the milestones contained within the goal, unlike Version 1.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\GoalsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | employeeId is the employee ID with whom the goal is associated.
$goal_id = 56; // int | goalId is the goal ID for the specified employee.
$put_goal_v11_request = new \MySdk\Model\PutGoalV11Request(); // \MySdk\Model\PutGoalV11Request | Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value.

try {
    $result = $apiInstance->putGoalV11($company_domain, $employee_id, $goal_id, $put_goal_v11_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GoalsApi->putGoalV11: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| employeeId is the employee ID with whom the goal is associated. | |
| **goal_id** | **int**| goalId is the goal ID for the specified employee. | |
| **put_goal_v11_request** | [**\MySdk\Model\PutGoalV11Request**](../Model/PutGoalV11Request.md)| Required fields: title, sharedWithEmployeeIds, dueDate. Any non-required field not provided will overwrite existing data with a NULL value. | |

### Return type

[**\MySdk\Model\TransformedApiGoal**](../Model/TransformedApiGoal.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
