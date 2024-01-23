<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// include PHPMailer required files
require '../../assets/PHPMailer/Exception.php';
require '../../assets/PHPMailer/PHPMailer.php';
require '../../assets/PHPMailer/SMTP.php';


function sendMail($host, $senderEmail, $receiverEmail, $senderPassword,$message, $sentresponse){
    // include("../../connection/index.php");
//Load Composer's autoloader
// require 'vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $senderEmail;                     //SMTP username
    $mail->Password   = $senderPassword;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ibrobk12@gmail.com', 'Proxy Authentication');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($receiverEmail);              //Name is optional
    $mail->addReplyTo($senderEmail, 'Proxy Authentication');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Proxy Authentication';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        // echo "<script>
        // swal('Done!', {$sentmsg}, 'success');
        // function x(){
           
        //     window.location = {$location};
        // }
        
        // setTimeout(x,2000);

        // </script>";

        echo $sentresponse;
    }
} catch (Exception $e) {
    echo "<script>
    swal('Opps!', 'Failed to sent Email', 'error');
    function x(){
        location.replace('./');
    }
    
    setTimeout(x,2000);

    </script>";
}

}
?>

</body>