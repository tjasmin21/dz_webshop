<?php
require_once ("header.php");

?>

	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo lang("REGISTER") ?></div>
					<div class="panel-body">
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="firstname"><?php echo lang("FIRSTNAME") ?></label>
								<input type="text" id="firstname" name="firstname" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label for="lastname"><?php echo lang("LASTNAME") ?></label>
								<input type="text" id="lastname" name="lastname" class="form-control" required>
							</div>
						</div>
						<div class="row">
                            <div class="col-md-6">
                                <label for="username"><?php echo lang("USERNAME") ?></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
							<div class="col-md-6">
								<label for="email"><?php echo lang("EMAIL") ?></label>
								<input type="email" id="email" name="email" class="form-control" required>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address"><?php echo lang("ADDRESS") ?></label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<label for="password"><?php echo lang("PW") ?></label>
								<input type="password" id="password" name="password"class="form-control" required>
							</div>
                            <div class="col-md-6">
                                <label for="repassword"><?php echo lang("PW_CONFIRM") ?></label>
                                <input type="password" id="repassword" name="passwordc" class="form-control" required>
                            </div>
						</div>
                        <div class="row">
<!--                            <div class="col-md-6">-->
<!--                                <label for="captcha">--><?php //echo lang("CODE") ?><!--</label>-->
<!--                                <img id="captcha" src='models/captcha.php'>-->
<!--                            </div>-->
<!--                                </div>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <label for="captchaTxt">--><?php //echo lang("ENTER_CODE") ?><!--</label>-->
<!--                                        <input name='captcha' id="captchaTxt" type='text' required />-->
<!--                                    </div>-->
<!--                                </div>-->
                                <p><br/></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="float:right;" value="<?php echo lang("REGISTER_BTN") ?>" type="button" id="signup_button" name="signup_button" class="btn btn-success btn-lg">
                                    </div>
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




















