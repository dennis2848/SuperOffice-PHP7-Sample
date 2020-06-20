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

		
class SoDiagnosticsAgent extends SoAgent
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
        parent::__construct($endpoint."Diagnostics.svc", "WcfDiagnostics.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Flushes all NetServer caches
	 *
	 *
	 *@return: 
	 */
	function FlushCaches()
	{
		$result = $this->sendRequest("FlushCaches", array());	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get the name of the caches that can be flushed
	 *
	 *
	 *@return: Name of the caches that can be flusehd
	 */
	function GetCacheNames()
	{
		$result = $this->sendRequest("GetCacheNames", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Flushes all NetServer caches named
	 *
	 *@$cacheNames		Name of the cahcnes to flush
	 *
	 *@return: This method has no return value
	 */
	function FlushCachesByName($cacheNames)
	{
		$result = $this->sendRequest("FlushCachesByName", array("CacheNames"=>$cacheNames));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Log a change in view state. The granularity of the logging depends on the current configuration. This call returns asynchronously, leaving the server to finish processing later on.
	 *
	 *@$viewState		Current view state to be logged
	 *
	 *@return: 
	 */
	function LogViewState($viewState)
	{
		$result = $this->sendRequest("LogViewState", array("ViewState"=>$viewState));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Change NetServer log settings.
	 *
	 *@$logWarning		Turn on warning log
	 *@$logInformation		Turn on information log
	 *@$logSuccessAudit		Turn on success audit log
	 *@$logFailureAudit		Turn on failure audit log
	 *@$logToEventLog		Log to event log
	 *@$logToSuperOffice		Log to SuperOffice
	 *@$logToFile		Log to file
	 *@$logToTrace		Log to trace
	 *
	 *@return: 
	 */
	function ChangeLogSettings($logWarning, $logInformation, $logSuccessAudit, $logFailureAudit, $logToEventLog, $logToSuperOffice, $logToFile, $logToTrace)
	{
		$result = $this->sendRequest("ChangeLogSettings", array("LogWarning"=>$logWarning, "LogInformation"=>$logInformation, "LogSuccessAudit"=>$logSuccessAudit, "LogFailureAudit"=>$logFailureAudit, "LogToEventLog"=>$logToEventLog, "LogToSuperOffice"=>$logToSuperOffice, "LogToFile"=>$logToFile, "LogToTrace"=>$logToTrace));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Adds WebApp usage to existing log
	 *
	 *@$webAppUsages		Web app usage.
	 *
	 *@return: 
	 */
	function AddWebAppUsage($webAppUsages)
	{
		$result = $this->sendRequest("AddWebAppUsage", array("WebAppUsages"=>$webAppUsages));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

