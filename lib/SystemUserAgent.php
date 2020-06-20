<?php
require_once "SoAgent.php";
/**
 * SystemUserAgent short summary.
 *
 * SystemUserAgent description.
 *
 * @version 1.0
 * @author yanjunl
 */
class SystemUserAgent extends SoAgent
{    
    var $contextIdentifier = "";    
    
    /**
     * @$endpoint       web service end point
     * @$application#token      private token of application
     * @$timeout        request timeout time
     * @$responseTimeout        response timeout time
     * @$portName web service port
     */
    
    function __construct($endpoint, $applicationToken = "", $contextIdentifier = "", $timeout = 0, $responseTimeout = 30, $portName = '')        
    {
        parent::__construct($endpoint,"../PartnerSystemUserService.wsdl", true, false, false, false, false, $timeout, $responseTimeout, $portName);
        
        $this->applicationToken = $applicationToken;
        $this->contextIdentifier = $contextIdentifier;
        $this->setEndpoint($endpoint);
        
    }
    
    /**
     * @$contextIdentifier       customer contextIdentifier
     * @$signedSystemToken      signature which produced by signing system token
     * @$returnTokenType        Saml or Jwt
     */
    function AuthenticateSystemUser($signedSystemToken = "",  $returnTokenType = "Jwt"){        
        $arr = array(
            'ApplicationToken' => $this->applicationToken,
            'ContextIdentifier' => $this->contextIdentifier,
            'ReturnTokenType' => $returnTokenType,
            'SignedSystemToken' => $signedSystemToken
        );
        // Call the SOAP method
        $result = $this->sendRequest("Authenticate",$arr);        
        //
        
        //// debug 
        
        echo '<h2>Request</h2>';  
        echo '<pre>' . htmlspecialchars($this->request, ENT_QUOTES) . '</pre>';
        echo '<h2>Response</h2>';
        echo '<pre>' . htmlspecialchars($this->response, ENT_QUOTES) . '</pre>'; 
        /*
        // Display the debug messages
        echo '<h2>Debug</h2>'; 
        echo '<pre>' . htmlspecialchars($this->getDebug(), ENT_QUOTES) . '</pre>';
        echo '<h2>Debug String</h2>'; 
        echo '<pre>' . htmlspecialchars($this->debug_str, ENT_QUOTES) . '</pre>';
        
        echo '<pre>' . print_r($result) . '</pre>'; 
        */
        return $this->getResultFromResponse($result);
    }
    
    function sendRequest($requestOperation, $requestParams){
        return $this->call(
                    $requestOperation, 
                    $requestParams,
                    "",
                    "",
                    array("ApplicationToken" => $this->applicationToken, "ContextIdentifier" => $this->contextIdentifier)
                    );
    }
    
    function getResultFromResponse($result, $noResponse = false){
        if ($this->fault) {
            return $result;
        }
        else {
            $error = $this->getError();
            if ($error) {
                return $error;
            }
            else {
                if($noResponse) {
                    return $result;
                }
                return $result["Token"];
            }
        }
    }
}
