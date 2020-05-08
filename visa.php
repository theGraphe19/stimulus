<?php
   session_start();
   include("dbconnection.php");


   

   // if(empty($_POST['visa_con_id']))
   // {
   //    echo "<script>alert('Select Country');</script>";
   //    echo "<script>location.href='index.php'</script>";
   // }

   $get_id = $_SESSION['visa_select_con'];
   
   // Define variables and initialize with empty values
   
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
           $rand_no = rand(10000, 99999);
           $_SESSION['otp_number'] = $rand_no;
   
           $mobile_sql = "INSERT INTO mobile_numbers (mobile_number, verification_code) VALUES ('$p_phone', '$rand_no')";
           $mobile_insert = mysqli_query($link, $mobile_sql);
           
           if($mobile_insert)
           {
                     
            
                     $curl = curl_init();

                     curl_setopt_array($curl, array(
                     CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=314319Asz8t1bwU0qU5e27d970P1&mobile=$p_phone&message=Hello $name. Your verification code is $rand_no.&sender=STIMULUS&country=$phn_code&otp=$rand_no",
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
               echo "<script>alert('OTP not sent.');</script>";
           }
       }
       else
       {
           echo "<script>alert('Something went wrong. Please try again later.');</script>";
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
      <link rel="stylesheet" href="assets/css/visa.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/79008e30b7.js" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <main>
         <div class="nav_header">
                  <a href="index.php">
                     <div class="logo">
                     </div>
                  </a>
                  <div class="login_con" style="display: none;">
                     <div class="pure-u-1-3 top" >
                        <div class="dropdown">
                           <button type="submit" class="pure-button dropbtn"><b>LOGIN</b>&nbsp; <span class="caret" style="font-size: 8px!important;"></span></button>
                           <div class="dropdown-content">
                              <a href="tourist/">VISA</a>
                              <a href="bookings/">BOOKINGS</a>
                              <a href="aggregator/">AGGREGATOR</a>
                           </div>
                        </div>
                     </div>
                     <!--  <div class="login_text"><a href="login_options.html" style="color: #fff; text-decoration: none;">LOGIN</a></div>
                        <div class="login_sym">  </div> -->
                  </div>
               </div>
               <div class="nav_right">
                  <div class="menu_con">
                       <a href="https://stimulustours.com/blog/" class="menu_au menu_item">Blog</a>
                     <a href="about-us/" class="menu_au menu_item">About us</a>
                     <a href="holidays/" class="menu_au menu_item" >Packages</a>
                     <a href="agg_portal.html" class="menu_au menu_item">Aggregator</a>
                     <a href="https://stimulustours.com/wp/contact-us/" class="menu_au menu_item">Contact</a>
                   
                  </div>
               </div>
               <div class="nav_left" style="">
                  <div class="social_con">
                     <a class="fb social" href="https://www.facebook.com/stimulustours" target="_blank"><i class="fab fa-facebook-square"></i></a>
                     <a class="insta social" href="https://twitter.com/StimulusTours" target="_blank"><i class="fab fa-twitter"></i></a>
                     <a class="insta social" href="https://twitter.com/StimulusTours" target="_blank"><i class="fab fa-instagram"></i></a>
                     <a class="insta social" href="https://www.youtube.com/channel/UCJ1L_6KN0-2rEtFRrK954fA" target="_blank"><i class="fab fa-youtube"></i></a>
                     <a href="mailto:info@stimulustours.com" class="mail social"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                  </div>
               </div>
        
        
         <!---holiday & visa-->
         <div class="main1">
         <!-- 			</div>-->
         <div class="bg1 hd "></div>
         <div class="bg2 vs">
            <div class="vs-inner pure-g" style="z-index: 1; margin-bottom: 0px !important;">
               <div class="pure-u-3-8 p1" style="text-align:right;">
                  <p>GET YOUR VISA </p>
                  <div class="pure-u-1-1 p2">PROCESSED</div>
               </div>
               <div class="pure-u-2-8 p3" style="margin:auto 2.5vw;">
                  <p>&</p>
               </div>
               <div class="pure-u-3-8 p1">
                  <p>DROPPED AT YOUR</p>
                  <div class="pure-u-1-1 p2">DOORSTEP</div>
               </div>
            </div>
            <div class="pure-g p6 container2">
               <div class="pure-1-1" style="display: flex;">
                  <video  autoplay style="width: 80%;
                     height: 100%;
                     margin-top: -15vh;
                     z-index: 0;
                     margin: auto;" preload="auto" muted loop>
                     <source src="assets/images/visa.mp4" type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
               </div>
               <div class="list1 pure-g" style="overflow:hidden; ">
                  <div class="slider">
                     <ul type="none" class="slider-parent">
                        <?php
                            $ii = 1;
                            $fg = "select * from visa_pics where visa_id = '$get_id'";
                            $fty = mysqli_query($link, $fg);
                            while($bg = mysqli_fetch_array($fty, MYSQLI_ASSOC))
                            {
                                
                                $qw = $bg['visa_pic'];
                        ?>
                            <li class="images-list" data-slider="<?php echo $ii; ?>" style="background-image: url('<?php echo $qw; ?>') !important;"></li>
                        <?php
                            $ii++; }
                        ?>
                        <!--<li class="images-list" data-slider="2"></li>-->
                        <!--<li class="images-list" data-slider="3"></li>-->
                        <!--<li class="images-list" data-slider="4"></li>-->
                        <!--<li class="images-list" data-slider="5"></li>-->
                        <!--<li class="images-list" data-slider="6"></li>-->
                     </ul>
                     <ol class="buttom-circles">
                        <li class="buttom-circles-list slider-active" data-slider="1"><i class="fa fa-circle-thin"></i></li>
                        <li class="buttom-circles-list" data-slider="2"><i class="fa fa-circle-thin"></i></li>
                        <li class="buttom-circles-list" data-slider="3"><i class="fa fa-circle-thin"></i></li>
                        <li class="buttom-circles-list" data-slider="4"><i class="fa fa-circle-thin"></i></li>
                        <li class="buttom-circles-list" data-slider="5"><i class="fa fa-circle-thin"></i></li>
                        <li class="buttom-circles-list" data-slider="6"></li>
                     </ol>
                     <i class="fa fa-chevron-right fa-5x"></i>
                     <i class="fa fa-chevron-left fa-5x"></i>
                  </div>
               </div>
               <div class="con_name pure-g" >
                  <?php
                     $sql1 = "select * from visa_con where visa_id = '$get_id'";
                          $rt11 = mysqli_query($link, $sql1);
                          $row1 = mysqli_fetch_array($rt11, MYSQLI_ASSOC);
                     
                          $id1 = $row1['visa_id'];
                     
                          $rgh1 = "select * from country where id = '$id1'";
                          $gh1 = mysqli_query($link, $rgh1);
                          $bv1 = mysqli_fetch_array($gh1, MYSQLI_ASSOC);
                     
                     ?>
                  <p><?php echo $bv1['name']; ?></p>
                  <input  type="text" value="<?php echo $bv1['id']; ?>" id="content1111" hidden>
               </div>
               <div class="list2 pure-1-1">
                  <div class="pure-u-md-1-4 p7">
                     <div class="sublist" id="1">
                        <div id="ele" class="about">About the Country</div>
                     </div>
                     <div class="sublist1" id="2">
                        <div id="ele" class="business">Business Visa</div>
                     </div>
                     <div class="sublist2" id="3">
                        <div id="ele" class="tourist">Tourist Visa</div>
                     </div>
                     <div class="sublist3" id="4" class="transit">
                        <div id="ele">Transit Visa</div>
                     </div>
                     <div class="sublist4" id="5" class="employ">
                        <div id="ele">Employment Visa</div>
                     </div>
                      <div class="sublist5" id="6" class="link">
                        <div id="ele">Visa fees</div>
                     </div>
                     <div class="sublist6" id="7" class="link">
                        <div id="ele">E-Visa</div>
                     </div>
                     <div class="sublist7" id="8" class="link">
                        <div id="ele"><i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;&nbsp;Downloads</div>
                     </div>

                  </div>
                  <div class="pure-u-md-3-4 p7">
                     <div id="para" style="font-size: 0.9em;line-height: 3.5vh;
                        font-weight: 500;font-family: 'Montserrat',sans-serif;">
                        <!-- BUSINESS Visa Requirements for BELARUS (DELHI) <br>-->
                        <!--1. Passports-Valid Passport with at least 6 months Validity from the date of travel.<br>-->
                        <!--2. Application Form:- 2 Type visa application forms. Handwritten visa applications will not be ac-->
                        <!--cepted.<br>-->
                        <!--3. Photo:- 2 Photograph (Fresh ones Are NOT used earlier for any visa) (Latest one passport size.-->
                        <!--colored with white background, 35mmX45mm with 80% face coverage).<br>-->
                        <!--4. Covering Letter. The Visa Officer Embassy of Belarus on Letter Head from applicant.<br>-->
                        <!--5. Original Invitation In Belarusian (mention of visa validity required)<br>-->
                        <!--6. Company Registration Certificate. of the Belarus Company<br>-->
                        <!--7. Travel Itinerary (ticket)<br>-->
                        <!--8. Last 6 months Bank Statement (E statement will also do )<br>-->
                        <!--9. Travel Insurance covering entire stay-->
                     </div>
                  </div>
               </div>
            </div>
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
         </div>
      </main>
      
<button onclick="scrollTopAnimated()" style="position:fixed;left:15vw;bottom:4vh;background-color:rgba(0,0,0,0.3);height:3vw;width:3vw;border:0px;border-radius:15px;outline:0px;color:white;font-size:1.5vw;display:none;" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>

   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="assets/js/fittext.js"></script>
    <script src="../js/topscroll.js"></script>
   
   <script>
      $(".sublist,.sublist1,.sublist2,.sublist3,.sublist4,.sublist5,.sublist6,.sublist7,.sublist8").click(function(){
         
          var type=$(this).attr('id');
      
          var id = $('#content1111').val();
      
          $.post("fetch_visa.php",
          {
            id: id,
            type: type
          },
          function(data,status){
          //   alert("Data: " + data + "\nStatus: " + status);
      
            
            var t=[];
            
            t=data.split("$");
            
            var s="";
            var link="";
            
            if(type==8){
                
                 for(var i=0;i<t.length;i++)
                        {
                            
                            s+="<li><a target='_blank' href="+t[i]+">DOWNDLOAD PDF</a></li>";
                            
                            
                        }
                
                
                
            }
            
            
            else{
            
            for(var i=0;i<t.length;i++)
            {
                
                s+="<li>"+t[i]+"</li>";
                
                
            }
            
            }
            
            
            $("#para").html("<ul>"+s+"</ul>");
            
            //  $("#para").html(data);
            
            
          });
        });
   </script>
   <script type="text/javascript">
      $(function () {
      "use strict";
      
      var slider          = $('.slider'),
         sliderUl        = slider.find('.slider-parent'),
         sliderUlLi      = sliderUl.find('.images-list'),
         sliderOl        = slider.find('.buttom-circles'),
         sliderOlLi      = sliderOl.find('.buttom-circles-list'),
         sliderFaRight   = slider.find('> .fa:first-of-type'),
         sliderFaLeft    = slider.find('> .fa:last-of-type'),
         sliderTime      = 1000,
         sliderWait      = 4000,
         sliderSetInt,
         resumeAndPause;
      
      sliderFaLeft.fadeOut();
      
      
      function resetWH() {
         slider.width(slider.parent().width()).height(slider.parent().width() * 0.5);
         sliderUl.width(slider.width() * sliderUlLi.length).height(slider.height());
         sliderUlLi.width(slider.width()).height(slider.height());
      }
      resetWH();
      
      function runSlider() {
         if (sliderOlLi.hasClass('slider-active')) {
             sliderUl.animate({
                 marginLeft: -slider.width() * ($('.slider-active').data('slider') - 1)
             }, sliderTime);
         }
         if ($('.slider-active').is(':first-of-type')) {
             sliderFaLeft.fadeOut();
         } else {
             sliderFaLeft.fadeIn();
         }
         if ($('.slider-active').next().is(':last-of-type')) {
             sliderFaRight.fadeOut();
         } else {
             sliderFaRight.fadeIn();
         }
      }
      
      function runRight() {
         slider.each(function () {
             $('.slider-active').next().addClass('slider-active').siblings().removeClass('slider-active');
             runSlider();
         });
      }
      
      function runLeft() {
         slider.each(function () {
             $('.slider-active').prev().addClass('slider-active').siblings().removeClass('slider-active');
             runSlider();
         });
      }
      
      sliderSetInt = function autoRunSlider() {
         if ($('.slider-active').next().is(':last-of-type')) {
             sliderUl.animate({
                 marginLeft: -sliderUlLi.width() * $('.slider-active').data('slider')
             }, sliderTime, function () {
                 sliderUl.css('margin-left', 0);
                 sliderOlLi.first().addClass('slider-active').siblings().removeClass('slider-active');
             });
         } else {
             runRight();
         }
      };
      
      resumeAndPause = setInterval(sliderSetInt, sliderWait);
      
      
      $(window).on('resize', function () {
         resetWH();
      });
      
      
      slider.each(function () {
         sliderOlLi.click(function () {
             $(this).addClass('slider-active').siblings().removeClass('slider-active');
             runSlider();
         });
      });
      
      sliderFaRight.on('click', function () {
         runRight();
      });
      sliderFaLeft.on('click', function () {
         runLeft();
      });
      
      slider.find('.fa').hover(function () {
         clearInterval(resumeAndPause);
      }, function () {
         resumeAndPause = setInterval(sliderSetInt, sliderWait);
      });
      });
   </script>
   
<script>
    $(document).ready(function(){
        
            $(".sublist").trigger('click');
        
        
        
        
    })


</script>
</html>