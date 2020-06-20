<?php
include_once(dirname(__FILE__).'/../settings.php');
require_once __DIR__ . "/../lib/soAgents/SoContactAgent.php";
/**
 * ContactEntityHelper short summary.
 * 
 * class for contact net server and test system user
 * 
 * ContactEntityHelper description.
 *
 * @version 1.0
 * @author yanjunl
 */
class ContactEntityHelper
{
    /**
     * Summary of GetContactEntity
     * @param mixed $netserver
     * 
     * net server service addresss
     * 
     * @param mixed $ticket
     * 
     * net server ticket
     * 
     * @param mixed $applicationToken
     * 
     * application tocken of target partner application
     * 
     * @param mixed $contactEntityId 
     */
    public static function GetContactEntity($netserver, $ticket, $applicationToken, $contactEntityId) {
        $client = new SoContactAgent($netserver, $ticket, $applicationToken);
        $contact = $client->GetContactEntity($contactEntityId);
        return $contact;
    }
    /**
     * Summary of CreateContactEntity
     * @param mixed $netserver 
     * @param mixed $ticket 
     * @param mixed $applicationToken 
     * @return mixed
     */
    public static function CreateContactEntity($netserver, $ticket, $applicationToken) {
        $client = new SoContactAgent($netserver, $ticket, $applicationToken);
        $timestamp = time();
        $entity = $client->CreateDefaultContactEntity(); 
        $entity['Name'] = "SuperId-".$timestamp;
        $contact = $client->SaveContactEntity($entity);
        
        return $contact;
        
    }    
}