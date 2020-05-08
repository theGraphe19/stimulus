<?php

include('session.php');

    $v_id = $_POST['v_id'];
    $value = $_POST['value'];
    $query = "UPDATE `visa` SET `a_remarks`='$value' WHERE `v_id` = '$v_id' ";
    mysqli_query($link, $query);
?>