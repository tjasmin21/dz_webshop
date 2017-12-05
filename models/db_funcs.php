<?php
	// Functions that do interact with DB
	// ------------------------------------------------------------------------------


/**
 * @param $token -
 * @param null $lostpass
 *
 * @return bool true is activation token exists in DB
 */
	function validateActivationToken($token, $lostpass = NULL) {
		global $mysqli;
		if ($lostpass == NULL) {
			$stmt = $mysqli->prepare ( "SELECT active
				FROM users
				WHERE active = 0
				AND
				activation_token = ?
				LIMIT 1" );
		} else {
			$stmt = $mysqli->prepare ( "SELECT active
				FROM users
				WHERE active = 1
				AND
				activation_token = ?
				AND
				lost_password_request = 1 
				LIMIT 1" );
		}
		$stmt->bind_param ( "s", $token );
		$stmt->execute ();
		$stmt->store_result ();
		$num_returns = $stmt->num_rows;
		$stmt->close ();

		if ($num_returns > 0) {
			return true;
		} else {
			return false;
		}
	}


// Checks if a username exists in the DB
function usernameExists($username) {
	global $mysqli;

	$stmt = $mysqli -> prepare ( "SELECT active
		FROM users
		WHERE
		user_name = ?
		LIMIT 1" );
	$stmt->bind_param ( "s", $username );
	$stmt->execute ();
	$stmt->store_result ();
	$num_returns = $stmt->num_rows;
	$stmt->close ();

	if ($num_returns > 0) {
		return true;
	} else {
		return false;
	}
}

// Check if an email exists in the DB
function emailExists($email) {
	global $mysqli;
	$stmt = $mysqli->prepare ( "SELECT active
		FROM users
		WHERE
		email = ?
		LIMIT 1" );
	$stmt->bind_param ( "s", $email );
	$stmt->execute ();
	$stmt->store_result ();
	$num_returns = $stmt->num_rows;
	$stmt->close ();

	if ($num_returns > 0) {
		return true;
	} else {
		return false;
	}
}

// Retrieve complete user information by username, token or ID
function fetchUserDetails($username = NULL, $token = NULL, $id = NULL) {
	if ($username != NULL) {
		$column = "user_name";
		$data = $username;
	} elseif ($token != NULL) {
		$column = "activation_token";
		$data = $token;
	} elseif ($id != NULL) {
		$column = "id";
		$data = $id;
	}
	global $mysqli;
	$stmt = $mysqli->prepare ( "SELECT 
		id,
		first_name,
		last_name,
		user_name,
		address,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp
		FROM users
		WHERE
		$column = ?
		LIMIT 1" );
	$stmt->bind_param ( "s", $data );

	$stmt->execute ();
	$stmt->bind_result ( $id, $first, $last, $user, $address, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn );
	while ( $stmt->fetch () ) {
		$row = array (
			'id' => $id,
			'first_name' => $first,
			'last_name' => $last,
			'user_name' => $user,
			'address' => $address,
			'password' => $password,
			'email' => $email,
			'activation_token' => $token,
			'last_activation_request' => $activationRequest,
			'lost_password_request' => $passwordRequest,
			'active' => $active,
			'title' => $title,
			'sign_up_stamp' => $signUp,
			'last_sign_in_stamp' => $signIn
		);
	}
	$stmt->close ();
	return ($row);
}

// Generate a random password, and new token
function updatePasswordFromToken($pass, $token) {
	global $mysqli;
	$new_activation_token = generateActivationToken ();
	$stmt = $mysqli->prepare ( "UPDATE users
		SET password = ?,
		activation_token = ?
		WHERE
		activation_token = ?" );
	$stmt->bind_param ( "sss", $pass, $new_activation_token, $token );
	$result = $stmt->execute ();
	$stmt->close ();
	return $result;
}

// Toggle if lost password request flag on or off
function flagLostPasswordRequest($username, $value) {
	global $mysqli;
	$stmt = $mysqli->prepare ( "UPDATE users
		SET lost_password_request = ?
		WHERE
		user_name = ?
		LIMIT 1
		" );
	$stmt->bind_param ( "ss", $value, $username );
	$result = $stmt->execute ();
	$stmt->close ();
	return $result;
}

// Check if a user name and email belong to the same user
function emailUsernameLinked($email, $username) {
	global $mysqli;
	$stmt = $mysqli->prepare ( "SELECT active
		FROM users
		WHERE user_name = ?
		AND
		email = ?
		LIMIT 1
		" );
	$stmt->bind_param ( "ss", $username, $email );
	$stmt->execute ();
	$stmt->store_result ();
	$num_returns = $stmt->num_rows;
	$stmt->close ();

	if ($num_returns > 0) {
		return true;
	} else {
		return false;
	}
}

?>
