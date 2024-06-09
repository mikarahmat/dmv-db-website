<?php
include_once("config.php");

$id = $_GET['ID'];

$result =  mysqli_query($conn, "DELETE FROM registration WHERE registrationID = $id");

header("Location:registrationAdmin.php");
?>