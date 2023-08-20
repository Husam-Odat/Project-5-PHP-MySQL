<?php
require_once 'functions.php';
if(isset($_POST['singup'])) {
    $fName = $_POST["first_name"];
    $lName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["passwords"];

    // Check if the email is a Gmail address using regular expression
    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/', $email)) {
        redirect('login1.php', "Please use a valid address for registration.");
    } else {
        // Check if the password starts with an uppercase letter
        if (!preg_match('/^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[#?!@$%^&*-]).{8,}$/', $password))  {
            redirect('login1.php', "Password should contain one uppercase letter, lowercase letters, digit, and special character");
        } else {
            // Check if passwords match
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Check if email already exists in the database
                $emailCheckQuery = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
                $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

                if (mysqli_num_rows($emailCheckResult) > 0) {
                        redirect('login1.php', "Email already registered.");
                } else {
                    // Insert the new user record
                    $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ( '$fName', '$lName', '$email', '$hashedPassword')";
                    if ($query_run = mysqli_query($conn, $sql)) {
                        redirect('login1.php', "Register Successfull.");
                    } else {
                        redirect('login1.php', "Register Failed.");
                    }
                }
            }
    }      
}

        // if (isset($_POST["singup"])) {
        //     $fName = $_POST["first_name"];
        //     $lName = $_POST["last_name"];
        //     $email = $_POST["email"];
        //     $password = $_POST["passwords"];

        //     $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //     $errors = array();
        //     $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        //     $email_regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

        //     if (empty($fName) or  empty($lName) or empty($email) or empty($password)) {
        //         // array_push($errors, "All fields are required");
        //         redirect('login1.php', "All fields are required");
        //     }
        //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //         // array_push($errors, "Email is not valid");
        //         redirect('login1.php', "Email is not valid");

        //     } elseif (!preg_match($email_regex, $email)) {
        //         // array_push($errors, "Invalid email format");
        //         redirect('login1.php', "Invalid email format");
                
        //     }
        //     if (strlen($password) < 8) {
        //         // array_push($errors, "Password must be at least 8 charactes long");
        //         redirect('login1.php', "Password must be at least 8 charactes long");

        //     }
        //     if (!preg_match($password_regex, $password)) {
        //         // array_push($errors, "Password format is invalid");
        //         redirect('login1.php', "Password format is invalid");

        //     };

        //     $sql = "SELECT * FROM user WHERE email = '$email'";
        //     $result = mysqli_query($conn, $sql);
        //     $rowCount = mysqli_num_rows($result);
        //     if ($rowCount > 0) {
        //         // array_push($errors, "Email already exists!");
        //         redirect('login1.php', "Email already exists!");

        //     }
        //     else {

        //         $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES ( ?, ?, ?, ? )";
        //         $stmt = mysqli_stmt_init($conn);
        //         $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        //         if ($prepareStmt) {
        //             mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $email, $passwordHash);
        //             mysqli_stmt_execute($stmt);
        //             echo "<div class='alert alert-success'>You are registered successfully.</div>";
        //         } else {
        //             die("Something went wrong");
        //         }
        //     }
        // }
?>