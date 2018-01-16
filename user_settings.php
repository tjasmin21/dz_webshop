<?php
$thisPage = "usermenu";
require_once("header.php");

//// Prevent the user visiting the logged in page if he is not logged in
//if (!isUserLoggedIn ()) {
//	header ( "Location: index.php" );
//	die ();
//}

if (!empty ($_POST)) {
    $errors = array();
    $successes = array();
    $password = md5($_POST ["password"]);
    $password_new = trim($_POST ["passwordc"]);
    $password_confirm = trim($_POST ["passwordcheck"]);

    if (isUserPwCorrect($loggedInUser->username, $password)) {
        if ($password_new != "" or $password_confirm != "") {
            if (trim($password_new) == "") {
                $errors [] = lang("ACCOUNT_SPECIFY_NEW_PASSWORD");
            } else if (trim($password_confirm) == "") {
                $errors [] = lang("ACCOUNT_SPECIFY_CONFIRM_PASSWORD");
            } else if (minMaxRange(6, 50, $password_new)) {
                $errors [] = lang("ACCOUNT_NEW_PASSWORD_LENGTH", array(
                    6,
                    50
                ));
            } else if ($password_new != $password_confirm) {
                $errors [] = lang("ACCOUNT_PASS_MISMATCH");
            }

            // End data validation
            if (count($errors) == 0) {
                // Also prevent updating if someone attempts to update with the same password
                $entered_pass_new = md5($password_new);

                if ($entered_pass_new == $loggedInUser->hash_pw) {
                    // Don't update, this fool is trying to update with the same password Â¬Â¬
                    $errors [] = lang("ACCOUNT_PASSWORD_NOTHING_TO_UPDATE");
                } else {
                    // This function will create the new hash and update the hash_pw property.
                    $loggedInUser->updatePassword($password_new);
                    $successes [] = lang("ACCOUNT_PASSWORD_UPDATED");
                }
            }
        }
        if (count($errors) == 0 and count($successes) == 0) {
            $errors [] = lang("NOTHING_TO_UPDATE");
        }
    } else {
        $errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
    }
}

echo "
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div id='main' class='alert alert-secondary' role='alert'>";

echo resultBlock($errors, $successes);

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
					<h1>" . lang("PW_CHANGE") . "</h1>
					<p>" . lang("PW_CHANGE_TXT") . "</p>			
						<div id='regbox'>
							<form name='updateAccount' action='" . $_SERVER ['PHP_SELF'] . "' method='post' class='form_changePW'>
								<div class='form-group'>
										<label for='username'>" . lang("PW_CURRENT") . ":</label>
										<input type='password' name='password' id='password' class='form-control' required/>
								</div>
								<div class='form-group'>
										<label for='email'>" . lang("EMAIL") . ":</label>
										<input type='text' name='email' id='email' class='form-control' value='" . $loggedInUser->email . "' disabled />
								</div>
								<div class='form-group'>
										<label for='username'>" . lang("NEW_PW") . ":</label>
										<input type='password' name='passwordc' id='passwordc' class='form-control' required/>
								</div>
								<div class='form-group'>
										<label for='username'>" . lang("PW_CONFIRM") . ":</label>
										<input type='password' name='passwordcheck' id='passwordcheck' class='form-control' required/>
								</div>
		                        <input type='submit' value='" . lang("UPDATE_BTN") . "' class='btn btn-primary' /> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
";


require_once("footer.php");
?>
