<?php

include('../dbconnection.php');

$id = $_POST['id'];

$rt = "update holiday_packages set ho_status = '0' where ho_id = '$id'";
mysqli_query($link, $rt);

?>