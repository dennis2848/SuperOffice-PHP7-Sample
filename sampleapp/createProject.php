<?php
include_once('header.php');

require_once __DIR__ . "/../lib/soAgents/SoProjectAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();

//request
$projectAgent = new SoProjectAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);

/******************************************************************************************************************
 ****************************************************************************************************************** 
 * All Enumeration values are documented here:*********************************************************************
 * http://devnet.superoffice.com/documentation/sdk/SO.Server.Services/html/02168c08-c00d-43e0-fe02-862a1bc41c30.htm
 ******************************************************************************************************************
 ****************************************************************************************************************** */

$project = $projectAgent->CreateDefaultProjectEntity();
//echo '<pre>' . print_r($project, true) . '</pre>';
$project["Name"] = "Active Web Site Visitors 4" . bin2hex(random_bytes(5));
$projectSaved = $projectAgent->SaveProjectEntity($project);


echo "<h2>Saved Project</h2><pre>";
print_r($projectSaved);
echo "</pre>";

//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($projectAgent->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($projectAgent->response, ENT_QUOTES) . '</pre>'; 

?>