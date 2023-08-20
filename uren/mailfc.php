<?php
// ====================mail sender===========================================
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// ====================mail sender===========================================




$servername = "localhost";
$username = "root";
$password = "";
$dbname ="ecomm";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

if(isset($_POST['submit'])){
   $con_name = $_POST['con_name'];
   $con_email = $_POST['con_email'];
   $con_subject = $_POST['con_subject'];
   $con_message = $_POST['con_message'];

   

   $sql = "INSERT INTO contact (con_name, con_email, con_subject,con_message)
    VALUES ('$con_name','$con_email','$con_subject','$con_message')";

    // $sqladmin = "select * from user where role = 1";

    if(mysqli_query($conn,$sql)){
        // echo "New record inserted sussefully";
        // echo '<a href="retreave.php">Go back to products Page</a>';


      echo'
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
          <div class="d-grid gap-2 col-6 ml-5 m-5">
          <a href="retreave.php"><button class="btn btn-dark" type="button">Go back to products Page</button></a>
             
          </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          </body>
        </html> ';
        
   


    }
    else{
        echo "error:".$sql . " ".mysqli_error($conn);
    }




    // ====================mail sender to user===========================================


 


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'carsphpproject@gmail.com';                     //SMTP username
    $mail->Password   = 'kmwecufannvdrtrv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('carsphpproject@gmail.com', 'Mailer');
    $mail->addAddress('husamaldean.odat@gmail.com', 'admin');     //Add a recipient /// yousef jaradat
    $mail->addAddress($con_email , 'user');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('assets\images\menu\logo\2.png' , 'logo.png');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'uren company';
    $mail->Body    = 'Dear MR/MS'. $con_name.'<br> Thank you for send us a cantact info .<br> we well contact with you with in 2 bissness days .<br>
    <h2> Customer details </h2>
        <table> <tr> <td> Name </td> <td>'.$con_name.' </td> </tr>
                <tr> <td> Email </td> <td>'.$con_email.' </td> </tr>
                <tr> <td> Subject </td> <td>'.$con_subject.' </td> </tr>
                <tr> <td> Message </td> <td>'.$con_message.' </td> </tr> </table>
                <br> Thank you';
                
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    // =====================mail sender to user==========================================
    // =====================mail sender to admin==========================================
      
    // while($admin = mysqli_fetch_array($sqladmin)){
    
    // try {
    //     //Server settings
    //     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //     $mail->isSMTP();                                            //Send using SMTP
    //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //     $mail->Username   = 'carsphpproject@gmail.com';                     //SMTP username
    //     $mail->Password   = 'kmwecufannvdrtrv';                               //SMTP password
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //     //Recipients
    //     $mail->setFrom($con_email, 'Mailer');
    //     $mail->addAddress($admin['email'], 'admin');     //Add a recipient
    //     // $mail->addAddress('ellen@example.com');               //Name is optional
    //     // $mail->addReplyTo('info@example.com', 'Information');
    //     // $mail->addCC('cc@example.com');
    //     // $mail->addBCC('bcc@example.com');
    
    //     //Attachments
    //     $mail->addAttachment('assets\images\menu\logo\2.png' , 'logo.png');         //Add attachments
    //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
    //     //Content
    //     $mail->isHTML(true);                                  //Set email format to HTML
    //     $mail->Subject = 'company'. $con_email;
    //     $mail->Body    = '<h2> Customer details </h2>
    //     <table> <tr> <td> Name </td> <td>'.$con_name.' </td> </tr>
    //             <tr> <td> Email </td> <td>'.$con_name.' </td> </tr>
    //             <tr> <td> Subject </td> <td>'.$con_subject.' </td> </tr>
    //             <tr> <td> Message </td> <td>'.$con_message.' </td> </tr> </table>';
    //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    //     $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
    // }
    }
    header("Location:contact.html");
    mysqli_close($conn);

?>