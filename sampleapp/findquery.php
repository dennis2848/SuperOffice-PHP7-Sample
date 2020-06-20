<?php
include_once('header.php');
require_once __DIR__ . "/../lib/soAgents/SoFindAgent.php";
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();

class ArchiveRestrictionInfo {
    function __construct($name, $oper, $value) 
    {
        $this->Name = $name;
        $this->Operator = $oper;
        $this->Values = $value;
        $this->IsActive = true;
    }
}


// $restrictions = array('Restrictions' => 
//                     array('ArchiveRestrictionInfo' => 
//                         array('Name' => 
//                             'firstName',
//                             'Operator'   => 'begins',
//                             'Values' => 
//                                 array(
//                                     'string' => 'T'
//                                 ),
//                             'IsActive' => 'true'
//                     )
//                 )
//             );

// $restrictions = array('Restrictions' => array(
// 'ArchiveRestrictionInfo' => array(
//     'Name' => 'getAllRows',
//     'Operator'   => '=',
//     'Values' => array(
//         'string' => 'true'
//         ),
//     'IsActive' => 'true'
//     )
//   )
// );

//request
$client = new SoFindAgent($context->NetServerUrl, $context->Ticket, APPTOKEN);

$contactProvider = 'FindContact';

$contactColumns = array('string'=> array(
    'contactId', 'name'
    )
);

$contactRestrictions = array(
'ArchiveRestrictionInfo' => array(
                                array(  'Name' => 'contactId',
                                        'Operator'   => '=',
                                        'Values' => array(
                                        'string' => '3'
                                        ),
                                        'IsActive' => 'true')
    )
);


$personProvider = "Person";
$personColumns = array( 'string' => array(
    'personId', 'firstName'
    )
);

$personRestrictions = array(
'ArchiveRestrictionInfo' => array(
                                array(  'Name' => 'firstName',
                                        'Operator'   => 'begins',
                                        'Values' => array(
                                        'string' => 'T'
                                        ),
                                        'IsActive' => 'true')
    )
);  

$pgSz = 10;
$pg = 0;





// $restriction = new ArchiveRestrictionInfo("getAllRows", "=", array("string"=>"True"));
// $restrictions = array("ArchiveRestrictionInfo"=>$restriction);

$result1 = $client->FindFromRestrictionsColumns($personRestrictions, $personProvider, $personColumns, $pgSz, $pg);

echo "<h2>Find By Restriction Columns</h2><pre>";
print_r($result1);
echo "</pre>";


//// debug

echo '<h2>Request</h2>'; 
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>'; 




?>

