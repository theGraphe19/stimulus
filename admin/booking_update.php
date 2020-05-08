<?php

include('session.php');

$pc_id = $_POST['pc_id'];

$name = $_POST['values'][0];
$pkgcode = $_POST['values'][1];
$email = $_POST['values'][2];
$phone = $_POST['values'][3];

    $query1 = "UPDATE `package_users` SET `pc_name`='$name',`pc_email`='$email',`pc_phone`='$phone' WHERE `pc_id`= '$pc_id' ";
    $query2 = "UPDATE `package_booking` SET `pc_b_code`='$pkgcode' WHERE `pc_id`= '$pc_id' ";

    mysqli_query($link, $query1);
    mysqli_query($link, $query2);

?>