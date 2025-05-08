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
class TestCase extends \PHPUnit\Framework\TestCase {
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
     * @return BambooHTTPRequest|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createMockBambooHTTPRequest()
    {
        return $this->createMock(BambooHTTPRequest::class);
    }

    /**
     * @return BambooHTTPResponse|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createMockBambooHTTPResponse()
    {
        return $this->createMock(BambooHTTPResponse::class);
    }

    /**
     * @return BambooHTTPResponse|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createMockBambooCurlHTTP()
    {
        return $this->createMock(BambooCurlHTTP::class);
    }

    /**
     * @return BambooHTTP|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createMockBambooHTTP()
    {
        return $this->getMockForAbstractClass(BambooHTTP::class);
    }
    
    /**
     * Gets a private or protected property from an object using reflection
     * 
     * @param object $object The object to get the property from
     * @param string $propertyName The name of the property
     * @return mixed The value of the property
     */
    protected function getPrivateProperty($object, $propertyName)
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}
