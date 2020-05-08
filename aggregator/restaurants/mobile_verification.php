<?php
    session_start();

    $name = $email = $phone_code = $phone = $location = $food = $capacity = $otp_number = $otp = $otp_err ="";
    
    $h_name = $_SESSION['h_name'];
    $food = $_SESSION['h_food'];
    $email = $_SESSION['h_email'];
    $phone_code = $_SESSION['h_phn_code'];
    $phone =  $_SESSION['h_phn'];
    $location = $_SESSION['h_location'];
    $capacity = $_SESSION['h_capacity'];
    $otp_number = $_SESSION['otp_number'];
    
    $p_phone = $phone_code.$phone;
    
    if(empty($h_name) && empty($food) && empty($email) && empty($phone_code) && empty($phone) && empty($location) && empty($capacity) && empty($otp_number))
    {
        echo "<script>location.href='register.php'</script>";
    }
    else
    {
        require_once "../../dbconnection.php";
    
        // Processing form data when form is submitted
        if(isset($_POST['submit']))
        {
            // Validate name
            if(empty(trim($_POST['otp'])))
            {
                $otp_err = "Please enter OTP";
            }
            else
            {
                $otp = trim($_POST['otp']);
            }

            
            // Check input errors before inserting in database
            if(empty($otp_err))
            {
                
                // Prepare an insert statement
                $otp_sql = "select * from mobile_numbers where mobile_number = $p_phone and verification_code = $otp_number";
                $otp_insert = mysqli_query($link, $otp_sql);
                $row = mysqli_fetch_array($otp_insert, MYSQLI_ASSOC);

                $mobile_id = $row['mobile_id'];
                
                if($row['verification_code'] === $otp)
                {
                    $verified_sql = "update mobile_numbers set verified = '1' where mobile_id = $mobile_id";
                    $verified_insert = mysqli_query($link, $verified_sql);

                    if($verified_insert)
                    {
                        echo "<script>alert('Verified.');</script>";

                        $visa_sql = "INSERT INTO hotels (h_name, h_food_type, h_capacity, h_location, h_phn_code, h_phn, h_email) 
                                VALUES ('$h_name', '$food', '$capacity', '$location', '$phone_code', '$phone', '$email')";
                        $visa_insert = mysqli_query($link, $visa_sql);

                        $_SESSION = array();
                        session_destroy();

                        echo "<script>location.href='register.php'</script>";
                    }
                } 
                else
                {
                    echo "<script>alert('Wrong OTP.');</script>";
                }
            }
            
            // Close connection
            mysqli_close($link);
        }
    }


    if(isset($_POST['resend']))
    {
        require_once "../../dbconnection.php";

        // Prepare an insert statement
        $rand_no = rand(10000, 99999);
        $_SESSION['otp_number'] = $rand_no;

        $mobile_sql = "update mobile_numbers set verification_code = '$rand_no' where mobile_number = '$p_phone'";
        $mobile_insert = mysqli_query($link, $mobile_sql);
        
        if($mobile_insert)
        {
            
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phone&message=Hello $name. Your new verification code is $rand_no.&sender=STIMULUS&country=$phone_code&otp=$rand_no",
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
            

            echo "<script>alert('New OTP sent to your given number. Please verify your number.');</script>";
            
        } 
        else
        {
            echo "<script>alert('Something went wrong. Please try again later.');</script>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stimulus home</title>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
        <link rel="stylesheet" href="../../assets/css/otp.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="main1">
            <div class="nav_header">
                <a href="../../"><div class="logo"></div></a>
            </div>
            <div class=" box-inner">
                <div class="pure-g">
                <div class="pure-u-1-1">
                    <div class="b"> Enter the OTP sent to you via email</div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" encytype="multipart/form-data">
                        <div class="d <?php echo (!empty($otp_err)) ? 'has-error' : ''; ?>">
                            <input type="text" placeholder="" class="otp" name="otp" value="<?php echo $otp; ?>">
                            <span class="help-block"><?php echo $otp_err; ?></span> 
                            <button type="submit" name="submit" class="btn"><img src="../../assets/images/right-arrow.png"></button>
                        </div>
                    
                        <div class="c"> Didn't Recieve the OTP?</div>
                        <div style="text-align: center;"><button name="resend" class="btn2">RESEND</button> </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- box-inner -->
        </div>
        <!-- main1 end -->
    </body>
</html>