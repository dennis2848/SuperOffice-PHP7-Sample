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

		
class SoViewStateAgent extends SoAgent
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
        parent::__construct($endpoint."ViewState.svc", "WcfViewState.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/**
	 * Summary
	 * Gets a History object.
	 * 
	 * @$historyId		The identifier of the History object
	 *
	 * @returns History
	 */ 
	function GetHistory($historyId)
	{
		$result = $this->sendRequest("GetHistory", array("HistoryId"=>$historyId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the current (most recent) value of the history list. This is the item with rank = 1. If no item exists a default value is returned. This is usually the first item in the table representing the history list.
	 *
	 *@$historyName		Name of the history list, e.g. contact, project
	 *
	 *@return: The current (most recent) history item
	 */
	function GetCurrent($historyName)
	{
		$result = $this->sendRequest("GetCurrent", array("HistoryName"=>$historyName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saving the current history item. This history item is saved with Rank = 1, and all the remaining elements rank values are shifted one down. The list is maintained with the max lenght of the History list length preference.
	 *
	 *@$current		The new current history element.
	 *
	 *@return: The current (most recent) history item
	 */
	function SaveCurrent($current)
	{
		$result = $this->sendRequest("SaveCurrent", array("Current"=>$current));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the next current item. If no item exists a default value is returned. This is usually the first item in the table representing the history list.
	 *
	 *@$historyName		Name of the history list, e.g. contact, project
	 *@$id		Id of the history element, e.g. Contact id
	 *
	 *@return: The current value.
	 */
	function GetNextCurrent($historyName, $id)
	{
		$result = $this->sendRequest("GetNextCurrent", array("HistoryName"=>$historyName, "Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the previous current item. If no item exists a default value is returned. This is usually the first item in the table representing the history list.
	 *
	 *@$historyName		Name of the history list, e.g. contact, project
	 *@$id		Id of the history element, e.g. Contact id
	 *
	 *@return: The current value.
	 */
	function GetPreviousCurrent($historyName, $id)
	{
		$result = $this->sendRequest("GetPreviousCurrent", array("HistoryName"=>$historyName, "Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes the history element
	 *
	 *@$historyName		Name of the history list, e.g. contact, project
	 *@$id		Id of the history element, e.g. Contact id
	 *
	 *@return: 
	 */
	function DeleteHistory($historyName, $id)
	{
		$result = $this->sendRequest("DeleteHistory", array("HistoryName"=>$historyName, "Id"=>$id));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns all history items that belong to the currently logged in user
	 *
	 *
	 *@return: Array of History items
	 */
	function GetHistories()
	{
		$result = $this->sendRequest("GetHistories", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the named history list that belong to the currently logged in user
	 *
	 *@$historyName		Name of the history list
	 *
	 *@return: Array of History items
	 */
	function GetHistoriesByName($historyName)
	{
		$result = $this->sendRequest("GetHistoriesByName", array("HistoryName"=>$historyName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the named history lists that belong to the currently logged in user
	 *
	 *@$historyNames		String array of list names
	 *
	 *@return: Array of History items
	 */
	function GetHistoriesByNames($historyNames)
	{
		$result = $this->sendRequest("GetHistoriesByNames", array("HistoryNames"=>$historyNames));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Replaces the existing history-list for the currently logged in user. All elements must belong to the same history list. If not they are ignored.
	 *
	 *@$historyName		
	 *@$history		Array of new history items to save.
	 *
	 *@return: Array of the saved History items
	 */
	function SaveHistories($historyName, $history)
	{
		$result = $this->sendRequest("SaveHistories", array("HistoryName"=>$historyName, "History"=>$history));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the logged on user's preferred history list length. Will return the system preference if no user preferences are available.
	 *
	 *
	 *@return: The history list lenght
	 */
	function GetHistoryLengthPrefValue()
	{
		$result = $this->sendRequest("GetHistoryLengthPrefValue", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set the logged on user's preferred history list length.
	 *
	 *@$length		The new history list lenght
	 *
	 *@return: 
	 */
	function SetHistoryLengthPrefValue($length)
	{
		$result = $this->sendRequest("SetHistoryLengthPrefValue", array("Length"=>$length));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Saves the history elements as the current value for their respective lists. If more than one item is submitted for the same list, they are added sequently, meaning that the last one is the most current.
	 *
	 *@$currents		Array of new history items to save.
	 *
	 *@return: Array of the saved History items
	 */
	function SaveCurrents($currents)
	{
		$result = $this->sendRequest("SaveCurrents", array("Currents"=>$currents));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns history data for the named entities and the given ids - which may not directly correspond to the current history records in the database.<para/>Use this method if you know exactly which items you need, regardless of whether they are in the current history or not.<para/>The history in the database is not changed or even looked at by this method.
	 *
	 *@$requests		Array of request objects that define what entities we are requesting history information for
	 *
	 *@return: On history item for each history name/id pair specified, in exactly the same order as specified.<para/>If a specified item cannot be found in the database, its Id will be 0 and its name will be blank in the return array.
	 */
	function GetHistoriesByNamesAndIds($requests)
	{
		$result = $this->sendRequest("GetHistoriesByNamesAndIds", array("Requests"=>$requests));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

