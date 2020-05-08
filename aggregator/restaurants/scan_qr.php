<?php
        include('session.php');

        $qr_id = $_GET['id'];

        // $get_id = substr($qr_id, 0, 2);

        // $get_code = substr($qr_id, 2, 32);

        // echo "<script>alert('$get_id')</script>";
        // echo "<script>alert('$get_code')</script>";

        $gh = "select * from qr_url where qr_code = '$qr_id' and qr_status = '0'";
        $sdf = mysqli_query($link, $gh);
        $row = mysqli_fetch_array($sdf, MYSQLI_ASSOC);

        if($qr_id === $row['qr_code'])
        {
                $hotel = $row['qr_hotel'];
                
                $ty = "update qr_url set qr_status = '1' where qr_code = '$qr_id' and  qr_hotel = '$hotel'";
                
                $rty = mysqli_query($link, $ty);

                echo "<script>alert('QR Matched')</script>";


                $bc = "select count(qr_hotel) from qr_url where qr_status = '0' and qr_hotel = '$hotel'";
                $sdff = mysqli_query($link, $bc);
                $rowf = mysqli_fetch_array($sdff, MYSQLI_ASSOC);

                $cot = $rowf['count(qr_hotel)'];

                echo "<script>alert('Seats left = $cot');</script>";

                echo "<script>location.href='index.php';</script>";
        }
        else
        {
                echo "<script>alert('QR Already Matched')</script>";
        }
?>