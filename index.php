<?php
include_once(dirname(__FILE__).'/helpers/UrlHelper.php');
include_once(dirname(__FILE__).'/helpers/SessionHelper.php');
?>
<html>
<head>
    <title>SuperId PHP App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />    <link href="sampleapp/css/site.css" rel="stylesheet"/>
</head>
<body>
<div align="center" class="div-content">
    <h2>Welcome to SuperId Demo Application.</h2>    
    <p>This package contains a full-fledged SOAP Netserver capable PHP application, that communicates with SuperOffice via SOAP WCF webservices.<p>
    <p>Please refer to the guide in order to set up the application - Please configure the settings.php file and the certificates. Then go ahead and launch the demo app down below.</p>
</div>
<div align="center">        
    <?php
    echo "<a href='".UrlHelper::getBaseUrl()."sampleapp/index.php'>Launch the demo application</a>";
    echo "<pre>" . print_r($_SESSION, true) . "</pre>";
    ?>
</div>
</body>

</html>