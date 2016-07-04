<?php
/**
 * BambooHTTPResponse.php
 */

namespace BambooHR\API;


/**
 * BambooHTTPResponse
 * @package BambooHR
 */
class BambooHTTPResponse {
    public $statusCode;
    public $headers=array();
    public $content;

    /**
     * If HTTP response indicates error, return true.
     * @return bool
     */
    public function isError() {
        return $this->statusCode < 200 || $this->statusCode > 299;
    }

    /**
     * If the request is a success and is xml, return a SimpleXmlElement of the response content.
     *
     * @return \SimpleXMLElement|null
     */
    public function getContentXML() {
        if(!$this->isError() && strpos($this->headers['Content-Type'], 'text/xml') !== false) {
            return new \SimpleXMLElement($this->content);
        }
        return null;
    }

    /**
     * If the request is a success and is json, return an object from the response content.
     *
     * @return stdclass|null
     */
    public function getContentJSON() {
        if(!$this->isError() && strpos($this->headers['Content-Type'], 'application/json') !== false) {
            return json_decode($this->content);
        }
        return null;
    }

    /**
     * Return an object representing the content of the response. Mostly just a shortcut to {@see getContentJSON()} and {@see getContentXML()}
     *
     * @return \SimpleXMLElement|stdclass|null
     */
    public function getContent() {
        if(!$this->isError() && strpos($this->headers['Content-Type'], 'application/json') !== false) {
            return $this->getContentJSON();
        }
        if(!$this->isError() && strpos($this->headers['Content-Type'], 'text/xml') !== false) {
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
        if($this->isError())
            return isset($this->headers['X-BambooHR-Error-Messsage'])
                ? $this->headers['X-BambooHR-Error-Messsage']
                : $this->getContent();
        return null;
    }
}
