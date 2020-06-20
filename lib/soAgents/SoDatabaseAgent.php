<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoDatabaseAgent short summary.
 *
 *  
 *
 * @version 1.0
 * @author DoWEB I/S
 */

		
class SoDatabaseAgent extends SoAgent
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
        parent::__construct($endpoint."database.svc", "WcfDatabase.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
     

 
	
        
}
    
   
  

