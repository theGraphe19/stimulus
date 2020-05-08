<?php

    include('session.php');
            
    $pc_s = $_POST['pc_id'];
    $data = $_POST['data'];

    $sql3 = "update package_users set pc_status = '$data' where pc_id = '$pc_s'";
    $set1 = mysqli_query($link, $sql3);
    
    if($set1)
    {
        if($data == '2')
        {
            echo "Paid";
        }
        elseif($data == '3')
        {
            echo "Flights Booked";
        }
        elseif($data == '4')
        {
            echo "Confirmed";
        }
        else
        {
            echo "Something went wrong.";
        }
    }

?>