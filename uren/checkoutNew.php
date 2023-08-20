<?php
require_once "./db/conn.php";
session_start();



$_SESSION['userID']=1;
// $_SESSION['subtotal']=2000;
// $_SESSION['tax']=0.10;
// $_SESSION['discount']=50;
// $_SESSION['total']=1000;
$_SESSION['islogin']='yes';

global $validname;
global $validPhoneNumber;
global $validaddress;

global $arrayOfIdProduct;
$arrayOfIdProduct = array();


if (isset($_SESSION['session_product'])) {
    
    for ($i=0; $i < count($_SESSION['session_product']) ; $i++) { 
        $crudObj->addToCart($_SESSION['session_product'][$i]['product_id'], $_SESSION['userID'], $_SESSION['session_product'][$i]['quantity_cart'] );
    }

    unset($_SESSION['session_product']);

}

if ($_SERVER["REQUEST_METHOD"] == "POST" &&isset($_POST['confirm'])) {

    $validPhoneNumber = true;        
    $phoneNumber = $_POST["phoneNumber"];        
    $phoneNumberPattern = '/^07\d{8}$/';

        if (!preg_match($phoneNumberPattern, $phoneNumber)) {
            $validPhoneNumber = false;
        };

    $pattern = '/^[A-Za-z\s]{1,50}$/';
    $user = $_POST["username"];        
    $validname = true; 

        if (!preg_match($pattern, $user)) {
            $validname = false;
        };
   
    $patternaddress = '/^[a-zA-Z\s\/]+[a-zA-Z\d]+$/';
    $address = $_POST["address"];        
    $validaddress = true; 
    
            if (!preg_match($patternaddress, $address)) {
                $validaddress = false;
            };

    
};

if ($_SERVER["REQUEST_METHOD"] == "POST" && $validPhoneNumber && $validname && $validaddress) {
    
    

    if ($_SESSION['islogin'] == 'yes') {
        header("Location: pop.php");


    }else if ($_SESSION['islogin'] == 'no') {

        header("Location: login-register.html"); 
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="./assets/css/checkout.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Raleway:300,400,600&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <div class="container-fluid background">
        <div class="row padding-top-20">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 offset-md-1 offset-lg-1 offset-xl-2 padding-horizontal-40">
                <div class="row">
                    <div class="col-12 main-wrapper">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div id="template" class="row panel-wrapper">
                                    <div class="col-12 panel-header basket-header">
                                        <div class="row">
                                            <div class="col-12 basket-title">
                                                <span class="emphasized">Cart Summary</span>
                                            </div>
                                            <!-- <div class="col-6 order-number align-right">
                                                <span class="description">order #</span><br><span class="emphasized">{{order_number}}</span>
                                            </div> -->
                                        </div>
                                                                          
                                    </div>

                                    
                                    <div class="col-12 panel-body basket-body">
                                        <div style="text-align:center; position:sticky; top:0; z-index: 9999; background-color:#D0D0D0; font-size:17px; color:rgb(12,42,92);" class="row column-titles padding-top-10">
                                            <div class="col-2 align-center"><span>Photo</span></div>
                                            <div class="col-5 align-center"><span>Name</span></div>
                                            <div class="col-2 align-center"><span>Quantity</span></div>
                                            <div class="col-3 align-right"><span>Price</span></div>
                                        </div> 


                                    <!-- **************************** -->
                                    <?php 

                                    $cart= $crudObj->getCart($_SESSION['userID']);
                                    if ($_SESSION['islogin'] == 'yes') {

                                    while($carts = $cart->fetch_assoc()) { 
                                    $product= $crudObj->getSingleProduct($carts['product_id']);

                                    while($products = $product->fetch_assoc()) { 
                                        array_push($arrayOfIdProduct,$products['id']);
                                    ?>
                                        
                                        <div style="text-align:center;" class="row product">
                                            <div class="col-2 product-image"><img src="../photo/<?php echo $products['product_img1']?>"></div>
                                            <div class="col-5"><?php echo $products['product_name']?></div>
                                            <div class="col-2 align-right">
                                                <?php echo $carts['quantity_cart']; ?>
                                            </div>
                                            <div class="col-3 align-right">$<?php echo $products['product_price']?></div>
                                        </div>
                                        
                                   
                                    <?php
                                    }
                                    }
                                    }else if ($_SESSION['islogin'] == 'no'){
                                    }
                            
                                    ?>
                                    <!-- ************************************** -->
                                    </div>
                                    <div class="col-12 panel-footer basket-footer">
                                        <hr>
                                        <div class="row">
                                    
                                            <div class="col-8 align-right description"><div class="dive">Subtotal</div></div>
                                            <div class="col-4 align-right"><span class="emphasized"><?php echo $_SESSION['subtotal']; ?></span></div>
                                            <div class="col-8 align-right description"><div class="dive">Taxes</div></div>
                                            <div class="col-4 align-right"><span class="emphasized"><?php echo $_SESSION['tax']; ?></span></div>
                                            <div class="col-8 align-right description"><div class="dive">Discount</div></div>
                                            <div class="col-4 align-right"><span class="emphasized"><?php echo $_SESSION['total']; ?></span></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8 align-right description"><div class="dive">Total</div></div>
                                            <div class="col-4 align-right"><span class="very emphasized"><?php echo $_SESSION['total'];?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div  class="row panel-wrapper">
                                    <div class="col-12 panel-header creditcard-header">
                                        <div class="row">
                                            <div class="col-12 creditcard-title">
                                                <span class="emphasized">Credit Card Information</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 panel-body creditcard-body">
                                        <form action="" method="post" target="_self">
                                            <fieldset>
                                                <label for="card-name">Full Name</label><br>
                                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                                <input type='text' id='card-name' name='username' placeholder='Your Name' title='Name on the Card' required>
                                                
                                            </fieldset>
                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && !$validname) {
                                                    echo "<p style='color: red; font-size:10px'>Invalid name. Name should only contain letters and spaces, and be less than 50 characters.</p>";
                                                }
                                            ?>
                                            <fieldset>
                                                <label for="card-number">Phone Number</label><br>
                                                <i class="fa-solid fa-phone" aria-hidden="true"></i><input type='text' id='card-number' name='phoneNumber' placeholder='07xxxxxxxx' title='Card Number' required>
                                            </fieldset>
                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && !$validPhoneNumber) {
                                                    echo "<p style='color: red; font-size:12px'>Invalid phone number format. Please enter a valid 07xxxxxxxx number.</p>";
                                                }
                                            ?>
                                            <fieldset>
                                                <label for="card-expiration">City</label><br>
                                                <i class="fa-solid fa-city" aria-hidden="true"></i>
                                                <select name="city" id="city">
                                                    <option value="Amman">Amman</option>
                                                    <option value="Irbid">Irbid</option>
                                                    <option value="Ajloun">Ajloun</option>
                                                    <option value="Jarsh">Jarsh</option>
                                                    <option value="Ma'an">Ma'an</option>
                                                    <option value="Mafraq">Mafraq</option>
                                                    <option value="Salt">Salt</option>
                                                    <option value="Karak">Karak</option>
                                                    <option value="Tafilah">Tafilah</option>
                                                    <option value="Aqaba">Aqaba</option>
                                                    <option value="Madaba">Madaba</option>


                                                </select>
                                            </fieldset>
                                            <fieldset>
                                                <label for="card-ccv">Address</label>&nbsp;<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Town/Street/HomeNumber"></i><br>
                                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                                <input type='text' id='card-ccv' name='address' placeholder='Town/Street/HomeNumber' title='' required>
                                                <div id="map"></div>                                                
                                            </fieldset>
                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST" && !$validaddress) {
                                                    echo "<p style='color: red; font-size:10px'>Invalid address format. Please provide a valid address in the format 'Town/Street/HomeNumber'</p>";
                                                }
                                                
                                            ?>
                                           
                                        
                                    </div>
                                    <div  class="col-12 panel-footer creditcard-footer">
                                        <div class="row">
                                            <div class="col-12 align-right"><button class="cancel">Back To Cart</button>&nbsp;<button name="confirm" class="confirm">Confirm</button></div>
                                        </div>
                                    </div>
                                   </form> 


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

    <script src="https://kit.fontawesome.com/65d53f33a7.js" crossorigin="anonymous"></script>
    <script src="./assets/js/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
     
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $validPhoneNumber && $validname && $validaddress) {

    if ($_SESSION['islogin'] == 'yes') {
        foreach ($arrayOfIdProduct as $id) {
            $crudObj->addToOrder($id,$_SESSION['userID'],$_POST["address"],$_SESSION['subtotal'],$_SESSION['total'],$_POST['username'],$_POST['phoneNumber'],$_POST['city']);
        }
       
        $crudObj->deleteCart($_SESSION['userID']);

    }
}


?>
