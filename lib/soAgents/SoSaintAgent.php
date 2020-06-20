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

		
class SoSaintAgent extends SoAgent
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
        parent::__construct($endpoint."Saint.svc", "WcfSaint.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new StatusMonitor.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New StatusMonitor with default values
     */
     function CreateDefaultStatusMonitor()
     {
		$result = $this->sendRequest("CreateDefaultStatusMonitor", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing StatusMonitor or creates a new StatusMonitor if the id parameter is empty
     * 
     * @return New or updated StatusMonitor
     */
	function SaveStatusMonitor($statusMonitor)
	{
		$result = $this->sendRequest("SaveStatusMonitor", array("StatusMonitor"=>$statusMonitor));
		return $this->getResultFromResponse($result);
	}
        

    /**
     * Loading default values into a new StatusMonitorPeriods.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New StatusMonitorPeriods with default values
     */
     function CreateDefaultStatusMonitorPeriods()
     {
		$result = $this->sendRequest("CreateDefaultStatusMonitorPeriods", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing StatusMonitorPeriods or creates a new StatusMonitorPeriods if the id parameter is empty
     * 
     * @return New or updated StatusMonitorPeriods
     */
	function SaveStatusMonitorPeriods($statusMonitorPeriods)
	{
		$result = $this->sendRequest("SaveStatusMonitorPeriods", array("StatusMonitorPeriods"=>$statusMonitorPeriods));
		return $this->getResultFromResponse($result);
	}
        

	/** 
	 * Summary
	 * Get all active status monitors for a specified target
	 *
	 *@$id		Identity of target type(contact identity, project identity etc.)
	 *@$type		Type to get status monitors for("contact", "project", etc.)
	 *
	 *@return: Active status monitors
	 */
	function GetStatusMonitors($id, $type)
	{
		$result = $this->sendRequest("GetStatusMonitors", array("Id"=>$id, "Type"=>$type));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Get a single status monitor based on its identity
	 *
	 *@$id		Identity of status monitor
	 *
	 *@return: The requested status monitor
	 */
	function GetStatusMonitor($id)
	{
		$result = $this->sendRequest("GetStatusMonitor", array("Id"=>$id));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Regenerate status monitors
	 *
	 *@$runAsBatch		If true, then execute the regeneration as a Batch Task; the service call will return immediately. Otherwise wait until the task completes, may cause a timeout if called as a Web Service
	 *
	 *@return: Information about the batch task, if batch execution was requested. Otherwise null
	 */
	function RegenerateStatusMonitors($runAsBatch)
	{
		$result = $this->sendRequest("RegenerateStatusMonitors", array("RunAsBatch"=>$runAsBatch));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set rank order on status monitors
	 *
	 *@$type		Type of status monitors to reorder ("contact", "project", etc.)
	 *@$itemsIds		The ids of the items in the order you want
	 *
	 *@return: This method has no return value
	 */
	function SetRankOnStatusMonitors($type, $itemsIds)
	{
		$result = $this->sendRequest("SetRankOnStatusMonitors", array("Type"=>$type, "ItemsIds"=>$itemsIds));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Regenerate the given status monitor
	 *
	 *@$statusMonitorId		The id of the statusmonitor to regenerate
	 *
	 *@return: This method has no return value
	 */
	function RegenerateStatusMonitor($statusMonitorId)
	{
		$result = $this->sendRequest("RegenerateStatusMonitor", array("StatusMonitorId"=>$statusMonitorId));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Regenerate the Saint counters - this can take several minutes
	 *
	 *@$runAsBatch		If true, then execute the regeneration as a Batch Task; the service call will return immediately. Otherwise wait until the task completes, may cause a timeout if called as a Web Service
	 *
	 *@return: Information about the batch task, if batch execution was requested. Otherwise null
	 */
	function RegenerateCounters($runAsBatch)
	{
		$result = $this->sendRequest("RegenerateCounters", array("RunAsBatch"=>$runAsBatch));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the StatusMonitorPeriods entity.
	 *
	 *
	 *@return: The StatusMonitorEntity
	 */
	function GetStatusMonitorPeriods()
	{
		$result = $this->sendRequest("GetStatusMonitorPeriods", array());	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

