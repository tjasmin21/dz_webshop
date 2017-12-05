<?php


class loggedInUser {
	public $email = NULL;
	public $hash_pw = NULL;
	public $user_id = NULL;
	
	//Simple function to update the last sign in of a user
	public function updateLastSignIn()
	{
		global $mysqli;
		$time = time();
		$stmt = $mysqli->prepare("UPDATE users
			SET
			last_sign_in_stamp = ?
			WHERE
			id = ?");
		$stmt->bind_param("ii", $time, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Return the timestamp when the user registered
	public function signupTimeStamp()
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT sign_up_stamp
			FROM users
			WHERE id = ?");
		$stmt->bind_param("i", $this->user_id);
		$stmt->execute();
		$stmt->bind_result($timestamp);
		$stmt->fetch();
		$stmt->close();
		return ($timestamp);
	}
	
	//Update a users password
	public function updatePassword($pass)
	{
		global $mysqli;
		$secure_pass = md5($pass);
		$this->hash_pw = $secure_pass;
		$stmt = $mysqli->prepare("UPDATE users
			SET
			password = ? 
			WHERE
			id = ?");
		$stmt->bind_param("si", $secure_pass, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Update a users email
	public function updateEmail($email)
	{
		global $mysqli;
		$this->email = $email;
		$stmt = $mysqli->prepare("UPDATE users
			SET 
			email = ?
			WHERE
			id = ?");
		$stmt->bind_param("si", $email, $this->user_id);
		$stmt->execute();
		$stmt->close();	
	}
	
	//Is a user has a permission
	public function checkPermission($permission)
	{
		global $mysqli,$master_account;
		
		//Grant access if master user
		
		$stmt = $mysqli->prepare("SELECT id 
			FROM user_permission_matches
			WHERE user_id = ?
			AND permission_id = ?
			LIMIT 1
			");
		$access = 0;
		foreach($permission as $check){
			if ($access == 0){
				$stmt->bind_param("ii", $this->user_id, $check);
				$stmt->execute();
				$stmt->store_result();
				if ($stmt->num_rows > 0){
					$access = 1;
				}
			}
		}
		if ($access == 1)
		{
			return true;
		}
		if ($this->user_id == $master_account){
			return true;	
		}
		else
		{
			return false;	
		}
		$stmt->close();
	}
	
	//Logout
	public function userLogOut()
	{
		destroySession("userCakeUser");
	}	
}

?>
