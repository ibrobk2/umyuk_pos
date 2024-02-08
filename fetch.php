<?php


include "./connection/index.php";

if(isset($_POST['username'])){
    $username = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($server, $sql);
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result);
        $fullName = $data['full_name'];
        echo $fullName;
    }else{
        echo "Record not found";
    }
}