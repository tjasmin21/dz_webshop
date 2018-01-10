<?php
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

while ($row = mysqli_fetch_array($run_query)) {
    $pro_title = $row['product_title'];
    $pro_img = $row['product_image'];
    $pro_qty = $row['qty'];
    $pro_price = $row['price'];
    $tot_amount = $row['total_amt'];
}
?>


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

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>Customer Order details</h1>
                            <hr/>
                            <?php
                            $transNr = 0;
                            $transId = "RTSH5415SHSHYD87D25S";
                            while ($row = mysqli_fetch_array($run_query)) {
                                $pro_title = $row['product_title'];
                                $pro_img = $row['product_image'];
                                $pro_qty = $row['product_qty'];
                                $pro_price = $row['product_price'];
                                $tot_amount = $row['total_amount'];

                                $transId = $transId.$transNr;
                                $transNr++;
                            }
                            echo '
                            <div class="row">
                                <div class="col-md-6">
                                    <img style="float:right;" src="img/content/'.$pro_img.'" class="img-thumbnail"/>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <tr><td>Product Name</td><td><b>'.$pro_title.'</b> </td></tr>
                                        <tr><td>Product Price</td><td><b>'.$pro_price.' CHF</b></td></tr>
                                        <tr><td>Quantity</td><td><b>'.$pro_qty.'</b></td></tr>
                                        <tr><td>Payment</td><td><b>Completed</b></td></tr>
                                        <tr><td>Transaction Id</td><td><b>'.$transId.'</b></td></tr>
                                    </table>
                                </div>
                            </div>';
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <p><br/></p>
                        <div class="row">
                            <div class="col-md-12">
                                <button style="float:right;" onclick="window.history.back()" class="btn btn-info btn-lg"><?php echo lang("EDIT") ?></button>
                                <button style="float:right;" id="confirm-order" name="confirm-order" class="btn btn-success btn-lg"><?php echo lang("CONFIRM_ORDER") ?></button>
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


