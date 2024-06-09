<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmv";
$port = "3310";

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
// echo "Connected Succesfully";
?>