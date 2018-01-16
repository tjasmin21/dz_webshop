<?php
$thisPage = "cart";
require_once ("header.php");
?>

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
        <h1>Cart Checkout</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity in hour</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Price in CHF</th>
                </tr>
            </thead>
            <tbody id="cart_checkout"></tbody>
        </table>
        <div class="col-md-2"></div>
    </div>

<?php
    require_once ("footer.php");
?>















