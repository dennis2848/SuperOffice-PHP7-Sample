<?php
include_once('header.php');
require_once __DIR__ . "/../helpers/ContactEntityHelper.php";
require_once __DIR__ . "/../helpers/SystemUserHelper.php";

$context = SessionHelper::getSoContext();

if($_GET['systemUser'] == 1) {
    //use system user to create a contactEntity
        
    //exchange a system user token for a JWT/SAML token containing system user ticket
    $returnedToken = SystemUserHelper::GetSystemUserToken(ENABLE_SAML ? "Saml":"Jwt");
    
    if(ENABLE_SAML) {
        //require_once('./lib/SoSAML.php');
        //$data = SoSAML::decode($returnedToken, PUBLIC_CERTIFICATE);
    } else {
        require_once __DIR__ . "/../lib/SoJWT.php";
        $data = SoJWT::decode($returnedToken, PUBLIC_CERTIFICATE);
      
    }
    
    //extract the claims in the token and cast then to a SoContext class
    if($data != null){
        $context = ClaimNames::ConvertToSoContext($data);    
    }
    else {
        $url = UrlHelper::getBaseUrl().'index.php';
        echo '<script type="text/javascript"> window.location="' . $url . '";</script>';
    }
    
    //using the system user ticket to create a new company
    $contact = ContactEntityHelper::CreateContactEntity($context->NetServerUrl, $context->Ticket, APPTOKEN);
    
    //view the company details on the contactEntity.php page.
    $id = $contact['ContactId'];
    echo '<script type="text/javascript"> window.location="contactEntity.php?contactEntityId=' . $id . '";</script>';
} else {
    
    //use login user to create a contactEntity
    $contact = ContactEntityHelper::CreateContactEntity($context->NetServerUrl, $context->Ticket, APPTOKEN);
    $id = $contact['ContactId'];
    echo '<script type="text/javascript"> window.location="contactEntity.php?contactEntityId=' . $id . '";</script>';
}
