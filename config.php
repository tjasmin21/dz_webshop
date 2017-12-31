<?php
require_once("models/db-settings.php"); // Require DB connection


require_once("models/funcs.php");
require_once("models/db_funcs.php");
session_start();

include_once('httpsprache.php');

require_once("models/class.user.php");
require_once("models/class.newuser.php");
require_once("models/class.mail.php");
//$languages = getLanguageFiles ();
// Only once during one SESSION-Lifetime
// First set all SESSION_VARIABLES
// Second set browserlanguage

$mail_templates_dir = "models/mail-templates/";

if (!isset($thisPage)) {
    $thisPage = "index";
}
GLOBAL $thisPage;

if (!isset ($_SESSION ['setLanguage']) or $_SESSION ["setLanguage"] != "true") {
    $allowed_langs = array('de', 'en', 'fr');
    $languageBrowser = lang_getfrombrowser($allowed_langs, 'en', null, false);
    echo '<script> console.log("' . $languageBrowser . '") </script>';
    setLang($languageBrowser);
} else {
    $_SESSION ["setLanguage"] = "true";
    echo '<script> console.log("' . $_SESSION ["language"] . '") </script>';
}

require_once($_SESSION ["language"]);


// Global User Object Var
// loggedInUser can be used globally if constructed
if (isset ($_SESSION ["userCakeUser"]) /*&& is_object ( $_SESSION ["userCakeUser"] )*/) {
    //retrieve object from SESSION
    $loggedInUser = unserialize($_SESSION ["userCakeUser"]);
}


/* ****************** FUNCTIONS ****************** */

// $choosedLang can be: "en", "de"
function setLang($choosedLang)
{

    // Check ig requested language is not the current language
    if (strpos($_SESSION ["language"], $choosedLang . ".php") == false) {
        if ($choosedLang == "de") {
            $_SESSION ["language"] = "models/languages/de.php";
        } else {
            $_SESSION ["language"] = "models/languages/en.php";
        }
        $_SESSION ["setLanguage"] = "true";
        echo '<script type="application/x-javascript" > location.reload(); </script>';
    }
}

?>
