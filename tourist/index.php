<?php
   include('session.php');

   if(isset($_POST['upload_docs']))
   {
      if(!empty($_FILES['file-6']['name']))
        {
            $file_name = $_FILES['file-6']['name'];
            $file_size =$_FILES['file-6']['size'];
            $file_tmp =$_FILES['file-6']['tmp_name'];
            $file_type=$_FILES['file-6']['type'];
            
            
            if($file_size > 1000000)
            {
               echo "<script>alert('File size must be less than 1 MB');</script>";
            }
            else
            {
                $add = "../assets/documents/".$file_name;
                $add2 = "assets/documents/".$file_name;

                ///$de_name = basename($file_name, ".jpg");
                
                move_uploaded_file($file_tmp, $add);
                
               $query3 = "update visa set v_docs = '$add2' where v_id = '$id_session'";
               $df = mysqli_query($link,$query3);
                
               if($df)
               {
                  echo "<script>alert('Document uploaded.');</script>";
               }
               else
               {
                  echo "<script>alert('Something went wrong. Try Again.');</script>";
               }
                
            }
        }
        else
        {
            echo "<script>alert('Choose Files.');</script>";
        }
   }

   if(isset($_POST['remarks'])) {
      $iid = $_POST['v_id'];
      $rem = $_POST['v_remarks'];

      $hg = "update visa set v_remarks = '$rem' where v_id = '$iid'";
      $nw = mysqli_query($link, $hg);

      if($nw)
      {
         echo "<script>alert('Remarks updated.');</script>";
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Stimulus</title>


      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/tourist.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
      <link rel="stylesheet" type="text/css" href="upload/css/normalize.css" />
      <link rel="stylesheet" type="text/css" href="upload/css/demo.css" />
      <link rel="stylesheet" type="text/css" href="upload/css/component.css" />
      <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
      <style>
         .gear
         {
         width: 50px;
         }
      </style>
   </head>
   <body>
      <div class="nav_header">
         <div class="logo">
         </div>
      </div>
      <div class="main1">
         <div class="pure-g p1">
            <?php
               $sql = "select * from visa where v_id = '$id_session'";
               $get = mysqli_query($link, $sql);
               $row = mysqli_Fetch_array($get, MYSQLI_ASSOC);

               if($row['v_docs'] === '0')
               {
            ?>


            <div class="list pure-1-1">
            <form method="post" enctype="multipart/form-data">
               <div class="box">
                  <input type="file" name="file-6" id="file-6" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" />
                  <label for="file-6">
                     <figure>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                           <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                        </svg>
                     </figure>
                     <span style="color:rgba(255,255,255,0.2);"></span>
                  </label>
                  <p style="letter-spacing: 0vw;
                     font-weight: 600;
                     color: rgba(0,0,0,0.4);
                     text-align: center;
                     margin-top: 0px;">Upload your documents for a faster verification process</p>
                  <button type="submit" style="height: 6vh;
                     background-color: rgba(255,255,255,0.2);
                     width: 12%;
                     border: 0px;
                     border-radius: 31px;
                     color: white;
                     text-transform: uppercase;
                     font-weight: 700;
                     letter-spacing: 0.2vw;" name="upload_docs">Upload</button>
               </div>
               </form>
            </div>

            <?php } else { ?>

            <div class="list pure-1-1">
               <div class="box">
                  <p style="letter-spacing: 0vw;
                     font-weight: 600;
                     color: rgba(0,0,0,0.4);
                     text-align: center;
                     margin-top: 0px;">Documents uploaded</p>
                  <p style="letter-spacing: 0vw;
                     font-weight: 600;
                     color: rgba(0,0,0,0.4);
                     text-align: center;
                     margin-top: 0px;"><?= $row['v_docs']?></p>
                  <button id="view_docs" style="height: 6vh;
                     background-color: rgba(255,255,255,0.2);
                     width: 12%;
                     border: 0px;
                     border-radius: 31px;
                     color: white;
                     text-transform: uppercase;
                     font-weight: 700;
                     letter-spacing: 0.2vw;">View</button>
               </div>


               <script>
                  
                  $("#view_docs").click(function(){

                     window.open("../<?php echo $row['v_docs']; ?>");

                  });




               </script>







            </div>

            <?php } ?>

            <div class="list pure-1-1">
               <div class="pure-u-1-3 p2" style="text-align: right;">
                  <div><?php echo $row['v_name']; ?></div>
               </div>
               <div class="pure-u-1-3 p2">
                  <div><?php echo $row['v_phone']; ?></div>
               </div>
               <div class="pure-u-1-3 p2" style="text-align: left;">
                  <div><?php echo $row['v_destination']; ?></div>
               </div>
                <div class="pure-u-1-6 p2">
                </div>
               <div class="pure-u-1-6 p2">
                  <div>
                     <img class="gear" src="../assets/images/gear2.png"/>
                     <span style="vertical-align: middle;display:block;">Accepted</span>
                  </div>
               </div>
               <div class="pure-u-1-6 p2">
                  <div>
                     <?php
                        if($row['v_request'] >= 2)
                        {
                        	echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                        	echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;display:block;">Verified</span>
                  </div>
               </div>
               <div class="pure-u-1-6 p2">
                  <div>
                     <?php
                        if($row['v_request'] >= 3)
                        {
                           echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                           echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;display:block;">Processed</span>
                  </div>
               </div>
               <div class="pure-u-1-6 p2">
                  <div>
                     <?php
                        if($row['v_request'] >= 4)
                        {
                        	echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                        	echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                        ?>
                     <span style="vertical-align: middle;display:block;">Shipped</span>
                  </div>
               </div>
               <div class="pure-u-1-5 p2" style="text-align:right;">
                  <div>Admin Remarks</div>
               </div>
               <form method="post" enctype="multipart/form-data" style="display: inline;">
                  <div class="pure-u-3-5 p2">
                     <input type="text" value="<?php echo $id_session; ?>" name="v_id" hidden>
                     <textarea disabled name="v_remarks" style="width: 80%;min-height: 10vh;padding-left:2%;font-size:0.9em;font-weight:600;background-color: rgba(0,0,0,0.5);border: 0px solid black;border-radius: 37px;"><?php echo $row['a_remarks']; ?></textarea>
                  </div>
                  <div class="pure-u-1-5 p2">
                  
                  </div>
               </form>


               <div class="pure-u-1-5 p2" style="text-align:right;">
                  <div>Remarks</div>
               </div>
               <form method="post" enctype="multipart/form-data" style="display: inline;">
                  <div class="pure-u-3-5 p2">
                     <input type="text" value="<?php echo $id_session; ?>" name="v_id" hidden>
                     <textarea name="v_remarks" style="width: 80%;min-height: 10vh;padding-left:2%;font-size:0.9em;font-weight:600;background-color: rgba(0,0,0,0.5);border: 0px solid black;border-radius: 37px;"><?php echo $row['v_remarks']; ?></textarea>
                  </div>
                  <div class="pure-u-1-5 p2">
                     <button style="width: 60%;
                        min-height: 10vh;
                        padding-left: 2%;
                        font-size: 0.9em;
                        font-weight: 600;
                        background-color: rgba(0,0,0,0.5);
                        border: 0px solid black;
                        border-radius: 37px;"  data-id="<?php echo $id_session; ?>" class="add_remarks" type="submit" name="remarks"><span style="vertical-align: middle;">Submit</span></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      </div>
      </div>
   </body>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   <script src="upload/js/custom-file-input.js"></script>
   <script type="text/javascript"></script>
</html>