<?php

include_once('header.php');

require_once __DIR__ . "/../helpers/ContactEntityHelper.php";

$context = SessionHelper::getSoContext();

$contactEntityId = $_GET['contactEntityId'];

$contact = ContactEntityHelper::GetContactEntity($context->NetServerUrl, $context->Ticket, APPTOKEN, $contactEntityId);

$created = "";
if ($contact['CreatedBy'] != null)
{
    $created = $contact['CreatedBy']['Name'];
}

?>

<html>
    <head>
        <title>SuperId PHP App</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />        <link href="./css/site.css" rel="stylesheet"/>
    </head>
    <body>
        <div align="center" class="div-content">
        <table>
            <tr><td>Name</td><td><?php echo $contact['Name']; ?></td></tr>
            <tr><td>Created By</td><td><?php echo $created; ?></td></tr>
            <tr><td>Created Date</td><td><?php echo $contact['CreatedDate']; ?></td></tr>
        </table>            
        </div>
        <div align="center" style="padding-bottom: 20px;"><a href="index.php">Home</a></div>        
    </body>
</html>