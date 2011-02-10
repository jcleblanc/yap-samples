<?php
require_once 'lib/OAuth/OAuth.php';
require_once 'lib/Yahoo/YahooOAuthApplication.class.php';
 
//define application key constants
define("CONSUMER_KEY", "KEY HERE");
define("SHARED_SECRET", "KEY HERE");
define("APP_ID", "APPLICATION ID HERE");

//create 3-legged OAuth request
$oauthapp = YahooOAuthApplication::fromYAP(CONSUMER_KEY, SHARED_SECRET, APP_ID);

//make request to YQL for current user updates and capture update response object
$response = $oauthapp->yql('SELECT loc_longForm, link, description FROM social.updates(100) WHERE guid=me', array('diagnostics' => 'false', 'debug' => 'false'), "GET");
$updates = $response->query->results->update;

//for each update, display the title, description and link
for ($i = 0; $i < count($updates) - 1; $i++){ 
    $html = "<a href='{$updates[$i]->link}'>{$updates[$i]->loc_longForm}</a>
             <br />{$updates[$i]->description}<br /><br />";
    echo $html;
}
?>