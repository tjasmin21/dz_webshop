<?php
$thisPage = "usermenu";
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
	$email = $_POST ["email"];
	
    if(isUserPwCorrect($loggedInUser->user_name, $password)) {
        if ($email != $loggedInUser->email) {

            if (trim($email) == "") {
                $errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
            } else if (!isValidEmail($email)) {
                //Extra validation for older bowsers, because
                $errors [] = lang("ACCOUNT_INVALID_EMAIL");

            } else if (emailExists($email)) {
                $errors[] = lang("ACCOUNT_EMAIL_IN_USE", array($email));
            }

            //End data validation
            if (count($errors) == 0) {
                $loggedInUser->updateEmail($email);
                $successes[] = lang("ACCOUNT_EMAIL_UPDATED");
            }

        }
    }else{
        $errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
    }

    }

echo "
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div id='main' class='alert alert-secondary' role='alert'>";

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
					<h1>".lang("EMAIL_CHANGE")."</h1>
					<p>".lang("EMAIL_CHANGE_TXT")."</p>			
						<div id='regbox'>
							<form name='updateAccount' action='" . $_SERVER ['PHP_SELF'] . "' method='post' class='form_changePW'>
								<div class='form-group'>
                                    <label for='username'>".lang("PW_CURRENT").":</label>
                                    <input type='password' name='password' id='password' class='form-control' required/>
								</div>
								<div class='form-group'>
                                    <label for='email'>".lang("EMAIL").":</label>
                                    <input type='text' name='email' id='email' class='form-control' value='" . $loggedInUser->email . "' disabled />
								</div>
								<div class='form-group'>
                                    <label for='email'>".lang("NEW_EMAIL").":</label>
                                    <input type='text' name='email' id='email' class='form-control' required/>
								</div>
		                        <input type='submit' value='".lang("UPDATE_BTN")."' class='btn btn-primary' /> 
							</form>
						</div>
				</div>
			</div>
		</div>	
	</div>	
";


require_once ("footer.php");
?>
