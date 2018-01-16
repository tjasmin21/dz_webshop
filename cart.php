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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><?php echo lang("CART_ACTION") ?></th>
                    <th scope="col"><?php echo lang("CART_PRODUCT") ?></th>
                    <th scope="col"><?php echo lang("CART_QUANTITY") ?></th>
                    <th scope="col"><?php echo lang("CART_PROD_PRICE") ?></th>
                    <th scope="col"><?php echo lang("CART_PRICE") ?></th>
                </tr>
            </thead>
            <tbody id="cart_checkout"></tbody>
        </table>
        <div class="col-md-2"></div>
    </div>

<?php
    require_once ("footer.php");
?>















