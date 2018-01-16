﻿<?php
$thisPage = "cart";

require_once("models/funcs.php");

//if (!isUserLoggedIn()) {
//    header("Location: index.php");
//    die ();
//}

setCookieData($_POST);

require_once("header.php");

$user_id = $_SESSION["uid"];
$sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
$run_query = mysqli_query($mysqli, $sql);
?>

<!--TODO HTML CSS-->

<p><br/></p>
<p><br/></p>
<p><br/></p>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div id="dialogConfirmation" title="Purchase confirmation">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>This is a binding contract of purchase. Are you sure you want to place the order?</p>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <h1><?php echo lang("CONFIRM_DATA") ?></h1>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                            <?php echo lang("TXT_CONTROL") ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label><b><?php echo lang("FIRSTNAME") ?>:</b></label>
                            <label> <?php echo $_COOKIE ['firstname'] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label ><b><?php echo lang("LASTNAME") ?>:</b></label>
                            <label ><?php echo $_COOKIE["lastname"]?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label ><b><?php echo lang("TEL") ?>:</b></label>
                            <label ><?php echo $_COOKIE["telephone"] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label ><b><?php echo lang("EMAIL") ?>:</b></label>
                            <label ><?php echo $_COOKIE["email"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label ><b><?php echo lang("ADDRESS") ?>:</b></label>
                            <label ><?php echo $_COOKIE["address"] ?></label>
                        </div>
                        <div class="col-md-6">
                            <label ><b><?php echo lang("COUNTRY") ?>:</b></label>
                            <label ><?php echo $_COOKIE["countries"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><b><?php echo lang("SHIP_METHOD") ?>:</b></label>
                            <label ><?php echo $_COOKIE["shipMethod"] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label ><b><?php echo lang("COMMENT") ?>:</b></label>
                            <label ><?php echo $_COOKIE["comment"] ?></label>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1><?php echo lang("ORDER_DETAILS") ?></h1>
                            <hr/>
                            <?php
                            $transNr = 0;
                            $transId = "RTSH5415SHSHYD87D25S";
                            while ($row = mysqli_fetch_array($run_query)) {
                                $pro_title = $row['product_title'];
                                $pro_qty = $row['qty'];
                                $pro_price = $row['price'];
                                $tot_amount = $row['total_amt'];

                                $transId = $transId.$transNr;
                                $transNr++;
                                echo '
                                <div class="row">
                                    <table class="product-table">
                                        <tr><td>'.lang("CART_PRODUCT").'</td><td><b>'.$pro_title.'</b> </td></tr>
                                        <tr><td>'.lang("CART_PROD_PRICE").'</td><td><b>'.$pro_price.' CHF</b></td></tr>
                                        <tr><td>'.lang("CART_QUANTITY").'</td><td><b>'.$pro_qty.'</b></td></tr>
                                        <tr><td>'.lang("CART_PPAYMENT").'</td><td><b>'.lang("CART_WAITING_CONF").'</b></td></tr>
                                        <tr><td>'.lang("CART_ID").'</td><td><b>'.$transId.'</b></td></tr>
                                    </table>
                                </div>
                                 <p><br/></p>
                                <p></p>
                                <p></p>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <p><br/></p>
                        <div class="row">
                            <div class="col-md-12">
                                <button style="float:right;" onclick="window.history.back()" class="btn btn-secondary btn-lg"><?php echo lang("EDIT") ?></button>
                                <span>&nbsp;</span>
                                <button style="float:right;" id="confirm-order" name="confirm-order" class="btn btn-primary btn-lg"><?php echo lang("CONFIRM_ORDER") ?></button>
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


