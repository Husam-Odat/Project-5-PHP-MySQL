<?php
$_SESSION["isLogin"] = "no";
require_once 'functions.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["passwords"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (password_verify($password, $user["password"])) {
            // session_start();
            $_SESSION["user"] = "yes";
            $_SESSION["isLogin"] = "yes";
            $_SESSION["user_id"] = $user["id"];

            if (isset($_GET["fromcart"])) {
                redirect('checkoutNew.php', "Login Successfull.");
            } else {

                if ($user["role"] == 1) {
                    $_SESSION["user"] = "yes";
                    $_SESSION["user_id"] = $user["id"];
                    redirect('Dashboard.php', "Login Successfull.");
                    exit();
                } else {

                    $_SESSION["user"] = "yes";
                    $_SESSION["user_id"] = $user["id"];

                    redirect('Home.php', "Login Successfull.");
                }
            }
        } else {
            $_SESSION["user"] = "no";
            $_SESSION["isLogin"] = "no";
            redirect('login1.php', "Password does not match.");
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
        $_SESSION["user"] = "no";
        $_SESSION["isLogin"] = "no";
        redirect('login1.php', "Email does not match.");
    }
}
