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
			return true;
		} else {
				return false;
		}
	}
?>
