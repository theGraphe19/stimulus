<?php
    include('session.php');

    $sql = "select * from hotel_set";
    $rt = mysqli_query($link, $sql);
    while($ty = mysqli_fetch_array($rt, MYSQLI_ASSOC))
    {
?>

<div>
    Hotel ID = <?php echo $ty['h_id']; ?>............Hotel Name = <?php echo $ty['h_name']; ?>
    <br><br>
    Date = <?php echo $ty['h_date']; ?> ........... Food Type = <?php echo $ty['h_food']; ?>
    <br><br>
    Time = <?php echo $ty['h_time']; ?> ............... Vacancy = <?php echo $ty['h_vac']; ?>
    <br><br>
    Message = <?php echo $ty['h_msg']; ?>

</div>


<?php
    }
?>