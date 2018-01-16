<?php
$thisPage = "shop";
require_once("header.php");
?>

<div class="row row-header shop-image-row shopimage ">
    <div class="content">
        <div class="row-title">
            Shop
        </div>
    </div>
</div>

<!--	<div class="container-fluid">-->
<div class="row">
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div id="get_brand" class="list-group">
                </div>
                <div id="get_category" class="list-group">
                </div>
            </div>
            <div class="col-md-8">
                <div class="row"
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>
                <div class="album text-muted">
                    <div class="container">
                        <h1>Products</h1>
                        <div id="get_product" class="row products">
                            <!--Here we get product jquery Ajax Request-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require_once("footer.php");
?>
















































