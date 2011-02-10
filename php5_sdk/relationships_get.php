<?php
require_once 'lib/OAuth/OAuth.php';
require_once 'lib/Yahoo/YahooOAuthApplication.class.php';
 
//define application key constants
define("CONSUMER_KEY", "KEY HERE");
define("SHARED_SECRET", "KEY HERE");
define("APP_ID", "APPID HERE");

//create 3-legged OAuth request
$oauthapp = YahooOAuthApplication::fromYAP(CONSUMER_KEY, SHARED_SECRET, APP_ID);

//make request to YQL to get relationships for current user
//will return guid, uri and categories for each
$response = $oauthapp->getRelationships();

//for each relationship, obtain the profile and display
foreach ($response->relationsWithCategories->relations->relation as $relation){
    //get guid of the current relation & then profile using the guid
    $guid = $relation->guid;
    $profile = $oauthapp->getProfile($guid);
    
    echo "<h1>Profile: {$profile->profile->nickname}</h1>";
    
    //for each profile, display all profile elements
    foreach ($profile->profile as $key => $value){
        echo "$key: ";
        print_r($value);
        echo '<br />';
    }
}
?>