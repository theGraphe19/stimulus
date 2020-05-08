<?php
   session_start();
   include('../../dbconnection.php');
   date_default_timezone_set("Asia/Kolkata");
   
    if(isset($_POST['add_in']))
    {
        $ho_glo_id = $_POST['ho_glob_id'];
        
        foreach ($_POST['ho_dates'] as $datess)
        {
            $data2 = $datess;
            
            $new_date = date('d M, Y', strtotime($data2));
        
        
            if(!empty($data2))
            {
                $rtt = "INSERT INTO holiday_packages_dates (ho_id, ho_dates) VALUES ('$ho_glo_id', '$new_date')";
                mysqli_query($link, $rtt);
            }
        }
        echo '<script>alert("Dates Added");</script>';
        
        
        
        
        $ho_glo_id = $_POST['ho_glob_id'];
       
       	foreach ($_POST['ho_in_content'] as $in)
       	{
       		$data3 = $in;
       		$data3 = mysqli_real_escape_string($link, $data3);
       		
       		if(!empty($data3))
       		{
       			$rtttt = "INSERT INTO holiday_packages_cost_includes (ho_id, ho_in_content) VALUES ('$ho_glo_id', '$data3')";
       			mysqli_query($link, $rtttt);
       		}
       	}
       	echo '<script>alert("Cost Includes Added");</script>';
       	
       	
       	
       	
        
        $ho_glo_id = $_POST['ho_glob_id'];
       
       	foreach ($_POST['ho_ex_content'] as $ex)
       	{
       		$data4 = $ex;
       		$data4 = mysqli_real_escape_string($link, $data4);
       		
       		if(!empty($data4))
       		{
       			$rttttt = "INSERT INTO holiday_packages_cost_excludes (ho_id, ho_ex_content) VALUES ('$ho_glo_id', '$data4')";
       			mysqli_query($link, $rttttt);
       		}
       	}
   	    echo '<script>alert("Cost Excludes Added");</script>';
   }
   
   
   
   if(isset($_POST['iti_submit']))
   {


         $i = '0';
         $id = $_POST['id'];

         $sql2qw = "select * from holiday_packages where ho_code = '$id'";
         $getqw = mysqli_query($link, $sql2qw);
         $rowqw = mysqli_fetch_array($getqw, MYSQLI_ASSOC);

         $t_days = $rowqw['ho_days'];
         $id1 = $rowqw['ho_id'];

         for($i = 1; $i <= $t_days; $i++)
         {
               $day = $_POST['ho_day'.$i];
               
               $content = $_POST['ho_content'.$i];
               $content = mysqli_real_escape_string($link, $content);
               
               $title = $_POST['ho_title'.$i];
               $title = mysqli_real_escape_string($link, $title);

               if(isset($_FILES['ho_it_pic'.$i]))
               {
                  $file_name15 = $_FILES['ho_it_pic'.$i]['name'];
                  $file_size15 = $_FILES['ho_it_pic'.$i]['size'];
                  $file_tmp15 = $_FILES['ho_it_pic'.$i]['tmp_name'];
                  $file_type15 = $_FILES['ho_it_pic'.$i]['type'];
                  
                  if($file_size15 <= 2097152)
                  {
                     $upload15 = move_uploaded_file($file_tmp15,"../../assets/holiday_packages/".$file_name15);
            
                     if($upload15)
                     {
                        $doc15 = "assets/holiday_packages/".$file_name15;
                        $sql15 = "update holiday_packages_itineary set ho_title = '$title', ho_pic = '$doc15', ho_content = '$content' where ho_id = '$id1' and ho_day = '$day'";
                        $run15 = mysqli_query($link, $sql15);
                        
                        echo '<script>alert("Itinenary Updated.");</script>';
                     }
                     else
                     {
                        echo '<script>alert("Image Error.");</script>';
                     }
                  }
                  else
                  {
                     echo '<script>alert("Image size must be less than 2 MB.");</script>';
                  }
               }
               else
               {
                  echo '<script>alert("Select Image");</script>';
               }
         }

    }

   
   if(isset($_POST['stop']))
   {
        $info1 = $_SESSION['new_code'];
        
        $sql2e = "select * from holiday_packages where ho_code = '$info1'";
        $gete = mysqli_query($link, $sql2e);
        $rowe = mysqli_fetch_array($gete, MYSQLI_ASSOC);
        
        $info = $rowe['ho_id'];
        
        $sql1 = "delete from holiday_packages_cost_excludes where ho_id = '$info'";
        $run1 = mysqli_query($link, $sql1);
        
        $sql2 = "delete from holiday_packages_cost_includes where ho_id = '$info'";
        $run2 = mysqli_query($link, $sql2);
        
        $sql3 = "delete from holiday_packages_country where ho_id = '$info'";
        $run3 = mysqli_query($link, $sql3);
        
        $sql4 = "delete from holiday_packages_dates where ho_id = '$info'";
        $run4 = mysqli_query($link, $sql4);
        
        $sql5 = "delete from holiday_packages_itineary where ho_id = '$info'";
        $run5 = mysqli_query($link, $sql5);
        
        $sql = "delete from holiday_packages where ho_id = '$info'";
        $run = mysqli_query($link, $sql);
        
        unset($_SESSION['new_code']);
        echo '<script>alert("Holiday Package Canceled.");</script>';
        echo "<script>window.close();</script>";
   }
   
   if(isset($_POST['final_submit']))
   {
       	unset($_SESSION['new_code']);
       	echo '<script>alert("Holiday Package Created.");</script>';
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
                  <?php
                     $code2 = $_SESSION['new_code'];
                     $sql6 = "select * from holiday_packages where ho_code = '$code2'";
                        			$get3 = mysqli_query($link, $sql6);
                        			$row3 = mysqli_fetch_array($get3, MYSQLI_ASSOC);
                     
                        		?>
                  <div class="list1 pure-1-1" style="background-image: url('../../<?php echo $row3['ho_pic']; ?>')">
                     <form method="post" enctype="multipart/form-data">
                        <div class="pure-u-1-1 p7 cont" id="carosal">
                           <div class="pure-u-1-8 p2" style="color:black !important;"><?php echo $row3['ho_days']; ?></div>
                           <div class="pure-u-1-8 p2" style="color:black !important;"><?php echo $row3['ho_nights']; ?></div>
                           <div class="pure-u-5-8 p2" style="color:black !important; font-size: 1vw; text-align: right;">
                              Code : <?php echo $_SESSION['new_code']; ?>
                           </div>
                           <br>
                           <div class="pure-u-1-8" style="color:black !important" id="days">days</div>
                           <div class="pure-u-1-8" style="color:black !important" id="nights">nights</div>
                           <div class="p10"><?php echo $row3['ho_destination']; ?></div>
                           <br> 
                           <div style="font-style: italic;">
                              <img src="tag.png" class="imgs"/>
                              <span style="vertical-align: middle;">	₹<?php echo $row3['ho_price']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adult</span>
                           </div>
                           <div style="font-style: italic;">
                              <img src="tag.png" class="imgs"/>
                              <span style="vertical-align: middle;">	₹<?php echo $row3['ho_child_price']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Child</span>
                           </div>
                        </div>
                  </div>
               </div>
               <br>
               <div class="list4 pure-g">
               <div class="pure-u-1-3 costs">
               <form method="post" enctype="multipart/form-data" style="display:block !important;">
               <div class="pure-u-1-1" id="subhead2">DATES</div>


               <?php
                     $code1r = $_SESSION['new_code'];
                     $sql4r = "select * from holiday_packages where ho_code = '$code1r'";
                     $get1r = mysqli_query($link, $sql4r);
                     $row1r = mysqli_fetch_array($get1r, MYSQLI_ASSOC);
                     
                     $ho_idr = $row1r['ho_id'];
                     
                     $sql5r = "select * from holiday_packages_dates where ho_id = '$ho_idr' order by ho_dates_id asc";
                     $get2r = mysqli_query($link, $sql5r);
                     while($row2r = mysqli_fetch_array($get2r, MYSQLI_ASSOC))
                     {
               ?>

               <div class="pure-u-1-1 subbox"><input type="text" readonly style="background-color: #3f54a2; text-align: center;" value="<?php echo $row2r['ho_dates'] ?>" class="edits_4" /></div>


                     <?php } ?>



               <div class="pure-u-1-1 subbox"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid"><input type="date" placeholder="Enter date" name="ho_dates[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox"><input type="text" name="ho_glob_id" value="<?php echo $row3['ho_id']; ?>" hidden/>
               <button class="addbt add1">+</button>
               </div>
               <div class="pure-u-1-1 subbox "><button type="submit" style="display: none;" name="add_dates" class="sub ">SUBMIT</button></div>
               <!--</form>-->
               </div>
               <div class="pure-u-1-3 costs">
               <!--<form method="post" enctype="multipart/form-data" style="display:block !important;">-->
               <div class="pure-u-1-1" id="subhead2">COST INCLUDES</div>



               <?php
                     $code1rq = $_SESSION['new_code'];
                     $sql4rq = "select * from holiday_packages where ho_code = '$code1rq'";
                     $get1rq = mysqli_query($link, $sql4rq);
                     $row1rq = mysqli_fetch_array($get1rq, MYSQLI_ASSOC);
                     
                     $ho_idrq = $row1rq['ho_id'];

                   
                     
                     $sql5rq = "select * from holiday_packages_cost_includes where ho_id = '$ho_idrq' order by ho_in_id asc";
                     $get2rq = mysqli_query($link, $sql5rq);
                     while($row2rq = mysqli_fetch_array($get2rq, MYSQLI_ASSOC))
                     {
                        
               ?>

<div class="pure-u-1-1 subbox "><input type="text" readonly style="background-color: #3f54a2; text-align: center;" value="<?php echo $row2rq['ho_in_content']?>" class="edits_4" /></div>


                     <?php } ?>









               <div class="pure-u-1-1 subbox "><input type="text" placeholder="Enter info" name="ho_in_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid2"><input type="text" placeholder="Enter info" name="ho_in_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox "><button class="addbt add2">+</button></div><input type="text" name="ho_glob_id" value="<?php echo $row3['ho_id']; ?>" hidden/>
               <br><br>
               <div class="pure-u-1-1 subbox "><button type="submit" name="add_in" class="sub ">SUBMIT</button></div>
               <!--</form>-->
               </div>
               <div class="pure-u-1-3 costs">
               <div class="pure-u-1-1" id="subhead2">COST EXCLUDES</div>
               <!--<form method="post" enctype="multipart/form-data" style="display:block !important;">-->







               <?php
                     $code1rqcc = $_SESSION['new_code'];
                     $sql4rqcc = "select * from holiday_packages where ho_code = '$code1rqcc'";
                     $get1rqcc = mysqli_query($link, $sql4rqcc);
                     $row1rqcc = mysqli_fetch_array($get1rqcc, MYSQLI_ASSOC);
                     
                     $ho_idrqcc = $row1rq['ho_id'];

                   
                     
                     $sql5rqcc = "select * from holiday_packages_cost_excludes where ho_id = '$ho_idrqcc' order by ho_ex_id asc";
                     $get2rqcc = mysqli_query($link, $sql5rqcc);
                     while($row2rqcc = mysqli_fetch_array($get2rqcc, MYSQLI_ASSOC))
                     {
                        
               ?>

<div class="pure-u-1-1 subbox "><input type="text" readonly style="background-color: #3f54a2; text-align: center;" value="<?php echo $row2rqcc['ho_ex_content']?>" class="edits_4" /></div>


                     <?php } ?>











               <div class="pure-u-1-1 subbox "><input type="text" placeholder="Enter info" name="ho_ex_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]"   class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox hid3"><input type="text" placeholder="Enter info" name="ho_ex_content[]" class="edits_4" /></div>
               <div class="pure-u-1-1 subbox "><button class="addbt add3">+</button></div><input type="text" name="ho_glob_id" value="<?php echo $row3['ho_id']; ?>" hidden/>
               <div class="pure-u-1-1 subbox "><button type="submit" style="display: none;" name="add_ex" class="sub ">SUBMIT</button></div>
               </form>
               </div>
               </div>
               <div class="list3 pure-1-1" style="padding-bottom:8vh; ">







               <form method="post" enctype="multipart/form-data" style="display: block">
                  <div class="pure-u-1-1" id="subhead">ITINERARY</div>
                  <?php
                     $code1 = $_SESSION['new_code'];
                     $sql4 = "select * from holiday_packages where ho_code = '$code1'";
                     $get1 = mysqli_query($link, $sql4);
                     $row1 = mysqli_fetch_array($get1, MYSQLI_ASSOC);
                     
                     $ho_id = $row1['ho_id'];
                     
                     $sql5 = "select * from holiday_packages_itineary where ho_id = '$ho_id' order by ho_it_id asc";
                     $get2 = mysqli_query($link, $sql5);
                     while($row2 = mysqli_fetch_array($get2, MYSQLI_ASSOC))
                     {
                  ?>
                  <div class="pure-g subcon-main">
                     
                        <div class="pure-u-1-5 subcon1">
                           <p>DAY&nbsp;&nbsp;<?php echo $row2['ho_day']; ?><br/> <input style="text-align: center;" type="text" class="edits" style="height: 50% ;width:80% ;" name="ho_title<?php echo $row2['ho_day']; ?>" value="<?php echo $row2['ho_title']; ?>" /></p>
                        </div>
                        <div class="pure-u-2-5 subcon2">
                           <p id="size" style="width: 100%;text-align: center;">DETAILS<br/><textarea style="height: 18vh; padding: 10px;" rows="3" cols="10" class="edits" name="ho_content<?php echo $row2['ho_day']; ?>" placeholder="<?php echo $row2['ho_content']; ?>" value="<?php echo $row2['ho_content']; ?>"></textarea></p>
                        </div>

                       

                        <div class="pure-u-2-5 subcon2">
                           <p id="size" style="width: 100%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;">
                           
                           <input style="" type="file"  id="file-id" style="height: 50% ;width:100% ;" onchange="showMyImage(this)" name="ho_it_pic<?php echo $row2['ho_day']; ?>" />  
                           
                           
                           <?php
                                        if($row2['ho_pic'] === '0')
                                        {
                           ?>
                           
                           <img  alt="upload" id="thumbnil" src="#" style="width: 22vh;
height: 22vh;
padding: 3px;">
                           
                           <?php
                                        } else {
                           ?>
                           
                                    <img  alt="upload" id="thumbnil" src="../../<?php echo $row2['ho_pic']; ?>" style="width: 250px !important; padding: 3px;width: auto;">
                           
                           <?php        } ?>
                           
                           
                           
                          
                           
                           </p>
                        </div>
                        
                        
                        <div class="pure-u-1-5 subcon2">
                            
                            
                            
                            
                            
                           <input type="text" name="ho_day<?php echo $row2['ho_day']; ?>" value="<?php echo $row2['ho_day']; ?>" hidden>
                           
                        </div>
                     
                  </div> <script>
                                      
                             function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            
            // alert($(fileInput).attr('id'));
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=fileInput.nextElementSibling;  
            // alert(img);
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                        
                                       
                                    </script>
                  <br><br>
                  <?php } ?>
                     <input type="text" name="id" value="<?php echo $code1rq; ?>" hidden>
                     <p id="size" style="width: 100%; text-align: center;"> <button type="submit" class="sub" style="height: 60px; width:150px;" name="iti_submit">SUBMIT</button></p>
               </form>






               </div>
               <div class="pure-g subcon-main">
                  <form method="post" enctype="multipart/form-data">
                     <div class="pure-u-1-1 subcon1">
                        <input type="text" name="id" value="<?php echo $row2['ho_id']; ?>" hidden>
                        <p id="size" style="width: 100%;text-align: center;"> <button type="text" class="sub" style="height: 70px ;width:200px ;" name="final_submit">FINISH</button></p>
                     </div>
                     <br><br>
                     <div class="pure-u-1-1 subcon1">
                        <input type="text" name="id" value="<?php echo $row2['ho_id']; ?>" hidden>
                        <p id="size" style="width: 100%;text-align: center;"> <button type="text" class="sub" style="height: 70px ;width:200px ;" name="stop">CANCEL PACKAGE</button></p>
                     </div>
                  </form>
               </div>
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
   
</html>