# CLAUDE.md

# Project Overview
- Project name: BambooHR PHP SDK
- What it does: Official PHP SDK providing a type-safe, fluent interface to the BambooHR REST API with auto-generated client classes, fluent builder pattern, automatic token refresh, and retry logic
- Primary language: PHP 8.1+

# Tech Stack
- Framework: Client SDK (no web framework); fluent builder pattern wrapping auto-generated OpenAPI client
- HTTP client: Guzzle (PSR-18 compatible)
- Testing: PHPUnit
- Linting: PHP CodeSniffer (`phpcs.xml`); Static analysis: PHPStan (`phpstan.neon`)
- Code generation: OpenAPI Generator with custom Mustache templates in `templates-php/` (these templates inject retry logic, request ID tracking, OAuth middleware, etc. into the generated output)

# File Structure
- Hand-written source: `lib/Client/` (auth, builder, middleware, logging, token management)
- Auto-generated APIs: `lib/Api/` — do NOT edit directly
- Auto-generated models: `lib/Model/` — do NOT edit directly
- Shared helpers: `lib/ApiErrorHelper.php`, `lib/ApiHelper.php`, `lib/ApiException.php`, `lib/Exceptions/`
- Tests: `test/` (auto-generated stubs — mostly ignored); hand-written tests alongside `lib/` if needed
- Examples: `examples/` — progressive usage examples
- Scripts: `scripts/` — post-generation scripts (`cleanup_obsolete_files.sh`, `update_error_docs.sh`, `classify_semver.sh`, etc.)
- Config: `composer.json`, `phpcs.xml`, `phpstan.neon`, `phpunit.xml.dist`

# Development Commands
```bash
make generate              # Generate SDK from OpenAPI spec (override with OPENAPI_SPEC_PATH=...)
make clean                 # Remove generated files
make cleanup-obsolete      # Remove files in old manifest no longer in new manifest
make generate-error-docs   # Regenerate exception classes and error catalog
make test                  # Run PHPUnit + classify_semver.sh bash tests
make phpcs                 # Run PHP CodeSniffer
make phpstan               # Run PHPStan static analysis
make classify-semver OLD=specs/public.yaml NEW=/tmp/new.yaml           # Classify semver bump
make classify-semver OLD=specs/public.yaml NEW=/tmp/new.yaml APPLY=true  # Classify + bump version
```

# SDK Generation Pipeline

The SDK is auto-generated from `specs/public.yaml` using OpenAPI Generator. `make generate` runs the generator then executes a series of post-generation shell scripts for cleanup, error doc generation, and obsolete file removal.

**Semver classification** (`scripts/classify_semver.sh`) — compares two OpenAPI specs using `oasdiff` and outputs a bump level (`major` / `minor` / `patch` / `none`). Used in the automated release pipeline (epic SPN-2923).

```bash
# Dependencies: brew install oasdiff jq
bash scripts/classify_semver.sh OLD_SPEC NEW_SPEC           # classify only
bash scripts/classify_semver.sh --apply OLD_SPEC NEW_SPEC   # classify + bump composer.json
```

Classification rules (highest wins):
- `oasdiff breaking --fail-on ERR` exits 1 → **major**
- changelog level 3 (ERR) → **major** (safety net)
- changelog level 2 (WARN) → **minor**
- changelog level 1 (INFO) additive/unknown → **minor**; deprecations only → **patch**
- `--apply` bumps `composer.json` for all levels including major

`scripts/oasdiff-severity-levels.txt` suppresses scope-change noise (~34 false-positive entries on every diff). Do NOT add `#` comments to this file — oasdiff will reject it. See `scripts/README.md` for full research notes.

# Conventions
- PascalCase for classes; camelCase for methods/properties; `UPPER_SNAKE_CASE` for constants
- Namespace root: `BhrSdk`; hand-written client code lives under `BhrSdk\Client`
- All hand-written code should pass PHPStan level 8 (`phpstan.neon`); auto-generated code is excluded
- All public methods require type declarations; use `?Type` nullable syntax where appropriate
- Exception variables: use descriptive names (e.g., `$authFailedException`), never `$e`

# Constraints
- Most files in `lib/Api/` and `lib/Model/` are **auto-generated** — edits are lost on `make generate`
- To preserve a file across regeneration, add it to `.openapi-generator-ignore`
- Only `lib/Api/ManualApi.php` is hand-written inside `lib/Api/`
- Do not add Composer dependencies without discussion; runtime deps are intentionally minimal

# Common Patterns

## Fluent Builder
```php
use BhrSdk\Client\ApiClient;

$client = (new ApiClient())
    ->withApiKey('your-api-key')
    ->forCompany('acme')
    ->withRetries(3)
    ->build();
```

All builder methods:
- `->withApiKey(string $key)` / `->withOAuth(string $token)` / `->withOAuthRefresh(string $token, string $refreshToken, string $clientId, string $clientSecret, ?int $expiresIn)`
- `->forCompany(string $subdomain)`
- `->withRetries(int $retries)` — automatic on 408/429/504 with exponential backoff
- `->onTokenRefresh(callable $callback)` — callback receives new/old token pair
- `->withTimeout(float $seconds)`
- `->withHost(string $url)` — override API base URL
- `->withDebug(bool $debug = true)` — enable debug mode
- `->withLogging(?LoggerInterface $logger, string $logLevel = 'info')` — PSR-3 logger
- `->withHttpClient(ClientInterface $client)` — inject a custom PSR-18 HTTP client

## API Access
`$client->employees()` returns an `EmployeesApi` instance — never instantiate API classes directly.

Available accessors: `employees`, `timeOff`, `benefits`, `reports`, `tabularData`, `photos`, `webhooks`, `goals`, `training`, `timeTracking`, `accountInformation`, `applicantTracking`, `companyFiles`, `employeeFiles`, `ats`, `customReports`, `datasets`, `hours`, `lastChangeInformation`, `login`, `manual`

## Custom / Unsupported Endpoints
Use `$client->manual()` (returns `ManualApi`) to call endpoints not yet in the generated SDK. Inherits all SDK auth, retry, and logging behavior.

## Exception Handling
Catch specific subclasses before broad `ApiException`; extract `requestId` for tracing:
```php
try {
    $result = $client->employees()->getEmployee($employeeId);
} catch (AuthenticationFailedException $authFailedException) {
    // handle 401
} catch (ResourceNotFoundException $notFoundException) {
    // handle 404
} catch (ApiException $apiException) {
    $traceId = $apiException->getRequestId();
}
```

Full hierarchy:
```
ApiException (base)
├── ClientException (4xx)
│   ├── BadRequestException (400)
│   ├── AuthenticationFailedException (401)
│   ├── PermissionDeniedException (403)
│   ├── ResourceNotFoundException (404)
│   ├── MethodNotAllowedException (405)
│   ├── ConflictException (409)
│   ├── PayloadTooLargeException (413)
│   ├── UnsupportedMediaTypeException (415)
│   ├── UnprocessableEntityException (422)
│   └── RateLimitExceededException (429)
└── ServerException (5xx)
    ├── InternalServerErrorException (500)
    ├── NotImplementedException (501)
    ├── BadGatewayException (502)
    ├── ServiceUnavailableException (503)
    └── GatewayTimeoutException (504)
```

## OAuth Token Refresh
Two refresh modes:
- **Proactive**: tokens are refreshed before expiry
- **Reactive**: a 401 response triggers an immediate refresh + single retry

## Request ID Tracking
`RequestIdMiddleware::getLastRequestId()` returns the `x-request-id` header from the most recent response. Also automatically attached to thrown exceptions via `$exception->getRequestId()`. Use for tracing and debugging.
