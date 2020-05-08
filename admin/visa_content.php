<?php
        
        include('session.php');

        if(isset($_POST['add_visa_con']))
        {
            $con = $_POST['visa_con'];
            $about = $_POST['visa_about'];
            $bt = $_POST['visa_business'];
            $tot = $_POST['visa_tourist'];
            $trt = $_POST['visa_transit'];
            $emt = $_POST['visa_employment'];
            $elt = $_POST['visa_electronic'];
            $vr = $_POST['visa_ref'];
            $tt = $_POST['visa_time'];
            $dl = $_POST['visa_link'];
            
            $about = mysqli_real_escape_string($link, $about);
            $bt = mysqli_real_escape_string($link, $bt);
            $tot = mysqli_real_escape_string($link, $tot);
            $trt = mysqli_real_escape_string($link, $trt);
            $emt = mysqli_real_escape_string($link, $emt);
            $elt = mysqli_real_escape_string($link, $elt);
            $vr = mysqli_real_escape_string($link, $vr);
            $tt = mysqli_real_escape_string($link, $tt);
            $dl = mysqli_real_escape_string($link, $dl);
            
            $total2 = count($_FILES['visa_doc']['name']);
            
            for( $j=0 ; $j < $total2 ; $j++)
            {
                $file_name1 = $_FILES['visa_doc']['name'][$j];
                $file_size1 =$_FILES['visa_doc']['size'][$j];
                $file_tmp1 =$_FILES['visa_doc']['tmp_name'][$j];
                $file_type1=$_FILES['visa_doc']['type'][$j];
                
                
                if($file_size1 > 2097152)
                {
                    echo "<script>alert('Images size must be less than 2 MB');</script>";
                }
                else
                {
                    $add1 = "../assets/visa/".$file_name1;
                    $add21 = "assets/visa/".$file_name1;

                    ///$de_name = basename($file_name, ".jpg");
                    
                    $mqo1 = move_uploaded_file($file_tmp1, $add1);

                    if($mqo1)
                    {
                        $query31 = "insert into visa_docs (v_id, v_docs_location) values ('$con', '$add21')";

                        $df1 = mysqli_query($link, $query31);

                        // if($df)
                        // {
                        //     echo "<script>alert('PDF uploaded.');</script>";
                        // }
                        // else
                        // {
                        //     echo "<script>alert('Something went wrong. Try Again.');</script>";
                        // }
                    }
                    else
                    {
                        echo "<script>alert('Error. Something went wrong with images. Try Again.');</script>";
                    }
                }
            }
            if($j === $total2)
            {
                echo "<script>alert('All Images uploaded.');</script>";
            }
            else
            {
                echo "<script>alert('Error in uploading Images.');</script>";
            }
            
            
            $query3 = "update visa_con set visa_about = '$about', visa_business = '$bt', visa_tourist = '$tot', visa_transit = '$trt', visa_employment = '$emt', visa_electronic = '$elt', visa_time = '$tt', visa_ref = '$vr', visa_link = '$dl', visa_status = '1' where visa_id = '$con'";

            $df = mysqli_query($link, $query3);
            
            if($df)
            {
                echo "<script>alert('Visa Content Updated');</script>";
            }
            else
            {
                echo "<script>alert('Visa Content not Updated. Try Again.');</script>";
            }
            
            $total = count($_FILES['visa_pic']['name']);
            
            for( $i=0 ; $i < $total ; $i++)
            {
                $file_name = $_FILES['visa_pic']['name'][$i];
                $file_size =$_FILES['visa_pic']['size'][$i];
                $file_tmp =$_FILES['visa_pic']['tmp_name'][$i];
                $file_type=$_FILES['visa_pic']['type'][$i];
                
                
                if($file_size > 2097152)
                {
                    echo "<script>alert('File size must be less than 2 MB');</script>";
                }
                else
                {
                    $add = "../assets/visa/".$file_name;
                    $add2 = "assets/visa/".$file_name;

                    ///$de_name = basename($file_name, ".jpg");
                    
                    $mqo = move_uploaded_file($file_tmp, $add);

                    if($mqo)
                    {
                        $query3 = "insert into visa_pics (visa_id, visa_pic) values ('$con', '$add2')";

                        $df = mysqli_query($link, $query3);

                        // if($df)
                        // {
                        //     echo "<script>alert('PDF uploaded.');</script>";
                        // }
                        // else
                        // {
                        //     echo "<script>alert('Something went wrong. Try Again.');</script>";
                        // }
                    }
                    else
                    {
                        echo "<script>alert('Error. Something went wrong. Try Again.');</script>";
                    }
                }
            }
            if($i === $total)
            {
                echo "<script>alert('All PDF uploaded.');</script>";
            }
            else
            {
                echo "<script>alert('Error in uploading PDF.');</script>";
            }
            
        }
?>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css"  crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800,900&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="css/form_vs.css">

        <style>
            textarea
            {
                text-transform: none !important;
            }
        </style>
</head>

<body class="pure-g" style="">

<div class="form_con">

<form method="post" enctype="multipart/form-data">


  <div class="pure-u-xl-1-1 pure-u-1-1">
      
      
        <p style="text-transform:lowercase;font-family:'Arial';">
        help :<br/><br/>
        &lt;b&gt; BOLD TEXT &lt;/b&gt;<br/><br/>
        &lt;font color="colorname"&gt; COLORED FONT   &lt;/font&gt; 
        
    </p>
      
      
      </div>

           
        
        

        <div class="pure-u-xl-1-1 pure-u-1-1">


            Select Country : 
        </div>
     
        <div class="pure-u-xl-1-1 pure-u-1-1">

               <select name="visa_con" style="height: 50px;">
                    <?php
                            $biw = "select * from country order by nicename asc";
                            $tyu = mysqli_query($link, $biw);
                            while($mw = mysqli_Fetch_array($tyu, MYSQLI_ASSOC))
                            {
                    ?>

                        <option value="<?php echo $mw['id']; ?>"><?php echo $mw['nicename']; ?></option>

                    <?php } ?>
                </select>
        </div>

        <div class="pure-u-xl-1-1 pure-u-1-1">
            Images : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <input type="file" name="visa_pics[]" multiple required>
        </div>

        <div class="pure-u-xl-1-1 pure-u-1-1">
            About Country : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_about" rows="5" cols="100"></textarea>
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            Business Type : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_business" rows="5" cols="100"></textarea>
        </div>
        
        <div class="pure-u-xl-1-1 pure-u-1-1">
            Tourist Type : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_tourist" rows="5" cols="100"></textarea>
        </div>
    
        <div class="pure-u-xl-1-1 pure-u-1-1">
            Transit Type : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_transit" rows="5" cols="100"></textarea>
   
        </div>

        <div class="pure-u-xl-1-1 pure-u-1-1">
            Employment Type : 
        </div>
         <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_employment" rows="5" cols="100"></textarea>
        </div>

        <div class="pure-u-xl-1-1 pure-u-1-1">
            Electronic Type : 
        </div>
         <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_electronic" rows="5" cols="100"></textarea>
        </div>
    
        <div class="pure-u-xl-1-1 pure-u-1-1">
            Visa Reference: 
        </div>
         <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_ref" rows="5" cols="100"></textarea>
        </div>



        <div class="pure-u-xl-1-1 pure-u-1-1">
            Time Taken : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_time" rows="5" cols="100"></textarea>
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            Download Links : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <textarea name="visa_link" rows="5" cols="100"></textarea>
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            PDF : 
        </div>
        <div class="pure-u-xl-1-1 pure-u-1-1">
            <input type="file" name="visa_doc[]" multiple required>
        </div>

        <div class="pure-u-xl-1-1 pure-u-1-1">
            <center><input type="submit" name="add_visa_con" value="Submit" style="width: 150px; height: 60px; color: #000;">
            </center>
        </div>
    </form>
</div>
</body>
</html>