<?php

require_once ("header.php");

//Forms posted
if(!empty($_POST))
{
    $mail = new userCakeMail();

    //Setup our custom hooks
    $hooks = array(
        "searchStrs" => array("#FIRSTNAME#","#LASTNAME#"),
        "subjectStrs" => array($_COOKIE ['firstname'], $_COOKIE ['lastname'])
    );

    if(!$mail->newTemplateMsg(lang("ORDER_CONFIRMATION_FILE"),$hooks))
    {
        $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
    }
    else
    {
//        if(!$mail->sendMail($_COOKIE ['email'],lang("ORDER_CONFIRM_SUBJECT")) ||
//            !$mail->sendMail("customercare@dropzone.com",lang("ORDER_CONFIRM_SUBJECT")))
        if(!$mail->sendMail("jasmin.thevathas@hotmail.com",lang("ORDER_CONFIRM_SUBJECT")))
        {
            $errors[] = lang("MAIL_ERROR");
        }
        else
        {
            $successes[] = lang("CONFIRMATION_SUCCESS");
        }
    }
}
?>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Thankyou </h1>
						<hr/>
						<p>Hello <?php echo $_SESSION["name"]; ?>, <b></b><br/>
                            <?php echo lang("CONFIRMATION_SUCCESS") ?> <br/></p>
						<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
<?php
    require_once ("footer.php");
?>

















































