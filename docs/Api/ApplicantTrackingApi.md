# BhrSdk\ApplicantTrackingApi

All URIs are relative to https://companySubDomain.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createApplicationComment()**](ApplicantTrackingApi.md#createApplicationComment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Create Job Application Comment |
| [**createCandidate()**](ApplicantTrackingApi.md#createCandidate) | **POST** /api/v1/applicant_tracking/application | Create Candidate |
| [**createJobOpening()**](ApplicantTrackingApi.md#createJobOpening) | **POST** /api/v1/applicant_tracking/job_opening | Create Job Opening |
| [**getApplicationDetails()**](ApplicantTrackingApi.md#getApplicationDetails) | **GET** /api/v1/applicant_tracking/applications/{applicationId} | Get Job Application Details |
| [**getApplications()**](ApplicantTrackingApi.md#getApplications) | **GET** /api/v1/applicant_tracking/applications | Get Job Applications |
| [**getCompanyLocations()**](ApplicantTrackingApi.md#getCompanyLocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations |
| [**getHiringLeads()**](ApplicantTrackingApi.md#getHiringLeads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads |
| [**getJobSummaries()**](ApplicantTrackingApi.md#getJobSummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries |
| [**getStatuses()**](ApplicantTrackingApi.md#getStatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Applicant Statuses |
| [**updateApplicantStatus()**](ApplicantTrackingApi.md#updateApplicantStatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Update Applicant Status |


## `createApplicationComment()`

```php
createApplicationComment($application_id, $create_application_comment_request): \BhrSdk\Model\CreateCommentResponse
```

Create Job Application Comment

Add a comment to an application. The owner of the API key used must have access to ATS settings. The `type` field defaults to `comment` if omitted.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 56; // int | The ID of the application to add a comment to.
$create_application_comment_request = new \BhrSdk\Model\CreateApplicationCommentRequest(); // \BhrSdk\Model\CreateApplicationCommentRequest | Comment object to post

try {
    $result = $apiInstance->createApplicationComment($application_id, $create_application_comment_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->createApplicationComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application to add a comment to. | |
| **create_application_comment_request** | [**\BhrSdk\Model\CreateApplicationCommentRequest**](../Model/CreateApplicationCommentRequest.md)| Comment object to post | |

### Return type

[**\BhrSdk\Model\CreateCommentResponse**](../Model/CreateCommentResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCandidate()`

```php
createCandidate($first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter): \BhrSdk\Model\CreateCandidateResponse
```

Create Candidate

Create a new candidate application for a job opening. The owner of the API key used must have access to ATS settings. On success, returns the new candidate ID. Only fields required by the target job opening's standard questions need to be provided beyond firstName, lastName, and jobId.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$first_name = 'first_name_example'; // string | The first name of the candidate.
$last_name = 'last_name_example'; // string | The last name of the candidate.
$job_id = 56; // int | The id of the job opening for the candidate application.
$email = 'email_example'; // string | The email address of the candidate. Must be a valid email address.
$phone_number = 'phone_number_example'; // string | The phone number of the candidate.
$source = 'source_example'; // string | The source of the candidate application, e.g. LinkedIn, Indeed, etc.
$address = 'address_example'; // string | The street address of the candidate.
$city = 'city_example'; // string | The city of the candidate.
$state = 'state_example'; // string | The state or province of the candidate. Accepts state name, abbreviation, or ISO code.
$zip = 'zip_example'; // string | The zip code or postal code of the candidate.
$country = 'country_example'; // string | The country of the candidate. Accepts country name or ISO code.
$linkedin_url = 'linkedin_url_example'; // string | The LinkedIn profile URL of the candidate. Must match `https?://(.*\\\\.)?linkedin.com/...`.
$date_available = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | The available start date of the candidate. Format: `Y-m-d` (e.g. `2024-06-01`).
$desired_salary = 'desired_salary_example'; // string | The desired salary of the candidate.
$referred_by = 'referred_by_example'; // string | The person or entity that referred the candidate.
$website_url = 'website_url_example'; // string | The personal website, blog, or online portfolio of the candidate. Must be a valid URL.
$highest_education = 'highest_education_example'; // string | The highest completed education level of the candidate.
$college_name = 'college_name_example'; // string | The college or university of the candidate.
$references = 'references_example'; // string | A list of references supplied by the candidate.
$resume = '/path/to/file.txt'; // \SplFileObject | Resume file for the candidate. Accepted MIME types: `application/pdf`, `application/msword`, `application/vnd.openxmlformats-officedocument.wordprocessingml.document`, `text/plain`, `application/rtf`, `image/jpeg`, `image/gif`, `image/png`, `image/tiff`, `image/bmp`.
$cover_letter = '/path/to/file.txt'; // \SplFileObject | Cover letter file for the candidate. Accepted MIME types: `application/pdf`, `application/msword`, `application/vnd.openxmlformats-officedocument.wordprocessingml.document`, `text/plain`, `application/rtf`, `image/jpeg`, `image/gif`, `image/png`, `image/tiff`, `image/bmp`.

try {
    $result = $apiInstance->createCandidate($first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->createCandidate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **first_name** | **string**| The first name of the candidate. | |
| **last_name** | **string**| The last name of the candidate. | |
| **job_id** | **int**| The id of the job opening for the candidate application. | |
| **email** | **string**| The email address of the candidate. Must be a valid email address. | [optional] |
| **phone_number** | **string**| The phone number of the candidate. | [optional] |
| **source** | **string**| The source of the candidate application, e.g. LinkedIn, Indeed, etc. | [optional] |
| **address** | **string**| The street address of the candidate. | [optional] |
| **city** | **string**| The city of the candidate. | [optional] |
| **state** | **string**| The state or province of the candidate. Accepts state name, abbreviation, or ISO code. | [optional] |
| **zip** | **string**| The zip code or postal code of the candidate. | [optional] |
| **country** | **string**| The country of the candidate. Accepts country name or ISO code. | [optional] |
| **linkedin_url** | **string**| The LinkedIn profile URL of the candidate. Must match &#x60;https?://(.*\\\\.)?linkedin.com/...&#x60;. | [optional] |
| **date_available** | **\DateTime**| The available start date of the candidate. Format: &#x60;Y-m-d&#x60; (e.g. &#x60;2024-06-01&#x60;). | [optional] |
| **desired_salary** | **string**| The desired salary of the candidate. | [optional] |
| **referred_by** | **string**| The person or entity that referred the candidate. | [optional] |
| **website_url** | **string**| The personal website, blog, or online portfolio of the candidate. Must be a valid URL. | [optional] |
| **highest_education** | **string**| The highest completed education level of the candidate. | [optional] |
| **college_name** | **string**| The college or university of the candidate. | [optional] |
| **references** | **string**| A list of references supplied by the candidate. | [optional] |
| **resume** | **\SplFileObject****\SplFileObject**| Resume file for the candidate. Accepted MIME types: &#x60;application/pdf&#x60;, &#x60;application/msword&#x60;, &#x60;application/vnd.openxmlformats-officedocument.wordprocessingml.document&#x60;, &#x60;text/plain&#x60;, &#x60;application/rtf&#x60;, &#x60;image/jpeg&#x60;, &#x60;image/gif&#x60;, &#x60;image/png&#x60;, &#x60;image/tiff&#x60;, &#x60;image/bmp&#x60;. | [optional] |
| **cover_letter** | **\SplFileObject****\SplFileObject**| Cover letter file for the candidate. Accepted MIME types: &#x60;application/pdf&#x60;, &#x60;application/msword&#x60;, &#x60;application/vnd.openxmlformats-officedocument.wordprocessingml.document&#x60;, &#x60;text/plain&#x60;, &#x60;application/rtf&#x60;, &#x60;image/jpeg&#x60;, &#x60;image/gif&#x60;, &#x60;image/png&#x60;, &#x60;image/tiff&#x60;, &#x60;image/bmp&#x60;. | [optional] |

### Return type

[**\BhrSdk\Model\CreateCandidateResponse**](../Model/CreateCandidateResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createJobOpening()`

```php
createJobOpening($posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code, $location_type): \BhrSdk\Model\CreateJobOpeningResponse
```

Create Job Opening

Create a new job opening. The owner of the API key used must have access to ATS settings. Use the Get Company Locations and Get Hiring Leads endpoints to obtain valid IDs for `jobLocation` and `hiringLead`. On success, returns the new job opening ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
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
$location_type = 56; // int | The location type for the job opening. `0` = on-site (requires `jobLocation`), `1` = remote (no `jobLocation`), `2` = hybrid (requires `jobLocation`). Defaults to `1` if omitted and no `jobLocation` is provided, or `0` if `jobLocation` is provided.

try {
    $result = $apiInstance->createJobOpening($posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code, $location_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->createJobOpening: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
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
| **location_type** | **int**| The location type for the job opening. &#x60;0&#x60; &#x3D; on-site (requires &#x60;jobLocation&#x60;), &#x60;1&#x60; &#x3D; remote (no &#x60;jobLocation&#x60;), &#x60;2&#x60; &#x3D; hybrid (requires &#x60;jobLocation&#x60;). Defaults to &#x60;1&#x60; if omitted and no &#x60;jobLocation&#x60; is provided, or &#x60;0&#x60; if &#x60;jobLocation&#x60; is provided. | [optional] |

### Return type

[**\BhrSdk\Model\CreateJobOpeningResponse**](../Model/CreateJobOpeningResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplicationDetails()`

```php
getApplicationDetails($application_id): \BhrSdk\Model\ApplicationDetails
```

Get Job Application Details

Get the full details of a single application including applicant info, job details, questions and answers, and status history. The owner of the API key used must have access to ATS settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 56; // int | The ID of the application to retrieve details for.

try {
    $result = $apiInstance->getApplicationDetails($application_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getApplicationDetails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application to retrieve details for. | |

### Return type

[**\BhrSdk\Model\ApplicationDetails**](../Model/ApplicationDetails.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplications()`

```php
getApplications($page, $job_id, $application_status_id, $application_status, $job_status_groups, $search_string, $sort_by, $sort_order, $new_since): \BhrSdk\Model\ApplicationsList
```

Get Job Applications

Get a list of applications. The owner of the API key used must have access to ATS settings. Combine as many different optional parameter filters as you like.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 56; // int | The page number
$job_id = 56; // int | A Job Id to limit results to
$application_status_id = 'application_status_id_example'; // string | One or more application status IDs to filter by, comma-separated (e.g. `1,2,3`).
$application_status = 'application_status_example'; // string | One or more application status group codes to filter by, comma-separated (e.g. `NEW,ACTIVE`). Allowed values: `ALL`, `ALL_ACTIVE`, `NEW`, `ACTIVE`, `INACTIVE`, `HIRED`.
$job_status_groups = 'job_status_groups_example'; // string | One or more position status groups to filter by, comma-separated (e.g. `Draft,Open`). Allowed values: `ALL`, `DRAFT_AND_OPEN`, `Open`, `Filled`, `Draft`, `Deleted`, `On Hold`, `Canceled`.
$search_string = 'search_string_example'; // string | A general search criteria by which to find applications.
$sort_by = 'sort_by_example'; // string | A specific field to sort the results by.
$sort_order = 'sort_order_example'; // string | Order by which to sort results.
$new_since = 2024-01-01 13:00:00; // string | Only return applications submitted after this UTC timestamp. Format: `Y-m-d H:i:s` (e.g. `2024-01-01 13:00:00`).

try {
    $result = $apiInstance->getApplications($page, $job_id, $application_status_id, $application_status, $job_status_groups, $search_string, $sort_by, $sort_order, $new_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getApplications: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| The page number | [optional] |
| **job_id** | **int**| A Job Id to limit results to | [optional] |
| **application_status_id** | **string**| One or more application status IDs to filter by, comma-separated (e.g. &#x60;1,2,3&#x60;). | [optional] |
| **application_status** | **string**| One or more application status group codes to filter by, comma-separated (e.g. &#x60;NEW,ACTIVE&#x60;). Allowed values: &#x60;ALL&#x60;, &#x60;ALL_ACTIVE&#x60;, &#x60;NEW&#x60;, &#x60;ACTIVE&#x60;, &#x60;INACTIVE&#x60;, &#x60;HIRED&#x60;. | [optional] |
| **job_status_groups** | **string**| One or more position status groups to filter by, comma-separated (e.g. &#x60;Draft,Open&#x60;). Allowed values: &#x60;ALL&#x60;, &#x60;DRAFT_AND_OPEN&#x60;, &#x60;Open&#x60;, &#x60;Filled&#x60;, &#x60;Draft&#x60;, &#x60;Deleted&#x60;, &#x60;On Hold&#x60;, &#x60;Canceled&#x60;. | [optional] |
| **search_string** | **string**| A general search criteria by which to find applications. | [optional] |
| **sort_by** | **string**| A specific field to sort the results by. | [optional] |
| **sort_order** | **string**| Order by which to sort results. | [optional] |
| **new_since** | **string**| Only return applications submitted after this UTC timestamp. Format: &#x60;Y-m-d H:i:s&#x60; (e.g. &#x60;2024-01-01 13:00:00&#x60;). | [optional] |

### Return type

[**\BhrSdk\Model\ApplicationsList**](../Model/ApplicationsList.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyLocations()`

```php
getCompanyLocations(): \BhrSdk\Model\Location[]
```

Get Company Locations

Get all company locations available for use when creating a job opening. The owner of the API key used must have access to ATS settings. Use the returned location IDs as the `jobLocation` field when calling the Create Job Opening endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCompanyLocations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getCompanyLocations: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\Location[]**](../Model/Location.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHiringLeads()`

```php
getHiringLeads(): \BhrSdk\Model\HiringLead[]
```

Get Hiring Leads

Get the list of employees who can be assigned as a hiring lead when creating a new job opening. The owner of the API key used must have access to ATS settings. Use the returned `employeeId` values as the `hiringLead` field when calling the Create Job Opening endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getHiringLeads();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getHiringLeads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\HiringLead[]**](../Model/HiringLead.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobSummaries()`

```php
getJobSummaries($status_groups, $status_ids, $sort_by, $sort_order): \BhrSdk\Model\JobSummary[]
```

Get Job Summaries

Get a list of job opening summaries. The owner of the API key used must have access to ATS settings. Results can be filtered by status group and sorted by various fields. By default returns all non-deleted job openings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status_groups = 'status_groups_example'; // string | One or more status groups to filter positions by, comma-separated (e.g. `Draft,Open`). Allowed values: `ALL`, `DRAFT_AND_OPEN`, `Open`, `Filled`, `Draft`, `Deleted`, `On Hold`, `Canceled`. Defaults to all non-deleted positions.
$status_ids = 'status_ids_example'; // string | One or more specific job opening status IDs to filter by, comma-separated (e.g. `1,2`). Combined with `statusGroups` when both are provided.
$sort_by = 'sort_by_example'; // string | A specific field to sort the results by.
$sort_order = 'sort_order_example'; // string | Order by which to sort results.

try {
    $result = $apiInstance->getJobSummaries($status_groups, $status_ids, $sort_by, $sort_order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getJobSummaries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status_groups** | **string**| One or more status groups to filter positions by, comma-separated (e.g. &#x60;Draft,Open&#x60;). Allowed values: &#x60;ALL&#x60;, &#x60;DRAFT_AND_OPEN&#x60;, &#x60;Open&#x60;, &#x60;Filled&#x60;, &#x60;Draft&#x60;, &#x60;Deleted&#x60;, &#x60;On Hold&#x60;, &#x60;Canceled&#x60;. Defaults to all non-deleted positions. | [optional] |
| **status_ids** | **string**| One or more specific job opening status IDs to filter by, comma-separated (e.g. &#x60;1,2&#x60;). Combined with &#x60;statusGroups&#x60; when both are provided. | [optional] |
| **sort_by** | **string**| A specific field to sort the results by. | [optional] |
| **sort_order** | **string**| Order by which to sort results. | [optional] |

### Return type

[**\BhrSdk\Model\JobSummary[]**](../Model/JobSummary.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStatuses()`

```php
getStatuses(): \BhrSdk\Model\ApplicantStatus[]
```

Get Applicant Statuses

Get a list of applicant statuses configured for the company. The owner of the API key used must have access to ATS settings. Returns both system-defined and custom statuses.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getStatuses();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getStatuses: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BhrSdk\Model\ApplicantStatus[]**](../Model/ApplicantStatus.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateApplicantStatus()`

```php
updateApplicantStatus($application_id, $update_applicant_status_request): \BhrSdk\Model\UpdateApplicantStatusResponse
```

Update Applicant Status

Update the status of an application. The owner of the API key used must have access to ATS settings. Use the Get Applicant Statuses endpoint to obtain valid status IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = BhrSdk\Configuration::getDefaultConfiguration()
              ->setApiKey('x-api-key', 'YOUR_API_KEY');

// Or configure OAuth2 access token for authorization
// $config = BhrSdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new BhrSdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 56; // int | The ID of the application whose status should be updated.
$update_applicant_status_request = new \BhrSdk\Model\UpdateApplicantStatusRequest(); // \BhrSdk\Model\UpdateApplicantStatusRequest | The new status to assign to the application.

try {
    $result = $apiInstance->updateApplicantStatus($application_id, $update_applicant_status_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->updateApplicantStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application whose status should be updated. | |
| **update_applicant_status_request** | [**\BhrSdk\Model\UpdateApplicantStatusRequest**](../Model/UpdateApplicantStatusRequest.md)| The new status to assign to the application. | |

### Return type

[**\BhrSdk\Model\UpdateApplicantStatusResponse**](../Model/UpdateApplicantStatusResponse.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `text/html`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
