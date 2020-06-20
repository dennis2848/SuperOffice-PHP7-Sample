<?php
include_once('header.php');

require_once __DIR__ . "/../settings.php";
require_once __DIR__ . "/../lib/soAgents/SoAppointmentAgent.php";

$context = SessionHelper::getSoContext();

/******************************************************************************************************************
 ****************************************************************************************************************** 
 * All Enumeration values are documented here:*********************************************************************
 * http://devnet.superoffice.com/documentation/sdk/SO.Server.Services/html/02168c08-c00d-43e0-fe02-862a1bc41c30.htm
 ******************************************************************************************************************
 ****************************************************************************************************************** */

//request
$client = new SoAppointmentAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);
$result1 = $client->CreateDefaultTaskListItem();

echo "<h2>Create FollowUp List Item</h2><pre>";
print_r($result1);
echo "</pre>";

$result1["Type"]    = "Appointment";            //use the TastType enum name (link above)
$result1["Value"]   = "Email (FEED) " . bin2hex(random_bytes(5));           //Name
$result1["Tooltip"] = "eMarketeer Integration 2"; //Description

$result2 =  $client->SaveTaskListItem($result1);


echo "<h2>Save Followup List Item</h2><pre>";
print_r($result2);
echo "</pre>";


echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; 



?>