<!-- The navigation-pane on the left side -->

<!--
Default navigation: Home, Products, Search, Cart
-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href='index.php'><img src="img/layout/logoDZ.png" class="dzlogo" alt="Home"> </a>
            <!-- <a href='index.php' class='navbar-brand'>dropZone-Production</a>-->

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a <?php if ($thisPage == "index") {
                        echo " id='currentLink'";
                    } ?>
                            class="nav-link" href='index.php'><span></span> Home</a></li>

                <li class="nav-item"><a <?php if ($thisPage == "shop") {
                        echo " id='currentLink'";
                    } ?>
                            class="nav-link" href='shop.php'><span class='fa fa-window-maximize'></span> Shop</a>
                </li>

                <?php echo "
                <li>
                    <input type='text' class='form-control mr-sm-2' id='search' placeholder=".lang('SEARCH_BUTTON').">
                </li>
                <li>
                    <button class='btn btn-primary my-2 my-sm-0' id='search_btn'>
                        ".lang('SEARCH_BUTTON')."
                    </button>
                </li>
            </ul>
            "?>
            <ul class="navbar-nav mobile top-nav-right">
                <?php

                if (!isUserLoggedIn()) {
                    /**
                     * Navigation for guest (not logged in): + SignIn, SignUp
                     */


                    echo "
                        <li class='nav-item'><a ";
                    if ($thisPage == "signin") {
                        echo " id='currentLink'";
                    }
                    echo "
                       class='nav-link' href='customer_login.php'><span class='fa fa-user'> &nbsp;</span>".lang('NAV_SIGN_IN')."</a></li>
                        
                        <li class='nav-item'><a ";
                    if ($thisPage == "signup") {
                        echo " id='currentLink'";
                    }
                    echo "class='nav-link' href='customer_registration.php'><span class='fa fa-user'> &nbsp;</span>".lang('NAV_SIGN_UP')."</a></li> ";
                } else {
                    /**
                     * Navigation for user (logged in): + SignIn, SignUp
                     */
                    echo "
                        <li class='nav-item'><a ";
                    if ($thisPage == "cart") {
                        echo " id='currentLink'";
                    }
                    echo "  class='nav-link' href='cart.php'><span class='fa fa-shopping-cart'></span>	&nbsp;".lang('NAV_CART')."<span class='badge'>  0</span></a></li>
                        <li class='nav-item dropdown'>
                            <a ";
                    if ($thisPage == "usermenu") {
                        echo " id='currentLink'";
                    }
                    echo "href='#' class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='fa fa-user'></span> &nbsp;Hi, " . $_SESSION['name'] . "</a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <a href='user_settings.php' class='dropdown-item'>".lang('NAV_CH_PW')."</a>
                                <a href='email_settings.php' class='dropdown-item'>".lang('NAV_CH_MAIL')."</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='logout.php' style='text-decoration:none; color:blue;'>Logout</a>
                                </ul>
                            </div>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

