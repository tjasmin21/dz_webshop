<?php
require_once( "config.php" );

// Prevent the user visiting the logged in page if he/she is already logged in
if (isUserLoggedIn ()) {
	header ( "Location: index.php" );
	die ();
}

$_SESSION ["email"] = "";
$_SESSION ["username"] = "";
$_SESSION ["firstname"] = "";
$_SESSION ["lastname"] = "";
$_SESSION ["companyname"] = "";

// Forms posted
if (! empty ( $_POST )) {
	$errors = array ();
	$email = trim ( $_POST ["email"] );
	$firstname = trim ( $_POST ["firstname"] );
	$lastname = trim ( $_POST ["lastname"] );
	$username = trim ( $_POST ["username"] );
	$address = trim ( $_POST ["address"] );
	$password = trim ( $_POST ["password"] );
	$confirm_pass = trim ( $_POST ["passwordc"] );
	$captcha = md5 ( $_POST ["captcha"] );

	// SESSION variables for save the correct fieldvalues until the user is successful registered
	$_SESSION ["email"] = $email;
	$_SESSION ["firstname"] = $firstname;
	$_SESSION ["lastname"] = $lastname;
	$_SESSION ["username"] = $username;
	$_SESSION ["address"] = $address;

	if ($captcha != $_SESSION ['captcha']) {
		$errors [] = lang ( "CAPTCHA_FAIL" );
	}
	
	if (minMaxRange ( 3, 25, $firstname )) {
		$errors [] = lang ( "ACCOUNT_FIRST_CHAR_LIMIT", array (
				3,
				25 
		) );
		$_SESSION ["firstname"] = "";
	}
	if (! ctype_alnum ( $firstname )) {
		$errors [] = lang ( "ACCOUNT_FIRST_INVALID_CHARACTERS" );
		$_SESSION ["firstname"] = "";
	}
	
	if (minMaxRange ( 3, 25, $lastname )) {
		$errors [] = lang ( "ACCOUNT_LAST_CHAR_LIMIT", array (
				3,
				25 
		) );
		$_SESSION ["lastname"] = "";
	}
	if (! ctype_alnum ( $lastname )) {
		$errors [] = lang ( "ACCOUNT_LAST_INVALID_CHARACTERS" );
		$_SESSION ["lastname"] = "";
	}

	if (minMaxRange ( 3, 25, $username )) {
		$errors [] = lang ( "ACCOUNT_USER_CHAR_LIMIT", array (
				3,
				25
		) );
		$_SESSION ["username"] = "";
	}
	if (! ctype_alnum ( $username )) {
		$errors [] = lang ( "ACCOUNT_USER_INVALID_CHARACTERS" );
		$_SESSION ["username"] = "";
	}

	if (minMaxRange ( 3, 50, $password ) && minMaxRange ( 3, 50, $confirm_pass )) {
		$errors [] = lang ( "ACCOUNT_PASS_CHAR_LIMIT", array (
				3,
				50 
		) );
	} else if ($password != $confirm_pass) {
		$errors [] = lang ( "ACCOUNT_PASS_MISMATCH" );
	}
	if (! isValidEmail ( $email )) {
		$errors [] = lang ( "ACCOUNT_INVALID_EMAIL" );
		$_SESSION ["email"] = "";
	}
	// End data validation
	if (count ( $errors ) == 0) {
		// Construct a user object
		$user = new User ( $firstname, $lastname, $username, $address, $password, $email );
		
		// Checking this flag tells us whether there were any errors such as possible data duplication occured
		if (! $user->status) {
			if ($user->username_taken)
				$errors [] = lang ( "ACCOUNT_USERNAME_IN_USE", array (
						$username
				) );
			if ($user->email_taken)
				$errors [] = lang ( "ACCOUNT_EMAIL_IN_USE", array (
						$email 
				) );
		} else {
			// Attempt to add the user to the database, carry out finishing tasks like emailing the user (if required)
			if (! $user->userCakeAddUser ()) {
				if ($user->mail_failure)
					$errors [] = lang ( "MAIL_ERROR" );
				if ($user->sql_failure)
					$errors [] = lang ( "SQL_ERROR" );
			}
		}
	}
	if (count ( $errors ) == 0) {
		$successes [] = $user->success;
	}
}

require_once ("header.php");
echo "
<div class='div_h2 title05'>
	<h2>" . lang ( "REGISTER" ) . "</h2>
	</div>
			<div class='div_infotext'>" . lang ( "REGISTER_TXT" ) . "</div>";

echo "
<div id='main'>";

echo resultBlock ( $errors, $successes );

echo "
	<div class='clearBoth'></div>
	<div id='regbox'>
	<form name='newUser' action='" . $_SERVER ['PHP_SELF'] . "' method='post' class='form_registrieren'>
	<p>
		<label>" . lang ( "ADDRESS" ) . ":</label>
		<input type='text' name='address' value='" . $_SESSION ["address"] . "' required />
	</p>
	<p>
		<label>" . lang ( "FIRSTNAME" ) . ":</label>
		<input type='text' name='firstname' value='" . $_SESSION ["firstname"] . "' required/>
	</p>
	<p>
		<label>" . lang ( "LASTNAME" ) . ":</label>
		<input type='text' name='lastname' value='" . $_SESSION ["lastname"] . "' required/>
	</p>
	<p>
		<label>" . lang ( "USERNAME" ) . ":</label>
		<input type='text' name='username' value='" . $_SESSION ["username"] . "' required/>
	</p>
	<p>
		<label>" . lang ( "PW" ) . ":</label>
		<input type='password' name='password' required/>
	</p>
	<p>
		<label>" . lang ( "PW_CONFIRM" ) . ":</label>
		<input type='password' name='passwordc' required/>
	</p>
	<p>
		<label>" . lang ( "EMAIL" ) . ":</label>
		<input type='text' name='email' value='" . $_SESSION ["email"] . "'required />
	</p>
	<p>
		<label>" . lang ( "CODE" ) . ":</label>
		<img src='models/captcha.php'>
	</p>
		<label>" . lang ( "ENTER_CODE" ) . ":</label>
		<input name='captcha' type='text' required />
	</p>
	<label>&nbsp;<br>";
echo '
	<input type="submit" value="' . lang ( "REGISTER_BTN" ) . '" class="myButton"/>
	</p>

	</form>
	';




require_once ("footer.php");
?>


<?php



?>
