<?php
	//database connection
	if(!$conn){
		include('./read-env.php');	
		DEFINE('DB_USERNAME', $db_username );
		DEFINE('DB_PASSWORD', $db_passward);
		DEFINE('DB_HOST', $db_host);
		DEFINE('DB_DATABASE', $db_database);

		$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

		if (mysqli_connect_error()) {
			die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
		}
	}
?>