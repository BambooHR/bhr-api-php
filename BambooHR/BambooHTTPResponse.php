<?php
/**
 * BambooHTTPResponse.php
 */

namespace BambooHR\API;

use BambooHR\API\Exception\BambooHTTPResponseException;

/**
 * BambooHTTPResponse
 * @package BambooHR
 */
class BambooHTTPResponse {
	public $statusCode;
	public $headers = array();
	public $content;

	/**
	 * If HTTP response indicates error, return true.
	 * @return bool
	 */
	public function isError() {
		return $this->statusCode < 200 || $this->statusCode > 299;
	}

	/**
	 * Gets the content type of the response.
	 *
	 * @throws BambooHTTPResponseException when the content type header is missing
	 * @return string
	 */
	public function getContentType() {
		if (isset($this->headers['Content-Type'])) {
			return $this->headers['Content-Type'];
		}

		if (isset($this->headers['content-type'])) {
			return $this->headers['content-type'];
		}

		throw new BambooHTTPResponseException('Content-Type header is missing from the response');
	}

	/**
	 * Returns if the response content type is application/json
	 * 
	 * @return bool
	 */
	public function isJsonResponse() {
		return strtolower($this->getContentType()) === 'application/json';
	}

	/**
	 * Returns if the response content type is text/xml
	 * 
	 * @return bool
	 */
	public function isXmlResponse() {
		return strtolower($this->getContentType()) === 'text/xml';
	}

	// phpcs:disable BambooHR.Functions.CamelCapsFunctionName.ScopeNotCamelCaps
	/**
	 * If the request is a success and is xml, return a SimpleXmlElement of the response content.
	 *
	 * @return \SimpleXMLElement|null
	 */
	public function getContentXML() {
		if (!$this->isError() && $this->isXmlResponse()) {
			return new \SimpleXMLElement($this->content);
		}
		return null;
	}
	// phpcs:enable

	// phpcs:disable BambooHR.Functions.CamelCapsFunctionName.ScopeNotCamelCaps
	/**
	 * If the request is a success and is json, return an object from the response content.
	 *
	 * @return stdclass|null
	 */
	public function getContentJSON() {
		if (!$this->isError() && $this->isJsonResponse()) {
			return json_decode($this->content);
		}
		return null;
	}
	// phpcs:enable

	/**
	 * Return an object representing the content of the response. Mostly just a shortcut to {@see getContentJSON()} and {@see getContentXML()}
	 *
	 * @return \SimpleXMLElement|stdclass|null
	 */
	public function getContent() {
		if (!$this->isError() && $this->isJsonResponse()) {
			return $this->getContentJSON();
		}
		if (!$this->isError() && $this->isXmlResponse()) {
			return $this->getContentXML();
		}
		return $this->content;
	}

	/**
	 * If the API returns an error, it may also send a message to describe the
	 * error. This message is only suitable for debugging purposes, not for
	 * displaying errors to the user. While we will endeavor to avoid changing these messages,
	 * you should be prepared for them to change. (in other words, avoid comparing
	 * the content of the error message to determine behavior).
	 *
	 * @return string
	 */
	public function getErrorMessage() {
		if ($this->isError()) {
			return isset($this->headers['X-BambooHR-Error-Message']) ? $this->headers['X-BambooHR-Error-Message'] : $this->getContent();
		}
		return null;
	}
}
