<?php
    include('session.php');
    
    if(isset($_POST['upload_logo']))
    {
        if(isset($_FILES['agent_logo']))
        {
            $file_name = $_FILES['agent_logo']['name'];
            $file_size =$_FILES['agent_logo']['size'];
            $file_tmp =$_FILES['agent_logo']['tmp_name'];
            $file_type=$_FILES['agent_logo']['type'];
            
            
            if($file_size > 2097152)
            {
               echo "<script>alert('File size must be less than 2 MB');</script>";
            }
            else
            {
                $gh = move_uploaded_file($file_tmp,"../../assets/documents/".$file_name);
                
                $nl = "assets/documents/".$file_name;
                
                if($gh)
                {
                    $trip_sql = "update travel_agents set ta_logo = '$nl' where ta_id = '$ta_id_session'";
                    $vet = mysqli_query($link, $trip_sql);
                    
                    if($vet)
                    {
                    	echo "<script>alert('Logo Uploaded');</script>";
                    }
                    else
                    {
                        echo "<script>alert('Logo not Uploaded');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Something wrong with document. Try again.');</script>";
                }
            }
            
        }
        else
        {
            echo "<script>alert('Choose Logo');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Travel Agents</title>
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
      <a href="index.php"><div class="logo">
         </div></a>
      </div>
      <div class="main1">
         <div class="p1">
             <div style="position: absolute; top: 20vh; left: 3vw; background: #fff; border-radius: 35px; padding: 10px;">
                 <div style="margin: 20px;">
                     <?php
                        $gh = "select * from travel_agents where ta_id = '$ta_id_session'";
                        $nb = mysqli_query($link, $gh);
                        $rty = mysqli_fetch_array($nb, MYSQLI_ASSOC);
                        
                        if($rty['ta_logo'] === "")
                        {
                     ?>
                        <span>No Logo found. Upload your Logo</span>
                        <?php } else { ?>
                        
                        <img src="../../<?php echo $rty['ta_logo']; ?>" width="100">
                        
                        <?php } ?>
                 </div>
                 <form method="post" enctype="multipart/form-data" style="margin: 20px;">
                     <input type="file" name="agent_logo">
                     <br><br>
                     <input type="submit" value="Upload" name="upload_logo">
                 </form>
             </div>
            <p class="p2">Please select an option
            <br/>from the side panel</p>
         </div>


      <div class="side">

         <div class="bg3 pure-g">
            <div class="pure-u-1-1 inner c1">
               <div class="p_inner"><a id="bookings" style="text-decoration: none; color: #fff;">BOOKINGS</a></div>
            </div>
            <div class="pure-u-1-1 inner c2">
               <div class="p_inner">
               <a  href="addtrip.php" >ADD NEW</a>
                  <a href="visa_requests.php" id="visa"><span id="datacount"></span></a>
               </div>
               
            </div>
            <div class="pure-u-1-1 inner c3">
               <div class="p_inner"><a id="ag" style="text-decoration: none; color: #fff;">COMPLETED<br>BOOKINGS</a></div>
            </div>
            <div class="p_inner">
            </div>
         </div>
         <div class="nav_right">
            <div class="menu_con">
               <div class="rotate_con">
                  				
                  <a class="menu_c menu_item">Hello, <?php echo $ta_name_session; ?></a>
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
      $("#bookings").click(function(){
         $(".p1").load("all.php");
      });
      $("#visapage").click(function(){
         $(".p1").load("addtrip.php");
      });
      });
   </script>
  
</html>