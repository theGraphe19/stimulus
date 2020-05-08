<?php

	include('../dbconnection.php');
	
	


//error_reporting(0);
	

		$ta_id = $_POST['ta_id'];

		$set_pass = rand(111111, 999999);

		$ta_pass = md5($set_pass);

		$sql1 = "update travel_agents set ta_password = '$ta_pass', ta_status = '1' where ta_id = '$ta_id'";
		$set = mysqli_query($link, $sql1);

		if($set)
		{

			//echo "<script>alert('Done');</script>";

			$sql2 = "select * from travel_agents where ta_id = '$ta_id'";
			$get = mysqli_query($link, $sql2);
			$row = mysqli_fetch_array($get, MYSQLI_ASSOC);

			$phn_code = $row['ta_phn_code'];
			$phn = $row['ta_phn'];
			$name = $row['ta_name'];
			$email = $row['ta_email'];

			//echo "<script>alert('$phn_code.$phn');</script>";

			// $p_phone = $phn_code.$phn;

			// echo "<script>alert('$p_phone');</script>";
			

			$curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phn&message=Hello $name, your Travel Agent Regsiteration is accepted. Your Login credentials are Email : $email and Password : $set_pass.&sender=STIMULUS&country=$phn_code&otp=$set_pass",
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

		    echo"

		    


               


                   
                     <p><button type='submit'   class='pure-button btn btn_edit_req'><b>EDIT</b></button></p>
                     
                    
             





		    ";



		}
			

	
    	
?>