<?php

include_once('header.php');
require_once __DIR__ . "/../lib/soAgents/SoListAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();


//request
$client = new SoListAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);
$result1 =  $client->GetWebPanelList();

echo "<h2>GetWebPanelList </h2><pre>";
print_r($result1);
echo "</pre>";


//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; 




?>