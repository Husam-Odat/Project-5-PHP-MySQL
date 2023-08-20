<?php
$serverName = 'localhost';
$usernName = 'root';
$password = '';
$dbName = 'ecomm';

$conn = new mysqli($serverName, $usernName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->error);
}

class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // Product Functions:

    // public function addProduct(
    //     $product_name,
    //     $product_price,
    //     $product_brife,
    //     $product_des,
    //     $category_id,
    //     $quantity_product,
    //     $product_img1,
    //     $product_img2,
    //     $product_img3,
    //     $product_img4,
    //     $mainfactor
    // ) {
    //     $sql = "
    //     INSERT INTO products (
    //         product_name, product_price, product_brife,
    //         product_des, category_id, quantity_product,
    //         product_img1, product_img2, product_img3,
    //         product_img4, mainfactor
    //         ) 
    //     VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param(
    //         $stmt,
    //         "s,d,s,s,i,i,s,s,s,s,s",
    //         $product_name,
    //         $product_price,
    //         $product_brife,
    //         $product_des,
    //         $category_id,
    //         $quantity_product,
    //         $product_img1,
    //         $product_img2,
    //         $product_img3,
    //         $product_img4,
    //         $mainfactor
    //     );
    //     $result = mysqli_stmt_execute($stmt);
    //     return $result;
    // }
    public function addProduct(
        $product_name,
        $product_price,
        $product_brife,
        $product_des,
        $category_id,
        $quantity_product,
        $product_img1,

        $mainfactor
    ) {
        $sql = "
    INSERT INTO product (
        product_name, product_price, product_brife,
        product_des, category_id, quantity_product,
        product_img1, mainfactor
        ) 
    VALUES (
        '$product_name',
        '$product_price',
        '$product_brife',
        '$product_des',
        '$category_id',
        '$quantity_product',
        '$product_img1',    
      
        '$mainfactor'
    )";

        $result = $this->db->query($sql);

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }


    public function getAllProducts()
    {
        $sql = "SELECT id ,product_name,product_price,product_brife FROM product ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getCategoryProducts($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id=$category_id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=$id";
        $this->db->query($sql);
        // if ($result === true) {
        //     echo "record deleted successfully";
        // } else {
        //     echo "Error deleting record: " . $this->db->error;
        // }
    }

    // public function updateProduct(
    //     $id,
    //     $product_name,
    //     $product_price,
    //     $product_brife,
    //     $product_des,
    //     $category_id,
    //     $quantity_product,
    //     $product_img1,
    //     $mainfactor
    // ) {
    //     $sql = "UPDATE product SET 
    //     product_name=?, product_price=?, product_brife=?,
    //     product_des=?, category_id=?, quantity_product=?,
    //     product_img1=?,
    //     mainfactor=?
    //     WHERE id=$id";
    //     $stmt = mysqli_prepare($this->db, $sql);
    //     mysqli_stmt_bind_param(
    //         $stmt,
    //         "s,d,s,s,i,i,s,s",
    //         $product_name,
    //         $product_price,
    //         $product_brife,
    //         $product_des,
    //         $category_id,
    //         $quantity_product,
    //         $product_img1,
    //         $mainfactor
    //     );
    //     mysqli_stmt_execute($stmt);
    // }
    public function updateProduct(
        $id,
        $product_name,
        $product_price,
        $product_brife,
        $product_des,
        $category_id,
        $quantity_product,
        $product_img1,
        $mainfactor
    ) {
        $sql = "UPDATE product SET 
    product_name='$product_name',
    product_price='$product_price',
    product_brife='$product_brife',
    product_des='$product_des',
    category_id='$category_id',
    quantity_product='$quantity_product',
    product_img1='$product_img1',
    mainfactor='$mainfactor'
    WHERE id=$id";

        $result = $this->db->query($sql);

        if ($result === true) {
            // Successfully updated
        } else {
            // Handle the error
            echo "Error updating product: " . $this->db->error;
        }
    }


    // Category Functions

    public function addCategory($category_name, $category_img, $category_des)
    {

        $sql = "
        INSERT INTO category (category_name, category_img, category_des) 
        VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_img, $category_des);
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM category";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getSingleCategories($id)
    {
        $sql = "SELECT * FROM category where id=$id ";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getAllCategoriesName()
    {
        $sql = "SELECT category_name FROM category";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleCategory($id)
    {
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id=$id";
        $result = $this->db->query($sql);
        if ($result === true) {
            echo "record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }

    public function updateCategory($id, $category_name, $category_img, $category_des)
    {

        $sql = "UPDATE category SET category_name=?, category_img=?, category_des=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_img, $category_des);
        mysqli_stmt_execute($stmt);
    }

    // User Functions

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSingleUser($id)
    {
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id=$id";
        $result = $this->db->query($sql);
        if ($result === true) {
            echo "record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }

    public function updateUserRole($id, $role)
    {
        $sql = "UPDATE user SET role=? WHERE id=$id";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $role);
        mysqli_stmt_execute($stmt);
    }

    // Review functions



    public function getReviews()
    {
        $sql = "SELECT
     CONCAT(u.first_name, ' ', u.last_name) AS full_name,
     r.review,
     p.product_name
     FROM
     user u
     JOIN
     review r ON u.id = r.user_id
     JOIN
     product p ON r.product_id = p.id;
        ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getUserReviews($user_id)
    {
        $sql = "SELECT
        CONCAT(u.first_name, ' ', u.last_name) AS full_name,
        r.review,
        p.product_name,
        r.id AS review_id
        FROM
        user u
        JOIN
        review r ON u.id = r.user_id
        JOIN
        product p ON r.product_id = p.id
        WHERE u.id=$user_id;
       
       ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getProductReviews($product_id)
    {
        $sql = "SELECT
        CONCAT(u.first_name, ' ', u.last_name) AS full_name,
        r.review,
        p.product_name,
        r.id AS review_id,
        p.id AS product_id
        FROM
        user u
        JOIN
        review r ON u.id = r.user_id
        JOIN
        product p ON r.product_id = p.id
        WHERE p.id= $product_id;
       
       ";
        $result = $this->db->query($sql);
        return $result;
    }

    public function deleteReview($id)
    {
        $sql = "DELETE FROM review WHERE id=$id";
        $result = $this->db->query($sql);
    }

    // Start Cart 
    public function getCartProducts($user_id)
    {
        // echo"<h1>Testtttttt</h1>";
        $sql = "SELECT *
        FROM cart
        JOIN product ON cart.product_id = product.id
        WHERE cart.user_id =$user_id;
        ";
        $result = $this->db->query($sql);
        return $result;
    }
    // public function getCartUserRecords($id)
    // {
    //     $sql = "SELECT *
    //  FROM
    //  cart r
    //  JOIN
    //  product p ON r.product_id = p.id
    //  WHERE r.user_id=$id;
    //     ";
    //     $result = $this->db->query($sql);
    //     return $result;
    // }
    public function deleteCartProducts($user_id, $product_id)
    {
        $sql = "DELETE FROM cart WHERE user_id=$user_id AND product_id=$product_id ";
        $result = $this->db->query($sql);
        return $result;
    }


    public function discount($discount)
    {
        $sql = "SELECT * FROM discount where discount_code='$discount'";
        $result = $this->db->query($sql);
        return $result;
    }
    public function recommend($id_brand)
    {
        $sql = "SELECT * FROM product where id_brand ='$id_brand'";
        $result = $this->db->query($sql);
        return $result;
    }
}
$crudObj = new crud($conn);
