<?php
require_once("header.php");

/**
 * User has confirmed they want their password changed
 */
if(!empty($_GET["confirm"]))
{
	$token = trim($_GET["confirm"]);
	
	if($token == "" || !validateActivationToken($token,TRUE))
	{
		$errors[] = lang("FORGOTPASS_INVALID_TOKEN");
	}
	else
	{
		$rand_pass = getUniqueCode(15); //Get unique code
		$secure_pass = md5($rand_pass); //Generate random hash
		$userdetails = fetchUserDetails(NULL,$token); //Fetchs user details
		$mail = new userCakeMail();		
		
		//Setup our custom hooks
		$hooks = array(
			"searchStrs" => array("#GENERATED-PASS#","#FIRSTNAME#","#LASTNAME#"),
			"subjectStrs" => array($rand_pass,$userdetails["first_name"],$userdetails["last_name"])
			);
		
		if(!$mail->newTemplateMsg(lang("YOUR_LOST_PW_FILE"),$hooks))
		{
			$errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
		}
		else
		{	
			if(!$mail->sendMail($userdetails["email"],lang("NEWPW_MAIL_SUBJECT")))
			{
				$errors[] = lang("MAIL_ERROR");
			}
			else
			{
				if(!updatePasswordFromToken($secure_pass,$token))
				{
					$errors[] = lang("SQL_ERROR");
				}
				else
				{	
					if(!flagLostPasswordRequest($userdetails["user_name"],0))
					{
						$errors[] = lang("SQL_ERROR");
					}
					else {
						$successes[]  = lang("FORGOTPASS_NEW_PASS_EMAIL");
					}
				}
			}
		}
	}
}

//User has denied this request
if(!empty($_GET["deny"]))
{
	$token = trim($_GET["deny"]);
	
	if($token == "" || !validateActivationToken($token,TRUE))
	{
		$errors[] = lang("FORGOTPASS_INVALID_TOKEN");
	}
	else
	{
		
		$userdetails = fetchUserDetails(NULL,$token);
		
		if(!flagLostPasswordRequest($userdetails["user_name"],0))
		{
			$errors[] = lang("SQL_ERROR");
		}
		else {
			$successes[] = lang("FORGOTPASS_REQUEST_CANNED");
		}
	}
}

//Forms posted
if(!empty($_POST))
{
	$email = $_POST["email"];
	$username = sanitize($_POST["username"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	
	if(trim($email) == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_EMAIL");
	}
	//Check to ensure email is in the correct format / in the db
	else if(!isValidEmail($email) || !emailExists($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	
	if(trim($username) == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	else if(!usernameExists($username))
	{
		$errors[] = lang("ACCOUNT_INVALID_USERNAME")." - ".$username;
	}
	
	if(count($errors) == 0)
	{
		
		//Check that the username / email are associated to the same account
		if(!emailUsernameLinked($email,$username))
		{
			$errors[] =  lang("ACCOUNT_USER_OR_EMAIL_INVALID");
		}
		else
		{
			//Check if the user has any outstanding lost password requests
			$userdetails = fetchUserDetails($username);
//			if($userdetails["lost_password_request"] == 1)
//			{
//				$errors[] = lang("FORGOTPASS_REQUEST_EXISTS");
//			}
//			else
//			{
				//Email the user asking to confirm this change password request
				//We can use the template builder here
				
				//We use the activation token again for the url key it gets regenerated everytime it's used.
				
				$mail = new userCakeMail();
				$confirm_url = lang("CONFIRM_URL")."\n"."https://dzwebshop.azurewebsites.net/forgot-password.php?confirm=".$userdetails["activation_token"];
				$deny_url = lang("DENY")."\n"."https://dzwebshop.azurewebsites.net/forgot-password.php?deny=".$userdetails["activation_token"];
				
				//Setup our custom hooks
				$hooks = array(
					"searchStrs" => array("#CONFIRM-URL#","#DENY-URL#","#FIRSTNAME#","#LASTNAME#"),
					"subjectStrs" => array($confirm_url,$deny_url,$userdetails["first_name"],$userdetails["last_name"])
					);
				
				if(!$mail->newTemplateMsg(lang("LOST_PW_REQ_FILE"),$hooks))
				{
					$errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
				}
				else
				{
					if(!$mail->sendMail($userdetails["email"],lang("LOSTPW_MAIL_SUBJECT")))
					{
						$errors[] = lang("MAIL_ERROR");
					}
					else
					{
						//Update the DB to show this account has an outstanding request
						if(!flagLostPasswordRequest($userdetails["user_name"],1))
						{
							$errors[] = lang("SQL_ERROR");
						}
						else {
							
							$successes[] = lang("FORGOTPASS_REQUEST_SUCCESS");
						}
					}
				}
			}
//		}
	}
}

echo "
<p><br/></p>
<p><br/></p>
<p><br/></p>";


echo resultBlock($errors,$successes);
echo "
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'></div>
		</div>
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-3'>
				<p class='panel panel-primary'>
					<h1>".lang("FORGOT_PASSWORD")."</h1>
					<p>".lang("PW_FORGOT_TXT")."</p>
                    <p><br/></p>			
                    <div id='regbox'>
                        <form name='newLostPass' action='".$_SERVER['PHP_SELF']."' method='post' class='form_forgotPW'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='username'>".lang("USERNAME").":</label>
                                    <input type='text' name='username' id='username' class='form-control' required/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='email'>".lang("EMAIL").":</label>
                                    <input type='text' name='email' id='email' class='form-control' required/>
                                </div>
                            </div>
                             <div class='row'>
                                <div class='col-md-12'>
                                   <input style=\"float:right;\"  type='submit' value='".lang("SUBMIT_BTN")."' class='btn btn-success btn-lg' /> 
                                </div>
                            </div>
                            <p>
                                
                            </p>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>";


require_once ("footer.php");
?>

