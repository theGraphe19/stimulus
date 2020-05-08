<?php
    include('../../../../dbconnection.php');

    $get_id = 3;
?>
<html>
    <head><title>cvbcv</title></head>
    <body>
<?php
    $ty = "select * from holiday_packages where ho_id = '$get_id'";
    $tyy = mysqli_query($link, $ty);
    while($tyyy = mysqli_fetch_array($tyy, MYSQLI_ASSOC))
    {
?>

Code = <?php echo $tyyy['ho_code']; ?>  <br><br>



Days = <?php echo $tyyy['ho_days']; ?>.........Nights = <?php echo $tyyy['ho_nights']; ?>
<br><br>
Destination = <?php echo $tyyy['ho_destination']; ?>..........Price = <?php echo $tyyy['ho_price']; ?>
<br><br>
Pic = <img src="../../../../<?php echo $tyyy['ho_pic']; ?>" width="200">


<?php
            $id = $tyyy['ho_id'];
            $ty1 = "select * from holiday_packages_itineary where ho_id = '$id' order by ho_day asc";
            $tyy1 = mysqli_query($link, $ty1);
            while($tyyy1 = mysqli_fetch_array($tyy1, MYSQLI_ASSOC))
            {
?>

                Day <?php echo $tyyy1['ho_day']; ?> = <?php echo $tyyy1['ho_content']; ?>
                <br><br>

<?php
    } }
?>
</body>
</html>
