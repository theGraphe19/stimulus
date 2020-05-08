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
   </head>
   <body>
      <div class="main1">
         <div class="bg1">
            <div class="pure-g top-con container ">
               <div class="pure-u-1-3 top select_all" >
                  <div class="pure-u-3-3"><img  src="../assets/images/check-box.png" class="sz chk"><span style="vertical-align:middle;"><b><i>Select all</i></b></span></div>
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
                                 alert('Please select the data you want to download.');
                              } else {
                                 var person = "person="+person;
                                 window.open("aggregator_share.php?"+id_string+person);
                              }
                           }
                        }
                     </script>
                  </div>
               </div>
               <div class="pure-u-1-3 top" >
                  <button type="submit" class="pure-button pure-u-1-4 show_agents" id="btn1">AGENT</button>
                  <button type="submit" class="pure-button pure-u-1-4 show_hotels" id="btn2">HOTELS</button>
               </div>
            </div>
            <?php
               $fetch_sql = "select * from travel_agents";
               $fetch = mysqli_query($link, $fetch_sql);
               while($row = mysqli_fetch_array($fetch, MYSQLI_ASSOC))
               {
               ?>
            <div class="container agents">
               <div class="left-box" data-check="<?php echo $row['ta_id']; ?>"> <img class="c_box" src="../assets/images/check-box.png" class="sz"> </div>
               <div class="right-box box-inner pure-g ta_det"  reference="<?php echo $row['ta_id']; ?>">
                  <div class="pure-u-1-5 cl1">
                     <div><input type="text" class="edit_det" name="ta_name" value="<?php echo $row['ta_name']; ?>"> <span class="dets"><?php echo $row['ta_name']; ?></span></div>
                     <div class="visa"><input type="text" class="edit_det" name="ta_com_name" value="<?php echo $row['ta_com_name']; ?>"><span class="dets"><?php echo $row['ta_com_name']; ?></span></div>
                  </div>
                  <div class="pure-u-3-5 cl2">
                     <div class="pure-g">
                        <div class="pure-u-1-2" style="text-align: right;"><input type="text" class="edit_det" name="ta_email" value="<?php echo $row['ta_email']; ?>">
                           <span class="dets"><?php echo $row['ta_email']; ?></span>
                        </div>
                        <div class="pure-u-1-2" style="text-align: center;"><input type="text" class="edit_det" name="ta_phn" value="<?php echo $row['ta_phn']; ?>">
                           <span class="dets">+91 <?php echo $row['ta_phn']; ?></span>
                        </div>
                     </div>
                     <div class="docu"> <a target="_blank" href="../<?php echo $row['ta_doc']; ?>">View Documents</a></div>
                  </div>
                  <div class="pure-u-1-5 cl3" id="<?php echo $row['ta_id']; ?>">
                     <?php
                        if($row['ta_status']==='0')
                        {
                        
                        ?>
                     <!-- <button a href="#" class="pure-button btn btn-info btn-lg btn-status">
                        <span class="glyphicon glyphicon-ok"></span></button>
                        
                        <a href="#" class="pure-button btn btn-info btn-lg btn-status" style="margin-right: 0%!important;">
                        <span class="glyphicon glyphicon-remove"></span></a>	 -->
                     <button   name="accept_ta" data-id="<?php echo $row['ta_id']; ?>" class="pure-button btn-status accept_ta"><img src="../assets/images/ok.png" class="sz"></button>
                     <button  class="pure-button btn-status"><img src="../assets/images/not-ok.png" class="sz"></button>
                  </div>
                  <?php
                     }
                     else
                     {
                     
                     ?>
                  <p><button type="submit" class="pure-button btn btn_edit_req"><b>EDIT</b></button></p>
               </div>
               <?php
                  } 
                  
                  ?>
            </div>
         </div>
         <?php
            }
            
            ?>
         <?php
            $fetch_sql1 = "select * from hotels";
            $fetch1 = mysqli_query($link, $fetch_sql1);
            while($row1 = mysqli_fetch_array($fetch1, MYSQLI_ASSOC))
            {
            
            ?>
         <div class="container hotels">
            <div class="left-box" data-check="<?php echo $row1['h_id']; ?>"> <img class="c_box" src="../assets/images/check-box.png" class="sz"> </div>
            <div class="right-box box-inner pure-g h_det" reference="<?php echo $row1['h_id']; ?>">
               <div class="pure-u-1-5 cl1">
                  <div><input type="text" class="edit_det" name="ta_name" value="<?php echo $row1['h_name']; ?>"> <span class="dets"><?php echo $row1['h_name']; ?></span></div>
                  <?php
                     $loc = $row1['h_location'];
                     $sql2 = "select * from places where pl_id = '$loc'";
                     $run2 = mysqli_query($link, $sql2);
                     $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
                     ?>
                  <div class="visa"> <?php echo $row2['pl_name']; ?></div>
               </div>
               <div class="pure-u-3-5 cl2">
                  <div class="pure-g">
                     <div class="pure-u-1-2" style="text-align: right;"><input type="text" class="edit_det" name="ta_name" value="<?php echo $row1['h_email']; ?>"> <span class="dets"><?php echo $row1['h_email']; ?></span></div>
                     <div class="pure-u-1-2" style="text-align: center;">+91 <input type="text" class="edit_det" name="ta_name" value="<?php echo $row1['h_phn']; ?>"> <span class="dets"><?php echo $row1['h_phn']; ?></span></div>
                  </div>
               </div>
               <div class="pure-u-1-5 cl3"  id="<?php echo $row1['h_id']; ?>">
                  <?php
                     if($row1['h_status']==='0')
                     {
                     
                     ?>
                  <!-- <button a href="#" class="pure-button btn btn-info btn-lg btn-status">
                     <span class="glyphicon glyphicon-ok"></span></button>
                     
                     <a href="#" class="pure-button btn btn-info btn-lg btn-status" style="margin-right: 0%!important;">
                     <span class="glyphicon glyphicon-remove"></span></a>	 -->
                  <button  name="accept_h" data-id="<?php echo $row1['h_id']; ?>" class="pure-button btn-status  accept_h"><img src="../assets/images/ok.png" class="sz"></button>
                  <button  class="pure-button btn-status"><img src="../assets/images/not-ok.png" class="sz"></button>
                  <?php
                     }
                     else
                     {
                     
                     ?>
                  <p><button type="submit" class="pure-button btn btn_edit_reqq"><b>EDIT</b></button></p>
                  <?php
                     } 
                     
                     ?>
               </div>
            </div>
         </div>
         <?php
            }
            
            ?>
      </div>
      </div>
      </div>
      </div>
   </body>
   <script>
      $(".show_hotels").click(function(){
      
      
         $(".agents").fadeOut();
      
         $(".hotels,.left-box").fadeIn();
      
      
         $(".select_drop").css({
      
            'opacity':'1'
         });
      
         $(this).addClass("selected_this");
      
         $(".show_agents").removeClass("selected_this");
      
      
      });
      
      $(".show_agents").click(function(){
      
      
         $(".agents,.left-box").fadeIn();
      
         $(".hotels").fadeOut();
       
         
         $(".select_drop").css({
      
            'opacity':'1'
         });
      
         $(this).addClass("selected_this");
         
         $(".show_hotels").removeClass("selected_this");
      
      
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
      
      
      
      $(".accept_ta").click(function(){
      
         var a=$(this).attr('data-id');
         
         $.post("accept.php",
         {
            ta_id: a
         },
         function(data, status){
            alert("Registration Accepted");
            
            $('#'+a).html(data);
            
            
         });
      });
      
      
      
      
      
      
      
      $(".accept_h").click(function(){
      
         var b=$(this).attr('data-id');
         $.post("accept2.php",
         {
            h_id: b
         },
         function(data, status){
            alert("Registration Accepted");
            
            $('#'+b).html(data);
            
            
         });
      });
      
      
      
      
      
      
      // $(".btn_edit_reqq").click(function(){
      
      
      
      // var b=$(this).parent().parent().attr('id');
      
      
      
      
      
      // $(".right-box[reference="+b+"]").find("input[type=text]").fadeIn();
      
      // $(".right-box[reference="+b+"]").find(".dets").fadeOut();
      
      
      
      
      // $(this).html("UPDATE");
      
      
      
      
      // });
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
         var count2=0;
      
      
      
      
      $(".btn_edit_reqq").click(function(){
      
      
      
         if(count2==0)
      
         {
      
      
      
      var b=$(this).parent().parent().attr('id');
      
      
      
      
      
      $(".right-box[reference="+b+"]").find("input[type=text]").fadeIn();
      
      $(".right-box[reference="+b+"]").find(".dets").fadeOut();
      
      
      
      
      $(this).html("UPDATE");
      
         count2++;
      
      
         }
      
      
      
      
      
      
      else{
      
      
         var col2=[];
         var val2=[];
         var fields2=[];
      
        
      
      
      
            
         
            if($(this).parent().parent().parent().parent().hasClass("hotels"))
              { 
      
      
                
      
                  fields2=  $(this).parent().parent().parent().find("input[type=text]");
      
                  $.each(fields2,function(){
      
      
                     col2.push($(this).attr('name'));
                     val2.push($(this).val());
      
      
                     // alert($(this).attr('name')+$(this).val());
      
      
                  });
      
      
                  // $.each(fields,function(){              
      
                  //       alert($(this).val());
      
                  //       b.push($(this).parent().find(".edit_det").attr('name')); 
      
      
                  //       c.push($(this).parent().find(".edit_det").val()); 
               
      
      
                  // }) 
      
                  var id=$(this).parent().parent().attr('id');
      
                  // alert(id);
      
      
      
            $.post("try4.php",
            {
               
      
               valuess:val2,
               
               
               h_id:id
            },
            function(data, status){
               alert("Successfully Updated");
               $(".p1").load("aggregator_requests.php");
            });
            
      
      
      
            }
      
      
      
      
      }
      
            });
      
      
      
      
          
        
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
         var count=0;
      
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
                  window.open("aggregator_download.php?"+id_string);
               }

               // $.post("aggregator_download.php",
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
      
        
      
      
      
            
         
            if($(this).parent().parent().parent().parent().hasClass("agents"))
              { 
      
      
                
      
                  fields=  $(this).parent().parent().parent().parent().parent().find(".edit_det");
      
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
      
      
      
            $.post("try3.php",
            {
               
      
               values:val,
               
               
               id:id
            },
            function(data, status){
               alert("updated");
               $(".p1").load("aggregator_requests.php");
            });
            
      
      
      
            }
      
      
      
      
      }
      
            });
      
      
      
      
          
        
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      // $(".delete").click(function(){
      //    var b=[];
      //    // b.forEach(function(item) {
      //    //    alert(item);
      //    // });
      //    if($(".show_agents").hasClass("selected_this"))
      //    {
      //       $(".checked").each(function(){ 
      //       if($(this).parent().hasClass("agents"))
      //         { 
      //             b.push($(this).attr('data-check')); 
      //          }
      //       });
      //       $.post("try.php",
      //       {
      //          id: b
      //       },
      //       function(data, status){
      //          alert('Agents Deleted');
      //          $(".p1").load("aggregator_requests.php");
      //       });
      //    }
      //    else
      //    {            
      //       $(".checked").each(function(){ 
      //       if($(this).parent().hasClass("hotels"))
      //         { 
      //             b.push($(this).attr('data-check')); 
      //          }
      //       });
      //       $.post("try2.php",
      //       {
      //          id: b
      //       },
      //       function(data, status){
      //          alert('Hotels Deleted');
      //          $(".p1").load("aggregator_requests.php");
      //       });
      //    }
      // })
      


      $(".delete").click(function(){
         var b=[];
         // b.forEach(function(item) {
         //    alert(item);
         // });
         if($(".show_agents").hasClass("selected_this"))
         {
            $(".checked").each(function(){ 
            if($(this).parent().hasClass("agents"))
              { 
                  b.push($(this).attr('data-check')); 
                  id_string+='id[]='+$(this).attr('data-check')+'&';
               }
            });
            if(id_string == ''){
               alert('Please select the data you want to delete.');
            } else{
               $.post("try.php",
               {
                  id: b
               },
               function(data, status){
                  alert('Agents Deleted');
                  $(".p1").load("aggregator_requests.php");
               });
            }
            
         }
         else
         {
            $(".checked").each(function(){ 
         
            if($(this).parent().hasClass("hotels"))
              {
                  b.push($(this).attr('data-check'));
                  id_string+='id[]='+$(this).attr('data-check')+'&';
               }
            });
            if(id_string == ''){
               alert('Please select the data you want to delete.');
            } else{
               $.post("try2.php",
               {
                  id: b
               },
               function(data, status){
                  alert('Hotels Deleted');
                  $(".p1").load("aggregator_requests.php");
               });
            }
         }
            
      
      });
      
   </script>
   <script>
      // $(".updt_dets").click(function(){
      
      
      
      // alert("asdasd");
      
      //   var name=  $(".right-box[reference="+a+"]").find("input[type=text]").val;
      
      
      
      
      // var a=$(this).attr('data-id');
      // alert(name);
       
      //   $.post("update2.php",
      //   {
      //     ta_id: a
      //   },
      //   function(data, status){
      //     alert("Registration Accepted");
      
      //     $('#'+a).html(data);
      
      
      //   });
      //
      
      
         
   </script>
</html>