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

		
class SoPreferenceAgent extends SoAgent
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
        parent::__construct($endpoint."Preference.svc", "WcfPreference.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new Preference.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New Preference with default values
     */
     function CreateDefaultPreference()
     {
		$result = $this->sendRequest("CreateDefaultPreference", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new PreferenceDescription.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New PreferenceDescription with default values
     */
     function CreateDefaultPreferenceDescription()
     {
		$result = $this->sendRequest("CreateDefaultPreferenceDescription", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing PreferenceDescription or creates a new PreferenceDescription if the id parameter is empty
     * 
     * @return New or updated PreferenceDescription
     */
	function SavePreferenceDescription($preferenceDescription)
	{
		$result = $this->sendRequest("SavePreferenceDescription", array("PreferenceDescription"=>$preferenceDescription));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new PreferenceDescriptionLine.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New PreferenceDescriptionLine with default values
     */
     function CreateDefaultPreferenceDescriptionLine()
     {
		$result = $this->sendRequest("CreateDefaultPreferenceDescriptionLine", array());
		return $this->getResultFromResponse($result);
     }
        

	/** 
	 * Summary
	 * Save this preference
	 *
	 *@$preference		Preference to be saved. All fields must be filled in, and the preference will be saved on the Associate level only. Setting for other levels is an administrative task and not available through this service.
	 *
	 *@return: 
	 */
	function SavePreference($preference)
	{
		$result = $this->sendRequest("SavePreference", array("Preference"=>$preference));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Saves the tab order. The order is saved pr. user.
	 *
	 *@$tabOrder		Name of the tab control
	 *
	 *@return: 
	 */
	function SaveTabOrder($tabOrder)
	{
		$result = $this->sendRequest("SaveTabOrder", array("TabOrder"=>$tabOrder));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets the tab order.
	 *
	 *@$tabName		Name of the tab control
	 *
	 *@return: Tab order. Array of strings. Each string represent a named tab.
	 */
	function GetTabOrder($tabName)
	{
		$result = $this->sendRequest("GetTabOrder", array("TabName"=>$tabName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a preference by id
	 *
	 *@$id		The id of the preference to load
	 *
	 *@return: The preference loaded
	 */
	function GetPreference($id)
	{
		$result = $this->sendRequest("GetPreference", array("Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves a complete preference object. Preference administrator rights are required to use this
	 *
	 *@$preference		The preference object to be saved
	 *@$removeLowerLevels		If this is true, all user preferences on lower levels will be deleted
	 *
	 *@return: Returns the saved preference
	 */
	function SavePreferenceEntity($preference, $removeLowerLevels)
	{
		$result = $this->sendRequest("SavePreferenceEntity", array("Preference"=>$preference, "RemoveLowerLevels"=>$removeLowerLevels));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a preference by id
	 *
	 *@$id		The id of the preference to delete
	 *
	 *@return: 
	 */
	function DeletePreference($id)
	{
		$result = $this->sendRequest("DeletePreference", array("Id"=>$id));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Delete some preferences by id
	 *
	 *@$ids		The ids of the preference to delete
	 *
	 *@return: 
	 */
	function DeletePreferences($ids)
	{
		$result = $this->sendRequest("DeletePreferences", array("Ids"=>$ids));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets a PreferenceDescription object.
	 * 
	 * @$preferenceDescriptionId		The identifier of the PreferenceDescription object
	 *
	 * @returns PreferenceDescription
	 */ 
	function GetPreferenceDescription($preferenceDescriptionId)
	{
		$result = $this->sendRequest("GetPreferenceDescription", array("PreferenceDescriptionId"=>$preferenceDescriptionId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a PreferenceDescriptionLine object.
	 * 
	 * @$preferenceDescriptionLineId		The identifier of the PreferenceDescriptionLine object
	 *
	 * @returns PreferenceDescriptionLine
	 */ 
	function GetPreferenceDescriptionLine($preferenceDescriptionLineId)
	{
		$result = $this->sendRequest("GetPreferenceDescriptionLine", array("PreferenceDescriptionLineId"=>$preferenceDescriptionLineId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a preference description line from a prefDesc_id and a prefValue
	 *
	 *@$prefDescId		The id of the preference description this line is connected to
	 *@$prefValue		The value of the description line to return
	 *
	 *@return: The preference description line matching the id and the value
	 */
	function GetPreferenceDescriptionLineFromIdAndValue($prefDescId, $prefValue)
	{
		$result = $this->sendRequest("GetPreferenceDescriptionLineFromIdAndValue", array("PrefDescId"=>$prefDescId, "PrefValue"=>$prefValue));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get one or more preferences based on a set of specifications.<br/>The prefDisplayvalue and prefDisplaytooltip are blank (faster processing relative to GetPreferencesWithDisplayValues)
	 *
	 *@$specifications		Array of preference specifications. The key value may be * (asterisk), which means 'all keys within section'. 
	/// 
	/// Note that the semantics of this are more strictly 'all keys actually set at any accessible level for this associate'; you will NOT get entries for preferences that might exist, but have no set value anywhere.
	/// 
	/// You can also have askerisk as the section name. In that case the specification array must contain exactly one entry and the key must also be asterisk. This will return all known preferences in all sections for your associate. It might be a lot, tests have shown that a heavily used database can accumulate up to 500 preferences on a single associate. If the Sentry table/field right preferences have been used, the number could be a lot greater!
	 *
	 *@return: Array of preference values for your given specification(s). More strictly:
	/// 'all keys actually set at any accessible level for this associate'; you will NOT get entries for preferences that might exist, but have no set value anywhere.
	 */
	function GetPreferences($specifications)
	{
		$result = $this->sendRequest("GetPreferences", array("Specifications"=>$specifications));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save this set of preferences all the way to the database.
	 *
	 *@$preferences		Preferences to be saved. Note that all fields must be filled in, and the preference will be saved on the Associate level only! Setting for other levels is an administrative task and not available through this service.
	 *
	 *@return: 
	 */
	function SavePreferences($preferences)
	{
		$result = $this->sendRequest("SavePreferences", array("Preferences"=>$preferences));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get one or more preferences based on a set of specifications<br/>The PrefDisplayValue and PrefDisplaytooltip are populated, at some additional processing cost.
	 *
	 *@$specifications		Array of preference specifications. The key value may be * (asterisk), which means 'all keys within section'. 
	/// 
	/// Note that the semantics of this are more strictly 'all keys actually set at any accessible level for this associate'; you will NOT get entries for preferences that might exist, but have no set value anywhere.
	/// 
	/// You can also have askerisk as the section name. In that case the specification array must contain exactly one entry and the key must also be asterisk. This will return all known preferences in all sections for your associate. It might be a lot, tests have shown that a heavily used database can accumulate up to 500 preferences on a single associate. If the Sentry table/field right preferences have been used, the number could be a lot greater!
	 *
	 *@return: Array of preference values for your given specification(s). More strictly:
	/// 'all keys actually set at any accessible level for this associate'; you will NOT get entries for preferences that might exist, but have no set value anywhere.<br/>The PrefDisplayValue and PrefDisplaytooltip are populated, at some additional processing cost.
	 */
	function GetPreferencesWithDisplayValues($specifications)
	{
		$result = $this->sendRequest("GetPreferencesWithDisplayValues", array("Specifications"=>$specifications));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetTabOrders()
	{
		$result = $this->sendRequest("GetTabOrders", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$tabOrders		
	 *
	 *@return: 
	 */
	function SaveTabOrders($tabOrders)
	{
		$result = $this->sendRequest("SaveTabOrders", array("TabOrders"=>$tabOrders));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

