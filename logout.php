<?php

require_once( "config.php" );


unset($_SESSION["uid"]);

unset($_SESSION["name"]);

header("location:index.php");

?>
