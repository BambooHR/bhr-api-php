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
- :warning: response property `data/items/allOf[subschema #2]/departmentId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/departmentName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/divisionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/divisionName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/employmentStatusId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/employmentStatusName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/facebookUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/hireDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/homeEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/instagramUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/jobTitleId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/linkedinUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/locationId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/locationName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/mobilePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/pinterestUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/reportsToId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/reportsToName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/skypeUsername` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/twitterUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/workEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/workPhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `data/items/allOf[subschema #2]/workPhoneExtension` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `meta/page/limit` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `meta/page/nextCursor` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `meta/page/prevCursor` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: for the `query` request parameter `page`, the type/format of property `allOf[subschema #2]/after` was changed from `integer`/`` to `string`/``
- :warning: for the `query` request parameter `page`, the type/format of property `allOf[subschema #2]/before` was changed from `integer`/`` to `string`/``
-  the endpoint scheme security `basic` was added to the API
-  added the enum value `addressLine1` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `addressLine2` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `age` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `allergies` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `birthplace` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `citizenship` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `citizenshipId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `city` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `compensationChangeReason` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `compensationChangeReasonId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `compensationComment` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `compensationEffectiveDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `compensationEndDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `contractEndDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `country` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `countryId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `dietaryRestrictions` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `displayName` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `eeoJobCategory` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `eeoJobCategoryId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `ein` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `eligibleForRehire` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `eligibleForRehireId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employeeName` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employeeNumber` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employmentStatusComment` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employmentStatusEffectiveDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employmentType` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `employmentTypeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `ethnicity` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `ethnicityId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `finalDoseAdministrationDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `finalPayDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `firstNameLastName` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `firstNameMiddleInitial` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `flsaCode` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `flsaCodeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `gender` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `genderIdentity` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `genderIdentityId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `hoursPerPayCycle` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `isManager` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `jacketSize` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `jacketSizeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `jobInformationEffectiveDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `maritalStatus` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `middleInitial` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nationalId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nationalInsuranceCategory` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nationalInsuranceCategoryId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nationality` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nationalityId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nickName` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `nin` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `noticePeriod` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `noticePeriodId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `originalHireDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `overtime` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `overtimeRate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `paidPer` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `payRate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `paySchedule` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `payScheduleId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `payType` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `preferredNameLastName` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `probationEndDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `pronouns` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `pronounsId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `proofOfVaccination` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `secondaryLanguage` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `shirtSize` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `shirtSizeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `sin` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `ssn` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `state` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `stateId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `tShirtSize` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `tShirtSizeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `taxTypeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `teams` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `tenure` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationDate` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationReason` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationReasonId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationRegrettable` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationRegrettableId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationType` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `terminationTypeId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `userId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `vaccinationStatus` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `vaccinationStatusId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `vaccineReceived` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `vaccineReceivedId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `veteranStatus` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `veteranStatusId` to the property `items/` of the `query` request parameter `fields`
-  added the enum value `zipcode` to the property `items/` of the `query` request parameter `fields`
-  added the optional property `data/items/allOf[subschema #2]/addressLine1` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/addressLine2` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/age` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/allergies` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/birthplace` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/citizenship` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/citizenshipId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/city` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/compensationChangeReason` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/compensationChangeReasonId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/compensationComment` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/compensationEffectiveDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/compensationEndDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/contractEndDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/country` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/countryId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/dietaryRestrictions` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/displayName` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/eeoJobCategory` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/eeoJobCategoryId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/ein` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/eligibleForRehire` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/eligibleForRehireId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employeeName` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employeeNumber` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employmentStatusComment` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employmentStatusEffectiveDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employmentType` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/employmentTypeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/ethnicity` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/ethnicityId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/finalDoseAdministrationDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/finalPayDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/firstNameLastName` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/firstNameMiddleInitial` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/flsaCode` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/flsaCodeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/gender` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/genderIdentity` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/genderIdentityId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/hoursPerPayCycle` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/isManager` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/jacketSize` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/jacketSizeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/jobInformationEffectiveDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/maritalStatus` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/middleInitial` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nationalId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nationalInsuranceCategory` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nationalInsuranceCategoryId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nationality` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nationalityId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nickName` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/nin` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/noticePeriod` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/noticePeriodId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/originalHireDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/overtime` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/overtimeRate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/paidPer` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/payRate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/paySchedule` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/payScheduleId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/payType` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/preferredNameLastName` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/probationEndDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/pronouns` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/pronounsId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/proofOfVaccination` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/secondaryLanguage` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/shirtSize` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/shirtSizeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/sin` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/ssn` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/state` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/stateId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/tShirtSize` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/tShirtSizeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/taxTypeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/teams` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/tenure` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationDate` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationReason` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationReasonId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationRegrettable` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationRegrettableId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationType` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/terminationTypeId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/userId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/vaccinationStatus` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/vaccinationStatusId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/vaccineReceived` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/vaccineReceivedId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/veteranStatus` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/veteranStatusId` to the response with the `200` status
-  added the optional property `data/items/allOf[subschema #2]/zipcode` to the response with the `200` status


### POST /api/v1/employees
-  added the media type `application/json` for the response with the status `201`


### GET /api/v1/employees/directory
-  added the non-success response with the status `401`


### GET /api/v1/employees/{employeeId}/onboarding-experiences
-  endpoint added


### POST /api/v1/employees/{employeeId}/onboarding-experiences
-  endpoint added


### GET /api/v1/employees/{employeeId}/onboarding-experiences/{onboardingExperienceId}
-  endpoint added


### POST /api/v1/employees/{employeeId}/photo
-  added the media type `application/json` to the request body
-  added the non-success response with the status `402`


### GET /api/v1/employees/{employeeId}/photo/{size}
- :warning: removed the media type `image/jpeg` for the response with the status `200`
-  added the media type `application/json` for the response with the status `200`
-  added the media type `image/*` for the response with the status `200`


### PUT /api/v1/employees/{employeeId}/time_off/policies
- :warning: the request property `items/accrualStartDate` became not nullable
-  request property `items/accrualStartDate` list-of-types was widened by adding types `null` to media type `application/json`


### DELETE /api/v1/employees/{id}
-  endpoint added


### GET /api/v1/employees/{id}
- :warning: for the `query` request parameter `fields`, default value `firstName,lastName` was removed
- :warning: response property `address1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address1` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `bestEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `bestEmail` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `birthDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `birthDate` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `canUploadPhoto` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `canUploadPhoto` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `city` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `country` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `country` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `department` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `department` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `departmentId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `departmentId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `division` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `division` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `divisionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `divisionId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `employmentStatus` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employmentStatus` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `employmentStatusId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `employmentStatusId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `exempt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `exempt` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `facebookUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `facebookUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `firstName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `firstName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `gender` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `gender` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `hireDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `hireDate` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `homeEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `homeEmail` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `homePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `homePhone` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `instagramUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `instagramUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `jobTitleId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobTitleId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `jobTitleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobTitleName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `lastName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `lastName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `linkedinUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `linkedinUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `location` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `location` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `locationId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `locationId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `marital` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `marital` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `middleName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `middleName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `mobilePhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `mobilePhone` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `originalHireDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `originalHireDate` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `payPeriod` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `payPeriod` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `payRate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `payRate` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `payType` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `payType` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `photoUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `photoUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `pinterestUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pinterestUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `preferredName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `preferredName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `reportsToId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `reportsToId` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `reportsToName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `reportsToName` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `skypeUsername` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `skypeUsername` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `state` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `state` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `status` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `status` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `terminationDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `terminationDate` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `twitterUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `twitterUrl` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `workEmail` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `workEmail` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `workPhone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `workPhone` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
- :warning: response property `workPhoneExtension` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `workPhoneExtension` list-of-types was widened by adding types `null` to media type `application/xml` of response `200`
-  added the non-success response with the status `401`
-  removed the `Active` enum value from the `status` response property for the response status `200` (media type: application/xml)
-  removed the `Active` enum value from the `status` response property for the response status `200` (media type: application/json)
-  removed the `Inactive` enum value from the `status` response property for the response status `200` (media type: application/xml)
-  removed the `Inactive` enum value from the `status` response property for the response status `200` (media type: application/json)


### POST /api/v1/employees/{id}
-  added the new optional request property `address2` (media type: text/xml)
-  added the new optional request property `address2` (media type: application/xml)
-  added the new optional request property `address2` (media type: application/json)
-  added the media type `application/json` for the response with the status `200`


### GET /api/v1/hris/org/locations
- :warning: response property `allOf[#/components/schemas/PagedResponse]/_links` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/address1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/address2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/countryId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/stateId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/address/zipcode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/archivedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/createdAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/hris/org/locations
- :warning: the request property `address/address1` became not nullable
- :warning: the request property `address/address2` became not nullable
- :warning: the request property `address/city` became not nullable
- :warning: the request property `address/countryId` became not nullable
- :warning: the request property `address/stateId` became not nullable
- :warning: the request property `address/timezone` became not nullable
- :warning: the request property `address/zipcode` became not nullable
- :warning: response property `address/address1` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/address2` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/countryId` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/stateId` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `address/zipcode` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `archivedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `createdAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
-  request property `address/address1` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/address2` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/city` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/countryId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/stateId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/timezone` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/zipcode` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/hris/org/locations/{id}
- :warning: response property `address/address1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/address2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/countryId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/stateId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/zipcode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `archivedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `createdAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/hris/org/locations/{id}
- :warning: the request property `address/address1` became not nullable
- :warning: the request property `address/address2` became not nullable
- :warning: the request property `address/city` became not nullable
- :warning: the request property `address/countryId` became not nullable
- :warning: the request property `address/stateId` became not nullable
- :warning: the request property `address/timezone` became not nullable
- :warning: the request property `address/zipcode` became not nullable
- :warning: response property `address/address1` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/address2` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/city` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/countryId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/stateId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `address/zipcode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `archivedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `createdAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `address/address1` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/address2` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/city` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/countryId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/stateId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/timezone` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `address/zipcode` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/login
- :warning: response property `employeeId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/meta/bank-holidays
-  endpoint added


### GET /api/v1/meta/company
-  endpoint added


### GET /api/v1/meta/countries/options
- :warning: added `#/components/schemas/CountriesResponseSchema, #/components/schemas/CountrySchema` to the response body `oneOf` list for the response status `200`
- :warning: the response's body type/format changed from `array`/`` to ``/`` for status `200`
-  added the new optional `query` request parameter `isoCode`
-  added the non-success response with the status `404`
-  added the non-success response with the status `422`


### GET /api/v1/meta/countries/{id}
-  endpoint added


### GET /api/v1/meta/currency-conversions
-  endpoint added


### GET /api/v1/meta/currency/types
-  endpoint added


### GET /api/v1/meta/industries
-  endpoint added


### GET /api/v1/meta/lists
- :warning: response property `items/alias` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/options/items/archivedDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/options/items/createdDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: the `items/fieldId` response's property type/format changed from `string`/`` to `integer`/`` for status `200` (media type: application/json)
- :warning: added the new `no` enum value to the `items/manageable` response property for the response status `200` (media type: application/json)
- :warning: added the new `no` enum value to the `items/multiple` response property for the response status `200` (media type: application/json)
- :warning: added the new `no` enum value to the `items/options/items/archived` response property for the response status `200` (media type: application/json)
- :warning: added the new `yes` enum value to the `items/manageable` response property for the response status `200` (media type: application/json)
- :warning: added the new `yes` enum value to the `items/multiple` response property for the response status `200` (media type: application/json)
- :warning: added the new `yes` enum value to the `items/options/items/archived` response property for the response status `200` (media type: application/json)
-  added the optional property `items/id` to the response with the `200` status (media type: application/json)
-  added the optional property `items/options/items/frequency` to the response with the `200` status (media type: application/json)
-  added the optional property `items/options/items/manageable` to the response with the `200` status (media type: application/json)


### PUT /api/v1/meta/lists/{listFieldId}
- :warning: the request's body type/format changed from `string`/`` to `object`/`` (media type: text/xml)
- :warning: response property `alias` list-of-types was widened by adding types `null` to media type `text/xml` of response `200`
- :warning: response property `options/items/archivedDate` list-of-types was widened by adding types `null` to media type `text/xml` of response `200`
- :warning: response property `options/items/createdDate` list-of-types was widened by adding types `null` to media type `text/xml` of response `200`
- :warning: added the new `no` enum value to the `manageable` response property for the response status `200`
- :warning: added the new `no` enum value to the `multiple` response property for the response status `200`
- :warning: added the new `no` enum value to the `options/items/archived` response property for the response status `200`
- :warning: added the new `yes` enum value to the `manageable` response property for the response status `200`
- :warning: added the new `yes` enum value to the `multiple` response property for the response status `200`
- :warning: added the new `yes` enum value to the `options/items/archived` response property for the response status `200`
-  added the new optional `query` request parameter `format`
-  added the new optional request property `option` (media type: text/xml)
-  added the media type `application/json` for the response with the status `200`
-  added the non-success response with the status `405`
-  added the optional property `id` to the response with the `200` status
-  added the optional property `options/items/frequency` to the response with the `200` status
-  added the optional property `options/items/manageable` to the response with the `200` status


### GET /api/v1/meta/provinces
-  endpoint added


### GET /api/v1/meta/time_off/policies
- :warning: response property `items/effectiveDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/meta/time_off/types
- :warning: response property `timeOffTypes/items/color` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `timeOffTypes/items/icon` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/meta/timezones
- :warning: response property `allOf[#/components/schemas/PagedResponse]/_links` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/meta/timezones/by-zip/{zip}
-  endpoint added


### GET /api/v1/meta/timezones/{id}
-  endpoint added


### GET /api/v1/new-hire-packets
-  endpoint added


### POST /api/v1/new-hire-packets
-  endpoint added


### DELETE /api/v1/new-hire-packets/{id}
-  endpoint added


### GET /api/v1/new-hire-packets/{id}
-  endpoint added


### PUT /api/v1/new-hire-packets/{id}
-  endpoint added


### POST /api/v1/new-hire-packets/{id}/cancel
-  endpoint added


### PUT /api/v1/new-hire-packets/{id}/question-visibility
-  endpoint added


### POST /api/v1/new-hire-packets/{id}/send
-  endpoint added


### GET /api/v1/onboarding/new-hire-widget
-  endpoint added


### GET /api/v1/pay-grades-and-bands
- :warning: response property `groups/items/groupName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/pay-grades-and-bands/import
-  endpoint added


### GET /api/v1/pay-grades-and-bands/job-titles
- :warning: response property `groups/items/groupName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/pay-grades-and-bands/job-titles
-  endpoint added


### GET /api/v1/pay-grades-and-bands/job-titles-with-employees
- :warning: response property `items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/pay-grades-and-bands/levels
- :warning: response property `groups/items/groupName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/pay-grades-and-bands/levels
-  endpoint added


### DELETE /api/v1/pay-grades-and-bands/levels/{segment}
-  endpoint added


### GET /api/v1/pay-grades-and-bands/pay-bands
- :warning: response property `groups/items/groupName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/pay-grades-and-bands/pay-bands
-  endpoint added


### POST /api/v1/pay-grades-and-bands/publish
-  endpoint added


### GET /api/v1/pay-grades-and-bands/review
- :warning: response property `groups/items/groupName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/id` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/levelName` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/currencyCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `groups/items/levels/items/payBand/levelId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/performance/employees/{employeeId}/goals
- :warning: response property `goals/items/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goals/items/actions` response property `oneOf` list for the response status `200`
- :warning: the `goals/items/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/performance/employees/{employeeId}/goals
- :warning: the request property `alignsWithOptionId` became not nullable
- :warning: the request property `completionDate` became not nullable
- :warning: the request property `milestones` became not nullable
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `201`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `201`
-  request property `alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `completionDate` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/performance/employees/{employeeId}/goals/aggregate
- :warning: response property `goals/items/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goals/items/actions` response property `oneOf` list for the response status `200`
- :warning: the `goals/items/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### GET /api/v1/performance/employees/{employeeId}/goals/shareOptions
- :warning: response property `persons/items/employeeId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `persons/items/userId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/performance/employees/{employeeId}/goals/{goalId}
- :warning: the request property `alignsWithOptionId` became not nullable
- :warning: the request property `completionDate` became not nullable
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  request property `alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `completionDate` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/performance/employees/{employeeId}/goals/{goalId}/aggregate
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/performance/employees/{employeeId}/goals/{goalId}/close
- :warning: the request property `comment` became not nullable
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `201`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `201`
-  request property `comment` list-of-types was widened by adding types `null` to media type `application/json`


### PUT /api/v1/performance/employees/{employeeId}/goals/{goalId}/milestones/{milestoneId}/progress
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### PUT /api/v1/performance/employees/{employeeId}/goals/{goalId}/progress
- :warning: the request property `completionDate` became not nullable
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  request property `completionDate` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/performance/employees/{employeeId}/goals/{goalId}/reopen
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `201`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `201`


### PUT /api/v1/performance/employees/{employeeId}/goals/{goalId}/sharedWith
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### GET /api/v1/scheduling/schedules
-  endpoint added


### POST /api/v1/scheduling/schedules
-  endpoint added


### DELETE /api/v1/scheduling/schedules/{id}
-  endpoint added


### GET /api/v1/scheduling/schedules/{id}
-  endpoint added


### PATCH /api/v1/scheduling/schedules/{id}
-  endpoint added


### GET /api/v1/scheduling/schedules/{id}/pdf
-  endpoint added


### GET /api/v1/scheduling/shifts
-  endpoint added


### POST /api/v1/scheduling/shifts
-  endpoint added


### POST /api/v1/scheduling/shifts/publish
-  endpoint added


### DELETE /api/v1/scheduling/shifts/{id}
-  endpoint added


### GET /api/v1/scheduling/shifts/{id}
-  endpoint added


### PATCH /api/v1/scheduling/shifts/{id}
-  endpoint added


### GET /api/v1/scheduling/timezones
-  endpoint added


### GET /api/v1/time-tracking/break-assessments
- :warning: response property `allOf[subschema #2]/data/items/availableYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/durationDifference` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/expectedDuration` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/recordedDuration` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/unavailableYmdt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/violations/items/amount` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/violations/items/employeeTimesheetClockEntryId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response property `oneOf` list for the response status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### GET /api/v1/time-tracking/break-policies
- :warning: response property `allOf[subschema #2]/data/items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response property `oneOf` list for the response status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/time-tracking/break-policies
- :warning: the request property `breaks/items/availabilityEndTime` became not nullable
- :warning: the request property `breaks/items/availabilityMaxHoursWorked` became not nullable
- :warning: the request property `breaks/items/availabilityMinHoursWorked` became not nullable
- :warning: the request property `breaks/items/availabilityStartTime` became not nullable
- :warning: the request property `breaks/items/id` became not nullable
- :warning: the request property `description` became not nullable
- :warning: response property `breaks/items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `breaks/items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `breaks/items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `breaks/items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `breaks/items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `breaks/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
-  request property `breaks/items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/id` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `description` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/time-tracking/break-policies/suggestions
-  endpoint added


### GET /api/v1/time-tracking/break-policies/{id}
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PATCH /api/v1/time-tracking/break-policies/{id}
- :warning: the request property `description` became not nullable
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `description` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/time-tracking/break-policies/{id}/breaks
- :warning: response property `allOf[subschema #2]/data/items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response property `oneOf` list for the response status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/time-tracking/break-policies/{id}/breaks
- :warning: the request property `availabilityEndTime` became not nullable
- :warning: the request property `availabilityMaxHoursWorked` became not nullable
- :warning: the request property `availabilityMinHoursWorked` became not nullable
- :warning: the request property `availabilityStartTime` became not nullable
- :warning: response property `availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
-  request property `availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json`


### PUT /api/v1/time-tracking/break-policies/{id}/breaks
- :warning: the request property `items/availabilityEndTime` became not nullable
- :warning: the request property `items/availabilityMaxHoursWorked` became not nullable
- :warning: the request property `items/availabilityMinHoursWorked` became not nullable
- :warning: the request property `items/availabilityStartTime` became not nullable
- :warning: the request property `items/id` became not nullable
- :warning: response property `items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `items/id` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/time-tracking/break-policies/{id}/employees
- :warning: response property `allOf[subschema #2]/data/items/name` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/photoUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response property `oneOf` list for the response status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### PUT /api/v1/time-tracking/break-policies/{id}/sync
- :warning: the request property `breaks/items/availabilityEndTime` became not nullable
- :warning: the request property `breaks/items/availabilityMaxHoursWorked` became not nullable
- :warning: the request property `breaks/items/availabilityMinHoursWorked` became not nullable
- :warning: the request property `breaks/items/availabilityStartTime` became not nullable
- :warning: the request property `breaks/items/id` became not nullable
- :warning: the request property `description` became not nullable
- :warning: response property `breaks/items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `breaks/items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `breaks/items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `breaks/items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `breaks/items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `breaks/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `breaks/items/availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `breaks/items/id` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `description` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/time-tracking/breaks/{id}
- :warning: response property `availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PATCH /api/v1/time-tracking/breaks/{id}
- :warning: the request property `availabilityEndTime` became not nullable
- :warning: the request property `availabilityMaxHoursWorked` became not nullable
- :warning: the request property `availabilityMinHoursWorked` became not nullable
- :warning: the request property `availabilityStartTime` became not nullable
- :warning: response property `availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `availabilityEndTime` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityMaxHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityMinHoursWorked` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `availabilityStartTime` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1/time-tracking/employees/{id}/break-availabilities
- :warning: response property `items/availableAfterMinutesWorked` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/availableAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/availableIn` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/unavailableAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/unavailableIn` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/time-tracking/employees/{id}/break-policies
- :warning: response property `allOf[subschema #2]/data/items/deletedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `allOf[subschema #2]/data/items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response property `oneOf` list for the response status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/next` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `allOf[#/components/schemas/TimeTracking-OffsetPaginatedResponseData-V1]/_links/prev` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### GET /api/v1/time-tracking/projects
-  added the new optional `query` request parameter `filter`
-  added the new optional `query` request parameter `page`
-  added the new optional `query` request parameter `pageSize`
-  added the new optional `query` request parameter `sort`
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `200`


### POST /api/v1/time-tracking/projects
- :warning: added required request body
-  added the non-success response with the status `400`
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `409`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `201`


### DELETE /api/v1/time-tracking/projects/{id}
- :warning: for the `path` request parameter `id`, the type/format was changed from `string`/`` to `integer`/``
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `204`


### GET /api/v1/time-tracking/projects/{id}
- :warning: api removed without deprecation


### PATCH /api/v1/time-tracking/projects/{id}
- :warning: added required request body
- :warning: for the `path` request parameter `id`, the type/format was changed from `string`/`` to `integer`/``
-  added the non-success response with the status `400`
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `409`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `200`


### GET /api/v1/time-tracking/projects/{projectId}/tasks
- :warning: for the `path` request parameter `projectId`, the type/format was changed from `string`/`` to `integer`/``
-  added the new optional `query` request parameter `page`
-  added the new optional `query` request parameter `pageSize`
-  added the new optional `query` request parameter `statuses[]`
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `200`


### POST /api/v1/time-tracking/projects/{projectId}/tasks
- :warning: added required request body
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `409`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `201`


### DELETE /api/v1/time-tracking/tasks/{id}
- :warning: for the `path` request parameter `id`, the type/format was changed from `string`/`` to `integer`/``
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `204`


### GET /api/v1/time-tracking/tasks/{id}
- :warning: for the `path` request parameter `id`, the type/format was changed from `string`/`` to `integer`/``
-  added the non-success response with the status `401`
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `200`


### PATCH /api/v1/time-tracking/tasks/{id}
- :warning: added required request body
- :warning: for the `path` request parameter `id`, the type/format was changed from `string`/`` to `integer`/``
-  added the non-success response with the status `403`
-  added the non-success response with the status `404`
-  added the non-success response with the status `409`
-  added the non-success response with the status `422`
-  removed the non-success response with the status `501`
-  added the success response with the status `200`


### PUT /api/v1/time_off/requests/{requestId}/status
- :warning: removed the media type `application/json` for the response with the status `200`


### POST /api/v1/time_tracking/clock_entries/store
- :warning: the request property `entries/items/breakId` became not nullable
- :warning: response property `items/end` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/hours` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/note` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/start` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: added `subschema #1, subschema #2` to the `items/breakInfo` response property `oneOf` list for the response status `201`
- :warning: added `subschema #1, subschema #2` to the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response property `oneOf` list for the response status `201`
- :warning: the `items/breakInfo` response's property type/format changed from `object, null`/`` to ``/`` for status `201`
- :warning: the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response's property type/format changed from `object, null`/`` to ``/`` for status `201`
-  request property `entries/items/breakId` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/time_tracking/employees/{employeeId}/clock_in
- :warning: the request property `breakId` became not nullable
- :warning: the request property `date` became not nullable
- :warning: the request property `note` became not nullable
- :warning: the request property `projectId` became not nullable
- :warning: the request property `start` became not nullable
- :warning: the request property `taskId` became not nullable
- :warning: the request property `timezone` became not nullable
- :warning: response property `end` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `hours` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `note` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `start` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `breakInfo` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response property `oneOf` list for the response status `200`
- :warning: the `breakInfo` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  request property `breakId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `date` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `note` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `projectId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `start` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `taskId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `timezone` list-of-types was widened by adding types `null` to media type `application/json`
-  removed the pattern `^([01]?[0-9]|2[0-3]):[0-5][0-9]$` from the request property `start`


### POST /api/v1/time_tracking/employees/{employeeId}/clock_out
- :warning: response property `end` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `hours` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `note` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `start` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `breakInfo` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response property `oneOf` list for the response status `200`
- :warning: the `breakInfo` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v1/time_tracking/hour_entries/store
- :warning: response property `items/end` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/hours` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/note` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/start` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `items/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: added `subschema #1, subschema #2` to the `items/breakInfo` response property `oneOf` list for the response status `201`
- :warning: added `subschema #1, subschema #2` to the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response property `oneOf` list for the response status `201`
- :warning: the `items/breakInfo` response's property type/format changed from `object, null`/`` to ``/`` for status `201`
- :warning: the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response's property type/format changed from `object, null`/`` to ``/`` for status `201`


### GET /api/v1/time_tracking/timesheet_entries
- :warning: response property `items/approvedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/end` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/hours` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/note` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/start` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/timezone` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `items/updatedAt` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response property `oneOf` list for the response status `200`
- :warning: the `items/projectInfo/oneOf[#/components/schemas/ProjectInfoApiTransformer]/task` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### PUT /api/v1/timetracking/adjust
- :warning: the request property `holidayId` became not nullable
- :warning: the request property `projectId` became not nullable
- :warning: the request property `shiftDifferentialId` became not nullable
- :warning: the request property `taskId` became not nullable
-  request property `holidayId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `projectId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `shiftDifferentialId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `taskId` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1/timetracking/record
- :warning: response property `response/message` list-of-types was widened by adding types `null` to media type `application/json` of response `201`


### GET /api/v1/timetracking/record/{id}
- :warning: response property `departmentId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `divisionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `holidayId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobData` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `jobTitleId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `payCode` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `projectId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `shiftDifferentialId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `taskId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `project` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `project/task` response property `oneOf` list for the response status `200`
- :warning: added `subschema #1, subschema #2` to the `shiftDifferential` response property `oneOf` list for the response status `200`
- :warning: the `project` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `project/task` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
- :warning: the `shiftDifferential` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### GET /api/v1/training/record/employee/{employeeId}
- :warning: response property `oneOf[subschema #1]/additionalProperties/cost` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `oneOf[subschema #1]/additionalProperties/credits` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `oneOf[subschema #1]/additionalProperties/hours` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `oneOf[subschema #1]/additionalProperties/instructor` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `oneOf[subschema #1]/additionalProperties/notes` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/training/record/employee/{employeeId}
- :warning: response property `cost` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `credits` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `hours` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `instructor` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `notes` list-of-types was widened by adding types `null` to media type `application/json` of response `201`


### PUT /api/v1/training/record/{employeeTrainingRecordId}
- :warning: response property `cost` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `credits` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `hours` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `instructor` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `notes` list-of-types was widened by adding types `null` to media type `application/json` of response `201`


### GET /api/v1/training/type
- :warning: response property `additionalProperties/description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `additionalProperties/linkUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `additionalProperties/required` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/training/type
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `linkUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `201`
- :warning: response property `required` list-of-types was widened by adding types `null` to media type `application/json` of response `201`


### PUT /api/v1/training/type/{trainingTypeId}
- :warning: response property `description` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `linkUrl` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `required` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/webhooks
- :warning: response property `webhooks/items/lastSent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### POST /api/v1/webhooks
- :warning: response property `lastSent` list-of-types was widened by adding types `null` to media type `application/json` of response `201`


### GET /api/v1/webhooks/monitor_fields
- :warning: response property `fields/items/alias` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/webhooks/post-fields
- :warning: response property `fields/items/alias` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `fields/items/tableId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `fields/items/type` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1/webhooks/{id}
- :warning: response property `lastSent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1/webhooks/{id}
- :warning: response property `lastSent` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1_1/employees/{employeeId}/time_off/policies
- :warning: response property `items/accrualStartDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### PUT /api/v1_1/employees/{employeeId}/time_off/policies
- :warning: the request property `items/accrualStartDate` became not nullable
- :warning: response property `items/accrualStartDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `items/accrualStartDate` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1_1/performance/employees/{employeeId}/goals/aggregate
- :warning: response property `goals/items/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goals/items/actions` response property `oneOf` list for the response status `200`
- :warning: the `goals/items/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### PUT /api/v1_1/performance/employees/{employeeId}/goals/{goalId}
- :warning: the request property `alignsWithOptionId` became not nullable
- :warning: the request property `completionDate` became not nullable
- :warning: response property `goal/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goal/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goal/actions` response property `oneOf` list for the response status `200`
- :warning: the `goal/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`
-  request property `alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `completionDate` list-of-types was widened by adding types `null` to media type `application/json`


### POST /api/v1_2/datasets/{datasetName}/field-options
- :warning: the request property `dependentFields` became not nullable
- :warning: the request property `filters` became not nullable
-  request property `dependentFields` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `filters` list-of-types was widened by adding types `null` to media type `application/json`


### GET /api/v1_2/datasets/{datasetName}/fields
- :warning: response property `pagination/next_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `pagination/prev_page` list-of-types was widened by adding types `null` to media type `application/json` of response `200`


### GET /api/v1_2/performance/employees/{employeeId}/goals/aggregate
- :warning: response property `goals/items/alignsWithOptionId` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/completionDate` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/lastChangedDateTime` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `goals/items/milestones` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: added `subschema #1, subschema #2` to the `goals/items/actions` response property `oneOf` list for the response status `200`
- :warning: the `goals/items/actions` response's property type/format changed from `object, null`/`` to ``/`` for status `200`


### POST /api/v2/datasets/{datasetName}/data
- :warning: the request property `filter` became not nullable
- :warning: the request property `orderBy` became not nullable
- :warning: response property `data/items/fields/additionalProperties/` list-of-types was widened by adding types `number, boolean, array, object and null` to media type `application/json` of response `200`
- :warning: response property `links/next` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
- :warning: response property `links/prev` list-of-types was widened by adding types `null` to media type `application/json` of response `200`
-  request property `filter` list-of-types was widened by adding types `null` to media type `application/json`
-  request property `orderBy` list-of-types was widened by adding types `null` to media type `application/json`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `400`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `403`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `404`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `413`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `422`
-  media type `application/json` was changed to a more specific media type `application/problem+json` for the response status `500`






