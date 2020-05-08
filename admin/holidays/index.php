<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
	<meta charset="UTF-8">
      <title>Stimulus Holidays</title>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/base-min.css">
     <!--  <link rel="stylesheet" href="../../assets/css/main.css"> -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,700i,800,800i,900i&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:700,800,900,900i&display=swap" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="holidays/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="holidays/css/component.css" />
		<!-- Modernizr is used for flexbox fallback -->
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
<main>
<!-- 
<div class="nav_header">
            <a href="index.html"><div class="logo">
            </div></a>
            
         </div>
          -->

		<!-- Compare basket -->
		<div class="compare-basket">
			<button class="action action--button action--compare"><i class="fa fa-check"></i><span class="action__text">CHOOSE</span></button>
		</div>
		<!-- Main view -->
		<div class="view">
			<!-- Blueprint header -->
			<header class="bp-header cf">
			<!-- 	<span>STIMULUS<span class="" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span> -->
			<!-- 	<h1>Holidays</h1> -->
				<nav>
					<!-- <a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a> -->
					<!--a href="" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<!-- <a href="http://tympanus.net/codrops/?p=24096" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a> -->
					<!-- <a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a> -->
				</nav>
			</header>
			<!-- Product grid -->



			<section class="grid">



				<!-- Products -->



				<?php
    include('../../dbconnection.php');

?>


<?php
    $ty = "select * from holiday_packages";
    $tyy = mysqli_query($link, $ty);
    while($tyyy = mysqli_fetch_array($tyy, MYSQLI_ASSOC))
    {
?>			

				<div class="product" style="background-image : url(../<?php echo $tyyy["ho_pic"]; ?>) !important; ">

					<div class="overlay"></div>

					<div class="product__info">
						<img class="product__image" src="../" alt="Product 1" />
						<span class="product__id"><?php echo $tyyy['ho_code']; ?></span>
						<h3 class="product__title"><?php echo $tyyy['ho_destination']; ?></h3>

						<span class="typ_dets">
						<div class="dets">
						<span class=" extra highlight count"> <?php echo $tyyy['ho_days']; ?></span><span> days</span>
						</div >&nbsp;&nbsp;
						<div class="dets">
						<span class=" extra highlight count"><?php echo $tyyy['ho_nights']; ?></span><span> nights</span>
						</div>
						</span>

						<span class="product__price highlight">&#8377;&nbsp;<?php echo $tyyy['ho_price']; ?></span>
						<a target="_blank" href="add_package/edit_package.php?ho_id=<?php echo $tyyy["ho_id"]; ?>"><button class="action action--button action--buy"></i><span class="action__text"><i class="fa fa-cogs" aria-hidden="true"></i>
</span></button></a>

						<!-- <button class="action action--button action--buy"><i class="fa fa-share"></i><span class="action__text">Share</span></button> -->

						<?php
								if($tyyy['ho_status']==='1')
								{
						?>
						<button data-id="<?php echo $tyyy["ho_id"]; ?>" class="action action--button action--buy tt">
							<i class="fa fa-eye"></i></button>

								<?php }   else	{?>


						<button data-id="<?php echo $tyyy["ho_id"]; ?>" class="action action--button action--buy ty">
						<i class="fa fa-eye-slash"></i></button>

								<?php } ?>

						<button data-id="<?php echo $tyyy["ho_id"]; ?>" class="action action--button action--buy delete"><i class="fa fa-trash"></i></button>

						<?php
								if($tyyy['ho_best']==='1')
								{
						?>
						<button data-id="<?php echo $tyyy["ho_id"]; ?>" class="action action--button action--buy ttr">
							<i class="fas fa-heart"></i></button>

								<?php }   else	{?>


						<button data-id="<?php echo $tyyy["ho_id"]; ?>" class="action action--button action--buy tyr">
						<i class="far fa-heart"></i></button>

								<?php } ?>























												<!-- here it goes -->


















						<a href="../holidays/h_details/index.php/path/it_pdf.php?ho_id=<?php echo $tyyy['ho_id']; ?>" target="_blank"><button class="action action--button action--buy">
						<i class="fas fa-download"></i></button></a>
					




					</div>





					<label class="action action--compare-add" style="display: none;"><input class="check-hidden" type="checkbox" /><i class="fa fa-plus"></i><i class="fa fa-check"></i><span class="action__text action__text--invisible">Pick and choose</span></label>
				</div>



<?php
    }
?>
			</section>
		</div><!-- /view -->
		<!-- product compare wrapper -->
		<section class="compare" >

			<button class="choose_go" style=" ">TOUR ON</button>

			<button class="action action--close"><i class="fa fa-remove"></i><span class="action__text action__text--invisible">Close comparison overlay</span></button>
		</section>
		
</main>
<script src="js/classie.js"></script>
		<script src="js/main.js"></script>



		<script>
		
		$(".tt").click(function(){
      var b=$(this).attr('data-id');
	  $.post("active.php",
	  {
		 id: b
	  },
	  function(data, status){
		 alert("Package Deactivated");
		 
		 $('.p1').load('holidays/');
		 
		 
	  });
   });



   $(".ty").click(function(){
      var c=$(this).attr('data-id');
	  $.post("inactive.php",
	  {
		 id: c
	  },
	  function(data, status){
		 alert("Package Activated");
		 
		 $('.p1').load('holidays/');
		 
		 
	  });
   });












$(".ttr").click(function(){
      var b=$(this).attr('data-id');
	  $.post("view_package.php",
	  {
		 id: b
	  },
	  function(data, status){
		 alert("Best Selling OFF");
		 
		 $('.p1').load('holidays/');
		 
		 
	  });
   });



   $(".tyr").click(function(){
      var c=$(this).attr('data-id');
	  $.post("hide_package.php",
	  {
		 id: c
	  },
	  function(data, status){
		 alert("Best Selling ON");
		 
		 $('.p1').load('holidays/');
		 
		 
	  });
   });













$(".delete").click(function(){
      var dd=$(this).attr('data-id');
      
	  $.post("package_delete.php",
	  {
		 id: dd
	  },
	  function(data, status){
		 alert("Package Deleted");
		 
		 $('.p1').load('holidays/');
		 
		 
	  });
   });
		
		</script>
	</body>
</html>
