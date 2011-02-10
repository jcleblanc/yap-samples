<?php
require_once 'lib/OAuth/OAuth.php';
require_once 'lib/Yahoo/YahooOAuthApplication.class.php';
 
//define application key constants
define("CONSUMER_KEY", "KEY HERE");
define("SHARED_SECRET", "KEY HERE");
define("APP_ID", "APPID HERE");

//create 3-legged OAuth request
$oauthapp = YahooOAuthApplication::fromYAP(CONSUMER_KEY, SHARED_SECRET, APP_ID);

//make request to YQL to get profile of the user from pulse.yahoo.com
$response = $oauthapp->getProfile();

//dump all profile elements
foreach ($response->profile as $key => $value){
    echo "$key: ";
    print_r($value);
    echo '<br />';
}
?>