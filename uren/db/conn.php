<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecomm';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}

class crud{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // public function addProduct($product_name, $product_brief_description, $product_description, $product_price, $product_image){
    //     $sql = "
    //     INSERT INTO products (product_name, product_brief_description, product_description, product_price, product_image) 
    //     VALUES (?,?,?,?,?)";

    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_brief_description, $product_description, $product_price, $product_image);
    //     $result = mysqli_stmt_execute($stmt);
    //     return $result;
    // }

    public function getAllProducts(){
        $sql = "SELECT * FROM product";
        $result = $this->db->query($sql);
        return $result;
    }


    // select product related to category
    public function getAllProductsInCatagory($idCata){
        $sql = "SELECT * FROM product WHERE category_id= $idCata";
        $result = $this->db->query($sql);
        return $result;
    }


     
    // select all category
    public function getAllCatagory(){
        $sql = "SELECT * FROM category";
        $result = $this->db->query($sql);
        return $result;
    }

    // select brand
    public function getAllBrand(){
        $sql = "SELECT * FROM brand";
        $result = $this->db->query($sql);
        return $result;
    }


    // select all category related to price
    public function getPrice($minPrice,$maxPrice,$idCata) {
        $sql = "SELECT * FROM product WHERE category_id = $idCata AND product_price  BETWEEN '$minPrice' AND '$maxPrice' " ;
        $result = $this->db->query($sql);
        return $result;
    }

    // select all category related to barnd
    public function getBrand($idCata, $idbrand) {
        $sql = "SELECT * FROM product WHERE category_id = $idCata AND id_brand = $idbrand";
        $result = $this->db->query($sql);
        return $result;
    }
    


    // add to cart
    public function addToCart($product_id, $user_id, $quantity_cart){
        $sql = "
        INSERT INTO cart (product_id , user_id , quantity_cart) 
        VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $product_id, $user_id, $quantity_cart);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    // get from cart
    public function getCart($userId) {
        $sql = "SELECT * FROM cart WHERE user_id = $userId";
        $result = $this->db->query($sql);
        return $result;
    }

    // get from cart2
    public function getCart2($userId, $productId) {
        $sql = "SELECT * FROM cart WHERE user_id = $userId AND product_id = $productId";
        $result = $this->db->query($sql);
        return $result;
    }

    /// get manufactory
    public function getMannfactory($id){
        $sql = "SELECT Brand_name FROM brand WHERE brand=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    // select custromer name
    public function getCutomerName($id) {
        $sql = "SELECT first_name, last_name FROM user WHERE id = $id";
        $result = $this->db->query($sql);
        return $result;
    }

    // addcommet
    public function addComment( $comment, $productId,$user_id,$date,$userName){
        $sql = "
        INSERT INTO review (review,product_id,user_id,review_date,userName) 
        VALUES (?,?,?,?,?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $comment, $productId,$user_id,$date,$userName);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    // get comment
    public function getComment($productId) {
        $sql = "SELECT * FROM review WHERE product_id = $productId";
        $result = $this->db->query($sql);
        return $result;
    }

    // if product is in order
    public function productInOrder($userid,$productId) {
        $sql = "SELECT * FROM `order` WHERE product_id = $productId AND user_id = $userid";
        $result = $this->db->query($sql);
        return $result;
    }



    // single ptoduct
    public function getSingleProduct($id){
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }
    //select all  in cartproduct related to user id
    public function getProductInCart($id){
        $sql = "SELECT * FROM cart WHERE user_id=$id";
        $result = $this->db->query($sql);
        return $result;
    }


   // sget user name***************

   public function getUserId($id){
    $sql = "SELECT  FROM product WHERE id=$id";
    $result = $this->db->query($sql);
    return $result;
}

    public function deleteCart($id){
        $sql = "DELETE FROM cart WHERE user_id=$id";
        $result = $this->db->query($sql);
    }

    // public function updateProduct($id, $product_name, $product_brief_description, $product_description, $product_price, $product_image){
    //     $sql = "UPDATE products SET product_name=?, product_brief_description=?, product_description=?, product_price=?, product_image=? WHERE id=$id";
    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param($stmt, "sssss", $product_name, $product_brief_description, $product_description, $product_price, $product_image);
    //     mysqli_stmt_execute($stmt);
    // }

    // add to order
    public function addToOrder( $idproduct, $iduser,$address,$subtotal,$total,$name,$phone,$city){
    $sql = "
    INSERT INTO `order` (product_id,user_id,address,sub_total,total,recipient_name,Phone,city) 
    VALUES (?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($this->db, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss",$idproduct, $iduser,$address,$subtotal,$total,$name,$phone,$city);
    $result = mysqli_stmt_execute($stmt);
    return $result;
    }

    //  // UPDATE QUANTITY OF PRODUCT
    //  public function updateProductQuantity($userId,$productId,$quantity){
    //     $sql = "UPDATE cart SET quantity_cart=? WHERE user_id=? AND product_id=?";
    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param($stmt, "sss",$userId,$productId,$quantity);
    //     mysqli_stmt_execute($stmt);
    // }


    public function updateProductQuantity($userId, $productId, $quantity) {
        $sql = "UPDATE cart SET quantity_cart=? WHERE user_id=? AND product_id=?";
        $stmt = mysqli_prepare($this->db, $sql);
        
        // "iss" corresponds to integer, string, string for user_id, product_id, quantity
        mysqli_stmt_bind_param($stmt, "iss", $quantity, $userId, $productId);
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_close($stmt);
    }

}

$crudObj = new crud($conn);
?>