<?php
        $get_id = '1';

        $sql1 = "select * from visa_con where visa_id = '$get_id'";
        $rt11 = mysqli_query($link, $sql1);
        $row1 = mysqli_fetch_array($rt11, MYSQLI_ASSOC);

        $id1 = $row1['visa_id'];

        $rgh1 = "select * from country where id = '$id1'";
        $gh1 = mysqli_query($link, $rgh1);
        $bv1 = mysqli_fetch_array($gh1, MYSQLI_ASSOC);
?>

<br><br><br><br>
Country Name = <?php echo $bv1['nicename']; ?>
<br><br>
Image = <?php echo $row1['visa_pic']; ?>.........PDF = <a href="<?php echo $row1['visa_pic']; ?>" download>Download</a>
<br><br>
Business Type = <?php echo $row1['visa_business']; ?>.......Tourist Type = 
<?php echo $row1['visa_tourist']; ?>........Transit Type = <?php echo $row1['visa_transit']; ?>
........Employment Type = <?php echo $row1['visa_employment']; ?>