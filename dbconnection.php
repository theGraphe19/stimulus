<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root'); //stimu92x_admin
 define('DB_PASSWORD', ''); //Stimulus@2020!
 define('DB_NAME', 'stimulus'); //stimu92x_stimulus

 //   define('DB_SERVER', 'localhost');
   // define('DB_USERNAME', 'stimu92x_admin'); //stimu92x_admin
    //define('DB_PASSWORD', 'Stimulus@2020!'); //Stimulus@2020!
    //define('DB_NAME', 'stimu92x_stimulus'); //stimu92x_stimulus
    
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>