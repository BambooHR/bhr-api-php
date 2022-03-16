<?php
/**
 * BambooHTTPRequest.php
 */

namespace BambooHR\API\Injector;
use BambooHR\API\BambooHTTPRequest;


/**
 * BambooHTTPRequest
 * Allows injection of BambooHttpRequest with a default to fall back on
 * @package BambooHR
 */
trait BambooHTTPRequestInjector {
	/**
	 * @var BambooHTTPRequest
	 */
	private $bambooHttpRequest;

	/**
	 * @return BambooHTTPRequest
	 */
	protected function getBambooHttpRequest() {
		if (!$this->bambooHttpRequest) {
			$this->setBambooHttpRequest(new BambooHTTPRequest());
		}
		return $this->bambooHttpRequest;
	}

	/**
	 * @param BambooHTTPRequest $bambooHttpRequest the object representing an http request
	 * @return void
	 */
	public function setBambooHttpRequest(BambooHTTPRequest $bambooHttpRequest) {
		$this->bambooHttpRequest = $bambooHttpRequest;
	}
}
