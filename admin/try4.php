<?php
      include('session.php');
      $info=$_POST['h_id'];

      $h_name = $_POST['valuess'][0];
      //$food = $_POST['valuess'][3];
      //$location = $_POST['valuess'][1];
      $phone = $_POST['valuess'][2];
      $email = $_POST['valuess'][1];
      //$cap = $_POST['valuess'][5];

      $sql = "update hotels set h_name = '$h_name', h_email = '$email', h_phn = '$phone' where h_id = '$info'";
      $run = mysqli_query($link, $sql);
?>