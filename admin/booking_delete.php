<?php
        include('../dbconnection.php');
        $info=$_POST['id'];

        foreach ($info as $id) {
                $id;

                $query =  "DELETE FROM `package_users` WHERE `package_users`.`pc_id` = '$id' ";
                $query1 = "DELETE FROM `package_booking` WHERE `package_booking`.`pc_id` = '$id' ";

                mysqli_query($link, $query);
                mysqli_query($link, $query1);
        }
?>
