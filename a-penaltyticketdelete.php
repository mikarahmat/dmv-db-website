<?php
include_once("config.php");

$id = $_GET['ID'];

$result =  mysqli_query($conn, "DELETE FROM penalty_ticket WHERE ticketID = $id");

header("Location:ticketpenaltyAdmin.php");
?>