<?php
/**
 * BambooHTTPRequest.php
 * @author    Daniel Mason <danielm@moo.com>
 * @copyright 2016 MOO
 * @license   proprietary
 * @see       https://www.moo.com
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
    protected function getBambooHttpRequest()
    {
        if(!$this->bambooHttpRequest) {
            $this->setBambooHttpRequest(new BambooHTTPRequest());
        }
        return $this->bambooHttpRequest;
    }

    /**
     * @param BambooHTTPRequest $bambooHTTPRequest
     */
    public function setBambooHttpRequest(BambooHTTPRequest $bambooHTTPRequest)
    {
        $this->bambooHttpRequest = $bambooHTTPRequest;
    }
}
