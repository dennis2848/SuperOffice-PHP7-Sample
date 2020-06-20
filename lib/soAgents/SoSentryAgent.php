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

		
class SoSentryAgent extends SoAgent
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
        parent::__construct($endpoint."Sentry.svc", "WcfSentry.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Returns a TableRight for a new row based on tableName parameter.
	 *
	 *@$tableName		Name of the table to get the TableRights from
	 *
	 *@return: The TableRight
	 */
	function GetNewTableRight($tableName)
	{
		$result = $this->sendRequest("GetNewTableRight", array("TableName"=>$tableName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return the TableRight from the relationship between the current user and the given user and group.
	 *
	 *@$tableName		Name of the table to get the TableRights from.
	 *@$contactGroupId		The user-group that the associate id is part of.
	 *@$contactAssociateId		The associate id of the owner of the record
	 *
	 *@return: The TableRight
	 */
	function GetTableRightByOwnership($tableName, $contactGroupId, $contactAssociateId)
	{
		$result = $this->sendRequest("GetTableRightByOwnership", array("TableName"=>$tableName, "ContactGroupId"=>$contactGroupId, "ContactAssociateId"=>$contactAssociateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a string array of all functions rights for the role of the current associate.
	 *
	 *
	 *@return: String array.
	/// 
	 */
	function GetFunctionRights()
	{
		$result = $this->sendRequest("GetFunctionRights", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a boolean value indicating if the current user has the functional right.
	 *
	 *@$functionRight		Function right to check.
	 *
	 *@return: 
	 */
	function HasFunctionRight($functionRight)
	{
		$result = $this->sendRequest("HasFunctionRight", array("FunctionRight"=>$functionRight));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * CanCreateAppointmentInAssociateDiaries will check if the current associate can create appointments in diaries belonging to the associates listed in associateIds. CanCreateAppointmentInAssociateDiaries will only check against associates that are diary owners. If none of the associates listed in the associateIds parameter is a diary owner, the method will return true.
	 *
	 *@$associateIds		Array of associate ids to check.
	 *
	 *@return: Returns true if the current associate can create appointments in the diary of all the other associates, otherwise false.
	 */
	function CanCreateAppointmentInAssociateDiaries($associateIds)
	{
		$result = $this->sendRequest("CanCreateAppointmentInAssociateDiaries", array("AssociateIds"=>$associateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * CanCreateAppointmentInAllDiaries will check if the current associate can create appointments in diaries belonging all other associates. CanCreateAppointmentInAssociateDiaries will only check against associates that are diary owners.
	 *
	 *
	 *@return: Returns true if the current associate can create appointments in the diary of all the other associates, otherwise false.
	 */
	function CanCreateAppointmentInAllDiaries()
	{
		$result = $this->sendRequest("CanCreateAppointmentInAllDiaries", array());	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

