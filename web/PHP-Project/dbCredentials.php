<?php
/**********************************************************
* File: dbCredentials.php
* Author: Cutler Hollist
* 
* Description: Contains the localhost credentials for when
* we don't connect to Heroku.
***********************************************************/

function get_db_cred() {
	# example localhost configuration URL with user: "sitemap_admin", password: "S1t3Map"
	# and a database called "sitemap"
	#                    usrnm  |pswrd  |host     |port|database
	$user = 'sitemap_admin';
    $password = 'S1t3Map';
    $db = new PDO('pgsql:host=127.0.0.1;dbname=sitemap',$user,$password);

	return $db;
}