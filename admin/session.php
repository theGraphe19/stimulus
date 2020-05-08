<?php
   session_start();
   include('../dbconnection.php');
   
   $user_check = $_SESSION['admin_login'];
   
   $ses_sql = mysqli_query($link, "select * from admin where username = '$user_check' ");
   
   $rows = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $username_session = $rows['username'];
   $id_session = $rows['id'];
   $name_session = $rows['name'];
   $rights = $rows['rights'];
   
   // print_r($rights);

   //$login_session2 = $rows['admin_img'];

   if(!isset($_SESSION['admin_login'])){
        echo "<script type='text/javascript'>alert('First Login');</script>";
        header("location:login.php");
        die();
   }
?>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
         var rights = "<?php echo $rights?>";
         var rightArr = rights.split('-');
         var permissions = ['r11', 'r12', 'r13', 'r21', 'r22', 'r23', 'r24', 'r25', 'r31', 'r32', 'r33'];

         // console.log(rightArr);
         if (rightArr.length > 9){
            permissions = ['r11', 'r12', 'r13', 'r21', 'r22', 'r23', 'r24', 'r25', 'r31', 'r32', 'r33'];
         } else {
            for(var i = 0; i<rightArr.length; i++) {
               for(var j = 0; j<permissions.length; j++) {
                  if(rightArr[i] == permissions[j]) {
                     permissions.splice(j, 1);
                  }
               }
            }
         }
         // console.log(permissions);
</script>
<?php $_SESSION['permissions'] = '<script>document.write(permissions)</script>';?>
