<?php
    include('session.php');
?>


<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Stimulus home</title>
		
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
		<link rel="stylesheet" href="css/all.css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
	<main>
		
		<!---holiday & visa-->
		<div class="main2">
			
			<div class="bg2 vs" style="flex-direction:column;">

<?php
    $sql = "select * from agent_trips where trip_agent_id = '$ta_id_session'";
    $run = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($run))
    {
            $loc = $row['trip_place'];
			$foo = $row['trip_food'];
			$tim = $row['trip_time'];


            $sql2 = "select * from places where pl_id = '$loc'";
            $run2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
            
            
            $sql3 = "select * from food_type where food_type_id = '$foo'";
            $run3 = mysqli_query($link, $sql3);
			$row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);
			

			$sql3n = "select * from time where time_id = '$tim'";
            $run3n = mysqli_query($link, $sql3n);
			$row3n = mysqli_fetch_array($run3n, MYSQLI_ASSOC);
			



            $opp = $row['trip_date'];
            $ertt = date('d-m-Y',strtotime($opp));
            $fgg = $ta_id_session.$loc.$foo.$tim.$ertt;
            $sql4 = "select * from hotel_update where ho_book_id = '$fgg'";
            $run4 = mysqli_query($link, $sql4);
            $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
?>
	   

	   <div class="pure-g container2">
    	
		   
		   
		   <div class="list1 pure-1-1">
		   <div class="pure-u-1-1 p7 cont" id="carosal">
			 	<div class="pure-u-1-8 p22" style="color:black !important"><?php echo $row4['total_confirmed']; ?></div>
			   	<div class="pure-u-1-8 p22" style="color:black !important"><?php echo $row4['total_people'] - $row4['total_confirmed']; ?></div> <br>
			   	<div class="pure-u-1-8" style="color:black !important" id="days">confirmed</div>
			   	<div class="pure-u-1-8" style="color:black !important" id="nights">remaining</div> 
				<div class="p10"><?php echo $row2['pl_name']; ?></div><br> 
			   
			<div style="font-weight: 900; font-size:4vw;">
				<img src="tag.png" class="imgs"/>
				<span style="vertical-align: middle;">	<?php echo $row['trip_people']; ?></span>
			</div>
			 
			   
			</div> 	   
		</div>
		   
		   <div class="list2 pure-g">
			 <div class="pure-u-1-1 p11"> Select destination countries:</div><br>
			  
			<div class="con1 pure-u-1-1">
			   
			   <div class="pure-u-2-3" id="subhead3"><p class="trip_date<?php echo $ertt; ?>"><?php echo $hj = $row['trip_date']; ?></p></div>
				<div class="pure-u-1-3" id="box1"  style="background-image:url('date.png');"></div>
			   
			   </div>
			<div class="con1">
			   <?php $rm = $row3n['time_id']; ?>
			   <div class="pure-u-2-3" id="subhead3"><p class="trip_time<?php echo $rm; ?>"><?php echo $jk = $row3n['time_time']; ?></p></div>
				<div class="pure-u-1-3" id="box1" style="background-image:url('time.png');"></div>
			   
			</div>
			<div class="con1">
			<?php $bc = $row3['food_type_id']; $nb = $row3['food_type_name']; ?>
			   <div class="pure-u-2-3" id="subhead3"><p class="trip_food<?php echo $row3['food_type_id']; ?>"><?php echo $row3['food_type_name']; ?></p></div>
				<div class="pure-u-1-3" id="box1" style="background-image:url('food.png');"></div>
			   
			</div>
		</div><br>




		  
<?php

        $op = $row['trip_date'];
        
        $ert = date('d-m-Y',strtotime($op));
    $ho = "select * from hotels where h_food_type = '$foo' and h_location = '$loc'";
    $rt = mysqli_query($link, $ho);
    while($yt = mysqli_fetch_array($rt, MYSQLI_ASSOC))
    {
        $get_ho = $yt['h_id'];

            $fg = $ta_id_session.$loc.$foo.$tim.$ert.'-'.$get_ho;

            // echo "<script>alert('$fg');</script>";
            $hg = "select * from hotel_booking where ho_book_id = '$fg'";
			$gh = mysqli_query($link, $hg);
			

            while($yuop = mysqli_fetch_array($gh, MYSQLI_ASSOC))
            {

				// echo "<script>alert('$fg');</script>";

?>

		   
		   <div class="list3 pure-1-1">
		        <div class="pure-u-1-1" id="subhead">RESTAURANT</div>
			        <div class="pure-g subcon-main">
			            <div class="pure-u-1-5 subcon1">
							<?php $gm = $yt['h_id']; ?>
				            <p class="hotel_name<?php echo $gm; ?>"><?php echo $tn = $yt['h_name']; ?></p>
							<?php

								// $pathdir = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$tn.'/'.$hj.$jk.$nb.'/';

								// echo "<script>alert('$pathdir');</script>";

								// if(is_dir($pathdir))
								// {
								// 	$zipcreated = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$tn.'/'.$hj.$jk.$nb.'/'.$hj.$jk.$nb.'.zip';

								// 	echo "<script>alert('$zipcreated');</script>";
								
								// 	$zip = new ZipArchive; 
									
								// 	if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
								// 	{ 
										
								// 		$dir = opendir($pathdir); 
										
								// 		while($file = readdir($dir))
								// 		{ 
								// 			if(is_file($pathdir.$file))
								// 			{ 
								// 				$zip -> addFile($pathdir.$file, $file); 
								// 			} 
								// 		} 
								// 		$zip ->close();
								// 	}
								// }

							?>
			            </div> 
			            <div class="pure-u-3-5 subcon2">
                            <p id="size"><input type="text" hidden class="reserved_seats<?php $ff = $yuop['hotel_reserved_seat']; echo $ff; ?>"  value="<?php echo $yuop['hotel_reserved_seat']; ?>">  <?php echo $yuop['hotel_reserved_seat']; ?><br/><span>confirmed seats</span></p>
						
						</div>	

						<div class="pure-u-1-5 subcon2" style="display: flex; justify-content: center; align-items: center;font-size:1.2vw;">

						<a href="../../../../assets/qr/<?php echo $ta_id_session.$ta_name_session; ?>/<?php echo $tn; ?>/<?php echo $hj.$jk.$nb; ?>/" target="_blank">Download<br>QR</a>


</div>




		            </div>
		        </div>
		    </div>
		  
<!-- -----------------------QR code------------------------------- -->
		   <div class="container-fluid">
				<div class="form-horizontal">
					<div class="form-group">
				
					<div class="col-sm-10">
						<input hidden type="text" value="<?php $ew = rand('1111111', '9999999'); echo md5($ew); ?>" class="form-control" id="<?php echo $fg; ?>" placeholder="Enter content">
						
					</div>
					</div>
				</div>
			</div>
<!-- -----------------------QR code------------------------------- -->

<script type="text/javascript">
					function htmlEncode (value){
					return $('<div/>').text(value).html();
					}


					$(function() {
					$(document).ready(function() {

						// var x=[];

						var name=$(".hotel_name<?php echo $gm; ?>").html();
						var date=$(".trip_date<?php echo $ertt; ?>").html();
						var time=$(".trip_time<?php echo $rm; ?>").html();
						var food=$(".trip_food<?php echo $bc; ?>").html();
						var x = $(".reserved_seats<?php echo $ff; ?>").val();

					// alert(name);

						var d=$("#<?php echo $fg; ?>").val();
						// alert(d);
						var url="https://stimulustours.com/aggregator/restaurants/scan_qr.php?id="+d;
					
						
						// alert(x);
						for(i=1;i<=x;i++)
						{
                            z = x - i;
                            
                            var urf=url+i+z+"_"+i;


						var urt="https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode(urf)+ "&chs=160x160&chld=L|0";

							var code1 = d+i+z+"_"+i;


						$.post("up.php",
							{
								code : code1,
								url: urt,
								count:i,
								name : name,
								date : date,
								time : time,
								food : food
							},
							function(data, status){
								// alert(data);
							});

					}
					});
				});

</script>



						



				<?php } } }?>

			
				
		

		
</div>

</div>







	</main>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	



	<script>
  		
	</script>

</html>