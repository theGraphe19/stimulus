<?php

    include('../dbconnection.php');

	$id = $_POST['pc_id'];

    $set_pass = rand(111111, 999999);

    $pc_pass = md5($set_pass);

    $gh = "update package_users set pc_password = '$pc_pass', pc_status = '1' where pc_id = '$id'";
    $nw = mysqli_query($link, $gh);

    if($nw)
    {
        $mq = "update package_booking set pc_b_status = '1' where pc_id = '$id'";
        $mo = mysqli_query($link, $mq);
    

        if($mo)
        {

            //echo "<script>alert('Done');</script>";

            $sql2 = "select * from package_users where pc_id = '$id'";
            $get = mysqli_query($link, $sql2);
            $row = mysqli_fetch_array($get, MYSQLI_ASSOC);


            $phn_code = $row['pc_phone_code'];
            $phn = $row['pc_phone'];
            $name = $row['pc_name'];
            $email = $row['pc_email'];


            $sql2w = "select * from package_booking where pc_id = '$id'";
            $getw = mysqli_query($link, $sql2w);
            $roww = mysqli_fetch_array($getw, MYSQLI_ASSOC);


            $package = $roww['pc_b_code'];


            $sql2wb = "select * from holiday_packages where ho_code = '$package'";
            $getwb = mysqli_query($link, $sql2wb);
            $rowwb = mysqli_fetch_array($getwb, MYSQLI_ASSOC);

            $code_name = $rowwb['ho_destination'];
            

            //echo "<script>alert('$phn_code.$phn');</script>";

            // $p_phone = $phn_code.$phn;

            // echo "<script>alert('$p_phone');</script>";
            

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phn&message=Hello $name, your holiday package request for $code_name is accepted. Your Login credentials are Email : $email and Password : $set_pass.&sender=STIMULUS&country=$phn_code&otp=$set_pass",
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

            // echo"

            


            


                
            //          <p><button type='submit'   class='pure-button btn btn_edit_req'><b>EDIT</b></button></p>
                    
                    
            





            // ";



        }
        
    }

?>