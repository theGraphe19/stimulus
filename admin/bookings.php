<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Stimulus home</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/admin_bookings.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>.gear{width: 50px;} .left-box{display: block;}</style>
   </head>
   <body>
      <!-- <div class="nav_header">
      <a href="../"><div class="logo">
         </div></a>
      </div> -->
      <div class="main1">
         <div class="bg1">
            <div class="pure-g top-con container">
               <div class="pure-u-1-3 top" >
                  <div class="pure-u-3-3"><img src="../assets/images/check-box.png" class="sz chk"><span style="vertical-align:middle;"><b><i>Select all</i></b></span></div>
               </div>
               <div class="pure-u-1-3 top" >
                  <div class="dropdown">
                     <button type="submit" class="pure-button dropbtn"><b>Select</b>&nbsp; <span class="caret" style="font-size: 8px!important;"></span></button>
                     <div class="dropdown-content">
                        <a class="download">Download</a>
                        <a class="share" onclick="myFunction()">Share</a>
                        <a class="delete">Delete</a>
                     </div>
                     <script>
                        function myFunction() {
                           var person = prompt("Please enter Email Address");
                           var e=[];
                           var id_string="";

                           if(!$(".all").hasClass("checked"))
                           {
                              $(".checked").each(function(){ 
                                    e.push($(this).attr('data-check'));
                                    id_string+='id[]='+$(this).attr('data-check')+'&';
                              });

                              if(id_string == ''){
                                 alert('Please select the data you want to download.');
                              } else {
                                 var person = "person="+person;
                                 window.open("booking_share.php?"+id_string+person);
                              }
                           }
                        }
                     </script>
                  </div>
               </div>
            </div>

            <?php

                  $hg = "select * from package_users";
                  $rt = mysqli_query($link, $hg);
                  while($bw = mysqli_fetch_array($rt, MYSQLI_ASSOC))
                  {

                     $pc_id = $bw['pc_id'];

                     $nq = "select * from package_booking where pc_id = '$pc_id'";
                     $mq = mysqli_query($link, $nq);
                     $mae = mysqli_fetch_array($mq, MYSQLI_ASSOC);
            ?>

            
            <div class="container">
               <div class="left-box" data-check="<?php echo $bw['pc_id']; ?>"> <img class="c_box" src="../assets/images/check-box.png" class="sz"> </div>
                  <div class="right-box box-inner pure-g" reference="<?php echo $bw['pc_id']; ?>">

                     <div class="pure-u-1-5 cl1">

                        <input type="text" class="edit_det" name="pc_name" value="<?php echo $bw['pc_name']; ?>">
                        <span class="dets"><?php echo $bw['pc_name']; ?></span>

                        <div class="visa">Package Code : 
                        <input type="text" class="edit_det" name="pc_b_code" value="<?php echo $mae['pc_b_code']; ?>">
                        <span class="dets"><?php echo $mae['pc_b_code']; ?></span></div>

                     </div>
                     
                     <div class="pure-u-3-5 cl2">
                        <div class="pure-g">

                           <input type="text" class="edit_det" name="pc_email" value="<?php echo $bw['pc_email']; ?>">
                              <span class="pure-u-1-2 dets" style="text-align: right;"><?php echo $bw['pc_email']; ?></span>

                           <input type="text" class="edit_det" name="pc_phone" value="<?php echo $bw['pc_phone']; ?>">
                              <span class="pure-u-1-2 dets" style="text-align: center;"> +91 <?php echo $bw['pc_phone']; ?> </span>
                           
                        </div>
                        <!-- <div class="docu"> <a href="#">View Documents</a></div> -->
                        
                     </div>
                     
                     <div class="pure-u-1-5 cl3" id="<?php echo $bw['pc_id']; ?>">
                        <input type="text" name="pc_id" value="<?php echo $bw['pc_id']; ?>" hidden>

                        <?php
                           if($bw['pc_status'] === '0' && $mae['pc_b_status'] === '0')
                           {
                        ?>
                              <input type="text" name="pc_id" value="<?php echo $bw['pc_id']; ?>" hidden>


                              <button name="accept_pc" data-id="<?php echo $bw['pc_id']; ?>" class="pure-button btn-status accept_pc"><img src="../assets/images/ok.png" class="sz"></button>
                              <button name="reject_pc" data-id="<?php echo $bw['pc_id']; ?>" class="pure-button btn-status reject_pc"><img src="../assets/images/not-ok.png" class="sz"></button>


                              <button type="submit"  data-id="<?php echo $bw['pc_id']; ?>" name="accept_pc" class="pure-button btn-status accept_v"><img src="../assets/images/ok.png" class="sz"></button>
                              <button type="submit" class="pure-button btn-status"><img src="../assets/images/not-ok.png" class="sz"></button>

                     
                        <?php 
                           } else {
                        ?>
                              <p><button type="submit" class="pure-button btn btn_edit_req"><b>EDIT</b></button></p>

                              <div class="dropdown">
                                       
                                       <button type="submit" class="pure-button dropbtn"><b>Select</b> &nbsp; <span class="caret" style="font-size: 8px!important;"></span>
                                       </button>
                                       <div id="<?php echo $bw['pc_id']; ?>" class="dropdown-content">
                                                <a class="pc_steps" data-status="2">Paid</a>
                                                <a class="pc_steps" data-status="3">Flights Booked</a>
                                                <a class="pc_steps" data-status="4">Confirmed</a>
                                       </div>
                              
                              </div>

                        <?php
                           }
                        ?>
                     </div>
                     
                     <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;font-weight: 900;margin-top:4%;">
                        <p></p>
                     </div>

                     <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;text-align:center;font-weight: 900;margin-top: 4%;">
                        <?php
                           if($bw['pc_status'] >= 2)
                           {
                              echo '<img class="gear" src="../assets/images/gear2.png"/>';
                           }
                           else
                           {
                              echo '<img class="gear" src="../assets/images/gear.png"/>';
                           }
                        ?>
                        <p>Paid</p>
                     </div>
                     <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;text-align:center;font-weight: 900;margin-top: 4%;">
                        <?php
                           if($bw['pc_status'] >= 3)
                           {
                              echo '<img class="gear" src="../assets/images/gear2.png"/>';
                           }
                           else
                           {
                              echo '<img class="gear" src="../assets/images/gear.png"/>';
                           }
                        ?>
                        <p>Flights Booked</p>
                     </div>
                     <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;text-align:center;font-weight: 900;margin-top: 4%;">
                        <?php
                           if($bw['pc_status'] >= 4)
                           {
                              echo '<img class="gear" src="../assets/images/gear2.png"/>';
                           }
                           else
                           {
                              echo '<img class="gear" src="../assets/images/gear.png"/>';
                           }
                        ?>
                        <p>Confirmed</p>
                     </div>
                     
                     <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;font-weight: 900;margin-top:4%;">
                        <p></p>
                     </div>
                     
                  </div>
                  
               </div>
            <!-- ...........box container end............ -->



                  <?php } ?>




            <!-- <div class="container">
               <div class="left-box"> <img src="../assets/images/check-box.png" class="sz"> </div>
               <div class="right-box box-inner pure-g">
                  <div class="pure-u-1-5 cl1">
                     <div>PERSON A</div>
                     <div class="visa">USA,UK,China<br>(Visa Type)</div>
                  </div>
                  <div class="pure-u-3-5 cl2">
                     <div class="pure-g">
                        <div class="pure-u-1-2" style="text-align: right;">abcd@something.com </div>
                        <div class="pure-u-1-2" style="text-align: center;"> +91 2365478963</div>
                     </div>
                     <div class="docu"> <a href="#">View Documents</a></div>
                  </div>
                   <div class="pure-u-1-5 cl3">
                     <button type="submit" class="pure-button btn-status"><img src="img/ok.png" class="sz"></button>
                     <button type="submit" class="pure-button btn-status"><img src="img/not-ok.png" class="sz"></button>
                     
                     </div>
                  <div class="pure-u-1-5 cl3">
                     <p><button type="submit" class="pure-button btn"><b>EDIT</b></button></p>
                     <div class="dropdown">
                        <button type="submit" class="pure-button dropbtn"><b>Select</b> &nbsp; <span class="caret" style="font-size: 8px!important;"></span></button>
                        <div id="myDropdown" class="dropdown-content">
                           <a href="#">Verified</a>
                           <a href="#">Processed</a>
                           <a href="#">Shipped</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
            <!-- ...........box container end............ -->








         </div>
      </div>
   </body>



<script>

$(".accept_pc").click(function(){

   
      
      var a=$(this).attr('data-id');
      
      $.post("accept_pck.php",
      {
         pc_id: a
      },
      function(data, status){
         alert("Package Booking Accepted");
         
         $('#'+a).html(data);
         
         $(".p1").load("bookings.php");
      });
   });




$(".pc_steps").click(function(){
   
   var a=$(this).parent().attr('id');
   var b=$(this).attr('data-status');



   // alert(a);

   $.post("pck_booking_steps.php",
   {
      pc_id: a,
      data:b
   },
   function(data, status){
      alert(data);
      $(".p1").load("bookings.php");
      // $('#'+a).html(data);
   });
});



$('.left-box').click(function(){
         
   if($(this).hasClass("checked"))
   {
      $(this).find('.c_box').attr('src', '../assets/images/check-box.png');
      $(this).removeClass("checked");
   }

   else{
   //alert("asdas");
      $(this).find('.c_box').attr('src', '../assets/images/check-box-checked.png');
      $(this).addClass("checked");
   }

});






         var count=0;


$(".btn_edit_req").click(function(){

                  if(count==0)

                  {

                  var a=$(this).parent().parent().attr('id');
                  $(".right-box[reference="+a+"]").find("input[type=text]").fadeIn();
                  $(".right-box[reference="+a+"]").find(".dets").fadeOut();
                  $(this).html("UPDATE");
                  $(this).addClass("update_agent");

                  count++;
                  }

                  else{
                     alert("Entered else");

                     var col=[];
                     var val=[];
                     var fields=[];

                     fields=  $(this).parent().parent().parent().parent().find(".edit_det");

                           $.each(fields,function(){

                              col.push($(this).attr('name'));
                              val.push($(this).val());

                              //col = ['pc_name', 'pc_b_code', 'pc_email', 'pc_phone']
                              // val = updated values of each

                              // alert($(this).attr('name')+$(this).val());

                           });

                           // $.each(fields,function(){              

                           //       alert($(this).val());

                           //       b.push($(this).parent().find(".edit_det").attr('name')); 


                           //       c.push($(this).parent().find(".edit_det").val()); 
                        
                           // }) 
                           console.log(val);
                           var id=$(this).parent().parent().attr('id');

                           // alert(id);

                        $.post("booking_update.php",
                        {
                           values:val,
                           pc_id:id
                        },
                        function(data, status){
                           alert("updated");
                           $(".p1").load("bookings.php");
                        });
                  }
});




// $(".btn_edit_req").click(function(){

//    var a=$(this).parent().parent().attr('id');
//    $(".right-box[reference="+a+"]").find("input[type=text]").fadeIn();
//    $(".right-box[reference="+a+"]").find(".dets").fadeOut();
//    $(this).html("UPDATE");

// });


// $(".accept_s").click(function(){

// var bb=$(this).attr('data-id');

// $.post("visa_steps.php",
// {
// v_id: bb
// },
// function(data, status){
// alert("Verified");

// // $('#'+a).html(data);

// $('.dropdown-content').load("visa_requests.php");
// });
// });






$(".btn_edit_req").click(function(){

         var a=$(this).parent().parent().attr('id');

         alert(a);

         $(".right-box[reference="+a+"]").find("input[type=text]").fadeIn();

         $(".right-box[reference="+a+"]").find(".dets").fadeOut();

         $(this).html("UPDATE");

});




$(".download").click(function(){

   var d=[];
   var id_string="";

   if(!$(".all").hasClass("checked"))
   {
      $(".checked").each(function(){ 
            d.push($(this).attr('data-check')); 
            id_string+='id[]='+$(this).attr('data-check')+'&';
      
      });
      if(id_string == ''){
         alert('Please select the data you want to download.');
      } else{
         window.open("booking_download.php?"+id_string);
      }
   }
});
$(".delete").click(function(){

   var b=[];
   var id_string="";

   if(!$(".all").hasClass("checked"))
   {
      $(".checked").each(function(){ 
            b.push($(this).attr('data-check')); 
            id_string+='id[]='+$(this).attr('data-check')+'&';
      
      });
      if(id_string == ''){
         alert('Please select the data you want to delete.');
      } else{
         $.post("booking_delete.php",
            {
               id: b
            },
            function(data, status){
               alert('Deleted');
               $(".p1").load("bookings.php");
            });
      }
   }
});

// $(".delete").click(function(){

//    var b=[];

//    // b.forEach(function(item) {
//    //    alert(item);
//    // });
   
//    if(!$(".all").hasClass("checked"))
//    {
//       $(".checked").each(function(){
//             b.push($(this).attr('data-check'));
//             id_string+='id[]='+$(this).attr('data-check')+'&';
//       });
//       if(id_string == ''){
//          alert('Please select the data you want to delete.');
//       } else{
//          $.post("booking_delete.php",
//          {
//             id: b
//          },
//          function(data, status){
//             alert('Deleted');
//             $(".p1").load("bookings.php");
//          });
//       }
//    }
// });

</script>








</html>