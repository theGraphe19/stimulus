<?php
    include('../dbconnection.php');
    
        if(isset($_POST['add_visa_con']))
        {
            $id = $_POST['visa_id'];
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
            
            
            //echo "<script>alert('$tot');</script>";
            // $dl = $_POST['visa_link'];
            
            
            $query3 = "update visa_con set visa_about = '$about', visa_business = '$bt', visa_tourist = '$tot', visa_transit = '$trt', visa_employment = '$emt', visa_electronic = '$elt', visa_time = '$tt', visa_ref = '$vr', visa_link = '$dl' where visa_id = '$id'";

            $df = mysqli_query($link, $query3);
            
            if($df)
            {
                echo "<script>alert('Document updated.');</script>";
            }
            else
            {
                echo "<script>alert('Something went wrong. Try Again.');</script>";
            }
        }
        
        if(isset($_POST['set_pdf']))
        {
            
            $id22 = $_POST['visa_id22'];
            
            $total2 = count($_FILES['visa_docs']['name']);
            
            for( $j=0 ; $j < $total2 ; $j++)
            {
                $file_name1 = $_FILES['visa_docs']['name'][$j];
                $file_size1 =$_FILES['visa_docs']['size'][$j];
                $file_tmp1 =$_FILES['visa_docs']['tmp_name'][$j];
                $file_type1=$_FILES['visa_docs']['type'][$j];
                
                
                if($file_size1 > 2097152)
                {
                    echo "<script>alert('File size must be less than 2 MB');</script>";
                }
                else
                {
                    $add1 = "../assets/visa/".$file_name1;
                    $add21 = "assets/visa/".$file_name1;

                    ///$de_name = basename($file_name, ".jpg");
                    
                    $mqo1 = move_uploaded_file($file_tmp1, $add1);

                    if($mqo1)
                    {
                        $query31 = "insert into visa_docs (v_id, v_docs_location) values ('$id22', '$add21')";

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
                        echo "<script>alert('Error. Something went wrong. Try Again.');</script>";
                    }
                }
            }
            if($j === $total2)
            {
                echo "<script>alert('All PDF uploaded.');</script>";
            }
            else
            {
                echo "<script>alert('Error in uploading PDF.');</script>";
            }
        }
        
        if(isset($_POST['set_images']))
        {
            
            $id2 = $_POST['visa_id2'];
            
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
                        $query3 = "insert into visa_pics (visa_id, visa_pic) values ('$id2', '$add2')";

                        $df = mysqli_query($link, $query3);

                        // if($df)
                        // {
                        //     echo "<script>alert('Images uploaded.');</script>";
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
                echo "<script>alert('All Images uploaded.');</script>";
            }
            else
            {
                echo "<script>alert('Error in uploading Images.');</script>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Visa Edit</title>
  <link rel="stylesheet" href="./visa_content_style.css">
    <style>
            textarea
            {
                font-size: 16px;
                padding: 10px;
            }
    </style>
</head>
<body>
    
    <center><p style="font-family:'Arial';">
        TAGS:<br/><br/>
        &lt;b&gt; BOLD TEXT &lt;/b&gt;<br/><br/>
        &lt;font color="colorname"&gt; COLORED FONT   &lt;/font&gt; 
        
    </p>
    </center>
<!-- partial:index.partial.html -->
<div class="tabordion">
    
    <?php
        
                $we = "select * from visa_con where visa_status = '1'";
                $nm = mysqli_query($link, $we);
                while($rt = mysqli_fetch_array($nm, MYSQLI_ASSOC))
                {
                    
                    $id = $rt['visa_id'];
                    
                    $fg = "select * from country where id = '$id'";
                    $nb = mysqli_query($link, $fg);
                    $fgh = mysqli_fetch_array($nb, MYSQLI_ASSOC);
    
    ?>
    
    
    
    
  <section id="section<?php echo $fgh['id']; ?>">
    <input type="radio" name="sections" id="option<?php echo $fgh['id']; ?>">
    <label for="option<?php echo $fgh['id']; ?>"><?php echo $fgh['nicename']; ?></label>
    <article>
      <center><h2><?php echo $fgh['nicename']; ?></h2></center><br>
            <form method="post" enctype="multipart/form-data" style="text-align: center">
        
                <input name="visa_id" type="text" hidden value="<?php echo $rt['visa_id']; ?>">
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    About Country : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_about" rows="6" cols="100" placeholder="<?php echo $rt['visa_about']; ?>"><?php echo $rt['visa_about']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Business Type : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_business" rows="6" cols="100"placeholder="<?php echo $rt['visa_business']; ?>"><?php echo $rt['visa_business']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Tourist Type : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_tourist" rows="6" cols="100" placeholder="<?php echo $rt['visa_tourist']; ?>"><?php echo $rt['visa_tourist']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Transit Type : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_transit" rows="6" cols="100" placeholder="<?php echo $rt['visa_transit']; ?>"><?php echo $rt['visa_transit']; ?></textarea>
           
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Employment Type : 
                </div>
                 <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_employment" rows="6" cols="100"placeholder="<?php echo $rt['visa_employment']; ?>"><?php echo $rt['visa_employment']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Electronic Type : 
                </div>
                 <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_electronic" rows="6" cols="100"placeholder="<?php echo $rt['visa_electronic']; ?>"><?php echo $rt['visa_electronic']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Visa Reference: 
                </div>
                 <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_ref" rows="6" cols="100" placeholder="<?php echo $rt['visa_ref']; ?>"><?php echo $rt['visa_ref']; ?></textarea>
                </div>
        
                <br><br>
        
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Time Taken : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_time" rows="6" cols="100" placeholder="<?php echo $rt['visa_time']; ?>"><?php echo $rt['visa_time']; ?></textarea>
                </div>
                <br><br>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    Download Links : 
                </div>
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <textarea name="visa_link" rows="6" cols="100" placeholder="<?php echo $rt['visa_link']; ?>"><?php echo $rt['visa_link']; ?></textarea>
                </div>
                <br><br>
                <!--<div class="pure-u-xl-1-1 pure-u-1-1">-->
                <!--    PDF : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="visa_pic">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Current PDF</a>-->
                <!--</div>-->
                <!--<br><br>-->
                <div class="pure-u-xl-1-1 pure-u-1-1">
                    <center><input type="submit" name="add_visa_con" value="UPDATE" style="width: 120px; height: 50px; font-size: 20px; color: #000;">
                    </center>
                </div>
                <br><br><br><br>
            </form>
            
            <div class="pure-u-xl-1-1 pure-u-1-1">
                
                
                <div style="text-align: center">
                    
                    <h4>Current Images</h4>
                    <?php
                    
                                $cr = "select * from visa_pics where visa_id = '$id'";
                                $bw = mysqli_query($link, $cr);
                                while($nqe = mysqli_fetch_array($bw, MYSQLI_ASSOC))
                    {
                    ?>
                    &#8226;&nbsp;&nbsp;&nbsp;<a target="_blank" href="https://stimulustours.com/<?php echo $nqe['visa_pic']; ?>">https://stimulustours.com/<?php echo $nqe['visa_pic']; ?></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="visa_delete.php?pdf_id=<?php echo $nqe['id']; ?>" style="text-decoration: none; color: #000; font-size: 22px;">&#9746;</a>
                    <br>
                    <?php } ?>
                    
                    
                </div>
                <br><br>
                <form method="post" enctype="multipart/form-data" style="text-align: center">
                    <input name="visa_id22" type="text" hidden value="<?php echo $rt['visa_id']; ?>">
                    Images : &nbsp;&nbsp;<input type="file" name="visa_pic[]" multiple required>
                    &nbsp;&nbsp;
                    <input type="submit" value="Set Images" name="set_images">
                </form>
            </div>
            <br><br>
            
            
            <div class="pure-u-xl-1-1 pure-u-1-1">
                
                
                <div style="text-align: center">
                    
                    <h4>Current PDF</h4>
                    <?php
                    
                                $cr1 = "select * from visa_docs where v_id = '$id'";
                                $bw1 = mysqli_query($link, $cr1);
                                while($nqe1 = mysqli_fetch_array($bw1, MYSQLI_ASSOC))
                    {
                    ?>
                    &#8226;&nbsp;&nbsp;&nbsp;<a target="_blank" href="https://stimulustours.com/<?php echo $nqe1['v_docs_location']; ?>">https://stimulustours.com/<?php echo $nqe1['v_docs_location'] ?></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="visa_delete.php?images_id=<?php echo $nqe1['v_doc_id']; ?>" style="text-decoration: none; color: #000; font-size: 22px;">&#9746;</a>
                    <br>
                    <?php } ?>
                    
                </div>
                <br><br>
                <form method="post" enctype="multipart/form-data" style="text-align: center">
                    <input name="visa_id2" type="text" hidden value="<?php echo $rt['visa_id']; ?>">
                    PDF : &nbsp;&nbsp;<input type="file" name="visa_docs[]" multiple required>
                    &nbsp;&nbsp;
                    <input type="submit" value="Set PDF" name="set_pdf">
                </form>
            </div>
            <br><br>
    </article>
  </section>
  
 
  
 <?php } ?> 
  
  
 
</div>
<!-- partial -->
  
</body>
</html>
