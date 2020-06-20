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

		
class SoUserDefinedFieldInfoAgent extends SoAgent
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
        parent::__construct($endpoint."UserDefinedFieldInfo.svc", "WcfUserDefinedFieldInfo.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new UserDefinedFieldInfo.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New UserDefinedFieldInfo with default values
     */
     function CreateDefaultUserDefinedFieldInfo()
     {
		$result = $this->sendRequest("CreateDefaultUserDefinedFieldInfo", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing UserDefinedFieldInfo or creates a new UserDefinedFieldInfo if the id parameter is empty
     * 
     * @return New or updated UserDefinedFieldInfo
     */
	function SaveUserDefinedFieldInfo($userDefinedFieldInfo)
	{
		$result = $this->sendRequest("SaveUserDefinedFieldInfo", array("UserDefinedFieldInfo"=>$userDefinedFieldInfo));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the UserDefinedFieldInfo
	 * 
	 * @$userDefinedFieldInfoId		The identity of the UserDefinedFieldInfo
	 */
	function DeleteUserDefinedFieldInfo($userDefinedFieldInfoId)
	{
		$result = $this->sendRequest("DeleteUserDefinedFieldInfo", array("UserDefinedFieldInfo"=>$userDefinedFieldInfoId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a UserDefinedFieldInfo object.
	 * 
	 * @$userDefinedFieldInfoId		The identifier of the UserDefinedFieldInfo object
	 *
	 * @returns UserDefinedFieldInfo
	 */ 
	function GetUserDefinedFieldInfo($userDefinedFieldInfoId)
	{
		$result = $this->sendRequest("GetUserDefinedFieldInfo", array("UserDefinedFieldInfoId"=>$userDefinedFieldInfoId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return information about all the user defined fields on a particular owner type (project, contact, person, etc).
	 *
	 *@$ownerType		The user-defined field owner-entity id.  
	 *
	 *@return: Returns an array of user-defined field info carriers. 
	 */
	function GetUserDefinedFieldList($ownerType)
	{
		$result = $this->sendRequest("GetUserDefinedFieldList", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return information about the given user defined field identified by the owner and the field label. Note that field labels are fuzzy. Leading and trailing spaces and punctuation are ignored.
	 *
	 *@$fieldLabel		The field label - the text label shown in the user interface. Trailing spaces and punctuation (":" and ".") are ignored when searching.
	 *@$ownerType		The user-defined field owner-entity id. 
	 *
	 *@return: Returns the user-defined field info carrier, or null if no matching field is found.
	 */
	function GetUserDefinedFieldFromFieldLabel($fieldLabel, $ownerType)
	{
		$result = $this->sendRequest("GetUserDefinedFieldFromFieldLabel", array("FieldLabel"=>$fieldLabel, "OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return information about the given user defined field identified by the owner and the prog-id. The prog-id is used as the key in the entity carriers.
	 *
	 *@$progId		The prog.id is a hidden name that uniquely identifies the field. 
	 *@$ownerType		The user-defined field owner-entity id. 
	 *
	 *@return: Returns the user-defined field info carrier, or null if no matching field is found.
	 */
	function GetUserDefinedFieldFromProgId($progId, $ownerType)
	{
		$result = $this->sendRequest("GetUserDefinedFieldFromProgId", array("ProgId"=>$progId, "OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return an given array of user defined field identified by the ids.
	 *
	 *@$ids		Array of user defined field ids
	 *
	 *@return: Returns an array of user-defined field info carriers
	 */
	function GetUserDefinedFieldFromIds($ids)
	{
		$result = $this->sendRequest("GetUserDefinedFieldFromIds", array("Ids"=>$ids));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return an given array user defined field identified by the owner and the prog-ids. The prog-id is used as the key in the entity carriers.
	 *
	 *@$progIds		The prog.id is a hidden name that uniquely identifies the field. 
	 *@$ownerType		The user-defined field owner-entity id. 
	 *
	 *@return: Returns an array of user-defined field info carriers
	 */
	function GetUserDefinedFieldFromProgIds($progIds, $ownerType)
	{
		$result = $this->sendRequest("GetUserDefinedFieldFromProgIds", array("ProgIds"=>$progIds, "OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a UserDefinedFieldInfo based on a owner-entity id
	 *
	 *@$ownerType		The user-defined field owner-entity id.  
	 *@$fieldType		The field type of the new field
	 *
	 *@return: Returns the user-defined field info carrier
	 */
	function CreateUserDefinedFieldInfo($ownerType, $fieldType)
	{
		$result = $this->sendRequest("CreateUserDefinedFieldInfo", array("OwnerType"=>$ownerType, "FieldType"=>$fieldType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Create a UserDefinedFieldInfo based on a owner-entity id
	 *
	 *@$info		The user-defined field info carrier to want to modify
	 *@$fieldType		The new field type you want
	 *@$isIndexed		The new indexed status you want
	 *
	 *@return: Returns the user-defined field info carrier
	 */
	function ChangeFieldType($info, $fieldType, $isIndexed)
	{
		$result = $this->sendRequest("ChangeFieldType", array("Info"=>$info, "FieldType"=>$fieldType, "IsIndexed"=>$isIndexed));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a list of page one fields for given Udef type and current user group
	 *
	 *@$ownerType		The user-defined field owner-entity.
	 *@$userGroupId		Id of UserGroup
	 *
	 *@return: Returns an array of page one user-defined field info carriers. 
	 */
	function GetUserDefinedPageOneFields($ownerType, $userGroupId)
	{
		$result = $this->sendRequest("GetUserDefinedPageOneFields", array("OwnerType"=>$ownerType, "UserGroupId"=>$userGroupId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Publish changed Udef fields for the given owner type
	 *
	 *@$ownerType		The owner type to publish for
	 *
	 *@return: 
	 */
	function Publish($ownerType)
	{
		$result = $this->sendRequest("Publish", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Revert changed Udef fields for the given owner type - all unpublished changes will be lost
	 *
	 *@$ownerType		The owner type to revert fields for
	 *
	 *@return: 
	 */
	function Revert($ownerType)
	{
		$result = $this->sendRequest("Revert", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Save an array of user defined fields
	 *
	 *@$infos		An array of user defined fields
	 *
	 *@return: 
	 */
	function SaveUserDefinedFieldInfos($infos)
	{
		$result = $this->sendRequest("SaveUserDefinedFieldInfos", array("Infos"=>$infos));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Detect changes to the admin version (unpublished)
	 *
	 *@$ownerType		The owner type
	 *
	 *@return: Returns true if changes where found
	 */
	function DetectUnpublishedChanges($ownerType)
	{
		$result = $this->sendRequest("DetectUnpublishedChanges", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Detect columnid changes to the admin version (for determining publish warning)
	 *
	 *@$ownerType		The owner type
	 *
	 *@return: Returns true if columnid changes where found
	 */
	function DetectColumnIdChanges($ownerType)
	{
		$result = $this->sendRequest("DetectColumnIdChanges", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets a user defined fields as page one field.
	 *
	 *@$ownerType		The user-defined field owner entity
	 *@$udefFieldId		The id of the udeffield to set as page one field
	 *@$userGroupId		The usergroup id to associate the page one field with.
	 *@$fieldLineNo		Page one line number
	 *
	 *@return: 
	 */
	function SetUserDefinedPageOneField($ownerType, $udefFieldId, $userGroupId, $fieldLineNo)
	{
		$result = $this->sendRequest("SetUserDefinedPageOneField", array("OwnerType"=>$ownerType, "UdefFieldId"=>$udefFieldId, "UserGroupId"=>$userGroupId, "FieldLineNo"=>$fieldLineNo));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Check if the publish event is active for the given type
	 *
	 *@$type		
	 *
	 *@return: 
	 */
	function IsPublishEventActive($type)
	{
		$result = $this->sendRequest("IsPublishEventActive", array("Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check if any publish events are active
	 *
	 *
	 *@return: 
	 */
	function IsAnyPublishEventActive()
	{
		$result = $this->sendRequest("IsAnyPublishEventActive", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets which page one fields have changed from the current version
	 *
	 *@$ownerType		The user-defined field owner-entity.
	 *@$userGroupId		Id of UserGroup
	 *
	 *@return: 
	 */
	function GetChangedPageOneFields($ownerType, $userGroupId)
	{
		$result = $this->sendRequest("GetChangedPageOneFields", array("OwnerType"=>$ownerType, "UserGroupId"=>$userGroupId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets the Page One Field grouping for a specific entity
	 *
	 *@$ownerType		The user-defined field owner-entity.
	 *@$active		If true, use grouping
	 *
	 *@return: 
	 */
	function SetPageOneFieldGrouping($ownerType, $active)
	{
		$result = $this->sendRequest("SetPageOneFieldGrouping", array("OwnerType"=>$ownerType, "Active"=>$active));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Make stuff similar to what happens in the win client
	 *
	 *@$info		
	 *@$selectedListId		
	 *
	 *@return: 
	 */
	function SetListTableIdAndUDListDefinitionIdFromSelectedListId($info, $selectedListId)
	{
		$result = $this->sendRequest("SetListTableIdAndUDListDefinitionIdFromSelectedListId", array("Info"=>$info, "SelectedListId"=>$selectedListId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Kind of the reverse of SetListTableIdAndUDListDefinitionIdFromSelectedListId
	 *
	 *@$info		
	 *
	 *@return: 
	 */
	function FigureOutListIdFromListTableIdAndUDListDefinitionId($info)
	{
		$result = $this->sendRequest("FigureOutListIdFromListTableIdAndUDListDefinitionId", array("Info"=>$info));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change rank of user defined fields
	 *
	 *@$ownerType		The user-defined field owner-entity.
	 *@$rankedFieldsIds		All IDs of this owner-entity in desired rank order
	 *
	 *@return: 
	 */
	function SetRankOnFields($ownerType, $rankedFieldsIds)
	{
		$result = $this->sendRequest("SetRankOnFields", array("OwnerType"=>$ownerType, "RankedFieldsIds"=>$rankedFieldsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$ownerType		
	 *
	 *@return: 
	 */
	function SetPublishStartSystemEvent($ownerType)
	{
		$result = $this->sendRequest("SetPublishStartSystemEvent", array("OwnerType"=>$ownerType));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

