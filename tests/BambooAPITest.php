<?php
/**
 * BambooAPITest.php
 * @author    Daniel Mason <danielm@moo.com>
 * @copyright 2016 MOO
 * @license   proprietary
 * @see       https://www.moo.com
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
class BambooAPITest extends TestCase
{
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
    public function testContruct()
    {
        $companyDomain = 'Company Domain';
        $bambooApi = new BambooAPI($companyDomain);
        $this->assertSame(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'companyDomain')
        );
        $this->assertContains(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'baseUrl')
        );
        $this->assertInstanceOf(
            BambooCurlHTTP::class,
            $this->getObjectAttribute($bambooApi, 'httpHandler')
        );

        $companyDomain = 'Company Domain';
        $http = $this->createMock(BambooHTTP::class);
        $bambooApi = new BambooAPI($companyDomain, $http);
        $this->assertSame(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'companyDomain')
        );
        $this->assertContains(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'baseUrl')
        );
        $this->assertSame(
            $http,
            $this->getObjectAttribute($bambooApi, 'httpHandler')
        );

        $companyDomain = 'Company Domain';
        $http = $this->createMock(BambooHTTP::class);
        $baseUrl = 'base url';
        $bambooApi = new BambooAPI($companyDomain, $http, $baseUrl);
        $this->assertSame(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'companyDomain')
        );
        $this->assertContains(
            $companyDomain,
            $this->getObjectAttribute($bambooApi, 'baseUrl')
        );
        $this->assertContains(
            $baseUrl,
            $this->getObjectAttribute($bambooApi, 'baseUrl')
        );
        $this->assertSame(
            $http,
            $this->getObjectAttribute($bambooApi, 'httpHandler')
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
        $http = $this->createMock(BambooHTTP::class);
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
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::login
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testLogin()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetReport()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
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
            .'<field id="childKey" attribute="value">This makes no sense and there is no documentation</field>',
            $prepareKeyValues($values)
        );
    }

    /**
     * @test
     * @covers ::updateEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addEmployee
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getCustomReport
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetCustomReport()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTable
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTable()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getChangedEmployees
     */
    public function testChangedEmployees()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getMetaData
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetMetaData()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getUsers
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetUsers()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getLists
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetLists()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getFields
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetFields()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTables
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTables()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffBalances
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffBalances()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffTypes
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffTypes()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffRequestsArr
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequestsArr()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffRequests
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetTimeOffRequests()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTableRow
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTableRow()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTimeOffRequest
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTimeOffRequest()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTimeOffHistoryFromRequest
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddTimeOffHistoryFromRequest()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::recordTimeOffOverride
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testRecordTimeOffOverride()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateTableRow
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateTableRow()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::uploadEmployeeFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUploadEmployeeFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::uploadCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUploadCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::listCompanyFiles
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testListCompanyFiles()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addEmployeeFileCategory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddEmployeeFileCategory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addCompanyFileCategory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testAddCompanyFileCategory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateEmployeeFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateEmployeeFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testUpdateCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::downloadCompanyFile
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testDownloadCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::importEmployees
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testImportEmployees()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getDirectory
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetDirectory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::downloadEmployeePhoto
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testDownloadEmployeePhoto()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getChangedEmployeeTable
     * @uses \BambooHR\API\BambooAPI::__construct
     * @uses \BambooHR\API\Injector\BambooHTTPRequestInjector
     */
    public function testGetChangedEmployeeTable()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }
}
