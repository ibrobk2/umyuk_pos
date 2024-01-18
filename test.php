<?php

$randNum = rand()*1000000;
$token = substr($randNum,0,6);

echo $token;

?>