<?php
   include('session.php');

   // if(isset($_POST['upload_docs']))
   // {
   //    if(isset($_FILES['file-6']))
   //    {
   //       $file_ary = reArrayFiles($_FILES['file-6']);
     
   //       foreach ($file_ary as $file) {
   //           print 'File Name: ' . $file['name'];
   //           print 'File Type: ' . $file['type'];
   //           print 'File Size: ' . $file['size'];
   //       }
   //   }
   // }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Stimulus home</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/tourist.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
      <link rel="stylesheet" type="text/css" href="upload/css/normalize.css" />
      <link rel="stylesheet" type="text/css" href="upload/css/demo.css" />
      <link rel="stylesheet" type="text/css" href="upload/css/component.css" />
      <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
      <style>
         .gear
         {
         width: 50px;
         }
      </style>
   </head>
   <body>
      <div class="nav_header">
         <div class="logo">
         </div>
      </div>
      <div class="main1">


            <?php
               $sql = "select * from package_users where pc_id = '$booking_id_session'";
               $get = mysqli_query($link, $sql);
               $row = mysqli_Fetch_array($get, MYSQLI_ASSOC);

            ?>



         <div class="pure-g p1">
               <div class="pure-u-1-3 p2" style="text-align: right;">
                  <div><?php echo $row['pc_name']; ?></div>
               </div>
               <div class="pure-u-1-3 p2">
                  <div><?php echo $row['pc_phone']; ?></div>
               </div>
               <div class="pure-u-1-3 p2" style="text-align: left;">
                  <div><?php echo $row['pc_email']; ?></div>
               </div>
            <?php
               $sql1 = "select * from package_booking where pc_id = '$booking_id_session'";
               $get1 = mysqli_query($link, $sql1);
               while($row1 = mysqli_Fetch_array($get1, MYSQLI_ASSOC))
               {
            ?>

            <div class="list pure-1-1">
               <div class="pure-u-1-1 p2">
                  <div>Package Code : <?php echo $row1['pc_b_code']; ?></div>
               </div>
               <div class="pure-u-1-4 p2">
                  <div>
                     <?php
                        if($row['pc_status'] >= 1)
                        {
                        	echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                        	echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;">Accepted</span>
                  </div>
               </div>
               <div class="pure-u-1-4 p2">
                  <div>
                     <?php
                        if($row['pc_status'] >= 2)
                        {
                        	echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                        	echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;">Paid</span>
                  </div>
               </div>
               <div class="pure-u-1-4 p2">
                  <div>
                     <?php
                        if($row['pc_status'] >= 3)
                        {
                           echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                           echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;">Flights Booked</span>
                  </div>
               </div>
               <div class="pure-u-1-4 p2">
                  <div>
                     <?php
                        if($row['pc_status'] >= 4)
                        {
                           echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                           echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;">Confirmed</span>
                  </div>
               </div>
               
               
                     <?php } ?>
               
               
               
               
               <div style="position: fixed; display: flex; top: 10vh; right: 3vh; width: 60px; height: 60px; background-color: #fff">
                        <a href="logout.php" style="margin: 0 auto; color: #000; font-size: 35px; text-decoration: none;">&#10539;</span>
               </div>









            </div>
         </div>
      </div>
      </div>
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="upload/js/custom-file-input.js"></script>
   <script type="text/javascript"></script>
</html>