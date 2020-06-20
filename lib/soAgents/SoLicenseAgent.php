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

		
class SoLicenseAgent extends SoAgent
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
        parent::__construct($endpoint."License.svc", "WcfLicense.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Get all licenses, with usage, from all module owners as they are stored in the database
	 *
	 *
	 *@return: 
	 */
	function GetLicenseForAllOwnersFromDB()
	{
		$result = $this->sendRequest("GetLicenseForAllOwnersFromDB", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$ownerName		
	 *
	 *@return: 
	 */
	function GetLicenseFromLicenseServer($ownerName)
	{
		$result = $this->sendRequest("GetLicenseFromLicenseServer", array("OwnerName"=>$ownerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get details about a license from the license server.
	 *
	 *@$licenseInfo		Description of the license
	 *@$moduleLicense		Information about a particular module to get information for.
	 *
	 *@return: Information about a particular license module.
	 */
	function GetModuleLicenseHistoryFromLicenseServer($licenseInfo, $moduleLicense)
	{
		$result = $this->sendRequest("GetModuleLicenseHistoryFromLicenseServer", array("LicenseInfo"=>$licenseInfo, "ModuleLicense"=>$moduleLicense));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Validate that a license is consistant.
	 *
	 *@$licenseInfo		License to validate consistancy for
	 *
	 *@return: 
	 */
	function ValidateLicenseInfo($licenseInfo)
	{
		$result = $this->sendRequest("ValidateLicenseInfo", array("LicenseInfo"=>$licenseInfo));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Save a new license to the database.
	 *
	 *@$newLicense		New license to save to the database.
	 *
	 *@return: 
	 */
	function ActivateLicenseInfo($newLicense)
	{
		$result = $this->sendRequest("ActivateLicenseInfo", array("NewLicense"=>$newLicense));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get License from the license server for a particular module owner.
	 *
	 *@$ownerName		Name of the module owner to get license from.
	 *
	 *@return: License from the database, from the license server and with usage.
	 */
	function GetLicenseStatusFromLicenseServer($ownerName)
	{
		$result = $this->sendRequest("GetLicenseStatusFromLicenseServer", array("OwnerName"=>$ownerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get license, with usage, as it is stored in the database for one particular module owner.
	 *
	 *@$ownerName		Name of the module owner.
	 *
	 *@return: License, with usage, as it is stored in the database.
	 */
	function GetLicenseFromDB($ownerName)
	{
		$result = $this->sendRequest("GetLicenseFromDB", array("OwnerName"=>$ownerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Change the new serial number for the installation.
	 *
	 *@$newCompanyName		The new company name
	 *@$newSerialNumber		New serial number to change to.
	 *
	 *@return: 
	 */
	function ChangeSerialNumber($newCompanyName, $newSerialNumber)
	{
		$result = $this->sendRequest("ChangeSerialNumber", array("NewCompanyName"=>$newCompanyName, "NewSerialNumber"=>$newSerialNumber));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Obtain information about associate module licenses
	 *
	 *@$associateId		Associate id to check for associate module licenses
	 *
	 *@return: Associate module licenses grouped by owners.
	 */
	function GetUserLicenses($associateId)
	{
		$result = $this->sendRequest("GetUserLicenses", array("AssociateId"=>$associateId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Obtain information about satellite module licenses
	 *
	 *@$satelliteId		Satellite id to check for satellite module licenses
	 *
	 *@return: Satellite module licenses grouped by owners.
	 */
	function GetSatelliteLicenses($satelliteId)
	{
		$result = $this->sendRequest("GetSatelliteLicenses", array("SatelliteId"=>$satelliteId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Remove the license from a particular module owner from the database.  It is not permitted to remove licenses from SuperOffice
	 *
	 *@$moduleOwner		Name of the module owner to remove license from.
	 *
	 *@return: 
	 */
	function RemoveLicenseFromDB($moduleOwner)
	{
		$result = $this->sendRequest("RemoveLicenseFromDB", array("ModuleOwner"=>$moduleOwner));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Load a new license from file
	 *
	 *@$fileContent		Content of the license file as read.
	 *
	 *@return: 
	 */
	function GetLicenseFromFile($fileContent)
	{
		$result = $this->sendRequest("GetLicenseFromFile", array("FileContent"=>$fileContent));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get the shop URL for the specified module owner. This can be used to redirect user to the web shop.
	 *
	 *@$ownerName		Name of the module owner.
	 *
	 *@return: The URL which contains the shop for the specified module owner.
	 */
	function GetShopUrl($ownerName)
	{
		$result = $this->sendRequest("GetShopUrl", array("OwnerName"=>$ownerName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get all licenses in a MDOListItem structure.
	 *
	 *
	 *@return: Hierarchical structure of user licenses.
	 */
	function GetUserLicensesMDOList()
	{
		$result = $this->sendRequest("GetUserLicensesMDOList", array());	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

