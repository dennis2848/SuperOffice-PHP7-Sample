<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoContactAgent short summary.
 *
 * SoContactAgent description.
 *
 * @version 1.0
 * @author yanjunl
 */

		
class SoTimeZoneAgent extends SoAgent
{

	/**
     * @$endpoint       web service end point
     * @$ticket     NetServer ticket
     * @$application#token      private token of application
     * @$headerNamespace        namespace for request header
     * @$timeout        request timeout time
     * @$responseTimeout        response timeout time
     * @$portName web service port
     */
    function __construct($endpoint, $ticket = "", $applicationToken = "", $headerNamespace = "", $timeout = 0, $responseTimeout = 30, $portName = '')        
    {
        parent::__construct($endpoint."TimeZone.svc", "WcfTimeZone.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Initalizes the TimeZoneData
	 *
	 *
	 *@return: 
	 */
	function InitializeTimeZoneData()
	{
		$result = $this->sendRequest("InitializeTimeZoneData", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the base timezone id.
	 *
	 *
	 *@return: Returns the base timezone id. Returns 0 if not set.
	 */
	function GetBaseTimeZoneId()
	{
		$result = $this->sendRequest("GetBaseTimeZoneId", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve time zone data from the SuperOffice server and update TimeZone data in the database
	 *
	 *
	 *@return: Returns true if the operation succeeded
	 */
	function UpdateTimeZoneData()
	{
		$result = $this->sendRequest("UpdateTimeZoneData", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check to see if new timezone data is available
	 *
	 *
	 *@return: Returns true if new timezone info is found available, false otherwise
	 */
	function CheckNewTimeZoneDataAvailable()
	{
		$result = $this->sendRequest("CheckNewTimeZoneDataAvailable", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggles active state of a single row in the TZLocation table
	 *
	 *@$id		Id of row to toggle active state on
	 *
	 *@return: 
	 */
	function ToggleActiveTimeZoneRow($id)
	{
		$result = $this->sendRequest("ToggleActiveTimeZoneRow", array("Id"=>$id));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Toggles active state of a single row in the TZLocation table
	 *
	 *@$filter		Filter timezones
	 *@$active		Set active to true or false
	 *
	 *@return: 
	 */
	function SetActiveTimeZonesByFilter($filter, $active)
	{
		$result = $this->sendRequest("SetActiveTimeZonesByFilter", array("Filter"=>$filter, "Active"=>$active));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get the time time zone data was last updated
	 *
	 *
	 *@return: Time of last update
	 */
	function TimeOfLastTimeZoneUpdate()
	{
		$result = $this->sendRequest("TimeOfLastTimeZoneUpdate", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set the base timezone id.
	 *
	 *@$timezoneId		The timezone id to save
	 *
	 *@return: Returns true if setting of base timezone was done
	 */
	function SetBaseTimeZoneId($timezoneId)
	{
		$result = $this->sendRequest("SetBaseTimeZoneId", array("TimezoneId"=>$timezoneId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the id of the default timezone preference with deflevel system wide
	 *
	 *
	 *@return: The id of the system wide default timezone preference
	 */
	function GetDefaultTimeZonePreference()
	{
		$result = $this->sendRequest("GetDefaultTimeZonePreference", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes all time zone data (locations and rules) from the database
	 *
	 *
	 *@return: 
	 */
	function DeleteTimeZones()
	{
		$result = $this->sendRequest("DeleteTimeZones", array());	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set active state of singe row in the TZLocation table
	 *
	 *@$id		Id of row to set active state on
	 *@$active		Set active to true or false
	 *
	 *@return: 
	 */
	function SetActiveTimeZoneRow($id, $active)
	{
		$result = $this->sendRequest("SetActiveTimeZoneRow", array("Id"=>$id, "Active"=>$active));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

