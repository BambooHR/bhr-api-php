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
*AccountInformationApi* | [**baa7162824294d030115568d1d8e6ca7**](docs/Api/AccountInformationApi.md#baa7162824294d030115568d1d8e6ca7) | **GET** /api/v1/meta/timezones/{id} | Get timezone by ID
*AccountInformationApi* | [**call10d66d8561dd7dac50ff9c21ef63d83b**](docs/Api/AccountInformationApi.md#call10d66d8561dd7dac50ff9c21ef63d83b) | **GET** /api/v1/meta/timezones/by-zip/{zip} | Get timezone by ZIP code
*AccountInformationApi* | [**call5c5fb0f1211ae1c9451753f92f1053b6**](docs/Api/AccountInformationApi.md#call5c5fb0f1211ae1c9451753f92f1053b6) | **GET** /api/v1/meta/timezones | List timezones
*AccountInformationApi* | [**getAllCurrencyTypes**](docs/Api/AccountInformationApi.md#getallcurrencytypes) | **GET** /api/v1/meta/currency/types | Get all currency types
*AccountInformationApi* | [**getAllProvinces**](docs/Api/AccountInformationApi.md#getallprovinces) | **GET** /api/v1/meta/provinces | Get All Provinces
*AccountInformationApi* | [**getCountriesOptions**](docs/Api/AccountInformationApi.md#getcountriesoptions) | **GET** /api/v1/meta/countries/options | Get Countries
*AccountInformationApi* | [**getCountryById**](docs/Api/AccountInformationApi.md#getcountrybyid) | **GET** /api/v1/meta/countries/{id} | Get Country by ID
*AccountInformationApi* | [**getCurrencyConversions**](docs/Api/AccountInformationApi.md#getcurrencyconversions) | **GET** /api/v1/meta/currency-conversions | Get Currency Conversion Rates
*AccountInformationApi* | [**getMetaCompany**](docs/Api/AccountInformationApi.md#getmetacompany) | **GET** /api/v1/meta/company | Get company properties
*AccountInformationApi* | [**getStatesByCountryId**](docs/Api/AccountInformationApi.md#getstatesbycountryid) | **GET** /api/v1/meta/provinces/{countryId} | List states and provinces for a country by Country ID
*AccountInformationApi* | [**listBankHolidays**](docs/Api/AccountInformationApi.md#listbankholidays) | **GET** /api/v1/meta/bank-holidays | List Bank Holidays
*AccountInformationApi* | [**listFields**](docs/Api/AccountInformationApi.md#listfields) | **GET** /api/v1/meta/fields | List Fields
*AccountInformationApi* | [**listIndustries**](docs/Api/AccountInformationApi.md#listindustries) | **GET** /api/v1/meta/industries | List Industries
*AccountInformationApi* | [**listListFields**](docs/Api/AccountInformationApi.md#listlistfields) | **GET** /api/v1/meta/lists | List List Fields
*AccountInformationApi* | [**listTabularFields**](docs/Api/AccountInformationApi.md#listtabularfields) | **GET** /api/v1/meta/tables | List Tabular Fields
*AccountInformationApi* | [**listUsers**](docs/Api/AccountInformationApi.md#listusers) | **GET** /api/v1/meta/users | List Users
*AccountInformationApi* | [**updateListFieldValues**](docs/Api/AccountInformationApi.md#updatelistfieldvalues) | **PUT** /api/v1/meta/lists/{listFieldId} | Update List Field Values
*AlertsApi* | [**createAlertConfiguration**](docs/Api/AlertsApi.md#createalertconfiguration) | **POST** /api/v1/alert-configurations | Create Alert Configuration
*AlertsApi* | [**getAlertConfiguration**](docs/Api/AlertsApi.md#getalertconfiguration) | **GET** /api/v1/alert-configurations/{id} | Get Alert Configuration
*AlertsApi* | [**listAlertConfigurations**](docs/Api/AlertsApi.md#listalertconfigurations) | **GET** /api/v1/alert-configurations | List Alert Configurations
*AlertsApi* | [**listAlertTemplates**](docs/Api/AlertsApi.md#listalerttemplates) | **GET** /api/v1/alerts | List Alert Templates
*AlertsApi* | [**replaceAlertConfiguration**](docs/Api/AlertsApi.md#replacealertconfiguration) | **PUT** /api/v1/alert-configurations/{id} | Replace Alert Configuration
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
*BenefitsApi* | [**listBenefitCoverages**](docs/Api/BenefitsApi.md#listbenefitcoverages) | **GET** /api/v1/benefitcoverages | List Benefit Coverages
*BenefitsApi* | [**listBenefitDeductionTypes**](docs/Api/BenefitsApi.md#listbenefitdeductiontypes) | **GET** /api/v1/benefits/settings/deduction_types/all | List Benefit Deduction Types
*BenefitsApi* | [**listCompanyBenefits**](docs/Api/BenefitsApi.md#listcompanybenefits) | **GET** /api/v1/benefit/company_benefit | List Company Benefits
*BenefitsApi* | [**listEmployeeBenefits**](docs/Api/BenefitsApi.md#listemployeebenefits) | **GET** /api/v1/benefit/employee_benefit | List Employee Benefits
*BenefitsApi* | [**listEmployeeDependents**](docs/Api/BenefitsApi.md#listemployeedependents) | **GET** /api/v1/employeedependents | List Employee Dependents
*BenefitsApi* | [**listMemberBenefitEvents**](docs/Api/BenefitsApi.md#listmemberbenefitevents) | **GET** /api/v1/benefit/member_benefit | List Member Benefit Events
*BenefitsApi* | [**listMemberBenefits**](docs/Api/BenefitsApi.md#listmemberbenefits) | **GET** /api/v1/benefits/member-benefits | List Member Benefits
*BenefitsApi* | [**updateEmployeeDependent**](docs/Api/BenefitsApi.md#updateemployeedependent) | **PUT** /api/v1/employeedependents/{id} | Update Employee Dependent
*CalendarEventsApi* | [**listCalendarEvents**](docs/Api/CalendarEventsApi.md#listcalendarevents) | **GET** /api/v1/calendar-events | List Calendar Events
*ChangeTrackingApi* | [**getChangedEmployeeIds**](docs/Api/ChangeTrackingApi.md#getchangedemployeeids) | **GET** /api/v1/employees/changed | Get Changed Employee IDs
*ChangeTrackingApi* | [**getChangedEmployeeTableData**](docs/Api/ChangeTrackingApi.md#getchangedemployeetabledata) | **GET** /api/v1/employees/changed/tables/{table} | Get Changed Employee Table Data
*CompanyApi* | [**putCompanyIndustryCodes**](docs/Api/CompanyApi.md#putcompanyindustrycodes) | **PUT** /api/v1/company-profile-data/industry-codes | Update Company Industry Codes
*CompanyFilesApi* | [**createCompanyFileCategory**](docs/Api/CompanyFilesApi.md#createcompanyfilecategory) | **POST** /api/v1/files/categories | Create Company File Category
*CompanyFilesApi* | [**deleteCompanyFile**](docs/Api/CompanyFilesApi.md#deletecompanyfile) | **DELETE** /api/v1/files/{fileId} | Delete Company File
*CompanyFilesApi* | [**getCompanyFile**](docs/Api/CompanyFilesApi.md#getcompanyfile) | **GET** /api/v1/files/{fileId} | Get Company File
*CompanyFilesApi* | [**listCompanyFiles**](docs/Api/CompanyFilesApi.md#listcompanyfiles) | **GET** /api/v1/files/view | Get Company Files and Categories
*CompanyFilesApi* | [**updateCompanyFile**](docs/Api/CompanyFilesApi.md#updatecompanyfile) | **POST** /api/v1/files/{fileId} | Update Company File
*CompanyFilesApi* | [**uploadCompanyFile**](docs/Api/CompanyFilesApi.md#uploadcompanyfile) | **POST** /api/v1/files | Upload Company File
*CompanyProfileApi* | [**getCompanyProfileIntegrations**](docs/Api/CompanyProfileApi.md#getcompanyprofileintegrations) | **GET** /api/v1/company-profile-integrations | Get Company Profile Integrations
*CompanyProfileApi* | [**patchCompanyProfileCompanyInformation**](docs/Api/CompanyProfileApi.md#patchcompanyprofilecompanyinformation) | **PATCH** /api/v1/company-profile-data/company-information | Update company information (phone, address, legal name)
*CompanyProfileApi* | [**putCompanyProfileDisplayName**](docs/Api/CompanyProfileApi.md#putcompanyprofiledisplayname) | **PUT** /api/v1/company-profile-data/display-name | Update company display name
*CompensationApi* | [**c5880b509783cd9d7fce9ddf5d6af1be**](docs/Api/CompensationApi.md#c5880b509783cd9d7fce9ddf5d6af1be) | **PUT** /api/v1/compensation/equity/settings | Update company equity settings
*CompensationApi* | [**call9f398e2652ea47a6dc5121ce5184222a**](docs/Api/CompensationApi.md#call9f398e2652ea47a6dc5121ce5184222a) | **GET** /api/v1/compensation/tools | List available compensation tools
*CompensationApi* | [**db49fb29f9f04d59afad7c01ce860418**](docs/Api/CompensationApi.md#db49fb29f9f04d59afad7c01ce860418) | **GET** /api/v1/compensation/equity/settings | Get company equity settings
*CompensationBenchmarkingApi* | [**createCompensationBenchmark**](docs/Api/CompensationBenchmarkingApi.md#createcompensationbenchmark) | **POST** /api/v1/compensation/benchmarks | Create Compensation Benchmark
*CompensationBenchmarkingApi* | [**createCompensationBenchmarkSource**](docs/Api/CompensationBenchmarkingApi.md#createcompensationbenchmarksource) | **POST** /api/v1/compensation/benchmarks/sources | Create Compensation Benchmark Source
*CompensationBenchmarkingApi* | [**deleteCompensationBenchmark**](docs/Api/CompensationBenchmarkingApi.md#deletecompensationbenchmark) | **DELETE** /api/v1/compensation/benchmarks/{id} | Delete Compensation Benchmark
*CompensationBenchmarkingApi* | [**deleteCompensationBenchmarkSource**](docs/Api/CompensationBenchmarkingApi.md#deletecompensationbenchmarksource) | **DELETE** /api/v1/compensation/benchmarks/sources | Delete Compensation Benchmark Source
*CompensationBenchmarkingApi* | [**exportCompensationBenchmarkDetails**](docs/Api/CompensationBenchmarkingApi.md#exportcompensationbenchmarkdetails) | **GET** /api/v1/compensation/benchmarks/details/export | Export Compensation Benchmark Details
*CompensationBenchmarkingApi* | [**getCompensationBenchmarkDetails**](docs/Api/CompensationBenchmarkingApi.md#getcompensationbenchmarkdetails) | **GET** /api/v1/compensation/benchmarks/details | Get Compensation Benchmark Details
*CompensationBenchmarkingApi* | [**importCompensationBenchmarks**](docs/Api/CompensationBenchmarkingApi.md#importcompensationbenchmarks) | **POST** /api/v1/compensation/benchmarks/import | Import Compensation Benchmarks From CSV
*CompensationBenchmarkingApi* | [**listCompensationBenchmarkSources**](docs/Api/CompensationBenchmarkingApi.md#listcompensationbenchmarksources) | **GET** /api/v1/compensation/benchmarks/sources | List Compensation Benchmark Sources
*CompensationBenchmarkingApi* | [**listCompensationBenchmarks**](docs/Api/CompensationBenchmarkingApi.md#listcompensationbenchmarks) | **GET** /api/v1/compensation/benchmarks | List Compensation Benchmarks
*CompensationBenchmarkingApi* | [**updateCompensationBenchmark**](docs/Api/CompensationBenchmarkingApi.md#updatecompensationbenchmark) | **PUT** /api/v1/compensation/benchmarks | Update Compensation Benchmark
*CompensationBenchmarkingApi* | [**updateCompensationBenchmarkSources**](docs/Api/CompensationBenchmarkingApi.md#updatecompensationbenchmarksources) | **PUT** /api/v1/compensation/benchmarks/sources | Update Compensation Benchmark Sources
*CompensationPlanningApi* | [**a05b6d5f564f805d688ff2c1e37c3990**](docs/Api/CompensationPlanningApi.md#a05b6d5f564f805d688ff2c1e37c3990) | **POST** /api/v1/compensation/planning_cycles/{id}/recommendations/send | Send recommendations to next stage
*CompensationPlanningApi* | [**a6b8da1348a3151fe95adc03aaf64447**](docs/Api/CompensationPlanningApi.md#a6b8da1348a3151fe95adc03aaf64447) | **GET** /api/v1/compensation/planning_cycles/{id}/employees | List employees in compensation planning cycle
*CompensationPlanningApi* | [**b1e467e0eef72350eec61fcfeaf4e19d**](docs/Api/CompensationPlanningApi.md#b1e467e0eef72350eec61fcfeaf4e19d) | **DELETE** /api/v1/compensation/planning_cycles/{id}/approvals/employee/{employeeId} | Remove from approval flow
*CompensationPlanningApi* | [**b3c51254de6918637a971fe4af382a53**](docs/Api/CompensationPlanningApi.md#b3c51254de6918637a971fe4af382a53) | **GET** /api/v1/compensation/planning_cycles/{id}/admins | List compensation planning cycle admins
*CompensationPlanningApi* | [**b65f246186b41a9783a9397c11c703b4**](docs/Api/CompensationPlanningApi.md#b65f246186b41a9783a9397c11c703b4) | **GET** /api/v1/compensation/planning_cycles | List compensation planning cycles
*CompensationPlanningApi* | [**c79f9c5950f983e59d2626faa30c00a1**](docs/Api/CompensationPlanningApi.md#c79f9c5950f983e59d2626faa30c00a1) | **PUT** /api/v1/compensation/planning_cycles/{id}/change_comm/template | Save change comm template
*CompensationPlanningApi* | [**c7c32ed5278ac67e2e518bf7484a75dc**](docs/Api/CompensationPlanningApi.md#c7c32ed5278ac67e2e518bf7484a75dc) | **POST** /api/v1/compensation/planning_cycles/{id}/admins | Add cycle admins
*CompensationPlanningApi* | [**call100b0cf8c5207b35697ff10370fd5fe1**](docs/Api/CompensationPlanningApi.md#call100b0cf8c5207b35697ff10370fd5fe1) | **PUT** /api/v1/compensation/planning_cycles/{id} | Update compensation planning cycle
*CompensationPlanningApi* | [**call1d1fc0f164cb51973a0206b8e2fb2d2d**](docs/Api/CompensationPlanningApi.md#call1d1fc0f164cb51973a0206b8e2fb2d2d) | **POST** /api/v1/compensation/planning_cycles/{id}/budgets/import | Import budget breakdown
*CompensationPlanningApi* | [**call1d64402ee192568adbd5e3179a91e6e2**](docs/Api/CompensationPlanningApi.md#call1d64402ee192568adbd5e3179a91e6e2) | **PUT** /api/v1/compensation/planning_cycles/{id}/budgets/breakdown | Save budget breakdown
*CompensationPlanningApi* | [**call22ad75be25455279e2987c80851af5fc**](docs/Api/CompensationPlanningApi.md#call22ad75be25455279e2987c80851af5fc) | **DELETE** /api/v1/compensation/planning_cycles/{id} | Delete compensation planning cycle
*CompensationPlanningApi* | [**call329acecaa6df729733d0752aa9f6b204**](docs/Api/CompensationPlanningApi.md#call329acecaa6df729733d0752aa9f6b204) | **GET** /api/v1/compensation/planning_cycles/{id}/worksheet | Get compensation planning cycle worksheet
*CompensationPlanningApi* | [**call3958585c861325ea7a2cd30a8c74f042**](docs/Api/CompensationPlanningApi.md#call3958585c861325ea7a2cd30a8c74f042) | **POST** /api/v1/compensation/planning_cycles/{id}/employees | Add employees to cycle
*CompensationPlanningApi* | [**call3a19f07aa737dc826ba43b9a1c1cd257**](docs/Api/CompensationPlanningApi.md#call3a19f07aa737dc826ba43b9a1c1cd257) | **PUT** /api/v1/compensation/planning_cycles/{id}/launch | Launch compensation planning cycle
*CompensationPlanningApi* | [**call4e886b18264480611f380805301c49c4**](docs/Api/CompensationPlanningApi.md#call4e886b18264480611f380805301c49c4) | **GET** /api/v1/compensation/planning_cycles/{id}/approvals | Get compensation planning approval flows
*CompensationPlanningApi* | [**call593d5bff120edf2a218a92022a682728**](docs/Api/CompensationPlanningApi.md#call593d5bff120edf2a218a92022a682728) | **GET** /api/v1/compensation/planning_cycles/{id}/worksheet/export | Export compensation planning cycle worksheet to CSV
*CompensationPlanningApi* | [**call5c2b55158b0950b1e9211655666645b6**](docs/Api/CompensationPlanningApi.md#call5c2b55158b0950b1e9211655666645b6) | **GET** /api/v1/compensation/planning_cycles/{id} | Get compensation planning cycle details
*CompensationPlanningApi* | [**call5c4aab35a34f5760ec044104b5232bf5**](docs/Api/CompensationPlanningApi.md#call5c4aab35a34f5760ec044104b5232bf5) | **POST** /api/v1/compensation/planning_cycles/{id}/approvals/final_approver/{employeeId} | Set final approver
*CompensationPlanningApi* | [**call7efceaee2c010f88244dd01ee81e6e7b**](docs/Api/CompensationPlanningApi.md#call7efceaee2c010f88244dd01ee81e6e7b) | **GET** /api/v1/compensation/planning_cycles/{id}/budgets | Get compensation planning cycle budgets
*CompensationPlanningApi* | [**call89a5068111ec499135c7d6e9a53d5a30**](docs/Api/CompensationPlanningApi.md#call89a5068111ec499135c7d6e9a53d5a30) | **DELETE** /api/v1/compensation/planning_cycles/{id}/employees | Remove employees from cycle
*CompensationPlanningApi* | [**call9bc279d788f6e86b4cd8b2e0d3de91b1**](docs/Api/CompensationPlanningApi.md#call9bc279d788f6e86b4cd8b2e0d3de91b1) | **GET** /api/v1/compensation/planning_cycles/{id}/summary | Get compensation planning cycle summary
*CompensationPlanningApi* | [**cf87b8e09a001b6fb81dfce6c20ab9e3**](docs/Api/CompensationPlanningApi.md#cf87b8e09a001b6fb81dfce6c20ab9e3) | **PUT** /api/v1/compensation/planning_cycles/{id}/approvals/{templateId} | Update approval flow
*CompensationPlanningApi* | [**d6987e300672a00c7cfe59afebb64156**](docs/Api/CompensationPlanningApi.md#d6987e300672a00c7cfe59afebb64156) | **GET** /api/v1/compensation/planning_cycles/{id}/change_comm | Get change communication letter details
*CompensationPlanningApi* | [**dacd313af2106213fc4696175941ce65**](docs/Api/CompensationPlanningApi.md#dacd313af2106213fc4696175941ce65) | **PUT** /api/v1/compensation/planning_cycles/{id}/budgets/guidelines | Save budget guidelines
*CompensationPlanningApi* | [**e2ac4e1535f296cb8901f209e04caa83**](docs/Api/CompensationPlanningApi.md#e2ac4e1535f296cb8901f209e04caa83) | **POST** /api/v1/compensation/planning_cycles | Create compensation planning cycle
*CompensationPlanningApi* | [**ef7619b0ee4c8dc079aaea870cfbe81b**](docs/Api/CompensationPlanningApi.md#ef7619b0ee4c8dc079aaea870cfbe81b) | **DELETE** /api/v1/compensation/planning_cycles/{id}/admins/{employeeId} | Remove cycle admin
*CompensationPlanningApi* | [**f3883a522dadbe9e11b34f8b656e3adb**](docs/Api/CompensationPlanningApi.md#f3883a522dadbe9e11b34f8b656e3adb) | **POST** /api/v1/compensation/planning_cycles/{id}/recommendations | Save recommendations
*CompensationPlanningApi* | [**f4b431363af6573af46750f32632e88b**](docs/Api/CompensationPlanningApi.md#f4b431363af6573af46750f32632e88b) | **PUT** /api/v1/compensation/planning_cycles/{id}/complete | Complete compensation planning cycle
*CustomFieldsApi* | [**addCustomFieldListValue**](docs/Api/CustomFieldsApi.md#addcustomfieldlistvalue) | **POST** /api/v1/hris/custom-fields/{customFieldId}/list-values | Add Custom Field List Value
*CustomFieldsApi* | [**archivePublicCustomField**](docs/Api/CustomFieldsApi.md#archivepubliccustomfield) | **DELETE** /api/v1/hris/custom-fields/{customFieldId} | Archive Custom Field
*CustomFieldsApi* | [**createPublicCustomField**](docs/Api/CustomFieldsApi.md#createpubliccustomfield) | **POST** /api/v1/hris/custom-fields | Create Custom Field
*CustomFieldsApi* | [**deleteCustomFieldListValue**](docs/Api/CustomFieldsApi.md#deletecustomfieldlistvalue) | **DELETE** /api/v1/hris/custom-fields/{customFieldId}/list-values/{listValueId} | Delete Custom Field List Value
*CustomFieldsApi* | [**editCustomFieldListValue**](docs/Api/CustomFieldsApi.md#editcustomfieldlistvalue) | **PATCH** /api/v1/hris/custom-fields/{customFieldId}/list-values/{listValueId} | Edit Custom Field List Value
*CustomFieldsApi* | [**editPublicCustomField**](docs/Api/CustomFieldsApi.md#editpubliccustomfield) | **PUT** /api/v1/hris/custom-fields/{customFieldId} | Edit Custom Field
*CustomFieldsApi* | [**getCustomField**](docs/Api/CustomFieldsApi.md#getcustomfield) | **GET** /api/v1/hris/custom-fields/{customFieldId} | Get Custom Field
*CustomFieldsApi* | [**listArchivedCustomFields**](docs/Api/CustomFieldsApi.md#listarchivedcustomfields) | **GET** /api/v1/hris/custom-fields/archived | List Archived Custom Fields
*CustomFieldsApi* | [**listCustomFieldListValues**](docs/Api/CustomFieldsApi.md#listcustomfieldlistvalues) | **GET** /api/v1/hris/custom-fields/{customFieldId}/list-values | List Custom Field List Values
*CustomFieldsApi* | [**listCustomFieldTypes**](docs/Api/CustomFieldsApi.md#listcustomfieldtypes) | **GET** /api/v1/hris/custom-fields/types | List Custom Field Types
*CustomFieldsApi* | [**listCustomFields**](docs/Api/CustomFieldsApi.md#listcustomfields) | **GET** /api/v1/hris/custom-fields | List Custom Fields
*CustomFieldsApi* | [**unarchivePublicCustomFields**](docs/Api/CustomFieldsApi.md#unarchivepubliccustomfields) | **POST** /api/v1/hris/custom-fields/unarchive | Unarchive Custom Fields
*CustomReportsApi* | [**getLegacyReportFieldMap**](docs/Api/CustomReportsApi.md#getlegacyreportfieldmap) | **GET** /api/v1/custom-reports/legacy-field-map | Get Legacy Report Field Map
*CustomReportsApi* | [**getLegacyReportIdMap**](docs/Api/CustomReportsApi.md#getlegacyreportidmap) | **GET** /api/v1/custom-reports/legacy-id-map | Get Legacy Report ID Map
*CustomReportsApi* | [**getReportById**](docs/Api/CustomReportsApi.md#getreportbyid) | **GET** /api/v1/custom-reports/{reportId} | Get Report by ID
*CustomReportsApi* | [**listReports**](docs/Api/CustomReportsApi.md#listreports) | **GET** /api/v1/custom-reports | List Reports
*DatasetsApi* | [**getDataFromDatasetV1**](docs/Api/DatasetsApi.md#getdatafromdatasetv1) | **POST** /api/v1/datasets/{datasetName} | Get Data from Dataset (v1)
*DatasetsApi* | [**getDataFromDatasetV2**](docs/Api/DatasetsApi.md#getdatafromdatasetv2) | **POST** /api/v2/datasets/{datasetName}/data | Get Data from Dataset (v2)
*DatasetsApi* | [**getFieldOptionsV1**](docs/Api/DatasetsApi.md#getfieldoptionsv1) | **POST** /api/v1/datasets/{datasetName}/field-options | Get Field Options (v1)
*DatasetsApi* | [**getFieldOptionsV12**](docs/Api/DatasetsApi.md#getfieldoptionsv12) | **POST** /api/v1_2/datasets/{datasetName}/field-options | Get Field Options (v1.2)
*DatasetsApi* | [**getFieldsFromDatasetV1**](docs/Api/DatasetsApi.md#getfieldsfromdatasetv1) | **GET** /api/v1/datasets/{datasetName}/fields | Get Fields from Dataset (v1)
*DatasetsApi* | [**getFieldsFromDatasetV12**](docs/Api/DatasetsApi.md#getfieldsfromdatasetv12) | **GET** /api/v1_2/datasets/{datasetName}/fields | Get Fields from Dataset (v1.2)
*DatasetsApi* | [**listDatasetsV1**](docs/Api/DatasetsApi.md#listdatasetsv1) | **GET** /api/v1/datasets | List Datasets (v1)
*DatasetsApi* | [**listDatasetsV12**](docs/Api/DatasetsApi.md#listdatasetsv12) | **GET** /api/v1_2/datasets | List Datasets (v1.2)
*EmployeeFilesApi* | [**createEmployeeFileCategory**](docs/Api/EmployeeFilesApi.md#createemployeefilecategory) | **POST** /api/v1/employees/files/categories | Create Employee File Category
*EmployeeFilesApi* | [**deleteEmployeeFile**](docs/Api/EmployeeFilesApi.md#deleteemployeefile) | **DELETE** /api/v1/employees/{id}/files/{fileId} | Delete Employee File
*EmployeeFilesApi* | [**getEmployeeFile**](docs/Api/EmployeeFilesApi.md#getemployeefile) | **GET** /api/v1/employees/{id}/files/{fileId} | Get Employee File
*EmployeeFilesApi* | [**listEmployeeFiles**](docs/Api/EmployeeFilesApi.md#listemployeefiles) | **GET** /api/v1/employees/{id}/files/view | List Employee Files
*EmployeeFilesApi* | [**updateEmployeeFile**](docs/Api/EmployeeFilesApi.md#updateemployeefile) | **POST** /api/v1/employees/{id}/files/{fileId} | Update Employee File
*EmployeeFilesApi* | [**uploadEmployeeFile**](docs/Api/EmployeeFilesApi.md#uploademployeefile) | **POST** /api/v1/employees/{id}/files | Upload Employee File
*EmployeeTablesApi* | [**createTableRowV1**](docs/Api/EmployeeTablesApi.md#createtablerowv1) | **POST** /api/v1/employees/{id}/tables/{table} | Create Table Row (v1)
*EmployeeTablesApi* | [**createTableRowV11**](docs/Api/EmployeeTablesApi.md#createtablerowv11) | **POST** /api/v1_1/employees/{id}/tables/{table} | Create Table Row (v1.1)
*EmployeeTablesApi* | [**deleteEmployeeTableRow**](docs/Api/EmployeeTablesApi.md#deleteemployeetablerow) | **DELETE** /api/v1/employees/{id}/tables/{table}/{rowId} | Delete Employee Table Row
*EmployeeTablesApi* | [**getEmployeeTableData**](docs/Api/EmployeeTablesApi.md#getemployeetabledata) | **GET** /api/v1/employees/{id}/tables/{table} | Get Employee Table Data
*EmployeeTablesApi* | [**updateTableRowV1**](docs/Api/EmployeeTablesApi.md#updatetablerowv1) | **POST** /api/v1/employees/{id}/tables/{table}/{rowId} | Update Table Row (v1)
*EmployeeTablesApi* | [**updateTableRowV11**](docs/Api/EmployeeTablesApi.md#updatetablerowv11) | **POST** /api/v1_1/employees/{id}/tables/{table}/{rowId} | Update Table Row (v1.1)
*EmployeeVerificationApi* | [**getEmployeeVerificationIntegration**](docs/Api/EmployeeVerificationApi.md#getemployeeverificationintegration) | **GET** /api/v1/employee-verifications/integration | Get employee verification integration status
*EmployeeVerificationApi* | [**listEmployeeVerificationsByEmployee**](docs/Api/EmployeeVerificationApi.md#listemployeeverificationsbyemployee) | **GET** /api/v1/employee-verifications/employees/{employeeId} | List employee verification records for an employee
*EmployeeVerificationApi* | [**sendEmployeeVerificationLifecycleEmailByUser**](docs/Api/EmployeeVerificationApi.md#sendemployeeverificationlifecycleemailbyuser) | **POST** /api/v1/employee-verifications/users/{userId}/send-email | Send employee verification lifecycle email by user and email type
*EmployeeVerificationApi* | [**updateEmployeeVerification**](docs/Api/EmployeeVerificationApi.md#updateemployeeverification) | **PUT** /api/v1/employee-verifications/employees/{employeeId}/{verificationId} | Update an employee verification record
*EmployeeVerificationApi* | [**updateEmployeeVerificationIntegration**](docs/Api/EmployeeVerificationApi.md#updateemployeeverificationintegration) | **PUT** /api/v1/employee-verifications/integration | Enable or disable the employee verification integration
*EmployeesApi* | [**createEmployee**](docs/Api/EmployeesApi.md#createemployee) | **POST** /api/v1/employees | Create Employee
*EmployeesApi* | [**deleteEmployee**](docs/Api/EmployeesApi.md#deleteemployee) | **DELETE** /api/v1/employees/{id} | Delete employee
*EmployeesApi* | [**getCompanyInformation**](docs/Api/EmployeesApi.md#getcompanyinformation) | **GET** /api/v1/company_information | Get Company Information
*EmployeesApi* | [**getEmployee**](docs/Api/EmployeesApi.md#getemployee) | **GET** /api/v1/employees/{id} | Get Employee
*EmployeesApi* | [**getEmployeesDirectory**](docs/Api/EmployeesApi.md#getemployeesdirectory) | **GET** /api/v1/employees/directory | Get Employees Directory
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
*HolidaysApi* | [**bulkInsertCompanyHolidays**](docs/Api/HolidaysApi.md#bulkinsertcompanyholidays) | **POST** /api/v1/holidays/bulk-insert | Bulk Create Company Holidays
*HolidaysApi* | [**createCompanyHoliday**](docs/Api/HolidaysApi.md#createcompanyholiday) | **POST** /api/v1/holidays | Create Company Holiday
*HolidaysApi* | [**deleteCompanyHoliday**](docs/Api/HolidaysApi.md#deletecompanyholiday) | **DELETE** /api/v1/holidays/{id} | Delete Company Holiday
*HolidaysApi* | [**getCatalogHoliday**](docs/Api/HolidaysApi.md#getcatalogholiday) | **GET** /api/v1/holidays/catalog/{uuid} | Get Catalog Holiday
*HolidaysApi* | [**getCompanyHoliday**](docs/Api/HolidaysApi.md#getcompanyholiday) | **GET** /api/v1/holidays/{id} | Get Company Holiday
*HolidaysApi* | [**listCatalogHolidays**](docs/Api/HolidaysApi.md#listcatalogholidays) | **GET** /api/v1/holidays/catalog | List Catalog Holidays
*HolidaysApi* | [**listCompanyHolidays**](docs/Api/HolidaysApi.md#listcompanyholidays) | **GET** /api/v1/holidays | List Company Holidays
*HolidaysApi* | [**updateCompanyHoliday**](docs/Api/HolidaysApi.md#updatecompanyholiday) | **PATCH** /api/v1/holidays/{id} | Update Company Holiday
*HoursApi* | [**createOrUpdateTimeTrackingHourRecords**](docs/Api/HoursApi.md#createorupdatetimetrackinghourrecords) | **POST** /api/v1/timetracking/record | Create or Update Hour Records
*HoursApi* | [**createTimeTrackingHourRecord**](docs/Api/HoursApi.md#createtimetrackinghourrecord) | **POST** /api/v1/timetracking/add | Create Hour Record
*HoursApi* | [**deleteTimeTrackingHourRecord**](docs/Api/HoursApi.md#deletetimetrackinghourrecord) | **DELETE** /api/v1/timetracking/delete/{id} | Delete Hour Record
*HoursApi* | [**getTimeTrackingRecord**](docs/Api/HoursApi.md#gettimetrackingrecord) | **GET** /api/v1/timetracking/record/{id} | Get Time Tracking Record
*HoursApi* | [**updateTimeTrackingRecord**](docs/Api/HoursApi.md#updatetimetrackingrecord) | **PUT** /api/v1/timetracking/adjust | Update Hour Record
*LocationsApi* | [**createLocation**](docs/Api/LocationsApi.md#createlocation) | **POST** /api/v1/hris/org/locations | Create a job location
*LocationsApi* | [**deleteLocation**](docs/Api/LocationsApi.md#deletelocation) | **DELETE** /api/v1/hris/org/locations/{id} | Delete a job location
*LocationsApi* | [**getLocation**](docs/Api/LocationsApi.md#getlocation) | **GET** /api/v1/hris/org/locations/{id} | Get a job location
*LocationsApi* | [**getLocations**](docs/Api/LocationsApi.md#getlocations) | **GET** /api/v1/hris/org/locations | List job locations
*LocationsApi* | [**updateLocation**](docs/Api/LocationsApi.md#updatelocation) | **PUT** /api/v1/hris/org/locations/{id} | Update a job location
*LoginApi* | [**login**](docs/Api/LoginApi.md#login) | **POST** /api/v1/login | Login
*MealRestBreaksApi* | [**assignEmployeesToBreakPolicy**](docs/Api/MealRestBreaksApi.md#assignemployeestobreakpolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/assign | Assign Employees to Break Policy
*MealRestBreaksApi* | [**createBreak**](docs/Api/MealRestBreaksApi.md#createbreak) | **POST** /api/v1/time-tracking/break-policies/{id}/breaks | Create Break
*MealRestBreaksApi* | [**createBreakPolicy**](docs/Api/MealRestBreaksApi.md#createbreakpolicy) | **POST** /api/v1/time-tracking/break-policies | Create Break Policy
*MealRestBreaksApi* | [**deleteBreak**](docs/Api/MealRestBreaksApi.md#deletebreak) | **DELETE** /api/v1/time-tracking/breaks/{id} | Delete Break
*MealRestBreaksApi* | [**deleteBreakPolicy**](docs/Api/MealRestBreaksApi.md#deletebreakpolicy) | **DELETE** /api/v1/time-tracking/break-policies/{id} | Delete Break Policy
*MealRestBreaksApi* | [**getBreak**](docs/Api/MealRestBreaksApi.md#getbreak) | **GET** /api/v1/time-tracking/breaks/{id} | Get Break
*MealRestBreaksApi* | [**getBreakPolicy**](docs/Api/MealRestBreaksApi.md#getbreakpolicy) | **GET** /api/v1/time-tracking/break-policies/{id} | Get Break Policy
*MealRestBreaksApi* | [**getBreakPolicySuggestions**](docs/Api/MealRestBreaksApi.md#getbreakpolicysuggestions) | **POST** /api/v1/time-tracking/break-policies/suggestions | Get Break Policy Suggestions
*MealRestBreaksApi* | [**listBreakAssessments**](docs/Api/MealRestBreaksApi.md#listbreakassessments) | **GET** /api/v1/time-tracking/break-assessments | List Break Assessments
*MealRestBreaksApi* | [**listBreakPolicies**](docs/Api/MealRestBreaksApi.md#listbreakpolicies) | **GET** /api/v1/time-tracking/break-policies | List Break Policies
*MealRestBreaksApi* | [**listBreakPolicyBreaks**](docs/Api/MealRestBreaksApi.md#listbreakpolicybreaks) | **GET** /api/v1/time-tracking/break-policies/{id}/breaks | List Breaks for Break Policy
*MealRestBreaksApi* | [**listBreakPolicyEmployees**](docs/Api/MealRestBreaksApi.md#listbreakpolicyemployees) | **GET** /api/v1/time-tracking/break-policies/{id}/employees | List Break Policy Employees
*MealRestBreaksApi* | [**listEmployeeBreakAvailabilities**](docs/Api/MealRestBreaksApi.md#listemployeebreakavailabilities) | **GET** /api/v1/time-tracking/employees/{id}/break-availabilities | List Employee Break Availabilities
*MealRestBreaksApi* | [**listEmployeeBreakPolicies**](docs/Api/MealRestBreaksApi.md#listemployeebreakpolicies) | **GET** /api/v1/time-tracking/employees/{id}/break-policies | List Employee Break Policies
*MealRestBreaksApi* | [**replaceBreaksForBreakPolicy**](docs/Api/MealRestBreaksApi.md#replacebreaksforbreakpolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/breaks | Replace Breaks for Break Policy
*MealRestBreaksApi* | [**setBreakPolicyEmployees**](docs/Api/MealRestBreaksApi.md#setbreakpolicyemployees) | **PUT** /api/v1/time-tracking/break-policies/{id}/assign | Set Employees for Break Policy
*MealRestBreaksApi* | [**syncBreakPolicy**](docs/Api/MealRestBreaksApi.md#syncbreakpolicy) | **PUT** /api/v1/time-tracking/break-policies/{id}/sync | Sync Break Policy
*MealRestBreaksApi* | [**unassignEmployeesFromBreakPolicy**](docs/Api/MealRestBreaksApi.md#unassignemployeesfrombreakpolicy) | **POST** /api/v1/time-tracking/break-policies/{id}/unassign | Unassign Employees from Break Policy
*MealRestBreaksApi* | [**updateBreak**](docs/Api/MealRestBreaksApi.md#updatebreak) | **PATCH** /api/v1/time-tracking/breaks/{id} | Update Break
*MealRestBreaksApi* | [**updateBreakPolicy**](docs/Api/MealRestBreaksApi.md#updatebreakpolicy) | **PATCH** /api/v1/time-tracking/break-policies/{id} | Update Break Policy
*OnboardingApi* | [**caa7fc488bcfaef14125398f2ebb987d**](docs/Api/OnboardingApi.md#caa7fc488bcfaef14125398f2ebb987d) | **DELETE** /api/v1/new-hire-packets/{id} | Delete new hire packet
*OnboardingApi* | [**call0158de7cde2a4c4cf577f0b25070d809**](docs/Api/OnboardingApi.md#call0158de7cde2a4c4cf577f0b25070d809) | **GET** /api/v1/employees/{employeeId}/onboarding-experiences | List employee onboarding experiences
*OnboardingApi* | [**call044949386f2d655c6a627ef53f9434b7**](docs/Api/OnboardingApi.md#call044949386f2d655c6a627ef53f9434b7) | **GET** /api/v1/onboarding/new-hire-widget | Get welcome new hires widget
*OnboardingApi* | [**call19c7e26a1347ae7eb22919e9b0595c19**](docs/Api/OnboardingApi.md#call19c7e26a1347ae7eb22919e9b0595c19) | **POST** /api/v1/new-hire-packets/{id}/cancel | Cancel new hire packet
*OnboardingApi* | [**call1ab0279d46023eb951a434f24df885f1**](docs/Api/OnboardingApi.md#call1ab0279d46023eb951a434f24df885f1) | **PUT** /api/v1/new-hire-packets/{id} | Update new hire packet
*OnboardingApi* | [**call288aa996aba16d7a495c62321ea999a9**](docs/Api/OnboardingApi.md#call288aa996aba16d7a495c62321ea999a9) | **POST** /api/v1/employees/{employeeId}/onboarding-experiences | Create employee onboarding experience
*OnboardingApi* | [**call696f0a229cdde60b733568e3c4d043d9**](docs/Api/OnboardingApi.md#call696f0a229cdde60b733568e3c4d043d9) | **GET** /api/v1/new-hire-packets/{id} | Get new hire packet by id
*OnboardingApi* | [**call847dd061d1d1859e7ce8cb3adfc9faf2**](docs/Api/OnboardingApi.md#call847dd061d1d1859e7ce8cb3adfc9faf2) | **GET** /api/v1/employees/{employeeId}/onboarding-experiences/{onboardingExperienceId} | Get employee onboarding experience by id
*OnboardingApi* | [**ec1ba8e76f33960b018d0d7518fe97b5**](docs/Api/OnboardingApi.md#ec1ba8e76f33960b018d0d7518fe97b5) | **POST** /api/v1/new-hire-packets | Create new hire packet
*OnboardingApi* | [**f44b802c30cdea2b9076b3f82f99c74d**](docs/Api/OnboardingApi.md#f44b802c30cdea2b9076b3f82f99c74d) | **GET** /api/v1/new-hire-packets | List new hire packets
*OnboardingApi* | [**f49b0f1f2fb1ef2c408ba12916ee9baa**](docs/Api/OnboardingApi.md#f49b0f1f2fb1ef2c408ba12916ee9baa) | **POST** /api/v1/new-hire-packets/{id}/send | Send new hire packet
*OnboardingApi* | [**updateNewHirePacketGtkyAnswerVisibility**](docs/Api/OnboardingApi.md#updatenewhirepacketgtkyanswervisibility) | **PUT** /api/v1/new-hire-packets/{id}/question-visibility | Update GTKY answer visibility for a new hire packet
*PayGradesBandsApi* | [**deleteCompensationLevelGroupsOrLevel**](docs/Api/PayGradesBandsApi.md#deletecompensationlevelgroupsorlevel) | **DELETE** /api/v1/pay-grades-and-bands/levels/{segment} | Delete Compensation Level Groups or Level
*PayGradesBandsApi* | [**getCompensationLevelGroupStatusCounts**](docs/Api/PayGradesBandsApi.md#getcompensationlevelgroupstatuscounts) | **GET** /api/v1/pay-grades-and-bands/status-counts | Get Compensation Level Group Status Counts
*PayGradesBandsApi* | [**getJobTitleLevelAssignments**](docs/Api/PayGradesBandsApi.md#getjobtitlelevelassignments) | **GET** /api/v1/pay-grades-and-bands/job-titles | Get Job Titles and Level Assignments
*PayGradesBandsApi* | [**getLevelsAndBandsReview**](docs/Api/PayGradesBandsApi.md#getlevelsandbandsreview) | **GET** /api/v1/pay-grades-and-bands/review | Get Levels and Bands Review
*PayGradesBandsApi* | [**getLevelsAndBandsStatus**](docs/Api/PayGradesBandsApi.md#getlevelsandbandsstatus) | **GET** /api/v1/pay-grades-and-bands/status | Get Levels and Bands Status
*PayGradesBandsApi* | [**getPayBands**](docs/Api/PayGradesBandsApi.md#getpaybands) | **GET** /api/v1/pay-grades-and-bands/pay-bands | Get Pay Bands
*PayGradesBandsApi* | [**getPublishedLevelsAndBands**](docs/Api/PayGradesBandsApi.md#getpublishedlevelsandbands) | **GET** /api/v1/pay-grades-and-bands | Get Published Levels and Bands
*PayGradesBandsApi* | [**listCompensationLevelGroupsAndLevels**](docs/Api/PayGradesBandsApi.md#listcompensationlevelgroupsandlevels) | **GET** /api/v1/pay-grades-and-bands/levels | List Compensation Level Groups and Levels
*PayGradesBandsApi* | [**listJobTitlesWithEmployees**](docs/Api/PayGradesBandsApi.md#listjobtitleswithemployees) | **GET** /api/v1/pay-grades-and-bands/job-titles-with-employees | List Job Titles with Employees
*PayGradesBandsApi* | [**publishDraftCompensationLevelGroups**](docs/Api/PayGradesBandsApi.md#publishdraftcompensationlevelgroups) | **POST** /api/v1/pay-grades-and-bands/publish | Publish Draft Compensation Level Groups
*PayGradesBandsApi* | [**replaceJobTitleLevelAssignments**](docs/Api/PayGradesBandsApi.md#replacejobtitlelevelassignments) | **PUT** /api/v1/pay-grades-and-bands/job-titles | Replace Job Title Level Assignments
*PayGradesBandsApi* | [**updateCompensationLevelGroupsAndLevels**](docs/Api/PayGradesBandsApi.md#updatecompensationlevelgroupsandlevels) | **PUT** /api/v1/pay-grades-and-bands/levels | Update Compensation Level Groups and Levels
*PayGradesBandsApi* | [**updatePayBands**](docs/Api/PayGradesBandsApi.md#updatepaybands) | **PUT** /api/v1/pay-grades-and-bands/pay-bands | Update Pay Bands
*PayGradesBandsApi* | [**uploadLevelsAndBandsCsv**](docs/Api/PayGradesBandsApi.md#uploadlevelsandbandscsv) | **POST** /api/v1/pay-grades-and-bands/import | Upload Levels and Bands CSV
*PhotosApi* | [**getEmployeePhoto**](docs/Api/PhotosApi.md#getemployeephoto) | **GET** /api/v1/employees/{employeeId}/photo/{size} | Get Employee Photo
*PhotosApi* | [**uploadEmployeePhoto**](docs/Api/PhotosApi.md#uploademployeephoto) | **POST** /api/v1/employees/{employeeId}/photo | Upload Employee Photo
*ReportsApi* | [**getCompanyReport**](docs/Api/ReportsApi.md#getcompanyreport) | **GET** /api/v1/reports/{id} | Get Company Report
*ReportsApi* | [**requestCustomReport**](docs/Api/ReportsApi.md#requestcustomreport) | **POST** /api/v1/reports/custom | Request Custom Report
*SchedulingApi* | [**schedulingCreateSchedule**](docs/Api/SchedulingApi.md#schedulingcreateschedule) | **POST** /api/v1/scheduling/schedules | Create Schedule
*SchedulingApi* | [**schedulingCreateShift**](docs/Api/SchedulingApi.md#schedulingcreateshift) | **POST** /api/v1/scheduling/shifts | Create Shift
*SchedulingApi* | [**schedulingDeleteSchedule**](docs/Api/SchedulingApi.md#schedulingdeleteschedule) | **DELETE** /api/v1/scheduling/schedules/{id} | Delete Schedule
*SchedulingApi* | [**schedulingDeleteShift**](docs/Api/SchedulingApi.md#schedulingdeleteshift) | **DELETE** /api/v1/scheduling/shifts/{id} | Delete Shift
*SchedulingApi* | [**schedulingGetSchedule**](docs/Api/SchedulingApi.md#schedulinggetschedule) | **GET** /api/v1/scheduling/schedules/{id} | Get Schedule
*SchedulingApi* | [**schedulingGetSchedulePdf**](docs/Api/SchedulingApi.md#schedulinggetschedulepdf) | **GET** /api/v1/scheduling/schedules/{id}/pdf | Get Schedule PDF
*SchedulingApi* | [**schedulingGetShift**](docs/Api/SchedulingApi.md#schedulinggetshift) | **GET** /api/v1/scheduling/shifts/{id} | Get Shift
*SchedulingApi* | [**schedulingListSchedules**](docs/Api/SchedulingApi.md#schedulinglistschedules) | **GET** /api/v1/scheduling/schedules | List Schedules
*SchedulingApi* | [**schedulingListShiftAssessments**](docs/Api/SchedulingApi.md#schedulinglistshiftassessments) | **GET** /api/v1/scheduling/shift-assessments | List Shift Assessments
*SchedulingApi* | [**schedulingListShifts**](docs/Api/SchedulingApi.md#schedulinglistshifts) | **GET** /api/v1/scheduling/shifts | List Shifts
*SchedulingApi* | [**schedulingListTimezones**](docs/Api/SchedulingApi.md#schedulinglisttimezones) | **GET** /api/v1/scheduling/timezones | List Timezones
*SchedulingApi* | [**schedulingPublishShifts**](docs/Api/SchedulingApi.md#schedulingpublishshifts) | **POST** /api/v1/scheduling/shifts/publish | Publish Shifts
*SchedulingApi* | [**schedulingUpdateSchedule**](docs/Api/SchedulingApi.md#schedulingupdateschedule) | **PATCH** /api/v1/scheduling/schedules/{id} | Update Schedule
*SchedulingApi* | [**schedulingUpdateShift**](docs/Api/SchedulingApi.md#schedulingupdateshift) | **PATCH** /api/v1/scheduling/shifts/{id} | Update Shift
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
*TimeOffApi* | [**listWhosOutV1**](docs/Api/TimeOffApi.md#listwhosoutv1) | **GET** /api/v1/whos-out | List Who&#39;s Out
*TimeOffApi* | [**updateTimeOffRequestStatus**](docs/Api/TimeOffApi.md#updatetimeoffrequeststatus) | **PUT** /api/v1/time_off/requests/{requestId}/status | Update Time Off Request Status
*TimeTrackingApi* | [**approveTimesheet**](docs/Api/TimeTrackingApi.md#approvetimesheet) | **POST** /api/v1/time-tracking/timesheet-approvals | Approve Timesheet
*TimeTrackingApi* | [**bulkUpsertTimeTrackingEmployeeEnrollments**](docs/Api/TimeTrackingApi.md#bulkupserttimetrackingemployeeenrollments) | **POST** /api/v1/time-tracking/employees/bulk-upsert | Bulk Upsert Employee Enrollments
*TimeTrackingApi* | [**clockIn**](docs/Api/TimeTrackingApi.md#clockin) | **POST** /api/v1/time-tracking/clock-ins | Clock In
*TimeTrackingApi* | [**clockOut**](docs/Api/TimeTrackingApi.md#clockout) | **POST** /api/v1/time-tracking/clock-outs | Clock Out
*TimeTrackingApi* | [**createClockEntry**](docs/Api/TimeTrackingApi.md#createclockentry) | **POST** /api/v1/time-tracking/clock-entries | Create Clock Entry
*TimeTrackingApi* | [**createHourEntry**](docs/Api/TimeTrackingApi.md#createhourentry) | **POST** /api/v1/time-tracking/hour-entries | Create Hour Entry
*TimeTrackingApi* | [**createOrUpdateTimesheetClockEntries**](docs/Api/TimeTrackingApi.md#createorupdatetimesheetclockentries) | **POST** /api/v1/time_tracking/clock_entries/store | Create or Update Timesheet Clock Entries
*TimeTrackingApi* | [**createOrUpdateTimesheetHourEntries**](docs/Api/TimeTrackingApi.md#createorupdatetimesheethourentries) | **POST** /api/v1/time_tracking/hour_entries/store | Create or Update Timesheet Hour Entries
*TimeTrackingApi* | [**createProjectTask**](docs/Api/TimeTrackingApi.md#createprojecttask) | **POST** /api/v1/time-tracking/projects/{projectId}/tasks | Create Time Tracking Project Task
*TimeTrackingApi* | [**createShiftDifferential**](docs/Api/TimeTrackingApi.md#createshiftdifferential) | **POST** /api/v1/time-tracking/shift-differentials | Create Time Tracking Shift Differential
*TimeTrackingApi* | [**createTimeTrackingConfiguration**](docs/Api/TimeTrackingApi.md#createtimetrackingconfiguration) | **POST** /api/v1/time-tracking/configurations | Create Configuration
*TimeTrackingApi* | [**createTimeTrackingProject**](docs/Api/TimeTrackingApi.md#createtimetrackingproject) | **POST** /api/v1/time-tracking/projects | Create Time Tracking Project
*TimeTrackingApi* | [**createTimeTrackingProjectLegacy**](docs/Api/TimeTrackingApi.md#createtimetrackingprojectlegacy) | **POST** /api/v1/time_tracking/projects | Create Time Tracking Project (Legacy)
*TimeTrackingApi* | [**createTimesheetClockInEntry**](docs/Api/TimeTrackingApi.md#createtimesheetclockinentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_in | Create Timesheet Clock-In Entry
*TimeTrackingApi* | [**createTimesheetClockOutEntry**](docs/Api/TimeTrackingApi.md#createtimesheetclockoutentry) | **POST** /api/v1/time_tracking/employees/{employeeId}/clock_out | Create Timesheet Clock-Out Entry
*TimeTrackingApi* | [**deleteClockEntry**](docs/Api/TimeTrackingApi.md#deleteclockentry) | **DELETE** /api/v1/time-tracking/clock-entries/{id} | Delete Clock Entry
*TimeTrackingApi* | [**deleteHourEntry**](docs/Api/TimeTrackingApi.md#deletehourentry) | **DELETE** /api/v1/time-tracking/hour-entries/{id} | Delete Hour Entry
*TimeTrackingApi* | [**deleteProject**](docs/Api/TimeTrackingApi.md#deleteproject) | **DELETE** /api/v1/time-tracking/projects/{id} | Delete Time Tracking Project
*TimeTrackingApi* | [**deleteShiftDifferential**](docs/Api/TimeTrackingApi.md#deleteshiftdifferential) | **DELETE** /api/v1/time-tracking/shift-differentials/{id} | Delete Time Tracking Shift Differential
*TimeTrackingApi* | [**deleteTask**](docs/Api/TimeTrackingApi.md#deletetask) | **DELETE** /api/v1/time-tracking/tasks/{id} | Delete Time Tracking Task
*TimeTrackingApi* | [**deleteTimeTrackingConfiguration**](docs/Api/TimeTrackingApi.md#deletetimetrackingconfiguration) | **DELETE** /api/v1/time-tracking/configurations/{id} | Delete Configuration
*TimeTrackingApi* | [**deleteTimeTrackingKiosk**](docs/Api/TimeTrackingApi.md#deletetimetrackingkiosk) | **DELETE** /api/v1/time-tracking/kiosks/{id} | Delete Time Tracking Kiosk
*TimeTrackingApi* | [**deleteTimesheetClockEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheetclockentriesviapost) | **POST** /api/v1/time_tracking/clock_entries/delete | Delete Timesheet Clock Entries
*TimeTrackingApi* | [**deleteTimesheetHourEntriesViaPost**](docs/Api/TimeTrackingApi.md#deletetimesheethourentriesviapost) | **POST** /api/v1/time_tracking/hour_entries/delete | Delete Timesheet Hour Entries
*TimeTrackingApi* | [**getClockEntry**](docs/Api/TimeTrackingApi.md#getclockentry) | **GET** /api/v1/time-tracking/clock-entries/{id} | Get Clock Entry
*TimeTrackingApi* | [**getHourEntry**](docs/Api/TimeTrackingApi.md#gethourentry) | **GET** /api/v1/time-tracking/hour-entries/{id} | Get Hour Entry
*TimeTrackingApi* | [**getProject**](docs/Api/TimeTrackingApi.md#getproject) | **GET** /api/v1/time-tracking/projects/{id} | Get Time Tracking Project
*TimeTrackingApi* | [**getShiftDifferential**](docs/Api/TimeTrackingApi.md#getshiftdifferential) | **GET** /api/v1/time-tracking/shift-differentials/{id} | Get Time Tracking Shift Differential
*TimeTrackingApi* | [**getTask**](docs/Api/TimeTrackingApi.md#gettask) | **GET** /api/v1/time-tracking/tasks/{id} | Get Time Tracking Task
*TimeTrackingApi* | [**getTimeTrackingConfiguration**](docs/Api/TimeTrackingApi.md#gettimetrackingconfiguration) | **GET** /api/v1/time-tracking/configurations/{id} | Get Configuration
*TimeTrackingApi* | [**getTimeTrackingEmployeeEnrollment**](docs/Api/TimeTrackingApi.md#gettimetrackingemployeeenrollment) | **GET** /api/v1/time-tracking/employees/{employeeId} | Get Employee Enrollment
*TimeTrackingApi* | [**getTimeTrackingKiosk**](docs/Api/TimeTrackingApi.md#gettimetrackingkiosk) | **GET** /api/v1/time-tracking/kiosks/{id} | Get Time Tracking Kiosk
*TimeTrackingApi* | [**getTimeTrackingTimeClock**](docs/Api/TimeTrackingApi.md#gettimetrackingtimeclock) | **GET** /api/v1/time-tracking/time-clocks/{id} | Get Time Tracking Time Clock
*TimeTrackingApi* | [**getTimesheet**](docs/Api/TimeTrackingApi.md#gettimesheet) | **GET** /api/v1/time-tracking/timesheets/{id} | Get Timesheet
*TimeTrackingApi* | [**getTimesheetSummary**](docs/Api/TimeTrackingApi.md#gettimesheetsummary) | **GET** /api/v1/time-tracking/timesheets/{id}/summary | Get Timesheet Summary
*TimeTrackingApi* | [**listClockEntries**](docs/Api/TimeTrackingApi.md#listclockentries) | **GET** /api/v1/time-tracking/clock-entries | List Clock Entries
*TimeTrackingApi* | [**listHourEntries**](docs/Api/TimeTrackingApi.md#listhourentries) | **GET** /api/v1/time-tracking/hour-entries | List Hour Entries
*TimeTrackingApi* | [**listProjectTasks**](docs/Api/TimeTrackingApi.md#listprojecttasks) | **GET** /api/v1/time-tracking/projects/{projectId}/tasks | List Time Tracking Project Tasks
*TimeTrackingApi* | [**listProjects**](docs/Api/TimeTrackingApi.md#listprojects) | **GET** /api/v1/time-tracking/projects | List Time Tracking Projects
*TimeTrackingApi* | [**listShiftDifferentials**](docs/Api/TimeTrackingApi.md#listshiftdifferentials) | **GET** /api/v1/time-tracking/shift-differentials | List Time Tracking Shift Differentials
*TimeTrackingApi* | [**listTimeTrackingConfigurations**](docs/Api/TimeTrackingApi.md#listtimetrackingconfigurations) | **GET** /api/v1/time-tracking/configurations | List Configurations
*TimeTrackingApi* | [**listTimeTrackingEmployees**](docs/Api/TimeTrackingApi.md#listtimetrackingemployees) | **GET** /api/v1/time-tracking/employees | List Enrolled Employees
*TimeTrackingApi* | [**listTimeTrackingKiosks**](docs/Api/TimeTrackingApi.md#listtimetrackingkiosks) | **GET** /api/v1/time-tracking/kiosks | List Time Tracking Kiosks
*TimeTrackingApi* | [**listTimeTrackingTimeClocks**](docs/Api/TimeTrackingApi.md#listtimetrackingtimeclocks) | **GET** /api/v1/time-tracking/time-clocks | List Time Tracking Time Clocks
*TimeTrackingApi* | [**listTimesheetEntries**](docs/Api/TimeTrackingApi.md#listtimesheetentries) | **GET** /api/v1/time_tracking/timesheet_entries | List Timesheet Entries
*TimeTrackingApi* | [**listTimesheets**](docs/Api/TimeTrackingApi.md#listtimesheets) | **GET** /api/v1/time-tracking/timesheets | List Timesheets
*TimeTrackingApi* | [**updateClockEntry**](docs/Api/TimeTrackingApi.md#updateclockentry) | **PATCH** /api/v1/time-tracking/clock-entries/{id} | Update Clock Entry
*TimeTrackingApi* | [**updateHourEntry**](docs/Api/TimeTrackingApi.md#updatehourentry) | **PATCH** /api/v1/time-tracking/hour-entries/{id} | Update Hour Entry
*TimeTrackingApi* | [**updateProject**](docs/Api/TimeTrackingApi.md#updateproject) | **PATCH** /api/v1/time-tracking/projects/{id} | Update Time Tracking Project
*TimeTrackingApi* | [**updateShiftDifferential**](docs/Api/TimeTrackingApi.md#updateshiftdifferential) | **PATCH** /api/v1/time-tracking/shift-differentials/{id} | Update Time Tracking Shift Differential
*TimeTrackingApi* | [**updateTask**](docs/Api/TimeTrackingApi.md#updatetask) | **PATCH** /api/v1/time-tracking/tasks/{id} | Update Time Tracking Task
*TimeTrackingApi* | [**updateTimeTrackingConfiguration**](docs/Api/TimeTrackingApi.md#updatetimetrackingconfiguration) | **PATCH** /api/v1/time-tracking/configurations/{id} | Update Configuration
*TimeTrackingApi* | [**updateTimeTrackingEmployeeEnrollment**](docs/Api/TimeTrackingApi.md#updatetimetrackingemployeeenrollment) | **PATCH** /api/v1/time-tracking/employees/{employeeId} | Update Employee Enrollment
*TimeTrackingApi* | [**updateTimeTrackingKiosk**](docs/Api/TimeTrackingApi.md#updatetimetrackingkiosk) | **PATCH** /api/v1/time-tracking/kiosks/{id} | Update Time Tracking Kiosk
*TimeTrackingApi* | [**updateTimeTrackingTimeClock**](docs/Api/TimeTrackingApi.md#updatetimetrackingtimeclock) | **PATCH** /api/v1/time-tracking/time-clocks/{id} | Update Time Tracking Time Clock
*TotalRewardsApi* | [**addTotalRewardsEmployees**](docs/Api/TotalRewardsApi.md#addtotalrewardsemployees) | **POST** /api/v1/compensation/total_rewards/employees | Add Employees to Total Rewards
*TotalRewardsApi* | [**checkTotalRewardsProfile**](docs/Api/TotalRewardsApi.md#checktotalrewardsprofile) | **GET** /api/v1/compensation/total_rewards/{employeeId} | Check Total Rewards Profile Availability
*TotalRewardsApi* | [**getTotalRewardsPrintableStatement**](docs/Api/TotalRewardsApi.md#gettotalrewardsprintablestatement) | **GET** /api/v1/compensation/total_rewards/{employeeId}/printable | Get Printable Total Rewards Statement
*TotalRewardsApi* | [**getTotalRewardsStatement**](docs/Api/TotalRewardsApi.md#gettotalrewardsstatement) | **GET** /api/v1/compensation/total_rewards/{employeeId}/statement | Get Total Rewards Statement
*TotalRewardsApi* | [**removeTotalRewardsCustomDisclaimer**](docs/Api/TotalRewardsApi.md#removetotalrewardscustomdisclaimer) | **DELETE** /api/v1/compensation/total_rewards/custom_disclaimer | Remove Total Rewards Custom Disclaimer
*TotalRewardsApi* | [**removeTotalRewardsEmployees**](docs/Api/TotalRewardsApi.md#removetotalrewardsemployees) | **DELETE** /api/v1/compensation/total_rewards/employees | Remove Employees from Total Rewards
*TotalRewardsApi* | [**setTotalRewardsCustomDisclaimer**](docs/Api/TotalRewardsApi.md#settotalrewardscustomdisclaimer) | **PUT** /api/v1/compensation/total_rewards/custom_disclaimer | Set Total Rewards Custom Disclaimer
*TotalRewardsApi* | [**setTotalRewardsOnboardingStep**](docs/Api/TotalRewardsApi.md#settotalrewardsonboardingstep) | **PUT** /api/v1/compensation/total_rewards/onboarding/{stepName} | Set Total Rewards Onboarding Step Status
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
*WebhooksApi* | [**getPostFields**](docs/Api/WebhooksApi.md#getpostfields) | **GET** /api/v1/webhooks/post-fields | Get Webhook Post Fields
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /api/v1/webhooks/{id} | Get Webhook
*WebhooksApi* | [**listMonitorFields**](docs/Api/WebhooksApi.md#listmonitorfields) | **GET** /api/v1/webhooks/monitor_fields | List Monitor Fields
*WebhooksApi* | [**listWebhookLogs**](docs/Api/WebhooksApi.md#listwebhooklogs) | **GET** /api/v1/webhooks/{id}/log | List Webhook Logs
*WebhooksApi* | [**listWebhooks**](docs/Api/WebhooksApi.md#listwebhooks) | **GET** /api/v1/webhooks | List Webhooks
*WebhooksApi* | [**updateWebhook**](docs/Api/WebhooksApi.md#updatewebhook) | **PUT** /api/v1/webhooks/{id} | Update Webhook

## Models

- [_1d1fc0f164cb51973a0206b8e2fb2d2dRequest](docs/Model/_1d1fc0f164cb51973a0206b8e2fb2d2dRequest.md)
- [_1d1fc0f164cb51973a0206b8e2fb2d2dRequestBudgetBreakdownInner](docs/Model/_1d1fc0f164cb51973a0206b8e2fb2d2dRequestBudgetBreakdownInner.md)
- [_1d64402ee192568adbd5e3179a91e6e2RequestInner](docs/Model/_1d64402ee192568adbd5e3179a91e6e2RequestInner.md)
- [_1d64402ee192568adbd5e3179a91e6e2RequestInnerBudgetAllocations](docs/Model/_1d64402ee192568adbd5e3179a91e6e2RequestInnerBudgetAllocations.md)
- [_288aa996aba16d7a495c62321ea999a9Request](docs/Model/_288aa996aba16d7a495c62321ea999a9Request.md)
- [_288aa996aba16d7a495c62321ea999a9RequestSentDateTime](docs/Model/_288aa996aba16d7a495c62321ea999a9RequestSentDateTime.md)
- [_3958585c861325ea7a2cd30a8c74f042Request](docs/Model/_3958585c861325ea7a2cd30a8c74f042Request.md)
- [_89a5068111ec499135c7d6e9a53d5a30Request](docs/Model/_89a5068111ec499135c7d6e9a53d5a30Request.md)
- [A05b6d5f564f805d688ff2c1e37c3990Request](docs/Model/A05b6d5f564f805d688ff2c1e37c3990Request.md)
- [AddCustomFieldListValueRequest](docs/Model/AddCustomFieldListValueRequest.md)
- [AddCustomFieldListValueResponse](docs/Model/AddCustomFieldListValueResponse.md)
- [AddCustomFieldListValueResponseOneOfInner](docs/Model/AddCustomFieldListValueResponseOneOfInner.md)
- [AddCycleAdminsResponse](docs/Model/AddCycleAdminsResponse.md)
- [AddCycleAdminsResponseAddedInner](docs/Model/AddCycleAdminsResponseAddedInner.md)
- [AddCycleAdminsResponseSkippedInner](docs/Model/AddCycleAdminsResponseSkippedInner.md)
- [AddTotalRewardsEmployeesRequest](docs/Model/AddTotalRewardsEmployeesRequest.md)
- [AdjustTimeOffBalance](docs/Model/AdjustTimeOffBalance.md)
- [AdjustTimeTrackingRequestSchema](docs/Model/AdjustTimeTrackingRequestSchema.md)
- [AlertConfigurationV1](docs/Model/AlertConfigurationV1.md)
- [AlertConfigurationWriteV1](docs/Model/AlertConfigurationWriteV1.md)
- [AlertTemplateListResponseV1](docs/Model/AlertTemplateListResponseV1.md)
- [AlertTemplateListResponseV1AlertsInner](docs/Model/AlertTemplateListResponseV1AlertsInner.md)
- [AlignmentOptionsResponse](docs/Model/AlignmentOptionsResponse.md)
- [AlignmentOptionsResponseAlignsWithOptionsInner](docs/Model/AlignmentOptionsResponseAlignsWithOptionsInner.md)
- [ApplicantStatus](docs/Model/ApplicantStatus.md)
- [ApplicationDetails](docs/Model/ApplicationDetails.md)
- [ApplicationDetailsApplicant](docs/Model/ApplicationDetailsApplicant.md)
- [ApplicationDetailsAttachmentsInner](docs/Model/ApplicationDetailsAttachmentsInner.md)
- [ApplicationDetailsJob](docs/Model/ApplicationDetailsJob.md)
- [ApplicationDetailsJobTitle](docs/Model/ApplicationDetailsJobTitle.md)
- [ApplicationDetailsQuestionsAndAnswersInner](docs/Model/ApplicationDetailsQuestionsAndAnswersInner.md)
- [ApplicationDetailsQuestionsAndAnswersInnerAnswer](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerAnswer.md)
- [ApplicationDetailsQuestionsAndAnswersInnerQuestion](docs/Model/ApplicationDetailsQuestionsAndAnswersInnerQuestion.md)
- [ApplicationDetailsStatus](docs/Model/ApplicationDetailsStatus.md)
- [ApplicationsList](docs/Model/ApplicationsList.md)
- [ApplicationsListApplicationsInner](docs/Model/ApplicationsListApplicationsInner.md)
- [ApplicationsListApplicationsInnerApplicant](docs/Model/ApplicationsListApplicationsInnerApplicant.md)
- [ApplicationsListApplicationsInnerJob](docs/Model/ApplicationsListApplicationsInnerJob.md)
- [ApplicationsListApplicationsInnerJobTitle](docs/Model/ApplicationsListApplicationsInnerJobTitle.md)
- [ApplicationsListApplicationsInnerStatus](docs/Model/ApplicationsListApplicationsInnerStatus.md)
- [ApproveTimesheetRequest](docs/Model/ApproveTimesheetRequest.md)
- [ArchiveCustomFieldResponse](docs/Model/ArchiveCustomFieldResponse.md)
- [ArchivedCustomFieldsListResponse](docs/Model/ArchivedCustomFieldsListResponse.md)
- [AssignEmployeesToBreakPolicyRequest](docs/Model/AssignEmployeesToBreakPolicyRequest.md)
- [AssignTimeOffPoliciesV1RequestInner](docs/Model/AssignTimeOffPoliciesV1RequestInner.md)
- [AssignedTimeOffPolicy](docs/Model/AssignedTimeOffPolicy.md)
- [AssignedTimeOffPolicyV11](docs/Model/AssignedTimeOffPolicyV11.md)
- [AvailableAction](docs/Model/AvailableAction.md)
- [BadRequestV1](docs/Model/BadRequestV1.md)
- [BadRequestV1Error](docs/Model/BadRequestV1Error.md)
- [BankHoliday](docs/Model/BankHoliday.md)
- [BenefitCoveragesResponse](docs/Model/BenefitCoveragesResponse.md)
- [BenefitCoveragesResponseBenefitCoveragesInner](docs/Model/BenefitCoveragesResponseBenefitCoveragesInner.md)
- [BenefitDeductionSubType](docs/Model/BenefitDeductionSubType.md)
- [BenefitDeductionType](docs/Model/BenefitDeductionType.md)
- [BenefitDeductionTypeId](docs/Model/BenefitDeductionTypeId.md)
- [BudgetBreakdownImportResponse](docs/Model/BudgetBreakdownImportResponse.md)
- [BudgetGuidelinesView](docs/Model/BudgetGuidelinesView.md)
- [BudgetGuidelinesWarnings](docs/Model/BudgetGuidelinesWarnings.md)
- [C79f9c5950f983e59d2626faa30c00a1Request](docs/Model/C79f9c5950f983e59d2626faa30c00a1Request.md)
- [C7c32ed5278ac67e2e518bf7484a75dcRequest](docs/Model/C7c32ed5278ac67e2e518bf7484a75dcRequest.md)
- [CalendarAnniversaryCalendarEventV1](docs/Model/CalendarAnniversaryCalendarEventV1.md)
- [CalendarBirthdayCalendarEventV1](docs/Model/CalendarBirthdayCalendarEventV1.md)
- [CalendarCalendarEventPersonV1](docs/Model/CalendarCalendarEventPersonV1.md)
- [CalendarCalendarEventsListResponseV1](docs/Model/CalendarCalendarEventsListResponseV1.md)
- [CalendarCalendarEventsListResponseV1DataInner](docs/Model/CalendarCalendarEventsListResponseV1DataInner.md)
- [CalendarCalendarEventsListResponseV1Links](docs/Model/CalendarCalendarEventsListResponseV1Links.md)
- [CalendarCalendarEventsListResponseV1LinksNext](docs/Model/CalendarCalendarEventsListResponseV1LinksNext.md)
- [CalendarCalendarEventsListResponseV1LinksPrev](docs/Model/CalendarCalendarEventsListResponseV1LinksPrev.md)
- [CalendarCalendarEventsListResponseV1Meta](docs/Model/CalendarCalendarEventsListResponseV1Meta.md)
- [CalendarHolidayCalendarEventV1](docs/Model/CalendarHolidayCalendarEventV1.md)
- [CalendarTimeOffCalendarEventV1](docs/Model/CalendarTimeOffCalendarEventV1.md)
- [CanCreateGoalsResponse](docs/Model/CanCreateGoalsResponse.md)
- [Cf87b8e09a001b6fb81dfce6c20ab9e3Request](docs/Model/Cf87b8e09a001b6fb81dfce6c20ab9e3Request.md)
- [ChangeCustomFieldListValueRequest](docs/Model/ChangeCustomFieldListValueRequest.md)
- [ChangedEmployeeIdsResponse](docs/Model/ChangedEmployeeIdsResponse.md)
- [ChangedEmployeeIdsResponseEmployeesValue](docs/Model/ChangedEmployeeIdsResponseEmployeesValue.md)
- [ChangedEmployeeTableDataResponse](docs/Model/ChangedEmployeeTableDataResponse.md)
- [ChangedEmployeeTableDataResponseEmployeesValue](docs/Model/ChangedEmployeeTableDataResponseEmployeesValue.md)
- [ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValue](docs/Model/ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValue.md)
- [ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValueAnyOfInner](docs/Model/ChangedEmployeeTableDataResponseEmployeesValueRowsInnerValueAnyOfInner.md)
- [ClockEntriesSchema](docs/Model/ClockEntriesSchema.md)
- [ClockEntryClockEntryLocationInputV1](docs/Model/ClockEntryClockEntryLocationInputV1.md)
- [ClockEntryCreateClockEntryV1](docs/Model/ClockEntryCreateClockEntryV1.md)
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
- [CompanyIndustryDataObject](docs/Model/CompanyIndustryDataObject.md)
- [CompanyInformation](docs/Model/CompanyInformation.md)
- [CompanyInformationAddress](docs/Model/CompanyInformationAddress.md)
- [CompanyIntegrationsUpdatedWebhookPayload](docs/Model/CompanyIntegrationsUpdatedWebhookPayload.md)
- [CompanyIntegrationsUpdatedWebhookPayloadData](docs/Model/CompanyIntegrationsUpdatedWebhookPayloadData.md)
- [CompanyProfileData](docs/Model/CompanyProfileData.md)
- [CompanyProfileDataAddress](docs/Model/CompanyProfileDataAddress.md)
- [CompanyProfileIntegrations](docs/Model/CompanyProfileIntegrations.md)
- [CompanyUpdatedWebhookPayload](docs/Model/CompanyUpdatedWebhookPayload.md)
- [CompensationBenchmarkDetailEmployee](docs/Model/CompensationBenchmarkDetailEmployee.md)
- [CompensationBenchmarkDetailEmployeeJobTitle](docs/Model/CompensationBenchmarkDetailEmployeeJobTitle.md)
- [CompensationBenchmarkDetailEmployeeSalary](docs/Model/CompensationBenchmarkDetailEmployeeSalary.md)
- [CompensationBenchmarkDetails](docs/Model/CompensationBenchmarkDetails.md)
- [CompensationBenchmarkDetailsBenchmarkValuesInner](docs/Model/CompensationBenchmarkDetailsBenchmarkValuesInner.md)
- [CompensationBenchmarkJobLocationEmployee](docs/Model/CompensationBenchmarkJobLocationEmployee.md)
- [CompensationBenchmarkJobLocationEmployeeSalary](docs/Model/CompensationBenchmarkJobLocationEmployeeSalary.md)
- [CompensationBenchmarkJobLocationPair](docs/Model/CompensationBenchmarkJobLocationPair.md)
- [CompensationBenchmarkJobLocationPairJobDetails](docs/Model/CompensationBenchmarkJobLocationPairJobDetails.md)
- [CompensationBenchmarkOverview](docs/Model/CompensationBenchmarkOverview.md)
- [CompensationBenchmarkOverviewValues](docs/Model/CompensationBenchmarkOverviewValues.md)
- [CompensationBenchmarkSource](docs/Model/CompensationBenchmarkSource.md)
- [CompensationBenchmarkingColumnMap](docs/Model/CompensationBenchmarkingColumnMap.md)
- [CompensationBenchmarksList](docs/Model/CompensationBenchmarksList.md)
- [CompensationEquitySettingsResponse](docs/Model/CompensationEquitySettingsResponse.md)
- [CompensationEquitySettingsResponseCompanyValuation](docs/Model/CompensationEquitySettingsResponseCompanyValuation.md)
- [CompensationEquitySettingsResponseDisclaimers](docs/Model/CompensationEquitySettingsResponseDisclaimers.md)
- [CompensationEquitySettingsResponseOutstandingShares](docs/Model/CompensationEquitySettingsResponseOutstandingShares.md)
- [CompensationEquitySettingsResponsePricePerShare](docs/Model/CompensationEquitySettingsResponsePricePerShare.md)
- [CompensationEquitySettingsResponseSliderMin](docs/Model/CompensationEquitySettingsResponseSliderMin.md)
- [CompensationEquitySettingsResponseVestingConditions](docs/Model/CompensationEquitySettingsResponseVestingConditions.md)
- [CompensationEquitySettingsUpdateRequest](docs/Model/CompensationEquitySettingsUpdateRequest.md)
- [CompensationPlanningCycleAdminsResponse](docs/Model/CompensationPlanningCycleAdminsResponse.md)
- [CompensationPlanningCycleAdminsResponseAdminsInner](docs/Model/CompensationPlanningCycleAdminsResponseAdminsInner.md)
- [CompensationPlanningCycleCompleteResponse](docs/Model/CompensationPlanningCycleCompleteResponse.md)
- [CompensationPlanningCycleCompleteResponseErrorsInner](docs/Model/CompensationPlanningCycleCompleteResponseErrorsInner.md)
- [CompensationToolsDataObject](docs/Model/CompensationToolsDataObject.md)
- [CompensationToolsResponse](docs/Model/CompensationToolsResponse.md)
- [CompensationUpsellData](docs/Model/CompensationUpsellData.md)
- [CompletedQuestionsAndResponseDataObject](docs/Model/CompletedQuestionsAndResponseDataObject.md)
- [ConversionRateDataObject](docs/Model/ConversionRateDataObject.md)
- [CountriesOptionsResponse](docs/Model/CountriesOptionsResponse.md)
- [Country](docs/Model/Country.md)
- [CountrySchema](docs/Model/CountrySchema.md)
- [CreateApplicationCommentRequest](docs/Model/CreateApplicationCommentRequest.md)
- [CreateCandidateResponse](docs/Model/CreateCandidateResponse.md)
- [CreateCommentResponse](docs/Model/CreateCommentResponse.md)
- [CreateCompensationBenchmarkRequest](docs/Model/CreateCompensationBenchmarkRequest.md)
- [CreateCompensationBenchmarkSourceRequest](docs/Model/CreateCompensationBenchmarkSourceRequest.md)
- [CreateEmployeeTrainingRecordRequest](docs/Model/CreateEmployeeTrainingRecordRequest.md)
- [CreateEmployeeTrainingRecordRequestCost](docs/Model/CreateEmployeeTrainingRecordRequestCost.md)
- [CreateGoalCommentRequest](docs/Model/CreateGoalCommentRequest.md)
- [CreateGoalRequest](docs/Model/CreateGoalRequest.md)
- [CreateGoalRequestMilestonesInner](docs/Model/CreateGoalRequestMilestonesInner.md)
- [CreateJobOpeningResponse](docs/Model/CreateJobOpeningResponse.md)
- [CreateLocationRequest](docs/Model/CreateLocationRequest.md)
- [CreateLocationRequestAddress](docs/Model/CreateLocationRequestAddress.md)
- [CreateTrainingCategoryRequest](docs/Model/CreateTrainingCategoryRequest.md)
- [CreateTrainingTypeRequest](docs/Model/CreateTrainingTypeRequest.md)
- [CreateTrainingTypeRequestCategory](docs/Model/CreateTrainingTypeRequestCategory.md)
- [CreateWebhookBadRequestResponse](docs/Model/CreateWebhookBadRequestResponse.md)
- [CreatedCompensationBenchmark](docs/Model/CreatedCompensationBenchmark.md)
- [CreatedCompensationBenchmarkSavedBenchmark](docs/Model/CreatedCompensationBenchmarkSavedBenchmark.md)
- [CreatedCompensationBenchmarkSource](docs/Model/CreatedCompensationBenchmarkSource.md)
- [CreatedTimeOffRequest](docs/Model/CreatedTimeOffRequest.md)
- [CreatedTimeOffRequestAmount](docs/Model/CreatedTimeOffRequestAmount.md)
- [CreatedTimeOffRequestNotes](docs/Model/CreatedTimeOffRequestNotes.md)
- [CreatedTimeOffRequestStatus](docs/Model/CreatedTimeOffRequestStatus.md)
- [CreatedTimeOffRequestType](docs/Model/CreatedTimeOffRequestType.md)
- [CurrencyConversionsResponse](docs/Model/CurrencyConversionsResponse.md)
- [CursorPagedResponseMetadata](docs/Model/CursorPagedResponseMetadata.md)
- [CursorPagesResponse](docs/Model/CursorPagesResponse.md)
- [CustomFieldDefinitionResponseObject](docs/Model/CustomFieldDefinitionResponseObject.md)
- [CustomFieldDefinitionResponseObjectValuesInner](docs/Model/CustomFieldDefinitionResponseObjectValuesInner.md)
- [CustomFieldRequest](docs/Model/CustomFieldRequest.md)
- [CustomFieldTypeViewObject](docs/Model/CustomFieldTypeViewObject.md)
- [CustomFieldViewObject](docs/Model/CustomFieldViewObject.md)
- [CustomFieldsListResponse](docs/Model/CustomFieldsListResponse.md)
- [CustomReportResponse](docs/Model/CustomReportResponse.md)
- [CustomReportResponseFieldsInner](docs/Model/CustomReportResponseFieldsInner.md)
- [Dacd313af2106213fc4696175941ce65Request](docs/Model/Dacd313af2106213fc4696175941ce65Request.md)
- [DataRequest](docs/Model/DataRequest.md)
- [DataRequestAggregations](docs/Model/DataRequestAggregations.md)
- [DataRequestFilters](docs/Model/DataRequestFilters.md)
- [DataRequestFiltersFiltersInner](docs/Model/DataRequestFiltersFiltersInner.md)
- [DataRequestSortByInner](docs/Model/DataRequestSortByInner.md)
- [DatasetDataResponseV2](docs/Model/DatasetDataResponseV2.md)
- [DatasetDataResponseV2DataInner](docs/Model/DatasetDataResponseV2DataInner.md)
- [DatasetDataResponseV2DataInnerFieldsValue](docs/Model/DatasetDataResponseV2DataInnerFieldsValue.md)
- [DatasetDataResponseV2Links](docs/Model/DatasetDataResponseV2Links.md)
- [DatasetDataResponseV2Meta](docs/Model/DatasetDataResponseV2Meta.md)
- [DatasetFieldsResponse](docs/Model/DatasetFieldsResponse.md)
- [DatasetResponseV1](docs/Model/DatasetResponseV1.md)
- [DatasetV1](docs/Model/DatasetV1.md)
- [DatasetsResponseV12](docs/Model/DatasetsResponseV12.md)
- [DatasetsResponseV12DatasetsInner](docs/Model/DatasetsResponseV12DatasetsInner.md)
- [DeleteCompensationBenchmarkSourceRequest](docs/Model/DeleteCompensationBenchmarkSourceRequest.md)
- [DeleteCompensationBenchmarkSourceResponse](docs/Model/DeleteCompensationBenchmarkSourceResponse.md)
- [DetailsAndCurrencyRequestDataObject](docs/Model/DetailsAndCurrencyRequestDataObject.md)
- [Ec1ba8e76f33960b018d0d7518fe97b5Request](docs/Model/Ec1ba8e76f33960b018d0d7518fe97b5Request.md)
- [Employee](docs/Model/Employee.md)
- [EmployeeBenefitFilters](docs/Model/EmployeeBenefitFilters.md)
- [EmployeeBenefitFiltersFilters](docs/Model/EmployeeBenefitFiltersFilters.md)
- [EmployeeBenefitsListResponse](docs/Model/EmployeeBenefitsListResponse.md)
- [EmployeeBenefitsListResponseEmployeeBenefitsInner](docs/Model/EmployeeBenefitsListResponseEmployeeBenefitsInner.md)
- [EmployeeBenefitsListResponseEmployeeBenefitsInnerEmployeeBenefitInner](docs/Model/EmployeeBenefitsListResponseEmployeeBenefitsInnerEmployeeBenefitInner.md)
- [EmployeeCreatedWebhookPayload](docs/Model/EmployeeCreatedWebhookPayload.md)
- [EmployeeCreatedWebhookPayloadData](docs/Model/EmployeeCreatedWebhookPayloadData.md)
- [EmployeeCursorPaginationQueryObject](docs/Model/EmployeeCursorPaginationQueryObject.md)
- [EmployeeDeletedWebhookPayload](docs/Model/EmployeeDeletedWebhookPayload.md)
- [EmployeeDeletedWebhookPayloadData](docs/Model/EmployeeDeletedWebhookPayloadData.md)
- [EmployeeDependent](docs/Model/EmployeeDependent.md)
- [EmployeeDependentsResponse](docs/Model/EmployeeDependentsResponse.md)
- [EmployeeDependentsResponseEmployeeDependentsInner](docs/Model/EmployeeDependentsResponseEmployeeDependentsInner.md)
- [EmployeeFileUpdate](docs/Model/EmployeeFileUpdate.md)
- [EmployeeOptionalField](docs/Model/EmployeeOptionalField.md)
- [EmployeePhotoJsonResponse](docs/Model/EmployeePhotoJsonResponse.md)
- [EmployeeResponse](docs/Model/EmployeeResponse.md)
- [EmployeeResponseAggregationsInner](docs/Model/EmployeeResponseAggregationsInner.md)
- [EmployeeStringCodeErrorResponseV1](docs/Model/EmployeeStringCodeErrorResponseV1.md)
- [EmployeeStringCodeErrorResponseV1Error](docs/Model/EmployeeStringCodeErrorResponseV1Error.md)
- [EmployeeTableRow](docs/Model/EmployeeTableRow.md)
- [EmployeeTimeOffPolicyAssignment](docs/Model/EmployeeTimeOffPolicyAssignment.md)
- [EmployeeTimeOffPolicyAssignmentV11](docs/Model/EmployeeTimeOffPolicyAssignmentV11.md)
- [EmployeeTimeOffRequestApproverResponseInner](docs/Model/EmployeeTimeOffRequestApproverResponseInner.md)
- [EmployeeTimesheetEntryTransformer](docs/Model/EmployeeTimesheetEntryTransformer.md)
- [EmployeeUpdatedWebhookPayload](docs/Model/EmployeeUpdatedWebhookPayload.md)
- [EmployeeUpdatedWebhookPayloadData](docs/Model/EmployeeUpdatedWebhookPayloadData.md)
- [EmployeeValue](docs/Model/EmployeeValue.md)
- [EmployeeValueAnyOfInner](docs/Model/EmployeeValueAnyOfInner.md)
- [EmployeeVerificationIntegration](docs/Model/EmployeeVerificationIntegration.md)
- [EmployeeVerificationIntegrationResponse](docs/Model/EmployeeVerificationIntegrationResponse.md)
- [EmployeeVerificationLifecycleEmailAcceptedResponse](docs/Model/EmployeeVerificationLifecycleEmailAcceptedResponse.md)
- [EmployeeVerificationPublicApiRecord](docs/Model/EmployeeVerificationPublicApiRecord.md)
- [EmployeeVerificationUpdateResponse](docs/Model/EmployeeVerificationUpdateResponse.md)
- [EmployeeVerificationsListResponse](docs/Model/EmployeeVerificationsListResponse.md)
- [EmployeesDirectoryJsonResponse](docs/Model/EmployeesDirectoryJsonResponse.md)
- [EmployeesDirectoryJsonResponseFieldsInner](docs/Model/EmployeesDirectoryJsonResponseFieldsInner.md)
- [EmployeesDirectoryXmlResponse](docs/Model/EmployeesDirectoryXmlResponse.md)
- [EmployeesDirectoryXmlResponseEmployees](docs/Model/EmployeesDirectoryXmlResponseEmployees.md)
- [EmployeesDirectoryXmlResponseEmployeesEmployeeInner](docs/Model/EmployeesDirectoryXmlResponseEmployeesEmployeeInner.md)
- [EmployeesDirectoryXmlResponseEmployeesEmployeeInnerFieldInner](docs/Model/EmployeesDirectoryXmlResponseEmployeesEmployeeInnerFieldInner.md)
- [EmployeesDirectoryXmlResponseFieldset](docs/Model/EmployeesDirectoryXmlResponseFieldset.md)
- [EmployeesDirectoryXmlResponseFieldsetFieldInner](docs/Model/EmployeesDirectoryXmlResponseFieldsetFieldInner.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [ErrorResponseError](docs/Model/ErrorResponseError.md)
- [F3883a522dadbe9e11b34f8b656e3adbRequest](docs/Model/F3883a522dadbe9e11b34f8b656e3adbRequest.md)
- [Field](docs/Model/Field.md)
- [Field1](docs/Model/Field1.md)
- [Field1Id](docs/Model/Field1Id.md)
- [FieldOptionsRequestSchema](docs/Model/FieldOptionsRequestSchema.md)
- [FieldOptionsRequestSchemaDependentFieldsValueInner](docs/Model/FieldOptionsRequestSchemaDependentFieldsValueInner.md)
- [FieldOptionsTransformer](docs/Model/FieldOptionsTransformer.md)
- [FieldOptionsTransformerId](docs/Model/FieldOptionsTransformerId.md)
- [ForbiddenV1](docs/Model/ForbiddenV1.md)
- [ForbiddenV1Error](docs/Model/ForbiddenV1Error.md)
- [GetBreakPolicySuggestionsRequest](docs/Model/GetBreakPolicySuggestionsRequest.md)
- [GetCompanyReportResponse](docs/Model/GetCompanyReportResponse.md)
- [GetCompanyReportResponseEmployeesInner](docs/Model/GetCompanyReportResponseEmployeesInner.md)
- [GetDataFromDatasetV2Request](docs/Model/GetDataFromDatasetV2Request.md)
- [GetEmployeeResponse](docs/Model/GetEmployeeResponse.md)
- [GetEmployeesEmployeeBaseResponse](docs/Model/GetEmployeesEmployeeBaseResponse.md)
- [GetEmployeesEmployeeResponse](docs/Model/GetEmployeesEmployeeResponse.md)
- [GetEmployeesEmployeeResponseAllOfOvertimeRate](docs/Model/GetEmployeesEmployeeResponseAllOfOvertimeRate.md)
- [GetEmployeesEmployeeResponseAllOfPayRate](docs/Model/GetEmployeesEmployeeResponseAllOfPayRate.md)
- [GetEmployeesEmployeeResponseAllOfTeams](docs/Model/GetEmployeesEmployeeResponseAllOfTeams.md)
- [GetEmployeesFilterRequestObject](docs/Model/GetEmployeesFilterRequestObject.md)
- [GetEmployeesResponseObject](docs/Model/GetEmployeesResponseObject.md)
- [GetEmployeesResponseObjectLinks](docs/Model/GetEmployeesResponseObjectLinks.md)
- [GetEmployeesResponseObjectLinksNext](docs/Model/GetEmployeesResponseObjectLinksNext.md)
- [GetEmployeesResponseObjectLinksPrev](docs/Model/GetEmployeesResponseObjectLinksPrev.md)
- [GetEmployeesResponseObjectLinksSelf](docs/Model/GetEmployeesResponseObjectLinksSelf.md)
- [GlobalHolidayGlobalHolidayV1](docs/Model/GlobalHolidayGlobalHolidayV1.md)
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
- [HolidayBulkInsertCompanyHolidayErrorV1](docs/Model/HolidayBulkInsertCompanyHolidayErrorV1.md)
- [HolidayBulkInsertCompanyHolidayRecordV1](docs/Model/HolidayBulkInsertCompanyHolidayRecordV1.md)
- [HolidayBulkInsertCompanyHolidaysFailureResponseV1](docs/Model/HolidayBulkInsertCompanyHolidaysFailureResponseV1.md)
- [HolidayBulkInsertCompanyHolidaysResponseV1](docs/Model/HolidayBulkInsertCompanyHolidaysResponseV1.md)
- [HolidayCatalogHolidayListResponseV1](docs/Model/HolidayCatalogHolidayListResponseV1.md)
- [HolidayCatalogHolidayListResponseV1Links](docs/Model/HolidayCatalogHolidayListResponseV1Links.md)
- [HolidayCompanyHolidayAudienceV1](docs/Model/HolidayCompanyHolidayAudienceV1.md)
- [HolidayCompanyHolidayListResponseV1](docs/Model/HolidayCompanyHolidayListResponseV1.md)
- [HolidayCompanyHolidayListResponseV1Links](docs/Model/HolidayCompanyHolidayListResponseV1Links.md)
- [HolidayCompanyHolidayListResponseV1Meta](docs/Model/HolidayCompanyHolidayListResponseV1Meta.md)
- [HolidayCompanyHolidayPayStatusHoursV1](docs/Model/HolidayCompanyHolidayPayStatusHoursV1.md)
- [HolidayCompanyHolidayV1](docs/Model/HolidayCompanyHolidayV1.md)
- [HolidayCreateCompanyHolidayRequestV1](docs/Model/HolidayCreateCompanyHolidayRequestV1.md)
- [HolidayUpdateCompanyHolidayRequestV1](docs/Model/HolidayUpdateCompanyHolidayRequestV1.md)
- [HourEntriesRequestSchema](docs/Model/HourEntriesRequestSchema.md)
- [HourEntryCreateHourEntryV1](docs/Model/HourEntryCreateHourEntryV1.md)
- [HourEntryIdsSchema](docs/Model/HourEntryIdsSchema.md)
- [HourEntryPatchHourEntryV1](docs/Model/HourEntryPatchHourEntryV1.md)
- [HourEntrySchema](docs/Model/HourEntrySchema.md)
- [ImportCompensationBenchmarksResponse](docs/Model/ImportCompensationBenchmarksResponse.md)
- [Industry](docs/Model/Industry.md)
- [InlineObject](docs/Model/InlineObject.md)
- [InlineObject1](docs/Model/InlineObject1.md)
- [InlineObject1EmployeesInner](docs/Model/InlineObject1EmployeesInner.md)
- [InlineObject1Status](docs/Model/InlineObject1Status.md)
- [InlineObject2](docs/Model/InlineObject2.md)
- [InlineObject2Inner](docs/Model/InlineObject2Inner.md)
- [JobSummary](docs/Model/JobSummary.md)
- [JobSummaryStatus](docs/Model/JobSummaryStatus.md)
- [JsonEmployeeFiles](docs/Model/JsonEmployeeFiles.md)
- [JsonEmployeeFilesCategoriesInner](docs/Model/JsonEmployeeFilesCategoriesInner.md)
- [JsonEmployeeFilesCategoriesInnerFilesInner](docs/Model/JsonEmployeeFilesCategoriesInnerFilesInner.md)
- [JsonEmployeeFilesEmployee](docs/Model/JsonEmployeeFilesEmployee.md)
- [LegacyReportFieldMapResponse](docs/Model/LegacyReportFieldMapResponse.md)
- [LegacyReportFieldMapResponseMappingsInner](docs/Model/LegacyReportFieldMapResponseMappingsInner.md)
- [LegacyReportIDMapResponse](docs/Model/LegacyReportIDMapResponse.md)
- [LegacyReportIDMapResponseMappingsInner](docs/Model/LegacyReportIDMapResponseMappingsInner.md)
- [LevelsAndBandsColumnMap](docs/Model/LevelsAndBandsColumnMap.md)
- [LevelsAndBandsGroupStatusCounts](docs/Model/LevelsAndBandsGroupStatusCounts.md)
- [LevelsAndBandsJobTitleAssignment](docs/Model/LevelsAndBandsJobTitleAssignment.md)
- [LevelsAndBandsJobTitleAssignmentsRequest](docs/Model/LevelsAndBandsJobTitleAssignmentsRequest.md)
- [LevelsAndBandsPayBandValue](docs/Model/LevelsAndBandsPayBandValue.md)
- [LevelsAndBandsUploadResponse](docs/Model/LevelsAndBandsUploadResponse.md)
- [ListFieldDetail](docs/Model/ListFieldDetail.md)
- [ListFieldOption](docs/Model/ListFieldOption.md)
- [ListFieldValues](docs/Model/ListFieldValues.md)
- [ListFieldValuesOptionsInner](docs/Model/ListFieldValuesOptionsInner.md)
- [ListFieldValuesXml](docs/Model/ListFieldValuesXml.md)
- [ListFieldValuesXmlOptionInner](docs/Model/ListFieldValuesXmlOptionInner.md)
- [ListUsersResponseValue](docs/Model/ListUsersResponseValue.md)
- [ListUsersXmlResponse](docs/Model/ListUsersXmlResponse.md)
- [ListUsersXmlResponseUserInner](docs/Model/ListUsersXmlResponseUserInner.md)
- [ListValueViewObject](docs/Model/ListValueViewObject.md)
- [Location](docs/Model/Location.md)
- [LocationResponseObject](docs/Model/LocationResponseObject.md)
- [LocationResponseObjectAddress](docs/Model/LocationResponseObjectAddress.md)
- [LocationResponseObjectAddressCountry](docs/Model/LocationResponseObjectAddressCountry.md)
- [LocationResponseObjectAddressState](docs/Model/LocationResponseObjectAddressState.md)
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
- [MetaCompanyPropertiesResponse](docs/Model/MetaCompanyPropertiesResponse.md)
- [MetaCurrencyTypeItem](docs/Model/MetaCurrencyTypeItem.md)
- [MonitorFieldList](docs/Model/MonitorFieldList.md)
- [MonitorFieldListFieldsInner](docs/Model/MonitorFieldListFieldsInner.md)
- [NewHirePacketGtkyAnswerVisibilityItem](docs/Model/NewHirePacketGtkyAnswerVisibilityItem.md)
- [NewHirePacketGtkyAnswerVisibilityRequest](docs/Model/NewHirePacketGtkyAnswerVisibilityRequest.md)
- [NewHirePacketGtkyAnswerVisibilityResponse](docs/Model/NewHirePacketGtkyAnswerVisibilityResponse.md)
- [NewHirePacketPublicApi](docs/Model/NewHirePacketPublicApi.md)
- [NewHirePacketPublicApiWritableBody](docs/Model/NewHirePacketPublicApiWritableBody.md)
- [NewHirePacketsListResponse](docs/Model/NewHirePacketsListResponse.md)
- [NewHireWidgetItem](docs/Model/NewHireWidgetItem.md)
- [NewHireWidgetResponse](docs/Model/NewHireWidgetResponse.md)
- [NewWebHook](docs/Model/NewWebHook.md)
- [OnboardingExperiencePublicApi](docs/Model/OnboardingExperiencePublicApi.md)
- [OnboardingExperiencesListResponse](docs/Model/OnboardingExperiencesListResponse.md)
- [PagedLocationResponse](docs/Model/PagedLocationResponse.md)
- [PagedResponse](docs/Model/PagedResponse.md)
- [Pagination](docs/Model/Pagination.md)
- [PaginationMetaData](docs/Model/PaginationMetaData.md)
- [PatchCompanyProfileCompanyInformationRequest](docs/Model/PatchCompanyProfileCompanyInformationRequest.md)
- [PatchCompanyProfileCompanyInformationRequestAddress](docs/Model/PatchCompanyProfileCompanyInformationRequestAddress.md)
- [PayGradesAndBandsConfigurationStatus](docs/Model/PayGradesAndBandsConfigurationStatus.md)
- [PayGradesAndBandsConfigurationStatusJobTitles](docs/Model/PayGradesAndBandsConfigurationStatusJobTitles.md)
- [PayGradesAndBandsConfigurationStatusJobTitlesWarningsInner](docs/Model/PayGradesAndBandsConfigurationStatusJobTitlesWarningsInner.md)
- [PayGradesAndBandsConfigurationStatusLevels](docs/Model/PayGradesAndBandsConfigurationStatusLevels.md)
- [PayGradesAndBandsConfigurationStatusLevelsErrorsInner](docs/Model/PayGradesAndBandsConfigurationStatusLevelsErrorsInner.md)
- [PayGradesAndBandsConfigurationStatusPayBands](docs/Model/PayGradesAndBandsConfigurationStatusPayBands.md)
- [PayGradesAndBandsConfigurationStatusReview](docs/Model/PayGradesAndBandsConfigurationStatusReview.md)
- [PayGradesAndBandsDeleteGroupsResponse](docs/Model/PayGradesAndBandsDeleteGroupsResponse.md)
- [PayGradesAndBandsDeleteHierarchyGroup](docs/Model/PayGradesAndBandsDeleteHierarchyGroup.md)
- [PayGradesAndBandsDeleteHierarchyJobTitle](docs/Model/PayGradesAndBandsDeleteHierarchyJobTitle.md)
- [PayGradesAndBandsDeleteHierarchyLevel](docs/Model/PayGradesAndBandsDeleteHierarchyLevel.md)
- [PayGradesAndBandsDeleteLevelResponse](docs/Model/PayGradesAndBandsDeleteLevelResponse.md)
- [PayGradesAndBandsDeleteResponse](docs/Model/PayGradesAndBandsDeleteResponse.md)
- [PayGradesAndBandsJobTitleAssignmentsGroup](docs/Model/PayGradesAndBandsJobTitleAssignmentsGroup.md)
- [PayGradesAndBandsJobTitleAssignmentsJobTitle](docs/Model/PayGradesAndBandsJobTitleAssignmentsJobTitle.md)
- [PayGradesAndBandsJobTitleAssignmentsLevel](docs/Model/PayGradesAndBandsJobTitleAssignmentsLevel.md)
- [PayGradesAndBandsJobTitleAssignmentsResponse](docs/Model/PayGradesAndBandsJobTitleAssignmentsResponse.md)
- [PayGradesAndBandsJobTitleEmployee](docs/Model/PayGradesAndBandsJobTitleEmployee.md)
- [PayGradesAndBandsJobTitleWithEmployees](docs/Model/PayGradesAndBandsJobTitleWithEmployees.md)
- [PayGradesAndBandsLevel](docs/Model/PayGradesAndBandsLevel.md)
- [PayGradesAndBandsLevelJobTitle](docs/Model/PayGradesAndBandsLevelJobTitle.md)
- [PayGradesAndBandsLevelsGroup](docs/Model/PayGradesAndBandsLevelsGroup.md)
- [PayGradesAndBandsLevelsResponse](docs/Model/PayGradesAndBandsLevelsResponse.md)
- [PayGradesAndBandsPayBandJobTitle](docs/Model/PayGradesAndBandsPayBandJobTitle.md)
- [PayGradesAndBandsPayBandLevel](docs/Model/PayGradesAndBandsPayBandLevel.md)
- [PayGradesAndBandsPayBandsGroup](docs/Model/PayGradesAndBandsPayBandsGroup.md)
- [PayGradesAndBandsPayBandsResponse](docs/Model/PayGradesAndBandsPayBandsResponse.md)
- [PayGradesAndBandsPublishResponse](docs/Model/PayGradesAndBandsPublishResponse.md)
- [PayGradesAndBandsPublishedGroup](docs/Model/PayGradesAndBandsPublishedGroup.md)
- [PayGradesAndBandsPublishedJobTitle](docs/Model/PayGradesAndBandsPublishedJobTitle.md)
- [PayGradesAndBandsPublishedLevel](docs/Model/PayGradesAndBandsPublishedLevel.md)
- [PayGradesAndBandsPublishedResponse](docs/Model/PayGradesAndBandsPublishedResponse.md)
- [PayGradesAndBandsReviewGroup](docs/Model/PayGradesAndBandsReviewGroup.md)
- [PayGradesAndBandsReviewJobTitle](docs/Model/PayGradesAndBandsReviewJobTitle.md)
- [PayGradesAndBandsReviewLevel](docs/Model/PayGradesAndBandsReviewLevel.md)
- [PayGradesAndBandsReviewResponse](docs/Model/PayGradesAndBandsReviewResponse.md)
- [PayGradesAndBandsSaveLevelsResponse](docs/Model/PayGradesAndBandsSaveLevelsResponse.md)
- [PayGradesAndBandsUpdateJobTitlesResponse](docs/Model/PayGradesAndBandsUpdateJobTitlesResponse.md)
- [PayGradesAndBandsUpdateLevel](docs/Model/PayGradesAndBandsUpdateLevel.md)
- [PayGradesAndBandsUpdateLevelsGroup](docs/Model/PayGradesAndBandsUpdateLevelsGroup.md)
- [PayGradesAndBandsUpdateLevelsRequest](docs/Model/PayGradesAndBandsUpdateLevelsRequest.md)
- [PayGradesAndBandsUpdatePayBandItem](docs/Model/PayGradesAndBandsUpdatePayBandItem.md)
- [PayGradesAndBandsUpdatePayBandsResponse](docs/Model/PayGradesAndBandsUpdatePayBandsResponse.md)
- [PersonInfoApiTransformer](docs/Model/PersonInfoApiTransformer.md)
- [PostNewEmployee](docs/Model/PostNewEmployee.md)
- [ProblemDetailsResponse](docs/Model/ProblemDetailsResponse.md)
- [ProblemDetailsResponseV2](docs/Model/ProblemDetailsResponseV2.md)
- [ProjectCreateRequestSchema](docs/Model/ProjectCreateRequestSchema.md)
- [ProjectCreateTimeTrackingProjectTaskV1](docs/Model/ProjectCreateTimeTrackingProjectTaskV1.md)
- [ProjectCreateTimeTrackingProjectV1](docs/Model/ProjectCreateTimeTrackingProjectV1.md)
- [ProjectCreateTimeTrackingProjectV1TasksInner](docs/Model/ProjectCreateTimeTrackingProjectV1TasksInner.md)
- [ProjectInfoApiTransformer](docs/Model/ProjectInfoApiTransformer.md)
- [ProjectInfoApiTransformerProject](docs/Model/ProjectInfoApiTransformerProject.md)
- [ProjectLegacyErrorResponseV1](docs/Model/ProjectLegacyErrorResponseV1.md)
- [ProjectLegacyErrorResponseV1Error](docs/Model/ProjectLegacyErrorResponseV1Error.md)
- [ProjectPaginatedResponseDataV1](docs/Model/ProjectPaginatedResponseDataV1.md)
- [ProjectPaginatedResponseDataV1Meta](docs/Model/ProjectPaginatedResponseDataV1Meta.md)
- [ProjectPaginatedTasksResponseV1](docs/Model/ProjectPaginatedTasksResponseV1.md)
- [ProjectPaginatedTasksResponseV1Links](docs/Model/ProjectPaginatedTasksResponseV1Links.md)
- [ProjectPaginatedTasksResponseV1Meta](docs/Model/ProjectPaginatedTasksResponseV1Meta.md)
- [ProjectPaginatedTimeTrackingProjectsResponseV1](docs/Model/ProjectPaginatedTimeTrackingProjectsResponseV1.md)
- [ProjectStandardApiErrorResponseV1](docs/Model/ProjectStandardApiErrorResponseV1.md)
- [ProjectTimeTrackingProjectV1](docs/Model/ProjectTimeTrackingProjectV1.md)
- [ProjectTimeTrackingTaskV1](docs/Model/ProjectTimeTrackingTaskV1.md)
- [ProjectUpdateTimeTrackingProjectTaskV1](docs/Model/ProjectUpdateTimeTrackingProjectTaskV1.md)
- [ProjectUpdateTimeTrackingProjectV1](docs/Model/ProjectUpdateTimeTrackingProjectV1.md)
- [ProvinceItem](docs/Model/ProvinceItem.md)
- [PublicCustomFieldTypesResponse](docs/Model/PublicCustomFieldTypesResponse.md)
- [PublicListValuesCustomFieldSettingsResponse](docs/Model/PublicListValuesCustomFieldSettingsResponse.md)
- [PublicListValuesCustomFieldSettingsResponseValuesInner](docs/Model/PublicListValuesCustomFieldSettingsResponseValuesInner.md)
- [PutCompanyIndustryCodesRequest](docs/Model/PutCompanyIndustryCodesRequest.md)
- [PutCompanyProfileDisplayNameRequest](docs/Model/PutCompanyProfileDisplayNameRequest.md)
- [RemoveCycleAdminSelfResponse](docs/Model/RemoveCycleAdminSelfResponse.md)
- [RemoveTotalRewardsEmployeesRequest](docs/Model/RemoveTotalRewardsEmployeesRequest.md)
- [Report](docs/Model/Report.md)
- [ReportsResponse](docs/Model/ReportsResponse.md)
- [Request](docs/Model/Request.md)
- [RequestCustomReport](docs/Model/RequestCustomReport.md)
- [RequestCustomReportFilters](docs/Model/RequestCustomReportFilters.md)
- [RequestCustomReportFiltersLastChanged](docs/Model/RequestCustomReportFiltersLastChanged.md)
- [RequestCustomReportResponse](docs/Model/RequestCustomReportResponse.md)
- [RequestCustomReportResponseEmployeesInner](docs/Model/RequestCustomReportResponseEmployeesInner.md)
- [RequestCustomReportResponseFieldsInner](docs/Model/RequestCustomReportResponseFieldsInner.md)
- [SaveChangeCommTemplateResponse](docs/Model/SaveChangeCommTemplateResponse.md)
- [SchedulingCreateScheduleRequestV1](docs/Model/SchedulingCreateScheduleRequestV1.md)
- [SchedulingCreateSchedulingShiftRequestV1](docs/Model/SchedulingCreateSchedulingShiftRequestV1.md)
- [SchedulingPublishShiftsFailureV1](docs/Model/SchedulingPublishShiftsFailureV1.md)
- [SchedulingPublishShiftsRequest](docs/Model/SchedulingPublishShiftsRequest.md)
- [SchedulingPublishShiftsResultV1](docs/Model/SchedulingPublishShiftsResultV1.md)
- [SchedulingScheduleListResponseV1](docs/Model/SchedulingScheduleListResponseV1.md)
- [SchedulingScheduleListResponseV1Links](docs/Model/SchedulingScheduleListResponseV1Links.md)
- [SchedulingScheduleListResponseV1Meta](docs/Model/SchedulingScheduleListResponseV1Meta.md)
- [SchedulingScheduleV1](docs/Model/SchedulingScheduleV1.md)
- [SchedulingSchedulingShiftAssessmentV1](docs/Model/SchedulingSchedulingShiftAssessmentV1.md)
- [SchedulingSchedulingShiftAssessmentViolationV1](docs/Model/SchedulingSchedulingShiftAssessmentViolationV1.md)
- [SchedulingSchedulingShiftV1](docs/Model/SchedulingSchedulingShiftV1.md)
- [SchedulingShiftAssessmentListResponseV1](docs/Model/SchedulingShiftAssessmentListResponseV1.md)
- [SchedulingShiftAssessmentListResponseV1Meta](docs/Model/SchedulingShiftAssessmentListResponseV1Meta.md)
- [SchedulingShiftListResponseV1](docs/Model/SchedulingShiftListResponseV1.md)
- [SchedulingShiftListResponseV1Links](docs/Model/SchedulingShiftListResponseV1Links.md)
- [SchedulingShiftListResponseV1LinksNext](docs/Model/SchedulingShiftListResponseV1LinksNext.md)
- [SchedulingShiftListResponseV1LinksPrev](docs/Model/SchedulingShiftListResponseV1LinksPrev.md)
- [SchedulingShiftListResponseV1Meta](docs/Model/SchedulingShiftListResponseV1Meta.md)
- [SchedulingTimezoneListResponseV1](docs/Model/SchedulingTimezoneListResponseV1.md)
- [SchedulingTimezoneListResponseV1Meta](docs/Model/SchedulingTimezoneListResponseV1Meta.md)
- [SchedulingTimezoneV1](docs/Model/SchedulingTimezoneV1.md)
- [SchedulingUpdateScheduleRequestV1](docs/Model/SchedulingUpdateScheduleRequestV1.md)
- [SchedulingUpdateSchedulingShiftRequestV1](docs/Model/SchedulingUpdateSchedulingShiftRequestV1.md)
- [SendEmployeeVerificationLifecycleEmailByUserRequest](docs/Model/SendEmployeeVerificationLifecycleEmailByUserRequest.md)
- [SendRecommendationsResponse](docs/Model/SendRecommendationsResponse.md)
- [SetBreakPolicyEmployeesRequest](docs/Model/SetBreakPolicyEmployeesRequest.md)
- [SetTotalRewardsCustomDisclaimerRequest](docs/Model/SetTotalRewardsCustomDisclaimerRequest.md)
- [SetTotalRewardsOnboardingStepRequest](docs/Model/SetTotalRewardsOnboardingStepRequest.md)
- [ShareOptionsResponse](docs/Model/ShareOptionsResponse.md)
- [ShiftDifferentialCreateTimeTrackingShiftDifferentialV1](docs/Model/ShiftDifferentialCreateTimeTrackingShiftDifferentialV1.md)
- [ShiftDifferentialCreateTimeTrackingShiftDifferentialV1TimesInner](docs/Model/ShiftDifferentialCreateTimeTrackingShiftDifferentialV1TimesInner.md)
- [ShiftDifferentialPaginatedResponseDataV1](docs/Model/ShiftDifferentialPaginatedResponseDataV1.md)
- [ShiftDifferentialPaginatedResponseDataV1Meta](docs/Model/ShiftDifferentialPaginatedResponseDataV1Meta.md)
- [ShiftDifferentialPaginatedTimeTrackingShiftDifferentialsResponseV1](docs/Model/ShiftDifferentialPaginatedTimeTrackingShiftDifferentialsResponseV1.md)
- [ShiftDifferentialTimeTrackingShiftDifferentialTimeV1](docs/Model/ShiftDifferentialTimeTrackingShiftDifferentialTimeV1.md)
- [ShiftDifferentialTimeTrackingShiftDifferentialV1](docs/Model/ShiftDifferentialTimeTrackingShiftDifferentialV1.md)
- [ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1](docs/Model/ShiftDifferentialUpdateTimeTrackingShiftDifferentialV1.md)
- [StandardApiErrorResponse](docs/Model/StandardApiErrorResponse.md)
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
- [TimeTrackingBreakPolicySuggestionsResponseV1](docs/Model/TimeTrackingBreakPolicySuggestionsResponseV1.md)
- [TimeTrackingBreakPolicySuggestionsResponseV1SuggestedPoliciesInner](docs/Model/TimeTrackingBreakPolicySuggestionsResponseV1SuggestedPoliciesInner.md)
- [TimeTrackingBreakPolicySuggestionsResponseV1SuggestedPoliciesInnerBreaksInner](docs/Model/TimeTrackingBreakPolicySuggestionsResponseV1SuggestedPoliciesInnerBreaksInner.md)
- [TimeTrackingBulkResponseSchema](docs/Model/TimeTrackingBulkResponseSchema.md)
- [TimeTrackingBulkResponseSchemaResponse](docs/Model/TimeTrackingBulkResponseSchemaResponse.md)
- [TimeTrackingBulkUpsertEmployeeTimeTrackingDataAcceptedV1](docs/Model/TimeTrackingBulkUpsertEmployeeTimeTrackingDataAcceptedV1.md)
- [TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1](docs/Model/TimeTrackingBulkUpsertEmployeeTimeTrackingDataRecordV1.md)
- [TimeTrackingClockEntryLocationV1](docs/Model/TimeTrackingClockEntryLocationV1.md)
- [TimeTrackingClockEntryPaginatedResponseDataV1](docs/Model/TimeTrackingClockEntryPaginatedResponseDataV1.md)
- [TimeTrackingClockEntryPaginatedResponseDataV1Meta](docs/Model/TimeTrackingClockEntryPaginatedResponseDataV1Meta.md)
- [TimeTrackingClockEntryV1](docs/Model/TimeTrackingClockEntryV1.md)
- [TimeTrackingConfigurationPaginatedResponseDataV1](docs/Model/TimeTrackingConfigurationPaginatedResponseDataV1.md)
- [TimeTrackingConfigurationPaginatedResponseDataV1Links](docs/Model/TimeTrackingConfigurationPaginatedResponseDataV1Links.md)
- [TimeTrackingConfigurationPaginatedResponseDataV1LinksNext](docs/Model/TimeTrackingConfigurationPaginatedResponseDataV1LinksNext.md)
- [TimeTrackingConfigurationPaginatedResponseDataV1LinksPrev](docs/Model/TimeTrackingConfigurationPaginatedResponseDataV1LinksPrev.md)
- [TimeTrackingConfigurationPaginatedResponseDataV1Meta](docs/Model/TimeTrackingConfigurationPaginatedResponseDataV1Meta.md)
- [TimeTrackingCreateClockInV1](docs/Model/TimeTrackingCreateClockInV1.md)
- [TimeTrackingCreateClockOutV1](docs/Model/TimeTrackingCreateClockOutV1.md)
- [TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1](docs/Model/TimeTrackingCreateOrUpdateTimeTrackingBreakWithoutPolicyV1.md)
- [TimeTrackingCreateTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingCreateTimeTrackingBreakPolicyV1.md)
- [TimeTrackingCreateTimeTrackingBreakV1](docs/Model/TimeTrackingCreateTimeTrackingBreakV1.md)
- [TimeTrackingCreateTimeTrackingConfigurationV1](docs/Model/TimeTrackingCreateTimeTrackingConfigurationV1.md)
- [TimeTrackingDeleteResponseSchema](docs/Model/TimeTrackingDeleteResponseSchema.md)
- [TimeTrackingEmployeeEnrollmentPaginatedResponseDataV1](docs/Model/TimeTrackingEmployeeEnrollmentPaginatedResponseDataV1.md)
- [TimeTrackingEmployeeTimeTrackingDataV1](docs/Model/TimeTrackingEmployeeTimeTrackingDataV1.md)
- [TimeTrackingHourEntryPaginatedResponseDataV1](docs/Model/TimeTrackingHourEntryPaginatedResponseDataV1.md)
- [TimeTrackingHourEntryV1](docs/Model/TimeTrackingHourEntryV1.md)
- [TimeTrackingIdResponseSchema](docs/Model/TimeTrackingIdResponseSchema.md)
- [TimeTrackingOffsetPaginatedResponseDataV1](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1.md)
- [TimeTrackingOffsetPaginatedResponseDataV1Links](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1Links.md)
- [TimeTrackingOffsetPaginatedResponseDataV1Meta](docs/Model/TimeTrackingOffsetPaginatedResponseDataV1Meta.md)
- [TimeTrackingPagePaginatedResponseDataV1](docs/Model/TimeTrackingPagePaginatedResponseDataV1.md)
- [TimeTrackingPaginatedBreakAssessmentsResponseV1](docs/Model/TimeTrackingPaginatedBreakAssessmentsResponseV1.md)
- [TimeTrackingPaginatedBreakPoliciesResponseV1](docs/Model/TimeTrackingPaginatedBreakPoliciesResponseV1.md)
- [TimeTrackingPaginatedBreakPolicyEmployeesResponseV1](docs/Model/TimeTrackingPaginatedBreakPolicyEmployeesResponseV1.md)
- [TimeTrackingPaginatedBreaksResponseV1](docs/Model/TimeTrackingPaginatedBreaksResponseV1.md)
- [TimeTrackingPaginatedClockEntriesResponseV1](docs/Model/TimeTrackingPaginatedClockEntriesResponseV1.md)
- [TimeTrackingPaginatedEmployeeTimeTrackingDataResponseV1](docs/Model/TimeTrackingPaginatedEmployeeTimeTrackingDataResponseV1.md)
- [TimeTrackingPaginatedHourEntriesResponseV1](docs/Model/TimeTrackingPaginatedHourEntriesResponseV1.md)
- [TimeTrackingPaginatedTimeTrackingConfigurationsResponseV1](docs/Model/TimeTrackingPaginatedTimeTrackingConfigurationsResponseV1.md)
- [TimeTrackingPaginatedTimeTrackingKiosksResponseV1](docs/Model/TimeTrackingPaginatedTimeTrackingKiosksResponseV1.md)
- [TimeTrackingPaginatedTimeTrackingTimeClocksResponseV1](docs/Model/TimeTrackingPaginatedTimeTrackingTimeClocksResponseV1.md)
- [TimeTrackingPaginatedTimesheetsResponseV1](docs/Model/TimeTrackingPaginatedTimesheetsResponseV1.md)
- [TimeTrackingPaginatedTimesheetsResponseV1Meta](docs/Model/TimeTrackingPaginatedTimesheetsResponseV1Meta.md)
- [TimeTrackingProjectWithTasksAndEmployeeIds](docs/Model/TimeTrackingProjectWithTasksAndEmployeeIds.md)
- [TimeTrackingRecord](docs/Model/TimeTrackingRecord.md)
- [TimeTrackingRecordSchema](docs/Model/TimeTrackingRecordSchema.md)
- [TimeTrackingSyncTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingSyncTimeTrackingBreakPolicyV1.md)
- [TimeTrackingTask](docs/Model/TimeTrackingTask.md)
- [TimeTrackingTimeTrackingBreakAssessmentV1](docs/Model/TimeTrackingTimeTrackingBreakAssessmentV1.md)
- [TimeTrackingTimeTrackingBreakAssessmentViolationV1](docs/Model/TimeTrackingTimeTrackingBreakAssessmentViolationV1.md)
- [TimeTrackingTimeTrackingBreakAvailabilityV1](docs/Model/TimeTrackingTimeTrackingBreakAvailabilityV1.md)
- [TimeTrackingTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingTimeTrackingBreakPolicyV1.md)
- [TimeTrackingTimeTrackingBreakPolicyWithRelationsV1](docs/Model/TimeTrackingTimeTrackingBreakPolicyWithRelationsV1.md)
- [TimeTrackingTimeTrackingBreakV1](docs/Model/TimeTrackingTimeTrackingBreakV1.md)
- [TimeTrackingTimeTrackingConfigurationV1](docs/Model/TimeTrackingTimeTrackingConfigurationV1.md)
- [TimeTrackingTimeTrackingHourEntryV1](docs/Model/TimeTrackingTimeTrackingHourEntryV1.md)
- [TimeTrackingTimeTrackingKioskV1](docs/Model/TimeTrackingTimeTrackingKioskV1.md)
- [TimeTrackingTimeTrackingTimeClockV1](docs/Model/TimeTrackingTimeTrackingTimeClockV1.md)
- [TimeTrackingTimesheetV1](docs/Model/TimeTrackingTimesheetV1.md)
- [TimeTrackingUpdateClockEntryV1](docs/Model/TimeTrackingUpdateClockEntryV1.md)
- [TimeTrackingUpdateEmployeeTimeTrackingDataV1](docs/Model/TimeTrackingUpdateEmployeeTimeTrackingDataV1.md)
- [TimeTrackingUpdateTimeTrackingBreakPolicyV1](docs/Model/TimeTrackingUpdateTimeTrackingBreakPolicyV1.md)
- [TimeTrackingUpdateTimeTrackingBreakV1](docs/Model/TimeTrackingUpdateTimeTrackingBreakV1.md)
- [TimeTrackingUpdateTimeTrackingConfigurationV1](docs/Model/TimeTrackingUpdateTimeTrackingConfigurationV1.md)
- [TimeTrackingUpdateTimeTrackingKioskV1](docs/Model/TimeTrackingUpdateTimeTrackingKioskV1.md)
- [TimeTrackingUpdateTimeTrackingTimeClockV1](docs/Model/TimeTrackingUpdateTimeTrackingTimeClockV1.md)
- [TimesheetEntryInfoApiTransformer](docs/Model/TimesheetEntryInfoApiTransformer.md)
- [TimesheetTimesheetDailyEntryV1](docs/Model/TimesheetTimesheetDailyEntryV1.md)
- [TimesheetTimesheetDailySummaryV1](docs/Model/TimesheetTimesheetDailySummaryV1.md)
- [TimezoneListResponse](docs/Model/TimezoneListResponse.md)
- [TimezoneResource](docs/Model/TimezoneResource.md)
- [TotalRewardsBenefitDetailsValues](docs/Model/TotalRewardsBenefitDetailsValues.md)
- [TotalRewardsBenefitSectionValues](docs/Model/TotalRewardsBenefitSectionValues.md)
- [TotalRewardsCalendarSectionValues](docs/Model/TotalRewardsCalendarSectionValues.md)
- [TotalRewardsCompSummaryValues](docs/Model/TotalRewardsCompSummaryValues.md)
- [TotalRewardsCustomDisclaimerInfo](docs/Model/TotalRewardsCustomDisclaimerInfo.md)
- [TotalRewardsEmployeeStatement](docs/Model/TotalRewardsEmployeeStatement.md)
- [TotalRewardsEquityDetailsValues](docs/Model/TotalRewardsEquityDetailsValues.md)
- [TotalRewardsEquityEstimatedValuationValues](docs/Model/TotalRewardsEquityEstimatedValuationValues.md)
- [TotalRewardsEquityGrowthChartItem](docs/Model/TotalRewardsEquityGrowthChartItem.md)
- [TotalRewardsEquityGrowthEstimation](docs/Model/TotalRewardsEquityGrowthEstimation.md)
- [TotalRewardsEquitySectionValues](docs/Model/TotalRewardsEquitySectionValues.md)
- [TotalRewardsExtraPayDetailsValues](docs/Model/TotalRewardsExtraPayDetailsValues.md)
- [TotalRewardsExtraPaySectionValues](docs/Model/TotalRewardsExtraPaySectionValues.md)
- [TotalRewardsHolidayValue](docs/Model/TotalRewardsHolidayValue.md)
- [TotalRewardsOnboardingStep](docs/Model/TotalRewardsOnboardingStep.md)
- [TotalRewardsOverviewSectionValues](docs/Model/TotalRewardsOverviewSectionValues.md)
- [TotalRewardsTimeOffPolicyValue](docs/Model/TotalRewardsTimeOffPolicyValue.md)
- [TotalRewardsTimelineItem](docs/Model/TotalRewardsTimelineItem.md)
- [TotalRewardsTimelineItemLabel](docs/Model/TotalRewardsTimelineItemLabel.md)
- [TotalRewardsTimelineSectionValues](docs/Model/TotalRewardsTimelineSectionValues.md)
- [TrainingCategory](docs/Model/TrainingCategory.md)
- [TrainingRecord](docs/Model/TrainingRecord.md)
- [TrainingRecordMap](docs/Model/TrainingRecordMap.md)
- [TrainingRecordType](docs/Model/TrainingRecordType.md)
- [TrainingType](docs/Model/TrainingType.md)
- [TrainingTypeCategory](docs/Model/TrainingTypeCategory.md)
- [TransformedApiEmployeeGoalDetails](docs/Model/TransformedApiEmployeeGoalDetails.md)
- [TransformedApiEmployeeGoalDetailsGoal](docs/Model/TransformedApiEmployeeGoalDetailsGoal.md)
- [TransformedApiGoal](docs/Model/TransformedApiGoal.md)
- [TransformedApiGoalMilestonesInner](docs/Model/TransformedApiGoalMilestonesInner.md)
- [UnarchiveCustomFieldsRequest](docs/Model/UnarchiveCustomFieldsRequest.md)
- [UnarchiveCustomFieldsResponse](docs/Model/UnarchiveCustomFieldsResponse.md)
- [UnassignEmployeesFromBreakPolicyRequest](docs/Model/UnassignEmployeesFromBreakPolicyRequest.md)
- [UpdateApplicantStatusRequest](docs/Model/UpdateApplicantStatusRequest.md)
- [UpdateApplicantStatusResponse](docs/Model/UpdateApplicantStatusResponse.md)
- [UpdateCompanyIndustryCodes400Response](docs/Model/UpdateCompanyIndustryCodes400Response.md)
- [UpdateCompanyIndustryCodes403Response](docs/Model/UpdateCompanyIndustryCodes403Response.md)
- [UpdateCompanyIndustryCodes404Response](docs/Model/UpdateCompanyIndustryCodes404Response.md)
- [UpdateCompanyIndustryCodes500Response](docs/Model/UpdateCompanyIndustryCodes500Response.md)
- [UpdateCompanyIndustryCodesResponse](docs/Model/UpdateCompanyIndustryCodesResponse.md)
- [UpdateCompanyNameBadRequestResponse](docs/Model/UpdateCompanyNameBadRequestResponse.md)
- [UpdateCompanyNameBadRequestResponseError](docs/Model/UpdateCompanyNameBadRequestResponseError.md)
- [UpdateCompanyNameForbiddenResponse](docs/Model/UpdateCompanyNameForbiddenResponse.md)
- [UpdateCompanyNameForbiddenResponseError](docs/Model/UpdateCompanyNameForbiddenResponseError.md)
- [UpdateCompanyNameInternalErrorResponse](docs/Model/UpdateCompanyNameInternalErrorResponse.md)
- [UpdateCompanyNameSuccessResponse](docs/Model/UpdateCompanyNameSuccessResponse.md)
- [UpdateCompensationBenchmarkRequest](docs/Model/UpdateCompensationBenchmarkRequest.md)
- [UpdateCompensationBenchmarkSourceItem](docs/Model/UpdateCompensationBenchmarkSourceItem.md)
- [UpdateCompensationBenchmarkSourcesRequest](docs/Model/UpdateCompensationBenchmarkSourcesRequest.md)
- [UpdateCompensationBenchmarkSourcesResponse](docs/Model/UpdateCompensationBenchmarkSourcesResponse.md)
- [UpdateEmployeeTrainingRecordRequest](docs/Model/UpdateEmployeeTrainingRecordRequest.md)
- [UpdateEmployeeVerificationIntegrationRequest](docs/Model/UpdateEmployeeVerificationIntegrationRequest.md)
- [UpdateEmployeeVerificationRequest](docs/Model/UpdateEmployeeVerificationRequest.md)
- [UpdateGoalCommentRequest](docs/Model/UpdateGoalCommentRequest.md)
- [UpdateGoalMilestoneProgressRequest](docs/Model/UpdateGoalMilestoneProgressRequest.md)
- [UpdateGoalProgressRequest](docs/Model/UpdateGoalProgressRequest.md)
- [UpdateGoalSharingRequest](docs/Model/UpdateGoalSharingRequest.md)
- [UpdateGoalV1](docs/Model/UpdateGoalV1.md)
- [UpdateGoalV11Request](docs/Model/UpdateGoalV11Request.md)
- [UpdateGoalV11RequestMilestonesInner](docs/Model/UpdateGoalV11RequestMilestonesInner.md)
- [UpdateLocationRequest](docs/Model/UpdateLocationRequest.md)
- [UpdateLocationRequestAddress](docs/Model/UpdateLocationRequestAddress.md)
- [UpdatePayBandsRequest](docs/Model/UpdatePayBandsRequest.md)
- [UpdateTrainingCategoryRequest](docs/Model/UpdateTrainingCategoryRequest.md)
- [UpdateTrainingTypeRequest](docs/Model/UpdateTrainingTypeRequest.md)
- [UpdateTrainingTypeRequestCategory](docs/Model/UpdateTrainingTypeRequestCategory.md)
- [UpdateWebhookBadRequestResponse](docs/Model/UpdateWebhookBadRequestResponse.md)
- [UpdatedCompensationBenchmark](docs/Model/UpdatedCompensationBenchmark.md)
- [UpdatedCompensationBenchmarkSavedBenchmark](docs/Model/UpdatedCompensationBenchmarkSavedBenchmark.md)
- [UploadEmployeePhotoRequest1](docs/Model/UploadEmployeePhotoRequest1.md)
- [UserPermissionData](docs/Model/UserPermissionData.md)
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
- [WhosOutListResponseV1](docs/Model/WhosOutListResponseV1.md)
- [WhosOutListResponseV1Links](docs/Model/WhosOutListResponseV1Links.md)
- [WhosOutListResponseV1LinksNext](docs/Model/WhosOutListResponseV1LinksNext.md)
- [WhosOutListResponseV1LinksPrev](docs/Model/WhosOutListResponseV1LinksPrev.md)
- [WhosOutListResponseV1Meta](docs/Model/WhosOutListResponseV1Meta.md)
- [WhosOutPersonV1](docs/Model/WhosOutPersonV1.md)
- [WhosOutV1](docs/Model/WhosOutV1.md)
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
    - Package version: `2.0.2`
    - Generator version: `7.16.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`

## Terms

Use of the BambooHR API is subject to the [BambooHR Developer Terms of Service](https://www.bamboohr.com/legal/developer-terms-of-service).

## License

[MIT](LICENSE)
