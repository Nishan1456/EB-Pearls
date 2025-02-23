
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';;

// Check honeypot field (anti-spam mechanism)
if (!empty($_POST['honeypot'])) {
    die("Spam detected");
}

if(isset($_POST['send']))
{

    $name =$_POST['name'];
    $email =$_POST['email'];
    $number=$_POST['number'];
    $message=$_POST['message'];
    







//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'nishanshrestha1456@gmail.com';                     //SMTP username
    $mail->Password   = 'oojdgfrgrgfdrt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nishanshrestha1456@gmail.com', 'contact form');
    $mail->addAddress('nishanshrestha1211@gmail.com', 'Nishan');     //Add a recipient
   

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'It is contact form';
    $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br>Contact Number - $number<br>ness or company name - $message";
    
    $mail->send();
    echo "<div class='success'>Message has been sent</div>";
} catch (Exception $e) {
    echo "<div class='alert'>Message could not be sent</div>";
}
}

?>
