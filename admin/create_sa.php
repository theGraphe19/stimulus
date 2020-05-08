<?php

include('session.php');

    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $values = $_POST['values'];

    $enc_password =  md5($password);
    // $name = "Sayantani";
    // $uname = "Sayantani";
    // $password = "sanny67";
    // $values = ['r21', 'r25', 'r32', 'r11'];

    $valuestr = implode('-', $values);
    // echo $valuestr;

    $query = "INSERT INTO `admin`(`name`, `username`, `password`, `rights`) VALUES ('$name', '$uname', '$enc_password', '$valuestr')";
    mysqli_query($link, $query);

    // if (mysqli_query($link, $query)){
    //     echo "console.log('Success');";
    // } else {
    //     echo "Error : ". mysqli_error($link);
    // }
    
    // $valuearr = explode('-', $valuestr);

?>