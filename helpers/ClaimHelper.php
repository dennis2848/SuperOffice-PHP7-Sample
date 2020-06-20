<?php

/**
 * ClaimHelper short summary.
 *
 * ClaimHelper description.
 *
 * @version 1.0
 * @author yanjunl
 */
class ClaimNames
{
    public static $Upn = "http://schemes.superoffice.net/identity/upn";
    public static $TenantId = "http://schemes.superoffice.net/identity/tenantId";
    public static $Firstname = "http://schemes.superoffice.net/identity/firstname";
    public static $Lastname = "http://schemes.superoffice.net/identity/lastname";
    public static $Email = "http://schemes.superoffice.net/identity/email";
    public static $IdentityProvider = "http://schemes.superoffice.net/identity/identityprovider";
    public static $SecondaryIdentityProvider = "http://schemes.superoffice.net/identity/secondaryidentityprovider";
    public static $PocketUrl = "http://schemes.superoffice.net/identity/pocket_url";
        
    public static $Ticket = "http://schemes.superoffice.net/identity/ticket";
    public static $Version = "http://schemes.superoffice.net/identity/version";
    public static $ContextIdentifier = "http://schemes.superoffice.net/identity/ctx";
    public static $AssociateId = "http://schemes.superoffice.net/identity/associateid";
    public static $RequestOrigin = "http://schemes.superoffice.net/identity/requestorigin";

    public static $NetserverUrl = "http://schemes.superoffice.net/identity/netserver_url";
    public static $InternalNetserverUrl = "http://schemes.superoffice.net/identity/internal_netserver_url";


    public static $Netserver73Url = "http://schemes.superoffice.net/identity/netserver73_url";
    public static $InternalNetserver73Url = "http://schemes.superoffice.net/identity/internal_netserver73_url";

    public static $Netserver75Url = "http://schemes.superoffice.net/identity/netserver75_url";
    public static $InternalNetserver75Url = "http://schemes.superoffice.net/identity/internal_netserver75_url";


    public static $NetserverUrlTemplate = "http://schemes.superoffice.net/identity/netserver{0}_url";        
    public static $InternalNetserverUrlTemplate = "http://schemes.superoffice.net/identity/internal_netserver{0}_url";
    public static $RefreshToken = "http://schemes.superoffice.net/identity/refresh_token";   
    public static $SystemToken = "http://schemes.superoffice.net/identity/system_token";
    public static $IsAdministrator = "http://schemes.superoffice.net/identity/is_administrator";
    public static $CompanyName = "http://schemes.superoffice.net/identity/company_name";

    public static $Url = "http://schemes.superoffice.net/identity/url";

    public static $Serial = "http://schemes.superoffice.net/identity/serial";
    
    public static $WebApiUrl = "http://schemes.superoffice.net/identity/webapi_url";

    /**
     * Summary of ConvertToSoContext
     * convert claim info in a saml/jwt into SoContext 
     * @param mixed $obj 
     * @return mixed
     */
    public static function ConvertToSoContext($obj) {
        
        $context = new SoContext();        
        $context->Company = ClaimNames :: GetValue($obj, ClaimNames::$CompanyName);
        $context->ContextIdentifier = ClaimNames :: GetValue($obj, ClaimNames::$ContextIdentifier);
        $context->Email = ClaimNames :: GetValue($obj, ClaimNames::$Email);
        $context->Associate_id = ClaimNames :: GetValue($obj, ClaimNames::$AssociateId);
        $context->Ticket = ClaimNames :: GetValue($obj, ClaimNames::$Ticket);
        $context->NetServerUrl = ClaimNames :: GetValue($obj, ClaimNames::$NetserverUrl);
        $context->SystemToken = ClaimNames :: GetValue($obj, ClaimNames::$SystemToken);
        $context->RefreshToken = ClaimNames :: GetValue($obj, ClaimNames::$RefreshToken);
        $context->WebApiUrl = ClaimNames :: GetValue($obj, ClaimNames::$WebApiUrl);
        $context->Serial = ClaimNames :: GetValue($obj, ClaimNames::$Serial);
        return $context;
    }
    
    private static function GetValue($obj, $property){
        return property_exists($obj,$property) ? $obj->{$property} : "";
    }
}

/*
 * Login context saved in session
 */
class SoContext {    
    //accociate name
     var $Associate_id = "";
    
    //company name of the user
    var $Company = "";
    
    //net server ticket
    var $Ticket = "";
    
    //net server url
    var $NetServerUrl = "";
    
    //user email
    var $Email = "";
    
    //customer ContextIdentifier
    var $ContextIdentifier = "";
    
    //system token for system user
    var $SystemToken = "";

    //webapi url
    var $WebApiUrl = "";

    //Serial
    var $Serial = "";

    //Refresh token
    var $RefreshToken = "";
}



/**
 * Data as posted back from the login page
 */
class CallbackModel {
    
    var $token_type = "";
    var $access_token = "";
    var $expires_in = "";
    var $refresh_token = "";
    //JSON Web Token
    var $id_token = "";
}
