<?php
	session_start();
	include('../dbconnection.php');

	date_default_timezone_set("Asia/Kolkata");

	if(empty($_SESSION['code']))
	{
		$_SESSION['code'] = "STIM".date('dsy')."ULUS".rand('1111','9999');
	}
	
	if(isset($_POST['add_new']))
	{
		$code = $_SESSION['code'];
		$days = $_POST['ho_days'];
		$nights = $_POST['ho_nights'];
		$destination = $_POST['ho_destination'];
		$price = $_POST['ho_price'];

		if(isset($_FILES['ho_pic']))
	    {
	        $file_name = $_FILES['ho_pic']['name'];
	        $file_size =$_FILES['ho_pic']['size'];
	        $file_tmp =$_FILES['ho_pic']['tmp_name'];
	        $file_type=$_FILES['ho_pic']['type'];
	        
	        
	        if($file_size < 2097152)
	        {
			   $upload = move_uploaded_file($file_tmp,"../assets/holiday_packages/".$file_name);
			   
			   $doc = "assets/holiday_packages/".$file_name;

	           if($upload)
	           {

				if(isset($_FILES['ho_pdf']))
				{
					$file_name1 = $_FILES['ho_pdf']['name'];
					$file_size1 =$_FILES['ho_pdf']['size'];
					$file_tmp1 =$_FILES['ho_pdf']['tmp_name'];
					$file_type1 =$_FILES['ho_pdf']['type'];
					
					
					if($file_size1 < 2097152)
					{
					   $upload1 = move_uploaded_file($file_tmp1,"../assets/documents/".$file_name1);

						if($upload1)
						{
							$doc1 = "assets/documents/".$file_name1;
							$sql = "insert into holiday_packages (ho_code, ho_days, ho_nights, ho_destination, ho_price, ho_pic, ho_doc) values ('$code', '$days', '$nights', '$destination', '$price', '$doc', '$doc1')";
							$run = mysqli_query($link, $sql);

							if($run)
							{
								$sql2 = "select * from holiday_packages where ho_code = '$code'";
								$get = mysqli_query($link, $sql2);
								$row = mysqli_fetch_array($get, MYSQLI_ASSOC);

								$get_id = $row['ho_id'];
								
								$get_days = $row['ho_days'];

								for($i=1; $i<=$get_days; $i++)
								{
									$sql3 = "insert into holiday_packages_itineary (ho_id, ho_day) values ('$get_id', '$i')";
									mysqli_query($link, $sql3);
								}
								
								echo "<script>alert('Package Added.');</script>";
							}
							else
							{
								echo "<script>alert('Not Added.');</script>";
							}
						}
					}
				}
				else
				{
					echo '<script>alert("Something went wrong. Try Again");</script>';
				}
	           		
	           }
	           else
	           {
	           		echo "<script>alert('Kuch to Gadbad hai.');</script>";
	           }
			}
	        else
	        {
	            echo "<script>alert('File size must be less than 2 MB');</script>";
	        }
	    }
	    else
	    {
	    	echo '<script>alert("Something went wrong. Try Again");</script>';
	    }
	}


	if(isset($_POST['update_package']))
	{

		$ho_glo_id = $_POST['ho_glob_id'];

		foreach ($_POST['ho_country'] as $con)
		{
			$data1 = $con;
			$rt = "INSERT INTO holiday_packages_country (ho_id, ho_country) VALUES ('$ho_glo_id', '$data1')";
			mysqli_query($link, $rt);
		}

		foreach ($_POST['ho_dates'] as $datess)
		{
			$data2 = $datess;
			$rtt = "INSERT INTO holiday_packages_dates (ho_id, ho_dates) VALUES ('$ho_glo_id', '$data2')";
			mysqli_query($link, $rtt);
		}

		// foreach ($_POST['ho_country'] as $con)
		// {
		// 	$data1 = $con;
		// 	$rt = "INSERT INTO holiday_packages_country (ho_id, ho_country) VALUES ('$ho_glo_id', '$data1')";
		// 	mysqli_query($link, $rt);
		// }

		// foreach ($_POST['ho_country'] as $con)
		// {
		// 	$data1 = $con;
		// 	$rt = "INSERT INTO holiday_packages_country (ho_id, ho_country) VALUES ('$ho_glo_id', '$data1')";
		// 	mysqli_query($link, $rt);
		// }
	}


	if(isset($_POST['iti_submit']))
	{
		$id = $_POST['id'];
		$day = $_POST['dates'];
		$title = $_POST['ho_title'];
		$content = $_POST['ho_content'];

		if(isset($_FILES['ho_it_pic']))
		{
			$file_name111 = $_FILES['ho_it_pic']['name'];
			$file_size111 =$_FILES['ho_it_pic']['size'];
			$file_tmp111 =$_FILES['ho_it_pic']['tmp_name'];
			$file_type111 =$_FILES['ho_it_pic']['type'];
			
			
			if($file_size111 <= 2097152)
			{
				$upload111 = move_uploaded_file($file_tmp111,"../assets/holiday_packages/".$file_name111);

				if($upload111)
				{
					$doc111 = "assets/holiday_packages/".$file_name111;
					$sql111 = "update holiday_packages_itineary set ho_title = '$title', ho_content = '$content', ho_pic = '$doc111' where ho_day = '$day' and ho_id = '$id'";
					$run111 = mysqli_query($link, $sql111);
				}
			}
		}
		
		



		unset($_SESSION['code']);
		echo '<script>alert("Holiday Package Created");</script>';
		echo "<script>location.href='add_package.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Holiday Package</title>
	</head>
	<body>
		<center>
			<h2>Code : <?php echo $_SESSION['code']; ?></h2>
			<br><br>
			<?php
				$code2 = $_SESSION['code'];
				$sql6 = "select * from holiday_packages where ho_code = '$code2'";
       			$get3 = mysqli_query($link, $sql6);
       			$row3 = mysqli_fetch_array($get3, MYSQLI_ASSOC);

       			if($row3['ho_code']===$code2)
       			{

					
           	?>



				Days : <?php echo $row3['ho_days']; ?> , Nights : <?php echo $row3['ho_nights']; ?>
				<br><br>
				Destination : <?php echo $row3['ho_destination']; ?> , Price : <?php echo $row3['ho_price']; ?>
				<br><br>
				<img src="../<?php echo $row3['ho_pic']; ?>" width="250">, PDF : <a href="../<?php echo $row3['ho_doc']; ?>" download>D</a>

				<br><br><br>


			<form method="post" enctype="multipart/form-data">
				<h2>Holiday Package Countries</h2>
				Country : <input type="text" name="ho_country[]">, <input type="text" name="ho_country[]">, <input type="text" name="ho_country[]">, <input type="text" name="ho_country[]">
				<br><br>

				<h2>Holiday Package Dates</h2>
				Dates : <input type="date" name="ho_dates[]">, <input type="date" name="ho_dates[]">, <input type="date" name="ho_dates[]">, <input type="date" name="ho_dates[]">
				<br><br>
				<h2>Holiday Package Cost Includes</h2>
				Includes : <input type="text" name="ho_in_content[]">, <input type="text" name="ho_in_content[]">, <input type="text" name="ho_in_content[]">, <input type="text" name="ho_in_content[]">
				<br><br>
				<h2>Holiday Package Cost Excludes</h2>
				Excludes : <input type="text" name="ho_ex_content[]">, <input type="text" name="ho_ex_content[]">, <input type="text" name="ho_ex_content[]">, <input type="text" name="ho_ex_content[]">
				<br><br>


				ID  :  <input type="text" name="ho_glob_id" value="<?php echo $row3['ho_id']; ?>">
				<br><br>

				<input type="submit" name="update_package" value="Update Package">
			</form>



						<h2>Holiday Package Itineary</h2>
						<?php
							$code1 = 'STIM104220ULUS6300';
							$sql4 = "select * from holiday_packages where ho_code = '$code1'";
							$get1 = mysqli_query($link, $sql4);
							$row1 = mysqli_fetch_array($get1, MYSQLI_ASSOC);

							$ho_id = $row1['ho_id'];

							$sql5 = "select * from holiday_packages_itineary where ho_id = '$ho_id' order by ho_it_id asc";
							$get2 = mysqli_query($link, $sql5);
							while($row2 = mysqli_fetch_array($get2, MYSQLI_ASSOC))
							{
						?>
							<form method="post" enctype="multipart/form-data">
								Day : <input type="text" name="dates" value="<?php echo $row2['ho_day']; ?>">, Title :  <input type="text" name="ho_title" value="<?php echo $row2['ho_title']; ?>">
								<br><br>
								Content : <input type="text" name="ho_content" value="<?php echo $row2['ho_content']; ?>">, Image : <input type="file" name="ho_it_pic">
								<br><br> Id : <input type="text" name="id" value="<?php echo $row2['ho_id']; ?>">
								Submit : <input type="submit" name="iti_submit" value="Submit">
								<br><br><br><br><br>
							</form>

						<?php } ?>






		<?php }
				else{ ?>
					
				<form method="post" enctype="multipart/form-data">
				Days : <input type="number" min="1" name="ho_days"> , Nights : <input type="number" min="1" name="ho_nights">
				<br><br>
				Destination : <input type="text" name="ho_destination"> , Price : <input type="text" name="ho_price">
				<br><br>
				Image : <input type="file" name="ho_pic">, PDF : <input type="file" name="ho_pdf">
				<br><br>
				<input type="submit" name="add_new" value="Create Package">
			</form>

		<?php } ?>
		</center>
	</body>
</html>