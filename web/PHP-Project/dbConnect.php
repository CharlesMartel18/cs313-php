<?php
/**********************************************************
* File: dbConnect.php
* Author: Br. Burton & Cutler Hollist
* 
* Description: Shows how to connect using either local
* OR Heroku credentials, depending on whether the code
* is executing at heroku.
***********************************************************/

require('dbCredentials.php');

function get_db() {
	try
	{
		$dbURL = getenv('DATABASE_URL');

		if (empty($dbURL)) {
			$db = get_db_cred();
		}
		else {
			$dbopts = parse_url($dbURL);
		
			$dbHost = $dbopts["host"];
			$dbPort = $dbopts["port"];
			$dbUser = $dbopts["user"];
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');

			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
	catch (PDOException $ex)
	{
		echo 'Error!: ' . $ex->getMessage();
		die();
	}

	return $db;
}