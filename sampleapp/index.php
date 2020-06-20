<?php

include_once('header.php'); 
require_once __DIR__ . "/../settings.php";

$context = SessionHelper::getSoContext();
?>

<html>
<head>
    <title>SuperId PHP App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="./css/site.css" rel="stylesheet"/>
</head>
<body>
<div align="center" class="div-content">

<?php
echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='getWebPanels.php'>Get Web Panel List</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='createWebPanel.php'>Create Web Panel</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='createUserDefinedField.php'>Create User-Defined Field</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='createFollowUpListItems.php'>Create Followup List Items</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='createSaleType.php'>Create Sale Source Type -(and save routines for Lead Status/Sale Rating)</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='createProject.php'>Create Project</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='webServiceCall.php?systemUser=0'>Create Company with Login User</a></div>";

echo "<div style='padding-bottom: 20px; padding-top: 20px;'><a href='findquery.php'>Execute Find Queries</a></div>";

echo "<div style='padding-bottom: 20px;'><a href='webServiceCall.php?systemUser=1'>Create Company with System User</a></div>";

echo "<div style='padding-bottom: 20px;'><a href='reset.php'>Reset context (Logout)</a></div>";

?>

</div>
<?php
echo "<h2>Context:</h2><pre>";
print_r($context);
echo "</pre>";
?>
</body>

</html>