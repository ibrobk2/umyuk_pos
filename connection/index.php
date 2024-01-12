<?php
require_once("constants.php");
$server = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

if(!$server){
    echo "Failed to connect....";
}


?>