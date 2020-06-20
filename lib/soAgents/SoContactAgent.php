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
class SoContactAgent extends SoAgent
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
        parent::__construct($endpoint."Contact.svc", "WcfContact.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new ContactEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New ContactEntity with default values
     */
     function CreateDefaultContactEntity()
     {
		$result = $this->sendRequest("CreateDefaultContactEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing ContactEntity or creates a new ContactEntity if the id parameter is empty
     * 
     * @return New or updated ContactEntity
     */
	function SaveContactEntity($contactEntity)
	{
		$result = $this->sendRequest("SaveContactEntity", array("ContactEntity"=>$contactEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the ContactEntity
	 * 
	 * @$contactEntityId		The identity of the ContactEntity
	 */
	function DeleteContactEntity($contactEntityId)
	{
		$result = $this->sendRequest("DeleteContactEntity", array("ContactEntity"=>$contactEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/**
	 * Summary
	 * Gets a Contact object.
	 * 
	 * @$contactId		The identifier of the Contact object
	 *
	 * @returns Contact
	 */ 
	function GetContact($contactId)
	{
		$result = $this->sendRequest("GetContact", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the contacts where there has been activity since activityStartTime. If activityStartTime is larger than the current date, all contacts with activity since last log-out are returned. The result set can be filtered by category and action type.
	 *
	 *@$activityStartTime		The start time of the activities. If the start time is set to a future date; activites since the user last logged out are returned.
	 *@$contactCategories		Integer array of categories to filter on. If the array is empty contacts from all categories will be selected.
	 *@$actionType		The type of action that has occured. E.g. updates, deletes, new appointments, etc.
	 *
	 *@return: Array of contacts where there have been activity in the period.
	 */
	function GetMyActiveContacts($activityStartTime, $contactCategories, $actionType)
	{
		$result = $this->sendRequest("GetMyActiveContacts", array("ActivityStartTime"=>$activityStartTime, "ContactCategories"=>$contactCategories, "ActionType"=>$actionType));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a ContactEntity object.
	 * 
	 * @$contactEntityId		The identifier of the ContactEntity object
	 *
	 * @returns ContactEntity
	 */ 
	function GetContactEntity($contactEntityId)
	{
		$result = $this->sendRequest("GetContactEntity", array("ContactEntityId"=>$contactEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns an array of all the contact persons for the company card.
	 *
	 *@$contactId		
	 *
	 *@return: Array of Persons
	 */
	function GetPersons($contactId)
	{
		$result = $this->sendRequest("GetPersons", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the contact with all the contact persons belonging to the contact
	 *
	 *@$contactId		The id of the contact.
	 *
	 *@return: ContactEntity with all data and persons.
	 */
	function GetContactWithPersons($contactId)
	{
		$result = $this->sendRequest("GetContactWithPersons", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the contact belonging to the currently logged on user.
	 *
	 *
	 *@return: The Contact
	 */
	function GetMyContact()
	{
		$result = $this->sendRequest("GetMyContact", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns all data needed to display the logged on person's business card. That is company, person, and company interest data.
	 *
	 *
	 *@return: The contact object with persons and interests
	 */
	function GetMyBizCard()
	{
		$result = $this->sendRequest("GetMyBizCard", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change country regenerates the default values and localized information such as phone number and address format
	 *
	 *@$contactEntity		
	 *@$toCountryId		The country to switch to
	 *
	 *@return: 
	 */
	function ChangeCountry($contactEntity, $toCountryId)
	{
		$result = $this->sendRequest("ChangeCountry", array("ContactEntity"=>$contactEntity, "ToCountryId"=>$toCountryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the contact's localized address.
	 *
	 *@$contactId		The contact id
	 *
	 *@return: The address as LocalizedField[][].
	 */
	function GetAddress($contactId)
	{
		$result = $this->sendRequest("GetAddress", array("ContactId"=>$contactId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the contact's localized address.
	 *
	 *@$contactId		The contact id
	 *@$countryId		
	 *
	 *@return: The address as LocalizedField[][].
	 */
	function GetAddressByCountry($contactId, $countryId)
	{
		$result = $this->sendRequest("GetAddressByCountry", array("ContactId"=>$contactId, "CountryId"=>$countryId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$contactId		
	 *@$newPersonEntity		
	 *
	 *@return: 
	 */
	function AddPerson($contactId, $newPersonEntity)
	{
		$result = $this->sendRequest("AddPerson", array("ContactId"=>$contactId, "NewPersonEntity"=>$newPersonEntity));	
		return $this->getResultFromResponse($result);
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
	 * Creates a new contact based on external duplicate
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
	 * Retrieve all available duplicate rules for contact
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
	 * Merge two contacts. The destination contact will remain.
	 *
	 *@$sourceContactId		Source contact to merge from
	 *@$destinationContactId		Destination contact to merge into
	 *@$mergeIdenticalPersons		Persons with identical names will be merged
	 *@$replaceEmptyFieldsOnDestination		If true, empty fields on destination will be replaced by values from source.
	 *
	 *@return: 
	 */
	function Merge($sourceContactId, $destinationContactId, $mergeIdenticalPersons, $replaceEmptyFieldsOnDestination)
	{
		$result = $this->sendRequest("Merge", array("SourceContactId"=>$sourceContactId, "DestinationContactId"=>$destinationContactId, "MergeIdenticalPersons"=>$mergeIdenticalPersons, "ReplaceEmptyFieldsOnDestination"=>$replaceEmptyFieldsOnDestination));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Copy a contact. Activities and related data will be ignored
	 *
	 *@$sourceContactId		The id of the contact to copy
	 *@$destinationContactName		The name of the destination contact
	 *@$destinationContactDepartment		The department of the destination contact
	 *@$copyPersons		If true, persons will be copied from source contact
	 *
	 *@return: Id of copied contact
	 */
	function Copy($sourceContactId, $destinationContactName, $destinationContactDepartment, $copyPersons)
	{
		$result = $this->sendRequest("Copy", array("SourceContactId"=>$sourceContactId, "DestinationContactName"=>$destinationContactName, "DestinationContactDepartment"=>$destinationContactDepartment, "CopyPersons"=>$copyPersons));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$name		
	 *@$department		
	 *
	 *@return: 
	 */
	function GetNameDepartmentDuplicates($name, $department)
	{
		$result = $this->sendRequest("GetNameDepartmentDuplicates", array("Name"=>$name, "Department"=>$department));	
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
	 * Get the associated billing and invoice quote version addresses. These addresses might be address on the contact, or a custom address.
	 *
	 *@$quoteVersionId		The version to get the addresses for.
	 *
	 *@return: The quote version addresses. Invoice and billing address, in that order.
	 */
	function GetQuoteVersionAddresses($quoteVersionId)
	{
		$result = $this->sendRequest("GetQuoteVersionAddresses", array("QuoteVersionId"=>$quoteVersionId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a custom quote version address.
	 *
	 *@$quoteVersionId		The version to save the address on.
	 *@$address		The address to save on the quote version.
	 *@$addressType		Should be either QuoteBillingAddress or QuoteShippingAddress
	 *@$countryId		The country for the custom address
	 *
	 *@return: The saved addresses.
	 */
	function SaveQuoteVersionAddress($quoteVersionId, $address, $addressType, $countryId)
	{
		$result = $this->sendRequest("SaveQuoteVersionAddress", array("QuoteVersionId"=>$quoteVersionId, "Address"=>$address, "AddressType"=>$addressType, "CountryId"=>$countryId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of Contact objects.
	 * 
	 * @$contactIds		The identifiers of the Contact object
	 *
	 * @returns Array of Contact objects
	 */ 
	function GetContactList($contactIds)
	{
		$result = $this->sendRequest("GetContactList", array("ContactIds"=>$contactIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Getting the contacts where the user currently logged in is set as contact owner.
	 *
	 *
	 *@return: Array of contacts
	 */
	function GetMyContacts()
	{
		$result = $this->sendRequest("GetMyContacts", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Method that returns a set of initial contacts. This could be the contacts in a favorites selection, the history list, the diary, or from all sources. If retrieved from the diary it will get appointments for the current and the next day.
	 *
	 *@$sourceType		The source where the contacts are retrieved from (Favorites, History, Diary)
	 *
	 *@return: Arrayof contacts
	 */
	function GetMyRecentContacts($sourceType)
	{
		$result = $this->sendRequest("GetMyRecentContacts", array("SourceType"=>$sourceType));	
		return $this->getResultFromResponse($result);
	}
        
}