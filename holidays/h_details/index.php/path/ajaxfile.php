<?php
    
    include('../../../../dbconnection.php');

    $code = $_POST['code'];

    $file_name = $_FILES['mypdf']['name'];
    $file_size =$_FILES['mypdf']['size'];
    $file_tmp =$_FILES['mypdf']['tmp_name'];
    $file_type=$_FILES['mypdf']['type'];
    
    
    // $image_parts = explode(";base64,", $image);
    // $image_base64 = base64_decode($image_parts[1]);
    
    $file_name = $code.'.pdf';
    
    $add = "assets/documents/".$file_name;
    move_uploaded_file($file_tmp,"../../../../assets/documents/".$file_name);

    $temp_sql = "update holiday_packages set ho_doc = '$add' where ho_code = '$code'";
    mysqli_query($link, $temp_sql);

    echo "PDF Created! You may close the tab";

?>