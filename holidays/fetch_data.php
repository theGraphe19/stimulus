<?php

        // $connect = new PDO("mysql:host=localhost;dbname=stimu92x_stimulus", "stimu92x_admin", "Stimulus@2020!");

         $connect = new PDO("mysql:host=localhost;dbname=stimulus", "root", "");
        
        if(isset($_POST["action"]))
        {
        	$query = "SELECT * FROM holiday_packages WHERE ho_status = '1'";
        
        	
        	if(isset($_POST["india"]))
        	{
        		$query .= "AND ho_country = '99'";
        	}
        	if(isset($_POST["not_india"]))
        	{
        		$query .= "AND ho_country <> '99'";
         }
         
         if(isset($_POST['search']))
         {
            $se = $_POST['search'];
            $query .= "AND ho_destination LIKE '$se%'";
         }
        	
        	$statement = $connect->prepare($query);
        	$statement->execute();
        	$result = $statement->fetchAll();
        	$total_row = $statement->rowCount();
        	$output = '';
        	if($total_row > 0)
        	{
        		foreach($result as $row)
        		{
               $pic = $row['ho_pic'];
               
               if($row['ho_doc'] === '0')
               {
                   $download = '<button class="action action--button action--buy" onclick="myFunction()"><i class="fas fa-download"></i></button>
                   
                    <script>
                        function myFunction() {
                          alert("PDF not available. Wait for admin to generate.");
                        }
                    </script>
                   
                   
                   ';
               }
               else
               {
                   $download = '<a href="../'.$row['ho_doc'].'" download><button class="action action--button action--buy"><i class="fas fa-download"></i></button>
                     </a>';
               }
               $url = "url('../$pic')";
        			$output .= '
        			<div class="product" style="background-image : '.$url.' !important; ">
                  <div class="overlay"></div>
                  <div class="product__info">
                     <img class="product__image" src="../" alt="Product 1" />
                     <span class="product__id">'.$row['ho_code'].'</span>
                     <h3 class="product__title">'.$row['ho_destination'].'</h3>
                     <span class="typ_dets">
                        <div class="dets">
                           <span class=" extra highlight count">'.$row['ho_days'].'</span><span> days</span>
                        </div >
                        &nbsp;&nbsp;
                        <div class="dets">
                           <span class=" extra highlight count">'.$row['ho_nights'].'</span><span> nights</span>
                        </div>
                     </span>
                     <span class="product__price highlight">&#8377;&nbsp;'.$row['ho_price'].'</span>
                     <a href="h_details/index.php/path/index.php?ho_id='.$row["ho_id"].'"><button class="action action--button action--buy"></i><span class="action__text">View details</span></button></a>


                     <button class="action action--button action--buy share_but"><i class="fas fa-share"></i><span class="action__text">Share</span>
                     <!-- AddToAny BEGIN -->
                     <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="
                        position: absolute;
                        /* line-height: 36px; */
                       
                        display: flex;
                        margin-top: 2vh;
                        justify-content: center;">
                        <!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a>-->
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_linkedin"></a>
                     </div></button>
                     <script async src="https://static.addtoany.com/menu/page.js"></script>
                     <!-- AddToAny END -->
                     <a href="https://api.whatsapp.com/send?phone=&text=https://stimulustours.com/holidays/h_details/index.php/path/index.php?ho_id='.$row["ho_id"].'" target="_blank"><button class="action action--button action--buy"><i class="fab fa-whatsapp"></i></button>
                     </a>
                     
                     
                     
                     
                     '.$download.'
                     
                     
                     
                     
                  </div>
                  <label class="action action--compare-add"><input class="check-hidden" value="'.$row['ho_code'].'" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Pick and choose</span></label>
               </div>
                





        			';
        		}
        	}
        	else
        	{
        		$output = '<h3>No Packages Found</h3>';
        	}


            $output.='  <script src="js/main.js"></script>
';
        	echo $output;
        }

?>