<?php
require_once 'lib/OAuth/OAuth.php';
require_once 'lib/Yahoo/YahooOAuthApplication.class.php';
 
//define application key constants
define("CONSUMER_KEY", "KEY HERE");
define("SHARED_SECRET", "KEY HERE");
define("APP_ID", "APPLICATION ID HERE");

//initiate a 3-legged OAuth request
$oauthapp = YahooOAuthApplication::fromYAP(CONSUMER_KEY, SHARED_SECRET, APP_ID);

//make request to YQL (insert your YQL query below)
$response = $oauthapp->yql('YQL QUERY HERE', array('diagnostics' => 'true', 'debug' => 'true'), "GET");
?>