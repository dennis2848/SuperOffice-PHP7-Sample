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

		
class SoAppointmentAgent extends SoAgent
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
        parent::__construct($endpoint."Appointment.svc", "WcfAppointment.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new AppointmentEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New AppointmentEntity with default values
     */
     function CreateDefaultAppointmentEntity()
     {
		$result = $this->sendRequest("CreateDefaultAppointmentEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing AppointmentEntity or creates a new AppointmentEntity if the id parameter is empty
     * 
     * @return New or updated AppointmentEntity
     */
	function SaveAppointmentEntity($appointmentEntity)
	{
		$result = $this->sendRequest("SaveAppointmentEntity", array("AppointmentEntity"=>$appointmentEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the AppointmentEntity
	 * 
	 * @$appointmentEntityId		The identity of the AppointmentEntity
	 */
	function DeleteAppointmentEntity($appointmentEntityId)
	{
		$result = $this->sendRequest("DeleteAppointmentEntity", array("AppointmentEntity"=>$appointmentEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

    /**
     * Loading default values into a new SuggestedAppointmentEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New SuggestedAppointmentEntity with default values
     */
     function CreateDefaultSuggestedAppointmentEntity()
     {
		$result = $this->sendRequest("CreateDefaultSuggestedAppointmentEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing SuggestedAppointmentEntity or creates a new SuggestedAppointmentEntity if the id parameter is empty
     * 
     * @return New or updated SuggestedAppointmentEntity
     */
	function SaveSuggestedAppointmentEntity($suggestedAppointmentEntity)
	{
		$result = $this->sendRequest("SaveSuggestedAppointmentEntity", array("SuggestedAppointmentEntity"=>$suggestedAppointmentEntity));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new TaskListItem.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New TaskListItem with default values
     */
     function CreateDefaultTaskListItem()
     {
		$result = $this->sendRequest("CreateDefaultTaskListItem", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing TaskListItem or creates a new TaskListItem if the id parameter is empty
     * 
     * @return New or updated TaskListItem
     */
	function SaveTaskListItem($taskListItem)
	{
		$result = $this->sendRequest("SaveTaskListItem", array("TaskListItem"=>$taskListItem));
		return $this->getResultFromResponse($result);
	}
        

	/**
	 * Summary
	 * Gets a Appointment object.
	 * 
	 * @$appointmentId		The identifier of the Appointment object
	 *
	 * @returns Appointment
	 */ 
	function GetAppointment($appointmentId)
	{
		$result = $this->sendRequest("GetAppointment", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets an appointment's status to Completed if the appointment had a different status, or sets the status to started if already set to completed.
	 *
	 *@$appointmentId		The appointment id.
	 *
	 *@return: The new AppointmentStatus
	 */
	function ToggleAppointmentStatus($appointmentId)
	{
		$result = $this->sendRequest("ToggleAppointmentStatus", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggle the completed status for an activity. Activity may be sale, document or appointment. The changes are saved immediately. 
	 *
	 *@$activityIdentifier		May contain of a mix of appointment_id, sale_id, document_id and todo_id
	 *
	 *@return: What the result after toggling was.
	 */
	function ToggleActivity($activityIdentifier)
	{
		$result = $this->sendRequest("ToggleActivity", array("ActivityIdentifier"=>$activityIdentifier));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Toggle the completed status for an array of activities. 
	 *
	 *@$activityIdentifier		Contain of a mix of appointment_id, sale_id, document_id and todo_id.
	 *
	 *@return: The resulting ActivityStatus of the first in the array
	 */
	function ToggleActivities($activityIdentifier)
	{
		$result = $this->sendRequest("ToggleActivities", array("ActivityIdentifier"=>$activityIdentifier));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets the completed status for an array of activities. The string activityIdentifier param may contain of a mix of appointment_id, sale_id, document_id and todo_id. The changes are saved immediately. If an invalid id is passed in (nonexistent record), no changes will be made. If there is no write access to the record being changed, a Sentry exception will be thrown in the usual manner.
	 *
	 *@$activityIdentifier		Array of activity ids. ex. appointment_id=666
	 *@$activityStatus		The status to set the activities
	 *
	 *@return: 
	 */
	function SetActivityStatus($activityIdentifier, $activityStatus)
	{
		$result = $this->sendRequest("SetActivityStatus", array("ActivityIdentifier"=>$activityIdentifier, "ActivityStatus"=>$activityStatus));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Toggles the first activity and sets the rest of the activities to the result of the first toggle. However, there are some special rules for appointments that trigger a suggested appointment when they are completed. If more than one appointment in the set of identifiers triggers a suggestion, we will not toggle those appointments. This rule is only active when changing the status of an appointment to complete. There must be more than one appointment that triggers such an event for this rule to take effect.
	 *
	 *@$activityIdentifiers		Array of activity ids. ex. appointment_id=666
	 *
	 *@return: The identifiers that were not toggled.
	 */
	function ToggleAndSetActivities($activityIdentifiers)
	{
		$result = $this->sendRequest("ToggleAndSetActivities", array("ActivityIdentifiers"=>$activityIdentifiers));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the currently logged on user.
	 *
	 *@$startTime		The start of the time interval in which we want appointments. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *
	 *@return: Array of Appointments.
	 */
	function GetMySyncAppointments($startTime, $endTime)
	{
		$result = $this->sendRequest("GetMySyncAppointments", array("StartTime"=>$startTime, "EndTime"=>$endTime));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a AppointmentEntity object.
	 * 
	 * @$appointmentEntityId		The identifier of the AppointmentEntity object
	 *
	 * @returns AppointmentEntity
	 */ 
	function GetAppointmentEntity($appointmentEntityId)
	{
		$result = $this->sendRequest("GetAppointmentEntity", array("AppointmentEntityId"=>$appointmentEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a AppointmentEntity populated with the default values for the specific type.
	 *
	 *@$type		The type of task requested.
	 *
	 *@return: AppointmentEntity with default values.
	 */
	function CreateDefaultAppointmentEntityByType($type)
	{
		$result = $this->sendRequest("CreateDefaultAppointmentEntityByType", array("Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Accepting an appointment invitation.
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function Accept($appointmentId, $updateMode)
	{
		$result = $this->sendRequest("Accept", array("AppointmentId"=>$appointmentId, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Rejecting an appointment invitation
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$rejectReason		The reason the invitation was rejected.
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function Reject($appointmentId, $rejectReason, $updateMode)
	{
		$result = $this->sendRequest("Reject", array("AppointmentId"=>$appointmentId, "RejectReason"=>$rejectReason, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Saving a booking.
	 *
	 *@$appointmentEntity		
	 *@$updateMode		Update mode for a recurring appointment.
	 *@$sendEmailToParticipants		If true, emails will be sent to all participants that is marked with send email flag. If false no mails will be sent even if the send email flag is true.
	 *@$smtpEMailConnectionInfo		Login information for outgoing smtp email server. Will be null if no login information is relevant.
	 *@$imapEMailConnectionInfo		Login information for imap server. Will be null if no login information is relevant.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function Save($appointmentEntity, $updateMode, $sendEmailToParticipants, $smtpEMailConnectionInfo, $imapEMailConnectionInfo)
	{
		$result = $this->sendRequest("Save", array("AppointmentEntity"=>$appointmentEntity, "UpdateMode"=>$updateMode, "SendEmailToParticipants"=>$sendEmailToParticipants, "SmtpEMailConnectionInfo"=>$smtpEMailConnectionInfo, "ImapEMailConnectionInfo"=>$imapEMailConnectionInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deleting a booking
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$updateMode		Update mode for a recurring appointment.
	 *@$sendEmailToParticipants		If true, emails will be sent to all participants that is marked with send email flag. If false no mails will be sent even if the send email flag is true.
	 *@$smtpEMailConnectionInfo		Login information for outgoing smtp email server. Will be null if no login information is relevant.
	 *@$imapEMailConnectionInfo		Login information for imap server. Will be null if no login information is relevant.
	 *
	 *@return: 
	 */
	function Delete($appointmentId, $updateMode, $sendEmailToParticipants, $smtpEMailConnectionInfo, $imapEMailConnectionInfo)
	{
		$result = $this->sendRequest("Delete", array("AppointmentId"=>$appointmentId, "UpdateMode"=>$updateMode, "SendEmailToParticipants"=>$sendEmailToParticipants, "SmtpEMailConnectionInfo"=>$smtpEMailConnectionInfo, "ImapEMailConnectionInfo"=>$imapEMailConnectionInfo));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Calculates the set of dates that represents a recurrence pattern. Adds conflict information to each date.
	 *
	 *@$appointmentEntity		
	 *
	 *@return: 
	 */
	function CalculateDays($appointmentEntity)
	{
		$result = $this->sendRequest("CalculateDays", array("AppointmentEntity"=>$appointmentEntity));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Validates the set of dates to calculate any conflicts.
	 *
	 *@$appointmentEntity		
	 *@$dates		The dates to validate.
	 *
	 *@return: Array of RecurrenceDate object for each validated date.
	 */
	function ValidateDays($appointmentEntity, $dates)
	{
		$result = $this->sendRequest("ValidateDays", array("AppointmentEntity"=>$appointmentEntity, "Dates"=>$dates));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a RecurrenceInfo object populated with the default values for the specific type.
	 *
	 *
	 *@return: RecurrenceInfo object with default values.
	 */
	function CreateDefaultRecurrence()
	{
		$result = $this->sendRequest("CreateDefaultRecurrence", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Assigning an appointment to another person.
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$participant		
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function AssignTo($appointmentId, $participant, $updateMode)
	{
		$result = $this->sendRequest("AssignTo", array("AppointmentId"=>$appointmentId, "Participant"=>$participant, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Sets an appointment invitiation to seen.
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: 
	 */
	function SetSeen($appointmentId, $updateMode)
	{
		$result = $this->sendRequest("SetSeen", array("AppointmentId"=>$appointmentId, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Moving a booking to another start time.
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$newStartTime		The new start time for the moved booking.
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function Move($appointmentId, $newStartTime, $updateMode)
	{
		$result = $this->sendRequest("Move", array("AppointmentId"=>$appointmentId, "NewStartTime"=>$newStartTime, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Accept that an invited participant has rejected your invitation or assignment.
	 *
	 *@$appointmentId		The appointmentId. Both master and child record ids are accepted.
	 *@$updateMode		Update mode for a recurring appointment.
	 *
	 *@return: Updated AppointmentEntity
	 */
	function AcceptRejected($appointmentId, $updateMode)
	{
		$result = $this->sendRequest("AcceptRejected", array("AppointmentId"=>$appointmentId, "UpdateMode"=>$updateMode));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a RecurrenceInfo object populated with the default values for the specific type. Using startDate as start date for the recurreing pattern.
	 *
	 *@$startDate		Date of which the recurring pattern should start.
	 *
	 *@return: 
	 */
	function CreateDefaultRecurrenceByDate($startDate)
	{
		$result = $this->sendRequest("CreateDefaultRecurrenceByDate", array("StartDate"=>$startDate));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes all appointments(within the appointmentIds array) with status BookingDeleted.
	 *
	 *@$appointmentIds		
	 *
	 *@return: 
	 */
	function CleanUpBookingDeleted($appointmentIds)
	{
		$result = $this->sendRequest("CleanUpBookingDeleted", array("AppointmentIds"=>$appointmentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates a AppointmentEntity populated with the default values for the specific type and owner.
	 *
	 *@$type		The type of task requested.
	 *@$associateId		The associateId of the appointment owner.
	 *
	 *@return: AppointmentEntity with default values.
	 */
	function CreateDefaultAppointmentEntityByTypeAndAssociate($type, $associateId)
	{
		$result = $this->sendRequest("CreateDefaultAppointmentEntityByTypeAndAssociate", array("Type"=>$type, "AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Check if current associate can create appointments in the diary of other associates.
	 *
	 *@$associateIds		Array of associate ids to check for.
	 *
	 *@return: Returns an array of bool corresponding to the associate array input parameter.
	 */
	function GetCanInsertForAssociates($associateIds)
	{
		$result = $this->sendRequest("GetCanInsertForAssociates", array("AssociateIds"=>$associateIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * GetAppointmentHaveParticipantsWithEmail will check if any of the participants is marked to receive emails on this appointment. If no participants are defined, false will be returned.
	 *
	 *@$appointmentId		The appointmentId.
	 *
	 *@return: Return true or false.
	 */
	function GetAppointmentHaveParticipantsWithEmail($appointmentId)
	{
		$result = $this->sendRequest("GetAppointmentHaveParticipantsWithEmail", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Creates an appointment based on a suggested appointment. 
	 *
	 *@$suggestedAppointmentId		The id of the suggested appointment
	 *@$saleId		This is the id of the sale the appointment is connected to. This will be used to give the appointment it's starting date. If the id is 0 or invalid, we assume the start date is now
	 *@$createNow		If this parameter is true, we override the suggested start time and create the appointment with the current date and time
	 *@$ownerId		
	 *
	 *@return: The newly created appointment
	 */
	function CreateDefaultAppointmentEntityFromSaleSuggestion($suggestedAppointmentId, $saleId, $createNow, $ownerId)
	{
		$result = $this->sendRequest("CreateDefaultAppointmentEntityFromSaleSuggestion", array("SuggestedAppointmentId"=>$suggestedAppointmentId, "SaleId"=>$saleId, "CreateNow"=>$createNow, "OwnerId"=>$ownerId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the next suggested appointment for a given sale (or rather a given sale's guide).
	 *
	 *@$saleId		The identifier of the (guided) sale from which we want to find a suggested appointment
	 *@$currentAppointmentId		The identifier of the appointment from which we calculate the next suggestion. The next suggested appointment is the subsequent appointment defined in the SoAdmin's sales guide.
	 *@$skipCompleteCheck		If you want to get the next appointment step in a sales guide for an appointment which is not completed, this value must be true. In all other cases, this value should be false, as it would return the value of null if the current appointment is not completes.
	 *
	 *@return:  The next suggestion based on the sale id of a guided sale and the id of the current apopintment. If we cannot find a next suggestion or the sale is not guided (or if any of the paramters are invalid), we will return null.
	 */
	function GetNextSuggestedAppointmentBySale($saleId, $currentAppointmentId, $skipCompleteCheck)
	{
		$result = $this->sendRequest("GetNextSuggestedAppointmentBySale", array("SaleId"=>$saleId, "CurrentAppointmentId"=>$currentAppointmentId, "SkipCompleteCheck"=>$skipCompleteCheck));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * A re-open appointment should be created as a reminder to re-open the sale at a certain date with information regarding the stalled sale. 
	 *
	 *@$saleId		The identifier of the stalled sale from which we create a re-open appointment
	 *
	 *@return: The re-open appointment with start date = the re-open date of the sale and a description matching the sales stalled reason. 
	 */
	function CreateDefaultReOpenAppointment($saleId)
	{
		$result = $this->sendRequest("CreateDefaultReOpenAppointment", array("SaleId"=>$saleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$suggestedAppointmentId		
	 *@$projectId		
	 *@$createNow		
	 *@$ownerId		
	 *
	 *@return: 
	 */
	function CreateDefaultAppointmentEntityFromProjectSuggestion($suggestedAppointmentId, $projectId, $createNow, $ownerId)
	{
		$result = $this->sendRequest("CreateDefaultAppointmentEntityFromProjectSuggestion", array("SuggestedAppointmentId"=>$suggestedAppointmentId, "ProjectId"=>$projectId, "CreateNow"=>$createNow, "OwnerId"=>$ownerId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$projectId		
	 *@$suggestedAppointmentId		
	 *
	 *@return: 
	 */
	function CanAssignToProjectMember($projectId, $suggestedAppointmentId)
	{
		$result = $this->sendRequest("CanAssignToProjectMember", array("ProjectId"=>$projectId, "SuggestedAppointmentId"=>$suggestedAppointmentId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Appointment objects.
	 * 
	 * @$appointmentIds		The identifiers of the Appointment object
	 *
	 * @returns Array of Appointment objects
	 */ 
	function GetAppointmentList($appointmentIds)
	{
		$result = $this->sendRequest("GetAppointmentList", array("AppointmentIds"=>$appointmentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the currently logged on user.
	 *
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetMyAppointments($startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetMyAppointments", array("StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the person specified. If the person not is a SuperOffice user (associate) or the logged on user is not allowed to view this persons appointments an exception is thrown.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectAppointments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonAppointments($personId, $includeProjectAppointments, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetPersonAppointments", array("PersonId"=>$personId, "IncludeProjectAppointments"=>$includeProjectAppointments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. It only returns appointments that would be displayed in the user's diary. The appointments belong to the currently logged on user.
	 *
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetMyDiary($startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetMyDiary", array("StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. It only returns appointments that would be displayed in the user's task list. The appointments belong to the currently logged on user.
	 *
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetMyTasks($count)
	{
		$result = $this->sendRequest("GetMyTasks", array("Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. It only returns appointments that would be displayed in the user's diary. The appointments belong to the person specified. If the person not is a SuperOffice user (associate) or the logged on user is not allowed to view this persons appointments an exception is thrown.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonDiary($personId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetPersonDiary", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. It only returns appointments that would be displayed in the user's task list. The appointments belong to the person specified. If the person not is a SuperOffice user (associate) or the logged on user is not allowed to view this persons appointments an exception is thrown.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonTasks($personId, $count)
	{
		$result = $this->sendRequest("GetPersonTasks", array("PersonId"=>$personId, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment type within a time range. The appointments belong to the person specified.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectAppointments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$appointmentType		The appointment type, e.g. inDiary, inChecklist etc.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonAppointmentsByType($personId, $includeProjectAppointments, $startTime, $endTime, $count, $appointmentType)
	{
		$result = $this->sendRequest("GetPersonAppointmentsByType", array("PersonId"=>$personId, "IncludeProjectAppointments"=>$includeProjectAppointments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "AppointmentType"=>$appointmentType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the project specified. If the logged on user is not allowed to view this projects appointments an exception is thrown.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectAppointments($projectId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetProjectAppointments", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment type within a time range. The appointments belong to the project specified.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$appointmentType		The appointment type, e.g. inDiary, inChecklist etc.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectAppointmentsByType($projectId, $startTime, $endTime, $count, $appointmentType)
	{
		$result = $this->sendRequest("GetProjectAppointmentsByType", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "AppointmentType"=>$appointmentType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the contact specified. If the logged on user is not allowed to view this persons appointments an exception is thrown.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactAppointments($contactId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetContactAppointments", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment type within a time range. The appointments belong to the contact specified. If the logged on user is not allowed to view this contacts appointments an exception is thrown.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$appointmentType		The appointment type, e.g. inDiary, inChecklist etc.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactAppointmentsByType($contactId, $startTime, $endTime, $count, $appointmentType)
	{
		$result = $this->sendRequest("GetContactAppointmentsByType", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "AppointmentType"=>$appointmentType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments within a time range. The appointments belong to the projects where the person specified is member.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberAppointments($personId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetProjectMemberAppointments", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment type within a time range. The appointments belong to the projects where the person specified is member.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$appointmentType		The appointment type, e.g. inDiary, inChecklist etc.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberAppointmentsByType($personId, $startTime, $endTime, $count, $appointmentType)
	{
		$result = $this->sendRequest("GetProjectMemberAppointmentsByType", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "AppointmentType"=>$appointmentType));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task type within a time range. The appointments belong to the person specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectAppointments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskId		The task id. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonAppointmentsByTask($personId, $includeProjectAppointments, $startTime, $endTime, $count, $taskId)
	{
		$result = $this->sendRequest("GetPersonAppointmentsByTask", array("PersonId"=>$personId, "IncludeProjectAppointments"=>$includeProjectAppointments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskId"=>$taskId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments from a list of appointment task types within a time range. The appointments belong to the person specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectAppointments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskIds		The task ids as an integer array. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonAppointmentsByTasks($personId, $includeProjectAppointments, $startTime, $endTime, $count, $taskIds)
	{
		$result = $this->sendRequest("GetPersonAppointmentsByTasks", array("PersonId"=>$personId, "IncludeProjectAppointments"=>$includeProjectAppointments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskIds"=>$taskIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task heading within a time range. The appointments belong to the person specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on. The heading represents a grouping or filtering of tasks.
	 *
	 *@$personId		The person id of the SuperOffice user (associate).
	 *@$includeProjectAppointments		If true, all appointments that belong to projects where the user is a project member are included as well as the appointments belonging to the person.
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskHeadingId		The task heading id. The heading represents a grouping or filtering of tasks. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetPersonAppointmentsByTaskHeading($personId, $includeProjectAppointments, $startTime, $endTime, $count, $taskHeadingId)
	{
		$result = $this->sendRequest("GetPersonAppointmentsByTaskHeading", array("PersonId"=>$personId, "IncludeProjectAppointments"=>$includeProjectAppointments, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskHeadingId"=>$taskHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task type within a time range. The appointments belong to the project specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskId		The task id. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectAppointmentsByTask($projectId, $startTime, $endTime, $count, $taskId)
	{
		$result = $this->sendRequest("GetProjectAppointmentsByTask", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskId"=>$taskId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments matching the list of appointment task types within a time range. The appointments belong to the project specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskIds		The task ids as an integer array. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectAppointmentsByTasks($projectId, $startTime, $endTime, $count, $taskIds)
	{
		$result = $this->sendRequest("GetProjectAppointmentsByTasks", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskIds"=>$taskIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task heading within a time range. The appointments belong to the project specified.  Task represents the different types of activities, like “Phone call”, “Meeting” and so on. The heading represents a grouping or filtering of tasks.
	 *
	 *@$projectId		The project id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskHeadingId		The task heading id. The heading represents a grouping or filtering of tasks. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectAppointmentsByTaskHeading($projectId, $startTime, $endTime, $count, $taskHeadingId)
	{
		$result = $this->sendRequest("GetProjectAppointmentsByTaskHeading", array("ProjectId"=>$projectId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskHeadingId"=>$taskHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task type within a time range. The appointments belong to the projects where the person specified is member. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskId		The task id. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberAppointmentsByTask($personId, $startTime, $endTime, $count, $taskId)
	{
		$result = $this->sendRequest("GetProjectMemberAppointmentsByTask", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskId"=>$taskId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments matching a set of appointment task types within a time range. The appointments belong to the projects where the person specified is member. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskIds		The task ids as an integer array. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberAppointmentsByTasks($personId, $startTime, $endTime, $count, $taskIds)
	{
		$result = $this->sendRequest("GetProjectMemberAppointmentsByTasks", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskIds"=>$taskIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task heading within a time range. The appointments belong to the projects where the person specified is member. Task represents the different types of activities, like “Phone call”, “Meeting” and so on. The heading represents a grouping or filtering of tasks.
	 *
	 *@$personId		The project member's person id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskHeadingId		The task heading id. The heading represents a grouping or filtering of tasks. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetProjectMemberAppointmentsByTaskHeading($personId, $startTime, $endTime, $count, $taskHeadingId)
	{
		$result = $this->sendRequest("GetProjectMemberAppointmentsByTaskHeading", array("PersonId"=>$personId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskHeadingId"=>$taskHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task type within a time range. The appointments belong to the contact specified. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskId		The task id. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactAppointmentsByTask($contactId, $startTime, $endTime, $count, $taskId)
	{
		$result = $this->sendRequest("GetContactAppointmentsByTask", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskId"=>$taskId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments belonging to an array of appointment task types within a time range. The appointments belong to the contact specified. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskIds		The task ids as an integer array. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactAppointmentsByTasks($contactId, $startTime, $endTime, $count, $taskIds)
	{
		$result = $this->sendRequest("GetContactAppointmentsByTasks", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskIds"=>$taskIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a specified number of appointments of a specific appointment task heading within a time range. The appointments belong to the contact specified. Task represents the different types of activities, like “Phone call”, “Meeting” and so on. The heading represents a grouping or filtering of tasks.
	 *
	 *@$contactId		The contact id
	 *@$startTime		The start of the time interval we want appointments from. This will usually be the current time.
	 *@$endTime		The end of the time interval.
	 *@$count		The maximum number of appointments that should be returned. -1 means no count restrictions.
	 *@$taskHeadingId		The task heading id. The heading represents a grouping or filtering of tasks. Task represents the different types of activities, like “Phone call”, “Meeting” and so on.
	 *
	 *@return: Array of Appointments.
	 */
	function GetContactAppointmentsByTaskHeading($contactId, $startTime, $endTime, $count, $taskHeadingId)
	{
		$result = $this->sendRequest("GetContactAppointmentsByTaskHeading", array("ContactId"=>$contactId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count, "TaskHeadingId"=>$taskHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published appointment by appointment id.
	 *
	 *@$appointmentId		The appointment id
	 *
	 *@return: Appointment
	 */
	function GetPublishedAppointment($appointmentId)
	{
		$result = $this->sendRequest("GetPublishedAppointment", array("AppointmentId"=>$appointmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published appointments by appointment ids.
	 *
	 *@$appointmentIds		The array of appointment ids
	 *
	 *@return: Array of Appointment
	 */
	function GetPublishedAppointments($appointmentIds)
	{
		$result = $this->sendRequest("GetPublishedAppointments", array("AppointmentIds"=>$appointmentIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published appointments from the logged in user.
	 *
	 *
	 *@return: Appointments
	 */
	function GetMyPublishedAppointments()
	{
		$result = $this->sendRequest("GetMyPublishedAppointments", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get published appointments by project id.
	 *
	 *@$projectId		The project id
	 *
	 *@return: Array of Appointment
	 */
	function GetPublishedProjectAppointments($projectId)
	{
		$result = $this->sendRequest("GetPublishedProjectAppointments", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns appointments of a specific appointment task heading. Task represents the different types of activities, like “Phone call”, “Meeting” and so on. The heading represents a grouping or filtering of tasks.
	 *
	 *@$taskHeadingId		The task heading id. The heading represents a grouping or filtering of tasks. Task represents the different types of activities, like “Phone call”, “Meeting” and so on
	 *
	 *@return: Array of Appointments.
	 */
	function GetAppointmentsByTaskHeading($taskHeadingId)
	{
		$result = $this->sendRequest("GetAppointmentsByTaskHeading", array("TaskHeadingId"=>$taskHeadingId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateId		
	 *@$startTime		
	 *@$endTime		
	 *@$count		
	 *
	 *@return: 
	 */
	function GetAssociateDiary($associateId, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetAssociateDiary", array("AssociateId"=>$associateId, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$groupId		
	 *@$groupType		
	 *@$startTime		
	 *@$endTime		
	 *@$count		
	 *
	 *@return: 
	 */
	function GetDiaryByGroup($groupId, $groupType, $startTime, $endTime, $count)
	{
		$result = $this->sendRequest("GetDiaryByGroup", array("GroupId"=>$groupId, "GroupType"=>$groupType, "StartTime"=>$startTime, "EndTime"=>$endTime, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Updates an appointment record.
	 *
	 *@$id		
	 *@$startTime		
	 *@$endTime		
	 *@$status		
	 *@$type		
	 *@$associateId		The appointment owner's id (associate id)
	 *
	 *@return: 
	 */
	function UpdateAppointment($id, $startTime, $endTime, $status, $type, $associateId)
	{
		$result = $this->sendRequest("UpdateAppointment", array("Id"=>$id, "StartTime"=>$startTime, "EndTime"=>$endTime, "Status"=>$status, "Type"=>$type, "AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$associateIds		
	 *@$startTime		
	 *@$endTime		
	 *
	 *@return: 
	 */
	function GetAssociatesDiary($associateIds, $startTime, $endTime)
	{
		$result = $this->sendRequest("GetAssociatesDiary", array("AssociateIds"=>$associateIds, "StartTime"=>$startTime, "EndTime"=>$endTime));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all records involved in a booking and/or recurring appointments. MotherId can be zero for repeating appointments or bookings, and recurrenceRuleId can be zero for bookings that are not repeating.
	 *
	 *@$motherId		Appointment id of the owner of a booking
	/// 
	 *@$recurrenceRuleId		RecurrenceId of a recuring appointment
	 *
	 *@return: 
	 */
	function GetAppointmentRecords($motherId, $recurrenceRuleId)
	{
		$result = $this->sendRequest("GetAppointmentRecords", array("MotherId"=>$motherId, "RecurrenceRuleId"=>$recurrenceRuleId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get combined day information (activity + redletter summary) for one or more days according to the given date interval. The time portion of the dates is ignored. Private appointments are counted, but may not be visible through tooltips or other more detailed services.
	 *
	 *@$startDate		Start date of interval. Time portion is ignored.
	 *@$endDate		End date of interval. Time portion is ignored.
	 *@$associateId		Associate id to identify the calendar to scan. If 0 is passed in, the currently authenticated associate is used instead.
	 *
	 *@return: Exactly one item per day of the given time span is returned. Days where nothing happens will have all values set to 0, but will still be in the returned array. Start end dates are treated as inclusive.
	 */
	function GetDayInformationListByDatesAndAssociate($startDate, $endDate, $associateId)
	{
		$result = $this->sendRequest("GetDayInformationListByDatesAndAssociate", array("StartDate"=>$startDate, "EndDate"=>$endDate, "AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get activity information for one or more days according to the given date interval. The time portion of the dates is ignored. Private appointments are counted, but may not be visible through tooltips or other more detailed services.
	 *
	 *@$startDate		Start date of interval. Time portion is ignored.
	 *@$endDate		End date of interval. Time portion is ignored.
	 *@$associateId		Associate id to identify the calendar to scan. If 0 is passed in, the currently authenticated associate is used instead.
	 *
	 *@return: Exactly one item per day of the given time span is returned. Days where nothing happens will have all values set to 0, but will still be in the returned array. Start end dates are treated as inclusive.
	 */
	function GetActivityInformationListByDatesAndAssociate($startDate, $endDate, $associateId)
	{
		$result = $this->sendRequest("GetActivityInformationListByDatesAndAssociate", array("StartDate"=>$startDate, "EndDate"=>$endDate, "AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get detailed red letter day information (redletter summary + individual day texts) for one or more days according to the given date interval. The time portion of the dates is ignored. 
	 *
	 *@$startDate		Start date of interval. Time portion is ignored.
	 *@$endDate		End date of interval. Time portion is ignored.
	 *@$associateId		Associate id to identify the calendar to scan. If 0 is passed in, the currently authenticated associate is used instead.
	 *
	 *@return: Exactly one item per day of the given time span is returned. Days where nothing happens will have all values set to 0, but will still be in the returned array. Start end dates are treated as inclusive.
	 */
	function GetRedLetterInformationListByDatesAndAssociate($startDate, $endDate, $associateId)
	{
		$result = $this->sendRequest("GetRedLetterInformationListByDatesAndAssociate", array("StartDate"=>$startDate, "EndDate"=>$endDate, "AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$includeInvitations		
	 *@$includeAllAppointments		
	 *@$defaultAlarmLeadTimeInMinutes		
	 *
	 *@return: 
	 */
	function GetAlarms($includeInvitations, $includeAllAppointments, $defaultAlarmLeadTimeInMinutes)
	{
		$result = $this->sendRequest("GetAlarms", array("IncludeInvitations"=>$includeInvitations, "IncludeAllAppointments"=>$includeAllAppointments, "DefaultAlarmLeadTimeInMinutes"=>$defaultAlarmLeadTimeInMinutes));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Adds a sales lead (task) to a contact in SuperOffice. If the contact or person is known, the sales lead is added to the current contact. If not, a new contact is created, with the associate with ownerIdForNewContact as responsible (Our Contact). A relation is created between the contact and the person submitting the lead. Based on wether the person the request is made for is found or not, the following happens: If the person is found, the person, person's contact and sales representative is returned. If neither the person nor the contact is found a new person and contact is created (if sufficient data is supplied), and the person, person's contact and sales representative is returned. If the contact and not the person is found a new person is created on this contact, and the contact, salesrep, and person is returned (if there was enough data to return the person). If more than one contact is found a list of contacts is returned.
	 *
	 *@$associateIdForNewContact		Associate id of the person set as "Our Contact" if a new Contact is created. Ensures that the sales lead is assigned to the correct salesman.
	 *@$leadDescription		Description of the lead. The lead text as shown in SuperOffice
	 *@$relation		The relation the person submitting the lead has to the contact.
	 *@$relationId		Id of the relation type. Database specific.
	 *@$leadContact		Name of the new or existing contact (company) the lead is created for.
	 *@$leadPersonFirstname		Firstname of the contact's person.
	 *@$leadPersonLastname		Lastname of the contact's person.
	 *@$leadPersonEmail		Email to the contact's person.
	 *@$leadPhoneNumber		Phone number of the contact or contact's person.
	 *@$creatorsContact		The contact (company) of the person creating the lead
	 *@$creatorsFirstname		The firstname of the person creating the lead
	 *@$creatorsLastname		The lastname of the person creating the lead
	 *
	 *@return: True if successfull.
	 */
	function GenerateLead($associateIdForNewContact, $leadDescription, $relation, $relationId, $leadContact, $leadPersonFirstname, $leadPersonLastname, $leadPersonEmail, $leadPhoneNumber, $creatorsContact, $creatorsFirstname, $creatorsLastname)
	{
		$result = $this->sendRequest("GenerateLead", array("AssociateIdForNewContact"=>$associateIdForNewContact, "LeadDescription"=>$leadDescription, "Relation"=>$relation, "RelationId"=>$relationId, "LeadContact"=>$leadContact, "LeadPersonFirstname"=>$leadPersonFirstname, "LeadPersonLastname"=>$leadPersonLastname, "LeadPersonEmail"=>$leadPersonEmail, "LeadPhoneNumber"=>$leadPhoneNumber, "CreatorsContact"=>$creatorsContact, "CreatorsFirstname"=>$creatorsFirstname, "CreatorsLastname"=>$creatorsLastname));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Submits a request for information. The request is added to the task list of the user that is responsible for this contact. Based on wether the person the request is made for is found or not, the following happens: If the person is found, the person, person's contact and sales representative is returned. If neither the person nor the contact is found a new person and contact is created (if sufficient data is supplied), and the person, person's contact and sales representative is returned. If the contact and not the person is found a new person is created on this contact, and the contact, salesrep, and person is returned (if there was enough data to return the person). If more than one contact is found a list of contacts is returned.
	 *
	 *@$associateIdForNewContact		Associate id of the person set as "Our Contact" if a new Contact is created. Ensures that the request is assigned to the correct salesman.
	 *@$channel		The requested channel, e.g. "Phone"
	 *@$regarding		The text submitted by the user.
	 *@$contactName		The name of the contact that the RFI will be added to. May be empty.
	 *@$personFirstname		The firstname of the person that the RFI will be added to. May be empty.
	 *@$personLastname		The lastname of the person that the RFI will be added to. May be empty.
	 *@$emailAddress		The email address of the person that the RFI will be added to.
	 *@$phoneNumber		Phone number of the contact or contact's person.
	 *
	 *@return: True if the submission was successful.
	 */
	function RequestForInfo($associateIdForNewContact, $channel, $regarding, $contactName, $personFirstname, $personLastname, $emailAddress, $phoneNumber)
	{
		$result = $this->sendRequest("RequestForInfo", array("AssociateIdForNewContact"=>$associateIdForNewContact, "Channel"=>$channel, "Regarding"=>$regarding, "ContactName"=>$contactName, "PersonFirstname"=>$personFirstname, "PersonLastname"=>$personLastname, "EmailAddress"=>$emailAddress, "PhoneNumber"=>$phoneNumber));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SuggestedAppointment object.
	 * 
	 * @$suggestedAppointmentId		The identifier of the SuggestedAppointment object
	 *
	 * @returns SuggestedAppointment
	 */ 
	function GetSuggestedAppointment($suggestedAppointmentId)
	{
		$result = $this->sendRequest("GetSuggestedAppointment", array("SuggestedAppointmentId"=>$suggestedAppointmentId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a SuggestedAppointmentEntity object.
	 * 
	 * @$suggestedAppointmentEntityId		The identifier of the SuggestedAppointmentEntity object
	 *
	 * @returns SuggestedAppointmentEntity
	 */ 
	function GetSuggestedAppointmentEntity($suggestedAppointmentEntityId)
	{
		$result = $this->sendRequest("GetSuggestedAppointmentEntity", array("SuggestedAppointmentEntityId"=>$suggestedAppointmentEntityId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a TaskListItem object.
	 * 
	 * @$taskListItemId		The identifier of the TaskListItem object
	 *
	 * @returns TaskListItem
	 */ 
	function GetTaskListItem($taskListItemId)
	{
		$result = $this->sendRequest("GetTaskListItem", array("TaskListItemId"=>$taskListItemId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets all takslist items
	 *
	 *@$includeDeleted		Include deleted items
	 *
	 *@return: An array of tasklist items
	 */
	function GetTaskListItems($includeDeleted)
	{
		$result = $this->sendRequest("GetTaskListItems", array("IncludeDeleted"=>$includeDeleted));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

