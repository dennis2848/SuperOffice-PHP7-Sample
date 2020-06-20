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

		
class SoRelationAgent extends SoAgent
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
        parent::__construct($endpoint."Relation.svc", "WcfRelation.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ContactRelationEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ContactRelationEntity with default values
     */
     function CreateDefaultContactRelationEntity()
     {
		$result = $this->sendRequest("CreateDefaultContactRelationEntity", array());
		return $this->getResultFromResponse($result);
     }
        

	/**
	 * Summary
	 * Gets a ContactRelationEntity object.
	 * 
	 * @$contactRelationEntityId		The identifier of the ContactRelationEntity object
	 *
	 * @returns ContactRelationEntity
	 */ 
	function GetContactRelationEntity($contactRelationEntityId)
	{
		$result = $this->sendRequest("GetContactRelationEntity", array("ContactRelationEntityId"=>$contactRelationEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new or updates an existing contact relation.
	 *
	 *@$contactRelationEntity		
	 *
	 *@return: 
	 */
	function SaveContactRelation($contactRelationEntity)
	{
		$result = $this->sendRequest("SaveContactRelation", array("ContactRelationEntity"=>$contactRelationEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes the spesified contact relation.
	 *
	 *@$contactRelationEntityId		
	 *
	 *@return: 
	 */
	function DeleteContactRelation($contactRelationEntityId)
	{
		$result = $this->sendRequest("DeleteContactRelation", array("ContactRelationEntityId"=>$contactRelationEntityId));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

