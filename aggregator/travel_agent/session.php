<?php
   session_start();
   include('../../dbconnection.php');
   
   $user_check = $_SESSION['ta_login'];
   
   $ses_sql = mysqli_query($link, "select * from travel_agents where ta_email = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $ta_id_session = $rows['ta_id'];
   $ta_name_session = $rows['ta_name'];

   //$login_session2 = $rows['admin_img'];

   if(!isset($_SESSION['ta_login'])){
        echo "<script type='text/javascript'>alert('First Login');</script>";
        header("location:login.php");
        die();
   }
?>