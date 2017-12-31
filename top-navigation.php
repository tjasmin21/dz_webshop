<!-- The navigation-pane on the left side -->

    <!--
    Default navigation: Home, Products, Search, Cart
    -->

    <div class='navbar navbar-inverse navbar-fixed-top'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#collapse' aria-expanded='false'>
                    <span class='sr-only'>navigation</span>
                </button>

                <a href='index.php'> <img src="img/layout/logoDZ.png" alt="Home" style="width:42px;height:42px;"> </a>
                <!-- <a href='index.php' class='navbar-brand'>dropZone-Production</a>-->

            </div>
            <div class='collapse navbar-collapse' id='collapse'>
                <ul class='nav navbar-nav'>
                    <li><a <?php if ($thisPage == "index"){echo " id='currentLink'";} ?>
                                href='index.php'><span class='glyphicon glyphicon-home'></span>   Home</a></li>

                    <li><a <?php if ($thisPage == "shop"){echo " id='currentLink'";} ?>
                                href='shop.php'><span class='glyphicon glyphicon-modal-window'></span>   Shop</a></li>

                    <li style='width:300px;left:10px;top:10px;'><input type='text' class='form-control' id='search'></li>
                    <li style='top:10px;left:20px;'><button class='btn btn-primary' id='search_btn'>Search</button></li>
                </ul>
                <ul class='nav navbar-nav navbar-right'>
<!--                    <li><a href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span>   Cart</a></li>-->
<!--                    <li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-shopping-cart'></span>   Cart   <span class='badge'>  0</span></a>-->
<!--                        <div class='dropdown-menu' style='width:400px;'>-->
<!--                            <div class='panel panel-success'>-->
<!--                                <div class='panel-heading'>-->
<!--                                    <div class='row'>-->
<!--                                        <div class='col-md-3'>Sl.No</div>-->
<!--                                        <div class='col-md-3'>Product Image</div>-->
<!--                                        <div class='col-md-3'>Product Name</div>-->
<!--                                        <div class='col-md-3'>Price in $.</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class='panel-body'></div>-->
<!--                                <div class='panel-footer'></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->

<?php

    if ( !isUserLoggedIn() ) {
        /**
         * Navigation for guest (not logged in): + SignIn, SignUp
         */


//                        <li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span>SignIn</a>
//                            <ul class='dropdown-menu'>
//                                <div style='width:300px;'>
//                                    <div class='panel panel-primary'>
//                                        <div class='panel-heading'>Login</div>
//                                        <div class='panel-heading'>
//                                            <label for='username'>Username</label>
//                                            <input type='text' class='form-control' id='username' required/>
//                                            <label for='password'>Password</label>
//                                            <input type='password' class='form-control' id='password' required/>
//                                            <p><br/></p>
//                                            <a href='forgot-password.php' style='color:white; list-style:none;'>".lang("FORGOT_PASSWORD")."</a>
//                                            <input type='submit' class='btn btn-success' style='float:right;' id='login_button' name='login_button' value='Login' >
//                                        </div>
//                                    </div>
//                                </div>
//                            </ul>
//                        </li>


       echo "
                        <li><a ";  if ($thisPage == "signin"){echo " id='currentLink'";}
                     echo "
                        href='customer_login.php'><span class='glyphicon glyphicon-user'></span>SignIn</a></li>
                        
                        <li><a ";  if ($thisPage == "signup"){echo " id='currentLink'";}
                     echo "href='customer_registration.php'><span class='glyphicon glyphicon-user'></span>SignUp</a></li> ";
    }
    else {
        /**
         * Navigation for user (logged in): + SignIn, SignUp
         */
        echo "
                        <li><a ";  if ($thisPage == "cart"){echo " id='currentLink'";}
                     echo "href='cart.php'><span class='glyphicon glyphicon-shopping-cart'></span>   Cart <span class='badge'>  0</span></a></li>
                      
                        <li><a ";  if ($thisPage == "usermenu"){echo " id='currentLink'";}
                     echo "href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span> Hi," .$_SESSION['name'] . "</a>
                            <ul class='dropdown-menu'>
                                <li><a href='user_settings.php' style='text-decoration:none; color:blue;'>Change Password</a></li>
                                <li class='divider'></li>
                                 <li><a href='email_settings.php' style='text-decoration:none; color:blue;'>Change E-Mail</a></li>
                                <li class='divider'></li>
                                <li><a href='logout.php' style='text-decoration:none; color:blue;'>Logout</a></li>
                            </ul>
                        </li>";
    }
?>
                </ul>
            </div>
        </div>
    </div>

