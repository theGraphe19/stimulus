<?php
    include('session.php');
    include('template.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://use.fontawesome.com/relleases/v5.0.1/css/all.css" rel="stylesheet">
        
        <style>
            .divCountNT
            {
                font-size: 25px;
                color: yellow;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        
        <?php echo $navbar; ?>

        <div class="main">
            
        </div>
        
        <?php echo $footer; ?>
        
    </body>
</html>