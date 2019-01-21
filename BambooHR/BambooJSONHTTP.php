<?php

namespace App\API;

use BambooHR\API\BambooCurlHTTP;
use BambooHR\API\BambooHTTPRequest;

class BambooJSONHTTP extends BambooCurlHTTP
{

    function sendRequest(BambooHTTPRequest $request) {
        $request->headers[] = 'Accept: application/json';
        return parent::sendRequest($request);
    }
}