<?php

require_once("header.php");


$mailCustomer = new userCakeMail();
$mailDZ = new userCakeMail();

//Setup our custom hooks
$hooks = array(
    "searchStrs" => array("#FIRSTNAME#","#LASTNAME#","#EMAIL#"),
    "subjectStrs" => array($_COOKIE ['firstname'], $_COOKIE ['lastname'],$_COOKIE ['email'] )
);

if(!$mailCustomer->newTemplateMsg(lang("ORDER_CONFIRMATION_FILE"),$hooks))
{
    $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
}
else
{
    if(!$mailCustomer->sendMail($_COOKIE ['email'],lang("ORDER_CONFIRM_SUBJECT"))     )
    {
        $errors[] = lang("MAIL_ERROR");
    }
}

if(!$mailDZ->newTemplateMsg(lang("ORDER_REQUEST_FILE"),$hooks)  )
{
    $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
}
else
{
    if(!$mailDZ->sendMail("jasmin.thevathas@hotmail.com",lang("ORDER_REQUEST_SUBJECT")))
    {
        $errors[] = lang("MAIL_ERROR");
    } else {
        $successes[] = lang("CONFIRMATION_SUCCESS");
    }
}

?>
<!--TODO HTML CSS-->
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><?php lang("THANK_YOU") ?></h1>
                    <hr/>
                    <p><?php echo lang("HELLO"); ?> <?php echo $_SESSION["name"]; ?>, <b></b><br/>
                        <?php echo lang("CONFIRMATION_SUCCESS") ?> <br/></p>
                    <button class="btn btn-primary btn-lg"><a href="index.php"><?php echo lang("SHOPPING"); ?></a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
require_once("footer.php");
?>

















































