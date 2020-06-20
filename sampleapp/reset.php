<?php

include_once('header.php');

?>

<html>
<head>
    <title>SuperId PHP App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />    <link href="./css/site.css" rel="stylesheet"/>
</head>
<body>
<div align="center" class="div-content">
<?php
    SessionHelper::resetSoContext();
?>
    <div><p>Session Reset</p></div>
    <div align="center" style="padding-bottom: 20px;"><a href="index.php">Home</a></div>       
</div>
</body>

</html>