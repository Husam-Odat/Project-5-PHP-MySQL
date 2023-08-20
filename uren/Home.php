<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="ecomm";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

$result = mysqli_query($conn,"SELECT *  from category LIMIT 6");
$result2 = mysqli_query($conn,"SELECT *  from category LIMIT 6");
// $countCategory = mysqli_query($conn,
// "SELECT category.id ,category.category_name , COUNT(product.id) as numCat 
// FROM product 
// JOIN category 
// ON product.category_id = category.id GROUP BY category_id;");


// $categNum = mysqli_query($conn,"SELECT COUNT(id) from product where category=1");
$product = mysqli_query($conn,"SELECT * from `product`");
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
@media (max-width: 1599px){
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
}}
    </style>
</head>


<body class="template-color-1">
<?php
require "nav.php";
?>


    <div class="main-wrapper">



        <div class="uren-slider_area">
            <div style="padding:0; margin:0 !important" class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-slider slider-navigation_style-2">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-01 bg-1">
                                <div class="slider-content">
                                    <span>Register now & get Coupon</span>
                                    <!-- <span>New thinking new possibilities</span> -->
                                    <h3>NEW Coupons</h3>
                                    <!-- <h3>Car interior</h3> -->
                                    <h4>Sale up to<span> 37% </span>off</h4>
                                    <!-- <h4>Starting at <span>$99.00</span></h4> -->
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="loginSIGNup.php">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide animation-style-02 bg-2">
                                <div class="slider-content slider-content-2">
                                    <span class="primary-text_color">Big &amp; Sale on summer accessory</span>
                                    <h3>Sun Shades &amp; Covers</h3>
                                    <!-- <h3>Wheels &amp; Tires</h3> -->
                                    <h4>Sale up to<span> 80% </span>off</h4>
                                    <!-- <h4>Sale up to 37% off</h4> -->
                                    <div class="uren-btn-ps_left slide-btn">
                                        <a class="uren-btn" href="shop-left-sidebar.php?CataId=1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Uren's Shipping Area -->
        <div class="uren-shipping_area">
            <div class="container-fluid">
                <div class="shipping-nav">
                    <div class="row no-gutters">
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-paperplane-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping on all US order</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-help-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>Support 24/7</h6>
                                    <p>Contact us 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-refresh-empty"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>100% Money Back</h6>
                                    <p>You have 37 days to Return</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-undo-outline"></i>
                                </div>
                                <div class="shipping-content">
                                    <h6>90 Days Return</h6>
                                    <p>If goods have problems</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-grid">
                            <div class="shipping-item">
                                <div class="shipping-icon">
                                    <i class="ion-ios-locked-outline"></i>
                                </div>
                                <div class="shipping-content last-child">
                                    <h6>Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        
        <!-- Uren's Shipping Area End Here -->

        <!-- Begin Featured Categories Area -->
        <div id="cata" class="featured-categories_area">
            <div class="container-fluid">
                <div class="section-title_area">
                    <span>Top Featured Collections</span>
                    <h3>Featured Categories</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured-categories_slider uren-slick-slider slider-navigation_style-1" data-slick-options='{
                        "slidesToShow": 4,
                        "spaceBetween": 37,
                        "arrows" : true
                       }' data-slick-responsive='[
                                             {"breakpoint":1599, "settings": {"slidesToShow": 3}},
                                             {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                             {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                         ]'>

                               
                            <!-- <div class="slide-item">
                                                 
                                
                               
                                                
                            <div class="slide-inner">

                              
                          
                                       
                                    <div class="slide-image_area">
                                        <a href="shop-left-sidebar.html">
                                            <img style="" src="assets/images/featured-categories/1.png" alt="Uren's Featured Categories">
                                        </a>
                                    </div>
                                        


                                    <div class="slide-content_area">
                                        <h3><a href="shop-left-sidebar.html"> //echo $row['category_name'];?></a></h3> -->
                                        <!-- <h3><a href="shop-left-sidebar.html">Brakes & Rotors</a></h3> -->
                                        <!-- <span>(8 Products)</span>
                                        <ul class="product-item">
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Accessories</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Auto GPS Units</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Fitness GPS Units</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Handheld GPS Units</a>
                                            </li>
                                        </ul>
                                        <div class="uren-btn-ps_left">
                                            <a class="uren-btn" href="shop-left-sidebar.html">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                </div> -->

                               
                            

                            

                                                <!-- ==================husam=============================-->
                                                        <?php
                                                    $j = 0;
                                                    // mysqli_fetch_array($result ,resulttype) index by num 
                                                    while
                                                    ($rowslider = mysqli_fetch_array($result2)){
                                                        
                                                        ?>
                                                <!-- ========================husam==========================--> 
                            <div class="slide-item">
                                <div class="slide-inner">
                                    <div class="slide-image_area">
                                        <a href="shop-left-sidebar.php?CataId=<?php echo $rowslider['id'];?>">
                                            <img src="../photo/<?php echo $rowslider['category_img'];?>" alt="Uren's Featured Categories">
                                        </a>
                                    </div>
                                    <div class="slide-content_area">
                                        <h3><a href="shop-left-sidebar.php?CataId=<?php echo $rowslider['id'];?>"><?php echo $rowslider['category_name'];?></a></h3>
                                        <p><?php echo $rowslider['category_des'];?></p>
                                        <!-- <span>(5 Products)</span> -->
                                        <!-- <ul class="product-item">
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Dash Kits</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Floor Mats</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Seat Covers</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar.html"><i class="fa fa-arrow-right"></i> Steering Wheels</a>
                                            </li>
                                        </ul> -->
                                        <div class="uren-btn-ps_left">
                                            <a class="uren-btn" href="shop-left-sidebar.php?CataId=<?php echo $rowslider['id']; ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                             <!-- ================husam==========================-->

                             <?php
                                    $j++;
                                    }
                                    ?>
                                    <!-- ================husam==========================-->
                            
                            
                                                     
                        
                    </div>
                  
                </div>
            </div>
            
        
        <!-- Featured Categories Area End Here -->

        <!-- Begin Uren's Banner Area -->
        <div class="uren-banner_area ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1"></div>
                            <div class="banner-content">
                                <span class="offer">Get 37% off your order</span>
                                <h4>Car and Truck</h4>
                                <h3>Mercedes Benz</h3>
                                <p>Explore and immerse in exciting 337 content with
                                    Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.php?CataId=1">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-item img-hover_effect">
                            <div class="banner-img-1 banner-img-2"> </div>
                            <div class="banner-content">
                                <span class="offer">Save $120 when you buy</span>
                                <h4>Rotiform SFO </h4>
                                <h3>Custom Forged</h3>
                                <p>Explore and immerse in exciting 337 content with
                                    Fulldive’s all-in-one virtual reality platform</p>
                                <div class="uren-btn-ps_left">
                                    <a class="uren-btn" href="shop-left-sidebar.php?CataId=1">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Banner Area End Here -->

        <!-- Begin Uren's Banner Two Area -->
        <!-- <div class="uren-banner_area uren-banner_area-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/1-3.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/1-4.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-item img-hover_effect">
                            <a href="shop-left-sidebar.html">
                                <img class="img-full" src="assets/images/banner/1-5.jpg" alt="Uren's Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Uren's Banner Two Area End Here -->

        <!-- Begin Uren's Product Area -->
        <div id="new" class="uren-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Top New On This Week</span>
                            <h3>New Arrivals Products</h3>
                        </div>
                        <div class="product-slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 6,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                                                {"breakpoint":1200, "settings": {"slidesToShow": 3}},
                                                {"breakpoint":992, "settings": {"slidesToShow": 2}},
                                                {"breakpoint":767, "settings": {"slidesToShow": 1}},
                                                {"breakpoint":480, "settings": {"slidesToShow": 1}}
                                            ]'>
                            <!-- <div class="product-slide_item">
                                <div class="inner-slide">
                                    
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker">
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>


                                        
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6><a class="product-name" href="single-product.html">// echo $prod['product_name'];?></a></h6>
                                                <div class="price-box">
                                                    <span class="new-price"// echo $prod['product_price'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- ================husam==========================-->

                            
                            <!-- ================husam==========================-->
                            <?php
                                                    
                            // mysqli_fetch_array($result ,resulttype) index by num 
                            $i=0;
                            while
                            ($prod = mysqli_fetch_array($product) ){
                            
                                if ($i<10){                         
                            ?>

                            

                            <div class="product-slide_item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product-tab-style-left.php?productId=<?php echo $prod ['id'];?>">
                                                <img class="primary-img" src="../photo/<?php echo $prod['product_img1'];?>" alt="Uren's Product Image">
                                                <img class="secondary-img" src="../photo/<?php echo $prod['product_img2'];?>" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-10%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li><a class="uren-add_cart" href="single-product-tab-style-left.php?productId=<?php echo $prod ['id'];?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                    <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    </li>
                                                    <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                    </li>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="rating-box">
                                                    <!-- <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul> -->
                                                </div>
                                                <h6><a class="product-name" href="single-product-tab-style-left.php?productId=<?php echo $prod ['id'];?>"><?php echo $prod['product_name'];?></a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2"><?php echo $prod['product_price']*0.9;?></span>
                                                    <span class="old-price"><?php echo $prod['product_price'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            }
                              $i++;
                            }
                            ?>

                           

                            <!-- ***************************** -->

                            <!-- ***************************** -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Product Area End Here -->

        <!-- Begin Special Product Area -->
        <!-- <div class="special-product_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title_area">
                            <span>Special Offer Limited Time</span>
                            <h3>Deal Of The Day</h3>
                        </div>
                        <div class="special-product_slider uren-slick-slider slider-navigation_style-1 img-hover-effect_area" data-slick-options='{
                        "slidesToShow": 2,
                        "arrows" : true
                        }' data-slick-responsive='[
                                                {"breakpoint":768, "settings": {"slidesToShow": 1}}
                                            ]'>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/4-1.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-33%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="uren-countdown_area">
                                                    <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                    <div class="countdown-wrap">
                                                        <div class="countdown item-4" data-countdown="2020/10/01" data-format="short">
                                                            <div class="countdown__item">
                                                                <span class="countdown__time daysLeft"></span>
                                                                <span class="countdown__text daysText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time hoursLeft"></span>
                                                                <span class="countdown__text hoursText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time minsLeft"></span>
                                                                <span class="countdown__text minsText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time secsLeft"></span>
                                                                <span class="countdown__text secsText"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6 class="product-name"><a href="single-product.html">Veniam officiis voluptates</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$98.00</span>
                                                    <span class="old-price">$146.00</span>
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                        </li>
                                                        <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/4-2.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/5-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-10%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="uren-countdown_area">
                                                    <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                    <div class="countdown-wrap">
                                                        <div class="countdown item-4" data-countdown="2020/09/01" data-format="short">
                                                            <div class="countdown__item">
                                                                <span class="countdown__time daysLeft"></span>
                                                                <span class="countdown__text daysText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time hoursLeft"></span>
                                                                <span class="countdown__text hoursText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time minsLeft"></span>
                                                                <span class="countdown__text minsText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time secsLeft"></span>
                                                                <span class="countdown__text secsText"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6 class="product-name"><a href="single-product.html">Accusantium corporis odio</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$110.00</span>
                                                    <span class="old-price">$122.00</span>
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                        </li>
                                                        <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="inner-slide">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img" src="assets/images/product/medium-size/6-1.jpg" alt="Uren's Product Image">
                                                <img class="secondary-img" src="assets/images/product/medium-size/6-2.jpg" alt="Uren's Product Image">
                                            </a>
                                            <div class="sticker-area-2">
                                                <span class="sticker-2">-15%</span>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="uren-countdown_area">
                                                    <span class="product-offer">Hurry up!  Offer ends in:</span>
                                                    <div class="countdown-wrap">
                                                        <div class="countdown item-4" data-countdown="2020/08/01" data-format="short">
                                                            <div class="countdown__item">
                                                                <span class="countdown__time daysLeft"></span>
                                                                <span class="countdown__text daysText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time hoursLeft"></span>
                                                                <span class="countdown__text hoursText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time minsLeft"></span>
                                                                <span class="countdown__text minsText"></span>
                                                            </div>
                                                            <div class="countdown__item">
                                                                <span class="countdown__time secsLeft"></span>
                                                                <span class="countdown__text secsText"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <h6 class="product-name"><a href="single-product.html">Accusantium corporis odio</a></h6>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$95.00</span>
                                                    <span class="old-price">$120.00</span>
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="cart.html" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                                class="ion-bag"></i>Add To Cart</a>
                                                        </li>
                                                        <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                        </li>
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Special Product Area End Here -->

        <!-- Begin Uren's Banner Three Area -->
        <div class="uren-banner_area uren-banner_area-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="banner-item img-hover_effect">
                            <div style="margin-bottom:100px;" class="banner-img"></div>
                            <div class="banner-content">
                                <span class="contact-info"><i class="ion-android-call"></i> +962789776587</span>
                                <h4>Anytime & Anywhere </h4>
                                <h3>You are.</h3>
                                <p>We can manege your car any time any where</p>
                                <a href="javascript:void(0)" class="read-more">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <?php
    require "footer.php";
    ?>
    <!-- JS
============================================ -->

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