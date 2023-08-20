<?php

$email = $_GET["email"];
$reset_token = $_GET["reset_token"];

$connection = mysqli_connect("localhost", "root", "", "ecommerce");

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		?>




		<!-- <form method="POST" action="new-password.php">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
			
			<input type="password" name="new_password" placeholder="Enter new password">
			<input type="submit" value="Change password">
		</form> -->
		<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div style="padding:10% 30%;">
    <form method="POST" action="new-password.php">
      <div class="card text-center" style="width: 500px;">
        <div class="card-header h5 text-white bg-primary">Password Reset</div>
        <div class="card-body px-5">
            <p class="card-text py-2">
                Enter your email address and we'll send you an email with instructions to reset your password.
            </p>


            <div class="form-outline">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
            </div>

            <div class="form-outline">
			<input type="password" name="new_password" placeholder="Enter new password">
      
			<!-- <input type="submit" value="Change password"> -->
            </div>


            <input class="btn btn-primary w-100" type="submit" value="Change password">





            <!-- <a href="#" class="btn btn-primary w-100">Reset password</a> -->
            <!-- <div class="d-flex justify-content-between mt-4">
                <a class="" href="../loginSINGup.php">Login</a>
                <a class="" href="../loginSINGup.php">Register</a>
            </div> -->
        </div>
      </div>
      
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>





		<?php
	}
	else
	{
		echo "Recovery email has been expired";
	}
}
else
{
	echo "Email does not exists";
}
// header('Location: ../loginSINGup.php');
// exit;
// =============================================================================
?>




