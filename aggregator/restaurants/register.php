<?php
    session_start();
// Include config file
require_once "../../dbconnection.php";
 
// Define variables and initialize with empty values

$h_name = $email = $phn = $phn_code = $phone = $food = $location = $capacity = "";

$h_name_err = $temp_phn = $food_err = $location_err = $email_err = $phn_err = $capacity_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate restaurnat name
    if(empty(trim($_POST['h_name'])))
    {
        $h_name_err = "Please enter Restaurant Name";
    }
    else
    {
        $h_name = trim($_POST['h_name']);
        $_SESSION['h_name'] = $h_name;
    }
    
    // Validate food type
    if(empty(trim($_POST['h_food'])))
    {
        $food_err = "Please enter Food Type";
    }
    else
    {
        $food = trim($_POST['h_food']);
        $_SESSION['h_food'] = $food;
    }

    // Validate capacity
    if(empty(trim($_POST['h_capacity'])))
    {
        $capacity_err = "Please enter Capacity";
    }
    else
    {
        $capacity = trim($_POST['h_capacity']);
        $_SESSION['h_capacity'] = $capacity;
    }
    
    // Validate Location
    if(empty(trim($_POST['h_location'])))
    {
        $location_err = "Please enter Location";
    }
    else
    {
        $location = trim($_POST['h_location']);
        $_SESSION['h_location'] = $location;
    }

    
    // Validate phone
    if(empty(trim($_POST["h_phn"])) && empty($_POST['h_phn_con_code']))
    {
        $phn_err = "Please enter Phone Number with country code.";
    }
    else
    {
        
        
        
        $phn_code = $_POST['h_phn_con_code'];
        $phn = $_POST['h_phn'];

        $phone = $phn_code.$phn;
        
        //echo "<script>alert('$phone');</script>";

        // Prepare a select statement
        $sqlr = "SELECT * FROM hotels where h_phn_code = '$phn_code' and h_phn = '$phn'";
        $checkr = mysqli_query($link, $sqlr);
        $rowr = mysqli_fetch_array($checkr, MYSQLI_ASSOC);
        $count = mysqli_num_rows($checkr);
        if($count >= 1)
		{
            echo "<script>alert('This Phone Number is already registered.');</script>";
            goto end;
            
        }
		else
		{
			$_SESSION['h_phn_code'] = $phn_code;
            $_SESSION['h_phn'] = $phn;
		}
        
        
    }

    
    // Validate email
    if(empty(trim($_POST["h_email"])))
    {
        $email_err = "Please enter a Email.";     
    }
    else
    {
        $email = trim($_POST["h_email"]);
        $_SESSION['h_email'] = $email;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email_err = "Invalid email format";
        }
    }

    
    // Check input errors before inserting in database
    if(empty($h_name_err) && empty($food_err) && empty($location_err) && empty($email_err) && empty($phn_err) && empty($capacity_err))
    {


        // Prepare an insert statement
        $rand_no = rand(10000, 99999);
        $_SESSION['otp_number'] = $rand_no;

        $mobile_sql = "INSERT INTO mobile_numbers (mobile_number, verification_code) VALUES ('$phone', '$rand_no')";
        $mobile_insert = mysqli_query($link, $mobile_sql);
        
        if($mobile_insert)
        {
            
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phone&message=Hello $h_name. Your verification code is $rand_no.&sender=STIMULUS&country=$phn_code&otp=$rand_no",
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
            
            echo "<script>alert('OTP sent to your given number. Please verify your number.');</script>";
            echo "<script>location.href='mobile_verification.php'</script>";
        } 
        else
        {
            echo "<script>alert('Something went wrong. Please try again later.');</script>";
        }

        end : echo "<script>location.href='register.php';</script>";
    }
    
    // Close connection
    mysqli_close($link);
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
      <link rel="stylesheet" href="../../assets/css/ta_register.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <main>
         <div class="nav_header">
         <a href="../../"><div class="logo">
		</div></a>
         </div>
         <!---holiday & visa-->
         <div class="main1">
             
            <div class="bg2 vs">
               <div class="pure-g contain" >
                  <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="pure-form pure-form-aligned p4" style="display: inline-block; ">
                     <div class="pure-u-1-1 bt" >
                        Sign Up
                     </div>
                     <div class="pure-control-group <?php echo (!empty($h_name_err)) ? 'has-error' : ''; ?>" style="margin-top: 15%;">
                        <label for="name">Restaurant Name</label>
                        <input id="name" name="h_name" type="text" value="<?php echo $h_name; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $h_name_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($food_err)) ? 'has-error' : ''; ?>">
                        <label for="food type">Food Type</label>
                        <select id="food" name="h_food"  class="pure-u-2-4 ps" value="<?php echo $food; ?>">
                        <?php
                                $food_type = "select * from food_type";
                                $get_food_type = mysqli_query($link, $food_type);
                                while($row_f = mysqli_fetch_array($get_food_type, MYSQLI_ASSOC))
                                {
                        ?>
                            <option value="<?php echo $row_f['food_type_id']; ?>"><?php echo $row_f['food_type_name']; ?></option>
                        <?php } ?>
                        </select>
                        <span class="help-block"><?php echo $food_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($capacity_err)) ? 'has-error' : ''; ?>">
                        <label for="capacity">Capacity</label>
                        <input id="capacity" name="h_capacity" type="number" min="1" value="<?php echo $capacity; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $capacity_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                        <label for="location">Location</label>
                        <select id="location" name="h_location"  class="pure-u-2-4 ps">
                        <?php
                                $places = "select * from places";
                                $get_places = mysqli_query($link, $places);
                                while($row_p = mysqli_fetch_array($get_places, MYSQLI_ASSOC))
                                {
                        ?>
                            <option value="<?php echo $row_p['pl_id']; ?>"><?php echo $row_p['pl_name']; ?></option>
                        <?php } ?>
                        </select>
                        <span class="help-block"><?php echo $location_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($phn_err)) ? 'has-error' : ''; ?>">
                        <label for="phone">Phone</label>
                        <select name="h_phn_con_code" class="pure-u-2-4 ps" style="width: 12%">
                            <option value="91" selected>+&nbsp;91</option>
                            <?php
                                $mw = "select distinct phonecode from country where id <> '99' order by phonecode asc";
                                $nw = mysqli_query($link, $mw);
                                while($row1v = mysqli_fetch_array($nw, MYSQLI_ASSOC))
                                {
                            ?>
                            <option value="<?php echo $row1v['phonecode'] ?>">+&nbsp;<?php echo $row1v['phonecode'] ?></option>
                            <?php } ?>
                        </select>
                        <input id="phone" type="text" name="h_phn" value="<?php echo $phn; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $phn_err; ?></span> 
                    </div>
                     <div class="pure-control-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label for="email">Email</label>
                        <input id="email" name="h_email" type="email" value="<?php echo $email; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $email_err; ?></span> 
                    </div>
                    <button type="submit" class="pure-button pure-u-1-1 btn">SUBMIT</button>

                     <p style="text-align: center; padding: 25px;">Already have an account? <a style="text-decoration: none; color: #000;" href="login.php">Login here</a></p>
                  
               </div>
            </div>
            <div class="bg1 hd ">
               <div class="vs-inner pure-g" >
               <div class="pure-u-1-1 p2">HOTELS</div>
                  <div class="pure-u-1-1 p2">SIGN</div>
                  <div class="pure-u-1-1 p2">UP</div>
               </div>
            </div>
            </form>
            <!-- ........bg1........... -->
         </div>
      </main>

   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="../../assets/js/fittext.js"></script>
   <!--	<script src="js/script.js"></script>-->
   <script></script>
</html>