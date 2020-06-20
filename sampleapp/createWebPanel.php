<?php
include_once('header.php');
require_once __DIR__ . "/../lib/soAgents/SoListAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();

/******************************************************************************************************************
 ****************************************************************************************************************** 
 * All Enumeration values are documented here:*********************************************************************
 * http://devnet.superoffice.com/documentation/sdk/SO.Server.Services/html/02168c08-c00d-43e0-fe02-862a1bc41c30.htm
 ******************************************************************************************************************
 ****************************************************************************************************************** */

//request
$client = new SoListAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);
$result1 = $client->CreateDefaultWebPanelEntity();

$result1["Name"]                   = "eMarketeer detailed sales info 2." . bin2hex(random_bytes(5));
$result1["UrlEncoding"]            = "Unicode";  //use the UrlEncoding enum name (link above)
$result1["VisibleIn"]              = "SaleCard"; //use the Navigation enum name (link above)
$result1["OnSalesMarketingWeb"]    = "true";
$result1["OnSalesMarketingPocket"] = "true";
$result1["WindowName"]             = "Sale Event Details";
$result1["Url"]                    = "https://app.emarketeer.com/ext/services/so_index.php?f=<ss45>&e=<ss46>";


echo "<h2>Create Web Panel</h2><pre>";
print_r($result1);
echo "</pre>";

$result2 =  $client->SaveWebPanelEntity($result1);

$_SESSION["WebPanelId"] = $result2["WebPanelId"];

echo "<h2>Save Web Panel</h2><pre>";
print_r($result2);
echo "</pre>";




//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; 

?>
