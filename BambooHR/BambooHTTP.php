<?php
/**
 * BambooHTTP.php
 */

namespace BambooHR\API;

/**
 * BambooHTTP
 * @package BambooHR
 */
interface BambooHTTP {
    function setBasicAuth($username, $password);
    function sendRequest(BambooHTTPRequest $request);
}
