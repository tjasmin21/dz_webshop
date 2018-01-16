<?php
$thisPage = "cart";
require_once ("header.php");
?>
<!--TODO HTML CSS-->
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message-->
			</div>
			<div class="col-md-2"></div>
		</div>
        <h1><?php echo lang("CART_CHECKOUT") ?></h1>
        <table>
                <tr>
                    <td style="width:120px; font-weight: bold;"><?php echo lang("CART_ACTION") ?></td>
                    <td style="width:400px; font-weight: bold;"><?php echo lang("CART_PRODUCT") ?></td>
                    <td style="width:120px; font-weight: bold;"><?php echo lang("CART_QUANTITY") ?></td>
                    <td style="width:120px; font-weight: bold;"><?php echo lang("CART_PROD_PRICE") ?></td>
                    <td style="width:120px; font-weight: bold;"><?php echo lang("CART_PRICE") ?></td>
                </tr>
            </table>
            <span id="cart_checkout"></span>
        <div class="col-md-2"></div>
    </div>

<?php
    require_once ("footer.php");
?>
