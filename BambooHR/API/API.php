<?php

/*

Copyright (c) 2013, Bamboo HR LLC
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

* Neither the name of Bamboo HR nor the names of its contributors may be used
  to endorse or promote products derived from this software without specific
  prior written permission.


THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/
namespace BambooHR\API;

class BambooHTTPRequest {
	public $method="GET";
	public $headers=array();
	public $url;
	public $content=""; // Use raw text for most requests, or arrays for multipart/form-data
	public $multiPart=false;
}

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

interface BambooHTTP {
	function setBasicAuth($username, $password);
	function sendRequest(BambooHTTPRequest $request);
}

define('BAMBOOHR_MULTIPART_BOUNDARY', "----BambooHR-MultiPart-Mime-Boundary----");

/**
 * Utility function for creating a valid multipart POST body. Mostly useful for uploading files.
 *
 * @param type $boundary
 * @param type $postFields
 * @param type $name
 * @param type $fileName
 * @param type $contentType
 * @param type $fileData
 * @return string
 */
function buildMultipart($boundary, $postFields, $name, $fileName, $contentType, $fileData ) {

	$data = '';

	// populate normal fields first (simpler)
	foreach ($postFields as $key => $content) {
	    $data .= "--".$boundary. "\r\n";
	    $data .= 'Content-Disposition: form-data; name="' . $key . '"';
	    // note: double endline
	    $data .= "\r\n\r\n";
	    $data.= $content."\r\n";
	}
	$data.="--".$boundary."\r\n";
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


class BambooCurlHTTP implements BambooHTTP {
	private $basicAuthUsername;
	private $basicAuthPassword;

	/**
	 * Set the username and password used in HTTP basic Authentication.
	 * @param string $username
	 * @param string $password
	 */
	function setBasicAuth($username, $password) {
		$this->basicAuthUsername=$username;
		$this->basicAuthPassword=$password;
	}

	/**
	 * Given a string with HTTP headers, return an array like array('Header' => 'Value')
	 *
	 * @param string $headerString
	 * @return array
	 */
	function parseHeaders( $headerString ) {
		$retVal = array();
		$fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $headerString ));
		foreach( $fields as $field ) {
			if( preg_match('/([^:]+): (.+)/m', $field, $match) ) {
				$retVal[$match[1]] = trim($match[2]);
			}
		}
		return $retVal;
	}

	/**
	 * Perform the request described by the BambooHTTPRequest. Return a
	 * BambooHTTPResponse describing the response.
	 *
	 * @param \BambooHR\API\BambooHTTPRequest $request
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function sendRequest(BambooHTTPRequest $request) {
		$response=new BambooHTTPResponse();

		$http=curl_init();
		curl_setopt($http, CURLOPT_URL, $request->url );
		curl_setopt($http, CURLOPT_CUSTOMREQUEST, $request->method );
		curl_setopt($http, CURLOPT_HTTPHEADER, $request->headers );
		curl_setopt($http, CURLOPT_POSTFIELDS, $request->content);

		curl_setopt($http, CURLOPT_HEADER, true );
		curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
		
		curl_setopt($http, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
		curl_setopt($http, CURLOPT_USERPWD, $this->basicAuthUsername.':'.$this->basicAuthPassword);

		$response->content=curl_exec($http);

		if($response->content!==false) {
			$response->statusCode = curl_getinfo($http, CURLINFO_HTTP_CODE);
			$headerSize = curl_getinfo($http,CURLINFO_HEADER_SIZE);
			$response->headers= $this->parseHeaders( substr($response->content, 0, $headerSize) );
			$response->content= substr($response->content, $headerSize );
		} else {
			$response->statusCode=0;
			$response->content="Connection error";
		}
		return $response;
	}
}

/**
 * The main class.
 *
 * Common usage:
 * <code>
 * <?php
 * $bhr = new BambooAPI("foo");
 * $bhr->setSecretKey("bar");
 * $response = $bhr->getDirectory();
 * if($response->isError()) {
 *     trigger_error("Error communicating with BambooHR");
 * }
 * $xml = new SimpleXmlElement($response->content);
 * ...
 * ?>
 * </code>
 */
class BambooAPI {
	protected $companyDomain;
	protected $httpHandler;
	protected $baseUrl="https://api.bamboohr.com/api/gateway.php";

	/**
	 *
	 *
	 * @param string $companyDomain Either the subdomain of a BambooHR account ("example.bamboohr.com" => "example") or the full domain ("example.bamboohr.com")
	 * @param BambooHTTP $http
	 * @param string $baseUrl
	 */
	function __construct($companyDomain, BambooHTTP $http=null, $baseUrl=null) {
		if($http) {
			$this->httpHandler=$http;
		} else {
			$this->httpHandler=new BambooCurlHTTP();
		}
		if($baseUrl) {
			$this->baseUrl=$baseUrl;
		}
		$this->companyDomain = $companyDomain;
		$this->baseUrl=$this->baseUrl.="/$companyDomain";
	}

	/**
	 * Set the api key to use.
	 *
	 * @param string $key
	 */
	function setSecretKey($key){
		$this->httpHandler->setBasicAuth($key, 'x');
	}

	/**
	 * Use the Login API to get a key for use in later API requests. 
	 * To set the secretKey, you will need to parse the
	 * {@see \BambooHR\API\BambooHTTPResponse::$content} returned from this function and call
	 * {@see setSecretKey()}
	 * 
	 * Use the {@see login()} as an alternative to this function that
	 * will do this work for you.
	 * 
	 * @param string $applicationKey To ask about an applicationKey, email api@bamboohr.com
	 * @param string $email
	 * @param string $password
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/login.php
	 */
	function requestSecretKey($applicationKey, $email, $password) {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/login";
		$request->content="applicationKey=".urlencode($applicationKey)."&user=".urlencode($email)."&password=".urlencode($password);
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * Use the Login API to get a key for use in later API requests. Also use the
	 * response to set up the authentication for future requests. Using this API
	 * requires you to contact BambooHR to get an applicationKey.
	 *
	 * @param string $applicationKey To ask about an applicationKey, email api@bamboohr.com
	 * @param string $email
	 * @param string $password
	 * @return bool
	 * @link http://www.bamboohr.com/api/documentation/login.php
	 */
	function login($applicationKey, $email, $password) {
		$response = $this->requestSecretKey($applicationKey, $email, $password);
		if($response->isError()) {
			return false;
		}
		$xml = new \SimpleXMLElement($response->content);
		if($xml->response != 'authenticated') {
			return false;
		}
		$this->setSecretKey($xml->key);
		$this->baseUrl = $xml->apiUrl . $this->companyDomain;
		return true;
	}

	/**
	 *
	 *
	 * @param int $employeeId
	 * @param array $fields an array of field aliases or ids
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#getEmployee
	 */
	function getEmployee($employeeId, $fields=array()) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/?fields=".implode(",",$fields);

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $reportId
	 * @param string $format one of xml, csv, xls, json, pdf
	 * @param bool $filterDuplicates
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#requestCompanyReport
	 */
	function getReport($reportId, $format, $filterDuplicates=true) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/reports/".intval($reportId)."/?format=".$format;		
		if(!$filterDuplicates) {
			$request->url.="&fd=no";
		}
		return $this->httpHandler->sendRequest( $request );
	}


	private function prepareKeyValues($values) {
		$xml="";
		foreach($values as $key=>$value) {
			if(is_array($value)) {
				$extraAttr=$value['extra'];
				$value=$value['value'];
			} else {
				$extraAttr=array();
			}
			$xml.=sprintf("<field id=\"%s\" ", htmlspecialchars($key,ENT_COMPAT));
			foreach($extraAttr as $name=>$attValue) {
				$xml.=sprintf("%s=\"%s\"",$name, htmlspecialchars($attValue,ENT_COMPAT)); 
			}

			$xml.=">".htmlspecialchars($value,ENT_COMPAT )."</field>";
		}
		return $xml;
	}

	/**
	 * Update an employee. pass a map of "fieldId" => "value". Does not work for table fields.
	 * 
	 * @param int $employeeId
	 * @param array $fieldValues
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateEmployee
	 */
	function updateEmployee($employeeId, $fieldValues=array()) {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId);
		$request->headers=array("Content-type:"=>"text/xml");

		$xml=sprintf('<employee id="%d">', $employeeId);
		$xml.=$this->prepareKeyValues($fieldValues);
		$xml.="</employee>";
		$request->content=$xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param array $fieldValues
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addEmployee
	 */
	function addEmployee($initialFieldValues=array()) {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/";
		$request->headers=array("Content-type"=>"text/xml");

		$xml='<employee>'.$this->prepareKeyValues($initialFieldValues)."</employee>";
		$request->content=$xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $format one of xml, csv, xls, json, pdf
	 * @param array $fields
	 * @param bool $filterDuplicates
	 * @param string $title
	 * @param string $lastChanged Date in ISO 8601 format, like: 2012-10-17T16:00:00Z
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#requestCustomReport
	 */
	function getCustomReport($format, $fields, $filterDuplicates=true,$title="", $lastChanged="") {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/reports/custom/?format=".$format;
		$request->headers=array("Content-type", "text/xml");
		$xml='<report>';
		if($title!="") $xml.="<title>".htmlentities($title)."</title>";

		if($lastChanged!="") {
			$xml.="<filters><lastChanged includeNull=\"no\" >".htmlentities($lastChanged)."</lastChanged></filters>";
		}

		$xml.='<fields>';
		if(!$filterDuplicates) $xml.="<filterDuplicates>no</filterDuplicates>";
		foreach($fields as $field) {
			$xml.=sprintf('<field id="%s" />', $field );
		}
		$xml.='</fields></report>';
		$request->content=$xml;		
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $tableName {@link http://www.bamboohr.com/api/documentation/tables.php#tables List of valid tables}
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#getTable
	 */
	function getTable($employeeId, $tableName) {
		if($employeeId!="all") $employeeId=intval($employeeId);
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".$employeeId."/tables/".urlencode($tableName)."/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * 
	 * @param string $since Date in ISO 8601 format, like: 2012-10-17T16:00:00Z
	 * @param string $type
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/changes.php#description
	 */
	function getChangedEmployees($since, $type="all") {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/changed/?since=".urlencode($since)."&type=".urlencode($type);
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * 
	 * @param string $type
	 * @param Array $params
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php
	 */
	function getMetaData($type, $params=array()) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/meta/$type/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * 
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php#users
	 */
	function getUsers() {
		return $this->getMetaData('users');	
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php#lists
	 */
	function getLists() {
		return $this->getMetaData('lists');
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php#fields
	 */
	function getFields() {
		return $this->getMetaData('fields');
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php#tables
	 */
	function getTables() {
		return $this->getMetaData('tables');
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $date (date in the format YYYY-mm-dd)
	 * @param int $precision
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/time_off.php#estimateFutureBalance
	 */
	function getTimeOffBalances($employeeId,$date,$precision=1) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/time_off/calculator?end=".$date."&precision=".$precision;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/metadata.php#timeOffTypes
	 */
	function getTimeOffTypes() {
		return $this->getMetaData('time_off/types');
	}

	/**
	 *
	 * @param type $arr array(["id" => int], ["action" => "(view|approve)"], ["type" => "id,id"],["status" => "(approved|denied|superceded|requested|canceled)"], ["start" => "YYYY-mm-dd"], ["end" => "YYYY-mm-dd"], ["employeeId" => "id"])
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/time_off.php#requests
	 */
	function getTimeOffRequestsArr($arr) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/time_off/requests/?";
		if(isset($arr['id'])) $request->url.="id=".urlencode($arr['id'])."&";
		if(isset($arr['action'])) $request->url.="action=".urlencode($arr['action'])."&";
		if(isset($arr['type'])) $request->url.="type=".urlencode($arr['type'])."&";
		if(isset($arr['status'])) $request->url.="status=".urlencode($arr['status'])."&";
		if(isset($arr['start'])) $request->url.="start=".urlencode($arr['start'])."&";
		if(isset($arr['end'])) $request->url.="end=".urlencode($arr['end'])."&";
		if(isset($arr['employeeId'])) $request->url.="employeeId=".urlencode($arr['employeeId'])."&";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $start format: "YYYY-mm-dd"
	 * @param string $end format "YYYY-mm-dd"
	 * @param string $status (approved|denied|superceded|requested|canceled)
	 * @param int $type A time off type id
	 * @param int $employeeId An employee id
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @see getTimeOffTypes()
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#requests
	 */
	function getTimeOffRequests($start="", $end="", $status="", $type="", $employeeId=0) {
		$arr=array();
		if($type!="") $arr["type"]=$type;
		if($status!="") $arr["status"]=$status;
		if($start!="") $arr["start"]=$start;
		if($end!="") $arr["end"]=$end;
		if($employeeId!=0) $arr["employeeId"]=$employeeId;
		return $this->getTimeOffRequestsArr($arr);
	}

	/**
	 *
	 * @param int $employeeId An employee id
	 * @param string $tableName A table alias. Check out  function
	 * @param array $values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @see getTables()
	 * @link http://www.bamboohr.com/api/documentation/tables.php#addRow
	 */
	function addTableRow($employeeId, $tableName, $values) {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/tables/".$tableName."/";

		$xml="<row>".$this->prepareKeyValues($values)."</row>";
		$request->content=$xml;

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $start format: YYYY-mm-dd
	 * @param string $end format: YYYY-mm-dd
	 * @param int $timeOffTypeId
	 * @param float $amount
	 * @param string $status (approved|denied|superceded|requested|canceled)
	 * @param string $employeeNote
	 * @param string $managerNote
	 * @param int $previous
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addrequest
	 */
	function addTimeOffRequest($employeeId, $start, $end, $timeOffTypeId, $amount, $status, $employeeNote, $managerNote,$previous=0) {
		$request=new BambooHTTPRequest();
		$request->method="PUT";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/time_off/request/";

		$values=array(
			"start"=>$start,
			"end"=>$end,
			"timeOffTypeId"=>intval($timeOffTypeId),
			"status"=>$status,
			"amount"=>$amount
		);
		if($previous!=0) $values["previousRequest"]=intval($previous);
		$xml="<history>\n";
		foreach($values as $tag=>$value) {
			$xml.=sprintf("<%s>%s</%s>\n",$tag, htmlspecialchars($value, ENT_COMPAT),$tag);
		}

		$xml.="<notes>";
		if($employeeNote!="") {
			$xml.=sprintf('<note from="employee">%s</note>'."\n", $employeeNote ); 
		}
		if($managerNote!="") {
			$xml.=sprintf('<note from="manager">%s</note>'."\n", $managerNote ); 
		}
		$xml.="</notes>\n";
		$xml.="</history>";
		$request->content=$xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $ymd format: "YYYY-m-d"
	 * @param int $requestId
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addhistory
	 */
	function addTimeOffHistoryFromRequest($employeeId, $ymd, $requestId) {
		$request=new BambooHTTPRequest();
		$request->method="PUT";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/time_off/history/";

		$values=array(
			"date"=>$ymd,
			"timeOffRequestId"=>intval($requestId),
			"eventType"=>"used",	
		);
		$xml="<history>\n";
		foreach($values as $tag=>$value) {
			$xml.=sprintf("<%s>%s</%s>\n",$tag, htmlspecialchars($value, ENT_COMPAT),$tag);
		}
		$xml.="</history>";
		$request->content=$xml;
		echo $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $ymd format: "YYYY-mm-dd"
	 * @param int $timeOffTypeId
	 * @param string $note
	 * @param float $amount
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addhistory
	 * @see getTimeOffTypes()
	 */
	function recordTimeOffOverride($employeeId, $ymd, $timeOffTypeId, $note, $amount) {
		$request=new BambooHTTPRequest();
		$request->method="PUT";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/time_off/history/";

		$values=array(
			"date"=>$ymd,
			"timeOffTypeId"=>intval($timeOffTypeId),
			"eventType"=>"override",	
			"note"=>$note,
			"amount"=>$amount
		);
		$xml="<history>\n";
		foreach($values as $tag=>$value) {
			$xml.=sprintf("<%s>%s</%s>\n",$tag, htmlspecialchars($value, ENT_COMPAT),$tag);
		}
		$xml.="</history>";
		$request->content=$xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param string $tableName
	 * @param int $rowId
	 * @param array $values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#updateRow
	 * @see getTables()
	 */
	function updateTableRow($employeeId, $tableName, $rowId, $values) {
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/tables/".$tableName."/".intval($rowId);

		$xml="<row>".$this->prepareKeyValues($values)."</row>";
		$request->content=$xml;

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @param int $categoryId
	 * @param string $fileName
	 * @param string $contentType
	 * @param string $fileData
	 * @param string $shareWithEmployees (yes|no)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#uploadEmployeeFile
	 * @see listEmployeeFiles()
	 */
	function uploadEmployeeFile($employeeId, $categoryId, $fileName, $contentType, $fileData, $shareWithEmployees = 'no') {
		$request=new BambooHttpRequest();
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/files/";
		$request->method="POST";

		$params=array(
			"category"=>$categoryId,
			"fileName"=>$fileName,
			"share"=>$shareWithEmployees
		);
		$request->content=buildMultipart( BAMBOOHR_MULTIPART_BOUNDARY, $params, "file",$fileName,$contentType, $fileData);
		$request->headers[]="Content-Type: multipart/form-data; boundary=".BAMBOOHR_MULTIPART_BOUNDARY;
		$request->headers[]="Content-Length: ".strlen( $request->content );

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $requestId
	 * @param string $status (approved|denied|superceded|requested|canceled)
	 * @param string $note
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#updateRequestStatus
	 */
	function updateTimeOffRequestStatus($requestId, $status, $note) { 
		$request=new BambooHTTPRequest();
		$request->url=$this->baseUrl."/v1/time_off/requests/".intval($requestId)."/status/";
		$request->method="POST";
		$request->content="<request><status>".htmlentities($status,ENT_COMPAT)."</status><note>".htmlentities($note,ENT_COMPAT)."</note></request>";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $categoryId
	 * @param string $fileName
	 * @param string $contentType
	 * @param string $fileData
	 * @param string $shareWithEmployees (yes|no)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#uploadCompanyFile
	 * @see getCompanyFiles()
	 */
	function uploadCompanyFile($categoryId, $fileName, $contentType, $fileData, $shareWithEmployees = 'no') {
		$request=new BambooHttpRequest();
		$request->url=$this->baseUrl."/v1/files/";
		$request->method="POST";

		$params=array(
			"category"=>$categoryId,
			"fileName"=>$fileName,
			"share"=>$shareWithEmployees
		);
		$request->content=buildMultipart( BAMBOOHR_MULTIPART_BOUNDARY, $params, "file",$fileName,$contentType, $fileData);
		$request->headers[]="Content-Type: multipart/form-data; boundary=".BAMBOOHR_MULTIPART_BOUNDARY;
		$request->headers[]="Content-Length: ".strlen( $request->content );

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#listEmployeeFiles
	 */
	function listEmployeeFiles($employeeId){
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/files/view/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#listCompanyFiles
	 */
	function listCompanyFiles(){
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/files/view/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $categoryName
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addEmployeeCategory
	 */
	function addEmployeeFileCategory($categoryName){
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/files/categories/";

		$xml='<employee>';
		$xml.='<category>'.htmlspecialchars($categoryName).'</category>';
		$xml.='</employee>';
		$request->content=$xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param string $categoryName
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addCompanyCategory
	 */
	function addCompanyFileCategory($categoryName){
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/files/categories/";

		$xml='<files>';
		$xml.='<category>'.htmlspecialchars($categoryName).'</category>';
		$xml.='</files>';
		$request->content=$xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int $employeeId
	 * @param int $fileId
	 * @param array $values array(["name" => "new name"],["categoryId" => 1],["shareWithEmployee" => "(yes|no)"]);
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateEmployeeFile
	 */
	function updateEmployeeFile($employeeId, $fileId, $values){
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/files/".intval($fileId)."/";

		$xml = "<file>";
		foreach($values as $name=>$value){
			$xml.="<".htmlspecialchars($name).">".htmlspecialchars($value)."</".htmlspecialchars($name).">";
		}
		$xml.="</file>";
		$request->content=$xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int $fileId
	 * @param array $values array(["name" => "new name"],["categoryId" => 1],["shareWithEmployees" => "(yes|no)"])
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateCompanyFile
	 */
	function updateCompanyFile($fileId, $values){
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/files/".intval($fileId)."/";

		$xml = "<file>";
		foreach($values as $name=>$value){
			$xml.="<".htmlspecialchars($name).">".htmlspecialchars($value)."</".htmlspecialchars($name).">";
		}
		$xml.="</file>";
		$request->content=$xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int $employeeId
	 * @param int $fileId
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#downloadEmployeeFile
	 */
	function downloadEmployeeFile($employeeId, $fileId) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/files/".intval($fileId)."/";
		
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $fileId
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#downloadCompanyFile
	 */
	function downloadCompanyFile($fileId){
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/files/".intval($fileId)."/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * This api is undocumented. It is only useful for importing large numbers of
	 * employees. Look at the test_import.xml file for an example import.
	 *
	 * @param string $xml
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function importEmployees($xml){
		$request=new BambooHTTPRequest();
		$request->method="POST";
		$request->url=$this->baseUrl."/v1/employees/import";
		$request->content=$xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/employees.php#getEmployeeDirectory
	 */
	function getDirectory() {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/directory";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int 
	 * @param int|string (1|2|small|tiny)
	 * @param array array(["width" => 100], ["height" => 100])
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function downloadEmployeePhoto($employeeId, $size, $params=array()) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/".intval($employeeId)."/photo/".urlencode($size);
		if(count($params)>0) {
			$request->url.="?".http_build_query($params);
		}
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string an alias from {@see getTables()}
	 * @param string format: 2012-19-29T11:53:05Z
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#changedEmployeeTables
	 */
	function getChangedEmployeeTable($table,$since) {
		$request=new BambooHTTPRequest();
		$request->method="GET";
		$request->url=$this->baseUrl."/v1/employees/changed/tables/".urlencode($table)."?since=".urlencode($since);
		return $this->httpHandler->sendRequest( $request );
	}
}



?>
