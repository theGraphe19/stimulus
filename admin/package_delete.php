<?php
      include('session.php');
      
      $info=$_POST['id'];

      $sql = "delete from holiday_packages where ho_id = '$info'";
      $run = mysqli_query($link, $sql);
      
      $sql1 = "delete from holiday_packages_cost_excludes where ho_id = '$info'";
      $run1 = mysqli_query($link, $sql1);
      
      $sql2 = "delete from holiday_packages_cost_includes where ho_id = '$info'";
      $run2 = mysqli_query($link, $sql2);
      
      $sql3 = "delete from holiday_packages_country where ho_id = '$info'";
      $run3 = mysqli_query($link, $sql3);
      
      $sql4 = "delete from holiday_packages_dates where ho_id = '$info'";
      $run4 = mysqli_query($link, $sql4);
      
      $sql5 = "delete from holiday_packages_itineary where ho_id = '$info'";
      $run5 = mysqli_query($link, $sql5);
?>