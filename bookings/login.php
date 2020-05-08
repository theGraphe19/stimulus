<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["booking_loggedin"]) && $_SESSION["booking_loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "../dbconnection.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Check if username is empty
    if(empty(trim($_POST["pc_email"])))
    {
        $username_err = "Please enter Email.";
    }
    else
    {
        $username = trim($_POST["pc_email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pc_password"])))
    {
        $password_err = "Please enter your password.";
    }
    else
    {
        $password = trim($_POST["pc_password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err))
    {
        $enc_password1 = md5($password);
        
        $login_sql = "SELECT * FROM package_users WHERE pc_email = '$username' and pc_password = '$enc_password1'";
		$result = mysqli_query($link, $login_sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if($count == 1)
		{
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
			$_SESSION['booking_login'] = $username;
			header("location: index.php");
		}
		else
		{
			echo"<script>alert('Username or Password is invalid')</script>";  
			echo "<script>location.href='login.php'</script>";
		}
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
      <link rel="stylesheet" href="../assets/css/ta_register.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>

      <main>
         <div class="nav_header">
         <a href="../"><div class="logo">
         </div></a>
         </div>
         <!---holiday & visa-->
         <div class="main1">
            <div class="bg2 vs">
               <div class="pure-g contain" >
                  <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="pure-form pure-form-aligned p4" style="display: inline-block; ">
                    <div class="pure-control-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="pc_email"  value="<?php echo $username; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $username_err; ?></span> 
                    </div>
                    <div class="pure-control-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label for="password">Password</label>
                        <input id="name" name="pc_password" type="password" value="<?php echo $password; ?>" placeholder="" class="pure-u-2-4 ps" required>
                        <span class="help-block"><?php echo $password_err; ?></span> 
                    </div>
                    
                    <button type="submit" class="pure-button pure-u-1-1 btn">SUBMIT</button>

              </div>
            </div>
            <div class="bg1 hd ">
               <div class="vs-inner pure-g" >
                  <div class="pure-u-1-1 p2">BOOKING</div>
                  <div class="pure-u-1-1 p2">SIGN</div>
                  <div class="pure-u-1-1 p2">IN</div>
               </div>
            </div>
            </form>
            <!-- ........bg1........... -->
         </div>
      </main>

   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="../assets/js/fittext.js"></script>
</html>