<?php

require_once( "config.php" );

//Log the user out
if(isUserLoggedIn())
{
	unset($_SESSION["uid"]);
	unset($_SESSION["name"]);
	destroySession("userCakeUser");
}

header ( "Location: index.php" );

?>
