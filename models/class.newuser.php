<?php
class User {
	public $user_active = 0;
	private $clean_email;
	public $status = false;
	private $clean_password;
	private $firstname;
	private $lastname;
	private $username;
	public $sql_failure = false;
	public $mail_failure = false;
	public $email_taken = false;
	public $username_taken = false;
	public $activation_token = 0;
	public $success = NULL;
	function __construct($firstn, $lastn, $user, $address, $pass, $email) {
		$this->address = $address;
		// Sanitize
		$this->clean_email = sanitize ( $email);
		$this->clean_password = trim ( $pass );
		$this->firstname = $firstn;
		$this->lastname = $lastn;
		$this->username = sanitize ( $user );
		
		if (usernameExists ( $this->username )) {
			$this->username_taken = true;
		} else {
			// No problems have been found.
			$this->status = true;
		}
	}
	public function userCakeAddUser() {
		global $mysqli;
		
		// Prevent this function being called if there were construction errors
		if ($this->status) {
			// Construct a secure hash for the plain text password
			$secure_pass =  md5( $this->clean_password );

			// Construct a unique activation token
			$this->activation_token = generateActivationToken ();

            // Instant account activation
            $this->user_active = 1;
            $this->success = lang ( "ACCOUNT_REGISTRATION_COMPLETE_TYPE1" );

			
			if (! $this->mail_failure) {
				// Insert the user into the database providing no errors have been found.
				$stmt = $mysqli->prepare ( "INSERT INTO users (
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
					last_sign_in_stamp)
					VALUES (?,?,?,?,?,?,?,
					'" . time () . "',
					'0',
					?,
					'New Member',
					'" . time () . "',
					'0')" );
				
				$stmt->bind_param ( "sssssssi", $this->firstname, $this->lastname, $this->username, $this->address, $secure_pass, $this->clean_email, $this->activation_token, $this->user_active );
				$stmt->execute ();
				$inserted_id = $mysqli->insert_id;
				$stmt->close ();
				
				// Insert default permission into matches table
				$stmt = $mysqli->prepare ( "INSERT INTO user_permission_matches  (
					user_id, permission_id)
					VALUES (?, '1')" );

				$stmt->bind_param ( "s", $inserted_id );
				$stmt->execute ();
				$stmt->close ();
			}
		}
	}
}

?>
