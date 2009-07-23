<?php 
/*************************************************************************************************************
* update_small_from_cron.php
* Update Small YAP View From Cron Job Sample
* 
* Created by Jonathan LeBlanc on 06/08/09.
* Copyright (c) 2009 Yahoo! Inc. All rights reserved.
*
* The copyrights embodied in the content of this file are licensed under the BSD (revised) open source license.
*************************************************************************************************************/

require_once('apis/Yahoo.inc');

//session information
define('API_KEY', 'KEY HERE');
define('SHARED_SECRET', 'KEY HERE');
define('APP_ID', 'APP ID HERE');

//instantiate session
$session = new YahooApplication(API_KEY, SHARED_SECRET, APP_ID);

//db information
$dbhostname = '###';
$dbusername = '###';
$dbpassword = '###';
$dbname = '###';

//connect to database and get all users
mysql_connect($dbhostname, $dbusername, $dbpassword) OR DIE ('Unable to connect to database. Please try again later.');
mysql_select_db($dbname);
$query = "SELECT * FROM user_store";
$result = mysql_query($query);
$j = 1;

//for each database user, update the small view
while (($row = mysql_fetch_assoc($result)) !== false) {
	if ($row['uid']){
		$html = '';
		
		##################################
		#CREATE HTML CODE FOR CURRENT USER
		##################################
		
		if (!$session->setSmallView($row['uid'], $html)){
			echo "$j : NO SESSION SET FOR {$row['uid']}<br />\n";
		} else {
			echo "$j : SESSION SET FOR {$row['uid']}<br />\n";
		}
		$j++;
	}
}
?>
