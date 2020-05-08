<?php

   session_start();
      include('../dbconnection.php');

      $dom = "";
      $int = "";

      if(isset($_POST['select_package_type']))
      {
            $pt = $_POST['package_type'];

            if($pt === 'dom')
            {
               $dom = 'checked';
            }
            else
            {
               $dom = '';
            }


            if($pt === 'int')
            {
               $int = 'checked';
            }
            else
            {
               $int = '';
            }
            
      }

      if(isset($_POST['start_tour']))
      {
         $_SESSION['booking_code'] = $_POST['booking_code'];
      
         echo "<script>location.href='../tour_info.php';</script>";
      }

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8">
      <title>Stimulus Holidays</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
      <link rel="stylesheet" href="../assets/css/main.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
      <link rel="stylesheet" href="./style.css">
      <script
         src="https://code.jquery.com/jquery-3.4.1.min.js"
         integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
         crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat:700,800,900,900i&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/79008e30b7.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/demo.css" />
      <link rel="stylesheet" type="text/css" href="css/component.css" />
      <style type="text/css">
         .a2a_kit{
         opacity: 0;
         }
         .share_but:hover > .a2a_kit{
         opacity:1;
         }
      </style>
      <!-- Modernizr is used for flexbox fallback -->
      <!-- <script src="js/modernizr.custom.js"></script> -->
   </head>
   <body>
      <div class="nav_header" style="z-index: 999999999999; display: block">
         <a href="../">
            <div class="logo">
            </div>
         </a>
         <div class="login_con" style="display: none;">
            <div class="pure-u-1-3 top" >
               <div class="dropdown">
                  <button type="submit" class="pure-button dropbtn"><b>LOGIN</b>&nbsp; <span class="caret" style="font-size: 8px!important;"></span></button>
                  <div class="dropdown-content">
                     <a href="tourist/">VISA</a>
                     <a href="aggregator/">AGGREGATOR</a>
                  </div>
               </div>
            </div>
            <!--  <div class="login_text"><a href="login_options.html" style="color: #fff; text-decoration: none;">LOGIN</a></div>
               <div class="login_sym"> </div> -->
         </div>
      </div>
      <div class="nav_right">
         <div class="menu_con">
            <a href="https://stimulustours.com/blog/" class="menu_au menu_item">Blog</a>
            <a href="../about-us/" class="menu_au menu_item">About us</a>
            <a href="../holidays/" class="menu_au menu_item" >Packages</a>
            <a href="../aggregator/index2.html" class="menu_au menu_item">Aggregator</a>
            <a href="https://stimulustours.com/wp/contact-us/" class="menu_au menu_item">Contact</a>
         </div>
      </div>
      <div class="nav_left">
         <div class="social_con">
            <a class="fb social" href="https://www.facebook.com/stimulustours" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a class="insta social" href="https://twitter.com/StimulusTours" target="_blank"><i class="fab fa-twitter"></i></a>
            <a class="insta social" href="https://twitter.com/StimulusTours" target="_blank"><i class="fab fa-instagram"></i></a>
            <a class="insta social" href="https://www.youtube.com/channel/UCJ1L_6KN0-2rEtFRrK954fA" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="mailto:info@stimulustours.com" class="mail social"><i class="fa fa-envelope" aria-hidden="true"></i></a>
         </div>
      </div>
      <video style="position:absolute;top:0px;width: 100%;height: 90vh;object-fit: cover;" autoplay muted loop>
         <source src="pg_vid.mp4" type="video/mp4">
         Your browser does not support the video tag.
      </video>
      <div class="wrapper">
         <div class="content">
            <div class="bg-shape">
               <img src="logo.png" alt="">
            </div>
            <div class="product-img">
               <?php
                  $mai1 = "select * from holiday_packages where ho_best = '1' and ho_status = '1' order by ho_id desc limit 7";
                  $mnc1 = mysqli_query($link, $mai1);
                  while($rth1 = mysqli_fetch_array($mnc1, MYSQLI_ASSOC))
                  {
                  ?>
               <div class="product-img__item" id="img1<?php echo $rth1['ho_id']; ?>">
                  <img src="../<?php echo $rth1['ho_pic']; ?>" alt="<?php echo $rth1['ho_destination']; ?>" class="product-img__img">
               </div>
               <!-- 
                  <div class="product-img__item" id="img3">
                     <img src="hd2.jpg" alt="star wars" class="product-img__img">
                  </div> -->
               <?php } ?>
            </div>
            <div class="product-slider">
               <button class="prev disabled">
                  <span class="icon">
                     <svg class="icon icon-arrow-right">
                        <use xlink:href="#icon-arrow-left"></use>
                     </svg>
                  </span>
               </button>
               <button class="next">
                  <span class="icon">
                     <svg class="icon icon-arrow-right">
                        <use xlink:href="#icon-arrow-right"></use>
                     </svg>
                  </span>
               </button>
               <div class="product-slider__wrp swiper-wrapper">
                  <?php
                     $mai = "select * from holiday_packages where ho_best = '1' and ho_status = '1' order by ho_id desc limit 7";
                     $mnc = mysqli_query($link, $mai);
                     while($rth = mysqli_fetch_array($mnc, MYSQLI_ASSOC))
                     {
                     ?>
                  <div class="product-slider__item swiper-slide" data-target="img1<?php echo $rth['ho_id']; ?>">
                     <div class="product-slider__card">
                        <!--   <img src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405215/starwars/item-3-bg.jpg" alt="star wars" class="product-slider__cover"> -->
                        <div class="product-slider__content">
                           <h1 class="product-slider__title">
                              <?php echo $rth['ho_destination']; ?>
                           </h1>
                           <span class="product-slider__price">&#8377;<?php echo $rth['ho_price']; ?></span>
                           <div class="product-ctr">
                              <div class="product-labels">
                                 <div class="product-labels__title"></div>
                                 <div class="product-labels__group">
                                    <label class="product-labels__item">
                                    <input type="radio" class="product-labels__checkbox" name="type6" checked>
                                    <span class="product-labels__txt"><?php echo $rth['ho_days']; ?></span>
                                    </label>
                                    <label class="product-labels__item">
                                    <input type="radio" class="product-labels__checkbox" name="type6">
                                    <span class="product-labels__txt">DAYS</span>
                                    </label>
                                 </div>
                                 <div class="product-labels__group">
                                    <label class="product-labels__item">
                                    <input type="radio" class="product-labels__checkbox" name="type7" checked>
                                    <span class="product-labels__txt"><?php echo $rth['ho_nights']; ?></span>
                                    </label>
                                    <label class="product-labels__item">
                                    <input type="radio" class="product-labels__checkbox" name="type7">
                                    <span class="product-labels__txt">NIGHTS</span>
                                    </label>
                                 </div>
                              </div>
                              <span class="hr-vertical"></span>
                              <div class="product-inf">
                                 <div class="product-inf__percent">
                                    <div class="product-inf__percent-circle">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                                          <defs>
                                             <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                                <stop offset="0%" stop-color="#0c1e2c" stop-opacity="0" />
                                                <stop offset="100%" stop-color="#cb2240" stop-opacity="1" />
                                             </linearGradient>
                                          </defs>
                                          <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300" stroke="#FFFFFF" stroke-width="4" fill="none"/>
                                       </svg>
                                    </div>
                                    <div class="product-inf__percent-txt">
                                       80%
                                    </div>
                                 </div>
                                 <span class="product-inf__title">BOOKED</span>
                              </div>
                           </div>
                           <div class="product-slider__bottom">
                              <a href="h_details/index.php/path/index.php?ho_id=<?php echo $rth['ho_id']; ?>"><button class="product-slider__cart">
                              VIEW PACKAGE
                              </button></a>
                              <!--  <button class="product-slider__fav js-fav"><span class="heart"></span> ADD TO WISHLIST</button>
                                 </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     
                     ?>
                  <!-- 
                     <div class="product-slider__item swiper-slide" data-target="img3">
                        <div class="product-slider__card">
                             <img src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405215/starwars/item-3-bg.jpg" alt="star wars" class="product-slider__cover">
                           <div class="product-slider__content">
                              <h1 class="product-slider__title">
                                 MALIBU
                              </h1>
                              <span class="product-slider__price">$45000</span>
                              <div class="product-ctr">
                                 <div class="product-labels">
                                    <div class="product-labels__title"></div>
                                    <div class="product-labels__group">
                                       <label class="product-labels__item">
                                       <input type="radio" class="product-labels__checkbox" name="type6" checked>
                                       <span class="product-labels__txt">4</span>
                                       </label>
                                       <label class="product-labels__item">
                                       <input type="radio" class="product-labels__checkbox" name="type6">
                                       <span class="product-labels__txt">DAYS</span>
                                       </label>
                                    </div>
                                    <div class="product-labels__group">
                                       <label class="product-labels__item">
                                       <input type="radio" class="product-labels__checkbox" name="type7" checked>
                                       <span class="product-labels__txt">3</span>
                                       </label>
                                       <label class="product-labels__item">
                                       <input type="radio" class="product-labels__checkbox" name="type7">
                                       <span class="product-labels__txt">NIGHTS</span>
                                       </label>
                                    </div>
                                 </div>
                                 <span class="hr-vertical"></span>
                                 <div class="product-inf">
                                    <div class="product-inf__percent">
                                       <div class="product-inf__percent-circle">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                                             <defs>
                                                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                                   <stop offset="0%" stop-color="#0c1e2c" stop-opacity="0" />
                                                   <stop offset="100%" stop-color="#cb2240" stop-opacity="1" />
                                                </linearGradient>
                                             </defs>
                                             <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300" stroke="#FFFFFF" stroke-width="4" fill="none"/>
                                          </svg>
                                       </div>
                                       <div class="product-inf__percent-txt">
                                          80%
                                       </div>
                                    </div>
                                    <span class="product-inf__title">BOOKED</span>
                                 </div>
                              </div>
                              <div class="product-slider__bottom">
                                 <button class="product-slider__cart">
                                 VIEW PACKAGE
                                 </button>
                                  <button class="product-slider__fav js-fav"><span class="heart"></span> ADD TO WISHLIST</button>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     
                     -->
               </div>
            </div>
         </div>
      </div>
      <main>
         <!-- Compare basket -->
         <svg class="hidden" hidden>
            <symbol id="icon-arrow-left" viewBox="0 0 32 32">
               <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
            </symbol>
            <symbol id="icon-arrow-right" viewBox="0 0 32 32">
               <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
            </symbol>
         </svg>
         <div class="compare-basket">
            <button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">CHOOSE</span></button>
         </div>
         <!-- Main view -->
         <div class="view">
            <!-- Blueprint header -->
            <header class="bp-header cf">
               <div id="container">
                  <div class="list-group-item checkbox" style="float: left; margin-left: 10vw; margin-top: 15px; font-size: 20px; color: #000;">
                     <label><input type="checkbox" name="p_type" class="common_selector india" value="99" <?php echo $dom; ?>>&nbsp;&nbsp;&nbsp; Domestic</label>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <label><input type="checkbox" name="p_type" class="common_selector not_india" value="9" <?php echo $int; ?>>&nbsp;&nbsp;&nbsp; International</label>
                  </div>
                  <input type="text" id="search" placeholder="Search Destinations... Ex: Bali, Thailand, Dubai..." class="common_selector search_bar"
                     style="border: none; height: 50px; width: 40%; text-align: center; color: #000; float: right; margin-right: 5vw;">
               </div>
            </header>
            <!-- Product grid -->
            <section class="grid">
               <!-- Products -->
               <div class="filter_data">
                   
                   
               </div>
            </section>
         </div>
         <!-- /view -->
         <!-- product compare wrapper -->
         <section class="compare" >
            <form method="post" style="z-index: 999999999">
               <input class="pack_id" name="booking_code" style="z-index: 99999;" hidden/>
               <button type="submit" name="start_tour" class="choose_go" style=" ">TOUR ON</button>
            </form>
            <!-- <script>$(".choose_go").click(function(){
               location.href="../tour_info.php";
               
               })
               
               
            </script> -->
            <button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span></button>
         </section>
      </main>
      <script src="js/classie.js"></script>
      <script src="js/main.js"></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="./script.js"></script>
      <script>
         $(".share_but").click(function(){
             
             
             if(!$(this).parent().find(".a2a_kit").hasClass("open"))
             {
             $(this).parent().find(".a2a_kit").fadeIn();
                
                
             $(this).parent().find(".a2a_kit").css({
                 
                 'display':'flex'
                 
                 
             });
              $(this).html("<i class='fas fa-times'></i><span class='action__text'>Close</span>");
             
                $(this).parent().find(".a2a_kit").addClass("open");
             }
             
             else{
                 
                 $(this).parent().find(".a2a_kit").fadeOut();
                 
                   $(this).parent().find(".a2a_kit").removeClass("open");
                 
                  $(this).html("<i class='fas fa-share'></i><span class='action__text'>Share</span>");
             }
                
                
                
                
             
             
         });
         
         
         
         
      </script>
      <script>
         $(document).ready(function(){
         
             filter_data();
         
             function filter_data()
             {
                 var action = 'fetch_data';
                 // var minimum_price = $('#hidden_minimum_price').val();
                 // var maximum_price = $('#hidden_maximum_price').val();
                 var india = get_filter('india');
                 var not_india = get_filter('not_india');
                 var search = get_key('search_bar');
                 $.ajax({
                     url:"fetch_data.php",
                     method:"POST",
                     data:{action:action, india:india, not_india:not_india, search: search},
                     success:function(data){
                        $('.filter_data').html(data);
                     }
                 });
             }
         
             function get_filter(class_name)
             {
                 var filter = [];
                 $('.'+class_name+':checked').each(function(){
                     filter.push($(this).val());
                 });
                 return filter;
             }
         
             function get_key()
             {
                 return $('.search_bar').val();
             }
         
             $('.common_selector').on('keyup change',function(){
                 filter_data();
                 get_key();
             });
         
         });
      </script>
      <button onclick="scrollTopAnimated()" style="position:fixed;right:6vw;bottom:4vh;background-color:rgba(0,0,0,0.3);height:3vw;width:3vw;border:0px;border-radius:15px;outline:0px;color:white;font-size:1.5vw;display:none;" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
      <script src="../js/topscroll.js"></script>

      <script>
         






      </script>
   </body>
</html>