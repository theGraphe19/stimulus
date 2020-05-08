<?php
    include('session.php');
    

    $com_name = trim($_POST['ta_com_name']);
    $name = trim($_POST['ta_name']);
    $phn = trim($_POST['ta_phn']);
    $email = trim($_POST["ta_email"]);

    $sql = "update travel_agents set ta_com_name = '$com_name', ta_name = '$name', ta_email = '$email', ta_phn = '$phn' where ta_id = 0";
    $check = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($check, MYSQLI_ASSOC);


    echo"yolo";
    
?>