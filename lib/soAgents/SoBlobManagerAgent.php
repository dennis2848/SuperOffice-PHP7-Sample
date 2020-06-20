<?php
include_once(dirname(__FILE__).'/../SoAgent.php');
/**
 * SoBlobManagerAgent short summary.
 *
 * SoBlobManagerAgent description.
 *
 * @version 1.0
 * @author DoWEB I/S
 */

		
class SoBlobManagerAgent extends SoAgent
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
        parent::__construct($endpoint."blobmanager.svc", "WcfBlobManager.wsdl", $ticket, $applicationToken, $headerNamespace, $timeout, $responseTimeout, $portName);
    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
    function BeginReadBlobPart($BlobId) {

    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
    function EndReadBlobPart($BlobId) {

    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
    function ReadBlob($BlobId) {

    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
    function ReadBlobPart($BlobId, $BlobPosition, $Length) {

    }
    /**
     * Not implemented
     * 
     * @return Nothing
     */
    function WriteBlob($BlobId, $Blob) {

    }
 
	
        
}
    
   
  

