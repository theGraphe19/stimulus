<?php
   session_start();
   include('../dbconnection.php');
   
   $user_check = $_SESSION['tourist_login'];
   
   $ses_sql = mysqli_query($link, "select * from visa where v_email = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $email_session = $rows['v_email'];
   $id_session = $rows['v_id'];
   $name_session = $rows['v_name'];

   //$login_session2 = $rows['admin_img'];

   if(!isset($_SESSION['tourist_login'])){
        echo "<script type='text/javascript'>alert('First Login');</script>";
        header("location:login.php");
        die();
   }
?>