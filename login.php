<?php
require_once( "config.php" );

if(isset($_POST["userLogin"])){
	$username = mysqli_real_escape_string($con,$_POST["username"]);
	$password = md5($_POST["userPassword"]);
	$sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		}
}

?>
