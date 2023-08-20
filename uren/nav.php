<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT *  from category LIMIT 6");
$result2 = mysqli_query($conn, "SELECT *  from category LIMIT 6");

if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
    $userlogin = mysqli_query ($conn,"SELECT *  from user where id = $userid ");
    $user =  mysqli_fetch_array($userlogin , MYSQLI_ASSOC);
}
// $countCategory = mysqli_query($conn,
// "SELECT category.id ,category.category_name , COUNT(product.id) as numCat 
// FROM product 
// JOIN category 
// ON product.category_id = category.id GROUP BY category_id;");


// $categNum = mysqli_query($conn,"SELECT COUNT(id) from product where category=1");
$product = mysqli_query($conn, "SELECT * from `product`");
?>


<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uren - Car Accessories Shop HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="assets/css/vendor/ion-fonts.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from the above) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

    <style>
        .header-main_area .custom-search_col {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 37%;
            -ms-flex: 0 0 37%;
            flex: 0 0 37%;
            max-width: 37%;
        }

        /* #nav{
    margin-bottom: 20px;
} */

        @media (max-width: 1599px) {
            .header-main_area .custom-search_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 37%;
                -ms-flex: 0 0 37%;
                flex: 0 0 37%;
                max-width: 37%;
                -webkit-box-ordinal-group: 3;
                -webkit-order: 1;
                -ms-flex-order: 1;
                order: 1;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .header-main_area .custom-search_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 37%;
                -ms-flex: 0 0 37%;
                flex: 0 0 37%;
                max-width: 37%;
            }
        }

        @media (max-width: 991px) {
            .header-main_area .custom-search_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 37%;
                -ms-flex: 0 0 37%;
                flex: 0 0 37%;
                max-width: 37%;
            }
        }

        @media (max-width: 767px) {
            .header-main_area .custom-search_col {
                display: none;
            }
        }

        .header-main_area .custom-cart_col {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 20%;
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%;
        }

        @media (max-width: 1599px) {
            .header-main_area .custom-cart_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 20%;
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
                -webkit-box-ordinal-group: 2;
                -webkit-order: 1;
                -ms-flex-order: 1;
                order: 1;
            }
        }

        @media (max-width: 991px) {
            .header-main_area .custom-cart_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 20%;
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
                padding-bottom: 37px;
            }
        }

        @media (max-width: 767px) {
            .header-main_area .custom-cart_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 20%;
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        @media (max-width: 479px) {
            .header-main_area .custom-cart_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 100%;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }


        }

        @media (max-width: 1599px) {
            .header-main_area .custom-logo_col {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 37%;
                -ms-flex: 0 0 37%;
                flex: 0 0 37%;
                max-width: 37%;
                -webkit-box-ordinal-group: 2;
                -webkit-order: 1;
                -ms-flex-order: 1;
                order: 1;
            }
        }
    </style>
</head>

<body class="template-color-1">



    <div class="main-wrapper">

        <!-- Begin Uren's Newsletter Popup Area -->
        <!-- <div class="popup_wrapper ">
            <div class="test">
                <span class="popup_off"><i class="ion-android-close"></i></span>
                <div class="subscribe_area">
                    <h2>Sign Up Newsletter</h2>
                    <p>Subscribe to the our store mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form class="subscribe-form" action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Newsletter Popup Area Here -->

        <!-- Begin Uren's Header Main Area -->
        <header class="header-main_area bg--sapphire">
            <div class="header-top_area d-lg-block d-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="Home.php">Home</a>
                                            <!-- <ul class="hm-dropdown">
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li><a href="index-3.html">Home Three</a></li>
                                            </ul> -->
                                        </li>
                                        <li class="megamenu-holder "><a href="shop-left-sidebar.php?CataId=1">All Products</a>


                                        </li>

                                        <li class=""><a href="about-us.php">About Us</a></li>
                                        <li class=""><a href="contact.php">Contact</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4">
                            <div class="ht-right_area">
                                <div class="ht-menu">
                                    <ul>
                                        <?php
                                        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin']='no') {
                                        ?>
                                            <li><a href="my-account.html">My Account<i class="fa fa-chevron-down"></i></a>
                                                <ul class="ht-dropdown ht-my_account">
                                                    <li><a href="javascript:void(0)">Register</a></li>
                                                    <li class="active"><a href="javascript:void(0)">Login</a></li>
                                                </ul>
                                            </li>

                                        <?php
                                        } else {

                                        ?>
                                            <li>


                                                <?php echo 'Welcome to UREN'; ?>
                                                <BR>
                                                <?php echo $user['first_name'] . " " . $user['last_name']; ?>


                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                    </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top_area header-sticky bg--sapphire">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 d-lg-block d-none">
                            <div class="main-menu_area position-relative">
                                <nav class="main-nav">
                                    <ul>
                                        <li class="dropdown-holder active"><a href="Home.php">Home</a>

                                        </li>
                                        <li class="megamenu-holder "><a href="shop-left-sidebar.php?CataId=1">all Products</a>

                                        </li>


                                        <li class=""><a href="about-us.php">About Us</a></li>
                                        <li class=""><a href="contact.php">Contact</a></li>
                                        <!-- <li class=""><a href="blog-left-sidebar.html">Blog <i
                                                class="ion-ios-arrow-down"></i></a>
                                            <ul class="hm-dropdown">
                                                <li><a href="blog-left-sidebar.html">Grid View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-2-column.html">Column Two</a></li>
                                                        <li><a href="blog-3-column.html">Column Three</a></li>
                                                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-list-left-sidebar.html">List View</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-list-fullwidth.html">List Fullwidth</a></li>
                                                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-list-right-sidebar.html">List Right
                                                                Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-details-left-sidebar.html">Blog Details</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                        </li>
                                                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="blog-gallery-format.html">Blog Format</a>
                                                    <ul class="hm-dropdown hm-sub_dropdown">
                                                        <li><a href="blog-gallery-format.html">Gallery Format</a></li>
                                                        <li><a href="blog-audio-format.html">Audio Format</a></li>
                                                        <li><a href="blog-video-format.html">Video Format</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-3 d-block d-lg-none">
                            <div class="header-logo_area header-sticky_logo">
                                <a href="index.html">
                                    <img src="assets/images/menu/logo/1.png" alt="Uren's Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-sm-9">
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex ">
                                        <!-- d-lg-none -->
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="cart.php" class="minicart-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count">3</span>
                                                <i class="ion-bag"></i>
                                            </div>

                                        </a>
                                    </li>
                                    <!-- <li class="contact-us_wrap">
                                        <a href="tel://+123123321337"><i class="ion-android-call"></i>+123 321 337</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav" class="header-middle_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="custom-logo_col col-2">
                            <!-- col-12 -->
                            <div class="header-logo_area">
                                <a href="index.html">
                                    <img src="assets/images/menu/logo/1.png" alt="Uren's Logo">
                                </a>
                            </div>
                        </div>

                        <div class="custom-search_col col-6">
                            <!-- col-12 -->

                        </div>
                        <div class="custom-cart_col col-2">
                            <!-- col-12 -->
                            <div class="header-right_area">
                                <ul>
                                    <li class="mobile-menu_wrap d-flex ">
                                        <!-- d-lg-none -->
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-navicon"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="cart.php" class="minicart-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count">3</span>
                                                <i class="ion-bag"></i>
                                            </div>

                                        </a>
                                    </li>

                                    <!-- ==removed================================================ -->
                                    <!-- <li class="contact-us_wrap" style="display: none;">
                                        <a href="tel://+123123321337"><i class="ion-android-call"></i>+123 321 337</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="offcanvas-menu-inner">
                    <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4>Shopping Cart</h4>
                        </div>
                        <ul class="minicart-list">
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/1.jpg" alt="Uren's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.html">Autem ipsa ad</a>
                                    <span class="product-item_quantity">1 x $137.80</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/2.jpg" alt="Uren's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.html">Tenetur illum amet</a>
                                    <span class="product-item_quantity">1 x $150.80</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                    <img src="assets/images/product/small-size/3.jpg" alt="Uren's Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.html">Non doloremque placeat</a>
                                    <span class="product-item_quantity">1 x $165.80</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">$462.4‬0</span>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="cart.html" class="uren-btn uren-btn_dark uren-btn_fullwidth">Minicart</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="checkout.html" class="uren-btn uren-btn_dark uren-btn_fullwidth">Checkout</a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_search">
                            <form action="#" class="inner-searchbox">
                                <input type="text" placeholder="Search for item...">
                                <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="index.html"><span class="mm-text">Home</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.html">
                                                <span class="mm-text">Home One</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">
                                                <span class="mm-text">Home Two</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index-3.html">
                                                <span class="mm-text">Home Three</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-left-sidebar.html">
                                        <span class="mm-text">Shop</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="shop-left-sidebar.html">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-grid-fullwidth.html">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-4-column.html">
                                                        <span class="mm-text">Column Four</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="shop-list-left-sidebar.html">
                                                <span class="mm-text">Shop List</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="shop-list-fullwidth.html">
                                                        <span class="mm-text">Full Width</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="single-product-gallery-left.html">
                                                <span class="mm-text">Single Product Style</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product-gallery-left.html">
                                                        <span class="mm-text">Gallery Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-gallery-right.html">
                                                        <span class="mm-text">Gallery Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-left.html">
                                                        <span class="mm-text">Tab Style Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-tab-style-right.html">
                                                        <span class="mm-text">Tab Style Right</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-left.html">
                                                        <span class="mm-text">Sticky Left</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sticky-right.html">
                                                        <span class="mm-text">Sticky Right</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="single-product.html">
                                                <span class="mm-text">Single Product Type</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="single-product.html">
                                                        <span class="mm-text">Single Product</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-sale.html">
                                                        <span class="mm-text">Single Product Sale</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-group.html">
                                                        <span class="mm-text">Single Product Group</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-variable.html">
                                                        <span class="mm-text">Single Product Variable</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-affiliate.html">
                                                        <span class="mm-text">Single Product Affiliate</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="single-product-slider.html">
                                                        <span class="mm-text">Single Product Slider</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog-left-sidebar.html">
                                        <span class="mm-text">Blog</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-left-sidebar.html">
                                                <span class="mm-text">Grid View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-2-column.html">
                                                        <span class="mm-text">Column Two</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-column.html">
                                                        <span class="mm-text">Column Three</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-list-left-sidebar.html">
                                                <span class="mm-text">List View</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-list-fullwidth.html">
                                                        <span class="mm-text">List Fullwidth</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-left-sidebar.html">
                                                        <span class="mm-text">List Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-list-right-sidebar.html">
                                                        <span class="mm-text">List Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-details-left-sidebar.html">
                                                <span class="mm-text">Blog Details</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-details-left-sidebar.html">
                                                        <span class="mm-text">Left Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-details-right-sidebar.html">
                                                        <span class="mm-text">Right Sidebar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children has-children">
                                            <a href="blog-gallery-format.html">
                                                <span class="mm-text">Blog Format</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="blog-gallery-format.html">
                                                        <span class="mm-text">Gallery Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-audio-format.html">
                                                        <span class="mm-text">Audio Format</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="blog-video-format.html">
                                                        <span class="mm-text">Video Format</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.html">
                                        <span class="mm-text">Pages</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.html">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-register.html">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">
                                                <span class="mm-text">Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="mm-text">Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">
                                                <span class="mm-text">Checkout</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="compare.html">
                                                <span class="mm-text">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.html">
                                                <span class="mm-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="374.html">
                                                <span class="mm-text">Error 374</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="javascript:void(0)"><span class="mm-text">User
                                            Setting</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.html">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-register.html">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="javascript:void(0)"><span class="mm-text">Currency</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">EUR €</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">USD $</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="javascript:void(0)"><span class="mm-text">Language</span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Romanian</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="mm-text">Japanese</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========================== -->
        <!-- ========================== -->
        <!-- <img src="./assets/images/pexels-pixabay-235986.jpg" alt="" srcset=""> -->
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Popular Search Area -->
        <!-- <div class="popular-search_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="popular-search">
                            <label>Popular Search:</label>
                            <a href="javascript:void(0)">Brakes & Rotors,</a>
                            <a href="javascript:void(0)">Lighting,</a>
                            <a href="javascript:void(0)">Perfomance,</a>
                            <a href="javascript:void(0)">Wheels & Tires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Popular Search Area End Here -->

        <!-- jQuery JS -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Modernizer JS -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Popper JS -->
        <script src="assets/js/vendor/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <!-- Slick Slider JS -->
        <script src="assets/js/plugins/slick.min.js"></script>
        <!-- Barrating JS -->
        <script src="assets/js/plugins/jquery.barrating.min.js"></script>
        <!-- Counterup JS -->
        <script src="assets/js/plugins/jquery.counterup.js"></script>
        <!-- Nice Select JS -->
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <!-- Sticky Sidebar JS -->
        <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
        <!-- Jquery-ui JS -->
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
        <!-- Lightgallery JS -->
        <script src="assets/js/plugins/lightgallery.min.js"></script>
        <!-- Scroll Top JS -->
        <script src="assets/js/plugins/scroll-top.js"></script>
        <!-- Theia Sticky Sidebar JS -->
        <script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
        <!-- Waypoints JS -->
        <script src="assets/js/plugins/waypoints.min.js"></script>
        <!-- jQuery Zoom JS -->
        <script src="assets/js/plugins/jquery.zoom.min.js"></script>

        <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
        <!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>


</body>

</html>