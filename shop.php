<?php
    $thisPage = "shop";
    require_once ("header.php");
?>

	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
                <div id="get_brand" class="list-group">
                </div>
				<div id="get_category" class="list-group">
				</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
                <div class="album text-muted">
                    <div class="container">
                        <h1>Products</h1>
                            <div id="get_product" class="row">
                                <!--Here we get product jquery Ajax Request-->
                            </div>
                    </div>
                </div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

<?php
    require_once ("footer.php");
?>
















































