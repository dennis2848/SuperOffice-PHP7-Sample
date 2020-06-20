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

		
class SoReplicationAgent extends SoAgent
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
        parent::__construct($endpoint."Replication.svc", "WcfReplication.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new Satellite.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New Satellite with default values
     */
     function CreateDefaultSatellite()
     {
		$result = $this->sendRequest("CreateDefaultSatellite", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing Satellite or creates a new Satellite if the id parameter is empty
     * 
     * @return New or updated Satellite
     */
	function SaveSatellite($satellite)
	{
		$result = $this->sendRequest("SaveSatellite", array("Satellite"=>$satellite));
		return $this->getResultFromResponse($result);
	}
        

	/**
	 * Summary
	 * Gets a Area object.
	 * 
	 * @$areaId		The identifier of the Area object
	 *
	 * @returns Area
	 */ 
	function GetArea($areaId)
	{
		$result = $this->sendRequest("GetArea", array("AreaId"=>$areaId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Enable freetext search on this area
	 *
	 *@$areaId		The id of the area
	 *@$freetextEnabled		True if freetextSearch on this area shall be enabled
	 *
	 *@return: No return value
	 */
	function SetFreetextSearchEnabledOnArea($areaId, $freetextEnabled)
	{
		$result = $this->sendRequest("SetFreetextSearchEnabledOnArea", array("AreaId"=>$areaId, "FreetextEnabled"=>$freetextEnabled));	
		return $this->getResultFromResponse($result, true);
	}

	/**
	 * Summary
	 * Gets an array of Area objects.
	 * 
	 * @$areaIds		The identifiers of the Area object
	 *
	 * @returns Array of Area objects
	 */ 
	function GetAreaList($areaIds)
	{
		$result = $this->sendRequest("GetAreaList", array("AreaIds"=>$areaIds));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a Satellite object.
	 * 
	 * @$satelliteId		The identifier of the Satellite object
	 *
	 * @returns Satellite
	 */ 
	function GetSatellite($satelliteId)
	{
		$result = $this->sendRequest("GetSatellite", array("SatelliteId"=>$satelliteId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetCentralLicense()
	{
		$result = $this->sendRequest("GetCentralLicense", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$license		
	 *
	 *@return: 
	 */
	function SaveCentralLicense($license)
	{
		$result = $this->sendRequest("SaveCentralLicense", array("License"=>$license));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

