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

		
class SoPhoneListAgent extends SoAgent
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
        parent::__construct($endpoint."PhoneList.svc", "WcfPhoneList.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Searching the phone list. Using default search preferences or the preferences already set by the PhoneListPreferences Service
	 *
	 *@$searchString		The search string
	 *
	 *@return: The resulting phone list
	 */
	function Search($searchString)
	{
		$result = $this->sendRequest("Search", array("SearchString"=>$searchString));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Searching the phone list. Search is based on the supplied preferences.
	 *
	 *@$searchString		The search string.
	 *@$preferences		The search preferences
	 *
	 *@return: The resulting phone list.
	 */
	function SearchWithPreferences($searchString, $preferences)
	{
		$result = $this->sendRequest("SearchWithPreferences", array("SearchString"=>$searchString, "Preferences"=>$preferences));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of phone list items with the in-parameter as restriction. The in-parameter must be a valid department id (UserGroupId).
	 *
	 *@$departmentId		The department to get the phone list for
	 *
	 *@return: The department phone list
	 */
	function GetDepartmentPhones($departmentId)
	{
		$result = $this->sendRequest("GetDepartmentPhones", array("DepartmentId"=>$departmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of phone list items with the Contacts in the users favorites dropdown list.
	 *
	 *
	 *@return: The favorite contact phone list
	 */
	function GetFavoritesPhones()
	{
		$result = $this->sendRequest("GetFavoritesPhones", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of phone list items for all the persons belonging to a contact (company). The in-parameter must be a valid contact-id.
	 *
	 *@$contactId		The contact id
	 *
	 *@return: The contacts phone list.
	 */
	function GetContactPhones($contactId)
	{
		$result = $this->sendRequest("GetContactPhones", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds a new contact to the history/favorites. Returns the rank of the new history item. If the contact already existed in the history, it isn't added but the rank is updated.
	 *
	 *@$contactId		The contact id
	 *
	 *@return: The rank of the history item
	 */
	function AddToFavorites($contactId)
	{
		$result = $this->sendRequest("AddToFavorites", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Getting Phone List Preferences from the CRM 5 user preferences
	 *
	 *
	 *@return: The Phone List Preferences
	 */
	function GetPreferences()
	{
		$result = $this->sendRequest("GetPreferences", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Setting Phone List Preferences to the CRM 5 user preferences
	 *
	 *@$preferences		The preference that is set as user preferences
	 *
	 *@return: 
	 */
	function SetPreferences($preferences)
	{
		$result = $this->sendRequest("SetPreferences", array("Preferences"=>$preferences));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

