<?php
			include('../dbconnection.php');

            $v_id = $_POST['v_id'];

			//echo "<script>alert('.$v_id.');</script>";
	
			$set_pass = rand(111111, 999999);
	
			$v_pass = md5($set_pass);
	
			$sql3 = "update visa set v_password = '$v_pass', v_request = '1' where v_id = '$v_id'";
			$set1 = mysqli_query($link, $sql3);
	
			if($set1)
			{
	
				$sql4 = "select * from visa where v_id = '$v_id'";
				$get1 = mysqli_query($link, $sql4);
				$row11 = mysqli_fetch_array($get1, MYSQLI_ASSOC);
	
				$phn_code11 = $row11['v_phone_code'];
				$phn11 = $row11['v_phone'];
				$name11 = $row11['v_name'];
				$email11 = $row11['v_email'];
				$pupr11 = $row11['v_purpose'];
				
	
				$curl = curl_init();

				curl_setopt_array($curl, array(
				CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phn11&message=Hello $name11, your Visa request for $pupr11 is accepted. Your Login credentials are Email : $email11 and Password : $set_pass.&sender=STIMULUS&country=$phn_code11&otp=$set_pass",
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
                

                
            }
            


?>