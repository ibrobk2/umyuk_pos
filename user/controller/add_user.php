<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    

<?php

require_once("../../connection/index.php");

include_once("sendMail.php");

 // Variable declarations
 $full_name = "";
 $username = "";
 $email = "";
 $role = "";
 $password = "";
 $cpassword = "";


$errors = array();

if(isset($_POST['add_user'])){
    // Variable declarations
    $full_name = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    // Validation Section
    if(empty($full_name)){
        array_push($errors, "Full Name Required");
    }

    if(empty($username)){
        array_push($errors, "Username Required");
    }

    if(empty($email)){
        array_push($errors, "Email Required");
    }


    if(empty($role)){
        array_push($errors, "Role Not Selected");
    }

    if(empty($password)){
        array_push($errors, "Password Required");
    }

    if(empty($cpassword)){
        array_push($errors, "Confirm Password Required");
    }

    if($password!=$cpassword){
        array_push($errors, "Passwords Mismatched");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Please Enter a Valid Email");
    }

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $res = $server->query($sql); //$res = mysqli_query($server, $sql);
    $count = $res->num_rows; //$count = mysqli_num_rows($res);
    if($count>0){
        array_push($errors, "User Already Exist");
    }


    // INSERT INTO DATABASE IF THERE IS NO ANY ERROR
    if(count($errors)==0){
        $randNum = rand()*1000000;
        $token = substr($randNum,0,6);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql2 = "INSERT INTO users(`full_name`, `username`, `password`, `role`, `email`, `token`) VALUES('$full_name', '$username', '$password', '$role', '$email', $token)";
        $result = $server->query($sql2);

        if($result){
    


           
            $host = 'smtp.gmail.com';
            $senderEmail = 'ibrobk12@gmail.com';
            $receiverEmail = $email;
            $senderPassword = 'gykqgtbhqtyjiedf';
            $message = 'Welcome to UMYU IMS, your OTP Code is <b>'.$token.'</b>';
            $sentresponse = "<script>
                    swal('Done!', 'Registration Successful, Verification Code sent to your email', 'success');
                    function x(){
                        location.replace('../../auth/email_verify.php?email={$email}');
                    }
                    setTimeout(x, 2000);
            </script>";
           
           

            sendMail($host, $senderEmail, $receiverEmail,$senderPassword,$message, $sentresponse);
        }
    }else{
        echo "<script>
        swal('Error!', 'Failed to Resgister User', 'error');
       
        
          </script>";
    }


    

}




?>


</body>
</html>