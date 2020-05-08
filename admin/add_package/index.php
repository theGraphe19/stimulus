<?php
   session_start();
   include('../../dbconnection.php');
   date_default_timezone_set("Asia/Kolkata");
   
//   if(empty($_SESSION['code']))
//   {
//   	    $_SESSION['code'] = "STIM".date('dsy')."ULUS".rand('1111','9999');
//   }
   
   
   if(isset($_POST['add_new']))
   {

         $stim = $_POST['ho_new_stim'];
         $p_code = $_POST['ho_new_code'];
         $t_count = $_POST['ho_new_count'];
         
         $code = $stim.$p_code.$t_count;
         
         $_SESSION['new_code'] = $code;
         
         $days = $_POST['ho_days'];
         $nights = $_POST['ho_nights'];
         $destination = $_POST['ho_destination'];
         $con = $_POST['ho_country'];
         $price = $_POST['ho_price'];
         $child = $_POST['ho_child_price'];
         
         if(isset($_FILES['ho_pic']))
         {
            $file_name = $_FILES['ho_pic']['name'];
            $file_size =$_FILES['ho_pic']['size'];
            $file_tmp =$_FILES['ho_pic']['tmp_name'];
            $file_type=$_FILES['ho_pic']['type'];
            
            
            if($file_size < 2097152)
            {
               $upload = move_uploaded_file($file_tmp,"../../assets/holiday_packages/".$file_name);
            
               $doc = "assets/holiday_packages/".$file_name;

               if($upload)
               {
                     $sql = "insert into holiday_packages (ho_code, ho_days, ho_nights, ho_destination, ho_country, ho_price, ho_child_price, ho_pic) 
                              values ('$code', '$days', '$nights', '$destination', '$con', '$price', '$child', '$doc')";
                     $run = mysqli_query($link, $sql);

                     if($run)
                     {
                        $sql2 = "select * from holiday_packages where ho_code = '$code'";
                        $get = mysqli_query($link, $sql2);
                        $row = mysqli_fetch_array($get, MYSQLI_ASSOC);

                        $get_id = $row['ho_id'];
                        
                        $get_days = $row['ho_days'];

                        for($i=1; $i<=$get_days; $i++)
                        {
                           $sql3 = "insert into holiday_packages_itineary (ho_id, ho_day) values ('$get_id', '$i')";
                           mysqli_query($link, $sql3);
                        }
                        
                        echo "<script>alert('Package created. Now fill details step by step.');</script>";
                        
                        echo "<script>location.href='package_details.php';</script>";
                     }
                     else
                     {
                        echo "<script>alert('Not Added.');</script>";
                     }
               }
               else
               {
                  echo "<script>alert('Image Error');</script>";
               }
            }
            else
            {
               echo "<script>alert('File size must be less than 2 MB');</script>";
            }
         }
         else
         {
            echo '<script>alert("Something went wrong with Image. Try Again.");</script>';
         }
   }
   
//   if(isset($_POST['add_in']))
//   {
//   	$ho_glo_id = $_POST['ho_glob_id'];
   
//   	foreach ($_POST['ho_dates'] as $datess)
//   	{
//          $data2 = $datess;
         
//          $new_date = date('d M, Y', strtotime($data2));


//   		if(!empty($data2))
//   		{
//   			$rtt = "INSERT INTO holiday_packages_dates (ho_id, ho_dates) VALUES ('$ho_glo_id', '$new_date')";
//   			mysqli_query($link, $rtt);
//   		}
   		
   		
//   	}
   
//   	echo '<script>alert("Dates Added");</script>';
// //   }
   
   
// //   if(isset($_POST['add_in']))
// //   {
//   	$ho_glo_id = $_POST['ho_glob_id'];
   
//   	foreach ($_POST['ho_in_content'] as $in)
//   	{
//   		$data3 = $in;
//   		if(!empty($data3))
//   		{
//   			$rtttt = "INSERT INTO holiday_packages_cost_includes (ho_id, ho_in_content) VALUES ('$ho_glo_id', '$data3')";
//   			mysqli_query($link, $rtttt);
//   		}
//   	}
//   	echo '<script>alert("Cost Includes Added");</script>';
// //   }
   
   
   
// //   if(isset($_POST['add_in']))
// //   {
//   	$ho_glo_id = $_POST['ho_glob_id'];
   
//   	foreach ($_POST['ho_ex_content'] as $ex)
//   	{
//   		$data4 = $ex;
//   		if(!empty($data4))
//   		{
//   			$rttttt = "INSERT INTO holiday_packages_cost_excludes (ho_id, ho_ex_content) VALUES ('$ho_glo_id', '$data4')";
//   			mysqli_query($link, $rttttt);
//   		}
//   	}
//   	echo '<script>alert("Cost Excludes Added");</script>';
//   }
   
   
   
//   if(isset($_POST['iti_submit']))
//   {


//          $i = '0';
//          $id = $_POST['id'];

//          $sql2qw = "select * from holiday_packages where ho_code = '$id'";
//          $getqw = mysqli_query($link, $sql2qw);
//          $rowqw = mysqli_fetch_array($getqw, MYSQLI_ASSOC);

//          $t_days = $rowqw['ho_days'];
//          $id1 = $rowqw['ho_id'];

//          for($i = 1; $i <= $t_days; $i++)
//          {
//               $day = $_POST['ho_day'.$i];
//               $content = $_POST['ho_content'.$i];
//               $title = $_POST['ho_title'.$i];

//               if(isset($_FILES['ho_it_pic'.$i]))
//               {
//                   $file_name15 = $_FILES['ho_it_pic'.$i]['name'];
//                   $file_size15 = $_FILES['ho_it_pic'.$i]['size'];
//                   $file_tmp15 = $_FILES['ho_it_pic'.$i]['tmp_name'];
//                   $file_type15 = $_FILES['ho_it_pic'.$i]['type'];
                  
//                   if($file_size15 <= 2097152)
//                   {
//                      $upload15 = move_uploaded_file($file_tmp15,"../../assets/holiday_packages/".$file_name15);
            
//                      if($upload15)
//                      {
//                         $doc15 = "assets/holiday_packages/".$file_name15;
//                         $sql15 = "update holiday_packages_itineary set ho_title = '$title', ho_pic = '$doc15', ho_content = '$content' where ho_id = '$id1' and ho_day = '$day'";
//                         $run15 = mysqli_query($link, $sql15);
                        
//                         echo '<script>alert("Itinenary Updated.");</script>';
//                      }
//                      else
//                      {
//                         echo '<script>alert("Image Error.");</script>';
//                      }
//                   }
//                   else
//                   {
//                      echo '<script>alert("Image size must be less than 2 MB.");</script>';
//                   }
//               }
//               else
//               {
//                   echo '<script>alert("Select Image");</script>';
//               }
//          }

//         //  if($run15)
//         //  {
//         //     echo '<script>alert("Itinerary uploaded");</script>';
//         //     unset($_SESSION['code']);
//         //     echo '<script>alert("Holiday Package Created.");</script>';
//         //     echo "<script>window.close();</script>";
//         //  }
//         //  else
//         //  {
//         //     echo '<script>alert("Something went wrong. Try again.");</script>';
//         //  }
//   }

   
//   if(isset($_POST['stop']))
//   {
//       $info1 = $_SESSION['code'];

//       $sql2e = "select * from holiday_packages where ho_code = '$info1'";
//       $gete = mysqli_query($link, $sql2e);
//       $rowe = mysqli_fetch_array($gete, MYSQLI_ASSOC);

//       $info = $rowe['ho_id'];

//       $sql1 = "delete from holiday_packages_cost_excludes where ho_id = '$info'";
//       $run1 = mysqli_query($link, $sql1);
      
//       $sql2 = "delete from holiday_packages_cost_includes where ho_id = '$info'";
//       $run2 = mysqli_query($link, $sql2);
      
//       $sql3 = "delete from holiday_packages_country where ho_id = '$info'";
//       $run3 = mysqli_query($link, $sql3);
      
//       $sql4 = "delete from holiday_packages_dates where ho_id = '$info'";
//       $run4 = mysqli_query($link, $sql4);
      
//       $sql5 = "delete from holiday_packages_itineary where ho_id = '$info'";
//       $run5 = mysqli_query($link, $sql5);

//       $sql = "delete from holiday_packages where ho_id = '$info'";
//       $run = mysqli_query($link, $sql);

//   	unset($_SESSION['code']);
//   	echo '<script>alert("Holiday Package Canceled.");</script>';
//   	echo "<script>window.close();</script>";
//   }
   
//   if(isset($_POST['final_submit']))
//   {
//   	unset($_SESSION['code']);
//   	echo '<script>alert("Holiday Package Created.");</script>';
//   	echo "<script>window.close();</script>";
//   }
   
        if(isset($_POST['add_cancel']))
        {
          unset($_SESSION['new_code']);
          echo '<script>alert("Holiday Package Canceled.");</script>';
          echo "<script>window.close();</script>";
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
      <link rel="stylesheet" href="css/main.css">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <main>
         <!---holiday & visa-->
         <div class="main1">
            <!-- 			</div>-->
            <!--			<div class="bg1 hd "></div>-->
            <div class="bg2 vs">
               
               <style>
                  .edits
                  {
                  width: 100%;
                  background-color: rgba(0,0,00,0.1);
                  border-radius: 25px;
                  border: 0px;
                  }
                  .edits_2
                  {
                  width: 60%;
                  background-color: rgba(0,0,00,0.1);
                  border-radius: 25px;
                  border: 0px;
                  padding:1%; 
                  }
                  form{
                  display: flex; width: 100%;height: 100%;margin:0px !important;
                  }
               </style>
               <div class="pure-g container2">
                  <br>
                  
            <div class="list1 pure-1-1">
               <form method="post" enctype="multipart/form-data">
                  <div class="pure-u-1-1 p7 cont" id="carosal">
                     <div class="pure-u-1-8 p2" style="color:black !important;"><input type="number" class="edits" min="1" name="ho_days" required/></div>
                     <div class="pure-u-1-8 p2" style="color:black !important;"><input type="number" min="1" name="ho_nights" class="edits" required/></div>
                     <div class="pure-u-5-8 p2" style="color:black !important; font-size: 1vw; text-align: right; margin-left: 10vw;">
                         
                         <?php
                                $hjr = "select count(*) from holiday_packages";
                                $bn = mysqli_query($link, $hjr);
                                $nmi = mysqli_fetch_array($bn, MYSQLI_ASSOC);
                                
                                $i = $nmi['count(*)'] + 1;
                         ?>
                        Code : <input type="text" readonly name="ho_new_stim" class="edits_2" value="STIM-" style="width: 20% !important; background-color: transparent; text-align: right;"><input type="text" class="edits_2" name="ho_new_code" placeholder="Ex: HIM-SIM-MAN" required style="width: 30% !important; text-align: center;"><input readonly name="ho_new_count" type="text" class="edits_2" value="-0<?php echo $i ; ?>" style="width: 20% !important; background-color: transparent; text-align: left;">&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;"></span>
                     </div>
                     <br>
                     <div class="pure-u-1-8" style="color:black !important" id="days">days</div>
                     <div class="pure-u-1-8" style="color:black !important" id="nights">nights</div>
                     <br><br>
                     <div class="p10"><input type="text" class="edits_2"  name="ho_destination" required/></div>
                     <div class="pure-u-1-8" style="color:black !important" id="days">destination</div>
                     <br><br>
                     <div class="p10">
                        <select class="edits_2" name="ho_country" required>
                        <?php
                          $btu = "select * from country";
                          $nqp = mysqli_query($link, $btu);
                          while( $mox = mysqli_fetch_array($nqp, MYSQLI_ASSOC))
                          {
                        ?> 
                        
                        <option value="<?php echo $mox['id']; ?>"><?php echo $mox['nicename']; ?></option> 
                         
                        <?php } ?> 
                        </select> 
                         <!--<input type="text" class="edits_2"  name="ho_country" />-->
                    </div>
                     <div class="pure-u-1-8" style="color:black !important" id="days">country</div>
                     <br><br>
                     <div style="font-style: italic;">
                        <img src="tag.png" class="imgs"/>
                        <span style="vertical-align: middle;">	₹<input type="text" style="margin-left:2%;width:30% !important;" class="edits_2" name="ho_price" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adult</span>
                     </div>
                     <br><br>
                     <div style="font-style: italic;">
                        <img src="tag.png" class="imgs"/>
                        <span style="vertical-align: middle;">	₹<input type="text" style="margin-left:2%;width:30% !important;" class="edits_2" name="ho_child_price" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Child</span>
                     </div>
                  </div>
            </div>
            <div class="list2 pure-g" style="padding-bottom: 8vh;">
            <div class="pure-u-1-1 p11"> Upload Files</div><br>
            <div class="con1 pure-u-1-1">
            <div class="pure-u-1" id="subhead3"><p>Upload Pic : <br/> <br/><input type="file" style="margin-left:2%;border-radius: 0px !important;" class="edits" name="ho_pic" required/>
            </p></div>
            </div>
            
            <div class="con1" style="background:rgba(0,0,0,0);">
            <div class="pure-u-1" id="subhead3">
            <p><input name="add_new" type="submit" style="height: 60px; width:120px; border-radius:60px;border: 0px; background-color:rgb(0, 131, 205) ;color:white;" value="CREATE"> 
            </p>
            </div>
            </form>
            <form method="post">
            <div class="pure-u-1" id="subhead3">
            <p><input name="add_cancel" type="submit" style="height: 60px; width:120px; border-radius:60px;border: 0px; background-color:rgb(0, 131, 205) ;color:white;" value="CANCEL">
            </p>
            </div>
            </div>
            </form>
            </div>
         </div>
      </main>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="js/fittext.js"></script>
   <!--	<script src="js/script.js"></script>-->
   <script>
      var inputs = $(".hid");
      count=0;
      
      $(".add1").click(function(){
          
          event.preventDefault();
              $(inputs[count]).fadeIn();
              $(inputs[count]).css({
      
      
              	'display':'flex'
              });
              count++;
           
          
      });
      
      
       var inputs2 = $(".hid2");
      count=0;
      
      $(".add2").click(function(){
          event.preventDefault();
          
              $(inputs2[count]).fadeIn();
              $(inputs2[count]).css({
      
      
              	'display':'flex'
              });
              count++;
           
          
      });
      
       var inputs3 = $(".hid3");
      count=0;
      
      $(".add3").click(function(){
          
          event.preventDefault();
              $(inputs3[count]).fadeIn();
              $(inputs3[count]).css({
      
      
              	'display':'flex'
              });
              count++;
           
          
      });
      
      
   </script>
   <script></script>
</html>