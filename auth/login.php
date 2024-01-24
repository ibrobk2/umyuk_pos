<?php
include("../connection/index.php");

if(isset($_POST['login_btn'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $server->prepare($sql);

    $stmt->bind_param('s', $username);
    $result = $stmt->execute();
    $res = $stmt->get_result();
    $counter = $res->num_rows;
    if($counter>0){
        $data = $res->fetch_assoc();
        $email = $data['email'];
        if(password_verify($password, $data['password'])){
           $db_status = $data['status'];
           if($db_status=='active'){
                session_start();
                $_SESSION['data'] = $data;
                header("Location: ../dashboard");
           }else{
                header("Location: email_verify.php?email=$email");
           }
        }else{
            echo "Invalid password";
        }
    }else{
        echo "User not Found";
}

}




?>