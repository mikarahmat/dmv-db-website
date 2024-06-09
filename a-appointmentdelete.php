<?php
include_once("config.php");

$id = $_GET['ID'];

$result =  mysqli_query($conn, "DELETE FROM appointment WHERE appointmentID = $id");

header("Location:appointmentAdmin.php");
?>