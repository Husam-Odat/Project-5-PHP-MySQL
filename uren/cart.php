 <?php session_start(); ?>
 <!doctype html>
 <html lang="en">

 <head>
     <title>Title</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="assets/css/cart.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>

 <body>
     <?php
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);



        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }
        // $user_id = $_SESSION['userID'];
        // $user_id = 1;
       

        // $product = [['product_id' => '4', 'product_name' => 'r23ool', 'product_brife' => 'fgdwefgderweh', 'product_price' => 1235, 'quantity_cart' => 55, 'product_img1'=>'trg'], ['product_id' => '125', 'product_name' => '4rrool', 'product_brife' => 'fgder45weh', 'product_price' => 1420, 'quantity_cart' => 55234, 'product_img1' => '45t'], ['product_id' => '125', 'product_name' => 'product 3', 'product_brife' => 'fgder45weh', 'product_price' => 1420, 'quantity_cart' => 55234, 'product_img1' => '45t']];
        // $_SESSION['arrayOfProduct'] = $product;
        // session_destroy();
        include("db.php");
        ?>
     <?php

        $_SESSION['islogin'] = 'yes';
        


        if ($_SESSION['isLogin'] == 'yes') {
            $result = $crudObj->getCartProducts($user_id);
            $result = $result->fetch_all(MYSQLI_ASSOC);

            $url = "checkoutNew.php";
        } else if ($_SESSION['isLogin'] == 'no') {

            $url = "login1.php?fromcart=1";
            $result =  $_SESSION['arrayOfProduct'];

        }
        // echo "<br>";
        // print_r($result);
        ?>
     <header>
         

         <?php
            

            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];      
                $user_id = $_SESSION['user_id'];
                $delete_product = $crudObj->deleteCartProducts($user_id, $product_id);
                // $result = array_values($result);
                header("Location: cart.php");
                exit();
            }
            // isset($_SESSION['arrayOfProduct'][$_GET['delete_session']]);
            if (isset($_GET['delete_session']) && is_numeric($_GET['delete_session'])) {
                $il = $_GET['delete_session'];

                // $arr = $_SESSION['arrayOfProduct'];
                echo "<h1>Test</h1>";

                if (isset($_SESSION['arrayOfProduct'][$il])) {
                    unset($_SESSION['arrayOfProduct'][$il]);
                }

                $_SESSION['arrayOfProduct'] = array_values($_SESSION['arrayOfProduct']);
                header("Location: cart.php");
                exit();
            }
            
            ?>

         <!-- cart + summary -->
         <section class="bg-light my-5">
             <div class="container">
                 <div class="row">
                     <!-- cart -->
                     <div class="col-lg-9">
                         <div class="card border shadow-0">
                             <div class="m-4">
                                 <h6 class="card-title mb-4">Your shopping cart</h6>
                                 <?php

                                    $Total = 0;
                                    $ahmad = 0;
                                    for ($i = 0; $i < count($result); $i++) {
                                        // $productId = $result[$i]['product_id'];

                                        if (isset($result[$i])) {


                                    ?>
                                         <div class="row gy-3 mb-4">
                                             <div class="col-lg-5">
                                                 <div class="me-lg-5">
                                                     <div class="d-flex">
                                                         <img src="<?php echo $result[$i]['product_img1'] ?>" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                         <div class="">
                                                             <a href="single-product-tab-style-left.php?productId=<?php echo $result[$i]['product_id']  ?>" class="nav-link"><?php echo $result[$i]['product_name']  ?></a>
                                                             <p class="text-muted"><?php echo $result[$i]['product_brife']  ?></p>

                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                                 <div class="counter">

                                                     
                                                     <span class="number" data-index="<?php echo $i; ?>"> <?php echo $result[$i]['quantity_cart'] ?></span>
                                                     <form action="" method="post">
                                                         <input type="hidden" id="wlyad7d7" name="wlyad7d7" value="<?php echo $result[$i]['product_price'] * $result[$i]['quantity_cart'] ?>">
                                                     </form>
                                                     


                                                 </div>
                                                 <div class="">

                                                     <text class=" h6" id="allprice" data-index="<?php echo $i; ?>"><?php echo $result[$i]['product_price'] * $result[$i]['quantity_cart'];

                                                                                                                    $Total +=
                                                                                                                        $result[$i]['product_price'] * $result[$i]['quantity_cart']  ?></text> <br />


                                                     <small class=" text-muted text-nowrap" id="product_price"><?php echo $result[$i]['product_price']  ?></small>
                                                 </div>
                                             </div>
                                             <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                                 <div class="float-md-end">
                                                     <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                                     <?php if (isset($_SESSION['isLogin'])) {

                                                            if ($_SESSION['isLogin'] == 'yes') {

                                                        ?>
                                                             <a href="?product_id=<?php echo  $result[$i]['product_id'] ?>&user_id=<?php echo $user_id ?>" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>

                                                         <?php } elseif (($_SESSION['isLogin'] == 'no')) { ?>
                                                             <a href="?delete_session=<?php echo $i ?>" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>

                                                     <?php }
                                                        } ?>



                                                 </div>
                                             </div>
                                         </div>
                                 <?php }
                                    }


                                    ?>



                             </div>



                             <div class="border-top pt-4 mx-4 mb-4">
                                 <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                                 <p class="text-muted">
                                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                     aliquip
                                 </p>
                             </div>
                         </div>
                     </div>
                     <!-- cart -->
                     <!-- summary -->
                     <div class="col-lg-3">
                         <div class="card mb-3 border shadow-0">
                             <div class="card-body">
                                 <form method="GET">
                                     <div class="form-group">
                                         <label class="form-label">Have coupon?</label>
                                         <div class="input-group">
                                             <?php
                                                $excutcode = 0;
                                                $active = 0;

                                                if (isset($_GET['apply'])) {
                                                    $discount = $_GET['discount'];
                                                    $apply_discounte = $crudObj->discount($discount);
                                                    while ($apply = $apply_discounte->fetch_all(MYSQLI_ASSOC)) {

                                                        if ($apply[0]['discount_code'] == $discount && $apply[0]['isactive'] == 1) {
                                                            $totalDiscount = $Total * $apply[0]['discount_persent'];
                                                            $SubTotal = $Total - $totalDiscount;
                                                            echo '<p class="suc"> Code Active </p>';
                                                            $excutcode++;
                                                        }
                                                    }
                                                }
                                                if ($excutcode == 0) {
                                                    echo '<p class="error">Invild Code</p> <br>';
                                                }
                                                ?>

                                             <input type="text" class="form-control border" name="discount" placeholder="Coupon code" />

                                             <input class="btn btn-light border" type="submit" name="apply" value="Apply">

                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                         <div class="card shadow-0 border">
                             <div class="card-body">
                                 <div class="d-flex justify-content-between">
                                     <p class="mb-2">Total price:</p>
                                     <p class="mb-2 product_price " id="product_price">$<?php echo $Total ?> </p>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                     <p class="mb-2">Discount:</p>
                                     <p class="mb-2 text-success">-$<?php
                                                                    if (isset($totalDiscount)) {

                                                                        echo $totalDiscount;
                                                                    } else {
                                                                        $totalDiscount = 0;
                                                                        echo $totalDiscount;
                                                                    }
                                                                    ?></p>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                     <p class="mb-2">TAX:</p>
                                     <p class="mb-2">$<?php
                                                        $Tax = $Total  * 0.16;
                                                        echo $Tax ?></p>
                                 </div>
                                 <hr />
                                 <div class="d-flex justify-content-between">
                                     <p class="mb-2">Sub Total :</p>
                                     <p class="mb-2 fw-bold">$<?php
                                                                $SubTotal = $Total - $totalDiscount + $Tax;
                                                                echo  $SubTotal ?> </p>
                                 </div>

                                 <div class="mt-3">
                                     <?php


                                        ?>

                                     <a href=<?php echo $url ?> class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                     <a href="home.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>

                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- summary -->
                 </div>
             </div>
         </section>
         <!-- cart + summary -->
         <section>
             <div class="container my-5">
                 <header class="mb-4">
                     <h3>Recommended items</h3>
                 </header>

                 <div class="row">

                     <?php
                        $All = $crudObj->getAllProducts();
                        while ($recomend = $All->fetch_assoc()) {  ?>
                         <div class="col-lg-3 col-md-96 col-sm-6">
                             <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                                 <div class="mask px-2" style="height: 50px;">
                                     <div class="d-flex justify-content-between">
                                         <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                                         <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                                     </div>
                                 </div>
                                 <a href="#" class="">
                                     <img src="" class="card-img-top rounded-2" />
                                 </a>
                                 <div class="card-body d-flex flex-column pt-3 border-top">
                                     <a href="#" class="nav-link"><?php echo $recomend['product_name'] ?></a>
                                     <div class="price-wrap mb-2">
                                         <strong class="">$<?php echo $recomend['product_price'] * .8 ?></strong>
                                         <del class="">$<?php echo $recomend['product_price'] ?></del>
                                     </div>
                                     <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                         <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php }
                        $monye = [$SubTotal, $Total, $totalDiscount, $Tax];

                        $_SESSION['tax'] = $Tax;
                        $_SESSION['discount'] = $totalDiscount;
                        $_SESSION['subtotal'] = $SubTotal;
                        $_SESSION['total'] = $Total;
                        ?>
                 </div>
             </div>
         </section>
         <!-- Recommended -->


         <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         <script src="assets/js/cart.js"></script>
 </body>

 </html>
 <!-- Footer -->