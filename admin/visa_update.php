<?php


include('session.php');

$v_id = $_POST['v_id'];
$name = $_POST['values'][0];
$email = $_POST['values'][3];
$phone = $_POST['values'][4];
$destination = $_POST['values'][1];
$type = $_POST['values'][2];


$hw = "update visa set v_name = '$name', v_phone = '$phone', v_email = '$email', v_destination = '$destination', v_purpose = '$type' where v_id = '$v_id'";
mysqli_query($link, $hw);

?>