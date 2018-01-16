<?php
$thisPage = "signup";
require_once("header.php");
?>

<!--TODO HTML CSS-->
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
                <h1><?php echo lang("REGISTER") ?></h1>
                <form method="post">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label"><?php echo lang("FIRSTNAME") ?></label>
                        <div class="col-sm-10">
                            <input type="text" id="firstname" name="firstname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label"><?php echo lang("LASTNAME") ?></label>
                        <div class="col-sm-10">
                            <input type="text" id="lastname" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label"><?php echo lang("USERNAME") ?></label>
                        <div class="col-sm-10">
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label"><?php echo lang("EMAIL") ?></label>
                        <div class="col-sm-10">
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><?php echo lang("ADDRESS") ?></label>
                        <div class="col-sm-10">
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label"><?php echo lang("PW") ?></label>
                        <div class="col-sm-10">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repassword" class="col-sm-2 col-form-label"><?php echo lang("PW_CONFIRM") ?></label>
                        <div class="col-sm-10">
                            <input type="password" id="repassword" name="passwordc" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p><br/></p>
                        <div class="row">
                            <div class="col-md-12">
                                <input style="float:right;" value="<?php echo lang("RESET") ?>" type="reset"
                                       class='btn btn-dark'>
                                <input style="float:right;" value="<?php echo lang("REGISTER_BTN") ?>" type="button"
                                       id="signup_button" name="signup_button" class='btn btn-primary'>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>




















