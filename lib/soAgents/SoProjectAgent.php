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

		
class SoProjectAgent extends SoAgent
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
        parent::__construct($endpoint."Project.svc", "WcfProject.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ProjectEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ProjectEntity with default values
     */
     function CreateDefaultProjectEntity()
     {
		$result = $this->sendRequest("CreateDefaultProjectEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ProjectEntity or creates a new ProjectEntity if the id parameter is empty
     * 
     * @return New or updated ProjectEntity
     */
	function SaveProjectEntity($projectEntity)
	{
		$result = $this->sendRequest("SaveProjectEntity", array("ProjectEntity"=>$projectEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ProjectEntity
	 * 
	 * @$projectEntityId		The identity of the ProjectEntity
	 */
	function DeleteProjectEntity($projectEntityId)
	{
		$result = $this->sendRequest("DeleteProjectEntity", array("ProjectEntity"=>$projectEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new ProjectEventEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ProjectEventEntity with default values
     */
     function CreateDefaultProjectEventEntity()
     {
		$result = $this->sendRequest("CreateDefaultProjectEventEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ProjectEventEntity or creates a new ProjectEventEntity if the id parameter is empty
     * 
     * @return New or updated ProjectEventEntity
     */
	function SaveProjectEventEntity($projectEventEntity)
	{
		$result = $this->sendRequest("SaveProjectEventEntity", array("ProjectEventEntity"=>$projectEventEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ProjectEventEntity
	 * 
	 * @$projectEventEntityId		The identity of the ProjectEventEntity
	 */
	function DeleteProjectEventEntity($projectEventEntityId)
	{
		$result = $this->sendRequest("DeleteProjectEventEntity", array("ProjectEventEntity"=>$projectEventEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a Project object.
	 * 
	 * @$projectId		The identifier of the Project object
	 *
	 * @returns Project
	 */ 
	function GetProject($projectId)
	{
		$result = $this->sendRequest("GetProject", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectEntity object.
	 * 
	 * @$projectEntityId		The identifier of the ProjectEntity object
	 *
	 * @returns ProjectEntity
	 */ 
	function GetProjectEntity($projectEntityId)
	{
		$result = $this->sendRequest("GetProjectEntity", array("ProjectEntityId"=>$projectEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectEntityId		
	 *@$projectMembers		
	 *
	 *@return: 
	 */
	function AddProjectMembers($projectEntityId, $projectMembers)
	{
		$result = $this->sendRequest("AddProjectMembers", array("ProjectEntityId"=>$projectEntityId, "ProjectMembers"=>$projectMembers));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectEntityId		
	 *@$memberIds		
	 *
	 *@return: 
	 */
	function DeleteProjectMembers($projectEntityId, $memberIds)
	{
		$result = $this->sendRequest("DeleteProjectMembers", array("ProjectEntityId"=>$projectEntityId, "MemberIds"=>$memberIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the project image that is displayed in the CRM application.
	 *
	 *@$projectId		The project id of the project the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetProjectImage($projectId)
	{
		$result = $this->sendRequest("GetProjectImage", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the project image that is displayed in the CRM application.
	 *
	 *@$projectId		The project id of the project the image belongs to.
	 *@$image		The image that is stored on the project (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetProjectImage($projectId, $image)
	{
		$result = $this->sendRequest("SetProjectImage", array("ProjectId"=>$projectId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Deletes projectmembers rows.
	 *
	 *@$projectMemberIds		An Array of projectmember ids.
	 *
	 *@return: 
	 */
	function DeleteProjectMemberByIds($projectMemberIds)
	{
		$result = $this->sendRequest("DeleteProjectMemberByIds", array("ProjectMemberIds"=>$projectMemberIds));	
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
	 * Creates a new project based on external duplicate
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
	 * Retrieve all available duplicate rules for project
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
	 * Merge two projects
	 *
	 *@$sourceProjectId		Id of source project to merge
	 *@$destinationProjectId		Id of destination project to merge
	 *@$replaceEmptyFieldsOnDestination		Fill in empty fields on destination from source
	 *
	 *@return: 
	 */
	function Merge($sourceProjectId, $destinationProjectId, $replaceEmptyFieldsOnDestination)
	{
		$result = $this->sendRequest("Merge", array("SourceProjectId"=>$sourceProjectId, "DestinationProjectId"=>$destinationProjectId, "ReplaceEmptyFieldsOnDestination"=>$replaceEmptyFieldsOnDestination));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Checks if the number is unique or required.  The setting is configured from admin under system options.
	 *
	 *@$contactId		
	 *@$number		
	 *
	 *@return: 
	 */
	function IsNumberValid($contactId, $number)
	{
		$result = $this->sendRequest("IsNumberValid", array("ContactId"=>$contactId, "Number"=>$number));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectId		
	 *
	 *@return: 
	 */
	function HasGuide($projectId)
	{
		$result = $this->sendRequest("HasGuide", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectId		
	 *
	 *@return: 
	 */
	function GetNextMilestone($projectId)
	{
		$result = $this->sendRequest("GetNextMilestone", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$appointmentId		
	 *
	 *@return: 
	 */
	function OfferAutoNextStatusOnApppointmentCompleted($appointmentId)
	{
		$result = $this->sendRequest("OfferAutoNextStatusOnApppointmentCompleted", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectId		
	 *
	 *@return: 
	 */
	function GetNextProjectStatus($projectId)
	{
		$result = $this->sendRequest("GetNextProjectStatus", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectId		
	 *
	 *@return: 
	 */
	function HasGuideActivities($projectId)
	{
		$result = $this->sendRequest("HasGuideActivities", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectEvent object.
	 * 
	 * @$projectEventId		The identifier of the ProjectEvent object
	 *
	 * @returns ProjectEvent
	 */ 
	function GetProjectEvent($projectEventId)
	{
		$result = $this->sendRequest("GetProjectEvent", array("ProjectEventId"=>$projectEventId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets a ProjectEvent object from a project and a person.
	 *
	 *@$projectId		The project Id
	 *@$personId		Id of the person the project events belong to.
	 *
	 *@return: 
	 */
	function GetProjectEventOnPerson($projectId, $personId)
	{
		$result = $this->sendRequest("GetProjectEventOnPerson", array("ProjectId"=>$projectId, "PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ProjectEventEntity object.
	 * 
	 * @$projectEventEntityId		The identifier of the ProjectEventEntity object
	 *
	 * @returns ProjectEventEntity
	 */ 
	function GetProjectEventEntity($projectEventEntityId)
	{
		$result = $this->sendRequest("GetProjectEventEntity", array("ProjectEventEntityId"=>$projectEventEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a ProjectEventEntity based on a projectId.
	 *
	 *@$projectId		The projectId to get a ProjectEventEntity for
	 *
	 *@return: ProjectEventEntity
	 */
	function GetProjectEventEntityFromProjectId($projectId)
	{
		$result = $this->sendRequest("GetProjectEventEntityFromProjectId", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Delete a project event based on a project id. Does not delete the project, but does delete the published and ExternalEvent and AudienceVisibility records.
	 *
	 *@$projectId		The project id of the external event to delete.
	 *
	 *@return: Nothing
	 */
	function DeleteProjectEventEntityFromProjectId($projectId)
	{
		$result = $this->sendRequest("DeleteProjectEventEntityFromProjectId", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of ProjectEvent objects.
	 * 
	 * @$projectEventIds		The identifiers of the ProjectEvent object
	 *
	 * @returns Array of ProjectEvent objects
	 */ 
	function GetProjectEventList($projectEventIds)
	{
		$result = $this->sendRequest("GetProjectEventList", array("ProjectEventIds"=>$projectEventIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all project events that belongs to the currently logged on user. The list of events are filtered by the Audience Visibility restrictions set when the project event is created.
	 *
	 *
	 *@return: Array of project events
	 */
	function GetMyProjectEvents()
	{
		$result = $this->sendRequest("GetMyProjectEvents", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all project events that belongs to the person specified. The list of events are filtered by the Audience Visibility restrictions set when the project event is created.
	 *
	 *@$personId		Id of the person the project events belong to.
	 *
	 *@return: Array of project events
	 */
	function GetProjectEventsOnPerson($personId)
	{
		$result = $this->sendRequest("GetProjectEventsOnPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Project objects.
	 * 
	 * @$projectIds		The identifiers of the Project object
	 *
	 * @returns Array of Project objects
	 */ 
	function GetProjectList($projectIds)
	{
		$result = $this->sendRequest("GetProjectList", array("ProjectIds"=>$projectIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning the projects belonging to an associate. If memberProjects is false only the projects where the associate is project responsible is returned, otherwise both the projects where the associate is project responsible and project member is returned.
	 *
	 *@$includeMemberProjects		True to include projects where the user is project member.
	 *
	 *@return: The list of projects
	 */
	function GetMyProjects($includeMemberProjects)
	{
		$result = $this->sendRequest("GetMyProjects", array("IncludeMemberProjects"=>$includeMemberProjects));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning the projects where an user is project member.
	 *
	 *
	 *@return: The list of projects.
	 */
	function GetMyMemberProjects()
	{
		$result = $this->sendRequest("GetMyMemberProjects", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Return all projects where the person is project member.
	 *
	 *@$personId		The person id
	 *
	 *@return: ProjectListEntity
	 */
	function GetProjectsFromPerson($personId)
	{
		$result = $this->sendRequest("GetProjectsFromPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all projects where the given contact has projectmembers.
	 *
	 *@$contactId		The contact id
	 *
	 *@return: ProjectListEntity
	 */
	function GetProjectsFromContact($contactId)
	{
		$result = $this->sendRequest("GetProjectsFromContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published project by project id.
	 *
	 *@$projectId		The project id.
	 *
	 *@return: Project
	 */
	function GetPublishedProject($projectId)
	{
		$result = $this->sendRequest("GetPublishedProject", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published projects by project ids.
	 *
	 *@$projectIds		The array of project ids
	 *
	 *@return: Projects
	 */
	function GetPublishedProjects($projectIds)
	{
		$result = $this->sendRequest("GetPublishedProjects", array("ProjectIds"=>$projectIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published projects from the logged in user.
	 *
	 *
	 *@return: Projects
	 */
	function GetMyPublishedProjects()
	{
		$result = $this->sendRequest("GetMyPublishedProjects", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published projects where person  is a member
	 *
	 *@$personId		The person id
	 *
	 *@return: Array of project
	 */
	function GetPublishedProjectsOnPersonId($personId)
	{
		$result = $this->sendRequest("GetPublishedProjectsOnPersonId", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of project members
	 *
	 *@$projectId		The project id
	 *
	 *@return: An array of project members
	 */
	function GetProjectMembers($projectId)
	{
		$result = $this->sendRequest("GetProjectMembers", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get single ProjectMember row.
	 *
	 *@$projectMemberId		The id of the ProjectMember row
	 *
	 *@return: 
	 */
	function GetProjectMember($projectMemberId)
	{
		$result = $this->sendRequest("GetProjectMember", array("ProjectMemberId"=>$projectMemberId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Updates a ProjectMember row.
	 *
	 *@$projectMember		ProjectMember to update
	 *
	 *@return: The Updated ProjectMember
	 */
	function UpdateProjectMember($projectMember)
	{
		$result = $this->sendRequest("UpdateProjectMember", array("ProjectMember"=>$projectMember));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of project members
	 *
	 *@$projectMemberIds		
	 *
	 *@return: An array of project members
	 */
	function GetProjectMembersById($projectMemberIds)
	{
		$result = $this->sendRequest("GetProjectMembersById", array("ProjectMemberIds"=>$projectMemberIds));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

