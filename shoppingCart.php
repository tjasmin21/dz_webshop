<?php
require_once("config.php");

if (isset($_POST["brand"])) {
    $brand_query = "SELECT * FROM brands";
    $run_query = mysqli_query($mysqli, $brand_query);
    echo "
		<a href='#' class='list-group-item list-group-item-action disabled'><h4>Brands</h4></a>
	";
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $bid = $row["brand_id"];
            $brand_name = $row["brand_title"];
            echo "
				<a href='#' class='selectBrand list-group-item list-group-item-action' bid='$bid'>$brand_name</a>
			";
        }
    }
}

if (isset($_POST["category"])) {
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($mysqli, $category_query) or die(mysqli_error($mysqli));
    echo "
			<a href='#' class='list-group-item list-group-item-action disabled'><h4>Categories</h4></a>
	";
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $cid = $row["cat_id"];
            $cat_name = $row["cat_title"];
            echo "

				<a href='#' class='category list-group-item list-group-item-action' cid='$cid'>$cat_name</a>
			";
        }
        echo "
		        <a href='#' id='resetLink' class='category list-group-item list-group-item-action active' cid='0'>Reset filter</a>
			";
    }
}

if (isset($_POST["page"])) {
    $sql = "SELECT * FROM products";
    $run_query = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count / 9);
    for ($i = 1; $i <= $pageno; $i++) {
        echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
    }
}
if (isset($_POST["getProduct"])) {
    $product_query = "SELECT * FROM products";
    $run_query = mysqli_query($mysqli, $product_query);
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $pro_id = $row['product_id'];
            $pro_cat = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_desc = $row['product_desc'];

            if($pro_price == 0){
                $pro_price = "Preis auf Anfrage";
            }else{
                $pro_price = $pro_price."00 CHF/per hour";
            }
            $pro_image = $row['product_image'];
            echo "
				<div class='card' style='width: 18rem;'>
				    <div class='card-body'>
                        <h5 class='card-title'>$pro_title</h5>
                        <h6 class='card-subtitle mb-2 text-primary' >$pro_price</h6>
                        <p class='card-text'>$pro_desc</p>
                        <button pid='$pro_id' style='float:right;' id='product' class='btn btn-primary'>AddToCart</button>
                    </div>
                </div>	
			";
        }
    }
}
if (isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])) {
    if (isset($_POST["get_seleted_Category"])) {
        $id = $_POST["cat_id"];
        if ($id == 0) {
            //id == 0: Reset selection
            $sql = "SELECT * FROM products";
        } else {
            $sql = "SELECT * FROM products WHERE product_cat = '$id'";
        }
    } else if (isset($_POST["selectBrand"])) {
        $id = $_POST["brand_id"];
        $sql = "SELECT * FROM products WHERE product_brand = '$id'";
    } else {
        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$keyword%'";
    }

    $run_query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $pro_id = $row['product_id'];
        $pro_cat = $row['product_cat'];
        $pro_brand = $row['product_brand'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_desc = $row['product_desc'];

        if($pro_price == 0){
            $pro_price = "Preis auf Anfrage";
        }else{
            $pro_price = $pro_price."00 CHF/per hour";
        }
        $pro_image = $row['product_image'];
        $pro_desc = $row['product_desc'];
        echo "
				<div class='card' style='width: 18rem;'>
				    <div class='card-body'>
                        <h5 class='card-title'>$pro_title</h5>
                        <h6 class='card-subtitle mb-2 text-primary' >$pro_price</h6>
                        <p class='card-text'>$pro_desc</p>
                        <button pid='$pro_id' style='float:right;' id='product' class='btn btn-primary'>AddToCart</button>
                    </div>
                </div>	
			";
    }
}

if (isset($_POST["addToProduct"])) {

    if (isset($_SESSION["uid"])) {
        $p_id = $_POST["proId"];
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
        $run_query = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($run_query);
        if ($count > 0) {
            echo "
			<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is already added into the cart Continue Shopping..!</b>
			</div>
		";
        } else {
            $sql = "SELECT * FROM products WHERE product_id = '$p_id'";
            $run_query = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_array($run_query);
            $id = $row["product_id"];
            $pro_name = $row["product_title"];
            $pro_image = $row["product_image"];
            $pro_price = $row["product_price"];
            $sql = "INSERT INTO `cart` 
		(`id`, `p_id`, `ip_add`, `user_id`, `product_title`,
		`product_image`, `qty`, `price`, `total_amt`)
		VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', 
		'$pro_image', '1', '$pro_price', '$pro_price')";
            if (mysqli_query($mysqli, $sql)) {
                echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added..!</b>
				</div>
			";
            }
        }
    } else {
        echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Sorry..!go and Sign Up First then you can add a product to your cart</b>
				</div>
			";
    }
}

if (isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])) {
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
        $no = 1;
        $total_amt = 0;
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row["id"];
            $pro_id = $row["p_id"];
            $pro_name = $row["product_title"];
            $pro_image = $row["product_image"];
            $qty = $row["qty"];
            $pro_price = $row["price"];
            $total = $row["total_amt"];
            $price_array = array($total);
            $total_sum = array_sum($price_array);
            $total_amt = $total_amt + $total_sum;
            setcookie("ta", $total_amt, strtotime("+1 day"), "/", "", "", TRUE);
            if (isset($_POST["get_cart_product"])) {
                echo "
				 <tr>
					<td>$no</td>
					<td><img src='img/content/$pro_image' width='60px' height='50px'></td>
					<td>$pro_name</td>
					<td>$pro_price.00 CHF/per hour </td>
				 </tr>
			";
                $no = $no + 1;
            } else {
                echo "
					<tr>
					    <td>
                            <div class='btn-group' role='group'>
                                <a href='#' remove_id='$pro_id' class='btn btn-danger btn-xs remove'><span class='glyphicon glyphicon-trash'></span></a>
                                <a href='#' update_id='$pro_id' class='btn btn-primary btn-xs update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                            </div>
                        </td>
                        <td>$pro_name</td>
                        <td><input type='number' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' min='1'></td>
                        <td><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></td>
                        <td><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></td>
					</tr>
				";
            }

        }
        if (isset($_POST["cart_checkout"])) {
            echo "<div class='row'>
					<div class='col-md-8'></div>
					<div class='col-md-4'>
						<h1>Total: $total_amt CHF</h1>
					</div>";
        }

        echo "
            <div class='col-md-12'>
                <input  onclick='location.href=\"shippingForm.php\"' style='float:right;' value=" . lang("CHECKOUT") . " type='button' id='checkout' name='checkout' class='btn btn-success btn-lg'>
            </div>
        ";

//		echo '
//			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
//				  <input type="hidden" name="cmd" value="_cart">
//				  <input type="hidden" name="business" value="shoppingcart@dropzone.com">
//				  <input type="hidden" name="upload" value="1">';
//
//				  $x=0;
//				  $uid = $_SESSION["uid"];
//				  $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
//				  $run_query = mysqli_query($mysqli,$sql);
//				  while($row=mysqli_fetch_array($run_query)){
//					  $x++;
//					 echo  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
//					  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
//					  <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
//					  <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
//				  }
//
//				echo   '
//				<input type="hidden" name="return" value="http://www.sysc.esy.es/shoppingCart/payment_success.php"/>
//				<input type="hidden" name="cancel_return" value="http://www.sysc.esy.es/shoppingCart/cancel.php"/>
//				<input type="hidden" name="currency_code" value="CHF"/>
//				<input type="hidden" name="custom" value="'.$uid.'"/>
//				<input style="float:right;margin-right:80px;" type="image" name="submit"
//					src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
//					alt="PayPal - The safer, easier way to pay online">
//			</form>';


    }
}

if (isset($_POST["cart_count"]) AND isset($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($mysqli, $sql);
    echo mysqli_num_rows($run_query);
}
if (isset($_POST["removeFromCart"])) {
    $pid = $_POST["removeId"];
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
    $run_query = mysqli_query($mysqli, $sql);
    if ($run_query) {
        echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product is Removed from Cart Continue Shopping..!</b>
			</div>
		";
    }
}
if (isset($_POST["removeAllFromCart"])) {
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id = '$uid'";
    $run_query = mysqli_query($mysqli, $sql);
}

if (isset($_POST["updateProduct"])) {
    $uid = $_SESSION["uid"];
    $pid = $_POST["updateId"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $total = $_POST["total"];

    $sql = "UPDATE cart SET qty = '$qty',price='$price',total_amt='$total' 
	WHERE user_id = '$uid' AND p_id='$pid'";
    $run_query = mysqli_query($mysqli, $sql);
    if ($run_query) {
        echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product is Updated Continue Shopping..!</b>
			</div>
		";
    }
}

?>






























