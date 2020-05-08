<?php
	include('session.php');
	date_default_timezone_set("Asia/Kolkata");

	

	if(isset($_POST['add_trip']))
    {
        $people = $_POST['trip_people'];
        $place = $_POST['trip_place'];
        $date = $_POST['trip_date'];
        $time = $_POST['trip_time'];
        $food = $_POST['trip_food'];

        $new_date = date('d M, Y', strtotime($date));
        $new_date2 = date('d-m-Y', strtotime($date));

        $ho_book_id = $ta_id_session.$place.$food.$time.$new_date2;
        
        
        if(isset($_FILES['trip_doc']))
        {
            $file_name = $_FILES['trip_doc']['name'];
            $file_size =$_FILES['trip_doc']['size'];
            $file_tmp =$_FILES['trip_doc']['tmp_name'];
            $file_type=$_FILES['trip_doc']['type'];
            
            
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
                    $trip_sql = "insert into agent_trips (trip_agent_id, trip_people, trip_place, trip_food, trip_date, trip_time, trip_doc) 
					values ('$ta_id_session', '$people', '$place', '$food', '$new_date', '$time', '$nl')";
		            $run_trip = mysqli_query($link, $trip_sql);
		            
		            if($run_trip)
                    {
                    	$rty = "select * from hotel_update";
                    	$gwh = mysqli_query($link, $rty);
                    	$row_rty = mysqli_fetch_array($gwh, MYSQLI_ASSOC);
            
                    	if($ho_book_id != $row_rty['ho_book_id'])
                    	{
            
                    		$hotel_update_sql = "insert into hotel_update (ho_book_id, food_type, location, time, date) values ('$ho_book_id', '$food', '$place', '$time', '$new_date2')";
                    		mysqli_query($link, $hotel_update_sql);
                    	}
                    	
                    	echo "<script>alert('New Trip Added');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Something wrong with document. Try again.');</script>";
                }
            }
            
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
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800,900&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="nav_header">
      <a href="index.php"><div class="logo">
         </div></a>
      </div>
      <div class="main1">
      <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Add New Trip
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Destination</span>
					<select class="selection-2" name="trip_place">
					<?php
                    $places = "select * from places";
                    $get_places = mysqli_query($link, $places);
                    while($row_p = mysqli_fetch_array($get_places, MYSQLI_ASSOC))
                    {
                ?>
                    <option value="<?php echo $row_p['pl_id']; ?>"><?php echo $row_p['pl_name']; ?></option>
                <?php } ?>
                </select>
					<span class="focus-input100"></span>
				</div>



				<div class="wrap-input100 validate-input" data-validate = "Enter a number">
					<span class="label-input100">Quantity</span>
					<input class="input100" type="number" name="trip_people" placeholder="No of people to be accomodated">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter a number">
					<span class="label-input100">Date</span>
					<input class="input100" type="date" name="trip_date" placeholder="No of people to be accomodated">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Type of food</span>
					<div>
						<select class="selection-2" name="trip_food">
                        <?php
                            $food_type = "select * from food_type";
                            $get_food_type = mysqli_query($link, $food_type);
                            while($row_f = mysqli_fetch_array($get_food_type, MYSQLI_ASSOC))
                            {
                        ?>
                            <option value="<?php echo $row_f['food_type_id']; ?>"><?php echo $row_f['food_type_name']; ?></option>
                        <?php } ?>
                        </select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Time</span>
					<div>
						<select class="selection-2" name="trip_time">
						<?php
                                $t_time = "select * from time";
                                $t_run = mysqli_query($link, $t_time);
                                while($times = mysqli_fetch_array($t_run, MYSQLI_ASSOC))
                                {
                        ?>
							<option value="<?php echo $times['time_id']; ?>"><?php echo $times['time_time']; ?></option>
						<?php } ?>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

			 	<div class="wrap-input100 validate-input">
					<span class="label-input100">Documents</span>
					<input class="input100" type="file" name="trip_doc">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" name="add_trip" class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>


      <div class="side">

         <div class="bg3 pure-g">
            <div class="pure-u-1-1 inner c1">
              <div class="p_inner"><a id="bookings" style="text-decoration: none; color: #fff;">BACK</a></div>
            </div>
            <div class="pure-u-1-1 inner c2">
               <div class="p_inner">
               <a  href="addtrip.php" >ADD NEW</a>
                  <a href="visa_requests.php" id="visa"><span id="datacount"></span></a>
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
                  				
                  <a class="menu_c menu_item">Hello, <?php echo $ta_name_session; ?></a>
                  <a style="text-decoration: none; font-size: 25px; color: #fff; font-weight: 700;" href="logout.php">&#10006;</a>
               </div>
            </div>
         </div>

</div>
      </div>
      <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>

	<script src="js/main.js"></script>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="../../assets/js/fittext.js"></script>
   <script src="../../assets/js/hover.js"></script>
   <script>
      $(document).ready(function(){
      $("#bookings").click(function(){
         location.href = "./";
      });
      $("#visapage").click(function(){
         $(".p1").load("addtrip.php");
      });
      });
   </script>
  
</html>