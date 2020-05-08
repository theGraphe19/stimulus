<?php
   include('../dbconnection.php');
   
   $ho_book_id = $_GET['ho_book_id'];
   echo "<script>alert('$ho_book_id');</script>";
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Stimulus home</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/hotel_update.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div class="main1">
         <div class="box-conatiner">
            <?php
               $eeee = substr($ho_book_id, 0, 28);
               $sql = "select * from hotel_update where ho_book_id = '$eeee'";
               $run = mysqli_query($link, $sql);
               $row = mysqli_fetch_array($run, MYSQLI_ASSOC);
               
               
               $loc = $row['location'];
               $foo = $row['food_type'];
               $dat = $row['date'];
               $tim = $row['time'];
               
               
               $date_tmp = date_create($dat);
                 
               $new_date = date_format($date_tmp, "d M, Y");
               
               $sql2 = "select * from places where pl_id = '$loc'";
               $run2 = mysqli_query($link, $sql2);
               $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
               
               
               $sql3 = "select * from food_type where food_type_id = '$foo'";
               $run3 = mysqli_query($link, $sql3);
               $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);

               $sql3n = "select * from time where time_id = '$tim'";
               $run3n = mysqli_query($link, $sql3n);
               $row3n = mysqli_fetch_array($run3n, MYSQLI_ASSOC);
               
               $eee = substr($ho_book_id, 0, 13);
               $sql4 = "select * from agent_trips where trip_agent_id = '$eee'";
               $run4 = mysqli_query($link, $sql4);
               $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
               
               $ta_id = $row4['trip_agent_id'];


               $sql5 = "select * from travel_agents where ta_id = '$ta_id'";
               $run5 = mysqli_query($link, $sql5);
               $row5 = mysqli_fetch_array($run5, MYSQLI_ASSOC);


               ?>
            <div class=" box-inner">
               <div class="pure-g">
                  <div class="pure-u-1-3 t1">
                     <div> <?php echo $row2['pl_name']; ?> </div>
                     <span> <?php echo $row3['food_type_name']; ?> </span>
                  </div>
                  <div class="pure-u-1-3 t1">
                     <div> <?php echo $row5['ta_name']; ?> </div>
                  </div>
                  <div class="pure-u-1-3 t2">
                     <div> <?php echo $new_date; ?> </div>
                  </div>
               </div>
               <!-- row1 -->
               <div class="pure-g">
                  <div class="pure-u-1-5 t3">
                     <div> <?php echo $row['total_seat']; ?> </div>
                     <span>total available seats</span>
                  </div>
                  <!--<div class="pure-u-1-5 t3">-->
                  <!--   <div> <?php echo $row['total_people']; ?> </div>-->
                  <!--   <span>recieved</span>-->
                  <!--</div>-->
                  <div class="pure-u-2-5 t3 " style="text-align:center !important;padding-top: 7vh; margin-bottom: -10vh;">
                     <div> <?php echo $row['total_confirmed']; ?> </div>
                     <span>confirmed</span>
                  </div>
                  <div class="pure-u-1-5 t3">
                     <div> <?php echo $row['total_seat'] - $row['total_confirmed']; ?> </div>
                     <span>seats remaning</span>
                  </div>
                 
                  
                        <?php
                           // $agent = "select * from agent_trips where trip_agent_id = '$ta_id'";
                           // $agent_run = mysqli_query($link, $agent);
                           // $row_agent = mysqli_fetch_array($agent_run, MYSQLI_ASSOC);

                           // $new_time = $row_agent['trip_time'];

                           $sql555 = "select * from time where time_id = '$tim'";
                           $run555 = mysqli_query($link, $sql555);
                           $row555 = mysqli_fetch_array($run555, MYSQLI_ASSOC);
                        ?>
                        <div class="pure-u-1-5 t4">
                           <div> <?php echo $row555['time_time']; ?> </div>
                        </div>
                    
                 
               </div>
               
               
               <div class="pure-g">
                  <!--<div class="pure-u-1-5 t3">-->
                  <!--   <div> <?php echo $row['total_seat']; ?> </div>-->
                  <!--   <span>available</span>-->
                  <!--</div>-->
                  <div class="pure-u-1-5 t3">
                     <div> <?php echo $row['total_people']; ?> </div>
                     <span>PAX recieved</span>
                  </div>
                  <div class="pure-u-2-5 t3">
                     <!--<div> <?php echo $row['total_confirmed']; ?> </div>-->
                     <!--<span>confirmed</span>-->
                  </div>
                  <div class="pure-u-1-5 t3">
                     <div> <?php echo $row['total_people'] - $row['total_confirmed']; ?> </div>
                     <span>PAX remaning</span>
                  </div>
                 
                  
                        <?php
                           $agent = "select * from agent_trips where trip_agent_id = '$ta_id'";
                           $agent_run = mysqli_query($link, $agent);
                           $row_agent = mysqli_fetch_array($agent_run, MYSQLI_ASSOC);
                        ?>
                        <!--<div class="pure-u-1-5 t4">-->
                        <!--   <div> <?php echo $row_agent['trip_time']; ?> </div>-->
                        <!--</div>-->
                    
                 
               </div>
               
               
               <!-- row2 -->
               <div class="whitecon">
<div class="para">
                     <div class="pure-g">

                        <div class="pure-u-1-5 txt-center"></div>
                        <div class="pure-u-1-5 hd1 txt-center">Capacity</div>
                       
                        <div class="pure-u-1-5 hd2 txt-center" >Confirmed</div> 
                        <div class="pure-u-1-5 hd2 txt-center" >Remaining</div> 
                        
                        <div class="pure-u-1-5 "></div>
                     </div>



                  <?php
                     $hotel= "select * from hotels where h_food_type = '$foo' and h_location = '$loc' ";
                     $hotel_run = mysqli_query($link, $hotel);
                     while($row_hotel = mysqli_fetch_array($hotel_run, MYSQLI_ASSOC))
                     {
                     ?>
                  
                     
                     
                     <?php
                           $ri = $row_hotel['h_id'];
                           
                           echo "<script>alert('$ri');</script>";
                           $dfd = "select * from hotel_booking where hotel_id = '$ri' and ho_book_id = '$ho_book_id'";
                           $sdv = mysqli_query($link, $dfd);
                          while($dhv = mysqli_fetch_array($sdv, MYSQLI_ASSOC))
                          {
                              
                              $rt = $dhv['ho_book_id'];
                              echo "<script>alert('$rt');</script>";
                        ?>
                       
                       <form action="update3.php" method="post">
                       <div class="pure-g" >






                           <div class="pure-u-1-5 a"><?php echo $row_hotel['h_name']; ?> <span><?php echo $row_hotel['h_phn']; ?></span></div>
                              <div class="pure-u-1-5 b txt-center"><?php echo $dhv['hotel_capacity']; ?></div>
                              <div class="pure-u-1-5 b txt-center"><?php echo $dhv['hotel_reserved_seat']; ?></div>
                              <div class="pure-u-1-5 b txt-center"><?php echo $dhv['hotel_capacity']-$dhv['hotel_reserved_seat']; ?></div>
                              
                              
                              
                              
                              <div class="pure-u-1-5 c">
                                 <div>
                                    <input type="text" name="ho_id" value="<?php echo $dhv['ho_book_id']; ?>" class="place" hidden>
                                    <input type="text" name="ho_id2" value="<?php echo $dhv['hotel_id'] ?>" class="place" hidden>
                                    <input type="text" name="ho_id333" value="<?php echo $dhv['hotel_food_type']; ?>" class="place" hidden>
                                    <input type="text" name="ho_id3n" value="<?php echo $dhv['hotel_time']; ?>" class="place" hidden>
                                    <input type="text" name="ho_id444" value="<?php echo $dhv['hotel_location'] ?>" class="place" hidden>
                                    <input type="text" name="new_date" value="<?php echo $new_date; ?>" class="place"hidden >
                                    <input type="text" name="new" class="place">
                                 </div>
                              </div>
                              </div>
                              <div class="pure-g">
                                    <div class="pure-u-1-1 d" >Remarks: <?php echo $dhv['hotel_remarks']; ?> </div>
                                    <button type="submit" name="update3" class="pure-button pure-u-1-1 btn btn2">UPDATE</button>
                              </div>
                           





                        </form>
                          <?php } }?></div> 
                  <!-- para end -->
                 
                        
               <!-- whitebox -->
             
               
            </div>
            <!-- box-inner -->
         </div>
         <!-- container end -->
      </div>
      <!-- main1 end -->
   </body>
</html>