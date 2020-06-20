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

		
class SoCustomerServiceAgent extends SoAgent
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
        parent::__construct($endpoint."CustomerService.svc", "WcfCustomerService.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Returns the calculated results for the required statistics for the Customer Service Status Page
	 *
	 *@$functions		List of functions to calculate and return
	 *
	 *@return: Array of StatisticsDataSet
	 */
	function GetStatistics($functions)
	{
		$result = $this->sendRequest("GetStatistics", array("Functions"=>$functions));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

