<?php
   session_start();
   include('../dbconnection.php');
   
   $user_check = $_SESSION['booking_login'];
   
   $ses_sql = mysqli_query($link, "select * from package_users where pc_email = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $booking_email_session = $rows['pc_email'];
   $booking_id_session = $rows['pc_id'];
   $booking_name_session = $rows['pc_name'];

   //$login_session2 = $rows['admin_img'];

   if(!isset($_SESSION['booking_login'])){
        echo "<script type='text/javascript'>alert('First Login');</script>";
        header("location:login.php");
        die();
   }
?>