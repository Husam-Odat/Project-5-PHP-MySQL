<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$connection = mysqli_connect("localhost", "root", "", "ecommerce");
$email = $_POST["email"];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
	$reset_token = time() . md5($email);

	$sql = "UPDATE user SET reset_token='$reset_token' WHERE email='$email'";
	mysqli_query($connection, $sql);

	$message = "<p>Please click the link below to reset your password</p>";
	$message .= "<a href='http://localhost/ecommerce/uren-car-accessories-shop-html-template-website/uren/add-a-reset-password-option/reset-password.php?email=$email&reset_token=$reset_token'>";
	// http://localhost/ecommerce/uren-car-accessories-shop-html-template-website/uren/add-a-reset-password-option/index.html
	//http://localhost:88/project5/uren-car-accessories/uren-car-accessories-shop-html-template-website/uren/
	// $message .= "<a href='../add-a-reset-password-option/reset-password.php?email=$email&reset_token=$reset_token'>";
		$message .= "Reset password";
		
	$message .= "</a>";

	send_mail($email, "Reset password", $message);
}
else
{
	echo "Email does not exists";
}

function send_mail($to, $subject, $message)
{
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
	    $mail->isSMTP();                                            // Set mailer to use SMTP
	    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'carsphpproject@gmail.com';                     // SMTP username
	    $mail->Password   = 'kmwecufannvdrtrv';                               // SMTP password
	    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    $mail->setFrom('husamaldean.odat@gmail.com', 'Admin');
	    //Recipients
	    $mail->addAddress($to);

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;

	    $mail->send();
	    echo 'Message has been sent';
		?>
		<a href="../login1.php">GO to login Page</a>
		<?php
		
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
// 	header('Location: ../loginSINGup.php');
// exit;
}
