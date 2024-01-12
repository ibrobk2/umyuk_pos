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

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Please Enter a Valid Email");
    }

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $res = $server->query($sql);
    $count = $res->num_rows;
    if($count>0){
        array_push($errors, "User Already Exist");
    }


    

}




?>


</body>
</html>