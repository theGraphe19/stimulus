<?php
include('../dbconnection.php');
$info=$_POST['id'];


foreach ($info as $id) {
    $id;

    $rt = "delete from hotels where h_id = '$id'";
    mysqli_query($link, $rt);

}

?>