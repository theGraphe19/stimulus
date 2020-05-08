<?php
include('session.php');
			$v_s = $_POST['v_id'];
			$data = $_POST['data'];

			$sql3 = "update visa set v_request = '$data' where v_id = '$v_s'";
			$set1 = mysqli_query($link, $sql3);
	
			// if($set1)
			// {
	
			// 	$sql4 = "select * from visa where v_id = $v_id";
			// 	$get1 = mysqli_query($link, $sql4);
			// 	$row11 = mysqli_fetch_array($get1, MYSQLI_ASSOC);
	
			// 	$phn11 = $row11['v_phone'];
			// 	$name11 = $row11['v_name'];
			// 	$email11 = $row11['v_email'];
				
	
			// 	$apiKey = urlencode('sg112rruSIk-HRV0UChrdt2JP3cgu2uNQFvTzJDSQZ');
			// 	$numbers = array($phn11);
			// 	$sender = urlencode('TXTLCL');
			// 	$message = rawurlencode('Hello, '.$name11.'. Your account and documents are verified. Here is your login details. Email - '.$email11.' and Password - '.$set_pass11);
				 
			// 	$numbers = implode(',', $numbers);
				 
			// 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
			// 	$ch = curl_init('https://api.textlocal.in/send/');
			// 	curl_setopt($ch, CURLOPT_POST, true);
			// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// 	$response = curl_exec($ch);
            //     curl_close($ch);
                

                
            // }
            


?>