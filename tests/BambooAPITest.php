<?php
/**
 * BambooAPITest.php
 */

namespace BambooHR\API\Tests;
use BambooHR\API\BambooAPI;
use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTP;
use BambooHR\API\Tests\Injector\BambooHTTPRequestInjectorTest;


/**
 * BambooAPITest
 * @package BambooHR
 * @test
 * @coversDefaultClass \BambooHR\API\BambooAPI
 */
class BambooAPITest extends TestCase {
    use BambooHTTPRequestInjectorTest;

    /**
     * @return BambooAPI
     */
    public function getSubject()
    {
        $companyDomain = 'Company Domain';
        return new BambooAPI($companyDomain);
    }

    /**
     * @test
     * @covers ::__construct
     */
    public function testConstructWithName()
    {
        $companyDomain = 'Company Domain';
        $bambooApi = new BambooAPI($companyDomain);
        $this->assertSame(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'companyDomain')
        );
        $this->assertStringContainsString(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'baseUrl')
        );
        $this->assertInstanceOf(
            BambooCurlHTTP::class,
            $this->getPrivateProperty($bambooApi, 'httpHandler')
        );
    }

    /**
     * @test
     * @covers ::__construct
     */
    public function testConstructWithNameHttp()
    {
        $companyDomain = 'Company Domain';
        $http = $this->createMockBambooHTTP();
        $bambooApi = new BambooAPI($companyDomain, $http);
        $this->assertSame(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'companyDomain')
        );
        $this->assertStringContainsString(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'baseUrl')
        );
        $this->assertSame(
            $http,
            $this->getPrivateProperty($bambooApi, 'httpHandler')
        );
    }

    /**
     * @test
     * @covers ::__construct
     */
    public function testConstructWithNameHttpBaseUrl()
    {
        $companyDomain = 'Company Domain';
        $http = $this->createMockBambooHTTP();
        $baseUrl = 'base url';
        $bambooApi = new BambooAPI($companyDomain, $http, $baseUrl);
        $this->assertSame(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'companyDomain')
        );
        $this->assertStringContainsString(
            $companyDomain,
            $this->getPrivateProperty($bambooApi, 'baseUrl')
        );
        $this->assertStringContainsString(
            $baseUrl,
            $this->getPrivateProperty($bambooApi, 'baseUrl')
        );
        $this->assertSame(
            $http,
            $this->getPrivateProperty($bambooApi, 'httpHandler')
        );
    }

    /**
     * @test
     * @covers ::setSecretKey
     * @uses \BambooHR\API\BambooAPI::__construct
     */
    public function testSetSecretKey()
    {
        $companyDomain = 'Company Domain';
        $secretKey = 'Secret Key';
        $http = $this->createMockBambooHTTP();
        $http->expects($this->once())
            ->method('setBasicAuth')
            ->with($secretKey, 'x');

        $bambooApi = new BambooAPI($companyDomain, $http);
        $bambooApi->setSecretKey($secretKey);
    }

    /**
     * @test
     * @covers ::requestSecretKey
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testRequestSecretKey()
    {
        $companyDomain = 'CompanyDomain';
        $applicationKey = 'ApplicationKey';
        $email = 'Email';
        $password = 'Password';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $applicationKey, $email, $password
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString($applicationKey, $subject->content);
                $this->assertStringContainsString($email, $subject->content);
                $this->assertStringContainsString($password, $subject->content);
                $this->assertStringContainsString('/v1/login', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $bambooApi->requestSecretKey($applicationKey, $email, $password);
    }

    /**
     * @test
     * @covers ::login
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::requestSecretKey
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testLoginError()
    {
        $companyDomain = 'CompanyDomain';
        $applicationKey = 'ApplicationKey';
        $email = 'Email';
        $password = 'Password';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockResponse
            ->expects($this->once())
            ->method('isError')
            ->with()
            ->will($this->returnValue(true));

        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $applicationKey, $email, $password
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString($applicationKey, $subject->content);
                $this->assertStringContainsString($email, $subject->content);
                $this->assertStringContainsString($password, $subject->content);
                $this->assertStringContainsString('/v1/login', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertFalse(
            $bambooApi->login($applicationKey, $email, $password)
        );
    }

    /**
     * @test
     * @covers ::login
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::requestSecretKey
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testLoginNotAuthenticated()
    {
        $companyDomain = 'CompanyDomain';
        $applicationKey = 'ApplicationKey';
        $email = 'Email';
        $password = 'Password';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockResponse
            ->expects($this->once())
            ->method('isError')
            ->with()
            ->will($this->returnValue(false));
        $mockResponse->content = "<content><response>nope</response></content>";

        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $applicationKey, $email, $password
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString($applicationKey, $subject->content);
                $this->assertStringContainsString($email, $subject->content);
                $this->assertStringContainsString($password, $subject->content);
                $this->assertStringContainsString('/v1/login', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertFalse(
            $bambooApi->login($applicationKey, $email, $password)
        );
    }

    /**
     * @test
     * @covers ::login
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::requestSecretKey
     * @uses \BambooHR\API\BambooAPI::setSecretKey
     * @uses \BambooHR\API\BambooHTTPResponse::isError
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testLoginAuthenticated()
    {
        $testKey = 'Test Key';
        $companyDomain = 'CompanyDomain';
        $applicationKey = 'ApplicationKey';
        $email = 'Email';
        $password = 'Password';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockResponse
            ->expects($this->once())
            ->method('isError')
            ->with()
            ->will($this->returnValue(false));
        $mockResponse->content = "<content><response>authenticated</response><key>$testKey</key></content>";

        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $applicationKey, $email, $password
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString($applicationKey, $subject->content);
                $this->assertStringContainsString($email, $subject->content);
                $this->assertStringContainsString($password, $subject->content);
                $this->assertStringContainsString('/v1/login', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));
        $mockHandler
            ->expects($this->once())
            ->method('setBasicAuth')
            ->with($testKey, 'x');

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertTrue(
            $bambooApi->login($applicationKey, $email, $password)
        );
    }

    /**
     * @test
     * @covers ::getEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetEmployee()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $fields = [
            'field1',
            'field2'
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($fields[0], $subject->url);
                $this->assertStringContainsString($fields[1], $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getEmployee($employeeId, $fields)
        );
    }

    /**
     * @test
     * @covers ::getReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetReport()
    {
        $companyDomain = 'CompanyDomain';
        $reportId = 42;
        $format = 'Format';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $reportId, $format
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/reports', $subject->url);
                $this->assertStringContainsString((string)$reportId, $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringNotContainsString('&fd=no',$subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getReport($reportId, $format)
        );
    }

    /**
     * @test
     * @covers ::getReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetReportNoFilterDuplicates()
    {
        $companyDomain = 'CompanyDomain';
        $reportId = 42;
        $format = 'Format';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $reportId, $format
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/reports', $subject->url);
                $this->assertStringContainsString((string)$reportId, $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringContainsString('&fd=no',$subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getReport($reportId, $format, false)
        );
    }

    /**
     * @test
     * @covers ::prepareKeyValues
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testPrepareKeyValues()
    {
        $companyDomain = 'Company Domain';
        $values = [];
        $bambooApi = new BambooAPI($companyDomain);
        $prepareKeyValues = $this->getObjectMethod($bambooApi, 'prepareKeyValues');
        $this->assertSame(
            '',
            $prepareKeyValues($values)
        );

        $companyDomain = 'Company Domain';
        $values = [
            'firstKey' => 'firstValue',
            '2ndKey' => true,
            'childKey' => [
                'extra' => [
                    'attribute' => 'value'
                ],
                'value' => 'This makes no sense and there is no documentation',
            ]
        ];
        $bambooApi = new BambooAPI($companyDomain);
        $prepareKeyValues = $this->getObjectMethod($bambooApi, 'prepareKeyValues');
        $this->assertSame(
            '<field id="firstKey" >firstValue</field><field id="2ndKey" >1</field>'
            . '<field id="childKey" attribute="value">This makes no sense and there is no documentation</field>',
            $prepareKeyValues($values)
        );
    }

    /**
     * @test
     * @covers ::updateEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::prepareKeyValues
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateEmployee()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $fields = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                foreach($fields as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->updateEmployee($employeeId, $fields)
        );
    }

    /**
     * @test
     * @covers ::addEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::prepareKeyValues
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddEmployee()
    {
        $companyDomain = 'CompanyDomain';
        $initialFields = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $initialFields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                foreach($initialFields as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addEmployee($initialFields)
        );
    }

    /**
     * @test
     * @covers ::getCustomReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetCustomReport()
    {
        $companyDomain = 'CompanyDomain';
        $format = 'Format';
        $fields = [
            'field1',
            'field2'
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $format, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/reports/custom', $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringNotContainsString('filterDuplicates', $subject->content);
                $this->assertStringNotContainsString('title', $subject->content);
                $this->assertStringNotContainsString('lastChanged', $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getCustomReport($format, $fields)
        );
    }

    /**
     * @test
     * @covers ::getCustomReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetCustomReportNoFilterDuplicates()
    {
        $companyDomain = 'CompanyDomain';
        $format = 'Format';
        $fields = [
            'field1',
            'field2'
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $format, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/reports/custom', $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringContainsString('filterDuplicates', $subject->content);
                $this->assertStringNotContainsString('title', $subject->content);
                $this->assertStringNotContainsString('lastChanged', $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getCustomReport($format, $fields, false)
        );
    }

    /**
     * @test
     * @covers ::getCustomReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetCustomReportTitle()
    {
        $companyDomain = 'CompanyDomain';
        $format = 'Format';
        $fields = [
            'field1',
            'field2'
        ];
        $title = "Title";

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $format, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/reports/custom', $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringNotContainsString('filterDuplicates', $subject->content);
                $this->assertStringContainsString('title', $subject->content);
                $this->assertStringNotContainsString('lastChanged', $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getCustomReport($format, $fields, true, $title)
        );
    }

    /**
     * @test
     * @covers ::getCustomReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetCustomReportLastChanged()
    {
        $companyDomain = 'CompanyDomain';
        $format = 'Format';
        $fields = [
            'field1',
            'field2'
        ];
        $lastChanged = 'Last Changed';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $format, $fields
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/reports/custom', $subject->url);
                $this->assertStringContainsString($format, $subject->url);
                $this->assertStringNotContainsString('filterDuplicates', $subject->content);
                $this->assertStringNotContainsString('title', $subject->content);
                $this->assertStringContainsString('lastChanged', $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getCustomReport($format, $fields, true, "", $lastChanged)
        );
    }

    /**
     * @test
     * @covers ::getTable
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTable()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $tableName = 'TableName';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $tableName
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($tableName, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTable($employeeId, $tableName)
        );
    }

    /**
     * @test
     * @covers ::getTable
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTableAll()
    {
        $companyDomain = 'CompanyDomain';
        $allEmployees = 'all';
        $tableName = 'TableName';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $allEmployees, $tableName
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString($allEmployees, $subject->url);
                $this->assertStringContainsString($tableName, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTable($allEmployees, $tableName)
        );
    }

    /**
     * @test
     * @covers ::getChangedEmployees
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testChangedEmployees()
    {
        $companyDomain = 'CompanyDomain';
        $since = 'Since';
        $type = 'Type';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $since, $type
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString($since, $subject->url);
                $this->assertStringContainsString($type, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getChangedEmployees($since, $type)
        );
    }

    /**
     * @test
     * @covers ::getMetaData
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetMetaData()
    {
        $companyDomain = 'CompanyDomain';
        $type = 'Type';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $type
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta', $subject->url);
                $this->assertStringContainsString($type, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getMetaData($type)
        );
    }

    /**
     * @test
     * @covers ::getUsers
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getMetaData
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetUsers()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta/users', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getUsers()
        );
    }

    /**
     * @test
     * @covers ::getLists
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getMetaData
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetLists()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta/lists', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getLists()
        );
    }

    /**
     * @test
     * @covers ::getFields
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getMetaData
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetFields()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta/fields', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getFields()
        );
    }

    /**
     * @test
     * @covers ::getTables
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getMetaData
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTables()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta/tables', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTables()
        );
    }

    /**
     * @test
     * @covers ::getTimeOffBalances
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffBalances()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $date = 'Date';
        $precision = 10000;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $date, $precision
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($date, $subject->url);
                $this->assertStringContainsString((string)$precision, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffBalances($employeeId, $date, $precision)
        );
    }

    /**
     * @test
     * @covers ::getTimeOffTypes
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getMetaData
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffTypes()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/meta/time_off/types', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffTypes()
        );
    }

    /**
     * @test
     * @covers ::getTimeOffRequestsArr
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequestsArr()
    {
        $companyDomain = 'CompanyDomain';

        $arr = [];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/time_off/requests', $subject->url);
                $this->assertStringNotContainsString('id', $subject->url);
                $this->assertStringNotContainsString('action', $subject->url);
                $this->assertStringNotContainsString('type', $subject->url);
                $this->assertStringNotContainsString('status', $subject->url);
                $this->assertStringNotContainsString('start', $subject->url);
                $this->assertStringNotContainsString('end', $subject->url);
                $this->assertStringNotContainsString('employeeId', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffRequestsArr($arr)
        );
    }

    /**
     * @test
     * @covers ::getTimeOffRequestsArr
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequestsArrAllOptions()
    {
        $companyDomain = 'CompanyDomain';

        $arr = [
            'id'         => 'ID',
            'action'     => 'Action',
            'type'       => 'Type',
            'status'     => 'Status',
            'start'      => 'Start',
            'end'        => 'End',
            'employeeId' => 'EmployeeId',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/time_off/requests', $subject->url);
                $this->assertStringContainsString('id', $subject->url);
                $this->assertStringContainsString('action', $subject->url);
                $this->assertStringContainsString('type', $subject->url);
                $this->assertStringContainsString('status', $subject->url);
                $this->assertStringContainsString('start', $subject->url);
                $this->assertStringContainsString('end', $subject->url);
                $this->assertStringContainsString('employeeId', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffRequestsArr($arr)
        );
    }

    /**
     * @test
     * @covers ::getTimeOffRequests
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getTimeOffRequestsArr
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequests()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/time_off/requests', $subject->url);
                $this->assertStringNotContainsString('id', $subject->url);
                $this->assertStringNotContainsString('action', $subject->url);
                $this->assertStringNotContainsString('type', $subject->url);
                $this->assertStringNotContainsString('status', $subject->url);
                $this->assertStringNotContainsString('start', $subject->url);
                $this->assertStringNotContainsString('end', $subject->url);
                $this->assertStringNotContainsString('employeeId', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffRequests()
        );
    }

    /**
     * @test
     * @covers ::getTimeOffRequests
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::getTimeOffRequestsArr
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequestsAll()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/time_off/requests', $subject->url);
                $this->assertStringNotContainsString('id', $subject->url);
                $this->assertStringNotContainsString('action', $subject->url);
                $this->assertStringContainsString('type', $subject->url);
                $this->assertStringContainsString('status', $subject->url);
                $this->assertStringContainsString('start', $subject->url);
                $this->assertStringContainsString('end', $subject->url);
                $this->assertStringContainsString('employeeId', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getTimeOffRequests('Start', 'End', 'Status', 'Type', 10)
        );
    }

    /**
     * @test
     * @covers ::addTableRow
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::prepareKeyValues
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTableRow()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 100;
        $tableName = 'TableName';
        $values = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $tableName, $values
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($tableName, $subject->url);
                foreach($values as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addTableRow($employeeId, $tableName, $values)
        );
    }

    /**
     * @test
     * @covers ::addTimeOffRequest
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTimeOffRequest()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId= 42;
        $start= 'start';
        $end= 'end';
        $timeOffTypeId= 101;
        $amount= 'amount';
        $status= 'status';
        $employeeNote= 'employeeNote';
        $managerNote= 'managerNote';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest,
                $employeeId,
                $start,
                $end,
                $timeOffTypeId,
                $amount,
                $status,
                $employeeNote,
                $managerNote
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('PUT', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString('/time_off/request', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($start, $subject->content);
                $this->assertStringContainsString($end, $subject->content);
                $this->assertStringContainsString((string)$timeOffTypeId, $subject->content);
                $this->assertStringContainsString($amount, $subject->content);
                $this->assertStringContainsString($status, $subject->content);
                $this->assertStringContainsString($employeeNote, $subject->content);
                $this->assertStringContainsString($managerNote, $subject->content);
                $this->assertStringNotContainsString('previousRequest', $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addTimeOffRequest(
                $employeeId,
                $start,
                $end,
                $timeOffTypeId,
                $amount,
                $status,
                $employeeNote,
                $managerNote
            )
        );
    }

    /**
     * @test
     * @covers ::addTimeOffRequest
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTimeOffRequestPrevious()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId= 42;
        $start= 'start';
        $end= 'end';
        $timeOffTypeId= 101;
        $amount= 'amount';
        $status= 'status';
        $employeeNote= 'employeeNote';
        $managerNote= 'managerNote';
        $previous = 9001;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest,
                $employeeId,
                $start,
                $end,
                $timeOffTypeId,
                $amount,
                $status,
                $employeeNote,
                $managerNote,
                $previous
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('PUT', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString('/time_off/request', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($start, $subject->content);
                $this->assertStringContainsString($end, $subject->content);
                $this->assertStringContainsString((string)$timeOffTypeId, $subject->content);
                $this->assertStringContainsString($amount, $subject->content);
                $this->assertStringContainsString($status, $subject->content);
                $this->assertStringContainsString($employeeNote, $subject->content);
                $this->assertStringContainsString($managerNote, $subject->content);
                $this->assertStringContainsString((string)$previous, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addTimeOffRequest(
                $employeeId,
                $start,
                $end,
                $timeOffTypeId,
                $amount,
                $status,
                $employeeNote,
                $managerNote,
                $previous
            )
        );
    }

    /**
     * @test
     * @covers ::addTimeOffHistoryFromRequest
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTimeOffHistoryFromRequest()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 101;
        $ymd = 'Year Month Day';
        $requestId = 42;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $ymd, $requestId
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('PUT', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($ymd, $subject->content);
                $this->assertStringContainsString((string)$requestId, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addTimeOffHistoryFromRequest($employeeId, $ymd, $requestId)
        );
    }

    /**
     * @test
     * @covers ::recordTimeOffOverride
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testRecordTimeOffOverride()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 101;
        $ymd = 'Year Month Day';
        $timeOffTypeId = 42;
        $note = 'Note';
        $amount = 1.5;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $ymd, $timeOffTypeId, $note, $amount
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('PUT', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($ymd, $subject->content);
                $this->assertStringContainsString((string)$timeOffTypeId, $subject->content);
                $this->assertStringContainsString($note, $subject->content);
                $this->assertStringContainsString((string)$amount, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->recordTimeOffOverride($employeeId, $ymd, $timeOffTypeId, $note, $amount)
        );
    }

    /**
     * @test
     * @covers ::updateTableRow
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\BambooAPI::prepareKeyValues
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateTableRow()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 100;
        $rowId = 42;
        $tableName = 'TableName';
        $values = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $tableName, $rowId, $values
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($tableName, $subject->url);
                $this->assertStringContainsString((string)$rowId, $subject->url);
                foreach($values as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->updateTableRow($employeeId, $tableName, $rowId, $values)
        );
    }

    /**
     * @test
     * @covers ::uploadEmployeeFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     * @uses \BambooHR\API\BambooHTTPRequest::buildMultipart
     */
    public function testUploadEmployeeFile()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $categoryId = 101;
        $fileName = 'FileName';
        $contentType = 'ContentType';
        $fileData = 'fileData';
        $shareWithEmployees = 'yes';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockRequest
            ->expects($this->once())
            ->method('buildMultipart')
            ->with(
                '----BambooHR-MultiPart-Mime-Boundary----',
                $this->callback(function($subject) use ($fileName, $categoryId, $shareWithEmployees) {
                    if (is_array($subject)) {
                        // Handle array case
                        $this->assertArrayHasKey('fileName', $subject);
                        $this->assertArrayHasKey('category', $subject);
                        $this->assertArrayHasKey('share', $subject);
                    } else {
                        // Handle string case
                        $this->assertStringContainsString($fileName, $subject);
                        $this->assertStringContainsString($categoryId, $subject);
                        $this->assertStringContainsString($shareWithEmployees, $subject);
                    }
                    return true;
                }),
                "file",
                $fileName,
                $contentType,
                $fileData
            )
            ->will($this->returnValue(''));
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $contentType, $fileData
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->uploadEmployeeFile(
                $employeeId,
                $categoryId,
                $fileName,
                $contentType,
                $fileData,
                $shareWithEmployees
            )
        );
    }

    /**
     * @test
     * @covers ::updateTimeOffRequestStatus
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateTimeOffRequestStatus()
    {
        $companyDomain = 'CompanyDomain';
        $requestId = 101;
        $status = 'Status';
        $note = 'Note';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $requestId, $status, $note
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/time_off/requests', $subject->url);
                $this->assertStringContainsString((string)$requestId, $subject->url);
                $this->assertStringContainsString($status, $subject->content);
                $this->assertStringContainsString($note, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->updateTimeOffRequestStatus($requestId, $status, $note)
        );
    }

    /**
     * @test
     * @covers ::uploadCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     * @uses \BambooHR\API\BambooHTTPRequest::buildMultipart
     */
    public function testUploadCompanyFile()
    {
        $companyDomain = 'CompanyDomain';
        $categoryId = 101;
        $fileName = 'FileName';
        $contentType = 'ContentType';
        $fileData = 'fileData';
        $shareWithEmployees = 'yes';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockRequest
            ->expects($this->once())
            ->method('buildMultipart')
            ->with(
                '----BambooHR-MultiPart-Mime-Boundary----',
                $this->callback(function($subject) use ($fileName, $categoryId, $shareWithEmployees) {
                    if (is_array($subject)) {
                        // Handle array case
                        $this->assertArrayHasKey('fileName', $subject);
                        $this->assertArrayHasKey('category', $subject);
                        $this->assertArrayHasKey('share', $subject);
                    } else {
                        // Handle string case
                        $this->assertStringContainsString($fileName, $subject);
                        $this->assertStringContainsString($categoryId, $subject);
                        $this->assertStringContainsString($shareWithEmployees, $subject);
                    }
                    return true;
                }),
                "file",
                $fileName,
                $contentType,
                $fileData
            )
            ->will($this->returnValue(''));
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $categoryId, $fileName, $contentType, $fileData, $shareWithEmployees
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/files', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->uploadCompanyFile($categoryId, $fileName, $contentType, $fileData, $shareWithEmployees)
        );
    }

    /**
     * @test
     * @covers ::listEmployeeFiles
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testListEmployeeFiles()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 101;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString('files/view', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->listEmployeeFiles($employeeId)
        );
    }

    /**
     * @test
     * @covers ::listCompanyFiles
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testListCompanyFiles()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/files/view', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->listCompanyFiles()
        );
    }

    /**
     * @test
     * @covers ::addEmployeeFileCategory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddEmployeeFileCategory()
    {
        $companyDomain = 'CompanyDomain';
        $categoryName = 'Category Name';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $categoryName
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees/files/categories', $subject->url);
                $this->assertStringContainsString($categoryName, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addEmployeeFileCategory($categoryName)
        );
    }

    /**
     * @test
     * @covers ::addCompanyFileCategory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddCompanyFileCategory()
    {
        $companyDomain = 'CompanyDomain';
        $categoryName = 'Category Name';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $categoryName
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/files/categories', $subject->url);
                $this->assertStringContainsString($categoryName, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->addCompanyFileCategory($categoryName)
        );
    }

    /**
     * @test
     * @covers ::updateEmployeeFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateEmployeeFile()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 42;
        $fileId = 101;
        $values = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $fileId, $values
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString((string)$fileId, $subject->url);
                foreach($values as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->updateEmployeeFile($employeeId, $fileId, $values)
        );
    }

    /**
     * @test
     * @covers ::updateCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateCompanyFile()
    {
        $companyDomain = 'CompanyDomain';
        $fileId = 101;
        $values = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $fileId, $values
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/files', $subject->url);
                $this->assertStringContainsString((string)$fileId, $subject->url);
                foreach($values as $field => $value) {
                    $this->assertStringContainsString($field, $subject->content);
                    $this->assertStringContainsString($value, $subject->content);
                }
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->updateCompanyFile($fileId, $values)
        );
    }

    /**
     * @test
     * @covers ::downloadEmployeeFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testDownloadEmployeeFile()
    {
        $companyDomain = 'CompanyDomain';
        $fileId = 101;
        $employeeId = 42;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId, $fileId
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString((string)$fileId, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->downloadEmployeeFile($employeeId, $fileId)
        );
    }

    /**
     * @test
     * @covers ::downloadCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testDownloadCompanyFile()
    {
        $companyDomain = 'CompanyDomain';
        $fileId = 101;

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $fileId
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/files', $subject->url);
                $this->assertStringContainsString((string)$fileId, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->downloadCompanyFile($fileId)
        );
    }

    /**
     * @test
     * @covers ::importEmployees
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testImportEmployees()
    {
        $companyDomain = 'CompanyDomain';
        $xml = '<Hello>World</Hello>';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $xml
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('POST', $subject->method);
                $this->assertStringContainsString('/v1/employees/import', $subject->url);
                $this->assertSame($xml, $subject->content);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->importEmployees($xml)
        );
    }

    /**
     * @test
     * @covers ::getDirectory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetDirectory()
    {
        $companyDomain = 'CompanyDomain';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees/directory', $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getDirectory()
        );
    }

    /**
     * @test
     * @covers ::downloadEmployeePhoto
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testDownloadEmployeePhoto()
    {
        $companyDomain = 'CompanyDomain';
        $employeeId = 101;
        $size = 'small';
        $params = [
            'no' => 'checks',
            'here'
        ];

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $employeeId ,$size
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees', $subject->url);
                $this->assertStringContainsString((string)$employeeId, $subject->url);
                $this->assertStringContainsString($size, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->downloadEmployeePhoto($employeeId, $size, $params)
        );
    }

    /**
     * @test
     * @covers ::getChangedEmployeeTable
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetChangedEmployeeTable()
    {
        $companyDomain = 'CompanyDomain';
        $tableName = 'TableName';
        $since = 'Since';

        $mockResponse = $this->createMockBambooHTTPResponse();
        $mockRequest = $this->createMockBambooHTTPRequest();
        $mockHandler = $this->createMockBambooCurlHTTP();
        $mockHandler
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->callback(function($subject) use (
                $mockRequest, $tableName, $since
            ) {
                $this->assertSame($mockRequest, $subject);
                $this->assertSame('GET', $subject->method);
                $this->assertStringContainsString('/v1/employees/changed/tables', $subject->url);
                $this->assertStringContainsString($tableName, $subject->url);
                $this->assertStringContainsString($since, $subject->url);
                return true;
            }))
            ->will($this->returnValue($mockResponse));

        $bambooApi = new BambooAPI($companyDomain, $mockHandler);
        $bambooApi->setBambooHttpRequest($mockRequest);
        $this->assertSame(
            $mockResponse,
            $bambooApi->getChangedEmployeeTable($tableName, $since)
        );
    }
}
