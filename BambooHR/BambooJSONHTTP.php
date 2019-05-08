<?php

namespace BambooHR\API;

use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTPRequest;

/**
 * Class BambooJSONHTTP
 * @package BambooHR\API
 *
 * Use when creating BambooAPI:
 * $api = new BambooHR\API\BambooAPI('company', new BambooJSONHTTP());
 */
class BambooJSONHTTP extends BambooCurlHTTP
{

    function sendRequest(BambooHTTPRequest $request) {
        $request->headers[] = 'Accept: application/json';
        return parent::sendRequest($request);
    }
}