<?php
include_once('header.php');

require_once __DIR__ . "/../lib/soAgents/SoUserDefinedFieldInfoAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();

//request
$client = new SoUserDefinedFieldInfoAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);

/******************************************************************************************************************
 ****************************************************************************************************************** 
 * All Enumeration values are documented here:*********************************************************************
 * http://devnet.superoffice.com/documentation/sdk/SO.Server.Services/html/02168c08-c00d-43e0-fe02-862a1bc41c30.htm
 ******************************************************************************************************************
 ****************************************************************************************************************** */

$ownerType = "Sale";      //use the UDefType enum name (link above)
$fieldType = "LongText";  //use the UDefFieldType enum name (link above)

$result0 = $client->GetUserDefinedFieldList($ownerType);

echo "<h2>User-Defined Fields</h2><pre>";
print_r($result0);
echo "</pre>";


//Returns with suggested positioning filled in. CreateDefaultUserDefinedFieldInfo does not do this.
$result1 = $client->CreateUserDefinedFieldInfo($ownerType, $fieldType);

echo "<h2>Create User Defined Field</h2><pre>";
print_r($result1);
echo "</pre>";

$result1["FieldLabel"]             = "eMarketeer " .bin2hex(random_bytes(5));
$result1["TextLength"]             = "195";
$result1["ProgId"]                 = "eMarketeer:" . bin2hex(random_bytes(5));
$result1["Tooltip"]                = "eMarketeer Integration 1";

$result2 =  $client->SaveUserDefinedFieldInfo($result1);

//Save the interesting results in Session
$_SESSION["UDefFieldId"] = $result2["UDefFieldId"];
$_SESSION["SaleTemplateVariableName:1"] = $result2["TemplateVariableName"];


echo "<h2>Publish User-Defined Field</h2><pre>";
print_r($result2);
echo "</pre>";

$client->SetPublishStartSystemEvent($ownerType);

//Creating and publishing a UDF works without this next line, but better safe than sorry!
$isPublishReady = $client->IsPublishEventActive($ownerType);

if($isPublishReady)
{
    $client->Publish($ownerType);
    $result3 = "Published...";
}

else
    $result3 = "Not ready to publish...";


echo "<h2>Publish Status</h2><pre>";
print_r($result3);
echo "</pre>";

//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; 

?>
