<?php
include_once('header.php');
require_once __DIR__ . "/../lib/soAgents/SoListAgent.php";
require_once __DIR__ . "/../lib/soAgents/SoMDOAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();

echo "<h2>Context</h2><pre>";
print_r($context);
echo "</pre>";

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}


////we can get $netserver info from decode result
////print_r($data);

////request
$mdoAgent = new SoMDOAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);
$listAgent = new SoListAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);


echo "<h2>Agents created...</h2>";

///******************************************************************************************************************
// ****************************************************************************************************************** 
// * All Enumeration values are documented here:*********************************************************************
// * http://devnet.superoffice.com/documentation/sdk/SO.Server.Services/html/02168c08-c00d-43e0-fe02-862a1bc41c30.htm
// ******************************************************************************************************************
// ****************************************************************************************************************** */

//Get the all known lists in SoAdmin
$result1 = $mdoAgent->GetList("Lists", "true", "", "false");

//echo "<h2>Lists</h2><pre>";
//if($result1 != FALSE)
//{
//    print_r($result1);
//} else
//{
//    echo "<h2>Lists is null</h2>";
//}
//echo "</pre>";

//Find the Sale - Source list.
$result2 = search($result1, 'Type', 'source');

echo "<h2>Search Result:</h2><pre>";
print_r($result2);
echo "</pre>";

if($result2 != FALSE && is_array($result2))
{
    //Get the first item Id - Should only be one.
    $sourceListId = $result2[0]["Id"];

    echo "<h2>List Item Id</h2><pre>";
    print_r($sourceListId);
    echo "</pre>";
    


    $sourceListItem = $listAgent->CreateDefaultListItemEntity();
    
    echo "<h2>List Item Entity</h2><pre>";
    print_r($sourceListItem);
    echo "</pre>";
    
    $listEntity = $listAgent->GetListEntity($sourceListId);
    
    echo "<h2>List Entity</h2><pre>";
    print_r($listEntity);
    echo "</pre>";
    
    $listItemEntity = $listAgent->GetFromListDefinition("1", $sourceListId);
    
    echo "<h2>From List Definition Id</h2><pre>";
    print_r($listItemEntity);
    echo "</pre>";
    
    $sourceListItem["UdListDefinitionId"] = $sourceListId;
    $sourceListItem["Name"] = "New Sales Source 1";
    $sourceListItem["Tooltip"] = "New Sales Source Tooltip 1";
    
    echo "<h2>PreSave List Item Entity</h2><pre>";
    print_r($sourceListItem);
    echo "</pre>";
    
    $result3 = $listAgent->SaveListItemEntity($sourceListItem);
    
    echo "<h2>Saved List Item Entity</h2><pre>";
    print_r($result3);
    echo "</pre>";
    
    
} else
{
	echo "<h2>Search - Item Not Found</h2>";
}


//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($listAgent->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($listAgent->response, ENT_QUOTES) . '</pre>'; 
?>


