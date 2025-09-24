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
$config = MySdk\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

// Configure OAuth2 access token for authorization: oauth
$config = MySdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new MySdk\Api\ATSApi(
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

All URIs are relative to *https://example.bamboohr.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ATSApi* | [**getApplicationDetails**](docs/Api/ATSApi.md#getapplicationdetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Application Details
*AccountInformationApi* | [**getListOfUsers**](docs/Api/AccountInformationApi.md#getlistofusers) | **GET** /api/v1/meta/users | Get a List of Users
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
*HoursApi* | [**call22067048cf6eec230a865765a18ad7b8**](docs/Api/HoursApi.md#call22067048cf6eec230a865765a18ad7b8) | **PUT** /api/v1/timetracking/adjust | adjustTimeTracking
*HoursApi* | [**call717faf6067928c3497fc9acbf5b91767**](docs/Api/HoursApi.md#call717faf6067928c3497fc9acbf5b91767) | **DELETE** /api/v1/timetracking/delete/{id} | deleteTimeTrackingByTimeTrackingId
*HoursApi* | [**call889a4c2de70a53c5ab8cb32f1c2243f5**](docs/Api/HoursApi.md#call889a4c2de70a53c5ab8cb32f1c2243f5) | **GET** /api/v1/timetracking/record/{id} | getTimeTrackingByTimeTrackingId
*HoursApi* | [**e2ae6e59655aeab2b4e6311967a2809f**](docs/Api/HoursApi.md#e2ae6e59655aeab2b4e6311967a2809f) | **POST** /api/v1/timetracking/add | addTimeTracking
*HoursApi* | [**f54bcaec6771b1264671e53f2e557b1f**](docs/Api/HoursApi.md#f54bcaec6771b1264671e53f2e557b1f) | **POST** /api/v1/timetracking/record | addTimeTrackingBulk
*LastChangeInformationApi* | [**getChangedEmployeeIds**](docs/Api/LastChangeInformationApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Gets all updated employee IDs
*LoginApi* | [**login**](docs/Api/LoginApi.md#login) | **POST** /api/v1/login | User Login
*PhotosApi* | [**getEmployeePhoto**](docs/Api/PhotosApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get an employee photo
*PhotosApi* | [**uploadEmployeePhoto**](docs/Api/PhotosApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Store a new employee photo
*PublicAPIApi* | [**addCompanyFileCategory**](docs/Api/PublicAPIApi.md#addcompanyfilecategory) | **POST** /api/v1/files/categories | Add Company File Category
*PublicAPIApi* | [**addEmployee**](docs/Api/PublicAPIApi.md#addemployee) | **POST** /api/v1/employees | Add Employee
*PublicAPIApi* | [**addEmployeeDependent**](docs/Api/PublicAPIApi.md#addemployeedependent) | **POST** /api/v1/employeedependents | Add an employee dependent
*PublicAPIApi* | [**addEmployeeFileCategory**](docs/Api/PublicAPIApi.md#addemployeefilecategory) | **POST** /api/v1/employees/files/categories | Add Employee File Category
*PublicAPIApi* | [**addEmployeeTableRow**](docs/Api/PublicAPIApi.md#addemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table} | Adds a table row
*PublicAPIApi* | [**addEmployeeTableRowV1**](docs/Api/PublicAPIApi.md#addemployeetablerowv1) | **POST** /api/v1_1/employees/{id}/tables/{table} | Adds a table row
*PublicAPIApi* | [**addNewCandidate**](docs/Api/PublicAPIApi.md#addnewcandidate) | **POST** /api/v1/applicant_tracking/application | Add New Candidate
*PublicAPIApi* | [**addNewEmployeeTrainingRecord**](docs/Api/PublicAPIApi.md#addnewemployeetrainingrecord) | **POST** /api/v1/training/record/employee/{employeeId} | Add New Employee Training Record
*PublicAPIApi* | [**addNewJobOpening**](docs/Api/PublicAPIApi.md#addnewjobopening) | **POST** /api/v1/applicant_tracking/job_opening | Add New Job Opening
*PublicAPIApi* | [**addTrainingCategory**](docs/Api/PublicAPIApi.md#addtrainingcategory) | **POST** /api/v1/training/category | Add Training Category
*PublicAPIApi* | [**addTrainingType**](docs/Api/PublicAPIApi.md#addtrainingtype) | **POST** /api/v1/training/type | Add Training Type
*PublicAPIApi* | [**ca54fa4c1d42864a2540f7f7600e0d65**](docs/Api/PublicAPIApi.md#ca54fa4c1d42864a2540f7f7600e0d65) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry
*PublicAPIApi* | [**call134f6593587d7195536c151bd65eb6d5**](docs/Api/PublicAPIApi.md#call134f6593587d7195536c151bd65eb6d5) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries
*PublicAPIApi* | [**call18e680c918496818b49d593d7ea375a5**](docs/Api/PublicAPIApi.md#call18e680c918496818b49d593d7ea375a5) | **POST** /api/v1/datasets/{datasetName}/field-options | Get Field Options
*PublicAPIApi* | [**call22067048cf6eec230a865765a18ad7b8**](docs/Api/PublicAPIApi.md#call22067048cf6eec230a865765a18ad7b8) | **PUT** /api/v1/timetracking/adjust | adjustTimeTracking
*PublicAPIApi* | [**call3b7487d1d17551f6c3e2567b96089ce1**](docs/Api/PublicAPIApi.md#call3b7487d1d17551f6c3e2567b96089ce1) | **POST** /api/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries
*PublicAPIApi* | [**call408a4478cbd2b1b5811ba6228e2898df**](docs/Api/PublicAPIApi.md#call408a4478cbd2b1b5811ba6228e2898df) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*PublicAPIApi* | [**call43c7cc099ca54295a047f449824fc0dd**](docs/Api/PublicAPIApi.md#call43c7cc099ca54295a047f449824fc0dd) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry
*PublicAPIApi* | [**call717faf6067928c3497fc9acbf5b91767**](docs/Api/PublicAPIApi.md#call717faf6067928c3497fc9acbf5b91767) | **DELETE** /api/v1/timetracking/delete/{id} | deleteTimeTrackingByTimeTrackingId
*PublicAPIApi* | [**call7bb9fedfad942b8839bc61a125e7c255**](docs/Api/PublicAPIApi.md#call7bb9fedfad942b8839bc61a125e7c255) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*PublicAPIApi* | [**call889a4c2de70a53c5ab8cb32f1c2243f5**](docs/Api/PublicAPIApi.md#call889a4c2de70a53c5ab8cb32f1c2243f5) | **GET** /api/v1/timetracking/record/{id} | getTimeTrackingByTimeTrackingId
*PublicAPIApi* | [**deleteCompanyFile**](docs/Api/PublicAPIApi.md#deletecompanyfile) | **DELETE** /api/v1/files/{fileId} | Delete Company File
*PublicAPIApi* | [**deleteEmployeeFile**](docs/Api/PublicAPIApi.md#deleteemployeefile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File
*PublicAPIApi* | [**deleteEmployeeTableRowV1**](docs/Api/PublicAPIApi.md#deleteemployeetablerowv1) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Deletes a table row
*PublicAPIApi* | [**deleteEmployeeTrainingRecord**](docs/Api/PublicAPIApi.md#deleteemployeetrainingrecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record
*PublicAPIApi* | [**deleteGoal**](docs/Api/PublicAPIApi.md#deletegoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal
*PublicAPIApi* | [**deleteGoalComment**](docs/Api/PublicAPIApi.md#deletegoalcomment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment
*PublicAPIApi* | [**deleteTrainingCategory**](docs/Api/PublicAPIApi.md#deletetrainingcategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category
*PublicAPIApi* | [**deleteTrainingType**](docs/Api/PublicAPIApi.md#deletetrainingtype) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type
*PublicAPIApi* | [**deleteWebhook**](docs/Api/PublicAPIApi.md#deletewebhook) | **DELETE** /api/v1/webhooks/{id} | Delete Webhook
*PublicAPIApi* | [**e2ae6e59655aeab2b4e6311967a2809f**](docs/Api/PublicAPIApi.md#e2ae6e59655aeab2b4e6311967a2809f) | **POST** /api/v1/timetracking/add | addTimeTracking
*PublicAPIApi* | [**e9a47e93524609b981be6139822d219e**](docs/Api/PublicAPIApi.md#e9a47e93524609b981be6139822d219e) | **POST** /api/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries
*PublicAPIApi* | [**f54bcaec6771b1264671e53f2e557b1f**](docs/Api/PublicAPIApi.md#f54bcaec6771b1264671e53f2e557b1f) | **POST** /api/v1/timetracking/record | addTimeTrackingBulk
*PublicAPIApi* | [**f7dd45b1747b0b72c4b617845b065a07**](docs/Api/PublicAPIApi.md#f7dd45b1747b0b72c4b617845b065a07) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project
*PublicAPIApi* | [**getAListOfWhoIsOut**](docs/Api/PublicAPIApi.md#getalistofwhoisout) | **GET** /api/v1/time_off/whos_out | Get a list of Who&#39;s Out
*PublicAPIApi* | [**getApplicationDetails**](docs/Api/PublicAPIApi.md#getapplicationdetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Application Details
*PublicAPIApi* | [**getApplications**](docs/Api/PublicAPIApi.md#getapplications) | **GET** /api/v1/applicant_tracking/applications | Get Applications
*PublicAPIApi* | [**getBenefitCoverages**](docs/Api/PublicAPIApi.md#getbenefitcoverages) | **GET** /api/v1/benefitcoverages | Get benefit coverages
*PublicAPIApi* | [**getBenefitDeductionTypes**](docs/Api/PublicAPIApi.md#getbenefitdeductiontypes) | **GET** /api/v1/benefits/settings/deduction_types/all | Get benefit deduction types
*PublicAPIApi* | [**getByReportId**](docs/Api/PublicAPIApi.md#getbyreportid) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID
*PublicAPIApi* | [**getCanCreateGoal**](docs/Api/PublicAPIApi.md#getcancreategoal) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Can Create a Goal
*PublicAPIApi* | [**getChangedEmployeeIds**](docs/Api/PublicAPIApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Gets all updated employee IDs
*PublicAPIApi* | [**getChangedEmployeeTableData**](docs/Api/PublicAPIApi.md#getchangedemployeetabledata) | **GET** /api/v1/employees/changed/tables/{table} | Gets all updated employee table data
*PublicAPIApi* | [**getCompanyFile**](docs/Api/PublicAPIApi.md#getcompanyfile) | **GET** /api/v1/files/{fileId} | Get an Company File
*PublicAPIApi* | [**getCompanyInformation**](docs/Api/PublicAPIApi.md#getcompanyinformation) | **GET** /api/v1/company_information | Get Company Information
*PublicAPIApi* | [**getCompanyLocations**](docs/Api/PublicAPIApi.md#getcompanylocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations
*PublicAPIApi* | [**getCompanyReport**](docs/Api/PublicAPIApi.md#getcompanyreport) | **GET** /api/v1/reports/{id} | Get company report
*PublicAPIApi* | [**getDataFromDataset**](docs/Api/PublicAPIApi.md#getdatafromdataset) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset
*PublicAPIApi* | [**getDataSets**](docs/Api/PublicAPIApi.md#getdatasets) | **GET** /api/v1/datasets | Get Data Sets
*PublicAPIApi* | [**getEmployee**](docs/Api/PublicAPIApi.md#getemployee) | **GET** /api/v1/employees/{id} | Get Employee
*PublicAPIApi* | [**getEmployeeDependent**](docs/Api/PublicAPIApi.md#getemployeedependent) | **GET** /api/v1/employeedependents/{id} | Get employee dependent
*PublicAPIApi* | [**getEmployeeDependents**](docs/Api/PublicAPIApi.md#getemployeedependents) | **GET** /api/v1/employeedependents | Get all employee dependents
*PublicAPIApi* | [**getEmployeeFile**](docs/Api/PublicAPIApi.md#getemployeefile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get an Employee File
*PublicAPIApi* | [**getEmployeePhoto**](docs/Api/PublicAPIApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get an employee photo
*PublicAPIApi* | [**getEmployeeTableRow**](docs/Api/PublicAPIApi.md#getemployeetablerow) | **GET** /api/v1/employees/{id}/tables/{table} | Gets table rows for a given employee and table combination
*PublicAPIApi* | [**getEmployeesDirectory**](docs/Api/PublicAPIApi.md#getemployeesdirectory) | **GET** /api/v1/employees/directory | Get Employee Directory
*PublicAPIApi* | [**getFieldsFromDataset**](docs/Api/PublicAPIApi.md#getfieldsfromdataset) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset
*PublicAPIApi* | [**getGoalAggregate**](docs/Api/PublicAPIApi.md#getgoalaggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Aggregate Goal Info
*PublicAPIApi* | [**getGoalComments**](docs/Api/PublicAPIApi.md#getgoalcomments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments
*PublicAPIApi* | [**getGoals**](docs/Api/PublicAPIApi.md#getgoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | Get Goals
*PublicAPIApi* | [**getGoalsAggregateV1**](docs/Api/PublicAPIApi.md#getgoalsaggregatev1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info
*PublicAPIApi* | [**getGoalsAggregateV11**](docs/Api/PublicAPIApi.md#getgoalsaggregatev11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.1
*PublicAPIApi* | [**getGoalsAggregateV12**](docs/Api/PublicAPIApi.md#getgoalsaggregatev12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get All Aggregate Goal Info, Version 1.2
*PublicAPIApi* | [**getGoalsAlignmentOptions**](docs/Api/PublicAPIApi.md#getgoalsalignmentoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Alignable Goal Options
*PublicAPIApi* | [**getGoalsFiltersV1**](docs/Api/PublicAPIApi.md#getgoalsfiltersv1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goals Filters
*PublicAPIApi* | [**getGoalsFiltersV11**](docs/Api/PublicAPIApi.md#getgoalsfiltersv11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goals Filters
*PublicAPIApi* | [**getGoalsFiltersV12**](docs/Api/PublicAPIApi.md#getgoalsfiltersv12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts, Version 1.2
*PublicAPIApi* | [**getGoalsShareOptions**](docs/Api/PublicAPIApi.md#getgoalsshareoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | Available Goal Sharing Options
*PublicAPIApi* | [**getHiringLeads**](docs/Api/PublicAPIApi.md#gethiringleads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads
*PublicAPIApi* | [**getJobSummaries**](docs/Api/PublicAPIApi.md#getjobsummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries
*PublicAPIApi* | [**getListOfUsers**](docs/Api/PublicAPIApi.md#getlistofusers) | **GET** /api/v1/meta/users | Get a List of Users
*PublicAPIApi* | [**getMemberBenefit**](docs/Api/PublicAPIApi.md#getmemberbenefit) | **GET** /api/v1/benefit/member_benefit | Get a list of member benefit events
*PublicAPIApi* | [**getMonitorFields**](docs/Api/PublicAPIApi.md#getmonitorfields) | **GET** /api/v1/webhooks/monitor_fields | Get monitor fields
*PublicAPIApi* | [**getStatuses**](docs/Api/PublicAPIApi.md#getstatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Statuses
*PublicAPIApi* | [**getTimeOffPolicies**](docs/Api/PublicAPIApi.md#gettimeoffpolicies) | **GET** /api/v1/meta/time_off/policies | Get Time Off Policies
*PublicAPIApi* | [**getTimeOffTypes**](docs/Api/PublicAPIApi.md#gettimeofftypes) | **GET** /api/v1/meta/time_off/types | Get Time Off Types
*PublicAPIApi* | [**getWebhook**](docs/Api/PublicAPIApi.md#getwebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook
*PublicAPIApi* | [**getWebhookList**](docs/Api/PublicAPIApi.md#getwebhooklist) | **GET** /api/v1/webhooks | Gets as list of webhooks for the user API key.
*PublicAPIApi* | [**getWebhookLogs**](docs/Api/PublicAPIApi.md#getwebhooklogs) | **GET** /api/v1/webhooks/{id}/log | Get Webhook Logs
*PublicAPIApi* | [**listCompanyFiles**](docs/Api/PublicAPIApi.md#listcompanyfiles) | **GET** /api/v1/files/view | List company files and categories
*PublicAPIApi* | [**listEmployeeFiles**](docs/Api/PublicAPIApi.md#listemployeefiles) | **GET** /api/v1/employees/{id}/files/view | List employee files and categories
*PublicAPIApi* | [**listEmployeeTrainings**](docs/Api/PublicAPIApi.md#listemployeetrainings) | **GET** /api/v1/training/record/employee/{employeeId} | List Employee Trainings
*PublicAPIApi* | [**listReports**](docs/Api/PublicAPIApi.md#listreports) | **GET** /api/v1/custom-reports | List Reports
*PublicAPIApi* | [**listTrainingCategories**](docs/Api/PublicAPIApi.md#listtrainingcategories) | **GET** /api/v1/training/category | List Training Categories
*PublicAPIApi* | [**listTrainingTypes**](docs/Api/PublicAPIApi.md#listtrainingtypes) | **GET** /api/v1/training/type | List Training Types
*PublicAPIApi* | [**login**](docs/Api/PublicAPIApi.md#login) | **POST** /api/v1/login | User Login
*PublicAPIApi* | [**metadataAddOrUpdateValuesForListFields**](docs/Api/PublicAPIApi.md#metadataaddorupdatevaluesforlistfields) | **PUT** /api/v1/meta/lists/{listFieldId} | Add or Update Values for List Fields
*PublicAPIApi* | [**metadataGetAListOfFields**](docs/Api/PublicAPIApi.md#metadatagetalistoffields) | **GET** /api/v1/meta/fields | Get a list of fields
*PublicAPIApi* | [**metadataGetAListOfTabularFields**](docs/Api/PublicAPIApi.md#metadatagetalistoftabularfields) | **GET** /api/v1/meta/tables | Get a list of tabular fields
*PublicAPIApi* | [**metadataGetDetailsForListFields**](docs/Api/PublicAPIApi.md#metadatagetdetailsforlistfields) | **GET** /api/v1/meta/lists | Get details for list fields
*PublicAPIApi* | [**postApplicantStatus**](docs/Api/PublicAPIApi.md#postapplicantstatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Change Applicant&#39;s Status
*PublicAPIApi* | [**postApplicationComment**](docs/Api/PublicAPIApi.md#postapplicationcomment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Add Application Comment
*PublicAPIApi* | [**postCloseGoal**](docs/Api/PublicAPIApi.md#postclosegoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal
*PublicAPIApi* | [**postGoal**](docs/Api/PublicAPIApi.md#postgoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal
*PublicAPIApi* | [**postGoalComment**](docs/Api/PublicAPIApi.md#postgoalcomment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment
*PublicAPIApi* | [**postReopenGoal**](docs/Api/PublicAPIApi.md#postreopengoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen a Goal
*PublicAPIApi* | [**postWebhook**](docs/Api/PublicAPIApi.md#postwebhook) | **POST** /api/v1/webhooks | Add Webhook
*PublicAPIApi* | [**putGoalComment**](docs/Api/PublicAPIApi.md#putgoalcomment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment
*PublicAPIApi* | [**putGoalMilestoneProgress**](docs/Api/PublicAPIApi.md#putgoalmilestoneprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress
*PublicAPIApi* | [**putGoalProgress**](docs/Api/PublicAPIApi.md#putgoalprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress
*PublicAPIApi* | [**putGoalSharedWith**](docs/Api/PublicAPIApi.md#putgoalsharedwith) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing
*PublicAPIApi* | [**putGoalV1**](docs/Api/PublicAPIApi.md#putgoalv1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal
*PublicAPIApi* | [**putGoalV11**](docs/Api/PublicAPIApi.md#putgoalv11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal, V1.1
*PublicAPIApi* | [**putWebhook**](docs/Api/PublicAPIApi.md#putwebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook
*PublicAPIApi* | [**requestCustomReport**](docs/Api/PublicAPIApi.md#requestcustomreport) | **POST** /api/v1/reports/custom | Request a custom report
*PublicAPIApi* | [**timeOffAddATimeOffHistoryItemForTimeOffRequest**](docs/Api/PublicAPIApi.md#timeoffaddatimeoffhistoryitemfortimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Add a Time Off History Item For Time Off Request
*PublicAPIApi* | [**timeOffAddATimeOffRequest**](docs/Api/PublicAPIApi.md#timeoffaddatimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Add a Time Off Request
*PublicAPIApi* | [**timeOffAdjustTimeOffBalance**](docs/Api/PublicAPIApi.md#timeoffadjusttimeoffbalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance
*PublicAPIApi* | [**timeOffAssignTimeOffPoliciesForAnEmployee**](docs/Api/PublicAPIApi.md#timeoffassigntimeoffpoliciesforanemployee) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee
*PublicAPIApi* | [**timeOffAssignTimeOffPoliciesForAnEmployeeV11**](docs/Api/PublicAPIApi.md#timeoffassigntimeoffpoliciesforanemployeev11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies for an Employee, Version 1.1
*PublicAPIApi* | [**timeOffChangeARequestStatus**](docs/Api/PublicAPIApi.md#timeoffchangearequeststatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Change a Request Status
*PublicAPIApi* | [**timeOffEstimateFutureTimeOffBalances**](docs/Api/PublicAPIApi.md#timeoffestimatefuturetimeoffbalances) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Estimate Future Time Off Balances
*PublicAPIApi* | [**timeOffGetTimeOffRequests**](docs/Api/PublicAPIApi.md#timeoffgettimeoffrequests) | **GET** /api/v1/time_off/requests | Get Time Off Requests
*PublicAPIApi* | [**timeOffListTimeOffPoliciesForEmployee**](docs/Api/PublicAPIApi.md#timeofflisttimeoffpoliciesforemployee) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee
*PublicAPIApi* | [**timeOffListTimeOffPoliciesForEmployeeV11**](docs/Api/PublicAPIApi.md#timeofflisttimeoffpoliciesforemployeev11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Time Off Policies for Employee, Version 1.1
*PublicAPIApi* | [**updateCompanyFile**](docs/Api/PublicAPIApi.md#updatecompanyfile) | **POST** /api/v1/files/{fileId} | Update Company File
*PublicAPIApi* | [**updateEmployee**](docs/Api/PublicAPIApi.md#updateemployee) | **POST** /api/v1/employees/{id} | Update Employee
*PublicAPIApi* | [**updateEmployeeDependent**](docs/Api/PublicAPIApi.md#updateemployeedependent) | **PUT** /api/v1/employeedependents/{id} | Update an employee dependent
*PublicAPIApi* | [**updateEmployeeFile**](docs/Api/PublicAPIApi.md#updateemployeefile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File
*PublicAPIApi* | [**updateEmployeeTableRow**](docs/Api/PublicAPIApi.md#updateemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Updates a table row.
*PublicAPIApi* | [**updateEmployeeTableRowV**](docs/Api/PublicAPIApi.md#updateemployeetablerowv) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Updates a table row.
*PublicAPIApi* | [**updateEmployeeTrainingRecord**](docs/Api/PublicAPIApi.md#updateemployeetrainingrecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record
*PublicAPIApi* | [**updateTrainingCategory**](docs/Api/PublicAPIApi.md#updatetrainingcategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category
*PublicAPIApi* | [**updateTrainingType**](docs/Api/PublicAPIApi.md#updatetrainingtype) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type
*PublicAPIApi* | [**uploadCompanyFile**](docs/Api/PublicAPIApi.md#uploadcompanyfile) | **POST** /api/v1/files | Upload Company File
*PublicAPIApi* | [**uploadEmployeeFile**](docs/Api/PublicAPIApi.md#uploademployeefile) | **POST** /api/v1/employees/{id}/files | Upload Employee File
*PublicAPIApi* | [**uploadEmployeePhoto**](docs/Api/PublicAPIApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Store a new employee photo
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
*TimeTrackingApi* | [**ca54fa4c1d42864a2540f7f7600e0d65**](docs/Api/TimeTrackingApi.md#ca54fa4c1d42864a2540f7f7600e0d65) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Add Timesheet Clock-Out Entry
*TimeTrackingApi* | [**call134f6593587d7195536c151bd65eb6d5**](docs/Api/TimeTrackingApi.md#call134f6593587d7195536c151bd65eb6d5) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries
*TimeTrackingApi* | [**call3b7487d1d17551f6c3e2567b96089ce1**](docs/Api/TimeTrackingApi.md#call3b7487d1d17551f6c3e2567b96089ce1) | **POST** /api/v1/time_tracking/clock_entries/store | Add/Edit Timesheet Clock Entries
*TimeTrackingApi* | [**call408a4478cbd2b1b5811ba6228e2898df**](docs/Api/TimeTrackingApi.md#call408a4478cbd2b1b5811ba6228e2898df) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*TimeTrackingApi* | [**call43c7cc099ca54295a047f449824fc0dd**](docs/Api/TimeTrackingApi.md#call43c7cc099ca54295a047f449824fc0dd) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Add Timesheet Clock-In Entry
*TimeTrackingApi* | [**call7bb9fedfad942b8839bc61a125e7c255**](docs/Api/TimeTrackingApi.md#call7bb9fedfad942b8839bc61a125e7c255) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*TimeTrackingApi* | [**e9a47e93524609b981be6139822d219e**](docs/Api/TimeTrackingApi.md#e9a47e93524609b981be6139822d219e) | **POST** /api/v1/time_tracking/hour_entries/store | Add/Edit Timesheet Hour Entries
*TimeTrackingApi* | [**f7dd45b1747b0b72c4b617845b065a07**](docs/Api/TimeTrackingApi.md#f7dd45b1747b0b72c4b617845b065a07) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project
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

- [18e680c918496818b49d593d7ea375a5Request](docs/Model/18e680c918496818b49d593d7ea375a5Request.md)
- [22067048cf6eec230a865765a18ad7b8Request](docs/Model/22067048cf6eec230a865765a18ad7b8Request.md)
- [3b7487d1d17551f6c3e2567b96089ce1Request](docs/Model/3b7487d1d17551f6c3e2567b96089ce1Request.md)
- [3b7487d1d17551f6c3e2567b96089ce1RequestEntriesInner](docs/Model/3b7487d1d17551f6c3e2567b96089ce1RequestEntriesInner.md)
- [408a4478cbd2b1b5811ba6228e2898dfRequest](docs/Model/408a4478cbd2b1b5811ba6228e2898dfRequest.md)
- [43c7cc099ca54295a047f449824fc0ddRequest](docs/Model/43c7cc099ca54295a047f449824fc0ddRequest.md)
- [7bb9fedfad942b8839bc61a125e7c255Request](docs/Model/7bb9fedfad942b8839bc61a125e7c255Request.md)
- [889a4c2de70a53c5ab8cb32f1c2243f5200Response](docs/Model/889a4c2de70a53c5ab8cb32f1c2243f5200Response.md)
- [AbstractFormNode](docs/Model/AbstractFormNode.md)
- [Aca](docs/Model/Aca.md)
- [AccountContactsResponse](docs/Model/AccountContactsResponse.md)
- [AccountContactsResponseAccountsPayableEmails](docs/Model/AccountContactsResponseAccountsPayableEmails.md)
- [AccountStatusTransformer](docs/Model/AccountStatusTransformer.md)
- [AccountStatusTransformerBenefits](docs/Model/AccountStatusTransformerBenefits.md)
- [AccountStatusTransformerDemographics](docs/Model/AccountStatusTransformerDemographics.md)
- [AccountStatusTransformerEmployees](docs/Model/AccountStatusTransformerEmployees.md)
- [AccountStatusTransformerServices](docs/Model/AccountStatusTransformerServices.md)
- [AccountStatusTransformerTimeOff](docs/Model/AccountStatusTransformerTimeOff.md)
- [AccountSummaryResponse](docs/Model/AccountSummaryResponse.md)
- [AccountSyncDataObject](docs/Model/AccountSyncDataObject.md)
- [AccountsPayableEmailsResponse](docs/Model/AccountsPayableEmailsResponse.md)
- [AchHostedSignatureResponse](docs/Model/AchHostedSignatureResponse.md)
- [AchHostedSignatureResponseBillToContactAddress](docs/Model/AchHostedSignatureResponseBillToContactAddress.md)
- [AddNewCustomApplicantStatusResponse](docs/Model/AddNewCustomApplicantStatusResponse.md)
- [AddNewCustomApplicantStatusResponseOneOf](docs/Model/AddNewCustomApplicantStatusResponseOneOf.md)
- [AddNewEmployeeTrainingRecordRequest](docs/Model/AddNewEmployeeTrainingRecordRequest.md)
- [AddNewEmployeeTrainingRecordRequestCost](docs/Model/AddNewEmployeeTrainingRecordRequestCost.md)
- [AddOnBillingDetailsResponse](docs/Model/AddOnBillingDetailsResponse.md)
- [AddOnTrialDetailsResponseInner](docs/Model/AddOnTrialDetailsResponseInner.md)
- [AddTrainingCategoryRequest](docs/Model/AddTrainingCategoryRequest.md)
- [AddTrainingTypeRequest](docs/Model/AddTrainingTypeRequest.md)
- [AddTrainingTypeRequestCategory](docs/Model/AddTrainingTypeRequestCategory.md)
- [AddedEinSuggestedNameViewObject](docs/Model/AddedEinSuggestedNameViewObject.md)
- [AdditionalCompensationDataObject](docs/Model/AdditionalCompensationDataObject.md)
- [AdditionalPayTransformer](docs/Model/AdditionalPayTransformer.md)
- [Address](docs/Model/Address.md)
- [AdjustTimeOffBalance](docs/Model/AdjustTimeOffBalance.md)
- [AggregateTimeOffRequestWithPersonInfoResponseInner](docs/Model/AggregateTimeOffRequestWithPersonInfoResponseInner.md)
- [AllFieldOptionsTransformer](docs/Model/AllFieldOptionsTransformer.md)
- [Answers](docs/Model/Answers.md)
- [AnswersEmployeeDataViewObject](docs/Model/AnswersEmployeeDataViewObject.md)
- [AnswersFileViewObject](docs/Model/AnswersFileViewObject.md)
- [AnswersSettingsFileOptionDataObject](docs/Model/AnswersSettingsFileOptionDataObject.md)
- [AppSettingsApp](docs/Model/AppSettingsApp.md)
- [ApplicantSourceDataObject](docs/Model/ApplicantSourceDataObject.md)
- [ApplicationApprovalRequestDataObject](docs/Model/ApplicationApprovalRequestDataObject.md)
- [ApplicationFilterSchema](docs/Model/ApplicationFilterSchema.md)
- [ApprovalClockOutResponseDataObject](docs/Model/ApprovalClockOutResponseDataObject.md)
- [ApprovalFlowDataObject](docs/Model/ApprovalFlowDataObject.md)
- [ApprovalFlowPersonInfoDataObject](docs/Model/ApprovalFlowPersonInfoDataObject.md)
- [ApprovalFlowSummaryDataObject](docs/Model/ApprovalFlowSummaryDataObject.md)
- [ApprovalGroupDataObject](docs/Model/ApprovalGroupDataObject.md)
- [ApproverDataObject](docs/Model/ApproverDataObject.md)
- [AssessmentFileViewObject](docs/Model/AssessmentFileViewObject.md)
- [AssessmentTabViewObject](docs/Model/AssessmentTabViewObject.md)
- [AssignEmployeesRequest](docs/Model/AssignEmployeesRequest.md)
- [AtsJobTitle](docs/Model/AtsJobTitle.md)
- [AtsLocation](docs/Model/AtsLocation.md)
- [AtsPerson](docs/Model/AtsPerson.md)
- [AvailablePlanType](docs/Model/AvailablePlanType.md)
- [BambooHrPayrollDocumentStatusViewObject](docs/Model/BambooHrPayrollDocumentStatusViewObject.md)
- [BankInformationViewObject](docs/Model/BankInformationViewObject.md)
- [BankTransformerInner](docs/Model/BankTransformerInner.md)
- [BaseEmployeeCheckRequest](docs/Model/BaseEmployeeCheckRequest.md)
- [BaseTimeOffPolicyVersionTransformer](docs/Model/BaseTimeOffPolicyVersionTransformer.md)
- [BasicTimesheetApiTransformer](docs/Model/BasicTimesheetApiTransformer.md)
- [BasicTimesheetApiTransformerApproval](docs/Model/BasicTimesheetApiTransformerApproval.md)
- [BasicTimesheetApiTransformerApprovalApprovableDate](docs/Model/BasicTimesheetApiTransformerApprovalApprovableDate.md)
- [BasicTimesheetApiTransformerApprovalApprovedDate](docs/Model/BasicTimesheetApiTransformerApprovalApprovedDate.md)
- [BasicTimesheetApiTransformerApprovalDueDate](docs/Model/BasicTimesheetApiTransformerApprovalDueDate.md)
- [BasicTimesheetApiTransformerHourSummaryInner](docs/Model/BasicTimesheetApiTransformerHourSummaryInner.md)
- [BasicTimesheetApiTransformerOvertimeSummaryInner](docs/Model/BasicTimesheetApiTransformerOvertimeSummaryInner.md)
- [BasicTimesheetApiTransformerShiftDifferentialsInner](docs/Model/BasicTimesheetApiTransformerShiftDifferentialsInner.md)
- [BasicTimesheetWithApproverApiTransformer](docs/Model/BasicTimesheetWithApproverApiTransformer.md)
- [BasicTimesheetWithApproverApiTransformerAllOfApproval](docs/Model/BasicTimesheetWithApproverApiTransformerAllOfApproval.md)
- [BasicTimesheetWithApproverApiTransformerAllOfApprovalApprovableDate](docs/Model/BasicTimesheetWithApproverApiTransformerAllOfApprovalApprovableDate.md)
- [BasicTimesheetWithApproverApiTransformerAllOfApprovalApprovedDate](docs/Model/BasicTimesheetWithApproverApiTransformerAllOfApprovalApprovedDate.md)
- [BasicTimesheetWithApproverApiTransformerAllOfApprovalDueDate](docs/Model/BasicTimesheetWithApproverApiTransformerAllOfApprovalDueDate.md)
- [BasicTimesheetWithApproverApiTransformerAllOfApprovalUser](docs/Model/BasicTimesheetWithApproverApiTransformerAllOfApprovalUser.md)
- [BatchEarningsResponseTransformer](docs/Model/BatchEarningsResponseTransformer.md)
- [BatchEarningsResponseTransformerDeletedInner](docs/Model/BatchEarningsResponseTransformerDeletedInner.md)
- [BeforeHireDateNewHireAutomationSetting](docs/Model/BeforeHireDateNewHireAutomationSetting.md)
- [BenefitClass](docs/Model/BenefitClass.md)
- [BenefitDeductionDataObject](docs/Model/BenefitDeductionDataObject.md)
- [BenefitEnrollmentWindow](docs/Model/BenefitEnrollmentWindow.md)
- [BenefitEnrollmentWindowBenefitPlan](docs/Model/BenefitEnrollmentWindowBenefitPlan.md)
- [BenefitEnrollmentWindowBenefitPlansResponse](docs/Model/BenefitEnrollmentWindowBenefitPlansResponse.md)
- [BenefitEnrollmentWindowResponse](docs/Model/BenefitEnrollmentWindowResponse.md)
- [BenefitEnrollmentWindowSettingsObject](docs/Model/BenefitEnrollmentWindowSettingsObject.md)
- [BenefitFile](docs/Model/BenefitFile.md)
- [BenefitGroupEmployee](docs/Model/BenefitGroupEmployee.md)
- [BenefitOptions](docs/Model/BenefitOptions.md)
- [BenefitPlanBeneficiaryPostContract](docs/Model/BenefitPlanBeneficiaryPostContract.md)
- [BenefitPlanBeneficiaryPostContractPlansValueInner](docs/Model/BenefitPlanBeneficiaryPostContractPlansValueInner.md)
- [BenefitPlanBeneficiaryPostContractPlansValueInnerOneOf](docs/Model/BenefitPlanBeneficiaryPostContractPlansValueInnerOneOf.md)
- [BenefitPlanBeneficiaryPostContractPlansValueInnerOneOf1](docs/Model/BenefitPlanBeneficiaryPostContractPlansValueInnerOneOf1.md)
- [BenefitPlanCoverageCoverage](docs/Model/BenefitPlanCoverageCoverage.md)
- [BenefitPlanDependencyOption](docs/Model/BenefitPlanDependencyOption.md)
- [BenefitPlanEligibleGroups](docs/Model/BenefitPlanEligibleGroups.md)
- [BenefitPlanEnrollmentStatuses](docs/Model/BenefitPlanEnrollmentStatuses.md)
- [BenefitPlanFileViewObject](docs/Model/BenefitPlanFileViewObject.md)
- [BenefitPlanModel](docs/Model/BenefitPlanModel.md)
- [BenefitPlanModelEnrollmentInfo](docs/Model/BenefitPlanModelEnrollmentInfo.md)
- [BenefitPlanView](docs/Model/BenefitPlanView.md)
- [BenefitPlanWizardById](docs/Model/BenefitPlanWizardById.md)
- [BenefitPlanWizardByIdMedicalPlans](docs/Model/BenefitPlanWizardByIdMedicalPlans.md)
- [BenefitPlanWizardByType](docs/Model/BenefitPlanWizardByType.md)
- [BenefitPlanWizardByTypeMedicalPlans](docs/Model/BenefitPlanWizardByTypeMedicalPlans.md)
- [BenefitPlanWizardRevision](docs/Model/BenefitPlanWizardRevision.md)
- [BenefitSimpleEmployee](docs/Model/BenefitSimpleEmployee.md)
- [BenefitVendor](docs/Model/BenefitVendor.md)
- [BenefitVendorQuestionAnswer](docs/Model/BenefitVendorQuestionAnswer.md)
- [BenefitsTabPlansViewObject](docs/Model/BenefitsTabPlansViewObject.md)
- [BenefitsTabPlansViewObjectPlansInner](docs/Model/BenefitsTabPlansViewObjectPlansInner.md)
- [BenefitsTabPlansViewObjectPlansInnerPlanCategoryInner](docs/Model/BenefitsTabPlansViewObjectPlansInnerPlanCategoryInner.md)
- [BillableEmployee](docs/Model/BillableEmployee.md)
- [BillableEmployeesResponse](docs/Model/BillableEmployeesResponse.md)
- [BillingContactsResponse](docs/Model/BillingContactsResponse.md)
- [BillingContactsResponseContactsInner](docs/Model/BillingContactsResponseContactsInner.md)
- [BillingPermsResponse](docs/Model/BillingPermsResponse.md)
- [BudgetAllocationsView](docs/Model/BudgetAllocationsView.md)
- [BudgetGuidelinesDataObject](docs/Model/BudgetGuidelinesDataObject.md)
- [BudgetGuidelinesView](docs/Model/BudgetGuidelinesView.md)
- [BudgetGuidelinesWarnings](docs/Model/BudgetGuidelinesWarnings.md)
- [BudgetSummaryDataObject](docs/Model/BudgetSummaryDataObject.md)
- [BulkEditChange](docs/Model/BulkEditChange.md)
- [BulkEditChangeCoverageData](docs/Model/BulkEditChangeCoverageData.md)
- [BulkEditPlanYear](docs/Model/BulkEditPlanYear.md)
- [BulkEnrollBenefitPlanContract](docs/Model/BulkEnrollBenefitPlanContract.md)
- [BulkEnrollByPlanContract](docs/Model/BulkEnrollByPlanContract.md)
- [BulkEnrollEligibleEmployeeContract](docs/Model/BulkEnrollEligibleEmployeeContract.md)
- [BulkEnrollEmployeeFilterContract](docs/Model/BulkEnrollEmployeeFilterContract.md)
- [BulkEnrollTimeToEligibilityContract](docs/Model/BulkEnrollTimeToEligibilityContract.md)
- [BulkEnrollToolsContract](docs/Model/BulkEnrollToolsContract.md)
- [BusinessStructuresTransformer](docs/Model/BusinessStructuresTransformer.md)
- [Ca54fa4c1d42864a2540f7f7600e0d65Request](docs/Model/Ca54fa4c1d42864a2540f7f7600e0d65Request.md)
- [CalculatePayrollErrorTransformer](docs/Model/CalculatePayrollErrorTransformer.md)
- [CalculatePayrollErrorTransformerErrorObject](docs/Model/CalculatePayrollErrorTransformerErrorObject.md)
- [CalculatePayrollErrorTransformerErrorObjectEmployeesInner](docs/Model/CalculatePayrollErrorTransformerErrorObjectEmployeesInner.md)
- [CalculatePayrollErrorTransformerErrorObjectEmployeesInnerEarningsInner](docs/Model/CalculatePayrollErrorTransformerErrorObjectEmployeesInnerEarningsInner.md)
- [CalculatedPlanCost](docs/Model/CalculatedPlanCost.md)
- [CalculatedPlanCostMonthly](docs/Model/CalculatedPlanCostMonthly.md)
- [CalculatedPlanCostsResponse](docs/Model/CalculatedPlanCostsResponse.md)
- [CalculatorError](docs/Model/CalculatorError.md)
- [CancellationAddOnCancellationsDataObject](docs/Model/CancellationAddOnCancellationsDataObject.md)
- [CancellationCancellationRequestDataObject](docs/Model/CancellationCancellationRequestDataObject.md)
- [CancellationCancellationStatusDataObject](docs/Model/CancellationCancellationStatusDataObject.md)
- [CascadingGoal](docs/Model/CascadingGoal.md)
- [CascadingGoalsPageDataViewObject](docs/Model/CascadingGoalsPageDataViewObject.md)
- [CategorizedDropdownOptionViewObject](docs/Model/CategorizedDropdownOptionViewObject.md)
- [CelebrationWidgetItem](docs/Model/CelebrationWidgetItem.md)
- [CelebrationsApiTransformer](docs/Model/CelebrationsApiTransformer.md)
- [CelebrationsApiTransformerEmployeeId](docs/Model/CelebrationsApiTransformerEmployeeId.md)
- [CelebrationsWidget](docs/Model/CelebrationsWidget.md)
- [ChangeCustomFieldListValueRequest](docs/Model/ChangeCustomFieldListValueRequest.md)
- [ChangeHistoryForDateTransformer](docs/Model/ChangeHistoryForDateTransformer.md)
- [ChangeHistoryForDateTransformerChangeHistoryEventsInner](docs/Model/ChangeHistoryForDateTransformerChangeHistoryEventsInner.md)
- [ChangeHistoryForDateTransformerChangeHistoryEventsInnerDetailsInner](docs/Model/ChangeHistoryForDateTransformerChangeHistoryEventsInnerDetailsInner.md)
- [ChatMessageFeedbackDataObject](docs/Model/ChatMessageFeedbackDataObject.md)
- [ChatMessageSourceDataObject](docs/Model/ChatMessageSourceDataObject.md)
- [ChatMessageViewObject](docs/Model/ChatMessageViewObject.md)
- [CheckboxFieldFormNode](docs/Model/CheckboxFieldFormNode.md)
- [ClientBankAuthorizationTransformer](docs/Model/ClientBankAuthorizationTransformer.md)
- [ClientPayCycleTransformer](docs/Model/ClientPayCycleTransformer.md)
- [ClientPayrollConfigurationDataObjectTransformer](docs/Model/ClientPayrollConfigurationDataObjectTransformer.md)
- [ClientPayrollConfigurationDataObjectTransformerProjectsInner](docs/Model/ClientPayrollConfigurationDataObjectTransformerProjectsInner.md)
- [ClientPayrollConfigurationDataObjectTransformerShiftDifferentialsInner](docs/Model/ClientPayrollConfigurationDataObjectTransformerShiftDifferentialsInner.md)
- [ClientPayrollConfigurationDataObjectTransformerTasksInner](docs/Model/ClientPayrollConfigurationDataObjectTransformerTasksInner.md)
- [ClientPayrollConfigurationDataObjectTransformerWorkedHolidaysInner](docs/Model/ClientPayrollConfigurationDataObjectTransformerWorkedHolidaysInner.md)
- [ClockEntryApiTransformer](docs/Model/ClockEntryApiTransformer.md)
- [ClockEntryApiTransformerClockInLocation](docs/Model/ClockEntryApiTransformerClockInLocation.md)
- [ClockEntryApiTransformerClockOutLocation](docs/Model/ClockEntryApiTransformerClockOutLocation.md)
- [ClockEntryApiTransformerProjectInfo](docs/Model/ClockEntryApiTransformerProjectInfo.md)
- [ClockInApiTransformerInner](docs/Model/ClockInApiTransformerInner.md)
- [ClockTimeApiTransformer](docs/Model/ClockTimeApiTransformer.md)
- [CommonDataObjectsPayrollEmployeeTaxInformationDetail](docs/Model/CommonDataObjectsPayrollEmployeeTaxInformationDetail.md)
- [CommonDataObjectsPayrollFederal2020](docs/Model/CommonDataObjectsPayrollFederal2020.md)
- [CommonDataObjectsPayrollFederalTaxDetail](docs/Model/CommonDataObjectsPayrollFederalTaxDetail.md)
- [CommonDataObjectsPayrollFederalTaxFields](docs/Model/CommonDataObjectsPayrollFederalTaxFields.md)
- [CommonDataObjectsPayrollFederalTaxFieldsFilingStatusInner](docs/Model/CommonDataObjectsPayrollFederalTaxFieldsFilingStatusInner.md)
- [CommonDataObjectsPayrollPayrollAdditionalWithholding](docs/Model/CommonDataObjectsPayrollPayrollAdditionalWithholding.md)
- [CommonDataObjectsPayrollPayrollCheckbox](docs/Model/CommonDataObjectsPayrollPayrollCheckbox.md)
- [CommonDataObjectsPayrollPayrollFieldAmountWithRange](docs/Model/CommonDataObjectsPayrollPayrollFieldAmountWithRange.md)
- [CommonDataObjectsPayrollPayrollRange](docs/Model/CommonDataObjectsPayrollPayrollRange.md)
- [CommonDataObjectsPayrollPayrollSelectOption](docs/Model/CommonDataObjectsPayrollPayrollSelectOption.md)
- [CommonDataObjectsPayrollPayrollTaxStateUiSelectOption](docs/Model/CommonDataObjectsPayrollPayrollTaxStateUiSelectOption.md)
- [CommonDataObjectsPayrollPayrollUnemploymentInsuranceLocation](docs/Model/CommonDataObjectsPayrollPayrollUnemploymentInsuranceLocation.md)
- [CommonDataObjectsPayrollStateTaxDetail](docs/Model/CommonDataObjectsPayrollStateTaxDetail.md)
- [CommonDataObjectsPayrollStateTaxLocation](docs/Model/CommonDataObjectsPayrollStateTaxLocation.md)
- [CommonDataObjectsPayrollStateTaxLocationDetail](docs/Model/CommonDataObjectsPayrollStateTaxLocationDetail.md)
- [CommonDataObjectsPayrollStateTaxLocationFields](docs/Model/CommonDataObjectsPayrollStateTaxLocationFields.md)
- [CommonDataObjectsPayrollStateTaxLocationFieldsFilingStatusInner](docs/Model/CommonDataObjectsPayrollStateTaxLocationFieldsFilingStatusInner.md)
- [CommonDataObjectsPayrollStateTaxLocationOptionalFields](docs/Model/CommonDataObjectsPayrollStateTaxLocationOptionalFields.md)
- [CommonDataObjectsPayrollStateUnemploymentInsuranceDetail](docs/Model/CommonDataObjectsPayrollStateUnemploymentInsuranceDetail.md)
- [CommonDataObjectsPayrollStateUnemploymentInsuranceFields](docs/Model/CommonDataObjectsPayrollStateUnemploymentInsuranceFields.md)
- [CommonReportData](docs/Model/CommonReportData.md)
- [CommunicationsSummaryDataObject](docs/Model/CommunicationsSummaryDataObject.md)
- [CompanyAlertDataObject](docs/Model/CompanyAlertDataObject.md)
- [CompanyBankInformationViewObject](docs/Model/CompanyBankInformationViewObject.md)
- [CompanyBenefitRequest](docs/Model/CompanyBenefitRequest.md)
- [CompanyBenefitResponse](docs/Model/CompanyBenefitResponse.md)
- [CompanyBenefitType](docs/Model/CompanyBenefitType.md)
- [CompanyBenefitUpdateRequest](docs/Model/CompanyBenefitUpdateRequest.md)
- [CompanyBenefitUpdateRequestPropertiesInner](docs/Model/CompanyBenefitUpdateRequestPropertiesInner.md)
- [CompanyCurrencyWithConversionsDataObject](docs/Model/CompanyCurrencyWithConversionsDataObject.md)
- [CompanyEnrollmentWindow](docs/Model/CompanyEnrollmentWindow.md)
- [CompanyFileUpdate](docs/Model/CompanyFileUpdate.md)
- [CompanyHolidayDataObject](docs/Model/CompanyHolidayDataObject.md)
- [CompanyHolidayWithEmployeesTransformer](docs/Model/CompanyHolidayWithEmployeesTransformer.md)
- [CompanyHolidayWithEmployeesTransformerEmployeesInner](docs/Model/CompanyHolidayWithEmployeesTransformerEmployeesInner.md)
- [CompanyIndustryDataObject](docs/Model/CompanyIndustryDataObject.md)
- [CompanyInformationResponse](docs/Model/CompanyInformationResponse.md)
- [CompanyInformationTransformer](docs/Model/CompanyInformationTransformer.md)
- [CompanyInformationViewObject](docs/Model/CompanyInformationViewObject.md)
- [CompanyLevelDeductionApiViewObject](docs/Model/CompanyLevelDeductionApiViewObject.md)
- [CompanyLocationWithEmployeeCountDataObject](docs/Model/CompanyLocationWithEmployeeCountDataObject.md)
- [CompanyPayrollClientIncludedTaxViewObject](docs/Model/CompanyPayrollClientIncludedTaxViewObject.md)
- [CompanyPayrollClientIncludedTaxViewObjectCurrentTaxSetupStatus](docs/Model/CompanyPayrollClientIncludedTaxViewObjectCurrentTaxSetupStatus.md)
- [CompanyPayrollClientIncludedTaxViewObjectTaxTypeEngineInfo](docs/Model/CompanyPayrollClientIncludedTaxViewObjectTaxTypeEngineInfo.md)
- [CompanyTaxesViewObject](docs/Model/CompanyTaxesViewObject.md)
- [CompanyTrainingSettingsDataSchema](docs/Model/CompanyTrainingSettingsDataSchema.md)
- [CompensationBenchmarkingColumnMap](docs/Model/CompensationBenchmarkingColumnMap.md)
- [CompensationFeatureSummaryDataObject](docs/Model/CompensationFeatureSummaryDataObject.md)
- [CompensationPeriodsInner](docs/Model/CompensationPeriodsInner.md)
- [CompensationPlanningBudgetsView](docs/Model/CompensationPlanningBudgetsView.md)
- [CompensationPlanningCycleCompensationTypes](docs/Model/CompensationPlanningCycleCompensationTypes.md)
- [CompensationPlanningCycleConfigurationDataObject](docs/Model/CompensationPlanningCycleConfigurationDataObject.md)
- [CompensationPlanningSummaryResponseDataObject](docs/Model/CompensationPlanningSummaryResponseDataObject.md)
- [CompensationToolsDataObject](docs/Model/CompensationToolsDataObject.md)
- [CompensationUpsellData](docs/Model/CompensationUpsellData.md)
- [CompletedQuestionsAndResponseDataObject](docs/Model/CompletedQuestionsAndResponseDataObject.md)
- [CompletedSummaryItemDataSchema](docs/Model/CompletedSummaryItemDataSchema.md)
- [CompletedTrainingDataSchema](docs/Model/CompletedTrainingDataSchema.md)
- [CompletedTrainingListDataSchema](docs/Model/CompletedTrainingListDataSchema.md)
- [ConflictExceptionTransformer](docs/Model/ConflictExceptionTransformer.md)
- [ContactRequestObject](docs/Model/ContactRequestObject.md)
- [ContactTransformer](docs/Model/ContactTransformer.md)
- [ControllerPayrollApiMobileTransformerPayStub](docs/Model/ControllerPayrollApiMobileTransformerPayStub.md)
- [ControllerPayrollApiMobileTransformerPayStubCheck](docs/Model/ControllerPayrollApiMobileTransformerPayStubCheck.md)
- [ControllerPayrollApiMobileTransformerPayStubCheckFunFact](docs/Model/ControllerPayrollApiMobileTransformerPayStubCheckFunFact.md)
- [ControllerPayrollApiMobileTransformerPayStubEmployee](docs/Model/ControllerPayrollApiMobileTransformerPayStubEmployee.md)
- [ControllerPayrollApiMobileTransformerPayStubEmployer](docs/Model/ControllerPayrollApiMobileTransformerPayStubEmployer.md)
- [ControllerPayrollApiMobileTransformerPayStubPayCycle](docs/Model/ControllerPayrollApiMobileTransformerPayStubPayCycle.md)
- [ControllerPayrollApiMobileTransformerPayStubsListInner](docs/Model/ControllerPayrollApiMobileTransformerPayStubsListInner.md)
- [ControllerPayrollApiMobileTransformerYearSummaryInner](docs/Model/ControllerPayrollApiMobileTransformerYearSummaryInner.md)
- [ControllerPayrollViewObjectEmployeeTaxTypeView](docs/Model/ControllerPayrollViewObjectEmployeeTaxTypeView.md)
- [ConversionRateDataObject](docs/Model/ConversionRateDataObject.md)
- [CostSplit](docs/Model/CostSplit.md)
- [Country](docs/Model/Country.md)
- [Coverage](docs/Model/Coverage.md)
- [CoverageCost](docs/Model/CoverageCost.md)
- [CoverageLevels](docs/Model/CoverageLevels.md)
- [CreateClientRequest](docs/Model/CreateClientRequest.md)
- [CreateFullAdminEmployeeRequestObject](docs/Model/CreateFullAdminEmployeeRequestObject.md)
- [CreateFullAdminEmployeeUserTransformer](docs/Model/CreateFullAdminEmployeeUserTransformer.md)
- [CreatePayrollContactTransformer](docs/Model/CreatePayrollContactTransformer.md)
- [CreateTeamRequest](docs/Model/CreateTeamRequest.md)
- [CurrencyDataObject](docs/Model/CurrencyDataObject.md)
- [CurrencyFieldFormNode](docs/Model/CurrencyFieldFormNode.md)
- [CurrencyFieldFormNodeAllOf](docs/Model/CurrencyFieldFormNodeAllOf.md)
- [CustomCoverageLevel](docs/Model/CustomCoverageLevel.md)
- [CustomExistingCoverageLevel](docs/Model/CustomExistingCoverageLevel.md)
- [CustomFieldRequest](docs/Model/CustomFieldRequest.md)
- [CustomFieldTypeViewObject](docs/Model/CustomFieldTypeViewObject.md)
- [CustomFieldViewObject](docs/Model/CustomFieldViewObject.md)
- [CustomNewCoverageLevel](docs/Model/CustomNewCoverageLevel.md)
- [CustomReportDataObject](docs/Model/CustomReportDataObject.md)
- [CustomReportRequest](docs/Model/CustomReportRequest.md)
- [CustomTableFieldRequest](docs/Model/CustomTableFieldRequest.md)
- [CustomTableFieldViewObject](docs/Model/CustomTableFieldViewObject.md)
- [CustomTableRequest](docs/Model/CustomTableRequest.md)
- [CustomTableViewObject](docs/Model/CustomTableViewObject.md)
- [CustomerAccountValidationReviewAcceptance](docs/Model/CustomerAccountValidationReviewAcceptance.md)
- [CustomerOnboardingContactOptionsTransformer](docs/Model/CustomerOnboardingContactOptionsTransformer.md)
- [CustomerOnboardingContactOptionsTransformerContact](docs/Model/CustomerOnboardingContactOptionsTransformerContact.md)
- [CustomerOnboardingContactOptionsTransformerContactInner](docs/Model/CustomerOnboardingContactOptionsTransformerContactInner.md)
- [CustomerOnboardingEmployeeListTransformerInner](docs/Model/CustomerOnboardingEmployeeListTransformerInner.md)
- [CustomerOnboardingModulesTransformerInner](docs/Model/CustomerOnboardingModulesTransformerInner.md)
- [CustomerOnboardingModulesTransformerInnerItemsInner](docs/Model/CustomerOnboardingModulesTransformerInnerItemsInner.md)
- [CustomerOnboardingUpdateContactRequestObject](docs/Model/CustomerOnboardingUpdateContactRequestObject.md)
- [CycleDetailsSummaryDataObject](docs/Model/CycleDetailsSummaryDataObject.md)
- [DailyDetailApiTransformer](docs/Model/DailyDetailApiTransformer.md)
- [DailyDetailApiTransformerHolidaysInner](docs/Model/DailyDetailApiTransformerHolidaysInner.md)
- [DailyDetailApiTransformerOvertimeSummary](docs/Model/DailyDetailApiTransformerOvertimeSummary.md)
- [DailyDetailApiTransformerTimeOffInner](docs/Model/DailyDetailApiTransformerTimeOffInner.md)
- [DailyTimesheetApiTransformer](docs/Model/DailyTimesheetApiTransformer.md)
- [DailyTimesheetsWithPersonsApiTransformer](docs/Model/DailyTimesheetsWithPersonsApiTransformer.md)
- [DashboardListItemResponse](docs/Model/DashboardListItemResponse.md)
- [DataCleaningDataCleanerJobDataObject](docs/Model/DataCleaningDataCleanerJobDataObject.md)
- [DataCleaningDataCleaningJobDataObject](docs/Model/DataCleaningDataCleaningJobDataObject.md)
- [DataCleaningDataCleaningJobHeaderDataResponse](docs/Model/DataCleaningDataCleaningJobHeaderDataResponse.md)
- [DataCleaningExistingEmployeesDataObject](docs/Model/DataCleaningExistingEmployeesDataObject.md)
- [DataCleaningExistingEmployeesSummaryDataObject](docs/Model/DataCleaningExistingEmployeesSummaryDataObject.md)
- [DataCleaningValueMappingDataObject](docs/Model/DataCleaningValueMappingDataObject.md)
- [DataProcessingAgreementInfoResponse](docs/Model/DataProcessingAgreementInfoResponse.md)
- [DataProcessingAgreementInfoResponseUser](docs/Model/DataProcessingAgreementInfoResponseUser.md)
- [DataRequest](docs/Model/DataRequest.md)
- [DataRequestAggregationsInner](docs/Model/DataRequestAggregationsInner.md)
- [DataRequestFilters](docs/Model/DataRequestFilters.md)
- [DataRequestFiltersFiltersInner](docs/Model/DataRequestFiltersFiltersInner.md)
- [DataRequestSortByInner](docs/Model/DataRequestSortByInner.md)
- [DataSetConfigurationTransformer](docs/Model/DataSetConfigurationTransformer.md)
- [DataSetListTransformer](docs/Model/DataSetListTransformer.md)
- [DataVisualizationPageContextResponse](docs/Model/DataVisualizationPageContextResponse.md)
- [Dataset](docs/Model/Dataset.md)
- [DatasetFieldsResponse](docs/Model/DatasetFieldsResponse.md)
- [DatasetResponse](docs/Model/DatasetResponse.md)
- [DateFieldFormNode](docs/Model/DateFieldFormNode.md)
- [DecisionData](docs/Model/DecisionData.md)
- [DecisionDataForEdit](docs/Model/DecisionDataForEdit.md)
- [DeductionDateRule](docs/Model/DeductionDateRule.md)
- [DeductionFrequency](docs/Model/DeductionFrequency.md)
- [DeductionHistoryDataObject](docs/Model/DeductionHistoryDataObject.md)
- [DeductionHistoryModalEnrollmentDataObject](docs/Model/DeductionHistoryModalEnrollmentDataObject.md)
- [DeductionHistoryModalHeaderDataObject](docs/Model/DeductionHistoryModalHeaderDataObject.md)
- [DeductionPayeeDataObject](docs/Model/DeductionPayeeDataObject.md)
- [DeductionSyncListPageAllowableLoanNumberViewObject](docs/Model/DeductionSyncListPageAllowableLoanNumberViewObject.md)
- [DeductionSyncListPageAllowableTypeViewObject](docs/Model/DeductionSyncListPageAllowableTypeViewObject.md)
- [DeductionSyncListPageEmployeeViewObject](docs/Model/DeductionSyncListPageEmployeeViewObject.md)
- [DeductionSyncListPageViewObject](docs/Model/DeductionSyncListPageViewObject.md)
- [DeductionTotals](docs/Model/DeductionTotals.md)
- [DeductionTotalsCollection](docs/Model/DeductionTotalsCollection.md)
- [DeductionTotalsSummary](docs/Model/DeductionTotalsSummary.md)
- [DefaultCoverageView](docs/Model/DefaultCoverageView.md)
- [DeleteEmployeeTableRowV1200Response](docs/Model/DeleteEmployeeTableRowV1200Response.md)
- [DeleteSharingListRequest](docs/Model/DeleteSharingListRequest.md)
- [DemoRequestTransformerResponse](docs/Model/DemoRequestTransformerResponse.md)
- [DemoRequestTransformerResponseRequestedBy](docs/Model/DemoRequestTransformerResponseRequestedBy.md)
- [DemoRequesterResponse](docs/Model/DemoRequesterResponse.md)
- [DenormalizedElectionWindowSubmissionRequest](docs/Model/DenormalizedElectionWindowSubmissionRequest.md)
- [Department](docs/Model/Department.md)
- [Dependent](docs/Model/Dependent.md)
- [DependentAnswers](docs/Model/DependentAnswers.md)
- [DependentApprovalResponse](docs/Model/DependentApprovalResponse.md)
- [DependentQuestion](docs/Model/DependentQuestion.md)
- [DependentsDataViewObject](docs/Model/DependentsDataViewObject.md)
- [DeserializedAdminApprovalRequest](docs/Model/DeserializedAdminApprovalRequest.md)
- [DeserializedAdminEnrollElection](docs/Model/DeserializedAdminEnrollElection.md)
- [DeserializedAdminWaiveElection](docs/Model/DeserializedAdminWaiveElection.md)
- [DeserializedBenefitVendorQuestionAnswers](docs/Model/DeserializedBenefitVendorQuestionAnswers.md)
- [DeserializedEmployeeEnrollElection](docs/Model/DeserializedEmployeeEnrollElection.md)
- [DeserializedEmployeeWaiveElection](docs/Model/DeserializedEmployeeWaiveElection.md)
- [DeserializedRenameRequest](docs/Model/DeserializedRenameRequest.md)
- [DetailedPaycheckTransformer](docs/Model/DetailedPaycheckTransformer.md)
- [DetailedPaycheckTransformerBanksInner](docs/Model/DetailedPaycheckTransformerBanksInner.md)
- [DetailedPaycheckTransformerCompensation](docs/Model/DetailedPaycheckTransformerCompensation.md)
- [DetailedPaycheckTransformerEarningsInner](docs/Model/DetailedPaycheckTransformerEarningsInner.md)
- [DetailedPaycheckTransformerTaxes](docs/Model/DetailedPaycheckTransformerTaxes.md)
- [DetailsAndCurrencyRequestDataObject](docs/Model/DetailsAndCurrencyRequestDataObject.md)
- [DetailsAndCurrencyResponseDataObject](docs/Model/DetailsAndCurrencyResponseDataObject.md)
- [DetailsAndCurrencySummaryDataObject](docs/Model/DetailsAndCurrencySummaryDataObject.md)
- [DirectDepositAccountDataObject](docs/Model/DirectDepositAccountDataObject.md)
- [DirectReportsFormNode](docs/Model/DirectReportsFormNode.md)
- [DisableApplicantStatusResponse](docs/Model/DisableApplicantStatusResponse.md)
- [DisableApplicantStatusResponseOneOf](docs/Model/DisableApplicantStatusResponseOneOf.md)
- [DisableApplicantStatusResponseOneOf1](docs/Model/DisableApplicantStatusResponseOneOf1.md)
- [DropdownOption](docs/Model/DropdownOption.md)
- [DynamicSelectFieldFormNode](docs/Model/DynamicSelectFieldFormNode.md)
- [E2ae6e59655aeab2b4e6311967a2809f201Response](docs/Model/E2ae6e59655aeab2b4e6311967a2809f201Response.md)
- [E9a47e93524609b981be6139822d219eRequest](docs/Model/E9a47e93524609b981be6139822d219eRequest.md)
- [E9a47e93524609b981be6139822d219eRequestHoursInner](docs/Model/E9a47e93524609b981be6139822d219eRequestHoursInner.md)
- [EOREmployeeSchema](docs/Model/EOREmployeeSchema.md)
- [EarningTransformer](docs/Model/EarningTransformer.md)
- [EditCustomApplicantStatusResponse](docs/Model/EditCustomApplicantStatusResponse.md)
- [EditCustomApplicantStatusResponseOneOf](docs/Model/EditCustomApplicantStatusResponseOneOf.md)
- [ElectionSubmission](docs/Model/ElectionSubmission.md)
- [EligibilityBenefitPlan](docs/Model/EligibilityBenefitPlan.md)
- [EligibilityGroups](docs/Model/EligibilityGroups.md)
- [EligibilityRule](docs/Model/EligibilityRule.md)
- [EligibleUnassignedPlan](docs/Model/EligibleUnassignedPlan.md)
- [EmailTemplateArrayWithLanguage](docs/Model/EmailTemplateArrayWithLanguage.md)
- [EmailTemplateArrayWithLanguageFilesInner](docs/Model/EmailTemplateArrayWithLanguageFilesInner.md)
- [EmailTemplateDataObject](docs/Model/EmailTemplateDataObject.md)
- [EmailTemplateSchema](docs/Model/EmailTemplateSchema.md)
- [EmergencyContactDataObject](docs/Model/EmergencyContactDataObject.md)
- [EmergencyContactFormField](docs/Model/EmergencyContactFormField.md)
- [EmergencyContactFormFieldWithDropdown](docs/Model/EmergencyContactFormFieldWithDropdown.md)
- [EmergencyContactFormFieldWithDropdownDropdownOptionsInner](docs/Model/EmergencyContactFormFieldWithDropdownDropdownOptionsInner.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeApi](docs/Model/EmployeeApi.md)
- [EmployeeBanksSnapshot](docs/Model/EmployeeBanksSnapshot.md)
- [EmployeeBenefit](docs/Model/EmployeeBenefit.md)
- [EmployeeBenefitDataObject](docs/Model/EmployeeBenefitDataObject.md)
- [EmployeeBenefitDeductionsDataObject](docs/Model/EmployeeBenefitDeductionsDataObject.md)
- [EmployeeBenefitFilters](docs/Model/EmployeeBenefitFilters.md)
- [EmployeeBenefitFiltersFilters](docs/Model/EmployeeBenefitFiltersFilters.md)
- [EmployeeBudgetAllocationsView](docs/Model/EmployeeBudgetAllocationsView.md)
- [EmployeeDataTimeOffAvailableDataObject](docs/Model/EmployeeDataTimeOffAvailableDataObject.md)
- [EmployeeDemographicsTransformer](docs/Model/EmployeeDemographicsTransformer.md)
- [EmployeeDemographicsTransformerEmployeesValue](docs/Model/EmployeeDemographicsTransformerEmployeesValue.md)
- [EmployeeDependent](docs/Model/EmployeeDependent.md)
- [EmployeeDeposit](docs/Model/EmployeeDeposit.md)
- [EmployeeDirectDepositStatusTransformer](docs/Model/EmployeeDirectDepositStatusTransformer.md)
- [EmployeeDirectoryEmployeeDataObject](docs/Model/EmployeeDirectoryEmployeeDataObject.md)
- [EmployeeDirectoryInformationDataObject](docs/Model/EmployeeDirectoryInformationDataObject.md)
- [EmployeeDirectoryInformationDataObjectCurrentUser](docs/Model/EmployeeDirectoryInformationDataObjectCurrentUser.md)
- [EmployeeDirectoryInformationDataObjectCurrentUserSelectedFilter](docs/Model/EmployeeDirectoryInformationDataObjectCurrentUserSelectedFilter.md)
- [EmployeeDirectoryInformationDataObjectFiltersInner](docs/Model/EmployeeDirectoryInformationDataObjectFiltersInner.md)
- [EmployeeDirectoryInformationDataObjectGroupByOptionsInner](docs/Model/EmployeeDirectoryInformationDataObjectGroupByOptionsInner.md)
- [EmployeeEarningAdjustmentsInner](docs/Model/EmployeeEarningAdjustmentsInner.md)
- [EmployeeEarningsInner](docs/Model/EmployeeEarningsInner.md)
- [EmployeeEnrollmentByPlanDataObject](docs/Model/EmployeeEnrollmentByPlanDataObject.md)
- [EmployeeEnrollmentByPlanDataObjectCoverageDataInner](docs/Model/EmployeeEnrollmentByPlanDataObjectCoverageDataInner.md)
- [EmployeeEnrollmentCollectionResponse](docs/Model/EmployeeEnrollmentCollectionResponse.md)
- [EmployeeFederalTaxWithholdingDataObject](docs/Model/EmployeeFederalTaxWithholdingDataObject.md)
- [EmployeeFileUpdate](docs/Model/EmployeeFileUpdate.md)
- [EmployeeFormSaveRequest](docs/Model/EmployeeFormSaveRequest.md)
- [EmployeeFormValidationErrorResponse](docs/Model/EmployeeFormValidationErrorResponse.md)
- [EmployeeFormValidationErrorResponseValidationErrors](docs/Model/EmployeeFormValidationErrorResponseValidationErrors.md)
- [EmployeeFormValidationErrorResponseValidationErrorsFieldsValueInner](docs/Model/EmployeeFormValidationErrorResponseValidationErrorsFieldsValueInner.md)
- [EmployeeFullCalendarEventsApiTransformer](docs/Model/EmployeeFullCalendarEventsApiTransformer.md)
- [EmployeeFullCalendarEventsApiTransformerAnniversariesInner](docs/Model/EmployeeFullCalendarEventsApiTransformerAnniversariesInner.md)
- [EmployeeFullCalendarEventsApiTransformerBirthdaysInner](docs/Model/EmployeeFullCalendarEventsApiTransformerBirthdaysInner.md)
- [EmployeeFullCalendarEventsApiTransformerHolidaysInner](docs/Model/EmployeeFullCalendarEventsApiTransformerHolidaysInner.md)
- [EmployeeFullCalendarEventsApiTransformerWhosOutInner](docs/Model/EmployeeFullCalendarEventsApiTransformerWhosOutInner.md)
- [EmployeeFutureBenefitChangeDataObject](docs/Model/EmployeeFutureBenefitChangeDataObject.md)
- [EmployeeGoalJsonViewObject](docs/Model/EmployeeGoalJsonViewObject.md)
- [EmployeeLevelDeductionDataObject](docs/Model/EmployeeLevelDeductionDataObject.md)
- [EmployeeLevelDeductionViewObject](docs/Model/EmployeeLevelDeductionViewObject.md)
- [EmployeeListResultTransformer](docs/Model/EmployeeListResultTransformer.md)
- [EmployeeListResultTransformerColumnsInner](docs/Model/EmployeeListResultTransformerColumnsInner.md)
- [EmployeeListResultTransformerEmployeeResultsInnerInner](docs/Model/EmployeeListResultTransformerEmployeeResultsInnerInner.md)
- [EmployeeListResultTransformerPagination](docs/Model/EmployeeListResultTransformerPagination.md)
- [EmployeeOrgChartDataObject](docs/Model/EmployeeOrgChartDataObject.md)
- [EmployeePayCycleTagsInner](docs/Model/EmployeePayCycleTagsInner.md)
- [EmployeePayCycleTogglesInner](docs/Model/EmployeePayCycleTogglesInner.md)
- [EmployeePayRateTransformer](docs/Model/EmployeePayRateTransformer.md)
- [EmployeePaySchedule](docs/Model/EmployeePaySchedule.md)
- [EmployeePaystub](docs/Model/EmployeePaystub.md)
- [EmployeeRatesInner](docs/Model/EmployeeRatesInner.md)
- [EmployeeRequest](docs/Model/EmployeeRequest.md)
- [EmployeeRequests](docs/Model/EmployeeRequests.md)
- [EmployeeResponse](docs/Model/EmployeeResponse.md)
- [EmployeeResponseAggregationsInner](docs/Model/EmployeeResponseAggregationsInner.md)
- [EmployeeReviewEmployeeListTransformer](docs/Model/EmployeeReviewEmployeeListTransformer.md)
- [EmployeeReviewEmployeeListTransformerEmployeesInner](docs/Model/EmployeeReviewEmployeeListTransformerEmployeesInner.md)
- [EmployeeReviewEmployeeTransformer](docs/Model/EmployeeReviewEmployeeTransformer.md)
- [EmployeeReviewEmployeeTransformerForm](docs/Model/EmployeeReviewEmployeeTransformerForm.md)
- [EmployeeReviewEmployeeTransformerFormAddress](docs/Model/EmployeeReviewEmployeeTransformerFormAddress.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeAddressLine1](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeAddressLine1.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeAddressLine2](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeAddressLine2.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeCity](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeCity.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeCountryId](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeCountryId.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeStateId](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeStateId.md)
- [EmployeeReviewEmployeeTransformerFormAddressEmployeeZipCode](docs/Model/EmployeeReviewEmployeeTransformerFormAddressEmployeeZipCode.md)
- [EmployeeReviewEmployeeTransformerFormCompensation](docs/Model/EmployeeReviewEmployeeTransformerFormCompensation.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompRate](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompRate.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompType](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompType.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompTypeDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeeCompTypeDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePaidPer](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePaidPer.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePaidPerDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePaidPerDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePayExempt](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePayExempt.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePayExemptDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePayExemptDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePaySchedule](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePaySchedule.md)
- [EmployeeReviewEmployeeTransformerFormCompensationEmployeePayScheduleDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationEmployeePayScheduleDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormCompensationOvertimeRate](docs/Model/EmployeeReviewEmployeeTransformerFormCompensationOvertimeRate.md)
- [EmployeeReviewEmployeeTransformerFormContact](docs/Model/EmployeeReviewEmployeeTransformerFormContact.md)
- [EmployeeReviewEmployeeTransformerFormContactEmployeeEmail](docs/Model/EmployeeReviewEmployeeTransformerFormContactEmployeeEmail.md)
- [EmployeeReviewEmployeeTransformerFormContactEmployeeHomeEmail](docs/Model/EmployeeReviewEmployeeTransformerFormContactEmployeeHomeEmail.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatus](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatus.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeEmploymentStatus](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeEmploymentStatus.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeEmploymentStatusDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeEmploymentStatusDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeTaxType](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeTaxType.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeTaxTypeDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatusEmployeeTaxTypeDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormEmploymentStatusFinalPayDate](docs/Model/EmployeeReviewEmployeeTransformerFormEmploymentStatusFinalPayDate.md)
- [EmployeeReviewEmployeeTransformerFormJob](docs/Model/EmployeeReviewEmployeeTransformerFormJob.md)
- [EmployeeReviewEmployeeTransformerFormJobEmployeeHireDate](docs/Model/EmployeeReviewEmployeeTransformerFormJobEmployeeHireDate.md)
- [EmployeeReviewEmployeeTransformerFormJobInformation](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformation.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDepartment](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDepartment.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDepartmentDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDepartmentDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDivision](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDivision.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDivisionDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobDivisionDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobLocation](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobLocation.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobLocationDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobLocationDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobReportsTo](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobReportsTo.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobReportsToDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobReportsToDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobTitle](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobTitle.md)
- [EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobTitleDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormJobInformationEmployeeJobTitleDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormPersonal](docs/Model/EmployeeReviewEmployeeTransformerFormPersonal.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeBirthDate](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeBirthDate.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeFirstName](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeFirstName.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeGender](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeGender.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeGenderDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeGenderDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeLastName](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeLastName.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeMaritalStatus](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeMaritalStatus.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeMaritalStatusDropdownOptionsInner](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeMaritalStatusDropdownOptionsInner.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeNumber](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeNumber.md)
- [EmployeeReviewEmployeeTransformerFormPersonalEmployeeSsn](docs/Model/EmployeeReviewEmployeeTransformerFormPersonalEmployeeSsn.md)
- [EmployeeReviewEmployeeTransformerMetadata](docs/Model/EmployeeReviewEmployeeTransformerMetadata.md)
- [EmployeeSaveRequest](docs/Model/EmployeeSaveRequest.md)
- [EmployeeSaveRequestValue](docs/Model/EmployeeSaveRequestValue.md)
- [EmployeeSolutionProviderDeterminatorDataObject](docs/Model/EmployeeSolutionProviderDeterminatorDataObject.md)
- [EmployeeTableSaveRequest](docs/Model/EmployeeTableSaveRequest.md)
- [EmployeeTaskDataObject](docs/Model/EmployeeTaskDataObject.md)
- [EmployeeTaskFileDataObject](docs/Model/EmployeeTaskFileDataObject.md)
- [EmployeeTaxesMissingInfoTransformer](docs/Model/EmployeeTaxesMissingInfoTransformer.md)
- [EmployeeTimeOffCategoriesResponseInner](docs/Model/EmployeeTimeOffCategoriesResponseInner.md)
- [EmployeeTimeOffCategoryDetailsResponseInner](docs/Model/EmployeeTimeOffCategoryDetailsResponseInner.md)
- [EmployeeTimeOffCategoryDetailsResponseInnerCalculatorInner](docs/Model/EmployeeTimeOffCategoryDetailsResponseInnerCalculatorInner.md)
- [EmployeeTimeOffCategoryDetailsResponseInnerCategoryInner](docs/Model/EmployeeTimeOffCategoryDetailsResponseInnerCategoryInner.md)
- [EmployeeTimeOffCategoryDetailsResponseInnerScheduledEventsInner](docs/Model/EmployeeTimeOffCategoryDetailsResponseInnerScheduledEventsInner.md)
- [EmployeeTimeOffRequestApproverResponseInner](docs/Model/EmployeeTimeOffRequestApproverResponseInner.md)
- [EmployeeTimeOffTabTransformer](docs/Model/EmployeeTimeOffTabTransformer.md)
- [EmployeeTimeOffTabTransformerHistoryDisplay](docs/Model/EmployeeTimeOffTabTransformerHistoryDisplay.md)
- [EmployeeTimeOffTabTransformerPause](docs/Model/EmployeeTimeOffTabTransformerPause.md)
- [EmployeeTimeOffTabTransformerPoliciesInner](docs/Model/EmployeeTimeOffTabTransformerPoliciesInner.md)
- [EmployeeTimeOffTabTransformerUserPermissions](docs/Model/EmployeeTimeOffTabTransformerUserPermissions.md)
- [EmployeeTimesheetEntryTransformer](docs/Model/EmployeeTimesheetEntryTransformer.md)
- [EmployeeUnpaidPaystub](docs/Model/EmployeeUnpaidPaystub.md)
- [EmployeeVerificationPersonSchema](docs/Model/EmployeeVerificationPersonSchema.md)
- [EmployeeVerificationSchema](docs/Model/EmployeeVerificationSchema.md)
- [EmployeeWithholding](docs/Model/EmployeeWithholding.md)
- [EmptyNewHireAutomationSetting](docs/Model/EmptyNewHireAutomationSetting.md)
- [EnableApplicantStatusResponse](docs/Model/EnableApplicantStatusResponse.md)
- [EnableApplicantStatusResponseOneOf](docs/Model/EnableApplicantStatusResponseOneOf.md)
- [EnrolledBenefitWidgetDataObject](docs/Model/EnrolledBenefitWidgetDataObject.md)
- [EnrollmentElection](docs/Model/EnrollmentElection.md)
- [EnrollmentInfo](docs/Model/EnrollmentInfo.md)
- [EnrollmentWindow](docs/Model/EnrollmentWindow.md)
- [EnrollmentWindowCreateRequest](docs/Model/EnrollmentWindowCreateRequest.md)
- [EnrollmentWindowUpdateRequest](docs/Model/EnrollmentWindowUpdateRequest.md)
- [EntityBeneficiaryInformation](docs/Model/EntityBeneficiaryInformation.md)
- [ErrorAttributes](docs/Model/ErrorAttributes.md)
- [ErrorDataContract](docs/Model/ErrorDataContract.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [ErrorResponseError](docs/Model/ErrorResponseError.md)
- [EsignatureActiveEsignatureTemplateSchema](docs/Model/EsignatureActiveEsignatureTemplateSchema.md)
- [EsignatureCreateEsignatureTemplateFieldSchema](docs/Model/EsignatureCreateEsignatureTemplateFieldSchema.md)
- [EsignatureCreateEsignatureTemplateStepSchema](docs/Model/EsignatureCreateEsignatureTemplateStepSchema.md)
- [EsignatureEsignatureAssigneeTransformer](docs/Model/EsignatureEsignatureAssigneeTransformer.md)
- [EsignatureEsignatureAssigneeTransformerTransformedEsignatureAssigneesInner](docs/Model/EsignatureEsignatureAssigneeTransformerTransformedEsignatureAssigneesInner.md)
- [EsignatureEsignatureEmployeeFileSectionSchema](docs/Model/EsignatureEsignatureEmployeeFileSectionSchema.md)
- [EsignatureEsignatureFileSchema](docs/Model/EsignatureEsignatureFileSchema.md)
- [EsignatureEsignatureFileSummarySchema](docs/Model/EsignatureEsignatureFileSummarySchema.md)
- [EsignatureEsignaturePersonSchema](docs/Model/EsignatureEsignaturePersonSchema.md)
- [EsignatureEsignatureTemplateFieldSchema](docs/Model/EsignatureEsignatureTemplateFieldSchema.md)
- [EsignatureEsignatureTemplateSchema](docs/Model/EsignatureEsignatureTemplateSchema.md)
- [EsignatureEsignatureTemplateStepSchema](docs/Model/EsignatureEsignatureTemplateStepSchema.md)
- [EsignatureEsignatureTemplateSummarySchema](docs/Model/EsignatureEsignatureTemplateSummarySchema.md)
- [EsignatureEsignatureTemplatingFieldsMetaSchema](docs/Model/EsignatureEsignatureTemplatingFieldsMetaSchema.md)
- [EsignatureEsignatureTemplatingFieldsMetaSchemaEmployeeTabsInner](docs/Model/EsignatureEsignatureTemplatingFieldsMetaSchemaEmployeeTabsInner.md)
- [EsignatureEsignatureTemplatingFieldsMetaSchemaParentFieldsInner](docs/Model/EsignatureEsignatureTemplatingFieldsMetaSchemaParentFieldsInner.md)
- [EsignatureEsignatureTemplatingFieldsResultSchema](docs/Model/EsignatureEsignatureTemplatingFieldsResultSchema.md)
- [EsignatureEsignatureTemplatingFieldsResultSchemaEmployeeFieldsInner](docs/Model/EsignatureEsignatureTemplatingFieldsResultSchemaEmployeeFieldsInner.md)
- [EsignatureEsignatureTemplatingFieldsResultSchemaStandardFieldsInner](docs/Model/EsignatureEsignatureTemplatingFieldsResultSchemaStandardFieldsInner.md)
- [EsignatureInstanceFieldSchema](docs/Model/EsignatureInstanceFieldSchema.md)
- [EsignatureInstanceSchema](docs/Model/EsignatureInstanceSchema.md)
- [EsignatureInstanceStepSchema](docs/Model/EsignatureInstanceStepSchema.md)
- [EsignatureInstanceStepSummarySchema](docs/Model/EsignatureInstanceStepSummarySchema.md)
- [EsignatureInstanceSummarySchema](docs/Model/EsignatureInstanceSummarySchema.md)
- [ExcludedEmployeeHoursTransformerV2](docs/Model/ExcludedEmployeeHoursTransformerV2.md)
- [ExcludedEmployeeTransformerV2](docs/Model/ExcludedEmployeeTransformerV2.md)
- [ExemptedBusinessesTransformer](docs/Model/ExemptedBusinessesTransformer.md)
- [ExistingEligibilityGroup](docs/Model/ExistingEligibilityGroup.md)
- [F54bcaec6771b1264671e53f2e557b1f201Response](docs/Model/F54bcaec6771b1264671e53f2e557b1f201Response.md)
- [F54bcaec6771b1264671e53f2e557b1f201ResponseResponse](docs/Model/F54bcaec6771b1264671e53f2e557b1f201ResponseResponse.md)
- [F7dd45b1747b0b72c4b617845b065a07Request](docs/Model/F7dd45b1747b0b72c4b617845b065a07Request.md)
- [F7dd45b1747b0b72c4b617845b065a07RequestTasksInner](docs/Model/F7dd45b1747b0b72c4b617845b065a07RequestTasksInner.md)
- [FeedDataObject](docs/Model/FeedDataObject.md)
- [FeedbackAssignmentViewObject](docs/Model/FeedbackAssignmentViewObject.md)
- [FeedbackSettingsRequestObject](docs/Model/FeedbackSettingsRequestObject.md)
- [Field](docs/Model/Field.md)
- [FieldFormNode](docs/Model/FieldFormNode.md)
- [FieldFormNodeAllOfValue](docs/Model/FieldFormNodeAllOfValue.md)
- [FieldMetaDataObject](docs/Model/FieldMetaDataObject.md)
- [FieldOptionsTransformer](docs/Model/FieldOptionsTransformer.md)
- [FieldSetFormNode](docs/Model/FieldSetFormNode.md)
- [FileExportFileExportRequestDataObjectResponse](docs/Model/FileExportFileExportRequestDataObjectResponse.md)
- [FileListGetResponseContract](docs/Model/FileListGetResponseContract.md)
- [FileSummaryDataObject](docs/Model/FileSummaryDataObject.md)
- [Filters](docs/Model/Filters.md)
- [FinalApproverDataObject](docs/Model/FinalApproverDataObject.md)
- [FirstOfMonthFollowingWaitingPeriodNewHireAutomationSetting](docs/Model/FirstOfMonthFollowingWaitingPeriodNewHireAutomationSetting.md)
- [FirstPaymentInfoResponse](docs/Model/FirstPaymentInfoResponse.md)
- [FixedAmountCoverage](docs/Model/FixedAmountCoverage.md)
- [FixedAmountCoverageEmployee](docs/Model/FixedAmountCoverageEmployee.md)
- [FixedAmountWrapper](docs/Model/FixedAmountWrapper.md)
- [FolderReport](docs/Model/FolderReport.md)
- [FolderReportCollection](docs/Model/FolderReportCollection.md)
- [FormLayoutNode](docs/Model/FormLayoutNode.md)
- [FormOrchestrationNode](docs/Model/FormOrchestrationNode.md)
- [FormResponse](docs/Model/FormResponse.md)
- [FormResponseModelValue](docs/Model/FormResponseModelValue.md)
- [FormatWhosOutEventsResponseInner](docs/Model/FormatWhosOutEventsResponseInner.md)
- [FrequencyOption](docs/Model/FrequencyOption.md)
- [FutureBalanceResponseInner](docs/Model/FutureBalanceResponseInner.md)
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
- [GetClientEmployeesResponse](docs/Model/GetClientEmployeesResponse.md)
- [GetClientEmployeesResponseEmployeesInner](docs/Model/GetClientEmployeesResponseEmployeesInner.md)
- [GetCompanyInformation200Response](docs/Model/GetCompanyInformation200Response.md)
- [GetCompanyInformation200ResponseAddress](docs/Model/GetCompanyInformation200ResponseAddress.md)
- [GetCompanyLocations200ResponseInner](docs/Model/GetCompanyLocations200ResponseInner.md)
- [GetCustomerOnboardingContact](docs/Model/GetCustomerOnboardingContact.md)
- [GetCustomerOnboardingContactsTransformer](docs/Model/GetCustomerOnboardingContactsTransformer.md)
- [GetEmployee200Response](docs/Model/GetEmployee200Response.md)
- [GetEmployeePayCycles](docs/Model/GetEmployeePayCycles.md)
- [GetEmployeePayCyclesTransformInner](docs/Model/GetEmployeePayCyclesTransformInner.md)
- [GetEmployeePayScheduleTransformInner](docs/Model/GetEmployeePayScheduleTransformInner.md)
- [GetEmployeePayTypesInner](docs/Model/GetEmployeePayTypesInner.md)
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
- [GetPayCycleDeductionSummaryResponse](docs/Model/GetPayCycleDeductionSummaryResponse.md)
- [GetPayrollContactConfirmedTransformer](docs/Model/GetPayrollContactConfirmedTransformer.md)
- [GetPayrollContactsTransformerInner](docs/Model/GetPayrollContactsTransformerInner.md)
- [GetToKnowYouEmailTemplateDataObject](docs/Model/GetToKnowYouEmailTemplateDataObject.md)
- [GetToKnowYouQuestionsAndResponsesSchema](docs/Model/GetToKnowYouQuestionsAndResponsesSchema.md)
- [GetWebhookList200Response](docs/Model/GetWebhookList200Response.md)
- [GetWebhookList200ResponseWebhooksInner](docs/Model/GetWebhookList200ResponseWebhooksInner.md)
- [GlobalWebHookRequestObject](docs/Model/GlobalWebHookRequestObject.md)
- [GlobalWebhookDataObject](docs/Model/GlobalWebhookDataObject.md)
- [Goal](docs/Model/Goal.md)
- [GoalFiltersV1](docs/Model/GoalFiltersV1.md)
- [GoalFiltersV11](docs/Model/GoalFiltersV11.md)
- [GoalFiltersV11FiltersInner](docs/Model/GoalFiltersV11FiltersInner.md)
- [GoalFiltersV11FiltersInnerActions](docs/Model/GoalFiltersV11FiltersInnerActions.md)
- [GoalFiltersV1FiltersInner](docs/Model/GoalFiltersV1FiltersInner.md)
- [GoalSharedEmployeeViewObject](docs/Model/GoalSharedEmployeeViewObject.md)
- [GoalsWidget](docs/Model/GoalsWidget.md)
- [GoalsWidgetItem](docs/Model/GoalsWidgetItem.md)
- [GroupedApprovalFlowsViewObject](docs/Model/GroupedApprovalFlowsViewObject.md)
- [GroupedDataCollection](docs/Model/GroupedDataCollection.md)
- [HighestPriorityCurrentTaxSetupStatusViewObject](docs/Model/HighestPriorityCurrentTaxSetupStatusViewObject.md)
- [HighestPriorityCurrentTaxSetupStatusViewObjectTaxType](docs/Model/HighestPriorityCurrentTaxSetupStatusViewObjectTaxType.md)
- [HireDateNewHireAutomationSetting](docs/Model/HireDateNewHireAutomationSetting.md)
- [HiringLead](docs/Model/HiringLead.md)
- [HistoryTableControlFormNode](docs/Model/HistoryTableControlFormNode.md)
- [HistoryTableControlFormNodeAllOfCells](docs/Model/HistoryTableControlFormNodeAllOfCells.md)
- [HistoryTableControlFormNodeAllOfColumns](docs/Model/HistoryTableControlFormNodeAllOfColumns.md)
- [HistoryTableControlFormNodeAllOfGroups](docs/Model/HistoryTableControlFormNodeAllOfGroups.md)
- [HistoryTableControlFormNodeAllOfRows](docs/Model/HistoryTableControlFormNodeAllOfRows.md)
- [HistoryTableDataTransformer](docs/Model/HistoryTableDataTransformer.md)
- [HistoryTableJsonData](docs/Model/HistoryTableJsonData.md)
- [HistoryTableJsonDataRowsInner](docs/Model/HistoryTableJsonDataRowsInner.md)
- [HolidaysTransformer](docs/Model/HolidaysTransformer.md)
- [HolidaysTransformerHolidaysInner](docs/Model/HolidaysTransformerHolidaysInner.md)
- [HomeSummaryCalendarData](docs/Model/HomeSummaryCalendarData.md)
- [HomeSummaryCalendarDataCalendar](docs/Model/HomeSummaryCalendarDataCalendar.md)
- [HomeSummaryCalendarDataCalendarAnniversaries](docs/Model/HomeSummaryCalendarDataCalendarAnniversaries.md)
- [HomeSummaryCalendarDataCalendarAnniversariesEventsInner](docs/Model/HomeSummaryCalendarDataCalendarAnniversariesEventsInner.md)
- [HomeSummaryCalendarDataCalendarBirthdays](docs/Model/HomeSummaryCalendarDataCalendarBirthdays.md)
- [HomeSummaryCalendarDataCalendarBirthdaysEventsInner](docs/Model/HomeSummaryCalendarDataCalendarBirthdaysEventsInner.md)
- [HomeSummaryCalendarDataCalendarHolidays](docs/Model/HomeSummaryCalendarDataCalendarHolidays.md)
- [HomeSummaryCalendarDataCalendarHolidaysEventsInner](docs/Model/HomeSummaryCalendarDataCalendarHolidaysEventsInner.md)
- [HomeSummaryCalendarDataCalendarWhosOut](docs/Model/HomeSummaryCalendarDataCalendarWhosOut.md)
- [HomeSummaryCalendarDataCalendarWhosOutEventsInner](docs/Model/HomeSummaryCalendarDataCalendarWhosOutEventsInner.md)
- [HoneyDeleteCommentLikeResponse](docs/Model/HoneyDeleteCommentLikeResponse.md)
- [HoneyDeleteCommentResponse](docs/Model/HoneyDeleteCommentResponse.md)
- [HoneyDeletePostLikeResponse](docs/Model/HoneyDeletePostLikeResponse.md)
- [HoneyGroupDataObject](docs/Model/HoneyGroupDataObject.md)
- [HoneyLikeCommentResponse](docs/Model/HoneyLikeCommentResponse.md)
- [HoneyLikePostResponse](docs/Model/HoneyLikePostResponse.md)
- [HoneyPollDataObject](docs/Model/HoneyPollDataObject.md)
- [HoneyPollDataObjectCreatedAt](docs/Model/HoneyPollDataObjectCreatedAt.md)
- [HoneyPollDataObjectOptionsInner](docs/Model/HoneyPollDataObjectOptionsInner.md)
- [HoneyPollDataObjectResultsAt](docs/Model/HoneyPollDataObjectResultsAt.md)
- [HoneyPostCommentDataObject](docs/Model/HoneyPostCommentDataObject.md)
- [HoneyPostCommentDataObjectFilesInner](docs/Model/HoneyPostCommentDataObjectFilesInner.md)
- [HoneyPostDataObject](docs/Model/HoneyPostDataObject.md)
- [HoneyPostDataObjectAnnouncedAt](docs/Model/HoneyPostDataObjectAnnouncedAt.md)
- [HoneyPostDataObjectPublishAt](docs/Model/HoneyPostDataObjectPublishAt.md)
- [HourEntryApiTransformer](docs/Model/HourEntryApiTransformer.md)
- [ImplementationGuideServiceRequestDataObject](docs/Model/ImplementationGuideServiceRequestDataObject.md)
- [InactiveTerminatedModal](docs/Model/InactiveTerminatedModal.md)
- [InactiveTerminatedModalEmployee](docs/Model/InactiveTerminatedModalEmployee.md)
- [InactiveTerminatedModalFields](docs/Model/InactiveTerminatedModalFields.md)
- [InactiveTerminatedModalFieldsBenetracStatus](docs/Model/InactiveTerminatedModalFieldsBenetracStatus.md)
- [InactiveTerminatedModalFieldsBenetracStatusItemsInner](docs/Model/InactiveTerminatedModalFieldsBenetracStatusItemsInner.md)
- [InactiveTerminatedModalFieldsRehire](docs/Model/InactiveTerminatedModalFieldsRehire.md)
- [InactiveTerminatedModalFieldsRehireItemsInner](docs/Model/InactiveTerminatedModalFieldsRehireItemsInner.md)
- [InactiveTerminatedModalFieldsTermReason](docs/Model/InactiveTerminatedModalFieldsTermReason.md)
- [InactiveTerminatedModalFieldsTermReasonItemsInner](docs/Model/InactiveTerminatedModalFieldsTermReasonItemsInner.md)
- [InactiveTerminatedModalFieldsTermType](docs/Model/InactiveTerminatedModalFieldsTermType.md)
- [InactiveTerminatedModalFieldsTermTypeItemsInner](docs/Model/InactiveTerminatedModalFieldsTermTypeItemsInner.md)
- [InboxDetailsWithPersons](docs/Model/InboxDetailsWithPersons.md)
- [InboxDetailsWithPersonsApproverCounts](docs/Model/InboxDetailsWithPersonsApproverCounts.md)
- [InboxDetailsWithPersonsCommentsInner](docs/Model/InboxDetailsWithPersonsCommentsInner.md)
- [InboxDetailsWithPersonsDetailsInner](docs/Model/InboxDetailsWithPersonsDetailsInner.md)
- [InboxDetailsWithPersonsDetailsInnerActionInner](docs/Model/InboxDetailsWithPersonsDetailsInnerActionInner.md)
- [InboxDetailsWithPersonsFilesInner](docs/Model/InboxDetailsWithPersonsFilesInner.md)
- [InboxDetailsWithPersonsPersonsInner](docs/Model/InboxDetailsWithPersonsPersonsInner.md)
- [InboxDetailsWithPersonsStatus](docs/Model/InboxDetailsWithPersonsStatus.md)
- [InboxDetailsWithPersonsType](docs/Model/InboxDetailsWithPersonsType.md)
- [InboxLegacyTask](docs/Model/InboxLegacyTask.md)
- [InboxLegacyTaskUsersInner](docs/Model/InboxLegacyTaskUsersInner.md)
- [IndividualBeneficiaryInformation](docs/Model/IndividualBeneficiaryInformation.md)
- [IndustryResponseDataObject](docs/Model/IndustryResponseDataObject.md)
- [Intervalable](docs/Model/Intervalable.md)
- [InvoiceResponse](docs/Model/InvoiceResponse.md)
- [IsClockedInApiTransformer](docs/Model/IsClockedInApiTransformer.md)
- [IsClockedInApiTransformerAllOfToday](docs/Model/IsClockedInApiTransformerAllOfToday.md)
- [JsonSchemaFormOutput](docs/Model/JsonSchemaFormOutput.md)
- [LegalText](docs/Model/LegalText.md)
- [LevelsAndBandsColumnMap](docs/Model/LevelsAndBandsColumnMap.md)
- [LevelsAndBandsCompPlanningEmployee](docs/Model/LevelsAndBandsCompPlanningEmployee.md)
- [LevelsAndBandsCompPlanningLevel](docs/Model/LevelsAndBandsCompPlanningLevel.md)
- [LevelsAndBandsCompensationHistory](docs/Model/LevelsAndBandsCompensationHistory.md)
- [LevelsAndBandsCompensationLevel](docs/Model/LevelsAndBandsCompensationLevel.md)
- [LevelsAndBandsCompensationLevelGroup](docs/Model/LevelsAndBandsCompensationLevelGroup.md)
- [LevelsAndBandsEmployee](docs/Model/LevelsAndBandsEmployee.md)
- [LevelsAndBandsEmployeeDetails](docs/Model/LevelsAndBandsEmployeeDetails.md)
- [LevelsAndBandsGroupStatusCounts](docs/Model/LevelsAndBandsGroupStatusCounts.md)
- [LevelsAndBandsJobTitle](docs/Model/LevelsAndBandsJobTitle.md)
- [LevelsAndBandsJobTitleWithEmployees](docs/Model/LevelsAndBandsJobTitleWithEmployees.md)
- [LevelsAndBandsLocation](docs/Model/LevelsAndBandsLocation.md)
- [LevelsAndBandsSettings](docs/Model/LevelsAndBandsSettings.md)
- [LevelsAndBandsUploadResponse](docs/Model/LevelsAndBandsUploadResponse.md)
- [LimitedApplicationDataObject](docs/Model/LimitedApplicationDataObject.md)
- [ListEmployeeTrainings200ResponseInner](docs/Model/ListEmployeeTrainings200ResponseInner.md)
- [ListFieldValues](docs/Model/ListFieldValues.md)
- [ListFieldValuesOptionsInner](docs/Model/ListFieldValuesOptionsInner.md)
- [ListTabsViewObject](docs/Model/ListTabsViewObject.md)
- [ListTrainingCategories200ResponseInner](docs/Model/ListTrainingCategories200ResponseInner.md)
- [ListTrainingTypes200ResponseInner](docs/Model/ListTrainingTypes200ResponseInner.md)
- [ListValueSchema](docs/Model/ListValueSchema.md)
- [ListValuesCustomFieldSettingsTransformerInner](docs/Model/ListValuesCustomFieldSettingsTransformerInner.md)
- [Location](docs/Model/Location.md)
- [LogEmbedLoadTimeRequest](docs/Model/LogEmbedLoadTimeRequest.md)
- [ManageSubscriptionResponse](docs/Model/ManageSubscriptionResponse.md)
- [ManageSubscriptionResponseIntegrationExpansionsInner](docs/Model/ManageSubscriptionResponseIntegrationExpansionsInner.md)
- [ManageSubscriptionResponseIntegrationExpansionsInnerDemoData](docs/Model/ManageSubscriptionResponseIntegrationExpansionsInnerDemoData.md)
- [ManageSubscriptionResponseIntegrationsInner](docs/Model/ManageSubscriptionResponseIntegrationsInner.md)
- [ManualNewHireAutomationSetting](docs/Model/ManualNewHireAutomationSetting.md)
- [ManuallyEligibleGetResponse](docs/Model/ManuallyEligibleGetResponse.md)
- [MemberBenefitEvent](docs/Model/MemberBenefitEvent.md)
- [MemberBenefitEventMembersInner](docs/Model/MemberBenefitEventMembersInner.md)
- [MemberBenefitEventMembersInnerCoveragesInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInner.md)
- [MemberBenefitEventMembersInnerCoveragesInnerEventsInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInnerEventsInner.md)
- [MergeWebhookHookDataObject](docs/Model/MergeWebhookHookDataObject.md)
- [MergeWebhookPayloadDataObject](docs/Model/MergeWebhookPayloadDataObject.md)
- [MigrationsNeededContract](docs/Model/MigrationsNeededContract.md)
- [NHPEmployeeNewHirePacketCompletedQuestionAndResponseSchema](docs/Model/NHPEmployeeNewHirePacketCompletedQuestionAndResponseSchema.md)
- [NHPEmployeeNewHirePacketContactCardDataTransferObject](docs/Model/NHPEmployeeNewHirePacketContactCardDataTransferObject.md)
- [NHPEmployeeNewHirePacketContactCardSocialItemDataTransferObject](docs/Model/NHPEmployeeNewHirePacketContactCardSocialItemDataTransferObject.md)
- [NHPEmployeeNewHirePacketDataObject](docs/Model/NHPEmployeeNewHirePacketDataObject.md)
- [NHPEmployeeNewHirePacketRecipientDataObject](docs/Model/NHPEmployeeNewHirePacketRecipientDataObject.md)
- [NHPEmployeeNewHirePacketWithTasks](docs/Model/NHPEmployeeNewHirePacketWithTasks.md)
- [NHPGetToKnowYouEmailDataObject](docs/Model/NHPGetToKnowYouEmailDataObject.md)
- [NHPGtkyQuestionsAndAnswersSchema](docs/Model/NHPGtkyQuestionsAndAnswersSchema.md)
- [NHPNewHireGtkySchema](docs/Model/NHPNewHireGtkySchema.md)
- [NHPNewHirePacketEmployeeData](docs/Model/NHPNewHirePacketEmployeeData.md)
- [NHPNewHirePacketInstanceDataObject](docs/Model/NHPNewHirePacketInstanceDataObject.md)
- [NHPNewHirePacketRequestSchema](docs/Model/NHPNewHirePacketRequestSchema.md)
- [NHPNewHirePacketRequestSchemaNewHirePacketDataInner](docs/Model/NHPNewHirePacketRequestSchemaNewHirePacketDataInner.md)
- [NHPNewHirePacketRequestSchemaNewHirePacketDataInnerEmployeeInner](docs/Model/NHPNewHirePacketRequestSchemaNewHirePacketDataInnerEmployeeInner.md)
- [NHPNewHirePacketRequestSchemaNewHirePacketDataInnerNewHirePacketInner](docs/Model/NHPNewHirePacketRequestSchemaNewHirePacketDataInnerNewHirePacketInner.md)
- [NHPNewHirePacketRequestSchemaNewHirePacketDataInnerQuestionsAndAnswersInner](docs/Model/NHPNewHirePacketRequestSchemaNewHirePacketDataInnerQuestionsAndAnswersInner.md)
- [NHPNewHirePacketTasksAttachmentsRequestSchema](docs/Model/NHPNewHirePacketTasksAttachmentsRequestSchema.md)
- [NHPNewHirePacketTasksRequestSchema](docs/Model/NHPNewHirePacketTasksRequestSchema.md)
- [NHPPayrollFieldsSchema](docs/Model/NHPPayrollFieldsSchema.md)
- [NamedPlanUrl](docs/Model/NamedPlanUrl.md)
- [NavigationGroupDataObject](docs/Model/NavigationGroupDataObject.md)
- [NavigationMenuItemDataObject](docs/Model/NavigationMenuItemDataObject.md)
- [NewEligibilityGroup](docs/Model/NewEligibilityGroup.md)
- [NewHireAutomationSettingLike](docs/Model/NewHireAutomationSettingLike.md)
- [NewHirePacketEmployeeOptions](docs/Model/NewHirePacketEmployeeOptions.md)
- [NewHirePacketEmployeeOptionsUsersValue](docs/Model/NewHirePacketEmployeeOptionsUsersValue.md)
- [NewHirePacketListValue](docs/Model/NewHirePacketListValue.md)
- [NewHirePacketListValuesSchema](docs/Model/NewHirePacketListValuesSchema.md)
- [NewHirePacketTemplate](docs/Model/NewHirePacketTemplate.md)
- [NewHirePacketTemplateField](docs/Model/NewHirePacketTemplateField.md)
- [NewHirePacketTemplateGetToKnowYouQuestion](docs/Model/NewHirePacketTemplateGetToKnowYouQuestion.md)
- [NewHirePacketTemplateGetToKnowYouRecipient](docs/Model/NewHirePacketTemplateGetToKnowYouRecipient.md)
- [NewWebHook](docs/Model/NewWebHook.md)
- [NewWebHookFrequency](docs/Model/NewWebHookFrequency.md)
- [NewWebHookLimit](docs/Model/NewWebHookLimit.md)
- [OfferLetterTemplateArrayWithLanguage](docs/Model/OfferLetterTemplateArrayWithLanguage.md)
- [OfferLetterTemplateArrayWithLanguageFilesInner](docs/Model/OfferLetterTemplateArrayWithLanguageFilesInner.md)
- [OfferLetterTemplateArrayWithLanguageFilesInnerEsignatures](docs/Model/OfferLetterTemplateArrayWithLanguageFilesInnerEsignatures.md)
- [OfferLetterTemplateArrayWithLanguageFilesInnerImgSizes](docs/Model/OfferLetterTemplateArrayWithLanguageFilesInnerImgSizes.md)
- [OnboardingGetToKnowYouQuestionModal](docs/Model/OnboardingGetToKnowYouQuestionModal.md)
- [OnboardingSimpleQuestionAndResponseDataObject](docs/Model/OnboardingSimpleQuestionAndResponseDataObject.md)
- [OneOnOneAgendaItemCollection](docs/Model/OneOnOneAgendaItemCollection.md)
- [OneOnOneAgendaItemDataObject](docs/Model/OneOnOneAgendaItemDataObject.md)
- [OneOnOneChannelEventsViewObject](docs/Model/OneOnOneChannelEventsViewObject.md)
- [OneOnOneChannelEventsViewObjectCollection](docs/Model/OneOnOneChannelEventsViewObjectCollection.md)
- [OneOnOneConfigurationContractObject](docs/Model/OneOnOneConfigurationContractObject.md)
- [OneOnOneDataViewObject](docs/Model/OneOnOneDataViewObject.md)
- [OneOnOneDataViewObjectOneOnOneData](docs/Model/OneOnOneDataViewObjectOneOnOneData.md)
- [OneOnOneEmployeeDataViewObject](docs/Model/OneOnOneEmployeeDataViewObject.md)
- [OneOnOneNoteViewObject](docs/Model/OneOnOneNoteViewObject.md)
- [OneOnOneNotesViewObject](docs/Model/OneOnOneNotesViewObject.md)
- [OneOnOneNotesViewObjectNotes](docs/Model/OneOnOneNotesViewObjectNotes.md)
- [OneOnOnePageDataViewObject](docs/Model/OneOnOnePageDataViewObject.md)
- [OneOnOnePageDataViewObjectPageData](docs/Model/OneOnOnePageDataViewObjectPageData.md)
- [OneOnOneRecordViewObject](docs/Model/OneOnOneRecordViewObject.md)
- [OneOnOneTabViewObject](docs/Model/OneOnOneTabViewObject.md)
- [OneOnOnesConfiguration](docs/Model/OneOnOnesConfiguration.md)
- [OneOnOnesRequestSecureFileDownloadViewObject](docs/Model/OneOnOnesRequestSecureFileDownloadViewObject.md)
- [OptionsDeductionDateRule](docs/Model/OptionsDeductionDateRule.md)
- [PackageInfoResponse](docs/Model/PackageInfoResponse.md)
- [PackageInfoResponseAddOns](docs/Model/PackageInfoResponseAddOns.md)
- [PackageInfoResponseAddOnsPayroll](docs/Model/PackageInfoResponseAddOnsPayroll.md)
- [PackageUpgradeDetailsResponse](docs/Model/PackageUpgradeDetailsResponse.md)
- [PackageUpgradeDetailsResponseLastInvoice](docs/Model/PackageUpgradeDetailsResponseLastInvoice.md)
- [PackageUpgradeDetailsResponsePrepaySummary](docs/Model/PackageUpgradeDetailsResponsePrepaySummary.md)
- [PackageUpgradeDetailsResponseProductEstimationsInner](docs/Model/PackageUpgradeDetailsResponseProductEstimationsInner.md)
- [PackageUpgradeDetailsResponseProductEstimationsInnerCreditsInner](docs/Model/PackageUpgradeDetailsResponseProductEstimationsInnerCreditsInner.md)
- [PackageUpgradeEstimateResponse](docs/Model/PackageUpgradeEstimateResponse.md)
- [PackageUpgradeEstimateResponseProductsInner](docs/Model/PackageUpgradeEstimateResponseProductsInner.md)
- [PaginatedHistoryRequestsResponseInner](docs/Model/PaginatedHistoryRequestsResponseInner.md)
- [PaginatedHistoryRequestsResponseInnerPaginationInner](docs/Model/PaginatedHistoryRequestsResponseInnerPaginationInner.md)
- [PaginatedTableTransformer](docs/Model/PaginatedTableTransformer.md)
- [PaginatedTableTransformerFieldsInner](docs/Model/PaginatedTableTransformerFieldsInner.md)
- [PaginatedTableTransformerFieldsInnerContent](docs/Model/PaginatedTableTransformerFieldsInnerContent.md)
- [Pagination](docs/Model/Pagination.md)
- [PanelRequest](docs/Model/PanelRequest.md)
- [PastDueInvoiceListResponse](docs/Model/PastDueInvoiceListResponse.md)
- [PastDueInvoiceListResponseInvoicesInner](docs/Model/PastDueInvoiceListResponseInvoicesInner.md)
- [PayCycleDeductionDataObject](docs/Model/PayCycleDeductionDataObject.md)
- [PayCycleDeductionGlobalOverride](docs/Model/PayCycleDeductionGlobalOverride.md)
- [PayCycleDeductionGlobalOverrides](docs/Model/PayCycleDeductionGlobalOverrides.md)
- [PayCycleEmployeeCheck](docs/Model/PayCycleEmployeeCheck.md)
- [PayCycleEmployeeDataObjectCollectionInner](docs/Model/PayCycleEmployeeDataObjectCollectionInner.md)
- [PayCycleEmployeeDataObjectCollectionInnerEmployeePayCycleMetaData](docs/Model/PayCycleEmployeeDataObjectCollectionInnerEmployeePayCycleMetaData.md)
- [PayCycleEmployeeDataObjectCollectionInnerEmployeePayrollReady](docs/Model/PayCycleEmployeeDataObjectCollectionInnerEmployeePayrollReady.md)
- [PayCycleEmployeeDataObjectCollectionInnerWage](docs/Model/PayCycleEmployeeDataObjectCollectionInnerWage.md)
- [PayCycleEmployeeDeductionTransformer](docs/Model/PayCycleEmployeeDeductionTransformer.md)
- [PayCycleEmployeeDeductionsCollectionTransformer](docs/Model/PayCycleEmployeeDeductionsCollectionTransformer.md)
- [PayCycleEmployeeOtherWageDataObjectTransformer](docs/Model/PayCycleEmployeeOtherWageDataObjectTransformer.md)
- [PayCycleEmployeeOvertimeWageDataObjectTransformer](docs/Model/PayCycleEmployeeOvertimeWageDataObjectTransformer.md)
- [PayCycleEmployeePayCheckTaxesTransformer](docs/Model/PayCycleEmployeePayCheckTaxesTransformer.md)
- [PayCycleEmployeePayCheckTaxesTransformerFederal](docs/Model/PayCycleEmployeePayCheckTaxesTransformerFederal.md)
- [PayCycleEmployeePayCheckTaxesTransformerState](docs/Model/PayCycleEmployeePayCheckTaxesTransformerState.md)
- [PayCycleEmployeePayCheckTaxesTransformerStateAdditionalWithholding](docs/Model/PayCycleEmployeePayCheckTaxesTransformerStateAdditionalWithholding.md)
- [PayCycleEmployeePayCheckTaxesTransformerStateUi](docs/Model/PayCycleEmployeePayCheckTaxesTransformerStateUi.md)
- [PayCycleEmployeeRegularWageDataObjectTransformer](docs/Model/PayCycleEmployeeRegularWageDataObjectTransformer.md)
- [PayCycleEmployeeTimeOffUsedTransformer](docs/Model/PayCycleEmployeeTimeOffUsedTransformer.md)
- [PayCycleEmployeeTransformer](docs/Model/PayCycleEmployeeTransformer.md)
- [PayCycleEmployeeWageTransformer](docs/Model/PayCycleEmployeeWageTransformer.md)
- [PayCycleGlobalOverrideStateTax](docs/Model/PayCycleGlobalOverrideStateTax.md)
- [PayCycleGlobalOverridesRequest](docs/Model/PayCycleGlobalOverridesRequest.md)
- [PayCycleGlobalOverridesSettingsDataObject](docs/Model/PayCycleGlobalOverridesSettingsDataObject.md)
- [PayCycleHoliday](docs/Model/PayCycleHoliday.md)
- [PayCycleHolidays](docs/Model/PayCycleHolidays.md)
- [PayCycleResetEmployeePayrollDataTransformer](docs/Model/PayCycleResetEmployeePayrollDataTransformer.md)
- [PaySchedule](docs/Model/PaySchedule.md)
- [PayScheduleDataObject](docs/Model/PayScheduleDataObject.md)
- [PayScheduleDataObjectExternalCompanyId](docs/Model/PayScheduleDataObjectExternalCompanyId.md)
- [PayScheduleDataObjectExternalPayScheduleId](docs/Model/PayScheduleDataObjectExternalPayScheduleId.md)
- [PayScheduleDataObjectIncludeInPayroll](docs/Model/PayScheduleDataObjectIncludeInPayroll.md)
- [PayStubCheckTransformer](docs/Model/PayStubCheckTransformer.md)
- [PayStubCheckTransformerEmployeeDeductionsInner](docs/Model/PayStubCheckTransformerEmployeeDeductionsInner.md)
- [PayStubCheckTransformerFunFact](docs/Model/PayStubCheckTransformerFunFact.md)
- [PayStubCheckTransformerNotesInner](docs/Model/PayStubCheckTransformerNotesInner.md)
- [PayStubCheckTransformerPaymentsInner](docs/Model/PayStubCheckTransformerPaymentsInner.md)
- [PayStubCheckTransformerTaxSettings](docs/Model/PayStubCheckTransformerTaxSettings.md)
- [PayStubCheckTransformerTaxableWagesInner](docs/Model/PayStubCheckTransformerTaxableWagesInner.md)
- [PayStubCheckTransformerTaxesInner](docs/Model/PayStubCheckTransformerTaxesInner.md)
- [PayStubCheckTransformerTimeOffInner](docs/Model/PayStubCheckTransformerTimeOffInner.md)
- [PayStubEmployeeTransformer](docs/Model/PayStubEmployeeTransformer.md)
- [PayStubEmployerTransformer](docs/Model/PayStubEmployerTransformer.md)
- [PayStubPayCycleTransformer](docs/Model/PayStubPayCycleTransformer.md)
- [PayStubTransformer](docs/Model/PayStubTransformer.md)
- [PayStubsListTransformerInner](docs/Model/PayStubsListTransformerInner.md)
- [PaycheckTransformer](docs/Model/PaycheckTransformer.md)
- [PaycheckTransformerTaxes](docs/Model/PaycheckTransformerTaxes.md)
- [PaycheckTransformerTaxesFederal](docs/Model/PaycheckTransformerTaxesFederal.md)
- [PaycheckTransformerTaxesState](docs/Model/PaycheckTransformerTaxesState.md)
- [PaymentInfoResponse](docs/Model/PaymentInfoResponse.md)
- [PaymentInfoResponseAch](docs/Model/PaymentInfoResponseAch.md)
- [PaymentInfoResponseCardOnFile](docs/Model/PaymentInfoResponseCardOnFile.md)
- [PaymentInfoResponseLastPayment](docs/Model/PaymentInfoResponseLastPayment.md)
- [PaymentInfoResponsePaymentMethod](docs/Model/PaymentInfoResponsePaymentMethod.md)
- [PaymentMethodOverviewResponse](docs/Model/PaymentMethodOverviewResponse.md)
- [PayrollBambooHrPayrollSettings](docs/Model/PayrollBambooHrPayrollSettings.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponse](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponse.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInner](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInner.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInnerAddress](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInnerAddress.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInnerCitizenship](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBeneficialOwnersInnerCitizenship.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBusinessStructure](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponseBusinessStructure.md)
- [PayrollBeneficialOwnersControllerBeneficialOwnershipResponseExemptedBusiness](docs/Model/PayrollBeneficialOwnersControllerBeneficialOwnershipResponseExemptedBusiness.md)
- [PayrollContactOptionTransformerInner](docs/Model/PayrollContactOptionTransformerInner.md)
- [PayrollContactViewObject](docs/Model/PayrollContactViewObject.md)
- [PayrollContactsTransformer](docs/Model/PayrollContactsTransformer.md)
- [PayrollContactsTransformerContactsInner](docs/Model/PayrollContactsTransformerContactsInner.md)
- [PayrollDirectDepositApiControllerCreatedOrUpdatedEmployeeDirectDepositAccounts](docs/Model/PayrollDirectDepositApiControllerCreatedOrUpdatedEmployeeDirectDepositAccounts.md)
- [PayrollDirectDepositApiControllerCreatedOrUpdatedEmployeeDirectDepositAccountsAccountsInner](docs/Model/PayrollDirectDepositApiControllerCreatedOrUpdatedEmployeeDirectDepositAccountsAccountsInner.md)
- [PayrollDirectDepositApiControllerDirectDepositAccountNumber](docs/Model/PayrollDirectDepositApiControllerDirectDepositAccountNumber.md)
- [PayrollDirectDepositApiControllerDirectDepositReviewValue](docs/Model/PayrollDirectDepositApiControllerDirectDepositReviewValue.md)
- [PayrollDirectDepositApiControllerDirectDepositValidationErrors](docs/Model/PayrollDirectDepositApiControllerDirectDepositValidationErrors.md)
- [PayrollDirectDepositApiControllerDirectDepositValidationErrorsAccountErrorsValue](docs/Model/PayrollDirectDepositApiControllerDirectDepositValidationErrorsAccountErrorsValue.md)
- [PayrollDirectDepositApiControllerEmployeeDirectDepositAccounts](docs/Model/PayrollDirectDepositApiControllerEmployeeDirectDepositAccounts.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositData](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositData.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositDataDataInner](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositDataDataInner.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositDataErrorsInner](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositDataErrorsInner.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositImporterSubmit](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositImporterSubmit.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositImporterSubmitValidationErrorsInner](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositImporterSubmitValidationErrorsInner.md)
- [PayrollDirectDepositImporterApiControllerDirectDepositImporterValidation](docs/Model/PayrollDirectDepositImporterApiControllerDirectDepositImporterValidation.md)
- [PayrollDirectDepositImporterApiControllerSearchEmployees](docs/Model/PayrollDirectDepositImporterApiControllerSearchEmployees.md)
- [PayrollDirectDepositImporterApiControllerSearchEmployeesEmployeesInner](docs/Model/PayrollDirectDepositImporterApiControllerSearchEmployeesEmployeesInner.md)
- [PayrollDirectDepositImporterApiControllerUploadDirectDeposit](docs/Model/PayrollDirectDepositImporterApiControllerUploadDirectDeposit.md)
- [PayrollDirectDepositImporterApiControllerUploadDirectDepositColumnMap](docs/Model/PayrollDirectDepositImporterApiControllerUploadDirectDepositColumnMap.md)
- [PayrollDirectDepositImporterApiControllerUploadDirectDepositColumnsInner](docs/Model/PayrollDirectDepositImporterApiControllerUploadDirectDepositColumnsInner.md)
- [PayrollDirectDepositImporterApiControllerUploadDirectDepositErrorCodeResponse](docs/Model/PayrollDirectDepositImporterApiControllerUploadDirectDepositErrorCodeResponse.md)
- [PayrollDocumentStatusCollectionViewObject](docs/Model/PayrollDocumentStatusCollectionViewObject.md)
- [PayrollDocumentStatusViewObject](docs/Model/PayrollDocumentStatusViewObject.md)
- [PayrollEmployeeChangesInnerInner](docs/Model/PayrollEmployeeChangesInnerInner.md)
- [PayrollEmployeeChangesInnerInnerStatus](docs/Model/PayrollEmployeeChangesInnerInnerStatus.md)
- [PayrollEmployeeCompensationTransformerV2](docs/Model/PayrollEmployeeCompensationTransformerV2.md)
- [PayrollEmployeeDataObject](docs/Model/PayrollEmployeeDataObject.md)
- [PayrollEmployeeTransformerV2](docs/Model/PayrollEmployeeTransformerV2.md)
- [PayrollEmployeeUpdatedHoursTransformerV2Value](docs/Model/PayrollEmployeeUpdatedHoursTransformerV2Value.md)
- [PayrollEmployeeUpdatedHoursTransformerV2ValueOneOfInner](docs/Model/PayrollEmployeeUpdatedHoursTransformerV2ValueOneOfInner.md)
- [PayrollEmployeesFilterData](docs/Model/PayrollEmployeesFilterData.md)
- [PayrollEmployeesUpdatedHoursTransformerV2Inner](docs/Model/PayrollEmployeesUpdatedHoursTransformerV2Inner.md)
- [PayrollErrorExceptionTransformer](docs/Model/PayrollErrorExceptionTransformer.md)
- [PayrollErrorExceptionTransformerData](docs/Model/PayrollErrorExceptionTransformerData.md)
- [PayrollErrorExceptionTransformerDataEmployeesInner](docs/Model/PayrollErrorExceptionTransformerDataEmployeesInner.md)
- [PayrollExtraPayControllerEmployeeBasicInfo](docs/Model/PayrollExtraPayControllerEmployeeBasicInfo.md)
- [PayrollExtraPayControllerEmployeeExtraPayResponse](docs/Model/PayrollExtraPayControllerEmployeeExtraPayResponse.md)
- [PayrollExtraPayControllerExtraPayEmployee](docs/Model/PayrollExtraPayControllerExtraPayEmployee.md)
- [PayrollExtraPayControllerExtraPayEntry](docs/Model/PayrollExtraPayControllerExtraPayEntry.md)
- [PayrollExtraPayControllerExtraPayImport](docs/Model/PayrollExtraPayControllerExtraPayImport.md)
- [PayrollExtraPayControllerExtraPayPayment](docs/Model/PayrollExtraPayControllerExtraPayPayment.md)
- [PayrollExtraPayControllerGetClientRecurringExtraPayResponse](docs/Model/PayrollExtraPayControllerGetClientRecurringExtraPayResponse.md)
- [PayrollExtraPayControllerGetExtraPayResponse](docs/Model/PayrollExtraPayControllerGetExtraPayResponse.md)
- [PayrollExtraPayControllerGetExtraPayResponsePayTypesValue](docs/Model/PayrollExtraPayControllerGetExtraPayResponsePayTypesValue.md)
- [PayrollExtraPayControllerGetRecurringExtraPayValidationResponse](docs/Model/PayrollExtraPayControllerGetRecurringExtraPayValidationResponse.md)
- [PayrollExtraPayControllerGetRecurringExtraPayValidationResponseEmployeeDataInner](docs/Model/PayrollExtraPayControllerGetRecurringExtraPayValidationResponseEmployeeDataInner.md)
- [PayrollExtraPayControllerGetRecurringExtraPayValidationResponseInvalidFrequencyModifierExtraPayInner](docs/Model/PayrollExtraPayControllerGetRecurringExtraPayValidationResponseInvalidFrequencyModifierExtraPayInner.md)
- [PayrollExtraPayControllerGetRecurringExtraPayValidationResponseInvalidPayTypeExtraPayInner](docs/Model/PayrollExtraPayControllerGetRecurringExtraPayValidationResponseInvalidPayTypeExtraPayInner.md)
- [PayrollExtraPayControllerGetRecurringExtraPayValidationResponsePayTypeDataInner](docs/Model/PayrollExtraPayControllerGetRecurringExtraPayValidationResponsePayTypeDataInner.md)
- [PayrollExtraPayControllerOneTimeExtraPayEntry](docs/Model/PayrollExtraPayControllerOneTimeExtraPayEntry.md)
- [PayrollExtraPayControllerParsedExtraPayEmployee](docs/Model/PayrollExtraPayControllerParsedExtraPayEmployee.md)
- [PayrollExtraPayControllerParsedExtraPayItem](docs/Model/PayrollExtraPayControllerParsedExtraPayItem.md)
- [PayrollExtraPayControllerParsedExtraPayResponse](docs/Model/PayrollExtraPayControllerParsedExtraPayResponse.md)
- [PayrollExtraPayControllerPayTypeData](docs/Model/PayrollExtraPayControllerPayTypeData.md)
- [PayrollExtraPayControllerRecurringExtraPayEntry](docs/Model/PayrollExtraPayControllerRecurringExtraPayEntry.md)
- [PayrollExtraPayControllerRecurringExtraPayItem](docs/Model/PayrollExtraPayControllerRecurringExtraPayItem.md)
- [PayrollHistoryDataObject](docs/Model/PayrollHistoryDataObject.md)
- [PayrollHistoryHistoryDataObject](docs/Model/PayrollHistoryHistoryDataObject.md)
- [PayrollHoursWarningTransformer](docs/Model/PayrollHoursWarningTransformer.md)
- [PayrollHoursWarningsTransformer](docs/Model/PayrollHoursWarningsTransformer.md)
- [PayrollPayCycleApiControllerClientPayCyclesInner](docs/Model/PayrollPayCycleApiControllerClientPayCyclesInner.md)
- [PayrollPayCycleApiControllerEmployeesBeingPaidByPayCycleIdInner](docs/Model/PayrollPayCycleApiControllerEmployeesBeingPaidByPayCycleIdInner.md)
- [PayrollPaySchedulesPaySchedule](docs/Model/PayrollPaySchedulesPaySchedule.md)
- [PayrollPaySchedulesPayScheduleEmployeeCounts](docs/Model/PayrollPaySchedulesPayScheduleEmployeeCounts.md)
- [PayrollPaySchedulesPaySchedulesListValue](docs/Model/PayrollPaySchedulesPaySchedulesListValue.md)
- [PayrollPayrollValidationErrorsControllerValidationErrorDataObject](docs/Model/PayrollPayrollValidationErrorsControllerValidationErrorDataObject.md)
- [PayrollPrePayrollHoursClientJobCategoryDataValue](docs/Model/PayrollPrePayrollHoursClientJobCategoryDataValue.md)
- [PayrollPrePayrollHoursClientJobDataValue](docs/Model/PayrollPrePayrollHoursClientJobDataValue.md)
- [PayrollPrePayrollHoursImportHoursResponse](docs/Model/PayrollPrePayrollHoursImportHoursResponse.md)
- [PayrollPrePayrollHoursImportHoursResponseDataValue](docs/Model/PayrollPrePayrollHoursImportHoursResponseDataValue.md)
- [PayrollPrePayrollHoursImportHoursResponseManagerDataValue](docs/Model/PayrollPrePayrollHoursImportHoursResponseManagerDataValue.md)
- [PayrollPrePayrollHoursPayableHourItem](docs/Model/PayrollPrePayrollHoursPayableHourItem.md)
- [PayrollPrePayrollHoursPayrollHourItem](docs/Model/PayrollPrePayrollHoursPayrollHourItem.md)
- [PayrollPrePayrollHoursShiftDifferentialDataItemValue](docs/Model/PayrollPrePayrollHoursShiftDifferentialDataItemValue.md)
- [PayrollPrePayrollHoursTimeOffItem](docs/Model/PayrollPrePayrollHoursTimeOffItem.md)
- [PayrollPrePayrollHoursTimesheetDataResponse](docs/Model/PayrollPrePayrollHoursTimesheetDataResponse.md)
- [PayrollPrePayrollHoursTimesheetDataResponseApproverEmployeeDataValue](docs/Model/PayrollPrePayrollHoursTimesheetDataResponseApproverEmployeeDataValue.md)
- [PayrollPrePayrollHoursTimesheetDataResponseApproverUserDataValue](docs/Model/PayrollPrePayrollHoursTimesheetDataResponseApproverUserDataValue.md)
- [PayrollPrePayrollHoursTimesheetDataResponseDataValue](docs/Model/PayrollPrePayrollHoursTimesheetDataResponseDataValue.md)
- [PayrollPrePayrollHoursTimesheetHourItem](docs/Model/PayrollPrePayrollHoursTimesheetHourItem.md)
- [PayrollReviewSnapshotTransformer](docs/Model/PayrollReviewSnapshotTransformer.md)
- [PayrollReviewSnapshotTransformerAllOfEmployees](docs/Model/PayrollReviewSnapshotTransformerAllOfEmployees.md)
- [PayrollSnapshotTransformer](docs/Model/PayrollSnapshotTransformer.md)
- [PayrollSnapshotTransformerChecks](docs/Model/PayrollSnapshotTransformerChecks.md)
- [PayrollSnapshotTransformerChecksByIdValue](docs/Model/PayrollSnapshotTransformerChecksByIdValue.md)
- [PayrollSnapshotTransformerEarnings](docs/Model/PayrollSnapshotTransformerEarnings.md)
- [PayrollSnapshotTransformerEarningsByIdValue](docs/Model/PayrollSnapshotTransformerEarningsByIdValue.md)
- [PayrollSnapshotTransformerEmployeeRates](docs/Model/PayrollSnapshotTransformerEmployeeRates.md)
- [PayrollSnapshotTransformerEmployeeRatesByIdValue](docs/Model/PayrollSnapshotTransformerEmployeeRatesByIdValue.md)
- [PayrollSnapshotTransformerEmployees](docs/Model/PayrollSnapshotTransformerEmployees.md)
- [PayrollSnapshotTransformerEmployeesByIdValue](docs/Model/PayrollSnapshotTransformerEmployeesByIdValue.md)
- [PayrollSnapshotTransformerEmployeesByIdValueCompensation](docs/Model/PayrollSnapshotTransformerEmployeesByIdValueCompensation.md)
- [PayrollSnapshotTransformerEmployeesByIdValueProrationInformationInner](docs/Model/PayrollSnapshotTransformerEmployeesByIdValueProrationInformationInner.md)
- [PayrollSnapshotTransformerEmployeesByIdValueTagsInner](docs/Model/PayrollSnapshotTransformerEmployeesByIdValueTagsInner.md)
- [PayrollSnapshotTransformerEmployeesByIdValueTagsInnerMetadata](docs/Model/PayrollSnapshotTransformerEmployeesByIdValueTagsInnerMetadata.md)
- [PayrollSnapshotTransformerTogglesInner](docs/Model/PayrollSnapshotTransformerTogglesInner.md)
- [PayrollSummaryTransformer](docs/Model/PayrollSummaryTransformer.md)
- [PayrollSummaryTransformerWireInstructions](docs/Model/PayrollSummaryTransformerWireInstructions.md)
- [PayrollSummaryTransformerWireInstructionsPayrollsInner](docs/Model/PayrollSummaryTransformerWireInstructionsPayrollsInner.md)
- [PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObject](docs/Model/PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObject.md)
- [PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObjectEmployeeTaxStateOptionsInner](docs/Model/PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObjectEmployeeTaxStateOptionsInner.md)
- [PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObjectEmployeeTaxStateUiOptionsInner](docs/Model/PayrollTraxPayrollApiControllerEmployeeTaxInformationDataObjectEmployeeTaxStateUiOptionsInner.md)
- [PayrollTraxPayrollApiControllerTimeTrackingProjectForTrax](docs/Model/PayrollTraxPayrollApiControllerTimeTrackingProjectForTrax.md)
- [PayrollTraxPayrollApiControllerTimeTrackingProjectsWithTasksForTrax](docs/Model/PayrollTraxPayrollApiControllerTimeTrackingProjectsWithTasksForTrax.md)
- [PayrollTraxPayrollApiControllerTimeTrackingProjectsWithTasksForTraxProjectsInner](docs/Model/PayrollTraxPayrollApiControllerTimeTrackingProjectsWithTasksForTraxProjectsInner.md)
- [PayrollTraxPayrollApiControllerTimeTrackingTaskForTrax](docs/Model/PayrollTraxPayrollApiControllerTimeTrackingTaskForTrax.md)
- [PayrollTraxPayrollApiControllerTraxEmployeeCompensationDataObject](docs/Model/PayrollTraxPayrollApiControllerTraxEmployeeCompensationDataObject.md)
- [PayrollTraxPayrollApiControllerTraxEmployeeDemographicsAndStatusDataObject](docs/Model/PayrollTraxPayrollApiControllerTraxEmployeeDemographicsAndStatusDataObject.md)
- [PayrollTraxPayrollApiControllerTraxEmployeePersonalInformationDataObject](docs/Model/PayrollTraxPayrollApiControllerTraxEmployeePersonalInformationDataObject.md)
- [PayrollUpdateSummaryCard](docs/Model/PayrollUpdateSummaryCard.md)
- [PayrollUpdateSummaryCardChange](docs/Model/PayrollUpdateSummaryCardChange.md)
- [PayrollUpdateSummaryCardEmployeeInformation](docs/Model/PayrollUpdateSummaryCardEmployeeInformation.md)
- [PayrollUpdateSummaryCardSubCategory](docs/Model/PayrollUpdateSummaryCardSubCategory.md)
- [PayrollWarningEmployeeTransformer](docs/Model/PayrollWarningEmployeeTransformer.md)
- [PayrollWarningsTransformerV2](docs/Model/PayrollWarningsTransformerV2.md)
- [PayrollWarningsTransformerV2WarningsInner](docs/Model/PayrollWarningsTransformerV2WarningsInner.md)
- [PayrollWarningsTransformerV2WarningsInnerOneOf](docs/Model/PayrollWarningsTransformerV2WarningsInnerOneOf.md)
- [PayrollWarningsTransformerV2WarningsInnerOneOf1](docs/Model/PayrollWarningsTransformerV2WarningsInnerOneOf1.md)
- [PayrollWarningsTransformerV2WarningsInnerOneOfEmployeesInner](docs/Model/PayrollWarningsTransformerV2WarningsInnerOneOfEmployeesInner.md)
- [PayrollWorkersCompWorkersCompCode](docs/Model/PayrollWorkersCompWorkersCompCode.md)
- [PayrollWorkersCompWorkersCompCodesResponse](docs/Model/PayrollWorkersCompWorkersCompCodesResponse.md)
- [PayrollWorkersCompWorkersCompRate](docs/Model/PayrollWorkersCompWorkersCompRate.md)
- [PerformanceAiResponseDataObject](docs/Model/PerformanceAiResponseDataObject.md)
- [PerformanceReviewCycle](docs/Model/PerformanceReviewCycle.md)
- [PerformanceSettingsQuestionViewObject](docs/Model/PerformanceSettingsQuestionViewObject.md)
- [PerformanceTabOverview](docs/Model/PerformanceTabOverview.md)
- [PerformanceTabOverviewAssessments](docs/Model/PerformanceTabOverviewAssessments.md)
- [PerformanceTabOverviewFeedback](docs/Model/PerformanceTabOverviewFeedback.md)
- [PerformanceTabOverviewGoals](docs/Model/PerformanceTabOverviewGoals.md)
- [PerformanceToolsDataObject](docs/Model/PerformanceToolsDataObject.md)
- [Period](docs/Model/Period.md)
- [PersonInfoApiTransformer](docs/Model/PersonInfoApiTransformer.md)
- [PersonJobInfoApiResponse](docs/Model/PersonJobInfoApiResponse.md)
- [PersonsInfoApiTransformer](docs/Model/PersonsInfoApiTransformer.md)
- [Plan](docs/Model/Plan.md)
- [PlanDates](docs/Model/PlanDates.md)
- [PlanType](docs/Model/PlanType.md)
- [PlanTypeData](docs/Model/PlanTypeData.md)
- [PlanTypeDataCoverageLevels](docs/Model/PlanTypeDataCoverageLevels.md)
- [PlanTypeDataDeductionDateRule](docs/Model/PlanTypeDataDeductionDateRule.md)
- [PlanTypeMetaData](docs/Model/PlanTypeMetaData.md)
- [PlanTypeMetaDataDefaults](docs/Model/PlanTypeMetaDataDefaults.md)
- [PlanYear](docs/Model/PlanYear.md)
- [PlanYearDraftDataObject](docs/Model/PlanYearDraftDataObject.md)
- [PlanYears](docs/Model/PlanYears.md)
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
- [PotentialAdminApproval](docs/Model/PotentialAdminApproval.md)
- [PrimaryPaymentMethodResponse](docs/Model/PrimaryPaymentMethodResponse.md)
- [ProductPricingInfoResponse](docs/Model/ProductPricingInfoResponse.md)
- [ProhibitedFieldMatchResponse](docs/Model/ProhibitedFieldMatchResponse.md)
- [ProhibitedFieldMatchResponseDuplicate](docs/Model/ProhibitedFieldMatchResponseDuplicate.md)
- [ProhibitedFieldMatchResponseDuplicateField](docs/Model/ProhibitedFieldMatchResponseDuplicateField.md)
- [ProhibitedFieldMatchResponseProhibited](docs/Model/ProhibitedFieldMatchResponseProhibited.md)
- [ProjectInfoApiTransformer](docs/Model/ProjectInfoApiTransformer.md)
- [ProjectInfoApiTransformerProject](docs/Model/ProjectInfoApiTransformerProject.md)
- [ProjectInfoApiTransformerTask](docs/Model/ProjectInfoApiTransformerTask.md)
- [ProjectWithTasksTransformer](docs/Model/ProjectWithTasksTransformer.md)
- [ProjectWithTasksTransformerTasksInner](docs/Model/ProjectWithTasksTransformerTasksInner.md)
- [ProjectedPrepaymentResponse](docs/Model/ProjectedPrepaymentResponse.md)
- [ProjectedPrepaymentResponseCustomerDetails](docs/Model/ProjectedPrepaymentResponseCustomerDetails.md)
- [ProjectedPrepaymentResponseDiscountsInner](docs/Model/ProjectedPrepaymentResponseDiscountsInner.md)
- [ProjectedPrepaymentResponseInvoiceItemsInner](docs/Model/ProjectedPrepaymentResponseInvoiceItemsInner.md)
- [ProjectedPrepaymentResponsePaymentInformation](docs/Model/ProjectedPrepaymentResponsePaymentInformation.md)
- [ProrationPeriodInformationDataObjectsInner](docs/Model/ProrationPeriodInformationDataObjectsInner.md)
- [PtoTabDataTransformer](docs/Model/PtoTabDataTransformer.md)
- [PutGoalMilestoneProgressRequest](docs/Model/PutGoalMilestoneProgressRequest.md)
- [PutGoalProgressRequest](docs/Model/PutGoalProgressRequest.md)
- [PutGoalSharedWithRequest](docs/Model/PutGoalSharedWithRequest.md)
- [PutGoalV11Request](docs/Model/PutGoalV11Request.md)
- [PutGoalV11RequestMilestonesInner](docs/Model/PutGoalV11RequestMilestonesInner.md)
- [PutWebhook403Response](docs/Model/PutWebhook403Response.md)
- [QbopWebhookChangedEntity](docs/Model/QbopWebhookChangedEntity.md)
- [QualifyingLifeEventRequest](docs/Model/QualifyingLifeEventRequest.md)
- [QualifyingLifeEventRequestStoreResult](docs/Model/QualifyingLifeEventRequestStoreResult.md)
- [QuickSearchResponse](docs/Model/QuickSearchResponse.md)
- [ReactivateOneTimeDeductionRequest](docs/Model/ReactivateOneTimeDeductionRequest.md)
- [ReactivateOneTimeDeductionResponse](docs/Model/ReactivateOneTimeDeductionResponse.md)
- [ReactivationEmployeeDataObject](docs/Model/ReactivationEmployeeDataObject.md)
- [ReactivationRequest](docs/Model/ReactivationRequest.md)
- [RecentReportListCategory](docs/Model/RecentReportListCategory.md)
- [RecentReportListCategoryCollection](docs/Model/RecentReportListCategoryCollection.md)
- [RecommenderDataObject](docs/Model/RecommenderDataObject.md)
- [RegistrationDataContract](docs/Model/RegistrationDataContract.md)
- [Reimbursement](docs/Model/Reimbursement.md)
- [RemoteCompanyResponseSchema](docs/Model/RemoteCompanyResponseSchema.md)
- [RemoteCompanyWidgetStatusesSchema](docs/Model/RemoteCompanyWidgetStatusesSchema.md)
- [RemoteEmploymentStatusDataObject](docs/Model/RemoteEmploymentStatusDataObject.md)
- [RemoteLinkResponseSchema](docs/Model/RemoteLinkResponseSchema.md)
- [RemoteLinkResponseSchemaData](docs/Model/RemoteLinkResponseSchemaData.md)
- [RemoteTermsAndConditionsFieldSchema](docs/Model/RemoteTermsAndConditionsFieldSchema.md)
- [RemoteTermsAndConditionsFieldSchemaXJsfPresentation](docs/Model/RemoteTermsAndConditionsFieldSchemaXJsfPresentation.md)
- [RemoteUserAdminListSchema](docs/Model/RemoteUserAdminListSchema.md)
- [RemoteUserListViewSchema](docs/Model/RemoteUserListViewSchema.md)
- [ReorderCustomTableFieldsRequest](docs/Model/ReorderCustomTableFieldsRequest.md)
- [RepeatingContainerFormNode](docs/Model/RepeatingContainerFormNode.md)
- [RepeatingContainerFormNodeAllOfTemplate](docs/Model/RepeatingContainerFormNodeAllOfTemplate.md)
- [Report](docs/Model/Report.md)
- [ReportFavoriteResponse](docs/Model/ReportFavoriteResponse.md)
- [ReportFolder](docs/Model/ReportFolder.md)
- [ReportFolderCollection](docs/Model/ReportFolderCollection.md)
- [ReportListCollection](docs/Model/ReportListCollection.md)
- [ReportListItem](docs/Model/ReportListItem.md)
- [ReportPanel](docs/Model/ReportPanel.md)
- [ReportPanelConfiguration](docs/Model/ReportPanelConfiguration.md)
- [ReportPanelConfigurationFilters](docs/Model/ReportPanelConfigurationFilters.md)
- [ReportPanelConfigurationFiltersFiltersInner](docs/Model/ReportPanelConfigurationFiltersFiltersInner.md)
- [ReportPanelConfigurationSortByInner](docs/Model/ReportPanelConfigurationSortByInner.md)
- [ReportResponse](docs/Model/ReportResponse.md)
- [ReportSharedWithListItem](docs/Model/ReportSharedWithListItem.md)
- [ReportSharedWithResponse](docs/Model/ReportSharedWithResponse.md)
- [ReportSharingListItemResponse](docs/Model/ReportSharingListItemResponse.md)
- [ReportsResponse](docs/Model/ReportsResponse.md)
- [Request](docs/Model/Request.md)
- [RequestCustomReport](docs/Model/RequestCustomReport.md)
- [RequestCustomReportFilters](docs/Model/RequestCustomReportFilters.md)
- [RequestCustomReportFiltersLastChanged](docs/Model/RequestCustomReportFiltersLastChanged.md)
- [ResetPayCycleTransformer](docs/Model/ResetPayCycleTransformer.md)
- [ReviewCycleAssessments](docs/Model/ReviewCycleAssessments.md)
- [ReviewCycleConfiguration](docs/Model/ReviewCycleConfiguration.md)
- [ReviewCycleConfigurationContractObject](docs/Model/ReviewCycleConfigurationContractObject.md)
- [SalaryEmployeePayCycleProRationInner](docs/Model/SalaryEmployeePayCycleProRationInner.md)
- [SalesforceContactUserResponse](docs/Model/SalesforceContactUserResponse.md)
- [SalesforceDeleteContactDataObject](docs/Model/SalesforceDeleteContactDataObject.md)
- [SalesforceWebhookDataObject](docs/Model/SalesforceWebhookDataObject.md)
- [SalesforceWebhookResponse](docs/Model/SalesforceWebhookResponse.md)
- [SaveSharingListRequest](docs/Model/SaveSharingListRequest.md)
- [SaveSharingListRequestAllOfSettings](docs/Model/SaveSharingListRequestAllOfSettings.md)
- [SaveSharingListRequestAllOfSettingsSharingSchedule](docs/Model/SaveSharingListRequestAllOfSettingsSharingSchedule.md)
- [ScopeAccessDescriptionDataObject](docs/Model/ScopeAccessDescriptionDataObject.md)
- [ScopeDescriptionDataObject](docs/Model/ScopeDescriptionDataObject.md)
- [SectionViewObject](docs/Model/SectionViewObject.md)
- [SelectEmploymentStatusFieldNode](docs/Model/SelectEmploymentStatusFieldNode.md)
- [SelectFieldFormNode](docs/Model/SelectFieldFormNode.md)
- [SelectFieldFormNodeAllOfItems](docs/Model/SelectFieldFormNodeAllOfItems.md)
- [SelectFieldFormNodeAllOfValue](docs/Model/SelectFieldFormNodeAllOfValue.md)
- [SelectFieldOptionSchema](docs/Model/SelectFieldOptionSchema.md)
- [SelectFieldSchema](docs/Model/SelectFieldSchema.md)
- [SelectFieldSchemaXJsfPresentation](docs/Model/SelectFieldSchemaXJsfPresentation.md)
- [SelectedCoverageLevel](docs/Model/SelectedCoverageLevel.md)
- [SelectedCustomCoverageLevel](docs/Model/SelectedCustomCoverageLevel.md)
- [SelectedCustomExistingCoverageLevel](docs/Model/SelectedCustomExistingCoverageLevel.md)
- [SelectedCustomNewCoverageLevel](docs/Model/SelectedCustomNewCoverageLevel.md)
- [SelectedDefaultCoverageLevel](docs/Model/SelectedDefaultCoverageLevel.md)
- [SelfEnrollmentWizardDraftResponse](docs/Model/SelfEnrollmentWizardDraftResponse.md)
- [SelfEnrollmentWizardResponse](docs/Model/SelfEnrollmentWizardResponse.md)
- [SelfEnrollmentWizardResponseEmployee](docs/Model/SelfEnrollmentWizardResponseEmployee.md)
- [SettingsNavigationMenuTransformer](docs/Model/SettingsNavigationMenuTransformer.md)
- [SettingsNavigationMenuTransformerNavigationGroupsInner](docs/Model/SettingsNavigationMenuTransformerNavigationGroupsInner.md)
- [SharingListRequest](docs/Model/SharingListRequest.md)
- [SharingListRequestTargetsInner](docs/Model/SharingListRequestTargetsInner.md)
- [SharingMissingPermissions](docs/Model/SharingMissingPermissions.md)
- [SharingSchedule](docs/Model/SharingSchedule.md)
- [ShiftDifferentialTransformer](docs/Model/ShiftDifferentialTransformer.md)
- [ShiftDifferentialTransformerEmployeesInner](docs/Model/ShiftDifferentialTransformerEmployeesInner.md)
- [ShowHistorySection](docs/Model/ShowHistorySection.md)
- [SimpleEmployeeTaskFileMetaSchema](docs/Model/SimpleEmployeeTaskFileMetaSchema.md)
- [SimplifiedCompanyInfoResponse](docs/Model/SimplifiedCompanyInfoResponse.md)
- [SimplifiedCompanyInfoResponseOwner](docs/Model/SimplifiedCompanyInfoResponseOwner.md)
- [SpacingFormNode](docs/Model/SpacingFormNode.md)
- [StandardApiErrorResponse](docs/Model/StandardApiErrorResponse.md)
- [State](docs/Model/State.md)
- [StaticTemplateFormNode](docs/Model/StaticTemplateFormNode.md)
- [Status](docs/Model/Status.md)
- [StoredHourEntriesApiTransformerInner](docs/Model/StoredHourEntriesApiTransformerInner.md)
- [SubNavigationTransformer](docs/Model/SubNavigationTransformer.md)
- [SubscriptionInfoResponse](docs/Model/SubscriptionInfoResponse.md)
- [SubscriptionInfoResponsePackageUpgradeRestrictions](docs/Model/SubscriptionInfoResponsePackageUpgradeRestrictions.md)
- [SubscriptionInfoResponsePackagesInner](docs/Model/SubscriptionInfoResponsePackagesInner.md)
- [SubscriptionInfoResponsePepmAddOnProductsInner](docs/Model/SubscriptionInfoResponsePepmAddOnProductsInner.md)
- [SubscriptionInfoResponsePepmAddOnProductsInnerSubproductsInner](docs/Model/SubscriptionInfoResponsePepmAddOnProductsInnerSubproductsInner.md)
- [SummarizationDataObject](docs/Model/SummarizationDataObject.md)
- [SurveyQuestionResponse](docs/Model/SurveyQuestionResponse.md)
- [SurveyQuestionResponseAnswersInner](docs/Model/SurveyQuestionResponseAnswersInner.md)
- [TabViewObject](docs/Model/TabViewObject.md)
- [TablePanelConfigurationRequest](docs/Model/TablePanelConfigurationRequest.md)
- [TablePanelConfigurationRequestFieldSettingsInner](docs/Model/TablePanelConfigurationRequestFieldSettingsInner.md)
- [TablePanelConfigurationRequestFilters](docs/Model/TablePanelConfigurationRequestFilters.md)
- [TablePanelConfigurationRequestFiltersFiltersInner](docs/Model/TablePanelConfigurationRequestFiltersFiltersInner.md)
- [TablePanelConfigurationRequestFiltersFiltersInnerValue](docs/Model/TablePanelConfigurationRequestFiltersFiltersInnerValue.md)
- [TablePanelConfigurationRequestPivotFields](docs/Model/TablePanelConfigurationRequestPivotFields.md)
- [TablePanelConfigurationRequestSortByInner](docs/Model/TablePanelConfigurationRequestSortByInner.md)
- [TableRowDetail](docs/Model/TableRowDetail.md)
- [TableRowUpdate](docs/Model/TableRowUpdate.md)
- [TaskAssigneeSchema](docs/Model/TaskAssigneeSchema.md)
- [TaskAttachmentLegacySchema](docs/Model/TaskAttachmentLegacySchema.md)
- [TaskAttachmentSchema](docs/Model/TaskAttachmentSchema.md)
- [TaskAttachmentsBaseSchema](docs/Model/TaskAttachmentsBaseSchema.md)
- [TaskCategoryDataObject](docs/Model/TaskCategoryDataObject.md)
- [TaskCommentFileSchema](docs/Model/TaskCommentFileSchema.md)
- [TaskCommentLegacySchema](docs/Model/TaskCommentLegacySchema.md)
- [TaskCommentPersonSchema](docs/Model/TaskCommentPersonSchema.md)
- [TaskCommentSchema](docs/Model/TaskCommentSchema.md)
- [TaskDetailSchema](docs/Model/TaskDetailSchema.md)
- [TaskDetailSchemaMeta](docs/Model/TaskDetailSchemaMeta.md)
- [TaskEmployeeLegacySchema](docs/Model/TaskEmployeeLegacySchema.md)
- [TaskLegacySchema](docs/Model/TaskLegacySchema.md)
- [TaskListSchema](docs/Model/TaskListSchema.md)
- [TaskLiteSchema](docs/Model/TaskLiteSchema.md)
- [TaskMetaFileSchema](docs/Model/TaskMetaFileSchema.md)
- [TaskPersonInfo](docs/Model/TaskPersonInfo.md)
- [TaskPersonLegacySchema](docs/Model/TaskPersonLegacySchema.md)
- [TaskPersonSchema](docs/Model/TaskPersonSchema.md)
- [TaskSchema](docs/Model/TaskSchema.md)
- [TaskTemplateEmployee](docs/Model/TaskTemplateEmployee.md)
- [TaskTemplateFileSchema](docs/Model/TaskTemplateFileSchema.md)
- [TaskTemplateFileSchemaEsignatures](docs/Model/TaskTemplateFileSchemaEsignatures.md)
- [TaskTemplateFileSchemaImgSizes](docs/Model/TaskTemplateFileSchemaImgSizes.md)
- [TaskTemplateFilterReadSchema](docs/Model/TaskTemplateFilterReadSchema.md)
- [TaskTemplateSchema](docs/Model/TaskTemplateSchema.md)
- [TaxIdFieldSchema](docs/Model/TaxIdFieldSchema.md)
- [TaxIdFieldSchemaXJsfPresentation](docs/Model/TaxIdFieldSchemaXJsfPresentation.md)
- [TemplatePanelDataObject](docs/Model/TemplatePanelDataObject.md)
- [TemplateReportDataObject](docs/Model/TemplateReportDataObject.md)
- [TimeAndLaborManagementDataObject](docs/Model/TimeAndLaborManagementDataObject.md)
- [TimeClockDeviceTransformer](docs/Model/TimeClockDeviceTransformer.md)
- [TimeOffDefaultHoursGroupsInner](docs/Model/TimeOffDefaultHoursGroupsInner.md)
- [TimeOffDefaultHoursGroupsInnerFilters](docs/Model/TimeOffDefaultHoursGroupsInnerFilters.md)
- [TimeOffDefaultHoursGroupsInnerHoursPerDay](docs/Model/TimeOffDefaultHoursGroupsInnerHoursPerDay.md)
- [TimeOffEventsResponseInner](docs/Model/TimeOffEventsResponseInner.md)
- [TimeOffHistory](docs/Model/TimeOffHistory.md)
- [TimeOffHistoryItemsTransformer](docs/Model/TimeOffHistoryItemsTransformer.md)
- [TimeOffHistoryItemsTransformerOverrideUser](docs/Model/TimeOffHistoryItemsTransformerOverrideUser.md)
- [TimeOffPoliciesAndTypesTransformer](docs/Model/TimeOffPoliciesAndTypesTransformer.md)
- [TimeOffPoliciesAndTypesTransformerTypesInner](docs/Model/TimeOffPoliciesAndTypesTransformerTypesInner.md)
- [TimeOffPolicyAccrualOptionsTransformer](docs/Model/TimeOffPolicyAccrualOptionsTransformer.md)
- [TimeOffPolicyMilestonesTransformer](docs/Model/TimeOffPolicyMilestonesTransformer.md)
- [TimeOffPolicySettingsTransformer](docs/Model/TimeOffPolicySettingsTransformer.md)
- [TimeOffPolicySettingsTransformerAccrualOptions](docs/Model/TimeOffPolicySettingsTransformerAccrualOptions.md)
- [TimeOffPolicySettingsTransformerPolicy](docs/Model/TimeOffPolicySettingsTransformerPolicy.md)
- [TimeOffPolicySettingsTransformerRatesInner](docs/Model/TimeOffPolicySettingsTransformerRatesInner.md)
- [TimeOffPolicySettingsTransformerTimeOffTypesInner](docs/Model/TimeOffPolicySettingsTransformerTimeOffTypesInner.md)
- [TimeOffPolicyTransformer](docs/Model/TimeOffPolicyTransformer.md)
- [TimeOffPolicyVersionHistoryTransformer](docs/Model/TimeOffPolicyVersionHistoryTransformer.md)
- [TimeOffPolicyVersionHistoryTransformerCategory](docs/Model/TimeOffPolicyVersionHistoryTransformerCategory.md)
- [TimeOffPolicyVersionHistoryTransformerPolicyVersionsInner](docs/Model/TimeOffPolicyVersionHistoryTransformerPolicyVersionsInner.md)
- [TimeOffPolicyVersionHistoryTransformerUsersInner](docs/Model/TimeOffPolicyVersionHistoryTransformerUsersInner.md)
- [TimeOffPolicyVersionMetadataTransformer](docs/Model/TimeOffPolicyVersionMetadataTransformer.md)
- [TimeOffPolicyVersionSettingsTransformer](docs/Model/TimeOffPolicyVersionSettingsTransformer.md)
- [TimeOffRequest](docs/Model/TimeOffRequest.md)
- [TimeOffRequestActionsResponseInner](docs/Model/TimeOffRequestActionsResponseInner.md)
- [TimeOffRequestApiResponseInner](docs/Model/TimeOffRequestApiResponseInner.md)
- [TimeOffRequestApiResponseInnerAmountInner](docs/Model/TimeOffRequestApiResponseInnerAmountInner.md)
- [TimeOffRequestApiResponseInnerApproversInner](docs/Model/TimeOffRequestApiResponseInnerApproversInner.md)
- [TimeOffRequestApiResponseInnerCommentsInner](docs/Model/TimeOffRequestApiResponseInnerCommentsInner.md)
- [TimeOffRequestApiResponseInnerDatesInner](docs/Model/TimeOffRequestApiResponseInnerDatesInner.md)
- [TimeOffRequestApiResponseInnerNotesInner](docs/Model/TimeOffRequestApiResponseInnerNotesInner.md)
- [TimeOffRequestApiResponseInnerOverlappingRequestsInner](docs/Model/TimeOffRequestApiResponseInnerOverlappingRequestsInner.md)
- [TimeOffRequestApiResponseInnerStatusInner](docs/Model/TimeOffRequestApiResponseInnerStatusInner.md)
- [TimeOffRequestApiResponseInnerTypeInner](docs/Model/TimeOffRequestApiResponseInnerTypeInner.md)
- [TimeOffRequestDatesInner](docs/Model/TimeOffRequestDatesInner.md)
- [TimeOffRequestNotesInner](docs/Model/TimeOffRequestNotesInner.md)
- [TimeOffSessionViewModelTransformer](docs/Model/TimeOffSessionViewModelTransformer.md)
- [TimeOffSettingsCategoryListTransformer](docs/Model/TimeOffSettingsCategoryListTransformer.md)
- [TimeOffSettingsCategoryListTransformerAssignableUserGroupsInner](docs/Model/TimeOffSettingsCategoryListTransformerAssignableUserGroupsInner.md)
- [TimeOffSettingsCategoryListTransformerCategoriesInner](docs/Model/TimeOffSettingsCategoryListTransformerCategoriesInner.md)
- [TimeOffSettingsCategoryListTransformerPayrollInformation](docs/Model/TimeOffSettingsCategoryListTransformerPayrollInformation.md)
- [TimeOffSettingsCategoryListTransformerPoliciesInner](docs/Model/TimeOffSettingsCategoryListTransformerPoliciesInner.md)
- [TimeOffSummaryResponseInner](docs/Model/TimeOffSummaryResponseInner.md)
- [TimeOffSummaryResponseInnerPauseInner](docs/Model/TimeOffSummaryResponseInnerPauseInner.md)
- [TimeOffTabCardTransformer](docs/Model/TimeOffTabCardTransformer.md)
- [TimeOffTabViewModelTransformer](docs/Model/TimeOffTabViewModelTransformer.md)
- [TimeOffTypesDataTransformer](docs/Model/TimeOffTypesDataTransformer.md)
- [TimeOffTypesDataTransformerTimeOffCategoriesInner](docs/Model/TimeOffTypesDataTransformerTimeOffCategoriesInner.md)
- [TimeToEligibility](docs/Model/TimeToEligibility.md)
- [TimeToEligibilityDataModel](docs/Model/TimeToEligibilityDataModel.md)
- [TimeTrackingConfigurationTransformer](docs/Model/TimeTrackingConfigurationTransformer.md)
- [TimeTrackingEmployeeDataObject](docs/Model/TimeTrackingEmployeeDataObject.md)
- [TimeTrackingKioskTransformer](docs/Model/TimeTrackingKioskTransformer.md)
- [TimeTrackingProjectWithTasks](docs/Model/TimeTrackingProjectWithTasks.md)
- [TimeTrackingProjectWithTasksAndEmployeeIds](docs/Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)
- [TimeTrackingRecord](docs/Model/TimeTrackingRecord.md)
- [TimeTrackingTask](docs/Model/TimeTrackingTask.md)
- [TimeTrackingWidget](docs/Model/TimeTrackingWidget.md)
- [TimesheetEntryInfoApiTransformer](docs/Model/TimesheetEntryInfoApiTransformer.md)
- [TimesheetListApiTransformerInner](docs/Model/TimesheetListApiTransformerInner.md)
- [TimesheetSummaryApiTransformer](docs/Model/TimesheetSummaryApiTransformer.md)
- [TimesheetSummaryApiTransformerAllOfToday](docs/Model/TimesheetSummaryApiTransformerAllOfToday.md)
- [TotalRewardsBenefitDetailsValues](docs/Model/TotalRewardsBenefitDetailsValues.md)
- [TotalRewardsBenefitSectionValues](docs/Model/TotalRewardsBenefitSectionValues.md)
- [TotalRewardsCalendarSectionValues](docs/Model/TotalRewardsCalendarSectionValues.md)
- [TotalRewardsCompSummaryValues](docs/Model/TotalRewardsCompSummaryValues.md)
- [TotalRewardsCustomDisclaimerInfo](docs/Model/TotalRewardsCustomDisclaimerInfo.md)
- [TotalRewardsEmployee](docs/Model/TotalRewardsEmployee.md)
- [TotalRewardsEmployeeFilterable](docs/Model/TotalRewardsEmployeeFilterable.md)
- [TotalRewardsEmployeeStatement](docs/Model/TotalRewardsEmployeeStatement.md)
- [TotalRewardsEquityDetailsValues](docs/Model/TotalRewardsEquityDetailsValues.md)
- [TotalRewardsEquityEstimatedValuationValues](docs/Model/TotalRewardsEquityEstimatedValuationValues.md)
- [TotalRewardsEquityGrowthChartItem](docs/Model/TotalRewardsEquityGrowthChartItem.md)
- [TotalRewardsEquityGrowthEstimation](docs/Model/TotalRewardsEquityGrowthEstimation.md)
- [TotalRewardsEquitySectionValues](docs/Model/TotalRewardsEquitySectionValues.md)
- [TotalRewardsExtraPayDetailsValues](docs/Model/TotalRewardsExtraPayDetailsValues.md)
- [TotalRewardsExtraPaySectionValues](docs/Model/TotalRewardsExtraPaySectionValues.md)
- [TotalRewardsHolidayValue](docs/Model/TotalRewardsHolidayValue.md)
- [TotalRewardsMoney](docs/Model/TotalRewardsMoney.md)
- [TotalRewardsOnboardingStep](docs/Model/TotalRewardsOnboardingStep.md)
- [TotalRewardsOverviewSectionValues](docs/Model/TotalRewardsOverviewSectionValues.md)
- [TotalRewardsTimeOffPolicyValue](docs/Model/TotalRewardsTimeOffPolicyValue.md)
- [TotalRewardsTimelineItem](docs/Model/TotalRewardsTimelineItem.md)
- [TotalRewardsTimelineItemLabel](docs/Model/TotalRewardsTimelineItemLabel.md)
- [TotalRewardsTimelineSectionValues](docs/Model/TotalRewardsTimelineSectionValues.md)
- [TrainingCategory](docs/Model/TrainingCategory.md)
- [TrainingRecord](docs/Model/TrainingRecord.md)
- [TrainingTaskManagerDataSchema](docs/Model/TrainingTaskManagerDataSchema.md)
- [TrainingType](docs/Model/TrainingType.md)
- [TrainingTypeDataSchema](docs/Model/TrainingTypeDataSchema.md)
- [TrainingTypeViewSchema](docs/Model/TrainingTypeViewSchema.md)
- [TrainingTypeViewSchemaFilterListValues](docs/Model/TrainingTypeViewSchemaFilterListValues.md)
- [TrainingTypeViewSchemaSectionsInner](docs/Model/TrainingTypeViewSchemaSectionsInner.md)
- [TrainingTypeViewSchemaTrainingFilesInner](docs/Model/TrainingTypeViewSchemaTrainingFilesInner.md)
- [TrainingWidgetTrainingDataObject](docs/Model/TrainingWidgetTrainingDataObject.md)
- [TrainingsWidget](docs/Model/TrainingsWidget.md)
- [TransformedApiGoal](docs/Model/TransformedApiGoal.md)
- [TransformedApiGoalGoal](docs/Model/TransformedApiGoalGoal.md)
- [TransformedApiGoalGoalActions](docs/Model/TransformedApiGoalGoalActions.md)
- [TransformedApiGoalGoalMilestonesInner](docs/Model/TransformedApiGoalGoalMilestonesInner.md)
- [TransformedCascadingGoalOptions](docs/Model/TransformedCascadingGoalOptions.md)
- [TransformedCascadingGoalOptionsDropdownOptions](docs/Model/TransformedCascadingGoalOptionsDropdownOptions.md)
- [TransformedCascadingGoalsViewObject](docs/Model/TransformedCascadingGoalsViewObject.md)
- [TransformedFileWithExtras](docs/Model/TransformedFileWithExtras.md)
- [TransformedParentGoalDropdownOption](docs/Model/TransformedParentGoalDropdownOption.md)
- [UnarchiveCustomFieldsRequest](docs/Model/UnarchiveCustomFieldsRequest.md)
- [UnexpectedlyEnabledEmployee](docs/Model/UnexpectedlyEnabledEmployee.md)
- [UpcomingTimeOffTransformer](docs/Model/UpcomingTimeOffTransformer.md)
- [UpcomingTimeOffTransformerActionPermissions](docs/Model/UpcomingTimeOffTransformerActionPermissions.md)
- [UpcomingTimeOffTransformerOld](docs/Model/UpcomingTimeOffTransformerOld.md)
- [UpcomingTimeOffTransformerOldActions](docs/Model/UpcomingTimeOffTransformerOldActions.md)
- [UpcomingTrainingDataSchema](docs/Model/UpcomingTrainingDataSchema.md)
- [UpdateClientRequest](docs/Model/UpdateClientRequest.md)
- [UpdateEmployeeTrainingRecordRequest](docs/Model/UpdateEmployeeTrainingRecordRequest.md)
- [UpdateGlobalOverridesRequest](docs/Model/UpdateGlobalOverridesRequest.md)
- [UpdatePayrollContactTransformer](docs/Model/UpdatePayrollContactTransformer.md)
- [UpdateSortOrderApplicantStatusResponse](docs/Model/UpdateSortOrderApplicantStatusResponse.md)
- [UpdateSortOrderApplicantStatusResponseOneOf](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusGroups](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusGroups.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatuses](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatuses.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesActiveStatuses](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesActiveStatuses.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesActiveStatusesStatusesInner](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesActiveStatusesStatusesInner.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesDisqualified](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesDisqualified.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesHired](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesHired.md)
- [UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesNew](docs/Model/UpdateSortOrderApplicantStatusResponseOneOf0ApplicantStatusesNew.md)
- [UpdateTeamRequest](docs/Model/UpdateTeamRequest.md)
- [UpdateTrainingCategoryRequest](docs/Model/UpdateTrainingCategoryRequest.md)
- [UpdateTrainingTypeRequest](docs/Model/UpdateTrainingTypeRequest.md)
- [UpdateTrainingTypeRequestCategory](docs/Model/UpdateTrainingTypeRequestCategory.md)
- [UpdatedHoursResponseInner](docs/Model/UpdatedHoursResponseInner.md)
- [UploadTemporaryFileResponse](docs/Model/UploadTemporaryFileResponse.md)
- [UserPermissionData](docs/Model/UserPermissionData.md)
- [UserSignatureDataObject](docs/Model/UserSignatureDataObject.md)
- [ValidateAddressRequest](docs/Model/ValidateAddressRequest.md)
- [ViewableOneOnOneDateDataObject](docs/Model/ViewableOneOnOneDateDataObject.md)
- [WaitingPeriodNewHireAutomationSetting](docs/Model/WaitingPeriodNewHireAutomationSetting.md)
- [WebHookDetailsDataObject](docs/Model/WebHookDetailsDataObject.md)
- [WebHookListDataObject](docs/Model/WebHookListDataObject.md)
- [WebHookListResponseDataObject](docs/Model/WebHookListResponseDataObject.md)
- [WebHookListResponseDataObjectFilterListInner](docs/Model/WebHookListResponseDataObjectFilterListInner.md)
- [WebHookLogResponse](docs/Model/WebHookLogResponse.md)
- [WebHookPostFieldDataObject](docs/Model/WebHookPostFieldDataObject.md)
- [WebHookPostFieldPageDataObject](docs/Model/WebHookPostFieldPageDataObject.md)
- [WebHookPostFieldResponseObject](docs/Model/WebHookPostFieldResponseObject.md)
- [WebHookPostFieldTableDataObject](docs/Model/WebHookPostFieldTableDataObject.md)
- [WebHookResponse](docs/Model/WebHookResponse.md)
- [WebHookResponseFrequency](docs/Model/WebHookResponseFrequency.md)
- [Webhook400Error](docs/Model/Webhook400Error.md)
- [WebhookError](docs/Model/WebhookError.md)
- [WebhookErrorErrors](docs/Model/WebhookErrorErrors.md)
- [WebhookSelectedPostFieldDataObject](docs/Model/WebhookSelectedPostFieldDataObject.md)
- [WebhookSubErrorProperty](docs/Model/WebhookSubErrorProperty.md)
- [WebhookSubErrorPropertyUnknownFieldsInner](docs/Model/WebhookSubErrorPropertyUnknownFieldsInner.md)
- [WelcomeWidget](docs/Model/WelcomeWidget.md)
- [WhosOutTransformer](docs/Model/WhosOutTransformer.md)
- [WhosOutTransformerRecordsInner](docs/Model/WhosOutTransformerRecordsInner.md)
- [WizardSaveRequest](docs/Model/WizardSaveRequest.md)
- [WorkflowDataObject](docs/Model/WorkflowDataObject.md)
- [YearSummaryTransformerInner](docs/Model/YearSummaryTransformerInner.md)

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
    - Generator version: `7.13.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
