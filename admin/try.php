<?php
            include('../dbconnection.php');
$info=$_POST['id'];


foreach ($info as $id) {
    $id;

        $rt = "delete from travel_agents where ta_id = '$id'";
        mysqli_query($link, $rt);
}

?>