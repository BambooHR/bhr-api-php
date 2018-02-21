<?php
/**
 * BambooCurlHTTP.php
 */

namespace BambooHR\API;

/**
 * BambooCurlHTTP
 * @package BambooHR
 */
class BambooCurlHTTP implements BambooHTTP {
	private $basicAuthUsername;
	private $basicAuthPassword;

	/**
	 * Set the username and password used in HTTP basic Authentication.
	 * @param string $username the username
	 * @param string $password the password
	 * @return void
	 */
	function setBasicAuth($username, $password) {
		$this->basicAuthUsername = $username;
		$this->basicAuthPassword = $password;
	}

	/**
	 * Given a string with HTTP headers, return an array like array('Header' => 'Value')
	 *
	 * @param string $headerString the entire header block
	 * @return array
	 */
	function parseHeaders( $headerString ) {
		$retVal = array();
		$fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $headerString ));
		foreach ($fields as $field) {
			if ( preg_match('/([^:]+): (.+)/m', $field, $match) ) {
				$retVal[$match[1]] = trim($match[2]);
			}
		}
		return $retVal;
	}

	/**
	 * Perform the request described by the BambooHTTPRequest. Return a
	 * BambooHTTPResponse describing the response.
	 *
	 * @param \BambooHR\API\BambooHTTPRequest $request the object representing the request
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function sendRequest(BambooHTTPRequest $request) {
		$response = new BambooHTTPResponse();

		$http = curl_init();
		curl_setopt($http, CURLOPT_URL, $request->url );
		curl_setopt($http, CURLOPT_CUSTOMREQUEST, $request->method );
		curl_setopt($http, CURLOPT_HTTPHEADER, $request->headers );
		curl_setopt($http, CURLOPT_POSTFIELDS, $request->content);

		curl_setopt($http, CURLOPT_HEADER, true );
		curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($http, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
		curl_setopt($http, CURLOPT_USERPWD, $this->basicAuthUsername . ':' . $this->basicAuthPassword);

		$response->content = curl_exec($http);

		if ($response->content !== false) {
			$response->statusCode = curl_getinfo($http, CURLINFO_HTTP_CODE);
			$headerSize = curl_getinfo($http, CURLINFO_HEADER_SIZE);
			$response->headers = $this->parseHeaders( substr($response->content, 0, $headerSize) );
			$response->content = substr($response->content, $headerSize );
			return $response;
		}

		$response->statusCode = 0;
		$response->content = "Connection error";
		return $response;
	}
}
