<?php

	session_start();

	include('dbconnection.php');
	
	if(empty($_SESSION['booking_code']))
	{
		echo "<script>alert('No Package selected.');</script>";
		echo "<script>location.href='holidays/';</script>";
	}
	else
	{
		$code = $_SESSION['booking_code'];
	}


	// if(isset($_POST['start_tour']))
	// {
	// 	$code = $_POST['booking_code'];

	// }
	// else
	// {
	// 	echo "<script>alert('Select Package');</script>";
	// 	echo "<script>location.href='holidays/';</script>";
	// }
	
	if(isset($_POST['book_package']))
    {
		$name = $_POST['pc_name'];

		$_SESSION['pc_name'] = $name;


		$email = $_POST['pc_email'];

		$_SESSION['pc_email'] = $email;


		$phn_code = $_POST['pc_phone_code'];

		$_SESSION['pc_phone_code'] = $phn_code;


		$phone = $_POST['pc_phone'];

		$_SESSION['pc_phone'] = $phone;


		$people = $_POST['pc_people'];

		$_SESSION['pc_people'] = $people;

		$p_phone = $phn_code.$phone;

		$id = rand('10000', '99999');

		$_SESSION['pc_id'] = $id;
		
		if(empty($name) && empty($email) && empty($phone) && empty($people) && empty($code))
		{
			echo "<script>alert('Some fields are Empty');</scriipt>";
		}
		else
		{




			$rand_no = rand(10000, 99999);
			$_SESSION['otp_number'] = $rand_no;
	
			$mobile_sql = "INSERT INTO mobile_numbers (mobile_number, verification_code) VALUES ('$p_phone', '$rand_no')";
			$mobile_insert = mysqli_query($link, $mobile_sql);
			
			if($mobile_insert)
			{
					  
			 
					  $curl = curl_init();
 
					  curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$p_phone&message=Hello $name. Your verification code is $rand_no.&sender=STIMULUS&country=$phn_code&otp=$rand_no",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_SSL_VERIFYHOST => 0,
					  CURLOPT_SSL_VERIFYPEER => 0,
					  CURLOPT_HTTPHEADER => array(
						 "content-type: application/json"
					  ),
					  ));
					  
					  $response = curl_exec($curl);
					  $err = curl_error($curl);
					  
					  curl_close($curl);
	
				echo "<script>alert('OTP sent to your given number. Please verify your number.');</script>";
				echo "<script>location.href='user_verification.php'</script>";
			}












			// $sdfd = "insert into package_users (pc_id, pc_name, pc_email, pc_phone) values ('$id', '$name', '$email', $phone)";
			// $ghi = mysqli_query($link, $sdfd);

			// if($ghi)
			// {
			// 	$bwo = "select * from package_booking where pc_email = '$email' and pc_phone = '$phone' and pc_people = '$people' and pc_b_code = '$code'";
			// 	$nqe = mysqli_query($link, $bwo);
			// 	$count = mysqli_num_rows($nqe);

			// 	if($count >= 1)
			// 	{
			// 		echo"<script>alert('You already booked this package. Wait until your booking expires.')</script>";  
			// 		echo "<script>location.href='holidays/'</script>";
			// 	}
			// 	else
			// 	{
			// 		$rty = "insert into package_booking (pc_id, pc_email, pc_phone, pc_people, pc_b_code) values ('$id', '$email', '$phone', '$people', '$code')";
			// 		$sef = mysqli_query($link, $rty);

			// 		if($sef)
			// 		{
			// 			echo "<script>alert('Your package is booked. Wait for admin to accept.');</script>";

			// 			unset($_SESSION['booking_code']);

			// 			echo "<script>location.href='holidays/';</script>";
			// 		}
			// 	}
			// }
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
						CONTACT DETAILS
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter a Name">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="pc_name" placeholder="Full name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter a Email ID">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="pc_email" placeholder="email address">
					<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter a number">
					<span class="label-input100">Phone</span>
						<select id="destination" class="input100" name="pc_phone_code" style="border: none;">
                              <option value="91" selected>+&nbsp;91</option>
                              <?php
                                 $mw = "select distinct phonecode from country where id <> '99' order by phonecode asc";
                                 $nw = mysqli_query($link, $mw);
                                 while($row1v = mysqli_fetch_array($nw, MYSQLI_ASSOC))
                                 {
                              ?>
                              <option value="<?php echo $row1v['phonecode'] ?>">+&nbsp;<?php echo $row1v['phonecode'] ?></option>
                              <?php } ?>
                        </select>
						<input class="input100" type="text" name="pc_phone" placeholder="XXXXXXXXXX">
					<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter a Number">
						<span class="label-input100">Total Accomodation</span>
						<input class="input100" type="text" name="pc_people" placeholder="No of people to be accomodated">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Package Code</span>
						<input class="input100" type="text" value="<?php echo $code; ?>" disabled>
						<span class="focus-input100"></span>
					</div>		

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button type="submit" name="book_package" class="contact100-form-btn">
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