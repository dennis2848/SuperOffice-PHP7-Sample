<?php

include_once(dirname(__FILE__).'/../settings.php');

require_once __DIR__ . "/../lib/SystemUserAgent.php";

/**
 * SystemUserHelper short summary.
 *
 * SystemUserHelper description.
 *
 * @version 1.0
 * @author yanjunl
 */
class SystemUserHelper
{
    /*
     * Sign the system token from callback and authenticate it with the superId service
     * 
     * return system user token from superId service
     */    
    public static function GetSystemUserToken($returnTokenType) {
        $context = SessionHelper::getSoContext();
        //get private key and its path is configured in setting.php
        $privateKey = openssl_pkey_get_private(file_get_contents(PRIVATE_KEY), KEYPASSWORD);
        
        echo "privatekey<br/>";
        print_r($privateKey);
        
        echo "<br/>signThis<br/>";
        //sign system token
        $signThis = ($context->SystemToken).".".date("YmdHi");
        
        var_dump($signThis);
        echo "<br/>";
        
        //sign the system token using private key of the application        
        openssl_sign($signThis, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        
        echo "<br/>signature<br/>";
        var_dump($signature);
        echo "<br/>";
        
        $agent = new SystemUserAgent(LOGIN_PATH, APPTOKEN, $context->ContextIdentifier);
        
        $result = $agent->AuthenticateSystemUser($signThis.".".base64_encode($signature), $returnTokenType);   
         
        return $result; 
    }
}
