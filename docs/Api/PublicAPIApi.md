# MySdk\PublicAPIApi

All URIs are relative to https://api.bamboohr.com/api/gateway.php, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addCompanyFileCategory()**](PublicAPIApi.md#addCompanyFileCategory) | **POST** /{companyDomain}/v1/files/categories | Add Company File Category |
| [**addEmployee()**](PublicAPIApi.md#addEmployee) | **POST** /{companyDomain}/v1/employees | Add Employee |
| [**addEmployeeDependent()**](PublicAPIApi.md#addEmployeeDependent) | **POST** /{companyDomain}/v1/employeedependents | Add an employee dependent |
| [**addEmployeeFileCategory()**](PublicAPIApi.md#addEmployeeFileCategory) | **POST** /{companyDomain}/v1/employees/files/categories | Add Employee File Category |
| [**addEmployeeTableRow()**](PublicAPIApi.md#addEmployeeTableRow) | **POST** /{companyDomain}/v1/employees/{id}/tables/{table} | Adds a table row |
| [**addEmployeeTableRowV1()**](PublicAPIApi.md#addEmployeeTableRowV1) | **POST** /{companyDomain}/v1_1/employees/{id}/tables/{table} | Adds a table row |
| [**addNewCandidate()**](PublicAPIApi.md#addNewCandidate) | **POST** /{companyDomain}/v1/applicant_tracking/application | Add New Candidate |
| [**addNewEmployeeTrainingRecord()**](PublicAPIApi.md#addNewEmployeeTrainingRecord) | **POST** /{companyDomain}/v1/training/record/employee/{employeeId} | Add New Employee Training Record |
| [**addNewJobOpening()**](PublicAPIApi.md#addNewJobOpening) | **POST** /{companyDomain}/v1/applicant_tracking/job_opening | Add New Job Opening |
| [**addTrainingCategory()**](PublicAPIApi.md#addTrainingCategory) | **POST** /{companyDomain}/v1/training/category | Add Training Category |
| [**addTrainingType()**](PublicAPIApi.md#addTrainingType) | **POST** /{companyDomain}/v1/training/type | Add Training Type |
| [**b86bb5db603786dfc98c8f6a7bb1a218()**](PublicAPIApi.md#b86bb5db603786dfc98c8f6a7bb1a218) | **POST** /{companyDomain}/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry |
| [**call0f428442e53dc46d1e2c8ff5b7a483a8()**](PublicAPIApi.md#call0f428442e53dc46d1e2c8ff5b7a483a8) | **POST** /{companyDomain}/v1/timetracking/record | addTimeTrackingBulk |
| [**call149e00955713fb486cd7a81dd6ee31aa()**](PublicAPIApi.md#call149e00955713fb486cd7a81dd6ee31aa) | **POST** /{companyDomain}/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries |
| [**call14e73aef978eb81d51fdbd74e0e83823()**](PublicAPIApi.md#call14e73aef978eb81d51fdbd74e0e83823) | **PUT** /{companyDomain}/v1/timetracking/adjust | adjustTimeTracking |
| [**call59d25b8c03d013c96fbbf866769b8206()**](PublicAPIApi.md#call59d25b8c03d013c96fbbf866769b8206) | **GET** /{companyDomain}/v1/field-options | Get Field Options |
| [**call5e1c5b4ef12e61d1bc975e8b4e00c38d()**](PublicAPIApi.md#call5e1c5b4ef12e61d1bc975e8b4e00c38d) | **GET** /{companyDomain}/v1/timetracking/record/{id} | getTimeTrackingByTimeTrackingId |
| [**call69c777478f5d52dee1b4f0937dca154f()**](PublicAPIApi.md#call69c777478f5d52dee1b4f0937dca154f) | **POST** /{companyDomain}/v1/timetracking/add | addTimeTracking |
| [**call88ef63550f43537c6b3bfaa03d51d95d()**](PublicAPIApi.md#call88ef63550f43537c6b3bfaa03d51d95d) | **POST** /{companyDomain}/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry |
| [**call910252128bfbd9d42e50f9dc31bb6120()**](PublicAPIApi.md#call910252128bfbd9d42e50f9dc31bb6120) | **POST** /{companyDomain}/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries |
| [**call9a6d5660f03eadcf705c808a1f44b8c4()**](PublicAPIApi.md#call9a6d5660f03eadcf705c808a1f44b8c4) | **GET** /{companyDomain}/v1/time_tracking/timesheet_entries | Get Timesheet Entries |
| [**db65bacaf29686d9c3b1296f6047a065()**](PublicAPIApi.md#db65bacaf29686d9c3b1296f6047a065) | **POST** /{companyDomain}/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries |
| [**dcb62a5d1780635153b978462f9debd0()**](PublicAPIApi.md#dcb62a5d1780635153b978462f9debd0) | **POST** /{companyDomain}/v1/time_tracking/clock_entries/delete | Delete timesheet clock entries. |
| [**deleteCompanyFile()**](PublicAPIApi.md#deleteCompanyFile) | **DELETE** /{companyDomain}/v1/files/{fileId} | Delete Company File |
| [**deleteEmployeeFile()**](PublicAPIApi.md#deleteEmployeeFile) | **DELETE** /{companyDomain}/v1/employees/{id}/files/{fileId} | Delete Employee File |
| [**deleteEmployeeTableRowV1()**](PublicAPIApi.md#deleteEmployeeTableRowV1) | **DELETE** /{companyDomain}/v1/employees/{id}/tables/{table}/{rowId} | Deletes a table row |
| [**deleteEmployeeTrainingRecord()**](PublicAPIApi.md#deleteEmployeeTrainingRecord) | **DELETE** /{companyDomain}/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record |
| [**deleteGoal()**](PublicAPIApi.md#deleteGoal) | **DELETE** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal |
| [**deleteGoalComment()**](PublicAPIApi.md#deleteGoalComment) | **DELETE** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment |
| [**deleteTrainingCategory()**](PublicAPIApi.md#deleteTrainingCategory) | **DELETE** /{companyDomain}/v1/training/category/{trainingCategoryId} | Delete Training Category |
| [**deleteTrainingType()**](PublicAPIApi.md#deleteTrainingType) | **DELETE** /{companyDomain}/v1/training/type/{trainingTypeId} | Delete Training Type |
| [**deleteWebhook()**](PublicAPIApi.md#deleteWebhook) | **DELETE** /{companyDomain}/v1/webhooks/{id} | Delete Webhook |
| [**estimateFutureTimeOffBalances()**](PublicAPIApi.md#estimateFutureTimeOffBalances) | **GET** /{companyDomain}/v1/employees/{employeeId}/time_off/calculator | Estimate Future Time Off Balances |
| [**f97efc203b25647724accb9da7dda7db()**](PublicAPIApi.md#f97efc203b25647724accb9da7dda7db) | **DELETE** /{companyDomain}/v1/timetracking/delete/{id} | deleteTimeTrackingByTimeTrackingId |
| [**getAListOfUsers()**](PublicAPIApi.md#getAListOfUsers) | **GET** /{companyDomain}/v1/meta/users | Get a List of Users |
| [**getAListOfWhosOut()**](PublicAPIApi.md#getAListOfWhosOut) | **GET** /{companyDomain}/v1/time_off/whos_out | Get a list of Who&#39;s Out |
| [**getApplicationDetails()**](PublicAPIApi.md#getApplicationDetails) | **GET** /{companyDomain}/v1/applicant_tracking/applications/{applicationId} | Get Application Details |
| [**getApplications()**](PublicAPIApi.md#getApplications) | **GET** /{companyDomain}/v1/applicant_tracking/applications | Get Applications |
| [**getBenefitCoverages()**](PublicAPIApi.md#getBenefitCoverages) | **GET** /{companyDomain}/v1/benefitcoverages | Get benefit coverages |
| [**getBenefitDeductionTypes()**](PublicAPIApi.md#getBenefitDeductionTypes) | **GET** /{companyDomain}/v1/benefits/settings/deduction_types/all | Get benefit deduction types |
| [**getByReportId()**](PublicAPIApi.md#getByReportId) | **GET** /{companyDomain}/v1/custom-reports/{reportId} | Get Report by ID |
| [**getCanCreateGoal()**](PublicAPIApi.md#getCanCreateGoal) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/canCreateGoals | Can Create a Goal |
| [**getChangedEmployeeIds()**](PublicAPIApi.md#getChangedEmployeeIds) | **GET** /{companyDomain}/v1/employees/changed | Gets all updated employee IDs |
| [**getChangedEmployeeTableData()**](PublicAPIApi.md#getChangedEmployeeTableData) | **GET** /{companyDomain}/v1/employees/changed/tables/{table} | Gets all updated employee table data |
| [**getCompanyEINs()**](PublicAPIApi.md#getCompanyEINs) | **GET** /{companyDomain}/v1/company_eins | Get Company EINs |
| [**getCompanyFile()**](PublicAPIApi.md#getCompanyFile) | **GET** /{companyDomain}/v1/files/{fileId} | Get an Company File |
| [**getCompanyInformation()**](PublicAPIApi.md#getCompanyInformation) | **GET** /{companyDomain}/v1/company_information | Get Company Information |
| [**getCompanyLocations()**](PublicAPIApi.md#getCompanyLocations) | **GET** /{companyDomain}/v1/applicant_tracking/locations | Get Company Locations |
| [**getCompanyReport()**](PublicAPIApi.md#getCompanyReport) | **GET** /{companyDomain}/v1/reports/{id} | Get company report |
| [**getDataFromDataset()**](PublicAPIApi.md#getDataFromDataset) | **POST** /{companyDomain}/v1/datasets/{datasetName} | Get Data from Dataset |
| [**getDataSets()**](PublicAPIApi.md#getDataSets) | **GET** /{companyDomain}/v1/datasets | Get Data Sets |
| [**getEmployee()**](PublicAPIApi.md#getEmployee) | **GET** /{companyDomain}/v1/employees/{id} | Get Employee |
| [**getEmployeeDependent()**](PublicAPIApi.md#getEmployeeDependent) | **GET** /{companyDomain}/v1/employeedependents/{id} | Get employee dependent |
| [**getEmployeeDependents()**](PublicAPIApi.md#getEmployeeDependents) | **GET** /{companyDomain}/v1/employeedependents | Get all employee dependents |
| [**getEmployeeFile()**](PublicAPIApi.md#getEmployeeFile) | **GET** /{companyDomain}/v1/employees/{id}/files/{fileId} | Get an Employee File |
| [**getEmployeePhoto()**](PublicAPIApi.md#getEmployeePhoto) | **GET** /{companyDomain}/v1/employees/{employeeId}/photo/{size} | Get an employee photo |
| [**getEmployeeTableRow()**](PublicAPIApi.md#getEmployeeTableRow) | **GET** /{companyDomain}/v1/employees/{id}/tables/{table} | Gets table rows for a given employee and table combination |
| [**getEmployeesDirectory()**](PublicAPIApi.md#getEmployeesDirectory) | **GET** /{companyDomain}/v1/employees/directory | Get Employee Directory |
| [**getFieldsFromDataset()**](PublicAPIApi.md#getFieldsFromDataset) | **GET** /{companyDomain}/v1/datasets/{datasetName}/fields | Get Fields from Dataset |
| [**getGoalAggregate()**](PublicAPIApi.md#getGoalAggregate) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Aggregate Goal Info |
| [**getGoalComments()**](PublicAPIApi.md#getGoalComments) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments |
| [**getGoals()**](PublicAPIApi.md#getGoals) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals | Get Goals |
| [**getGoalsAggregateV1()**](PublicAPIApi.md#getGoalsAggregateV1) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info |
| [**getGoalsAggregateV11()**](PublicAPIApi.md#getGoalsAggregateV11) | **GET** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.1 |
| [**getGoalsAggregateV12()**](PublicAPIApi.md#getGoalsAggregateV12) | **GET** /{companyDomain}/v1_2/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.2 |
| [**getGoalsAlignmentOptions()**](PublicAPIApi.md#getGoalsAlignmentOptions) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/alignmentOptions | Alignable Goal Options |
| [**getGoalsFiltersV1()**](PublicAPIApi.md#getGoalsFiltersV1) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/filters |  |
| [**getGoalsFiltersV11()**](PublicAPIApi.md#getGoalsFiltersV11) | **GET** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/filters |  |
| [**getGoalsFiltersV12()**](PublicAPIApi.md#getGoalsFiltersV12) | **GET** /{companyDomain}/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts, Version 1.2 |
| [**getGoalsShareOptions()**](PublicAPIApi.md#getGoalsShareOptions) | **GET** /{companyDomain}/v1/performance/employees/{employeeId}/goals/shareOptions | Available Goal Sharing Options |
| [**getHiringLeads()**](PublicAPIApi.md#getHiringLeads) | **GET** /{companyDomain}/v1/applicant_tracking/hiring_leads | Get Hiring Leads |
| [**getJobSummaries()**](PublicAPIApi.md#getJobSummaries) | **GET** /{companyDomain}/v1/applicant_tracking/jobs | Get Job Summaries |
| [**getMemberBenefit()**](PublicAPIApi.md#getMemberBenefit) | **GET** /{companyDomain}/v1/benefit/member_benefit | Get a list of member benefit events |
| [**getMonitorFields()**](PublicAPIApi.md#getMonitorFields) | **GET** /{companyDomain}/v1/webhooks/monitor_fields | Get monitor fields |
| [**getStatuses()**](PublicAPIApi.md#getStatuses) | **GET** /{companyDomain}/v1/applicant_tracking/statuses | Get Statuses |
| [**getTimeOffPolicies()**](PublicAPIApi.md#getTimeOffPolicies) | **GET** /{companyDomain}/v1/meta/time_off/policies | Get Time Off Policies |
| [**getTimeOffTypes()**](PublicAPIApi.md#getTimeOffTypes) | **GET** /{companyDomain}/v1/meta/time_off/types | Get Time Off Types |
| [**getWebhook()**](PublicAPIApi.md#getWebhook) | **GET** /{companyDomain}/v1/webhooks/{id} | Get Webhook |
| [**getWebhookList()**](PublicAPIApi.md#getWebhookList) | **GET** /{companyDomain}/v1/webhooks | Gets as list of webhooks for the user API key. |
| [**getWebhookLogs()**](PublicAPIApi.md#getWebhookLogs) | **GET** /{companyDomain}/v1/webhooks/{id}/log | Get Webhook Logs |
| [**listCompanyFiles()**](PublicAPIApi.md#listCompanyFiles) | **GET** /{companyDomain}/v1/files/view | List company files and categories |
| [**listEmployeeFiles()**](PublicAPIApi.md#listEmployeeFiles) | **GET** /{companyDomain}/v1/employees/{id}/files/view | List employee files and categories |
| [**listEmployeeTrainings()**](PublicAPIApi.md#listEmployeeTrainings) | **GET** /{companyDomain}/v1/training/record/employee/{employeeId} | List Employee Trainings |
| [**listReports()**](PublicAPIApi.md#listReports) | **GET** /{companyDomain}/v1/custom-reports | List Reports |
| [**listTrainingCategories()**](PublicAPIApi.md#listTrainingCategories) | **GET** /{companyDomain}/v1/training/category | List Training Categories |
| [**listTrainingTypes()**](PublicAPIApi.md#listTrainingTypes) | **GET** /{companyDomain}/v1/training/type | List Training Types |
| [**login()**](PublicAPIApi.md#login) | **POST** /{companyDomain}/v1/login | User Login |
| [**metadataAddOrUpdateValuesForListFields()**](PublicAPIApi.md#metadataAddOrUpdateValuesForListFields) | **PUT** /{companyDomain}/v1/meta/lists/{listFieldId} | Add or Update Values for List Fields |
| [**metadataGetAListOfFields()**](PublicAPIApi.md#metadataGetAListOfFields) | **GET** /{companyDomain}/v1/meta/fields | Get a list of fields |
| [**metadataGetAListOfTabularFields()**](PublicAPIApi.md#metadataGetAListOfTabularFields) | **GET** /{companyDomain}/v1/meta/tables | Get a list of tabular fields |
| [**metadataGetDetailsForListFields()**](PublicAPIApi.md#metadataGetDetailsForListFields) | **GET** /{companyDomain}/v1/meta/lists | Get details for list fields |
| [**postApplicantStatus()**](PublicAPIApi.md#postApplicantStatus) | **POST** /{companyDomain}/v1/applicant_tracking/applications/{applicationId}/status | Change Applicant&#39;s Status |
| [**postApplicationComment()**](PublicAPIApi.md#postApplicationComment) | **POST** /{companyDomain}/v1/applicant_tracking/applications/{applicationId}/comments | Add Application Comment |
| [**postCloseGoal()**](PublicAPIApi.md#postCloseGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal |
| [**postGoal()**](PublicAPIApi.md#postGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals | Create Goal |
| [**postGoalComment()**](PublicAPIApi.md#postGoalComment) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment |
| [**postReopenGoal()**](PublicAPIApi.md#postReopenGoal) | **POST** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen a Goal |
| [**postWebhook()**](PublicAPIApi.md#postWebhook) | **POST** /{companyDomain}/v1/webhooks | Add Webhook |
| [**putGoalComment()**](PublicAPIApi.md#putGoalComment) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment |
| [**putGoalMilestoneProgress()**](PublicAPIApi.md#putGoalMilestoneProgress) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress |
| [**putGoalProgress()**](PublicAPIApi.md#putGoalProgress) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress |
| [**putGoalSharedWith()**](PublicAPIApi.md#putGoalSharedWith) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing |
| [**putGoalV1()**](PublicAPIApi.md#putGoalV1) | **PUT** /{companyDomain}/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal |
| [**putGoalV11()**](PublicAPIApi.md#putGoalV11) | **PUT** /{companyDomain}/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal, V1.1 |
| [**putWebhook()**](PublicAPIApi.md#putWebhook) | **PUT** /{companyDomain}/v1/webhooks/{id} | Update Webhook |
| [**requestCustomReport()**](PublicAPIApi.md#requestCustomReport) | **POST** /{companyDomain}/v1/reports/custom | Request a custom report |
| [**timeOffAddATimeOffHistoryItemForTimeOffRequest()**](PublicAPIApi.md#timeOffAddATimeOffHistoryItemForTimeOffRequest) | **PUT** /{companyDomain}/v1/employees/{employeeId}/time_off/history | Add a Time Off History Item For Time Off Request |
| [**timeOffAddATimeOffRequest()**](PublicAPIApi.md#timeOffAddATimeOffRequest) | **PUT** /{companyDomain}/v1/employees/{employeeId}/time_off/request | Add a Time Off Request |
| [**timeOffAdjustTimeOffBalance()**](PublicAPIApi.md#timeOffAdjustTimeOffBalance) | **PUT** /{companyDomain}/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance |
| [**timeOffAssignTimeOffPoliciesForAnEmployee()**](PublicAPIApi.md#timeOffAssignTimeOffPoliciesForAnEmployee) | **PUT** /{companyDomain}/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee |
| [**timeOffChangeARequestStatus()**](PublicAPIApi.md#timeOffChangeARequestStatus) | **PUT** /{companyDomain}/v1/time_off/requests/{requestId}/status | Change a Request Status |
| [**timeOffGetTimeOffRequests()**](PublicAPIApi.md#timeOffGetTimeOffRequests) | **GET** /{companyDomain}/v1/time_off/requests | Get Time Off Requests |
| [**timeOffListTimeOffPoliciesForEmployee()**](PublicAPIApi.md#timeOffListTimeOffPoliciesForEmployee) | **GET** /{companyDomain}/v1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee |
| [**timeOffV11AssignTimeOffPoliciesForAnEmployee()**](PublicAPIApi.md#timeOffV11AssignTimeOffPoliciesForAnEmployee) | **PUT** /{companyDomain}/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee, Version 1.1 |
| [**timeOffV11ListTimeOffPoliciesForEmployee()**](PublicAPIApi.md#timeOffV11ListTimeOffPoliciesForEmployee) | **GET** /{companyDomain}/v1_1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee, Version 1.1 |
| [**updateCompanyFile()**](PublicAPIApi.md#updateCompanyFile) | **POST** /{companyDomain}/v1/files/{fileId} | Update Company File |
| [**updateEmployee()**](PublicAPIApi.md#updateEmployee) | **POST** /{companyDomain}/v1/employees/{id} | Update Employee |
| [**updateEmployeeDependent()**](PublicAPIApi.md#updateEmployeeDependent) | **PUT** /{companyDomain}/v1/employeedependents/{id} | Update an employee dependent |
| [**updateEmployeeFile()**](PublicAPIApi.md#updateEmployeeFile) | **POST** /{companyDomain}/v1/employees/{id}/files/{fileId} | Update Employee File |
| [**updateEmployeeTableRow()**](PublicAPIApi.md#updateEmployeeTableRow) | **POST** /{companyDomain}/v1/employees/{id}/tables/{table}/{rowId} | Updates a table row. |
| [**updateEmployeeTableRowV()**](PublicAPIApi.md#updateEmployeeTableRowV) | **POST** /{companyDomain}/v1_1/employees/{id}/tables/{table}/{rowId} | Updates a table row. |
| [**updateEmployeeTrainingRecord()**](PublicAPIApi.md#updateEmployeeTrainingRecord) | **PUT** /{companyDomain}/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record |
| [**updateTrainingCategory()**](PublicAPIApi.md#updateTrainingCategory) | **PUT** /{companyDomain}/v1/training/category/{trainingCategoryId} | Update Training Category |
| [**updateTrainingType()**](PublicAPIApi.md#updateTrainingType) | **PUT** /{companyDomain}/v1/training/type/{trainingTypeId} | Update Training Type |
| [**uploadCompanyFile()**](PublicAPIApi.md#uploadCompanyFile) | **POST** /{companyDomain}/v1/files | Upload Company File |
| [**uploadEmployeeFile()**](PublicAPIApi.md#uploadEmployeeFile) | **POST** /{companyDomain}/v1/employees/{id}/files | Upload Employee File |
| [**uploadEmployeePhoto()**](PublicAPIApi.md#uploadEmployeePhoto) | **POST** /{companyDomain}/v1/employees/{employeeId}/photo | Store a new employee photo |


## `addCompanyFileCategory()`

```php
addCompanyFileCategory($company_domain, $request_body)
```

Add Company File Category

Add a company file category.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->addCompanyFileCategory($company_domain, $request_body);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addCompanyFileCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **request_body** | [**string[]**](../Model/string.md)|  | |

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

## `addEmployee()`

```php
addEmployee($company_domain, $post_new_employee)
```

Add Employee

Add a new employee. New employees must have at least a first name and a last name. The ID of the newly created employee is included in the Location header of the response. Other fields can be included. Please see the [fields](ref:metadata-get-a-list-of-fields) endpoint. New Employees added to a pay schedule synced with Trax Payroll must have the following required fields (listed by API field name): employeeNumber, firstName, lastName, dateOfBirth, ssn, gender, maritalStatus, hireDate, address1, city, state, country, employmentHistoryStatus, exempt, payType, payRate, payPer, location, department, and division.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$post_new_employee = new \MySdk\Model\PostNewEmployee(); // \MySdk\Model\PostNewEmployee

try {
    $apiInstance->addEmployee($company_domain, $post_new_employee);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **post_new_employee** | [**\MySdk\Model\PostNewEmployee**](../Model/PostNewEmployee.md)|  | |

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

## `addEmployeeDependent()`

```php
addEmployeeDependent($company_domain, $employee_dependent)
```

Add an employee dependent

Adds an employee dependent

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_dependent = new \MySdk\Model\EmployeeDependent(); // \MySdk\Model\EmployeeDependent

try {
    $apiInstance->addEmployeeDependent($company_domain, $employee_dependent);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_dependent** | [**\MySdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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

## `addEmployeeFileCategory()`

```php
addEmployeeFileCategory($company_domain, $request_body)
```

Add Employee File Category

Add an employee file category.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$request_body = array('request_body_example'); // string[]

try {
    $apiInstance->addEmployeeFileCategory($company_domain, $request_body);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addEmployeeFileCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **request_body** | [**string[]**](../Model/string.md)|  | |

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

## `addEmployeeTableRow()`

```php
addEmployeeTableRow($company_domain, $id, $table, $table_row_update)
```

Adds a table row

Adds a table row. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the row cannot be added if they are missing any required fields for that table. If the API user is adding a row on the compensation table, the row cannot be added if they are missing any of the required employee fields (including fields not on that table).

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->addEmployeeTableRow($company_domain, $id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addEmployeeTableRowV1()`

```php
addEmployeeTableRowV1($company_domain, $id, $table, $table_row_update)
```

Adds a table row

Adds a table row. Fundamentally the same as version 1 so choose a version and stay with it unless other changes occur. Changes from version 1 are now minor with a few variations limited to ACA, payroll, terminated rehire, gusto, benetrac, and final pay date.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->addEmployeeTableRowV1($company_domain, $id, $table, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addEmployeeTableRowV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

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

## `addNewCandidate()`

```php
addNewCandidate($company_domain, $first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter)
```

Add New Candidate

Add a new candidate application to a job opening. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$first_name = 'first_name_example'; // string | The first name of the candidate.
$last_name = 'last_name_example'; // string | The last name of the candidate.
$job_id = 56; // int | The id of the job opening for the candidate application.
$email = 'email_example'; // string | The email address of the candidate.
$phone_number = 'phone_number_example'; // string | The phone number of the candidate.
$source = 'source_example'; // string | The source of the candidate application, e.g. LinkedIn, Indeed, etc.
$address = 'address_example'; // string | The street address of the candidate.
$city = 'city_example'; // string | The city of the candidate.
$state = 'state_example'; // string | The state or province of the candidate. Accepts state name, abbreviation, or ISO code.
$zip = 'zip_example'; // string | The zip code or postal code of the candidate.
$country = 'country_example'; // string | The country of the candidate. Accepts country name or ISO code.
$linkedin_url = 'linkedin_url_example'; // string | The LinkedIn profile url of the candidate.
$date_available = 'date_available_example'; // string | The available start date of the candidate with the format YYYY-MM-DD.
$desired_salary = 'desired_salary_example'; // string | The desired salary of the candidate.
$referred_by = 'referred_by_example'; // string | The person or entity that referred the candidate.
$website_url = 'website_url_example'; // string | The personal website, blog, or online portfolio of the candidate.
$highest_education = 'highest_education_example'; // string | The highest completed education level of the candidate.
$college_name = 'college_name_example'; // string | The college or university of the candidate.
$references = 'references_example'; // string | A list of references supplied by the candidate.
$resume = 'resume_example'; // string | Resume of the candidate.
$cover_letter = 'cover_letter_example'; // string | Cover letter of the candidate.

try {
    $apiInstance->addNewCandidate($company_domain, $first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addNewCandidate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **first_name** | **string**| The first name of the candidate. | |
| **last_name** | **string**| The last name of the candidate. | |
| **job_id** | **int**| The id of the job opening for the candidate application. | |
| **email** | **string**| The email address of the candidate. | [optional] |
| **phone_number** | **string**| The phone number of the candidate. | [optional] |
| **source** | **string**| The source of the candidate application, e.g. LinkedIn, Indeed, etc. | [optional] |
| **address** | **string**| The street address of the candidate. | [optional] |
| **city** | **string**| The city of the candidate. | [optional] |
| **state** | **string**| The state or province of the candidate. Accepts state name, abbreviation, or ISO code. | [optional] |
| **zip** | **string**| The zip code or postal code of the candidate. | [optional] |
| **country** | **string**| The country of the candidate. Accepts country name or ISO code. | [optional] |
| **linkedin_url** | **string**| The LinkedIn profile url of the candidate. | [optional] |
| **date_available** | **string**| The available start date of the candidate with the format YYYY-MM-DD. | [optional] |
| **desired_salary** | **string**| The desired salary of the candidate. | [optional] |
| **referred_by** | **string**| The person or entity that referred the candidate. | [optional] |
| **website_url** | **string**| The personal website, blog, or online portfolio of the candidate. | [optional] |
| **highest_education** | **string**| The highest completed education level of the candidate. | [optional] |
| **college_name** | **string**| The college or university of the candidate. | [optional] |
| **references** | **string**| A list of references supplied by the candidate. | [optional] |
| **resume** | **string**| Resume of the candidate. | [optional] |
| **cover_letter** | **string**| Cover letter of the candidate. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addNewEmployeeTrainingRecord()`

```php
addNewEmployeeTrainingRecord($company_domain, $employee_id, $add_new_employee_training_record_request): \MySdk\Model\TrainingRecord
```

Add New Employee Training Record

Add a new employee training record. The owner of the API key used must have permission to add trainings for the selected employee.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | The ID of the employee to add a training record to.
$add_new_employee_training_record_request = new \MySdk\Model\AddNewEmployeeTrainingRecordRequest(); // \MySdk\Model\AddNewEmployeeTrainingRecordRequest | Training object to post

try {
    $result = $apiInstance->addNewEmployeeTrainingRecord($company_domain, $employee_id, $add_new_employee_training_record_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addNewEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| The ID of the employee to add a training record to. | |
| **add_new_employee_training_record_request** | [**\MySdk\Model\AddNewEmployeeTrainingRecordRequest**](../Model/AddNewEmployeeTrainingRecordRequest.md)| Training object to post | |

### Return type

[**\MySdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addNewJobOpening()`

```php
addNewJobOpening($company_domain, $posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code)
```

Add New Job Opening

Add a new job opening. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$posting_title = 'posting_title_example'; // string | The posting title of the job opening.
$job_status = 'job_status_example'; // string | The status of the job opening.
$hiring_lead = 56; // int | The employee id (from the v1/applicant_tracking/hiring_leads endpoint) of the hiring lead for the job opening.
$employment_type = 'employment_type_example'; // string | The type of employment offered in the job opening, e.g. Full-Time, Part-Time, Contractor, etc.
$job_description = 'job_description_example'; // string | The long-form text description of the job opening.
$department = 'department_example'; // string | The department of the job opening.
$minimum_experience = 'minimum_experience_example'; // string | The minimum experience level that qualifies a candidate for the job opening.
$compensation = 'compensation_example'; // string | The pay rate or compensation for the job opening.
$job_location = 56; // int | The location id (from the v1/applicant_tracking/locations endpoint) of the job opening. Omit this parameter for a remote job location.
$application_question_resume = 'application_question_resume_example'; // string | Whether the job opening application has a standard question for resume (true) or not (false) or if uploading a resume is mandatory (required).
$application_question_address = 'application_question_address_example'; // string | Whether the job opening application has a standard question for address (true) or not (false) or if entering an address is mandatory (required).
$application_question_linkedin_url = 'application_question_linkedin_url_example'; // string | Whether the job opening application has a standard question for LinkedIn profile url (true) or not (false) or if entering a LinkedIn profile url is mandatory (required).
$application_question_date_available = 'application_question_date_available_example'; // string | Whether the job opening application has a standard question for availability date (true) or not (false) or if entering an availability date is mandatory (required).
$application_question_desired_salary = 'application_question_desired_salary_example'; // string | Whether the job opening application has a standard question for desired salary (true) or not (false) or if entering a desired salary is mandatory (required).
$application_question_cover_letter = 'application_question_cover_letter_example'; // string | Whether the job opening application has a standard question for cover letter (true) or not (false) or if uploading a cover letter is mandatory (required).
$application_question_referred_by = 'application_question_referred_by_example'; // string | Whether the job opening application has a standard question for referred by (true) or not (false) or if entering referred by is mandatory (required).
$application_question_website_url = 'application_question_website_url_example'; // string | Whether the job opening application has a standard question for website url (true) or not (false) or if entering a website url is mandatory (required).
$application_question_highest_education = 'application_question_highest_education_example'; // string | Whether the job opening application has a standard question for highest education (true) or not (false) or if entering highest education is mandatory (required).
$application_question_college = 'application_question_college_example'; // string | Whether the job opening application has a standard question for college (true) or not (false) or if entering a college is mandatory (required).
$application_question_references = 'application_question_references_example'; // string | Whether the job opening application has a standard question for references (true) or not (false) or if entering references is mandatory (required).
$internal_job_code = 'internal_job_code_example'; // string | The internal job code for the job opening.

try {
    $apiInstance->addNewJobOpening($company_domain, $posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addNewJobOpening: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **posting_title** | **string**| The posting title of the job opening. | |
| **job_status** | **string**| The status of the job opening. | |
| **hiring_lead** | **int**| The employee id (from the v1/applicant_tracking/hiring_leads endpoint) of the hiring lead for the job opening. | |
| **employment_type** | **string**| The type of employment offered in the job opening, e.g. Full-Time, Part-Time, Contractor, etc. | |
| **job_description** | **string**| The long-form text description of the job opening. | |
| **department** | **string**| The department of the job opening. | [optional] |
| **minimum_experience** | **string**| The minimum experience level that qualifies a candidate for the job opening. | [optional] |
| **compensation** | **string**| The pay rate or compensation for the job opening. | [optional] |
| **job_location** | **int**| The location id (from the v1/applicant_tracking/locations endpoint) of the job opening. Omit this parameter for a remote job location. | [optional] |
| **application_question_resume** | **string**| Whether the job opening application has a standard question for resume (true) or not (false) or if uploading a resume is mandatory (required). | [optional] |
| **application_question_address** | **string**| Whether the job opening application has a standard question for address (true) or not (false) or if entering an address is mandatory (required). | [optional] |
| **application_question_linkedin_url** | **string**| Whether the job opening application has a standard question for LinkedIn profile url (true) or not (false) or if entering a LinkedIn profile url is mandatory (required). | [optional] |
| **application_question_date_available** | **string**| Whether the job opening application has a standard question for availability date (true) or not (false) or if entering an availability date is mandatory (required). | [optional] |
| **application_question_desired_salary** | **string**| Whether the job opening application has a standard question for desired salary (true) or not (false) or if entering a desired salary is mandatory (required). | [optional] |
| **application_question_cover_letter** | **string**| Whether the job opening application has a standard question for cover letter (true) or not (false) or if uploading a cover letter is mandatory (required). | [optional] |
| **application_question_referred_by** | **string**| Whether the job opening application has a standard question for referred by (true) or not (false) or if entering referred by is mandatory (required). | [optional] |
| **application_question_website_url** | **string**| Whether the job opening application has a standard question for website url (true) or not (false) or if entering a website url is mandatory (required). | [optional] |
| **application_question_highest_education** | **string**| Whether the job opening application has a standard question for highest education (true) or not (false) or if entering highest education is mandatory (required). | [optional] |
| **application_question_college** | **string**| Whether the job opening application has a standard question for college (true) or not (false) or if entering a college is mandatory (required). | [optional] |
| **application_question_references** | **string**| Whether the job opening application has a standard question for references (true) or not (false) or if entering references is mandatory (required). | [optional] |
| **internal_job_code** | **string**| The internal job code for the job opening. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTrainingCategory()`

```php
addTrainingCategory($company_domain, $add_training_category_request): \MySdk\Model\TrainingCategory
```

Add Training Category

Add a training category. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$add_training_category_request = new \MySdk\Model\AddTrainingCategoryRequest(); // \MySdk\Model\AddTrainingCategoryRequest | Training category to post

try {
    $result = $apiInstance->addTrainingCategory($company_domain, $add_training_category_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **add_training_category_request** | [**\MySdk\Model\AddTrainingCategoryRequest**](../Model/AddTrainingCategoryRequest.md)| Training category to post | |

### Return type

[**\MySdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addTrainingType()`

```php
addTrainingType($company_domain, $add_training_type_request): \MySdk\Model\TrainingType
```

Add Training Type

Add a training type. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$add_training_type_request = new \MySdk\Model\AddTrainingTypeRequest(); // \MySdk\Model\AddTrainingTypeRequest | Training object to post

try {
    $result = $apiInstance->addTrainingType($company_domain, $add_training_type_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->addTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **add_training_type_request** | [**\MySdk\Model\AddTrainingTypeRequest**](../Model/AddTrainingTypeRequest.md)| Training object to post | |

### Return type

[**\MySdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `b86bb5db603786dfc98c8f6a7bb1a218()`

```php
b86bb5db603786dfc98c8f6a7bb1a218($company_domain, $employee_id, $b86bb5db603786dfc98c8f6a7bb1a218_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
```

Add Timesheet Clock-In Entry

Clock in an employee.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | ID of the employee to clock in.
$b86bb5db603786dfc98c8f6a7bb1a218_request = new \MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request(); // \MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request

try {
    $result = $apiInstance->b86bb5db603786dfc98c8f6a7bb1a218($company_domain, $employee_id, $b86bb5db603786dfc98c8f6a7bb1a218_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->b86bb5db603786dfc98c8f6a7bb1a218: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| ID of the employee to clock in. | |
| **b86bb5db603786dfc98c8f6a7bb1a218_request** | [**\MySdk\Model\B86bb5db603786dfc98c8f6a7bb1a218Request**](../Model/B86bb5db603786dfc98c8f6a7bb1a218Request.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call0f428442e53dc46d1e2c8ff5b7a483a8()`

```php
call0f428442e53dc46d1e2c8ff5b7a483a8($company_domain, $time_tracking_record): \MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201Response
```

addTimeTrackingBulk

Bulk add/edit hour records

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$time_tracking_record = array(new \MySdk\Model\TimeTrackingRecord()); // \MySdk\Model\TimeTrackingRecord[]

try {
    $result = $apiInstance->call0f428442e53dc46d1e2c8ff5b7a483a8($company_domain, $time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call0f428442e53dc46d1e2c8ff5b7a483a8: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord[]**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201Response**](../Model/0f428442e53dc46d1e2c8ff5b7a483a8201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call149e00955713fb486cd7a81dd6ee31aa()`

```php
call149e00955713fb486cd7a81dd6ee31aa($company_domain, $_149e00955713fb486cd7a81dd6ee31aa_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
```

Add/Edit Timesheet Clock Entries

Add or edit timesheet clock entries.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_149e00955713fb486cd7a81dd6ee31aa_request = new \MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest(); // \MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest

try {
    $result = $apiInstance->call149e00955713fb486cd7a81dd6ee31aa($company_domain, $_149e00955713fb486cd7a81dd6ee31aa_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call149e00955713fb486cd7a81dd6ee31aa: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_149e00955713fb486cd7a81dd6ee31aa_request** | [**\MySdk\Model\149e00955713fb486cd7a81dd6ee31aaRequest**](../Model/149e00955713fb486cd7a81dd6ee31aaRequest.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call14e73aef978eb81d51fdbd74e0e83823()`

```php
call14e73aef978eb81d51fdbd74e0e83823($company_domain, $_14e73aef978eb81d51fdbd74e0e83823_request): mixed
```

adjustTimeTracking

Edit an hour record

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_14e73aef978eb81d51fdbd74e0e83823_request = new \MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request(); // \MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request

try {
    $result = $apiInstance->call14e73aef978eb81d51fdbd74e0e83823($company_domain, $_14e73aef978eb81d51fdbd74e0e83823_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call14e73aef978eb81d51fdbd74e0e83823: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_14e73aef978eb81d51fdbd74e0e83823_request** | [**\MySdk\Model\14e73aef978eb81d51fdbd74e0e83823Request**](../Model/14e73aef978eb81d51fdbd74e0e83823Request.md)|  | |

### Return type

**mixed**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call59d25b8c03d013c96fbbf866769b8206()`

```php
call59d25b8c03d013c96fbbf866769b8206($company_domain, $_59d25b8c03d013c96fbbf866769b8206_request): \MySdk\Model\FieldOptionsTransformer[]
```

Get Field Options

Use this resource to retrieve a list of possible values for a field.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_59d25b8c03d013c96fbbf866769b8206_request = new \MySdk\Model\59d25b8c03d013c96fbbf866769b8206Request(); // \MySdk\Model\59d25b8c03d013c96fbbf866769b8206Request

try {
    $result = $apiInstance->call59d25b8c03d013c96fbbf866769b8206($company_domain, $_59d25b8c03d013c96fbbf866769b8206_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call59d25b8c03d013c96fbbf866769b8206: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_59d25b8c03d013c96fbbf866769b8206_request** | [**\MySdk\Model\59d25b8c03d013c96fbbf866769b8206Request**](../Model/59d25b8c03d013c96fbbf866769b8206Request.md)|  | |

### Return type

[**\MySdk\Model\FieldOptionsTransformer[]**](../Model/FieldOptionsTransformer.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call5e1c5b4ef12e61d1bc975e8b4e00c38d()`

```php
call5e1c5b4ef12e61d1bc975e8b4e00c38d($company_domain, $id): \MySdk\Model\Model5e1c5b4ef12e61d1bc975e8b4e00c38d200Response
```

getTimeTrackingByTimeTrackingId

Get an hour record

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the time tracking ID used to originally create the record.

try {
    $result = $apiInstance->call5e1c5b4ef12e61d1bc975e8b4e00c38d($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call5e1c5b4ef12e61d1bc975e8b4e00c38d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the time tracking ID used to originally create the record. | |

### Return type

[**\MySdk\Model\Model5e1c5b4ef12e61d1bc975e8b4e00c38d200Response**](../Model/5e1c5b4ef12e61d1bc975e8b4e00c38d200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call69c777478f5d52dee1b4f0937dca154f()`

```php
call69c777478f5d52dee1b4f0937dca154f($company_domain, $time_tracking_record): \MySdk\Model\Model69c777478f5d52dee1b4f0937dca154f201Response
```

addTimeTracking

Add an hour record

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$time_tracking_record = new \MySdk\Model\TimeTrackingRecord(); // \MySdk\Model\TimeTrackingRecord

try {
    $result = $apiInstance->call69c777478f5d52dee1b4f0937dca154f($company_domain, $time_tracking_record);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call69c777478f5d52dee1b4f0937dca154f: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **time_tracking_record** | [**\MySdk\Model\TimeTrackingRecord**](../Model/TimeTrackingRecord.md)|  | |

### Return type

[**\MySdk\Model\Model69c777478f5d52dee1b4f0937dca154f201Response**](../Model/69c777478f5d52dee1b4f0937dca154f201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call88ef63550f43537c6b3bfaa03d51d95d()`

```php
call88ef63550f43537c6b3bfaa03d51d95d($company_domain, $employee_id, $_88ef63550f43537c6b3bfaa03d51d95d_request): \MySdk\Model\TimesheetEntryInfoApiTransformer
```

Add Timesheet Clock-Out Entry

Clock out an employee.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | ID of the employee to clock out.
$_88ef63550f43537c6b3bfaa03d51d95d_request = new \MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest(); // \MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest

try {
    $result = $apiInstance->call88ef63550f43537c6b3bfaa03d51d95d($company_domain, $employee_id, $_88ef63550f43537c6b3bfaa03d51d95d_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call88ef63550f43537c6b3bfaa03d51d95d: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| ID of the employee to clock out. | |
| **_88ef63550f43537c6b3bfaa03d51d95d_request** | [**\MySdk\Model\88ef63550f43537c6b3bfaa03d51d95dRequest**](../Model/88ef63550f43537c6b3bfaa03d51d95dRequest.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call910252128bfbd9d42e50f9dc31bb6120()`

```php
call910252128bfbd9d42e50f9dc31bb6120($company_domain, $_910252128bfbd9d42e50f9dc31bb6120_request): \MySdk\Model\TimesheetEntryInfoApiTransformer[]
```

Add/Edit Timesheet Hour Entries

Add or edit timesheet hour entries.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$_910252128bfbd9d42e50f9dc31bb6120_request = new \MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request(); // \MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request

try {
    $result = $apiInstance->call910252128bfbd9d42e50f9dc31bb6120($company_domain, $_910252128bfbd9d42e50f9dc31bb6120_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call910252128bfbd9d42e50f9dc31bb6120: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **_910252128bfbd9d42e50f9dc31bb6120_request** | [**\MySdk\Model\910252128bfbd9d42e50f9dc31bb6120Request**](../Model/910252128bfbd9d42e50f9dc31bb6120Request.md)|  | [optional] |

### Return type

[**\MySdk\Model\TimesheetEntryInfoApiTransformer[]**](../Model/TimesheetEntryInfoApiTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `call9a6d5660f03eadcf705c808a1f44b8c4()`

```php
call9a6d5660f03eadcf705c808a1f44b8c4($company_domain, $start, $end, $employee_ids): \MySdk\Model\EmployeeTimesheetEntryTransformer[]
```

Get Timesheet Entries

Get all timesheet entries for a given period of time.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$start = Tue Dec 31 17:00:00 MST 2024; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days.
$end = Fri Feb 28 17:00:00 MST 2025; // \DateTime | YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days.
$employee_ids = 1,2,3; // string | A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned.

try {
    $result = $apiInstance->call9a6d5660f03eadcf705c808a1f44b8c4($company_domain, $start, $end, $employee_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->call9a6d5660f03eadcf705c808a1f44b8c4: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **start** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/after the specified start date. Must be within the last 365 days. | |
| **end** | **\DateTime**| YYYY-MM-DD. Only show timesheet entries on/before the specified end date. Must be within the last 365 days. | |
| **employee_ids** | **string**| A comma separated list of employee IDs. When specified, only entries that match these employee IDs are returned. | [optional] |

### Return type

[**\MySdk\Model\EmployeeTimesheetEntryTransformer[]**](../Model/EmployeeTimesheetEntryTransformer.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `db65bacaf29686d9c3b1296f6047a065()`

```php
db65bacaf29686d9c3b1296f6047a065($company_domain, $db65bacaf29686d9c3b1296f6047a065_request): mixed
```

Delete Timesheet Hour Entries

Delete timesheet hour entries.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$db65bacaf29686d9c3b1296f6047a065_request = new \MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request(); // \MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request

try {
    $result = $apiInstance->db65bacaf29686d9c3b1296f6047a065($company_domain, $db65bacaf29686d9c3b1296f6047a065_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->db65bacaf29686d9c3b1296f6047a065: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **db65bacaf29686d9c3b1296f6047a065_request** | [**\MySdk\Model\Db65bacaf29686d9c3b1296f6047a065Request**](../Model/Db65bacaf29686d9c3b1296f6047a065Request.md)|  | [optional] |

### Return type

**mixed**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dcb62a5d1780635153b978462f9debd0()`

```php
dcb62a5d1780635153b978462f9debd0($company_domain, $dcb62a5d1780635153b978462f9debd0_request): mixed
```

Delete timesheet clock entries.

Delete timesheet clock entries.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dcb62a5d1780635153b978462f9debd0_request = new \MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request(); // \MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request

try {
    $result = $apiInstance->dcb62a5d1780635153b978462f9debd0($company_domain, $dcb62a5d1780635153b978462f9debd0_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->dcb62a5d1780635153b978462f9debd0: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dcb62a5d1780635153b978462f9debd0_request** | [**\MySdk\Model\Dcb62a5d1780635153b978462f9debd0Request**](../Model/Dcb62a5d1780635153b978462f9debd0Request.md)|  | |

### Return type

**mixed**

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteCompanyFile()`

```php
deleteCompanyFile($company_domain, $file_id)
```

Delete Company File

Delete a company file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$file_id = 'file_id_example'; // string | {fileId} is the ID of the company file being deleted.

try {
    $apiInstance->deleteCompanyFile($company_domain, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **file_id** | **string**| {fileId} is the ID of the company file being deleted. | |

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

## `deleteEmployeeFile()`

```php
deleteEmployeeFile($company_domain, $id, $file_id)
```

Delete Employee File

Delete an employee file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being deleted.

try {
    $apiInstance->deleteEmployeeFile($company_domain, $id, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being deleted. | |

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

## `deleteEmployeeTableRowV1()`

```php
deleteEmployeeTableRowV1($company_domain, $id, $table, $row_id): \MySdk\Model\DeleteEmployeeTableRowV1200Response
```

Deletes a table row

Deletes a table row

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID

try {
    $result = $apiInstance->deleteEmployeeTableRowV1($company_domain, $id, $table, $row_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteEmployeeTableRowV1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |

### Return type

[**\MySdk\Model\DeleteEmployeeTableRowV1200Response**](../Model/DeleteEmployeeTableRowV1200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEmployeeTrainingRecord()`

```php
deleteEmployeeTrainingRecord($company_domain, $employee_training_record_id)
```

Delete Employee Training Record

Delete an existing employee training record. The owner of the API key used must have permission to view and edit the employee and training type.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_training_record_id = 56; // int | The ID of the training record to delete.

try {
    $apiInstance->deleteEmployeeTrainingRecord($company_domain, $employee_training_record_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_training_record_id** | **int**| The ID of the training record to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->deleteGoal: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->deleteGoalComment: ', $e->getMessage(), PHP_EOL;
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

## `deleteTrainingCategory()`

```php
deleteTrainingCategory($company_domain, $training_category_id)
```

Delete Training Category

Delete an existing training category. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$training_category_id = 56; // int | The ID of the training category to delete.

try {
    $apiInstance->deleteTrainingCategory($company_domain, $training_category_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **training_category_id** | **int**| The ID of the training category to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteTrainingType()`

```php
deleteTrainingType($company_domain, $training_type_id)
```

Delete Training Type

Delete an existing training type. The owner of the API key used must have access to training settings. Deleting a training type will only be successful if all employee trainings for this type have been removed prior to this request.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$training_type_id = 56; // int | The ID of the training type to delete.

try {
    $apiInstance->deleteTrainingType($company_domain, $training_type_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **training_type_id** | **int**| The ID of the training type to delete. | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWebhook()`

```php
deleteWebhook($company_domain, $id)
```

Delete Webhook

Delete a webhook that is tied to a specific user API Key.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is an webhook ID that is associated with the User API key.

try {
    $apiInstance->deleteWebhook($company_domain, $id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->deleteWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an webhook ID that is associated with the User API key. | |

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

## `estimateFutureTimeOffBalances()`

```php
estimateFutureTimeOffBalances($company_domain, $end, $employee_id, $accept_header_parameter)
```

Estimate Future Time Off Balances

This endpoint will sum future time off accruals, scheduled time off, and carry-over events to produce estimates for the anticipated time off balance on a given date in the future.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$end = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime
$employee_id = 'employee_id_example'; // string
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->estimateFutureTimeOffBalances($company_domain, $end, $employee_id, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->estimateFutureTimeOffBalances: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **end** | **\DateTime**|  | |
| **employee_id** | **string**|  | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `f97efc203b25647724accb9da7dda7db()`

```php
f97efc203b25647724accb9da7dda7db($company_domain, $id): \MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse
```

deleteTimeTrackingByTimeTrackingId

Delete an hour record

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID).

try {
    $result = $apiInstance->f97efc203b25647724accb9da7dda7db($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->f97efc203b25647724accb9da7dda7db: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| The time tracking id is the id that was used to track the record up to 36 characters in length. (i.e. UUID). | |

### Return type

[**\MySdk\Model\Model0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse**](../Model/0f428442e53dc46d1e2c8ff5b7a483a8201ResponseResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAListOfUsers()`

```php
getAListOfUsers($company_domain)
```

Get a List of Users



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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $apiInstance->getAListOfUsers($company_domain);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getAListOfUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

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

## `getAListOfWhosOut()`

```php
getAListOfWhosOut($company_domain, $accept_header_parameter, $start, $end)
```

Get a list of Who's Out

This endpoint will return a list, sorted by date, of employees who will be out, and company holidays, for a period of time.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$start = 'start_example'; // string | A date in the form YYYY-MM-DD - defaults to the current date.
$end = 'end_example'; // string | A date in the form YYYY-MM-DD - defaults to 14 days from the start date.

try {
    $apiInstance->getAListOfWhosOut($company_domain, $accept_header_parameter, $start, $end);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getAListOfWhosOut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **start** | **string**| A date in the form YYYY-MM-DD - defaults to the current date. | [optional] |
| **end** | **string**| A date in the form YYYY-MM-DD - defaults to 14 days from the start date. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplicationDetails()`

```php
getApplicationDetails($company_domain, $application_id): \MySdk\Model\GetApplicationDetails200Response
```

Get Application Details

Get the details of an application. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$application_id = 56; // int | The ID of the application to look up details.

try {
    $result = $apiInstance->getApplicationDetails($company_domain, $application_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getApplicationDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **application_id** | **int**| The ID of the application to look up details. | |

### Return type

[**\MySdk\Model\GetApplicationDetails200Response**](../Model/GetApplicationDetails200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplications()`

```php
getApplications($company_domain, $page, $job_id, $application_status_id, $application_status, $job_status_groups, $search_string, $sort_by, $sort_order, $new_since): \MySdk\Model\GetApplications200Response
```

Get Applications

Get a list of applications. The owner of the API key used must have access to ATS settings. Combine as many different optional parameter filters as you like.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$page = 56; // int | The page number
$job_id = 56; // int | A Job Id to limit results to
$application_status_id = 56; // int | Application status id to filter by.
$application_status = 'application_status_example'; // string | A list of application status groups to filter by.
$job_status_groups = 'job_status_groups_example'; // string | A list of position status groups to filter by.
$search_string = 'search_string_example'; // string | A general search criteria by which to find applications.
$sort_by = 'sort_by_example'; // string | A specific field to sort the results by.
$sort_order = 'sort_order_example'; // string | Order by which to sort results.
$new_since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Only get applications newer than a given UTC timestamp, for example 2024-01-01 13:00:00

try {
    $result = $apiInstance->getApplications($company_domain, $page, $job_id, $application_status_id, $application_status, $job_status_groups, $search_string, $sort_by, $sort_order, $new_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getApplications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **page** | **int**| The page number | [optional] |
| **job_id** | **int**| A Job Id to limit results to | [optional] |
| **application_status_id** | **int**| Application status id to filter by. | [optional] |
| **application_status** | **string**| A list of application status groups to filter by. | [optional] |
| **job_status_groups** | **string**| A list of position status groups to filter by. | [optional] |
| **search_string** | **string**| A general search criteria by which to find applications. | [optional] |
| **sort_by** | **string**| A specific field to sort the results by. | [optional] |
| **sort_order** | **string**| Order by which to sort results. | [optional] |
| **new_since** | **\DateTime**| Only get applications newer than a given UTC timestamp, for example 2024-01-01 13:00:00 | [optional] |

### Return type

[**\MySdk\Model\GetApplications200Response**](../Model/GetApplications200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBenefitCoverages()`

```php
getBenefitCoverages($company_domain, $accept_header_parameter)
```

Get benefit coverages

Get benefit coverages

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getBenefitCoverages($company_domain, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getBenefitCoverages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBenefitDeductionTypes()`

```php
getBenefitDeductionTypes($company_domain)
```

Get benefit deduction types

Get benefit deduction types

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $apiInstance->getBenefitDeductionTypes($company_domain);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getBenefitDeductionTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

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

## `getByReportId()`

```php
getByReportId($company_domain, $report_id): \MySdk\Model\EmployeeResponse
```

Get Report by ID

Use this resource to retrieve data for a specific report.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$report_id = 56; // int

try {
    $result = $apiInstance->getByReportId($company_domain, $report_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getByReportId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **report_id** | **int**|  | |

### Return type

[**\MySdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getCanCreateGoal: ', $e->getMessage(), PHP_EOL;
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

## `getChangedEmployeeIds()`

```php
getChangedEmployeeIds($company_domain, $since, $type)
```

Gets all updated employee IDs

This API allows for efficient syncing of employee data. When you use this API you will provide a timestamp and the results will be limited to just the employees that have changed since the time you provided. This API operates on an employee-last-changed-timestamp, which means that a change in ANY individual field in the employee record, as well as any change to the employment status, job info, or compensation tables, will cause that employee to be returned via this API.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$since = 'since_example'; // string | URL encoded iso8601 timestamp
$type = 'type_example'; // string | Use one of these in the {type} variable in the URL: \"inserted\", \"updated\", \"deleted\"

try {
    $apiInstance->getChangedEmployeeIds($company_domain, $since, $type);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getChangedEmployeeIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **since** | **string**| URL encoded iso8601 timestamp | |
| **type** | **string**| Use one of these in the {type} variable in the URL: \&quot;inserted\&quot;, \&quot;updated\&quot;, \&quot;deleted\&quot; | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getChangedEmployeeTableData()`

```php
getChangedEmployeeTableData($company_domain, $table, $since)
```

Gets all updated employee table data

This API is merely an optimization to avoid downloading all table data for all employees. When you use this API you will provide a timestamp and the results will be limited to just the employees that have changed since the time you provided. This API operates on an employee-last-changed-timestamp, which means that a change in ANY field in the employee record will cause ALL of that employees table rows to show up via this API.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$table = 'table_example'; // string | Table name
$since = 'since_example'; // string | URL encoded iso8601 timestamp

try {
    $apiInstance->getChangedEmployeeTableData($company_domain, $table, $since);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getChangedEmployeeTableData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **table** | **string**| Table name | |
| **since** | **string**| URL encoded iso8601 timestamp | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyEINs()`

```php
getCompanyEINs($company_domain): \MySdk\Model\GetCompanyEINs200Response
```

Get Company EINs

Gets Company EINs

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getCompanyEINs($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getCompanyEINs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetCompanyEINs200Response**](../Model/GetCompanyEINs200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyFile()`

```php
getCompanyFile($company_domain, $file_id)
```

Get an Company File

Gets an company file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$file_id = 'file_id_example'; // string | {fileId} is the ID of the company file being retrieved.

try {
    $apiInstance->getCompanyFile($company_domain, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **file_id** | **string**| {fileId} is the ID of the company file being retrieved. | |

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

## `getCompanyInformation()`

```php
getCompanyInformation($company_domain): \MySdk\Model\GetCompanyInformation200Response
```

Get Company Information

Gets Company Information

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getCompanyInformation($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getCompanyInformation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetCompanyInformation200Response**](../Model/GetCompanyInformation200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyLocations()`

```php
getCompanyLocations($company_domain): \MySdk\Model\GetCompanyLocations200ResponseInner[]
```

Get Company Locations

Get company locations for use in creating a new job opening. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getCompanyLocations($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getCompanyLocations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetCompanyLocations200ResponseInner[]**](../Model/GetCompanyLocations200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyReport()`

```php
getCompanyReport($company_domain, $id, $format, $accept_header_parameter, $fd, $only_current)
```

Get company report

**Warning: This endpoint will soon be deprecated and replaced with Custom Reports - Get Report by ID.**   Use this resource to request one of your existing custom company reports from the My Reports or Manage Reports sections in the Reports tab. You can get the report number by hovering over the report name and noting the ID from the URL. At present, only reports from the My Reports or Manage Reports sections are supported. In the future we may implement reports from the Standard Reports section if there is enough demand for it. The report numbers used in this request are different in each company.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is a report ID.
$format = 'format_example'; // string | The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$fd = 'fd_example'; // string | yes=apply standard duplicate field filtering, no=return the raw results with no duplicate filtering. Default value is \"yes\"
$only_current = false; // bool | Setting to false will return future dated values from history table fields.

try {
    $apiInstance->getCompanyReport($company_domain, $id, $format, $accept_header_parameter, $fd, $only_current);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getCompanyReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is a report ID. | |
| **format** | **string**| The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **fd** | **string**| yes&#x3D;apply standard duplicate field filtering, no&#x3D;return the raw results with no duplicate filtering. Default value is \&quot;yes\&quot; | [optional] |
| **only_current** | **bool**| Setting to false will return future dated values from history table fields. | [optional] [default to false] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDataFromDataset()`

```php
getDataFromDataset($company_domain, $dataset_name, $data_request): \MySdk\Model\EmployeeResponse
```

Get Data from Dataset

Use this resource to request data from the specified dataset. You must specify a list of fields to show on the report. The list of fields is available here at /{companyDomain}/datasets/{datasetName}/fields.  Sort By you can pass multiple fields to sort by as an array of objects {field: \"fieldName\", sort: \"asc,desc\"}. The order of the fields in the array will determine the order of the sort.  Group By is passed as an array of strings but currently grouping by more than one field is not supported.  When using aggregations the following aggregates are available based on field type:   - **text**     - count   - **date**     - count     - min     - max   - **int**     - count     - min     - max     - sum     - avg   - **bool**     - count   - **options**     - count   - **ssnText**     - count  When using the filters the filtered field does not have to be in the list of fields you want to show on the report. When you\\'re using the \"status\" field as a filter, there\\'s something special to note. The \"status\" filter is always required, no matter what you set for the \"matches\" field. So, if you include \"status\" and set \"matches\" to \"all,\" your query will look like this: status AND filter1 AND filter2 AND filter3. But if you set \"matches\" to \"any,\" it changes to: status AND (filter1 OR filter2 OR filter3). If needed, use the `/{companyDomain}/v1/field-options` endpoint to retrieve possible filter values for fields. The following operators are available to be used based on the field type:   - **text**     - contains     - does_not_contain     - equal     - not_equal     - empty     - not_empty   - **date**     - lt     - lte     - gt     - gte     - last     - next     - range     - equal     - not_equal     - empty     - not_empty   - **int**     - equal     - not_equal     - gte     - gt     - lte     - lt     - empty     - not_empty   - **bool**     - checked     - not_checked   - **options**     - includes     - does_not_include     - empty     - not_empty   - **ssnText**:     - empty     - not_empty

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want data from
$data_request = new \MySdk\Model\DataRequest(); // \MySdk\Model\DataRequest

try {
    $result = $apiInstance->getDataFromDataset($company_domain, $dataset_name, $data_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getDataFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dataset_name** | **string**| The name of the dataset you want data from | |
| **data_request** | [**\MySdk\Model\DataRequest**](../Model/DataRequest.md)|  | |

### Return type

[**\MySdk\Model\EmployeeResponse**](../Model/EmployeeResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDataSets()`

```php
getDataSets($company_domain): \MySdk\Model\DatasetResponse
```

Get Data Sets

Use this resource to retrieve the available datasets to query data from.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getDataSets($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getDataSets: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\DatasetResponse**](../Model/DatasetResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployee()`

```php
getEmployee($company_domain, $fields, $id, $only_current, $accept_header_parameter): \MySdk\Model\GetEmployee200Response
```

Get Employee

Get employee data by specifying a set of fields. This is suitable for getting basic employee information, including current values for fields that are part of a historical table, like job title, or compensation information. See the [fields](ref:metadata-get-a-list-of-fields) endpoint for a list of possible fields.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$fields = 'firstName,lastName'; // string | {fields} is a comma separated list of values taken from the official list of field names.
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$only_current = false; // bool | Setting to false will return future dated values from history table fields.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployee($company_domain, $fields, $id, $only_current, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **fields** | **string**| {fields} is a comma separated list of values taken from the official list of field names. | [default to &#39;firstName,lastName&#39;] |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **only_current** | **bool**| Setting to false will return future dated values from history table fields. | [optional] [default to false] |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\MySdk\Model\GetEmployee200Response**](../Model/GetEmployee200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeDependent()`

```php
getEmployeeDependent($company_domain, $id, $accept_header_parameter)
```

Get employee dependent

Get employee dependent

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee dependent ID.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getEmployeeDependent($company_domain, $id, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee dependent ID. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeDependents()`

```php
getEmployeeDependents($company_domain, $employeeid, $accept_header_parameter)
```

Get all employee dependents

Get all employee dependents

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employeeid = 'employeeid_example'; // string | {employeeid} is the employee ID. Supplying this ID limits the response to the specific employee.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getEmployeeDependents($company_domain, $employeeid, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeeDependents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employeeid** | **string**| {employeeid} is the employee ID. Supplying this ID limits the response to the specific employee. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeeFile()`

```php
getEmployeeFile($company_domain, $id, $file_id)
```

Get an Employee File

Gets an employee file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being retrieved.

try {
    $apiInstance->getEmployeeFile($company_domain, $id, $file_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being retrieved. | |

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

## `getEmployeePhoto()`

```php
getEmployeePhoto($company_domain, $employee_id, $size)
```

Get an employee photo

Get an employee photo

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | The ID for the employee you are getting the photo for.
$size = 'size_example'; // string | Photo size

try {
    $apiInstance->getEmployeePhoto($company_domain, $employee_id, $size);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeePhoto: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| The ID for the employee you are getting the photo for. | |
| **size** | **string**| Photo size | |

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

## `getEmployeeTableRow()`

```php
getEmployeeTableRow($company_domain, $id, $table)
```

Gets table rows for a given employee and table combination

Returns a data structure representing all the table rows for a given employee and table combination. The result is not sorted in any particular order.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name

try {
    $apiInstance->getEmployeeTableRow($company_domain, $id, $table);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmployeesDirectory()`

```php
getEmployeesDirectory($company_domain, $accept_header_parameter): \MySdk\Model\GetEmployee200Response
```

Get Employee Directory

Gets employee directory.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $result = $apiInstance->getEmployeesDirectory($company_domain, $accept_header_parameter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getEmployeesDirectory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

[**\MySdk\Model\GetEmployee200Response**](../Model/GetEmployee200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFieldsFromDataset()`

```php
getFieldsFromDataset($company_domain, $dataset_name, $page, $page_size): \MySdk\Model\DatasetFieldsResponse
```

Get Fields from Dataset

Use this resource to request the available fields on a dataset.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$dataset_name = 'dataset_name_example'; // string | The name of the dataset you want to see fields for
$page = 56; // int | The page number to retrieve
$page_size = 56; // int | The number of records to retrieve per page. Default is 500 and the Max is 1000

try {
    $result = $apiInstance->getFieldsFromDataset($company_domain, $dataset_name, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getFieldsFromDataset: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **dataset_name** | **string**| The name of the dataset you want to see fields for | |
| **page** | **int**| The page number to retrieve | [optional] |
| **page_size** | **int**| The number of records to retrieve per page. Default is 500 and the Max is 1000 | [optional] |

### Return type

[**\MySdk\Model\DatasetFieldsResponse**](../Model/DatasetFieldsResponse.md)

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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalAggregate: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalComments: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoals: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsAggregateV1: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsAggregateV11: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsAggregateV12: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsAlignmentOptions: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsFiltersV1: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsFiltersV11: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsFiltersV12: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->getGoalsShareOptions: ', $e->getMessage(), PHP_EOL;
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

## `getHiringLeads()`

```php
getHiringLeads($company_domain): \MySdk\Model\GetHiringLeads200ResponseInner[]
```

Get Hiring Leads

Get potential hiring leads for use in creating a new job opening. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getHiringLeads($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getHiringLeads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetHiringLeads200ResponseInner[]**](../Model/GetHiringLeads200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobSummaries()`

```php
getJobSummaries($company_domain, $status_groups, $sort_by, $sort_order)
```

Get Job Summaries

Get a list of job summaries. The owner of the API key used must have access to ATS settings. Combine as many different optional parameter filters as you like.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$status_groups = 'status_groups_example'; // string | A list of status groups to filter positions by.
$sort_by = 'sort_by_example'; // string | A specific field to sort the results by.
$sort_order = 'sort_order_example'; // string | Order by which to sort results.

try {
    $apiInstance->getJobSummaries($company_domain, $status_groups, $sort_by, $sort_order);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getJobSummaries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **status_groups** | **string**| A list of status groups to filter positions by. | [optional] |
| **sort_by** | **string**| A specific field to sort the results by. | [optional] |
| **sort_order** | **string**| Order by which to sort results. | [optional] |

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

## `getMemberBenefit()`

```php
getMemberBenefit($company_domain): \MySdk\Model\MemberBenefitEvent[]
```

Get a list of member benefit events

Get a list of member benefit events

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getMemberBenefit($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getMemberBenefit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\MemberBenefitEvent[]**](../Model/MemberBenefitEvent.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMonitorFields()`

```php
getMonitorFields($company_domain): \MySdk\Model\GetMonitorFields200Response
```

Get monitor fields

Get a list fields webhooks can monitor monitor

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getMonitorFields($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getMonitorFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetMonitorFields200Response**](../Model/GetMonitorFields200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStatuses()`

```php
getStatuses($company_domain)
```

Get Statuses

Get a list of statuses for a company. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $apiInstance->getStatuses($company_domain);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getStatuses: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

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

## `getTimeOffPolicies()`

```php
getTimeOffPolicies($company_domain, $accept_header_parameter)
```

Get Time Off Policies

This endpoint gets a list of time off policies.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->getTimeOffPolicies($company_domain, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getTimeOffPolicies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

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

## `getTimeOffTypes()`

```php
getTimeOffTypes($company_domain, $accept_header_parameter, $mode)
```

Get Time Off Types

This endpoint gets a list of time off types.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$mode = 'mode_example'; // string | set to \\'request\\' to get a list of all time off types with which this user can create a time off request. The default is to return the list of time off types the user has permissions on. This distinction is important, as employees can request time off for types that they don\\'t have permission to view balances and requests for.

try {
    $apiInstance->getTimeOffTypes($company_domain, $accept_header_parameter, $mode);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getTimeOffTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **mode** | **string**| set to \\&#39;request\\&#39; to get a list of all time off types with which this user can create a time off request. The default is to return the list of time off types the user has permissions on. This distinction is important, as employees can request time off for types that they don\\&#39;t have permission to view balances and requests for. | [optional] |

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

## `getWebhook()`

```php
getWebhook($company_domain, $id): \MySdk\Model\WebHookResponse
```

Get Webhook

Get webhook data that is tied to a specific user API Key.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 56; // int | The webhook ID to display details about.

try {
    $result = $apiInstance->getWebhook($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **int**| The webhook ID to display details about. | |

### Return type

[**\MySdk\Model\WebHookResponse**](../Model/WebHookResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhookList()`

```php
getWebhookList($company_domain): \MySdk\Model\GetWebhookList200Response
```

Gets as list of webhooks for the user API key.

Gets as list of webhooks for the user API key.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->getWebhookList($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getWebhookList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\GetWebhookList200Response**](../Model/GetWebhookList200Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhookLogs()`

```php
getWebhookLogs($company_domain, $id): \MySdk\Model\WebHookLogResponse
```

Get Webhook Logs

Get webhook logs for specific webhook id that is associated with the user API Key.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | The webhook ID to get logs about.

try {
    $result = $apiInstance->getWebhookLogs($company_domain, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->getWebhookLogs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| The webhook ID to get logs about. | |

### Return type

[**\MySdk\Model\WebHookLogResponse**](../Model/WebHookLogResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCompanyFiles()`

```php
listCompanyFiles($company_domain)
```

List company files and categories

Lists company files and categories

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $apiInstance->listCompanyFiles($company_domain);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listCompanyFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeFiles()`

```php
listEmployeeFiles($company_domain, $id)
```

List employee files and categories

Lists employee files and categories

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).

try {
    $apiInstance->listEmployeeFiles($company_domain, $id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listEmployeeFiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEmployeeTrainings()`

```php
listEmployeeTrainings($company_domain, $employee_id, $training_type_id): \MySdk\Model\ListEmployeeTrainings200ResponseInner[]
```

List Employee Trainings

Get all employee training records. The owner of the API key used must have access to view the employee. The API will only return trainings for the employee that the owner of the API key has permission to see. Included with each employee training is the training information that has been selected for tracking in settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | The ID of the employee to get a list of trainings for.
$training_type_id = 56; // int | The training type id is optional. Not supplying a training type id will return the collection of all training records for the employee.

try {
    $result = $apiInstance->listEmployeeTrainings($company_domain, $employee_id, $training_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listEmployeeTrainings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| The ID of the employee to get a list of trainings for. | |
| **training_type_id** | **int**| The training type id is optional. Not supplying a training type id will return the collection of all training records for the employee. | [optional] |

### Return type

[**\MySdk\Model\ListEmployeeTrainings200ResponseInner[]**](../Model/ListEmployeeTrainings200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listReports()`

```php
listReports($company_domain, $page, $page_size): \MySdk\Model\ReportsResponse
```

List Reports

Use this resource to retrieve a list of available reports.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$page = 56; // int | The page number to retrieve
$page_size = 56; // int | The number of records to retrieve per page. Default is 500 and the Max is 1000

try {
    $result = $apiInstance->listReports($company_domain, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listReports: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **page** | **int**| The page number to retrieve | [optional] |
| **page_size** | **int**| The number of records to retrieve per page. Default is 500 and the Max is 1000 | [optional] |

### Return type

[**\MySdk\Model\ReportsResponse**](../Model/ReportsResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTrainingCategories()`

```php
listTrainingCategories($company_domain): \MySdk\Model\ListTrainingCategories200ResponseInner[]
```

List Training Categories

Get a list of training categories. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->listTrainingCategories($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listTrainingCategories: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\ListTrainingCategories200ResponseInner[]**](../Model/ListTrainingCategories200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTrainingTypes()`

```php
listTrainingTypes($company_domain): \MySdk\Model\ListTrainingTypes200ResponseInner[]
```

List Training Types

Get a list of training types. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $result = $apiInstance->listTrainingTypes($company_domain);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->listTrainingTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

### Return type

[**\MySdk\Model\ListTrainingTypes200ResponseInner[]**](../Model/ListTrainingTypes200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `login()`

```php
login($company_domain, $accept_header_parameter, $application_key, $user, $password)
```

User Login

User Login

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$application_key = 'application_key_example'; // string
$user = 'user_example'; // string
$password = 'password_example'; // string

try {
    $apiInstance->login($company_domain, $accept_header_parameter, $application_key, $user, $password);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->login: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **application_key** | **string**|  | [optional] |
| **user** | **string**|  | [optional] |
| **password** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataAddOrUpdateValuesForListFields()`

```php
metadataAddOrUpdateValuesForListFields($company_domain, $list_field_id, $list_field_values)
```

Add or Update Values for List Fields

This resource accepts one or more options. To update an option, specify an ID. You may also remove an option from the list of current values by archiving the value. To create a new option, do not specify an \"id\" attribute.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$list_field_id = 'list_field_id_example'; // string
$list_field_values = new \MySdk\Model\ListFieldValues(); // \MySdk\Model\ListFieldValues

try {
    $apiInstance->metadataAddOrUpdateValuesForListFields($company_domain, $list_field_id, $list_field_values);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->metadataAddOrUpdateValuesForListFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **list_field_id** | **string**|  | |
| **list_field_values** | [**\MySdk\Model\ListFieldValues**](../Model/ListFieldValues.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataGetAListOfFields()`

```php
metadataGetAListOfFields($company_domain, $accept_header_parameter)
```

Get a list of fields

This endpoint can help with discovery of fields that are available in an account.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetAListOfFields($company_domain, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->metadataGetAListOfFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataGetAListOfTabularFields()`

```php
metadataGetAListOfTabularFields($company_domain, $accept_header_parameter)
```

Get a list of tabular fields

This endpoint can help discover table fields available in your BambooHR account.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetAListOfTabularFields($company_domain, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->metadataGetAListOfTabularFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `metadataGetDetailsForListFields()`

```php
metadataGetDetailsForListFields($company_domain, $accept_header_parameter)
```

Get details for list fields

This endpoint will return details for all list fields. Lists that can be edited will have the \"manageable\" attribute set to yes. Lists with the \"multiple\" attribute set to yes are fields that can have multiple values. Options with the \"archived\" attribute set to yes should not appear as current options, but are included so that historical data can reference the value.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.

try {
    $apiInstance->metadataGetDetailsForListFields($company_domain, $accept_header_parameter);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->metadataGetDetailsForListFields: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApplicantStatus()`

```php
postApplicantStatus($company_domain, $application_id, $post_applicant_status_request)
```

Change Applicant's Status

Change applicant\\'s status. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$application_id = 56; // int | The ID of the application to add a comment to.
$post_applicant_status_request = new \MySdk\Model\PostApplicantStatusRequest(); // \MySdk\Model\PostApplicantStatusRequest | Sample Post Data.

try {
    $apiInstance->postApplicantStatus($company_domain, $application_id, $post_applicant_status_request);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->postApplicantStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **application_id** | **int**| The ID of the application to add a comment to. | |
| **post_applicant_status_request** | [**\MySdk\Model\PostApplicantStatusRequest**](../Model/PostApplicantStatusRequest.md)| Sample Post Data. | |

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

## `postApplicationComment()`

```php
postApplicationComment($company_domain, $application_id, $post_application_comment_request)
```

Add Application Comment

Add a comment to an application. The owner of the API key used must have access to ATS settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$application_id = 56; // int | The ID of the application to add a comment to.
$post_application_comment_request = new \MySdk\Model\PostApplicationCommentRequest(); // \MySdk\Model\PostApplicationCommentRequest | Comment object to post

try {
    $apiInstance->postApplicationComment($company_domain, $application_id, $post_application_comment_request);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->postApplicationComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **application_id** | **int**| The ID of the application to add a comment to. | |
| **post_application_comment_request** | [**\MySdk\Model\PostApplicationCommentRequest**](../Model/PostApplicationCommentRequest.md)| Comment object to post | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->postCloseGoal: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->postGoal: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->postGoalComment: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->postReopenGoal: ', $e->getMessage(), PHP_EOL;
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

## `postWebhook()`

```php
postWebhook($company_domain, $new_web_hook): \MySdk\Model\PostWebhook201Response
```

Add Webhook

Add a new Webhook. For more details or instructions you can refer to the [webhooks API tutorial](https://documentation.bamboohr.com/docs/webhooks-api-permission-based).

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$new_web_hook = new \MySdk\Model\NewWebHook(); // \MySdk\Model\NewWebHook

try {
    $result = $apiInstance->postWebhook($company_domain, $new_web_hook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->postWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **new_web_hook** | [**\MySdk\Model\NewWebHook**](../Model/NewWebHook.md)|  | |

### Return type

[**\MySdk\Model\PostWebhook201Response**](../Model/PostWebhook201Response.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalComment: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalMilestoneProgress: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalProgress: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalSharedWith: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalV1: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new MySdk\Api\PublicAPIApi(
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
    echo 'Exception when calling PublicAPIApi->putGoalV11: ', $e->getMessage(), PHP_EOL;
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

## `putWebhook()`

```php
putWebhook($company_domain, $id, $new_web_hook): \MySdk\Model\WebHookResponse
```

Update Webhook

Update a webhook, based on webhook ID.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is a webhook ID.
$new_web_hook = new \MySdk\Model\NewWebHook(); // \MySdk\Model\NewWebHook

try {
    $result = $apiInstance->putWebhook($company_domain, $id, $new_web_hook);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->putWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is a webhook ID. | |
| **new_web_hook** | [**\MySdk\Model\NewWebHook**](../Model/NewWebHook.md)|  | |

### Return type

[**\MySdk\Model\WebHookResponse**](../Model/WebHookResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestCustomReport()`

```php
requestCustomReport($company_domain, $format, $request_custom_report, $only_current)
```

Request a custom report

**Warning: This endpoint will soon be deprecated and replaced with Datasets - Get Data from Dataset.**   Use this resource to request BambooHR generate a report. You must specify a type of either \"PDF\", \"XLS\", \"CSV\", \"JSON\", or \"XML\". You must specify a list of fields to show on the report. The list of fields is available here. The custom report will return employees regardless of their status, \"Active\" or \"Inactive\". This differs from the UI, which by default applies a quick filter to display only \"Active\" employees.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$format = 'format_example'; // string | The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON
$request_custom_report = new \MySdk\Model\RequestCustomReport(); // \MySdk\Model\RequestCustomReport
$only_current = false; // bool | Limits the report to only current employees. Setting to false will include future-dated employees in the report.

try {
    $apiInstance->requestCustomReport($company_domain, $format, $request_custom_report, $only_current);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->requestCustomReport: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **format** | **string**| The output format for the report. Supported formats: CSV, PDF, XLS, XML, JSON | |
| **request_custom_report** | [**\MySdk\Model\RequestCustomReport**](../Model/RequestCustomReport.md)|  | |
| **only_current** | **bool**| Limits the report to only current employees. Setting to false will include future-dated employees in the report. | [optional] [default to false] |

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

## `timeOffAddATimeOffHistoryItemForTimeOffRequest()`

```php
timeOffAddATimeOffHistoryItemForTimeOffRequest($company_domain, $employee_id, $time_off_history)
```

Add a Time Off History Item For Time Off Request

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A new time off history item will be inserted into the database. On success, a 201 Created code is returned and the \"Location\" header of the response will contain a URL that identifies the new history item.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | The ID of the employee.
$time_off_history = new \MySdk\Model\TimeOffHistory(); // \MySdk\Model\TimeOffHistory

try {
    $apiInstance->timeOffAddATimeOffHistoryItemForTimeOffRequest($company_domain, $employee_id, $time_off_history);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffAddATimeOffHistoryItemForTimeOffRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| The ID of the employee. | |
| **time_off_history** | [**\MySdk\Model\TimeOffHistory**](../Model/TimeOffHistory.md)|  | |

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

## `timeOffAddATimeOffRequest()`

```php
timeOffAddATimeOffRequest($company_domain, $employee_id, $time_off_request)
```

Add a Time Off Request

A time off request is an entity that describes the decision making process for approving time off. Once a request has been created, a history entry can be created documenting the actual use of time off.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string
$time_off_request = new \MySdk\Model\TimeOffRequest(); // \MySdk\Model\TimeOffRequest

try {
    $apiInstance->timeOffAddATimeOffRequest($company_domain, $employee_id, $time_off_request);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffAddATimeOffRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**|  | |
| **time_off_request** | [**\MySdk\Model\TimeOffRequest**](../Model/TimeOffRequest.md)|  | |

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

## `timeOffAdjustTimeOffBalance()`

```php
timeOffAdjustTimeOffBalance($company_domain, $employee_id, $adjust_time_off_balance)
```

Adjust Time Off Balance

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off balance adjustment will be inserted into the database. On success, a 201 Created code is returned and the \"Location\" header of the response will contain a URL that identifies the new history item.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 56; // int | The ID of the employee.
$adjust_time_off_balance = new \MySdk\Model\AdjustTimeOffBalance(); // \MySdk\Model\AdjustTimeOffBalance

try {
    $apiInstance->timeOffAdjustTimeOffBalance($company_domain, $employee_id, $adjust_time_off_balance);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffAdjustTimeOffBalance: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **int**| The ID of the employee. | |
| **adjust_time_off_balance** | [**\MySdk\Model\AdjustTimeOffBalance**](../Model/AdjustTimeOffBalance.md)|  | |

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

## `timeOffAssignTimeOffPoliciesForAnEmployee()`

```php
timeOffAssignTimeOffPoliciesForAnEmployee($company_domain, $employee_id, $request_body)
```

Assign Time Off Policies for an Employee

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off policy will be assigned to the employee with accruals starting on the date specified. A null start date will remove the assignment. On success, a 200 Success code is returned and the content of the response will be the same as the List Time off Policies API.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string
$request_body = array(new \stdClass); // object[]

try {
    $apiInstance->timeOffAssignTimeOffPoliciesForAnEmployee($company_domain, $employee_id, $request_body);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffAssignTimeOffPoliciesForAnEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**|  | |
| **request_body** | [**object[]**](../Model/object.md)|  | |

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

## `timeOffChangeARequestStatus()`

```php
timeOffChangeARequestStatus($company_domain, $request_id, $request)
```

Change a Request Status

This endpoint allows you to change the status of a request in the system. You can use this to approve, deny, or cancel a time off request.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$request_id = 'request_id_example'; // string
$request = new \MySdk\Model\Request(); // \MySdk\Model\Request

try {
    $apiInstance->timeOffChangeARequestStatus($company_domain, $request_id, $request);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffChangeARequestStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **request_id** | **string**|  | |
| **request** | [**\MySdk\Model\Request**](../Model/Request.md)|  | |

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

## `timeOffGetTimeOffRequests()`

```php
timeOffGetTimeOffRequests($company_domain, $start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status)
```

Get Time Off Requests



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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$start = 'start_example'; // string | YYYY-MM-DD. Only show time off that occurs on/after the specified start date.
$end = 'end_example'; // string | YYYY-MM-DD. Only show time off that occurs on/before the specified end date.
$accept_header_parameter = 'accept_header_parameter_example'; // string | This endpoint can produce either JSON or XML.
$id = 56; // int | A particular request ID to limit the response to.
$action = 'action_example'; // string | Limit to requests that the user has a particular level of access to. Legal values are: \"view\" or \"approve\". Defaults to view.
$employee_id = 'employee_id_example'; // string | A particular employee ID to limit the response to.
$type = 'type_example'; // string | A comma separated list of time off types IDs to include limit the response to. If omitted, requests of all types are included.
$status = 'status_example'; // string | A comma separated list of request status values to include. If omitted, requests of all status values are included. Legal values are \"approved\", \"denied\", \"superceded\", \"requested\", \"canceled\".

try {
    $apiInstance->timeOffGetTimeOffRequests($company_domain, $start, $end, $accept_header_parameter, $id, $action, $employee_id, $type, $status);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffGetTimeOffRequests: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **start** | **string**| YYYY-MM-DD. Only show time off that occurs on/after the specified start date. | |
| **end** | **string**| YYYY-MM-DD. Only show time off that occurs on/before the specified end date. | |
| **accept_header_parameter** | **string**| This endpoint can produce either JSON or XML. | [optional] |
| **id** | **int**| A particular request ID to limit the response to. | [optional] |
| **action** | **string**| Limit to requests that the user has a particular level of access to. Legal values are: \&quot;view\&quot; or \&quot;approve\&quot;. Defaults to view. | [optional] |
| **employee_id** | **string**| A particular employee ID to limit the response to. | [optional] |
| **type** | **string**| A comma separated list of time off types IDs to include limit the response to. If omitted, requests of all types are included. | [optional] |
| **status** | **string**| A comma separated list of request status values to include. If omitted, requests of all status values are included. Legal values are \&quot;approved\&quot;, \&quot;denied\&quot;, \&quot;superceded\&quot;, \&quot;requested\&quot;, \&quot;canceled\&quot;. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `timeOffListTimeOffPoliciesForEmployee()`

```php
timeOffListTimeOffPoliciesForEmployee($company_domain, $employee_id)
```

List Time Off Policies for Employee



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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string

try {
    $apiInstance->timeOffListTimeOffPoliciesForEmployee($company_domain, $employee_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffListTimeOffPoliciesForEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**|  | |

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

## `timeOffV11AssignTimeOffPoliciesForAnEmployee()`

```php
timeOffV11AssignTimeOffPoliciesForAnEmployee($company_domain, $employee_id, $request_body)
```

Assign Time Off Policies for an Employee, Version 1.1

To use this API make an HTTP PUT where the body of the request is the JSON documented below. A time off policy will be assigned to the employee with accruals starting on the date specified. On success, a 200 Success code is returned and the content of the response will be the same as the List Time off Policies API.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string
$request_body = array(new \stdClass); // object[]

try {
    $apiInstance->timeOffV11AssignTimeOffPoliciesForAnEmployee($company_domain, $employee_id, $request_body);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffV11AssignTimeOffPoliciesForAnEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**|  | |
| **request_body** | [**object[]**](../Model/object.md)|  | |

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

## `timeOffV11ListTimeOffPoliciesForEmployee()`

```php
timeOffV11ListTimeOffPoliciesForEmployee($company_domain, $employee_id)
```

List Time Off Policies for Employee, Version 1.1



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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string

try {
    $apiInstance->timeOffV11ListTimeOffPoliciesForEmployee($company_domain, $employee_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->timeOffV11ListTimeOffPoliciesForEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**|  | |

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

## `updateCompanyFile()`

```php
updateCompanyFile($company_domain, $file_id, $company_file_update)
```

Update Company File

Update a company file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being updated.
$company_file_update = new \MySdk\Model\CompanyFileUpdate(); // \MySdk\Model\CompanyFileUpdate

try {
    $apiInstance->updateCompanyFile($company_domain, $file_id, $company_file_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **file_id** | **string**| {fileId} is the ID of the employee file being updated. | |
| **company_file_update** | [**\MySdk\Model\CompanyFileUpdate**](../Model/CompanyFileUpdate.md)|  | |

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

## `updateEmployee()`

```php
updateEmployee($company_domain, $id, $employee)
```

Update Employee

Update an employee, based on employee ID. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the API user will need to update the employee with all of the following required fields for the update to be successful (listed by API field name): employeeNumber, firstName, lastName, dateOfBirth, ssn, gender, maritalStatus, hireDate, address1, city, state, country, employmentHistoryStatus, exempt, payType, payRate, payPer, location, department, and division.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is an employee ID.
$employee = new \MySdk\Model\Employee(); // \MySdk\Model\Employee

try {
    $apiInstance->updateEmployee($company_domain, $id, $employee);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployee: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. | |
| **employee** | [**\MySdk\Model\Employee**](../Model/Employee.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeDependent()`

```php
updateEmployeeDependent($company_domain, $id, $employee_dependent)
```

Update an employee dependent

This API allows you to change the information for a given dependent ID.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee dependent ID.
$employee_dependent = new \MySdk\Model\EmployeeDependent(); // \MySdk\Model\EmployeeDependent

try {
    $apiInstance->updateEmployeeDependent($company_domain, $id, $employee_dependent);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployeeDependent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee dependent ID. | |
| **employee_dependent** | [**\MySdk\Model\EmployeeDependent**](../Model/EmployeeDependent.md)|  | |

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

## `updateEmployeeFile()`

```php
updateEmployeeFile($company_domain, $id, $file_id, $employee_file_update)
```

Update Employee File

Update an employee file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).
$file_id = 'file_id_example'; // string | {fileId} is the ID of the employee file being updated.
$employee_file_update = new \MySdk\Model\EmployeeFileUpdate(); // \MySdk\Model\EmployeeFileUpdate

try {
    $apiInstance->updateEmployeeFile($company_domain, $id, $file_id, $employee_file_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |
| **file_id** | **string**| {fileId} is the ID of the employee file being updated. | |
| **employee_file_update** | [**\MySdk\Model\EmployeeFileUpdate**](../Model/EmployeeFileUpdate.md)|  | |

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

## `updateEmployeeTableRow()`

```php
updateEmployeeTableRow($company_domain, $id, $table, $row_id, $table_row_update)
```

Updates a table row.

Updates a table row. If employee is currently on a pay schedule syncing with Trax Payroll, or being added to one, the row cannot be added if they are missing any required fields for that table. If the API user is updating a row on the compensation table, the row cannot be updated if they are missing any of the required employee fields (including fields not on that table).

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->updateEmployeeTableRow($company_domain, $id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployeeTableRow: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeTableRowV()`

```php
updateEmployeeTableRowV($company_domain, $id, $table, $row_id, $table_row_update)
```

Updates a table row.

Updates a table row. Fundamentally the same as version 1 so choose a version and stay with it unless other changes occur. Changes from version 1 are now minor with a few variations limited to ACA, payroll, terminated rehire, gusto, benetrac, and final pay date.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = 'id_example'; // string | {id} is the employee ID.
$table = 'table_example'; // string | Table name
$row_id = 'row_id_example'; // string | Row ID
$table_row_update = new \MySdk\Model\TableRowUpdate(); // \MySdk\Model\TableRowUpdate

try {
    $apiInstance->updateEmployeeTableRowV($company_domain, $id, $table, $row_id, $table_row_update);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployeeTableRowV: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is the employee ID. | |
| **table** | **string**| Table name | |
| **row_id** | **string**| Row ID | |
| **table_row_update** | [**\MySdk\Model\TableRowUpdate**](../Model/TableRowUpdate.md)|  | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/xml`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEmployeeTrainingRecord()`

```php
updateEmployeeTrainingRecord($company_domain, $employee_training_record_id, $update_employee_training_record_request): \MySdk\Model\TrainingRecord
```

Update Employee Training Record

Update an existing exmployee training record. The owner of the API key used must have permission to add trainings for the selected employee

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_training_record_id = 56; // int | The ID of the training record to update.
$update_employee_training_record_request = new \MySdk\Model\UpdateEmployeeTrainingRecordRequest(); // \MySdk\Model\UpdateEmployeeTrainingRecordRequest | Training object to update

try {
    $result = $apiInstance->updateEmployeeTrainingRecord($company_domain, $employee_training_record_id, $update_employee_training_record_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateEmployeeTrainingRecord: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_training_record_id** | **int**| The ID of the training record to update. | |
| **update_employee_training_record_request** | [**\MySdk\Model\UpdateEmployeeTrainingRecordRequest**](../Model/UpdateEmployeeTrainingRecordRequest.md)| Training object to update | |

### Return type

[**\MySdk\Model\TrainingRecord**](../Model/TrainingRecord.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingCategory()`

```php
updateTrainingCategory($company_domain, $training_category_id, $update_training_category_request): \MySdk\Model\TrainingCategory
```

Update Training Category

Update an existing training category. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$training_category_id = 56; // int | The ID of the training category to update.
$update_training_category_request = new \MySdk\Model\UpdateTrainingCategoryRequest(); // \MySdk\Model\UpdateTrainingCategoryRequest | Training category to update

try {
    $result = $apiInstance->updateTrainingCategory($company_domain, $training_category_id, $update_training_category_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateTrainingCategory: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **training_category_id** | **int**| The ID of the training category to update. | |
| **update_training_category_request** | [**\MySdk\Model\UpdateTrainingCategoryRequest**](../Model/UpdateTrainingCategoryRequest.md)| Training category to update | |

### Return type

[**\MySdk\Model\TrainingCategory**](../Model/TrainingCategory.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateTrainingType()`

```php
updateTrainingType($company_domain, $training_type_id, $update_training_type_request): \MySdk\Model\TrainingType
```

Update Training Type

Update an existing training type. The owner of the API key used must have access to training settings.

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$training_type_id = 56; // int | The ID of the training type to update.
$update_training_type_request = new \MySdk\Model\UpdateTrainingTypeRequest(); // \MySdk\Model\UpdateTrainingTypeRequest | Training type object to update to

try {
    $result = $apiInstance->updateTrainingType($company_domain, $training_type_id, $update_training_type_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->updateTrainingType: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **training_type_id** | **int**| The ID of the training type to update. | |
| **update_training_type_request** | [**\MySdk\Model\UpdateTrainingTypeRequest**](../Model/UpdateTrainingTypeRequest.md)| Training type object to update to | |

### Return type

[**\MySdk\Model\TrainingType**](../Model/TrainingType.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadCompanyFile()`

```php
uploadCompanyFile($company_domain)
```

Upload Company File

Upload a company file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"

try {
    $apiInstance->uploadCompanyFile($company_domain);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->uploadCompanyFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |

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

## `uploadEmployeeFile()`

```php
uploadEmployeeFile($company_domain, $id)
```

Upload Employee File

Upload an employee file

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$id = '0'; // string | {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any).

try {
    $apiInstance->uploadEmployeeFile($company_domain, $id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->uploadEmployeeFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **id** | **string**| {id} is an employee ID. The special employee ID of zero (0) means to use the employee ID associated with the API key (if any). | [default to &#39;0&#39;] |

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

## `uploadEmployeePhoto()`

```php
uploadEmployeePhoto($company_domain, $employee_id)
```

Store a new employee photo

Store a new employee photo

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


$apiInstance = new MySdk\Api\PublicAPIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_domain = 'company_domain_example'; // string | The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \"mycompany\"
$employee_id = 'employee_id_example'; // string | The ID for the employee you are setting the photo for.

try {
    $apiInstance->uploadEmployeePhoto($company_domain, $employee_id);
} catch (Exception $e) {
    echo 'Exception when calling PublicAPIApi->uploadEmployeePhoto: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_domain** | **string**| The subdomain used to access BambooHR. If you access BambooHR at https://mycompany.bamboohr.com, then the companyDomain is \&quot;mycompany\&quot; | |
| **employee_id** | **string**| The ID for the employee you are setting the photo for. | |

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
