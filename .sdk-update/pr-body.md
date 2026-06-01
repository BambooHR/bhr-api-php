## Spec source

- **Source commit:** [`9a3900af0408`](https://github.com/BambooHR/main/commit/9a3900af040817251293f457c1cfecaf6e6def77)
- **Generated at:** `2026-06-01T22:40:00Z`
- **Spec URL:** https://d40bgjb2zs35x.cloudfront.net/main/latest/docs/openapi/public-openapi.yaml

## Semver classification

**Bump level:** `major`

**Reason:** Breaking changes detected. 863 ERR-level change(s): api-removed-without-deprecation, request-body-added-required, request-body-type-changed, request-parameter-default-value-removed, request-parameter-type-changed, request-property-any-of-removed, request-property-became-not-nullable, request-property-enum-value-removed, response-body-one-of-added, response-body-type-changed, response-media-type-removed, response-property-list-of-types-widened, response-property-one-of-added, response-property-type-changed.

<details>
<summary><strong>API changelog</strong> (from oasdiff)</summary>

# API Changelog 1.0 vs. 1.0


## API Changes

### GET /api/v1/alert-configurations
-  endpoint added


### POST /api/v1/alert-configurations
-  endpoint added


### GET /api/v1/alert-configurations/{id}
-  endpoint added


### PUT /api/v1/alert-configurations/{id}
-  endpoint added


### GET /api/v1/alerts
-  endpoint added


### POST /api/v1/applicant_tracking/application
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/applicant_tracking/applications
- :warning: response property `applications/items/applicant/avatar` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applications/items/job/title/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applications/items/rating` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `nextPageUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/applicant_tracking/applications/{applicationId}
- :warning: response property `applicant/address/addressLine1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/address/addressLine2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/address/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/address/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/address/zipcode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/availableStartDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/avatar` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/education/institution` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/linkedinUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/phoneNumber` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/source` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/twitterUsername` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicant/websiteUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `applicationReferences` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `attachmentCount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `attachments` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `coverLetterFileId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `desiredSalary` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `job/hiringLead/avatar` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `job/hiringLead/jobTitle/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `job/hiringLead/jobTitle/label` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `job/title/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `movedFrom` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `movedTo` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `questionsAndAnswers/items/archivedDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `questionsAndAnswers/items/editedDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `questionsAndAnswers/items/editedEndDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `questionsAndAnswers/items/hasRevisions` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `questionsAndAnswers/items/isArchived` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `rating` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `referredBy` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `resumeFileId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `status/changedByUser/avatar` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `status/changedByUser/jobTitle/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `status/changedByUser/jobTitle/label` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `applicant/address` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `applicant/education` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `applicant/education/level` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `job/hiringLead` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `job/hiringLead/jobTitle` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `status/changedByUser` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `status/changedByUser/jobTitle` response property `oneOf` list for the response status `200`
- :warning: the `applicant/address` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `applicant/education` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `applicant/education/level` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `job/hiringLead` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `job/hiringLead/jobTitle` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `status/changedByUser` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `status/changedByUser/jobTitle` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  the endpoint scheme security `oauth` was added to the API


### POST /api/v1/applicant_tracking/applications/{applicationId}/comments
-  the endpoint scheme security `oauth` was added to the API


### POST /api/v1/applicant_tracking/applications/{applicationId}/status
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/applicant_tracking/jobs
- :warning: response property `items/hiringLead/avatar` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/hiringLead/jobTitle` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/postingUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/title/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `items/department` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `items/hiringLead` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `items/location` response property `oneOf` list for the response status `200`
- :warning: the `items/department` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `items/hiringLead` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `items/location` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/applicant_tracking/locations
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/applicant_tracking/statuses
- :warning: response property `items/code` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  the endpoint scheme security `oauth` was added to the API


### GET /api/v1/benefit/company_benefit
- :warning: response property `companyBenefits/items/allowsCatchUp` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/allowsSuperCatchUp` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/benefitVendorId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/companyDeductionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/deductionTypeId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/endDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyBenefits/items/startDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/benefit/employee_benefit
- :warning: removed `subschema #1, subschema #2, subschema #3` from the `filters` request property `anyOf` list
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyAmount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyAmountType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyAnnualMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyCapAmount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyCapAmountType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/companyPercentBasedOn` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/coverageLevel` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/deductionEndDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/deductionStartDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeeAmount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeeAmountType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeeAnnualMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeeCapAmount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeeCapAmountType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/employeeBenefit/items/employeePercentBasedOn` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employeeBenefits/items/payFrequency` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/benefit/member_benefit
- :warning: response property `members/items/coverages/items/events/items/monthlyPremiumInCents` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `members/items/coverages/items/events/items/premiumTierId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/benefitcoverages
- :warning: response property `Benefit Coverages/items/benefitPlanId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Benefit Coverages/items/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/benefits/member-benefits
- :warning: response property `data/items/plans/items/dateRanges/items/endDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/benefits/settings/deduction_types/all
- :warning: response property `items/managedDeductionType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/subTypes/items/managedDeductionType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PATCH /api/v1/company-profile-data/company-information
- :warning: the request property `address/line1` became not nullable
- :warning: the request property `address/line2` became not nullable
- :warning: response property `address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/line1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/line2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/zip` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `displayName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `industryCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `legalName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `phone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `subdomain` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `terminationDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `address/line1` list-of-types was widened by adding types `null` to media type `application/merge-patch+json`
-  request property `address/line2` list-of-types was widened by adding types `null` to media type `application/merge-patch+json`


### PUT /api/v1/company-profile-data/industry-codes
- :warning: response property `company_industries/items/addedByUserId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `company_industries/items/addedYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/compensation/benchmarks
- :warning: response property `jobLocationPairs/items/benchmarks/items/dataYear` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/sourceColor` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/sourceId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/values/originalCurrencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/values/originalMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/values/originalMedian` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/benchmarks/items/values/originalMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/employees/items/managerName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/employees/items/managerTitle` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/internalJobPayBand/values/originalCurrencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/internalJobPayBand/values/originalMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/internalJobPayBand/values/originalMedian` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/internalJobPayBand/values/originalMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobLocationPairs/items/locationDetails/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `jobLocationPairs/items/employees/items/department` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `jobLocationPairs/items/employees/items/division` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `jobLocationPairs/items/internalJobPayBand` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `jobLocationPairs/items/locationDetails` response property `oneOf` list for the response status `200`
- :warning: the `jobLocationPairs/items/employees/items/department` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `jobLocationPairs/items/employees/items/division` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `jobLocationPairs/items/internalJobPayBand` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `jobLocationPairs/items/locationDetails` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/compensation/benchmarks
- :warning: response property `savedBenchmark/benchmarkMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkSource` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkValue` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/companiesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/dataYear` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/employeesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalCompanySize` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalCountry` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalIndustry` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalJobDescription` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalJobTitle` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalLevel` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalLocation` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalSecondaryLocation` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/jobLocationId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/mercerJobCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/sourceDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/sourceId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/compensation/benchmarks
- :warning: response property `savedBenchmark/benchmarkMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkSource` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/benchmarkValue` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/companiesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/dataYear` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/employeesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalCompanySize` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalCountry` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalIndustry` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalJobDescription` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalJobTitle` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalLevel` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalLocation` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/externalSecondaryLocation` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/jobLocationId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/mercerJobCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/sourceDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `savedBenchmark/sourceId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/compensation/benchmarks/details
- :warning: response property `benchmarkValues/items/createdYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/dataYear` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/jobTitle` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/lastEdited` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/sourceColorCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/sourceDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `benchmarkValues/items/updatedYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyPayRange/originalCurrencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyPayRange/originalMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyPayRange/originalMedian` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `companyPayRange/originalMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employees/items/compaRatio` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employees/items/compaRatioStatus` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employees/items/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employees/items/isRemote` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employees/items/rangePenetration` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `internalJobPayBand/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `internalJobPayBand/originalCurrencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `internalJobPayBand/originalMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `internalJobPayBand/originalMedian` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `internalJobPayBand/originalMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `location` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `locationId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/companiesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/createdYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/dataYear` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/employeesSurveyed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/formattedJobDescription` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/jobDescription` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/jobLevel` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/lastReviewed` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/updatedYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/values/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/values/originalCurrencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/values/originalMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/values/originalMedian` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mercerBenchmarkDetails/values/originalMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `companyPayRange` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `employees/items/location` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `employees/items/varianceFromPayBand` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `internalJobPayBand` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `mercerBenchmarkDetails` response property `oneOf` list for the response status `200`
- :warning: the `companyPayRange` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `employees/items/location` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `employees/items/varianceFromPayBand` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `internalJobPayBand` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `mercerBenchmarkDetails` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/compensation/benchmarks/import
- :warning: response property `columnMap/items/expectedColumnKey` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/compensation/benchmarks/sources
- :warning: response property `items/colorCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/compensation/equity/settings
- :warning: response property `companyValuation` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `disclaimers` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `outstandingShares` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pricePerShare` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `sliderMax` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `sliderMin` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `vestingConditions` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/compensation/equity/settings
-  endpoint added


### POST /api/v1/compensation/planning_cycles
-  endpoint added


### DELETE /api/v1/compensation/planning_cycles/{id}
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}
-  endpoint added


### GET /api/v1/compensation/planning_cycles/{id}/admins
-  added the optional property `admins` to the response with the `200` status
-  added the optional property `isFullAdmin` to the response with the `200` status


### POST /api/v1/compensation/planning_cycles/{id}/admins
-  endpoint added


### DELETE /api/v1/compensation/planning_cycles/{id}/admins/{employeeId}
-  endpoint added


### DELETE /api/v1/compensation/planning_cycles/{id}/approvals/employee/{employeeId}
-  endpoint added


### POST /api/v1/compensation/planning_cycles/{id}/approvals/final_approver/{employeeId}
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/approvals/{templateId}
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/budgets/breakdown
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/budgets/guidelines
-  endpoint added


### POST /api/v1/compensation/planning_cycles/{id}/budgets/import
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/change_comm/template
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/complete
-  endpoint added


### DELETE /api/v1/compensation/planning_cycles/{id}/employees
-  endpoint added


### POST /api/v1/compensation/planning_cycles/{id}/employees
-  endpoint added


### PUT /api/v1/compensation/planning_cycles/{id}/launch
-  endpoint added


### POST /api/v1/compensation/planning_cycles/{id}/recommendations
-  endpoint added


### POST /api/v1/compensation/planning_cycles/{id}/recommendations/send
-  endpoint added


### GET /api/v1/compensation/tools
-  endpoint added


### DELETE /api/v1/compensation/total_rewards/custom_disclaimer
-  endpoint added


### PUT /api/v1/compensation/total_rewards/custom_disclaimer
-  endpoint added


### DELETE /api/v1/compensation/total_rewards/employees
-  endpoint added


### POST /api/v1/compensation/total_rewards/employees
-  endpoint added


### PUT /api/v1/compensation/total_rewards/onboarding/{stepName}
-  endpoint added


### GET /api/v1/compensation/total_rewards/{employeeId}
-  endpoint added


### GET /api/v1/compensation/total_rewards/{employeeId}/printable
-  endpoint added


### GET /api/v1/compensation/total_rewards/{employeeId}/statement
-  endpoint added


### GET /api/v1/custom-reports
- :warning: response property `pagination/next_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pagination/prev_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/custom-reports/{reportId}
- :warning: response property `pagination/next_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pagination/prev_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/datasets/{datasetName}
- :warning: the request property `aggregations/defaultAggregation` became not nullable
- :warning: removed the enum value `avg` of the request property `aggregations/defaultAggregation`
- :warning: removed the enum value `count` of the request property `aggregations/defaultAggregation`
- :warning: removed the enum value `max` of the request property `aggregations/defaultAggregation`
- :warning: removed the enum value `min` of the request property `aggregations/defaultAggregation`
- :warning: removed the enum value `sum` of the request property `aggregations/defaultAggregation`
- :warning: response property `pagination/next_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pagination/prev_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  added the new optional request property `sortBy/items/aggregationType`
-  request property `aggregations/defaultAggregation` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/datasets/{datasetName}/field-options
- :warning: the request property `dependentFields` became not nullable
- :warning: the request property `filters` became not nullable
-  request property `dependentFields` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `filters` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/datasets/{datasetName}/fields
- :warning: response property `pagination/next_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pagination/prev_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/employee-verifications/employees/{employeeId}
-  endpoint added


### PUT /api/v1/employee-verifications/employees/{employeeId}/{verificationId}
-  endpoint added


### GET /api/v1/employee-verifications/integration
-  endpoint added


### PUT /api/v1/employee-verifications/integration
-  endpoint added


### POST /api/v1/employee-verifications/users/{userId}/send-email
-  endpoint added


### GET /api/v1/employeedependents
- :warning: response property `Employee Dependents/items/addressLine1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/addressLine2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isStudent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isUsCitizen` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSIN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSSN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/zipCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  removed the `no` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `no` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`


### POST /api/v1/employeedependents
- :warning: response property `Employee Dependents/items/addressLine1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/addressLine2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isStudent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isUsCitizen` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSIN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSSN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/zipCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  removed the `no` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `no` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`


### GET /api/v1/employeedependents/{id}
- :warning: response property `Employee Dependents/items/addressLine1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/addressLine2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isStudent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isUsCitizen` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSIN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSSN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/zipCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  removed the `no` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `no` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`


### PUT /api/v1/employeedependents/{id}
- :warning: response property `Employee Dependents/items/addressLine1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/addressLine2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isStudent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/isUsCitizen` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSIN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/maskedSSN` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `Employee Dependents/items/zipCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  removed the `no` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `no` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isStudent` response property for the response status `200`
-  removed the `yes` enum value from the `Employee Dependents/items/isUsCitizen` response property for the response status `200`


### GET /api/v1/employees
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/firstName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/jobTitleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/lastName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/photoUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/preferredName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[#/components/schemas/GetEmployeesEmployeeBaseResponse]/status` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/bestEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/birthDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`

_…changelog truncated to fit GitHub's PR body size limit. Full changelog available as `.sdk-update/analysis/changelog.md` in the workflow run: https://github.com/BambooHR/bhr-api-php/actions/runs/26786891938_
</details>

<details>
<summary><strong>Changes since last review</strong></summary>

```diff
.openapi-generator/FILES                           |  32 +-
 .sdk-update/analysis/breaking-output.txt           |   2 +-
 .sdk-update/analysis/changelog.json                |   2 +-
 .sdk-update/analysis/changelog.md                  |   6 +-
 .sdk-update/metadata.json                          |   5 -
 .sdk-update/pr-body.md                             | 643 ---------------------
 .sdk-update/since-last-review.txt                  |   8 -
 Makefile                                           |   3 +-
 README.md                                          |  16 +-
 docs/Api/CompensationPlanningApi.md                |  16 +-
 docs/Api/OnboardingApi.md                          |   4 +-
 ...=> _1d1fc0f164cb51973a0206b8e2fb2d2dRequest.md} |   4 +-
 ...3a0206b8e2fb2d2dRequestBudgetBreakdownInner.md} |   2 +-
 ...d64402ee192568adbd5e3179a91e6e2RequestInner.md} |   4 +-
 ...d5e3179a91e6e2RequestInnerBudgetAllocations.md} |   2 +-
 ...=> _288aa996aba16d7a495c62321ea999a9Request.md} |   4 +-
 ...aba16d7a495c62321ea999a9RequestSentDateTime.md} |   2 +-
 ...=> _3958585c861325ea7a2cd30a8c74f042Request.md} |   2 +-
 ...=> _89a5068111ec499135c7d6e9a53d5a30Request.md} |   2 +-
 lib/Api/CompensationPlanningApi.php                |  30 +-
 lib/Api/OnboardingApi.php                          |  10 +-
 ...> _1d1fc0f164cb51973a0206b8e2fb2d2dRequest.php} |   6 +-
 ...a0206b8e2fb2d2dRequestBudgetBreakdownInner.php} |   6 +-
 ...64402ee192568adbd5e3179a91e6e2RequestInner.php} |   6 +-
 ...5e3179a91e6e2RequestInnerBudgetAllocations.php} |   6 +-
 ...> _288aa996aba16d7a495c62321ea999a9Request.php} |   6 +-
 ...ba16d7a495c62321ea999a9RequestSentDateTime.php} |   6 +-
 ...> _3958585c861325ea7a2cd30a8c74f042Request.php} |   6 +-
 ...> _89a5068111ec499135c7d6e9a53d5a30Request.php} |   6 +-
 scripts/fix_invalid_class_names.php                | 269 +++++++++
 specs/spec-source.json                             |   4 +-
 31 files changed, 367 insertions(+), 753 deletions(-)
```
</details>

---
_This PR was opened automatically by the `sdk-update` workflow._
_Trigger: `workflow_dispatch`._
