<?php
    include('session.php');
    

    $com_name = $_POST["new"];
    $ho1 = $_POST["ho_id"];
    $ho2 = $_POST["ho_id2"];
    $date = $_POST['new_date'];
    $foo = $_POST['ho_id333'];
    $loc = $_POST['ho_id444'];
    $tim = $_POST['ho_id3n'];

    $sql = "update hotel_booking set hotel_reserved_seat = '$com_name' where ho_book_id = '$ho1' and hotel_id = '$ho2' and hotel_reser_date = '$date'";
    $check = mysqli_query($link, $sql);

    if($check)
    {
        $ny = 0;
        $dfd = "select * from hotel_booking where hotel_reser_date = '$date' and hotel_time = '$tim' and hotel_food_type = '$foo' and hotel_location = '$loc'";
        $sdv = mysqli_query($link, $dfd);
        while($ty = mysqli_fetch_array($sdv, MYSQLI_ASSOC))
        {
               $ny = $ny + $ty['hotel_reserved_seat'];
        }
        $newty = $ny;
        $rtyu = substr($ho1, 0, 27);
        $sql33 = "update hotel_update set total_confirmed = '$ny' where ho_book_id = '$rtyu'";
        $check33= mysqli_query($link, $sql33);

        // if($check33)
        // {
        //     $gh = "select * from qr_url where qr_hotel = '$ho1'";
        //     $hdp = mysqli_query($link, $gh);
        //     $iop = mysqli_fetch_array($hdp, MYSQLI_ASSOC);
            
        //         if($iop)
        //         {
        //             $hjpp = "update qr_url set qr_booked = '$com_name' where qr_hotel = '$ho1'";
        //             $gbnh = mysqli_query($link, $hjpp);
        //         }
        //         else
        //         {
        //             $yuo = "insert into qr_url (qr_hotel) values ('$ho1')";
        //             $tyu = mysqli_query($link, $yuo);

        //             if($tyu)
        //             {
        //                 $hjp = "update qr_url set qr_booked = '$com_name' where qr_hotel = '$ho1'";
        //                 $gbn = mysqli_query($link, $hjp);
        //             }
        //         }
            
        // }

    }

    header('location: hotel_update.php?ho_book_id='.$ho1);
?>