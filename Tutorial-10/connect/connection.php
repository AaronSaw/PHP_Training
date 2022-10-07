<?php 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "777236";
$dbName = "loginsystem";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

$url="http://$_SERVER[HTTP_HOST]";
?>