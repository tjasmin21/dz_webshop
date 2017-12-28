<?php
require_once("models/funcs.php");

//if (!isUserLoggedIn()) {
//    header("Location: index.php");
//    die ();
//}

if (! empty ( $_POST )) {
    setCookieData($_POST);
}

require_once("header.php");

?>


<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo lang("CONFIRM_DATA") ?></div>
                <div class="panel-body">
                    <div class="row">
                        <?php echo lang("TXT_CONTROL") ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label><?php echo lang("FIRSTNAME") ?>:</label>
                            <label> <?php echo $_COOKIE ['firstname'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label ><?php echo lang("LASTNAME") ?>:</label>
                            <label ><?php echo $_COOKIE["lastname"]?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label ><?php echo lang("TEL") ?>:</label>
                            <label ><?php echo $_COOKIE["telephone"] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label ><?php echo lang("EMAIL") ?>:</label>
                            <label ><?php echo $_COOKIE["email"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><?php echo lang("ADDRESS") ?>:</label>
                            <label ><?php echo $_COOKIE["address"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><?php echo lang("COUNTRY") ?>:</label>
                            <label ><?php echo $_COOKIE["countries"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><?php echo lang("SHIP_METHOD") ?>:</label>
                            <label ><?php echo $_COOKIE["shipMethod"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><?php echo lang("COMMENT") ?>:</label>
                            <label ><?php echo $_COOKIE["comment"] ?></label>
                        </div>
                    </div>
                    <div id="dialog" title="Contact form">
                        <p>appear now</p>
                    </div>
                    <div class="row">
                        <p><br/></p>
                        <div class="row">
                            <div class="col-md-12">
                                <button style="float:right;" onclick="window.history.back()" class="btn btn-info btn-lg"><?php echo lang("EDIT") ?></button>
                                <input style="float:right;" value="<?php echo lang("CONFIRM_ORDER") ?>" type="submit" id="confirm_order" name="confirm_order" class="btn btn-success btn-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>



<?php
require_once("footer.php");
?>

<?php

//Forms posted
if(!empty($_POST))
{
    $mail = new userCakeMail();

    //Setup our custom hooks
    $hooks = array(
        "searchStrs" => array("#FIRSTNAME#","#LASTNAME#"),
        "subjectStrs" => array($_COOKIE ['firstname'],$_COOKIE ['lastname'])
    );

    if(!$mail->newTemplateMsg(lang("LOST_PW_REQ_FILE"),$hooks))
    {
        $errors[] = lang("MAIL_TEMPLATE_BUILD_ERROR");
    }
    else
    {
        if(!$mail->sendMail($_COOKIE ['email'],lang("LOSTPW_MAIL_SUBJECT")) ||
            !$mail->sendMail("customercare@dropzone.com",lang("LOSTPW_MAIL_SUBJECT")))
        {
            $errors[] = lang("MAIL_ERROR");
        }
        else
        {
            $successes[] = lang("FORGOTPASS_REQUEST_SUCCESS");
        }
    }
}

?>
