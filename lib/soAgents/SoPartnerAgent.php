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

		
class SoPartnerAgent extends SoAgent
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
        parent::__construct($endpoint."Partner.svc", "WcfPartner.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Create a web panel in the logged in users' installation of SuperOffice CRM online. The panel will automatically be registered to the currently authenticated ApplicationId.
	 *
	 *@$identifier		The string constant used by the Partner Application to identify this web panel
	 *@$displayName		The name of the panel as displayed in the GUI; may be multi-language syntax
	 *@$displayDescription		The tooltip of the panel as displayed in the GUI; may be multi-language syntax
	 *@$url		The url (target) of the panel; may contain merge tags
	 *@$visibleIn		Where should the URL appear
	 *@$urlEncoding		The encoding of the URL
	 *@$onSalesMarketingWeb		Is the webpanel visible when user is on the SM Web client
	 *@$onSalesMarketingPocket		Is the webpanel visible when user is on the SM Pocket client
	 *
	 *@return: The 'window name' of the panel, which can be used as part of the soprotocol string to navigate to the web panel
	 */
	function CreateOrUpdateWebPanel($identifier, $displayName, $displayDescription, $url, $visibleIn, $urlEncoding, $onSalesMarketingWeb, $onSalesMarketingPocket)
	{
		$result = $this->sendRequest("CreateOrUpdateWebPanel", array("Identifier"=>$identifier, "DisplayName"=>$displayName, "DisplayDescription"=>$displayDescription, "Url"=>$url, "VisibleIn"=>$visibleIn, "UrlEncoding"=>$urlEncoding, "OnSalesMarketingWeb"=>$onSalesMarketingWeb, "OnSalesMarketingPocket"=>$onSalesMarketingPocket));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * The web panel is no longer visible to the users, but all settings are kept
	 *
	 *@$identifier		The string constant used by the Partner Application to identify this web panel
	 *
	 *@return: This method has no return value
	 */
	function SuspendWebPanel($identifier)
	{
		$result = $this->sendRequest("SuspendWebPanel", array("Identifier"=>$identifier));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Undo a Suspend, so that the Web Panel is visible to users again
	 *
	 *@$identifier		The string constant used by the Partner Application to identify this web panel
	 *
	 *@return: This method has no return value
	 */
	function ResumeWebPanel($identifier)
	{
		$result = $this->sendRequest("ResumeWebPanel", array("Identifier"=>$identifier));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get all web panels registered by this ApplicationId
	 *
	 *
	 *@return: Array of PartnerWebPanel entities
	 */
	function GetMyWebPanels()
	{
		$result = $this->sendRequest("GetMyWebPanels", array());	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Irrevocably delete all information related to this web panel; no undo
	 *
	 *@$identifier		The string constant used by the Partner Application to identify this web panel
	 *
	 *@return: This method has no return value
	 */
	function DeleteWebPanel($identifier)
	{
		$result = $this->sendRequest("DeleteWebPanel", array("Identifier"=>$identifier));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Irrevocably delete all web panels registered by this ApplicationId
	 *
	 *
	 *@return: This method has no return value
	 */
	function DeleteMyWebPanels()
	{
		$result = $this->sendRequest("DeleteMyWebPanels", array());	
		return $this->getResultFromResponse($result, true);
	}
        
}
    
   
  

