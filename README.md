# OpenAPIClient-php

BambooHR API documentation. https://www.bamboohr.com/api/documentation/


## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');
// Configure OAuth2 access token for authorization: oauth
$config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ATSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 56; // int | The ID of the application to look up details.

try {
    $result = $apiInstance->getApplicationDetails($application_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ATSApi->getApplicationDetails: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://companySubDomain.bamboohr.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ATSApi* | [**getApplicationDetails**](docs/Api/ATSApi.md#getapplicationdetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Application Details
*AccountInformationApi* | [**getCountriesOptions**](docs/Api/AccountInformationApi.md#getcountriesoptions) | **GET** /api/v1/meta/countries/options | Get all countries
*AccountInformationApi* | [**getListOfUsers**](docs/Api/AccountInformationApi.md#getlistofusers) | **GET** /api/v1/meta/users | Get a List of Users
*AccountInformationApi* | [**getStatesByCountryId**](docs/Api/AccountInformationApi.md#getstatesbycountryid) | **GET** /api/v1/meta/provinces/{countryId} | Get states by country ID
*AccountInformationApi* | [**metadataAddOrUpdateValuesForListFields**](docs/Api/AccountInformationApi.md#metadataaddorupdatevaluesforlistfields) | **PUT** /api/v1/meta/lists/{listFieldId} | Add or Update Values for List Fields
*AccountInformationApi* | [**metadataGetAListOfFields**](docs/Api/AccountInformationApi.md#metadatagetalistoffields) | **GET** /api/v1/meta/fields | Get a list of fields
*AccountInformationApi* | [**metadataGetAListOfTabularFields**](docs/Api/AccountInformationApi.md#metadatagetalistoftabularfields) | **GET** /api/v1/meta/tables | Get a list of tabular fields
*AccountInformationApi* | [**metadataGetDetailsForListFields**](docs/Api/AccountInformationApi.md#metadatagetdetailsforlistfields) | **GET** /api/v1/meta/lists | Get details for list fields
*ApplicantTrackingApi* | [**addNewCandidate**](docs/Api/ApplicantTrackingApi.md#addnewcandidate) | **POST** /api/v1/applicant_tracking/application | Add New Candidate
*ApplicantTrackingApi* | [**addNewJobOpening**](docs/Api/ApplicantTrackingApi.md#addnewjobopening) | **POST** /api/v1/applicant_tracking/job_opening | Add New Job Opening
*ApplicantTrackingApi* | [**getApplications**](docs/Api/ApplicantTrackingApi.md#getapplications) | **GET** /api/v1/applicant_tracking/applications | Get Applications
*ApplicantTrackingApi* | [**getCompanyLocations**](docs/Api/ApplicantTrackingApi.md#getcompanylocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations
*ApplicantTrackingApi* | [**getHiringLeads**](docs/Api/ApplicantTrackingApi.md#gethiringleads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads
*ApplicantTrackingApi* | [**getJobSummaries**](docs/Api/ApplicantTrackingApi.md#getjobsummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries
*ApplicantTrackingApi* | [**getStatuses**](docs/Api/ApplicantTrackingApi.md#getstatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Statuses
*ApplicantTrackingApi* | [**postApplicantStatus**](docs/Api/ApplicantTrackingApi.md#postapplicantstatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Change Applicant&#39;s Status
*ApplicantTrackingApi* | [**postApplicationComment**](docs/Api/ApplicantTrackingApi.md#postapplicationcomment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Add Application Comment
*BenefitsApi* | [**addEmployeeDependent**](docs/Api/BenefitsApi.md#addemployeedependent) | **POST** /api/v1/employeedependents | Add an employee dependent
*BenefitsApi* | [**getBenefitCoverages**](docs/Api/BenefitsApi.md#getbenefitcoverages) | **GET** /api/v1/benefitcoverages | Get benefit coverages
*BenefitsApi* | [**getBenefitDeductionTypes**](docs/Api/BenefitsApi.md#getbenefitdeductiontypes) | **GET** /api/v1/benefits/settings/deduction_types/all | Get benefit deduction types
*BenefitsApi* | [**getEmployeeDependent**](docs/Api/BenefitsApi.md#getemployeedependent) | **GET** /api/v1/employeedependents/{id} | Get employee dependent
*BenefitsApi* | [**getEmployeeDependents**](docs/Api/BenefitsApi.md#getemployeedependents) | **GET** /api/v1/employeedependents | Get all employee dependents
*BenefitsApi* | [**getMemberBenefit**](docs/Api/BenefitsApi.md#getmemberbenefit) | **GET** /api/v1/benefit/member_benefit | Get a list of member benefit events
*BenefitsApi* | [**updateEmployeeDependent**](docs/Api/BenefitsApi.md#updateemployeedependent) | **PUT** /api/v1/employeedependents/{id} | Update an employee dependent
*CompanyFilesApi* | [**addCompanyFileCategory**](docs/Api/CompanyFilesApi.md#addcompanyfilecategory) | **POST** /api/v1/files/categories | Add Company File Category
*CompanyFilesApi* | [**deleteCompanyFile**](docs/Api/CompanyFilesApi.md#deletecompanyfile) | **DELETE** /api/v1/files/{fileId} | Delete Company File
*CompanyFilesApi* | [**getCompanyFile**](docs/Api/CompanyFilesApi.md#getcompanyfile) | **GET** /api/v1/files/{fileId} | Get an Company File
*CompanyFilesApi* | [**listCompanyFiles**](docs/Api/CompanyFilesApi.md#listcompanyfiles) | **GET** /api/v1/files/view | List company files and categories
*CompanyFilesApi* | [**updateCompanyFile**](docs/Api/CompanyFilesApi.md#updatecompanyfile) | **POST** /api/v1/files/{fileId} | Update Company File
*CompanyFilesApi* | [**uploadCompanyFile**](docs/Api/CompanyFilesApi.md#uploadcompanyfile) | **POST** /api/v1/files | Upload Company File
*CustomReportsApi* | [**getByReportId**](docs/Api/CustomReportsApi.md#getbyreportid) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID
*CustomReportsApi* | [**listReports**](docs/Api/CustomReportsApi.md#listreports) | **GET** /api/v1/custom-reports | List Reports
*DatasetsApi* | [**getDataFromDataset**](docs/Api/DatasetsApi.md#getdatafromdataset) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset
*DatasetsApi* | [**getDataSets**](docs/Api/DatasetsApi.md#getdatasets) | **GET** /api/v1/datasets | Get Data Sets
*DatasetsApi* | [**getFieldsFromDataset**](docs/Api/DatasetsApi.md#getfieldsfromdataset) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset
*EmployeeFilesApi* | [**addEmployeeFileCategory**](docs/Api/EmployeeFilesApi.md#addemployeefilecategory) | **POST** /api/v1/employees/files/categories | Add Employee File Category
*EmployeeFilesApi* | [**deleteEmployeeFile**](docs/Api/EmployeeFilesApi.md#deleteemployeefile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File
*EmployeeFilesApi* | [**getEmployeeFile**](docs/Api/EmployeeFilesApi.md#getemployeefile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get an Employee File
*EmployeeFilesApi* | [**listEmployeeFiles**](docs/Api/EmployeeFilesApi.md#listemployeefiles) | **GET** /api/v1/employees/{id}/files/view | List employee files and categories
*EmployeeFilesApi* | [**updateEmployeeFile**](docs/Api/EmployeeFilesApi.md#updateemployeefile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File
*EmployeeFilesApi* | [**uploadEmployeeFile**](docs/Api/EmployeeFilesApi.md#uploademployeefile) | **POST** /api/v1/employees/{id}/files | Upload Employee File
*EmployeesApi* | [**addEmployee**](docs/Api/EmployeesApi.md#addemployee) | **POST** /api/v1/employees | Add Employee
*EmployeesApi* | [**getCompanyInformation**](docs/Api/EmployeesApi.md#getcompanyinformation) | **GET** /api/v1/company_information | Get Company Information
*EmployeesApi* | [**getEmployee**](docs/Api/EmployeesApi.md#getemployee) | **GET** /api/v1/employees/{id} | Get Employee
*EmployeesApi* | [**getEmployeesDirectory**](docs/Api/EmployeesApi.md#getemployeesdirectory) | **GET** /api/v1/employees/directory | Get Employee Directory
*EmployeesApi* | [**getEmployeesList**](docs/Api/EmployeesApi.md#getemployeeslist) | **GET** /api/v1/employees | Get employees
*EmployeesApi* | [**updateEmployee**](docs/Api/EmployeesApi.md#updateemployee) | **POST** /api/v1/employees/{id} | Update Employee
*GoalsApi* | [**deleteGoal**](docs/Api/GoalsApi.md#deletegoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal
*GoalsApi* | [**deleteGoalComment**](docs/Api/GoalsApi.md#deletegoalcomment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment
*GoalsApi* | [**getCanCreateGoal**](docs/Api/GoalsApi.md#getcancreategoal) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Can Create a Goal
*GoalsApi* | [**getGoalAggregate**](docs/Api/GoalsApi.md#getgoalaggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Aggregate Goal Info
*GoalsApi* | [**getGoalComments**](docs/Api/GoalsApi.md#getgoalcomments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments
*GoalsApi* | [**getGoals**](docs/Api/GoalsApi.md#getgoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | Get Goals
*GoalsApi* | [**getGoalsAggregateV1**](docs/Api/GoalsApi.md#getgoalsaggregatev1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info
*GoalsApi* | [**getGoalsAggregateV11**](docs/Api/GoalsApi.md#getgoalsaggregatev11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.1
*GoalsApi* | [**getGoalsAggregateV12**](docs/Api/GoalsApi.md#getgoalsaggregatev12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.2
*GoalsApi* | [**getGoalsAlignmentOptions**](docs/Api/GoalsApi.md#getgoalsalignmentoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Alignable Goal Options
*GoalsApi* | [**getGoalsFiltersV1**](docs/Api/GoalsApi.md#getgoalsfiltersv1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goals Filters
*GoalsApi* | [**getGoalsFiltersV11**](docs/Api/GoalsApi.md#getgoalsfiltersv11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goals Filters
*GoalsApi* | [**getGoalsFiltersV12**](docs/Api/GoalsApi.md#getgoalsfiltersv12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts, Version 1.2
*GoalsApi* | [**getGoalsShareOptions**](docs/Api/GoalsApi.md#getgoalsshareoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | Available Goal Sharing Options
*GoalsApi* | [**postCloseGoal**](docs/Api/GoalsApi.md#postclosegoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal
*GoalsApi* | [**postGoal**](docs/Api/GoalsApi.md#postgoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal
*GoalsApi* | [**postGoalComment**](docs/Api/GoalsApi.md#postgoalcomment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment
*GoalsApi* | [**postReopenGoal**](docs/Api/GoalsApi.md#postreopengoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen a Goal
*GoalsApi* | [**putGoalComment**](docs/Api/GoalsApi.md#putgoalcomment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment
*GoalsApi* | [**putGoalMilestoneProgress**](docs/Api/GoalsApi.md#putgoalmilestoneprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress
*GoalsApi* | [**putGoalProgress**](docs/Api/GoalsApi.md#putgoalprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress
*GoalsApi* | [**putGoalSharedWith**](docs/Api/GoalsApi.md#putgoalsharedwith) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing
*GoalsApi* | [**putGoalV1**](docs/Api/GoalsApi.md#putgoalv1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal
*GoalsApi* | [**putGoalV11**](docs/Api/GoalsApi.md#putgoalv11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal, V1.1
*HoursApi* | [**addTimeTrackingBulk**](docs/Api/HoursApi.md#addtimetrackingbulk) | **POST** /api/v1/timetracking/record | Add/Edit Hour Records
*HoursApi* | [**addTimeTrackingHourRecord**](docs/Api/HoursApi.md#addtimetrackinghourrecord) | **POST** /api/v1/timetracking/add | Add Hour Record
*HoursApi* | [**deleteTimeTrackingById**](docs/Api/HoursApi.md#deletetimetrackingbyid) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record
*HoursApi* | [**editTimeTrackingRecord**](docs/Api/HoursApi.md#edittimetrackingrecord) | **PUT** /api/v1/timetracking/adjust | Edit Hour Record
*HoursApi* | [**getTimeTrackingRecord**](docs/Api/HoursApi.md#gettimetrackingrecord) | **GET** /api/v1/timetracking/record/{id} | Get Hour Record
*LastChangeInformationApi* | [**getChangedEmployeeIds**](docs/Api/LastChangeInformationApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Gets all updated employee IDs
*LoginApi* | [**login**](docs/Api/LoginApi.md#login) | **POST** /api/v1/login | User Login
*PhotosApi* | [**getEmployeePhoto**](docs/Api/PhotosApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get an employee photo
*PhotosApi* | [**uploadEmployeePhoto**](docs/Api/PhotosApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Store a new employee photo
*ReportsApi* | [**getCompanyReport**](docs/Api/ReportsApi.md#getcompanyreport) | **GET** /api/v1/reports/{id} | Get company report
*ReportsApi* | [**requestCustomReport**](docs/Api/ReportsApi.md#requestcustomreport) | **POST** /api/v1/reports/custom | Request a custom report
*TabularDataApi* | [**addEmployeeTableRow**](docs/Api/TabularDataApi.md#addemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table} | Adds a table row
*TabularDataApi* | [**addEmployeeTableRowV1**](docs/Api/TabularDataApi.md#addemployeetablerowv1) | **POST** /api/v1_1/employees/{id}/tables/{table} | Adds a table row
*TabularDataApi* | [**deleteEmployeeTableRowV1**](docs/Api/TabularDataApi.md#deleteemployeetablerowv1) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Deletes a table row
*TabularDataApi* | [**getChangedEmployeeTableData**](docs/Api/TabularDataApi.md#getchangedemployeetabledata) | **GET** /api/v1/employees/changed/tables/{table} | Gets all updated employee table data
*TabularDataApi* | [**getEmployeeTableRow**](docs/Api/TabularDataApi.md#getemployeetablerow) | **GET** /api/v1/employees/{id}/tables/{table} | Gets table rows for a given employee and table combination
*TabularDataApi* | [**updateEmployeeTableRow**](docs/Api/TabularDataApi.md#updateemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Updates a table row.
*TabularDataApi* | [**updateEmployeeTableRowV**](docs/Api/TabularDataApi.md#updateemployeetablerowv) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Updates a table row.
*TimeOffApi* | [**getAListOfWhoIsOut**](docs/Api/TimeOffApi.md#getalistofwhoisout) | **GET** /api/v1/time_off/whos_out | Get a list of Who&#39;s Out
*TimeOffApi* | [**getTimeOffPolicies**](docs/Api/TimeOffApi.md#gettimeoffpolicies) | **GET** /api/v1/meta/time_off/policies | Get Time Off Policies
*TimeOffApi* | [**getTimeOffTypes**](docs/Api/TimeOffApi.md#gettimeofftypes) | **GET** /api/v1/meta/time_off/types | Get Time Off Types
*TimeOffApi* | [**timeOffAddATimeOffHistoryItemForTimeOffRequest**](docs/Api/TimeOffApi.md#timeoffaddatimeoffhistoryitemfortimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Add a Time Off History Item For Time Off Request
*TimeOffApi* | [**timeOffAddATimeOffRequest**](docs/Api/TimeOffApi.md#timeoffaddatimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Add a Time Off Request
*TimeOffApi* | [**timeOffAdjustTimeOffBalance**](docs/Api/TimeOffApi.md#timeoffadjusttimeoffbalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance
*TimeOffApi* | [**timeOffAssignTimeOffPoliciesForAnEmployee**](docs/Api/TimeOffApi.md#timeoffassigntimeoffpoliciesforanemployee) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee
*TimeOffApi* | [**timeOffAssignTimeOffPoliciesForAnEmployeeV11**](docs/Api/TimeOffApi.md#timeoffassigntimeoffpoliciesforanemployeev11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee, Version 1.1
*TimeOffApi* | [**timeOffChangeARequestStatus**](docs/Api/TimeOffApi.md#timeoffchangearequeststatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Change a Request Status
*TimeOffApi* | [**timeOffEstimateFutureTimeOffBalances**](docs/Api/TimeOffApi.md#timeoffestimatefuturetimeoffbalances) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Estimate Future Time Off Balances
*TimeOffApi* | [**timeOffGetTimeOffRequests**](docs/Api/TimeOffApi.md#timeoffgettimeoffrequests) | **GET** /api/v1/time_off/requests | Get Time Off Requests
*TimeOffApi* | [**timeOffListTimeOffPoliciesForEmployee**](docs/Api/TimeOffApi.md#timeofflisttimeoffpoliciesforemployee) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee
*TimeOffApi* | [**timeOffListTimeOffPoliciesForEmployeeV11**](docs/Api/TimeOffApi.md#timeofflisttimeoffpoliciesforemployeev11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee, Version 1.1
*TimeTrackingApi* | [**addEditTimesheetClockEntries**](docs/Api/TimeTrackingApi.md#addedittimesheetclockentries) | **POST** /api/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries
*TimeTrackingApi* | [**addEditTimesheetHourEntries**](docs/Api/TimeTrackingApi.md#addedittimesheethourentries) | **POST** /api/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries
*TimeTrackingApi* | [**addTimesheetClockInEntry**](docs/Api/TimeTrackingApi.md#addtimesheetclockinentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry
*TimeTrackingApi* | [**addTimesheetClockOutEntry**](docs/Api/TimeTrackingApi.md#addtimesheetclockoutentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry
*TimeTrackingApi* | [**createTimeTrackingProject**](docs/Api/TimeTrackingApi.md#createtimetrackingproject) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project
*TimeTrackingApi* | [**deleteTimesheetClockEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheetclockentriesviapost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*TimeTrackingApi* | [**deleteTimesheetHourEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheethourentriesviapost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*TimeTrackingApi* | [**getTimesheetEntries**](docs/Api/TimeTrackingApi.md#gettimesheetentries) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries
*TrainingApi* | [**addNewEmployeeTrainingRecord**](docs/Api/TrainingApi.md#addnewemployeetrainingrecord) | **POST** /api/v1/training/record/employee/{employeeId} | Add New Employee Training Record
*TrainingApi* | [**addTrainingCategory**](docs/Api/TrainingApi.md#addtrainingcategory) | **POST** /api/v1/training/category | Add Training Category
*TrainingApi* | [**addTrainingType**](docs/Api/TrainingApi.md#addtrainingtype) | **POST** /api/v1/training/type | Add Training Type
*TrainingApi* | [**deleteEmployeeTrainingRecord**](docs/Api/TrainingApi.md#deleteemployeetrainingrecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record
*TrainingApi* | [**deleteTrainingCategory**](docs/Api/TrainingApi.md#deletetrainingcategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category
*TrainingApi* | [**deleteTrainingType**](docs/Api/TrainingApi.md#deletetrainingtype) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type
*TrainingApi* | [**listEmployeeTrainings**](docs/Api/TrainingApi.md#listemployeetrainings) | **GET** /api/v1/training/record/employee/{employeeId} | List Employee Trainings
*TrainingApi* | [**listTrainingCategories**](docs/Api/TrainingApi.md#listtrainingcategories) | **GET** /api/v1/training/category | List Training Categories
*TrainingApi* | [**listTrainingTypes**](docs/Api/TrainingApi.md#listtrainingtypes) | **GET** /api/v1/training/type | List Training Types
*TrainingApi* | [**updateEmployeeTrainingRecord**](docs/Api/TrainingApi.md#updateemployeetrainingrecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record
*TrainingApi* | [**updateTrainingCategory**](docs/Api/TrainingApi.md#updatetrainingcategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category
*TrainingApi* | [**updateTrainingType**](docs/Api/TrainingApi.md#updatetrainingtype) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type
*WebhooksApi* | [**deleteWebhook**](docs/Api/WebhooksApi.md#deletewebhook) | **DELETE** /api/v1/webhooks/{id} | Delete Webhook
*WebhooksApi* | [**getMonitorFields**](docs/Api/WebhooksApi.md#getmonitorfields) | **GET** /api/v1/webhooks/monitor_fields | Get monitor fields
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook
*WebhooksApi* | [**getWebhookList**](docs/Api/WebhooksApi.md#getwebhooklist) | **GET** /api/v1/webhooks | Gets as list of webhooks for the user API key.
*WebhooksApi* | [**getWebhookLogs**](docs/Api/WebhooksApi.md#getwebhooklogs) | **GET** /api/v1/webhooks/{id}/log | Get Webhook Logs
*WebhooksApi* | [**postWebhook**](docs/Api/WebhooksApi.md#postwebhook) | **POST** /api/v1/webhooks | Add Webhook
*WebhooksApi* | [**putWebhook**](docs/Api/WebhooksApi.md#putwebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook

## Models

- [AddNewEmployeeTrainingRecordRequest](docs/Model/AddNewEmployeeTrainingRecordRequest.md)
- [AddNewEmployeeTrainingRecordRequestCost](docs/Model/AddNewEmployeeTrainingRecordRequestCost.md)
- [AddTrainingCategoryRequest](docs/Model/AddTrainingCategoryRequest.md)
- [AddTrainingTypeRequest](docs/Model/AddTrainingTypeRequest.md)
- [AddTrainingTypeRequestCategory](docs/Model/AddTrainingTypeRequestCategory.md)
- [AdjustTimeOffBalance](docs/Model/AdjustTimeOffBalance.md)
- [AdjustTimeTrackingRequestSchema](docs/Model/AdjustTimeTrackingRequestSchema.md)
- [ClockEntriesSchema](docs/Model/ClockEntriesSchema.md)
- [ClockEntryIdsSchema](docs/Model/ClockEntryIdsSchema.md)
- [ClockEntrySchema](docs/Model/ClockEntrySchema.md)
- [ClockInRequestSchema](docs/Model/ClockInRequestSchema.md)
- [ClockOutRequestSchema](docs/Model/ClockOutRequestSchema.md)
- [CompanyFileUpdate](docs/Model/CompanyFileUpdate.md)
- [Country](docs/Model/Country.md)
- [CountrySchema](docs/Model/CountrySchema.md)
- [CursorPagedResponseMetadata](docs/Model/CursorPagedResponseMetadata.md)
- [CursorPagesResponse](docs/Model/CursorPagesResponse.md)
- [CursorPaginationQueryObject](docs/Model/CursorPaginationQueryObject.md)
- [DataRequest](docs/Model/DataRequest.md)
- [DataRequestAggregationsInner](docs/Model/DataRequestAggregationsInner.md)
- [DataRequestFilters](docs/Model/DataRequestFilters.md)
- [DataRequestFiltersFiltersInner](docs/Model/DataRequestFiltersFiltersInner.md)
- [DataRequestSortByInner](docs/Model/DataRequestSortByInner.md)
- [Dataset](docs/Model/Dataset.md)
- [DatasetFieldsResponse](docs/Model/DatasetFieldsResponse.md)
- [DatasetResponse](docs/Model/DatasetResponse.md)
- [DeleteEmployeeTableRowV1200Response](docs/Model/DeleteEmployeeTableRowV1200Response.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeDependent](docs/Model/EmployeeDependent.md)
- [EmployeeFileUpdate](docs/Model/EmployeeFileUpdate.md)
- [EmployeeResponse](docs/Model/EmployeeResponse.md)
- [EmployeeResponseAggregationsInner](docs/Model/EmployeeResponseAggregationsInner.md)
- [EmployeeTimesheetEntryTransformer](docs/Model/EmployeeTimesheetEntryTransformer.md)
- [Field](docs/Model/Field.md)
- [FieldOptionsRequestSchema](docs/Model/FieldOptionsRequestSchema.md)
- [FieldOptionsRequestSchemaDependentFieldsValueInner](docs/Model/FieldOptionsRequestSchemaDependentFieldsValueInner.md)
- [FieldOptionsTransformer](docs/Model/FieldOptionsTransformer.md)
- [GetApplicationDetails200Response](docs/Model/GetApplicationDetails200Response.md)
- [GetApplicationDetails200ResponseApplicant](docs/Model/GetApplicationDetails200ResponseApplicant.md)
- [GetApplicationDetails200ResponseJob](docs/Model/GetApplicationDetails200ResponseJob.md)
- [GetApplicationDetails200ResponseQuestionsAndAnswersInner](docs/Model/GetApplicationDetails200ResponseQuestionsAndAnswersInner.md)
- [GetApplicationDetails200ResponseQuestionsAndAnswersInnerAnswer](docs/Model/GetApplicationDetails200ResponseQuestionsAndAnswersInnerAnswer.md)
- [GetApplicationDetails200ResponseQuestionsAndAnswersInnerQuestion](docs/Model/GetApplicationDetails200ResponseQuestionsAndAnswersInnerQuestion.md)
- [GetApplicationDetails200ResponseStatus](docs/Model/GetApplicationDetails200ResponseStatus.md)
- [GetApplications200Response](docs/Model/GetApplications200Response.md)
- [GetApplications200ResponseApplications](docs/Model/GetApplications200ResponseApplications.md)
- [GetApplications200ResponseApplicationsItemsInner](docs/Model/GetApplications200ResponseApplicationsItemsInner.md)
- [GetApplications200ResponseApplicationsItemsInnerApplicant](docs/Model/GetApplications200ResponseApplicationsItemsInnerApplicant.md)
- [GetApplications200ResponseApplicationsItemsInnerJob](docs/Model/GetApplications200ResponseApplicationsItemsInnerJob.md)
- [GetApplications200ResponseApplicationsItemsInnerStatus](docs/Model/GetApplications200ResponseApplicationsItemsInnerStatus.md)
- [GetCompanyInformation200Response](docs/Model/GetCompanyInformation200Response.md)
- [GetCompanyInformation200ResponseAddress](docs/Model/GetCompanyInformation200ResponseAddress.md)
- [GetCompanyLocations200ResponseInner](docs/Model/GetCompanyLocations200ResponseInner.md)
- [GetEmployeesDirectory200Response](docs/Model/GetEmployeesDirectory200Response.md)
- [GetEmployeesEmployeeResponse](docs/Model/GetEmployeesEmployeeResponse.md)
- [GetEmployeesFilterRequestObject](docs/Model/GetEmployeesFilterRequestObject.md)
- [GetEmployeesList400Response](docs/Model/GetEmployeesList400Response.md)
- [GetEmployeesList400ResponseError](docs/Model/GetEmployeesList400ResponseError.md)
- [GetEmployeesResponseObject](docs/Model/GetEmployeesResponseObject.md)
- [GetEmployeesResponseObjectLinks](docs/Model/GetEmployeesResponseObjectLinks.md)
- [GetGoalAggregate200Response](docs/Model/GetGoalAggregate200Response.md)
- [GetGoalAggregate200ResponseAlignsWithOptionsInner](docs/Model/GetGoalAggregate200ResponseAlignsWithOptionsInner.md)
- [GetGoalAggregate200ResponseCommentsInner](docs/Model/GetGoalAggregate200ResponseCommentsInner.md)
- [GetGoalAggregate200ResponsePersonsInner](docs/Model/GetGoalAggregate200ResponsePersonsInner.md)
- [GetGoals200Response](docs/Model/GetGoals200Response.md)
- [GetGoalsAggregateV11200Response](docs/Model/GetGoalsAggregateV11200Response.md)
- [GetGoalsAggregateV11200ResponseCommentsInner](docs/Model/GetGoalsAggregateV11200ResponseCommentsInner.md)
- [GetGoalsAggregateV1200Response](docs/Model/GetGoalsAggregateV1200Response.md)
- [GetGoalsAggregateV1200ResponseCommentsInner](docs/Model/GetGoalsAggregateV1200ResponseCommentsInner.md)
- [GetGoalsAggregateV1200ResponsePersonsInner](docs/Model/GetGoalsAggregateV1200ResponsePersonsInner.md)
- [GetGoalsAggregateV12200Response](docs/Model/GetGoalsAggregateV12200Response.md)
- [GetGoalsAggregateV12200ResponseCommentsInner](docs/Model/GetGoalsAggregateV12200ResponseCommentsInner.md)
- [GetHiringLeads200ResponseInner](docs/Model/GetHiringLeads200ResponseInner.md)
- [GetMonitorFields200Response](docs/Model/GetMonitorFields200Response.md)
- [GetMonitorFields200ResponseFieldsInner](docs/Model/GetMonitorFields200ResponseFieldsInner.md)
- [GetWebhookList200Response](docs/Model/GetWebhookList200Response.md)
- [GetWebhookList200ResponseWebhooksInner](docs/Model/GetWebhookList200ResponseWebhooksInner.md)
- [Goal](docs/Model/Goal.md)
- [GoalFiltersV1](docs/Model/GoalFiltersV1.md)
- [GoalFiltersV11](docs/Model/GoalFiltersV11.md)
- [GoalFiltersV11FiltersInner](docs/Model/GoalFiltersV11FiltersInner.md)
- [GoalFiltersV11FiltersInnerActions](docs/Model/GoalFiltersV11FiltersInnerActions.md)
- [GoalFiltersV1FiltersInner](docs/Model/GoalFiltersV1FiltersInner.md)
- [HiringLead](docs/Model/HiringLead.md)
- [HourEntriesRequestSchema](docs/Model/HourEntriesRequestSchema.md)
- [HourEntryIdsSchema](docs/Model/HourEntryIdsSchema.md)
- [HourEntrySchema](docs/Model/HourEntrySchema.md)
- [ListEmployeeTrainings200ResponseInner](docs/Model/ListEmployeeTrainings200ResponseInner.md)
- [ListFieldValues](docs/Model/ListFieldValues.md)
- [ListFieldValuesOptionsInner](docs/Model/ListFieldValuesOptionsInner.md)
- [ListTrainingCategories200ResponseInner](docs/Model/ListTrainingCategories200ResponseInner.md)
- [ListTrainingTypes200ResponseInner](docs/Model/ListTrainingTypes200ResponseInner.md)
- [Location](docs/Model/Location.md)
- [MemberBenefitEvent](docs/Model/MemberBenefitEvent.md)
- [MemberBenefitEventMembersInner](docs/Model/MemberBenefitEventMembersInner.md)
- [MemberBenefitEventMembersInnerCoveragesInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInner.md)
- [MemberBenefitEventMembersInnerCoveragesInnerEventsInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInnerEventsInner.md)
- [NewWebHook](docs/Model/NewWebHook.md)
- [NewWebHookFrequency](docs/Model/NewWebHookFrequency.md)
- [NewWebHookLimit](docs/Model/NewWebHookLimit.md)
- [Pagination](docs/Model/Pagination.md)
- [PostApplicantStatusRequest](docs/Model/PostApplicantStatusRequest.md)
- [PostApplicationCommentRequest](docs/Model/PostApplicationCommentRequest.md)
- [PostGoalRequest](docs/Model/PostGoalRequest.md)
- [PostGoalRequestMilestonesInner](docs/Model/PostGoalRequestMilestonesInner.md)
- [PostNewEmployee](docs/Model/PostNewEmployee.md)
- [PostWebhook201Response](docs/Model/PostWebhook201Response.md)
- [PostWebhook201ResponseFrequency](docs/Model/PostWebhook201ResponseFrequency.md)
- [PostWebhook201ResponseLimit](docs/Model/PostWebhook201ResponseLimit.md)
- [PostWebhook403Response](docs/Model/PostWebhook403Response.md)
- [PostWebhook403ResponseErrorsInner](docs/Model/PostWebhook403ResponseErrorsInner.md)
- [ProjectCreateRequestSchema](docs/Model/ProjectCreateRequestSchema.md)
- [ProjectInfoApiTransformer](docs/Model/ProjectInfoApiTransformer.md)
- [ProjectInfoApiTransformerProject](docs/Model/ProjectInfoApiTransformerProject.md)
- [ProjectInfoApiTransformerTask](docs/Model/ProjectInfoApiTransformerTask.md)
- [PutGoalMilestoneProgressRequest](docs/Model/PutGoalMilestoneProgressRequest.md)
- [PutGoalProgressRequest](docs/Model/PutGoalProgressRequest.md)
- [PutGoalSharedWithRequest](docs/Model/PutGoalSharedWithRequest.md)
- [PutGoalV11Request](docs/Model/PutGoalV11Request.md)
- [PutGoalV11RequestMilestonesInner](docs/Model/PutGoalV11RequestMilestonesInner.md)
- [PutWebhook403Response](docs/Model/PutWebhook403Response.md)
- [Report](docs/Model/Report.md)
- [ReportsResponse](docs/Model/ReportsResponse.md)
- [Request](docs/Model/Request.md)
- [RequestCustomReport](docs/Model/RequestCustomReport.md)
- [RequestCustomReportFilters](docs/Model/RequestCustomReportFilters.md)
- [RequestCustomReportFiltersLastChanged](docs/Model/RequestCustomReportFiltersLastChanged.md)
- [State](docs/Model/State.md)
- [StateProvinceResponseSchema](docs/Model/StateProvinceResponseSchema.md)
- [StateProvinceSchema](docs/Model/StateProvinceSchema.md)
- [TableRowUpdate](docs/Model/TableRowUpdate.md)
- [TaskCreateSchema](docs/Model/TaskCreateSchema.md)
- [TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner](docs/Model/TimeOffAssignTimeOffPoliciesForAnEmployeeRequestInner.md)
- [TimeOffHistory](docs/Model/TimeOffHistory.md)
- [TimeOffRequest](docs/Model/TimeOffRequest.md)
- [TimeOffRequestDatesInner](docs/Model/TimeOffRequestDatesInner.md)
- [TimeOffRequestNotesInner](docs/Model/TimeOffRequestNotesInner.md)
- [TimeTrackingBulkResponseSchema](docs/Model/TimeTrackingBulkResponseSchema.md)
- [TimeTrackingBulkResponseSchemaResponse](docs/Model/TimeTrackingBulkResponseSchemaResponse.md)
- [TimeTrackingDeleteResponseSchema](docs/Model/TimeTrackingDeleteResponseSchema.md)
- [TimeTrackingIdResponseSchema](docs/Model/TimeTrackingIdResponseSchema.md)
- [TimeTrackingProjectWithTasksAndEmployeeIds](docs/Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)
- [TimeTrackingRecord](docs/Model/TimeTrackingRecord.md)
- [TimeTrackingRecordSchema](docs/Model/TimeTrackingRecordSchema.md)
- [TimeTrackingRecordSchemaProject](docs/Model/TimeTrackingRecordSchemaProject.md)
- [TimeTrackingRecordSchemaProjectTask](docs/Model/TimeTrackingRecordSchemaProjectTask.md)
- [TimeTrackingRecordSchemaShiftDifferential](docs/Model/TimeTrackingRecordSchemaShiftDifferential.md)
- [TimeTrackingTask](docs/Model/TimeTrackingTask.md)
- [TimesheetEntryInfoApiTransformer](docs/Model/TimesheetEntryInfoApiTransformer.md)
- [TrainingCategory](docs/Model/TrainingCategory.md)
- [TrainingRecord](docs/Model/TrainingRecord.md)
- [TrainingType](docs/Model/TrainingType.md)
- [TransformedApiGoal](docs/Model/TransformedApiGoal.md)
- [TransformedApiGoalGoal](docs/Model/TransformedApiGoalGoal.md)
- [TransformedApiGoalGoalActions](docs/Model/TransformedApiGoalGoalActions.md)
- [TransformedApiGoalGoalMilestonesInner](docs/Model/TransformedApiGoalGoalMilestonesInner.md)
- [UpdateEmployeeTrainingRecordRequest](docs/Model/UpdateEmployeeTrainingRecordRequest.md)
- [UpdateTrainingCategoryRequest](docs/Model/UpdateTrainingCategoryRequest.md)
- [UpdateTrainingTypeRequest](docs/Model/UpdateTrainingTypeRequest.md)
- [UpdateTrainingTypeRequestCategory](docs/Model/UpdateTrainingTypeRequestCategory.md)
- [WebHookLogResponse](docs/Model/WebHookLogResponse.md)
- [WebHookResponse](docs/Model/WebHookResponse.md)
- [WebHookResponseFrequency](docs/Model/WebHookResponseFrequency.md)
- [Webhook400Error](docs/Model/Webhook400Error.md)
- [WebhookError](docs/Model/WebhookError.md)
- [WebhookErrorErrors](docs/Model/WebhookErrorErrors.md)
- [WebhookSubErrorProperty](docs/Model/WebhookSubErrorProperty.md)
- [WebhookSubErrorPropertyUnknownFieldsInner](docs/Model/WebhookSubErrorPropertyUnknownFieldsInner.md)

## Authorization

Authentication schemes defined for the API:
### oauth

- **Type**: `OAuth`
- **Flow**: `application`
- **Authorization URL**: ``
- **Scopes**: N/A

### oauth

- **Type**: `OAuth`
- **Flow**: `accessCode`
- **Authorization URL**: `https://{companyDomain}.bamboohr.com/authorize.php`
- **Scopes**: N/A

### basic

- **Type**: HTTP basic authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0`
    - Package version: `2.0.0`
    - Generator version: `7.15.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`

- To generate, run:
```
openapi-generator generate \
    -i /path/to/openapi.yaml \
    -g php \
    -t ./templates-php \
    --additional-properties=invokerPackage=BhrSdk,artifactUrl=https://www.bamboohr.com/,developerOrganizationUrl=https://github.com/BambooHR/bhr-api-php,artifactVersion=2.0.0 \
    && sed -i '' '/\*PublicAPIApi\*/d' README.md
```