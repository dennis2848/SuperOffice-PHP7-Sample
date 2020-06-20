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

		
class SoMDOAgent extends SoAgent
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
        parent::__construct($endpoint."MDO.svc", "WcfMDO.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Method to get a MDO list.
	 *
	 *@$name		Conceptual name of the MDO list-
	 *@$forceFlatList		Force the list to be flat
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$onlyHistory		If true, return only history items
	 *
	 *@return: Array of MDOListItem
	 */
	function GetList($name, $forceFlatList, $additionalInfo, $onlyHistory)
	{
		$result = $this->sendRequest("GetList", array("Name"=>$name, "ForceFlatList"=>$forceFlatList, "AdditionalInfo"=>$additionalInfo, "OnlyHistory"=>$onlyHistory));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method to get a MDO list with own history list.
	 *
	 *@$name		Conceptual name of the MDO list-
	 *@$forceFlatList		Force the list to be flat
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$historyItems		An array of ids, used to get the history list
	 *@$onlyHistory		If true, return only history items
	 *
	 *@return: Array of MDOListItem
	 */
	function GetListWithHistory($name, $forceFlatList, $additionalInfo, $historyItems, $onlyHistory)
	{
		$result = $this->sendRequest("GetListWithHistory", array("Name"=>$name, "ForceFlatList"=>$forceFlatList, "AdditionalInfo"=>$additionalInfo, "HistoryItems"=>$historyItems, "OnlyHistory"=>$onlyHistory));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method to get a MDO list with restrictions.
	 *
	 *@$name		Conceptual name of the MDO list-
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$searchValue		the value used to restrict the list
	 *
	 *@return: Array of MDOListItem
	 */
	function GetListWithRestriction($name, $additionalInfo, $searchValue)
	{
		$result = $this->sendRequest("GetListWithRestriction", array("Name"=>$name, "AdditionalInfo"=>$additionalInfo, "SearchValue"=>$searchValue));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method returns a simple flat MDO List.
	 *
	 *@$name		Conceptual name of the MDO list-
	 *
	 *@return: Array of MDOListItem
	 */
	function GetSimpleList($name)
	{
		$result = $this->sendRequest("GetSimpleList", array("Name"=>$name));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a single list item
	 *
	 *@$listName		Conceptual name of the MDO list
	 *@$id		Id of list item
	 *
	 *@return: Single MDO list item
	 */
	function GetListItem($listName, $id)
	{
		$result = $this->sendRequest("GetListItem", array("ListName"=>$listName, "Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a list of all MDO List names. These names can also be used with the Archive agent as ProviderNames.
	 *
	 *
	 *@return: Array of list names.
	 */
	function GetListNames()
	{
		$result = $this->sendRequest("GetListNames", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method returns a flat Selectable MDO List.
	 *
	 *@$name		Conceptual name of the MDO list
	 *
	 *@return: Array of SelectableMDOListItem
	 */
	function GetSelectableSimpleList($name)
	{
		$result = $this->sendRequest("GetSelectableSimpleList", array("Name"=>$name));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method to get a Selectable MDO list with restrictions.
	 *
	 *@$name		Conceptual name of the MDO list
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$searchValue		the value used to restrict the list
	 *
	 *@return: Array of SelectableMDOListItem
	 */
	function GetSelectableListWithRestriction($name, $additionalInfo, $searchValue)
	{
		$result = $this->sendRequest("GetSelectableListWithRestriction", array("Name"=>$name, "AdditionalInfo"=>$additionalInfo, "SearchValue"=>$searchValue));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method to get a Selectable MDO list with own history list.
	 *
	 *@$name		Conceptual name of the MDO list.
	 *@$forceFlatList		Force the list to be flat
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$historyItems		An array of ids, used to get the history list
	 *@$onlyHistory		If true, return only history items
	 *
	 *@return: Array of SelectableMDOListItem
	 */
	function GetSelectableListWithHistory($name, $forceFlatList, $additionalInfo, $historyItems, $onlyHistory)
	{
		$result = $this->sendRequest("GetSelectableListWithHistory", array("Name"=>$name, "ForceFlatList"=>$forceFlatList, "AdditionalInfo"=>$additionalInfo, "HistoryItems"=>$historyItems, "OnlyHistory"=>$onlyHistory));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method to get a Selectable MDO list.
	 *
	 *@$name		Conceptual name of the MDO list.
	 *@$forceFlatList		Force the list to be flat
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$onlyHistory		If true, return only history items
	 *
	 *@return: Array of SelectableMDOListItem
	 */
	function GetSelectableList($name, $forceFlatList, $additionalInfo, $onlyHistory)
	{
		$result = $this->sendRequest("GetSelectableList", array("Name"=>$name, "ForceFlatList"=>$forceFlatList, "AdditionalInfo"=>$additionalInfo, "OnlyHistory"=>$onlyHistory));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves the selected values as selected by their given list representation.
	 *
	 *@$name		Conceptual name of the MDO list
	 *@$additionalInfo		Additional info to the MDO provider
	 *@$selectableMDOList		Items to be updated
	 *
	 *@return: Array of updated SelectableMDOListItems
	 */
	function SetSelected($name, $additionalInfo, $selectableMDOList)
	{
		$result = $this->sendRequest("SetSelected", array("Name"=>$name, "AdditionalInfo"=>$additionalInfo, "SelectableMDOList"=>$selectableMDOList));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

