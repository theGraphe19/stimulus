<?php
    session_start();
    // echo $_SESSION['permissions'];
?>
<!DOCTYPE html>
 <html>
	
	<head>
	
		<meta charset="UTF-8">
		<title>Stimulus home</title>
		
		<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:800,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/agg_menu.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:700,800,900,900i&display=swap" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	</head>


	<body>
	
		<div class="con_options">
			
			<div class="opt opt1">
					<p>	Add<br/>Country	</p>
			</div>		
			<div class="opt opt2">
					<p>	Edit Visa 	</p>	
			</div>		
			<div class="opt opt3">
					<p>	View<br/> Application	</p>	
			</div>		


		</div>
	
	</body>


	<script>
		
		$(document).ready(function(){


      		$(".opt1").click(function(){

                if(permissions.includes("r31")){
                    window.open("visa_content.php");         	
         		    // $(".p1").load("visa_content.php");
                } else {
                    alert("You are not authorised to view this option");
                }
      		});
      			
      		$(".opt2").click(function(){
                if(permissions.includes("r32")){
                    window.open("visa_content_edit.php");
         		    // $(".p1").load("holidays/index.php");
                } else {
                    alert("You are not authorised to view this option");
                }
      		});
			  console.log("Permissions "+ permissions);
      		$(".opt3").click(function(){
                if(permissions.includes("r33")){
                    // $(".p1").load("visa_requests.php");
      			    $(".p1").load("visa_requests.php");
                } else {
                    alert("You are not authorised to view this option");
                }
      		});

      	});





	</script>



</html>