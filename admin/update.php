<?php
    include('session.php');
    
    $sql = "update visa set v_status = 1 where v_status = 0";
    $check = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($check, MYSQLI_ASSOC);
    
?>