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

		
class SoNavigatorAgent extends SoAgent
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
        parent::__construct($endpoint."Navigator.svc", "WcfNavigator.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/**
	 * Summary
	 * Gets a NavigatorCompany object.
	 * 
	 * @$navigatorCompanyId		The identifier of the NavigatorCompany object
	 *
	 * @returns NavigatorCompany
	 */ 
	function GetNavigatorCompany($navigatorCompanyId)
	{
		$result = $this->sendRequest("GetNavigatorCompany", array("NavigatorCompanyId"=>$navigatorCompanyId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets an array of NavigatorCompany objects.
	 * 
	 * @$navigatorCompanyIds		The identifiers of the NavigatorCompany object
	 *
	 * @returns Array of NavigatorCompany objects
	 */ 
	function GetNavigatorCompanyList($navigatorCompanyIds)
	{
		$result = $this->sendRequest("GetNavigatorCompanyList", array("NavigatorCompanyIds"=>$navigatorCompanyIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$name		
	 *
	 *@return: 
	 */
	function GetNavigatorCompanies($name)
	{
		$result = $this->sendRequest("GetNavigatorCompanies", array("Name"=>$name));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

