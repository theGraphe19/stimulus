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
<html lang="en">
<head>
	<title>Add Order</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
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


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Add Requirement
				</span>

				
				<div class="wrap-input100 validate-input" data-validate = "Enter a number">
					<span class="label-input100">Date</span>
					<input class="input100" type="date" name="ho_date" placeholder="No of people to be accomodated">
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
							<option>Select time</option>
							<option>0900-1000 hrs</option>
							<option>1000-1100 hrs</option>
							<option>1100-1200 hrs</option>
							<option>1200-1300 hrs</option>
							
							<option>1600-1700 hrs</option>
							<option>1700-1800 hrs</option>
							<option>1800-1900 hrs</option>
							<option>1900-2000 hrs</option>
							<option>2100-2200 hrs</option>
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
</html>
