# MySdk\ApplicantTrackingApi

All URIs are relative to https://example.bamboohr.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addNewCandidate()**](ApplicantTrackingApi.md#addNewCandidate) | **POST** /api/v1/applicant_tracking/application | Add New Candidate |
| [**addNewJobOpening()**](ApplicantTrackingApi.md#addNewJobOpening) | **POST** /api/v1/applicant_tracking/job_opening | Add New Job Opening |
| [**getApplications()**](ApplicantTrackingApi.md#getApplications) | **GET** /api/v1/applicant_tracking/applications | Get Applications |
| [**getCompanyLocations()**](ApplicantTrackingApi.md#getCompanyLocations) | **GET** /api/v1/applicant_tracking/locations | Get Company Locations |
| [**getHiringLeads()**](ApplicantTrackingApi.md#getHiringLeads) | **GET** /api/v1/applicant_tracking/hiring_leads | Get Hiring Leads |
| [**getJobSummaries()**](ApplicantTrackingApi.md#getJobSummaries) | **GET** /api/v1/applicant_tracking/jobs | Get Job Summaries |
| [**getStatuses()**](ApplicantTrackingApi.md#getStatuses) | **GET** /api/v1/applicant_tracking/statuses | Get Statuses |
| [**postApplicantStatus()**](ApplicantTrackingApi.md#postApplicantStatus) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/status | Change Applicant&#39;s Status |
| [**postApplicationComment()**](ApplicantTrackingApi.md#postApplicationComment) | **POST** /api/v1/applicant_tracking/applications/{applicationId}/comments | Add Application Comment |


## `addNewCandidate()`

```php
addNewCandidate($first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter)
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
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
    $apiInstance->addNewCandidate($first_name, $last_name, $job_id, $email, $phone_number, $source, $address, $city, $state, $zip, $country, $linkedin_url, $date_available, $desired_salary, $referred_by, $website_url, $highest_education, $college_name, $references, $resume, $cover_letter);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->addNewCandidate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
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

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addNewJobOpening()`

```php
addNewJobOpening($posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code)
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
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

try {
    $apiInstance->addNewJobOpening($posting_title, $job_status, $hiring_lead, $employment_type, $job_description, $department, $minimum_experience, $compensation, $job_location, $application_question_resume, $application_question_address, $application_question_linkedin_url, $application_question_date_available, $application_question_desired_salary, $application_question_cover_letter, $application_question_referred_by, $application_question_website_url, $application_question_highest_education, $application_question_college, $application_question_references, $internal_job_code);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->addNewJobOpening: ', $e->getMessage(), PHP_EOL;
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

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getApplications()`

```php
getApplications($page, $job_id, $application_status_id, $application_status, $job_status_groups, $search_string, $sort_by, $sort_order, $new_since): \MySdk\Model\GetApplications200Response
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
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

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanyLocations()`

```php
getCompanyLocations(): \MySdk\Model\GetCompanyLocations200ResponseInner[]
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
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

[**\MySdk\Model\GetCompanyLocations200ResponseInner[]**](../Model/GetCompanyLocations200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getHiringLeads()`

```php
getHiringLeads(): \MySdk\Model\GetHiringLeads200ResponseInner[]
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
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

[**\MySdk\Model\GetHiringLeads200ResponseInner[]**](../Model/GetHiringLeads200ResponseInner.md)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getJobSummaries()`

```php
getJobSummaries($status_groups, $sort_by, $sort_order)
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$status_groups = 'status_groups_example'; // string | A list of status groups to filter positions by.
$sort_by = 'sort_by_example'; // string | A specific field to sort the results by.
$sort_order = 'sort_order_example'; // string | Order by which to sort results.

try {
    $apiInstance->getJobSummaries($status_groups, $sort_by, $sort_order);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getJobSummaries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status_groups** | **string**| A list of status groups to filter positions by. | [optional] |
| **sort_by** | **string**| A specific field to sort the results by. | [optional] |
| **sort_order** | **string**| Order by which to sort results. | [optional] |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getStatuses()`

```php
getStatuses()
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->getStatuses();
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->getStatuses: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postApplicantStatus()`

```php
postApplicantStatus($application_id, $post_applicant_status_request)
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 0; // int | The ID of the application to add a comment to.
$post_applicant_status_request = new \MySdk\Model\PostApplicantStatusRequest(); // \MySdk\Model\PostApplicantStatusRequest | Sample Post Data.

try {
    $apiInstance->postApplicantStatus($application_id, $post_applicant_status_request);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->postApplicantStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application to add a comment to. | [default to 0] |
| **post_applicant_status_request** | [**\MySdk\Model\PostApplicantStatusRequest**](../Model/PostApplicantStatusRequest.md)| Sample Post Data. | |

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

## `postApplicationComment()`

```php
postApplicationComment($application_id, $post_application_comment_request)
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

$apiInstance = new MySdk\Api\ApplicantTrackingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$application_id = 0; // int | The ID of the application to add a comment to.
$post_application_comment_request = new \MySdk\Model\PostApplicationCommentRequest(); // \MySdk\Model\PostApplicationCommentRequest | Comment object to post

try {
    $apiInstance->postApplicationComment($application_id, $post_application_comment_request);
} catch (Exception $e) {
    echo 'Exception when calling ApplicantTrackingApi->postApplicationComment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **application_id** | **int**| The ID of the application to add a comment to. | [default to 0] |
| **post_application_comment_request** | [**\MySdk\Model\PostApplicationCommentRequest**](../Model/PostApplicationCommentRequest.md)| Comment object to post | |

### Return type

void (empty response body)

### Authorization

[basic](../../README.md#basic), [oauth](../../README.md#oauth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`, `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
