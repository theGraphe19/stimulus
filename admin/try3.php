<?php
        include('../dbconnection.php');
        $info=$_POST['id'];

        foreach ($info as $id) {
                $id;

                $query =  "DELETE FROM `visa` WHERE `v_id` = '$id' ";

                mysqli_query($link, $query);
        }
        
        // include('session.php');
        l
        // $info=$_POST['id'];

        // $com_name = $_POST['values'][1];
        // $name = $_POST['values'][0];
        // $email = $_POST['values'][2];
        // $phone = $_POST['values'][3];

        // //$array1 = array($name => $_POST['ta_name'], $com_name = $_POST['ta_com_name'], $email => $_POST['ta_email'], $phone => $_POST['ta_phn']);

        // $sql = "update travel_agents set ta_com_name = '$com_name', ta_name = '$name', ta_email = '$email', ta_phn = '$phone' where ta_id = '$info'";
        // $run = mysqli_query($link, $sql);

?>