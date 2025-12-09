# BambooHR PHP SDK
Official PHP SDK for the BambooHR API. For complete API documentation, visit https://documentation.bamboohr.com/

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), simply run:

```bash
composer require bamboohr/api
```

This will install the latest version of the SDK from [Packagist](https://packagist.org/), the main Composer repository.

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```
## Changelog

For a detailed list of changes and version history, see [CHANGELOG.md](CHANGELOG.md).

## Getting Started using the Fluent API Client (Recommended)

The SDK provides a modern, fluent interface for easier configuration and usage:

### Quick Start with Fluent Interface

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use BhrSdk\Client\ApiClient;

// Simple setup with OAuth authentication
$client = (new ApiClient())
    ->withOAuth('your-oauth-token')
    ->forCompany('your-company-subdomain')
    ->build();

// Use convenience methods to access APIs
$employee = $client->employees()->getEmployee('firstName,lastName', '123');
$timeOffRequests = $client->timeOff()->getTimeOffRequests();
```

### Authentication Methods

#### OAuth (Recommended)
```php
$client = (new ApiClient())
    ->withOAuth('your-oauth-token')
    ->forCompany('acme')
    ->build();
```

#### API Key 
```php
$client = (new ApiClient())
    ->withApiKey('your-api-key')
    ->forCompany('acme')
    ->build();
```

Also refer to the getting started docs found here: https://documentation.bamboohr.com/docs/getting-started

### Convenience Methods

Access commonly used APIs with simple method calls:

```php
$client->employees()           // EmployeesApi
$client->timeOff()             // TimeOffApi
$client->benefits()            // BenefitsApi
$client->reports()             // ReportsApi
$client->goals()               // GoalsApi
$client->training()            // TrainingApi
$client->timeTracking()        // TimeTrackingApi
$client->photos()              // PhotosApi
$client->webhooks()            // WebhooksApi
$client->tabularData()         // TabularDataApi
$client->accountInformation()  // AccountInformationApi
$client->applicantTracking()   // ApplicantTrackingApi
$client->companyFiles()        // CompanyFilesApi
$client->employeeFiles()       // EmployeeFilesApi
$client->ats()                 // ATSApi
$client->customReports()       // CustomReportsApi
$client->datasets()            // DatasetsApi
$client->hours()               // HoursApi
$client->lastChangeInformation() // LastChangeInformationApi
$client->login()               // LoginApi
$client->manual()              // ManualApi
```

### Advanced Configuration

```php
$client = (new ApiClient())
    ->withOAuth('your-oauth-token')
    ->forCompany('acme')
    ->withRetries(3)                    // Configure retry attempts
    ->withDebug(true)                   // Enable debug mode
    ->withLogging(null, 'debug')        // Enable secure logging
    ->withHostIndex(1)                  // Set custom host index
    ->build();
```

### Secure Logging

The SDK includes secure logging with automatic sensitive data redaction:

```php
use BhrSdk\Client\Logger\SecureLogger;

// Enable logging with default settings
$client = (new ApiClient())
    ->withOAuth('your-oauth-token')
    ->forCompany('acme')
    ->withLogging()  // Defaults to 'info' level
    ->build();

// Custom log level
$client->withLogging(null, 'debug');  // debug, info, warning, or error

// Custom logger
$customLogger = new SecureLogger(true, 'debug');
$client->withLogging($customLogger);
```

**Note:** Sensitive data (API keys, tokens, passwords) is automatically masked in logs.

### Complete Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use BhrSdk\Client\ApiClient;

// Configure the client
$client = (new ApiClient())
    ->withOAuth('your-oauth-token')
    ->forCompany('acme')
    ->withLogging(null, 'info')
    ->withRetries(3)
    ->build();

try {
    // Get employee information
    // Note: getEmployee returns array<string,mixed>, use array access
    $employee = $client->employees()->getEmployee('firstName,lastName', '123');
    echo "Employee: {$employee['firstName']} {$employee['lastName']}\n";
    
    // Get time off requests
    $requests = $client->timeOff()->getTimeOffRequests();
    echo "Time off requests: " . count($requests) . "\n";
    
    // Get employee photo
    $photo = $client->photos()->getEmployeePhoto('123', 'small');
    
    // Access any API using getApi()
    $customApi = $client->getApi(\BhrSdk\Api\CustomReportsApi::class);
    
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
```

### Backward Compatibility

The traditional approach still works if you prefer it:

```php
$config = BhrSdk\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_API_KEY')
    ->setPassword('x');

$apiInstance = new BhrSdk\Api\EmployeesApi(
    new GuzzleHttp\Client(),
    $config
);
```

## Migration Guide

If you're upgrading from an older version of the SDK or transitioning from direct API calls:

- **[Complete Migration Guide](MIGRATION.md)** - Comprehensive guide for upgrading
- **[Migration Examples](examples/)** - Practical code examples showing before/after patterns

### ⚠️ Critical: Return Types

**Returns are arrays, not objects:**
```php
// ✓ Correct - use array access
$employee = $api->getEmployee('firstName,lastName', '123');
echo $employee['firstName'];

// ✗ Wrong - will cause fatal error
echo $employee->getFirstName();
```

**Method name changes:**
```php
$client->employeeFiles()  // ✓ Correct
$client->files()          // ✗ Doesn't exist
```

For detailed migration steps and troubleshooting, see [MIGRATION.md](MIGRATION.md).

### OAuth Token Refresh

The SDK supports automatic OAuth token refresh when using BambooHR's OAuth 2.0 flow:

```php
$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: 'your-access-token',
        refreshToken: 'your-refresh-token',
        clientId: 'your-oauth-client-id',
        clientSecret: 'your-oauth-client-secret',
        expiresIn: 3600  // Optional: seconds until token expires
    )
    ->forCompany('acme')
    ->build();

// SDK automatically refreshes the token when:
// 1. The token is about to expire (proactive refresh)
// 2. A 401 Unauthorized response is received (reactive refresh)
```

**Persisting Refreshed Tokens:**

When tokens are refreshed, you'll need to save the new tokens. Use the callback:

```php
$client = (new ApiClient())
    ->withOAuthRefresh(
        accessToken: $accessToken,
        refreshToken: $refreshToken,
        clientId: $clientId,
        clientSecret: $clientSecret
    )
    ->onTokenRefresh(function($newAccessToken, $newRefreshToken, $oldAccessToken, $oldRefreshToken) {
        // Save to database, session, cache, etc.
        saveUserTokens($userId, $newAccessToken, $newRefreshToken);
    })
    ->forCompany('acme')
    ->build();
```

**Note:** Token refresh only activates when both `accessToken` AND `refreshToken` are provided via `withOAuthRefresh()`. Using the standard `withOAuth()` method will not enable automatic refresh.

## API Endpoints

All URIs are relative to *https://companySubDomain.bamboohr.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountInformationApi* | [**getCountriesOptions**](docs/Api/AccountInformationApi.md#getcountriesoptions) | **GET** /api/v1/meta/countries/options | Get Countries
*AccountInformationApi* | [**getListOfUsers**](docs/Api/AccountInformationApi.md#getlistofusers) | **GET** /api/v1/meta/users | Get Users
*AccountInformationApi* | [**getStatesByCountryId**](docs/Api/AccountInformationApi.md#getstatesbycountryid) | **GET** /api/v1/meta/provinces/{countryId} | Get States by Country ID
*AccountInformationApi* | [**metadataAddOrUpdateValuesForListFields**](docs/Api/AccountInformationApi.md#metadataaddorupdatevaluesforlistfields) | **PUT** /api/v1/meta/lists/{listFieldId} | Create or Update List Field Values
*AccountInformationApi* | [**metadataGetAListOfFields**](docs/Api/AccountInformationApi.md#metadatagetalistoffields) | **GET** /api/v1/meta/fields | Get Fields
*AccountInformationApi* | [**metadataGetAListOfTabularFields**](docs/Api/AccountInformationApi.md#metadatagetalistoftabularfields) | **GET** /api/v1/meta/tables | Get Tabular Fields
*AccountInformationApi* | [**metadataGetDetailsForListFields**](docs/Api/AccountInformationApi.md#metadatagetdetailsforlistfields) | **GET** /api/v1/meta/lists | Get List Field Details
*ApplicantTrackingApi* | [**addNewCandidate**](docs/Api/ApplicantTrackingApi.md#addnewcandidate) | **POST** /api/v1/applicant_tracking/application | Create Candidate
*ApplicantTrackingApi* | [**addNewJobOpening**](docs/Api/ApplicantTrackingApi.md#addnewjobopening) | **POST** /api/v1/applicant_tracking/job_opening | Create Job Opening
*ApplicantTrackingApi* | [**getApplicationDetails**](docs/Api/ApplicantTrackingApi.md#getapplicationdetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Job Application Details
*ApplicantTrackingApi* | [**getApplications**](docs/Api/ApplicantTrackingApi.md#getapplications) | **GET** /api/v1/applicant_tracking/applications | Get Job Applications
*ApplicantTrackingApi* | [**getCompanyLocations**](docs/Api/ApplicantTrackingApi.md#getcompanylocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations
*ApplicantTrackingApi* | [**getHiringLeads**](docs/Api/ApplicantTrackingApi.md#gethiringleads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads
*ApplicantTrackingApi* | [**getJobSummaries**](docs/Api/ApplicantTrackingApi.md#getjobsummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries
*ApplicantTrackingApi* | [**getStatuses**](docs/Api/ApplicantTrackingApi.md#getstatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Applicant Statuses
*ApplicantTrackingApi* | [**postApplicantStatus**](docs/Api/ApplicantTrackingApi.md#postapplicantstatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Update Applicant Status
*ApplicantTrackingApi* | [**postApplicationComment**](docs/Api/ApplicantTrackingApi.md#postapplicationcomment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Create Job Application Comment
*BenefitsApi* | [**addEmployeeDependent**](docs/Api/BenefitsApi.md#addemployeedependent) | **POST** /api/v1/employeedependents | Create Employee Dependent
*BenefitsApi* | [**getBenefitCoverages**](docs/Api/BenefitsApi.md#getbenefitcoverages) | **GET** /api/v1/benefitcoverages | Get Benefit Coverages
*BenefitsApi* | [**getBenefitDeductionTypes**](docs/Api/BenefitsApi.md#getbenefitdeductiontypes) | **GET** /api/v1/benefits/settings/deduction_types/all | Get Benefit Deduction Types
*BenefitsApi* | [**getEmployeeDependent**](docs/Api/BenefitsApi.md#getemployeedependent) | **GET** /api/v1/employeedependents/{id} | Get Employee Dependent
*BenefitsApi* | [**getEmployeeDependents**](docs/Api/BenefitsApi.md#getemployeedependents) | **GET** /api/v1/employeedependents | Get Employee Dependents
*BenefitsApi* | [**getMemberBenefit**](docs/Api/BenefitsApi.md#getmemberbenefit) | **GET** /api/v1/benefit/member_benefit | Get Member Benefit Events
*BenefitsApi* | [**updateEmployeeDependent**](docs/Api/BenefitsApi.md#updateemployeedependent) | **PUT** /api/v1/employeedependents/{id} | Update Employee Dependent
*CompanyFilesApi* | [**addCompanyFileCategory**](docs/Api/CompanyFilesApi.md#addcompanyfilecategory) | **POST** /api/v1/files/categories | Create Company File Category
*CompanyFilesApi* | [**deleteCompanyFile**](docs/Api/CompanyFilesApi.md#deletecompanyfile) | **DELETE** /api/v1/files/{fileId} | Delete Company File
*CompanyFilesApi* | [**getCompanyFile**](docs/Api/CompanyFilesApi.md#getcompanyfile) | **GET** /api/v1/files/{fileId} | Get Company File
*CompanyFilesApi* | [**listCompanyFiles**](docs/Api/CompanyFilesApi.md#listcompanyfiles) | **GET** /api/v1/files/view | Get Company Files and Categories
*CompanyFilesApi* | [**updateCompanyFile**](docs/Api/CompanyFilesApi.md#updatecompanyfile) | **POST** /api/v1/files/{fileId} | Update Company File
*CompanyFilesApi* | [**uploadCompanyFile**](docs/Api/CompanyFilesApi.md#uploadcompanyfile) | **POST** /api/v1/files | Upload Company File
*CustomReportsApi* | [**getByReportId**](docs/Api/CustomReportsApi.md#getbyreportid) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID
*CustomReportsApi* | [**listReports**](docs/Api/CustomReportsApi.md#listreports) | **GET** /api/v1/custom-reports | Get Reports
*DatasetsApi* | [**getDataFromDataset**](docs/Api/DatasetsApi.md#getdatafromdataset) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset
*DatasetsApi* | [**getDatasets**](docs/Api/DatasetsApi.md#getdatasets) | **GET** /api/v1/datasets | Get Datasets
*DatasetsApi* | [**getFieldOptions**](docs/Api/DatasetsApi.md#getfieldoptions) | **POST** /api/v1/datasets/{datasetName}/field-options | Get Field Options
*DatasetsApi* | [**getFieldsFromDataset**](docs/Api/DatasetsApi.md#getfieldsfromdataset) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset
*EmployeeFilesApi* | [**addEmployeeFileCategory**](docs/Api/EmployeeFilesApi.md#addemployeefilecategory) | **POST** /api/v1/employees/files/categories | Create Employee File Category
*EmployeeFilesApi* | [**deleteEmployeeFile**](docs/Api/EmployeeFilesApi.md#deleteemployeefile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File
*EmployeeFilesApi* | [**getEmployeeFile**](docs/Api/EmployeeFilesApi.md#getemployeefile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get Employee File
*EmployeeFilesApi* | [**listEmployeeFiles**](docs/Api/EmployeeFilesApi.md#listemployeefiles) | **GET** /api/v1/employees/{id}/files/view | Get Employee Files and Categories
*EmployeeFilesApi* | [**updateEmployeeFile**](docs/Api/EmployeeFilesApi.md#updateemployeefile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File
*EmployeeFilesApi* | [**uploadEmployeeFile**](docs/Api/EmployeeFilesApi.md#uploademployeefile) | **POST** /api/v1/employees/{id}/files | Upload Employee File
*EmployeesApi* | [**addEmployee**](docs/Api/EmployeesApi.md#addemployee) | **POST** /api/v1/employees | Create Employee
*EmployeesApi* | [**getCompanyInformation**](docs/Api/EmployeesApi.md#getcompanyinformation) | **GET** /api/v1/company_information | Get Company Information
*EmployeesApi* | [**getEmployee**](docs/Api/EmployeesApi.md#getemployee) | **GET** /api/v1/employees/{id} | Get Employee
*EmployeesApi* | [**getEmployeesDirectory**](docs/Api/EmployeesApi.md#getemployeesdirectory) | **GET** /api/v1/employees/directory | Get Employee Directory
*EmployeesApi* | [**getEmployeesList**](docs/Api/EmployeesApi.md#getemployeeslist) | **GET** /api/v1/employees | Get Employees
*EmployeesApi* | [**updateEmployee**](docs/Api/EmployeesApi.md#updateemployee) | **POST** /api/v1/employees/{id} | Update Employee
*GoalsApi* | [**deleteGoal**](docs/Api/GoalsApi.md#deletegoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal
*GoalsApi* | [**deleteGoalComment**](docs/Api/GoalsApi.md#deletegoalcomment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment
*GoalsApi* | [**getCanCreateGoal**](docs/Api/GoalsApi.md#getcancreategoal) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Check Goal Creation Permission
*GoalsApi* | [**getGoalAggregate**](docs/Api/GoalsApi.md#getgoalaggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Goal Aggregate
*GoalsApi* | [**getGoalComments**](docs/Api/GoalsApi.md#getgoalcomments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Get Goal Comments
*GoalsApi* | [**getGoals**](docs/Api/GoalsApi.md#getgoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | Get Goals
*GoalsApi* | [**getGoalsAggregateV1**](docs/Api/GoalsApi.md#getgoalsaggregatev1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate
*GoalsApi* | [**getGoalsAggregateV11**](docs/Api/GoalsApi.md#getgoalsaggregatev11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate v1.1
*GoalsApi* | [**getGoalsAggregateV12**](docs/Api/GoalsApi.md#getgoalsaggregatev12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate v1.2
*GoalsApi* | [**getGoalsAlignmentOptions**](docs/Api/GoalsApi.md#getgoalsalignmentoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Get Alignable Goal Options
*GoalsApi* | [**getGoalsFiltersV1**](docs/Api/GoalsApi.md#getgoalsfiltersv1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goal Filters
*GoalsApi* | [**getGoalsFiltersV11**](docs/Api/GoalsApi.md#getgoalsfiltersv11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goal Filters v1.1
*GoalsApi* | [**getGoalsFiltersV12**](docs/Api/GoalsApi.md#getgoalsfiltersv12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Status Counts v1.2
*GoalsApi* | [**getGoalsShareOptions**](docs/Api/GoalsApi.md#getgoalsshareoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | Get Available Goal Sharing Options
*GoalsApi* | [**postCloseGoal**](docs/Api/GoalsApi.md#postclosegoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal
*GoalsApi* | [**postGoal**](docs/Api/GoalsApi.md#postgoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal
*GoalsApi* | [**postGoalComment**](docs/Api/GoalsApi.md#postgoalcomment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment
*GoalsApi* | [**postReopenGoal**](docs/Api/GoalsApi.md#postreopengoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen Goal
*GoalsApi* | [**putGoalComment**](docs/Api/GoalsApi.md#putgoalcomment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment
*GoalsApi* | [**putGoalMilestoneProgress**](docs/Api/GoalsApi.md#putgoalmilestoneprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress
*GoalsApi* | [**putGoalProgress**](docs/Api/GoalsApi.md#putgoalprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress
*GoalsApi* | [**putGoalSharedWith**](docs/Api/GoalsApi.md#putgoalsharedwith) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing
*GoalsApi* | [**putGoalV1**](docs/Api/GoalsApi.md#putgoalv1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal
*GoalsApi* | [**putGoalV11**](docs/Api/GoalsApi.md#putgoalv11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal v1.1
*HoursApi* | [**addTimeTrackingBulk**](docs/Api/HoursApi.md#addtimetrackingbulk) | **POST** /api/v1/timetracking/record | Create or Update Hour Records
*HoursApi* | [**addTimeTrackingHourRecord**](docs/Api/HoursApi.md#addtimetrackinghourrecord) | **POST** /api/v1/timetracking/add | Create Hour Record
*HoursApi* | [**deleteTimeTrackingById**](docs/Api/HoursApi.md#deletetimetrackingbyid) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record
*HoursApi* | [**editTimeTrackingRecord**](docs/Api/HoursApi.md#edittimetrackingrecord) | **PUT** /api/v1/timetracking/adjust | Update Hour Record
*HoursApi* | [**getTimeTrackingRecord**](docs/Api/HoursApi.md#gettimetrackingrecord) | **GET** /api/v1/timetracking/record/{id} | Get Hour Record
*LastChangeInformationApi* | [**getChangedEmployeeIds**](docs/Api/LastChangeInformationApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Get Updated Employee IDs
*LoginApi* | [**login**](docs/Api/LoginApi.md#login) | **POST** /api/v1/login | User Login
*PhotosApi* | [**getEmployeePhoto**](docs/Api/PhotosApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get Employee Photo
*PhotosApi* | [**uploadEmployeePhoto**](docs/Api/PhotosApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Upload Employee Photo
*ReportsApi* | [**getCompanyReport**](docs/Api/ReportsApi.md#getcompanyreport) | **GET** /api/v1/reports/{id} | Get Company Report
*ReportsApi* | [**requestCustomReport**](docs/Api/ReportsApi.md#requestcustomreport) | **POST** /api/v1/reports/custom | Request Custom Report
*TabularDataApi* | [**addEmployeeTableRow**](docs/Api/TabularDataApi.md#addemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table} | Create Table Row
*TabularDataApi* | [**addEmployeeTableRowV1**](docs/Api/TabularDataApi.md#addemployeetablerowv1) | **POST** /api/v1_1/employees/{id}/tables/{table} | Create Table Row v1.1
*TabularDataApi* | [**deleteEmployeeTableRowV1**](docs/Api/TabularDataApi.md#deleteemployeetablerowv1) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Delete Table Row
*TabularDataApi* | [**getChangedEmployeeTableData**](docs/Api/TabularDataApi.md#getchangedemployeetabledata) | **GET** /api/v1/employees/changed/tables/{table} | Get Changed Employee Table Data
*TabularDataApi* | [**getEmployeeTableRow**](docs/Api/TabularDataApi.md#getemployeetablerow) | **GET** /api/v1/employees/{id}/tables/{table} | Get Employee Table Rows
*TabularDataApi* | [**updateEmployeeTableRow**](docs/Api/TabularDataApi.md#updateemployeetablerow) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Update Table Row
*TabularDataApi* | [**updateEmployeeTableRowV**](docs/Api/TabularDataApi.md#updateemployeetablerowv) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Update Table Row v1.1
*TimeOffApi* | [**getAListOfWhoIsOut**](docs/Api/TimeOffApi.md#getalistofwhoisout) | **GET** /api/v1/time_off/whos_out | Get Who’s Out
*TimeOffApi* | [**getTimeOffPolicies**](docs/Api/TimeOffApi.md#gettimeoffpolicies) | **GET** /api/v1/meta/time_off/policies | Get Time Off Policies
*TimeOffApi* | [**getTimeOffTypes**](docs/Api/TimeOffApi.md#gettimeofftypes) | **GET** /api/v1/meta/time_off/types | Get Time Off Types
*TimeOffApi* | [**timeOffAddATimeOffHistoryItemForTimeOffRequest**](docs/Api/TimeOffApi.md#timeoffaddatimeoffhistoryitemfortimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Create Time Off Request History Item
*TimeOffApi* | [**timeOffAddATimeOffRequest**](docs/Api/TimeOffApi.md#timeoffaddatimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Create Time Off Request
*TimeOffApi* | [**timeOffAdjustTimeOffBalance**](docs/Api/TimeOffApi.md#timeoffadjusttimeoffbalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Update Time Off Balance
*TimeOffApi* | [**timeOffAssignTimeOffPoliciesForAnEmployee**](docs/Api/TimeOffApi.md#timeoffassigntimeoffpoliciesforanemployee) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies
*TimeOffApi* | [**timeOffAssignTimeOffPoliciesForAnEmployeeV11**](docs/Api/TimeOffApi.md#timeoffassigntimeoffpoliciesforanemployeev11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies v1.1
*TimeOffApi* | [**timeOffChangeARequestStatus**](docs/Api/TimeOffApi.md#timeoffchangearequeststatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Update Time Off Request Status
*TimeOffApi* | [**timeOffEstimateFutureTimeOffBalances**](docs/Api/TimeOffApi.md#timeoffestimatefuturetimeoffbalances) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Estimate Future Time Off Balances
*TimeOffApi* | [**timeOffGetTimeOffRequests**](docs/Api/TimeOffApi.md#timeoffgettimeoffrequests) | **GET** /api/v1/time_off/requests | Get Time Off Requests
*TimeOffApi* | [**timeOffListTimeOffPoliciesForEmployee**](docs/Api/TimeOffApi.md#timeofflisttimeoffpoliciesforemployee) | **GET** /api/v1/employees/{employeeId}/time_off/policies | Get Time Off Policies for Employee
*TimeOffApi* | [**timeOffListTimeOffPoliciesForEmployeeV11**](docs/Api/TimeOffApi.md#timeofflisttimeoffpoliciesforemployeev11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | Get Time Off Policies for Employee v1.1
*TimeTrackingApi* | [**addEditTimesheetClockEntries**](docs/Api/TimeTrackingApi.md#addedittimesheetclockentries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries
*TimeTrackingApi* | [**addEditTimesheetHourEntries**](docs/Api/TimeTrackingApi.md#addedittimesheethourentries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries
*TimeTrackingApi* | [**addTimesheetClockInEntry**](docs/Api/TimeTrackingApi.md#addtimesheetclockinentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry
*TimeTrackingApi* | [**addTimesheetClockOutEntry**](docs/Api/TimeTrackingApi.md#addtimesheetclockoutentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry
*TimeTrackingApi* | [**createTimeTrackingProject**](docs/Api/TimeTrackingApi.md#createtimetrackingproject) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project
*TimeTrackingApi* | [**deleteTimesheetClockEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheetclockentriesviapost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*TimeTrackingApi* | [**deleteTimesheetHourEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheethourentriesviapost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*TimeTrackingApi* | [**getTimesheetEntries**](docs/Api/TimeTrackingApi.md#gettimesheetentries) | **GET** /api/v1/time_tracking/timesheet_entries | Get Timesheet Entries
*TrainingApi* | [**addNewEmployeeTrainingRecord**](docs/Api/TrainingApi.md#addnewemployeetrainingrecord) | **POST** /api/v1/training/record/employee/{employeeId} | Create Employee Training Record
*TrainingApi* | [**addTrainingCategory**](docs/Api/TrainingApi.md#addtrainingcategory) | **POST** /api/v1/training/category | Create Training Category
*TrainingApi* | [**addTrainingType**](docs/Api/TrainingApi.md#addtrainingtype) | **POST** /api/v1/training/type | Create Training Type
*TrainingApi* | [**deleteEmployeeTrainingRecord**](docs/Api/TrainingApi.md#deleteemployeetrainingrecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record
*TrainingApi* | [**deleteTrainingCategory**](docs/Api/TrainingApi.md#deletetrainingcategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category
*TrainingApi* | [**deleteTrainingType**](docs/Api/TrainingApi.md#deletetrainingtype) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type
*TrainingApi* | [**listEmployeeTrainings**](docs/Api/TrainingApi.md#listemployeetrainings) | **GET** /api/v1/training/record/employee/{employeeId} | Get Employee Trainings
*TrainingApi* | [**listTrainingCategories**](docs/Api/TrainingApi.md#listtrainingcategories) | **GET** /api/v1/training/category | Get Training Categories
*TrainingApi* | [**listTrainingTypes**](docs/Api/TrainingApi.md#listtrainingtypes) | **GET** /api/v1/training/type | Get Training Types
*TrainingApi* | [**updateEmployeeTrainingRecord**](docs/Api/TrainingApi.md#updateemployeetrainingrecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record
*TrainingApi* | [**updateTrainingCategory**](docs/Api/TrainingApi.md#updatetrainingcategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category
*TrainingApi* | [**updateTrainingType**](docs/Api/TrainingApi.md#updatetrainingtype) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type
*WebhooksApi* | [**deleteWebhook**](docs/Api/WebhooksApi.md#deletewebhook) | **DELETE** /api/v1/webhooks/{id} | Delete Webhook
*WebhooksApi* | [**getMonitorFields**](docs/Api/WebhooksApi.md#getmonitorfields) | **GET** /api/v1/webhooks/monitor_fields | Get Monitor Fields
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook
*WebhooksApi* | [**getWebhookList**](docs/Api/WebhooksApi.md#getwebhooklist) | **GET** /api/v1/webhooks | Get Webhooks
*WebhooksApi* | [**getWebhookLogs**](docs/Api/WebhooksApi.md#getwebhooklogs) | **GET** /api/v1/webhooks/{id}/log | Get Webhook Logs
*WebhooksApi* | [**postWebhook**](docs/Api/WebhooksApi.md#postwebhook) | **POST** /api/v1/webhooks | Create Webhook
*WebhooksApi* | [**putWebhook**](docs/Api/WebhooksApi.md#putwebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook

## Models

- [AddNewEmployeeTrainingRecordRequest](docs/Model/AddNewEmployeeTrainingRecordRequest.md)
- [AddNewEmployeeTrainingRecordRequestCost](docs/Model/AddNewEmployeeTrainingRecordRequestCost.md)
- [AddTrainingCategoryRequest](docs/Model/AddTrainingCategoryRequest.md)
- [AddTrainingTypeRequest](docs/Model/AddTrainingTypeRequest.md)
- [AddTrainingTypeRequestCategory](docs/Model/AddTrainingTypeRequestCategory.md)
- [AdjustTimeOffBalance](docs/Model/AdjustTimeOffBalance.md)
- [AdjustTimeTrackingRequestSchema](docs/Model/AdjustTimeTrackingRequestSchema.md)
- [ApplicationDetails](docs/Model/ApplicationDetails.md)
- [ApplicationDetailsApplicant](docs/Model/ApplicationDetailsApplicant.md)
- [ApplicationDetailsJob](docs/Model/ApplicationDetailsJob.md)
- [ApplicationDetailsQuestionsAndAnswersInner](docs/Model/ApplicationDetailsQuestionsAndAnswersInner.md)
- [ApplicationDetailsQuestionsAndAnswersInnerAnswer](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerAnswer.md)
- [ApplicationDetailsQuestionsAndAnswersInnerQuestion](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerQuestion.md)
- [ApplicationDetailsStatus](docs/Model/ApplicationDetailsStatus.md)
- [ApplicationsList](docs/Model/ApplicationsList.md)
- [ApplicationsListApplications](docs/Model/ApplicationsListApplications.md)
- [ApplicationsListApplicationsItemsInner](docs/Model/ApplicationsListApplicationsItemsInner.md)
- [ApplicationsListApplicationsItemsInnerApplicant](docs/Model/ApplicationsListApplicationsItemsInnerApplicant.md)
- [ApplicationsListApplicationsItemsInnerJob](docs/Model/ApplicationsListApplicationsItemsInnerJob.md)
- [ApplicationsListApplicationsItemsInnerStatus](docs/Model/ApplicationsListApplicationsItemsInnerStatus.md)
- [ClockEntriesSchema](docs/Model/ClockEntriesSchema.md)
- [ClockEntryIdsSchema](docs/Model/ClockEntryIdsSchema.md)
- [ClockEntrySchema](docs/Model/ClockEntrySchema.md)
- [ClockInRequestSchema](docs/Model/ClockInRequestSchema.md)
- [ClockOutRequestSchema](docs/Model/ClockOutRequestSchema.md)
- [CompanyFileUpdate](docs/Model/CompanyFileUpdate.md)
- [CompanyInformation](docs/Model/CompanyInformation.md)
- [CompanyInformationAddress](docs/Model/CompanyInformationAddress.md)
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
- [Employee](docs/Model/Employee.md)
- [EmployeeDependent](docs/Model/EmployeeDependent.md)
- [EmployeeFileUpdate](docs/Model/EmployeeFileUpdate.md)
- [EmployeeResponse](docs/Model/EmployeeResponse.md)
- [EmployeeResponseAggregationsInner](docs/Model/EmployeeResponseAggregationsInner.md)
- [EmployeeTimesheetEntryTransformer](docs/Model/EmployeeTimesheetEntryTransformer.md)
- [Field](docs/Model/Field.md)
- [FieldList](docs/Model/FieldList.md)
- [FieldListFieldsInner](docs/Model/FieldListFieldsInner.md)
- [FieldOptionsRequestSchema](docs/Model/FieldOptionsRequestSchema.md)
- [FieldOptionsRequestSchemaDependentFieldsValueInner](docs/Model/FieldOptionsRequestSchemaDependentFieldsValueInner.md)
- [FieldOptionsTransformer](docs/Model/FieldOptionsTransformer.md)
- [Forbidden](docs/Model/Forbidden.md)
- [GetEmployeesEmployeeResponse](docs/Model/GetEmployeesEmployeeResponse.md)
- [GetEmployeesFilterRequestObject](docs/Model/GetEmployeesFilterRequestObject.md)
- [GetEmployeesResponseObject](docs/Model/GetEmployeesResponseObject.md)
- [GetEmployeesResponseObjectLinks](docs/Model/GetEmployeesResponseObjectLinks.md)
- [GetGoalsAlignmentOptionsRequest](docs/Model/GetGoalsAlignmentOptionsRequest.md)
- [Goal](docs/Model/Goal.md)
- [GoalAggregate](docs/Model/GoalAggregate.md)
- [GoalAggregateAlignsWithOptionsInner](docs/Model/GoalAggregateAlignsWithOptionsInner.md)
- [GoalAggregateCommentsInner](docs/Model/GoalAggregateCommentsInner.md)
- [GoalAggregatePersonsInner](docs/Model/GoalAggregatePersonsInner.md)
- [GoalFiltersV1](docs/Model/GoalFiltersV1.md)
- [GoalFiltersV11](docs/Model/GoalFiltersV11.md)
- [GoalFiltersV11FiltersInner](docs/Model/GoalFiltersV11FiltersInner.md)
- [GoalFiltersV11FiltersInnerActions](docs/Model/GoalFiltersV11FiltersInnerActions.md)
- [GoalFiltersV1FiltersInner](docs/Model/GoalFiltersV1FiltersInner.md)
- [GoalsAggregateV1](docs/Model/GoalsAggregateV1.md)
- [GoalsAggregateV11](docs/Model/GoalsAggregateV11.md)
- [GoalsAggregateV11CommentsInner](docs/Model/GoalsAggregateV11CommentsInner.md)
- [GoalsAggregateV12](docs/Model/GoalsAggregateV12.md)
- [GoalsAggregateV12CommentsInner](docs/Model/GoalsAggregateV12CommentsInner.md)
- [GoalsAggregateV1CommentsInner](docs/Model/GoalsAggregateV1CommentsInner.md)
- [GoalsAggregateV1PersonsInner](docs/Model/GoalsAggregateV1PersonsInner.md)
- [GoalsList](docs/Model/GoalsList.md)
- [HiringLead](docs/Model/HiringLead.md)
- [HiringLeadsList](docs/Model/HiringLeadsList.md)
- [HourEntriesRequestSchema](docs/Model/HourEntriesRequestSchema.md)
- [HourEntryIdsSchema](docs/Model/HourEntryIdsSchema.md)
- [HourEntrySchema](docs/Model/HourEntrySchema.md)
- [InternalServerError](docs/Model/InternalServerError.md)
- [InvalidRequest](docs/Model/InvalidRequest.md)
- [InvalidRequestError](docs/Model/InvalidRequestError.md)
- [JsonDirectoryEmployee](docs/Model/JsonDirectoryEmployee.md)
- [JsonDirectoryEmployeeFieldsInner](docs/Model/JsonDirectoryEmployeeFieldsInner.md)
- [ListFieldValues](docs/Model/ListFieldValues.md)
- [ListFieldValuesOptionsInner](docs/Model/ListFieldValuesOptionsInner.md)
- [Location](docs/Model/Location.md)
- [LocationsList](docs/Model/LocationsList.md)
- [MemberBenefitEvent](docs/Model/MemberBenefitEvent.md)
- [MemberBenefitEventMembersInner](docs/Model/MemberBenefitEventMembersInner.md)
- [MemberBenefitEventMembersInnerCoveragesInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInner.md)
- [MemberBenefitEventMembersInnerCoveragesInnerEventsInner](docs/Model/MemberBenefitEventMembersInnerCoveragesInnerEventsInner.md)
- [NewWebHook](docs/Model/NewWebHook.md)
- [Pagination](docs/Model/Pagination.md)
- [PostApplicantStatusRequest](docs/Model/PostApplicantStatusRequest.md)
- [PostApplicationCommentRequest](docs/Model/PostApplicationCommentRequest.md)
- [PostGoalRequest](docs/Model/PostGoalRequest.md)
- [PostGoalRequestMilestonesInner](docs/Model/PostGoalRequestMilestonesInner.md)
- [PostNewEmployee](docs/Model/PostNewEmployee.md)
- [ProjectCreateRequestSchema](docs/Model/ProjectCreateRequestSchema.md)
- [ProjectInfoApiTransformer](docs/Model/ProjectInfoApiTransformer.md)
- [ProjectInfoApiTransformerProject](docs/Model/ProjectInfoApiTransformerProject.md)
- [ProjectInfoApiTransformerTask](docs/Model/ProjectInfoApiTransformerTask.md)
- [PutGoalMilestoneProgressRequest](docs/Model/PutGoalMilestoneProgressRequest.md)
- [PutGoalProgressRequest](docs/Model/PutGoalProgressRequest.md)
- [PutGoalSharedWithRequest](docs/Model/PutGoalSharedWithRequest.md)
- [PutGoalV11Request](docs/Model/PutGoalV11Request.md)
- [PutGoalV11RequestMilestonesInner](docs/Model/PutGoalV11RequestMilestonesInner.md)
- [Report](docs/Model/Report.md)
- [ReportsResponse](docs/Model/ReportsResponse.md)
- [Request](docs/Model/Request.md)
- [RequestCustomReport](docs/Model/RequestCustomReport.md)
- [RequestCustomReportFilters](docs/Model/RequestCustomReportFilters.md)
- [RequestCustomReportFiltersLastChanged](docs/Model/RequestCustomReportFiltersLastChanged.md)
- [State](docs/Model/State.md)
- [StateProvinceResponseSchema](docs/Model/StateProvinceResponseSchema.md)
- [StateProvinceSchema](docs/Model/StateProvinceSchema.md)
- [TableRowDeleteResponse](docs/Model/TableRowDeleteResponse.md)
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
- [TrainingCategoryList](docs/Model/TrainingCategoryList.md)
- [TrainingRecord](docs/Model/TrainingRecord.md)
- [TrainingRecordList](docs/Model/TrainingRecordList.md)
- [TrainingType](docs/Model/TrainingType.md)
- [TrainingTypeList](docs/Model/TrainingTypeList.md)
- [TransformedApiEmployeeGoalDetails](docs/Model/TransformedApiEmployeeGoalDetails.md)
- [TransformedApiEmployeeGoalDetailsGoal](docs/Model/TransformedApiEmployeeGoalDetailsGoal.md)
- [TransformedApiGoal](docs/Model/TransformedApiGoal.md)
- [TransformedApiGoalGoal](docs/Model/TransformedApiGoalGoal.md)
- [TransformedApiGoalGoalActions](docs/Model/TransformedApiGoalGoalActions.md)
- [TransformedApiGoalGoalMilestonesInner](docs/Model/TransformedApiGoalGoalMilestonesInner.md)
- [Unauthorized](docs/Model/Unauthorized.md)
- [Unauthorized1](docs/Model/Unauthorized1.md)
- [UnauthorizedErrorsInner](docs/Model/UnauthorizedErrorsInner.md)
- [UpdateEmployeeTrainingRecordRequest](docs/Model/UpdateEmployeeTrainingRecordRequest.md)
- [UpdateTrainingCategoryRequest](docs/Model/UpdateTrainingCategoryRequest.md)
- [UpdateTrainingTypeRequest](docs/Model/UpdateTrainingTypeRequest.md)
- [UpdateTrainingTypeRequestCategory](docs/Model/UpdateTrainingTypeRequestCategory.md)
- [WebHookLogResponse](docs/Model/WebHookLogResponse.md)
- [WebHookResponse](docs/Model/WebHookResponse.md)
- [Webhook](docs/Model/Webhook.md)
- [WebhookBadRequest](docs/Model/WebhookBadRequest.md)
- [WebhookError](docs/Model/WebhookError.md)
- [WebhookErrorErrors](docs/Model/WebhookErrorErrors.md)
- [WebhookSubErrorProperty](docs/Model/WebhookSubErrorProperty.md)
- [WebhookSubErrorPropertyPostFieldsInner](docs/Model/WebhookSubErrorPropertyPostFieldsInner.md)
- [WebhookSubErrorPropertyUnknownFieldsInner](docs/Model/WebhookSubErrorPropertyUnknownFieldsInner.md)
- [WebhooksList](docs/Model/WebhooksList.md)
- [WebhooksListWebhooksInner](docs/Model/WebhooksListWebhooksInner.md)
- [XmlDirectoryEmployee](docs/Model/XmlDirectoryEmployee.md)
- [XmlDirectoryEmployeeEmployees](docs/Model/XmlDirectoryEmployeeEmployees.md)
- [XmlDirectoryEmployeeEmployeesEmployeeInner](docs/Model/XmlDirectoryEmployeeEmployeesEmployeeInner.md)
- [XmlDirectoryEmployeeEmployeesEmployeeInnerFieldInner](docs/Model/XmlDirectoryEmployeeEmployeesEmployeeInnerFieldInner.md)
- [XmlDirectoryEmployeeFieldset](docs/Model/XmlDirectoryEmployeeFieldset.md)
- [XmlDirectoryEmployeeFieldsetFieldInner](docs/Model/XmlDirectoryEmployeeFieldsetFieldInner.md)

## Exceptions

- [Exceptions](docs/Exceptions/Exceptions.md) - Information about exceptions, potential causes, and debugging tips

## Authorization
Authentication schemes defined for the API:

### oauth
- Type: OAuth
- Flow: client credentials
- Authorization URL: https://{companyDomain}.bamboohr.com/authorize.php
- Scopes: N/A

To authenticate with OAuth, use the `withOAuth()` method outlined in the [Authentication Methods](#authentication-methods) section.

Or use the `withOAuthRefresh()` method to enable automatic token refresh, as outlined in the [OAuth Token Refresh](#oauth-token-refresh) section.

### api key
- Type: HTTP Basic Authentication
- The API key is used as the username with a fixed password of 'x'
- API keys provide full access to your BambooHR account
- Generate API keys in your BambooHR account under Account > API Keys

To authenticate with an API key, use the `withApiKey()` method, as outlined in the [Authentication Methods](#authentication-methods) section.

**Security Note:** Store your API key securely and never expose it in client-side code.

Also refer to the getting started docs found here: https://documentation.bamboohr.com/docs/getting-started

## Contributing

We welcome contributions to improve this SDK! Here's how you can help:

### Bug Reports and Feature Requests

Please use the issue tracker to report any bugs or request features.

### Pull Requests

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run the tests to ensure everything works
5. Commit your changes (`git commit -m 'Add some amazing feature'`)
6. Push to the branch (`git push origin feature/amazing-feature`)
7. Open a Pull Request

### Development Guidelines

- Follow the existing code style and conventions
- Add/update tests for any new or changed functionality
- Update documentation as needed (if updating this readme, update the mustache template and run `make generate`)
- Keep pull requests focused on a single topic
- Run code quality tools before submitting your code:

```bash
# Check code style with PHP_CodeSniffer
make phpcs

# Run static analysis with PHPStan
make phpstan
```

### Testing

Before submitting a pull request, make sure all tests pass:

```bash
# First, install dependencies if you haven't already
composer install

# Then run the test suite
make test

# To run specific tests with phpunit directly
vendor/bin/phpunit tests/path/to/TestFile.php
vendor/bin/phpunit --filter=testMethodName
```

## Generating SDK

NOTE: this requires a public OpenAPI spec file, which is only available to BambooHR developers.
The path to the spec file is specified by the `OPENAPI_SPEC_PATH` environment variable.

To generate the SDK, run:

```bash
make generate
```

### Manual changes to the auto-generated code

If you need to make manual changes to the auto-generated code, update the corresponding template in the `templates-php` directory and run `make generate` to regenerate the SDK.
We have updated most of the templates fairly extensively to conform to our coding standards.

Nearly all files under `lib` and `test` are generated by the `make generate` command, with the following exceptions and notes:
- `lib/Api/ManualApi.php`
- `lib/ApiErrorHelper.php`
- `lib/ApiHelper.php`
- `lib/Client/*` (all files in this directory)
- `test/Client/*` (all files in this directory)
- `test/ApiErrorHelperTest.php`

Custom descriptions for some API docs are added in the `scripts/add_custom_headers_to_api_docs.sh` script, which is run as part of the `make generate` command.

*Note: regeneration will not force an overwrite of tests in the `test` directory, unless tests are deleted first.*

### Generating Error Documentation

The error documentation is automatically generated from the error messages defined in `ApiErrorHelper.php`. To update the documentation when error messages are added or modified, run:

```bash
make generate-error-docs
```

Note that this script will also run as part of the `make generate` command.

This will:

1. Regenerate the `docs/Exceptions/Exceptions.md` file with the latest error information
2. Generate exception classes in `lib/Exceptions/` for each error type
3. Generate exception documentation in `docs/Exceptions/Classes/`

## Support

If you encounter any issues or need assistance with this SDK, please contact us through one of these channels:

- **Documentation**: Refer to the [official documentation](https://www.bamboohr.com/api/documentation)
- **Community**: Check existing issues and discussions for similar problems
- **Issue Tracker**: Submit bugs and feature requests through our GitHub issue tracker

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0`
    - Package version: `2.0.1`
    - Generator version: `7.16.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
