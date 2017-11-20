<?php
require_once( "models/db-settings.php" ); // Require DB connection


require_once( "models/funcs.php" );
require_once( "models/db_funcs.php" );
session_start ();

include_once( 'httpsprache.php' );

require_once ("models/class.user.php");
require_once ("models/class.newuser.php");
require_once ("models/class.mail.php");
//$languages = getLanguageFiles ();
// Only once during one SESSION-Lifetime
// First set all SESSION_VARIABLES
// Second set browserlanguage

if (! isset ( $_SESSION ['setLanguage'] ) or $_SESSION ["setLanguage"] != "true") {
	$allowed_langs = array ('de','en','fr');
	$languageBrowser = lang_getfrombrowser ( $allowed_langs, 'en', null, false );
	echo '<script type="application/x-javascript" > console.log("' . $languageBrowser. '") </script>';
	setLang ( $languageBrowser );
} else {
	$_SESSION ["setLanguage"] = "true";
	echo '<script type="application/x-javascript" > console.log("' . $_SESSION ["language"]. '") </script>';
}

require_once ($_SESSION ["language"]);

// $choosedLang can be: "en", "de", "fr"
function setLang($choosedLang) {

	// Check ig requested language is not the current language
	if (strpos ( $_SESSION ["language"], $choosedLang . ".php" ) == false) {
		if ($choosedLang == "de") {
			$_SESSION ["language"] = "models/languages/de.php";
		} else if ($choosedLang == "fr") {
			$_SESSION ["language"] = "models/languages/fr.php";
		} else {
			$_SESSION ["language"] = "models/languages/en.php";
		}
		$_SESSION ["setLanguage"] = "true";
		echo '<script type="application/x-javascript" > location.reload(); </script>';
	}
}

?>
