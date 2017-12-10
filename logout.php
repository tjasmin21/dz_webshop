<?php

require_once( "config.php" );

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Log the user out
if(isUserLoggedIn())
{
	unset($_SESSION["uid"]);
	unset($_SESSION["name"]);
//	$loggedInUser->userLogOut();
}

header("location:index.php");

?>
