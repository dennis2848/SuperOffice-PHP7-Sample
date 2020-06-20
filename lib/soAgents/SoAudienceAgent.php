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

		
class SoAudienceAgent extends SoAgent
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
        parent::__construct($endpoint."Audience.svc", "WcfAudience.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


    /**
     * Loading default values into a new AudienceLayoutEntity.
     * NetServer calculates default values (e.g. Country) on the entity, which is required when creating/storing a new instance
     * 
     * @return New AudienceLayoutEntity with default values
     */
     function CreateDefaultAudienceLayoutEntity()
     {
		$result = $this->sendRequest("CreateDefaultAudienceLayoutEntity", array());
		return $this->getResultFromResponse($result);
     }
    /**
     * Updates the existing AudienceLayoutEntity or creates a new AudienceLayoutEntity if the id parameter is empty
     * 
     * @return New or updated AudienceLayoutEntity
     */
	function SaveAudienceLayoutEntity($audienceLayoutEntity)
	{
		$result = $this->sendRequest("SaveAudienceLayoutEntity", array("AudienceLayoutEntity"=>$audienceLayoutEntity));
		return $this->getResultFromResponse($result);
	}
	/**
	 * Deletes the AudienceLayoutEntity
	 * 
	 * @$audienceLayoutEntityId		The identity of the AudienceLayoutEntity
	 */
	function DeleteAudienceLayoutEntity($audienceLayoutEntityId)
	{
		$result = $this->sendRequest("DeleteAudienceLayoutEntity", array("AudienceLayoutEntity"=>$audienceLayoutEntityId));
		return $this->getResultFromResponse($result, true);
	}
        

	/** 
	 * Summary
	 * Saves an Audience configuration parameter belonging to a Audience layout
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$configParameter		The Audience configuration parameter to save.
	 *
	 *@return: The new or updated configuration parameter
	 */
	function SaveConfigParameter($layoutName, $configParameter)
	{
		$result = $this->sendRequest("SaveConfigParameter", array("LayoutName"=>$layoutName, "ConfigParameter"=>$configParameter));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the string value of an Audience configuration parameter belonging to a given Audience layout with the specified configuration parameter name
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$parameterName		The name of the Audience configuration parameter
	 *
	 *@return: The string value of the Audience configuration parameter.
	 */
	function GetConfigParameterValue($layoutName, $parameterName)
	{
		$result = $this->sendRequest("GetConfigParameterValue", array("LayoutName"=>$layoutName, "ParameterName"=>$parameterName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an Audience configuration parameter belonging to a given Audience layout with the specified configuration parameter name
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$parameterName		The name of the Audience configuration parameter
	 *
	 *@return: The Audience configuration parameter.
	 */
	function GetConfigParameter($layoutName, $parameterName)
	{
		$result = $this->sendRequest("GetConfigParameter", array("LayoutName"=>$layoutName, "ParameterName"=>$parameterName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Deletes an Audience configuration parameter belonging to a Audience layout
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$parameterName		The name of the Audience configuration parameter
	 *
	 *@return: 
	 */
	function DeleteConfigParameter($layoutName, $parameterName)
	{
		$result = $this->sendRequest("DeleteConfigParameter", array("LayoutName"=>$layoutName, "ParameterName"=>$parameterName));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Gets an Audience configuration parameter belonging to the currently logged on user with the specified configuration parameter name.
	 *
	 *@$parameterName		The name of the Audience configuration parameter
	 *
	 *@return: The Audience configuration parameter.
	 */
	function GetMyConfigParameter($parameterName)
	{
		$result = $this->sendRequest("GetMyConfigParameter", array("ParameterName"=>$parameterName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the string value of an Audience configuration parameter belonging to the currently logged on user with the specified configuration parameter name.
	 *
	 *@$parameterName		The name of the Audience configuration parameter
	 *
	 *@return: The string value of the Audience configuration parameter.
	 */
	function GetMyConfigParameterValue($parameterName)
	{
		$result = $this->sendRequest("GetMyConfigParameterValue", array("ParameterName"=>$parameterName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the string value of an Audience configuration parameter with the specified configuration parameter name on the person specified
	 *
	 *@$parameterName		The name of the Audience configuration parameter
	 *@$personId		Id of the person the parameter belongs to
	 *
	 *@return: The string value of the Audience configuration parameter.
	 */
	function GetConfigParameterValueOnPerson($parameterName, $personId)
	{
		$result = $this->sendRequest("GetConfigParameterValueOnPerson", array("ParameterName"=>$parameterName, "PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an Audience configuration parameter with the specified configuration parameter name on the person specified
	 *
	 *@$parameterName		The name of the Audience configuration parameter
	 *@$personId		Id of the person the parameter belongs to
	 *
	 *@return: The Audience configuration parameter.
	 */
	function GetConfigParameterOnPerson($parameterName, $personId)
	{
		$result = $this->sendRequest("GetConfigParameterOnPerson", array("ParameterName"=>$parameterName, "PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Audience configuration parameters belonging to a given Audience layout.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *
	 *@return: Array of Audience configuration parameters.
	 */
	function GetConfigParametersByLayoutName($layoutName)
	{
		$result = $this->sendRequest("GetConfigParametersByLayoutName", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Audience configuration parameters belonging to the currently logged on user.
	 *
	 *
	 *@return: Array of Audience configuration parameters.
	 */
	function GetMyConfigParameters()
	{
		$result = $this->sendRequest("GetMyConfigParameters", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Audience configuration parameters belonging to the person specified
	 *
	 *@$personId		Id of the person the parameter belongs to
	 *
	 *@return: Array of Audience configuration parameters.
	 */
	function GetConfigParametersOnPerson($personId)
	{
		$result = $this->sendRequest("GetConfigParametersOnPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/**
	 * Summary
	 * Gets a AudienceLayoutEntity object.
	 * 
	 * @$audienceLayoutEntityId		The identifier of the AudienceLayoutEntity object
	 *
	 * @returns AudienceLayoutEntity
	 */ 
	function GetAudienceLayoutEntity($audienceLayoutEntityId)
	{
		$result = $this->sendRequest("GetAudienceLayoutEntity", array("AudienceLayoutEntityId"=>$audienceLayoutEntityId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets an Audience layout by it's instance name
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *
	 *@return: Audience layout entity
	 */
	function GetAudienceLayoutByName($layoutName)
	{
		$result = $this->sendRequest("GetAudienceLayoutByName", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Audience layout belonging to the currently logged on user.
	 *
	 *
	 *@return: Audience layout entity
	 */
	function GetMyAudienceLayout()
	{
		$result = $this->sendRequest("GetMyAudienceLayout", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Gets the Audience layout belonging to the person specified.
	 *
	 *@$personId		The person id
	 *
	 *@return: Audience layout entity
	 */
	function GetAudienceLayoutOnPerson($personId)
	{
		$result = $this->sendRequest("GetAudienceLayoutOnPerson", array("PersonId"=>$personId));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Returns the default project or event image that is displayed in Audience when no project/event image is found. The image belongs to a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetDefaultProjectImage($layoutName)
	{
		$result = $this->sendRequest("GetDefaultProjectImage", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the default project or event image that is displayed in Audience when no project/event image is found. The image is set on a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$image		The default project/event image to be stored for this Audience layout instance (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetDefaultProjectImage($layoutName, $image)
	{
		$result = $this->sendRequest("SetDefaultProjectImage", array("LayoutName"=>$layoutName, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Stores the default person (sales rep) image that is displayed in Audience when no person image is found. The image is set on a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$image		The default project/event image to be stored for this Audience layout instance (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetDefaultPersonImage($layoutName, $image)
	{
		$result = $this->sendRequest("SetDefaultPersonImage", array("LayoutName"=>$layoutName, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the default person (sales rep) image that is displayed in Audience when no person image is found. The image belongs to a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetDefaultPersonImage($layoutName)
	{
		$result = $this->sendRequest("GetDefaultPersonImage", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Stores the default country flag image that is displayed in Audience when no person image is found. The image is set on a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *@$image		The default country image to be stored for this Audience layout instance (System.Drawing.Image) (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetDefaultCountryFlag($layoutName, $image)
	{
		$result = $this->sendRequest("SetDefaultCountryFlag", array("LayoutName"=>$layoutName, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Returns the default country flag image that is displayed in Audience when no person image is found. The image belongs to a specific Audience layout instance.
	 *
	 *@$layoutName		Name of the Audience layout instance
	 *
	 *@return: The image as a System.Drawing.Image. (If the the image is returned over webservices, the stream is returned as a Base64 encoded string.) (Returned as a serializable type: byte[]
	 */
	function GetDefaultCountryFlag($layoutName)
	{
		$result = $this->sendRequest("GetDefaultCountryFlag", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$layoutName		
	 *
	 *@return:  (Returned as a serializable type: byte[]
	 */
	function GetLogoImage($layoutName)
	{
		$result = $this->sendRequest("GetLogoImage", array("LayoutName"=>$layoutName));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *@$layoutName		
	 *@$image		 (Using a serializable type: byte[]
	 *
	 *@return: 
	 */
	function SetLogoImage($layoutName, $image)
	{
		$result = $this->sendRequest("SetLogoImage", array("LayoutName"=>$layoutName, "Image"=>$image));	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

