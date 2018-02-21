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
	/**
	 * @param string $username the username
	 * @param string $password the password
	 * @return void
	 */
	function setBasicAuth($username, $password);

	/**
	 * @param BambooHTTPRequest $request the object representing the request
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function sendRequest(BambooHTTPRequest $request);
}
