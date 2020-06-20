<?php
header('Content-Type: application/json');
//error_reporting(0);
require_once(__DIR__ . '/../helpers/SessionHelper.php');
require_once(__DIR__ . '/../helpers/UrlHelper.php');

//echo json_encode($_POST);

//data from post

$model = new CallbackModel();
if(isset($_POST['code'])){
    if($_SESSION['state'] != $_POST['state']) {
        die("{'error': 'Authorization server returned an invalid state parameter.'}" . $_SESSION['state']);
      }
    //Call SO to get the tokens we need
    $model = SessionHelper::getInitialTokens($_POST['code']);
    
   
 
    require_once "../lib/SoJWT.php";
    $data = SoJWT::decode($model->id_token, PUBLIC_CERTIFICATE);
   
 
if($data != null){
    //Add ticket from token exchange to context
    $data = (object) array_merge( 
        (array)$data, 
        array( 'http://schemes.superoffice.net/identity/ticket' => $model->access_token ), 
        array( 'http://schemes.superoffice.net/identity/refresh_token' => $model->refresh_token )
    );
    $context = ClaimNames::ConvertToSoContext($data);
    //save context info to session
    SessionHelper::setSoContext($context);
    //redirect to index page
    $url = UrlHelper::getBaseUrl().'index.php';
    echo json_encode($data);
}
else {
    $url = UrlHelper::getBaseUrl().'welcome.php';
    echo "{'error': '" . url . "'}";;
}
} else {
    echo "{'error': 'NO JWT'}";;

}


?>