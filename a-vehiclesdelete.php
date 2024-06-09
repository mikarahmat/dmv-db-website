<?php
include_once("config.php");

$id = $_GET['ID'];

$result =  mysqli_query($conn, "DELETE FROM vehicles WHERE vehicleID = $id");

header("Location:vehicleAdmin.php");
?>