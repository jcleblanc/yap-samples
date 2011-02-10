<?php
require_once 'lib/OAuth/OAuth.php';
require_once 'lib/Yahoo/YahooOAuthApplication.class.php';
 
//define application key constants
define("CONSUMER_KEY", "KEY HERE");
define("SHARED_SECRET", "KEY HERE");
define("APP_ID", "APPLICATION ID HERE");

//create 3-legged OAuth request
$oauthapp = YahooOAuthApplication::fromYAP(CONSUMER_KEY, SHARED_SECRET, APP_ID);

//make request to YQL for post new update (viewable on pulse.yahoo.com)
//$query = "INSERT INTO social.updates (guid, title, description, link, imgURL, imgWidth, imgHeight) VALUES (me, '$title', '$description', '$link', '$img_url', '$img_width', '$img_height')";
//$response = $oauthapp->yql($query, array(), YahooCurl::PUT);

$params = array(
    'title' => 'Posting an update from YAP',
    'description' => 'This is an automatic update posted through YQL using the PHP 5 SDK',
    'link' => 'http://developer.yahoo.com/yap',
    'imgURL' => 'http://l.yimg.com/a/i/ydn/sst/44/yql.gif',
    'imgHeight' => '44',
    'imgWidth' => '44'
);

$response = $oauthapp->insertUpdate(null, $params);

//check update status.  If success, update succeeded
if ($response){
    echo 'update posted successfully';
} else {
    echo 'update post failed';
}
?>