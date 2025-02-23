
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';;




if(isset($_POST['send']))
{

    $name =$_POST['name'];
    $email =$_POST['email'];
    $number=$_POST['number'];
    $message=$_POST['message'];
$mail = new PHPMailer(true);

try {
    //Server settings
                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'nishanshrestha1456@gmail.com';                     //SMTP username
    $mail->Password   = 'oojdgfrgrgfdrt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nishanshrestha1456@gmail.com', 'contact form');
    $mail->addAddress('nishanshrestha1211@gmail.com', 'Nishan');     
   

   

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
