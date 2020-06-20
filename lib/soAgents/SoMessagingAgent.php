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

		
class SoMessagingAgent extends SoAgent
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
        parent::__construct($endpoint."Messaging.svc", "WcfMessaging.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }


	/** 
	 * Summary
	 * Create a new message and insert it in the message queue. (inbox)
	 *
	 *@$incomingMessage		
	 *
	 *@return: 
	 */
	function CreateMessage($incomingMessage)
	{
		$result = $this->sendRequest("CreateMessage", array("IncomingMessage"=>$incomingMessage));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Get delivery status
	 *
	 *@$messagingIds		Array of messaging ids.
	 *
	 *@return: 
	 */
	function GetDeliveryStatus($messagingIds)
	{
		$result = $this->sendRequest("GetDeliveryStatus", array("MessagingIds"=>$messagingIds));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * Set or change the delivery status on an outgoing messsage.
	 *
	 *@$plugin		Name of plugin
	 *@$externalMessageId		External message id known to plugin.
	 *@$status		Delivery status
	 *@$statusDescription		String describing delivery status.
	 *
	 *@return: 
	 */
	function SetDeliveryStatus($plugin, $externalMessageId, $status, $statusDescription)
	{
		$result = $this->sendRequest("SetDeliveryStatus", array("Plugin"=>$plugin, "ExternalMessageId"=>$externalMessageId, "Status"=>$status, "StatusDescription"=>$statusDescription));	
		return $this->getResultFromResponse($result, true);
	}

	/** 
	 * Summary
	 * Send an array of messages
	 *
	 *@$plugin		Name of plugin to use.
	 *@$outgoingMessages		Array of outgoing messages you want to send.
	 *
	 *@return: Array of MessageDeliveryStatus. Length of the array is equal to the number of outgoing messages.
	 */
	function SendMessages($plugin, $outgoingMessages)
	{
		$result = $this->sendRequest("SendMessages", array("Plugin"=>$plugin, "OutgoingMessages"=>$outgoingMessages));	
		return $this->getResultFromResponse($result);
	}

	/** 
	 * Summary
	 * 
	 *
	 *
	 *@return: 
	 */
	function GetPlugins()
	{
		$result = $this->sendRequest("GetPlugins", array());	
		return $this->getResultFromResponse($result);
	}
        
}
    
   
  

