<?php

include_once(dirname(__FILE__).'/../settings.php');
include_once('ClaimHelper.php');

session_save_path(dirname(__FILE__)."/../tmp");
session_start();

/**
 * SessionHelper short summary.
 *
 * SessionHelper description.
 *
 * @version 1.0
 * @author yanjunl
 */
class SessionHelper {
    
    public static function checkSession(){
        $context = self::getSoContext();
        if(empty($context)){      
            $_SESSION['state'] = bin2hex(random_bytes(5));      
            $url = AUTH_URL . '?'.http_build_query([
                'response_type' => 'code',
                'client_id' => APPID,
                'redirect_uri' => REDIRECT_CALLBACK,
                'state' => $_SESSION['state'],
                'scope' => 'openid',
                'response_mode' => 'fragment'
              ]);
            header("Location: $url");
        }
    }
    
    public static function setSoContext(SoContext $context){
        $_SESSION["SoContext"] = $context;
    }
    
    public static function getSoContext(){
        return $_SESSION["SoContext"];
    }
    
    public static function resetSoContext(){
        $_SESSION["SoContext"] = null;
        
    }

    public static function getInitialTokens($code){
        //cUrl request to obtain tokens
        // set post fields 
        $post = [
            'client_id' => APPID,
            'client_secret' => APPTOKEN,
            'code'   => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => REDIRECT_CALLBACK
        ];
        $make_call = self::callAPI('POST', TOKENS_URL, $post);
        $response = json_decode($make_call, true);
        
        $model = new CallbackModel();
        if(!isset($response['error'])){
            $model->token_type = $response['token_type'];
            $model->access_token = $response['access_token'];
            $model->expires_in = $response['expires_in'];
            $model->refresh_token = $response['refresh_token'];
            $model->id_token = $response['id_token'];
        }
        else{
            die($make_call);
        }
        return $model;
         
    }
    private static function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }
}