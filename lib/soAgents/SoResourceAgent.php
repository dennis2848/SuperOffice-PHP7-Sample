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

		
class SoResourceAgent extends SoAgent
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
        parent::__construct($endpoint."Resource.svc", "WcfResource.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Create or update a resource substitution
	 *
	 *@$resourceName		The name of the resource, without any brackets
	 *@$resourceValues		The new value of the resource
	 *@$culture		The .NET culture string
	 *@$isActive		Is the subsitution now active
	 *
	 *@return: This method has no return value
	 */
	function SetResourceSubstitution($resourceName, $resourceValues, $culture, $isActive)
	{
		$result = $this->sendRequest("SetResourceSubstitution", array("ResourceName"=>$resourceName, "ResourceValues"=>$resourceValues, "Culture"=>$culture, "IsActive"=>$isActive));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Permanentely delete a resource substitution for one or more cultures
	 *
	 *@$resourceName		The name of the resource, without any brackets
	 *@$culture		The .NET culture string; if blank, then ALL substitutions for this resource will be dropped
	 *
	 *@return: This method has no return value
	 */
	function DeleteResourceSubstitution($resourceName, $culture)
	{
		$result = $this->sendRequest("DeleteResourceSubstitution", array("ResourceName"=>$resourceName, "Culture"=>$culture));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Activate or deactive a resource substitution for one or more cultures
	 *
	 *@$resourceName		The name of the resource, without any brackets; if blank then this is the MASTER SWITCH for the override system
	 *@$culture		The .NET culture string; if blank, then ALL substitutions for this resource will be affected
	 *@$isActive		New status of override
	 *
	 *@return: This method has no return value
	 */
	function ActivateResourceSubstitution($resourceName, $culture, $isActive)
	{
		$result = $this->sendRequest("ActivateResourceSubstitution", array("ResourceName"=>$resourceName, "Culture"=>$culture, "IsActive"=>$isActive));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get substitutions for some or all resources for one culture
	 *
	 *@$resourceNames		Array of names of resources for which overrides are sought; if empty, then get all
	 *@$culture		.NET culture string; if empty, then get all
	 *@$activeOnly		If true, then only resources with active substitutions will be returned; if false then ALL existing overrides will be returned
	 *
	 *@return: Array of override objects, empty if there are none
	 */
	function GetResourceSubstitutions($resourceNames, $culture, $activeOnly)
	{
		$result = $this->sendRequest("GetResourceSubstitutions", array("ResourceNames"=>$resourceNames, "Culture"=>$culture, "ActiveOnly"=>$activeOnly));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Determine if resource substitution/override is active, globally or for a subset of resources/cultures
	 *
	 *@$resourceNames		Array of names of resources for which overrides are sought; if empty, then get the MASTER on/off
	 *@$culture		.NET culture string; if empty, then get for all cultures (unless resourceName
	 *
	 *@return: Array of override objects, empty if there are none; the ResourceValue member is not set by this call
	 */
	function IsResourceSubstitutionActive($resourceNames, $culture)
	{
		$result = $this->sendRequest("IsResourceSubstitutionActive", array("ResourceNames"=>$resourceNames, "Culture"=>$culture));	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

