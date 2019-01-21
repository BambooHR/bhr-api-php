<?php

namespace App\API;

use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTPRequest;

/**
 * Class BambooJSONHTTP
 * @package App\API
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