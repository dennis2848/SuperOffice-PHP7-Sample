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

		
class SoSelectionAgent extends SoAgent
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
        parent::__construct($endpoint."Selection.svc", "WcfSelection.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new MailMergeSettings.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New MailMergeSettings with default values
     */
     function CreateDefaultMailMergeSettings()
     {
		$result = $this->sendRequest("CreateDefaultMailMergeSettings", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new MailMergeTask.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New MailMergeTask with default values
     */
     function CreateDefaultMailMergeTask()
     {
		$result = $this->sendRequest("CreateDefaultMailMergeTask", array());
		return $this->getResultFromResponse($result);
     }
        

    /**
     * Loading default values into a new SelectionEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SelectionEntity with default values
     */
     function CreateDefaultSelectionEntity()
     {
		$result = $this->sendRequest("CreateDefaultSelectionEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SelectionEntity or creates a new SelectionEntity if the id parameter is empty
     * 
     * @return New or updated SelectionEntity
     */
	function SaveSelectionEntity($selectionEntity)
	{
		$result = $this->sendRequest("SaveSelectionEntity", array("SelectionEntity"=>$selectionEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the SelectionEntity
	 * 
	 * @$selectionEntityId		The identity of the SelectionEntity
	 */
	function DeleteSelectionEntity($selectionEntityId)
	{
		$result = $this->sendRequest("DeleteSelectionEntity", array("SelectionEntity"=>$selectionEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a SelectionEntity object.
	 * 
	 * @$selectionEntityId		The identifier of the SelectionEntity object
	 *
	 * @returns SelectionEntity
	 */ 
	function GetSelectionEntity($selectionEntityId)
	{
		$result = $this->sendRequest("GetSelectionEntity", array("SelectionEntityId"=>$selectionEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new selection based on selection members from an existing selection.
	 *
	 *@$selectionId		The id of the selection to copy members from.
	 *@$name		The name of the new selection.
	 *@$targetSelectionType		The type of ContactSelection to create. The type can be static or dynamic. If the original selection to copy from is static, the SelectionType can only be static. If the original selection is dynamic, both a static and dynamic selection can be created.
	 *@$copyMembers		If true, the members from the original selection will be added to the newly created selection.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateContactSelectionFromSelection($selectionId, $name, $targetSelectionType, $copyMembers)
	{
		$result = $this->sendRequest("CreateContactSelectionFromSelection", array("SelectionId"=>$selectionId, "Name"=>$name, "TargetSelectionType"=>$targetSelectionType, "CopyMembers"=>$copyMembers));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a temporary selection with members from a collection of ContactPerson id's.
	 *
	 *@$contactPersonIds		A collection of ContactPersonId to copy into the temporary contact selection as members.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateTemporaryContactSelectionFromContactPersonIds($contactPersonIds)
	{
		$result = $this->sendRequest("CreateTemporaryContactSelectionFromContactPersonIds", array("ContactPersonIds"=>$contactPersonIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a temporary selection with members from an existing project.
	 *
	 *@$projectId		The id of the project to add members from.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateTemporaryContactSelectionFromProjectMembers($projectId)
	{
		$result = $this->sendRequest("CreateTemporaryContactSelectionFromProjectMembers", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Copy contact selection members from selection into an existing selection.
	 *
	 *@$fromSelectionId		The id of the selection to copy members from.
	 *@$toSelectionId		The id of the selection to copy members to.
	 *
	 *@return: 
	 */
	function CopyContactSelectionMembers($fromSelectionId, $toSelectionId)
	{
		$result = $this->sendRequest("CopyContactSelectionMembers", array("FromSelectionId"=>$fromSelectionId, "ToSelectionId"=>$toSelectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns a RecipientStatistics object with a count of addresses, emailaddresses and emailaddresses.
	 *
	 *@$selectionId		The id of the selection to get the statistics for.
	 *
	 *@return: Returns a RecipientStatistics object.
	 */
	function GetRecipientStatistics($selectionId)
	{
		$result = $this->sendRequest("GetRecipientStatistics", array("SelectionId"=>$selectionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a RecipientStatistics object with a count of addresses, emailaddresses and emailaddresses based on members in a project.
	 *
	 *@$projectId		The id of the project to get the member statistics for.
	 *
	 *@return: Returns a RecipientStatistics object.
	 */
	function GetRecipientStatisticsFromProjectMembers($projectId)
	{
		$result = $this->sendRequest("GetRecipientStatisticsFromProjectMembers", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns a RecipientStatistics object with a count of addresses, emailaddresses and emailaddresses based on contact and persons in a collection of ContactPersonId.
	 *
	 *@$contactPersonIds		A collection of ContactPersonId to get the statistics for.
	 *
	 *@return: Returns a RecipientStatistics object.
	 */
	function GetRecipientStatisticsFromContactPersonIds($contactPersonIds)
	{
		$result = $this->sendRequest("GetRecipientStatisticsFromContactPersonIds", array("ContactPersonIds"=>$contactPersonIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds members to the selection as  specified in the collection of ContactPersonId.
	 *
	 *@$selectionId		The id of the selection where to members will be added to.
	 *@$contactPersonIds		A collection of ContactPersonId to add to the selection.
	 *
	 *@return: 
	 */
	function AddContactSelectionMembers($selectionId, $contactPersonIds)
	{
		$result = $this->sendRequest("AddContactSelectionMembers", array("SelectionId"=>$selectionId, "ContactPersonIds"=>$contactPersonIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Removes members from the selection as  specified in the collection of ContactPersonId.
	 *
	 *@$selectionId		The id of the selection where to members will be removed.
	 *@$contactPersonIds		A collection of ContactPersonId to remove from the selection.
	 *
	 *@return: 
	 */
	function RemoveContactSelectionMembers($selectionId, $contactPersonIds)
	{
		$result = $this->sendRequest("RemoveContactSelectionMembers", array("SelectionId"=>$selectionId, "ContactPersonIds"=>$contactPersonIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Removes members from the selection using a collection a selectionmember id's. Members can only be removed from single selection.
	 *
	 *@$selectionId		The id of the selection where to members will be removed.
	 *@$selectionMembersIds		An array of selectionmember id's to remove from the selection.
	 *
	 *@return: 
	 */
	function RemoveContactSelectionMembersFromIds($selectionId, $selectionMembersIds)
	{
		$result = $this->sendRequest("RemoveContactSelectionMembersFromIds", array("SelectionId"=>$selectionId, "SelectionMembersIds"=>$selectionMembersIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Adds members to the selection from the search result.
	 *
	 *@$selectionId		The id of the selection to add members
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *
	 *@return: Number of members added
	 */
	function AddContactSelectionMembersFromSearch($selectionId, $storageKey)
	{
		$result = $this->sendRequest("AddContactSelectionMembersFromSearch", array("SelectionId"=>$selectionId, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Removes members from the selection using the search result.
	 *
	 *@$selectionId		The id of the selection to remove members.
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search.
	 *
	 *@return: Number of members removed
	 */
	function RemoveContactSelectionMembersFromSearch($selectionId, $storageKey)
	{
		$result = $this->sendRequest("RemoveContactSelectionMembersFromSearch", array("SelectionId"=>$selectionId, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a temporary selection.
	 *
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateTemporaryContactSelection()
	{
		$result = $this->sendRequest("CreateTemporaryContactSelection", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a temporary selection with members from a collection of selectionmember id's.
	 *
	 *@$selectionId		The selectionId the selectionmembers is a part of.
	 *@$selectionMemberIds		A collection of int ids to copy into the temporary contact selection as members.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateTemporaryContactSelectionFromSelectionMemberIds($selectionId, $selectionMemberIds)
	{
		$result = $this->sendRequest("CreateTemporaryContactSelectionFromSelectionMemberIds", array("SelectionId"=>$selectionId, "SelectionMemberIds"=>$selectionMemberIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds or removes interests on companies and persons in a selection.
	 *
	 *@$selectionId		The id of the selection to add or remove interests members from.
	 *@$addCompanyInterests		Array of int containing the id's of the interests to add to the company.
	 *@$removeCompanyInterests		Array of int containing the id's of the interests to remove from the company.
	 *@$addContactInterests		Array of int containing the id's of the interests to add to the contact.
	 *@$removeContactInterests		Array of int containing the id's of the interests to remove from the contact.
	 *
	 *@return: 
	 */
	function AddRemoveContactSelectionMemberInterests($selectionId, $addCompanyInterests, $removeCompanyInterests, $addContactInterests, $removeContactInterests)
	{
		$result = $this->sendRequest("AddRemoveContactSelectionMemberInterests", array("SelectionId"=>$selectionId, "AddCompanyInterests"=>$addCompanyInterests, "RemoveCompanyInterests"=>$removeCompanyInterests, "AddContactInterests"=>$addContactInterests, "RemoveContactInterests"=>$removeContactInterests));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Edit company and contact details in a selection based on contents in selectionMemberEditValues.
	 *
	 *@$selectionId		The id of the selection to edit members from.
	 *@$selectionMemberEditValues		An object of <see cref="SelectionMemberEditValues"/> describing what should be changed for companys and contacts.
	 *
	 *@return: 
	 */
	function EditContactSelectionMemberDetails($selectionId, $selectionMemberEditValues)
	{
		$result = $this->sendRequest("EditContactSelectionMemberDetails", array("SelectionId"=>$selectionId, "SelectionMemberEditValues"=>$selectionMemberEditValues));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Generate follow-ups for members in the selection.
	 *
	 *@$selectionId		The id of the selection to generate the follow-ups for.
	 *@$appointmentEntity		The AppointmentEntity with information about the appointment.
	 *@$associateId		The associate to save the appointments on. If saveOnContactOwner is true, this id will be ignored. Appointments wil be saved on current user if associateId = 0.
	 *@$saveOnContactOwner		If true, the appointments will be saved on contact owner (Our contact). This parameter will override associateId if true.
	 *@$uniqueContact		If true, only one appointment will be created for each contact.
	 *
	 *@return: 
	 */
	function GenerateFollowUps($selectionId, $appointmentEntity, $associateId, $saveOnContactOwner, $uniqueContact)
	{
		$result = $this->sendRequest("GenerateFollowUps", array("SelectionId"=>$selectionId, "AppointmentEntity"=>$appointmentEntity, "AssociateId"=>$associateId, "SaveOnContactOwner"=>$saveOnContactOwner, "UniqueContact"=>$uniqueContact));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * ExportSelectionMembers will generate a string that is the result of substituting the template variables with values from selectionmembers.
	 *
	 *@$selectionId		The id of the selection to generate the exported file.
	 *@$templateName		The templateName parameter is the relative path of a .sxf file template. The .sxf files can be found in \template or in the user folder of the so archive.
	 *@$useContacts		If the selection contains other members than contacts, setting this to true will export the contact archive of the selection.
	 *
	 *@return: Returns a unicode byte array with the file to export to the user.
	 */
	function ExportSelectionMembers($selectionId, $templateName, $useContacts)
	{
		$result = $this->sendRequest("ExportSelectionMembers", array("SelectionId"=>$selectionId, "TemplateName"=>$templateName, "UseContacts"=>$useContacts));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Start a mailmerge operation with specified settings.
	 *
	 *@$settings		All settings needed to perform the mailmerge operation.
	 *
	 *@return: 
	 */
	function StartMailMerge($settings)
	{
		$result = $this->sendRequest("StartMailMerge", array("Settings"=>$settings));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Set which duplicate rules should be active or not
	 *
	 *@$rules		Duplicate rules to update active status for
	 *
	 *@return: 
	 */
	function SetDuplicateRulesStatus($rules)
	{
		$result = $this->sendRequest("SetDuplicateRulesStatus", array("Rules"=>$rules));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get duplicates(exact or similar in the database) based on the name
	 *
	 *@$name		Name used for lookup
	 *
	 *@return: Any records matching the specified name
	 */
	function GetDuplicates($name)
	{
		$result = $this->sendRequest("GetDuplicates", array("Name"=>$name));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Retrieve all available duplicate rules for selection
	 *
	 *
	 *@return: All available duplicate rules
	 */
	function GetDuplicateRules()
	{
		$result = $this->sendRequest("GetDuplicateRules", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new selection based on external duplicate
	 *
	 *@$duplicate		The duplicate to create a new entry based upon
	 *
	 *@return: The database identity of the newly created entry
	 */
	function CreateNewEntry($duplicate)
	{
		$result = $this->sendRequest("CreateNewEntry", array("Duplicate"=>$duplicate));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes all contacts from a selection. If a contact does not have delete rights, it will be skipped.
	 *
	 *@$selectionId		Id of the selection the delete operation will be performed.
	 *
	 *@return: 
	 */
	function DeleteContacts($selectionId)
	{
		$result = $this->sendRequest("DeleteContacts", array("SelectionId"=>$selectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Add selection members to a static selection of type others than contacts.
	 *
	 *@$selectionId		The selection id to add the members to.
	 *@$ids		Collection of ids to add to the selection.
	 *
	 *@return: Returns number of members added to the selection.
	 */
	function AddSelectionMembers($selectionId, $ids)
	{
		$result = $this->sendRequest("AddSelectionMembers", array("SelectionId"=>$selectionId, "Ids"=>$ids));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Removes members from the selection as  specified in the collection of entity ids. The ids can be a collection of sale ids, or other supported types.
	 *
	 *@$selectionId		The id of the selection where to members will be removed.
	 *@$ids		A collection of ids to remove from the selection. The ids can be a collection of sale ids, or other supported types.
	 *
	 *@return: 
	 */
	function RemoveSelectionMembers($selectionId, $ids)
	{
		$result = $this->sendRequest("RemoveSelectionMembers", array("SelectionId"=>$selectionId, "Ids"=>$ids));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Removes members from the selection using the search result.
	 *
	 *@$selectionId		The id of the selection to add members
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search
	 *
	 *@return: Number of members added.
	 */
	function AddSelectionMembersFromSearch($selectionId, $storageKey)
	{
		$result = $this->sendRequest("AddSelectionMembersFromSearch", array("SelectionId"=>$selectionId, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Removes members from the selection using the search result.
	 *
	 *@$selectionId		The id of the selection to remove members.
	 *@$storageKey		Storage key to be interpreted by the restriction storage provider, when it fetches criteria for the search.
	 *
	 *@return: Number of members removed
	 */
	function RemoveSelectionMembersFromSearch($selectionId, $storageKey)
	{
		$result = $this->sendRequest("RemoveSelectionMembersFromSearch", array("SelectionId"=>$selectionId, "StorageKey"=>$storageKey));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Copy selection members from selection into an existing selection.
	 *
	 *@$fromSelectionId		The id of the selection to copy members from.
	 *@$toSelectionId		The id of the selection to copy members to.
	 *
	 *@return: 
	 */
	function CopySelectionMembers($fromSelectionId, $toSelectionId)
	{
		$result = $this->sendRequest("CopySelectionMembers", array("FromSelectionId"=>$fromSelectionId, "ToSelectionId"=>$toSelectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Creates a temporary selection with members from a collection of entity id's.
	 *
	 *@$ids		A collection of Ids to copy into the temporary selection as members. The ids are primary keys of entities defined by the targetTableNumber parameter.
	 *@$targetTableNumber		The type of selection to create.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateTemporarySelectionFromIds($ids, $targetTableNumber)
	{
		$result = $this->sendRequest("CreateTemporarySelectionFromIds", array("Ids"=>$ids, "TargetTableNumber"=>$targetTableNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new selection based on selection members from an existing selection.
	 *
	 *@$selectionId		The id of the selection to copy members from.
	 *@$name		The name of the new selection.
	 *@$targetSelectionType		The type of Selection to create. The type can be static or dynamic. If the original selection to copy from is static, the SelectionType can only be static. If the original selection is dynamic, both a static and dynamic selection can be created.
	 *@$copyMembers		If true, the members from the original selection will be added to the newly created selection.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateSelectionFromSelection($selectionId, $name, $targetSelectionType, $copyMembers)
	{
		$result = $this->sendRequest("CreateSelectionFromSelection", array("SelectionId"=>$selectionId, "Name"=>$name, "TargetSelectionType"=>$targetSelectionType, "CopyMembers"=>$copyMembers));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a new contact selection based on contact selection members from an existing shadow sale, appointment, project or document selection. The new selection will always be static even if the original selection is dynamic.
	 *
	 *@$selectionId		The id of the selection to copy members from.
	 *@$name		The name of the new selection.
	 *
	 *@return: Returns the newly created SelectionEntity.
	 */
	function CreateContactSelectionFromShadowSelection($selectionId, $name)
	{
		$result = $this->sendRequest("CreateContactSelectionFromShadowSelection", array("SelectionId"=>$selectionId, "Name"=>$name));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes all entities from a selection. If an entity does not have delete rights, it will be skipped.
	 *
	 *@$selectionId		Id of the selection the delete operation will be performed.
	 *
	 *@return: 
	 */
	function DeleteEntities($selectionId)
	{
		$result = $this->sendRequest("DeleteEntities", array("SelectionId"=>$selectionId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get a list of all selection ids where the given selection is used to create a combined selection.
	 *
	 *@$selectionId		The selectionId to query for.
	 *
	 *@return: Array of selectionIds.
	 */
	function GetParentCombinedSelections($selectionId)
	{
		$result = $this->sendRequest("GetParentCombinedSelections", array("SelectionId"=>$selectionId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

