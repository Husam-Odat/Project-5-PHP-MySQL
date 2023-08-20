<?php
require_once 'functions.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>look</title>
    <!-- log CSS -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- log CSS -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2>WELCOME</h2>
    <?= alertMessage(); ?>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="signup-code.php" method="POST">
                <h1>Create Account</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                <strong>or use your email for registration</strong>
                <br>
                <input id="firstname" type="text" placeholder="first name : Amani" name="first_name" />
                <br>
                <input id="lastname" type="text" placeholder="last name : raaed" name="last_name" />
                <br>
                <input type="email" placeholder="Email" name="email" />

                <br>
                <input type="password" placeholder="Password:A###$@123" name="passwords" />
                <p>a password with a minimum of 8 characters that contains at least one lowercase letter, one uppercase letter, one number, and one special character?
                </p>
                <br>
                <button name="singup">Sign Up</button>
            </form>
        </div>
        <!--sign in here baby  -->
        <div class="form-container sign-in-container">
            <form action="login-code.php" method="POST">
                <h1>Sign in</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f" style="color: #4b82e2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-linkedin-in" style="color: #2e64c2;"></i></a>
                    <a href="#" class="social"><i class="fa-brands fa-google" style="color: #5089ed;"></i></a>
                </div> -->
                <strong>or use your account</strong>
                <br>
                <input type="email" placeholder="Email" name="email" />
                <br>
                <input type="password" placeholder="Password" name="passwords" />
                <br>

                <a href="./add-a-reset-password-option/index.html">Forgot your password?</a>
                <button name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="login.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>