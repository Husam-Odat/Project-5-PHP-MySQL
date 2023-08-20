<?php

$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];
$hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

$connection = mysqli_connect("localhost", "root", "", "ecommerce");

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		$sql = "UPDATE user SET reset_token='', password='$hashedPassword' WHERE email='$email'";
		mysqli_query($connection, $sql);

		echo "Password has been changed";
		?>
		<a href="../login1.php">GO to login Page</a>
		<?php
		// header('Location: ../loginSINGup.php');
		// exit;
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
