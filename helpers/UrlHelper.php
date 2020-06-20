<?php

include_once(dirname(__FILE__).'/../settings.php');

/**
 * UrlHelper short summary.
 *
 * UrlHelper description.
 *
 * @version 1.0
 * @author yanjunl
 */
class UrlHelper
{
    public static function getBaseUrl(){
        $path = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
        $url = PROTOCOL.$_SERVER[HTTP_HOST].$path;  
        return $url;
    }
}
