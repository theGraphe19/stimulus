<?php

        include('../../dbconnection.php');
        
        
        if(isset($_GET['dates']) && isset($_GET['id']))
        {
            $date = $_GET['dates'];
            $id = $_GET['id'];
            $bvn = "delete from holiday_packages_dates where ho_dates_id = '$date'";
            $bty = mysqli_query($link, $bvn);
            
            echo "<script>alert('Date removed');</script>";
            echo "<script>location.href='edit_package.php?ho_id=$id';</script>";
        }
        
        
        
        if(isset($_GET['includes']) && isset($_GET['id2']))
        {
            $includes = $_GET['includes'];
            $id2 = $_GET['id2'];
            $bvn1 = "delete from holiday_packages_cost_includes where ho_in_id = '$includes'";
            $bty1= mysqli_query($link, $bvn1);
            
            echo "<script>alert('Cost Include removed');</script>";
            echo "<script>location.href='edit_package.php?ho_id=$id2';</script>";
        }
        
        
        
        if(isset($_GET['excludes'])  && isset($_GET['id3']))
        {
            $excludes = $_GET['excludes'];
            $id3 = $_GET['id3'];
            $bvn11 = "delete from holiday_packages_cost_excludes where ho_ex_id = '$excludes'";
            $bty11= mysqli_query($link, $bvn11);
            
            echo "<script>alert('Cost Exclude removed');</script>";
            echo "<script>location.href='edit_package.php?ho_id=$id3';</script>";
        }
?>