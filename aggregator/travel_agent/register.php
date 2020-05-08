<?php
    session_start();
    // Include config file
    include('../../dbconnection.php');
 
// Define variables and initialize with empty values

$name = $email = $phn = $phn_code = $phone = $doc = $com_name = "";

$name_err = $temp_phn = $doc_err = $email_err = $phn_err = $com_name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    if(empty(trim($_POST['ta_com_name'])))
    {
        $com_name_err = "Please enter a Company Name";
    }
    else
    {
        $com_name = trim($_POST['ta_com_name']);
        $_SESSION['ta_com_name'] = $com_name;
    }
    
    // Validate name
    if(empty(trim($_POST['ta_name'])))
    {
        $name_err = "Please enter a Name";
    }
    else
    {
        $name = trim($_POST['ta_name']);
        $_SESSION['ta_name'] = $name;
    }

    
    // Validate phone
    if(empty(trim($_POST['ta_phn'])) && empty($_POST['ta_phn_con_code']))
    {
        $phn_err = "Please enter Phone Number with country code.";
    }
    else
    {
        $phn_code = $_POST['ta_phn_con_code'];
        $phn = $_POST['ta_phn'];

        $phone = $phn_code.$phn;

        // Prepare a select statement
        $sqlr = "SELECT * FROM travel_agents where ta_phn_code = '$phn_code' and ta_phn = '$phn'";
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
			$_SESSION['ta_phn_code'] = $phn_code;
            $_SESSION['ta_phn'] = $phn;
		}
            
    }

    
    // Validate email
    if(empty(trim($_POST["ta_email"])))
    {
        $email_err = "Please enter a email.";     
    }
    else
    {
        $email = trim($_POST["ta_email"]);
        $_SESSION['ta_email'] = $email;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email_err = "Invalid email format";
        }
    }

    
    
    if(isset($_FILES['ta_doc']))
    {
        $file_name = $_FILES['ta_doc']['name'];
        $file_size =$_FILES['ta_doc']['size'];
        $file_tmp =$_FILES['ta_doc']['tmp_name'];
        $file_type=$_FILES['ta_doc']['type'];
        
        
        if($file_size > 2097152)
        {
           $doc_err='File size must be excately 2 MB';
        }
        
        if(empty($doc_err)==true)
        {
           move_uploaded_file($file_tmp,"../../assets/documents/".$file_name);

           $_SESSION['ta_doc'] = $file_name;
        }
        else
        {
            $doc_err = "Something went wrong. Try Again";
        }
    }



    // Check input errors before inserting in database
    if(empty($name_err) && empty($com_name_err) && empty($doc_err) && empty($email_err) && empty($phn_err))
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
              CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$phone&message=Hello $name. Your verification code is $rand_no.&sender=STIMULUS&country=$phn_code&otp=$rand_no",
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
                        <!-- <button type="submit" class="pure-button pure-u-1-4" id="btn1">AGENT</button>
                           <button type="submit" class="pure-button pure-u-1-4" id="btn2">TOURIST</button> -->
                        Sign Up
                     </div>
                     <div class="pure-control-group <?php echo (!empty($com_name_err)) ? 'has-error' : ''; ?>" style="margin-top: 15%;">
                        <label for="name">Company Name</label>
                        <input id="name" name="ta_com_name" type="text" value="<?php echo $com_name; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $com_name_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                        <label for="name">Proprietor / Director name</label>
                        <input id="name" name="ta_name" type="text" value="<?php echo $name; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $name_err; ?></span> 
                    </div>
                     <div class="pure-control-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label for="email">Email</label>
                        <input id="email" name="ta_email" type="email" value="<?php echo $email; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $email_err; ?></span> 
                    </div>
                     <div class="pure-control-group <?php echo (!empty($phn_err)) ? 'has-error' : ''; ?>">
                        <label for="phone">Phone</label>
                        <select name="ta_phn_con_code" class="pure-u-2-4 ps" style="width: 12%">
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
                        <input id="phone" type="text" name="ta_phn" value="<?php echo $phn; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $phn_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($doc_err)) ? 'has-error' : ''; ?>">
                        <label  class="pure-u-1-6" for="documents">PAN or Aadhar Card</label>
                        <input type="file" name="ta_doc" value="<?php echo $doc; ?>" id="documents" class="pure-u-2-5" required="required"/>
                        <span class="help-block"><?php echo $doc_err; ?></span>
                    </div>
                     
                     <button type="submit" class="pure-button pure-u-1-1 btn">SUBMIT</button>

                     <p style="text-align: center; padding: 25px;">Already have an account? <a style="text-decoration: none; color: #000;" href="login.php">Login here</a></p>
                  
               </div>
            </div>
            <div class="bg1 hd ">
               <div class="vs-inner pure-g" >
               <div class="pure-u-1-1 p2">AGENTS</div>
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