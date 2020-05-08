<?php

	include('../dbconnection.php');
	
	
        $h_id = $_POST['h_id'];

		$set_pass = rand(111111, 999999);

		$h_pass = md5($set_pass);

		$sql1 = "update hotels set h_password = '$h_pass', h_status = '1' where h_id = '$h_id'";
		$set = mysqli_query($link, $sql1);

		if($set)
		{

			$sql2 = "select * from hotels where h_id = '$h_id'";
			$get = mysqli_query($link, $sql2);
			$row = mysqli_fetch_array($get, MYSQLI_ASSOC);

			$name = $row['h_name'];
			$phn_code = $row['h_phn_code'];
			$phn = $row['h_phn'];
			$email = $row['h_email'];
			
			
		//	echo "<script>alert('$set_pass $name $email $phn_code$phn');</script>";
			
			
			$curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phn&message=Hello $name, your Restaurant's Regsiteration is accepted. Your Login credentials are Email : $email and Password : $set_pass.&sender=STIMULUS&country=$phn_code&otp=$set_pass",
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
            
            
            // if ($err)
            // {
            //   echo "cURL Error #:" . $err;
            // }
            // else
            // {
            //   echo $response;
            // }

		    echo"

		    


               


                   
                     <p><button type='submit'   class='pure-button btn btn_edit_req'><b>EDIT</b></button></p>
                     
                    
             





		    ";



		}	
    	
?>