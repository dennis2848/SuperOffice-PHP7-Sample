<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoPreviewsAgent short summary.
 *
 *  
 *
 * @version 1.0
 * @author DoWEB I/S
 */

		
class SoPreviewsAgent extends SoAgent
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
        parent::__construct($endpoint."Previews.svc", "WcfPreviews.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
     

 
	
        
}
    
   
  

