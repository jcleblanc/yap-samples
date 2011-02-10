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
$query = "insert into social.notifications (guid, title, appmsg, category, image.size, image.width, image.height, image.imageUrl, expiry, choice1.label, choice1.urltemplate) values (me, 'Welcome to my application', 'Here\'s a gift.  Can you send one back to me?', 'gift', '40x40', 40, 40, 'http://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Commons-logo.svg/30px-Commons-logo.svg.png', 1443603778, 'Send Gift', 'http://apps.yahoo.com/-APPID/?page=index.php&request_button_href_success=1&request_id={id}')";
$response = $oauthapp->yql($query, array(), 'PUT');

echo "Notification Response: {$response->query->results->notification}";
?>