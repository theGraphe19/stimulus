<?php
    include('dbconnection.php');

?>

    <h4> Holiday Pacakages </h4>
<?php
    $ty = "select * from holiday_packages where ho_status = '1'";
    $tyy = mysqli_query($link, $ty);
    while($tyyy = mysqli_fetch_array($tyy, MYSQLI_ASSOC))
    {
?>

Code = <?php echo $tyyy['ho_code']; ?> <input type="checkbox" name="ho_code[]" value="<?php echo $tyyy['ho_id']; ?>"> <br><br>



Days = <?php echo $tyyy['ho_days']; ?>.........Nights = <?php echo $tyyy['ho_nights']; ?>
<br><br>
Destination = <?php echo $tyyy['ho_destination']; ?>..........Price = <?php echo $tyyy['ho_price']; ?>
<br><br>
Pic = <img src="<?php echo $tyyy['ho_pic']; ?>" width="200">




<?php
    }
?>
