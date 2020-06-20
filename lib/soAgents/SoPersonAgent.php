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

		
class SoPersonAgent extends SoAgent
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
        parent::__construct($endpoint."Person.svc", "WcfPerson.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new PersonEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New PersonEntity with default values
     */
     function CreateDefaultPersonEntity()
     {
		$result = $this->sendRequest("CreateDefaultPersonEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing PersonEntity or creates a new PersonEntity if the id parameter is empty
     * 
     * @return New or updated PersonEntity
     */
	function SavePersonEntity($personEntity)
	{
		$result = $this->sendRequest("SavePersonEntity", array("PersonEntity"=>$personEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the PersonEntity
	 * 
	 * @$personEntityId		The identity of the PersonEntity
	 */
	function DeletePersonEntity($personEntityId)
	{
		$result = $this->sendRequest("DeletePersonEntity", array("PersonEntity"=>$personEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a Person object.
	 * 
	 * @$personId		The identifier of the Person object
	 *
	 * @returns Person
	 */ 
	function GetPerson($personId)
	{
		$result = $this->sendRequest("GetPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a PersonEntity object.
	 * 
	 * @$personEntityId		The identifier of the PersonEntity object
	 *
	 * @returns PersonEntity
	 */ 
	function GetPersonEntity($personEntityId)
	{
		$result = $this->sendRequest("GetPersonEntity", array("PersonEntityId"=>$personEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the person info belonging to the currently logged on user.
	 *
	 *
	 *@return: The PersonEntity
	 */
	function GetMyPerson()
	{
		$result = $this->sendRequest("GetMyPerson", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the sales representative for an external user. If this method is accessed with anonymous authentication the external user is recognized by contact and name, or by email, or phone number. If the external user is recognized as an CRM5 user (internal or external) the input fields can be left blank.
	 *
	 *@$contactName		The company name of the person requesting his sales representative. May be empty if email or phone is provided.
	 *@$personFirstname		The firstname of the person requesting his sales representative. May be empty if email or phone is provided.
	 *@$personLastname		The lastname of the person requesting his sales representative. May be empty if email or phone is provided.
	 *@$emailAddress		The email address of the person requesting his sales representative. May be empty if phone, or contact and person name is provided.
	 *@$phoneNumber		The phone number of the person requesting his sales representative. May be empty if email, or contact and person name is provided.
	 *
	 *@return: The PersonEntity of the sales rep.
	 */
	function GetSalesRep($contactName, $personFirstname, $personLastname, $emailAddress, $phoneNumber)
	{
		$result = $this->sendRequest("GetSalesRep", array("ContactName"=>$contactName, "PersonFirstname"=>$personFirstname, "PersonLastname"=>$personLastname, "EmailAddress"=>$emailAddress, "PhoneNumber"=>$phoneNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returning all phones that belong to a person, ordered by the phone type.
	 *
	 *@$personId		The person id
	 *
	 *@return: An array of Phones
	 */
	function GetPhones($personId)
	{
		$result = $this->sendRequest("GetPhones", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change country regenerates the default values and localized information such as phone number and address format for this entity.
	 *
	 *@$personEntity		The PersonEntity to change country on
	 *@$toCountryId		The country to switch to
	 *
	 *@return: The PersonEntity
	 */
	function ChangeCountry($personEntity, $toCountryId)
	{
		$result = $this->sendRequest("ChangeCountry", array("PersonEntity"=>$personEntity, "ToCountryId"=>$toCountryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the person's localized address.
	 *
	 *@$personId		The person id
	 *
	 *@return: The address as LocalizedField[][].
	 */
	function GetAddress($personId)
	{
		$result = $this->sendRequest("GetAddress", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the person's localized address.
	 *
	 *@$personId		The person id
	 *@$countryId		
	 *
	 *@return: The address as LocalizedField[][].
	 */
	function GetAddressByCountry($personId, $countryId)
	{
		$result = $this->sendRequest("GetAddressByCountry", array("PersonId"=>$personId, "CountryId"=>$countryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the person image that is displayed in the CRM application.
	 *
	 *@$personId		The person id of the person the image belongs to.
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetPersonImage($personId)
	{
		$result = $this->sendRequest("GetPersonImage", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the person image that is displayed in the CRM application.
	 *
	 *@$personId		The person id of the person the image belongs to.
	 *@$image		The image that is stored on the person (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetPersonImage($personId, $image)
	{
		$result = $this->sendRequest("SetPersonImage", array("PersonId"=>$personId, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Creates a PersonEntity with default values based on the contactId.
	 *
	 *@$contactId		Contact id of the person
	 *
	 *@return: 
	 */
	function CreateDefaultByContactId($contactId)
	{
		$result = $this->sendRequest("CreateDefaultByContactId", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Move a person to a specified contact
	 *
	 *@$personId		The identifier for the person
	 *@$destinationContactId		The identifier for the contact which the person will be moved to
	 *@$moveAfterDate		Only move activites after this date
	 *
	 *@return: 
	 */
	function Move($personId, $destinationContactId, $moveAfterDate)
	{
		$result = $this->sendRequest("Move", array("PersonId"=>$personId, "DestinationContactId"=>$destinationContactId, "MoveAfterDate"=>$moveAfterDate));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Merge two persons. The destination person will remain
	 *
	 *@$sourcePersonId		The identifier for the person which will be merged into the destination person
	 *@$destinationPersonId		The identifier for the person which will remain after the merge
	 *@$moveAfterDate		Only merge activites after this date
	 *@$deleteSource		If true, the source person will be deleted after the merge. If false, it will have its retired flag set
	 *@$replaceEmptyFieldsOnDestination		If true, empty fields on destination will be replaced by values from source.
	 *
	 *@return: 
	 */
	function Merge($sourcePersonId, $destinationPersonId, $moveAfterDate, $deleteSource, $replaceEmptyFieldsOnDestination)
	{
		$result = $this->sendRequest("Merge", array("SourcePersonId"=>$sourcePersonId, "DestinationPersonId"=>$destinationPersonId, "MoveAfterDate"=>$moveAfterDate, "DeleteSource"=>$deleteSource, "ReplaceEmptyFieldsOnDestination"=>$replaceEmptyFieldsOnDestination));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Creates a PersonEntity with default values based on the contactId and credentials.
	 *
	 *@$contactId		Contact id of the person
	 *@$credentialType		Type of credentials, corresponding to name of plugin and type in the credentials table.
	 *@$credentialValue		This is the actuall value of the credentials.  This will typically be the password or teh users SID in active directory
	 *@$credentialDisplayValue		The value displayed to the user. this will typically be the users login name in active directory.
	 *
	 *@return: 
	 */
	function CreateDefaultFromCredential($contactId, $credentialType, $credentialValue, $credentialDisplayValue)
	{
		$result = $this->sendRequest("CreateDefaultFromCredential", array("ContactId"=>$contactId, "CredentialType"=>$credentialType, "CredentialValue"=>$credentialValue, "CredentialDisplayValue"=>$credentialDisplayValue));	
		return $this->getResultFromResponse($result);
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
	 * Get a person from the provided information. If the person does not exist, it will be created on demand.
	 *
	 *@$contactId		The contact Id of the contact which the person belongs to. Cannot be 0.
	 *@$personName		The full name of the person to be resolved. Optional.
	 *@$phoneNumbers		Phone numbers registered on the person. Optional.
	 *@$emails		Email-addresses registered on the person. Optional.
	 *
	 *@return: The results of the resolve-operation.
	 */
	function ResolvePersonFromInfo($contactId, $personName, $phoneNumbers, $emails)
	{
		$result = $this->sendRequest("ResolvePersonFromInfo", array("ContactId"=>$contactId, "PersonName"=>$personName, "PhoneNumbers"=>$phoneNumbers, "Emails"=>$emails));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Person objects.
	 * 
	 * @$personIds		The identifiers of the Person object
	 *
	 * @returns Array of Person objects
	 */ 
	function GetPersonList($personIds)
	{
		$result = $this->sendRequest("GetPersonList", array("PersonIds"=>$personIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all the persons belonging to a contact.
	 *
	 *@$contactId		The project id
	 *
	 *@return: The persons belonging to a contact.
	 */
	function GetPersonsFromContact($contactId)
	{
		$result = $this->sendRequest("GetPersonsFromContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all the persons belonging to a project.
	 *
	 *@$projectId		The project id
	 *
	 *@return: The persons belonging to a project.
	 */
	function GetPersonsFromProject($projectId)
	{
		$result = $this->sendRequest("GetPersonsFromProject", array("ProjectId"=>$projectId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the persons working in the same company as the logged on user.
	 *
	 *
	 *@return: Colleagues.
	 */
	function GetColleagues()
	{
		$result = $this->sendRequest("GetColleagues", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the persons working in a specific department in the same company as the logged on user. Departments can be retrieved with the PhoneList.DepartmentList service.
	 *
	 *@$departmentId		The department id.
	 *
	 *@return: PersonList with colleagues.
	 */
	function GetColleaguesByDepartment($departmentId)
	{
		$result = $this->sendRequest("GetColleaguesByDepartment", array("DepartmentId"=>$departmentId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the persons working in the same company as the logged on user. The list of person could be retrieved from the history list, the diary view list, or from all sources.
	 *
	 *@$sourceType		The “source” the colleagues should be retrieved from. <see cref="AssociateSourceType"/> for more information.
	 *@$count		
	 *
	 *@return: Colleagues.
	 */
	function GetColleaguesBySource($sourceType, $count)
	{
		$result = $this->sendRequest("GetColleaguesBySource", array("SourceType"=>$sourceType, "Count"=>$count));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the owner of the logged in person.
	 *
	 *
	 *@return: Person
	 */
	function GetMyOwner()
	{
		$result = $this->sendRequest("GetMyOwner", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the owner of the person by id.
	 *
	 *@$personId		
	 *
	 *@return: Person
	 */
	function GetOwnerOnPersonId($personId)
	{
		$result = $this->sendRequest("GetOwnerOnPersonId", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Move one person up or down in the ranking in the Person Archive, if possible.<para/>The person record that has rank = 1 is the primary contact for a company, and is the one used in situations where no person has been explicitly chosen (such as in selections).<para/>This method corresponds to the move up/move down functions in the person archive in the contact panel.<para/>This method always affects two records.
	 *
	 *@$personId		Primary key of person record to move up or down. You must have write access both to this record AND to whatever record is adjacent in the direction you want to move.
	 *@$moveUp		If true, the given person is moved to an earlier rank (lower numeric rank value, down to a limit of 1; up in the GUI if sorted by ascending rank). If false, movement is to later priority (higher numeric rank value).
	 *
	 *@return: If movement occurred, the return value will be the ID of the OTHER person that got moved. A GUI should switch the positions of the original person ID and this return value.<para/>If no movement occurred, for any reason,  0 is returned.
	 */
	function ChangePersonRank($personId, $moveUp)
	{
		$result = $this->sendRequest("ChangePersonRank", array("PersonId"=>$personId, "MoveUp"=>$moveUp));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Directly set the rank field of a person record, adjusting all other person records under the same contact as needed.<para/>This call may affect multiple records, potentially all person records belonging to one contact.<para/>You must have write access for to affected records for this method to succeed.
	 *
	 *@$personId		Id of person to change
	 *@$desiredRank		Desired rank to set, legal values are from 1 to the number of person records on this contact. Out of range values will be moved to the closest valid value and processed.
	 *
	 *@return: If movement occurred, or the person already had exactly the desired rank value, then the return value will be true. If movement did not occur, for any other reason, the return value is false. 
	 */
	function SetPersonRank($personId, $desiredRank)
	{
		$result = $this->sendRequest("SetPersonRank", array("PersonId"=>$personId, "DesiredRank"=>$desiredRank));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Nomralize the ranks for all persons that belong to a contact. This means that the persons will be sorted according to their current rank values, and the ranks will be made monotonically increasing from 1.
	 *
	 *@$contactId		Id of contact whose persons are to be rank normalized
	 *
	 *@return: The reutrn value is true if the operation suceeded, either because all persons were already normalized, or because normalization was done. It is false if Sentry blocks any required changes.
	 */
	function NormalizeRanks($contactId)
	{
		$result = $this->sendRequest("NormalizeRanks", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

