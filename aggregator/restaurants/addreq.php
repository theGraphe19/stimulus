<?php


include('session.php');

	date_default_timezone_set("Asia/Kolkata");

	if(isset($_POST['add_hotel']))
    {
		
        $date = $_POST['ho_date'];
        $vac = $_POST['ho_vac'];
        $food = $_POST['ho_food'];
        $time = $_POST['ho_time'];
        $msg = $_POST['ho_msg'];

        $new_date = date('d M, Y', strtotime($date));
        

        $trip_sql = "insert into hotel_set (h_id, h_name, h_date, h_food, h_time, h_vac, h_msg) values ('$h_id_session', '$h_name_session', '$new_date', '$food', '$time', '$vac', '$msg')";
		$run_trip = mysqli_query($link, $trip_sql);
		
		if($run_trip)
        {
        	echo "<script>alert('Hotel Added');</script>";
        }
    }
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
      <a href="../"><div class="logo">
         </div></a>
      </div>
      <div class="main1">
         


      <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Add Requirement
				</span>

				
				<div class="wrap-input100 validate-input" data-validate = "Enter Date">
					<span class="label-input100">Date</span>
					<input class="input100" type="date" name="ho_date" >
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Enter a number">
					<span class="label-input100">Vacancy</span>
					<input class="input100" type="number" name="ho_vac" placeholder="No of people to be accomodated">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 input100-select">
					<span class="label-input100">Type of food</span>
					<div>
						<select class="selection-2" name="ho_food">
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
               <select class="selection-2" name="ho_time">
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

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="ho_msg" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" name="add_hotel" class="contact100-form-btn">
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
               <div class="p_inner"><a style="text-decoration: none; color: #fff;">UPCOMING</a></div>
            </div>
            <div class="pure-u-1-1 inner c2">
               <div class="p_inner">
               <a href="addreq.php" >ADD REQUIREMENT</a>
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
      $("#ag").click(function(){
         alert("WIP");
      });
      $("#visapage").click(function(){
         $(".p1").load("addreq.php");
      });
      });
   </script>
  
</html>