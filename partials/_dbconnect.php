<?php
$server = "localhost";
$username = "root";
$password = "Pranav@123";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("Failed". mysqli_connect_error());
}


?>