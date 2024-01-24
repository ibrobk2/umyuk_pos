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
    echo $counter = $res->num_rows;
    if($counter>0){
        $data = $res->fetch_assoc();
        if(password_verify($password, $data['password'])){
            session_start();
            $_SESSION['data'] = $data;
            header("Location: ../dashboard");
        }else{
            echo "Invalid password";
        }
    }else{
        echo "User not Found";
}

}




?>