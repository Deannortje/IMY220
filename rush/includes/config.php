<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "dbu17326622";
//Create Connection
$conn = mysqli_connect($server, $username, $password, $database);
//Check Connection

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
?>