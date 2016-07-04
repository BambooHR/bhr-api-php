<?php
/**
 * TestCase.php
 * @author    Daniel Mason <danielm@moo.com>
 * @copyright 2016 MOO
 * @license   proprietary
 * @see       https://www.moo.com
 */

namespace BambooHR\API\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * TestCase
 * This class can be used to add further asserts, etc
 * @package BambooHR
 */
class TestCase extends PHPUnitTestCase
{
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
}
