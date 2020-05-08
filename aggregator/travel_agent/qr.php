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
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,800,900&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="nav_header">
      <a href="index.php"><div class="logo">
         </div></a>
      </div>
      <div class="main1">
      

                            <div class="container" style="margin-top: 15vh; padding: 1%;">
                                <div class="row">
                                    <div class="col-md-6 text-center" style="padding: 2%; color: #fff;">
                                            Travel Company : 
                                            <br>
                                            Batch No : 
                                            <br>
                                            QR Code Count :
                                    </div>
                                    <div class="col-md-6 text-center" style="padding: 2%;">
                                        <img src="https://i.dlpng.com/static/png/5459360-github-endroid-qr-code-qr-code-generator-qr-code-png-320_320_preview.png" width="80">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="https://i.dlpng.com/static/png/5459360-github-endroid-qr-code-qr-code-generator-qr-code-png-320_320_preview.png" width="150">
                                    </div>
                                </div>
                            </div>

     
      </div>
      

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>

	<script src="js/main.js"></script>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="../../assets/js/fittext.js"></script>
   <script src="../../assets/js/hover.js"></script>
  
</html>