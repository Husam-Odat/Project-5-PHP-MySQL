<?php
require_once "./db/conn.php";
//global $CataId = $GET['CataId'];
session_start(); 



// $products = $crudObj->getAllProductsInCatagory($_GET['CataId']);
 $catagoies = $crudObj->getAllCatagory();
 $brands = $crudObj->getAllBrand();

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

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <!-- Begin Uren's Header Main Area -->
        <?php
        require "nav.php";
        ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Shop</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Shop Left Sidebar Area -->
        <div class="shop-content_wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-5 order-2 order-lg-1 order-md-1">
                        <div class="uren-sidebar-catagories_area">
                            <div class="category-module uren-sidebar_categories">
                                <div class="category-module_heading">
                                    <h5>Categories</h5>
                                </div>
                                <div class="module-body">
                                    <ul class="module-list_item">
                                        <li>
                                            <?php while ($cata = $catagoies->fetch_assoc()){?>
                                                <a href="shop-left-sidebar.php?CataId=<?php echo $cata['id'] ?>"><?php echo $cata['category_name'] ?></a>

                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="uren-sidebar_categories">
                                <div class="uren-categories_title">
                                    <h5>Price</h5>
                                </div>
                                <div class="price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <div class="label-input">
                                            <form method="get">
                                            <label>price : </label>
                                            <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                            <input type="hidden" id="amount1" name="Cataid2"  value="<?php echo $_SESSION['CataId']?>" />
                                            <br>
                                            <button id="pricebtn" name="pricebtn" type="submit" style="font-size:15px; background-color:gold ; padding:3px ; border-radius: 3px;">Filter</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                           
                            
                            <div class="uren-sidebar_categories">
                                <div class="uren-categories_title">
                                    <h5>Manufacturers</h5>
                                </div>
                                <ul class="sidebar-checkbox_list">
                                    
                                <?php while ($brand = $brands->fetch_assoc()){?>
                                     <li>
                                        <a href="shop-left-sidebar.php?BrandId=<?php echo $brand['brand'] ?>"><?php echo $brand['Brand_name'] ?></a>
                                    </li>
                                <?php } ?>                                    
                                                                                    
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-9 col-md-7 order-1 order-lg-2 order-md-2">
                        <div class="shop-toolbar">
                            <!-- <div class="product-view-mode">
                                <a class="grid-1" data-target="gridview-1" data-toggle="tooltip" data-placement="top" title="1">1</a>
                                <a class="grid-2" data-target="gridview-2" data-toggle="tooltip" data-placement="top" title="2">2</a>
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="3">3</a>
                                <a class="grid-4" data-target="gridview-4" data-toggle="tooltip" data-placement="top" title="4">4</a>
                                <a class="grid-5" data-target="gridview-5" data-toggle="tooltip" data-placement="top" title="5">5</a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List"><i class="fa fa-th-list"></i></a>
                            </div> -->
                            <div class="product-item-selection_area">
                                <!-- <div class="product-short">
                                    <label class="select-label">Short By:</label>
                                    <select class="myniceselect nice-select">
                                        <option value="1">Default</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                        <option value="5">Rating (Highest)</option>
                                        <option value="5">Rating (Lowest)</option>
                                        <option value="5">Model (A - Z)</option>
                                        <option value="5">Model (Z - A)</option>
                                    </select>
                                </div>
                                <div class="product-showing">
                                    <label class="select-label">Show:</label>
                                    <select class="myniceselect short-select nice-select">
                                        <option value="1">15</option>
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
<!-- ******************************************************************************** -->

<!-- ******************************************************************************** -->

<!-- ******************************************************************************** -->
                        <div class="shop-product-wrap grid gridview-3 img-hover-effect_area row">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['CataId'])) {
                            $_SESSION['CataId'] = $_GET['CataId'] ;
                            $products = $crudObj->getAllProductsInCatagory($_GET['CataId']);
                        ?>
                        <?php while($product = $products->fetch_assoc()) { ?>
                            <div class="col-lg-4"> 
                                <div class="product-slide_item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>">
                                                    <img class="primary-img" src="../photo/<?php echo $product['product_img1'] ?>" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="../photo/<?php echo $product['product_img2'] ?>" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-10%</span>
                                                    <!-- <span class="sticker">New</span> -->
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                        </li>
                                                        <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                        </li> -->
                                                        <!-- <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                        </li> -->
                                                        <!-- <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">

                                                    <h6><a class="product-name" style="font-size:25px" href=""><?php echo $product['product_name'] ?></a></h6>
                                                    <div class="price-box">
                                                    <span class="old-price" style="font-size:20px"><?php echo $product['product_price'] ?></span><br>
                                                        <span class="new-price new-price-2" style="font-size:25px"><?php echo $product['product_price'] *0.9 ?></span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <?php            
                        }} 
                        elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pricebtn'])){
                    
                           $priceParts = explode("-", $_GET['price']);
                            $minPrice = trim(str_replace("$", "", $priceParts[0]));
                            $maxPrice = trim(str_replace("$", "", $priceParts[1]));
                           $products = $crudObj->getPrice($minPrice,$maxPrice,$_GET['Cataid2']);
                       ?>
                         <?php while($product = $products->fetch_assoc()) { ?>
                            <div class="col-lg-4"> 
                                <div class="product-slide_item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>">
                                                    <img class="primary-img" src="../photo/<?php echo $product['product_img1'] ?>" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="../photo/<?php echo $product['product_img2'] ?>" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-10%</span>
                                                    <!-- <span class="sticker">New</span> -->
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                        </li>
                                                        <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                        </li> -->
                                                        <!-- <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                        </li> -->
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">

                                                    <h6><a class="product-name" style="font-size:25px" href="single-product.html"><?php echo $product['product_name'] ?></a></h6>
                                                    <div class="price-box">
                                                    <span class="old-price" style="font-size:20px"><?php echo $product['product_price'] ?></span><br>
                                                        <span class="new-price new-price-2" style="font-size:25px"><?php echo $product['product_price'] *0.9 ?></span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                         }}
                          
                        elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['BrandId'])){
                        $products = $crudObj->getBrand($_SESSION['CataId'], $_GET['BrandId']);
                       ?>
                        
                         <?php while($product = $products->fetch_assoc()) { ?>
                            <div class="col-lg-4"> 
                                <div class="product-slide_item">
                                    <div class="inner-slide">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>">
                                                    <img class="primary-img" src="../photo/<?php echo $product['product_img1'] ?>" alt="Uren's Product Image">
                                                    <img class="secondary-img" src="../photo/<?php echo $product['product_img2'] ?>" alt="Uren's Product Image">
                                                </a>
                                                <div class="sticker-area-2">
                                                    <span class="sticker-2">-10%</span>
                                                    <!-- <span class="sticker">New</span> -->
                                                </div>
                                                <div class="add-actions">
                                                    <ul>
                                                        <li><a class="uren-add_cart" href="single-product-tab-style-left.php?productId=<?php echo $product['id'] ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                        </li>
                                                        <!-- <li><a class="uren-wishlist" href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                        </li> -->
                                                        <!-- <li><a class="uren-add_compare" href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                                                            class="ion-android-options"></i></a>
                                                        </li> -->
                                                        <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                            class="ion-android-open"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">

                                                    <h6><a class="product-name" style="font-size:25px" href="single-product.html"><?php echo $product['product_name'] ?></a></h6>
                                                    <div class="price-box">
                                                    <span class="old-price" style="font-size:20px"><?php echo $product['product_price'] ?></span><br>
                                                        <span class="new-price new-price-2" style="font-size:25px"><?php echo $product['product_price'] *0.9 ?></span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                         }}
                         ?>
                        






                            <!-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="uren-paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="uren-pagination-box primary-color">
                                                    <li class="active"><a href="javascript:void(0)">1</a></li>
                                                    <li><a href="javascript:void(0)">2</a></li>
                                                    <li><a href="javascript:void(0)">3</a></li>
                                                    <li><a href="javascript:void(0)">4</a></li>
                                                    <li><a href="javascript:void(0)">5</a></li>
                                                    <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Shop Left Sidebar Area End Here -->

        <!-- Begin Uren's Footer Area -->

            <!-- footer ******************************************************************* -->
            <?php
require "footer.php";
?>
        <!-- Uren's Footer Area End Here -->
        <!-- Begin Uren's Modal Area -->

        <!-- Uren's Modal Area End Here -->

    </div>

    <!-- JS
============================================ -->
<script>

document.addEventListener("DOMContentLoaded", function() {
    const amountInput = document.getElementById("amount");
    const updateButton = document.getElementById("pricebtn");

    updateButton.addEventListener("click", function() {
        amountInput.value = "<?php echo $_GET['price']; ?>";
    });


});

</script>


    <script src="assets/js/main.js"></script>
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