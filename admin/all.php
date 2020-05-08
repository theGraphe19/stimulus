<!DOCTYPE html>
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
				
			
--><?php
    include('session.php');

    $sql = "select * from hotel_set";
    $rt = mysqli_query($link, $sql);
    while($ty = mysqli_fetch_array($rt, MYSQLI_ASSOC))
    {
?>

	   <div class="pure-g container2">
    	
		   
		   
		   <div class="list1 pure-1-1">
		   <div class="pure-u-1-1 p7 cont" id="carosal">
			 <div class="pure-u-2-5 p22" style="color:black !important">ID : <?php echo $ty['h_id']; ?></div>
			   <div class="pure-u-3-5 p22" style="color:black !important"> <?php echo $ty['h_date']; ?></div> <br>
			   
			<div class="p10"> <?php echo $ty['h_name']; ?></div><br> 
			   
			<div style="font-weight: 900; font-size:4vw;">
				<img src="tag.png" class="imgs"/>
				<span style="vertical-align: middle;"><?php echo $ty['h_vac']; ?><span style="font-size:1.1vw !important; ">&nbsp;&nbsp;vacancy </span></span>
			</div>

			<div style="font-weight: 900; font-size:1.2vw;">
				<br/>
				<span style="vertical-align: middle;">Remarks : <?php echo $ty['h_msg']; ?></span>
			</div>
			 
			   
		   </div> 	   
		</div>
		   
		 





<?php
    }
?>

		
		   
		
		   
		   
	   </div>
	   
		
		
			
		</div>

		







	</main>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	
<!--	<script src="js/script.js"></script>-->





	<script>
  		
	</script>

</html>