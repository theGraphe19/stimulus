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
      <link rel="stylesheet" href="../assets/css/admin.css">
      <script
         src="https://code.jquery.com/jquery-3.4.1.min.js"
         integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
         crossorigin="anonymous">
      </script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
         

         .gear{

            height: 32%;
         }

         .left-box{

            display: block ;



         }
         .select_all{


         opacity:1  ;


         }


         .select_drop{


         opacity:1 ;


         }




</style>

   </head>
   <body>
      <div class="main1">
         <div class="bg1">
            <div class="pure-g top-con container">
               <div class="pure-u-1-3 top select_all" >
                  <div class="pure-u-3-3 all"><img id="c_all" src="../assets/images/check-box.png" class="sz chk"><span style="vertical-align:middle;"><b><i>Select all</i></b></span></div>
               </div>
               <div class="pure-u-1-3 top select_drop" >
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
                                 alert('Please select the data you want to share.');
                              } else {
                                 var person = "person="+person;
                                 window.open("visa_share.php?"+id_string+person);
                              }
                           }
                        }
                     </script>
                  </div>
               </div>
               <!--  <div class="pure-u-1-3 top" >
                  <button type="submit" class="pure-button pure-u-1-4" id="btn1">AGENT</button>
                  <button type="submit" class="pure-button pure-u-1-4" id="btn2">CLIENTS</button>
               </div> -->
            </div>





            <?php
                    
                    $fetch_sql = "select * from visa";
                    $fetch = mysqli_query($link, $fetch_sql);
                    while($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC))
                    {
                        
                       
            ?>





            <div class="container">
               <div class="left-box" data-check="<?php echo $row['v_id']; ?>"> <img class="c_box" src="../assets/images/check-box.png" class="sz"> </div>
               <div class="right-box box-inner pure-g ta_det" reference="<?php echo $row['v_id']; ?>">
                  <div class="pure-u-1-5 cl1">
                     <div>
                        <input type="text" class="edit_det" name="v_name" value="<?php echo $row['v_name']; ?>">
                        <span class="dets"><?php echo $row['v_name']; ?></span>
                     </div>

                     <div class="visa">
                        
                        <?php
                              $gqe = $row['v_destination'];
                              $we1 = "select * from country where id = '$gqe'";
                              $rty1 = mysqli_query($link, $we1);
                              $ghkal1 = mysqli_fetch_array($rty1, MYSQLI_ASSOC);

                        ?>
                        
                        <input type="text" class="edit_det" name="v_destination" value="<?php echo $ghkal1['id']; ?>">
                        <span class="dets"><?php echo $ghkal1['nicename']; ?></span>

                        <br>

                        <input type="text" class="edit_det" name="v_purpose" value="<?php echo $row['v_purpose']; ?>">
                        <span class="dets">(<?php echo $row['v_purpose']; ?>)</span>

                     </div>
                  </div>

                  <div class="pure-u-3-5 cl2">
                     <div class="pure-g">

                        <div class="pure-u-1-2" style="text-align: right;">
                           <input type="text" class="edit_det" name="v_email" value="<?php echo $row['v_email']; ?>">
                           <span class="dets"><?php echo $row['v_email']; ?></span>
                        </div>
                        <div class="pure-u-1-2" style="text-align: center;">
                           <input type="text" class="edit_det" name="v_phone" value="<?php echo $row['v_phone']; ?>">
                           <span class="dets">+91 <?php echo $row['v_phone']; ?></span>
                        </div>
                        <div class="pure-u-1-1" style="text-align: center;margin-top: 6%;">
                            <?php
                                if($row['v_docs'] === '0')
                                {
                            ?>
                                    No Documents Found
                          <?php }
                           else
                           { ?>
                           
                           <a href="../<?php echo $row['v_docs']; ?>" target="_blank">View Documents</a>
                           
                          <?php } ?>
                        </div>
                                
                     </div>
                     <!-- <div class="docu"> <a target="_blank" href="../<?php //echo $row['ta_doc']; ?>">View Documents</a></div>
               --></div>

                  <div class="pure-u-1-5 cl3" id="<?php echo $row['v_id']; ?>">
               
                     <?php
                           if($row['v_request']==='0')
                           {

                     ?>      <!-- <button a href="#" class="pure-button btn btn-info btn-lg btn-status">
                        <span class="glyphicon glyphicon-ok"></span></button>
                        
                        <a href="#" class="pure-button btn btn-info btn-lg btn-status" style="margin-right: 0%!important;">
                        <span class="glyphicon glyphicon-remove"></span></a>	 -->


                  

                    

                     <input type="text" name="v_id" value="<?php echo $row['v_id']; ?>" hidden>

                     <button type="submit"  data-id="<?php echo $row['v_id']; ?>" name="accept_v" class="pure-button btn-status accept_v"><img src="../assets/images/ok.png" class="sz"></button>
                     <button type="submit" class="pure-button btn-status"><img src="../assets/images/not-ok.png" class="sz"></button>
                  
                


                     <?php

                        }
                        else
                        {

                     ?>

                     <p><button type="submit" class="pure-button btn btn_edit_req"><b>EDIT</b></button></p>
                     
                     <div class="dropdown">
                     			
                              <button type="submit" class="pure-button dropbtn"><b>Select</b> &nbsp; <span class="caret" style="font-size: 8px!important;"></span>
                              </button>
                     			<div id="myDropdown" class="dropdown-content">
                                       <a class="v_steps" data-status="2">Verified</a>
                                       <a class="v_steps" data-status="3">Processed</a>
                                       <a class="v_steps" data-status="4">Shipped</a>
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
                        if($row['v_request'] >= 2)
                        {
                           echo '<img class="gear" src="../assets/images/gear2.png"/>';
                        }
                        else
                        {
                           echo '<img class="gear" src="../assets/images/gear.png"/>';
                        }
                     ?>
                     <p>Verified</p>
                  </div>
                  <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;text-align:center;font-weight: 900;margin-top: 4%;">
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
                     <p>Processed</p>
                  </div>
                  <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;text-align:center;font-weight: 900;margin-top: 4%;">
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
                     <p>Shipped</p>
                  </div>
                  
                  <div class="pure-u-1-5 " style="font-family: 'Montserrat',sans-serif;font-weight: 900;margin-top: 6%;">
                  <p></p>
                  </div>



                  <div class="pure-u-5-5 remarks" style="font-family: 'Montserrat',sans-serif;font-weight: 900;">
                     <p>Tourist Remarks : <span style="font-weight: 500;"><?php echo $row['v_remarks']; ?></span></p>
                     <p>Admin Remarks : 
                        <span style="font-weight: 500;">
                           <input type="text" style="color:black;" name="edit_a_remarks" class="edit_a_remarks" value="<?php echo $row['a_remarks']; ?>">
                           <span class="a_remarks" ><?php echo $row['a_remarks']; ?></span>
                           <button class="edit_rem" style="display:inline-block;">P</button>
                        </span>
                     </p>

                  </div>



               </div>




            </div>





<?php

}

?>
            <!-- ...........box container end............ -->
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


     <!--  <script>
         
         
         $( document ).ready(function() {
   




  $(".left-box").fadeIn();
      

     
       
         
         $(".select_all,.select_drop").css({

            'opacity':'1'
         });



});

       




      </script> -->

   <script>
      
   $(".accept_v").click(function(){
      
      var a=$(this).attr('data-id');
      
      $.post("visa_accept.php",
      {
         v_id: a
      },
      function(data, status){
         alert("Registration Accepted");
         
         // $('#'+a).html(data);
         
        $('.p1').load("visa_requests.php");
      });
   });




 $(".v_steps").click(function(){
      
      var a=$(this).parent().parent().parent().attr('id');
      var b=$(this).attr('data-status');

      // alert(a);

      $.post("visa_steps.php",
      {
         v_id: a,
         data:b
      },
      function(data, status){
         alert("Status Updated");
         
         // $('#'+a).html(data);
         
        $('.p1').load("visa_requests.php");
      });
});










   $(".edit_rem").click(function(){
            //get value
            // $("#edit_rem").val();

            var a=$(this).parent().parent().parent().parent().attr('reference');
            console.log(a); //a is the id

            // $(".right-box[reference="+a+"]").find(".edit_a_remarks").fadeIn();
            // $(".right-box[reference="+a+"]").find(".a_remarks").fadeOut();

            //the input field
            var field = $(this).parent().parent().parent().parent().find(".edit_a_remarks");
            var value = field.val();
            //insert value in database

            $.post("visa_rem_update.php",
            {
               value:value,
               v_id:a
            },
            function(data, status){
               alert(data);
               alert(status);
               $(".p1").load("visa_requests.php");
            });

            

            // console.log($(this));
                     // alert($(this).attr('name')+$(this).val());
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


         var col=[];
         var val=[];
         var fields=[];

                  fields= $(this).parent().parent().parent().parent().find(".edit_det");

                  $.each(fields,function(){

                     col.push($(this).attr('name'));
                     val.push($(this).val());


                     // alert($(this).attr('name')+$(this).val());


                  });


                  // $.each(fields,function(){              

                  //       alert($(this).val());

                  //       b.push($(this).parent().find(".edit_det").attr('name')); 


                  //       c.push($(this).parent().find(".edit_det").val()); 
               


                  // }) 

                  var id=$(this).parent().parent().attr('id');

                  // alert(id);

                  console.log(val);


            $.post("visa_update.php",
            {
               

               values:val,
               v_id:id
            },
            function(data, status){
               alert(data);
               alert(status);
               
               $(".p1").load("visa_requests.php");
            });
            



           



         }

});




          
        


































   
   
   
   // $(".btn_edit_req").click(function(){
   
   //    var a=$(this).parent().parent().attr('id');
   //    $(".right-box[reference="+a+"]").find("input[type=text]").fadeIn();
   //    $(".right-box[reference="+a+"]").find(".dets").fadeOut();
   //    $(this).html("UPDATE");
   
   // });


   $(".accept_s").click(function(){
      
      var bb=$(this).attr('data-id');
      
      $.post("visa_steps.php",
      {
         v_id: bb
      },
      function(data, status){
         alert("Verified");
         
         // $('#'+a).html(data);
         
        $('.dropdown-content').load("visa_requests.php");
      });
   });





      
$(".btn_edit_req").click(function(){



    var a=$(this).parent().parent().attr('id');

    alert(a);
   




    $(".right-box[reference="+a+"]").find("input[type=text]").fadeIn();
  
    $(".right-box[reference="+a+"]").find(".dets").fadeOut();
  



    $(this).html("UPDATE");




});


  $('.all').click(function(){
         
         if($(this).hasClass("checked"))
         {
            $(this).find('#c_all').attr('src', '../assets/images/check-box.png');
            $(this).removeClass("checked");
              $(".left-box").fadeIn();
         }

         else{
         //alert("asdas");
            $(this).find('#c_all').attr('src', '../assets/images/check-box-checked.png');
            $(this).addClass("checked");  $(".left-box").fadeOut();
         }

       

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

   // $(".delete").click(function(){

   //       var b=[];

   //       // b.forEach(function(item) {
   //          //    alert(item);
   //          // });
            
   //          if(!$(".all").hasClass("checked"))
   //          {
   //             $(".checked").each(function(){
   //                   b.push($(this).attr('data-check'));
   //             });

   //             $.post("try3.php",
   //             {
   //                id: b
   //             },
   //             function(data, status){
   //                alert('Deleted');
   //                $(".p1").load("visa_requests.php");
   //             });
   //          }

   //          else{

   //               // Nothing to delete - if nothing has .all class show messege nothing to delete

   //          // $.post("try4.php",
            
   //          // function(data, status){
   //          //    alert(data);
   //          //    alert(status);


   //          //    alert("Deleted");
              
   //          //     $(".p1").load("visa_requests.php");

   //          // });

   //          }
   // });
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
            $.post("try3.php",
               {
                  id: b
               },
               function(data, status){
                  alert('Deleted');
                  $(".p1").load("visa_requests.php");
               });
         }
      }
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
               window.open("visa_download.php?"+id_string);
            }

            // $.post("visa_download.php",
            // {
            //    id: d
            // },
            // function(data, status){
            //    var table = data;
            //    if (this.status == 200) { 
            //       $(table).table2excel({
            //          filename: visadocument.xls
            //       });
            //    }
            //    alert('File Downloaded');
            //    $(".p1").load("visa_requests.php");
            
            // });
         }

         else{

            // Nothing to delete - if nothing has .all class show messege nothing to delete

         // $.post("try4.php",

         // function(data, status){
         //    alert(data);
         //    alert(status);


         //    alert("Deleted");

         //     $(".p1").load("visa_requests.php");

         // });

         }
});

   </script>
</html>