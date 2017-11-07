<!-- PHP-File for catching request from JavaScript (header.php) -->

<?php
require_once ("config.php");

if (! empty ( $_REQUEST ['lang'] )) {
	$reqlanguage = $_REQUEST ["lang"];
	setLang ( $reqlanguage );
}
?>
