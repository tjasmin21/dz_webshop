<?php
	// Functions that do not interact with DB
	// ------------------------------------------------------------------------------


	/**
	 * @return array - Retrieve a list of all .php files in resources/languages
	 */
	function getLanguageFiles() {
		$directory = "models/languages/";
		$languages = glob ( $directory . "*.php" );
		// print each file name
		return $languages;
	}

	/**
	 * @param $key - from value, which should get translated
	 * @param null $markers
	 *
	 * @return string - value in specific language
	 */
	function lang($key, $markers = NULL) {
		global $lang;
		if ($markers == NULL) {
			$str = $lang [$key];
		} else {
			// Replace any dyamic markers
			$str = $lang [$key];
			$iteration = 1;
			foreach ( $markers as $marker ) {
				$str = str_replace ( "%m" . $iteration . "%", $marker, $str );
				$iteration ++;
			}
		}
		// Ensure we have something to return
		if ($str == "") {
			return ("No language key found");
		} else {
			return $str;
		}
	}

	/**
	 * @return bool - does user id exist
	 */
	function isUserLoggedIn() {
		if(isset($_SESSION["uid"])){
			echo '<script>console.log("user logged in")</script>';
			return true;
		} else {
			echo '<script>console.log("user NOT logged in")</script>';
			return false;
		}
	}

	/**
	 * @param $min - minimum length
	 * @param $max - maximum length
	 * @param $value - string value
	 *
	 * @return bool - true if string value has acceptable length
	 */
	function minMaxRange($min, $max, $value) {
		if (strlen ( trim ( $value ) ) < $min)
			return true;
		else if (strlen ( trim ( $value ) ) > $max)
			return true;
		else
			return false;
	}


	/**
	 * @param $email
	 *
	 * @return bool true if email is valid
	 */
	function isValidEmail($email) {
		if (preg_match ( "^[a-zA-Z0-9_.-]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email )) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * isplays error and success messages
	 *
	 * @param $errors
	 * @param $successes
	 */
	function resultBlock($errors, $successes) {
		// Error block
		if (count ( $errors ) > 0) {
			echo "<div id='error'>";
			/* echo "<a class='a_Close' href='#' onclick=\"showHide('error');\">[X]</a>"; */
			echo "<ul>";
			foreach ( $errors as $error ) {
				echo "<li>" . $error . "</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
		// Success block
		if (count ( $successes ) > 0) {
			echo "<div id='success'>";
			/* echo " <a class='a_Close' href='#' onclick=\"showHide('success');\">[X]</a>"; */
			echo "<ul>";
			foreach ( $successes as $success ) {
				echo "<li>" . $success . "</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

	/**
	 * @param $str
	 *
	 * @return string - Completely sanitized text
	 */
	function sanitize($str) {
		return strtolower ( strip_tags ( trim ( ($str) ) ) );}



/**
 * @return nstring - generated activation key
 */
function generateActivationToken() {
	do {
		$gen = md5 ( uniqid ( mt_rand (), false ) );
	} while ( validateActivationToken ( $gen ) );
	return $gen;
}

/**
 * @param string $length
 *
 * @return string - unique code
 */
function getUniqueCode($length = "") {
	$code = md5 ( uniqid ( rand (), true ) );
	if ($length != "")
		return substr ( $code, 0, $length );
	else
		return $code;
}

/**
 * @param $str
 *
 * @return mixed - replaced hooks with specified text
 */
function replaceDefaultHook($str) {
	global $default_hooks, $default_replace;
	return (str_replace ( $default_hooks, $default_replace, $str ));
}

/**
 * @param $uri - has to get checked
 * @return bool - does user have access to the url
 */
function securePage($uri) {

	// Separate document name from uri
	$tokens = explode ( '/', $uri );
	$page = $tokens [sizeof ( $tokens ) - 1];
	echo '<script>console.log("dfg")</script>';

	global $mysqli, $loggedInUser;

	// retrieve page details
	$stmt = $mysqli->prepare ( "SELECT 	id, page, private FROM pages
		WHERE page = ?	LIMIT 1" );

	$stmt->bind_param ( "s", $page );
	$stmt->execute ();
	$stmt->bind_result ( $id, $page, $private );
	while ( $stmt->fetch () ) {
		$pageDetails = array (
			'id' => $id,
			'page' => $page,
			'private' => $private
		);
	}
	$stmt->close ();
	// If page does not exist in DB, allow access
	if (empty ( $pageDetails )) {
		return true;
	} // If page is public, allow access
	elseif ($pageDetails ['private'] == 0) {
		return true;
	} // If user is not logged in, deny access
	elseif (! isUserLoggedIn ()) {
		header ( "Location: index.php" );
		return false;
	} else {
		// Retrieve list of permission levels with access to page
		$stmt = $mysqli->prepare ( "SELECT
			permission_id
			FROM permission_page_matches
			WHERE page_id = ?
			" );
		$stmt->bind_param ( "i", $pageDetails ['id'] );
		$stmt->execute ();
		$stmt->bind_result ( $permission );
		while ( $stmt->fetch () ) {
			$pagePermissions [] = $permission;
		}
		$stmt->close ();
		// Check if user's permission levels allow access to page
//		if ($loggedInUser->checkPermission ( $pagePermissions )) {
//			return true;
//		} // Grant access if master user
//		elseif ($loggedInUser->user_id == $master_account) {
//			return true;
//		} else {
//			header ( "Location: account.php" );
//			return false;
//		}

		return true;
	}
}



?>
