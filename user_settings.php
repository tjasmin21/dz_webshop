<?php
require_once ("header.php");

// Prevent the user visiting the logged in page if he is not logged in
if (!isUserLoggedIn ()) {
	header ( "Location: index.php" );
	die ();
}

if (! empty ( $_POST )) {
	$errors = array ();
	$successes = array ();
	$password = $_POST ["password"];
	$password_new = $_POST ["passwordc"];
	$password_confirm = $_POST ["passwordcheck"];
	
	$errors = array ();
	//$email = $_POST ["email"];
	
	// Perform some validation

	/*if ($email != $loggedInUser->email) {
		
		 * if(trim($email) == "")
		 * {
		 * $errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
		 * }
		 * else if(!isValidEmail($email))
		 * {
		 
		$errors [] = lang ( "ACCOUNT_INVALID_EMAIL" );
		
		 * }
		 * else if(emailExists($email))
		 * {
		 * $errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));
		 * }
		 *
		 * //End data validation
		 * if(count($errors) == 0)
		 * {
		 * $loggedInUser->updateEmail($email);
		 * $successes[] = lang("ACCOUNT_EMAIL_UPDATED");
		 * }
		
	 }*/
	
	if ($password_new != "" or $password_confirm != "") {
		if (trim ( $password_new ) == "") {
			$errors [] = lang ( "ACCOUNT_SPECIFY_NEW_PASSWORD" );
		} else if (trim ( $password_confirm ) == "") {
			$errors [] = lang ( "ACCOUNT_SPECIFY_CONFIRM_PASSWORD" );
		} else if (minMaxRange ( 6, 50, $password_new )) {
			$errors [] = lang ( "ACCOUNT_NEW_PASSWORD_LENGTH", array (
					6,
					50 
			) );
		} else if ($password_new != $password_confirm) {
			$errors [] = lang ( "ACCOUNT_PASS_MISMATCH" );
		}
		
		// End data validation
		if (count ( $errors ) == 0) {
			// Also prevent updating if someone attempts to update with the same password
			$entered_pass_new = md5 ( $password_new, $loggedInUser->hash_pw );
			
			if ($entered_pass_new == $loggedInUser->hash_pw) {
				// Don't update, this fool is trying to update with the same password Â¬Â¬
				$errors [] = lang ( "ACCOUNT_PASSWORD_NOTHING_TO_UPDATE" );
			} else {
				// This function will create the new hash and update the hash_pw property.
				$loggedInUser->updatePassword ( $password_new );
				$successes [] = lang ( "ACCOUNT_PASSWORD_UPDATED" );
			}
		}
	}
	if (count ( $errors ) == 0 and count ( $successes ) == 0) {
		$errors [] = lang ( "NOTHING_TO_UPDATE" );
	}
}

echo "
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div id='main'>";

echo resultBlock ( $errors, $successes );

echo "
	</div>
	
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'></div>
		</div>
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-3'>
				<div class='panel panel-primary'>
					<div class='panel-heading'>".lang("PW_CHANGE")."</div>
					<div class='panel-body'>
                        ".lang("PW_CHANGE_TXT")."
                        <p><br/></p>			
						<div id='regbox'>
							<form name='updateAccount' action='" . $_SERVER ['PHP_SELF'] . "' method='post' class='form_changePW'>
								<div class='row'>
									<div class='col-md-8'>
										<label for='username'>".lang("PW_CURRENT").":</label>
										<input type='password' name='password' id='password' class='form-control' required/>
									</div>
								</div>
								<div class='row'>
									<div class='col-md-8'>
										<label for='email'>".lang("EMAIL").":</label>
										<input type='text' name='email' id='email' class='form-control' value='" . $loggedInUser->email . "' disabled />
									</div>
								</div>
								<div class='row'>
									<div class='col-md-8'>
										<label for='username'>".lang("NEW_PW").":</label>
										<input type='password' name='passwordc' id='passwordc' class='form-control' required/>
									</div>
								</div>
									<div class='row'>
									<div class='col-md-8'>
										<label for='username'>".lang("PW_CONFIRM").":</label>
										<input type='password' name='passwordcheck' id='passwordcheck' class='form-control' required/>
									</div>
								</div>
								<p></p>
								<div class='row'>
		                            <div class='col-md-12'>
		                               <input style='float:right;'  type='submit' value='".lang("UPDATE_BTN")."' class='btn btn-success btn-lg' /> 
		                            </div>
		                        </div>
								<p></p>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class='col-md-3'>
				<div class='panel panel-primary'>
					<div class='panel-heading'>".lang("EMAIL_CHANGE")."</div>
					<div class='panel-body'>
                        ".lang("EMAIL_CHANGE_TXT")."
                        <p><br/></p>			
						<div id='regbox'>
							<form name='updateAccount' action='" . $_SERVER ['PHP_SELF'] . "' method='post' class='form_changePW'>
								<div class='row'>
									<div class='col-md-8'>
										<label for='username'>".lang("PW_CURRENT").":</label>
										<input type='password' name='password' id='password' class='form-control' required/>
									</div>
								</div>
								<div class='row'>
									<div class='col-md-8'>
										<label for='email'>".lang("EMAIL").":</label>
										<input type='text' name='email' id='email' class='form-control' value='" . $loggedInUser->email . "' disabled />
									</div>
								</div>
								<div class='row'>
									<div class='col-md-8'>
										<label for='username'>".lang("NEW_PW").":</label>
										<input type='password' name='passwordc' id='passwordc' class='form-control' required/>
									</div>
								</div>
								<p></p>
								<div class='row'>
		                            <div class='col-md-12'>
		                               <input style='float:right;'  type='submit' value='".lang("UPDATE_BTN")."' class='btn btn-success btn-lg' /> 
		                            </div>
		                        </div>
								<p></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
";


require_once ("footer.php");
?>
