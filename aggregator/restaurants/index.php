<?php
    include('session.php');
    
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Restaurants</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css"  crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../../assets/css/admin.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
   </head>
   <body>
      <div class="nav_header">
      <a href="../"><div class="logo">
         </div></a>
      </div>
      <div class="main1">
         <div class="p1">
            <p class="p2">Please select an option
            <br/>from the side panel</p>
         </div>


      <div class="side">

         <div class="bg3 pure-g">
            <div class="pure-u-1-1 inner c1">
               <div class="p_inner"><a id="hot" style="text-decoration: none; color: #fff;">UPCOMING</a></div>
            </div>
            <div class="pure-u-1-1 inner c2">
               <div class="p_inner">
               <a  href="addreq.php" >ADD REQUIREMENT</a>
               </div>
               
            </div>
            <div class="pure-u-1-1 inner c3">
               <div class="p_inner"><a id="ag" href="#" style="text-decoration: none; color: #fff;">COMPLETED<br>BOOKINGS</a></div>
            </div>
            <div class="p_inner">
            </div>
         </div>
         <div class="nav_right">
            <div class="menu_con">
               <div class="rotate_con">
                  				
                  <a class="menu_c menu_item">Hello, <?php echo $h_name_session; ?></a>
                  <a style="text-decoration: none; font-size: 25px; color: #fff; font-weight: 700;" href="logout.php">&#10006;</a>
               </div>
            </div>
         </div>

</div>
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="../../assets/js/fittext.js"></script>
   <script src="../../assets/js/hover.js"></script>
   <script>
      $(document).ready(function(){

         
      $("#hot").click(function(){
         $(".p1").load("all.php");
      });

      $("#ag").click(function(){
         alert("WIP");
      });
      $("#visapage").click(function(){
         $(".p1").load("addreq.php");
      });
      });
   </script>
  
</html>