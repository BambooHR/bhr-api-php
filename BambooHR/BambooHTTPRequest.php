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

    const BAMBOOHR_MULTIPART_BOUNDARY = "----BambooHR-MultiPart-Mime-Boundary----";
    
    /**
     * Utility function for creating a valid multipart POST body. Mostly useful for uploading files.
     *
     * @param string $boundary
     * @param string[] $postFields
     * @param string $name
     * @param string $fileName
     * @param string $contentType
     * @param string $fileData
     * @return string
     */
    function buildMultipart($boundary, $postFields, $name, $fileName, $contentType, $fileData ) {

        $data = '';

        // populate normal fields first (simpler)
        foreach ($postFields as $key => $content) {
            $data .= "--" . $boundary . "\r\n";
            $data .= 'Content-Disposition: form-data; name="' . $key . '"';
            // note: double endline
            $data .= "\r\n\r\n";
            $data.= $content . "\r\n";
        }
        $data.="--" . $boundary . "\r\n";
        $data .= 'Content-Disposition: form-data; name="' . $name . '";' .
            ' filename="' . $fileName . '"' . "\r\n";

        $data .= 'Content-Type: ' . $contentType . "\r\n";
        $data .= "\r\n";
        // the file itself (note: there's no encoding of any kind)

        $data .= $fileData . "\r\n";
        // last delimiter
        $data .= "--" . $boundary . "--\r\n";
        return $data;
    }
}
