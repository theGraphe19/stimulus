<?php
    include('session.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <a href="logout.php"><button>Logout</button></a>
        <a href="reset.php"><button>Reset Password</button></a>

        <center><h2>Travel Agent : </h2><?php echo $ta_name_session; ?></center>
    </body>
</html>