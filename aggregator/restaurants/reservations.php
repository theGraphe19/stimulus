<?php
    include('session.php');

    if(isset($_POST['set_remarks']))
    {
        $id = $_POST['booking_id'];
        $remarks= $_POST['remarks'];

        $rt = "update hotel_booking set hotel_remarks = '$remarks' where ho_book_id = '$id'";
        $er = mysqli_query($link, $rt);
        if($er)
        {
            echo "<script>alert('Remarks Updated');</script>";
        }
    }
?>

<html>
<head><title>Home</title>
</head>
<body>

<?php
    $sql = "select * from hotel_booking where hotel_id = '$h_id_session'";
    $run = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($run))
    {
            $loc = $row['hotel_location'];
            $foo = $row['hotel_food_type'];
            $dat = $row['hotel_reser_date'];


            $sql2 = "select * from places where pl_id = '$loc'";
            $run2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
            
            
            $sql3 = "select * from food_type where food_type_id = '$foo'";
            $run3 = mysqli_query($link, $sql3);
            $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);


            $rt = $row['ho_book_id'];
            $fgg = substr($rt, 0, 13);
            $sql4 = "select * from agent_trips where trip_agent_id = '$fgg' and trip_date = '$dat'";
            $run4 = mysqli_query($link, $sql4);
            $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
?>
<div>

Total Seat = <?php echo $row['hotel_capacity']; ?>.........Reserved Seat = <?php echo $row['hotel_reserved_seat']; ?>
<br><br>
Food Type = <?php echo $row3['food_type_name']; ?>.........Date = <?php echo $row['hotel_reser_date']; ?>
<br><br>
Time = <?php echo $row4['trip_time']; ?>
<br><br>
Remarks = <?php echo $row['hotel_remarks']; ?>
<br><br>
<form method="post">
        <input type="text" name="booking_id" value="<?php echo $row['ho_book_id']; ?>" hidden>
        <textarea name="remarks" value="<?php echo $row['hotel_remarks']; ?>" placeholder="<?php echo $row['hotel_remarks']; ?>"></textarea>
        <input type="submit" value="update" name="set_remarks">
</form>
</div>

<br><br>


<br><br><br><br><br>
<?php
    }
?>

</body>
</html>