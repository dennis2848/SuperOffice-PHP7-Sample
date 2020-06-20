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

		
class SoAssociateAgent extends SoAgent
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
        parent::__construct($endpoint."Associate.svc", "WcfAssociate.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/**
	 * Summary
	 * Gets a Associate object.
	 * 
	 * @$associateId		The identifier of the Associate object
	 *
	 * @returns Associate
	 */ 
	function GetAssociate($associateId)
	{
		$result = $this->sendRequest("GetAssociate", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the associate that belongs to this person if the person is an associate.
	 *
	 *@$personId		The person id
	 *
	 *@return: Associate if person is associate
	 */
	function GetAssociateByPersonId($personId)
	{
		$result = $this->sendRequest("GetAssociateByPersonId", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of strings(notepad pages).
	 *
	 *@$associateId		The associate id
	 *
	 *@return: Returns an array of strings(notepad pages).
	 */
	function GetNote($associateId)
	{
		$result = $this->sendRequest("GetNote", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Saves an array of strings(notepad pages).
	 *
	 *@$associateId		The associate id
	 *@$note		The array of strings(notepad pages).
	 *
	 *@return: 
	 */
	function SaveNote($associateId, $note)
	{
		$result = $this->sendRequest("SaveNote", array("AssociateId"=>$associateId, "Note"=>$note));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of Associate objects.
	 * 
	 * @$associateIds		The identifiers of the Associate object
	 *
	 * @returns Array of Associate objects
	 */ 
	function GetAssociateList($associateIds)
	{
		$result = $this->sendRequest("GetAssociateList", array("AssociateIds"=>$associateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a array of associate , based on DiaryGroupType and groupId. The differernt types are, Userdefined, Usergroup and ResourceHeadings
	 *
	 *@$groupId		Id of the group
	 *@$type		The type of group. See DiaryGroupType
	 *
	 *@return: Array of associate
	 */
	function GetAssociatesByGroup($groupId, $type)
	{
		$result = $this->sendRequest("GetAssociatesByGroup", array("GroupId"=>$groupId, "Type"=>$type));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

