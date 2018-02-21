<?php
/**
 * BambooAPI.php
 */

namespace BambooHR\API;

use BambooHR\API\Injector\BambooHTTPRequestInjector;

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

	use BambooHTTPRequestInjector;

	protected $companyDomain;
	protected $httpHandler;
	protected $baseUrl = "https://api.bamboohr.com/api/gateway.php";

	/**
	 *
	 *
	 * @param string     $companyDomain Either the subdomain of a BambooHR account ("example.bamboohr.com" => "example") or the full domain ("example.bamboohr.com")
	 * @param BambooHTTP $http          The underlying object used for communicating with the API, defaults to an instance of BambooCurlHTTP
	 * @param string     $baseUrl       The base API url, defaults to https://api.bamboohr.com/api/gateway.php
	 */
	function __construct($companyDomain, BambooHTTP $http=null, $baseUrl=null) {
		$this->httpHandler = $http ?: new BambooCurlHTTP();
		if ($baseUrl) {
			$this->baseUrl = $baseUrl;
		}
		$this->companyDomain = $companyDomain;
		$this->baseUrl = $this->baseUrl .= "/$companyDomain";
	}

	/**
	 * Set the api key to use.
	 *
	 * @param string $key the API key
	 * @return void
	 */
	function setSecretKey($key) {
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
	 * @param string $email          An email for a user in the company account
	 * @param string $password       The password
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/login.php
	 */
	function requestSecretKey($applicationKey, $email, $password) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/login";
		$request->content = "applicationKey=" . urlencode($applicationKey) . "&user=" . urlencode($email) . "&password=" . urlencode($password);
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * Use the Login API to get a key for use in later API requests. Also use the
	 * response to set up the authentication for future requests. Using this API
	 * requires you to contact BambooHR to get an applicationKey.
	 *
	 * @param string $applicationKey To ask about an applicationKey, email api@bamboohr.com
	 * @param string $email          An email for a user in the account
	 * @param string $password       the password
	 * @return bool
	 * @link http://www.bamboohr.com/api/documentation/login.php
	 */
	function login($applicationKey, $email, $password) {
		$response = $this->requestSecretKey($applicationKey, $email, $password);
		if ($response->isError()) {
			return false;
		}
		$xml = new \SimpleXMLElement($response->content);
		if ($xml->response != 'authenticated') {
			return false;
		}
		$this->setSecretKey($xml->key);
		$this->baseUrl = $xml->apiUrl . $this->companyDomain;
		return true;
	}

	/**
	 *
	 *
	 * @param int   $employeeId the employee id
	 * @param array $fields     an array of field aliases or ids
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#getEmployee
	 */
	function getEmployee($employeeId, $fields=array()) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/?fields=" . urlencode(implode(",", $fields));

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $reportId         the report id
	 * @param string $format           one of xml, csv, xls, json, pdf
	 * @param bool   $filterDuplicates option to remove duplicate rows
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#requestCompanyReport
	 */
	function getReport($reportId, $format, $filterDuplicates=true) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/reports/" . intval($reportId) . "/?format=" . $format;
		if (!$filterDuplicates) {
			$request->url .= "&fd=no";
		}
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * Takes a array of field ids for keys, and values, and creates xml in the format expected by the api.
	 *
	 * @param array $values key-value pairs of field id to value
	 * @return string
	 */
	private function prepareKeyValues($values) {
		$xml = "";
		foreach ($values as $key => $value) {
			$extraAttr = array();
			if (is_array($value)) {
				$extraAttr = $value['extra'];
				$value = $value['value'];
			}
			$xml .= sprintf("<field id=\"%s\" ", htmlspecialchars($key, ENT_COMPAT));
			foreach ($extraAttr as $name => $attValue) {
				$xml .= sprintf("%s=\"%s\"", $name, htmlspecialchars($attValue, ENT_COMPAT));
			}

			$xml .= ">" . htmlspecialchars($value, ENT_COMPAT ) . "</field>";
		}
		return $xml;
	}

	/**
	 * Update an employee. pass a map of "fieldId" => "value". Does not work for table fields.
	 *
	 * @param int   $employeeId  the employee id
	 * @param array $fieldValues the array of field id keys to values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateEmployee
	 */
	function updateEmployee($employeeId, $fieldValues=array()) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId);
		$request->headers = array("Content-type:" => "text/xml");

		$xml = sprintf('<employee id="%d">', $employeeId);
		$xml .= $this->prepareKeyValues($fieldValues);
		$xml .= "</employee>";
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param array $initialFieldValues the array of field id keys to values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addEmployee
	 */
	function addEmployee($initialFieldValues=array()) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/";
		$request->headers = array("Content-type" => "text/xml");

		$xml = '<employee>' . $this->prepareKeyValues($initialFieldValues) . "</employee>";
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $format           one of xml, csv, xls, json, pdf
	 * @param array  $fields           an array of field ids or aliases
	 * @param bool   $filterDuplicates whether to filter duplicate values when employee has multiple rows
	 * @param string $title            the title to give the custom report
	 * @param string $lastChanged      Date in ISO 8601 format, like: 2012-10-17T16:00:00Z
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#requestCustomReport
	 */
	function getCustomReport($format, $fields, $filterDuplicates=true,$title="", $lastChanged="") {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/reports/custom/?format=" . $format;
		$request->headers = array("Content-type", "text/xml");
		$xml = '<report>';
		if ($title != "") {
			$xml .= "<title>" . htmlentities($title) . "</title>";
		}

		if ($lastChanged != "") {
			$xml .= "<filters><lastChanged includeNull=\"no\" >" . htmlentities($lastChanged) . "</lastChanged></filters>";
		}

		$xml .= '<fields>';
		if (!$filterDuplicates) {
			$xml .= "<filterDuplicates>no</filterDuplicates>";
		}
		foreach ($fields as $field) {
			$xml .= sprintf('<field id="%s" />', $field );
		}
		$xml .= '</fields></report>';
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId the employee id
	 * @param string $tableName  {@link http://www.bamboohr.com/api/documentation/tables.php#tables List of valid tables}
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#getTable
	 */
	function getTable($employeeId, $tableName) {
		if ($employeeId != "all") {
			$employeeId = intval($employeeId);
		}
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . $employeeId . "/tables/" . urlencode($tableName) . "/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $since Date in ISO 8601 format, like: 2012-10-17T16:00:00Z
	 * @param string $type  only include employees with these kinds of changes (all|updated|inserted|deleted)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/changes.php#description
	 */
	function getChangedEmployees($since, $type="all") {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/changed/?since=" . urlencode($since) . "&type=" . urlencode($type);
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * @param string $type a kind of metadata
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/metadata.php
	 */
	function getMetaData($type) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/meta/$type/";
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
	 * @param int    $employeeId the employee id
	 * @param string $date       (date in the format YYYY-mm-dd)
	 * @param int    $precision  how many digits after the decimal point to include.
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/time_off.php#estimateFutureBalance
	 */
	function getTimeOffBalances($employeeId,$date,$precision=1) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/time_off/calculator?end=" . $date . "&precision=" . $precision;
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
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/time_off/requests/?";
		if (isset($arr['id'])) {
			$request->url .= "id=" . urlencode($arr['id']) . "&";
		}
		if (isset($arr['action'])) {
			$request->url .= "action=" . urlencode($arr['action']) . "&";
		}
		if (isset($arr['type'])) {
			$request->url .= "type=" . urlencode($arr['type']) . "&";
		}
		if (isset($arr['status'])) {
			$request->url .= "status=" . urlencode($arr['status']) . "&";
		}
		if (isset($arr['start'])) {
			$request->url .= "start=" . urlencode($arr['start']) . "&";
		}
		if (isset($arr['end'])) {
			$request->url .= "end=" . urlencode($arr['end']) . "&";
		}
		if (isset($arr['employeeId'])) {
			$request->url .= "employeeId=" . urlencode($arr['employeeId']) . "&";
		}
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $start      format: "YYYY-mm-dd"
	 * @param string $end        format "YYYY-mm-dd"
	 * @param string $status     (approved|denied|superceded|requested|canceled)
	 * @param int    $type       A time off type id
	 * @param int    $employeeId An employee id
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @see getTimeOffTypes()
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#requests
	 */
	function getTimeOffRequests($start="", $end="", $status="", $type="", $employeeId=0) {
		$arr = array();
		if ($type != "") {
			$arr["type"] = $type;
		}
		if ($status != "") {
			$arr["status"] = $status;
		}
		if ($start != "") {
			$arr["start"] = $start;
		}
		if ($end != "") {
			$arr["end"] = $end;
		}
		if ($employeeId != 0) {
			$arr["employeeId"] = $employeeId;
		}
		return $this->getTimeOffRequestsArr($arr);
	}

	/**
	 *
	 * @param int    $employeeId An employee id
	 * @param string $tableName  A table alias. Check out  function
	 * @param array  $values     an array of table field alias keys to values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @see getTables()
	 * @link http://www.bamboohr.com/api/documentation/tables.php#addRow
	 */
	function addTableRow($employeeId, $tableName, $values) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/tables/" . $tableName . "/";

		$xml = "<row>" . $this->prepareKeyValues($values) . "</row>";
		$request->content = $xml;

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId    employee id
	 * @param string $start         format: YYYY-mm-dd
	 * @param string $end           format: YYYY-mm-dd
	 * @param int    $timeOffTypeId the time off type id
	 * @param float  $amount        the amount of the request
	 * @param string $status        (approved|denied|superceded|requested|canceled)
	 * @param string $employeeNote  the employee note
	 * @param string $managerNote   the manager note
	 * @param int    $previous      the time off request being change if there is one
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addrequest
	 */
	function addTimeOffRequest($employeeId, $start, $end, $timeOffTypeId, $amount, $status, $employeeNote, $managerNote,$previous=0) {
		$request = $this->getBambooHttpRequest();
		$request->method = "PUT";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/time_off/request/";

		$values = array(
			"start" => $start,
			"end" => $end,
			"timeOffTypeId" => intval($timeOffTypeId),
			"status" => $status,
			"amount" => $amount
		);
		if ($previous != 0) {
			$values["previousRequest"] = intval($previous);
		}
		$xml = "<history>\n";
		foreach ($values as $tag => $value) {
			$xml .= sprintf("<%s>%s</%s>\n", $tag, htmlspecialchars($value, ENT_COMPAT), $tag);
		}

		$xml .= "<notes>";
		if ($employeeNote != "") {
			$xml .= sprintf('<note from="employee">%s</note>' . "\n", $employeeNote );
		}
		if ($managerNote != "") {
			$xml .= sprintf('<note from="manager">%s</note>' . "\n", $managerNote );
		}
		$xml .= "</notes>\n";
		$xml .= "</history>";
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId the employee id
	 * @param string $ymd        format: "YYYY-m-d"
	 * @param int    $requestId  the request this time off history is linked to
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addhistory
	 */
	function addTimeOffHistoryFromRequest($employeeId, $ymd, $requestId) {
		$request = $this->getBambooHttpRequest();
		$request->method = "PUT";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/time_off/history/";

		$values = array(
			"date" => $ymd,
			"timeOffRequestId" => intval($requestId),
			"eventType" => "used",
		);
		$xml = "<history>\n";
		foreach ($values as $tag => $value) {
			$xml .= sprintf("<%s>%s</%s>\n", $tag, htmlspecialchars($value, ENT_COMPAT), $tag);
		}
		$xml .= "</history>";
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId    the employee id
	 * @param string $ymd           format: "YYYY-mm-dd"
	 * @param int    $timeOffTypeId the time off type this time off should be recorded for
	 * @param string $note          the note or reason for this time off
	 * @param float  $amount        the amount of time off
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#addhistory
	 * @see getTimeOffTypes()
	 */
	function recordTimeOffOverride($employeeId, $ymd, $timeOffTypeId, $note, $amount) {
		$request = $this->getBambooHttpRequest();
		$request->method = "PUT";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/time_off/history/";

		$values = array(
			"date" => $ymd,
			"timeOffTypeId" => intval($timeOffTypeId),
			"eventType" => "override",
			"note" => $note,
			"amount" => $amount
		);
		$xml = "<history>\n";
		foreach ($values as $tag => $value) {
			$xml .= sprintf("<%s>%s</%s>\n", $tag, htmlspecialchars($value, ENT_COMPAT), $tag);
		}
		$xml .= "</history>";
		$request->content = $xml;
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId employee id
	 * @param string $tableName  the name of the table to update
	 * @param int    $rowId      the id of the row in the table
	 * @param array  $values     an array of table field alias keys to values
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#updateRow
	 * @see getTables()
	 */
	function updateTableRow($employeeId, $tableName, $rowId, $values) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/tables/" . $tableName . "/" . intval($rowId);

		$xml = "<row>" . $this->prepareKeyValues($values) . "</row>";
		$request->content = $xml;

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $employeeId         employee id
	 * @param int    $categoryId         file category (folder) to add this file to
	 * @param string $fileName           the name of the file
	 * @param string $contentType        the mime type to associate with the file
	 * @param string $fileData           the contents of the file
	 * @param string $shareWithEmployees (yes|no)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#uploadEmployeeFile
	 * @see listEmployeeFiles()
	 */
	function uploadEmployeeFile($employeeId, $categoryId, $fileName, $contentType, $fileData, $shareWithEmployees = 'no') {
		$request = $this->getBambooHttpRequest();
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/files/";
		$request->method = "POST";

		$params = array(
			"category" => $categoryId,
			"fileName" => $fileName,
			"share" => $shareWithEmployees
		);
		$request->content = $request->buildMultipart( $request::BAMBOOHR_MULTIPART_BOUNDARY, $params, "file", $fileName, $contentType, $fileData);
		$request->headers[] = "Content-Type: multipart/form-data; boundary=" . $request::BAMBOOHR_MULTIPART_BOUNDARY;
		$request->headers[] = "Content-Length: " . strlen( $request->content );

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $requestId the id of the request to update
	 * @param string $status    (approved|denied|superceded|requested|canceled)
	 * @param string $note      comment to associate with the status change
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/time_off.php#updateRequestStatus
	 */
	function updateTimeOffRequestStatus($requestId, $status, $note) {
		$request = $this->getBambooHttpRequest();
		$request->url = $this->baseUrl . "/v1/time_off/requests/" . intval($requestId) . "/status/";
		$request->method = "POST";
		$request->content = "<request><status>" . htmlentities($status, ENT_COMPAT) . "</status><note>" . htmlentities($note, ENT_COMPAT) . "</note></request>";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int    $categoryId         file category (folder) to add file to
	 * @param string $fileName           file name
	 * @param string $contentType        the mime type of the file
	 * @param string $fileData           the data to store with the file
	 * @param string $shareWithEmployees (yes|no)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#uploadCompanyFile
	 * @see getCompanyFiles()
	 */
	function uploadCompanyFile($categoryId, $fileName, $contentType, $fileData, $shareWithEmployees = 'no') {
		$request = $this->getBambooHttpRequest();
		$request->url = $this->baseUrl . "/v1/files/";
		$request->method = "POST";

		$params = array(
			"category" => $categoryId,
			"fileName" => $fileName,
			"share" => $shareWithEmployees
		);
		$request->content = $request->buildMultipart( $request::BAMBOOHR_MULTIPART_BOUNDARY, $params, "file", $fileName, $contentType, $fileData);
		$request->headers[] = "Content-Type: multipart/form-data; boundary=" . $request::BAMBOOHR_MULTIPART_BOUNDARY;
		$request->headers[] = "Content-Length: " . strlen( $request->content );

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $employeeId the employee id
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#listEmployeeFiles
	 */
	function listEmployeeFiles($employeeId) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/files/view/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#listCompanyFiles
	 */
	function listCompanyFiles() {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/files/view/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $categoryName the name of the file category (folder)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addEmployeeCategory
	 */
	function addEmployeeFileCategory($categoryName) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/files/categories/";

		$xml = '<employee>';
		$xml .= '<category>' . htmlspecialchars($categoryName) . '</category>';
		$xml .= '</employee>';
		$request->content = $xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param string $categoryName the name of the file category (folder)
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#addCompanyCategory
	 */
	function addCompanyFileCategory($categoryName) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/files/categories/";

		$xml = '<files>';
		$xml .= '<category>' . htmlspecialchars($categoryName) . '</category>';
		$xml .= '</files>';
		$request->content = $xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int   $employeeId employee id
	 * @param int   $fileId     file id
	 * @param array $values     array(["name" => "new name"],["categoryId" => 1],["shareWithEmployee" => "(yes|no)"]);
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateEmployeeFile
	 */
	function updateEmployeeFile($employeeId, $fileId, $values) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/files/" . intval($fileId) . "/";

		$xml = "<file>";
		foreach ($values as $name => $value) {
			$xml .= "<" . htmlspecialchars($name) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($name) . ">";
		}
		$xml .= "</file>";
		$request->content = $xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int   $fileId file id
	 * @param array $values array(["name" => "new name"],["categoryId" => 1],["shareWithEmployees" => "(yes|no)"])
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#updateCompanyFile
	 */
	function updateCompanyFile($fileId, $values) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/files/" . intval($fileId) . "/";

		$xml = "<file>";
		foreach ($values as $name => $value) {
			$xml .= "<" . htmlspecialchars($name) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($name) . ">";
		}
		$xml .= "</file>";
		$request->content = $xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @param int $employeeId employee id
	 * @param int $fileId     file id
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#downloadEmployeeFile
	 */
	function downloadEmployeeFile($employeeId, $fileId) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/files/" . intval($fileId) . "/";

		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int $fileId file id
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/employees.php#downloadCompanyFile
	 */
	function downloadCompanyFile($fileId) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/files/" . intval($fileId) . "/";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 * This api is undocumented. It is only useful for importing large numbers of
	 * employees. Look at the test_import.xml file for an example import.
	 *
	 * @param string $xml the xml representing files for importing
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function importEmployees($xml) {
		$request = $this->getBambooHttpRequest();
		$request->method = "POST";
		$request->url = $this->baseUrl . "/v1/employees/import";
		$request->content = $xml;

		return $this->httpHandler->sendRequest($request);
	}

	/**
	 *
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.dev5.bamboohr.com/api/documentation/employees.php#getEmployeeDirectory
	 */
	function getDirectory() {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/directory";
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param int        $employeeId the employee id
	 * @param int|string $size       (1|2|small|tiny)
	 * @param array      $params     array(["width" => 100], ["height" => 100])
	 * @return \BambooHR\API\BambooHTTPResponse
	 */
	function downloadEmployeePhoto($employeeId, $size, $params=array()) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/" . intval($employeeId) . "/photo/" . urlencode($size);
		if (count($params) > 0) {
			$request->url .= "?" . http_build_query($params);
		}
		return $this->httpHandler->sendRequest( $request );
	}

	/**
	 *
	 * @param string $table an alias from {@see getTables()}
	 * @param string $since format: 2012-19-29T11:53:05Z
	 * @return \BambooHR\API\BambooHTTPResponse
	 * @link http://www.bamboohr.com/api/documentation/tables.php#changedEmployeeTables
	 */
	function getChangedEmployeeTable($table,$since) {
		$request = $this->getBambooHttpRequest();
		$request->method = "GET";
		$request->url = $this->baseUrl . "/v1/employees/changed/tables/" . urlencode($table) . "?since=" . urlencode($since);
		return $this->httpHandler->sendRequest( $request );
	}
}
