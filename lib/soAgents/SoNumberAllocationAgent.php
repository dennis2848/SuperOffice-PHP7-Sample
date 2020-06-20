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

		
class SoNumberAllocationAgent extends SoAgent
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
        parent::__construct($endpoint."NumberAllocation.svc", "WcfNumberAllocation.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new RefCountEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New RefCountEntity with default values
     */
     function CreateDefaultRefCountEntity()
     {
		$result = $this->sendRequest("CreateDefaultRefCountEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing RefCountEntity or creates a new RefCountEntity if the id parameter is empty
     * 
     * @return New or updated RefCountEntity
     */
	function SaveRefCountEntity($refCountEntity)
	{
		$result = $this->sendRequest("SaveRefCountEntity", array("RefCountEntity"=>$refCountEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the RefCountEntity
	 * 
	 * @$refCountEntityId		The identity of the RefCountEntity
	 */
	function DeleteRefCountEntity($refCountEntityId)
	{
		$result = $this->sendRequest("DeleteRefCountEntity", array("RefCountEntity"=>$refCountEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a RefCountEntity object.
	 * 
	 * @$refCountEntityId		The identifier of the RefCountEntity object
	 *
	 * @returns RefCountEntity
	 */ 
	function GetRefCountEntity($refCountEntityId)
	{
		$result = $this->sendRequest("GetRefCountEntity", array("RefCountEntityId"=>$refCountEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves default numbering values in preferences
	 *
	 *@$refCountEntity		The refCountEntity that holds the values that will be saved
	 *
	 *@return: void
	 */
	function SaveDefaultNumbering($refCountEntity)
	{
		$result = $this->sendRequest("SaveDefaultNumbering", array("RefCountEntity"=>$refCountEntity));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns true or false if Automatically create new counters for new document templates
	 *
	 *
	 *@return: Is NumberEachTemplate?
	 */
	function GetNumberEachTemplate()
	{
		$result = $this->sendRequest("GetNumberEachTemplate", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves true or false if Automatically create new counters for new document templates
	 *
	 *@$setValue		true or false if Automatically create new counters for new document templates
	 *
	 *@return: void
	 */
	function SetNumberEachTemplate($setValue)
	{
		$result = $this->sendRequest("SetNumberEachTemplate", array("SetValue"=>$setValue));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

