<?php
   session_start();
   include("../dbconnection.php");


   // if(empty($_POST['visa_con_id']))
   // {
   //    echo "<script>alert('Select Country');</script>";
   //    echo "<script>location.href='index.php'</script>";
   // }

   if( !isset($_SESSION["admin_login"]) ) {
      header("location: index.php");
   }
   else{
   
   $name = $email = $phn_code = $phone = $destination = $purpose = "";
   
   $name_err = $email_err = $phone_err = $destination_err = $purpose_err ="";
   
   // Processing form data when form is submitted
   if(isset($_POST['visa_form']))
   {
       // Validate name
       if(empty(trim($_POST['v_name'])))
       {
           $name_err = "Please enter a name";
       }
       else
       {
           $name = trim($_POST['v_name']);
           $_SESSION['v_name'] = $name;
       }
   
       
       // Validate email
       if(empty(trim($_POST["v_email"])))
       {
           $email_err = "Please enter a email.";     
       }
       else
       {
           $email = trim($_POST["v_email"]);
           
           if(!filter_var($email, FILTER_VALIDATE_EMAIL))
           {
               $email_err = "Invalid email format";
           }
   
           $_SESSION['v_email'] = $email;
       }
       
       
       // Validate phone
       if(empty(trim($_POST["v_phone"])) && empty($_POST['v_phone_code']))
       {
           $phone_err = "Please enter a phone number with country code.";     
       }
       else
       {
            $phn_code = $_POST['v_phone_code'];
            $phone = trim($_POST["v_phone"]);


            $p_phone = $phn_code.$phone;


            $_SESSION['v_phone_code'] = $phn_code;
            $_SESSION['v_phone'] = $phone;
       }
   
   
       // Validate destination
       if(empty(trim($_POST["v_destination"])))
       {
           $destination_err = "Please enter a Country.";     
       }
       else
       {
           $destination= trim($_POST["v_destination"]);
           $_SESSION['v_destination'] = $destination;
       }
   
   
       // Validate purpose
       if(empty(trim($_POST["v_purpose"])))
       {
           $purpose_err = "Please select purpose.";     
       }
       else
       {
           $purpose= trim($_POST["v_purpose"]);
           $_SESSION['v_purpose'] = $purpose;
       }
       
   
       // Check input errors before inserting in database
       if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($destination_err) && empty($purpose_err))
       {
         
           // Prepare an insert statement

           if( isset($_SESSION["admin_login"]) ) {

            //set visa_type from visa table to 1

               $visa_sql = "INSERT INTO visa (v_name, v_phone_code, v_phone, v_email, v_destination, v_purpose, v_type) VALUES ('$name', '$phn_code', '$phone', '$email', '$destination', '$purpose', '1')";
               $visa_insert = mysqli_query($link, $visa_sql);

               echo "<script>alert('Succesfull');</script>";

            }
               
            else
            {
               echo "<script>alert('Something went wrong. Please try again later.');</script>";
            }
         
         
         // Close connection
         mysqli_close($link);
       }
      }
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Admin Visa</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/visa.css">
      <link rel="stylesheet" href="css/admin_visa.css">

      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/79008e30b7.js" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <main>

         <div class="pure-g contain" >
            <form method="post" encytype="multipart/form-data" class="pure-form pure-form-aligned p4" style="display: inline-block; ">
               <!--  <div class="pure-u-1-1 bt" >
                  <button class="pure-button pure-u-1-4" id="btn1">AGENT</button>
                  <button class="pure-button pure-u-1-4" id="btn2">TOURIST</button>
                  </div> -->
               <div class=" det_fields pure-g <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                  <div class="pure-u-xl-1-5 pure-u-1-1" >
                     <label style="text-align:center !important;" for="name">Name</label>
                  </div>
                  <div class="pure-u-xl-4-5 pure-u-1-1">
                     <input id="name" type="text" placeholder="Enter your name" name="v_name" value="<?php echo $name; ?>" >
                  </div>
                  <span class="help-block"><?php echo $name_err; ?></span>
               </div>
               <div class="det_fields pure-g <?php echo (!empty($destination_err)) ? 'has-error' : ''; ?>">
                  <div class="pure-u-xl-1-5 pure-u-1-1" >
                     <label style="text-align:left !important;"  for="name">Destination</label>
                  </div>
                  <div class="pure-u-xl-4-5 pure-u-1-1">
                     <select id="destination" name="v_destination">
                                 <?php

                                       $we1 = "select * from country where id = '$get_id'";
                                       $rty1 = mysqli_query($link, $we1);
                                       $ghkal1 = mysqli_fetch_array($rty1, MYSQLI_ASSOC);

                                 ?>
                                 <option value="<?php echo $ghkal1['id']; ?>"><?php echo $ghkal1['nicename']; ?></option>
                                 <?php
                                    $btu = "select * from visa_con where visa_id <> '$get_id' and visa_status = '1'";
                                    $nqp = mysqli_query($link, $btu);
                                    while( $mox = mysqli_fetch_array($nqp, MYSQLI_ASSOC))
                                    {
                                          $lq = $mox['visa_id'];
                                          $we = "select * from country where id = '$lq'";
                                          $rty = mysqli_query($link, $we);
                                          $ghkal = mysqli_fetch_array($rty, MYSQLI_ASSOC);
                                    ?>
                                 <option value="<?php echo $ghkal['id']; ?>"><?php echo $ghkal['nicename']; ?></option>
                                 
                                 <?php } ?>
                     </select>
                  </div>
                  <span class="help-block"><?php echo $destination_err; ?></span>
               </div>
               <div class="det_fields pure-g <?php echo (!empty($purpose_err)) ? 'has-error' : ''; ?>">
                  <div class="pure-u-xl-1-5 pure-u-1-1" >
                     <label style="text-align:left !important;"  for="visa">Visa Type</label>
                  </div>
                  <div class="pure-u-xl-4-5 pure-u-1-1">
                     <select id="destination" name="v_purpose">
                        <option value="Tourist Visa" selected>Tourist Visa</option>
                        <option value="Business Visa" >Business Visa</option>
                        <option value="Transit Visa">Transit Visa</option>
                        <option value="Employment Visa">Employment Visa</option>
                     </select>
                  </div>
                  <span class="help-block"><?php echo $purpose_err; ?></span>
               </div>
               <div class="det_fields pure-g <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                  <div class="pure-u-xl-1-5 pure-u-1-1" >
                     <label style="text-align:left !important;"  for="phone">Phone</label>
                  </div>
                  <div class="pure-u-xl-1-5 pure-u-1-1" style="display: flex;align-items: center;">
                     <select id="destination" name="v_phone_code">
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
                  </div>
                  <div class="pure-u-xl-3-5 pure-u-1-1" style="display: flex;align-items: center;">
                     <input id="phone" placeholder="XXXXXXXXXX" name="v_phone" value="<?php echo $phone; ?>" type="text" placeholder="" >
                  </div>
                  <span class="help-block"><?php echo $phone_err; ?></span>
               </div>
               <div class="det_fields pure-g <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                  <div class="pure-u-xl-1-5 pure-u-1-1" >
                     <label style="text-align:left !important;"  for="email">Email</label>
                  </div>
                  <div class="pure-u-xl-4-5 pure-u-1-1" style="display: flex;align-items: center;">
                     <input placeholder="Enter your email address" id="email" type="email" name="v_email" value="<?php echo $email; ?>" placeholder="" >
                  </div>
                  <span class="help-block"><?php echo $email_err; ?></span>
               </div>
               <button type="submit" class="pure-button pure-u-1-1" name="visa_form" id="btn">GET YOUR VISA</button>
            </form>
         </div>
      </main>
   </body>
</html>