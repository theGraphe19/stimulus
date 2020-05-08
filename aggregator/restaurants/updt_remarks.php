
<?php
    include('session.php');

  
        $id = $_POST['id'];
        $remarks= $_POST['remarks'];

        $rt = "update hotel_booking set hotel_remarks = '$remarks' where ho_book_id = '$id'";
        $er = mysqli_query($link, $rt);
        if($er)
        {
            echo "<script>alert('Remarks Updated');</script>";
        }
   
?>




