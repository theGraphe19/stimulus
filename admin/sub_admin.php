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
</head>
<body>
    <form action="create_sa.php" method="POST">
        Name : <input type="text" name="name" id="name"><br>
        Username : <input type="text" name="uname" id="uname"><br>
        Password : <input type="password" name="password" id="password"><br>

        <div id="options">
            <select name="rights" class="rights">

                <option value="r11">Add Package</option>
                <option value="r12">Edit Package</option>
                <option value="r13">Edit Bookings</option>

                <option value="r21">Add Country</option>
                <option value="r22">Edit Country</option>
                <option value="r23">Visa Entry</option>
                <option value="r24">View Agent Application</option>
                <option value="r25">View Tourist Application</option>

                <option value="r31">Registrations</option>
                <option value="r32">Agent Orders</option>
                <option value="r33">Restaurants</option>

            </select><br><br>
            <input type="button" id="addrights" value="ADD">
        </div>
        <button type="submit" id="submit">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        var list = '<select name="rights" class="rights"><option value="r11">Add Package</option><option value="r12">Edit Package</option><option value="r13">Edit Bookings</option><option value="r21">Add Country</option><option value="r22">Edit Country</option><option value="r23">Visa Entry</option><option value="r24">View Agent Application</option><option value="r25">View Tourist Application</option><option value="r31">Registrations</option><option value="r32">Agent Orders</option><option value="r33">Restaurants</option></select><br><br>';
        // var list = "<p>Hello!</p>";
        $('#addrights').click( function(){
            $('#options').prepend(list);
        });

        $('#submit').click(function(e) {
            e.preventDefault();
            
            var name= $('#name').val();
            var uname= $('#uname').val();
            var password= $('#password').val();

            var selectedValues = $('.rights').map(function() {
                return $(this).val();
            }).get();

            $.post("create_sa.php",
            {
               name:name,
               uname:uname,
               password:password,
               values:selectedValues
            },
            function(data, status){
               alert(data);
               alert(status);
               $("body").load("sub_admin.php");
            });
        });
    </script>
</body>
</html>