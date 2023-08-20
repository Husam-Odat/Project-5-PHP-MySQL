<?php
session_start();
// $_SESSION['isLogin'] = 'yes';
// print_r($_SESSION[]);
// $_SESSION['user_id']=1;
$_GET['productId'];

// $_SESSION['isLogin']='no';



require_once "./db/conn.php";
//global $CataId = $GET['CataId'];


$singleproducts = $crudObj->getSingleProduct($_GET['productId']);
//$manufactory = $crudObj->getMannfactory(11);
// print_r($singleproducts);
// $catagoies = $crudObj->getAllCatagory();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

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

        <!-- Begin Uren's Header Main Area -->
        <?php
        require "nav.php";
        ?>
        <!-- Uren's Header Main Area End Here -->

        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Single Product Style</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Tab Style Left</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->

        <!-- Begin Uren's Tab Style Left Area -->
        <?php while ($product = $singleproducts->fetch_assoc()) {
            global $nameP;
            global $breifP;
            global $priceP;
            global $img;
            $nameP = $product['product_name'];
            $breifP = $product['product_brife'];
            $priceP = $product['product_price'];
            $img = $product['product_img1']

        ?>
            <div class="sp-area sp-tab-style_left">
                <div class="container-fluid">
                    <div class="sp-nav">
                        <div class="row">
                            <div class="col-lg-5">


                                <div class="sp-img_area">
                                    <div class="sp-img_slider slick-img-slider uren-slick-slider" data-slick-options='{
                                                                "slidesToShow": 1,
                                                                "arrows": false,
                                                                "fade": true,
                                                                "draggable": false,
                                                                "swipe": false,
                                                                "asNavFor": ".sp-img_slider-nav"
                                                                }'>
                                        <div class="single-slide red zoom">
                                            <img src="../photo/<?php echo $product['product_img1'] ?>" alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide orange zoom">
                                            <img src="../photo/<?php echo $product['product_img2'] ?>" alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide brown zoom">
                                            <img src="../photo/<?php echo $product['product_img3'] ?>" alt="Uren's Product Image">
                                        </div>
                                        <div class="single-slide umber zoom">
                                            <img src="../photo/<?php echo $product['product_img4'] ?>" alt="Uren's Product Image">
                                        </div>

                                    </div>
                                    <div class="sp-img_slider-nav slick-slider-nav uren-slick-slider slider-navigation_style-4" data-slick-options='{
                                                                "slidesToShow": 3,
                                                                "asNavFor": ".sp-img_slider",
                                                                "focusOnSelect": true,
                                                                "arrows" : true,
                                                                "vertical" : true
                                                                }'>
                                        <div class="single-slide red">
                                            <img src="../photo/<?php echo $product['product_img1'] ?>" alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide orange">
                                            <img src="../photo/<?php echo $product['product_img2'] ?>" alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide brown">
                                            <img src="../photo/<?php echo $product['product_img3'] ?>" alt="Uren's Product Thumnail">
                                        </div>
                                        <div class="single-slide umber">
                                            <img src="../photo/<?php echo $product['product_img4'] ?>" alt="Uren's Product Thumnail">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#"><?php echo $product['product_name'] ?></a></h5>
                                    </div>
                                    <!-- <span class="reference">Reference: demo_1</span> -->
                                    <!-- <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                        <li class="silver-color"><i class="ion-android-star"></i></li>
                                    </ul>
                                </div> -->
                                    <div class="sp-essential_stuff">
                                        <ul>
                                            <li>Brands <a href="javascript:void(0)"><?php $resul = $crudObj->getMannfactory($product['id_brand']);
                                                                                    if ($resul->num_rows > 0) {
                                                                                        // Fetch the first row
                                                                                        $row = $resul->fetch_assoc();
                                                                                        $manufacName = $row['Brand_name'];
                                                                                        echo $manufacName;
                                                                                    } ?></a></li>
                                            <li>Product Code: <a href="javascript:void(0)">Product<?php echo $product['id'] ?></a></li>
                                            <li>Product Quantity: <a href="javascript:void(0)"><?php echo $product['quantity_product'] ?></a></li>
                                            <li>Availability: <a href="javascript:void(0)"><?php if ($product['quantity_product'] > 0) {
                                                                                                echo "Yes";
                                                                                            } else {
                                                                                                echo "No";
                                                                                            } ?></a></li>
                                            <li>Price: <a href="javascript:void(0)"><span><span style="text-decoration: line-through;"><?php echo $product['product_price'] . "   "; ?></span><span style="color:red; font-size:15px; font-weight: bold;"><?php echo $product['product_price'] * 0.9; ?></span></a></li>
                                        </ul>
                                    </div>
                                    <!-- <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div> -->
                                    <form method="POST">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text" name="quantity_value">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <div class="qty-btn_area">
                                            <ul>
                                                <li><button style="background-color:gold ;padding:5px; margin-top:10px; font-size:15px;" class="qty-cart_btn" type="submit" name="addToCart">Add To Cart</button></li>
                                                <!-- <li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a> -->

                                                </li>

                                            </ul>
                                        </div>
                                    </form>
                                    <?php if (isset($_POST['addToCart'])) {
                                        
                                        $quantity = $_POST['quantity_value'];
                                        $quantityfun = $crudObj->getCart2($_SESSION['user_id'], $_GET['productId']);

                                        if ($_SESSION['isLogin'] == 'yes') {
                                            if ($quantityfun->num_rows > 0) {
                                                while ($quantities = $quantityfun->fetch_assoc()) {
                                                    $quantityNew = $quantity + $quantities['quantity_cart'];

                                                    $crudObj->updateProductQuantity($_SESSION['user_id'], $_GET['productId'], $quantityNew);
                                                }
                                            } else {
                                                $crudObj->addToCart($_GET['productId'], $_SESSION['user_id'], $quantity);
                                                // echo "<script>window.location.href = 'single-product-tab-style-left.php';</script>";
                                            }
                                        } else if ($_SESSION['isLogin'] == 'no') {
                                            $newProduct = array(
                                                'product_id' => $_GET['productId'],
                                                'product_name' => $nameP,
                                                'product_brife' => $breifP,
                                                'product_price' => $priceP,
                                                'quantity_cart' => $quantity,
                                                'product_img1' => $img,
                                            );




                                            if (!isset($_SESSION['arrayOfProduct'])) {
                                                $_SESSION['arrayOfProduct'] = array();

                                                $productarray1 = $_SESSION['arrayOfProduct'];
                                                array_push($productarray1, $newProduct);

                                                $_SESSION['arrayOfProduct'] = $productarray1;
                                                print_r($_SESSION['arrayOfProduct']);
                                            } else {
                                                $productarray1 = $_SESSION['arrayOfProduct'];
                                                array_push($productarray1, $newProduct);

                                                $_SESSION['arrayOfProduct'] = $productarray1;
                                                print_r($_SESSION['arrayOfProduct']);

                                            }
                                            //session_destroy();

                                        }
                                    } ?>
                                    <a href="shop-left-sidebar.php"><button style="background-color:gold ;padding:5px; margin-top:60px; font-size:15px;">Back to Products</button></a></li>

                                    <a href="cart.php"><button style="background-color:gold ;padding:5px; margin-top:60px; font-size:15px;">Go To Cart</button></a></li>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Uren's Tab Style Left Area End Here -->

            <!-- Begin Uren's Single Product Tab Area -->
            <div class="sp-product-tab_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sp-product-tab_nav">
                                <div class="product-tab">
                                    <ul class="nav product-menu">
                                        <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                        </li>

                                        <li><a data-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-content uren-tab_content">
                                    <div id="description" class="tab-pane active show" role="tabpanel">
                                        <div class="product-description">
                                            <ul>
                                                <li>
                                                    <strong>Brief</strong>
                                                    <span><?php echo $product['product_brife']; ?></span>
                                                </li>
                                                <li>
                                                    <strong>Description</strong>
                                                    <span><?php echo $product['product_des']; ?></span>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>

                                    <div id="specification" class="tab-pane" role="tabpanel">
                                        <table class="table table-bordered specification-inner_stuff">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2"><strong>Memory</strong></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>test 1</td>
                                                    <td>8gb</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2"><strong>Processor</strong></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>No. of Cores</td>
                                                    <td>1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="reviews" class="tab-pane" role="tabpanel">
                                        <div class="tab-pane active" id="tab-review">
                                            <form class="form-horizontal" id="form-review" method="post">
                                                <!-- *********************** -->
                                                <div style="width: 100%; height: 300px; overflow: auto; margin-bottom:20px;">
                                                    <?php
                                                    $reviews = $crudObj->getComment($_GET['productId']);
                                                    while ($review = $reviews->fetch_assoc()) {
                                                    ?>
                                                        <div id="review">
                                                            <table class="table table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 50%;"><strong><?php echo $review['userName']; ?></strong></td>
                                                                        <td class="text-right"><?php echo $review['review_date']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <p><?php echo $review['review']; ?></p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    <?php
                                                    } ?>
                                                </div>
                                                <!-- ************************** -->
                                                <?php
                                                $order = $crudObj->productInOrder($_SESSION['user_id'], $_GET['productId']);
                                                if ($order->num_rows > 0 && $_SESSION['isLogin'] == 'yes') {
                                                ?>

                                                    <h2>Write a review</h2>

                                                    <div class="form-group required second-child">
                                                        <div class="col-sm-12 p-0">
                                                            <label class="control-label">Share your opinion</label>
                                                            <textarea class="review-textarea" name="con_message" id="con_message"></textarea>

                                                            <?php $resul = $crudObj->getCutomerName($_SESSION['user_id']);
                                                            if ($resul->num_rows > 0) {
                                                                $row = $resul->fetch_assoc();
                                                                $name = $row['first_name'] . ' ' . $row['last_name'];
                                                            };
                                                            ?>

                                                            <input type="hidden" name="username1" value="<?php echo $name; ?>">
                                                            <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                                                            <input type="hidden" name="ProductId" value="<?php echo $_GET['productId']; ?>">

                                                        </div>
                                                    </div>
                                                    <div class="form-group last-child required">

                                                        <div class="uren-btn-ps_right">

                                                            <button name="addReview" class="uren-btn-2">Comment</button>

                                                        </div>

                                                    </div>

                                                <?php
                                                }

                                                ?>


                                                <!-- *************************************** -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['addReview'])) {
                $crudObj->addComment($_POST['con_message'], $_POST['ProductId'], $_SESSION['user_id'], $_POST['date'], $_POST['username1']);
                echo '
        <script>
        alert("comment added successfully");
        </script>';
            }
            ?>




            <!-- Uren's Single Product Tab Area End Here -->


            <!-- -->

            <!-- newwwwwwwwwwwwwwwwwwww -->
            <div style="margin-bottom:100px" class="uren-product_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title_area">
                                <span></span>
                                <h3>Related Products</h3>
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
                                <!-- ****************************** -->
                                <?php $relatedProducts = $crudObj->getAllProductsInCatagory($product['category_id']); ?>
                                <?php while ($relProduct = $relatedProducts->fetch_assoc()) { ?>
                                    <div class="product-slide_item">
                                        <div class="inner-slide">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img class="primary-img" src="../photo/<?php echo $relProduct['product_img1']; ?>" alt="Uren's Product Image">
                                                        <img class="secondary-img" src="../photo/<?php echo $relProduct['product_img2']; ?>" alt="Uren's Product Image">
                                                    </a>
                                                    <div class="sticker">
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li><a class="uren-add_cart" href="single-product-tab-style-left.php?productId=<?php echo $relProduct['id']; ?>" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
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

                                                        <h6><a class="product-name" href="single-product.html"><?php echo $relProduct['product_name']; ?></a></h6>
                                                        <div class="price-box">
                                                            <span class="new-price"><?php echo $relProduct['product_price']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <!-- ****************************** -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- new -->





















            <!-- Begin Uren's Footer Area -->
            <?php
            require "footer.php";
            ?>
            <!-- Uren's Modal Area End Here -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>


    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>