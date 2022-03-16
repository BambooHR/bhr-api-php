<?php
/**
 * TestCase.php
 */

namespace BambooHR\API\Tests;

use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTP;
use BambooHR\API\BambooHTTPRequest;
use BambooHR\API\BambooHTTPResponse;

/**
 * TestCase
 * This class can be used to add further asserts, etc
 * @package BambooHR
 */
class TestCase extends \PHPUnit_Framework_TestCase {
    /**
     * @param $object
     * @param $method
     * @return \Closure
     */
    protected function getObjectMethod($object, $method)
    {
        if(!is_object($object)) {
            throw new \InvalidArgumentException('Can not mock method on non object');
        }
        if(!is_string($method)) {
            throw new \InvalidArgumentException('Can not mock method name when method name is not a string');
        }

        $reflectedMethod = new \ReflectionMethod($object, $method);
        $reflectedMethod->setAccessible(true);

        $callback = function() use ($reflectedMethod, $object) {
            return $reflectedMethod->invokeArgs($object, func_get_args());
        };

        return $callback;
    }

    /**
     * @return BambooHTTPRequest|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMockBambooHTTPRequest()
    {
        return $this->createMock(BambooHTTPRequest::class);
    }

    /**
     * @return BambooHTTPResponse|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMockBambooHTTPResponse()
    {
        return $this->createMock(BambooHTTPResponse::class);
    }

    /**
     * @return BambooHTTPResponse|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMockBambooCurlHTTP()
    {
        return $this->createMock(BambooCurlHTTP::class);
    }

    /**
     * @return BambooHTTP|\PHPUnit_Framework_MockObject_MockObject
     */
    protected function createMockBambooHTTP()
    {
        return $this->getMockForAbstractClass(BambooHTTP::class);
    }
}
