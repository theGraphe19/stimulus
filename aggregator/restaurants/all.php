
<?php
    include('session.php');

  
        // $id = $_POST['booking_id'];
        // $remarks= $_POST['remarks'];

        // $rt = "update hotel_booking set hotel_remarks = '$remarks' where ho_book_id = '$id'";
        // $er = mysqli_query($link, $rt);
        // if($er)
        // {
        //     echo "<script>alert('Remarks Updated');</script>";
        // }
   
?>






<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Stimulus home</title>
		
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
		<link rel="stylesheet" href="css/all.css">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
	<main>
		
		<!---holiday & visa-->
		<div class="main2">
			


<!-- 			</div>-->
			
<!--			<div class="bg1 hd "></div>-->
			<div class="bg2 vs">
<!--
			<div class="vs-inner pure-g" >
				
				<div class="pure-u-3-8 p1" style="text-align:right;">

					<p>GET YOUR VISA </p>
					<div class="pure-u-1-1 p22">PROCESSED</div>
				</div>

				<div class="pure-u-2-8 p3" style="margin:auto 2.5vw;">
					<p>&</p>	
				</div>	
				
				<div class="pure-u-3-8 p1">
					<p>DROPPED AT YOUR</p>	
				<div class="pure-u-1-1 p22">DOORSTEP</div>
				</div>

			</div>
				
			
-->


<?php
    $sql = "select * from hotel_booking where hotel_id = '$h_id_session'";
    $run = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($run))
    {
            $loc = $row['hotel_location'];
            $foo = $row['hotel_food_type'];
            $dat = $row['hotel_reser_date'];


            $sql2 = "select * from places where pl_id = '$loc'";
            $run2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
            
            
            $sql3 = "select * from food_type where food_type_id = '$foo'";
            $run3 = mysqli_query($link, $sql3);
            $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);


            $rt = $row['ho_book_id'];
            $fgg = substr($rt, 0, 13);
            $sql4 = "select * from agent_trips where trip_agent_id = '$fgg' and trip_date = '$dat'";
            $run4 = mysqli_query($link, $sql4);
            $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
?>


	   <div class="pure-g container2">
    	
		   
		   
		   <div class="list1 pure-1-1">
		   <div class="pure-u-1-1 p7 cont" id="carosal">
			 <div class="pure-u-2-5 p22" style="color:black !important">Total : <?php echo $row['hotel_capacity']; ?></div>
			   <div class="pure-u-3-5 p22" style="color:black !important"> <?php echo $row3['food_type_name']; ?></div> <br>
			   
			<div class="p10"> <?php echo $row['hotel_reser_date']; ?></div><br> 
			   
			<div style="font-weight: 900; font-size:4vw;">
				<img src="tag.png" class="imgs"/>
				<span style="vertical-align: middle;"><?php echo $row['hotel_reserved_seat']; ?><span style="font-size:1.1vw !important; ">&nbsp;&nbsp;reserved </span></span>
			</div>
			<div style="font-weight: 900; font-size:4vw;">
				<img src="tag.png" class="imgs"/>
				<span style="vertical-align: middle;"><?php echo  $row['hotel_capacity']-$row['hotel_reserved_seat']; ?><span style="font-size:1.1vw !important; ">&nbsp;&nbsp;remaining </span></span>
			</div>

			<div style="font-weight: 900; font-size:1.2vw;">
				<br/>
				<span style="vertical-align: middle;"><?php echo $row4['trip_time']; ?></span>
			</div>

			<div style="font-weight: 900; font-size:1.2vw;">
				<br/>
				<span style="vertical-align: middle;">Remarks : <?php echo $row['hotel_remarks']; ?></span>
			</div>
			 
			 <div style="font-weight: 900; font-size:1.2vw;">
				<form >
        			<input type="text" id="booking_id" name="booking_id" value="<?php echo $row['ho_book_id']; ?>" hidden>
       				<textarea name="remarks" id="remarks" value="<?php echo $row['hotel_remarks']; ?>" placeholder="Enter your remarks"></textarea></form>
        			<button id="update_remarks"  value="update" data-updtid="<?php echo $row['ho_book_id']; ?>" name="set_remarks">update</button>
				</form>
			</div>
			   
<?php
    }
?>
		   </div> 	   
		</div>
		   
		 



	
		   
		
		   
		   
	   </div>
	   
		
		
			
		</div>

		







	</main>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	
<!--	<script src="js/script.js"></script>-->





	<script>


	$("#update_remarks").click(function(){


			var id=$("#update_remarks").attr('data-updtid');
			var b=$("#remarks").val();



            $.post("updt_remarks.php",
            {
               id: id,
               remarks: b

            },
            function(data, status){
               
               $(".p1").load("all.php");
            });


    });
  		
	</script>

</html>