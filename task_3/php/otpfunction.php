




<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 $otp_genrate=rand(10000,99999);
function sendotp($email,$otp){
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/SMTP.php');
    require('PHPMailer/src/Exception.php');
    
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ritikmaheshwari1203@gmail.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Getpdf');
    $mail->addAddress($email);     //Add a recipient
    $mail->addAddress($email);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'The OTP for Verification is-'.$otp;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return 1;
    // echo 'Message has been sent';
} catch (Exception $e) {
    return 0;
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}


?>



<!-- 
$sql="INSERT INTO `userlogin` (`user_name`, `email_id`,`password`) VALUES ('$username', '$useremail', '$password')";
                    $result=mysqli_query($conn,$sql);
                    echo '<div class="alert alert-info" role="alert">
                                                Success fully Signup!
                                        </div>'; -->
