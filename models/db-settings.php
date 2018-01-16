<?php

	//Database Information
	//$db_host = "localhost"; //Host address
	//$db_name = "dropzone_database"; //Name of Database
	//$db_user = "root"; //Name of database user
	//$db_pass = ""; //Password for database user


	$db_host =  "dropzonewebserver.mysql.database.azure.com"; //Host address
	$db_name = "dropzone_database"; //Name of Database
	$db_user = "dzuser@dropzonewebserver"; //Name of database user
	$db_pass = "dzSecure21"; //Password for database user


	GLOBAL $errors;
	GLOBAL $successes;
	$errors = array();
	$successes = array();

	// Create connection
	// $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


	$mysqli=mysqli_init(); 
	//mysqli_ssl_set($mysqli, NULL, NULL, {ca-cert filename}, NULL, NULL);
 	mysqli_real_connect($mysqli, $db_host,$db_user, $db_pass, $db_name, 3306);



	GLOBAL $mysqli;

	// Check connection
	if (!$mysqli) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>
