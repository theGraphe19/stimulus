<?php
   include('../../dbconnection.php');
   
   if(isset($_POST['add_in']))
   {
           	$ho_glo_id = $_POST['ho_glob_id'];
           
           	foreach($_POST['ho_dates'] as $datess)
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
           
           	foreach($_POST['ho_in_content'] as $in)
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
           
           	foreach($_POST['ho_ex_content'] as $ex)
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
           	
           	
           	
           	
           	$total_includes = $_POST['total_includes'];
           	
           	// echo "<script>alert('$total_includes');</script>";
           	
           	for($fg = 1; $fg <= $total_includes; $fg++)
           	{
           	    $update_include_id = $_POST['update_includes_id'.$fg];
           	    $update_include = $_POST['update_includes'.$fg];
           	    
           	    $update_include = mysqli_real_escape_string($link, $update_include);
           	    
           	    $vb = "update holiday_packages_cost_includes set ho_in_content = '$update_include' where ho_in_id = '$update_include_id'";
           	    $b84 = mysqli_query($link, $vb);
           	}
           	
           	
           	$total_excludes = $_POST['total_excludes'];
           	
           	// echo "<script>alert('$total_includes');</script>";
           	
           	for($fgg = 1; $fgg <= $total_excludes; $fgg++)
           	{
           	    $update_exclude_id = $_POST['update_excludes_id'.$fgg];
           	    $update_exclude = $_POST['update_excludes'.$fgg];
           	    
           	    $update_exclude = mysqli_real_escape_string($link, $update_exclude);
           	    
           	    $vb2 = "update holiday_packages_cost_excludes set ho_ex_content = '$update_exclude' where ho_ex_id = '$update_exclude_id'";
           	    $b842 = mysqli_query($link, $vb2);
           	}
   	
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
            
            if($_FILES['ho_it_pic'.$i]['size'] > 0)
            {
            
                $file_name = $_FILES['ho_it_pic'.$i]['name'];
                $file_size =$_FILES['ho_it_pic'.$i]['size'];
                $file_tmp =$_FILES['ho_it_pic'.$i]['tmp_name'];
                $file_type=$_FILES['ho_it_pic'.$i]['type'];
                
                
                if($file_size < 2097152)
                {
                      $upload = move_uploaded_file($file_tmp,"../../assets/holiday_packages/".$file_name);
                    
                      $doc = "assets/holiday_packages/".$file_name;
                    
                      if($upload)
                      {
                            $sql15 = "update holiday_packages_itineary set ho_title = '$title', ho_content = '$content', ho_pic = '$doc' where ho_id = '$id1' and ho_day = '$day'";
                            $run15 = mysqli_query($link, $sql15);
                            
                      }
                      else
                      {
                          echo "<script>alert('Image Error. Try Again.');</script>";
                      }
                }
                else
                {
                    echo "<script>alert('Image size must be less than 2 MB.');</script>";
                }
                
            }
            else
            {
                $sql154 = "update holiday_packages_itineary set ho_title = '$title', ho_content = '$content' where ho_id = '$id1' and ho_day = '$day'";
                $run154 = mysqli_query($link, $sql154);
                    
            }
            
        }
        if($run15 || $run154)
        {
            echo "<script>alert('Itinenary updated.');</script>";
        }
        else
        {
            echo "<script>alert('Something went wrong. Try again.');</script>";
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
   
   if(isset($_POST['ho_package_update']))
   {
       $adult = $_POST['ho_price'];
       $child = $_POST['ho_child_price'];
       $code = $_POST['ho_code_update'];
       
        if($_FILES['change_cover']['size'] > 0)
        {
        
            $file_name = $_FILES['change_cover']['name'];
            $file_size =$_FILES['change_cover']['size'];
            $file_tmp =$_FILES['change_cover']['tmp_name'];
            $file_type=$_FILES['change_cover']['type'];
            
            
            if($file_size < 2097152)
            {
                  $upload = move_uploaded_file($file_tmp,"../../assets/holiday_packages/".$file_name);
                
                  $doc = "assets/holiday_packages/".$file_name;
                
                  if($upload)
                  {
                        $sql = "update holiday_packages set ho_price = '$adult', ho_child_price = '$child', ho_pic = '$doc' where ho_code = '$code'";
                        $run = mysqli_query($link, $sql);
                        
                        if($run)
                        {
                            echo "<script>alert('Price & Image updated.');</script>";
                        }
                        else
                        {
                            echo "<script>alert('Something went wrong. Try again.');</script>";
                        }
                  }
                  else
                  {
                      echo "<script>alert('Image Error. Try Again.');</script>";
                  }
            }
            else
            {
                echo "<script>alert('Image size must be less than 2 MB.');</script>";
            }
            
        }
        else
        {
            $sql1 = "update holiday_packages set ho_price = '$adult', ho_child_price = '$child' where ho_code = '$code'";
            $run1 = mysqli_query($link, $sql1);
            echo "<script>alert('Price updated.');</script>";
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
      <link rel="stylesheet" href="css/main.css">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
       
      <main>
          
          <div style="position: absolute; top: 5vh; right: 5vh">
              <button id="close_btn" style="width: 100px; height: 60px; background-color: rgba(0,0,0,0.9); color: white; border-radius: 20px; border: 0px;">CLOSE</button>
          </div>
          <script>
              $('#close_btn').click(function(){
                    window.close(); 
              });
          </script>
          
          
         <!---holida
         y & visa-->
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
                     $code2 = $_GET['ho_id'];
                     $sql6 = "select * from holiday_packages where ho_id = '$code2'";
                        			$get3 = mysqli_query($link, $sql6);
                        			$row3 = mysqli_fetch_array($get3, MYSQLI_ASSOC);
                     
                        		?>
                  <div class="list1 pure-1-1" style="background-image: url('../../<?php echo $row3['ho_pic']; ?>'); background-position: center;
background-size: cover;">
                     <form method="post" enctype="multipart/form-data" style="background-color: #ffffffa1; border-radius: 35px;">
                        <div class="pure-u-1-1 p7 cont" id="carosal">
                           <div class="pure-u-1-5 p2" style="color:black !important;"><?php echo $row3['ho_days']; ?></div>
                           <div class="pure-u-1-5 p2" style="color:black !important;"><?php echo $row3['ho_nights']; ?></div>
                           <div class="pure-u-2-5 p2" style="color:black !important; font-size: 1vw; text-align: right;">
                              Code : <?php $my_code = $row3['ho_code']; echo $row3['ho_code']; ?>
                           </div>
                           <br>
                           <div class="pure-u-1-5" style="color:black !important" id="days">days</div>
                           <div class="pure-u-1-5" style="color:black !important" id="nights">nights</div>
                           <br><br>
                           <div class="p10"><?php echo $row3['ho_destination']; ?></div>
                           <br>
                           <div style="font-style: italic;">
                              <img src="tag.png" class="imgs"/>
                              <span style="vertical-align: middle;">	₹<input type="text" style="margin-left:2%;width:30% !important;" class="edits_2" name="ho_price" value="<?php echo $row3['ho_price']; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adult</span>
                           </div>
                           <div class="pure-u-2-8 p2" style="color:black !important; font-size: 1vw; text-align: right;">
                              Change Image : <input type="file" name="change_cover">
                           </div>
                           <div style="font-style: italic;">
                              <img src="tag.png" class="imgs"/>
                              <span style="vertical-align: middle;">	₹<input type="text" style="margin-left:2%;width:30% !important;" class="edits_2" name="ho_child_price" value="<?php echo $row3['ho_child_price']; ?>" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Child</span>
                           </div>
                           <br>
                           
                           <div style="font-style: italic;">
                              <input type="text" name="ho_code_update" value="<?php echo $my_code; ?>" hidden/>
                              <span style="text-align: center;"><input type="submit" style="margin-left:45%; width: 150px !important; height: 60px; background-color: rgba(0,0,0,0.9); color: white; border-radius: 20px; border: 0px;" name="ho_package_update" value="UPDATE" required/></span>
                           </div>
                        </div>
                    </form>
                  </div>
               </div>
               <br>
               <div class="list4 pure-g">
               <div class="pure-u-1-3 costs">
               <form method="post" enctype="multipart/form-data" style="display:block !important;">
               <div class="pure-u-1-1" id="subhead2">DATES</div>


               <?php
                     $code1r = $my_code;
                     $sql4r = "select * from holiday_packages where ho_code = '$code1r'";
                     $get1r = mysqli_query($link, $sql4r);
                     $row1r = mysqli_fetch_array($get1r, MYSQLI_ASSOC);
                     
                     $ho_idr = $row1r['ho_id'];
                     
                     $sql5r = "select * from holiday_packages_dates where ho_id = '$ho_idr' order by ho_dates_id asc";
                     $get2r = mysqli_query($link, $sql5r);
                     while($row2r = mysqli_fetch_array($get2r, MYSQLI_ASSOC))
                     {
               ?>

                <div class="pure-u-1-1 subbox" style="position: relative;">
                   <input type="text" style="background-color: #3f54a2; text-align: center;" readonly value="<?php echo $row2r['ho_dates'] ?>" class="edits_4" />
                   <span style="position: absolute; top: 2.2vh; right: 2vw; font-size: 25px;"><a href="delete_iti.php?dates=<?php echo $row2r['ho_dates_id'] ?>&id=<?php echo $code2; ?>" style="text-decoration: none; color: #fff;">&#9746;</a></span>
                </div>


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
                     $code1rq = $my_code;
                     $sql4rq = "select * from holiday_packages where ho_code = '$code1rq'";
                     $get1rq = mysqli_query($link, $sql4rq);
                     $row1rq = mysqli_fetch_array($get1rq, MYSQLI_ASSOC);
                     
                     $ho_idrq = $row1rq['ho_id'];

                   
                     $op = 1;
                     $sql5rq = "select * from holiday_packages_cost_includes where ho_id = '$ho_idrq' order by ho_in_id asc";
                     $get2rq = mysqli_query($link, $sql5rq);
                     while($row2rq = mysqli_fetch_array($get2rq, MYSQLI_ASSOC))
                     {
                        
               ?>

<div class="pure-u-1-1 subbox " style="position: relative; height: 10vh !important">
    
    <input type="text" name="update_includes_id<?php echo $op; ?>" value="<?php echo $row2rq['ho_in_id']?>" hidden>
    <input type="text" name="update_includes<?php echo $op; ?>" style="background-color: #3f54a2; text-align: center;" value="<?php echo $row2rq['ho_in_content']?>" class="edits_4" />

<span style="position: absolute; top: -0.5vh; right: 1vw; font-size: 25px;"><a href="delete_iti.php?includes=<?php echo $row2rq['ho_in_id'] ?>&id2=<?php echo $code2; ?>" style="text-decoration: none; color: #fff;">&#9746;</a></span>

</div>


                     <?php $op++; } ?>



                <input type="text" name="total_includes" value="<?php echo $op = $op - 1; ?>" hidden>





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
                     $code1rqcc = $my_code;
                     $sql4rqcc = "select * from holiday_packages where ho_code = '$code1rqcc'";
                     $get1rqcc = mysqli_query($link, $sql4rqcc);
                     $row1rqcc = mysqli_fetch_array($get1rqcc, MYSQLI_ASSOC);
                     
                     $ho_idrqcc = $row1rq['ho_id'];

                   $po = 1;
                     
                     $sql5rqcc = "select * from holiday_packages_cost_excludes where ho_id = '$ho_idrqcc' order by ho_ex_id asc";
                     $get2rqcc = mysqli_query($link, $sql5rqcc);
                     while($row2rqcc = mysqli_fetch_array($get2rqcc, MYSQLI_ASSOC))
                     {
                        
               ?>

<div class="pure-u-1-1 subbox " style="position: relative; height: 10vh !important">
    
    <input type="text" name="update_excludes_id<?php echo $po; ?>" value="<?php echo $row2rqcc['ho_ex_id']?>" hidden>
    <input type="text" style="background-color: #3f54a2; text-align: center;" name="update_excludes<?php echo $po; ?>" value="<?php echo $row2rqcc['ho_ex_content']?>" class="edits_4" />


<span style="position: absolute; top: -0.5vh; right: 1vw; font-size: 25px;"><a href="delete_iti.php?excludes=<?php echo $row2rqcc['ho_ex_id'] ?>&id3=<?php echo $code2; ?>" style="text-decoration: none; color: #fff;">&#9746;</a></span>

</div>


                     <?php $po++; } ?>



<input type="text" name="total_excludes" value="<?php echo $po = $po - 1; ?>" hidden>







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
                     $code1 = $my_code;
                     $sql4 = "select * from holiday_packages where ho_code = '$code1'";
                     $get1 = mysqli_query($link, $sql4);
                     $row1 = mysqli_fetch_array($get1, MYSQLI_ASSOC);
                     
                     $ho_id = $row1['ho_id'];
                     
                     $sql5 = "select * from holiday_packages_itineary where ho_id = '$ho_id' order by ho_it_id asc";
                     $get2 = mysqli_query($link, $sql5);
                     while($row2 = mysqli_fetch_array($get2, MYSQLI_ASSOC))
                     {
                         
                        //  $g = $row2['ho_content'];
                        //  echo "<script>alert('$g');</script>";
                  ?>
                  
                  
                  <div class="pure-g subcon-main">
                     
                        <div class="pure-u-1-5 subcon1">
                           <p>DAY&nbsp;&nbsp;<?php echo $row2['ho_day']; ?><br/> <input style="text-align: center; font-size: 0.7em;" type="text" class="edits" style="height: 50% ;width:80% ;" name="ho_title<?php echo $row2['ho_day']; ?>" value="<?php echo $row2['ho_title']; ?>" /></p>
                        </div>
                        <div class="pure-u-2-5 subcon2">
                           <p id="size" style="width: 100%;text-align: center;">DETAILS<br/><textarea style="height: 18vh; padding: 10px;" rows="3" cols="10" class="edits" name="ho_content<?php echo $row2['ho_day']; ?>" value="<?php echo $row2['ho_content']; ?>"><?php echo $row2['ho_content']; ?></textarea></p>
                        </div>

                       

                        <div class="pure-u-2-5 subcon2">
                           <p id="size" style="width: 100%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;">
                           
                           <input style="" type="file"  id="file-id" style="height: 50% ;width:100% ;" onchange="showMyImage(this)" name="ho_it_pic<?php echo $row2['ho_day']; ?>" />  
                           <img  alt="upload" id="thumbnil" src="../../<?php echo $row2['ho_pic']; ?>" style="width: 22vh; height: 22vh;padding: 3px;">
                           
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
               <!--<div class="pure-g subcon-main">-->
               <!--   <form method="post" enctype="multipart/form-data">-->
               <!--      <div class="pure-u-1-1 subcon1">-->
               <!--         <input type="text" name="id" value="<?php echo $row2['ho_id']; ?>" hidden>-->
               <!--         <p id="size" style="width: 100%;text-align: center;"> <button type="text" class="sub" style="height: 70px ;width:200px ;" name="final_submit">FINISH</button></p>-->
               <!--      </div>-->
               <!--      <br><br>-->
               <!--      <div class="pure-u-1-1 subcon1">-->
               <!--         <input type="text" name="id" value="<?php echo $row2['ho_id']; ?>" hidden>-->
               <!--         <p id="size" style="width: 100%;text-align: center;"> <button type="text" class="sub" style="height: 70px ;width:200px ;" name="stop">CANCEL PACKAGE</button></p>-->
               <!--      </div>-->
               <!--   </form>-->
               <!--</div>-->
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