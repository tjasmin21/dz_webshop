<?php

	//Database Information
	$db_host = "localhost"; //Host address
	$db_name = "dropzone_database"; //Name of Database
	$db_user = "root"; //Name of database user
	$db_pass = ""; //Password for database user

	GLOBAL $errors;
	GLOBAL $successes;
	$errors = array();
	$successes = array();

	// Create connection
	$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	GLOBAL $mysqli;

	// Check connection
	if (!$mysqli) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>
