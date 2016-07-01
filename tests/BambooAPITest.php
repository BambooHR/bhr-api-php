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


/**
 * BambooAPITest
 * @package BambooHR
 * @test
 * @coversDefaultClass \BambooHR\API\BambooAPI
 */
class BambooAPITest extends TestCase
{
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
     */
    public function testRequestSecretKey()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::login
     */
    public function testLogin()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getEmployee
     */
    public function testGetEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getReport
     */
    public function testGetReport()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::prepareKeyValues
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
     */
    public function testUpdateEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addEmployee
     */
    public function testAddEmployee()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getCustomReport
     */
    public function testGetCustomReport()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTable
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
     */
    public function testGetMetaData()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getUsers
     */
    public function testGetUsers()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getLists
     */
    public function testGetLists()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getFields
     */
    public function testGetFields()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTables
     */
    public function testGetTables()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffBalance
     */
    public function testGetTimeOffBalance()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffTypes
     */
    public function testGetTimeOffTypes()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffRequestsArr
     */
    public function testGetTimeOffRequestsArr()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getTimeOffRequests
     */
    public function testGetTimeOffRequests()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTableRow
     */
    public function testAddTableRow()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTimeOffRequest
     */
    public function testAddTimeOffRequest()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addTimeOffHistoryFromRequest
     */
    public function testAddTimeOffHistoryFromRequest()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::recordTimeOffOverride
     */
    public function testRecordTimeOffOverride()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateTableRow
     */
    public function testUpdateTableRow()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::uploadEmployeeFile
     */
    public function testUploadEmployeeFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::uploadCompanyFile
     */
    public function testUploadCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::listCompanyFiles
     */
    public function testListCompanyFiles()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addEmployeeFileCategory
     */
    public function testAddEmployeeFileCategory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::addCompanyFileCategory
     */
    public function testAddCompanyFileCategory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateEmployeeFile
     */
    public function testUpdateEmployeeFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::updateCompanyFile
     */
    public function testUpdateCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::downloadCompanyFile
     */
    public function testDownloadCompanyFile()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::importEmployees
     */
    public function testImportEmployees()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getDirectory
     */
    public function testGetDirectory()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::downloadEmployeePhoto
     */
    public function testDownloadEmployeePhoto()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }

    /**
     * @test
     * @covers ::getChangedEmployeeTable
     */
    public function testGetChangedEmployeeTable()
    {
        // ToDo:
        $this->assertTrue((bool)'This can not be tested until BambooHTTPRequest is injected');
    }
}
