<?php
    include('session.php');
    
    $sql = "select count(*) from visa where v_status = 0";
    $check = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($check, MYSQLI_ASSOC);

    if($row['count(*)'] === '0')
    {
        echo "";
    }
    else
    {
        echo $row['count(*)'];
    }
?>