<?php
    include('session.php');
?>

<html>
<head><title>Home</title>
</head>
<body>

<?php
    $sql = "select * from agent_trips where trip_agent_id = '$ta_id_session'";
    $run = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($run))
    {
            $loc = $row['trip_place'];
            $foo = $row['trip_food'];


            $sql2 = "select * from places where pl_id = '$loc'";
            $run2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
            
            
            $sql3 = "select * from food_type where food_type_id = '$foo'";
            $run3 = mysqli_query($link, $sql3);
            $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);


            $opp = $row['trip_date'];
            $ertt = date('d-m-Y',strtotime($opp));
            $fgg = $ta_id_session.$loc.$foo.$ertt;
            $sql4 = "select * from hotel_update where ho_book_id = '$fgg'";
            $run4 = mysqli_query($link, $sql4);
            $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
?>
<div>

Total People = <?php echo $row['trip_people']; ?>.........Location = <?php echo $row2['pl_name']; ?>................. Remaining = <?php echo $row4['total_people'] - $row4['total_confirmed']; ?>
<br><br>
Trip Food = <?php echo $row3['food_type_name']; ?>.........Date = <?php echo $row['trip_date']; ?>
<br><br>
Time = <?php echo $row['trip_time']; ?>
</div>

<br><br>



<?php

        $op = $row['trip_date'];
        
        $ert = date('d-m-Y',strtotime($op));
    $ho = "select * from hotels where h_food_type = '$foo' and h_location = '$loc'";
    $rt = mysqli_query($link, $ho);
    while($yt = mysqli_fetch_array($rt, MYSQLI_ASSOC))
    {
        $get_ho = $yt['h_id'];

            $fg = $ta_id_session.$loc.$foo.$ert.'-'.$get_ho;

            echo "<script>alert('$fg');</script>";
            $hg = "select * from hotel_booking where ho_book_id = '$fg'";
            $gh = mysqli_query($link, $hg);
            while($yuop = mysqli_fetch_array($gh, MYSQLI_ASSOC))
            {

?>


<div>

                     Hotel Name = <?php echo $yt['h_name']; ?>.......... Booked Seat = <?php echo $yuop['hotel_reserved_seat']; ?>

</div>

    <?php } } ?>

<br><br><br><br><br>
<?php
    }
?>

</body>
</html>