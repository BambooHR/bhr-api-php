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
*AccountInformationApi* | [**call5c5fb0f1211ae1c9451753f92f1053b6**](docs/Api/AccountInformationApi.md#call5c5fb0f1211ae1c9451753f92f1053b6) | **GET** /api/v1/meta/timezones | List timezones
*AccountInformationApi* | [**getCountriesOptions**](docs/Api/AccountInformationApi.md#getcountriesoptions) | **GET** /api/v1/meta/countries/options | Get Countries
*AccountInformationApi* | [**getStatesByCountryId**](docs/Api/AccountInformationApi.md#getstatesbycountryid) | **GET** /api/v1/meta/provinces/{countryId} | Get States by Country ID
*AccountInformationApi* | [**listFields**](docs/Api/AccountInformationApi.md#listfields) | **GET** /api/v1/meta/fields | List Fields
*AccountInformationApi* | [**listListFields**](docs/Api/AccountInformationApi.md#listlistfields) | **GET** /api/v1/meta/lists | List List Fields
*AccountInformationApi* | [**listTabularFields**](docs/Api/AccountInformationApi.md#listtabularfields) | **GET** /api/v1/meta/tables | List Tabular Fields
*AccountInformationApi* | [**listUsers**](docs/Api/AccountInformationApi.md#listusers) | **GET** /api/v1/meta/users | List Users
*AccountInformationApi* | [**updateListFieldValues**](docs/Api/AccountInformationApi.md#updatelistfieldvalues) | **PUT** /api/v1/meta/lists/{listFieldId} | Update List Field Values
*ApplicantTrackingApi* | [**createApplicationComment**](docs/Api/ApplicantTrackingApi.md#createapplicationcomment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Create Job Application Comment
*ApplicantTrackingApi* | [**createCandidate**](docs/Api/ApplicantTrackingApi.md#createcandidate) | **POST** /api/v1/applicant_tracking/application | Create Candidate
*ApplicantTrackingApi* | [**createJobOpening**](docs/Api/ApplicantTrackingApi.md#createjobopening) | **POST** /api/v1/applicant_tracking/job_opening | Create Job Opening
*ApplicantTrackingApi* | [**getApplicationDetails**](docs/Api/ApplicantTrackingApi.md#getapplicationdetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Job Application Details
*ApplicantTrackingApi* | [**getApplications**](docs/Api/ApplicantTrackingApi.md#getapplications) | **GET** /api/v1/applicant_tracking/applications | Get Job Applications
*ApplicantTrackingApi* | [**getCompanyLocations**](docs/Api/ApplicantTrackingApi.md#getcompanylocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations
*ApplicantTrackingApi* | [**getHiringLeads**](docs/Api/ApplicantTrackingApi.md#gethiringleads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads
*ApplicantTrackingApi* | [**getJobSummaries**](docs/Api/ApplicantTrackingApi.md#getjobsummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries
*ApplicantTrackingApi* | [**getStatuses**](docs/Api/ApplicantTrackingApi.md#getstatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Applicant Statuses
*ApplicantTrackingApi* | [**updateApplicantStatus**](docs/Api/ApplicantTrackingApi.md#updateapplicantstatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Update Applicant Status
*BenefitsApi* | [**createEmployeeDependent**](docs/Api/BenefitsApi.md#createemployeedependent) | **POST** /api/v1/employeedependents | Create Employee Dependent
*BenefitsApi* | [**getEmployeeDependent**](docs/Api/BenefitsApi.md#getemployeedependent) | **GET** /api/v1/employeedependents/{id} | Get Employee Dependent
*BenefitsApi* | [**getMemberBenefits**](docs/Api/BenefitsApi.md#getmemberbenefits) | **GET** /api/v1/benefits/member-benefits | Get Member Benefits
*BenefitsApi* | [**listBenefitCoverages**](docs/Api/BenefitsApi.md#listbenefitcoverages) | **GET** /api/v1/benefitcoverages | List Benefit Coverages
*BenefitsApi* | [**listBenefitDeductionTypes**](docs/Api/BenefitsApi.md#listbenefitdeductiontypes) | **GET** /api/v1/benefits/settings/deduction_types/all | List Benefit Deduction Types
*BenefitsApi* | [**listCompanyBenefits**](docs/Api/BenefitsApi.md#listcompanybenefits) | **GET** /api/v1/benefit/company_benefit | List Company Benefits
*BenefitsApi* | [**listEmployeeBenefits**](docs/Api/BenefitsApi.md#listemployeebenefits) | **GET** /api/v1/benefit/employee_benefit | List Employee Benefits
*BenefitsApi* | [**listEmployeeDependents**](docs/Api/BenefitsApi.md#listemployeedependents) | **GET** /api/v1/employeedependents | List Employee Dependents
*BenefitsApi* | [**listMemberBenefitEvents**](docs/Api/BenefitsApi.md#listmemberbenefitevents) | **GET** /api/v1/benefit/member_benefit | List Member Benefit Events
*BenefitsApi* | [**updateEmployeeDependent**](docs/Api/BenefitsApi.md#updateemployeedependent) | **PUT** /api/v1/employeedependents/{id} | Update Employee Dependent
*CompanyFilesApi* | [**addCompanyFileCategory**](docs/Api/CompanyFilesApi.md#addcompanyfilecategory) | **POST** /api/v1/files/categories | Create Company File Category
*CompanyFilesApi* | [**deleteCompanyFile**](docs/Api/CompanyFilesApi.md#deletecompanyfile) | **DELETE** /api/v1/files/{fileId} | Delete Company File
*CompanyFilesApi* | [**getCompanyFile**](docs/Api/CompanyFilesApi.md#getcompanyfile) | **GET** /api/v1/files/{fileId} | Get Company File
*CompanyFilesApi* | [**listCompanyFiles**](docs/Api/CompanyFilesApi.md#listcompanyfiles) | **GET** /api/v1/files/view | Get Company Files and Categories
*CompanyFilesApi* | [**updateCompanyFile**](docs/Api/CompanyFilesApi.md#updatecompanyfile) | **POST** /api/v1/files/{fileId} | Update Company File
*CompanyFilesApi* | [**uploadCompanyFile**](docs/Api/CompanyFilesApi.md#uploadcompanyfile) | **POST** /api/v1/files | Upload Company File
*CompanyProfileApi* | [**getCompanyProfileIntegrations**](docs/Api/CompanyProfileApi.md#getcompanyprofileintegrations) | **GET** /api/v1/company-profile-integrations | Get Company Profile Integrations
*CustomReportsApi* | [**getByReportId**](docs/Api/CustomReportsApi.md#getbyreportid) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID
*CustomReportsApi* | [**listReports**](docs/Api/CustomReportsApi.md#listreports) | **GET** /api/v1/custom-reports | List Reports
*DatasetsApi* | [**getDataFromDataset**](docs/Api/DatasetsApi.md#getdatafromdataset) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset
*DatasetsApi* | [**getDatasets**](docs/Api/DatasetsApi.md#getdatasets) | **GET** /api/v1/datasets | Get Datasets
*DatasetsApi* | [**getDatasetsV12**](docs/Api/DatasetsApi.md#getdatasetsv12) | **GET** /api/v1_2/datasets | Get Datasets v1.2
*DatasetsApi* | [**getFieldOptions**](docs/Api/DatasetsApi.md#getfieldoptions) | **POST** /api/v1/datasets/{datasetName}/field-options | Get Field Options
*DatasetsApi* | [**getFieldOptionsV12**](docs/Api/DatasetsApi.md#getfieldoptionsv12) | **POST** /api/v1_2/datasets/{datasetName}/field-options | Get Field Options v1.2
*DatasetsApi* | [**getFieldsFromDataset**](docs/Api/DatasetsApi.md#getfieldsfromdataset) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset
*DatasetsApi* | [**getFieldsFromDatasetV12**](docs/Api/DatasetsApi.md#getfieldsfromdatasetv12) | **GET** /api/v1_2/datasets/{datasetName}/fields | Get Fields from Dataset v1.2
*EmployeeFilesApi* | [**addEmployeeFileCategory**](docs/Api/EmployeeFilesApi.md#addemployeefilecategory) | **POST** /api/v1/employees/files/categories | Create Employee File Category
*EmployeeFilesApi* | [**deleteEmployeeFile**](docs/Api/EmployeeFilesApi.md#deleteemployeefile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File
*EmployeeFilesApi* | [**getEmployeeFile**](docs/Api/EmployeeFilesApi.md#getemployeefile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get Employee File
*EmployeeFilesApi* | [**listEmployeeFiles**](docs/Api/EmployeeFilesApi.md#listemployeefiles) | **GET** /api/v1/employees/{id}/files/view | List Employee Files
*EmployeeFilesApi* | [**updateEmployeeFile**](docs/Api/EmployeeFilesApi.md#updateemployeefile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File
*EmployeeFilesApi* | [**uploadEmployeeFile**](docs/Api/EmployeeFilesApi.md#uploademployeefile) | **POST** /api/v1/employees/{id}/files | Upload Employee File
*EmployeesApi* | [**createEmployee**](docs/Api/EmployeesApi.md#createemployee) | **POST** /api/v1/employees | Create Employee
*EmployeesApi* | [**getCompanyInformation**](docs/Api/EmployeesApi.md#getcompanyinformation) | **GET** /api/v1/company_information | Get Company Information
*EmployeesApi* | [**getEmployee**](docs/Api/EmployeesApi.md#getemployee) | **GET** /api/v1/employees/{id} | Get Employee
*EmployeesApi* | [**getEmployeesDirectory**](docs/Api/EmployeesApi.md#getemployeesdirectory) | **GET** /api/v1/employees/directory | Get Employee Directory
*EmployeesApi* | [**listEmployees**](docs/Api/EmployeesApi.md#listemployees) | **GET** /api/v1/employees | List Employees
*EmployeesApi* | [**updateEmployee**](docs/Api/EmployeesApi.md#updateemployee) | **POST** /api/v1/employees/{id} | Update Employee
*GoalsApi* | [**closeGoal**](docs/Api/GoalsApi.md#closegoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/close | Close Goal
*GoalsApi* | [**createGoal**](docs/Api/GoalsApi.md#creategoal) | **POST** /api/v1/performance/employees/{employeeId}/goals | Create Goal
*GoalsApi* | [**createGoalComment**](docs/Api/GoalsApi.md#creategoalcomment) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | Create Goal Comment
*GoalsApi* | [**deleteGoal**](docs/Api/GoalsApi.md#deletegoal) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Delete Goal
*GoalsApi* | [**deleteGoalComment**](docs/Api/GoalsApi.md#deletegoalcomment) | **DELETE** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Delete Goal Comment
*GoalsApi* | [**getAlignableGoalOptions**](docs/Api/GoalsApi.md#getalignablegoaloptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/alignmentOptions | Get Alignable Goal Options
*GoalsApi* | [**getGoalAggregate**](docs/Api/GoalsApi.md#getgoalaggregate) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate | Get Goal Aggregate
*GoalsApi* | [**getGoalCreationPermission**](docs/Api/GoalsApi.md#getgoalcreationpermission) | **GET** /api/v1/performance/employees/{employeeId}/goals/canCreateGoals | Get Goal Creation Permission
*GoalsApi* | [**getGoalsAggregateV1**](docs/Api/GoalsApi.md#getgoalsaggregatev1) | **GET** /api/v1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1)
*GoalsApi* | [**getGoalsAggregateV11**](docs/Api/GoalsApi.md#getgoalsaggregatev11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1.1)
*GoalsApi* | [**getGoalsAggregateV12**](docs/Api/GoalsApi.md#getgoalsaggregatev12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/aggregate | Get Goals Aggregate (v1.2)
*GoalsApi* | [**getGoalsFiltersV1**](docs/Api/GoalsApi.md#getgoalsfiltersv1) | **GET** /api/v1/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1)
*GoalsApi* | [**getGoalsFiltersV11**](docs/Api/GoalsApi.md#getgoalsfiltersv11) | **GET** /api/v1_1/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1.1)
*GoalsApi* | [**getGoalsFiltersV12**](docs/Api/GoalsApi.md#getgoalsfiltersv12) | **GET** /api/v1_2/performance/employees/{employeeId}/goals/filters | Get Goal Filters (v1.2)
*GoalsApi* | [**listGoalComments**](docs/Api/GoalsApi.md#listgoalcomments) | **GET** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments | List Goal Comments
*GoalsApi* | [**listGoalShareOptions**](docs/Api/GoalsApi.md#listgoalshareoptions) | **GET** /api/v1/performance/employees/{employeeId}/goals/shareOptions | List Goal Sharing Options
*GoalsApi* | [**listGoals**](docs/Api/GoalsApi.md#listgoals) | **GET** /api/v1/performance/employees/{employeeId}/goals | List Goals
*GoalsApi* | [**reopenGoal**](docs/Api/GoalsApi.md#reopengoal) | **POST** /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen | Reopen Goal
*GoalsApi* | [**updateGoalComment**](docs/Api/GoalsApi.md#updategoalcomment) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/comments/{commentId} | Update Goal Comment
*GoalsApi* | [**updateGoalMilestoneProgress**](docs/Api/GoalsApi.md#updategoalmilestoneprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress | Update Milestone Progress
*GoalsApi* | [**updateGoalProgress**](docs/Api/GoalsApi.md#updategoalprogress) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress | Update Goal Progress
*GoalsApi* | [**updateGoalSharing**](docs/Api/GoalsApi.md#updategoalsharing) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith | Update Goal Sharing
*GoalsApi* | [**updateGoalV1**](docs/Api/GoalsApi.md#updategoalv1) | **PUT** /api/v1/performance/employees/{employeeId}/goals/{goalId} | Update Goal (v1)
*GoalsApi* | [**updateGoalV11**](docs/Api/GoalsApi.md#updategoalv11) | **PUT** /api/v1_1/performance/employees/{employeeId}/goals/{goalId} | Update Goal (v1.1)
*HoursApi* | [**createHourRecord**](docs/Api/HoursApi.md#createhourrecord) | **POST** /api/v1/timetracking/add | Create Hour Record
*HoursApi* | [**createOrUpdateHourRecords**](docs/Api/HoursApi.md#createorupdatehourrecords) | **POST** /api/v1/timetracking/record | Create or Update Hour Records
*HoursApi* | [**deleteHourRecord**](docs/Api/HoursApi.md#deletehourrecord) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record
*HoursApi* | [**getTimeTrackingRecord**](docs/Api/HoursApi.md#gettimetrackingrecord) | **GET** /api/v1/timetracking/record/{id} | Get Time Tracking Record
*HoursApi* | [**updateHourRecord**](docs/Api/HoursApi.md#updatehourrecord) | **PUT** /api/v1/timetracking/adjust | Update Hour Record
*LastChangeInformationApi* | [**getChangedEmployeeIds**](docs/Api/LastChangeInformationApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Get Changed Employee IDs
*LoginApi* | [**login**](docs/Api/LoginApi.md#login) | **POST** /api/v1/login | Login
*PhotosApi* | [**getEmployeePhoto**](docs/Api/PhotosApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get Employee Photo
*PhotosApi* | [**uploadEmployeePhoto**](docs/Api/PhotosApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Upload Employee Photo
*ReportsApi* | [**getCompanyReport**](docs/Api/ReportsApi.md#getcompanyreport) | **GET** /api/v1/reports/{id} | Get Company Report
*ReportsApi* | [**requestCustomReport**](docs/Api/ReportsApi.md#requestcustomreport) | **POST** /api/v1/reports/custom | Request Custom Report
*TabularDataApi* | [**createTableRow**](docs/Api/TabularDataApi.md#createtablerow) | **POST** /api/v1/employees/{id}/tables/{table} | Create Table Row
*TabularDataApi* | [**createTableRowV11**](docs/Api/TabularDataApi.md#createtablerowv11) | **POST** /api/v1_1/employees/{id}/tables/{table} | Create Table Row v1.1
*TabularDataApi* | [**deleteEmployeeTableRow**](docs/Api/TabularDataApi.md#deleteemployeetablerow) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Delete Employee Table Row
*TabularDataApi* | [**getChangedEmployeeTableData**](docs/Api/TabularDataApi.md#getchangedemployeetabledata) | **GET** /api/v1/employees/changed/tables/{table} | Get Changed Employee Table Data
*TabularDataApi* | [**getEmployeeTableData**](docs/Api/TabularDataApi.md#getemployeetabledata) | **GET** /api/v1/employees/{id}/tables/{table} | Get Employee Table Data
*TabularDataApi* | [**updateTableRow**](docs/Api/TabularDataApi.md#updatetablerow) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Update Table Row
*TabularDataApi* | [**updateTableRowV11**](docs/Api/TabularDataApi.md#updatetablerowv11) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Update Table Row v1.1
*TimeOffApi* | [**adjustTimeOffBalance**](docs/Api/TimeOffApi.md#adjusttimeoffbalance) | **PUT** /api/v1/employees/{employeeId}/time_off/balance_adjustment | Adjust Time Off Balance
*TimeOffApi* | [**assignTimeOffPoliciesV1**](docs/Api/TimeOffApi.md#assigntimeoffpoliciesv1) | **PUT** /api/v1/employees/{employeeId}/time_off/policies | Assign Time Off Policies (v1)
*TimeOffApi* | [**assignTimeOffPoliciesV11**](docs/Api/TimeOffApi.md#assigntimeoffpoliciesv11) | **PUT** /api/v1_1/employees/{employeeId}/time_off/policies | Assign Time Off Policies (v1.1)
*TimeOffApi* | [**createTimeOffHistory**](docs/Api/TimeOffApi.md#createtimeoffhistory) | **PUT** /api/v1/employees/{employeeId}/time_off/history | Create Time Off History Item
*TimeOffApi* | [**createTimeOffRequest**](docs/Api/TimeOffApi.md#createtimeoffrequest) | **PUT** /api/v1/employees/{employeeId}/time_off/request | Create Time Off Request
*TimeOffApi* | [**getTimeOffBalance**](docs/Api/TimeOffApi.md#gettimeoffbalance) | **GET** /api/v1/employees/{employeeId}/time_off/calculator | Get Time Off Balance
*TimeOffApi* | [**listEmployeeTimeOffPoliciesV1**](docs/Api/TimeOffApi.md#listemployeetimeoffpoliciesv1) | **GET** /api/v1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies (v1)
*TimeOffApi* | [**listEmployeeTimeOffPoliciesV11**](docs/Api/TimeOffApi.md#listemployeetimeoffpoliciesv11) | **GET** /api/v1_1/employees/{employeeId}/time_off/policies | List Employee Time Off Policies (v1.1)
*TimeOffApi* | [**listTimeOffPolicies**](docs/Api/TimeOffApi.md#listtimeoffpolicies) | **GET** /api/v1/meta/time_off/policies | List Time Off Policies
*TimeOffApi* | [**listTimeOffRequests**](docs/Api/TimeOffApi.md#listtimeoffrequests) | **GET** /api/v1/time_off/requests | List Time Off Requests
*TimeOffApi* | [**listTimeOffTypes**](docs/Api/TimeOffApi.md#listtimeofftypes) | **GET** /api/v1/meta/time_off/types | List Time Off Types
*TimeOffApi* | [**listWhosOut**](docs/Api/TimeOffApi.md#listwhosout) | **GET** /api/v1/time_off/whos_out | List Who’s Out
*TimeOffApi* | [**updateTimeOffRequestStatus**](docs/Api/TimeOffApi.md#updatetimeoffrequeststatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Update Time Off Request Status
*TimeTrackingApi* | [**assignEmployeesToBreakPolicy**](docs/Api/TimeTrackingApi.md#assignemployeestobreakpolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/assign | Assign Employees to Break Policy
*TimeTrackingApi* | [**createBreak**](docs/Api/TimeTrackingApi.md#createbreak) | **POST** /api/v1/time-tracking/break-policies/{id}/breaks | Create Break
*TimeTrackingApi* | [**createBreakPolicy**](docs/Api/TimeTrackingApi.md#createbreakpolicy) | **POST** /api/v1/time-tracking/break-policies | Create Break Policy
*TimeTrackingApi* | [**createOrUpdateTimesheetClockEntries**](docs/Api/TimeTrackingApi.md#createorupdatetimesheetclockentries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries
*TimeTrackingApi* | [**createOrUpdateTimesheetHourEntries**](docs/Api/TimeTrackingApi.md#createorupdatetimesheethourentries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries
*TimeTrackingApi* | [**createProject**](docs/Api/TimeTrackingApi.md#createproject) | **POST** /api/v1/time_tracking/projects | Create Project
*TimeTrackingApi* | [**createTimesheetClockInEntry**](docs/Api/TimeTrackingApi.md#createtimesheetclockinentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry
*TimeTrackingApi* | [**createTimesheetClockOutEntry**](docs/Api/TimeTrackingApi.md#createtimesheetclockoutentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry
*TimeTrackingApi* | [**deleteBreak**](docs/Api/TimeTrackingApi.md#deletebreak) | **DELETE** /api/v1/time-tracking/breaks/{id} | Delete Break
*TimeTrackingApi* | [**deleteBreakPolicy**](docs/Api/TimeTrackingApi.md#deletebreakpolicy) | **DELETE** /api/v1/time-tracking/break-policies/{id} | Delete Break Policy
*TimeTrackingApi* | [**deleteTimesheetClockEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheetclockentriesviapost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*TimeTrackingApi* | [**deleteTimesheetHourEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheethourentriesviapost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*TimeTrackingApi* | [**getBreak**](docs/Api/TimeTrackingApi.md#getbreak) | **GET** /api/v1/time-tracking/breaks/{id} | Get Break
*TimeTrackingApi* | [**getBreakPolicy**](docs/Api/TimeTrackingApi.md#getbreakpolicy) | **GET** /api/v1/time-tracking/break-policies/{id} | Get a Break Policy
*TimeTrackingApi* | [**listBreakAssessments**](docs/Api/TimeTrackingApi.md#listbreakassessments) | **GET** /api/v1/time-tracking/break-assessments | List Break Assessments
*TimeTrackingApi* | [**listBreakPolicies**](docs/Api/TimeTrackingApi.md#listbreakpolicies) | **GET** /api/v1/time-tracking/break-policies | List Break Policies
*TimeTrackingApi* | [**listBreakPolicyBreaks**](docs/Api/TimeTrackingApi.md#listbreakpolicybreaks) | **GET** /api/v1/time-tracking/break-policies/{id}/breaks | List Break Policy Breaks
*TimeTrackingApi* | [**listBreakPolicyEmployees**](docs/Api/TimeTrackingApi.md#listbreakpolicyemployees) | **GET** /api/v1/time-tracking/break-policies/{id}/employees | List Break Policy Employees
*TimeTrackingApi* | [**listEmployeeBreakAvailabilities**](docs/Api/TimeTrackingApi.md#listemployeebreakavailabilities) | **GET** /api/v1/time-tracking/employees/{id}/break-availabilities | List Employee Break Availabilities
*TimeTrackingApi* | [**listEmployeeBreakPolicies**](docs/Api/TimeTrackingApi.md#listemployeebreakpolicies) | **GET** /api/v1/time-tracking/employees/{id}/break-policies | List Employee Break Policies
*TimeTrackingApi* | [**listTimesheetEntries**](docs/Api/TimeTrackingApi.md#listtimesheetentries) | **GET** /api/v1/time_tracking/timesheet_entries | List Timesheet Entries
*TimeTrackingApi* | [**replaceBreakPolicyEmployees**](docs/Api/TimeTrackingApi.md#replacebreakpolicyemployees) | **PUT** /api/v1/time-tracking/break-policies/{id}/assign | Replace Break Policy Employees
*TimeTrackingApi* | [**replaceBreaksForBreakPolicy**](docs/Api/TimeTrackingApi.md#replacebreaksforbreakpolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/breaks | Replace Breaks for Break Policy
*TimeTrackingApi* | [**syncBreakPolicy**](docs/Api/TimeTrackingApi.md#syncbreakpolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/sync | Sync Break Policy
*TimeTrackingApi* | [**unassignEmployeesFromBreakPolicy**](docs/Api/TimeTrackingApi.md#unassignemployeesfrombreakpolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/unassign | Unassign Employees from Break Policy
*TimeTrackingApi* | [**updateBreak**](docs/Api/TimeTrackingApi.md#updatebreak) | **PATCH** /api/v1/time-tracking/breaks/{id} | Update Break
*TimeTrackingApi* | [**updateBreakPolicy**](docs/Api/TimeTrackingApi.md#updatebreakpolicy) | **PATCH** /api/v1/time-tracking/break-policies/{id} | Update Break Policy
*TrainingApi* | [**createEmployeeTrainingRecord**](docs/Api/TrainingApi.md#createemployeetrainingrecord) | **POST** /api/v1/training/record/employee/{employeeId} | Create Employee Training Record
*TrainingApi* | [**createTrainingCategory**](docs/Api/TrainingApi.md#createtrainingcategory) | **POST** /api/v1/training/category | Create Training Category
*TrainingApi* | [**createTrainingType**](docs/Api/TrainingApi.md#createtrainingtype) | **POST** /api/v1/training/type | Create Training Type
*TrainingApi* | [**deleteEmployeeTrainingRecord**](docs/Api/TrainingApi.md#deleteemployeetrainingrecord) | **DELETE** /api/v1/training/record/{employeeTrainingRecordId} | Delete Employee Training Record
*TrainingApi* | [**deleteTrainingCategory**](docs/Api/TrainingApi.md#deletetrainingcategory) | **DELETE** /api/v1/training/category/{trainingCategoryId} | Delete Training Category
*TrainingApi* | [**deleteTrainingType**](docs/Api/TrainingApi.md#deletetrainingtype) | **DELETE** /api/v1/training/type/{trainingTypeId} | Delete Training Type
*TrainingApi* | [**listEmployeeTrainings**](docs/Api/TrainingApi.md#listemployeetrainings) | **GET** /api/v1/training/record/employee/{employeeId} | List Employee Training Records
*TrainingApi* | [**listTrainingCategories**](docs/Api/TrainingApi.md#listtrainingcategories) | **GET** /api/v1/training/category | List Training Categories
*TrainingApi* | [**listTrainingTypes**](docs/Api/TrainingApi.md#listtrainingtypes) | **GET** /api/v1/training/type | List Training Types
*TrainingApi* | [**updateEmployeeTrainingRecord**](docs/Api/TrainingApi.md#updateemployeetrainingrecord) | **PUT** /api/v1/training/record/{employeeTrainingRecordId} | Update Employee Training Record
*TrainingApi* | [**updateTrainingCategory**](docs/Api/TrainingApi.md#updatetrainingcategory) | **PUT** /api/v1/training/category/{trainingCategoryId} | Update Training Category
*TrainingApi* | [**updateTrainingType**](docs/Api/TrainingApi.md#updatetrainingtype) | **PUT** /api/v1/training/type/{trainingTypeId} | Update Training Type
*WebhooksApi* | [**createWebhook**](docs/Api/WebhooksApi.md#createwebhook) | **POST** /api/v1/webhooks | Create Webhook
*WebhooksApi* | [**deleteWebhook**](docs/Api/WebhooksApi.md#deletewebhook) | **DELETE** /api/v1/webhooks/{id} | Delete Webhook
*WebhooksApi* | [**getMonitorFields**](docs/Api/WebhooksApi.md#getmonitorfields) | **GET** /api/v1/webhooks/monitor_fields | Get Monitor Fields
*WebhooksApi* | [**getPostFields**](docs/Api/WebhooksApi.md#getpostfields) | **GET** /api/v1/webhooks/post-fields | Get Post Fields
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook
*WebhooksApi* | [**getWebhookLogs**](docs/Api/WebhooksApi.md#getwebhooklogs) | **GET** /api/v1/webhooks/{id}/log | Get Webhook Logs
*WebhooksApi* | [**listWebhooks**](docs/Api/WebhooksApi.md#listwebhooks) | **GET** /api/v1/webhooks | List Webhooks
*WebhooksApi* | [**updateWebhook**](docs/Api/WebhooksApi.md#updatewebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook

## Models

- [AdjustTimeOffBalance](docs/Model/AdjustTimeOffBalance.md)
- [AdjustTimeTrackingRequestSchema](docs/Model/AdjustTimeTrackingRequestSchema.md)
- [AlignmentOptionsResponse](docs/Model/AlignmentOptionsResponse.md)
- [AlignmentOptionsResponseAlignsWithOptionsInner](docs/Model/AlignmentOptionsResponseAlignsWithOptionsInner.md)
- [ApplicantStatus](docs/Model/ApplicantStatus.md)
- [ApplicationDetails](docs/Model/ApplicationDetails.md)
- [ApplicationDetailsApplicant](docs/Model/ApplicationDetailsApplicant.md)
- [ApplicationDetailsApplicantAddress](docs/Model/ApplicationDetailsApplicantAddress.md)
- [ApplicationDetailsApplicantEducation](docs/Model/ApplicationDetailsApplicantEducation.md)
- [ApplicationDetailsApplicantEducationLevel](docs/Model/ApplicationDetailsApplicantEducationLevel.md)
- [ApplicationDetailsAttachmentsInner](docs/Model/ApplicationDetailsAttachmentsInner.md)
- [ApplicationDetailsJob](docs/Model/ApplicationDetailsJob.md)
- [ApplicationDetailsJobHiringLead](docs/Model/ApplicationDetailsJobHiringLead.md)
- [ApplicationDetailsJobHiringLeadJobTitle](docs/Model/ApplicationDetailsJobHiringLeadJobTitle.md)
- [ApplicationDetailsJobTitle](docs/Model/ApplicationDetailsJobTitle.md)
- [ApplicationDetailsQuestionsAndAnswersInner](docs/Model/ApplicationDetailsQuestionsAndAnswersInner.md)
- [ApplicationDetailsQuestionsAndAnswersInnerAnswer](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerAnswer.md)
- [ApplicationDetailsQuestionsAndAnswersInnerQuestion](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerQuestion.md)
- [ApplicationDetailsStatus](docs/Model/ApplicationDetailsStatus.md)
- [ApplicationDetailsStatusChangedByUser](docs/Model/ApplicationDetailsStatusChangedByUser.md)
- [ApplicationDetailsStatusChangedByUserJobTitle](docs/Model/ApplicationDetailsStatusChangedByUserJobTitle.md)
- [ApplicationsList](docs/Model/ApplicationsList.md)
- [ApplicationsListApplicationsInner](docs/Model/ApplicationsListApplicationsInner.md)
- [ApplicationsListApplicationsInnerApplicant](docs/Model/ApplicationsListApplicationsInnerApplicant.md)
- [ApplicationsListApplicationsInnerJob](docs/Model/ApplicationsListApplicationsInnerJob.md)
- [ApplicationsListApplicationsInnerJobTitle](docs/Model/ApplicationsListApplicationsInnerJobTitle.md)
- [ApplicationsListApplicationsInnerStatus](docs/Model/ApplicationsListApplicationsInnerStatus.md)
- [AssignEmployeesToBreakPolicyRequest](docs/Model/AssignEmployeesToBreakPolicyRequest.md)
- [AssignTimeOffPoliciesV1RequestInner](docs/Model/AssignTimeOffPoliciesV1RequestInner.md)
- [AssignedTimeOffPolicy](docs/Model/AssignedTimeOffPolicy.md)
- [AssignedTimeOffPolicyV11](docs/Model/AssignedTimeOffPolicyV11.md)
- [AvailableAction](docs/Model/AvailableAction.md)
- [BadRequest](docs/Model/BadRequest.md)
- [BadRequestError](docs/Model/BadRequestError.md)
- [BenefitCoveragesResponse](docs/Model/BenefitCoveragesResponse.md)
- [BenefitCoveragesResponseBenefitCoveragesInner](docs/Model/BenefitCoveragesResponseBenefitCoveragesInner.md)
- [BenefitDeductionSubType](docs/Model/BenefitDeductionSubType.md)
- [BenefitDeductionType](docs/Model/BenefitDeductionType.md)
- [BenefitDeductionTypeId](docs/Model/BenefitDeductionTypeId.md)
- [BreakPolicyResponse](docs/Model/BreakPolicyResponse.md)
- [CanCreateGoalsResponse](docs/Model/CanCreateGoalsResponse.md)
- [ChangedEmployeeIdsResponse](docs/Model/ChangedEmployeeIdsResponse.md)
- [ChangedEmployeeIdsResponseEmployeesValue](docs/Model/ChangedEmployeeIdsResponseEmployeesValue.md)
- [ChangedEmployeeTableDataResponse](docs/Model/ChangedEmployeeTableDataResponse.md)
- [ChangedEmployeeTableDataResponseEmployeesValue](docs/Model/ChangedEmployeeTableDataResponseEmployeesValue.md)
- [ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValue](docs/Model/ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValue.md)
- [ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValueAnyOfInner](docs/Model/ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValueAnyOfInner.md)
- [ClockEntriesSchema](docs/Model/ClockEntriesSchema.md)
- [ClockEntryIdsSchema](docs/Model/ClockEntryIdsSchema.md)
- [ClockEntrySchema](docs/Model/ClockEntrySchema.md)
- [ClockInRequestSchema](docs/Model/ClockInRequestSchema.md)
- [ClockOutRequestSchema](docs/Model/ClockOutRequestSchema.md)
- [CloseGoalRequest](docs/Model/CloseGoalRequest.md)
- [CompanyBenefitSummary](docs/Model/CompanyBenefitSummary.md)
- [CompanyBenefitsListResponse](docs/Model/CompanyBenefitsListResponse.md)
- [CompanyDeletedWebhookPayload](docs/Model/CompanyDeletedWebhookPayload.md)
- [CompanyFileUpdate](docs/Model/CompanyFileUpdate.md)
- [CompanyFilesResponse](docs/Model/CompanyFilesResponse.md)
- [CompanyFilesResponseCategoriesInner](docs/Model/CompanyFilesResponseCategoriesInner.md)
- [CompanyFilesResponseCategoriesInnerFilesInner](docs/Model/CompanyFilesResponseCategoriesInnerFilesInner.md)
- [CompanyInformation](docs/Model/CompanyInformation.md)
- [CompanyInformationAddress](docs/Model/CompanyInformationAddress.md)
- [CompanyIntegrationsUpdatedWebhookPayload](docs/Model/CompanyIntegrationsUpdatedWebhookPayload.md)
- [CompanyIntegrationsUpdatedWebhookPayloadData](docs/Model/CompanyIntegrationsUpdatedWebhookPayloadData.md)
- [CompanyProfileIntegrations](docs/Model/CompanyProfileIntegrations.md)
- [CompanyUpdatedWebhookPayload](docs/Model/CompanyUpdatedWebhookPayload.md)
- [Country](docs/Model/Country.md)
- [CountrySchema](docs/Model/CountrySchema.md)
- [CreateApplicationCommentRequest](docs/Model/CreateApplicationCommentRequest.md)
- [CreateCandidateResponse](docs/Model/CreateCandidateResponse.md)
- [CreateCommentResponse](docs/Model/CreateCommentResponse.md)
- [CreateEmployeeTrainingRecordRequest](docs/Model/CreateEmployeeTrainingRecordRequest.md)
- [CreateEmployeeTrainingRecordRequestCost](docs/Model/CreateEmployeeTrainingRecordRequestCost.md)
- [CreateGoalCommentRequest](docs/Model/CreateGoalCommentRequest.md)
- [CreateGoalRequest](docs/Model/CreateGoalRequest.md)
- [CreateGoalRequestMilestonesInner](docs/Model/CreateGoalRequestMilestonesInner.md)
- [CreateJobOpeningResponse](docs/Model/CreateJobOpeningResponse.md)
- [CreateTrainingCategoryRequest](docs/Model/CreateTrainingCategoryRequest.md)
- [CreateTrainingTypeRequest](docs/Model/CreateTrainingTypeRequest.md)
- [CreateTrainingTypeRequestCategory](docs/Model/CreateTrainingTypeRequestCategory.md)
- [CreateWebhookBadRequestResponse](docs/Model/CreateWebhookBadRequestResponse.md)
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
- [DatasetsResponse](docs/Model/DatasetsResponse.md)
- [DatasetsResponseDatasetsInner](docs/Model/DatasetsResponseDatasetsInner.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeBenefitFilters](docs/Model/EmployeeBenefitFilters.md)
- [EmployeeBenefitFiltersFilters](docs/Model/EmployeeBenefitFiltersFilters.md)
- [EmployeeBenefitsListResponse](docs/Model/EmployeeBenefitsListResponse.md)
- [EmployeeBenefitsListResponseEmployeeBenefitsInner](docs/Model/EmployeeBenefitsListResponseEmployeeBenefitsInner.md)
- [EmployeeBenefitsListResponseEmployeeBenefitsInnerEmployeeBenefitInner](docs/Model/EmployeeBenefitsListResponseEmployeeBenefitsInnerEmployeeBenefitInner.md)
- [EmployeeCreatedWebhookPayload](docs/Model/EmployeeCreatedWebhookPayload.md)
- [EmployeeCreatedWebhookPayloadData](docs/Model/EmployeeCreatedWebhookPayloadData.md)
- [EmployeeDeletedWebhookPayload](docs/Model/EmployeeDeletedWebhookPayload.md)
- [EmployeeDeletedWebhookPayloadData](docs/Model/EmployeeDeletedWebhookPayloadData.md)
- [EmployeeDependent](docs/Model/EmployeeDependent.md)
- [EmployeeDependentsResponse](docs/Model/EmployeeDependentsResponse.md)
- [EmployeeDependentsResponseEmployeeDependentsInner](docs/Model/EmployeeDependentsResponseEmployeeDependentsInner.md)
- [EmployeeFileUpdate](docs/Model/EmployeeFileUpdate.md)
- [EmployeeResponse](docs/Model/EmployeeResponse.md)
- [EmployeeResponseAggregationsInner](docs/Model/EmployeeResponseAggregationsInner.md)
- [EmployeeTableRow](docs/Model/EmployeeTableRow.md)
- [EmployeeTableRowValue](docs/Model/EmployeeTableRowValue.md)
- [EmployeeTableRowValueAnyOfInner](docs/Model/EmployeeTableRowValueAnyOfInner.md)
- [EmployeeTimeOffPolicyAssignment](docs/Model/EmployeeTimeOffPolicyAssignment.md)
- [EmployeeTimeOffPolicyAssignmentV11](docs/Model/EmployeeTimeOffPolicyAssignmentV11.md)
- [EmployeeTimesheetEntryTransformer](docs/Model/EmployeeTimesheetEntryTransformer.md)
- [EmployeeUpdatedWebhookPayload](docs/Model/EmployeeUpdatedWebhookPayload.md)
- [EmployeeUpdatedWebhookPayloadData](docs/Model/EmployeeUpdatedWebhookPayloadData.md)
- [EmployeeValue](docs/Model/EmployeeValue.md)
- [EmployeeValueAnyOfInner](docs/Model/EmployeeValueAnyOfInner.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [ErrorResponseError](docs/Model/ErrorResponseError.md)
- [Field](docs/Model/Field.md)
- [Field1](docs/Model/Field1.md)
- [Field1Id](docs/Model/Field1Id.md)
- [FieldList](docs/Model/FieldList.md)
- [FieldListFieldsInner](docs/Model/FieldListFieldsInner.md)
- [FieldOptionsRequestSchema](docs/Model/FieldOptionsRequestSchema.md)
- [FieldOptionsRequestSchemaDependentFieldsValueInner](docs/Model/FieldOptionsRequestSchemaDependentFieldsValueInner.md)
- [FieldOptionsTransformer](docs/Model/FieldOptionsTransformer.md)
- [Forbidden](docs/Model/Forbidden.md)
- [GetCompanyReportResponse](docs/Model/GetCompanyReportResponse.md)
- [GetEmployeesEmployeeResponse](docs/Model/GetEmployeesEmployeeResponse.md)
- [GetEmployeesFilterRequestObject](docs/Model/GetEmployeesFilterRequestObject.md)
- [GetEmployeesResponseObject](docs/Model/GetEmployeesResponseObject.md)
- [GetEmployeesResponseObjectLinks](docs/Model/GetEmployeesResponseObjectLinks.md)
- [GetEmployeesResponseObjectLinksNext](docs/Model/GetEmployeesResponseObjectLinksNext.md)
- [GetEmployeesResponseObjectLinksPrev](docs/Model/GetEmployeesResponseObjectLinksPrev.md)
- [GetEmployeesResponseObjectLinksSelf](docs/Model/GetEmployeesResponseObjectLinksSelf.md)
- [GoalAggregate](docs/Model/GoalAggregate.md)
- [GoalAggregateAlignsWithOptionsInner](docs/Model/GoalAggregateAlignsWithOptionsInner.md)
- [GoalAggregateCommentsInner](docs/Model/GoalAggregateCommentsInner.md)
- [GoalAggregatePersonsInner](docs/Model/GoalAggregatePersonsInner.md)
- [GoalCommentResponse](docs/Model/GoalCommentResponse.md)
- [GoalCommentsResponse](docs/Model/GoalCommentsResponse.md)
- [GoalCommentsResponseCommentsInner](docs/Model/GoalCommentsResponseCommentsInner.md)
- [GoalFiltersV1](docs/Model/GoalFiltersV1.md)
- [GoalFiltersV11](docs/Model/GoalFiltersV11.md)
- [GoalFiltersV11FiltersInner](docs/Model/GoalFiltersV11FiltersInner.md)
- [GoalFiltersV11FiltersInnerActions](docs/Model/GoalFiltersV11FiltersInnerActions.md)
- [GoalFiltersV1FiltersInner](docs/Model/GoalFiltersV1FiltersInner.md)
- [GoalResponse](docs/Model/GoalResponse.md)
- [GoalsAggregateV1](docs/Model/GoalsAggregateV1.md)
- [GoalsAggregateV11](docs/Model/GoalsAggregateV11.md)
- [GoalsAggregateV11CommentsInner](docs/Model/GoalsAggregateV11CommentsInner.md)
- [GoalsAggregateV12](docs/Model/GoalsAggregateV12.md)
- [GoalsAggregateV12CommentsInner](docs/Model/GoalsAggregateV12CommentsInner.md)
- [GoalsAggregateV1CommentsInner](docs/Model/GoalsAggregateV1CommentsInner.md)
- [GoalsAggregateV1PersonsInner](docs/Model/GoalsAggregateV1PersonsInner.md)
- [GoalsList](docs/Model/GoalsList.md)
- [HiringLead](docs/Model/HiringLead.md)
- [HourEntriesRequestSchema](docs/Model/HourEntriesRequestSchema.md)
- [HourEntryIdsSchema](docs/Model/HourEntryIdsSchema.md)
- [HourEntrySchema](docs/Model/HourEntrySchema.md)
- [InvalidRequest](docs/Model/InvalidRequest.md)
- [InvalidRequestError](docs/Model/InvalidRequestError.md)
- [JobSummary](docs/Model/JobSummary.md)
- [JobSummaryDepartment](docs/Model/JobSummaryDepartment.md)
- [JobSummaryHiringLead](docs/Model/JobSummaryHiringLead.md)
- [JobSummaryLocation](docs/Model/JobSummaryLocation.md)
- [JobSummaryStatus](docs/Model/JobSummaryStatus.md)
- [JsonDirectoryEmployee](docs/Model/JsonDirectoryEmployee.md)
- [JsonDirectoryEmployeeFieldsInner](docs/Model/JsonDirectoryEmployeeFieldsInner.md)
- [JsonEmployeeFiles](docs/Model/JsonEmployeeFiles.md)
- [JsonEmployeeFilesCategoriesInner](docs/Model/JsonEmployeeFilesCategoriesInner.md)
- [JsonEmployeeFilesCategoriesInnerFilesInner](docs/Model/JsonEmployeeFilesCategoriesInnerFilesInner.md)
- [JsonEmployeeFilesEmployee](docs/Model/JsonEmployeeFilesEmployee.md)
- [ListFieldDetail](docs/Model/ListFieldDetail.md)
- [ListFieldOption](docs/Model/ListFieldOption.md)
- [ListFieldValues](docs/Model/ListFieldValues.md)
- [ListFieldValuesOptionsInner](docs/Model/ListFieldValuesOptionsInner.md)
- [ListUsersResponseValue](docs/Model/ListUsersResponseValue.md)
- [ListUsersXmlResponse](docs/Model/ListUsersXmlResponse.md)
- [ListUsersXmlResponseUserInner](docs/Model/ListUsersXmlResponseUserInner.md)
- [Location](docs/Model/Location.md)
- [LoginFailureResponse](docs/Model/LoginFailureResponse.md)
- [LoginFailureXmlResponse](docs/Model/LoginFailureXmlResponse.md)
- [LoginResponse](docs/Model/LoginResponse.md)
- [LoginXmlResponse](docs/Model/LoginXmlResponse.md)
- [MemberBenefitEvent](docs/Model/MemberBenefitEvent.md)
- [MemberBenefitEventCoveragesInner](docs/Model/MemberBenefitEventCoveragesInner.md)
- [MemberBenefitEventCoveragesInnerEventsInner](docs/Model/MemberBenefitEventCoveragesInnerEventsInner.md)
- [MemberBenefitEventsResponse](docs/Model/MemberBenefitEventsResponse.md)
- [MemberBenefitsGetPermissionDeniedResponse](docs/Model/MemberBenefitsGetPermissionDeniedResponse.md)
- [MemberBenefitsGetSuccessResponse](docs/Model/MemberBenefitsGetSuccessResponse.md)
- [MemberBenefitsGetSuccessResponseDataInner](docs/Model/MemberBenefitsGetSuccessResponseDataInner.md)
- [MemberBenefitsGetSuccessResponseDataInnerPlansInner](docs/Model/MemberBenefitsGetSuccessResponseDataInnerPlansInner.md)
- [MemberBenefitsGetSuccessResponseDataInnerPlansInnerDateRangesInner](docs/Model/MemberBenefitsGetSuccessResponseDataInnerPlansInnerDateRangesInner.md)
- [MemberBenefitsGetSuccessResponseLinks](docs/Model/MemberBenefitsGetSuccessResponseLinks.md)
- [MemberBenefitsGetSuccessResponseLinksNext](docs/Model/MemberBenefitsGetSuccessResponseLinksNext.md)
- [MemberBenefitsGetSuccessResponseLinksPrev](docs/Model/MemberBenefitsGetSuccessResponseLinksPrev.md)
- [MemberBenefitsGetSuccessResponseMeta](docs/Model/MemberBenefitsGetSuccessResponseMeta.md)
- [MemberBenefitsGetValidationErrorResponse](docs/Model/MemberBenefitsGetValidationErrorResponse.md)
- [NewWebHook](docs/Model/NewWebHook.md)
- [PagedResponse](docs/Model/PagedResponse.md)
- [Pagination](docs/Model/Pagination.md)
- [PaginationMetaData](docs/Model/PaginationMetaData.md)
- [PersonInfoApiTransformer](docs/Model/PersonInfoApiTransformer.md)
- [PostNewEmployee](docs/Model/PostNewEmployee.md)
- [ProblemDetailsResponse](docs/Model/ProblemDetailsResponse.md)
- [ProjectCreateRequestSchema](docs/Model/ProjectCreateRequestSchema.md)
- [ProjectInfoApiTransformer](docs/Model/ProjectInfoApiTransformer.md)
- [ProjectInfoApiTransformerProject](docs/Model/ProjectInfoApiTransformerProject.md)
- [ProjectInfoApiTransformerTask](docs/Model/ProjectInfoApiTransformerTask.md)
- [ReplaceBreakPolicyEmployeesRequest](docs/Model/ReplaceBreakPolicyEmployeesRequest.md)
- [Report](docs/Model/Report.md)
- [ReportsResponse](docs/Model/ReportsResponse.md)
- [Request](docs/Model/Request.md)
- [RequestCustomReport](docs/Model/RequestCustomReport.md)
- [RequestCustomReportFilters](docs/Model/RequestCustomReportFilters.md)
- [RequestCustomReportFiltersLastChanged](docs/Model/RequestCustomReportFiltersLastChanged.md)
- [RequestCustomReportResponse](docs/Model/RequestCustomReportResponse.md)
- [RequestCustomReportResponseEmployeesInner](docs/Model/RequestCustomReportResponseEmployeesInner.md)
- [RequestCustomReportResponseFieldsInner](docs/Model/RequestCustomReportResponseFieldsInner.md)
- [ShareOptionsResponse](docs/Model/ShareOptionsResponse.md)
- [State](docs/Model/State.md)
- [StateProvinceResponseSchema](docs/Model/StateProvinceResponseSchema.md)
- [StateProvinceSchema](docs/Model/StateProvinceSchema.md)
- [TableRowDeleteResponse](docs/Model/TableRowDeleteResponse.md)
- [TableRowUpdate](docs/Model/TableRowUpdate.md)
- [TabularField](docs/Model/TabularField.md)
- [TabularFieldFieldsInner](docs/Model/TabularFieldFieldsInner.md)
- [TaskCreateSchema](docs/Model/TaskCreateSchema.md)
- [TimeOffBalanceEntry](docs/Model/TimeOffBalanceEntry.md)
- [TimeOffHistory](docs/Model/TimeOffHistory.md)
- [TimeOffPolicy](docs/Model/TimeOffPolicy.md)
- [TimeOffRequest](docs/Model/TimeOffRequest.md)
- [TimeOffRequest1](docs/Model/TimeOffRequest1.md)
- [TimeOffRequest1Actions](docs/Model/TimeOffRequest1Actions.md)
- [TimeOffRequest1Amount](docs/Model/TimeOffRequest1Amount.md)
- [TimeOffRequest1Notes](docs/Model/TimeOffRequest1Notes.md)
- [TimeOffRequest1Status](docs/Model/TimeOffRequest1Status.md)
- [TimeOffRequest1Type](docs/Model/TimeOffRequest1Type.md)
- [TimeOffRequestDatesInner](docs/Model/TimeOffRequestDatesInner.md)
- [TimeOffRequestNotesInner](docs/Model/TimeOffRequestNotesInner.md)
- [TimeOffTypesAndDefaultHours](docs/Model/TimeOffTypesAndDefaultHours.md)
- [TimeOffTypesAndDefaultHoursDefaultHoursInner](docs/Model/TimeOffTypesAndDefaultHoursDefaultHoursInner.md)
- [TimeOffTypesAndDefaultHoursTimeOffTypesInner](docs/Model/TimeOffTypesAndDefaultHoursTimeOffTypesInner.md)
- [TimeTrackingBreakPolicyEmployeeCollectionV1Inner](docs/Model/TimeTrackingBreakPolicyEmployeeCollectionV1Inner.md)
- [TimeTrackingBulkResponseSchema](docs/Model/TimeTrackingBulkResponseSchema.md)
- [TimeTrackingBulkResponseSchemaResponse](docs/Model/TimeTrackingBulkResponseSchemaResponse.md)
- [TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1](docs/Model/TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1.md)
- [TimeTrackingCreateTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingCreateTimeTrackingBreakPolicyV1.md)
- [TimeTrackingCreateTimeTrackingBreakV1](docs/Model/TimeTrackingCreateTimeTrackingBreakV1.md)
- [TimeTrackingDeleteResponseSchema](docs/Model/TimeTrackingDeleteResponseSchema.md)
- [TimeTrackingIdResponseSchema](docs/Model/TimeTrackingIdResponseSchema.md)
- [TimeTrackingOffsetPaginatedResponseDataV1](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1.md)
- [TimeTrackingOffsetPaginatedResponseDataV1Links](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1Links.md)
- [TimeTrackingOffsetPaginatedResponseDataV1LinksNext](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1LinksNext.md)
- [TimeTrackingOffsetPaginatedResponseDataV1LinksPrev](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1LinksPrev.md)
- [TimeTrackingOffsetPaginatedResponseDataV1Meta](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1Meta.md)
- [TimeTrackingPaginatedBreakAssessmentsResponseV1](docs/Model/TimeTrackingPaginatedBreakAssessmentsResponseV1.md)
- [TimeTrackingPaginatedBreakPoliciesResponseV1](docs/Model/TimeTrackingPaginatedBreakPoliciesResponseV1.md)
- [TimeTrackingPaginatedBreakPolicyEmployeesResponseV1](docs/Model/TimeTrackingPaginatedBreakPolicyEmployeesResponseV1.md)
- [TimeTrackingPaginatedBreaksResponseV1](docs/Model/TimeTrackingPaginatedBreaksResponseV1.md)
- [TimeTrackingProjectWithTasksAndEmployeeIds](docs/Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)
- [TimeTrackingRecord](docs/Model/TimeTrackingRecord.md)
- [TimeTrackingRecordSchema](docs/Model/TimeTrackingRecordSchema.md)
- [TimeTrackingRecordSchemaProject](docs/Model/TimeTrackingRecordSchemaProject.md)
- [TimeTrackingRecordSchemaProjectTask](docs/Model/TimeTrackingRecordSchemaProjectTask.md)
- [TimeTrackingRecordSchemaShiftDifferential](docs/Model/TimeTrackingRecordSchemaShiftDifferential.md)
- [TimeTrackingSyncTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingSyncTimeTrackingBreakPolicyV1.md)
- [TimeTrackingTask](docs/Model/TimeTrackingTask.md)
- [TimeTrackingTimeTrackingBreakAssessmentV1](docs/Model/TimeTrackingTimeTrackingBreakAssessmentV1.md)
- [TimeTrackingTimeTrackingBreakAssessmentViolationV1](docs/Model/TimeTrackingTimeTrackingBreakAssessmentViolationV1.md)
- [TimeTrackingTimeTrackingBreakAvailabilityV1](docs/Model/TimeTrackingTimeTrackingBreakAvailabilityV1.md)
- [TimeTrackingTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingTimeTrackingBreakPolicyV1.md)
- [TimeTrackingTimeTrackingBreakPolicyWithCountsV1](docs/Model/TimeTrackingTimeTrackingBreakPolicyWithCountsV1.md)
- [TimeTrackingTimeTrackingBreakPolicyWithRelationsV1](docs/Model/TimeTrackingTimeTrackingBreakPolicyWithRelationsV1.md)
- [TimeTrackingTimeTrackingBreakV1](docs/Model/TimeTrackingTimeTrackingBreakV1.md)
- [TimeTrackingUpdateTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingUpdateTimeTrackingBreakPolicyV1.md)
- [TimeTrackingUpdateTimeTrackingBreakV1](docs/Model/TimeTrackingUpdateTimeTrackingBreakV1.md)
- [TimesheetEntryInfoApiTransformer](docs/Model/TimesheetEntryInfoApiTransformer.md)
- [TimesheetEntryInfoApiTransformerBreakInfo](docs/Model/TimesheetEntryInfoApiTransformerBreakInfo.md)
- [TimezoneListResponse](docs/Model/TimezoneListResponse.md)
- [TimezoneResource](docs/Model/TimezoneResource.md)
- [TrainingCategory](docs/Model/TrainingCategory.md)
- [TrainingRecord](docs/Model/TrainingRecord.md)
- [TrainingRecordMap](docs/Model/TrainingRecordMap.md)
- [TrainingRecordType](docs/Model/TrainingRecordType.md)
- [TrainingType](docs/Model/TrainingType.md)
- [TrainingTypeCategory](docs/Model/TrainingTypeCategory.md)
- [TransformedApiEmployeeGoalDetails](docs/Model/TransformedApiEmployeeGoalDetails.md)
- [TransformedApiEmployeeGoalDetailsGoal](docs/Model/TransformedApiEmployeeGoalDetailsGoal.md)
- [TransformedApiEmployeeGoalDetailsGoalActions](docs/Model/TransformedApiEmployeeGoalDetailsGoalActions.md)
- [TransformedApiGoal](docs/Model/TransformedApiGoal.md)
- [TransformedApiGoalActions](docs/Model/TransformedApiGoalActions.md)
- [TransformedApiGoalMilestonesInner](docs/Model/TransformedApiGoalMilestonesInner.md)
- [UnassignEmployeesFromBreakPolicyRequest](docs/Model/UnassignEmployeesFromBreakPolicyRequest.md)
- [UpdateApplicantStatusRequest](docs/Model/UpdateApplicantStatusRequest.md)
- [UpdateApplicantStatusResponse](docs/Model/UpdateApplicantStatusResponse.md)
- [UpdateEmployeeTrainingRecordRequest](docs/Model/UpdateEmployeeTrainingRecordRequest.md)
- [UpdateGoalCommentRequest](docs/Model/UpdateGoalCommentRequest.md)
- [UpdateGoalMilestoneProgressRequest](docs/Model/UpdateGoalMilestoneProgressRequest.md)
- [UpdateGoalProgressRequest](docs/Model/UpdateGoalProgressRequest.md)
- [UpdateGoalSharingRequest](docs/Model/UpdateGoalSharingRequest.md)
- [UpdateGoalV1](docs/Model/UpdateGoalV1.md)
- [UpdateGoalV11Request](docs/Model/UpdateGoalV11Request.md)
- [UpdateGoalV11RequestMilestonesInner](docs/Model/UpdateGoalV11RequestMilestonesInner.md)
- [UpdateTrainingCategoryRequest](docs/Model/UpdateTrainingCategoryRequest.md)
- [UpdateTrainingTypeRequest](docs/Model/UpdateTrainingTypeRequest.md)
- [UpdateTrainingTypeRequestCategory](docs/Model/UpdateTrainingTypeRequestCategory.md)
- [UpdateWebhookBadRequestResponse](docs/Model/UpdateWebhookBadRequestResponse.md)
- [WebHookPostFieldDataObject](docs/Model/WebHookPostFieldDataObject.md)
- [WebHookPostFieldPageDataObject](docs/Model/WebHookPostFieldPageDataObject.md)
- [WebHookPostFieldResponseObject](docs/Model/WebHookPostFieldResponseObject.md)
- [WebHookPostFieldTableDataObject](docs/Model/WebHookPostFieldTableDataObject.md)
- [WebHookResponse](docs/Model/WebHookResponse.md)
- [Webhook](docs/Model/Webhook.md)
- [WebhookBadRequest](docs/Model/WebhookBadRequest.md)
- [WebhookBadRequestErrorsInner](docs/Model/WebhookBadRequestErrorsInner.md)
- [WebhookError](docs/Model/WebhookError.md)
- [WebhookErrorErrors](docs/Model/WebhookErrorErrors.md)
- [WebhookEventType](docs/Model/WebhookEventType.md)
- [WebhookLogEntry](docs/Model/WebhookLogEntry.md)
- [WebhookLogListResponse](docs/Model/WebhookLogListResponse.md)
- [WebhookLogRateLimitResponse](docs/Model/WebhookLogRateLimitResponse.md)
- [WebhookLogRateLimitResponseError](docs/Model/WebhookLogRateLimitResponseError.md)
- [WebhookSubErrorProperty](docs/Model/WebhookSubErrorProperty.md)
- [WebhookSubErrorPropertyMonitorFieldsInner](docs/Model/WebhookSubErrorPropertyMonitorFieldsInner.md)
- [WebhookSubErrorPropertyMonitorFieldsInnerId](docs/Model/WebhookSubErrorPropertyMonitorFieldsInnerId.md)
- [WebhookSubErrorPropertyUnknownFieldsInner](docs/Model/WebhookSubErrorPropertyUnknownFieldsInner.md)
- [WebhookSubErrorPropertyUnknownFieldsInnerId](docs/Model/WebhookSubErrorPropertyUnknownFieldsInnerId.md)
- [WebhooksList](docs/Model/WebhooksList.md)
- [WebhooksListWebhooksInner](docs/Model/WebhooksListWebhooksInner.md)
- [WhosOutEntry](docs/Model/WhosOutEntry.md)
- [XmlDirectoryEmployee](docs/Model/XmlDirectoryEmployee.md)
- [XmlDirectoryEmployeeEmployees](docs/Model/XmlDirectoryEmployeeEmployees.md)
- [XmlDirectoryEmployeeEmployeesEmployeeInner](docs/Model/XmlDirectoryEmployeeEmployeesEmployeeInner.md)
- [XmlDirectoryEmployeeEmployeesEmployeeInnerFieldInner](docs/Model/XmlDirectoryEmployeeEmployeesEmployeeInnerFieldInner.md)
- [XmlDirectoryEmployeeFieldset](docs/Model/XmlDirectoryEmployeeFieldset.md)
- [XmlDirectoryEmployeeFieldsetFieldInner](docs/Model/XmlDirectoryEmployeeFieldsetFieldInner.md)
- [XmlEmployeeFiles](docs/Model/XmlEmployeeFiles.md)
- [XmlEmployeeFilesCategoryInner](docs/Model/XmlEmployeeFilesCategoryInner.md)
- [XmlEmployeeFilesCategoryInnerFileInner](docs/Model/XmlEmployeeFilesCategoryInnerFileInner.md)

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

Contributions are welcome! See [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

## Generating SDK

This requires access to the BambooHR OpenAPI spec. The path to the spec file is
specified by the `OPENAPI_SPEC_PATH` environment variable.

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

## Data Handling

This SDK is a thin HTTP client for the BambooHR API. All data transits directly between your application and the BambooHR API over HTTPS — the SDK does not send telemetry, analytics, or data to any other destination.

- **Authentication**: API keys and OAuth tokens are sent in request headers to `https://{subdomain}.bamboohr.com`. Credentials are automatically redacted from debug log output.
- **API data**: Requests and responses may include HR data such as employee records, payroll, time off, benefits, and related information. See the [API documentation](https://documentation.bamboohr.com/docs/getting-started) for details on specific endpoints and data types.
- **Logging**: The SDK's debug logger redacts sensitive headers (Authorization, API keys) by default. No request or response bodies are logged unless you explicitly enable verbose logging in your application.

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

## Terms

Use of the BambooHR API is subject to the [BambooHR Developer Terms of Service](https://www.bamboohr.com/legal/developer-terms-of-service).

## License

[MIT](LICENSE)
