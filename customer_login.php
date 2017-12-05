<?php
require_once ("header.php");

if(! empty ( $_POST )) {
	$username = mysqli_real_escape_string($mysqli,$_POST["username"]);
	$password = md5($_POST["password"]);

	$sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
	$run_query = mysqli_query($mysqli,$sql);
	$count = mysqli_num_rows($run_query);

	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["id"];
		$_SESSION["name"] = $row["first_name"];

		$userdetails = fetchUserDetails ( $username );

		// Construct a new logged in user object
		// Transfer some db data to the session object
		$loggedInUser = new loggedInUser ();
		$loggedInUser->email = $userdetails ["email"];
		$loggedInUser->user_id = $userdetails ["id"];
		$loggedInUser->hash_pw = $userdetails ["password"];
		$loggedInUser->title = $userdetails ["title"];
		$loggedInUser->address = $userdetails ["address"];
		$loggedInUser->username = $userdetails ["user_name"];

		// Update last sign in
		$loggedInUser->updateLastSignIn ();

		header('Location: index.php');
	} else{
		$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
	}
}

?>

	<p><br/></p>
	<p><br/></p>
	<p><br/></p>


<?php echo resultBlock($errors,$successes); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo lang("LOGIN") ?></div>
					<div class="panel-body">
                        <?php echo lang("LOGIN_INFO") ?>
                        <p><br/></p>

                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username"><?php echo lang("USERNAME") ?></label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"><?php echo lang("PW") ?></label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <p><br/></p>
                            <?php echo lang("PW_FORGOT_QST") ?>
                            <p><br/></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="float:right;" value="<?php echo lang("LOGIN_BTN") ?>" type="submit" id="login_button" name="login_button" class="btn btn-success btn-lg">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
<?php
    require_once ("footer.php");
?>














