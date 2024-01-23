<?php
session_start();

include_once("../connection/index.php");
if(isset($_POST['verify_btn'])){
    $otp_entered = $_POST['otp'];
    $email = $_SESSION['email'];


    $sql = "SELECT * FROM users WHERE email=?";
    $st = $server->prepare($sql);
    $st->bind_param('s', $email);

    $res = $st->execute();
    $result = $st->get_result();
    $data = $result->fetch_assoc();

    $db_otp = $data['token'];

    
        if($otp_entered==$db_otp){
            $sql2 = "UPDATE users SET status=? WHERE email=?";
            $stmt = $server->prepare($sql2);
            $status = 'active';
            $stmt->bind_param('ss', $status, $email);
            if($stmt->execute()){
                header("Location: ../dashboard?email=$email");
            }
        }else{
            echo "<script>
                alert('Invalid OTP Code Entered');
                window.location = './email_verify.php';
            
            </script>";
        }
    }





?>
