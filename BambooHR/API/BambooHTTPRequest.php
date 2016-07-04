<?php
/**
 * BambooHTTPRequest.php
 */

namespace BambooHR\API;


/**
 * BambooHTTPRequest
 * @package BambooHR
 */
class BambooHTTPRequest {
    public $method="GET";
    public $headers=array();
    public $url;
    public $content=""; // Use raw text for most requests, or arrays for multipart/form-data
    public $multiPart=false;
}
