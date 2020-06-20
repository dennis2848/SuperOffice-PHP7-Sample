<?php

ini_set('display_errors',1);
date_default_timezone_set("UTC");
error_reporting(E_ALL);

include_once(dirname(__FILE__).'/../helpers/SessionHelper.php');
SessionHelper::checkSession();

?>