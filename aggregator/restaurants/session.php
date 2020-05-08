<?php
   session_start();
   include('../../dbconnection.php');
   
   $user_check = $_SESSION['h_login'];
   
   $ses_sql = mysqli_query($link, "select * from hotels where h_email = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $h_id_session = $rows['h_id'];
   $h_name_session = $rows['h_name'];

   //$login_session2 = $rows['admin_img'];

   if(!isset($_SESSION['h_login'])){
        echo "<script type='text/javascript'>alert('First Login');</script>";
        header("location:login.php");
        die();
   }
?>