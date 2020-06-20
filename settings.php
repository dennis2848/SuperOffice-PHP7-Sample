<?php

/**
 * Settings that must be configured to ensure correct processing of web service invocation.
 */

define('APPID',     ''    ); /* Application Identify */
define('APPTOKEN',  ''    ); /* Application Token */

define('NSVERSION', '8.7'    );  /* NetServer Services Version. Can be 7.3 OR 7.5, version folders containing version specific contracts in the WSDL directory */
define('PROTOCOL',  'https://');  /* This applications' web site protocol. https:// (for deployed testing and production) */
define('ENVIRONMENT', 'sod');

define('REDIRECT_CALLBACK', 'https://soapps.sample.dk/callback'); //Your APPROVED callback url
define('CALLBACK_REDIRECT', 'https://soapps.sample.dk/sampleapp'); //The app page the callback should redirect to after successful authentication 

define('AUTH_URL',  'https://' . ENVIRONMENT . '.superoffice.com/login/common/oauth/authorize'       ); /* SuperOffice SuperID Oauth Login URLS */
define('TOKENS_URL', 'https://' . ENVIRONMENT . '.superoffice.com/login/common/oauth/tokens');
define('LOGIN_PATH', 'https://' . ENVIRONMENT . '.superoffice.com/login/services/PartnerSystemUserService.svc');

define('WSDL_LOC_BASE',  PROTOCOL.$_SERVER['SERVER_NAME'].'/WSDL/');  /* Defineds the folder containing the wsdl files */
define('WSDL_LOC',  WSDL_LOC_BASE.NSVERSION.'/');  /* Defineds the folder containing the wsdl files */

define('PRIVATE_KEY', dirname(__FILE__).'/certificates/private.pem'); //Your private certificate

define('KEYPASSWORD','hello'); /* key password which should be the same as the password we generated keys */

define('PUBLIC_CERTIFICATE', dirname(__FILE__).'/certificates/federatedlogin.cer');

define('ENABLE_SAML', false); /* Use JWT token for PHP - SAML seems to have issues */





?>
