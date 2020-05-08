<?php
   include('session.php');
   
//   if(isset($_POST['hotel_update']))
//   {
//       $total_confirmed = $_POST['total_confirmed'];
//       $ho_book_id1 = $_POST['ho_book_id'];

//       $lqs = "update hotel_update set total_confirmed = '$total_confirmed' where ho_book_id = '$ho_book_id1'";
//       $nur = mysqli_query($link, $lqs);
//       if($nur)
//       {
//          echo "<script>alert('Updated');</script>";
//       }
//   }
?>
<!DOCTYPE html>
<html style="background-color:rgb(52, 68, 127);">
   <head>
      <meta charset="UTF-8">
      <title>Stimulus home</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/hotel_booking.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div class="main1">
         <div class="box-conatiner" style="width:100vw;">
         	<?php
         			$trip = "select * from agent_trips";
                  $run_trip = mysqli_query($link, $trip);
                  
                    while($row_trip = mysqli_fetch_array($run_trip, MYSQLI_ASSOC)) 
         			{
                     $trip_agent = $row_trip['trip_agent_id'];
         				$trip_date = $row_trip['trip_date'];
         				$trip_loc = $row_trip['trip_place'];
                     $trip_food = $row_trip['trip_food'];
                     $trip_time = $row_trip['trip_time'];
                     
                     

                    $ho_book_id = $row_trip['trip_agent_id'].$trip_loc.$trip_food.$trip_time.date('d-m-Y',strtotime($trip_date));

                  
                     echo "<script>alert('$trip_time');</script>";
                     
                     
                     
                     
                     
              $sql = "select *, sum(h_capacity) from hotels where h_food_type = '$trip_food' and h_location = '$trip_loc' group by h_food_type, h_location";
         		$run = mysqli_query($link, $sql);
         		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC))
         		{
         			 $loc = $row['h_location'];
         			 $foo = $row['h_food_type'];

         			// $sql1 = "select *, sum(trip_people) from agent_trips where trip_place = '$loc' and trip_date = '$trip_date' and trip_food = '$foo'";
         			// $run1 = mysqli_query($link, $sql1);
                  // $row1 = mysqli_fetch_array($run1, MYSQLI_ASSOC);
                  


                  $hwk = "select * from hotels where h_food_type = '$trip_food' and h_location = '$trip_loc'";
                  $hqh = mysqli_query($link, $hwk);

                  while($rowbc = mysqli_fetch_array($hqh, MYSQLI_ASSOC))
                  {
                     $get_ho = $rowbc['h_id'];
                     $get_cap = $rowbc['h_capacity'];

                     $ner = $ho_book_id.'-'.$get_ho;

                     $hwkr = "select * from hotel_booking where ho_book_id = '$ner' and hotel_reser_date = '$trip_date'";
                     $hqhr = mysqli_query($link, $hwkr);
                     $fjhd = mysqli_fetch_array($hqhr, MYSQLI_ASSOC);
                     
                     echo "<script>alert('$ner');</script>";

                     if($ner != $fjhd['ho_book_id'])
                     {
                        $newyu = $ho_book_id.'-'.$get_ho;
                        echo "<script>alert('$trip_time');</script>";
                        $ho = "insert into hotel_booking (ho_book_id, hotel_id, hotel_reser_date, hotel_food_type, hotel_time, hotel_location, hotel_capacity, hotel_reserved_seat)
                                 values ('$newyu', '$get_ho', '$trip_date', '$trip_food', '$trip_time', '$trip_loc', '$get_cap', '0')";
                        $gh = mysqli_query($link, $ho);
                        if($gh)
                        {
                           echo "<script>alert('rohit');</script>";
                        }
                     }

                  }

			?>
            <div class=" box-inner">
               <div class="pure-g">
                  <div class="pure-u-1-3 t1" style="text-align:left;" >

                  	<?php

                        $sql2 = "select * from places where pl_id = '$loc'";
         					$run2 = mysqli_query($link, $sql2);
         					$row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);


         					$sql3 = "select * from food_type where food_type_id = '$foo'";
         					$run3 = mysqli_query($link, $sql3);
                        $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);
                        
                        $sql333 = "select * from time where time_id = '$trip_time'";
         					$run333 = mysqli_query($link, $sql333);
         					$row333 = mysqli_fetch_array($run333, MYSQLI_ASSOC);
                  	?>

                     <div> <?php echo $row2['pl_name']; ?></div>
                     <span><?php echo $row3['food_type_name']; ?></span>
                  </div>
                  <div class="pure-u-1-3 t2">
                     <div><?php echo $trip_date; ?> </div>
                  </div>
                  
                  <div class="pure-u-1-3 t2">

                        <?php
                                 $sql22 = "select * from travel_agents where ta_id = '$trip_agent'";
                                 $run22 = mysqli_query($link, $sql22);
                                 $row22 = mysqli_fetch_array($run22, MYSQLI_ASSOC);
                        ?>
                        <div><?php echo $row22['ta_name']; ?> </div>
                        <div><?php echo $row333['time_time']; ?> </div>
                  </div>
               </div>
               <!-- row1 -->
               <div class="pure-g">
                  <div class="pure-u-1-4 t3">
                     <div><?php echo $row['sum(h_capacity)']; ?> </div>
                     <span>available</span>
                  </div>
                  <div class="pure-u-1-4 t3">
                     <div> <?php echo $row_trip['trip_people']; ?> </div>
                     <span>recieved</span>
                  </div>
                  
                  <div class="pure-u-1-4 t3">

                     <?php
                           $total_seat1 = $row['sum(h_capacity)'];
                           $total_people1 = $row_trip['trip_people'];

                           $lqs1 = "update hotel_update set total_seat = '$total_seat1', total_people = '$total_people1' where ho_book_id = '$ho_book_id'";
                           $nur1 = mysqli_query($link, $lqs1);


                           $qwe = "select * from hotel_update where ho_book_id = '$ho_book_id'";
                           $qwer = mysqli_query($link, $qwe);
                           $row_qwe = mysqli_fetch_array($qwer, MYSQLI_ASSOC);

                           
                     ?>

                     <div> <?php echo $row_qwe['total_confirmed']; ?> </div>
                     <span>confirmed</span>
     
                  </div>

                  <div class="pure-u-1-4 t3">
                     <div> <?php echo $row_qwe['total_people'] - $row_qwe['total_confirmed']; ?> </div>
                     <span>remaining</span>
                  </div>




                  <!-- <div class="pure-u-1-4 t4">
                     <form method="post" enctype="multipart/form-data">
                        <div>
                           <input type="text" name="total_confirmed" class="place">
                           <input type="text" name="ho_book_id" value="<?php echo $ho_book_id; ?>" class="place" hidden>
                        </div>
                        <span><button type="submit" name="hotel_update" class="pure-button btn btn1">confirm</button></span>
                     </form>
                  </div> -->
               </div>

                    
               <!-- row2 -->
               <div class="pure-g">
                  <button type="submit" class="pure-button pure-u-1-1 btn btn2" onclick="window.open('hotel_update.php?ho_book_id=<?php echo $ner; ?>' );">View Order Details</button>
               </div>
            </div>
              <?php }
         
         
                     
         
         
         }?>
         <div class="spacer">
            
               

         </div>
            <!-- box-inner -->
         </div>


         <!-- container end -->
      </div>
      <!-- main1 end -->
   </body>
</html>